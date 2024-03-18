<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoedingsType extends Model
{
    use HasFactory;

    protected $table = 'voedingstype';

    protected $fillable =  [
        'name',
        'voedingsrichtlijnid',
        'icon',
    ];

    public function voedingsrichtlijn()
    {
        return $this->belongsTo(VoedingsRichtlijnen::class);
    }

    public $timestamps = false;
}
