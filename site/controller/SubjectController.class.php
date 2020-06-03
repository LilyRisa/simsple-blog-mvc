<?php
/**
 * Site Index Controller
 */

class SubjectController extends Controller {


 function __construct() {
  parent::__construct();
 
 }
    
    function index(){

    	
        $auth = $this->Auth();

    	if($auth != null){
            $subject = new Subject(); 
            $list = $subject->getAll();
    		$this->setView('admin', 'subject');
            $this->setVariable('list', $list);
            if(isset($_SESSION['byid']) && !empty($_SESSION['byid'])){
                $id = (int)$_SESSION['byid'];
                $sb =  Subject::getOne(['id' => $id]);
                $this->setVariable('sb', $sb);
            }
    	}else{
    		$this->setView('admin','login');
    		$this->setVariable('footer', $footer);
    	}


    }
    public function add(){
        $subject = new Subject();
        $check = $subject->getCount(['name' => $_POST['name']]);
        if($check == 0){
            $subject->setColumnValue('name',$_POST['name']);
            $subject->save();
            echo json_encode(['status' => true]);
        }else{
            echo json_encode(['status' => false]);
        }
        
        
    }
    function update(){
        $point = Subject::getByPrimaryKey((int)$_POST['id']);
        $point->setColumnValue('name',$_POST['name']);
        $point->save();
        echo json_encode(['status' => true]);
    }



   
}
?>