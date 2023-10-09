<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselsoorten</title>
</head>
<body>
    <form action="addvoedselsoort" method="post">
        @csrf
        <label for="name">Naam:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="voeding">Voedingsrichtlijn:</label><br>
        <select name="voeding" id="voeding">
            @foreach($voedingsRichtlijnen as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select><br>
        <label for="icon">Icoon:</label><br>
        <input type="text" name="icon" id="icon"><br>

        <input type="submit" value="submit">
    </form>

    <table>
        @foreach($voedingsType as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>
                    {{$data->voedingsrichtlijnid}}
                </td>
                <td>{{$data->icon}}</td>
                <td>
                    <a href="{{url('edituser/'.$data->id)}}">aanpassen</a>
                </td>
                <td>
                    <a href="{{url('deleteuser/'.$data->id)}}">verwijderen</a>
                </td>

            </tr>
        @endforeach
    </table>
</body>
</html>