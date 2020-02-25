<?php

class Statement_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }

function clientselect($Client_id=NULL){
      $sql = "SELECT * FROM `tbl_clients` WHERE client_id = '$Client_id'";
      $query = $this->db->query($sql);
      return $query;
}
/////////////////////////////////////////
function statement_data($Client_id=NULL){
      $sql = "SELECT * FROM `tbl_statement` WHERE client_id = '$Client_id' ORDER BY date ASC";
      $query = $this->db->query($sql);
      return $query;
}
/////////////////////////////////////////
function statement_id($id=NULL){
      $sql = "SELECT * FROM `tbl_statement` WHERE id = '$id' ORDER BY date ASC";
      $query = $this->db->query($sql);
      return $query;
}
  //--------------------------- 
    function adddata($client_id=null,$client_name=null,$Date=null,$Time=null,$Bank=null,$Amount=null,$img=null) {
        $data = array('client_name' => $client_name,
            'date' => $Date,
            'time' => $Time,
            'bank' => $Bank,
            'amount' => $Amount,
            'client_id' => $client_id,
            'slip' => $img );
            if ($this->db->insert('tbl_statement', $data)) {
                $pass = '1';
            } else {
                $pass = '0';
            }
        return $pass;
    }
    //---------------------------  
		function GetEngDate($day2){
		$dateArray = explode("-",$day2);
		//echo "Day 2 = ".$day2."<br>";
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		echo $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
	} 
}
?>