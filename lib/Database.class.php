<?php
/**
 * Database Singleton
 */
class Database extends PDO {
    protected static $instance;
    
    //A cache to hold prepared statements
    protected $cache;
    
    /**
     * Get instance of the PDO
     * @return PDO
     */
    static function getInstance($dsn='mysql:dbname='.DB_DATABASE.';host='.DB_HOST.'',$dbuser=DB_USER,$dbpass=DB_PASSWORD){
        if(!self::$instance){
            self::$instance = new Database($dsn,$dbuser,$dbpass);
        }
        return self::$instance;
    }
 
 function __construct($dsn,$dbuser,$dbpass) {
  parent::__construct($dsn,$dbuser,$dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->cache = array();
 }
    
    /**
     * If the statement is not cached, cache it and return PDOStatement
     * If the statement is already cached, return the cached statement
     * @return PDOStatement
     */
    function getPreparedStatment($query){
        $hash = md5($query);
        if(!isset($this->cache[$hash])){
            $this->cache[$hash] = $this->prepare($query);
        }
        return $this->cache[$hash];
    }
    
    function __destruct(){
        $this->cache = NULL;
    }
}
?>