<div class="h-screen pt-14">
    <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Nieuw protocol aanmaken</h1>
    <div class="flex flex-col justify-center items-center py-2">
        <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
            <div class="flex justify-around">
                <div class="flex justify-center">
                    <form action="/admin/protocollen/add" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex">
                            <div class="flex flex-col">
                                <label for="name" class="text-lg">Naam <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" placeholder="Water Verversen" class="text-black" required>
                            </div>
                            <div class="flex flex-col pl-4 grow">
                                <label for="protocoltype" class="text-lg">Type <span class="text-red-500">*</span></label>
                                <select name="protocoltypeid" id="protocoltypeid" class="text-black" required>
                                <?php
                                foreach ($protocoltypes as $type){
                                    echo '<option value="'.$type->id.'">'.$type->name.'</option>';
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex flex-col">
                                <label for="icon" class="text-lg">Icon <span class="text-red-500">*</span></label>
                                <input type="text" id="icon" name="icon" placeholder="iconify" class="text-black" required>
                            </div>
                            <div class="flex flex-col pl-4">
                                <label for="file" class="text-lg">File <span class="text-red-500">*</span></label>
                                <input type="file" id="file" name="file" required class="text-black">
                            </div>
                        </div>
                        <div class="flex">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-lg p-2 text-lg mt-2" target="_blank" href="https://icon-sets.iconify.design/">Iconify</a>
                            <a class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-lg p-2 text-lg mt-2" target="_blank" href="https://youtu.be/kQrvlkKr4is?feature=shared">?</a>
                            <input type="submit" value="toevoegen" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2 ml-2">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <h1 class="text-center text-2xl p-4 bg-slate-200 border-y-4 border-black">Bestaande protcollen</h1>
    
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="flex flex-col">
                <table>
                    <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                        <th class="text-xl p-3">Protocol</th>
                        <th class="border-x-4 border-black text-xl">Type</th>
                        <th class="border-x-4 border-black text-xl">Icoon</th>
                        <th class="border-x-4 border-black text-xl">File</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($protocollen as $protocol)
                        <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                            <td class="pl-2">{{$protocol->name}}</td>
                            <td class="px-6">
                                <?php
                                    $protocoltype = DB::table('protocoltype')->where('id', $protocol->protocoltypeid)->first();
                                    echo $protocoltype->name;
                                ?>
                            </td>
                            <td>{{$protocol->icon}}</td>
                            <td>{{$protocol->file}}</td>
                            <td>
                                <a href="{{url('/admin/protocollen/edit/'.$protocol->id)}}" class=""><iconify-icon class="cursor-pointer h-full flex grow justify-center items-center" icon="material-symbols:edit-outline" style="color: blue;" width="40" height="40"></iconify-icon></a>
                            </td>
                            <td>
                                <a href="{{url('/admin/protocollen/delete/'.$protocol->id)}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>