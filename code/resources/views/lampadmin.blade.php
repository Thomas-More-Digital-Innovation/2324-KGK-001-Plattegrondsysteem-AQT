@extends('layout')
@section('title', 'adminlampaanmaken')
@section('content')
<x-titlebar title="Admin: Lamp Aanmaken" color="FF7E7E" back=true link="/inventarisselect"/>

<div class="w-3/4 mx-auto mb-8 pt-20 text-center">

    <form method="POST" action="{{ route('lampadmin.make') }}">
        @csrf

        <div class="flex flex-col items-center">
        
            
            <label for="naam" class="text-xl px-10">naam nieuwe lamp: </label>
            <div>
                <input type="text" name="naam" id="naam">
            </div>
        </div>       

        <div class="mb-4 flex justify-center pt-5 pb-10">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white rounded-full px-4 py-2 cursor-pointer">Nieuwe Lamp Aanmaken</button>
        </div>
    </form>


    <table class="inline-block">
        <thead>
            <tr>
                <th class="border border-black px-4 py-2 text-xl">ID</th>
                <th class="border border-black px-4 py-2 text-xl">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lamp->sortByDesc('id') as $item)
                <tr>
                    <td class="border border-black px-4 py-2 text-center">{{ $item->id }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $item->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
