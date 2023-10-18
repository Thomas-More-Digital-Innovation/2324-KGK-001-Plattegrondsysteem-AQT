@extends('layout')
@section('title', 'Dier-input')
@section('content')
    <x-titlebar title="Admin: Dier Aanmaken" color="FF7E7E" back=true link="{{route('dier')}}"/>
    <div class="pt-14">
        <form method="POST" action="/dier-submit" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center">
                <div class="mt-10 flex justify-center flex-col items-center bg-slate-200 p-4 rounded-2xl">
                    <div class="flex">
                        <div class="flex flex-col">
                            <label for="dropdown" class="text-lg">Werkplek <span class="text-red-500">*</span></label>
                            <select id="dropdown" name="werkplek" required class="rounded-md">
                                <!-- Stap 3: Voeg de opgehaalde gegevens toe aan de dropdown-menu -->
                                @foreach($werkplek as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col pl-4">
                        
                            <label for="dropdown" class="text-lg">Diersoort <span class="text-red-500">*</span></label>
                            <select id="dropdown" name="diersoort" required class="rounded-md">
                                <!-- Stap 3: Voeg de opgehaalde gegevens toe aan de dropdown-menu -->
                                @foreach($diersoort as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="flex pt-4">
                        <div class="flex flex-col">

                            <label for="dropdown" class="text-lg">Quarantaine <span class="text-red-500">*</span></label>
                            <select id="dropdown" name="quarantaine" required class="rounded-md"> 
                                <option value="0">Nee</option>
                                <option value="1">Ja</option>
                            </select> 

                        </div>
                        <div class="flex flex-col pl-4">
                            
                            <label for="dropdown" class="text-lg">Inventaris <span class="text-red-500">*</span></label>
                            <select id="dropdown" name="inventaris" required class="rounded-md">
                                <!-- Stap 3: Voeg de opgehaalde gegevens toe aan de dropdown-menu -->
                                @foreach($inventaris as $value)
                                    <option value="{{ $value->id }}">{{ $value->id }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <button type="submit" class="mt-4 w-full rounded-md bg-nav px-3 py-2 text-sm font-semibold text-white shadow-sm">Aanmaken</button>
                </div>
            </div>
        </form>
    </div>
@endsection