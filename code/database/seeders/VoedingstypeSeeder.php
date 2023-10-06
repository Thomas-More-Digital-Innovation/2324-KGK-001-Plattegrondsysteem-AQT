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
            'voedingsrichtlijnenid' => "1",
            'icon' => "rode_muggenlarve.png"
         ],
         [
            'name' => "Zwarte muggenlarve",
            'voedingsrichtlijnenid' => "1",
            'icon' => "zwarte_muggenlarve.png"
         ],
         [
            'name' => "Witte muggenlarve",
            'voedingsrichtlijnenid' => "1",
            'icon' => "witte_muggenlarve.png"
         ],
         [
            'name' => "Artemia",
            'voedingsrichtlijnenid' => "1",
            'icon' => "artemia.png"
         ],
         [
            'name' => "Tubifex",
            'voedingsrichtlijnenid' => "1",
            'icon' => "tubifex.png"
         ],
         [
            'name' => "Spiering",
            'voedingsrichtlijnenid' => "1",
            'icon' => "spiering.png"
         ],
         [
            'name' => "Muis",
            'voedingsrichtlijnenid' => "1",
            'icon' => "muis.png"
         ],
         [
            'name' => "Kuiken",
            'voedingsrichtlijnenid' => "1",
            'icon' => "kuiken.png"
         ],
         [
            'name' => "Andijvie",
            'voedingsrichtlijnenid' => "2",
            'icon' => "andijvie.png"
         ],
         [
            'name' => "Sla",
            'voedingsrichtlijnenid' => "2",
            'icon' => "sla.png"
         ],
         [
            'name' => "komkommer",
            'voedingsrichtlijnenid' => "2",
            'icon' => "komkommer.png"
         ],
         [
            'name' => "Champignon",
            'voedingsrichtlijnenid' => "2",
            'icon' => "champignon.png"
         ],
         [
            'name' => "Witloof",
            'voedingsrichtlijnenid' => "2",
            'icon' => "witloof.png"
         ],
         [
            'name' => "Tomaat",
            'voedingsrichtlijnenid' => "2",
            'icon' => "tomaat.png"
         ],
         [
            'name' => "Banaan",
            'voedingsrichtlijnenid' => "3",
            'icon' => "banaan.png"
         ],
         [
            'name' => "Appel",
            'voedingsrichtlijnenid' => "3",
            'icon' => "appel.png"
         ],
         [
            'name' => "Peer",
            'voedingsrichtlijnenid' => "3",
            'icon' => "peer.png"
         ],
         [
            'name' => "Meloen",
            'voedingsrichtlijnenid' => "3",
            'icon' => "meloen.png"
         ],
         [
            'name' => "Galiameloen",
            'voedingsrichtlijnenid' => "3",
            'icon' => "galiameloen.png"
         ],
         [
            'name' => "Druif",
            'voedingsrichtlijnenid' => "3",
            'icon' => "druif.png"
         ],
         [
            'name' => "Krulvlieg",
            'voedingsrichtlijnenid' => "4",
            'icon' => "krulvlieg.png"
         ],
         [
            'name' => "Fruitvlieg",
            'voedingsrichtlijnenid' => "4",
            'icon' => "fruitvlieg.png"
         ],
         [
            'name' => "Zwarte krekel",
            'voedingsrichtlijnenid' => "4",
            'icon' => "zwarte_krekel.png"
         ],
         [
            'name' => "Huiskrekel",
            'voedingsrichtlijnenid' => "4",
            'icon' => "huiskrekel.png"
         ],
         [
            'name' => "Afrikaanse treksprinkhaan",
            'voedingsrichtlijnenid' => "4",
            'icon' => "afrikaanse_treksprinkhaan.png"
         ],
         [
            'name' => "Woestijnsprinkhaan",
            'voedingsrichtlijnenid' => "4",
            'icon' => "woestijnsprinkhaan.png"
         ],
         [
            'name' => "Wasmotlarve",
            'voedingsrichtlijnenid' => "4",
            'icon' => "wasmotlarve.png"
         ],
         [
            'name' => "Regenworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "regenworm.png"
         ],
         [
            'name' => "Meelworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "meelworm.png"
         ],
         [
            'name' => "Morioworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "morioworm.png"
         ],
         [
            'name' => "Buffaloworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "buffaloworm.png"
         ]
      ]);
   }
}