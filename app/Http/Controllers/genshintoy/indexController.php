<?php

namespace App\Http\Controllers\genshintoy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cookie;
use App\Models\Character;
use App\Models\WeaponType;
use App\Models\Weapon;
use App\Models\Artifact;

include('simplehtmldom_1_9_1/simple_html_dom.php');

class indexController extends Controller
{
 	public function index(){
 		$char = Character::all();
 		$weapontype = WeaponType::all();
 		$viewdata = [
 			'character' => $char,
 			'weapontype' => $weapontype
 		];
 		return view('genshintoy.index',$viewdata);
 	}
 	public function character_information($id){
 		$char = Character::where('id',$id)->first();
 		$wp = array_filter(explode('|',$char->build->weapon),function($target){
 			return strlen($target) > 0;
 		});
 		$ar = array_filter(explode('|',$char->build->artifact),function($target){
 			return strlen($target) > 0;
 		});
 		foreach($wp as $key => $value){
 			$item = Weapon::where('id',$value)->firstOrFail();
 			$wp[$key] = $item;
 			//dd($wp[$key]);
 			$wp[$key]->passive = $wp[$key]->refinement_rank1;
 		}
 		foreach($ar as $key => $value){
 			$item = Artifact::where('id',$value)->firstOrFail();
 			$ar[$key] = $item;
 			$ar[$key]->passive = $ar[$key]->fourpiece;
 			//$ar[$key]->passive = $ar[$key]->fourpiece ? $ar[$key]->fourpiece:$ar[$key]->twopiece?$ar[$key]->twopiece:$ar[$key]->onepiece;
 		}
 		$viewdata = [
 			'character' => $char,
 			'build' => [
 				'weapon' => $wp,
 				'artifact' => $ar
 			]
 		];
 		return view('genshintoy.character_information',$viewdata);
 	}
 	public function weapons(){
 		$weapon = Weapon::orderby('rarity','desc')->get();
 		$weapontype = WeaponType::all();
 		$viewdata = [
 			'weapon' => $weapon,
 			'weapontype' => $weapontype
 		];
 		return view('genshintoy.weapons',$viewdata);
 	}
 	public function artifacts(){
 		$artifact = Artifact::all();
 		//$artifacttype = WeaponType::all();
 		$viewdata = [
 			'artifact' => $artifact,
 		];
 		return view('genshintoy.artifacts',$viewdata);
 	}
 	public function calculateDamage(){
 		return view('genshintoy.tools.calculateDamage');
 	}
 	public function wish(){
 		
 		$WishData = (array) json_decode(Cookie::get('WishData'));
        $data = [
 			'amount' => (array) $WishData['amount'],
 			'fates_used' => (array) $WishData['fates_used'],
 			'fates_used_from_the_last' => (array) $WishData['fates_used_from_the_last']
 		];
 		//dd($data);
 		return view('genshintoy.tools.wish',$data);
 	}
 	public function getRandom($data){
 		$total_rate = 0;
 		$distribution = [];
 		foreach($data as $name => $rate){
 			$total_rate += $rate;
 			$distribution[$name] = $total_rate;
 		}
 		$rand = mt_rand(0,$total_rate-1);
 		foreach($distribution as $name => $weight){
 			if($rand < $weight)
 				return $name;
 		}
 	}
 	public function wishExtract(Request $req){
 		$data = json_encode([
 			'amount' => $req->amount,
 			'fates_used' => $req->fates_used, 
 			'fates_used_from_the_last' => $req->fates_used_from_the_last
 		]);
 		Cookie::queue('WishData', $data, 3456789);
		if($req->fates_used_from_the_last >= 90){
			$maxrarity = '5star';
			$data = json_encode([
		 		'amount' => $req->amount,
		 		'fates_used' => $req->fates_used, 
		 		'fates_used_from_the_last' => 0
		 	]);
		 	Cookie::queue('WishData', $data, 3456789);
 			return response($maxrarity);
 		}
 		if($req->fates_used_from_the_last <= 75){
 			$maxrarity = $this->getRandom([
		 		'5star' => 0.6,
		 		'4star' => 5.1,
		 		'3star' => 94.3
		 	]);
		 	if($maxrarity == '5star'){
		 		$data = json_encode([
		 			'amount' => $req->amount,
		 			'fates_used' => $req->fates_used, 
		 			'fates_used_from_the_last' => 0
		 		]);
		 		Cookie::queue('WishData', $data, 3456789);
		 	}
 			return response($maxrarity);
 		}
 		if($req->fates_used_from_the_last > 75){
 			$maxrarity = $this->getRandom([
		 		'5star' => 50,
		 		'4star' => 5.1,
		 		'3star' => 94.3
		 	]);
		 	if($maxrarity == '5star'){
		 		$data = json_encode([
		 			'amount' => $req->amount,
		 			'fates_used' => $req->fates_used, 
		 			'fates_used_from_the_last' => 0
		 		]);
		 	}
 			return response($maxrarity);
 		}
 	}
}
