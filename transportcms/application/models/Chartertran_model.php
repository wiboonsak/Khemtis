<?php
class Chartertran_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
	

//////////////////////////////////////////////////
function ch_tran_distich($id1){
  $sql = "SELECT * FROM tbl_chartertransport WHERE id = '$id1'";
  return $this->db->query($sql)->num_rows();
}	
function get_lang(){
	
	$sql = "SELECT * FROM `tbl_field_lang_values` JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm) AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_lang_values.fld_valu = 'en' OR  tbl_field_lang_values.fld_valu = 'th'  ORDER BY tbl_field_values.fld_nm ASC";
    return $this->db->query($sql)->result();
}
function get_chartertran_list($client_id=NULL){
	$sql = "SELECT * FROM `tbl_chartertransport` WHERE client_id = '$client_id' ORDER BY id DESC ";
	return $this->db->query($sql)->result();
}
function get_chartertran_title($tran_id=NULL){
	$sql = "SELECT * FROM tbl_chartertransport_detail WHERE lang = 'en' AND charterboat_id = $tran_id";
	return $this->db->query($sql)->result();
}
function get_place($lang=NULL){
	$sql = "SELECT * FROM `tbl_place_details` WHERE lang = '$lang' ORDER BY place_id DESC ";
	return $this->db->query($sql)->result();
}
function ch_detail_distich($id1,$id2){
  $sql = "SELECT * FROM tbl_chartertransport_detail where charterboat_id = $id1 AND lang = '$id2'";
  return $this->db->query($sql)->num_rows();
}

function get_chartertran_detail($tran_id=NULL){
	$sql = "SELECT tbl_chartertransport.id AS tran_id ,tbl_chartertransport.*,tbl_chartertransport_detail.* FROM tbl_chartertransport JOIN tbl_chartertransport_detail on tbl_chartertransport.id = tbl_chartertransport_detail.charterboat_id WHERE tbl_chartertransport.id = $tran_id";
	return $this->db->query($sql)->result();
}
  //--------------------------- 
	function get_placeData(){
               $sql = "SELECT * FROM tbl_place_details WHERE lang = 'en' ORDER BY place_title ASC"; 
	return $this->db->query($sql);
    }
    function listTransport($t_active=NULL,$idclient=null,$id=null){
        if($id==''){
	$sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_type.transport_active = '$t_active' AND tbl_transport_typedetail.lang = 'en' AND tbl_transport_type.client_id = '$idclient' ";
        }else{
         $sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_type.transport_active = '$t_active' AND tbl_transport_typedetail.lang = 'en' AND tbl_transport_type.client_id = '$idclient' AND tbl_transport_type.tran_id = '$id' ";   
        }
	return $this->db->query($sql);
}
     //--------------------------- 
	function get_placename($placeid = null){
               $sql = "SELECT * FROM tbl_place_details WHERE lang = 'en' AND id = '$placeid' ORDER BY place_title ASC"; 
	return $this->db->query($sql);
    } 

    ///////////////////////////////////////////
function Add_update_dataroute($idc=null,$val_route_active=null,$val_route_id=null,$begin_place_id=null,$destination_place_id=null){
	$client_id = $idc;
if($this->ch_tran_distich($val_route_id)==0){
	$data = array(
		"client_id" => $client_id,
		"rout_active" => $val_route_active,		
		"begin_place_id" => $begin_place_id,
		"destination_place_id" => $destination_place_id
	);         
	if($this->db->insert('tbl_chartertransport', $data)){			
		$route_id = $this->db->insert_id(); 
		      return $route_id;
	}else{$resultData = 0;}
   }else{
   $data = array(
                "rout_active" => $val_route_active,		
		"begin_place_id" => $begin_place_id,
		"destination_place_id" => $destination_place_id
   );
      $this->db->where('id',$val_route_id);
      if($this->db->update('tbl_chartertransport', $data)){ 
             return $val_route_id;
      }else{$resultData=0; }

   }
	return $resultData;
}
//////////////////////////////////////////
	
function Add_up_details_langroute($name,$lg,$route_id){ 
        if($this->ch_detail_distich($route_id,$lg)==0){ 
            $data = array(
             "charterboat_id" =>$route_id,
             "lang" =>$lg,
             "route_name" => $name                   
            );
               if($this->db->insert('tbl_chartertransport_detail', $data)){ 
                     //$resultData=1;
                     $resultData = $route_id;
               } else {  $resultData=0;  }
			
          } else {
            $data = array(
             "route_name" => $name              
            );
               $this->db->where('charterboat_id',$route_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_chartertransport_detail', $data)){ 
                     $resultData = $route_id;
               }else{ $resultData=0; }
          }
     return $resultData;
}
   //------------------------------------------------------   
	 function insertpriceLand( $transport=NULL,$price=NULL,$landID=NULL,$pricelandID=NULL){	
              $sql = $this->db->query("SELECT MAX(orderprice) AS nNax FROM tbl_pricelandtransfer WHERE transport_id  = '".$transport."' AND landtransfer_id = '".$landID."'");
        foreach ($sql->result() AS $data) {
        }
        $nMaxIns = $data->nNax + 1;
         $today = date("Y-m-d H:i:s");
         if($pricelandID==''){
	 $data = array(
         'landtransfer_id' => $landID,
         'transport_id' => $transport,
         'price' => $price,
         'date_add' => $today,
         'orderprice' => $nMaxIns,
         'data_status' => '1');
         		  
         if($this->db->insert('tbl_pricelandtransfer', $data)){				 
			//$pass=1;
			$pass = $this->db->insert_id();  
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
         }else{
            $data = array(
         'landtransfer_id' => $landID,
         'transport_id' => $transport,
         'price' => $price,
         'date_add' => $today);
           $this->db->where('id', $pricelandID);
         if($this->db->update('tbl_pricelandtransfer', $data)){				 
			
			$pass = $pricelandID;  
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 } 
         }
		 return $pass;		 
	}
          //--------------------------- 	 
	function loadland($dataID=NULL){
			
		if($dataID !=''){
			$this->db->where('landtransfer_id', $dataID);
		}
		
		$this->db->select('*');
		$this->db->order_by('id','ASC');
		$query = $this->db->get('tbl_pricelandtransfer');
		
		return $query;		
	}
        //---------------------------	 
	function deleteData($dataID=NULL,$table=NULL){
			$this->db->where('id', $dataID);	 		
                        if($this->db->delete($table)){
                            $pass = '1';
                        }else{
                            $pass = '0';
                        }
		return $pass;
	}  
         //---------------------------	 
	function deleteDatacharter($dataID=NULL){
			$this->db->where('charterboat_id', $dataID);	 		
                        if($this->db->delete('tbl_chartertransport_detail')){
                            $this->db->where('id', $dataID);
                            $this->db->delete('tbl_chartertransport');
                            $this->db->where('landtransfer_id', $dataID);
                            $this->db->delete('tbl_pricelandtransfer');
                           $pass = '1';
                        }else{
                            $pass = '0';
                        }
		return $pass;
	}


 
}
?>