@extends('layout')
@section('title', 'Protocollen')
@section('content')
   <x-titlebar title={{$title}} color={{$color}} />
   <x-protocolinfo id={{$id}} color={{$color}} />
@endsection