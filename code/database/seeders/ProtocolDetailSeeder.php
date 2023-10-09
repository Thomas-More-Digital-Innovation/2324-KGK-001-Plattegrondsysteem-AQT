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
            'icon' => 'mdi:snake',
            'file' => '',
         ],
         [
            'name' => 'Braamblad bijvullen',
            'protocoltypeid' => '1',
            'icon' => 'ph:leaf-bold',
            'file' => '',
         ],
         [
            'name' => 'Diepvriesspiering voederen',
            'protocoltypeid' => '1',
            'icon' => 'streamline:interface-weather-snow-flake-winter-freeze-snow-freezing-ice-cold-weather-snowflake',
            'file' => '',
         ],
         [
            'name' => 'Gras bijvullen',
            'protocoltypeid' => '1',
            'icon' => 'mingcute:grass-line',
            'file' => '',
         ],
         [
            'name' => 'Groenvoer & fruit voederbak bijvullen',
            'protocoltypeid' => '1',
            'icon' => 'carbon:fruit-bowl',
            'file' => '',
         ],
         [
            'name' => 'Insecten voederen',
            'protocoltypeid' => '1',
            'icon' => 'mdi:insect',
            'file' => '',
         ],
         [
            'name' => 'Klimop voederen',
            'protocoltypeid' => '1',
            'icon' => 'mingcute:leaf-3-line',
            'file' => '',
         ],
         [
            'name' => 'Binnenkant poetsen',
            'protocoltypeid' => '2',
            'file' => 'files/Aquariumruiten binnenkant poetsen.pdf',
            'icon' => 'mdi:cleaning',
         ],
         [
            'name' => 'Buitenkant poetsen',
            'protocoltypeid' => '2',
            'file' => 'files/Aquariumruiten buitenkant poetsen.pdf',
            'icon' => 'mdi:cleaning',
         ],
         [
            'name' => 'Plantenmeststoffen toevoegen',
            'protocoltypeid' => '2',
            'file' => 'files/Plantenmeststoffen toevoegen aquarium.pdf',
            'icon' => 'game-icons:plants-and-animals',
         ],
         [
            'name' => 'Diepvriesvoer geven',
            'protocoltypeid' => '2',
            'file' => 'files/Vissen diepvriesvoer geven.pdf',
            'icon' => 'arcticons:freezer',
         ],
         [
            'name' => 'Droogvoer geven',
            'protocoltypeid' => '2',
            'file' => 'files/Vissen droogvoer geven.pdf',
            'icon' => 'mdi:fish-food',
         ],
         [
            'name' => 'Water verversen',
            'protocoltypeid' => '2',
            'file' => 'files/Water verversen aquarium.pdf',
            'icon' => 'entypo:water',
         ],
      ]);
   }
}
