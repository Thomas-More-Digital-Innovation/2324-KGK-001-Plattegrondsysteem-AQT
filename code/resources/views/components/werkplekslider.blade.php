<?php
$clickedName = $id;

$werkplek = DB::table('werkplek')->where('name', $clickedName)->first();
$werkplekId = $werkplek->id;

// Retrieve the list of diersoort based on werkplekid and diersoortid
$dierSoortList = DB::table('dier')
    ->join('diersoort', 'dier.diersoortid', '=', 'diersoort.id')
    ->where('dier.werkplekid', $werkplekId)
    ->get();

echo '<p>Clicked ID: ' . $werkplekId . '</p>';
echo '<p>Animals:</p>';
echo '<ul>';
foreach ($dierSoortList as $dierSoort) {
    $dierSoortId = $dierSoort->diersoortid;
    $dierSoortName = $dierSoort->name;
    $dierSoortLatinName = $dierSoort->latinname;
    // You can access other fields like 'foto' and 'file' here as well
    echo '<li>dierSoortId: ' . $dierSoortId . '</li>';
    echo '<li>Name: ' . $dierSoortName . '</li>';
    echo '<li>Latin Name: ' . $dierSoortLatinName . '</li>';
    // You can include other fields as needed
}
echo '</ul>';

