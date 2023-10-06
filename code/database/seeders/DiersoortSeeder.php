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
            'name' => 'slang',
            'latinname' => 'slangus',
            'foto' => '../images/koningspython.jpg',
            'file' => '../images/koningspython.jpg',
        ]);
    }
}