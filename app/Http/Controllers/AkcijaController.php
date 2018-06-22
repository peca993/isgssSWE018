<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use isGSS\User;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use isGSS\Akcija;
use isGSS\ClanAkcije;
use Illuminate\Support\Facades\DB;

class AkcijaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function _kreiraj()
    {
        if((Auth::user()->uloga !=  'Spasilac' ) && (Auth::user()->uloga !=  'Magacioner') ){    
            return redirect('/')->with('info', 'Ne pristupiti ovo funkcionalnosti!');
        }

        $clanovi = User::where('uloga','!=','Neaktivan clan')->get();
   
        return view('akcija.kreiraj')
            ->with('clanovi',$clanovi);
        
    }

    public function kreiraj(Request $request)
    {
        $akcijaJSON = $request->json()->all();
    
        $akcija = new Akcija();
        $akcija->naziv = $akcijaJSON['naziv'];
        $akcija->datum = $akcijaJSON['datum'];
        $akcija->vodja_akcije = Auth::user()->id;
        $akcija->lokacija = $akcijaJSON['lokacija'];
        $akcija->opis = $akcijaJSON['opis'];
        $akcija->napomena = $akcijaJSON['napomena'];
        $akcija->save(); 
    
        foreach($akcijaJSON['clanovi_akcije'] as $clan){
            $clanAkcije = new ClanAkcije();
            $clanAkcije->clan_id = $clan['id'];
            $clanAkcije->akcija_id = $akcija->id;
            $clanAkcije->save();
        }
    }

    public function prikaziSve()
    {
        $akcije = Akcija::orderBy('created_at', 'desc')->get();
        $korisnici = User::all();

        return view('akcija.prikaziSve')
          ->with('akcije',$akcije)
          ->with('korisnici',$korisnici);
    }

    public function prikazi($id)
    {
        $korisnik = User::where('id',Auth::user()->id)->first();
        $akcija = Akcija::where('id',$id)->first();
        $vodja = User::where('id',$akcija->vodja_akcije)->first();
        $ucesniciIDs = ClanAkcije::select('clan_id')->where('akcija_id', $id)->get();
        $ucesnici = User::whereIn('id', $ucesniciIDs)->get();

        return view('akcija.prikazi')
        ->with('user',Auth::user())
        ->with('korisnik',$korisnik)
        ->with('akcija',$akcija)
        ->with('vodja',$vodja)
        ->with('ucesnici',$ucesnici);
    }

    public function _izmeni($id)
    {
        $akcija = Akcija::where('id',$id)->first();
        $clanovi = User::where('uloga','!=','Neaktivan clan')->get();
        $ucesniciIDs = ClanAkcije::select('clan_id')->where('akcija_id', $id)->get();
        $ucesnici = User::whereIn('id', $ucesniciIDs)->get();
        $neucesnici = User::whereNotIn('id', $ucesniciIDs)
            ->where('uloga','!=','Neaktivan clan')
            ->get();

        if(Auth::user()->id != $akcija->vodja_akcije && !Auth::user()->admin){    //  Izmene moze vrsiti samo admin ili vodja akcije            
            return redirect('/')->with('info', 'Ne mozes pristupiti ovoj funkcionalnosti!');
        }

        return view('akcija.izmeni')
            ->with('akcija',$akcija)
            ->with('clanovi',$clanovi)
            ->with('ucesnici',$ucesnici)
            ->with('neucesnici',$neucesnici);
    }

    public function izmeni(Request $request)
    {
        
        $akcijaJSON = $request->json()->all();
    
        $akcija = Akcija::where('id',$akcijaJSON['id'])->first();
        $akcija->naziv = $akcijaJSON['naziv'];
        $akcija->datum = $akcijaJSON['datum'];
        $akcija->lokacija = $akcijaJSON['lokacija'];
        $akcija->opis = $akcijaJSON['opis'];
        $akcija->napomena = $akcijaJSON['napomena'];
        $akcija->save(); 
    
        $IDsForDelete = ClanAkcije::where('akcija_id',$akcija->id)->pluck('id'); 


        ClanAkcije::whereIn('id', $IDsForDelete)->delete(); 

        foreach($akcijaJSON['clanovi_akcije'] as $clan){
            $clanAkcije = new ClanAkcije();
            $clanAkcije->clan_id = $clan['id'];
            $clanAkcije->akcija_id = $akcija->id;
            $clanAkcije->save();
        }
    }
}
