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
            'name' => "Rode muggenlarve",
            'voedingsrichtlijnenid' => "1",
            'icon' => "rode_muggenlarve.png"
        ]);
        
        DB::table('voedingstype')->insert([
            'name' => "Zwarte muggenlarve",
            'voedingsrichtlijnenid' => "1",
            'icon' => "zwarte_muggenlarve.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Witte muggenlarve",
            'voedingsrichtlijnenid' => "1",
            'icon' => "witte_muggenlarve.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Artemia",
            'voedingsrichtlijnenid' => "1",
            'icon' => "artemia.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Tubifex",
            'voedingsrichtlijnenid' => "1",
            'icon' => "tubifex.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Spiering",
            'voedingsrichtlijnenid' => "1",
            'icon' => "spiering.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Muis",
            'voedingsrichtlijnenid' => "1",
            'icon' => "muis.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Kuiken",
            'voedingsrichtlijnenid' => "1",
            'icon' => "kuiken.png"
        ]);

        // groenvoer
        DB::table('voedingstype')->insert([
            'name' => "Andijvie",
            'voedingsrichtlijnenid' => "2",
            'icon' => "andijvie.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Sla",
            'voedingsrichtlijnenid' => "2",
            'icon' => "sla.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "komkommer",
            'voedingsrichtlijnenid' => "2",
            'icon' => "komkommer.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Champignon",
            'voedingsrichtlijnenid' => "2",
            'icon' => "champignon.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Witloof",
            'voedingsrichtlijnenid' => "2",
            'icon' => "witloof.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Tomaat",
            'voedingsrichtlijnenid' => "2",
            'icon' => "tomaat.png"
        ]);

        // Fruit
        DB::table('voedingstype')->insert([
            'name' => "Banaan",
            'voedingsrichtlijnenid' => "3",
            'icon' => "banaan.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Appel",
            'voedingsrichtlijnenid' => "3",
            'icon' => "appel.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Peer",
            'voedingsrichtlijnenid' => "3",
            'icon' => "peer.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Meloen",
            'voedingsrichtlijnenid' => "3",
            'icon' => "meloen.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Galiameloen",
            'voedingsrichtlijnenid' => "3",
            'icon' => "galiameloen.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Druif",
            'voedingsrichtlijnenid' => "3",
            'icon' => "druif.png"
        ]);

        // Voedseldieren
        DB::table('voedingstype')->insert([
            'name' => "Krulvlieg",
            'voedingsrichtlijnenid' => "4",
            'icon' => "krulvlieg.png"
        ]);
        
        DB::table('voedingstype')->insert([
            'name' => "Fruitvlieg",
            'voedingsrichtlijnenid' => "4",
            'icon' => "fruitvlieg.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Zwarte krekel",
            'voedingsrichtlijnenid' => "4",
            'icon' => "zwarte_krekel.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Huiskrekel",
            'voedingsrichtlijnenid' => "4",
            'icon' => "huiskrekel.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Afrikaanse treksprinkhaan",
            'voedingsrichtlijnenid' => "4",
            'icon' => "afrikaanse_treksprinkhaan.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Woestijnsprinkhaan",
            'voedingsrichtlijnenid' => "4",
            'icon' => "woestijnsprinkhaan.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Wasmotlarve",
            'voedingsrichtlijnenid' => "4",
            'icon' => "wasmotlarve.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Regenworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "regenworm.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Meelworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "meelworm.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Morioworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "morioworm.png"
        ]);

        DB::table('voedingstype')->insert([
            'name' => "Buffaloworm",
            'voedingsrichtlijnenid' => "4",
            'icon' => "buffaloworm.png"
        ]);
    }
}