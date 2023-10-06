<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="">
                        <label for="fname">First name:</label><br>
                        <input type="text" id="fname" name="fname" placeholder="John" class="text-black"><br>
                        <label for="lname">Last name:</label><br>
                        <input type="text" id="lname" name="lname" placeholder="Doe" class="text-black"><br><br>
                        <input type="submit" value="Submit">
                    </form> 
                </div>

            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        @foreach($users as $data)
                            <tr>
                                <td>{{$data->firstname}}</td>
                                <td>{{$data->lastname}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                <?php
                                    if($data->roleid == 2){
                                        echo 'student';
                                    }
                                    else if ($data->roleid == 4){
                                        echo 'leerkracht';
                                    }
                                ?>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
