<?php

$voedingstype = DB::table('voedingstype')
    ->where('voedingstype.voedingsrichtlijnid', "=", 1) //id binnenhalen 
    ->get();

$voedingsname = DB::table('voedingsrichtlijnen')
    ->where('id', 1)
    ->first(); // Use first() to get the first (and only) record

echo "<h1 style='background-color: $voedingsname->color'>$voedingsname->name</h1>";


echo '<div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-6xl">
            <div class="flex flex-wrap">';
    foreach ($voedingstype as $voeding) {
        echo '<div class="w-1/4 p-4">
                <div class="bg-gray-200 p-4 text-center">
                    <p class="text-lg font-bold">' . $voeding->name . '</p>
                    <p><img src="' . $voeding->icon . '" alt="Icon" class="mx-auto"></p>
                </div>
            </div>';
    }
    echo '</div>
        </div>
    </div>';