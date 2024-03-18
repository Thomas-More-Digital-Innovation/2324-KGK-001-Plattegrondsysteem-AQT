<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiervoedingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'voedingsstypeid',
        'dierid',
    ];

    public function voedingstype()
    {
        return $this->belongsTo(Voedingstype::class);
    }

    public function dier()
    {
        return $this->belongsTo(Dier::class);
    }
    public $timestamps = false;
}