<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtocoltypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('protocoltype')->insert([
         [
               'name' => 'Terrarium',
               'icon' => 'fluent-emoji-high-contrast:lizard',
               'color' => '#88FF94',
         ],
         [
               'name' => 'Aquarium',
               'icon' => 'game-icons:aquarium',
               'color' => '#B9D5FF',
         ],
         [
               'name' => 'Lokaal',
               'icon' => 'mdi:google-classroom',
               'color' => '#FFD592',
         ]
      ]);
    }
}
