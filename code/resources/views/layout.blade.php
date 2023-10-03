<!DOCTYPE html>
<html lang="nl">
<head>
   @include('head')
</head>
<body>
   @include('components.nav.nav')
   <div class="px-40">
      @yield('content')
   </div>
</body>
</html>