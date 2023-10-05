<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoedingsrichtlijnenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('voedingsrichtlijnen')->insert([
            'name' => "Diepvriesvoer",
            'icon' => "diepvriesvoer.png"
        ]);

        DB::table('voedingsrichtlijnen')->insert([
            'name' => "Groenvoer",
            'icon' => "groenvoer.png"
        ]);

        DB::table('voedingsrichtlijnen')->insert([
            'name' => "Fruit",
            'icon' => "fruit.png"
        ]);

        DB::table('voedingsrichtlijnen')->insert([
            'name' => "Voedseldieren",
            'icon' => "voedseldieren.png"
        ]);
    }
}