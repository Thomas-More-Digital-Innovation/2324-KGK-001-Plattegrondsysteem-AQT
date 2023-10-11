<div class="flex justify-center content-start flex-wrap h-screen pt-14">
   <?php 
      $boxes = [
         [
            'name' => 'Gebruikers',
            'url' => route('students'),
            'icon'=> 'mdi:user',
         ],
         [
            'name' => 'Protocollen',
            'url' => route('protocoladmin'),
            'icon'=> 'solar:checklist-minimalistic-outline',
         ],
         [
            'name' => 'Dier',
            'url' => '/admin',
            'icon'=> 'cil:animal',
         ],
         [
            'name' => 'Diersoort',
            'url' => '/admin',
            'icon'=> 'fluent-emoji-high-contrast:lizard',
         ],
         [
            'name' => 'Werkplaatsen',
            'url' => route('werkplaatsadmin.index'),
            'icon'=> 'material-symbols:work-outline',
         ],
         [
            'name' => 'Inventaris',
            'url' => '/admin',
            'icon'=> 'material-symbols:inventory-2-outline',
         ],
         [
            'name' => 'Voederrichtlijnen',
            'url' => route('voederrichtlijnenadmin'),
            'icon'=> 'mdi:fish-food',
         ],
         [
            'name' => 'voedselsoorten',
            'url' => route('voedselsoorten'),
            'icon' => 'game-icons:steak',
         ],
         [
            'name' => 'Medischefiche',
            'url' => '/admin',
            'icon'=> 'game-icons:medicines',
         ], 
         [
            'name' => 'Opvolging',
            'url' => route('opvolgingadmin'),
            'icon'=> 'mdi:todo-add',
         ],
         [
            'name' => 'Logboek',
            'url' => '/admin',
            'icon'=> 'octicon:log-16',
         ],
      ];
   ?>
      @foreach ($boxes as $v)
         <a href="{{$v['url']}}" class="hover:scale-105 transition duration-150 ease-out hover:ease-in my-5 mx-3 w-40 flex justify-between h-48 items-center flex-col">
            <div class="ring-2 ring-black w-32 bg-gray-200 h-32 flex justify-center items-center rounded-3xl">
               <iconify-icon icon="{{$v['icon']}}" height="100"></iconify-icon>
            </div>
            <h3 class="text-xl text-center font-bold flex grow">{{$v['name']}}</h3>
         </a>
      @endforeach
</div>