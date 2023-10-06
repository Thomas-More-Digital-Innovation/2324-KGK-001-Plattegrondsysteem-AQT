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
            'icon' => "rode_muggenlarve.png"
         ],
         [
            'name' => "Zwarte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "zwarte_muggenlarve.png"
         ],
         [
            'name' => "Witte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "witte_muggenlarve.png"
         ],
         [
            'name' => "Artemia",
            'voedingsrichtlijnid' => "1",
            'icon' => "artemia.png"
         ],
         [
            'name' => "Tubifex",
            'voedingsrichtlijnid' => "1",
            'icon' => "tubifex.png"
         ],
         [
            'name' => "Spiering",
            'voedingsrichtlijnid' => "1",
            'icon' => "spiering.png"
         ],
         [
            'name' => "Muis",
            'voedingsrichtlijnid' => "1",
            'icon' => "muis.png"
         ],
         [
            'name' => "Kuiken",
            'voedingsrichtlijnid' => "1",
            'icon' => "kuiken.png"
         ],
         [
            'name' => "Andijvie",
            'voedingsrichtlijnid' => "2",
            'icon' => "andijvie.png"
         ],
         [
            'name' => "Sla",
            'voedingsrichtlijnid' => "2",
            'icon' => "sla.png"
         ],
         [
            'name' => "komkommer",
            'voedingsrichtlijnid' => "2",
            'icon' => "komkommer.png"
         ],
         [
            'name' => "Champignon",
            'voedingsrichtlijnid' => "2",
            'icon' => "champignon.png"
         ],
         [
            'name' => "Witloof",
            'voedingsrichtlijnid' => "2",
            'icon' => "witloof.png"
         ],
         [
            'name' => "Tomaat",
            'voedingsrichtlijnid' => "2",
            'icon' => "tomaat.png"
         ],
         [
            'name' => "Banaan",
            'voedingsrichtlijnid' => "3",
            'icon' => "banaan.png"
         ],
         [
            'name' => "Appel",
            'voedingsrichtlijnid' => "3",
            'icon' => "appel.png"
         ],
         [
            'name' => "Peer",
            'voedingsrichtlijnid' => "3",
            'icon' => "peer.png"
         ],
         [
            'name' => "Meloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "meloen.png"
         ],
         [
            'name' => "Galiameloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "galiameloen.png"
         ],
         [
            'name' => "Druif",
            'voedingsrichtlijnid' => "3",
            'icon' => "druif.png"
         ],
         [
            'name' => "Krulvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "krulvlieg.png"
         ],
         [
            'name' => "Fruitvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "fruitvlieg.png"
         ],
         [
            'name' => "Zwarte krekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "zwarte_krekel.png"
         ],
         [
            'name' => "Huiskrekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "huiskrekel.png"
         ],
         [
            'name' => "Afrikaanse treksprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "afrikaanse_treksprinkhaan.png"
         ],
         [
            'name' => "Woestijnsprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "woestijnsprinkhaan.png"
         ],
         [
            'name' => "Wasmotlarve",
            'voedingsrichtlijnid' => "4",
            'icon' => "wasmotlarve.png"
         ],
         [
            'name' => "Regenworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "regenworm.png"
         ],
         [
            'name' => "Meelworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "meelworm.png"
         ],
         [
            'name' => "Morioworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "morioworm.png"
         ],
         [
            'name' => "Buffaloworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "buffaloworm.png"
         ]
      ]);
   }
}