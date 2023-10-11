@extends('layout')
@section('title', 'Protocollen: Admin')
@section('content')
    <x-titlebar title="Protocollen: Admin" color="FF7E7E" back=true />
    <x-protocoladmin :protocollen="$protocollen" :protocoltypes="$protocoltypes"/>
@endsection