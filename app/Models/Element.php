<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Character;

class Element extends Model
{
    use HasFactory;
    protected $table = 'element';
    public function character(){
    	return $this->hasMany(Character::class);
    }
}
