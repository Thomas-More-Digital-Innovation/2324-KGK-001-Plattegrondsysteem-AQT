@extends('layout')
@section('title', 'Admin: Lamp Aanpassen')
@section('content')
<x-titlebar title="Admin: Lamp Aanpassen" color="FF7E7E" back=true link="/lampadmin"/>
<x-errorhandler />
<div class="w-3/4 mx-auto mb-8 pt-20 text-center">
    <form action="{{ url('/lampadmin/update/'.$lamp->id) }}" method="post">
        @csrf
        @method('POST')
        <label for="name">Lampnaam:</label><br>
        <input type="text" id="name" name="name" value="{{$lamp->name}}" class="text-black" required><br>
        <input type="submit" value="aanpassen" class="text-green-600 py-2 px-4 rounded">
    </form>
</div>
@endsection
