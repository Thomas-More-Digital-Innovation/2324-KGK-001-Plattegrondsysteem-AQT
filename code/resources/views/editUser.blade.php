@extends('layout')
@section('title', 'Homepage')
@section('content')
    <x-titlebar title="Gebruiker aanpassen" color="FFAD7E"/>
    @include('components.editUser')
@endsection