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

        DB::table('diersoort')->insert([
            'name' => 'Koningspython',
            'latinname' => 'Python regius',
            'foto' => 'images/koningspython.jpg',
            'file' => 'files/Koningspython.pdf',
        ]);
        DB::table('diersoort')->insert([
            'name' => 'Vis',
            'latinname' => 'Viezevis',
            'foto' => 'images/koningspython.jpg',
            'file' => 'images/koningspython.jpg',
        ]);
    }
}