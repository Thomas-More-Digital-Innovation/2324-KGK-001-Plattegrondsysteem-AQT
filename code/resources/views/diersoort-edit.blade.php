@extends('layout')
@section('title', 'Diersoort-edit')
@section('content')
<x-titlebar title="Admin: Diersoort" color="FF7E7E" back=true/>
<?php

$fotoTrim = substr($diersoortEdit->foto, strlen('images/'));
$fileTrim = substr($diersoortEdit->file, strlen('files/'));

?>

    <div class="mb-8 pt-20">
        <h1 class="text-2xl font-bold text-center mt-10 mb-2">Aanpassen diersoort</h1>
        <form method="POST" action="/diersoort-update/{{ $diersoortEdit->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex justify-center">
                <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-12 w-2/4">
                    <div class="sm:col-span-6">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Naam</label>
                        <div class="mt-2">
                            <input type="text" name="name" value="{{ $diersoortEdit->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Latijnse naam</label>
                        <div class="mt-2">
                            <input type="text" name="latinname" value="{{ $diersoortEdit->latinname }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>



                    <div class="sm:col-span-12">
                        <label for="foto" class="block text-sm font-medium leading-6 text-gray-900">Foto (vorige foto: {{ $fotoTrim }})</label>
                        <div class="mt-2">
                            <input type="hidden" name="fotoOld" value="{{ $diersoortEdit->foto }}">
                            <input type="file" name="foto">                    
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <label for="file" class="block text-sm font-medium leading-6 text-gray-900">Dierenfiche (vorige dierenfiche: {{ $fileTrim }})</label>
                        <div class="mt-2">
                            <input type="hidden" name="fileOld" value="{{ $diersoortEdit->file }}">
                            <input type="file" name="file">                    
                        </div>
                    </div>

                    <div class="sm:col-span-full mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Wijzigingen opslaan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection