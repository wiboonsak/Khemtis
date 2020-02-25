<?php
class Place_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
	
function ch_detail_distich($id1,$id2){
  $sql = "SELECT * FROM tbl_place_details where place_id = $id1 AND lang = '$id2'";
  return $this->db->query($sql)->num_rows();
}
function ch_boat_distich($id1){
  $sql = "SELECT * FROM tbl_places where place_id = $id1";
  return $this->db->query($sql)->num_rows();
}
//////////////////////////////////////////////////
	
function get_lang(){
	
	$sql = "SELECT * FROM `tbl_field_lang_values` JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm) AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_lang_values.fld_valu = 'en' OR  tbl_field_lang_values.fld_valu = 'th'  ORDER BY tbl_field_values.fld_nm ASC";
    return $this->db->query($sql)->result();
}

function get_place_detail($place_id=NULL){
	$sql = "SELECT * FROM tbl_places JOIN tbl_place_details on tbl_places.place_id = tbl_place_details.place_id WHERE tbl_places.place_id = $place_id";
	return $this->db->query($sql)->result();
}
	
function get_place_list(){
	$sql = "SELECT * FROM `tbl_places` ORDER BY place_id DESC ";
	return $this->db->query($sql)->result();
}
	
function get_place_title($place_id=NULL){
	$sql = "SELECT * FROM tbl_place_details WHERE lang = 'en' AND place_id = $place_id";
	return $this->db->query($sql)->result();
}
	
function get_country_id($province_id=NULL,$type=NULL){	
	if($type == '1'){
		$sql = "SELECT * FROM tbl_province WHERE province_id = $province_id";
		$query = $this->db->query($sql);
		$row=$query->row();	
		$pass = $row->country_id;
		return $pass;
	}
	if($type == '2'){
		$sql = "SELECT * FROM tbl_province JOIN tbl_country on tbl_province.country_id = tbl_country.country_id WHERE tbl_province.province_id = $province_id";
		return $this->db->query($sql)->result();
	}
}
	
////////////////////////////////////////////////
	
function Add_update_data($allData=NULL){
	
	$date_document = date("Y-m-d"); 
	//$client_id = $this->session->userdata('client_user_id');

	if($this->ch_boat_distich($allData["val_place_id"])==0){
		$data = array(		
			"province_id" => $allData["val_province_id"]			
		);         
		if($this->db->insert('tbl_places', $data)){			
			$place_id = $this->db->insert_id(); 
			   $resultData = $this->Add_up_details_lang($allData,$place_id);
		}else{$resultData = 0;}
		
   }else{
		
	    $data = array(		
			"province_id" => $allData["val_province_id"]			
		);
		$place_id = $allData["val_place_id"];
		$this->db->where('place_id',$place_id);
		if($this->db->update('tbl_places', $data)){ 
			$resultData = $this->Add_up_details_lang($allData,$place_id);
			   //  $resultData=1;
		}else{$resultData=0; }

   }
	return $resultData;
} 
//////////////////////////////////////////
	
function Add_up_details_lang($elm,$place_id){
	// อาโต้ยมะ 5555555555555  
    $results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        if($this->ch_detail_distich($place_id,$lg)==0){ 
            $data = array(
             "place_id" =>$place_id,
             "lang" =>$lg,
             "place_title" => $elm["place_title$lg"]                      
            );
               if($this->db->insert('tbl_place_details', $data)){ 
                     //$resultData=1;
                     $resultData = $place_id;
               } else {  $resultData=0;  }
			
          } else {
            $data = array(
             "place_title" => $elm["place_title$lg"]            
            );
               $this->db->where('place_id',$place_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_place_details', $data)){ 
                     //$resultData=1;
                     $resultData = $place_id;
               }else{ $resultData=0; }
          }
     }     
     //return 1;  
     return $resultData;
}
/////////////////////////////////////////
	

	
}
?>