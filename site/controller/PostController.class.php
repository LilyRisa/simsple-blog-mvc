<?php
/**
 * Site Index Controller
 */
class PostController extends Controller {
 
 function __construct() {
  parent::__construct();
 }
    
    function index(){
    	$id = null;
    	if(isset($_SESSION['byid']) && !empty($_SESSION['byid'])){
    		$id = (int)$_SESSION['byid'];
    		$post =  Post::getOne(['id' => $id]);
    	}
        $this->setView('', 'post');

        $menu2 = Menu::getAll();
        // var_dump($menu2 );
        $data_menu = array() ;
        foreach($menu2 as $menu){
			$data_menu = array_merge($data_menu, array(array(
				'link' => 'menu@'.$menu->getColumnValue('id'),
				'text' => $menu->getColumnValue('name')
			)));
			
		}
        
        	$menu = ['link' => 'home','text' => 'TDU'];
       
		
		// var_dump($menu2[0]->getColumnValue('id'));

		$heading = [
			'background' => staticfile('site/images/tdu.jpeg'),
			'heading' => $post ? $post->getColumnValue("title") : null,
			'subheading' => ''
		];
		$footer = [
			'twitter' => '#',
			'facebook' => 'https://www.facebook.com/CLBTinHocTDU',
			'github' => '#',
			'text' => 'Copyright © Your Website 2020'
		];
		// $post = Post::getAll();
		// echo $post;
        $this->setVariable('post', $post);
        $this->setVariable('menu', $menu);
        $this->setVariable('textheading', $heading);
        $this->setVariable('footer', $footer);
    }
   
}
?>