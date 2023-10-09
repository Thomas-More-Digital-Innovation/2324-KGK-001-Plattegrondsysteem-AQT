<div class="flex justify-center content-start flex-wrap h-screen pt-14">
   <?php 
   $details = DB::table('protocoldetail')->where("protocoltypeid",$id)->get();
      foreach ($details as $v) {
         ?>
         <a href="/protocolinfo?id={{$v->id}}&t={{$v->name}}&c={{$color}}" class=" hover:scale-105 transition duration-150 ease-out hover:ease-in my-5 mx-3 w-40 flex justify-between h-48 items-center flex-col">
            <div class="ring-2 ring-black w-32 bg-gray-200 h-32 flex justify-center items-center rounded-3xl">
               <iconify-icon icon="{{$v->icon}}" height="100"></iconify-icon>
            </div>
            <h3 class="text-xl text-center font-bold flex grow">{{$v->name}}</h3>
         </a>
         <?php 
      };
   ?>
</div>