<?php
class Van_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
 	
function ch_detail_distich($id1,$id2){
  $sql = "SELECT * FROM tbl_transport_typedetail where transport_id = $id1 AND lang = '$id2'";
  return $this->db->query($sql)->num_rows();
} 
  
function ch_tran_distich($id1){
  $sql = "SELECT * FROM tbl_transport_type where tran_id = '$id1'";
  return $this->db->query($sql)->num_rows();
}
//////////////////////////////////////////////////
	
function get_lang(){
	
	$sql = "SELECT * FROM `tbl_field_lang_values` JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm) AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_lang_values.fld_valu = 'en' OR  tbl_field_lang_values.fld_valu = 'th'  ORDER BY tbl_field_values.fld_nm ASC";
    return $this->db->query($sql)->result();
}
function get_Van_detail($tran_id=NULL){
	$sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_type.tran_id = $tran_id";
	return $this->db->query($sql)->result();
}

	
function get_Van_list($client_id=NULL){
	$sql = "SELECT * FROM `tbl_transport_type` WHERE client_id = '$client_id' ORDER BY tran_id DESC ";
	return $this->db->query($sql)->result();
}
	
function get_Van_title($tran_id=NULL){
	$sql = "SELECT * FROM tbl_transport_typedetail WHERE lang = 'en' AND transport_id = $tran_id";
	return $this->db->query($sql)->result();
}	
/////////////////////////////////////////
function Add_update_dataroute($allData=NULL){
   $val_tran_id = $allData["val_tran_id"];
	$client_id = $this->session->userdata('client_user_id');
if($this->ch_tran_distich($val_tran_id)==0){
	$data = array(
		"client_id" => $client_id,
		"transport_active" => $allData["val_active"],		
		"icon_class" => $allData["icon_class"]
	);         
	if($this->db->insert('tbl_transport_type', $data)){			
		$tran_id = $this->db->insert_id(); 
		   $resultData = $this->Add_up_details_langroute($allData,$tran_id);
	}else{$resultData = 0;}
   }else{
   $data = array(
    "transport_active" => $allData["val_active"], 
    "icon_class" => $allData["icon_class"]           
   );
      $this->db->where('tran_id',$val_tran_id);
      if($this->db->update('tbl_transport_type', $data)){ 
             	$resultData = $this->Add_up_details_langroute($allData,$val_tran_id);
             $resultData=1;
      }else{$resultData=0; }

   }


	return $resultData;
}
//////////////////////////////////////////
	
function Add_up_details_langroute($elm,$tran_id){ 
    $results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        if($this->ch_detail_distich($tran_id,$lg)==0){ 
            $data = array(
             "transport_id" =>$tran_id,
             "lang" =>$lg,
             "transport_name" => $elm["name$lg"],                      
             "transport_info" => $elm["desc_val$lg"]                      
            );
               if($this->db->insert('tbl_transport_typedetail', $data)){ 
                     //$resultData=1;
                     $resultData = $tran_id;
               } else {  $resultData=0;  }
			
          } else {
            $data = array(
             "transport_name" => $elm["name$lg"],                      
             "transport_info" => $elm["desc_val$lg"]             
            );
               $this->db->where('transport_id',$tran_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_transport_typedetail', $data)){ 
                     $resultData = $tran_id;
               }else{ $resultData=0; }
          }
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
        function listTransport($t_active=NULL){
	$sql = "SELECT * FROM tbl_transport_type JOIN tbl_transport_typedetail on tbl_transport_type.tran_id = tbl_transport_typedetail.transport_id WHERE tbl_transport_type.transport_active = '$t_active'";
	return $this->db->query($sql)->result();
}
//--------------------------------------------------
function Image_upload($data_file,$transport_id,$idc){
                if (!file_exists("temptransport/client".$idc)) {
                    mkdir("temptransport/client".$idc);
                    chmod("temptransport/client".$idc, 0777);
                }  
  $esum=0;$pthc= base_url();
  if(isset($idc)){
     $redata = count($data_file);
     for($i=0;$i<$redata;$i++){
      $v_img_nm = $this->json_pt($data_file[$i]['pname']);
      $v_ptemp  = $this->json_pt($data_file[$i]['ptemp']);
      $imgtyp= ".".pathinfo($v_img_nm, PATHINFO_EXTENSION);
      $unid =  uniqid();
            $data=$arrayName = array(
              "tran_id" =>$transport_id, 
              "img_name" =>"temptransport/client".$idc."/".$unid.$imgtyp, 
              "img_main" =>0, 
              "img_seq" =>0, 
              "img_title" =>'', 
          );
          if($this->db->insert('tbl_transport_img', $data)){   
                  $ptr= 'temptransport/client'.$idc.'/';
                  $file = $ptr.$unid.$imgtyp;
                  file_put_contents($file, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $v_ptemp)));
                $esum++;
           }
       }
       if($esum == $redata){
          return 1;
       }else{
          return 0; 
      }
   }
} 



function json_pt($txt){
  $txt =  trim(str_replace('\/', '/',str_replace('"','',json_encode($txt))));
  return $txt;
}

function get_transport_data($transport_id=NULL){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_transport_img WHERE tran_id = $transport_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
}

function del_hotel_data($idrun,$tran_id){
$img_url = "";
$sql = "DELETE from `tbl_transport_img`  WHERE id = $idrun";
$query = $this->db->query("SELECT * FROM tbl_transport_img WHERE id = $idrun");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           $img_url = $row->img_name;
     }
if($this->db->query($sql) && $img_url!=""){
      unlink($img_url);
      return 1;
}else{
      return 0;
   }
}

function main_hotel_data($idrun,$tran_id){
$img_url = "";
$sql1 = "UPDATE `tbl_transport_img` SET img_main = '0' WHERE tran_id = $tran_id";
$sql2 = "UPDATE `tbl_transport_img` SET img_main = '1' WHERE id = $idrun";
if($this->db->query($sql1)){
  if($this->db->query($sql2)){
     return 1;
  }return 0;
  }return 0; 
}
}
?>