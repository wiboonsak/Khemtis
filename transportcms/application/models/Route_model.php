<?php
class Route_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
 	
function ch_detail_distich($id1,$id2){
  $sql = "SELECT * FROM tbl_transport_route_data_detail where route_id = $id1 AND lang = '$id2'";
  return $this->db->query($sql)->num_rows();
} 
  
function ch_route_distich($id1){
  $sql = "SELECT * FROM tbl_transport_route_data where route_id = '$id1'";
  return $this->db->query($sql)->num_rows();
}
//////////////////////////////////////////////////
	

function gettime_max_min($route_id){
$idtime=0;
$sql = "SELECT id FROM tbl_transport_route_timeTable WHERE route_id	= $route_id";
$data = $this->db->query($sql)->result();
foreach ($data	as  $value) {
	$idtime = $value->id;
}
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



function get_lang(){
	$sql = "SELECT * FROM `tbl_field_lang_values` JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm) AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_lang_values.fld_valu = 'en' OR  tbl_field_lang_values.fld_valu = 'th'  ORDER BY tbl_field_values.fld_nm ASC";
    return $this->db->query($sql)->result();
}
function get_Route_detail($route_id=NULL){
	$sql = "SELECT * FROM tbl_transport_route_data JOIN tbl_transport_route_data_detail on tbl_transport_route_data.route_id = tbl_transport_route_data_detail.route_id WHERE tbl_transport_route_data.route_id = $route_id";
	return $this->db->query($sql)->result();
}
function get_route_return($d,$r,$idclient){
	 $sql = "SELECT tbl_transport_route_data.route_id,tbl_transport_route_data_detail.route_name FROM tbl_transport_route_data
      JOIN tbl_transport_route_data_detail ON tbl_transport_route_data_detail.route_id  = tbl_transport_route_data.route_id AND tbl_transport_route_data_detail.lang = 'en'
	  WHERE destination_place_id =$d AND begin_place_id =$r AND tbl_transport_route_data.client_id=$idclient";
      return $this->db->query($sql)->result();
}
	  
	// return $query->row()->route_id;

function listTransport($t_active=NULL,$idclient=null){
	$sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_type.transport_active = '$t_active' AND tbl_transport_typedetail.lang = 'en' AND tbl_transport_type.client_id = '$idclient' ";
	return $this->db->query($sql);
}
function get_Route_list($client_id=NULL){
	$sql = "SELECT * FROM `tbl_transport_route_data` WHERE client_id = '$client_id' ORDER BY route_id DESC ";
	return $this->db->query($sql)->result();
}
function get_Route_title($route_id=NULL){
	$sql = "SELECT * FROM tbl_transport_route_data_detail WHERE lang = 'en' AND route_id = $route_id";
	return $this->db->query($sql)->result();
}	
///////////////////////////////////////////
function Add_update_dataroute($idc=null,$val_route_active=null,$val_route_id=null,$begin_place_id=null,$destination_place_id=null){
	$client_id = $idc;
if($this->ch_route_distich($val_route_id)==0){
	$data = array(
		"client_id" => $client_id,
		"route_active" => $val_route_active,		
		"begin_place_id" => $begin_place_id,
		"destination_place_id" => $destination_place_id
	);         
	if($this->db->insert('tbl_transport_route_data', $data)){			
		$route_id = $this->db->insert_id(); 
		      return $route_id;
	}else{$resultData = 0;}
   }else{
   $data = array(
                "route_active" => $val_route_active,		
		"begin_place_id" => $begin_place_id,
		"destination_place_id" => $destination_place_id
   );
      $this->db->where('route_id',$val_route_id);
      if($this->db->update('tbl_transport_route_data', $data)){ 
             return $val_route_id;
      }else{$resultData=0; }

   }
	return $resultData;
}
//////////////////////////////////////////
	
function Add_up_details_langroute($name,$lg,$route_id){ 
        if($this->ch_detail_distich($route_id,$lg)==0){ 
            $data = array(
             "route_id" =>$route_id,
             "lang" =>$lg,
             "route_name" => $name                   
            );
               if($this->db->insert('tbl_transport_route_data_detail', $data)){ 
                     //$resultData=1;
                     $resultData = $route_id;
               } else {  $resultData=0;  }
			
          } else {
            $data = array(
             "route_name" => $name              
            );
               $this->db->where('route_id',$route_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_transport_route_data_detail', $data)){ 
                     $resultData = $route_id;
               }else{ $resultData=0; }
          }
     return $resultData;
}

     //-----------------------------
     function list_researchClusters($dataID=NULL){
		if($dataID !=''){ 
			$this->db->where('tran_id', $dataID);
		} 
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('transport_active', 'Y');
		$this->db->select('*');
		$this->db->order_by('tran_id','desc');
		$query = $this->db->get('tbl_transport_type');
		
		return $query;		
	}
    //-----------------------------
        //--------------------------- 
	function get_placeData($placeid = null){
               $sql = "SELECT * FROM tbl_place_details WHERE lang = 'en' AND place_id != '$placeid'"; 
	return $this->db->query($sql);
    } 
        //--------------------------- 
	function get_placename($placeid = null){
               $sql = "SELECT * FROM tbl_place_details WHERE lang = 'en' AND id = '$placeid'"; 
	return $this->db->query($sql);
    } 
    //-------------------------
    function update_img($idrun,$pat_file){
     $data = array(
             "route_image" => $pat_file,
               );         
               $this->db->where('route_id',$idrun);
               if($this->db->update('tbl_transport_route_data', $data)){
                  return 1;
               }else{
               return 0;
               }
}
	//--------------------------- 
	function do_removeFile($dataID=NULL){
		
		$x ='';		
        $data = array('route_image' => $x);
		
		$this->db->where('route_id', $dataID);
        if($this->db->update('tbl_transport_route_data', $data)){
            return "1";
        } else {
            return "0";
        }
    }
 	//--------------------------- 
	function selectTransport($transport_id=NULL, $route_id=NULL, $transfer_h_time=NULL, $transfer_m_time=NULL){	
		
		$this->db->where('route_id', $route_id);
		$this->db->select_max('key_group', 'max');
   		$query = $this->db->get('tbl_transport_route_type');    
   		$max_id = $query->row()->max;
		
		if($max_id >0){
			$max_id = $max_id + 1;
			
		} else {			
			$max_id = 1;
		}
		
		$transport_arr = explode(",",$transport_id);		
		$count_arr = count($transport_arr);
		
		for($x=0; $x < $count_arr; $x++){
			
		   $data = array(
			 'route_id' => $route_id,
			 'transport_id' => $transport_arr[$x],
			 'key_group' => $max_id,
			 'transfer_h_time' => $transfer_h_time,
			 'transfer_m_time' => $transfer_m_time,
			 'rout_active' => '1');
		   $this->db->insert('tbl_transport_route_type', $data);			
		}	
		$result = $route_id.'/'.$max_id;
		return $result;		 
		//return $max_id;		 
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
	function listTransportmodal($dataID=NULL,$idclient=null){
		$sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_type.tran_id = '$dataID' AND tbl_transport_typedetail.lang = 'en' AND tbl_transport_type.client_id = '$idclient' ";
	return $this->db->query($sql);	
	}
        //---------------------------   
	function do_insertTimes( $hr=NULL, $min=NULL, $route_type_id=NULL, $route_id=NULL){	
		
		$this->db->where('route_id', $route_id);
		$this->db->where('route_type_id', $route_type_id);
		$this->db->select_max('data_order', 'max');
   		$query = $this->db->get('tbl_transport_route_timeTable');    
   		$max_id = $query->row()->max;

			if($hr != ''){
			
				$max_id = $max_id + 1;
				
				$arrive_time = $hr.":".$min;

				 $data = array(
				 'route_id' => $route_id,
				 'route_type_id' => $route_type_id,
				 'arrive_time' => $arrive_time,
				 'data_order' => $max_id,
				 'data_status' => '1');
				 $this->db->insert('tbl_transport_route_timeTable', $data);					
		}  //}
		return 1;		 
	}
  //--------------------------- 
	function count_routeType($key_group=NULL,$route_id=NULL){	 
	 
		$sql = "SELECT * FROM `tbl_booking_detail` WHERE route_type_id = '".$key_group."' AND route_id = '".$route_id."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows(); 
		
		return $numberCount;
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
	function do_deleteRouteType($key_group=NULL, $route_id=NULL){	
		$pass = 0;
		
		$sql = "SELECT * FROM `tbl_booking_detail` WHERE route_type_id = '".$key_group."' AND route_id = '".$route_id."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();
		
		if($numberCount <1){
			
			$this->db->where('key_group', $key_group);
	 		$this->db->where('route_id', $route_id);
	 		$this->db->delete('tbl_transport_route_type');			
			
			$sql1 = "SELECT id FROM `tbl_transport_route_timeTable` WHERE route_id = '".$route_id."' AND route_type_id = '".$key_group."' ";
        	$query1 = $this->db->query($sql1);			
			$numberCount = $query1->num_rows();	
			
			if($numberCount >0){
				
				foreach ($query1->result() as $data){
					
					$sql2 = "SELECT id FROM `tbl_transport_detailFor_timeTable` WHERE timeTable_id = '".$data->id."' ";
        			$query2 = $this->db->query($sql2);			
					$numberCount2 = $query2->num_rows();
					if($numberCount >0){
				
						foreach ($query2->result() as $data3){
							
							$this->db->where('id', $data3->id);
	 						$this->db->delete('tbl_transport_detailFor_timeTable');
						}
					}                   
            	}
			
				$this->db->where('route_type_id', $key_group);
	 			$this->db->where('route_id', $route_id);
	 			$this->db->delete('tbl_transport_route_timeTable');			
			}			
			
			$pass = 1;

		} else {
			
			$data = array(			
			'rout_active' => '3');
		
			$this->db->where('key_group', $key_group);
	 		$this->db->where('route_id', $route_id);		
			$this->db->update('tbl_transport_route_type', $data);
			$pass = 1;
			
		}
		return $pass;				 
	} 
        //---------------------------  
	function listRoute($rout_active=NULL,$dataID=NULL){
		
		if($rout_active !=''){
			$this->db->where('route_active', $rout_active);
		}
		if($dataID !=''){
			$this->db->where('route_id', $dataID);
		}
		
		$this->db->select('*');
		$this->db->order_by('route_id','desc');
		$query = $this->db->get('tbl_transport_route_data');
		
		return $query;		
	}
        //---------------------------
	function get_detailTimeTable($timeTable_id=NULL,$data_status=NULL,$limit=NULL,$dataID=NULL){
		
		if($timeTable_id !=''){
			$this->db->where('timeTable_id', $timeTable_id);
		}
		if($data_status !=''){
			$this->db->where('data_status', $data_status);
		}
		if($dataID !=''){
			$this->db->where('id', $dataID);
		}				
		$this->db->select('*');		
		if($limit !=''){
			$this->db->order_by('data_order','desc');
			$this->db->limit(1);
		} else {
			$this->db->order_by('data_order','asc');
		}
		$query = $this->db->get('tbl_transport_detailFor_timeTable'); 
		
		return $query;	
	}
        function list_placeData($place_id=NULL){
	$sql = "SELECT * FROM tbl_places JOIN tbl_place_details on tbl_places.place_id = tbl_place_details.place_id WHERE tbl_place_details.id = $place_id AND tbl_place_details.lang = 'en'";
	return $this->db->query($sql);
}
        function list_placeDatadatail($place_id=NULL){
	$sql = "SELECT * FROM tbl_places JOIN tbl_place_details on tbl_places.place_id = tbl_place_details.place_id WHERE tbl_place_details.id = $place_id AND tbl_place_details.lang = 'en'";
	return $this->db->query($sql);
}
//--------------------------- 
	function do_insertDetailTime($Mbegin_place_id=NULL,$Mdestination_place_id=NULL,$transport_id=NULL,$arrive_time=NULL,$depart_time=NULL,$note_checkin_en=NULL,$price=NULL,$price_children=NULL,$timeTable_id=NULL,$data_order=NULL){		
		
		$data = array(
		'timeTable_id' => $timeTable_id, 
		'transport_id' => $transport_id,
		'begin_place_id' => $Mbegin_place_id,
		'destination_place_id' => $Mdestination_place_id,
		'arrive_time' => $arrive_time,
		'depart_time' => $depart_time,
		'note_checkin_en' => $note_checkin_en,
		'price' => $price,
		'price_children' => $price_children,
		'data_order' => $data_order,
		'data_status' => '1');
		
		if($this->db->insert('tbl_transport_detailFor_timeTable', $data)){		
			$pass = 1 + $data_order;
		} else {
			$pass = 'x';
		}
		return $pass;		 
	}
        	//---------------------------- 
	 function deleteRouteTime($TimeID){
		 if($this->db->delete('tbl_transport_route_timeTable', array('id' => $TimeID))){
			 $pass=1;
		 }else{
			 $pass=0;
		 }
		 return $pass;
	 }
         //---------------------------	 
	function do_deleteDetail($dataID=NULL,$timeTable_id=NULL){
		
		$sql = "SELECT * FROM `tbl_booking_detail` WHERE time_id = '".$timeTable_id."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();
		
		if($numberCount <1){
			
			$this->db->where('id', $dataID);	 		
			$this->db->delete('tbl_transport_detailFor_timeTable');
			
		} else {
			
			$data = array(			
			'data_status' => '3');
		
			$this->db->where('id', $dataID);		
			$this->db->update('tbl_transport_detailFor_timeTable', $data);			
		}			
		return 1;
	} 
        //---------------------------   
	function updateDetail($Mdestination_place_id=NULL,$transport_id=NULL,$arrive_time=NULL,$depart_time=NULL,$note_checkin_en=NULL,$price=NULL,$price_children=NULL,$dataID=NULL){		
		
		$data = array(
		'transport_id' => $transport_id,
		'destination_place_id' => $Mdestination_place_id,
		'arrive_time' => $arrive_time,
		'depart_time' => $depart_time,
		'note_checkin_en' => $note_checkin_en,
		'price' => $price,
		'price_children' => $price_children);
		
		$this->db->where('id', $dataID);		
		if($this->db->update('tbl_transport_detailFor_timeTable', $data)){		
			$pass = 1;
		} else {
			$pass = 'x';
		}
		return $pass;		 
	}
        	//---------------------------
	function delete_transport($key_group=NULL, $route_id=NULL, $transport_id=NULL){
	 
	 	$this->db->where('key_group', $key_group);
	 	$this->db->where('route_id', $route_id);
	 	$this->db->where('transport_id', $transport_id);
		$this->db->delete('tbl_transport_route_type');		
			
		return 1;
	}
        //--------------------------- 
	function update_routeType($transport_id=NULL, $route_id=NULL, $transfer_h_time=NULL, $transfer_m_time=NULL, $key_group=NULL){	
		
		$pass = 0;
		
		$sql = "SELECT * FROM `tbl_transport_route_type` WHERE key_group = '".$key_group."' AND route_id = '".$route_id."' AND transport_id = '".$transport_id."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();
		
		if($numberCount <1){
			
			$data = array(
			 'route_id' => $route_id,
			 'transport_id' => $transport_id,
			 'key_group' => $key_group,
			 'transfer_h_time' => $transfer_h_time,
			 'transfer_m_time' => $transfer_m_time,
			 'rout_active' => '1');
			
		   if($this->db->insert('tbl_transport_route_type', $data)){
			
				$pass = 1;
		   } else {
				$pass = 'x';
			}

		}else{
			$data = array(
			 'transfer_h_time' => $transfer_h_time,
			 'transfer_m_time' => $transfer_m_time,
			 'rout_active' => '1');
			  $this->db->where('route_id',$route_id);
			  $this->db->where('key_group',$key_group);
		   if($this->db->update('tbl_transport_route_type', $data)){
				$pass = 1;
		   } else {
				$pass = 'x';
			}
		}
		return $pass;				 
	} 
       //-------------------------------------
    function placedataupdate($changeValue=null,$client_user_id=null) {
        $sql = $this->db->query("SELECT * from tbl_place_details WHERE id NOT IN (SELECT destination_place_id FROM tbl_transport_route_data WHERE begin_place_id='".$changeValue."' AND client_id='".$client_user_id."') AND lang = 'en' AND id !='".$changeValue."' ORDER BY place_title ASC");
        return $sql;
    }

	
}
?>