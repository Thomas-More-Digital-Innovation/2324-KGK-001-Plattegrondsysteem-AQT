<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Row;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 5; // Start processing data from row 5
    }

    public function model(array $row)
    {
        $number = $row[0];

        if(is_numeric($number)){
            $fullName = $row[1];
            $nameParts = explode(" ", $fullName);
            
            $firstName = array_pop($nameParts);
            $lastName = implode(" ", $nameParts);
            
            $username = strtolower(str_replace(" ", "", $firstName . "." . $lastName));
            $email = strtolower(str_replace(" ", "", $firstName . "." . $lastName . "@example.com"));
            
            return new User([
                'firstname' => $firstName,
                'lastname' => $lastName,
                'username' => $username,
                'email' => $email,
                'password' => Hash::make('1234'),
                'roleid' => 2,
            ]);
        }
        else{
            return null;
        }


    }
}
