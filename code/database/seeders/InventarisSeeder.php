<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventaris')->insert([
            'werkplekid' => 1
        ]);
        DB::table('inventaris')->insert([
            'werkplekid' => 2
        ]);
    }
}
