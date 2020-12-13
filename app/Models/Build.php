<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;
    protected $table = 'recommend_build';
    public function character(){
    	return $this->belongsTo('App\Models\Character');
    }
}
