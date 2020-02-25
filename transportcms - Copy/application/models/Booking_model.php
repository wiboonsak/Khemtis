<?php
class Booking_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
//////////////////////////////////////////////////
	
function get_lang(){
	
	$sql = "SELECT * FROM `tbl_field_lang_values` JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm) AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_lang_values.fld_valu = 'en' OR  tbl_field_lang_values.fld_valu = 'th'  ORDER BY tbl_field_values.fld_nm ASC";
    return $this->db->query($sql)->result();
}
 //---------------------------------------
	function getbooking_title($key_group=NULL){
            if($key_group!=''){
		$sql = "SELECT a.* ,b.booking_id, b.route_id,b.route_type_id,b.time_id,b.date_depart,b.adult_traveller,b.child_traveller,b.adult_price,b.child_price,b.total_price,b.ad_txt,b.ch_txt FROM `tbl_pre_transport_booking_title` AS a LEFT JOIN `tbl_pre_transport_booking_detail` AS b ON a.id = b.booking_id WHERE a.id = '".$key_group."' ";
        $query = $this->db->query($sql)->result();
            }else{
                $sql = "SELECT a.* , b.route_id,b.route_type_id,b.time_id,b.date_depart,b.adult_traveller,b.child_traveller,b.adult_price,b.child_price,b.total_price,b.date_booking FROM `tbl_pre_transport_booking_title` AS a LEFT JOIN `tbl_pre_transport_booking_detail` AS b ON a.id = b.booking_id WHERE cf_status !='0'AND booking_status = '0' AND cf_status !='3' ORDER BY b.date_booking DESC ";
        $query = $this->db->query($sql)->result();
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
       //---------------------------  
	function get_routeType($route_id=NULL, $key=NULL, $rout_active=NULL, $group=NULL, $order=NULL, $limit=NULL){
		
		//SELECT * FROM `tbl_route_type` WHERE route_id = '2' AND key_group = '1' AND rout_active = '1' ORDER BY id ASC			
		
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
	function get_timeDetail($route_id=NULL, $key=NULL, $data_status=NULL, $limit=NULL, $dataID=NULL){	
		
		if($data_status !=''){
			$this->db->where('data_status', $data_status);
		}		
		if($route_id !=''){
			$this->db->where('route_id', $route_id);
		}
		if($key !=''){
			$this->db->where('route_type_id', $key);
		}
		if($dataID !=''){
			$this->db->where('id', $dataID);
		}		
		$this->db->select('*');				
		$this->db->order_by('arrive_time','asc');
		if($limit !=''){
			$this->db->limit(1);
		}
		$query = $this->db->get('tbl_transport_route_timeTable');
		
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
		$query = $this->db->get('tbl_transport_detailFor_timeTable');
		
		return $query;		
	}
               	//--------------------------- 	 
	function listTransport($dataID=NULL){
		
		$sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_typedetail.transport_id = '".$dataID."' AND tbl_transport_typedetail.lang = 'en'";
                $query = $this->db->query($sql);
		return $query;		
	}
                //---------------------------
    function list_booking_textAdmin($booking_id=null,$transport_id = NULL) {
            $sql = "SELECT * FROM `tbl_pre_transport_booking_textAdmin` WHERE booking_id = '".$booking_id."' AND transport_id = '".$transport_id."' ";
            $query = $this->db->query($sql);
        return $query;
    }
                      //=----------------
    function insertnotecheckin($ticket=null,$Place=null,$booking_id=null,$transport_id=null,$TicketBook=null) {
       $datatickket = array(
            'ticket_number' => $ticket,
            'note_ckeckin_en' => $Place,
            'booking_id' => $booking_id,
            'transport_id' => $transport_id,
            'user_update' => $this->session->userdata('client_user_id')
           );
       if($TicketBook ==''){
            if ($this->db->insert('tbl_pre_transport_booking_textAdmin', $datatickket)) {
                $pass = 1;
            } else {
                $pass = 0;
            }
       }else{
           $this->db->where('id', $TicketBook);
        if ($this->db->update('tbl_pre_transport_booking_textAdmin', $datatickket)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
       }
   return $pass;
    }
            //---------------------------------
    function deletenotecheckin($TicketBook =null ) {
       $this->db->where('id', $TicketBook);
        if ($this->db->delete('tbl_pre_transport_booking_textAdmin')) {
            $pass = 1;
        } else {
            $pass = 0;
        }
    
    return $pass; 
        }
                  //=----------------
    function confrim_data1($keygroup = null,$textareapdf=null) {
        $data = array(
            'cf_status' => '2',
            'comment' => $textareapdf);

        $this->db->where('transfer_keygroup', $keygroup);
        if ($this->db->update('tbl_pre_transport_booking_title', $data)) {
            $pass = 1;
        } else {
            $pass = 0;
        }return $pass;
    }
           //=----------------
    function cancel_data1($keygroup = null,$textareapdf=null) {
       $data = array(
            'comment' => $textareapdf);
       if ($keygroup == '') {
            if ($this->db->insert('tbl_pre_transport_booking_title', $data)) {
                $currentID = 1;
            } else {
                $currentID = 0;
            }
        } else {
        $data = array(
            'cf_status' => '3',
            'comment' => $textareapdf);

        $this->db->where('transfer_keygroup', $keygroup);
        if ($this->db->update('tbl_pre_transport_booking_title', $data)) {
            $currentID = 1;
        } else {
            $currentID = 0;
        }return $currentID;
    }
    }
        //---------------------------------
    function deleteData($dataID =null , $table =null) {

        $sql = "SELECT * FROM `tbl_pre_transport_booking_title` WHERE id ='".$dataID."' ";
        $query = $this->db->query($sql);
		$row=$query->row();
		$pass = $row->cf_status;
                if($pass == '1'){
                   $this->db->where('id', $dataID); 
                   $this->db->delete($table);
                   $this->db->where('booking_id', $dataID); 
                   $this->db->delete('tbl_pre_transport_booking_detail');
                }else{
  $data = array(
            'booking_status' => '3');

  $this->db->where('id', $dataID);
  $this->db->update($table, $data);
    } 
    return $data = 1;
                }
                    //---------------------------------
    function saveData($dataID =null , $table =null) {
       $data = array(
            'booking_status' => '4'
            );
        $this->db->where('id', $dataID);
        if ($this->db->update($table, $data)) {
            $currentID = 1;
        } else {
            $currentID = 0;
        }return $currentID;
    }
     //-----------------------------
  function delete_alltransport($id)
 {
  $sql = "SELECT * FROM `tbl_pre_transport_booking_title` WHERE id ='".$id."' ";
        $query = $this->db->query($sql);
		$row=$query->row();
		$pass = $row->cf_status;
                if($pass == '1'){
                   $this->db->where('id', $id); 
                   $this->db->delete('tbl_pre_transport_booking_title'); 
                }else{
  $data = array(
            'booking_status' => '3');

  $this->db->where('id', $id);
  $this->db->update('tbl_pre_transport_booking_title', $data);
 }
 }
      //-----------------------------
  function save_allTransport($id)
 {
  $sql = "SELECT * FROM `tbl_pre_transport_booking_title` WHERE id ='".$id."' ";
        $query = $this->db->query($sql);
		$row=$query->row();
		$pass = $row->cf_status;
                if($pass == '2'){
  $data = array(
            'booking_status' => '4');

  $this->db->where('id', $id);
  $this->db->update('tbl_pre_transport_booking_title', $data);
 }
 }
}
?>