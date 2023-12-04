@extends('layout')
@section('title', 'Admin: Voedingsrichtlijnen')
@section('content')
    <x-titlebar title="Admin: Voedingsrichtlijnen" color="FF7E7E" back=true link="./admin"/>
    @include('components.voedingsrichtlijnen')
@endsection