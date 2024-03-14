<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dier extends Model
{
    use HasFactory;

    protected $fillable = [
        'werkplekid',
        'diersoortid',
        'quarantaine',
        'inventarisid',
    ];


    public function inventaris() {
        return $this->belongsTo(Inventaris::class);
    }

    public function werkplek() {
        return $this->belongsTo(Werkplek::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function diersoort() {
        return $this->belongsTo(Diersoort::class);
    }

    public function protocoldetail() {
        return $this->hasMany(ProtocolDetail::class);
    }

    public function diervoedingstype() {
        return $this->hasMany(Diervoedingstype::class);
    }

    public $timestamps = false;
}