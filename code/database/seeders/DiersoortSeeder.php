<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('diersoort')->insert([
            'werkplekid' => 1,

        ]);
    }
}
