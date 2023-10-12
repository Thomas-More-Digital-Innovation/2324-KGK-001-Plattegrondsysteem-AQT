@extends('layout')
@section('title', 'Dier-input')
@section('content')
    <x-titlebar title="Admin: Dier" color="FF7E7E" back=true/>
    <div  class="mb-8 pt-20">
        <h1 class="text-2xl font-bold text-center mt-10 mb-2">Nieuw dier</h1>
        <form method="POST" action="/dier-submit" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center">
                <div class="mt-10  grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-12 w-2/4">
                            
                    <div class="grid-cols-12 sm:grid-cols-12">
                        <label for="dropdown">Selecteer een werkplek:</label>
                        <select id="dropdown" name="werkplek">
                            <!-- Stap 3: Voeg de opgehaalde gegevens toe aan de dropdown-menu -->
                            @foreach($werkplek as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid-cols-12">
                    
                        <label for="dropdown">Selecteer een diersoort:</label>
                        <select id="dropdown" name="diersoort">
                            <!-- Stap 3: Voeg de opgehaalde gegevens toe aan de dropdown-menu -->
                            @foreach($diersoort as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="grid-cols-12">

                        <label for="dropdown">Selecteer een quarantaine status:</label>
                        <select id="dropdown" name="quarantaine">
                            <option value="0">Nee</option>
                            <option value="1">Ja</option>
                        </select> 

                    </div>

                    <div class="grid-cols-12">
                        
                        <label for="dropdown">Selecteer een inventaris:</label>
                        <select id="dropdown" name="inventaris">
                            <!-- Stap 3: Voeg de opgehaalde gegevens toe aan de dropdown-menu -->
                            @foreach($inventaris as $value)
                                <option value="{{ $value->id }}">{{ $value->id }}</option>
                            @endforeach
                        </select>

                    </div>

                    <button type="submit" class="mt-2 sm:col-span-4 rounded-md bg-nav px-3 py-2 text-sm font-semibold text-white shadow-sm">Aanmaken</button>
                </div>
            </div>
        </form>
    </div>
@endsection