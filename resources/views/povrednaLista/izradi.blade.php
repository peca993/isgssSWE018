@extends('layouts.app')

@section('sadrzaj')

@javascript(['clanovi' => $clanovi])
<div id="izrada-povredne-liste-div"></div>   

@endsection