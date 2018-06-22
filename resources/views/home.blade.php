@extends('layouts.app')

@section('sadrzaj')

@auth
@if( Auth::user()->admin == true )

Administrator HOME
@else
<div class="row">
@foreach($poruke as $poruka)
<div class="card text-white float-left m-3" style="width: 18rem;" >
  <div class="card-header bg-{{$poruka->prioritet}}"><i class="fa fa-envelope"></i> Poruka</div>
  <div class="card-body">
    <!--<h5 class="card-title">Primary card title</h5>-->
  <p class="card-text">{{$poruka->text}}</p>
  </div>
  <a href='/poruka/{{$poruka->id}}/obrisi' class="btn btn-outline-danger"><i class="fa fa-trash"></i> Obrisi</a>
</div>
@endforeach
</div>
<hr>
<div class="row">
  <div class="col-12">
    @if(count($aktuelneAkcije) > 0)
      <h3>Aktuelne akcije</h3>
    @endif
    @foreach($aktuelneAkcije as $akcija)
    <a href="akcija/{{$akcija->id}}"   >
    <div class="card text-center ">
        
        <div class="card-header">
          <h3><i class="fa fa-fighter-jet "></i> {{$akcija->naziv}}</h3>
        </div>
      
        <div class="card-body">
          <h5 class="card-title"><i class="fa fa-map-marker"></i> {{$akcija->lokacija}}</h5>
          <p class="card-text">{{$akcija->napomena}}</p>
        </div>
        <div class="card-footer text-muted">
          {{$akcija->datum}}
        </div>
      </div>
      <a/>  
    @endforeach
  </div>
</div>

@endif

@endauth
@endsection

