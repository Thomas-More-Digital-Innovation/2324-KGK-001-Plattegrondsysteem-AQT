<div class="h-screen pt-14">
    <h2 class="block text-center">Nieuwe voedselsoort aanmaken</h2>
    <div class="md:flex md:justify-center">
        <form action="addvoedselsoort" method="post" class="md:flex flex-col md:justify-center"> 
            @csrf
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" required>
            <label for="voeding">Voedingsrichtlijn:</label>
            <select name="voeding" id="voeding" required>
                @foreach($voedingsRichtlijnen as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
            <label for="icon">Icoon:</label>
            <input type="text" name="icon" id="icon" required>
            
            <input type="submit" value="submit">
        </form>
    </div>

    <h2 class="block text-center mt-20">Bestaande voedselsoorten</h2>

    <div class="md:flex md:justify-center">
        <table class="border-separate [border-spacing:10px]">
            <tr>
                <th>Voedselsoort</th>
                <th>Voedselrichtlijn</th>
                <th>Icoon</th>
            </tr>
            @foreach($voedingsType as $data)
                <tr>
                    <td>{{$data->name}}</td>

                    @foreach($voedingsRichtlijnen as $richtlijn)
                        @if($richtlijn->id == $data->voedingsrichtlijnid)
                        <td>{{$richtlijn->name}}</td>
                        @endif
                    @endforeach

                    <td>{{$data->icon}}</td>
                    <td>
                        <a href="{{url('editvoedselsoort/'.$data->id)}}">aanpassen</a>
                    </td>
                    <td>
                        <a href="{{url('deletevoedselsoort/'.$data->id)}}">verwijderen</a>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>

</div>