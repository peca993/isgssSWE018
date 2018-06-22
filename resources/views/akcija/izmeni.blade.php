@extends('layouts.app')

@section('sadrzaj')

@javascript(['akcija' => $akcija,'clanovi' => $clanovi,'ucesnici' => $ucesnici,'neucesnici' => $neucesnici])
    <div id="izmena_akcije"></div>

@endsection