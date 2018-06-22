@extends('layouts.app')

@section('sadrzaj')

<div class="row justify-content-center">

    <div class="col-10">
    {!! Form::open(['action' => 'KorisnikController@dodaj','method' => 'post' ,'files' => true ]) !!}
    @csrf



    <div class="form-group row">
        <label class="col-2 col-form-label">Korisnicko ime</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="korisnicko_ime" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Lozinka</label>
        <div class="col-10">
            <input class="form-control" type="password"  name="lozinka" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">E-mail</label>
        <div class="col-10">
            <input class="form-control" type="email"  name="email" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Uloga</label>
        <div class="col-10">
            <select class="form-control" name="uloga" required>
                <option></option>
                <option value="Neaktivan clan">Neaktivan clan</option>
                <option value="Pripravnik">Pripravnik</option>
                <option value="Spasilac">Spasilac</option>
                <option value="Magacioner">Magacioner</option>
            </select>
        </div>

    </div>

    <div class="form-group row">
        <label  class="col-2 col-form-label">Ime</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="ime" >
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Prezime</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="prezime" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Nadimak</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="nadimak" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Grad</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="grad" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Adresa</label>
        <div class="col-10">
            <textarea class="form-control" name="adresa" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label  class="col-2 col-form-label">Telefon</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="telefon" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">JMBG</label>
        <div class="col-10">
            <input class="form-control" type="text"  name="jmbg" required>
        </div>
    </div>

    <div class="form-group row">
    <label class="col-2 col-form-label">Datum rodjenja</label>
    <div class="col-10">
        <input class="form-control" type="date"  name="datum_rodjenja">
    </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Krvna grupa</label>
        <div class="col-10">
            <select class="form-control" name="krvna_grupa" required>
                <option></option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="0+">0+</option>
                <option value="0-">0-</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Avatar</label>
    <div class="col-10">
        <input class="form-control" type="file" name="avatar" id="avatar">
    </div>
    </div>

    <button class="btn btn-primary btn-lg btn-block">Dodaj</button>

    {!! Form::close() !!}

    </div>



</div>


@endsection