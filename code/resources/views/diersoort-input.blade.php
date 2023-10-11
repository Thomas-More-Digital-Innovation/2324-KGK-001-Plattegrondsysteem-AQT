@extends('layout')
@section('title', 'Diersoort-input')
@section('content')
    <div>
        <h1 class="text-2xl font-bold text-center mt-10 mb-2">Nieuwe diersoort</h1>
    <form method="POST" action="/diersoort-submit" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-center">
            <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-12 w-2/4">
                <div class="sm:col-span-6">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Naam</label>
                    <div class="mt-2">
                        <input type="text" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Latijnse naam</label>
                    <div class="mt-2">
                        <input type="text" name="latinname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-12">
                    <label for="foto" class="block text-sm font-medium leading-6 text-gray-900">foto</label>
                    <div class="mt-2">
                        <input type="file" name="foto">                    
                    </div>
                </div>

                <div class="sm:col-span-12">
                    <label for="file" class="block text-sm font-medium leading-6 text-gray-900">dierenfiche</label>
                    <div class="mt-2">
                        <input type="file" name="file">                    
                    </div>
                </div>

                <button type="submit" class="mt-2 sm:col-span-4 rounded-md bg-nav px-3 py-2 text-sm font-semibold text-white shadow-sm">Aanmaken</button>
            </div>
        </div>
    </form>
    </div>

@endsection