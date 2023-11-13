<div class="h-screen pt-14">
    <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Nieuwe gebruiker aanmaken</h1>
    <div class="flex flex-col justify-center items-center py-2">
        <div class="bg-slate-200 p-2 rounded-lg m-2 w-3/4">
            <div class="flex justify-around">
                <div class="flex justify-center pr-2">
                        <form action="addUser" method="post" class="md:flex flex-col md:justify-center">
                        @csrf
                        <div class="flex">
                            <div class="flex flex-col">
                                <label for="firstname" class="text-lg">Voornaam <span class="text-red-500">*</span></label>
                                <input type="text" id="firstname" name="firstname" placeholder="John" required class="rounded-lg">
                            </div>
                            <div class="flex flex-col pl-4">
                                <label for="lastname" class="text-lg">Achternaam <span class="text-red-500">*</span></label>
                                <input type="text" id="lastname" name="lastname" placeholder="Doe" required class="rounded-lg">
                            </div>
                        </div>
                        <div class="flex justify-evenly py-4">
                            <div class="flex justify-center items-center">
                                <input type="radio" id="student" name="role" value="2" class="w-6 h-6" required>
                                <label for="student" class="text-xl pl-2">Leerling</label>
                            </div>
                            <div class="flex justify-center items-center">
                                <input type="radio" id="dierenarts" name="role" class="w-6 h-6" value="3">
                                <label for="dierenarts" class="text-xl pl-2">Dierenarts</label>
                            </div>
                            <div class="flex justify-center items-center">
                                <input type="radio" id="leerkracht" name="role" class="w-6 h-6" value="4">
                                <label for="leerkracht" class="text-xl pl-2">Leerkracht</label>
                            </div>
                        </div>

                        <input type="submit" value="Bevestigen" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">
                    </form> 
                </div>

                <div class="flex justify-center items-center">
                    <form action="generateuser" enctype="multipart/form-data" method="post" class="flex justify-center items-center flex-col">
                        @csrf
                        <label for="file" class="text-lg text-center">Upload file</label>
                        <input type="file" name="file" id="file" class="py-4">
                        <button type="submit" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Bestaande gebruikers</h1>
        <div class="flex flex-col">
            <table>
                <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                    <th class="text-xl p-3">Voornaam</th>
                    <th class="border-x-4 border-black text-xl">Achternaam</th>
                    <th class="border-x-4 border-black text-xl">Gebruikersnaam</th>
                    <th class="border-x-4 border-black text-xl">Email</th>
                    <th class="border-x-4 border-black text-xl">Rol</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($users as $data)
                    <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="pl-2">{{$data->firstname}}</td>
                        <td>{{$data->lastname}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->email}}</td>
                            @foreach($roles as $role)
                                @if($role->id == $data->roleid)
                                <td>{{$role->rolename}}</td>
                                @endif
                            @endforeach
    
                        @if($data->id != $userID && $data->username != "admin")
                        <td>
                            <a href="{{url('edituser/'.$data->id)}}"><iconify-icon class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></a>
                        </td>
                        <td>
                            <a href="{{url('deleteuser/'.$data->id)}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a>
                        </td>
    
                        @else
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>