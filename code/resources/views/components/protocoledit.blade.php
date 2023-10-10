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
                        {{-- <option value="$protocoltypeid">$protocoltypename</option> --}}
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select><br>
                    <label for="icon">Icon:</label><br>
                    <input type="text" id="icon" name="icon" value="{{$protocol->icon}}" class="text-black" required><br>
                    <label for="file">File:</label><br>
                    <input type="text" id="file" name="file" alue="{{$protocol->file}}" class="text-black"><br>
                    <input type="submit" value="aanpassen" class="text-green-600 py-2 px-4 rounded">
                </form>
            </div>
        </div>
    </div>
</div>