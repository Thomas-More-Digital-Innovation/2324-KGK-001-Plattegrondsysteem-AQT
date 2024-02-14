<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logboek extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'werkplekid',
        'description',
        'datetime',
        'jaar'
    ];

    public function gebruiker(){
        return $this->hasMany(User::class);
    }

    public function werkplek(){
        return $this->hasMany(Werkplek::class);
    }

    public $timestamps = true;

}
