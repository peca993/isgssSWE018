@extends('layouts.app')

@section('sadrzaj')

@javascript(['oprema' => $oprema ,'user' => $user])
<div class="table-responsive">
    <table id="tabelaMagacin" class="table table-hover">
    </table>
</div>

@endsection