<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;
    protected $table = 'weapon';
    public function weapontype(){
    	return $this->belongsTo('App\Models\WeaponType');
    }
}
