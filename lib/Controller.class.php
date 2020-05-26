<?php
/**
 * Base Controller class
 */
class Controller {
 
    protected $template;
    
 function __construct() {
  $this->template = new Template();
 }
    
    function index(){
        error_log("Controller[".get_called_class()."] index method is not defined");
    }
    
    protected function setView($folder,$file){
        $this->template->set($folder,$file);
    }
    protected function setVariable($key,$value){
        $this->template->setVariable($key,$value);
    }

    protected function Auth($data=null){

        if($data != null){
            $pass = md5($data['password'].'s4lt$t61N9');
            $username = $data['username'];
            $user =  Teacher::getOne(['username' => $username, 'pass' => $pass]);
            if($user->count() != 0){
                SetStorage($data);
                return true;
            }else{
                return false;
            }
        }else{
           $auth = GetStorage();
           if($auth != null){
            return true;
           }else{
            return false;
           }
            
        }
        
        
    }
    protected function AuthOut(){
        SetStorage([]);
    }

    function __destruct(){
        $this->template->render();
    }
}
?>