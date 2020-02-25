<?php

class Form_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }





  public function Add_update_data($allData=NULL,$typ=NULL){
        


    }    

  public function fetch_Data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("Table_test");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            } 
           return $data;
        }
       return false;
   }
}
?>