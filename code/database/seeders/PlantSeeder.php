<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('plants')->insert([
         [
               'plantname' => 'groene plant'
         ],
         [
               'plantname' => 'rode plant'
         ],
         [
               'plantname' => 'paarse plant'
         ]
      ]);
    }
}
