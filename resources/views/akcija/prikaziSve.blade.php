@extends('layouts.app')

@section('sadrzaj')

@javascript(['akcije' => $akcije , 'korisnici' => $korisnici])
<div class="table-responsive">
    <table id="tabela_akcija" class="table table-hover">
    </table>
</div>
@endsection