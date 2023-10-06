<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtocolDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('protocoldetail')->insert([
         [
            'name' => 'Bodembedding  zeven',
            'type' => 'Terrarium',
            'icon' => 'mdi:snake'
         ],
         [
            'name' => 'Braamblad bijvullen',
            'type' => 'Terrarium',
            'icon' => 'ph:leaf-bold'
         ],
         [
            'name' => 'Diepvriesspiering voederen',
            'type' => 'Terrarium',
            'icon' => 'streamline:interface-weather-snow-flake-winter-freeze-snow-freezing-ice-cold-weather-snowflake'
         ],
         [
            'name' => 'Gras bijvullen',
            'type' => 'Terrarium',
            'icon' => 'mingcute:grass-line'
         ],
         [
            'name' => 'Groenvoer & fruit voederbak bijvullen',
            'type' => 'Terrarium',
            'icon' => 'carbon:fruit-bowl'
         ],
         [
            'name' => 'Insecten voederen',
            'type' => 'Terrarium',
            'icon' => 'mdi:insect'
         ],
         [
            'name' => 'Klimop voederen',
            'type' => 'Terrarium',
            'icon' => 'mingcute:leaf-3-line'
         ]
      ]);
    }
}
