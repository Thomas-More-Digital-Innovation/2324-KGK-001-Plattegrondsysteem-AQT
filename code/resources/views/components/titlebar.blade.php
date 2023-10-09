<h1 class="font-bold fixed left-0 right-0 text-3xl h-14 border-b-2 border-black flex justify-center items-center p-2 ms-40" style="background-color:#{{$color}};">
   @if ($back)
      <a href="{{url()->previous()}}" class="fixed left-0 ms-40 flex justify-center items-center"><iconify-icon icon="mingcute:arrow-left-fill" width="50" height="50"></iconify-icon></a>
   @endif
   {{$title}}
</h1>