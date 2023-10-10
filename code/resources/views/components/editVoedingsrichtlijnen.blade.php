<div class="h-screen pt-14">
    <div class="md:flex md:justify-center">
        <form action="{{ url('updatevoedingsrichtlijn/'.$voedingsRichtlijn->id) }}" method="post" class="md:flex flex-col md:justify-center">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{$voedingsRichtlijn->name}}" required>

            <label for="icon">Icoon:</label>
            <input type="text" name="icon" id="icon" value="{{$voedingsRichtlijn->icon}}" required>

            <label for="color">kleur</label>
            <input type="color" name="color" id="color" class="w-full h-8" value="{{$voedingsRichtlijn->color}}" required>
            

            <input type="submit" value="Bevestigen">
        </form>
    </div>

    <div class="md:flex md:justify-center">
        <a href="{{url('voedingsrichtlijnenadmin')}}">Annuleren</a>
    </div>

</div>