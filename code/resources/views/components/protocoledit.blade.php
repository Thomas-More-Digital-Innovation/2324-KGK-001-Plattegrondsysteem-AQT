<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ url('admin/protocollen/update/'.$protocol->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Naam:</label><br>
                    <input type="text" id="name" name="name" value="{{$protocol->name}}" class="text-black" required><br>
                    <label for="protocoltype">Type:</label><br>
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
                    </select><br>
                    <label for="icon">Icon:</label><br>
                    <input type="text" id="icon" name="icon" value="{{$protocol->icon}}" class="text-black" required><br>
                    <label for="file">File:</label><br>
                    <input type="text" id="file" name="file" value="{{$protocol->file}}" class="text-black"><br>
                    <input type="submit" value="aanpassen" class="text-green-600 py-2 px-4 rounded">
                </form>
            </div>
        </div>
    </div>
</div>