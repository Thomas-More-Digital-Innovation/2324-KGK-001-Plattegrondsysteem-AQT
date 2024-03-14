<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'leerkracht',
        'dierid',
        'comment',
    ];

    protected $table = 'comment';

    public function dier() { return $this->belongsTo(Dier::class)->withDefault(); }

    public $timestamps = false;
}
