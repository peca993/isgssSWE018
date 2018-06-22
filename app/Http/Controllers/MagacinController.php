<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use isGSS\Magacin;
use Illuminate\Support\Facades\Auth;
use isGSS\ZahtevZaIzdavanjeOpreme;
use isGSS\ZahtevanaOprema;
use isGSS\debugClass;
use isGSS\User;
use isGSS\Poruka;


class MagacinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dajOpremu($id)
    {
        return Magacin::where('id',$id)->first();
    }

    public function _dodaj()
    {
        if(Auth::user()->uloga != 'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }
        $kategorije = Magacin::distinct()->get(['kategorija']);

        return view('magacin.dodaj')
            ->with('kategorije',$kategorije);
    }

    public function dodaj(Request $request)
    {
        if(Auth::user()->uloga != 'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $oprema = new Magacin();
        $oprema->naziv = $request->input('naziv');
        $oprema->kategorija = $request->input('kategorija');
        $oprema->kolicina = $request->input('kolicina');
        $oprema->opis = $request->input('opis');        
        $oprema->save();

        return redirect('/magacin')->with('success', 'Oprema uspesno dodata!');
    }

    public function prikaziSve()
    {
        $oprema = Magacin::all();

        return view('magacin.prikaziSve')
            ->with('oprema',$oprema)
            ->with('user',Auth::user());
    }

    public function _izmeni($id)
    {
        if(Auth::user()->uloga != 'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $oprema = Magacin::where('id',$id)->first();
        $kategorije = Magacin::distinct()->get(['kategorija']);

        return view('magacin.izmeni')
            ->with('oprema',$oprema)
            ->with('kategorije',$kategorije);
    }

    public function izmeni(Request $request)
    {
        if(Auth::user()->uloga != 'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $oprema = Magacin::where('id',$request->input('id'))->first();
        $oprema->naziv = $request->input('naziv');
        $oprema->kategorija = $request->input('kategorija');
        $oprema->kolicina = $request->input('kolicina');
        $oprema->opis = $request->input('opis');
        $oprema->save();

        return redirect('/magacin')->with('success', 'Oprema uspesno izmenjena!');
    }

    public function obrisi($id)
    {
        if(Auth::user()->uloga != 'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $oprema = Magacin::where('id',$id)->first();
        $oprema->delete();

        return redirect('/magacin')->with('success', 'Oprema uspesno obrisana!');
    }

    public function prikazi($id)
    {
        $oprema = Magacin::where('id',$id)->first();

        return view('magacin.prikazi')
            ->with('oprema',$oprema)
            ->with('user',Auth::user());
    }

    public function _zaduzi()
    {
        if(Auth::user()->uloga != 'Magacioner' && Auth::user()->uloga != 'Spasilac' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $oprema = Magacin::all();

        return view('magacin.zaduzi')
            ->with('oprema',$oprema);
    }
    public function zaduzi(Request $request)
    {
        
        if(Auth::user()->uloga != 'Magacioner' && Auth::user()->uloga != 'Spasilac' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $opremaJSON = $request->json()->all();
        
        $zahtev = new ZahtevZaIzdavanjeOpreme();
        $zahtev->korisnik_id = Auth::user()->id;
        $zahtev->datum_od = $opremaJSON['datumOd'];
        $zahtev->datum_do = $opremaJSON['datumDo'];
        $zahtev->napomena = $opremaJSON['napomena'];
        $zahtev->save();

        foreach($opremaJSON['trazenaOprema'] as $o){
        
            $oprema = new ZahtevanaOprema();
            $oprema->id_zahtev = $zahtev->id;
            $oprema->id_oprema = $o['id'];
            $oprema->trazena_kolicina = $o['trazena_kolicina'];
            $oprema->save();
            
        }

        return 'true';
    }

    public function _zahtevi()
    {
        if(Auth::user()->uloga !=  'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $zahtevi = ZahtevZaIzdavanjeOpreme::all();

        return view('magacin.zahtevi')
            ->with('zahtevi',$zahtevi);
    }

    public function kolikoZahteva()
    {
        if(Auth::user()->uloga !=  'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $brZaheva = ZahtevZaIzdavanjeOpreme::where('odobren',false)->count();
        return $brZaheva;
    }

    public function prikaziZahtev($id)
    {
        if(Auth::user()->uloga !=  'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $zahtev = ZahtevZaIzdavanjeOpreme::where('id',$id)->first();
        $zahtevanaOprema = ZahtevanaOprema::where('id_zahtev',$zahtev->id)->get();
        $zahtevalac = User::where('id',$zahtev->korisnik_id)->first();

        return view('magacin.prikaziZahtev')
            ->with('zahtevalac',$zahtevalac)
            ->with('zahtev',$zahtev)
            ->with('zahtevanaOprema',$zahtevanaOprema);
    }

    public function odobriZahtev($idZahteva)
    {
        if(Auth::user()->uloga !=  'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $zahtev = ZahtevZaIzdavanjeOpreme::where('id',$idZahteva)->first();
        $zahtev->odobren = true;
        $zahtev->save();

        $oprema = ZahtevanaOprema::where('id_zahtev',$idZahteva)->get();

        foreach($oprema as $o){
            $opremaMagacin = Magacin::where('id',$o->id_oprema)->first();
            $opremaMagacin->zauzeto += $o->trazena_kolicina;
            $opremaMagacin->save();
        }

        $poruka = new Poruka();
        $poruka->primalac = $zahtev->korisnik_id;
        $poruka->posiljalac = Auth::user()->id;
        $poruka->text = "Tvoj zahev za opremu je prihvacen!";
        $poruka->prioritet = 'success';
        $poruka->save();

        return redirect('/magacin/o/zahtevi')->with('succes', 'Zahtev odobren!');
    }

    public function odbijZahtev($idZahteva)
    {
        if(Auth::user()->uloga !=  'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $zahtev = ZahtevZaIzdavanjeOpreme::where('id',$idZahteva)->first();

        $poruka = new Poruka();
        $poruka->primalac = $zahtev->korisnik_id;
        $poruka->posiljalac = Auth::user()->id;
        $poruka->text = "Tvoj zahev za opremu je nazalost odbijen!";
        $poruka->prioritet = 'danger';
        $poruka->save();

        $zahtev->delete();
        

        return redirect('/magacin/o/zahtevi')->with('succes', 'Zahtev odbijen!');
    }

    public function vratiOpremu($idZahteva)
    {
        if(Auth::user()->uloga !=  'Magacioner' ){    
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        $zahtev = ZahtevZaIzdavanjeOpreme::where('id',$idZahteva)->first();
        $zahtevanaOprema = ZahtevanaOprema::where('id_zahtev',$idZahteva)->get();

        foreach($zahtevanaOprema as $zOprema){
            $opremaMagacin = Magacin::where('id',$zOprema->id_oprema)->first();
            $opremaMagacin->zauzeto -= $zOprema->trazena_kolicina;
            $opremaMagacin->save();
        }

        $zahtev->delete();

        $poruka = new Poruka();
        $poruka->primalac = $zahtev->korisnik_id;
        $poruka->posiljalac = Auth::user()->id;
        $poruka->text = "Uspesno si vratio opremu! Hvala!";
        $poruka->prioritet = 'success';
        $poruka->save();

        $zahtev->delete();
        

        return redirect('/magacin/o/zahtevi')->with('succes', 'Zahtev odbijen!');
    }
}