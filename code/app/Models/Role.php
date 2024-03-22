<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'roleName',
        'admin'
    ];

    public function gebruiker(){
        return $this->hasMany(User::class);
    }

    public $timestamps = false;
    protected $table = 'role';
}
