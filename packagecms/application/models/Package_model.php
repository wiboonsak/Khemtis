<?php

class Package_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
 
function get_token($idgen){
$query = $this->db->query("SELECT user_token_gen FROM tbl_users
 WHERE user_token_gen='$idgen'");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $row->user_token_gen;
     }else{return 0;}
  return 0;
}






function Image_upload($data_file,$package_id,$idc){
  $pthc= base_url();
   if (!file_exists("tmppack/client".$idc)) {
         mkdir("tmppack/client".$idc);
         chmod("tmppack/client".$idc, 0777);
}

  $esum=0;
  if(isset($idc)){
     $redata = count($data_file);
     for($i=0;$i<$redata;$i++){
      $v_img_nm = $this->json_pt($data_file[$i]['pname']);
      $v_ptemp  = $this->json_pt($data_file[$i]['ptemp']);
      $imgtyp= ".".pathinfo($v_img_nm, PATHINFO_EXTENSION);
      $unid =  uniqid();
            $data=$arrayName = array(
              "package_id" =>$package_id, 
              "img_name" =>"tmppack/client".$idc."/".$unid.$imgtyp, 
              "img_main" =>0, 
              "img_title" =>'', 
          );
          if($this->db->insert('tbl_package_img', $data)){   
                  $ptr = 'tmppack/client'.$idc.'/';
                  $file = $ptr.$unid.$imgtyp;
                  file_put_contents($file, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $v_ptemp)));
                $esum++;
           }
       }

       if($esum == $redata){
          return $package_id;
       }else{
          return 0; 
      }
   }
} 


function json_pt($txt){
  $txt =  trim(str_replace('\/', '/',str_replace('"','',json_encode($txt))));
  return $txt;
}

function Add_new_data($allData=NULL,$command=NULL,$client_id_ses=NULL){
  $date_document=date("Y-m-d");$pthc= base_url();
        if($command=="ADD"){
            $data = array(
             "client_id" =>$client_id_ses,
             "create_date" =>$date_document,
               );
               if($this->db->insert('tbl_packages', $data)){ 
                     $resultData=$this->get_max_id("tbl_packages","package_id");
                if (!file_exists("temppackage/client".$client_id_ses)) {
                    mkdir("temppackage/client".$client_id_ses);
                    chmod("temppackage/client".$client_id_ses, 0777);
                }
               }else{$resultData=0;}
           return $resultData;
        }
}

function get_max_id($tb_table,$tb_id){
  $this->db->select_max($tb_id);
  $query=$this->db->get($tb_table);
  $ret = $query->row();
  return $ret->$tb_id;
}




public function Add_update_data($allData=NULL,$command=NULL,$client_id_ses=NULL){
$date_document=date("Y-m-d");$pthc= base_url();
$package_id = 0;
        if($command=="ADD"){
            $data = array(
             "client_id" =>$client_id_ses,
             "package_code" => $allData["package_code"],
             "package_room_type" => $allData["val_package_room"],
             "published_status" => $allData["val_published_status"],
             "booking_status" =>$allData["val_booking_status"],
               );
               if($this->db->insert('tbl_packages', $data)){ 
                     
                 if (!file_exists("tmppack/client".$client_id_ses)) {
                  mkdir("tmppack/client".$client_id_ses);
                  chmod("tmppack/client".$client_id_ses, 0777);
            
                }
                   $package_id=$this->get_max_id("tbl_packages","package_id");
                   $package_id= $this->Add_up_details_lang($allData,$package_id);
                

               }else{}
                     
        }else if($command=="UP"){
             $data = array(
             "package_code" => $allData["package_code"],
             "package_room_type" => $allData["val_package_room"],
             "published_status" => $allData["val_published_status"],
             "booking_status" =>$allData["val_booking_status"],

               );         
               $package_id =$allData["val_package_id"];
               $this->db->where('package_id',$package_id);
               if($this->db->update('tbl_packages', $data)){
                   $resultData=2;
                   
                if (!file_exists("tmppack/client".$client_id_ses)) {
                  mkdir("tmppack/client".$client_id_ses);
                  chmod("tmppack/client".$client_id_ses, 0777);

    

                }
                  $package_id= $this->Add_up_details_lang($allData,$package_id);
                
        
               
             }else{}
            }
            $this->ec_js_data($package_id);

 }    



function update_pdf($idrun,$pat_file){
     $data = array(
             "package_desc_file" => $pat_file,
             "package_desc_file_draft" => $pat_file,
               );         
               $this->db->where('id',$idrun);
               if($this->db->update('tbl_package_detail', $data)){
                  return 1;
               }
               return 0;
}



function ec_js_data($package_id){
   header('Content-Type: application/json');
$data = array();
$sql = "SELECT tbl_package_detail.id,tbl_package_detail.lang,tbl_package_detail.package_id FROM tbl_package_detail
WHERE tbl_package_detail.package_id = $package_id";
$rec_data = $this->db->query($sql)->result();
 foreach($rec_data as $value){
         array_push($data, array('idmg' => $value->id,'lg' => $value->lang,'pkid' => $value->package_id));
  }
  echo json_encode($data);
}


function Add_up_details_lang($elm,$package_id){
    $results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        if($this->ch_detail_distich($package_id,$lg)==0){
            $data = array(
             "package_id" =>$package_id,
             "lang" =>$lg,
             "package_title" =>$elm["package_title$lg"],
             "package_desc" => $elm["val_short_desc_$lg"],
             "package_desc_draft"=>$elm["val_short_desc_$lg"],
             "package_desc_file" => 'none',
             "package_desc_file_draft" => 'none',
             "fld_stat_chng"=>'Y',
            );
      
               if($this->db->insert('tbl_package_detail', $data)){ 
                     
               }else{}
          }else{
            $data = array(
             "package_title" =>$elm["package_title$lg"],
             "package_desc" => $elm["val_short_desc_$lg"],
             "package_desc_draft"=>$elm["val_short_desc_$lg"],
             "package_desc_file" => 'none',
             "package_desc_file_draft" => 'none',
             "fld_stat_chng"=>'Y',
            );
               $this->db->where('package_id',$package_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_package_detail', $data)){ 
                    
               }else{}
          }
     }

return $package_id;



}

function chk_icon($hotel_id,$id_feature){

    $sql = "SELECT  * FROM  tbl_hotel_features 
    where hotel_id=$hotel_id AND hotel_feature = '$id_feature'";
    return $this->db->query($sql)->num_rows();
}


function update_icon($hotel_id,$id_feature,$hilight){
  if($this->chk_icon($hotel_id,$id_feature)>0){
     $sql = "DELETE FROM tbl_hotel_features WHERE hotel_id=$hotel_id AND hotel_feature=$id_feature";
        if($this->db->query($sql)){
              $resultData=$hotel_id;
        }else{$resultData=0;}
  }else{
  $data = array(
             "hotel_id"=>$hotel_id,
             "hotel_feature"=>$id_feature,
             "hotel_feature_hilight"=>$hilight,
            );
      if($this->db->insert('tbl_hotel_features', $data)){ 
            $resultData=$hotel_id;
      }else{$resultData=0;}
  }
      return $resultData;
}

function Add_up_Address_lang($elm,$hotel_id){
$results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        if($this->ch_address_distich($hotel_id,$lg)==0){
            $data = array(
             "hotel_id" =>$hotel_id,
             "lang" =>$lg,
             "hotel_addr" => $elm["hotel_addr_$lg"],
             "addr_subdistrict" => $elm["addr_subdistrict_$lg"],
            );
               if($this->db->insert('tbl_hotel_addr', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }else{
            $data = array(
             "hotel_addr" => $elm["hotel_addr_$lg"],
             "addr_subdistrict" => $elm["addr_subdistrict_$lg"],
            );
               $this->db->where('hotel_id',$hotel_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_hotel_addr', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
     }
}


function set_true_icon($hotel_id,$id_valu,$ch_true){
 if($ch_true=='Y'){$ch_true="N";}else{$ch_true="Y";}
 $data = array(
             "hotel_feature_hilight" =>$ch_true,
            );
               $this->db->where('hotel_id',$hotel_id);
               $this->db->where('hotel_feature',$id_valu);
               if($this->db->update('tbl_hotel_features', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}  
return $resultData;
}


function get_Package_data($package_id=NULL){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_package_img WHERE package_id=$package_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
}

function get_hotel_icon($room_f,$hotel_id){
   header('Content-Type: application/json');
        $sql = "SELECT 
        tbl_field_added_values.fld_valu,
        tbl_field_added_values.field1,
        tbl_field_added_values.fld_nm,
        tbl_field_lang_values.fld_valu_desc,
        tbl_hotel_features.hotel_feature_hilight
         FROM `tbl_field_added_values` 
                JOIN tbl_field_lang_values ON (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu) 
                AND tbl_field_added_values.fld_nm = '$room_f' 
                AND tbl_field_lang_values.fld_nm = '$room_f' 
                AND tbl_field_lang_values.lang ='en'
           LEFT JOIN tbl_hotel_features on (tbl_hotel_features.hotel_feature = tbl_field_added_values.fld_valu AND tbl_hotel_features.hotel_id = $hotel_id)
           ORDER BY tbl_field_added_values.id ASC";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
}

function add_hotel_id($client_id_ses){
   $date_document=date("Y-m-d");
            $data = array(
             "client_id" =>$client_id_ses,
             "create_date" =>$date_document,
               );
               if($this->db->insert('tbl_hotels', $data)){ 
                     $resultData=$this->get_max_id("tbl_hotels","hotel_id");
                if (!file_exists("temphotel/client".$client_id_ses)) {
                    mkdir("temphotel/client".$client_id_ses);
                    chmod("temphotel/client".$client_id_ses, 0777);
                }
               }else{$resultData=0;}
           return $resultData;
}

function chk_Package_id($client_id_ses){
$query = $this->db->query("SELECT hotel_id FROM tbl_hotels WHERE client_id=$client_id_ses");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
          return $row->hotel_id;
     }
     return 0;
}

function del_Package_data($idrun,$Package_id){
$img_url = "";
$sql = "DELETE from `tbl_package_img`  WHERE id=$idrun";
$query = $this->db->query("SELECT * FROM tbl_package_img WHERE id=$idrun");
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

/*
function get_results_icon($room_f){
 $sql="SELECT * FROM `tbl_field_added_values` JOIN tbl_field_lang_values ON (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu) AND tbl_field_added_values.fld_nm = '$room_f' AND tbl_field_lang_values.fld_nm = '$room_f' AND
 tbl_field_lang_values.lang ='en'";
 return $this->db->query($sql)->result();
}
*/

function main_Package_data($idrun,$Package_id){
$img_url = "";
$sql1 = "UPDATE `tbl_package_img` SET img_main='0'   WHERE Package_id=$Package_id";
$sql2 = "UPDATE `tbl_package_img` SET img_main='1' WHERE id=$idrun";
if($this->db->query($sql1)){
  if($this->db->query($sql2)){
     return 1;
  }return 0;
  }return 0; 
}




function ch_detail_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_package_detail 
    where package_id=$id1 AND lang = '$id2'";
    return $this->db->query($sql)->num_rows();
}

function ch_address_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_hotel_addr 
    where hotel_id=$id1 AND lang = '$id2'";
    return $this->db->query($sql)->num_rows();
}

function get_update_Package($idfind){
 $sql = "SELECT  *
FROM  tbl_packages
 LEFT JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_packages.package_id
 where tbl_packages.package_id=$idfind ORDER BY tbl_package_detail.lang ASC";
    return $this->db->query($sql)->result();
}

function get_address_Package($idfind){
 $sql = "SELECT  
(tbl_hotels.hotel_id) AS hotel_id_run ,
tbl_hotel_addr.lang,
tbl_hotel_addr.hotel_addr,
tbl_hotel_addr.addr_subdistrict
FROM  tbl_hotels
 LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
 LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
 LEFT JOIN tbl_hotel_addr on tbl_hotel_addr.hotel_id = tbl_hotels.hotel_id
 where tbl_hotels.client_id=$idfind ORDER BY tbl_hotel_addr.lang ASC";
    return $this->db->query($sql)->result();
}

 
function get_lang(){
$sql = "SELECT * FROM `tbl_field_lang_values` 
JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm)
AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE  tbl_field_lang_values.fld_nm ='LANG'
AND tbl_field_values.fld_valu <> 'jp' AND tbl_field_values.fld_valu  <> 'cn'
ORDER BY tbl_field_values.fld_nm ASC";
      return $this->db->query($sql)->result();
}


function get_results_province(){
 $sql = "SELECT  * FROM  tbl_province";
      return $this->db->query($sql)->result();
}

function get_results_country(){
   $sql = "SELECT  * FROM   tbl_country";
      return $this->db->query($sql)->result();
}

function get_service($id=NULL){
      $sql = "SELECT
       tbl_services.service_cd,
       tbl_field_lang_values.fld_valu_desc,
       tbl_field_added_values.field1 
       FROM tbl_services
       LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_services.service_cd)
       AND (tbl_field_lang_values.lang = 'en') AND (tbl_field_lang_values.fld_nm='SERVICE_CD')
       LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu)
       AND (tbl_field_added_values.lang = 'en') AND (tbl_field_lang_values.fld_nm='SERVICE_CD') 
       WHERE  tbl_services.client_id =$id";
       return $this->db->query($sql)->result();
}



function get_package_list($idclient){
$sql_detail = "SELECT *,
  IF(tbl_packages.package_room_type='Y', 'Yes', 'No') AS v_package_room_type,
  IF(tbl_packages.published_status='Y', 'Yes', 'No') AS v_published_status,
  IF(tbl_packages.booking_status='Y', 'Yes', 'No') AS v_booking_status
  FROM  tbl_packages
  LEFT JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_packages.package_id
   AND tbl_package_detail.lang = 'en'
  where tbl_packages.client_id= $idclient ORDER BY tbl_package_detail.lang ASC";
    return $this->db->query($sql_detail)->result();
  
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