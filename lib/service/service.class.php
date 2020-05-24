<?php  

/**
 * service library
 */

function menubuilder($menu){
	$data_menu = [];
	$return = [];
	for($i=0 ; $i < count($menu) ; $i++){
		$data_menu += [
			'link' => 'about',
			'text' => $menu[$i]->getColumnValue('name')
		];
	}
	$return = [$data_menu];
	return $return;
    
}

function debug($data){
	
}



?>