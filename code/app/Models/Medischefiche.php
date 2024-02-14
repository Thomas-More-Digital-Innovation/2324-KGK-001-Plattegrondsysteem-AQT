<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medischefiche extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'file'
    ];

    public $timestamps = true;
}
