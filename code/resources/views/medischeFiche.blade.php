<?php
$roleid =Auth()->user()->roleid;
?>

@extends('layout')
@section('title', 'Dierensoorten')
@section('content')
<script src="/2324-KGK-001-Plattegrondsysteem-AQT//code/resources/js/medischefiche.js"></script>
    <h1 class="font-bold text-3xl h-14 border-b-2 border-black flex justify-center items-center p-2" style="background-color:#FF7E7E;"> Medische Fiche </h1>
    <div>
        <div id="modal" class="hidden fixed z-10 w-full h-full bg-black bg-opacity-80 left-0 justify-center items-center">
            <div class="bg-white rounded-xl relative shadow-xl py-5 shadow-black">
                <div class="flex justify-center items-center border-b-4 pb-2 border-slate-200">
                    <h1 id="modalTitle" class="text-2xl font-bold text-center">Fiche toevoegen</h1>
                    <iconify-icon icon="iconamoon:close" id="closeModal" style="color: red;" width="50" height="50" class="cursor-pointer absolute right-2"></iconify-icon>
                </div>
                <div class="px-4 pt-2">
                    <form action="fichesubmit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center flex-col">
                        <input type="hidden" id="typesubmit" name="typesubmit" value="add">
                        <div class="flex flex-col w-full">
                            <label for="dataselect">Datum Bezoek<span class="text-red-500">*</span></label>
                            <input id="date" type="text" name="date" placeholder="bv. 17/10/2023" class="cursor-pointer rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset hover:bg-black hover:bg-opacity-5 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-nav">
                        </div>

                        </div>
                        <div class="pt-2 flex flex-col w-full"> 
                            <label for="dataselect">Bestand<span class="text-red-500">*</span></label>
                            <input id="file" type="file" name="file" accept="application/pdf">
                        </div>
                        <button type="submit" id="submitModal" disabled class="cursor-pointer mt-2 rounded-md bg-red-500 hover:bg-red-400 px-3 py-2 text-white shadow-sm">Toevoegen</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>           
        <div class="flex flex-col">
            <table>
                <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                    <th class="text-xl">Datum bezoek</th>
                    <th class="border-x-4 border-black text-xl">Bestand</th>
                    @if($roleid==4)
                    <th></th>    
                    @endif
                    <th>
                        @if($roleid==4 || $roleid==3)
                            <iconify-icon icon="gala:add" width="40" height="40" style="color: darkgreen;" id="openModal" class="cursor-pointer p-2 flex grow justify-center items-center"></iconify-icon>
                        @endif
                    </th>                </tr>
                    @foreach ($medischefiche as $fiche)
                    <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="p-6">{{ $fiche->date }}</td>
                        <td class="p-6">{{ $fiche->file }}</td>                    
                        <td ><a href="/{{ $fiche->file }}"><iconify-icon class="cursor-pointer h-full flex grow justify-center items-center" icon="mdi:eye" style="color: blue;" width="40" height="40"></iconify-icon></a></td>
                        @if($roleid==4)
                        <td>
                            <a href="/fichedelete/{{$fiche->id}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>     
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>