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
            $subject = new Subject();
            $sb = $subject->getAll();
            $ls = $point->getAll();
    		$this->setView('admin', 'point');
            $this->setVariable('list', $list);
            $this->setVariable('ls', $ls);
            $this->setVariable('sb', $sb);
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
    public function get(){
        $point = new Point();
        // $result = $point->get('select * from st_point where student_id=:st AND point_id=:pi',array('st'=>(int)$_POST['student_id'],'pi'=>(int)$_POST['point_id']));
        $check = $point->getCount(array('student_id'=>(int)$_POST['student_id'],'point_id'=>(int)$_POST['point_id']));
        // var_dump($check);
        if($check == 0){
            $data = [
                'student_id' =>null,
                'point_id' => null,
                'value_point' => null
            ];
            echo json_encode($data);
        }else{
            $result = $point->getOne(array('student_id'=>(int)$_POST['student_id'],'point_id'=>(int)$_POST['point_id']));
            // var_dump($result);
            $data = [
                'student_id' => $result->getColumnValue('student_id'),
                'point_id' => $result->getColumnValue('point_id'),
                'value_point' => $result->getColumnValue('value_point')
            ];

            echo json_encode($data);
        }
        
    }
    public function getfont(){
        $point = new Point();
        // $result = $point->get('select * from st_point where student_id=:st AND point_id=:pi',array('st'=>(int)$_POST['student_id'],'pi'=>(int)$_POST['point_id']));
        $check = $point->getCount(array('student_id'=>(int)$_POST['student_id'],'point_id'=>(int)$_POST['point_id']));
        // var_dump($check);
        if($check == 0){
            $data = [
                'student_id' =>null,
                'point_id' => null,
                'value_point' => null
            ];
            echo json_encode($data);
        }else{
            $result = $point->getOne(array('student_id'=>(int)$_POST['student_id'],'point_id'=>(int)$_POST['point_id']));
            // var_dump($result);
            $data = [
                'student_id' => $result->getColumnValue('student_id'),
                'point_id' => $result->getColumnValue('point_id'),
                'value_point' => $result->getColumnValue('value_point'),
                'point_alpha' => pointAlpha((float)$result->getColumnValue('value_point'))
            ];

            echo json_encode($data);
        }
        
    }
    public function add(){
        $point = new Point();
        // var_dump($_POST);
        $count = $point->getCount(array('student_id'=>(int)$_POST['student_id'],'point_id'=>(int)$_POST['point_id']));
        // var_dump($_POST);
        if($count == 0){
            $point->setColumnValue('student_id',(int)$_POST['student_id']);
            $point->setColumnValue('point_id',(int)$_POST['point_id']);
            $point->setColumnValue('value_point',(float)$_POST['value_point']);
            $point->save();
            echo json_encode(['status' => true]);
        }else{
            echo json_encode(['status' => false]);
        }
        
        
    }
    function update(){
         $point = new Point();
        // var_dump($_POST);
        $check = $point->getOne(array('student_id'=>(int)$_POST['student_id'],'point_id'=>(int)$_POST['point_id']));
        // echo $check->getColumnValue('id');
        $update_point = Point::getByPrimaryKey($check->getColumnValue('id'));

        $update_point->setColumnValue('value_point',(float)$_POST['value_point']);
        $update_point->save();
        echo json_encode(['status' => true]);

    }



   
}
?>