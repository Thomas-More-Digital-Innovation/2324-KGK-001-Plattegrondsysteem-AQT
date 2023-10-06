<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class werkplekSeeder extends Seeder
{
   public function run(): void
   {
      DB::table('werkplek')->insert([
         [
               'name' => 'wp1',
               'active' => 1,
         ],
         [
               'name' => 'wp2',
               'active' => 1,
         ],
         [
               'name' => 'wp3',
               'active' => 1,
         ]
      ]);
   }
}
