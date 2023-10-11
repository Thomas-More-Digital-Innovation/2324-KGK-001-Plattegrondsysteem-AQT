@extends('layout')
@section('title', 'Protocollen')
@section('content')
   <x-titlebar title={{$title}} color={{$color}} back=true link="/protocollen"/>
   <x-protocoltype id={{$id}} color={{$color}} />
@endsection