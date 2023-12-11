<h1 class="font-bold text-3xl h-14 border-b-2 border-black flex justify-center items-center p-2" style="background-color:#b9fbc0;"> Werkplek {{ $werkplekId }} </h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
@foreach ($dierSoortList as $dierSoort) 
    @php
    $dierid = $dierSoort->id;
    $dierSoortId = $dierSoort->diersoortid;
    $dierSoortName = $dierSoort->name;
    $dierSoortLatinName = $dierSoort->latinname;
    $imagePath = $dierSoort->foto;
    $quarantaine = $dierSoort->quarantaine;
    @endphp
    @if ($quarantaine == 0) 
        <div class='bg-white shadow-lg p-4 rounded-lg' id='ds{{ $dierid }}'>
    @else 
        <div class='shadow-lg p-4 rounded-lg' id='ds{{ $dierid }}' style='background-color: yellow;'>
    @endif
    <h2 class="text-lg font-semibold mb-2">{{$dierSoortName}}</h2>
    <p class="text-gray-600 mb-2">Latin Name: {{$dierSoortLatinName}}</p>
    @if ($imagePath !== false) 
        <div class="mb-2"><img src="{{$imagePath}}" class="w-full h-auto rounded-lg" alt="{{$dierSoortName}} Image" /></div>
    @else 
        <p class="text-red-500">Image: Unable to find image</p>
    @endif
    
</div>
@endforeach
</div>
<script src="/2324-KGK-001-Plattegrondsysteem-AQT/code/resources/js/werkplek.js"></script>