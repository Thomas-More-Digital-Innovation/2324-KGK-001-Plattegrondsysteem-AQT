<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoedingsRichtlijnen</title>
</head>
<body>
    <form action="{{ url('updatevoedingsrichtlijn/'.$voedingsRichtlijn->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="{{$voedingsRichtlijn->name}}"><br>

        <label for="icon">Icoon:</label><br>
        <input type="text" name="icon" id="icon" value="{{$voedingsRichtlijn->icon}}"><br>

        <label for="color">kleur</label><br>
        <input type="color" name="color" id="color" value="{{$voedingsRichtlijn->color}}"><br>
        

        <input type="submit" value="Submit"><br>
    </form>
</body>
</html>