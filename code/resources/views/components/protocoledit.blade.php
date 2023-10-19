<div class="py-12">
    <div class="flex flex-col justify-center items-center py-2">
        <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
            <div class="flex justify-around">
                <div class="flex justify-center">
                    <form action="{{ url('admin/protocollen/update/'.$protocol->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="flex">
                            <div class="flex flex-col">
                                <label for="name" class="text-lg">Naam <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{$protocol->name}}" class="text-black" required>
                            </div>
                            <div class="flex flex-col pl-4 grow">
                                <label for="protocoltype" class="text-lg">Type <span class="text-red-500">*</span></label>
                                <select name="protocoltypeid" id="protocoltypeid" class="text-black" required>
                                    <?php
                                        foreach ($protocoltypes as $type){
                                            if ($type->id == $protocol->protocoltypeid) {
                                                echo '<option value="'.$type->id.'" selected>'.$type->name.'</option>';
                                            } else {
                                                echo '<option value="'.$type->id.'">'.$type->name.'</option>';
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex flex-col">
                                <label for="icon">Icon:</label>
                                <input type="text" id="icon" name="icon" value="{{$protocol->icon}}" class="text-black" required>
                            </div>
                            <div class="flex flex-col pl-4">
                                <label for="file">File:</label>
                                <input type="text" id="file" name="file" value="{{$protocol->file}}" class="text-black">
                            </div>
                        </div>
                        <input type="submit" value="aanpassen" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>