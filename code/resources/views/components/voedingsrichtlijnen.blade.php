{{-- <div class="h-screen pt-14">
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
</div> --}}

@vite(['resources/js/voedingsrichtlijnentabel.js'])
<div>
    <x-errorhandler />

    <div id="modal" class="hidden fixed z-10 w-full h-full bg-black bg-opacity-80 left-0 justify-center items-center">
        <div class="bg-white rounded-xl relative shadow-xl py-5 shadow-black">
            <div class="flex justify-center items-center border-b-4 pb-2 border-slate-200">
                <h1 id="modalTitle" class="text-2xl font-bold text-center px-14">Voedingsrichtlijn toevoegen</h1>
                <iconify-icon icon="iconamoon:close" id="closeModal" style="color: red;" width="50" height="50" class="cursor-pointer absolute right-2"></iconify-icon>
            </div>
            <div class="px-4 pt-2">
                <form action="addeditvoedingsrichtlijn" method="POST">
                @csrf
                <div class="flex justify-center items-center flex-col">
                    <input type="hidden" id="typesubmit" name="typesubmit" value="add">
                    <input type="hidden" id="id" name="id" value="0">
                    <div class="flex flex-col w-full">
                        <label for="name">Naam <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" required class="cursor-pointer rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                    </div>
                    <div class="pt-2 flex flex-col w-full">
                        <label for="icon">Icoon <span class="text-red-500">*</span></label>
                        <input type="text" name="icon" id="icon" required class="cursor-pointer rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                        <a style="display: inline-block; padding: 6px 12px; background-color: #3498db; color: #fff; font-weight: bold; font-size: 14px; border-radius: 8px; text-decoration: none; margin-top: 10px;" href="https://icon-sets.iconify.design/">Iconify</a>
                    </div>                    
                    <div class="pt-2 flex flex-col w-full">
                        <label for="color">Kleur <span class="text-red-500">*</span></label>
                        <input type="color" name="color" id="color" required class="w-full cursor-pointer rounded-md border-0 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                    </div>
                    <button type="submit" id="submitModal" disabled class="cursor-pointer mt-2 rounded-md bg-red-500 hover:bg-red-400 px-3 py-2 text-white shadow-sm">Toevoegen</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="flex pt-14 flex-col">
        <table>
            <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                <th class="text-xl">Naam</th>
                <th class="border-x-4 border-black text-xl">Icoon</th>
                <th class="border-x-4 border-black text-xl">Kleur</th>
                <th></th>
                <th><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="cursor-pointer p-2 flex grow justify-center items-center"></iconify-icon></th>
            </tr>
                @foreach ($voedingsRichtlijnen as $v)
                <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                    <td class="pl-2">{{$v->name}}</td>
                    <td class="p-3 flex justify-center flex-col grow items-center"><iconify-icon icon="{{$v->icon}}" height="50"></iconify-icon></td>
                    <td style="background-color:#{{$v->color}};"></td>
                    <td><iconify-icon id="edit/{{$v->id}}/{{$v->name}}/{{$v->icon}}/{{$v->color}}" class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></td>
                    <td><a href="{{url('deletevoedingsrichtlijn/'.$v->id)}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                </tr>
                @endforeach
        </table>
    </div>
</div>