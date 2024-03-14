<?php
// Assuming you have models for 'Dier', 'Diersoort', 'Werkplek', 'Inventaris', 'Lampkant', 'Lamp', 'Plantgroep', and 'Plant'

use App\Models\Dier;
use App\Models\Diersoort;
use App\Models\Werkplek;
use App\Models\Inventaris;
use App\Models\Lampkant;
use App\Models\Lamp;
use App\Models\Plantgroep;
use App\Models\Plant;

// Retrieve data for dierinventaris
$dierinventaris = Dier::join('diersoort', 'diers.diersoortid', '=', 'diersoort.id')
    ->join('werkplek', 'werkplek.id', '=', 'diers.werkplekid')
    ->get();

// Retrieve data for inventaris with lamps
$inventaris = Inventaris::join('lampkants', 'inventaris.id', '=', 'lampkants.inventarisid')
    ->join('lamps', 'lampkants.lampid', '=', 'lamps.id')
    ->get();

// Retrieve data for inventaris with plants
$planten = Inventaris::join('plantgroeps', 'inventaris.id', '=', 'plantgroeps.inventarisid')
    ->join('plants', 'plantgroeps.plantid', '=', 'plants.id')
    ->get();

// Group plants by inventarisid
$planten = $planten->groupBy('inventarisid');

// Group inventaris by position and inventarisid
$groupedinventaris = $inventaris->mapToGroups(function ($item) {
    return [$item->inventarisid => $item];
})->map(function ($group) {
    return $group->groupBy('position');
});

// Group items per werkplek
$groupedItems = [];
foreach ($dierinventaris as $item) {
    $werkplekid = $item->werkplekid;

    if (!isset($groupedItems[$werkplekid])) {
        $groupedItems[$werkplekid] = [];
    }
    $groupedItems[$werkplekid][$item->diersoortid] = $item;
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
                @foreach ($items as $name => $item)

                    <tr>
                        <td class="border border-black px-4 py-2 text-center">
                            {{ $werkplekid }}
                        </td>
                        <td class="border border-black px-4 py-2 text-center">
                            @php
                                $diersoort = Diersoort::find($name);
                            @endphp
                            {{ $diersoort ? $diersoort->name : 'Unknown Diersoort' }}
                        </td>
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
