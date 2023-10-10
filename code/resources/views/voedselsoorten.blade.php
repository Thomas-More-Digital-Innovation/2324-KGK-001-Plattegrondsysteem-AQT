@extends('layout')
@section('title', 'Voedselsoorten')
@section('content')
    <x-titlebar title="Voedselsoorten beheren" color="FFAD7E"/>
    @include('components.crudVoedselsoorten')
@endsection