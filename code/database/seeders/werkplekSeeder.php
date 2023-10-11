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
            ],         
            [
            'name' => 'wp4',
            'active' => 1,
            ],
            [
            'name' => 'wp5',
            'active' => 1,
            ],
            [
            'name' => 'wp6',
            'active' => 1,
            ],    
            [
            'name' => 'wp7',
            'active' => 1,
            ],
            [
            'name' => 'wp8',
            'active' => 1,
            ],
            [
            'name' => 'wp9',
            'active' => 1,
            ],
            [
            'name' => 'wp10',
            'active' => 1,
            ],
            [
            'name' => 'bio1',
            'active' => 0,
            ],
            [
            'name' => 'bio2',
            'active' => 0,
            ]
      ]);
   }
}
