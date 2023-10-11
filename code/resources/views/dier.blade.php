@extends('layout')
@section('title', 'Dieren')
@section('content')
    <x-titlebar title="Admin: Dier" color="FF7E7E" back=true/>
    <div class="w-80 mb-8 pt-20">
        <table>
            <thead>
                <tr>
                    <th>Werkplek</th>
                    <th>Diersoort</th>
                    <th>quarantaine</th>
                    <th>inventaris</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dieren as $dier)
                    <tr>
                        <td>{{ $dier->werkplekName }}</td>
                        <td>{{ $dier->diersoortName }}</td>
                        <td>{{ $dier->quarantaine == 0 ? 'Nee' : 'Ja' }}</td>
                        <td>{{ $dier->inventarisid }}</td>
                        <td><a href="/dier-edit/{{ $dier->id }}">aanpassen</a></td>
                        <td><form method="POST" action="/dier-verwijderen/{{ $dier->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/dier/create">Nieuwe dier toevoegen</a>
    </div>
       
@endsection
