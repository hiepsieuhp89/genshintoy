<?php

namespace App\Http\Controllers\genshintoy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Character;
use App\Models\WeaponType;
use App\Models\Weapon;
use App\Models\Artifact;
include('simplehtmldom_1_9_1/simple_html_dom.php');

class apiController extends Controller
{
	public function getId($value, $type){
		$nation = [
			1 => 'Mondstadt',
			2 => 'Liyue'
		];
		$element = [
			1 => 'Pyro',
			2 => 'Hydro',
			3 => 'Electro',
			4 => 'Cryo',
			5 => 'Anemo',
			6 => 'Geo',
			7 => 'Adaptive'
		];
		$weapon_type = [
			5 => "Bow",
			4 => "Catalyst",
			2 => "Claymore",
			1 => "Sword",
  			3 => "Polearm",
		];
		if($type == 'nation'){
			return array_search($value,$nation);
		}
		if($type == 'element'){
			return array_search($value,$element);
		}
		if($type == 'weapon_type'){
			return array_search($value,$weapon_type);
		}
	}
	public function insertWeaponType(){
		$url = 'https://genshin-impact.fandom.com/wiki/Weapons';
	    $html = file_get_html($url);
	    $weapon_list = $html->find('table.article-table tr td a');
	    $weapon_list_info = $html->find('table.article-table tr');
	    array_shift($weapon_list_info);
	    $i = 0;
	    foreach($weapon_list as $value){
	    	$href = $value->href;
	    	$url = 'https://genshin-impact.fandom.com/'.$href;
	    	$html_thumb = file_get_html($url);
	    	$icon = $html_thumb->find('div.mw-parser-output figure.show-info-icon a img')[0]->src;
	    	$icon_png = substr(
	    		$icon,
	    		0,
	    		strpos($icon,'png')+3
	    	);
	    	$description = $weapon_list_info[$i++]->find('td')[1]->innertext;
	    	DB::table('weapon_type')->insert([
	    		'name' => $html_thumb->find('h1#firstHeading')[0]->innertext,
	    		'icon' => $icon_png,
	    		'description' => $description,
	    	]);
	    }
	    return true;
	}
	public function insertElement(){
		$url = 'https://genshin-impact.fandom.com/wiki/Characters';
	    $html = file_get_html($url);
	    $char = $html->find('div.mw-parser-output')[0]->find('table.article-table')[0]->find('tr');
	    array_shift($char);
	    $i = 0;
	    foreach($char as $value){//filter elemetn column
	    	$element_name = isset($value->find('td')[3]->find('a')[1])? $value->find('td')[3]->find('a')[1]->innertext : 'Adaptive';
	    	$element_icon = isset($value->find('td')[3]->find('a img')[0])? $value->find('td')[3]->find('a img')[0]->getAttribute('data-src') : null;
	    	$element_icon = substr(
	    		$element_icon,
	    		0,
	    		strpos($element_icon,'png')+3
	    	);
	    	$element_name_list[$i++] = $element_name;
	    	$element_icon_list[$i++] = $element_icon;
	    }
	    $element_name_list = array_values(array_unique($element_name_list));//remove the duplicate value
	    $element_icon_list = array_values(array_unique($element_icon_list));
	    $i = 0;
	    foreach($element_name_list as $key => $value){//insert each element to dtb
	    	DB::table('element')->insert([
	    		'name' => $element_name_list[$key],
	    		'icon' => $element_icon_list[$key]
	    	]);
	    }
	    return true;
	}
	public function insertWeapon(){
		$url = 'https://genshin-impact.fandom.com/wiki/Weapons';
	    $html = file_get_html($url);
	    $weapon_list = $html->find('table.article-table tr td a');
	    $i = 0;
	    foreach($weapon_list as $value){
	    	$href = $value->href;
	    	$url = 'https://genshin-impact.fandom.com/'.$href;
	    	$html_thumb = file_get_html($url);
	    	$weapon_list_td = $html_thumb->find('table.wikitable')[1]->find('tr');
			array_shift($weapon_list_td);
			$i++;
	    	foreach($weapon_list_td as $value){
	    		DB::table('weapon')->insert([
		    		'weapon_type_id' => $i,
		    		'name' => strtolower(str_replace('’','\'',trim($value->find('td')[0]->find('a')[0]->innertext))),
		            'rarity' => trim($value->find('td')[2]->plaintext),
		            'base_atk' => trim($value->find('td')[3]->innertext),
		            'second_stat' => trim($value->find('td')[4]->innertext),
		            'base_second_stat' => trim($value->find('td')[5]->innertext),
		            'refinement_rank1' => trim($value->find('td')[6]->plaintext),
		            'refinement_rank5' => trim($value->find('td')[7]->plaintext),
		            'image' => substr(
	    				$value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),
			    		0,
			    		strpos($value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),'png')+3
			    	)
		    	]);
	    	}
	    }
	}
	public function insertArtifact(){
		
		$url = 'https://genshin-impact.fandom.com/wiki/Artifacts';
	    $html = file_get_html($url);

	    //artifact above 2 piece bonus
	    $artifact = $html->find('table.wikitable')[7]->find('tr');
	    $i = 0;
	    foreach($artifact as $value){
	    	if(isset($value->find('td')[0])){
	    		DB::table('artifact')->insert([
	    		'onepiece'=> null,
	    		'twopiece'=> trim($value->find('td')[2]->plaintext),
	    		'fourpiece'=> trim($value->find('td')[3]->plaintext),
	    		'icon'=>substr(
	    				$value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),
			    		0,
			    		strpos($value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),'png')+3
			    	),
	    		'name' => strtolower(str_replace('’','\'',trim($value->find('td')[0]->find('a')[0]->plaintext))),
	    	]);
	    	}
	    }

	    //1 piece bonus
	    $artifact = $html->find('table.wikitable')[8]->find('tr');
	    $i = 0;
	    foreach($artifact as $value){
	    	if(isset($value->find('td')[0])){
	    		DB::table('artifact')->insert([
	    		'onepiece'=> trim($value->find('td')[3]->plaintext),
	    		'twopiece'=> null,
	    		'fourpiece'=> null,
	    		'icon'=>substr(
	    				$value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),
			    		0,
			    		strpos($value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),'png')+3
			    	),
	    		'name' => strtolower(str_replace('’','\'',trim($value->find('td')[0]->find('a')[0]->plaintext))),
	    	]);
	    	}
	    }
	}
    public function insertPlayableChar(){
 		$url = 'https://genshin-impact.fandom.com/wiki/Characters';
 		$url2 = 'https://gamewith.net/genshin-impact/article/show/22357';
	    $html = file_get_html($url);
	    $html2 = file_get_html($url2);
	    $char = $html->find('div.mw-parser-output')[0]->find('table.article-table')[0]->find('tr');
	    $char2 = $html2->find('div.genshin_cha')[0]->find('tr a');
	    //dd($char2);
	    array_shift($char);
	    //array_shift($char2);
	    $i = 0;
	    foreach($char as $value){
	    	$i += 1;
	    	$url2_to_craw = null;
	    	$icon_png = substr(
	    		$value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),
	    		0,
	    		strpos($value->find('td')[1]->find('a img')[0]->getAttribute('data-src'),'/revision')
	    	);
	    	$c_name = strtolower(str_replace('’','\'',trim($value->find('td')[2]->find('a')[0]->plaintext)));
	    	foreach($char2 as $value2){
	    		if(strtolower(str_replace('’','\'',trim($value2->find('img')[0]->getAttribute('alt')))) == $c_name){
	    			$url2_to_craw = $value2->href;
	    			break;
	    		}
	    	}
	    	DB::table('playablechar')->insert([
	    		'rarity'=> trim($value->find('td')[0]->plaintext),
	    		'icon'=>$icon_png,
	    		'name' => $c_name,
	    		'element_id' => $this->getId(isset($value->find('td')[3]->find('p')[0]->find('a')[1])? $value->find('td')[3]->find('p')[0]->find('a')[1]->innertext : 'Adaptive','element'),
	    		'weapon_type_id' => $this->getId(isset($value->find('td')[4]->find('a')[1])? $value->find('td')[4]->find('a')[1]->innertext : 'Adaptive','weapon_type'),
	    		'nation_id' => $this->getId(isset($value->find('td')[6]->find('p')[0])? $value->find('td')[6]->find('p')[0]->find('a')[0]->innertext : 'Adaptive','nation'),
	    		'sex' => $value->find('td')[5]->innertext,
	    		'url2_to_craw' => $url2_to_craw
	    	]);
	    	// insert information of char
	    	$href = $value->find('td')[2]->find('a')[0]->href;
	    	$url = 'https://genshin-impact.fandom.com'.$href;
	    	$html = file_get_html($url);

	    	$detail_info_section = $html->find('aside.portable-infobox')[0];
	    	$card_img = $detail_info_section->find('div.pi-image-collection div.pi-image-collection-tab-content')[0]->find('img')[0]->getAttribute('srcset');

			$portrait_img = $detail_info_section->find('div.pi-image-collection div.pi-image-collection-tab-content')[1]->find('img')[0]->getAttribute('srcset');

			$ingame_img = $detail_info_section->find('div.pi-image-collection div.pi-image-collection-tab-content')[2]->find('img')[0]->getAttribute('srcset');

	    	DB::table('character_information')->insert([
	    		'character_id' => $i,
	    		'full_name' => isset($detail_info_section->find('div.pi-section-contents div.pi-section-content')[0]->find('div.pi-item[data-source="fullname"]')[0])?trim($detail_info_section->find('div.pi-section-contents div.pi-section-content')[0]->find('div.pi-item[data-source="fullname"]')[0]->find('div.pi-data-value')[0]->plaintext):null,

	    		'birthday' => isset($detail_info_section->find('div.pi-section-contents div.pi-section-content')[0]->find('div.pi-item[data-source="birthday"]')[0])?trim($detail_info_section->find('div.pi-section-contents div.pi-section-content')[0]->find('div.pi-item[data-source="birthday"]')[0]->find('div.pi-data-value')[0]->plaintext):null,

	    		'special_dish' => isset($detail_info_section->find('div.pi-section-contents div.pi-section-content')[0]->find('div.pi-item[data-source="dish"]')[0])?trim($detail_info_section->find('div.pi-section-contents div.pi-section-content')[0]->find('div.pi-item[data-source="dish"]')[0]->find('div.pi-data-value')[0]->plaintext):null,


	    		'card_image' => substr(
					$card_img,
		    		0,
		    		strpos($card_img,'/revision')
		    	),
	    		'portrait_image' => substr(
					$portrait_img,
		    		0,
		    		strpos($portrait_img,'/revision')
		    	),
	    		'ingame_image' => substr(
					$ingame_img,
		    		0,
		    		strpos($ingame_img,'/revision')
		    	)
	    	]);
	    	if($url2_to_craw != null)
	    		$this->insertRecommendBuild($url2_to_craw,$i);
	    	//insert recommend_build	    
	    }
 	}
 	public function insertRecommendBuild($url,$id){
 		//$url = 'https://gamewith.net/genshin-impact/article/show/22838';
	    $html = file_get_html($url);
	    $weapon = isset($html->find('div.genshin_seiza')[1])? $html->find('div.genshin_seiza')[1]->find('tr') : $html->find('table')[2]->find('tr');

	    $artifact = isset($html->find('div.genshin_seiza')[0])? $html->find('div.genshin_seiza')[0]->find('tr') : $html->find('table')[1]->find('tr');

	    $weapon_string = '|';
	    $artifact_string = '|';
	    array_shift($weapon);
	    array_shift($artifact);
	    $special_set = array(
	    	15 => 'Wandering Troupe',
	    	5 => 'Berserker Set'
	    );
	   	foreach($weapon as $value){
	   		//dd(strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))));
	   		$weapon_db = Weapon::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
	   		if($weapon_db)
	   			$weapon_string .= $weapon_db->id.'|';
	   	}
	   	foreach($artifact as $value){
	   		//dd(strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))));
	   		$artifact_db = Artifact::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
	   		if($artifact_db)
	   			$artifact_string .= $artifact_db->id.'|';
	   	}
	   	if($weapon_string =='|' || $artifact_string =='|'){//fail 1 time
		   	$weapon = isset($html->find('div.genshin_seiza')[2])? $html->find('div.genshin_seiza')[2]->find('tr') : $html->find('table')[2]->find('tr');

		    $artifact = isset($html->find('div.genshin_seiza')[1])? $html->find('div.genshin_seiza')[1]->find('tr') : $html->find('table')[1]->find('tr');

		    $weapon_string = '|';
		    $artifact_string = '|';
		    array_shift($weapon);
		    array_shift($artifact);
		   	foreach($weapon as $value){
		   		//dd(strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))));
		   		$weapon_db = Weapon::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
		   		if($weapon_db)
		   			$weapon_string .= $weapon_db->id.'|';
		   	}
		   	foreach($artifact as $value){
		   		if(array_search(trim($value->find('td')[0]->plaintext), $special_set, true)){
				   			$artifact_db = Artifact::where('id', array_search(trim($value->find('td')[0]->plaintext), $special_set, true))->first();
				   		}
				   		else
				   			$artifact_db = Artifact::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
				   		if($artifact_db)
				   			$artifact_string .= $artifact_db->id.'|';
		   	}
		   	if($weapon_string =='|' || $artifact_string =='|'){//fail 2 time
			   	$weapon = $html->find('table')[3]->find('tr');

			    $artifact = $html->find('table')[2]->find('tr');

			    $weapon_string = '|';
			    $artifact_string = '|';
			    array_shift($weapon);
			    array_shift($artifact);
			   	foreach($weapon as $value){
			   		//dd(strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))));
			   		$weapon_db = Weapon::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
			   		if($weapon_db)
			   			$weapon_string .= $weapon_db->id.'|';
			   	}
			   	foreach($artifact as $value){
			   		if(array_search(trim($value->find('td')[0]->plaintext), $special_set, true)){
				   			$artifact_db = Artifact::where('id', array_search(trim($value->find('td')[0]->plaintext), $special_set, true))->first();
				   		}
				   		else
				   			$artifact_db = Artifact::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
				   		if($artifact_db)
				   			$artifact_string .= $artifact_db->id.'|';
			   	}
			   	if($weapon_string =='|' || $artifact_string =='|'){//fail 3 time
			   		$weapon = isset($html->find('div.genshin_seiza')[1])? $html->find('div.genshin_seiza')[1]->find('tr') : $html->find('table')[2]->find('tr');

				    $artifact = isset($html->find('div.genshin_seiza')[0])? $html->find('div.genshin_seiza')[0]->find('tr') : $html->find('table')[1]->find('tr');

				    $weapon_string = '|';
				    $artifact_string = '|';
				    array_shift($weapon);
				    array_shift($artifact);
				   	foreach($weapon as $value){
				   		//dd(strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))));
				   		$weapon_db = Weapon::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
				   		if($weapon_db)
				   			$weapon_string .= $weapon_db->id.'|';
				   	}
				   	foreach($artifact as $value){
				   		if(array_search(trim($value->find('td')[0]->plaintext), $special_set, true)){
				   			$artifact_db = Artifact::where('id', array_search(trim($value->find('td')[0]->plaintext), $special_set, true))->first();
				   		}
				   		else
				   			$artifact_db = Artifact::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
				   		if($artifact_db)
				   			$artifact_string .= $artifact_db->id.'|';
				   	}
			   	}
		   	}
	   	}
	   	//dd($artifact_string);
	   	//dd($weapon_string);
	    DB::table('recommend_build')->insert([
	    	'character_id' => $id,
	    	'weapon' => $weapon_string,
	    	'artifact' => $artifact_string
	    ]);
 		/*
 		$url = 'https://gamerjournalist.com/best-'.'barbara'.'-build-in-genshin-impact/';
	    $html = file_get_html($url);
	    dd($html);
	    $weapon = $html->find('figure.wp-block-table div.wp-table-wrapper')[0]->find('tr');
	    $artifact = $html->find('figure.wp-block-table div.wp-table-wrapper')[1]->find('tr');

	    $weapon_string = '|';
	    $artifact_string = '|';
	    array_shift($weapon);
	    array_shift($artifact);

	   	foreach($weapon as $value){
	   		$weapon_db = Weapon::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
	   		if($weapon_db)
	   			$weapon_string .= $weapon_db->id.'|';
	   	}
	   	foreach($artifact as $value){
	   		$artifact_db = Artifact::where('name', strtolower(str_replace('’','\'',trim($value->find('td')[0]->plaintext))))->first();
	   		if($artifact_db)
	   			$artifact_string .= $artifact_db->id.'|';
	   	}
	    DB::table('recommend_build')->insert([
	    	'character_id' => $id,
	    	'weapon' => $weapon_string,
	    	'artifact' => $artifact_string
	    ]);
	    */
 	}
 	public function insertDTB(){
 		
 		
 		$this->insertElement();
 		$this->insertWeaponType();
 		$this->insertWeapon();
 		$this->insertArtifact();
 		$this->insertPlayableChar();
 		
 		//$this->insertRecommendBuild('hello',2);
 	}  
}
