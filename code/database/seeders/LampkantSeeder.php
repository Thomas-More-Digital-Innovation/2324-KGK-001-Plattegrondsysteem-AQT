<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LampkantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lampkant')->insert([
            'inventarisid' => 1,
            'lampid' => 1,
            'position' => 'links', 
        ]);
        DB::table('lampkant')->insert([
            'inventarisid' => 1,
            'lampid' => 2,
            'position' => 'rechts'
        ]);
    }
}
