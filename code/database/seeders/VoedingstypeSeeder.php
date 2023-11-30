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
            'icon' => "./images/rodemuggenlarve.jpeg"
         ],
         [
            'name' => "Zwarte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/zwartemuggenlarve.jpeg"
         ],
         [
            'name' => "Witte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/wittemuggenlarve.jpeg"
         ],
         [
            'name' => "Artemia",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/artemia.jpeg"
         ],
         [
            'name' => "Tubifex",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/tubifex.jpeg"
         ],
         [
            'name' => "Spiering",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/spiering.jpeg"
         ],
         [
            'name' => "Muis",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/muis.jpeg"
         ],
         [
            'name' => "Kuiken",
            'voedingsrichtlijnid' => "1",
            'icon' => "./images/kuiken.jpeg"
         ],
         [
            'name' => "Andijvie",
            'voedingsrichtlijnid' => "2",
            'icon' => "./images/andijvie.jpeg"
         ],
         [
            'name' => "Sla",
            'voedingsrichtlijnid' => "2",
            'icon' => "./images/sla.jpeg"
         ],
         [
            'name' => "komkommer",
            'voedingsrichtlijnid' => "2",
            'icon' => "./images/komkommer.jpeg"
         ],
         [
            'name' => "Champignon",
            'voedingsrichtlijnid' => "2",
            'icon' => "./images/champignon.jpeg"
         ],
         [
            'name' => "Witloof",
            'voedingsrichtlijnid' => "2",
            'icon' => "./images/witloof.jpeg"
         ],
         [
            'name' => "Tomaat",
            'voedingsrichtlijnid' => "2",
            'icon' => "./images/tomaat.jpeg"
         ],
         [
            'name' => "Banaan",
            'voedingsrichtlijnid' => "3",
            'icon' => "./images/banaan.jpeg"
         ],
         [
            'name' => "Appel",
            'voedingsrichtlijnid' => "3",
            'icon' => "./images/appel.jpeg"
         ],
         [
            'name' => "Peer",
            'voedingsrichtlijnid' => "3",
            'icon' => "./images/peer.jpeg"
         ],
         [
            'name' => "Meloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "./images/watermeloen.jpeg"
         ],
         [
            'name' => "Galiameloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "./images/galiameloen.jpeg"
         ],
         [
            'name' => "Druif",
            'voedingsrichtlijnid' => "3",
            'icon' => "./images/druif.jpeg"
         ],
         [
            'name' => "Krulvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/krulvlieg.jpeg"
         ],
         [
            'name' => "Fruitvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/fruitvlieg.jpeg"
         ],
         [
            'name' => "Zwarte krekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/zwartekrekel.jpeg"
         ],
         [
            'name' => "Huiskrekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/huiskrekel.jpeg"
         ],
         [
            'name' => "Afrikaanse treksprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/afrikaansetreksprinkhaan.jpeg"
         ],
         [
            'name' => "Woestijnsprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/woestijnsprinkhaan.jpeg"
         ],
         [
            'name' => "Wasmotlarve",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/wasmotlarve.jpeg"
         ],
         [
            'name' => "Regenworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/regenworm.jpeg"
         ],
         [
            'name' => "Meelworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/meelworm.jpeg"
         ],
         [
            'name' => "Morioworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/morioworm.jpeg"
         ],
         [
            'name' => "Buffaloworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./images/buffaloworm.jpeg"
         ]
      ]);
   }
}