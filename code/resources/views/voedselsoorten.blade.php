@extends('layout')
@section('title', 'Voedselsoorten: Admin')
@section('content')
    <x-titlebar title="Voedselsoorten: Admin" color="FF7E7E" back=true link="/admin"/>
    @include('components.crudVoedselsoorten')
@endsection