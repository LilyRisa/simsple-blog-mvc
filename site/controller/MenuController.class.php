<?php
/**
 * Site Index Controller
 */
class MenuController extends Controller {
 
 function __construct() {
  parent::__construct();
 }
    
    function index(){
    	$id = null;
    	if(isset($_SESSION['byid']) && !empty($_SESSION['byid'])){
    		$id = (int)$_SESSION['byid'];
    	}
    	
        $this->setView('', 'category');

        $menu2 = Menu::getAll();
        // var_dump($menu2 );
        $data_menu = array() ;
        foreach($menu2 as $menu){
			$data_menu = array_merge($data_menu, array(array(
				'link' => 'menu@'.$menu->getColumnValue('id'),
				'text' => $menu->getColumnValue('name')
			)));
			
		}
        
        	$menu = ['link' => 'home','text' => 'Demo blog'];
       
		
		// var_dump($menu2[0]->getColumnValue('id'));

		$heading = [
			'background' => staticfile('site/images/home-bg.jpg'),
			'heading' => Menu::getOne(['id' => $id])->getColumnValue('name'),
			'subheading' => ''
		];
		$footer = [
			'twitter' => '#',
			'facebook' => 'https://www.facebook.com/dark.knight.os',
			'github' => '#',
			'text' => 'Copyright © Your Website 2020'
		];
		// $post = Post::getAll();
		// echo $post;
        $this->setVariable('id', $id);
        $this->setVariable('menu', $menu);
        $this->setVariable('textheading', $heading);
        $this->setVariable('footer', $footer);
    }
   
}
?>