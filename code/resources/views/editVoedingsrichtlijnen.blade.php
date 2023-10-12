@extends('layout')
@section('title', 'Voedingsrichtlijnen: Aanpassen')
@section('content')
    <x-titlebar title="Voedingsrichtlijnen: Aanpassen" color="FF7E7E" back=true link="/voedingsrichtlijnenadmin"/>
    <x-errorhandler />
    @include('components.editVoedingsrichtlijnen')
@endsection