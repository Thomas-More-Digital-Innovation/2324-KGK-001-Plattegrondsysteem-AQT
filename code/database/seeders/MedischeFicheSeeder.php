<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MedischeFicheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medischefiche')->insert([
            'date' => '17/10/2023',
            'file' => 'files/Koningspython.pdf',
        ]);
        DB::table('medischefiche')->insert([
            'date' => '18/10/2023',
            'file' => 'files/Plantenmeststoffen toevoegen aquarium.pdf',
        ]);
    }
}
