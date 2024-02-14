<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LampSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lamps')->insert([
            'name' => 'Exoterra intense gloeilamp 25W'
        ]);
        DB::table('lamps')->insert([
            'name' => 'Lucky Reptile 50W spot'
        ]);
        DB::table('lamps')->insert([
            'name' => 'lamp UV'
        ]);
        DB::table('lamps')->insert([
            'name' => 'IR lamp'
        ]);
    }
}
