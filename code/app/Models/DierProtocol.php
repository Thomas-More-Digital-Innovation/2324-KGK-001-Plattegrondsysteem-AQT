<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DierProtocol extends Model
{
    use HasFactory;

    protected $fillable = [
        'protocoldetailid',
        'diersoortid',
    ];

    protected $table = 'dierprotocol';

    protected $primaryKeys = ['protocoldetailid', 'diersoortid'];

    public function protocoldetail() { return $this->belongsTo(Protocoldetail::class)->withDefault(); }
    
    public function diersoort() { return $this->hasMany(Diersoort::class)->withDefault(); }

    public $timestamps = false;
}
