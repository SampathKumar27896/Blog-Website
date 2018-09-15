<?php
    
    
    include("../classes/database_class.php");
    
    class User extends Database{
        private $database;
        private $table = "users";
        private $table_fields = array("image_url","name","email","created_at","modified_at");
        private $user_data;
        private $params = array();
        private $user;
        private $temp;
        public function __construct(){
            $this->database = new Database();
            
        }
        public function login($request){
           
            $this->params = $this->database->get_valid_fields($this->table_fields,$request);
            $this->temp = $this->check_already_registered($this->params);
            if(!$this->temp){
                //$this->database->add($this->table);

                $this->set_data("message","User not Registered");
            }
                
            else{
                
                $this->database->set_data("message","User successfully Logged in");
                $this->database->set_session($this->database->get_query_data());
            }
            return $this->database->result();
        
        }

        public function check_already_registered($params){
            // print_r("Check heer");exit;
            $condition_set='*';
            
            $this->user = $this->database->select_data($params,$this->table,$condition_set);
            if($this->user){
                return true;
            }
            else{
                return false;
            }
        }
    }



?>