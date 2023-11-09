@extends('layout')
@section('title', 'adminplantaanmaken')
@section('content')
<x-titlebar title="Admin: Plant Aanmaken" color="FF7E7E" back=true link="/inventarisselect"/>
<x-errorhandler />
<div class="h-screen pt-14 flex flex-col">
   <div class="flex justify-between h-3/6 overflow-scroll">
      <div class="w-3/6">
         <h1 class="text-center text-2xl p-2 bg-slate-200 border-y-4 border-r-2 border-black">Nieuwe plant aanmaken</h1>
         <div class="flex flex-col justify-center items-center py-2">
            <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
               <div class="flex justify-around">
                  <div class="flex justify-center">
                     <form method="POST" action="{{ route('plantadmin.make') }}">
                        @csrf
                        <div class="flex flex-col">
                           <label for="naam" class="text-lg">Naam nieuwe plant</label>
                           <input type="text" name="naam" id="naam" class="rounded-lg" required>
                        </div>
                        <button type="submit" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">Aanmaken</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="w-3/6">
         <h1 class="text-center text-2xl p-2 bg-slate-200 border-y-4 border-l-2 border-black">Bestaande planten</h1>
         <table class="w-full">
            <thead>
               <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                  <th class="text-xl">ID</th>
                  <th class="border-x-4 border-black text-xl">Name</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach($plant->sortByDesc('id') as $item)
               <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                  <td class="p-6">{{ $item->id }}</td>
                  <td>{{ $item->plantname }}</td>
                  <td><a href="{{url('deleteplant/'.$item->id)}}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
   <div class="bg-black h-1.5"></div>
   <div class="flex justify-between h-3/6 overflow-scroll">
      <div class="w-3/6 flex flex-col items-center">
         <h1 class="text-center text-2xl p-2 bg-slate-200 border-b-4 border-r-2 border-black w-full">Plant linken</h1>
         <div class="flex flex-col justify-center items-center py-2 w-4/5">
            <div class="bg-slate-200 p-2 px-4 rounded-lg m-2">
               <div class="flex justify-around">
                  <div class="flex justify-center">
                     <form method="POST" action="{{ route('plantadmin.koppel') }}">
                        @csrf
                        <label for="plants" class="text-xl">Selecteer planten</label>
                        <div class="flex flex-wrap justify-between">
                           @foreach($plant as $pl)
                           <div class="flex items-center w-3/6"> 
                              <input type="checkbox" name="plants[]" class="rounded" id="plants_{{ $pl->id }}" value="{{ $pl->id }}">
                              <label class="px-2" for="plants_{{ $pl->id }}">{{ $pl->plantname }}</label>
                           </div>
                           @endforeach
                        </div>
                        <label for="inventaris" class="text-xl">Selecteer inventaris</label>
                        <select name="inventaris" id="inventaris" class="rounded-lg">
                           @foreach($inventaris as $inv)
                           <option value="{{ $inv->id }}">{{ $inv->id }}</option>
                           @endforeach
                        </select>
                        <button type="submit" class="w-full bg-nav text-white hover:bg-nav-hover rounded-lg p-2 text-lg mt-2">Koppel Planten</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="w-3/6">
         <h1 class="text-center text-2xl p-2 bg-slate-200 border-b-4 border-l-2 border-black">Bestaande links</h1>
         <table class="w-full">
            <thead>
               <tr class="border-b-4 border-black bg-nav bg-opacity-20">
                  <th class="text-xl">Inventaris ID</th>
                  <th class="border-x-4 border-black text-xl">Plant Name</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @foreach($plantinventaris as $collection)
                  @foreach($collection as $item)
                     <tr class="border-y-4 border-slate-300 odd:bg-slate-100 hover:bg-slate-300">
                        <td class="p-6">{{ $item->inventarisid }}</td>
                        <td>{{ $item->plantname }}</td>
                        <td><a href="{{ url('deleteplantkoppel/' . $item->plantid . '/' . $item->inventarisid) }}" class="flex grow justify-center items-center"><iconify-icon icon="mdi:trashcan-outline" style="color: red;" width="40" height="40"></iconify-icon></a></td>
                     </tr>
                  @endforeach
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
