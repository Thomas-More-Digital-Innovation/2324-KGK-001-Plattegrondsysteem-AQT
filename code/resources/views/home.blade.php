@extends('layout')
@section('title', 'Homepage')
@section('content')
<div class="pr-40">
   @include('components.nav.sidenav')
   @include('components.plattegrond')
   @include('components.plattegrondscript')
</div>

@endsection