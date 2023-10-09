<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voederrichtlijnen</title>
</head>
<body>
    <form action="addvoedingsrichtlijn" method="post">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name"><br>

        <label for="icon">Icoon:</label><br>
        <input type="text" name="icon" id="icon"><br>

        <label for="color">kleur</label><br>
        <input type="color" name="color" id="color"><br>
        

        <input type="submit" value="Submit"><br>
    </form>
    <table>
        @foreach($voedingsRichtlijnen as $data)
            <tr>
                <td>
                    {{$data->name}}
                </td>
                <td>
                    {{$data->icon}}
                </td>
                <td>
                    {{$data->color}}
                </td>
                <td>
                    <a href="{{url('editvoedingsrichtlijn/'.$data->id)}}">aanpassen</a>
                </td>
                <td>
                    <a href="{{url('deletevoedingsrichtlijn/'.$data->id)}}">verwijderen</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>