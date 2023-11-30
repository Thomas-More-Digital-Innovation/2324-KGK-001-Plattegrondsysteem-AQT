@extends('layout')
@section('title', 'Dierefiche')
@section('content')
<div class="flex">
   <x-iframe-pdf id="{{$id}}"/>
   @include('components.protocol')
</div>
@endsection