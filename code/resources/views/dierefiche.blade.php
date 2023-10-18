@extends('layout')
@section('title', 'Dierefiche')
@section('content')
<div class="flex">
   <x-iframePdf id="{{$id}}"/>
   @include('components.protocol')
   <!-- @include('components.gewichtlinechart') pas includen als grafiek werkt -->
</div>
@endsection