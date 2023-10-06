<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoedingsrichtlijnenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('voedingsrichtlijnen')->insert([
         [
            'name' => "Diepvriesvoer",
            'icon' => "ph:snowflake-bold",
            'color' => '#009FE3',
         ],
         [
            'name' => "Groenvoer",
            'icon' => "fa-solid:leaf",
            'color' => '#33A117',
         ],
         [
            'name' => "Fruit",
            'icon' => "fa-solid:apple-alt",
            'color' => '#EA5353',
         ],
         [
            'name' => "Voedseldieren",
            'icon' => "zondicons:bug",
            'color' => '#EA5353',
         ]
      ]);
   }
}