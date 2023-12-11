@extends('layout')
@section('title', 'Protocollen: Aanpassen')
@section('content')
    <x-titlebar title="Protocollen: Aanpassen" color="FF7E7E" back=true link="../"/>
    <x-errorhandler />
    <x-protocoledit :protocol="$protocol" :protocoltypes="$protocoltypes"/>
@endsection