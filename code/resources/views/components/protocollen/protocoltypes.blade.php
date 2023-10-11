<div class="flex justify-center items-center flex-wrap h-screen pt-14">
   <?php 
      $types = json_decode(DB::table('protocoltype')->get());
      foreach ($types as $v) {
         ?>
         <a href="/protocoltype?id={{$v->id}}&t={{$v->name}}&c={{$v->color}}" class="hover:scale-105 transition duration-150 ease-out hover:ease-in my-5 mx-32 flex justify-center items-center flex-col">
            <div class="ring-2 ring-black w-72 h-72 flex justify-center items-center rounded-3xl" style="background-color:#{{$v->color}};">
               <iconify-icon icon="{{$v->icon}}" height="200" width="200"></iconify-icon>
            </div>
            <h3 class="text-3xl text-center font-bold flex grow">{{$v->name}}</h3>
         </a>
         <?php 
      };
   ?>
</div>