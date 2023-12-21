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
            'icon' => "./dummy_files/images/rodemuggenlarve.jpeg"
         ],
         [
            'name' => "Zwarte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/zwartemuggenlarve.jpeg"
         ],
         [
            'name' => "Witte muggenlarve",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/wittemuggenlarve.jpeg"
         ],
         [
            'name' => "Artemia",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/artemia.jpeg"
         ],
         [
            'name' => "Tubifex",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/tubifex.jpeg"
         ],
         [
            'name' => "Spiering",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/spiering.jpeg"
         ],
         [
            'name' => "Muis",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/muis.jpeg"
         ],
         [
            'name' => "Kuiken",
            'voedingsrichtlijnid' => "1",
            'icon' => "./dummy_files/images/kuiken.jpeg"
         ],
         [
            'name' => "Andijvie",
            'voedingsrichtlijnid' => "2",
            'icon' => "./dummy_files/images/andijvie.jpeg"
         ],
         [
            'name' => "Sla",
            'voedingsrichtlijnid' => "2",
            'icon' => "./dummy_files/images/sla.jpeg"
         ],
         [
            'name' => "komkommer",
            'voedingsrichtlijnid' => "2",
            'icon' => "./dummy_files/images/komkommer.jpeg"
         ],
         [
            'name' => "Champignon",
            'voedingsrichtlijnid' => "2",
            'icon' => "./dummy_files/images/champignon.jpeg"
         ],
         [
            'name' => "Witloof",
            'voedingsrichtlijnid' => "2",
            'icon' => "./dummy_files/images/witloof.jpeg"
         ],
         [
            'name' => "Tomaat",
            'voedingsrichtlijnid' => "2",
            'icon' => "./dummy_files/images/tomaat.jpeg"
         ],
         [
            'name' => "Banaan",
            'voedingsrichtlijnid' => "3",
            'icon' => "./dummy_files/images/banaan.jpeg"
         ],
         [
            'name' => "Appel",
            'voedingsrichtlijnid' => "3",
            'icon' => "./dummy_files/images/appel.jpeg"
         ],
         [
            'name' => "Peer",
            'voedingsrichtlijnid' => "3",
            'icon' => "./dummy_files/images/peer.jpeg"
         ],
         [
            'name' => "Meloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "./dummy_files/images/watermeloen.jpeg"
         ],
         [
            'name' => "Galiameloen",
            'voedingsrichtlijnid' => "3",
            'icon' => "./dummy_files/images/galiameloen.jpeg"
         ],
         [
            'name' => "Druif",
            'voedingsrichtlijnid' => "3",
            'icon' => "./dummy_files/images/druif.jpeg"
         ],
         [
            'name' => "Krulvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/krulvlieg.jpeg"
         ],
         [
            'name' => "Fruitvlieg",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/fruitvlieg.jpeg"
         ],
         [
            'name' => "Zwarte krekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/zwartekrekel.jpeg"
         ],
         [
            'name' => "Huiskrekel",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/huiskrekel.jpeg"
         ],
         [
            'name' => "Afrikaanse treksprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/afrikaansetreksprinkhaan.jpeg"
         ],
         [
            'name' => "Woestijnsprinkhaan",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/woestijnsprinkhaan.jpeg"
         ],
         [
            'name' => "Wasmotlarve",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/wasmotlarve.jpeg"
         ],
         [
            'name' => "Regenworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/regenworm.jpeg"
         ],
         [
            'name' => "Meelworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/meelworm.jpeg"
         ],
         [
            'name' => "Morioworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/morioworm.jpeg"
         ],
         [
            'name' => "Buffaloworm",
            'voedingsrichtlijnid' => "4",
            'icon' => "./dummy_files/images/buffaloworm.jpeg"
         ]
      ]);
   }
}