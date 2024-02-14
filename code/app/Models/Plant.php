<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'plantname',
    ];


    public function plantgroep() {
        return $this->hasMany(Plantgroep::class);
    }

    public $timestamps = false;

}
