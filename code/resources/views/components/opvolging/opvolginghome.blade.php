@extends('layout')
@section('title', 'Admin: Opvolging')
@section('content')
   <x-titlebar title="Admin: Opvolging" color="FF7E7E" back=true link="../admin"/>
   @include('components.opvolging.infotabel')
@endsection