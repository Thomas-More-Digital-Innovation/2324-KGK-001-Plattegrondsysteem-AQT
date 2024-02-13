<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'werkplekid',
    ];

    public function lampkant() {
        return $this->hasMany(Lampkant::class);
    }

    public function plantgroep() {
        $this->hasMany(plantgroep::class);
    }

    public $timestamps = false;

}
