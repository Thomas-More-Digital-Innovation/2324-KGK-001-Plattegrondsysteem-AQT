<?php
$voedselsoort = DB::table('werkplek');

foreach ($voedselsoort as $soort) {
    $voedselid = $soort->id;
    $voedselnaam = $soort->name;
    $voedselicon = $soort->icon;

    // You can access other fields like 'foto' and 'file' here as well
    echo '<li>voedselid: ' . $voedselid . '</li>';
    echo '<li>naam: ' . $voedselnaam . '</li>';
    echo '<li>icon: ' . $voedselicon . '</li>';
}
echo '</ul>';
?>