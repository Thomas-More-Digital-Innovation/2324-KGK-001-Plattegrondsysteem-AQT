<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dier')->insert([[
            'werkplekid' => 1,
            'diersoortid' => 1,
            'quarantaine' => 0,
            'inventarisid' => 1], [
            'werkplekid' => 1,
            'diersoortid' => 1,
            'quarantaine' => 0,
            'inventarisid' => 1
            ]
        ]);
    }
}
