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
            'name' => 'werkplek 1',
            'active' => 1,
        ]);
    }
}