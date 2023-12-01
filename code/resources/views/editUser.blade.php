@extends('layout')
@section('title', 'Gebruikers: Aanpassen')
@section('content')
    <x-titlebar title="Gebruikers: Aanpassen" color="FF7E7E" back=true link="./students"/>
    @include('components.editUser')
@endsection