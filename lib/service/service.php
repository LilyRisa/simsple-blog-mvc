<?php  

/**
 * service library
 */

function setSession($data){
	foreach($data as $key => $value){
		$_SESSION[$key] = $value;
	}
}

?>