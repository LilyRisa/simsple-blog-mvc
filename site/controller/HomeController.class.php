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

       $menu = ['link' => 'home','text' => 'TDU'];


		$heading = [
			'background' => staticfile('site/images/tdu.jpeg'),
			'heading' => "Chân - chính - chuyên - chất",
			'subheading' => 'HỌC ĐỂ BIẾT, HỌC ĐỂ LÀM, HỌC ĐỂ CHUNG SỐNG, HỌC ĐỂ KHẲNG ĐỊNH MÌNH'
		];
		$footer = [
			'twitter' => '#',
			'facebook' => 'https://www.facebook.com/CLBTinHocTDU',
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