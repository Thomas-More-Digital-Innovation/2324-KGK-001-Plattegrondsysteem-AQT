@extends('layout')
@section('title', 'Diersoort-edit')
@section('content')
<x-titlebar title="Admin: Aanpassen Diersoort" color="FF7E7E" back=true link="{{route('dierensoorten')}}"/>
<?php

$fotoTrim = substr($diersoortEdit->foto, strlen('images/'));
$fileTrim = substr($diersoortEdit->file, strlen('files/'));

?>

    <div class="mb-8 pt-14">
        <form method="POST" action="/diersoort-update/{{ $diersoortEdit->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex justify-center">
                <div class="mt-10 flex justify-center flex-col items-center bg-slate-200 p-4 rounded-2xl w-3/6">
                    <div class="flex">
                        <div>
                            <label for="first-name" class="block text-lg font-medium leading-6 text-gray-900">Naam <span class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" name="name" value="{{ $diersoortEdit->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        
                        <div class="pl-2">
                            <label for="last-name" class="block text-lg font-medium leading-6 text-gray-900">Latijnse naam <span class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" name="latinname" value="{{ $diersoortEdit->latinname }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>



                    <div class="pt-4">
                        <label for="foto" class="block text-lg font-medium leading-6 text-gray-900">Foto <span class="text-red-500">*</span> (vorige foto: {{ $fotoTrim }})</label>
                        <div class="mt-2">
                            <input type="hidden" name="fotoOld" value="{{ $diersoortEdit->foto }}">
                            <input type="file" name="foto">                    
                        </div>
                    </div>

                    <div class="pt-4">
                        <label for="file" class="block text-lg font-medium leading-6 text-gray-900">Dierenfiche <span class="text-red-500">*</span> (vorige dierenfiche: {{ $fileTrim }})</label>
                        <div class="mt-2">
                            <input type="hidden" name="fileOld" value="{{ $diersoortEdit->file }}">
                            <input type="file" name="file">                    
                        </div>
                    </div>

                    <button type="submit" class="w-full text-center mt-4 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Wijzigingen opslaan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection