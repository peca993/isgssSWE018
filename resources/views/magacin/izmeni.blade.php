@extends('layouts.app')

@section('sadrzaj')

<div class="row justify-content-center">

    <div class="col-10">
    {!! Form::open(['action' => 'MagacinController@izmeni','method' => 'post' ]) !!}
    @csrf

    <h1>Izmeni opremu</h1>
    <hr>
    <input type="hidden" value="{{$oprema->id}}" name="id" >
    <div class="form-group row">
        <label class="col-2 col-form-label">Kategorija</label>
        <div class="col-10">
            <input value="{{$oprema->kategorija}}" list="kategorije" class="form-control" type="text"  name="kategorija" required>
        </div>
    </div>
    <datalist id="kategorije">
        @foreach($kategorije as $kategorija)
        <option value="{{$kategorija->kategorija}}">
        @endforeach
    </datalist> 

    <div class="form-group row">
        <label class="col-2 col-form-label">Naziv</label>
        <div class="col-10">
            <input value="{{$oprema->naziv}}" class="form-control" type="text"  name="naziv" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Kolicina</label>
        <div class="col-10">
            <input value="{{$oprema->kolicina}}" class="form-control" type="number" value="1" min="1" max="10000" name="kolicina" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Opis</label>
        <div class="col-10">
        <textarea rows="5" class="form-control"  name="opis" >
        {{$oprema->opis}}
        </textarea>
        </div>
    </div>

    

    <button class="btn btn-primary btn-lg btn-block">Izmeni</button>

    {!! Form::close() !!}

    </div>

</div>


@endsection