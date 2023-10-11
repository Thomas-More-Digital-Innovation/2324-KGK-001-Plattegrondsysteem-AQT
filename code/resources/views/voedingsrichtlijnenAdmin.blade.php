@extends('layout')
@section('title', 'Voedingsrichtlijnen: Admin')
@section('content')
    <x-titlebar title="Voedingsrichtlijnen: Admin" color="FF7E7E" back=true link="/admin"/>
    <x-errorhandler />
    @include('components.Voedingsrichtlijnen')
@endsection