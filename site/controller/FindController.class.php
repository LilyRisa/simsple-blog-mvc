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
        $subject = new Subject();
        $subject = $subject->getAll();
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
        $this->setVariable('subject', $subject);
        $this->setVariable('textheading', $heading);
        $this->setVariable('footer', $footer);
    }

    function search(){
    	$text = $_POST['text'];
    	$student = Student::getOne(['masv' => $_POST['text']]);
    	$subject = new Subject();
    	$point = Point::getAll(['student_id' => $student->getColumnValue('id')]);
    	$count = Point::getCount(['student_id' => $student->getColumnValue('id')]);

    	$st = [
    		'id' => $student->getColumnValue('id'),
    		'masv' => $student->getColumnValue('masv'),
    		'fullname' => $student->getColumnValue('fullname'),
    		'birthday' => $student->getColumnValue('birthday'),
    		'image' => $student->getColumnValue('image'),
    		'location' => $student->getColumnValue('location'),
    	];
    	// $p = [];
    	// // for($i=0; $i<$count; $i++){
    	// // 	$p[$i] = [
    	// // 		'name' => $subject->getOne(['id' => $point[$i]->getColumnValue('point_id')])->getColumnValue('name'),
    	// // 		'value' => $point[$i]->getColumnValue('value_point')
    	// // ];
    	// // }
    	// foreach ($variable as $key => $value) {
    	// 	# code...
    	// }
    	// var_dump($p);
    	$data = [
    		'student' => $st,
    	];
    	echo json_encode($data);



    }
   
}
?>