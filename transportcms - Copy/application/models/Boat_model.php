<?php
class Boat_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
	
function ch_detail_distich($id1,$id2){
  $sql = "SELECT * FROM tbl_car_details where car_id = $id1 AND lang = '$id2'";
  return $this->db->query($sql)->num_rows();
}
function ch_boat_distich($id1){
  $sql = "SELECT * FROM tbl_cars where car_id = $id1";
  return $this->db->query($sql)->num_rows();
}
//////////////////////////////////////////////////
	
function get_lang(){
	
	$sql = "SELECT * FROM `tbl_field_lang_values` JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm) AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE tbl_field_lang_values.fld_nm ='LANG' ORDER BY tbl_field_values.fld_nm ASC";
    return $this->db->query($sql)->result();
}

function get_boat_detail($boat_id=NULL){
	$sql = "SELECT * FROM tbl_cars JOIN tbl_car_details on tbl_cars.car_id = tbl_car_details.car_id WHERE tbl_cars.car_id = $boat_id";
	return $this->db->query($sql)->result();
}
	
function get_boat_list($client_id=NULL){
	$sql = "SELECT * FROM `tbl_cars` WHERE client_id = '$client_id' ORDER BY car_id DESC ";
	return $this->db->query($sql)->result();
}
	
function get_boat_title($boat_id=NULL){
	$sql = "SELECT * FROM tbl_car_details WHERE lang = 'en' AND car_id = $boat_id";
	return $this->db->query($sql)->result();
}	
////////////////////////////////////////////////
	
function Add_update_data($allData=NULL){
	$date_document = date("Y-m-d"); 
	$client_id = $this->session->userdata('client_user_id');
if($this->ch_boat_distich($allData["val_boat_id"])==0){
	$data = array(
		"client_id" => $client_id,
		"published_status" => $allData["val_pulis"],		
		"booking_status" => $allData["val_book"]
	);         
	if($this->db->insert('tbl_cars', $data)){			
		$boat_id = $this->db->insert_id(); 
		   $resultData = $this->Add_up_details_lang($allData,$boat_id);
	}else{$resultData = 0;}
   }else{
   $data = array(
    "published_status" => $allData["val_pulis"], 
    "booking_status" => $allData["val_book"]           
   );
      $boat_id = $allData["val_boat_id"];
      $this->db->where('car_id',$boat_id);
      if($this->db->update('tbl_cars', $data)){ 
      	$resultData = $this->Add_up_details_lang($allData,$boat_id);
           //  $resultData=1;
      }else{$resultData=0; }

   }
	return $resultData;
} 
//////////////////////////////////////////
	
function Add_up_details_lang($elm,$boat_id){
	// อาโต้ยมะ 5555555555555  
    $results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        if($this->ch_detail_distich($boat_id,$lg)==0){ 
            $data = array(
             "car_id" =>$boat_id,
             "lang" =>$lg,
             "car_title" => $elm["car_title$lg"]                      
            );
               if($this->db->insert('tbl_car_details', $data)){ 
                     //$resultData=1;
                     $resultData = $boat_id;
               } else {  $resultData=0;  }
			
          } else {
            $data = array(
             "car_title" => $elm["car_title$lg"]            
            );
               $this->db->where('car_id',$boat_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_car_details', $data)){ 
                     //$resultData=1;
                     $resultData = $boat_id;
               }else{ $resultData=0; }
          }
     }     
     //return 1;
     return $resultData;
}
/////////////////////////////////////////
	

	
}
?>