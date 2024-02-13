<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampkant extends Model
{
    // deze model is voor de koppeling van lampen aan inventaris
    // associatietabellen hebben typisch geen model nodig, maar in dit geval is het handig om de koppelingen te kunnen opvragen in onze niet zo fantastische programmeerlogica
    
    use HasFactory;

    protected $fillable = [
        'inventarisid',
        'lampid',
        'position',
    ];

    public function lamp() {
        return $this->belongsTo(Lamp::class);
    }

    public function inventaris() {
        return $this->belongsTo(Inventaris::class);
    }

    public $timestamps = false;
}
