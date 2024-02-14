<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantgroep extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventarisid',
        'plantid',
    ];

    public function plant() {
        return $this->belongsTo(Plant::class);
    }

    public function inventaris() {
        return $this->belongsTo(Inventaris::class);
    }

    protected $table = 'plantgroeps';

    public $timestamps = false;
}
