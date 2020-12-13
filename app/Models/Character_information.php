<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character_information extends Model
{
    use HasFactory;
    protected $table = 'character_information';
    public function character(){
    	return $this->belongsTo('App\Models\Character');
    }
}
