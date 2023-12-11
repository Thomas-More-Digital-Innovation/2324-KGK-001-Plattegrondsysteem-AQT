@extends('layout')
@section('title', 'adminlampaanmaken')
@section('content')
<x-titlebar title="Admin: Lamp Aanmaken" color="FF7E7E" back=true link="./inventarisselect"/>
<x-errorhandler />
<div class="h-screen pt-14">
    <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Nieuw lamp aanmaken</h1>
    <div class="flex flex-col justify-center items-center py-2">
        <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
            <div class="flex justify-around">
                <div class="flex justify-center">
                    <form method="POST" action="{{ route('lampadmin.make') }}">
                        @csrf
                        <div class="flex flex-col">
                            <label for="naam" class="text-lg">Naam lamp <span class="text-red-500">*</span></label>
                            <input type="text" name="naam" class="rounded-lg" id="naam" required>
                        </div>       
                        <button type="submit" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">Aanmaken</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Bestaande lampen</h1>
    <div class="bg-white overflow-hidden shadow-sm">
        <div class="flex flex-col">
            <table>
                <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                    <th class="text-xl p-3">ID</th>
                    <th class="border-x-4 border-black text-xl">Naam</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($lamp->sortByDesc('id') as $item)
                    <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="pl-2">{{ $item->id }}</td>
                        <td class="px-6">{{ $item->name }}</td>
                        <td><a href="{{url('lampedit/'.$item->id)}}"><iconify-icon id="" class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></a></td>
                        <td><a href="{{url('deletelamp/'.$item->id)}}"><iconify-icon icon="mdi:trashcan-outline" class="flex grow justify-center items-center" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
