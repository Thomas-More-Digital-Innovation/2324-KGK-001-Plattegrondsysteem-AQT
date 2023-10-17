@extends('layout')
@section('title', 'adminplantaanmaken')
@section('content')
<x-titlebar title="Admin: Plant Aanmaken" color="FF7E7E" back=true link="/inventarisselect"/>
<x-errorhandler />
<div class="w-3/4 mx-auto mb-8 pt-20 text-center">

    <form method="POST" action="{{ route('plantadmin.make') }}">
        @csrf

        <div class="flex flex-col items-center">
        
            
            <label for="naam" class="text-xl px-10">naam nieuwe plant: </label>
            <div>
                <input type="text" name="naam" id="naam">
            </div>
        </div>       

        <div class="mb-4 flex justify-center pt-5 pb-10">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white rounded-full px-4 py-2 cursor-pointer">Nieuwe Plant Aanmaken</button>
        </div>
    </form>

    <form method="POST" action="{{ route('plantadmin.koppel') }}">
        @csrf
    
        <div class="multiselect-list">
            <label for="plants" class="text-xl">Select Plants:</label>
            @foreach($plant as $pl)
            <div>
                <input type="checkbox" name="plants[]" id="plants_{{ $pl->id }}" value="{{ $pl->id }}">
                <label for="plants_{{ $pl->id }}">{{ $pl->plantname }}</label>
            </div>
            @endforeach
        </div>
    
        <div class="mb-4">
            <label for="inventaris" class="text-xl">Select Inventaris:</label>
            <select name="inventaris" id="inventaris">
                @foreach($inventaris as $inv)
                    <option value="{{ $inv->id }}">{{ $inv->id }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="mb-4 flex justify-center pt-5 pb-10">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white rounded-full px-4 py-2 cursor-pointer">Couple Plants to Inventaris</button>
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
            @foreach($plant->sortByDesc('id') as $item)
                <tr>
                    <td class="border border-black px-4 py-2 text-center">{{ $item->id }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $item->plantname }}</td>
                    <td>
                        <a href="{{url('deleteplant/'.$item->id)}}">Verwijderen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
