@extends('layout')
@section('title', 'Diersoort-input')
@section('content')
    <x-errorhandler />
    <x-titlebar title="Admin: Diersoort Toevoegen" color="FF7E7E" back=true link="{{route('dierensoorten')}}"/>
    <div class="pt-14">
              
        <form method="POST" action="{{ url('diersoort-submit/') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center">
                <div class="mt-10 flex justify-center flex-col items-center bg-slate-200 p-4 rounded-2xl">
                    <div class="flex">
                        <div>
                            <label for="first-name" class="block text-lg font-medium leading-6 text-gray-900">Naam <span class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" required name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="last-name" class="block text-lg font-medium leading-6 text-gray-900">Latijnse naam <span class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="text" required name="latinname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-12 pt-2">
                        <label for="foto" class="block text-lg font-medium leading-6 text-gray-900">Foto <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="file" required name="foto" accept="image/*">                    
                        </div>
                    </div>

                    <div class="sm:col-span-12 pt-2">
                        <label for="file" class="block text-lg font-medium leading-6 text-gray-900">Dierenfiche (PDF) <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="file" required name="file" accept="application/pdf">                       
                        </div>
                    </div>
                    <button type="submit" class="w-3/6 mt-2 sm:col-span-4 rounded-md bg-nav px-3 py-2 text-sm font-semibold text-white shadow-sm">Aanmaken</button>
                </div>
            </div>
        </form>
    </div>
@endsection