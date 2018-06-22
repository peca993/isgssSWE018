@extends('layouts.app')

@section('sadrzaj')

@javascript(['zahtevi' => $zahtevi])
<div class="table-responsive">
    <table class="table table-hover" id="zahtevi-tabela" >
    </table>
</div>

@endsection