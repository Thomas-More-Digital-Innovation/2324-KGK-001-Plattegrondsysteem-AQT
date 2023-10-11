<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comment')->insert([
            [
                'leerkracht' => false,
                'dierid' => '1',
                'comment' => 'Dit is de comment van een student'
            ],
            [
                'leerkracht' => true,
                'dierid' => '1',
                'comment' => 'Dit is de eerste comment van een leerkracht'
            ],           
            [
                'leerkracht' => false,
                'dierid' => '2',
                'comment' => 'Dit is de comment van een student voor de vis'
            ],
            [
                'leerkracht' => true,
                'dierid' => '2',
                'comment' => 'Dit is de eerste comment van een leerkracht voor de vis'
            ]
        ]);
    }
}
