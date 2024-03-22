<div>
    <x-errorhandler />

    <div id="modal" class="hidden fixed z-10 w-full h-full bg-black bg-opacity-80 left-0 justify-center items-center">
        <div class="bg-white rounded-xl relative shadow-xl py-5 shadow-black">
            <div class="flex justify-center items-center border-b-4 pb-2 border-slate-200">
                <h1 id="modalTitle" class="text-2xl font-bold text-center px-14">Voedselsoorten toevoegen</h1>
                <iconify-icon icon="iconamoon:close" id="closeModal" style="color: red;" width="50" height="50" class="cursor-pointer absolute right-2"></iconify-icon>
            </div>
            <div class="px-4 pt-2 w-[36rem]">
                <form action="addeditvoedselsoort" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-center items-center flex-col">
                    <input type="hidden" id="typesubmit" name="typesubmit" value="add">
                    <input type="hidden" id="id" name="id" value="0">
                    <div class="flex flex-col w-full">
                        <label for="voedselsoort">Voedselsoort <span class="text-red-500">*</span></label>
                        <input type="text" name="voedselsoort" id="voedselsoort" required class="cursor-pointer rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                    </div>
                    <div class="pt-2 flex flex-col w-full">
                        <label for="voedingsrichtlijn">Voedingsrichtlijn <span class="text-red-500">*</span></label>
                        <select name="voedingsrichtlijn" id="voedingsrichtlijn" required class="cursor-pointer rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                            <option value="default" selected>Kies richtlijn</option>
                            @foreach($voedingsRichtlijnen as $richtlijn)
                                <option value="{{$richtlijn->id}}">{{$richtlijn->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-2 flex flex-col w-full">
                        <label for="foto">Foto <span class="text-red-500" id='filename'>*</span></label>
                        <div class="rounded-lg shadow-md items-center max-h-48 max-w-xl">
                            <div id="image-preview" class="p-6 flex h-48 justify-center bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center text-center cursor-pointer">
                                <label for="upload" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload foto</h5>
                                    <p class="font-normal text-sm text-gray-400 md:px-6"><b class="text-gray-600">JPG, PNG, or GIF</b> formaat.</p>
                                </label>
                            </div>
                            <input id="upload" type="file" name="upload" class="hidden" accept="image/*" />
                        </div>
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
                <th class="text-xl">Voedselsoort</th>
                <th class="border-x-4 border-black text-xl">Voedingsrichtlijn</th>
                <th class="border-x-4 border-black text-xl">Foto</th>
                <th></th>
                <th><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="cursor-pointer p-2 flex grow justify-center items-center"></iconify-icon></th>
            </tr>
                @foreach($voedingsType as $v)
                <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                    <td class="pl-2">{{$v->name}}</td>
                    @foreach($voedingsRichtlijnen as $richtlijn)
                        @if($richtlijn->id == $v->voedingsrichtlijnid)
                        <td>{{$richtlijn->name}}</td>
                        @endif
                    @endforeach
                    <td class="flex justify-center items-center"><img src="{{$v->icon}}" alt="Foto" width="100"></td>
                    <td><iconify-icon id="edit/{{$v->id}}/{{$v->name}}/{{$v->voedingsrichtlijnid}}/{{$v->icon}}" class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></td>
                    <td><a href="{{url('deletevoedselsoort/'.$v->id)}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
<script src="/resources/js/voedselsoortentabel.js"></script>