@extends('layouts.app')

@section('sadrzaj')

    @csrf

    @javascript(['clanovi' => $clanovi])
    <div id="priprema_akcije"></div>
    

@endsection