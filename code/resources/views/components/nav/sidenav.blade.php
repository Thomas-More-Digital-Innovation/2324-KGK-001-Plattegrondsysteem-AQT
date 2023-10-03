<nav class="fixed flex bg-nav w-40 h-3/6 top-0 right-0 text-white justify-center rounded-bl-3xl">
   <ul class="flex flex-col list-none grow">
      <li class="flex grow">
         <a href="#" class="flex grow hover:bg-nav-hover">
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="mdi:account-box" height="70"></iconify-icon>
               Account
            </div>
         </a>
      </li>
      <li class="flex grow">
         <a href="{{ route('logout') }}" class="flex grow hover:bg-nav-hover" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="tabler:logout" height="70"></iconify-icon>
               Afmelden
            </div>
         </a>
      </li>
      <li class="flex grow">
         <a href="#" class="flex grow hover:bg-nav-hover rounded-bl-3xl">
            <div class="flex flex-col grow justify-center items-center">
               <iconify-icon icon="material-symbols:admin-panel-settings-outline-rounded" height="70"></iconify-icon>
               Admin
            </div>
         </a>
      </li>
   </ul>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
   </form>
</nav>