<div class="flex justify-center items-center flex-wrap h-screen pt-14">
   @php
      $boxes = [
         [
            'name' => 'Toevoegen',
            'url' => '#',
            'icon'=> 'zondicons:add-outline',
            'color' => '6bff8b',
         ],
         [
            'name' => 'Edit',
            'url' => '#',
            'icon'=> 'ant-design:edit-outlined',
            'color' => 'b36bff',
         ],
         [
            'name' => 'Verwijderen',
            'url' => '#',
            'icon'=> 'mdi:trashcan-outline',
            'color' => 'ff6b6b',
         ],
      ];
   @endphp
   @foreach ($boxes as $v)
      <a href="{{$v['url']}}" class="hover:scale-105 transition duration-150 ease-out hover:ease-in my-5 mx-32 flex justify-center items-center flex-col">
         <div class="ring-2 ring-black w-72 h-72 flex justify-center items-center rounded-3xl" style="background-color:#{{$v['color']}};">
            <iconify-icon icon="{{$v['icon']}}" height="200"></iconify-icon>
         </div>
         <h3 class="text-xl text-center font-bold flex grow">{{$v['name']}}</h3>
      </a>
   @endforeach
</div>