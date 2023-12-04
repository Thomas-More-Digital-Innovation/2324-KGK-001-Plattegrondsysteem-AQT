@extends('layout')
@section('title', 'Dierefiche')
@section('content')
@php
      $idint = (int)ltrim($id, "ds");
      $diersoort = DB::table('dier')
       ->join('diersoort', 'diersoort.id', '=', 'dier.diersoortid')
       ->where('dier.id', '=', $idint)
       ->first();
      $name = $diersoort-> name
   @endphp
   <x-titlebar title="Dierenfiche: {{ $name }}" color="b9fbc0" back=true link="{{route('werkplek')}}"/>
<div class="flex">
   <x-iframe-pdf id="{{$id}}"/>
   @include('components.protocol')
</div>
@endsection