<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use isGSS\User;


class InitController extends Controller
{
    public function addAdmin()
    {
        $admin = new User();
        
        $admin->email = "admin@isgss.dev";
        $admin->name = "Administrator";
        $admin->username = "admin";
        $admin->admin = true;
        $admin->password = Hash::make('isgss');

        $admin->save();

        return redirect('/');

    }

    public function addUsers()
    {
        $cenkov = new User();
        $cenkov->name = 'Dejan';
        $cenkov->email = 'cenkov@truba.rs';
        $cenkov->password = Hash::make('1');
        $cenkov->username = '1';
        $cenkov->admin = false;
        $cenkov->uloga = 'Magacioner';
        $cenkov->prezime = 'Cenkov';
        $cenkov->nadimak = 'Bugarce';
        $cenkov->grad = 'Caribrod';
        $cenkov->adresa = 'Prvomajska 6';
        $cenkov->telefon = '064/123-45-67';
        $cenkov->jmbg = '2210994790015';
        $cenkov->datum_rodjenja = '1994-10-22';
        $cenkov->krvna_grupa = 'b+';
        $cenkov->save();
        $cenkov->avatar_putanja = $cenkov->id.".png";
        $cenkov->save();

        $kris = new User();
        $kris->name = 'Kristina';
        $kris->email = 'kris@truba.rs';
        $kris->password = Hash::make('2');
        $kris->username = '2';
        $kris->admin = false;
        $kris->uloga = 'Spasilac';
        $kris->prezime = 'Marjanovic';
        $kris->nadimak = 'Kika';
        $kris->grad = 'Nis';
        $kris->adresa = 'Duvaniste 5';
        $kris->telefon = '065/123-45-67';
        $kris->jmbg = '2210094790015';
        $kris->datum_rodjenja = '1996-10-22';
        $kris->krvna_grupa = 'a+';
        $kris->save();
        $kris->avatar_putanja = $kris->id.".png";
        $kris->save();

        $dejan = new User();
        $dejan->name = 'Dejan';
        $dejan->email = 'dejan@truba.rs';
        $dejan->password = Hash::make('3');
        $dejan->username = '3';
        $dejan->admin = false;
        $dejan->uloga = 'Pripravnik';
        $dejan->prezime = 'Randjelovic';
        $dejan->nadimak = 'Dex';
        $dejan->grad = 'Nis';
        $dejan->adresa = 'Cenar 5';
        $dejan->telefon = '066/123-45-67';
        $dejan->jmbg = '2210093790015';
        $dejan->datum_rodjenja = '1996-11-12';
        $dejan->krvna_grupa = 'b+';
        $dejan->save();
        $dejan->avatar_putanja = $dejan->id.".png";
        $dejan->save();

        $petar = new User();
        $petar->name = 'Petar';
        $petar->email = 'peca993@gmail.com';
        $petar->password = Hash::make('4');
        $petar->username = '4';
        $petar->admin = false;
        $petar->uloga = 'Neaktivan clan';
        $petar->prezime = 'Markovic';
        $petar->nadimak = 'Peca';
        $petar->grad = 'Uzice';
        $petar->adresa = 'Lazara Mutapa 2/36';
        $petar->telefon = '066/059-909';
        $petar->jmbg = '1911993790016';
        $petar->datum_rodjenja = '1993-11-19';
        $petar->krvna_grupa = 'ab+';
        $petar->save();
        $petar->avatar_putanja = $petar->id.".png";
        $petar->save();

        return redirect('/');

    }
}
