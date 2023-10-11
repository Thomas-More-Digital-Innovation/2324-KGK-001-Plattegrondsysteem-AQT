@extends('layout')
@section('title', 'werkplaatsadmin')
@section('content')
<x-titlebar title="Admin: Werkplek" color="FF7E7E" back=true/>

<div class="w-80 mx-auto mb-8 pt-20">
    <form method="POST" action="{{ route('werkplaatsadmin.update') }}">
        @csrf
        <table class="w-full border-collapse mb-4">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="border border-white p-2 text-center">Naam Werkplek</th>
                    <th class="border border-white p-2 text-center">Maak actief/inactief</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($werkplek as $item)
                <tr class="border border-gray-300">
                    <td class="border border-gray-300 p-2 text-center">{{ $item->name }}</td>
                    <td class="border border-gray-300 p-2 text-center">
                        <input type="checkbox" name="active[]" value="{{ $item->id }}" {{ $item->active ? 'checked' : '' }}>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-4 flex justify-center">
            <button type="submit" class="btn btn-primary bg-blue-500 text-white rounded-full px-4 py-2 cursor-pointer">Bevestig Status Werkplekken</button>
        </div>
    </form>
</div>
@endsection
