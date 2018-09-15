<?php 
    include("../classes/common_class.php");
    
    class Database extends Common{
        private $query;
        private $connection;
        public $query_data = array();
        private $query_result;

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
                if(!$this->select_query){
                    if($this->connection->query($this->query)){
                    
                        $this->query_execution = true;
                        
                    }
                    else {
                        $this->set_data("error",$this->connection->error);
                        $this->query_execution = false;
                        print_r($this->connection->error);
                    }
                }
                else{
                    // print_r($this->query);exit;
                    $this->query_result = $this->connection->query($this->query);
                    if($this->query_result->num_rows > 0){
                        while($row = $this->query_result->fetch_assoc()) {
                            $this->query_data[] = $row;
                        }
                    }
                    if(isset($this->query_data)){
                        $this->query_execution = true;
                    }
                }
                
                    
                
                    
        }

        public function is_success(){
            return $this->query_execution;
        }
        
        public function get_query_data(){
            return $this->query_data;
        }

        public function select_data($params,$table,$condition_set){
                $this->query = $this->get_select_query($params,$table,$condition_set);
                
                $this->execute();
                if($this->is_success())
                    return true;
        }

        
         
    }






?>