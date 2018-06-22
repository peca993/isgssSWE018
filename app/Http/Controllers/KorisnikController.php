<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use isGSS\User;
use Illuminate\Support\Facades\Hash;
use Storage;
use Illuminate\Support\Facades\Auth;

class KorisnikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dajKorisnika($id){
        
        return User::where('id',$id)->first();
    }

    public function _dodaj()
    {        
        if(!Auth::user()->admin){
            return redirect('/')->with('info', 'Pokusavas pristupiti administratorskoj funkcionalnosti!');
        }

        return view('korisnik.dodaj');
    }

    public function dodaj(Request $request)
    {
        if(!Auth::user()->admin){
            return redirect('/')->with('info', 'Pokusavas pristupiti administratorskoj funkcionalnosti!');
        }
        
        $request->validate([
            'korisnicko_ime' => 'required',
            'lozinka' => 'required',
            'email' => 'required|email',
            'uloga' => 'required',
            'ime' => 'required',
            'prezime' => 'required',
            'nadimak' => 'required',
            'grad' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'jmbg' => 'required|min:13|max:13',
            'datum_rodjenja' => 'required|date',
            'krvna_grupa' => 'required',
            'avatar' => 'required|image|mimes:jpg,jpeg,png',

        ]);


        $korisnik = new User();

        $korisnik->admin = false;
        $korisnik->username = $request->input('korisnicko_ime');
        $lozinka = $request->input('lozinka');
        $korisnik->password = Hash::make($lozinka);
        $korisnik->email = $request->input('email');
        $korisnik->uloga = $request->input('uloga');
        $korisnik->name = $request->input('ime');
        $korisnik->prezime = $request->input('prezime');
        $korisnik->nadimak = $request->input('nadimak');
        $korisnik->grad = $request->input('grad');
        $korisnik->adresa = $request->input('adresa');
        $korisnik->telefon = $request->input('telefon');
        $korisnik->jmbg = $request->input('jmbg');
        $korisnik->datum_rodjenja = $request->input('datum_rodjenja');
        $korisnik->krvna_grupa = $request->input('krvna_grupa');
        
        $korisnik->save();  
        $file = $request->file("avatar");
        $imeFajla = $korisnik->id.".".$file->extension();
        $file->storeAs('avatari', $imeFajla);
        $korisnik->avatar_putanja = $imeFajla;
        $korisnik->save();
        
        return redirect('/')->with('success', 'Korisnik je uspesno dodat!');
      }

      public function prikaziSve()
      {

        $korisnici = User::where('admin',false)->get();
        $user = Auth::user();

          return view('korisnik.prikaziSve')
          ->with('korisnici',$korisnici)
          ->with('user',$user);
      }

      public function prikazi($id)
      {
          
          $korisnik = User::where('id',$id)->first();

          return view('korisnik.prikazi')->with('korisnik',$korisnik);
      }

    public function _izmeni($id)
    {        
        if(Auth::user()->id != $id && !Auth::user()->admin){    //  Izmene moze vrsiti samo admin ili korisnik svoje podatke
            return redirect('/')->with('info', 'Ne mozes izmeniti tudje podatke!');
        }

        $korisnik = User::where('id',$id)->first();

        return view('korisnik.izmeni')
                ->with('korisnik',$korisnik);
    }

    public function izmeni(Request $request)
    {        
        $request->validate([
            'korisnicko_ime' => 'required',
            'email' => 'required|email',
            'uloga' => 'required',
            'ime' => 'required',
            'prezime' => 'required',
            'nadimak' => 'required',
            'grad' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'jmbg' => 'required|min:13|max:13',
            'datum_rodjenja' => 'required|date',
            'krvna_grupa' => 'required',
            'avatar' => 'image|mimes:jpg,jpeg,png',

        ]);

        $korisnik = User::where('id',$request->input('id'))->first();

        if(Auth::user()->id != $korisnik->id && !Auth::user()->admin){    //  Izmene moze vrsiti samo admin ili korisnik svoje podatke
            return redirect('/')->with('info', 'Ne mozes izmeniti tudje podatke!');
        }

        $korisnik->admin = false;
        $korisnik->username = $request->input('korisnicko_ime');
        $lozinka = $request->input('lozinka');
        if($lozinka != null){
            $korisnik->password = Hash::make($lozinka);
        }
        $korisnik->email = $request->input('email');
        $korisnik->uloga = $request->input('uloga');
        $korisnik->name = $request->input('ime');
        $korisnik->prezime = $request->input('prezime');
        $korisnik->nadimak = $request->input('nadimak');
        $korisnik->grad = $request->input('grad');
        $korisnik->adresa = $request->input('adresa');
        $korisnik->telefon = $request->input('telefon');
        $korisnik->jmbg = $request->input('jmbg');
        $korisnik->datum_rodjenja = $request->input('datum_rodjenja');
        $korisnik->krvna_grupa = $request->input('krvna_grupa');
        
        $korisnik->save();

        $file = $request->file("avatar");
        
        if($file == null){
            return redirect('/')->with('success', 'Podaci uspesno izmenjeni!');    
        }

        Storage::delete('avatari'.$korisnik->avatar_putanja);
        $imeFajla = $korisnik->id.".".$file->extension();
        $file->storeAs('avatari', $imeFajla);
        $korisnik->avatar_putanja = $imeFajla;  
        $korisnik->save();
        
        return redirect('/')->with('success', 'Podaci uspesno izmenjeni!');
    }

    public function obrisi($id) // dodati ispitivanje da li avatar postoji jer ako ne postoji puca app
    {
        if(!Auth::user()->admin){
            return redirect('/')->with('info', 'Pokusavas pristupiti administratorskoj funkcionalnosti!');
        }

        $korisnik = User::find($id);
        Storage::delete('avatari'.$korisnik->avatar_putanja);
        $korisnik->delete();

        return redirect('/korisnici')->with('success', 'Korisnik uspesno obrisan!');
    }
}
