<?php
$dierinventaris = DB::table('dier')
    ->join('diersoort', 'dier.diersoortid', '=', 'diersoort.id')
    ->join('werkplek', 'werkplek.id', '=', 'dier.werkplekid')
    ->get();

$inventaris = DB::table('inventaris')
    ->join('lampkant', 'inventaris.id', '=', 'lampkant.inventarisid')
    ->join('lamp', 'lampkant.lampid', '=', 'lamp.id')
    ->get();


$planten = DB::table('inventaris')
    ->join('plantgroep', 'inventaris.id', '=', 'plantgroep.inventarisid')
    ->join('plant', 'plantgroep.plantid', '=', 'plant.id')
    ->get();
$planten = $planten->groupBy('inventarisid');
    // groepering van gejoinde data op basis van position & inventarisid
    $groupedinventaris = $inventaris->mapToGroups(function ($item) {          //map to groups is een collectiemethode van laravel zelf om data te gaan groeperen
        return [$item->inventarisid => $item];                
    })->map(function ($group) {                                               // met map kunnen we data verder groeperen        
        return $group->groupBy('position');
    });
// items groeperen per werkplek
$groupedItems = [];
// checken of werkplek al in array zit, anders aanmaken
foreach ($dierinventaris as $item) {
    $werkplekid = $item->werkplekid;

    if (!isset($groupedItems[$werkplekid])) {
        $groupedItems[$werkplekid] = [];
    }
    $groupedItems[$werkplekid][$item->latinname] = $item;
}  
?>

<h1 class="font-bold text-3xl h-14 border-b-2 border-black flex justify-center items-center p-2" style="background-color:#FF7ECC;"> Inventaris </h1>
<div class="w-full px-4">
    <table class="mt-10 w-full border-collapse px-4 py-2">
        <thead>
            <tr>
                <th class="border border-black px-4 py-2 text-xl">Werkplek</th>
                <th class="border border-black px-4 py-2 text-xl">Diersoort</th>
                <th class="border border-black px-4 py-2 text-xl">Lamp Links</th>
                <th class="border border-black px-4 py-2 text-xl">Lamp Rechts</th>
                <th class="border border-black px-4 py-2 text-xl">Planten</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedItems as $werkplekid => $items)
                @foreach ($items as $latinname => $item)
                    <tr>
                        <td class="border border-black px-4 py-2 text-center">{{ $werkplekid }}</td>
                        <td class="border border-black px-4 py-2 text-center">{{ $latinname }}</td>
                        <td class="border border-black px-4 py-2 text-center">
                            @php
                                $lampLinks = $groupedinventaris[$item->inventarisid]['links'] ?? [];
                            @endphp
                            @foreach ($lampLinks as $lamp)
                                {{ $lamp->name }}<br>
                            @endforeach
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            @php
                                $lampRechts = $groupedinventaris[$item->inventarisid]['rechts'] ?? [];
                            @endphp
                            @foreach ($lampRechts as $lamp)
                                {{ $lamp->name }}<br>
                            @endforeach
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            @php
                                $plantenForWerkplek = $planten->get($werkplekid, collect());
                            @endphp
                            @foreach ($plantenForWerkplek as $plant)
                                {{ $plant->plantname }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
    