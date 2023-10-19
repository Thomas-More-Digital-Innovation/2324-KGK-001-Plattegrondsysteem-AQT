<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
     * Run the database seeds.
   */
   public function run(): void
   {
      DB::table('users')->insert([
         [
            'firstname' => "Jef",
            'lastname' => "Peeters",
            'username' => "jpeeters",
            'email' => "jpeeters@email.com",
            'password' => Hash::make('jpeeters'),
            'roleid' => "2"
         ],
         [
            'firstname' => "Admin",
            'lastname' => "Admin",
            'username' => "admin",
            'email' => "admin@email.com",
            'password' => Hash::make('adminadmin'),
            'roleid' => "4"
         ],
         [
            'firstname' => "Dierenarts",
            'lastname' => "Dierenarts",
            'username' => "dierenarts",
            'email' => 'dierenarts@email.com',
            'password' => Hash::make('dierenarts'),
            'roleid' => "3"
         ]
      ]);
   }
}
