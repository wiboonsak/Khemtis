<?php
class Routetranfer_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
//-------------------------------
   function getRouteData($idFrom,$idTo){
		 	//$sql="SELECT * FROM tbl_route_data WHERE begin_place_id ='".$idFrom."' AND destination_place_id ='".$idTo."' ORDER BY  " ;  b.begin_place_id = '' AND b.destination_place_id transfer_m_time tbl_route_timeTable
//		  
//		  $sql=" SELECT a.id AS TimeTableID , a.* ,b.id AS RouteID , b.route_name_en , b.partner_id , b.partner_route_id , b.partner_travel_by  , b.partner_travel_type  "
//			  ." FROM  tbl_route_timeTable AS a "
//			  ." LEFT JOIN tbl_route_data AS b ON a.route_id = b.id "
//			  ." WHERE a.route_id IN (SELECT id FROM tbl_route_data WHERE begin_place_id = '".$idFrom."' AND  destination_place_id='".$idTo."' ) "
//			  ." ORDER BY a.arrive_time  ASC "
//			  ."";
	 $sql="SELECT a.id AS TimeTableID , a.* ,b.route_id AS RouteID , c.route_name FROM  tbl_transport_route_timeTable AS a  LEFT JOIN tbl_transport_route_data AS b ON a.route_id = b.route_id 
LEFT JOIN tbl_transport_route_data_detail AS c ON b.route_id = c.route_id WHERE a.route_id IN (SELECT route_id FROM tbl_transport_route_data WHERE begin_place_id = '".$idFrom."' AND  destination_place_id = '".$idTo."') ORDER BY a.arrive_time  ASC";	  
       
		  $route=$this->db->query($sql);
		   return $route;
	  } 
   //-------------------------------------
    function getrouteList() {
        $sql = $this->db->query("SELECT b.begin_place_id , p.* FROM `tbl_transport_route_data` AS b LEFT JOIN tbl_place_details AS p ON b.begin_place_id = p.id    WHERE b.route_active = 'Y' GROUP BY b.begin_place_id ");
        return $sql;
    }
                    //---------------------------
    function list_placeData($currentID = NULL) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_place_details` WHERE id = '$currentID' AND lang = 'en' " ;
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_place_details` WHERE lang = 'en'";
            $query = $this->db->query($sql);
        }
        return $query;
    }
        //-------------------------------------
    function placedataupdate($changeValue=null) {
        $sql = $this->db->query("SELECT distinct d.destination_place_id , p.* FROM `tbl_transport_route_data` AS d LEFT JOIN tbl_place_details AS p ON d.destination_place_id = p.id    WHERE  d.route_active = 'Y' AND d.begin_place_id = '".$changeValue."' ");
        return $sql;
    }
    //-------------------------------------
    function getplaceDatails($id=null,$h_lg){
        $sql = $this->db->query("SELECT * FROM `tbl_place_details` WHERE  id =  '$id' ");
        return $sql;
    }
          //---------------------------  
	function GetEngDateTimeshot($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		$s = $date."&nbsp;".$monthArray[$mon]."&nbsp;".$year;
                return $s;
                } 
                //---------------------------
	function checkRoute($begin_place=NULL,$destination_place=NULL){
		
		 $sql = "SELECT route_id FROM `tbl_transport_route_data` WHERE begin_place_id = '".$begin_place."' AND destination_place_id = '".$destination_place."' AND route_active = 'Y' ";
        $query = $this->db->query($sql);

		return $query;	 
	}











function gettime_max_min($idtime){
    $sql1 = "SELECT tbl_transport_detailFor_timeTable.arrive_time FROM tbl_transport_detailFor_timeTable WHERE tbl_transport_detailFor_timeTable.id =(SELECT MIN(tbl_transport_detailFor_timeTable.id)  FROM  tbl_transport_detailFor_timeTable WHERE  tbl_transport_detailFor_timeTable.timeTable_id = $idtime)
    AND tbl_transport_detailFor_timeTable.timeTable_id = $idtime";
    $sql2 = "SELECT tbl_transport_detailFor_timeTable.depart_time FROM tbl_transport_detailFor_timeTable WHERE tbl_transport_detailFor_timeTable.id =(SELECT MAX(tbl_transport_detailFor_timeTable.id)  FROM  tbl_transport_detailFor_timeTable WHERE  tbl_transport_detailFor_timeTable.timeTable_id = $idtime)
    AND tbl_transport_detailFor_timeTable.timeTable_id = $idtime";
    $d1 = $this->db->query($sql1)->result();
    $d2 = $this->db->query($sql2)->result();
    $time_st="00.00";
    $time_en="00.00";
    foreach ($d1 as $value1){$time_st=$value1->arrive_time;}
    foreach ($d2 as $value2){$time_en=$value2->depart_time;}
    $data = array();
     array_push($data,$time_st,$time_en);  
    return $data;
}





function tbl_transport_route_data_code($begin,$dest){
$sql = "SELECT 
tbl_clients.client_name,
tbl_transport_route_data.route_id,
(SELECT CONCAT(sum(tbl_transport_detailFor_timeTable.price),'=',sum(tbl_transport_detailFor_timeTable.price_children)) FROM tbl_transport_detailFor_timeTable  WHERE tbl_transport_detailFor_timeTable.timeTable_id = tbl_transport_route_timeTable.id) AS num_price,
CONCAT(tbl_transport_route_type.transfer_h_time,':',tbl_transport_route_type.transfer_m_time) as dura,
tbl_transport_route_timeTable.id as id_time,
GROUP_CONCAT(tbl_transport_typedetail.transport_name ORDER BY tbl_transport_route_type.id ASC) tran_name,
(SELECT tbl_place_details.place_title FROM tbl_place_details WHERE tbl_place_details.id = tbl_transport_route_data.begin_place_id) as name_begin ,
(SELECT tbl_place_details.place_title FROM tbl_place_details WHERE tbl_place_details.id =  tbl_transport_route_data.destination_place_id) as name_end  FROM tbl_transport_route_data
JOIN tbl_transport_route_type on tbl_transport_route_type.route_id = tbl_transport_route_data.route_id
JOIN tbl_transport_type on tbl_transport_type.tran_id = tbl_transport_route_type.transport_id 
JOIN tbl_transport_typedetail on tbl_transport_typedetail.transport_id =tbl_transport_type.tran_id AND  tbl_transport_typedetail.lang = 'en'
JOIN tbl_transport_route_timeTable on tbl_transport_route_timeTable.route_id = tbl_transport_route_data.route_id
JOIN tbl_clients on tbl_clients.client_id = tbl_transport_route_data.client_id
    WHERE
    (tbl_transport_route_data.begin_place_id = $begin  AND tbl_transport_route_data.destination_place_id=$dest)
    GROUP BY 
    tbl_clients.client_name,
    tbl_transport_route_data.route_id,
    CONCAT(tbl_transport_route_type.transfer_h_time,':',tbl_transport_route_type.transfer_h_time),
    (SELECT tbl_place_details.place_title FROM tbl_place_details WHERE tbl_place_details.id = tbl_transport_route_data.begin_place_id),
    (SELECT tbl_place_details.place_title FROM tbl_place_details WHERE tbl_place_details.id = tbl_transport_route_data.destination_place_id) 
     ORDER BY  tbl_transport_route_type.id ASC   
    ";
     return $this->db->query($sql)->result();
}




function  get_transport_detail($route_id){
    $sql = "SELECT 
tbl_transport_detailFor_timeTable.arrive_time,
tbl_transport_detailFor_timeTable.depart_time,
(SELECT tbl_place_details.place_title FROM tbl_place_details WHERE tbl_place_details.id = tbl_transport_detailFor_timeTable.begin_place_id  ) as name_st,
(SELECT tbl_place_details.place_title FROM tbl_place_details WHERE tbl_place_details.id = tbl_transport_detailFor_timeTable.destination_place_id) as name_en,
tbl_transport_typedetail.transport_name,
tbl_transport_detailFor_timeTable.note_checkin_th,
tbl_transport_detailFor_timeTable.note_checkin_en,
tbl_transport_detailFor_timeTable.price,
tbl_transport_detailFor_timeTable.price_children
FROM `tbl_transport_route_data`
JOIN tbl_transport_route_timeTable on tbl_transport_route_timeTable.route_id = tbl_transport_route_data.route_id
JOIN tbl_transport_detailFor_timeTable on tbl_transport_detailFor_timeTable.timeTable_id = tbl_transport_route_timeTable.id
JOIN tbl_transport_typedetail on (tbl_transport_typedetail.transport_id = tbl_transport_detailFor_timeTable.transport_id AND tbl_transport_typedetail.lang='en')
WHERE tbl_transport_route_data.route_id = $route_id
ORDER BY tbl_transport_detailFor_timeTable.id ASC";
    return $this->db->query($sql)->result();
}






















        //---------------------------  
	function get_routeType($route_id=NULL, $key=NULL, $rout_active=NULL, $group=NULL, $order=NULL, $limit=NULL){
		
		//SELECT * FROM `tbl_route_type` WHERE route_id = '2' AND key_group = '1' AND rout_active = '1' ORDER BY id ASC			
		
        // eidt

		if($rout_active !=''){
			$this->db->where('rout_active', $rout_active);
		}		
		if($route_id !=''){
			$this->db->where('route_id', $route_id);
		}
		if($key !=''){
			$this->db->where('key_group', $key);
		}
		
		$this->db->select('*');
		if($group !=''){		
			$this->db->group_by('key_group');
		}		
		$this->db->order_by($order,'asc');
		if($limit !=''){
			$this->db->limit(1);
		}
		$query = $this->db->get('tbl_transport_route_type');
		

		return $query;		
	}
        	//---------------------------	
	function count_detailTimeTable($route_id=NULL,$key_group=NULL){
		
		$sql = "SELECT t.* , d.* FROM `tbl_transport_route_timeTable` AS t LEFT JOIN tbl_transport_detailFor_timeTable AS d ON t.id = d.timeTable_id WHERE t.route_id = '".$route_id."' AND t.route_type_id = '".$key_group."' AND t.data_status = '1' AND d.data_status = '1' ";
        $query = $this->db->query($sql);					
		return $query;	 
	} 
        	//--------------------------- 	 
	function listTransport($dataID=NULL){
	    $sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_typedetail.transport_id = '".$dataID."' AND tbl_transport_typedetail.lang = 'en'";
                $query = $this->db->query($sql);
		return $query;		
	}
        //---------------------------  
	function get_timeDetail($route_id=NULL, $key=NULL, $data_status=NULL, $limit=NULL, $dataID=NULL,$date_f){	
		

    $txt_limit = "";
    $txt_filter = "";
		if($data_status !=''){
			//$this->db->where('data_status', $data_status);
            $txt_filter = $txt_filter." AND data_status = '$data_status'";
		}		
		if($route_id !=''){
			//$this->db->where('route_id', $route_id);
            $txt_filter = $txt_filter." AND tbl_transport_route_data.route_id = $route_id";
		}
		if($key !=''){
			//$this->db->where('route_type_id', $key);
            $txt_filter = $txt_filter." AND route_type_id = $key";
		}
		if($dataID !=''){
			//$this->db->where('id', $dataID);
            $txt_filter = $txt_filter." AND id = $dataID";
		}		
		///$this->db->select('*');				
		//$this->db->order_by('arrive_time','asc');
		if($limit !=''){
			//$this->db->limit(1);
            //$txt_limit = "limit 1";
		}
		$query = $this->db->get('tbl_transport_route_timeTable');
//$txt_filter = substr($txt_filter,4);
         $sql ="SELECT *,
CURRENT_TIME() as curtime,
TIME_FORMAT(CONCAT(tbl_transport_route_timeTable.arrive_time,':',SECOND(CURRENT_TIME())), '%H:%i:%s')  as tm_var,
CONCAT(CURDATE(),' ',TIME_FORMAT(CONCAT(HOUR(CURRENT_TIME()),':',SECOND(CURRENT_TIME())), '%H:%i:%s')) as d1,
CONCAT('".$date_f."',' ',TIME_FORMAT(CONCAT(arrive_time,':',SECOND(CURRENT_TIME())), '%H:%i:%s')) as d2,
(TIMESTAMPDIFF(HOUR, 
               CONCAT(CURDATE(),' ',TIME_FORMAT(CONCAT(HOUR(CURRENT_TIME()),':',SECOND(CURRENT_TIME())), '%H:%i:%s')), 
               CONCAT('".$date_f."',' ',TIME_FORMAT(CONCAT(tbl_transport_route_timeTable.arrive_time,':',SECOND(CURRENT_TIME())), '%H:%i:%s'))
 )) as tmst
FROM `tbl_transport_route_timeTable`
JOIN tbl_transport_route_data on tbl_transport_route_data.route_id = tbl_transport_route_timeTable.route_id
JOIN tbl_services on tbl_services.client_id = tbl_transport_route_data.client_id 

 WHERE
(TIMESTAMPDIFF(HOUR, 
               CONCAT(CURDATE(),' ',TIME_FORMAT(CONCAT(HOUR(CURRENT_TIME()),':',SECOND(CURRENT_TIME())), '%H:%i:%s')), 
               CONCAT('".$date_f."',' ',TIME_FORMAT(CONCAT(tbl_transport_route_timeTable.arrive_time,':',SECOND(CURRENT_TIME())), '%H:%i:%s'))
 )) >=24 and tbl_services.service_cd = 'TRANSPORT' and tbl_services.st = 0 
  $txt_filter
  order by tbl_transport_route_timeTable.arrive_time asc $txt_limit";
       return $this->db->query($sql)->result();

		//return $query;		
	}
        //--------------------------- 
	function getPrice($timeTable_id=NULL, $field=NULL, $data_status=NULL, $data_order=NULL){
		
		if($data_order !=''){
			$txt = "AND data_order = '".$data_order."' ";
		
		} else {
			$txt ='';
		}
		
		$sql = "SELECT SUM($field) AS price FROM `tbl_transport_detailFor_timeTable` WHERE timeTable_id = '".$timeTable_id."' AND data_status = '".$data_status."' $txt ";
		$query = $this->db->query($sql);
        $row=$query->row();
		$pass = $row->price;
		
		return $pass;	 
	}
        	 	//---------------------------	
	function gettimechselect(){
		$sql = "SELECT *, tbl_transport_route_timeTable.arrive_time,TIME_FORMAT(DATE_ADD(NOW(), INTERVAL 2 HOUR),'%H:%i') AS time_next FROM tbl_transport_route_timeTable WHERE tbl_transport_route_timeTable.arrive_time >= TIME_FORMAT(DATE_ADD(NOW(), INTERVAL 2 HOUR),'%H:%i') ";
        $query = $this->db->query($sql);					
		return $query;	 
	}
        	   //---------------------------
	function checkDetail($timeTable_id=NULL,$data_status=NULL){
		
		if($timeTable_id !=''){
			$this->db->where('timeTable_id', $timeTable_id);
		}
		if($data_status !=''){
			$this->db->where('data_status', $data_status);
		}				
		$this->db->select('*');
		$this->db->order_by('data_order','asc');
                //$this->db->limit('1');
		$query = $this->db->get('tbl_transport_detailFor_timeTable');
		
		return $query;		
	}
        //---------------------------  
	function listRoute($rout_active=NULL,$dataID=NULL){
		
		if($rout_active !=''){
			$this->db->where('route_active', $rout_active);
		}
		/*if($paper_no !=''){
			$this->db->where('paper_no', $paper_no);
		}*/
		if($dataID !=''){
			$this->db->where('route_id', $dataID);
		}
		
		$this->db->select('*');
		$this->db->order_by('route_id');
		$query = $this->db->get('tbl_transport_route_data');
		
		return $query;		
	}
            //--------------------------------
    function generateRandomString() {
		$alphabet = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
           //------------------------------ 
	function check_keygroup($keygroup=NULL){
		$sql = "SELECT * FROM `tbl_pre_transport_booking_title` WHERE transfer_keygroup ='".$keygroup."' ";
        $query = $this->db->query($sql);
		$numkeygroup = $query->num_rows();			
		return $numkeygroup;		
	}
           //=----------------------------
    function getkeygroup(){
    	return "TS0123";
    }

    function selecttrip(
    	$idclient=NULL,
    	$nadult=NULL,
    	$nchild=NULL,
    	$TimeIDGo=NULL,
    	$Drid=NULL,
    	$DTotalPrice=NULL,
    	$DAdultPrice=NULL,
    	$DChildPrice=NULL,
    	$TimeIDBack=Null,
    	$Rrid=NULL,
    	$RTotalPrice=null,
    	$RAdultPrice=Null,
        $RChildPrice=Null,
        $travelRound=Null,
        $keygroup=Null,
        $d1,$d2,
        $DepartDuration,$ReturnDuration,$time_dep,$time_arr,$pra_dep,$prc_dep,$pra_ret,$prc_ret,$pra_dep_ar,$pra_rep_ar) 
     {

$session_tranfer_bookid = $this->session->userdata('session_tranfer_bookid');
$today = date("Y-m-d H:i:s");

if($session_tranfer_bookid!=""){
$sec_gp_book =$this->session->userdata('sec_gp_book');
$this->db->where('id_gp_booking', $sec_gp_book);
$this->db->where('book_type','TS');
$this->db->delete('tbl_gp_booking_detail');

$this->db->where('booking_id', $session_tranfer_bookid);
$this->db->delete('tbl_pre_transport_booking_detail');

        $data = array(
            'client_id' => $idclient,
            'transfer_keygroup' => $keygroup,
            'tranfer_round' => '1',
            'cf_status' => '0',
            'checkin_data_dep' => $pra_dep_ar,
            'checkin_data_ret' => $pra_rep_ar);

$this->db->where('id', $session_tranfer_bookid);
if($this->db->update('tbl_pre_transport_booking_title', $data)) {

$time_dep = explode('-',$time_dep);
$time_arr = explode('-',$time_arr);

 $booking_id = $session_tranfer_bookid;
 $data1 = array(
            'booking_id' => $booking_id,
            'route_id' => $Drid,
            'route_type_id' =>1,
            'time_id' => $TimeIDGo,
            'date_depart' => $d1,
            'date_return' => $d2,
            'adult_traveller' => $nadult,
            'child_traveller' => $nchild,
            'adult_price' => $DAdultPrice,
            'child_price' => $DChildPrice,
            'total_price' => $DTotalPrice,
            'cust_checkin_plac' => 0,
            'date_booking' => $today,
            'set_depart' => 0,
            'transport_ty' => 1,
            'duration' =>$DepartDuration,
            'time_st' =>$time_dep[0],
            'time_en' =>$time_dep[1],
            'ad_txt' =>$pra_dep,
            'ch_txt' =>$prc_dep
        );
  
        if($this->db->insert('tbl_pre_transport_booking_detail', $data1)) {
           $this->add_gp($this->db->insert_id());
        if($Rrid>0){
          $data2 = array(
            'booking_id' => $booking_id,
            'route_id' => $Rrid,
            'route_type_id' =>1,
            'time_id' => $TimeIDBack,
            'date_depart' => $d1,
            'date_return' => $d2,
            'adult_traveller' => $nadult,
            'child_traveller' => $nchild,
            'adult_price' => $RAdultPrice,
            'child_price' => $RChildPrice,
            'total_price' => $RTotalPrice,
            'cust_checkin_plac' => 0,
            'date_booking' => $today,
            'set_depart' => 0,
            'transport_ty' => 2,
            'duration' =>$ReturnDuration,
            'time_st' =>$time_arr[0],
            'time_en' =>$time_arr[1],
            'ad_txt' =>$pra_ret,
            'ch_txt' =>$prc_ret           
         );
             if($this->db->insert('tbl_pre_transport_booking_detail', $data2)) {
             	$this->add_gp($this->db->insert_id());
                $pass = 1;
             }
          }
                $pass = 1;
            } else {
                $pass = 0;
            }
      }



}else{  // ตรวจสอบค่าเดิมของ sesssion ทุกครั้ง

$time_dep = explode('-',$time_dep);
$time_arr = explode('-',$time_arr);
        $data = array(
            'client_id' => $idclient,
            'transfer_keygroup' => $keygroup,
            'tranfer_round' => '1',
            'cf_status' => '0',
            'checkin_data_dep' => $pra_dep_ar,
            'checkin_data_ret' => $pra_rep_ar);


if($this->db->insert('tbl_pre_transport_booking_title', $data)) {
	 $booking_id = $this->db->insert_id();     
          $data1 = array(
            'booking_id' => $booking_id,
            'route_id' => $Drid,
            'route_type_id' =>1,
            'time_id' => $TimeIDGo,
            'date_depart' => $d1,
            'date_return' => $d2,
            'adult_traveller' => $nadult,
            'child_traveller' => $nchild,
            'adult_price' => $DAdultPrice,
            'child_price' => $DChildPrice,
            'total_price' => $DTotalPrice,
            'cust_checkin_plac' => 0,
            'date_booking' => $today,
            'set_depart' => 0,
            'transport_ty' => 1,
            'duration' =>$DepartDuration,
            'time_st' =>$time_dep[0],
            'time_en' =>$time_dep[1],
            'ad_txt' =>$pra_ret,
            'ch_txt' =>$prc_ret    
        );
        if($this->db->insert('tbl_pre_transport_booking_detail', $data1)) {
           $this->add_gp($this->db->insert_id());
        if($Rrid>0){
          $data2 = array(
            'booking_id' => $booking_id,
            'route_id' => $Rrid,
            'route_type_id' =>1,
            'time_id' => $TimeIDBack,
            'date_depart' => $d1,
            'date_return' => $d2,
            'adult_traveller' => $nadult,
            'child_traveller' => $nchild,
            'adult_price' => $RAdultPrice,
            'child_price' => $RChildPrice,
            'total_price' => $RTotalPrice,
            'cust_checkin_plac' => 0,
            'date_booking' => $today,
            'set_depart' => 0,
            'transport_ty' => 2,
            'duration' =>$ReturnDuration,
            'time_st' =>$time_arr[0],
            'time_en' =>$time_arr[1],
            'ad_txt' =>$pra_ret,
            'ch_txt' =>$prc_ret       
         );
             if($this->db->insert('tbl_pre_transport_booking_detail', $data2)) {
             	$this->add_gp($this->db->insert_id());
                $pass = 1;
                $this->setsestion($booking_id);
             }
          }
                $pass = 1;
            } else {
                $pass = 0;
            }
          }
}

     return $pass;
}

function add_gp($id_run){
	
	  $sec_gp_book =$this->session->userdata('sec_gp_book');

      $data_gp = array(
                    "id_booking" =>$id_run,
                    "id_gp_booking" =>$sec_gp_book,
                    "book_type" =>'TS',
              );
              if($this->db->insert("tbl_gp_booking_detail",$data_gp)){
       }
}



function setsestion($booking_id){
	             $data = array(
            	    'session_tranfer_bookid' => $booking_id,
                    );
                 $this->session->set_userdata($data);
}


        //---------------------------------------
	function getbooking_title($key_group=NULL){
            if($key_group!=''){
		$sql = "SELECT a.* ,b.booking_id, b.route_id,b.route_type_id,b.time_id,b.date_depart,b.date_return,b.adult_traveller,b.child_traveller,b.adult_price,b.child_price,b.total_price FROM `tbl_pre_transport_booking_title` AS a LEFT JOIN `tbl_pre_transport_booking_detail` AS b ON a.id = b.booking_id WHERE a.transfer_keygroup = '".$key_group."' ";
        $query = $this->db->query($sql);
            }else{
                $sql = "SELECT a.* , b.route_id,b.route_type_id,b.time_id,b.date_depart,b.adult_traveller,b.child_traveller,b.adult_price,b.child_price,b.total_price,b.date_booking FROM `tbl_pre_transport_booking_title` AS a LEFT JOIN `tbl_pre_transport_booking_detail` AS b ON a.id = b.booking_id WHERE cf_status !='0'AND booking_status = '0' AND cf_status !='3' ORDER BY b.date_booking DESC ";
        $query = $this->db->query($sql);
            }
		return $query;	 
	} 
         //---------------------------  
	function GetEngDateTime2($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $monthArray[$mon]."&nbsp;".$date.","."&nbsp;".$year;
	}
    //=----------------
    function AddBookingTransport($Name=NULL ,$Last=NULL,$Email=NULL,$Line=NULL,$Phone=NULL,$keygroub=NULL,$accept=null) {
        $data = array(
            'cust_name' => $Name,
            'cust_lastname' => $Last,
            'cust_telephone_num' => $Phone,
            'cust_email' => $Email,
            'cust_line' => $Line,
            'not_travel' => $accept,
            'cf_status' => '1');
        $this->db->where('transfer_keygroup', $keygroub);
        if ($this->db->update('tbl_pre_transport_booking_title', $data)) {
            $pass = 1;
        } else {
            $pass = 0;
        }return $pass;
    }
    //-------------------------------------------------------
        function confrim_data1($keygroup = null) {
        $data = array(
            'cf_status' => '2');
        $this->db->where('transfer_keygroup', $keygroup);
        if ($this->db->update('tbl_pre_transport_booking_title', $data)) {
            $pass = 1;
        }else{
            $pass = 0;
        }
          return $pass;
    }
     //---------------------------
    function loadImg3($ProID) {
        $sql = $this->db->query("SELECT * FROM `tbl_transport_img` WHERE tran_id ='" . $ProID . "' ORDER BY id DESC LIMIT 2 ");
        return $sql;
    }
     //------------------------------------------------------  
	 function getRouteDetail($RouteID,$TimetableID){
		  $sql="SELECT a.id AS timeTableID , a.arrive_time , b.arrive_time AS detailDepartTime , b.depart_time AS detailArriveTime , b.note_checkin_en, b.price AS adultPrice , b.discount_price AS adultPriceDiscout , b.price_children AS ChildPrice , b.discount_chilg_price AS ChildPriceDiscount , c.transport_name , e.route_id AS routeDataID , d.place_title    FROM tbl_transport_route_timeTable AS a  LEFT JOIN tbl_transport_detailFor_timeTable AS b On a.id = b.timeTable_id  LEFT JOIN  tbl_transport_typedetail AS c ON b.transport_id = c.transport_id  LEFT JOIN tbl_transport_route_data AS e ON a.route_id = e.route_id  LEFT JOIN tbl_place_details AS d ON e.begin_place_id = d.id  WHERE a.id='".$TimetableID."' AND a.route_id='".$RouteID."' AND c.lang = 'en' ORDER BY a.id ASC";
		 $resultData=$this->db->query($sql);
		 return $resultData;
	 }
    //-------------------------------------------------
         function idroute($RouteID){
             $sql = "SELECT * FROM tbl_transport_route_data WHERE route_id = '".$RouteID."'";
             $resultData=$this->db->query($sql);
		 return $resultData;
         }
    //------------------------------------------------
	function get_Client_id($route_id=NULL){
		$sql = "SELECT b.client_name FROM `tbl_transport_route_data` AS a LEFT JOIN `tbl_clients` AS b ON a.client_id = b.client_id WHERE a.route_id = '".$route_id."'";
        $query = $this->db->query($sql);
		
		if($query->num_rows() > 0){
			$row=$query->row();
			$pass = $row->client_name;	
		
		} else {
			$pass = 0;
		}			
		return $pass;	 
	}
      //-------------------------------------------------
         function list_transportData($tranID){
             $sql = "SELECT * FROM tbl_transport_typedetail WHERE transport_id = '".$tranID."' AND lang = 'en'";
             $resultData=$this->db->query($sql);
		 return $resultData;
         }
  
}
?>