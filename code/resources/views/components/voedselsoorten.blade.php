<?php
$voedingstype = DB::table('voedingsrichtlijnen')->get();

echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
foreach ($voedingstype as $type) {
    $voedingstypeid = $type->id;
    $voedingstypenaam = $type->name;
    $voedingstypeicon = $type->icon;

    echo "<div class='bg-white shadow-lg p-4 rounded-lg' id='vt" . $voedingstypeid . "'>";
    echo '<h2 class="text-lg font-semibold mb-2">' . $voedingstypenaam . '</h2>';
    if ($voedingstypeicon !== false) {
        echo '<div class="mb-2"><img src="'.$voedingstypeicon.'" class="w-full h-auto rounded-lg" alt="' . $voedingstypenaam . ' Image" /></div>';
    } else {
        echo '<p class="text-red-500">Image: Unable to find image</p>';
    }
    // You can access other fields pke 'foto' and 'file' here as well
    echo '<p>voedingstypeid: ' . $voedingstypeid . '</p>';
    echo '<p>naam: ' . $voedingstypenaam . '</p>';
    echo '<p>icon: ' . $voedingstypeicon . '</p>';

    echo '</div>';
}
echo '</div>';
?>