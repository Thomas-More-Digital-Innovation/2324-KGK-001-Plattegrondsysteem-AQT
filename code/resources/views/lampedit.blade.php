@extends('layout')
@section('title', 'Admin: Lamp Aanpassen')
@section('content')
<x-titlebar title="Admin: Lamp Aanpassen" color="FF7E7E" back=true link="./lampadmin"/>
<x-errorhandler />
<div class="h-screen pt-14">
    <div class="flex flex-col justify-center items-center py-2">
        <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
            <div class="flex justify-around">
                <div class="flex justify-center">
                    <form action="{{ url('/lampadmin/update/'.$lamp->id) }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="flex flex-col">
                            <label for="name">Lamp naam <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{$lamp->name}}" class="text-black rounded-lg" required>
                            <input type="submit" value="aanpassen" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
