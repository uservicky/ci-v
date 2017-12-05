<?php
class Model1 extends CI_Model{
    public function getData(){
        return 
        [['abc'=>'ABC0', 'xyz'=>'XYZ0'],
         ['abc'=>'ABC1', 'xyz'=>'XYZ1'],
         ['abc'=>'ABC2', 'xyz'=>'XYZ2']
        ];
    }
        public function getDataBase(){
       
            $this->load->database();
            $obj = $this->db->query('SELECT * FROM `test_table`');
            echo "<pre>";
            print_r($obj);
            $result = $obj->result();
           
             print_r($result);
             echo "</pre>";
            return $result;
        }
     public function getDataBase_array(){
       
            $this->load->database();
            $obj = $this->db->query('SELECT * FROM `test_table`');
            echo "<pre>";
            print_r($obj);
            $result = $obj->result_array();
            echo "</pre>";
             print_r($result);
            return $result;
        }
    public function getLogi($uname, $pword){
       
          
            $obj = $this->db->where(['uname'=>$uname, 'pword'=>$pword])
                            ->get('users');
            
            
            if($obj->num_rows())
            {
               return $obj->row()->id;
                //print_r( $obj->result());
                //return TRUE; 
            }
            else
            {
                return FALSE;
            }
        }
     public function getLogin($uname, $pword){
        return TRUE;
     }
}