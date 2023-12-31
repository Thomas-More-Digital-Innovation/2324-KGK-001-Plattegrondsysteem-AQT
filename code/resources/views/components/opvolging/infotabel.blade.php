<div>
    <x-errorhandler />
    <div id="modal" class="hidden fixed z-10 w-full h-full bg-black bg-opacity-80 left-0 justify-center items-center">
        <div class="bg-white rounded-xl relative shadow-xl py-5 shadow-black">
            <div class="flex justify-center items-center border-b-4 pb-2 border-slate-200">
                <h1 id="modalTitle" class="text-2xl font-bold text-center">Protocol linken</h1>
                <iconify-icon icon="iconamoon:close" id="closeModal" style="color: red;" width="50" height="50" class="cursor-pointer absolute right-2"></iconify-icon>
            </div>
            <div class="px-4 pt-2">
                <form action="addeditopvolging" method="POST">
                @csrf
                <div class="flex justify-center items-center flex-col">
                    <input type="hidden" id="oldps" name="oldps" value="default">
                    <input type="hidden" id="oldds" name="oldds" value="default">
                    <input type="hidden" id="typesubmit" name="typesubmit" value="add">
                    <div class="flex flex-col w-full">
                        <label for="protocolselect">Protocol <span class="text-red-500">*</span></label>
                        <select id="protocolselect" name="protocolselect" required class="cursor-pointer rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                            <option value='default' disabled selected>Kies protocol</option>
                            @foreach ($protocols as $p)
                            <option value={{$p->id}}>{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-2 flex flex-col w-full">
                        <label for="diersoortselect">Diersooort <span class="text-red-500">*</span></label>
                        <select id="diersoortselect" name="diersoortselect" required class="cursor-pointer grow rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                            <option value='default' disabled selected>Kies diersoort</option>
                            {{$old = null}}
                            @foreach ($diersoorten as $d)
                            @if ($d->id != $old)
                                <option value={{$d->id}}>{{$d->name}}</option>
                                {{$old = $d->id}}
                            @endif
                            @endforeach
                        </select>
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
                <th class="text-xl">Protocol</th>
                <th class="border-x-4 border-black text-xl">Diersoort</th>
                <th></th>
                <th><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="cursor-pointer p-2 flex grow justify-center items-center"></iconify-icon></th>
            </tr>
                @foreach ($protocoldetail as $p)
                <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                    @foreach ($diersoort as $d)
                        @if (($p->protocoldetailid == $d->protocoldetailid) && ($p->diersoortid == $d->diersoortid))
                            <td class="p-6">{{$p->name}}</td>
                            <td>{{$d->name}}</td>
                            <td><iconify-icon id="editopvolging/{{$p->protocoldetailid}}/{{$d->diersoortid}}" class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></td>
                            <td><a href="deleteopvolging/{{$p->protocoldetailid}}/{{$d->diersoortid}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
        </table>
    </div>
</div>
<script src="/resources/js/opvolgingtabel.js"></script>