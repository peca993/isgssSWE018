<?php

namespace isGSS\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function getAvatar($filename)
    {
        //  Dodati logiku ako avatar ne postoji (vratiti default avatar)
       
        $avatar = response()->download(storage_path("app/avatari/".$filename), null, [], null);     
        
        return $avatar;
    }
}