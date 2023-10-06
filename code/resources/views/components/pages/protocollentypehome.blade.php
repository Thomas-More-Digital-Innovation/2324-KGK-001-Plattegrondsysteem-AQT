@extends('layout')
@section('title', 'Protocollen')
@section('content')
   <x-titlebar title={{$title}} color={{$color}} />
   <x-protocoltype id={{$id}} color={{$color}} />
@endsection