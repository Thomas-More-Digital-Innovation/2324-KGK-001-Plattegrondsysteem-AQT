<div class="h-screen pt-14">
    <div class="fixed top-16 left-44 z-50" id="error-container">
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <button class="ml-auto px-2 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 focus:outline-none" onclick="hideErrorMessage()"><b>Sluiten</b></button>
            </div>
        @endif
    </div>
    <h2 class="block text-center">Nieuwe voedingsrichtlijn maken</h2>
    <div class="md:flex md:justify-center">
        <form action="addvoedingsrichtlijn" method="post" class="md:flex flex-col md:justify-center">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="icon">Icoon:</label>
            <input type="text" name="icon" id="icon" required>

            <label for="color">kleur</label>
            <input type="color" name="color" id="color" class="w-full h-8" required>
            

            <input type="submit" value="Bevestigen">
        </form>
    </div>

    <h2 class="block text-center mt-20">Bestaande voedingsricthlijnen</h2>
    <div class="md:flex md:justify-center">
        <table class="border-separate [border-spacing:10px]">
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
    </div>
</div>
<script>
    function hideErrorMessage() {
        var errorContainer = document.getElementById('error-container');
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
    }
</script>