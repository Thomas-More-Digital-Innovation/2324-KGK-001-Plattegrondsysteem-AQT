<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoedingsRichtlijnen extends Model
{
    use HasFactory;

    protected $table = 'voedingsrichtlijnen';

    protected $fillable =  [
        'name',
        'icon',
        'color',
    ];

    public function voedingstype()
    {
        return $this->hasMany(Voedingstype::class);
    }

    public $timestamps = false;
}
