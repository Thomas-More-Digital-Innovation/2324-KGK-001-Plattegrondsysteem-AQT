@extends('layout')
@section('title', 'Voedselsoorten: Aanpassen')
@section('content')
    <x-titlebar title="Voedselsoorten: Aanpassen" color="FF7E7E" back=true link="/voedselsoorten"/>
    @include('components.editVoedselsoorten')
@endsection