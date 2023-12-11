@extends('layout')
@section('title', 'Gebruikers: Admin')
@section('content')
    <x-titlebar title="Gebruikers: Admin" color="FF7E7E" back=true link="./admin"/>
    @include('components.userCrud')
@endsection