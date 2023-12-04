@extends('layout')
@section('title', 'Dieren')
@section('content')
    <x-titlebar title="Admin: Dier" color="FF7E7E" back=true link="{{route('admin')}}"/>
    <div class="flex pt-14 flex-col">
        <table>
            <thead>
                <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                    <th class="text-xl">Werkplek</th>
                    <th class="border-x-4 border-black text-xl">Diersoort</th>
                    <th class="border-x-4 border-black text-xl">Quarantaine</th>
                    <th class="border-x-4 border-black text-xl">Inventaris</th>
                    <th></th>
                    <th><a href="/dier/create"><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="cursor-pointer p-2 flex grow justify-center items-center"></iconify-icon></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dieren as $dier)
                    <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="pl-2">{{ $dier->werkplekName }}</td>
                        <td>{{ $dier->diersoortName }}</td>
                        <td>{{ $dier->quarantaine == 0 ? 'Nee' : 'Ja' }}</td>
                        <td>{{ $dier->inventarisid }}</td>
                        <td><a href="./dier-edit/{{ $dier->id }}"><iconify-icon class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></a></td>
                        <td><form method="POST" action="./dier-verwijderen/{{ $dier->id }}" class="cursor-pointer h-full flex grow justify-center items-center">
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
