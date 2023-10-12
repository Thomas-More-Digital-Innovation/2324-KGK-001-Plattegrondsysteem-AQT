<div class="h-screen pt-14">
    <div class="md:flex md:justify-center">
        <form action="{{ url('updatevoedselsoort/'.$voedingsoort->id) }}" method="post" class="md:flex flex-col md:justify-center">
            @csrf
            @method('PUT')
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" value="{{$voedingsoort->name}}">
            <label for="voeding">Voedingsrichtlijn:</label>
            <select name="voeding" id="voeding">
                @foreach($voedingsRichtlijnen as $data)
                <option value="{{$data->id}}" {{ $data->id == $voedingsoort->voedingsrichtlijnid ? 'selected' : '' }}>{{$data->name}}</option>
                @endforeach
            </select>
            <label for="icon">Icoon:</label>
            <input type="text" name="icon" id="icon" value="{{$voedingsoort->icon}}">

            <input type="submit" value="Bevestigen">
        </form>
    </div>
    <div class="md:flex md:justify-center">
        <a href="{{url('voedselsoorten')}}">Annuleren</a>
    </div> 
</div>