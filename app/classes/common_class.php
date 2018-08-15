<?php



    class Common{
        private $result_array = array();
        private $data = array();
        private $valid_params = array();
        private $keys = array();
        private $values = array();
        private $query;
        private $query_execution;
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
    }




?>