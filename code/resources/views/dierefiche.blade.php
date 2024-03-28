@extends('layout')
@section('title', 'Dierefiche')
@section('content')
   @php
      use App\Models\Dier;

      $idint = (int)ltrim($id, "ds");
      $diersoort = Dier::join('diersoort', 'diersoort.id', '=', 'diers.diersoortid')
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