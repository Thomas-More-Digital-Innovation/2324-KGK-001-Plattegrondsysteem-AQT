<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diersoort extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latinname',
        'foto',
        'file',
    ];

    protected $table = 'diersoort';

    public function dier() {
        return $this->belongsTo(Dier::class);
    }

    public function protocoldetail() {
        return $this->hasMany(ProtocolDetail::class);
    }

    public $timestamps = false;
}
