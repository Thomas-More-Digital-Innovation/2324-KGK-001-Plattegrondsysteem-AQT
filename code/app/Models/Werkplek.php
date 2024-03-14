<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Werkplek extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active',
    ];

    public function inventaris() {
        return $this->hasMany(Inventaris::class);
    }

    public function logboek() {
        return $this->hasMany(Logboek::class);
    }

    public function dier() {
        return $this->hasMany(Dier::class);
    }

    public function userwerkplek() {
        return $this->hasMany(UserWerkplek::class);
    }

    protected $table = 'werkplek';

    public $timestamps = false;
}
