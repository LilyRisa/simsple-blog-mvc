<?php
/**
 * Site Index Controller
 */

class TeacherController extends Controller {

 public $auth = null;
 function __construct() {
  parent::__construct();
  if(isset($_SESSION['username'])){
  	$this->auth = $_SESSION['username'];
  }
 }
    
    function index(){
    	$footer = [
			'twitter' => '#',
			'facebook' => 'https://www.facebook.com/dark.knight.os',
			'github' => '#',
			'text' => 'Copyright © Your Website 2020'
		];
    	if($this->auth != null){
    		$this->setView('admin', 'main');
    	}else{
    		$this->setView('admin','login');
    		$this->setVariable('footer', $footer);
    	}
        echo $_SESSION['usernamer'];
        // $this->setVariable('menu', $menu);

    }

    function login(){
    	if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
    		$pass = md5($_POST['password'].'s4lt$t61N9');
    		$username = $_POST['username'];
    		
    		$user =  Teacher::getOne(['username' => $username, 'pass' => $pass]);
    		if($user->count() != 0){
    			setSession(['username' => $_POST['username']]);
    			echo json_encode(['status' => true]);
    		}else{
    			echo json_encode(['status' => false]);
    		}


    	}
    }
   
}
?>