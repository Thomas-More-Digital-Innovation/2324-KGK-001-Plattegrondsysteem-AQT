@extends('layout')
@section('title', 'Protocollen')
@section('content')
   <x-titlebar title={{$title}} color={{$color}} back=true />
   <x-protocolinfo id={{$id}} color={{$color}} />
@endsection