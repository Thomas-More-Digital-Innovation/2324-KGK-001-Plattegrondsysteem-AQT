<div class="flex justify-center items-center flex-wrap h-screen pt-14">
    <?php
        $voedingstype = DB::table('voedingsrichtlijnen')->get();
        foreach ($voedingstype as $type) {
            ?>
                <a href="/voedsel?id={{$type->id}}" class="hover:scale-105 transition duration-150 ease-out hover:ease-in my-5 mx-32 flex justify-center items-center flex-col">
                    <div class="ring-2 ring-black w-72 h-72 flex justify-center items-center rounded-3xl" style="background-color:#{{$type->color}};">
                        <iconify-icon icon="{{$type->icon}}" height="200" width="200"></iconify-icon>
                    </div>
                    <h3 class="text-3xl text-center font-bold flex grow">{{$type->name}}</h3>
                </a>
            <?php
        }
    ?>
</div>