<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DierProtocolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('dierprotocol')->insert([
         [
            'protocoldetailid' => '1',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '2',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '3',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '4',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '5',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '6',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '7',
            'diersoortid' => '1'
         ],
         [
            'protocoldetailid' => '8',
            'diersoortid' => '2'
         ],
         [
            'protocoldetailid' => '9',
            'diersoortid' => '2'
         ],
         [
            'protocoldetailid' => '10',
            'diersoortid' => '2'
         ],
         [
            'protocoldetailid' => '11',
            'diersoortid' => '2'
         ],
         [
            'protocoldetailid' => '12',
            'diersoortid' => '2'
         ],
         [
            'protocoldetailid' => '13',
            'diersoortid' => '2'
         ],
      ]);
   }
}
