@vite(['resources/js/werkplek.js'])

<?php
$clickedName = $id;

$werkplek = DB::table('werkplek')->where('name', $clickedName)->first();
$werkplekId = $werkplek->id;
    
$dierSoortList = DB::table('dier')
    ->join('diersoort', 'dier.diersoortid', '=', 'diersoort.id')
    ->where('dier.werkplekid', $werkplekId)
    ->get();


echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">';
foreach ($dierSoortList as $dierSoort) {
    $dierSoortId = $dierSoort->diersoortid;
    $dierSoortName = $dierSoort->name;
    $dierSoortLatinName = $dierSoort->latinname;
    $imageData = $dierSoort->foto;

    echo "<div class='bg-white shadow-lg p-4 rounded-lg' id='ds" . $dierSoortId . "'>";
    echo '<h2 class="text-lg font-semibold mb-2">' . $dierSoortName . '</h2>';
    echo '<p class="text-gray-600 mb-2">Latin Name: ' . $dierSoortLatinName . '</p>';
phpinfo();
    $imageResource = imagecreatefromstring($imageData);

    if ($imageResource !== false) {
        echo '<div class="mb-2"><img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" class="w-full h-auto rounded-lg" alt="' . $dierSoortName . ' Image" /></div>';
    } else {
        echo '<p class="text-red-500">Image: Unable to create image from binary data</p>';
    }
    
    echo '</div>';
}
echo '</div>';