<div class="h-screen pt-14">
    <h2 class="block text-center">Nieuwe gebruiker aanmaken</h2>
    <div class="md:flex md:justify-center">
            <form action="addUser" method="post" class="md:flex flex-col md:justify-center">
            @csrf
            <label for="firstname">Voornaam:</label>
            <input type="text" id="firstname" name="firstname" placeholder="John" required>
            <label for="lastname">Achternaam:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Doe" required>

            <div>
                <input type="radio" id="student" name="role" value="2" required>
                <label for="student">student</label>
            </div>
            <div>
                <input type="radio" id="dierenarts" name="role" value="3">
                <label for="dierenarts">dierenarts</label>
            </div>
            <div>
                <input type="radio" id="leerkracht" name="role" value="4">
                <label for="leerkracht">leerkracht</label>
            </div>


            <input type="submit" value="Bevestigen">
        </form> 
    </div>

    <h2 class="block text-center mt-20">Bestaande gebruikers</h2>
    <div class="md:flex md:justify-center">
        <table class="border-separate [border-spacing:10px]">
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Gebruikersnaam</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
            @foreach($users as $data)
                <tr>
                    <td>{{$data->firstname}}</td>
                    <td>{{$data->lastname}}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$data->email}}</td>
                        @foreach($roles as $role)
                            @if($role->id == $data->roleid)
                            <td>{{$role->rolename}}</td>
                            @endif
                        @endforeach

                    @if($data->id != $userID)
                    <td>
                        <a href="{{url('edituser/'.$data->id)}}">aanpassen</a>
                    </td>
                    <td>
                        <a href="{{url('deleteuser/'.$data->id)}}">verwijderen</a>
                    </td>

                    @endif
                </tr>
            @endforeach
        </table>
    </div>

</div>