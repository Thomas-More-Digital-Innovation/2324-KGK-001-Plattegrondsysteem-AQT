<div class="pt-14 flex justify-center">
    <div class="bg-slate-200 rounded-lg m-2 w-3/6 p-4">
        <form action="{{ url('updateuser/'.$user->id) }}" method="post" class="md:flex flex-col md:justify-center">
            @csrf
            @method('PUT')
            <div class="flex justify-center">
                <div class="flex flex-col grow">
                    <label for="firstname" class="text-lg">Voornaam <span class="text-red-500">*</span></label>
                    <input type="text" id="firstname" name="firstname" value="{{$user->firstname}}" placeholder="John" class="text-black rounded-lg" required>
                </div>
                <div class="flex flex-col pl-4 grow">
                    <label for="lastname" class="text-lg">Achternaam <span class="text-red-500">*</span></label>
                    <input type="text" id="lastname" name="lastname" placeholder="Doe" value="{{$user->lastname}}" class="text-black rounded-lg" required>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="username" class="text-lg">Gebruikersnaam <span class="text-red-500">*</span></label>
                <input type="text" id="username" name="username" placeholder="JohnDoe" value="{{$user->username}}" class="text-black rounded-lg" required>
            </div>
            <div class="flex justify-evenly py-4">
                <div>
                    <input type="radio" id="student" name="role" class="w-6 h-6" value="2" @if($user->roleid === 2) checked @endif required>
                    <label for="student" class="text-xl pl-2">Leerling</label>   
                </div>
                <div>
                    <input type="radio" id="dierenarts" name="role" class="w-6 h-6" value="3" @if($user->roleid === 3) checked @endif>
                    <label for="dierenarts" class="text-xl pl-2">Dierenarts</label>
                </div>
                <div>
                    <input type="radio" id="leerkracht" name="role" class="w-6 h-6" value="4" @if($user->roleid === 4) checked @endif>
                    <label for="leerkracht" class="text-xl pl-2">Leerkracht</label>            
                </div>
            </div>

            <div class="flex justify-center items-center py-4">
                <input type="checkbox" name="password" id="password" class="w-6 h-6 rounded-lg">
                <label for="password" class="text-lg pl-2">Wachtwoord reseten</label>
            </div>

            <input type="submit" value="Bevestigen" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2" >
        </form> 
    </div>    
</div>
