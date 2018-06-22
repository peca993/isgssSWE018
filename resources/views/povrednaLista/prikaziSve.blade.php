@extends('layouts.app')

@section('sadrzaj')

@javascript(['povredneListe' => $povredneListe ,'korisnik' => $korisnik])
<div class="table-responsive">
    <table id="povrednalista-table" class="table table-hover">
    </table>
</div>

@endsection