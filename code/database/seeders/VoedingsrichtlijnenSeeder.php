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
            'name' => "Groenvoer",
            'icon' => "fa-solid:leaf",
            'color' => '88FF94',
         ],
         [
            'name' => "Diepvriesvoer",
            'icon' => "ph:snowflake-bold",
            'color' => 'B9D5FF',
         ],
         [
            'name' => "Fruit",
            'icon' => "fa-solid:apple-alt",
            'color' => 'FFD592',
         ],
         [
            'name' => "Voedseldieren",
            'icon' => "zondicons:bug",
            'color' => 'FF9292',
         ]
      ]);
   }
}