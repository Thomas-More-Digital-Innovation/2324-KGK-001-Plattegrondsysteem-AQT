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
                    <form action="addUser" method="post">
                        @csrf
                        <label for="firstname">First name:</label><br>
                        <input type="text" id="firstname" name="firstname" placeholder="John" class="text-black" required><br>
                        <label for="lastname">Last name:</label><br>
                        <input type="text" id="lastname" name="lastname" placeholder="Doe" class="text-black" required><br><br>

                        <input type="radio" id="student" name="role" value="2">
                        <label for="student">student</label><br>
                        <input type="radio" id="dierenarts" name="role" value="3">
                        <label for="dierenarts">dierenarts</label><br>
                        <input type="radio" id="leerkracht" name="role" value="4">
                        <label for="leerkracht">leerkracht</label><br>

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
                                    else if ($data->roleid == 3){
                                        echo 'dierenarts';
                                    }
                                    else if($data->roleid ==4){
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
