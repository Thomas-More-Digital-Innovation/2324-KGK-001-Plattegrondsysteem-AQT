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
            'date' => '19/04/2022',
            'file' => 'files/Medische Fiche  19-04-2022.pdf',
        ]);
        DB::table('medischefiche')->insert([
            'date' => '19/04/2023',
            'file' => 'files/Medische Fiche  19-04-2023.pdf',
        ]);
    }
}
