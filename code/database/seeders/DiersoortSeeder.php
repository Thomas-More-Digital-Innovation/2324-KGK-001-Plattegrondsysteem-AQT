<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DiersoortSeeder extends Seeder
{
    public function run(): void
    {
        $imagePath = public_path('images/koningspython.jpg');
        $imageData = file_get_contents($imagePath);

        DB::table('diersoort')->insert([
            'name' => 'slang',
            'latinname' => 'slangus',
            'foto' => $imageData,
            'file' => $imageData,
        ]);
    }
}