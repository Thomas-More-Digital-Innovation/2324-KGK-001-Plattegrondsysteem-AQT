@extends('layout')
@section('title', 'Dierensoorten')
@section('content')
<x-titlebar title="Admin: Diersoort" color="FF7E7E" back=true link="{{route('admin')}}"/>
    <div class="flex pt-14 flex-col">
        <table>
            <thead>
                <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                    <th class="text-xl">Naam</th>
                    <th class="border-x-4 border-black text-xl">Latijnse naam</th>
                    <th class="border-x-4 border-black text-xl">Foto</th>
                    <th class="border-x-4 border-black text-xl">Bestand</th>
                    <th></th>
                    <th><a href="./dierensoorten/create"><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="cursor-pointer p-2 flex grow justify-center items-center"></iconify-icon><a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dierensoorten as $diersoort)
                    <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="pl-2">{{ $diersoort->name }}</td>
                        <td>{{ $diersoort->latinname }}</td>
                        <td class="flex justify-center items-center"><img src="{{ $diersoort->foto }}" alt="Foto" width="100"></td>
                        <td>{{ $diersoort->file }}</td>
                        <td><a href="./diersoort-edit/{{ $diersoort->id }}"><iconify-icon class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></a></td>
                        <td><form method="POST" action="./dierensoorten/{{ $diersoort->id }}" class="cursor-pointer h-full flex grow justify-center items-center">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
