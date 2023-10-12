@extends('layout')
@section('title', 'menuinventarisadmin')
@section('content')
<x-titlebar title="Admin: Inventaris Select" color="FF7E7E" back=true link="/admin"/>

<div class="w-3/4 mx-auto mb-8 pt-20 flex justify-center items-center space-x-10"> 
    <?php 
    $boxes = [
       [
          'name' => 'Inventaris Beheren',
          'url' => route('inventarisadmin'),
          'icon'=> 'solar:checklist-minimalistic-outline',
       ],
       [
          'name' => 'Lamp Beheren',
          'url' => route('lampadmin'),
          'icon'=> 'lucide:lamp-desk',
       ]
       ];
    ?>

    @foreach ($boxes as $v)
    <a href="{{$v['url']}}" class="mt-20 hover:scale-105 transition duration-150 ease-out hover:ease-in w-40 flex justify-between h-48 items-center flex-col">
        <div class="ring-2 ring-black w-32 bg-gray-200 h-32 flex justify-center items-center rounded-3xl">
            <iconify-icon icon="{{$v['icon']}}" height="100"></iconify-icon>
        </div>
        <h3 class="text-xl text-center font-bold flex-grow mt-3">{{$v['name']}}</h3>
    </a>
    @endforeach
</div>
@endsection
