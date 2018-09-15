<?php



    class Common{
        private $result_array = array();
        private $data = array();
        private $valid_params = array();
        private $keys = array();
        private $values = array();
        private $query;
        private $query_execution;
        public $select_query = false;
        
        public function __construct(){

        }

        public function set_data($key,$value){
            $this->result_array[$key] = $value;
            
        }

        public function get_data($key,$value){
            return  $this->data;
        }

        public function result(){
           
             print_r(json_encode($this->result_array));
        }

        public function get_valid_fields($table_fields,$actual_params){

            foreach($actual_params as $key => $value){
                for($i=0;$i<count($table_fields);$i++){
                    if($table_fields[$i] == $key){
                        $this->valid_params[$key] = $value;
                        $this->keys[] = $key;
                        $this->values[] = "'".$value."'";
                    }
                }
            }
            return $this->valid_params;
        }

        public function get_keys(){
            return $this->keys;
        }
        public function get_values(){
            return $this->values;
        }

        public function get_insert_query($table){

            $this->query = "INSERT INTO ".$table."(".implode(',',$this->keys).")";
            
            $this->query.="VALUES(".implode(',',$this->values).");";
            
            return $this->query;
        }

        public function get_select_query($params,$table,$condition_set = ""){
            $this->select_query = true;
            if($condition_set == '*')
                $this->query = "SELECT * FROM ".$table;
            else
                $this->query = "SELECT ".implode(',',$params)." FROM ".$table;

            if($condition_set != "*" && $condition_set != "" ){
                $this->query.= " WHERE ";
                foreach ($condition_set as $key => $value) {
                    $this->query.= $key."="."'".$value."'"." AND ";
                }
                $this->query = substr($this->query, 0, -4);
                
            }
            $this->query.=";";
            return $this->query;

        }

        public function is_session(){

                return $_SESSION['is_session'];
        }


        public function set_session($data){
            
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['name'] = $data[0]['name'];
            $_SESSION['email'] = $data[0]['email'];
            $_SESSION['image'] = $data[0]['image_url'];
            
            $_SESSION['is_session'] = true;
            
            
        }

        public function get_details(){
            if($_SESSION['is_session'])
                return array('id'=>$_SESSION['id'],'name'=>$_SESSION['name'],'email'=>$_SESSION['email'],'image'=>$_SESSION['image']);
            else
                return null;
        }
    }




?>