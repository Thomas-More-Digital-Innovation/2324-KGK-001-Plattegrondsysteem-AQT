@vite(['resources/js/opvolgingtabel.js'])
<div>
   <div id="modal" class="hidden fixed z-10 w-full h-full bg-black bg-opacity-80 left-0 justify-center items-center">
      <div class="bg-white rounded-xl relative shadow-xl py-5 shadow-black">
         <div class="flex justify-center items-center border-b-4 pb-2 border-slate-200">
            <h1 class="text-2xl font-bold text-center">Protocol linken</h1>
            <iconify-icon icon="iconamoon:close" id="closeModal" style="color: red;" width="50" height="50" class="absolute right-2"></iconify-icon>
         </div>
         <div class="px-4 pt-2">
            <form action="addopvolging" method="POST">
               @csrf
               <div class="flex justify-center items-center flex-col">
                  <div class="flex flex-col w-full">
                     <label for="protocolselect">Protocol <span class="text-red-500">*</span></label>
                     <select id="protocolselect" name="protocolselect" required class="rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                        <option value='default' disabled selected>Kies protocol</option>
                        @foreach ($protocoldetail as $p)
                        <option value={{$p->protocoldetailid}}>{{$p->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="pt-2 flex flex-col w-full">
                     <label for="diersoortselect">Diersooort <span class="text-red-500">*</span></label>
                     <select id="diersoortselect" name="diersoortselect" required class="grow rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                        <option value='default' disabled selected>Kies diersoort</option>
                        {{$old = null}}
                        @foreach ($diersoort as $d)
                           @if ($d->diersoortid != $old)
                              <option value={{$d->diersoortid}}>{{$d->name}}</option>
                              {{$old = $d->diersoortid}}
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
            <th><iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="p-2 flex grow justify-center items-center"></iconify-icon></th>
         </tr>
            @foreach ($protocoldetail as $p)
               <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                  @foreach ($diersoort as $d)
                     @if (($p->protocoldetailid == $d->protocoldetailid) && ($p->diersoortid == $d->diersoortid))
                        <td class="p-6">{{$p->name}}</td>
                        <td>{{$d->name}}</td>
                        <td><a href="#" class="h-full flex grow justify-center items-center"><iconify-icon icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></a></td>
                        <td><a href="deleteopvolging/{{$p->protocoldetailid}}/{{$d->diersoortid}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                     @endif
                  @endforeach
               </tr>
            @endforeach
      </table>
   </div>
</div>