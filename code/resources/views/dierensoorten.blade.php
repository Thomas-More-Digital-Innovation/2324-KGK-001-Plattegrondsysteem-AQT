@extends('layout')
@section('title', 'Diersoort-input')
@section('content')
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Latijnse naam</th>
                <th>Foto</th>
                <th>Bestand</th>

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

    @if ($errors->has('error'))
    <div class="alert alert-danger">{{ $errors->first('error') }}</div>
    @endif
    
@endsection
