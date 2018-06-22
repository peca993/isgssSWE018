@extends('layouts.app')

@section('sadrzaj')



<div class="">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="/avatar/{{$korisnik->avatar_putanja}}">
        </div>
        <div class="useravatar">
            <img alt="" src="/avatar/{{$korisnik->avatar_putanja}}">
        </div>
        <div class="card-info"> <span class="card-title">{{$korisnik->name." ".$korisnik->prezime}}</span>
        </div>
    </div> 
</div>

 <ul class="list-group">
    <li class="list-group-item">Nadimak: <b>{{$korisnik->nadimak}}</b></li>
    <li class="list-group-item">e-mail: <b>{{$korisnik->email}}</b></li>
    <li class="list-group-item">Uloga: <b>{{$korisnik->uloga}}</b></li>
    <li class="list-group-item">Grad: <b>{{$korisnik->grad}}</b></li>
    <li class="list-group-item">Adresa: <b>{{$korisnik->adresa}}</b></li>
    <li class="list-group-item">Telefon: <b>{{$korisnik->telefon}}</b></li>
    @if(Auth::user()->admin == true || Auth::user()->id == $korisnik->id)
    <a href="/korisnik/{{$korisnik->id}}/izmeni" class="btn btn-warning"><i class="fa fa-edit"></i> Izmeni podatke</a>
    @endif
</ul> 
            
@endsection