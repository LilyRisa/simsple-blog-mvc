<?php
/**
 * Site Index Controller
 */

class StudentController extends Controller {


 function __construct() {
  parent::__construct();
 
 }
    
    function index(){

    	
        $auth = $this->Auth();

    	if($auth != null){
            $student = new Student();
            $list = $student->getAll();
    		$this->setView('admin', 'student');
            $this->setVariable('list', $list);
            if(isset($_SESSION['byid']) && !empty($_SESSION['byid'])){
                $id = (int)$_SESSION['byid'];
                $stu =  Student::getOne(['id' => $id]);
                $this->setVariable('stu', $stu);
            }
    	}else{
    		$this->setView('admin','login');
    		$this->setVariable('footer', $footer);
    	}


    }
    public function add(){
        $student = new Student();
        $count = $student->getCount(['masv' => $_POST['masv']]);
        if($count == 0){
            $student->setColumnValue('masv',$_POST['masv']);
            $student->setColumnValue('fullname',$_POST['fullname']);
            $student->setColumnValue('birthday',$_POST['birthday']);
            $student->setColumnValue('image',$_POST['image']);
            $student->setColumnValue('location',$_POST['location']);
            $student->save();
            echo json_encode(['status' => true]);
        }else{
            echo json_encode(['status' => false]);
        }
        
        
    }
    function update(){
        $student = Student::getByPrimaryKey((int)$_POST['id']);
        $student->setColumnValue('masv',$_POST['masv']);
        $student->setColumnValue('fullname',$_POST['fullname']);
        $student->setColumnValue('birthday',$_POST['birthday']);
        $student->setColumnValue('image',$_POST['image']);
        $student->setColumnValue('location',$_POST['location']);
        $student->save();
        echo json_encode(['status' => true]);
    }

    function list(){
        $student = new Student();
        $list = $student->getAll();
        $collect = array();
        foreach ($list as $value) {
           array_push($collect,[
                'masv' => $value->getColumnValue('masv'),
                'fullname' => $value->getColumnValue('fullname'),
                'birthday' => $value->getColumnValue('birthday'),
                'image' => $value->getColumnValue('image'),
                'location' => $value->getColumnValue('location')
           ]);
        }
        var_dump($collect);
    }


   
}
?>