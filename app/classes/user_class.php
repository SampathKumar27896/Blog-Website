<?php
    
    
    include("../classes/database_class.php");
    class User extends Database{
        private $database;
        private $table = "users";
        private $table_fields = array("image_url","name","email");
        
        private $params = array();
        public function __construct(){
            $this->database = new Database();
            
        }
        public function login($request){
           
            $this->params = $this->database->get_valid_fields($this->table_fields,$request);
            $this->database->add($this->table);
            return $this->database->result();
        
        }
    }



?>