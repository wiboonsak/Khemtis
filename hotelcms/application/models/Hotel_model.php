<?php

class Hotel_model extends CI_Model{
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


function   get_get_tbl_hotel_type(){
       $sql = "SELECT  * FROM   tbl_hotel_type";
      return $this->db->query($sql)->result();
}


function set_pop($id_run,$st_p){
             $data = array(
             "st_p" =>$st_p,
             );         
       $this->db->where('id_run',$id_run);
       if($this->db->update('tbl_hotel_location_travel', $data)){
           return 1;
       }
       return 0 ;
}




function del_hotel_travel($id_run){

    $this->db->where('id_run', $id_run);
    if($this->db->delete('tbl_hotel_location_travel')){
       return 1;
    }
    return 0 ;
}

function add_hotel_travel($hotel_id,$lang,$name_location,$number_distance,$type_distance){
            $data=$arrayName = array(
              "hotel_id" =>$hotel_id, 
              "name_location" =>$name_location, 
              "number_distance" =>$number_distance, 
              "type_distance" =>$type_distance, 
              "st_p" =>0, 
              "lang" =>$lang,
          );
          if($this->db->insert('tbl_hotel_location_travel', $data)){   
               return 1;
           }
       


}

function show_hotel_travel($hotel_id,$lang){
$sql = "SELECT * FROM `tbl_hotel_location_travel` WHERE hotel_id=$hotel_id AND lang='$lang' ORDER BY name_location ASC";
      return $this->db->query($sql)->result();
}

function show_hotel_data($hotel_id,$lang){
$sql = "SELECT tbl_hotels.hotel_id,tbl_hotels.hotel_grade,tbl_hotel_details.hotel_nm,tbl_hotel_img.img_name,tbl_hotel_details.short_desc FROM `tbl_hotel_details`
 JOIN tbl_hotels ON tbl_hotels.hotel_id = tbl_hotel_details.hotel_id
 JOIN tbl_hotel_img ON tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main=1
 WHERE tbl_hotel_details.hotel_id=$hotel_id AND tbl_hotel_details.lang='$lang'";
      return $this->db->query($sql)->result();
}


function Image_upload($data_file,$hotel_id,$idc){
                if (!file_exists("temphotel/client".$idc)) {
                    mkdir("temphotel/client".$idc);
                    chmod("temphotel/client".$idc, 0777);
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
              "hotel_id" =>$hotel_id, 
              "img_name" =>"temphotel/client".$idc."/".$unid.$imgtyp, 
              "img_main" =>0, 
              "img_seq" =>0, 
              "img_title" =>'', 
          );
          if($this->db->insert('tbl_hotel_img', $data)){   
                  $ptr= 'temphotel/client'.$idc.'/';
                  $file = $ptr.$unid.$imgtyp;
                  file_put_contents($file, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $v_ptemp)));
                $esum++;
           }
       }
       if($esum == $redata){
          return $hotel_id;
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
               if($this->db->insert('tbl_hotels', $data)){ 
                     $resultData=$this->get_max_id("tbl_hotels","hotel_id");
                if (!file_exists("temphotel/client".$client_id_ses)) {
                    mkdir("temphotel/client".$client_id_ses);
                    chmod("temphotel/client".$client_id_ses, 0777);
                }
               }else{$resultData=0;}
           return $resultData;
        }
}
function get_max_id($tb_table,$tb_id){
  $this->db->select_max($tb_id);
  $query=$this->db->get($tb_table);
  $ret = $query->row();
  return $ret->hotel_id;
}




public function Add_update_data($allData=NULL,$command=NULL,$client_id_ses=NULL,$idst){
$date_document=date("Y-m-d");$pthc= base_url();
        if($command=="ADD"){
            $data = array(
             "client_id" =>$client_id_ses,
             "create_date" =>$date_document,
             "hotel_phone" => $allData["hotel_phone"],
             "booking_email" => $allData["booking_email"],
             "hotel_map_url" => $allData["hotel_map_url"],
             "province_id" =>$allData["val_province_id"],
             "country_id" =>$allData["val_country_id"],
             "key_words" =>$allData["key_words"],
             "hotel_grade"=>$allData["val_grade"],
             "booking_approve"=>'N',
             "lock_room_state"=>'A',
             "rec_status"=>'A',
             "h_lat"=>$allData["get_lat"],
             "h_lng"=>$allData["get_lng"],
             "hotel_typ"=>$allData["type_id"],
               );
               if($this->db->insert('tbl_hotels', $data)){ 
                if (!file_exists("temphotel/client".$client_id_ses)) {
                    mkdir("temphotel/client".$client_id_ses);
                    chmod("temphotel/client".$client_id_ses, 0777);
                }
                     $resultData=$this->get_max_id("tbl_hotels","hotel_id");
                     $this->Add_up_details_lang($allData,$resultData);
                     $this->Add_up_Address_lang($allData,$resultData);
               }else{$resultData=0;}
                     
        }else if($command=="UP"){
             $data = array(
             "create_date" =>$date_document,
             "hotel_phone" => $allData["hotel_phone"],
             "booking_email" => $allData["booking_email"],
             "hotel_map_url" => $allData["hotel_map_url"],
             "province_id" =>$allData["val_province_id"],
             "country_id" =>$allData["val_country_id"],
             "key_words" =>$allData["key_words"],
             "hotel_grade"=>$allData["val_grade"],
             "h_lat"=>$allData["get_lat"],
             "h_lng"=>$allData["get_lng"],
             //"booking_approve"=>'N',
             "lock_room_state"=>'A',
             "rec_status"=>'A',
             "hotel_typ"=>$allData["type_id"],
               );         
               $hotel_id =$allData["val_hotel_id"];
               $this->db->where('hotel_id',$hotel_id);
               if($this->db->update('tbl_hotels', $data)){
                   $resultData=2;
                   
               if (!file_exists("temphotel/client".$client_id_ses)) {
                   mkdir("temphotel/client".$client_id_ses);
                   chmod("temphotel/client".$client_id_ses, 0777);
                }

                   $this->Add_up_details_lang($allData,$hotel_id,$idst);
                   $this->Add_up_Address_lang($allData,$hotel_id,$idst);
               }else{$resultData=0;}
            }
      return $resultData;
    }    




function Add_up_Address_lang($elm,$hotel_id,$idst){
$results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);


  $hotel_addr_ch = "P";
  $addr_subdistrict_ch = "P";
  $hotel_addr = $elm["old_hotel_addr_$lg"];
  $hotel_addr_draf = $elm["hotel_addr_$lg"];
  $addr_subdistrict = $elm["old_addr_subdistrict_$lg"];
  $addr_subdistrict_draf = $elm["addr_subdistrict_$lg"];

if($idst==1){
  $hotel_addr_ch = "A";
  $addr_subdistrict_ch = "A";
  $hotel_addr = $elm["hotel_addr_$lg"];
  $hotel_addr_draf = "";
  $addr_subdistrict = $elm["addr_subdistrict_$lg"];
  $addr_subdistrict_draf = "";

}


        if($this->ch_address_distich($hotel_id,$lg)==0){
            $data = array(
             "hotel_id" =>$hotel_id,
             "lang" =>$lg,
             "hotel_addr" => $hotel_addr,
             "addr_subdistrict" => $addr_subdistrict,
             "hotel_addr_draf" => $hotel_addr_draf,
             "hotel_addr_ch" => $hotel_addr_ch,
             "addr_subdistrict_draf" => $addr_subdistrict_draf,
             "addr_subdistrict_ch" => $addr_subdistrict_ch,
            );
               if($this->db->insert('tbl_hotel_addr', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }else{
            $data = array(
             "hotel_addr" => $hotel_addr,
             "addr_subdistrict" => $addr_subdistrict,
             "hotel_addr_draf" => $hotel_addr_draf,
             "hotel_addr_ch" => $hotel_addr_ch,
             "addr_subdistrict_draf" => $addr_subdistrict_draf,
             "addr_subdistrict_ch" => $addr_subdistrict_ch,
            );
               $this->db->where('hotel_id',$hotel_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_hotel_addr', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
     }
}




function Add_up_details_lang($elm,$hotel_id,$idst){


 
    $results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);


  $hotel_nm_stat_chng = "P";
  $short_desc_stat_chng = "P";
  $long_desc_stat_chng = "P";
  $hotel_nm =  $elm["old_hotel_nm_$lg"];
  $hotel_nm_draft = $elm["hotel_nm_$lg"];
  $short_desc = $elm["old_short_desc_$lg"];;
  $short_desc_draft = $elm["short_desc_$lg"];
  $long_desc = $elm["old_long_desc_$lg"];
  $long_desc_draft = $elm["long_desc_$lg"];

  $txt_policy = $elm["old_val_short_policy_$lg"];
  $txt_policy_draft = $elm["val_short_policy_$lg"];

if($idst==1){
  $hotel_nm_stat_chng = "A";
  $short_desc_stat_chng = "A";
  $long_desc_stat_chng = "A";
  $hotel_nm = $elm["hotel_nm_$lg"];
  $hotel_nm_draft = "";
  $short_desc = $elm["short_desc_$lg"];
  $short_desc_draft = "";
  $long_desc = $elm["long_desc_$lg"];
  $long_desc_draft = "";

  $txt_policy = $elm["val_short_policy_$lg"];
  $txt_policy_draft = "";
}

        if($this->ch_detail_distich($hotel_id,$lg)==0){
            $data = array(
             "hotel_id" =>$hotel_id,
             "lang" =>$lg,
             "hotel_nm" => $hotel_nm,
             "hotel_nm_draft" => $hotel_nm_draft,
             "hotel_nm_stat_chng"=>$hotel_nm_stat_chng,
             "short_desc" => $short_desc,
             "short_desc_draft" => $short_desc_draft,
             "short_desc_stat_chng"=>$short_desc_stat_chng,
             "long_desc" => $long_desc,
             "long_desc_draft" => $long_desc_draft,
             "long_desc_stat_chng"=>$long_desc_stat_chng,
             "txt_policy"=>$txt_policy,
             "txt_policy_draft"=>$txt_policy_draft,
            );
      
               if($this->db->insert('tbl_hotel_details', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }else{
            $data = array(
             "hotel_nm" => $hotel_nm,
             "hotel_nm_draft" => $hotel_nm_draft,
             "hotel_nm_stat_chng"=>$hotel_nm_stat_chng,
             "short_desc" => $short_desc,
             "short_desc_draft" => $short_desc_draft,
             "short_desc_stat_chng"=>$short_desc_stat_chng,
             "long_desc" => $long_desc,
             "long_desc_draft" => $long_desc_draft,
             "long_desc_stat_chng"=>$long_desc_stat_chng,
             "txt_policy"=>$txt_policy,
             "txt_policy_draft"=>$txt_policy_draft,
            );
               $this->db->where('hotel_id',$hotel_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_hotel_details', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }
     }
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


function get_hotel_data($hotel_id=NULL){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_hotel_img WHERE hotel_id=$hotel_id";
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


function chk_hotel_id($client_id_ses){
$query = $this->db->query("SELECT hotel_id FROM tbl_hotels WHERE client_id=$client_id_ses");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
          return $row->hotel_id;
     }
     return 0;
}




function del_hotel_data($idrun,$hotel_id){
$img_url = "";
$sql = "DELETE from `tbl_hotel_img`  WHERE id=$idrun";
$query = $this->db->query("SELECT * FROM tbl_hotel_img WHERE id=$idrun");
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



function main_hotel_data($idrun,$hotel_id){
$img_url = "";
$sql1 = "UPDATE `tbl_hotel_img` SET img_main='0'   WHERE hotel_id=$hotel_id";
$sql2 = "UPDATE `tbl_hotel_img` SET img_main='1' WHERE id=$idrun";
if($this->db->query($sql1)){
  if($this->db->query($sql2)){
     return 1;
  }return 0;
  }return 0; 
}



function ch_detail_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_hotel_details 
    where hotel_id=$id1 AND lang = '$id2'";
    return $this->db->query($sql)->num_rows();
}

function ch_address_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_hotel_addr 
    where hotel_id=$id1 AND lang = '$id2'";
    return $this->db->query($sql)->num_rows();
}

function get_update_hotel($idfind){
 $sql = "SELECT  *,
(tbl_hotels.hotel_id) as hotel_idrun 
FROM  tbl_hotels
 LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
 LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
 LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id
 where tbl_hotels.client_id=$idfind ORDER BY tbl_hotel_details.lang ASC";
    return $this->db->query($sql)->result();
}

function get_address_hotel($idfind){
 $sql = "SELECT  
(tbl_hotels.hotel_id) AS hotel_id_run ,
tbl_hotel_addr.lang,
tbl_hotel_addr.hotel_addr,
tbl_hotel_addr.addr_subdistrict,
tbl_hotel_addr.hotel_addr_draf,
tbl_hotel_addr.hotel_addr_ch,
tbl_hotel_addr.addr_subdistrict_draf,
tbl_hotel_addr.addr_subdistrict_ch
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