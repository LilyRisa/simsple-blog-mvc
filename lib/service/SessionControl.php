<?php  
 class SessionControl{

 	public static $_SESSION;

 	public static function AddSession($key,$value){
 		self::$_SESSION[$key] = $value;
 	}
 	public static function GetSession($key){
 		return self::$_SESSION[$key];
 	}
 }




?>