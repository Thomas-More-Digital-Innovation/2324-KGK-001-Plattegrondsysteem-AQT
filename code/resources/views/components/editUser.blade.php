<div class="h-screen pt-14">
    <div class="md:flex md:justify-center">
        <form action="{{ url('updateuser/'.$user->id) }}" method="post" class="md:flex flex-col md:justify-center">
            @csrf
            @method('PUT')
            <label for="firstname">Voornaam:</label>
            <input type="text" id="firstname" name="firstname" value="{{$user->firstname}}" placeholder="John" class="text-black" required>
            <label for="lastname">Achternaam:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Doe" value="{{$user->lastname}}" class="text-black" required>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" placeholder="JohnDoe" value="{{$user->username}}" class="text-black" required>

            <div>
                <input type="checkbox" name="password" id="password">
                <label for="password">Wachtwoord reseten</label>
            </div>
            
            <div>
                <input type="radio" id="student" name="role" value="2" @if($user->roleid === 2) checked @endif required>
                <label for="student">student</label>   
            </div>
            <div>
                <input type="radio" id="dierenarts" name="role" value="3" @if($user->roleid === 3) checked @endif>
                <label for="dierenarts">dierenarts</label>
            </div>


            <div>
                <input type="radio" id="leerkracht" name="role" value="4" @if($user->roleid === 4) checked @endif>
                <label for="leerkracht">leerkracht</label>            
            </div>


            <input type="submit" value="Bevestigen">
        </form> 
    </div>
    <div class="md:flex md:justify-center">
        <a href="{{url('students')}}">Annuleren</a>
    </div>
    
</div>
