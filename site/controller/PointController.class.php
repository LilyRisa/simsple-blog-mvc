<?php
/**
 * Site Index Controller
 */

class PointController extends Controller {


 function __construct() {
  parent::__construct();
 
 }
    
    function index(){

    	
        $auth = $this->Auth();

    	if($auth != null){
            $student = new Student(); 
            $list = $student->getAll();
            $point = new Point();
            $ls = $point->getAll();
    		$this->setView('admin', 'point');
            $this->setVariable('list', $list);
            $this->setVariable('ls', $ls);
            if(isset($_SESSION['byid']) && !empty($_SESSION['byid'])){
                $id = (int)$_SESSION['byid'];
                $stu =  Point::getOne(['id' => $id]);
                $this->setVariable('stu', $stu);
            }
    	}else{
    		$this->setView('admin','login');
    		$this->setVariable('footer', $footer);
    	}


    }
    public function add(){
        $point = new Point();
        // $count = $point->getCount(['student_id ' => (int)$_POST['student_id']]);
        // var_dump($_POST);
        // if($count == 0){
            $point->setColumnValue('student_id',(int)$_POST['student_id']);
            $point->setColumnValue('cnpm',(float)$_POST['cnpm']);
            $point->setColumnValue('ttnt',(float)$_POST['ttnt']);
            $point->setColumnValue('qtm',(float)$_POST['qtm']);
            $point->setColumnValue('tanc',(float)$_POST['tanc']);
            $point->setColumnValue('csdl',(float)$_POST['csdl']);
            $point->setColumnValue('btht',(float)$_POST['btht']);
            $point->save();
            echo json_encode(['status' => true]);
        // }else{
        //     echo json_encode(['status' => false]);
        // }
        
        
    }
    function update(){
        $point = Point::getByPrimaryKey((int)$_POST['id']);
        
        $point->setColumnValue('student_id',(int)$_POST['student_id']);
        $point->setColumnValue('cnpm',(float)$_POST['cnpm']);
        $point->setColumnValue('ttnt',(float)$_POST['ttnt']);
        $point->setColumnValue('qtm',(float)$_POST['qtm']);
        $point->setColumnValue('tanc',(float)$_POST['tanc']);
        $point->setColumnValue('csdl',(float)$_POST['csdl']);
        $point->setColumnValue('btht',(float)$_POST['btht']);
        $point->save();
        echo json_encode(['status' => true]);
    }



   
}
?>