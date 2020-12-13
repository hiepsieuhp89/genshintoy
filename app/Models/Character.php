<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Element;
use App\Models\WeaponType;
use App\Models\Character_information;


class Character extends Model
{
    use HasFactory;
    protected $table = 'playablechar';
    public function element(){
    	return $this->belongsTo('App\Models\Element');
    }
    public function weapontype(){
    	return $this->belongsTo('App\Models\WeaponType','weapon_type_id','id');
    }
    public function detail_information(){
    	return $this->hasOne('App\Models\Character_information','character_id','id');
    }
    public function build(){
    	return $this->hasOne('App\Models\Build','character_id','id');
    }
}
