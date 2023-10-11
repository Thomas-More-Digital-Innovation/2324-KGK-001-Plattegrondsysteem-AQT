<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="fixed top-16 left-44 z-50" id="error-container">
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <button class="ml-auto px-2 py-1 rounded-md bg-red-500 text-white hover:bg-red-600 focus:outline-none" onclick="hideErrorMessage()"><b>Sluiten</b></button>
                    </div>
                @endif
            </div>
            <div class="p-6">
                <form action="/admin/protocollen/add" method="post">
                    @csrf
                    <label for="name">Naam:</label><br>
                    <input type="text" id="name" name="name" placeholder="Water Verversen" class="text-black" required><br>
                    <label for="protocoltype">Type:</label><br>
                    <select name="protocoltypeid" id="protocoltypeid" class="text-black" required>
                        <?php
                            foreach ($protocoltypes as $type){
                                echo '<option value="'.$type->id.'">'.$type->name.'</option>';
                            }
                        ?>
                    </select><br>
                    <label for="icon">Icon:</label><br>
                    <input type="text" id="icon" name="icon" placeholder="iconify" class="text-black" required><br>
                    <label for="file">File:</label><br>
                    <input type="text" id="file" name="file" placeholder="file path" class="text-black"><br>
                    <input type="submit" value="toevoegen" class="text-green-600 py-2 px-4 rounded">
                </form>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <table>
                    @foreach($protocollen as $protocol)
                        <tr class="pb-5">
                            <td>{{$protocol->name}}</td>
                            <td>
                                <?php
                                    $protocoltype = DB::table('protocoltype')->where('id', $protocol->protocoltypeid)->first();
                                    echo $protocoltype->name;
                                ?>
                            </td>
                            <td>{{$protocol->icon}}</td>
                            <td>{{$protocol->file}}</td>
                            <td>
                                <a href="{{url('/admin/protocollen/edit/'.$protocol->id)}}" class="">aanpassen</a>
                            </td>
                            <td>
                                <a href="{{url('/admin/protocollen/delete/'.$protocol->id)}}" class="text-red-600">verwijderen</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function hideErrorMessage() {
        var errorContainer = document.getElementById('error-container');
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
    }
</script>

