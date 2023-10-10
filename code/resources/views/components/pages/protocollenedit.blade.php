@extends('layout')
@section('title', 'Protocollen: Admin')
@section('content')
    <x-titlebar title="Protocollen: Edit" color="FF7E7E" back=true />
    <x-protocoledit :protocol="$protocol" :protocoltypes="$protocoltypes"/>
@endsection