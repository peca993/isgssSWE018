<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use isGSS\User;
use isGSS\Poruka;
use isGSS\Akcija;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $korisnik = User::where('username',Auth::user()->username)->first();
      
        $poruke = Poruka::where('primalac',$korisnik->id)->get();

        $aktuelneAkcije = Akcija::where('datum','>=',date('Y-m-d').' 00:00:00')->get();
        
        return view('home')
            ->with('poruke',$poruke)
            ->with('aktuelneAkcije',$aktuelneAkcije);
    }
}
