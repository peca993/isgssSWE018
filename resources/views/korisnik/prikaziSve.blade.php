@extends('layouts.app')

@section('sadrzaj')

@javascript(['korisnici' => $korisnici ,'user' => $user])
<div class="table-responsive">
    <table id="tabelaKorisnika" class="table table-hover">
    </table>
</div>

@endsection