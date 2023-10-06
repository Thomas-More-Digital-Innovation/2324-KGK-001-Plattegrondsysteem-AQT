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
            'protocoltypeid' => '1',
            'icon' => 'mdi:snake'
         ],
         [
            'name' => 'Braamblad bijvullen',
            'protocoltypeid' => '1',
            'icon' => 'ph:leaf-bold'
         ],
         [
            'name' => 'Diepvriesspiering voederen',
            'protocoltypeid' => '1',
            'icon' => 'streamline:interface-weather-snow-flake-winter-freeze-snow-freezing-ice-cold-weather-snowflake'
         ],
         [
            'name' => 'Gras bijvullen',
            'protocoltypeid' => '1',
            'icon' => 'mingcute:grass-line'
         ],
         [
            'name' => 'Groenvoer & fruit voederbak bijvullen',
            'protocoltypeid' => '1',
            'icon' => 'carbon:fruit-bowl'
         ],
         [
            'name' => 'Insecten voederen',
            'protocoltypeid' => '1',
            'icon' => 'mdi:insect'
         ],
         [
            'name' => 'Klimop voederen',
            'protocoltypeid' => '1',
            'icon' => 'mingcute:leaf-3-line'
         ],
         [
            'name' => 'Binnenkant poetsen',
            'protocoltypeid' => '2',
            'icon' => 'mdi:cleaning'
         ],
         [
            'name' => 'Buitenkant poetsen',
            'type' => 'Aquarium',
            'icon' => 'mdi:cleaning'
         ],
         [
            'name' => 'Plantenmeststoffen toevoegen',
            'type' => 'Aquarium',
            'icon' => 'game-icons:plants-and-animals'
         ],
         [
            'name' => 'Diepvriesvoer geven',
            'type' => 'Aquarium',
            'icon' => 'arcticons:freezer'
         ],
         [
            'name' => 'Droogvoer geven',
            'type' => 'Aquarium',
            'icon' => 'mdi:fish-food'
         ],
         [
            'name' => 'Water verversen',
            'type' => 'Aquarium',
            'icon' => 'entypo:water'
         ],
      ]);
   }
}
