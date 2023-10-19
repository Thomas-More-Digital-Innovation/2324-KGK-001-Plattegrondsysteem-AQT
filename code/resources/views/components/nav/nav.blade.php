<nav class="fixed flex bg-nav w-40 top-0 bottom-0 text-white justify-center">
   <ul class="flex flex-col list-none grow">
      <li class="flex grow">
         <a href="{{ route('home') }}" class="flex grow hover:bg-nav-hover">
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="ion:home" height="70"></iconify-icon>
               Home
            </div>
         </a> 
      </li>
      <li class="flex grow">
            <a href="{{ route('inventaris') }}" class="flex grow hover:bg-nav-hover"> 
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="clarity:clipboard-line" height="70"></iconify-icon>
               Inventaris
            </div>
         </a> 
      </li>
      <li class="flex grow">
         <a href="{{ route('protocollen') }}" class="flex grow hover:bg-nav-hover">
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="mingcute:paper-line" height="70"></iconify-icon>
               Protocollen
            </div>
         </a>
      </li>
      <li class="flex grow">
         <a href="{{ route('voederrichtlijnen') }}" class="flex grow hover:bg-nav-hover">
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="icon-park-twotone:circles-and-triangles" height="70"></iconify-icon>
               Voederrichtlijnen
            </div>
         </a>
      </li>
      <li class="flex grow">
        <a href="{{ route('medischeFiche') }}" class="flex grow hover:bg-nav-hover">
           <div class="flex flex-col grow justify-center items-center">
              <iconify-icon icon="solar:medical-kit-linear" height="70"></iconify-icon>
              Medische Fiche
           </div>
        </a>
     </li>
   </ul>
</nav>