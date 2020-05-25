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

       $menu = ['link' => 'home','text' => 'Demo blog'];


		$heading = [
			'background' => staticfile('site/images/home-bg.jpg'),
			'heading' => "I'm developer - Brons99",
			'subheading' => 'depteaivcl hahahaahahah'
		];
		$footer = [
			'twitter' => '#',
			'facebook' => 'https://www.facebook.com/dark.knight.os',
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