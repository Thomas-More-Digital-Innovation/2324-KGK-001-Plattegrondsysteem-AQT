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
            'name' => 'Bodembedding  zeven',
            'type' => 'Terrarium',
            'icon' => 'mdi:snake'
        ]);

        DB::table('protocoldetail')->insert([
            'name' => 'Braamblad bijvullen',
            'type' => 'Terrarium',
            'icon' => 'ph:leaf-bold'
        ]);
        DB::table('protocoldetail')->insert([
            'name' => 'Diepvriesspiering voederen',
            'type' => 'Terrarium',
            'icon' => 'streamline:interface-weather-snow-flake-winter-freeze-snow-freezing-ice-cold-weather-snowflake'
        
        ]);
        DB::table('protocoldetail')->insert([
            'name' => 'Gras bijvullen',
            'type' => 'Terrarium',
            'icon' => 'mingcute:grass-line'
        ]);
        DB::table('protocoldetail')->insert([
            'name' => 'Groenvoer & fruit voederbak bijvullen',
            'type' => 'Terrarium',
            'icon' => 'carbon:fruit-bowl'
        ]);
        DB::table('protocoldetail')->insert([
            'name' => 'Insecten voederen',
            'type' => 'Terrarium',
            'icon' => 'mdi:insect'
        ]);
        DB::table('protocoldetail')->insert([
            'name' => 'Klimop voederen',
            'type' => 'Terrarium',
            'icon' => 'mingcute:leaf-3-line'

        ]);
    }
}
