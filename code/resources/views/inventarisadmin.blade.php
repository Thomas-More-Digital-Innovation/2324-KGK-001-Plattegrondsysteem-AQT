@extends('layout')
@section('title', 'inventarisadmin')
@section('content')
<x-titlebar title="Admin: Inventaris" color="FF7E7E" back=true/>

<div class="w-3/4 mx-auto mb-8 pt-20"> 
    <!-- Form for creating a new inventaris -->
    <form method="POST" action="{{ route('inventarisadmin.makeInventaris') }}">
        @csrf

        <div class="flex justify-center">
            <div class="multiselect-list mr-8">
                <label for="lamplinks" class="text-xl">Lampen links:</label>
                @foreach($lamp as $lampje)
                    <div>
                        <input type="checkbox" name="lamplinks[]" id="lamplinks_{{ $lampje->id }}" value="{{ $lampje->id }}">
                        <label for="lamplinks_{{ $lampje->id }}">{{ $lampje->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="multiselect-list">
                <label for="lamprechts" class="text-xl">Lampen rechts:</label>
                @foreach($lamp as $lampje)
                    <div>
                        <input type="checkbox" name="lamprechts[]" id="lamprechts_{{ $lampje->id }}" value="{{ $lampje->id }}">
                        <label for="lamprechts_{{ $lampje->id }}">{{ $lampje->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-4 flex justify-center pt-10">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white rounded-full px-4 py-2 cursor-pointer">Inventaris Aanmaken</button>
        </div>
    </form>

    <!-- Table of existing inventarissen -->
    <table class="mx-auto mt-4">
        <tr>
            <th class="border border-black px-4 py-2 text-xl">Inventarisnummer</th>
            <th class="border border-black px-4 py-2 text-xl">Lampen Links</th>
            <th class="border border-black px-4 py-2 text-xl">Lampen Rechts</th>
        </tr>
        @foreach($rows as $row)
            <tr>
                <td class="border border-black px-4 py-2 text-center">{{ $row['inventarisid'] }}</td>
                <td class="border border-black px-4 py-2 text-center">{{ $row['left_lamps'] }}</td>
                <td class="border border-black px-4 py-2 text-center">{{ $row['right_lamps'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
