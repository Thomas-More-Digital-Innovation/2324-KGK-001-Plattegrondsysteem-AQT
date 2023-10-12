@extends('layout')
@section('title', 'Dierensoorten')
@section('content')
<x-titlebar title="Admin: Diersoort" color="FF7E7E" back=true/>
    <div  class="mb-8 pt-20">
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Latijnse naam</th>
                    <th>Foto</th>
                    <th>Bestand</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dierensoorten as $diersoort)
                    <tr>
                        <td>{{ $diersoort->name }}</td>
                        <td>{{ $diersoort->latinname }}</td>
                        <td>{{ $diersoort->foto }}</td>
                        <td>{{ $diersoort->file }}</td>
                        <td><a href="/diersoort-edit/{{ $diersoort->id }}">aanpassen</a></td>
                        <td><form method="POST" action="/dierensoorten/{{ $diersoort->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/dierensoorten/create">Nieuwe diersoort toevoegen</a>
    </div>

@endsection
