@extends('layout')
@section('title', 'inventarisadmin')
@section('content')
<x-titlebar title="Admin: Inventaris" color="FF7E7E" back=true link="./inventarisselect"/>
<x-errorhandler />
<div class="h-screen pt-14"> 
    <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Nieuw inventaris aanmaken</h1>
    <div class="flex flex-col justify-center items-center py-2">
        <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
            <div class="flex justify-around">
                <div class="flex justify-center">
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

                            <div class="multiselect-list  mr-8">
                                <label for="lamprechts" class="text-xl">Lampen rechts:</label>
                                @foreach($lamp as $lampje)
                                    <div>
                                        <input type="checkbox" name="lamprechts[]" id="lamprechts_{{ $lampje->id }}" value="{{ $lampje->id }}">
                                        <label for="lamprechts_{{ $lampje->id }}">{{ $lampje->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">Inventaris Aanmaken</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Bestaande inventarisen</h1>

    <div class="bg-white overflow-hidden shadow-sm">
        <div class="flex flex-col">
            <!-- Table of existing inventarissen -->
            <table>
                <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                    <th class="text-xl p-3">Inventarisnummer</th>
                    <th class="border-x-4 border-black text-xl">Lampen Links</th>
                    <th class="border-x-4 border-black text-xl">Lampen Rechts</th>
                    <th></th>
                </tr>
                @foreach($rows as $row)
                    <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="pl-2">{{ $row['inventarisid'] }}</td>
                        <td class="px-6">{{ $row['left_lamps'] }}</td>
                        <td>{{ $row['right_lamps'] }}</td>
                        <td><a href="./deleteinventaris/{{$row['inventarisid']}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
