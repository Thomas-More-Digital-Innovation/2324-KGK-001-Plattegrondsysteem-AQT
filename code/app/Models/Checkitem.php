<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'protocoldetailid',
        'dierid',
        'datetime',
        'checked',
        'temperatuur',
        'gewicht',
    ];

    public function protocoldetails()
    {
        return $this->belongsTo(Protocoldetail::class)->withDefault();
    }

    public function dier()
    {
        return $this->belongsTo(Dier::class)->withDefault();
    }
}
