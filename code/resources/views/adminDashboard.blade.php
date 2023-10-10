@extends('layout')
@section('title', 'Gebruikersbeheer')
@section('content')
    <x-titlebar title="Gebruikersbeheer" color="FFAD7E"/>
    @include('components.userCrud')
@endsection