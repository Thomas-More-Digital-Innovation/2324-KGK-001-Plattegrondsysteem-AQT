<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantgroepSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plantgroep')->insert([[
            'inventarisid' => 1,
            'plantid' => 1,
        ],[
            'inventarisid' => 1,
            'plantid' => 2,
        ],[
            'inventarisid' => 1,
            'plantid' => 3,
        ],[
            'inventarisid' => 2,
            'plantid' => 1,
        ],[
            'inventarisid' => 2,
            'plantid' => 2,
        ]]);
    }
}
