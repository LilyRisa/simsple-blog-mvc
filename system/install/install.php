<?php

class install{
    public $DB_HOST ;
    public $DB_USER ;
    public $DB_PASS ;
    public $DB_NAME ;
    public $TABLE_USERS ;

    public function __construct($host,$user,$pass,$name,$tuser){
            $this->DB_HOST = $host;
            $this->DB_USER = $user;
            $this->DB_PASS = $pass;
            $this->DB_NAME = $name;
            $this->TABLE_USERS = $tuser;
    }
    public function connect(){
        $db = new PDO('mysql:host='.$this->DB_HOST.';charset=utf8', $this->DB_USER, $this->DB_PASS);
        $db->setAttribute(PDO::ERRMODE_EXCEPTION,TRUE);
        
        $return = 'All done!';
        try{
            $db->exec("CREATE DATABASE IF NOT EXISTS ".$this->DB_NAME);
            $db->__construct('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME.';charset=utf8',$this->DB_USER,$this->DB_PASS);
        }catch(PDOException $e){
            $return = $e->getMessage();
        }
        return $return;
    }
    public function installtable(){
        try{
            $return = 'All table done!';
            $sql = file_get_contents('../sql/mvc.sql');
            $db->exec($sql);
            $default_username = 'admin';
            $default_fullname = 'Administrator';
            $default_email = 'admin@oneshootstyle.com';
            $default_password = md5($default_username.$default_email.'s4lt$t61N9');
            $statement = $db->prepare("INSERT INTO ".$this->TABLE_USERS."(name,password,email)VALUES(:u,:p,:e)");
            $statement->bindValue(':u',$default_username,PDO::PARAM_STR);
            $statement->bindValue(':p',$default_password,PDO::PARAM_STR);
            $statement->bindValue(':e',$default_email,PDO::PARAM_STR);
            $statement->bindValue(':f',$default_fullname,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
            $return = $e->getMessage();
        }
        return $return;
    }
}


// echo "All done";
