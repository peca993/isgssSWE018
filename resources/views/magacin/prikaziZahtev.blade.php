@extends('layouts.app')

@section('sadrzaj')

@javascript([
    'zahtevalac' => $zahtevalac,
    'zahtev' => $zahtev,
    'zahtevanaOprema' => $zahtevanaOprema
    ])
<ul class="list-group">
    <li class="list-group-item" >Zahteva: <a href="/korisnik/{{$zahtevalac->id}}">{{$zahtevalac->name.' '.$zahtevalac->prezime.' '.$zahtevalac->nadimak }}</a></li>
    <li class="list-group-item" >Period: {{$zahtev->datum_od.' - '.$zahtev->datum_do}}</li>    
</ul>
<hr>
<table class="table table-hover" id="zahtev-tabela" >
</table>
<hr>

@if(!$zahtev->odobren)
<div class="row">
    <div class="col-6">
        <a href="/magacin/zahtev/{{$zahtev->id}}/odobri" class="btn btn-success btn-block">Odobri</a>
    </div>
    <div class="col-6">
        <a href="/magacin/zahtev/{{$zahtev->id}}/odbij" class="btn btn-danger btn-block">Odbij</a>        
    </div>
</div>
@else
<a href="/magacin/zahtev/{{$zahtev->id}}/vrati" class="btn btn-outline-success btn-block" >Vrati</a>
@endif



@endsection