<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoedingstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // diepvriesvoer
      DB::table('voedingstype')->insert([
         [
            'name' => "Rode muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Zwarte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Witte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Artemia",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Tubifex",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Spiering",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Muis",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Kuiken",
            'voedingsrichtlijnid' => "1",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Andijvie",
            'voedingsrichtlijnid' => "2",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Sla",
            'voedingsrichtlijnid' => "2",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "komkommer",
            'voedingsrichtlijnid' => "2",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Champignon",
            'voedingsrichtlijnid' => "2",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Witloof",
            'voedingsrichtlijnid' => "2",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Tomaat",
            'voedingsrichtlijnid' => "2",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Banaan",
            'voedingsrichtlijnid' => "3",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Appel",
            'voedingsrichtlijnid' => "3",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Peer",
            'voedingsrichtlijnid' => "3",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Meloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Galiameloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Druif",
            'voedingsrichtlijnid' => "3",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Krulvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Fruitvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Zwarte krekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Huiskrekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Afrikaanse treksprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Woestijnsprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Wasmotlarve",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Regenworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Meelworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Morioworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ],
         [
            'name' => "Buffaloworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "images/koningspython.jpg"
         ]
      ]);
   }
}