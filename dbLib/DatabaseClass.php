<?php 

/**
 * Database class 
 * function : connection with database
 */

class DatabaseClass {
	private $_host="localhost";
	private $_user="root";
	private $_pass="";
	private $_database="db_core";

	public function __construct()
	{
		# code...	
	if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_user, $this->_pass, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }           
        }    
        
        return $this->connection;
    }
}

?>