<?php
/**
 * Site Index Controller
 */
class FindController extends Controller {
 
 function __construct() {
  parent::__construct();
 }
    
    function index(){
        $this->setView('', 'find');
        $menu2 = Menu::getAll();

       $menu = ['link' => 'home','text' => 'TDU'];


		$heading = [
			'background' => staticfile('site/images/tdu.jpeg'),
			'heading' => "Xem điểm sinh viên",
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
        $this->setVariable('menu', $menu);
        $this->setVariable('textheading', $heading);
        $this->setVariable('footer', $footer);
    }

    function search(){
    	$text = $_POST['text'];
    	$student = Student::getOne(['masv' => $_POST['text']]);
    	$point = Point::getOne(['student_id' => $student->getColumnValue('id')]);

    	$st = [
    		'masv' => $student->getColumnValue('masv'),
    		'fullname' => $student->getColumnValue('fullname'),
    		'birthday' => $student->getColumnValue('birthday'),
    		'image' => $student->getColumnValue('image'),
    		'location' => $student->getColumnValue('location'),
    	];
    	$p = [
    		'cnpm' => $point->getColumnValue('cnpm').' '.pointAlpha($point->getColumnValue('cnpm')),
    		'ttnt' => $point->getColumnValue('ttnt').' '.pointAlpha($point->getColumnValue('ttnt')),
    		'qtm' => $point->getColumnValue('qtm').' '.pointAlpha($point->getColumnValue('qtm')),
    		'tanc' => $point->getColumnValue('tanc').' '.pointAlpha($point->getColumnValue('tanc')),
    		'csdl' => $point->getColumnValue('csdl').' '.pointAlpha($point->getColumnValue('csdl')),
    		'btht' => $point->getColumnValue('btht').' '.pointAlpha($point->getColumnValue('btht')),
    	];

    	$data = [
    		'student' => $st,
    		'point' => $p
    	];
    	echo json_encode($data);



    }
   
}
?>