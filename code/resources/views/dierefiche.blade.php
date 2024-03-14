@extends('layout')
@section('title', 'Dierefiche')
@section('content')
   @php
      $idint = (int)ltrim($id, "ds");
      $diersoort = DB::table('diers')
       ->join('diersoort', 'diersoort.id', '=', 'diers.diersoortid')
       ->where('diers.id', '=', $idint)
       ->first();
      $name = $diersoort-> name;
      $idwerkplek = $diersoort -> werkplekid;
   @endphp
   <x-titlebar title="Dierenfiche: {{ $name }}" color="b9fbc0" back=true link="./werkplek?id=wp{{$idwerkplek}}"/>
<div class="flex pt-14">
   <x-iframe-pdf id="{{$id}}"/>
   @include('components.protocol')
</div>
@endsection