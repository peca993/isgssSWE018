@extends('layouts.app')

@section('sadrzaj')

<div class="row justify-content-center">
<ul class="list-group col-8">
    <li class="list-group-item">Naziv: <b>{{$oprema->naziv}}</b></li>
    <li class="list-group-item">Kategorija: <b>{{$oprema->kategorija}}</b></li>
    <li class="list-group-item">Kolicina: <b>{{$oprema->kolicina}}</b></li>
    <li class="list-group-item">Opis: <b>{{$oprema->opis}}</b></li>
    @if(Auth::user()->uloga == 'Magacioner')
    <a href="/magacin/{{$oprema->id}}/izmeni" class="btn btn-warning"><i class="fa fa-edit"></i> Izmeni</a>
    @endif
</ul> 
</div>

            
@endsection