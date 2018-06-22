@extends('layouts.app')

@section('sadrzaj')
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav bg-secondary">
      <h4>Ucesnici</h4>
      <hr>
      <ul class="nav nav-pills nav-stacked">
        @foreach($ucesnici as $ucesnik)
        <li><a href="/korisnik/{{$ucesnik->id}}">{{$ucesnik->name.' '.$ucesnik->prezime.' '.$ucesnik->nadimak}}</a></li>
        @endforeach
      </ul><br>
    </div>

    <div class="col-sm-9" >
      <h1>{{ $akcija->naziv }}</h1>
      <hr>
      <h2><i class="fa fa-map-marker"></i> {{ $akcija->lokacija }}</h2>
      <h5><i class="fa fa-calendar"></i> {{ $akcija->datum }}</h5>
      <a href="/korisnik/{{$vodja->id}}"><h5><i class="fa fa-pied-piper-alt"></i> {{ $vodja->name.' '.$vodja->prezime.' '.$vodja->nadimak }}</h5></a>
      @if($akcija->napomena != null)
      <h5><i class="fa fa-exclamation-triangle"></i> {{ $akcija->napomena }}</span></h5><br>
      @endif
      <hr>
      <p>
      {{ $akcija->opis }}
      </p>
      <br><br>
    @if($user->id == $vodja->id)
    <a href="/akcija/{{$akcija->id}}/izmeni" class="btn btn-big btn-block btn-warning">Izmeni</a>
    @endif
    </div>
  </div>
</div>


@endsection