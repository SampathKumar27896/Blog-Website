<?php 
    include("../classes/common_class.php");
    
    class Database extends Common{
        private $query;
        private $connection;
        
        public function __construct(){
            $this->connection = new mysqli(SERVER_NAME, USER_NAME,PASSWORD,DATABASE);
            $this->check_connection($this->connection);
            
        }
        public function check_connection($con){
            if(!$con->connect_error){
                $this->set_data('connection','success');
            }
            else{
                $this->set_data('connection',$con->connect_error);
            }
        }

        public function add($table){
                
                $this->query = $this->get_insert_query($table);
                $this->execute();
        }

        public function execute(){
                
                if($this->connection->query($this->query)){
                    $this->set_data("insertion","success");
                    $this->query_execution = true;
                    
                }
                    
                else {
                    $this->set_data("error",$this->connection->error);
                    $this->query_execution = false;
                    print_r($this->connection->error);
                }
                    
        }

        public function is_success(){
            return $this->query_execution;
        }
        

        
         
    }






?>