@extends('layout')
@section('title', 'Dierefiche')
@section('content')
<div class="flex">
   <x-iframePdf id="{{$id}}"/>
   @include('components.protocol')
</div>
@endsection