<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselsoorten</title>
</head>
<body>
    <form action="{{ url('updatevoedselsoort/'.$voedingsoort->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Naam:</label><br>
        <input type="text" name="name" id="name" value="{{$voedingsoort->name}}"><br>
        <label for="voeding">Voedingsrichtlijn:</label><br>
        <select name="voeding" id="voeding">
            @foreach($voedingsRichtlijnen as $data)
            <option value="{{$data->id}}" {{ $data->id == $voedingsoort->voedingsrichtlijnid ? 'selected' : '' }}>{{$data->name}}</option>
            @endforeach
        </select><br>
        <label for="icon">Icoon:</label><br>
        <input type="text" name="icon" id="icon" value="{{$voedingsoort->icon}}"><br>

        <input type="submit" value="submit">
    </form>

</body>
</html>