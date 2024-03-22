<?php
use App\Models\VoedingsType;
use App\Models\VoedingsRichtlijnen;

$idtrim = trim($id, 'vt');

$voedingstype = VoedingsType::where('voedingstype.voedingsrichtlijnid', "=", $idtrim)->get();
$voedingsname = VoedingsRichtlijnen::where('id', $idtrim)->first();
?>

<x-titlebar title='{{$voedingsname->name}}' color='{{$voedingsname->color}}' back=true link='./voederrichtlijnen'/>
<div class="flex items-center justify-center pt-14">
    <div class="flex flex-wrap justify-center h-48">
    @foreach ($voedingstype as $voeding)
        <div class="m-5">
            <img src={{$voeding->icon}} alt="Icon" class="h-40">
            <p class="text-center p-2" style="background-color:#{{$voedingsname->color}};">{{$voeding->name}}</p>
        </div>
    @endforeach
    </div>
</div>