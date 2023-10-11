@extends('layout')
@section('title', 'Admin')
@section('content')
   <x-titlebar title="Admin" color="FF7E7E" back=true link="/home"/>
   <x-adminboxes />
@endsection