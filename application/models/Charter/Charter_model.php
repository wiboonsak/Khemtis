<?php
class Charter_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
    //-------------------------------------
    function placedataland($changeValue=null) {
		$sql = $this->db->query("SELECT distinct d.destination_place_id , p.* FROM `tbl_charterboat` AS d LEFT JOIN tbl_place_details AS p ON d.destination_place_id = p.place_id WHERE d.rout_active = 'Y' AND d.begin_place_id = '".$changeValue."' AND p.lang = 'en' ");
        return $sql;
    }
    //-------------------------------------
    function placedatalandvan($changeValue=null) {
		$sql = $this->db->query("SELECT distinct d.destination_place_id , p.* FROM `tbl_chartertransport` AS d LEFT JOIN tbl_place_details AS p ON d.destination_place_id = p.place_id WHERE d.rout_active = 'Y' AND d.begin_place_id = '".$changeValue."' AND p.lang = 'en' ");
        return $sql;
    }
     //-------------------------------------
    function getcharterboatList() {
        $sql = $this->db->query("SELECT b.begin_place_id , p.* FROM `tbl_charterboat` AS b LEFT JOIN tbl_place_details AS p ON b.begin_place_id = p.place_id    WHERE b.rout_active = 'Y' GROUP BY b.begin_place_id ");
        return $sql;
    }
     //-------------------------------------
    function getchartervanList() {
        $sql = $this->db->query("SELECT b.begin_place_id , p.* FROM `tbl_chartertransport` AS b LEFT JOIN tbl_place_details AS p ON b.begin_place_id = p.place_id  WHERE b.rout_active = 'Y'  GROUP BY b.begin_place_id ");
        return $sql;
    }
      //-------------------------------------
    function getplaceDatails($id=null,$h_lg){
        $sql = $this->db->query("SELECT * FROM `tbl_place_details` WHERE  place_id =  '$id' AND lang = 'en' ");
        return $sql;
    }
    function getLandData($idFrom,$idTo){
		 	$sql="SELECT * FROM tbl_charterboat WHERE begin_place_id ='".$idFrom."' AND destination_place_id ='".$idTo."' ";
		  $route=$this->db->query($sql);
		   return $route;
	  }
    function getvanData($idFrom,$idTo){
		 	$sql="SELECT * FROM tbl_chartertransport WHERE begin_place_id ='".$idFrom."' AND destination_place_id ='".$idTo."' ";
		  $route=$this->db->query($sql);
		   return $route;
	  }
        //--------------------------- 	 
	function listpriceland($landid=NULL){
			
		$sql="SELECT *  FROM `tbl_pricelandpoat` WHERE landtransfer_id = '".$landid."' ORDER BY transport_id ASC";
		 $query=$this->db->query($sql);
		
		return $query;		
	}
        //--------------------------- 	 
	function listpricelandvan($landid=NULL){
			
		$sql="SELECT *  FROM `tbl_pricelandtransfer` WHERE landtransfer_id = '".$landid."' ORDER BY transport_id ASC";
		 $query=$this->db->query($sql);
		
		return $query;		
	}
            //--------------------------- 	 
	function listtransportland($transport_id=NULL,$lang=NULL){
            
		$sql="SELECT a.*,b.icon_class  FROM `tbl_transport_typedetail` AS a LEFT JOIN `tbl_transport_type` AS b ON a.transport_id = b.tran_id WHERE a.transport_id = '".$transport_id."' AND a.lang = '".$lang."' AND b.transport_active = 'Y' ";
		 $query=$this->db->query($sql);
		
		return $query;		
	}
              //---------------------------
    function loadImg2($ProID) {
        $sql = $this->db->query("SELECT * FROM  tbl_transport_img WHERE tran_id ='" . $ProID . "' ORDER BY id DESC LIMIT 2 ");
        return $sql;
    }
     //---------------------------  
	function GetEngDate($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $date."&nbsp;".$monthArray[$mon]."&nbsp;".$year;
	} 
  
}
?>