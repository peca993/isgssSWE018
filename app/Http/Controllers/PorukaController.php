<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use isGSS\User;
use isGSS\Poruka;


class PorukaController extends Controller
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

    public function obrisi($id)
    {
        $poruka = Poruka::where('id',$id)->first();

        $poruka->delete();

        return redirect('/')->with('info', 'Poruka obrisana!');

    }
}
