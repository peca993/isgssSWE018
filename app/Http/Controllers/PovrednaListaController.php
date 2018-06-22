<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use isGSS\User;
use isGSS\PovrednaLista;
use isGSS\VrstaPovrede;
use isGSS\UcesnikPovredneListe;
use Illuminate\Support\Facades\Auth;
use PDF;
use Storage;
use App;


class PovrednaListaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function _izradi()
    {
     
        $clanovi = User::where('admin',false)->get();

        return view('povrednaLista.izradi')
            ->with('clanovi',$clanovi);
    }

    public function izradi(Request $request)
    {


        $povrednaListaJSON = $request->json()->all();
        
        $povrednaLista = new PovrednaLista();
        $povrednaLista->izradio = Auth::user()->id;
        $povrednaLista->ime_p = $povrednaListaJSON['ime_p'];
        $povrednaLista->prezime_p = $povrednaListaJSON['prezime_p'];
        $povrednaLista->mesto_rodjenja_p = $povrednaListaJSON['mesto_rodjenja_p'];
        $povrednaLista->pol_p = $povrednaListaJSON['pol_p'];
        $povrednaLista->adresa_p = $povrednaListaJSON['adresa_p'];
        $povrednaLista->ski_pas_p = $povrednaListaJSON['ski_pas_p'];
        $povrednaLista->smestaj = $povrednaListaJSON['smestaj'];
        $povrednaLista->licna_oprema = $povrednaListaJSON['licna_oprema'];
        $povrednaLista->opis_akcije_spasavanja = $povrednaListaJSON['opis_akcije_spasavanja'];
        $povrednaLista->vodja_akcije = $povrednaListaJSON['vodja_akcije'];
        $povrednaLista->mesto_predaje = $povrednaListaJSON['mesto_predaje'];
        $povrednaLista->datum = $povrednaListaJSON['datum'];
        $povrednaLista->vreme_predaje = $povrednaListaJSON['vreme_predaje'];
        $povrednaLista->predati_materijal = $povrednaListaJSON['predati_materijal'];
        $povrednaLista->primalac = $povrednaListaJSON['primalac'];
        $povrednaLista->mesto_nesrece = $povrednaListaJSON['mesto_nesrece'];
        $povrednaLista->vreme_nesrece = $povrednaListaJSON['vreme_nesrece'];
        $povrednaLista->vreme_prijema_poziva = $povrednaListaJSON['vreme_prijema_poziva'];
        $povrednaLista->vreme_dolaska_spasilaca = $povrednaListaJSON['vreme_dolaska_spasilaca'];
        $povrednaLista->trajanje_ukazivanja_pomoci = $povrednaListaJSON['trajanje_ukazivanja_pomoci'];
        $povrednaLista->trajanje_transporta = $povrednaListaJSON['trajanje_transporta'];
        $povrednaLista->vreme_zavrsetka_akcije = $povrednaListaJSON['vreme_zavrsetka_akcije'];
        $povrednaLista->meteoroloski_uslovi = $povrednaListaJSON['meteoroloski_uslovi'];        
        $povrednaLista->nacin_pruzanja_pomoci = $povrednaListaJSON['nacin_pruzanja_pomoci'];

        $povrednaLista->save();

        $vrstePovreda = $povrednaListaJSON['vrste_povreda']; 
        $ucesnici = $povrednaListaJSON['ucesnici'];

        foreach($vrstePovreda as $vp){
        
            $povreda = new VrstaPovrede();
            $povreda->vrsta = $vp;
            $povreda->povredna_lista_id = $povrednaLista->id;
        
            $povreda->save();   
        }

        foreach($ucesnici as $uc){
        
            $ucesnik = new UcesnikPovredneListe();
            $ucesnik->ucesnik_id = $uc['id'];
            $ucesnik->povredna_lista_id = $povrednaLista->id;
        
            $ucesnik->save();   
        }

    }

    public function prikaziSve()
    {
        $povredneListe = PovrednaLista::orderBy('created_at','desc')->get();
        $korisnik = Auth::user();

        return view('povrednaLista.prikaziSve')
            ->with('povredneListe',$povredneListe)
            ->with('korisnik',$korisnik);
    }

    public function prikazi($id)
    {
        $povrednaLista = PovrednaLista::where('id',$id)->first();
        $vrstePovreda = VrstaPovrede::where('povredna_lista_id',$povrednaLista->id)->get();
        $ucesnici = UcesnikPovredneListe::where('povredna_lista_id',$povrednaLista->id)->get();
        $vodjaAkcije = User::where('id',$povrednaLista->vodja_akcije)->first();
        $primalac = User::where('id',$povrednaLista->primalac)->first();
        $pdf = PDF::loadView('povrednaLista.izradiPDF',compact('povrednaLista','vrstePovreda','ucesnici','vodjaAkcije','primalac'));
        
        return $pdf->stream('Povredna lista.pdf');
    }

}
