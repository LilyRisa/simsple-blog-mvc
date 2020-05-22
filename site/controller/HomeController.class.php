<?php
/**
 * Site Index Controller
 */
class HomeController extends Controller {
 
 function __construct() {
  parent::__construct();
 }
    
    function index(){
        $this->setView('', 'main');
        $menu2 = Menu::getAll();
        for($i=0 ; $i < count($menu2) ; $i++){
			$data_menu += [
				'link' => 'about',
				'text' => $menu2[$i]->getColumnValue('name')
			];
		}
        
        	$menu = [
				'title' => [
					'link' => 'home',
					'text' => 'Demo blog'
				],
				'menu' => [
					
					$data_menu
				]
			];
        
        
		
		// var_dump($menu2[0]->getColumnValue('id'));

		$heading = [
			'background' => staticfile('site/images/home-bg.jpg'),
			'heading' => 'Bui Van Minh',
			'subheading' => 'depteaivcl hahahaahahah'
		];
		$footer = [
			'twitter' => '#',
			'facebook' => '#',
			'github' => '#',
			'text' => 'Copyright © Your Website 2020'
		];
		// $post = Post::getAll();
		// echo $post;
        $this->setVariable('menu', $menu);
        $this->setVariable('textheading', $heading);
        $this->setVariable('footer', $footer);
    }
   
}
?>