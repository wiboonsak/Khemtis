<?php
class Room_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }




function get_hotel_name($idroom){
  $sql ="SELECT hotel_nm,txt_policy FROM tbl_hotel_details 
  JOIN tbl_rooms ON tbl_rooms.hotel_id = tbl_hotel_details.hotel_id AND tbl_hotel_details.lang = 'en'
  WHERE tbl_rooms.room_id = $idroom
  ";
  return $this->db->query($sql)->result();
}



function get_book_hotel_detail($utoid_book,$ty){

  $sql = "SELECT 
  tbl_pre_booking.booking_number,
  tbl_pre_booking.booking_stat_cd,
  tbl_pre_booking.date_in,
  tbl_pre_booking.date_out,
   tbl_pre_booking.date_in,
 tbl_pre_booking.date_out,
 tbl_pre_booking.adults,
 tbl_pre_booking.child,
  tbl_pre_booking_room_detail.pre_booking_id,
  tbl_pre_booking_room_detail.room_id,
  tbl_rooms.room_title,
  tbl_pre_booking.num_day,
 count(tbl_rooms.room_id) as cnt_room,
 sum(tbl_pre_booking_room_detail.dscnt_price) as sum_disc,
(CASE WHEN sum(tbl_pre_booking_room_detail.dscnt_price) >0 THEN sum(tbl_pre_booking_room_detail.dscnt_price)
     ELSE sum(tbl_pre_booking_room_detail.price)
     END)  As new_pr,
((CASE WHEN sum(tbl_pre_booking_room_detail.dscnt_price) >0 THEN sum(tbl_pre_booking_room_detail.dscnt_price)
     ELSE sum(tbl_pre_booking_room_detail.price)
 END)  +(tbl_pre_booking_room_detail.total_extra_bed * tbl_pre_booking_room_detail.extra_bed_price * tbl_pre_booking.num_day)) as total_sum,
 (tbl_pre_booking_room_detail.total_extra_bed * tbl_pre_booking_room_detail.extra_bed_price ) as sum_extra,
 (tbl_pre_booking_room_detail.total_extra_bed) as ext_qty
FROM `tbl_pre_booking_room_detail`
    JOIN  tbl_rooms ON tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
    JOIN tbl_pre_booking ON (tbl_pre_booking.pre_booking_id = tbl_pre_booking_room_detail.pre_booking_id)
   WHERE tbl_pre_booking_room_detail.pre_booking_id=$utoid_book
   GROUP BY
    tbl_pre_booking.date_in,
 tbl_pre_booking.date_out,
 tbl_pre_booking.adults,
 tbl_pre_booking.child,
  tbl_pre_booking_room_detail.pre_booking_id,
  tbl_pre_booking_room_detail.room_id,
  tbl_rooms.room_title,
  tbl_pre_booking.num_day";

  return $this->db->query($sql)->result();
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
  
 
function Image_upload($data_file,$room_id,$idc){
  $esum=0;$pthc= base_url();
  if(isset($room_id)){
  if (!file_exists("temphotel/client".$idc."/room".$room_id)) {
       mkdir("temphotel/client".$idc."/room".$room_id);
       chmod("temphotel/client".$idc."/room".$room_id,0777);
  }
     $redata = count($data_file);
     for($i=0;$i<$redata;$i++){
      $v_img_nm = $this->json_pt($data_file[$i]['pname']);
      $v_ptemp  = $this->json_pt($data_file[$i]['ptemp']);
      $imgtyp= ".".pathinfo($v_img_nm, PATHINFO_EXTENSION);
      $unid =  uniqid();
            $data=$arrayName = array(
              "room_id" =>$room_id, 
              "img_nm" =>"temphotel/client".$idc."/room".$room_id."/".$unid.$imgtyp, 
              "img_main" =>0, 
              "img_seq" =>0, 
              "img_title" =>'', 
          );
          if($this->db->insert('tbl_room_img', $data)){   
                  $ptr= 'temphotel/client'.$idc.'/room'.$room_id.'/';
                  $file = $ptr.$unid.$imgtyp;
                  file_put_contents($file, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $v_ptemp)));
                $esum++;
           }
       }
       if($esum == $redata){
          return $room_id;
       }else{
          return 0; 
      }
   }
} 

function chk_icon($room_id,$id_feature){
    $sql = "SELECT  * FROM  tbl_room_features 
    where room_id=$room_id AND room_feature = '$id_feature'";
    return $this->db->query($sql)->num_rows();
}


function update_icon($room_id,$id_feature,$hilight){
  if($this->chk_icon($room_id,$id_feature)>0){
     $sql = "DELETE FROM tbl_room_features WHERE room_id=$room_id AND room_feature=$id_feature";
        if($this->db->query($sql)){
              $resultData=$room_id;
        }else{$resultData=0;}
  }else{
  $data = array(
             "room_id"=>$room_id,
             "room_feature"=>$id_feature,
             "room_feature_hilight"=>$hilight,
            );
      if($this->db->insert('tbl_room_features', $data)){ 
            $resultData=$room_id;
      }else{$resultData=0;}
  }
      return $resultData;
}




function set_true_icon($room_id,$id_valu,$sty){
 if($sty=='Y'){$sty="N";}else{$sty="Y";}
 $data = array(
             "room_feature_hilight" =>$sty,
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('room_feature',$id_valu);
               if($this->db->update('tbl_room_features', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}  
return $resultData;
}


function get_room_icon($room_f,$room_id){
   header('Content-Type: application/json');
        $sql = "SELECT 
        tbl_field_added_values.fld_valu,
        tbl_field_added_values.field1,
        tbl_field_added_values.fld_nm,
        tbl_field_lang_values.fld_valu_desc,
        tbl_room_features.room_feature_hilight
         FROM `tbl_field_added_values` 
            JOIN tbl_field_lang_values ON (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu) 
                AND tbl_field_added_values.fld_nm = '$room_f' 
                AND tbl_field_lang_values.fld_nm = '$room_f' 
                AND tbl_field_lang_values.lang ='en'
            LEFT JOIN tbl_room_features on (tbl_room_features.room_feature = tbl_field_added_values.fld_valu AND tbl_room_features.room_id = $room_id)
          ORDER BY tbl_field_added_values.id ASC";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
}


function get_season_data($hotel_id,$room_id){
    $sql = "
SELECT  
tbl_season_period.season_id,
tbl_season_period.season_nm,
tbl_season_period.start_day,
tbl_season_period.start_month,
tbl_season_period.end_day,
tbl_season_period.end_month,
COUNT(tbl_room_season_price.crcy_code) AS ch_f
FROM `tbl_season_period` 
LEFT JOIN tbl_room_season_price on  (tbl_room_season_price.season_id = tbl_season_period.season_id AND tbl_room_season_price.room_id = $room_id)
WHERE tbl_season_period.hotel_id = $hotel_id
GROUP BY 
tbl_season_period.season_id,
tbl_season_period.season_nm,
tbl_season_period.start_day,
tbl_season_period.start_month,
tbl_season_period.end_day,
tbl_season_period.end_month
ORDER BY tbl_season_period.season_id ASC

    ";
    return $this->db->query($sql)->result();
}

function json_pt($txt){
  $txt =  trim(str_replace('\/', '/',str_replace('"','',json_encode($txt))));
  return $txt;
}


function get_max_id($tb_table,$tb_id){
  $this->db->select_max($tb_id);
  $query=$this->db->get($tb_table);
  $ret = $query->row();
  return $ret->room_id;
}

function get_max_room($tb_table,$tb_id){
  $this->db->select_max($tb_id);
  $query=$this->db->get($tb_table);
  $ret = $query->row();
  return $ret->room_id;
}

function get_room_ar($hotel_id){
      header('Content-Type: application/json');
        $sql = "SELECT  room_id,hotel_id,(SELECT (count(room_id)+1) from tbl_rooms where hotel_id=$hotel_id) as id_no
          FROM `tbl_rooms` WHERE room_id = (SELECT max(room_id) as maxid from tbl_rooms)";
        $query = $this->db->query($sql);
       echo json_encode($query->result());
}


function Add_new_data($hotel_id){
   
            $data = array(
             "hotel_id" =>$hotel_id,
             "room_title" =>'',
             "default_quota" => '',
             "max_extra_bed" => '',
             "published_status" => '',
             "booking_status" =>'',
              );
        if($this->db->insert('tbl_rooms', $data)){ 
              return $this->get_max_id("tbl_rooms","room_id");
        }else{return 0;}
   

}

function delete_room_data($room_id){
         $data = array(
             "published_status" => 'N',
             "booking_status" => 'N',
               );         
               $this->db->where('room_id',$room_id);
               if($this->db->update('tbl_rooms', $data)){
                     return 1;
               }
               require 0;
}



 function Add_update_data($allData=NULL,$command=NULL){
$date_document=date("Y-m-d");
        if($command=="UP"){
             $data = array(
             "room_title" =>$allData["room_title"],
             "default_quota" => $allData["default_quota"],
             "max_extra_bed" => $allData["max_extra_bed"],
             "published_status" => $allData["val_pulis"],
             "booking_status" =>$allData["val_book"],
               );         
               $room_id =$allData["val_room_id"];
               $this->db->where('room_id',$room_id);
               if($this->db->update('tbl_rooms', $data)){
                     $resultData=1;
                     $this->Add_up_details_lang($allData,$room_id);
                     $this->Add_up_cry($allData,$room_id);
               }else{$resultData=0;}
            }
      return $resultData;
    }    

function add_update_season($allData=NULL){
  $command = $allData["command_typ"];
  $idup = $allData["idup"];
  if($command=="UP" && $idup !=""){
             $data = array(
             "season_nm" => $allData["name_season"],
             "start_day" => $allData["p_st_day"],
             "start_month" => $allData["p_st_mon"],
             "end_day" =>$allData["p_en_day"],
             "end_month" =>$allData["p_en_mon"],
               );         
               $this->db->where('season_id',$idup);
               if($this->db->update('tbl_season_period', $data)){
                     $resultData=1;
               }else{$resultData=0;}
    }else{
             $data = array(
             "hotel_id" =>$allData["val_hotel_id"],
             "season_nm" => $allData["name_season"],
             "start_day" => $allData["p_st_day"],
             "start_month" => $allData["p_st_mon"],
             "end_day" =>$allData["p_en_day"],
             "end_month" =>$allData["p_en_mon"],
               );         
               if($this->db->insert('tbl_season_period', $data)){ 
                    $resultData=1;
               }else{return 0;}

    }
      return $resultData;
    }    



function Add_up_details_lang($elm,$room_id){
    $results_lang = $this->get_lang();
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        if($this->ch_detail_distich($room_id,$lg)==0){
            $data = array(
             "room_id" =>$room_id,
             "room_fld_nm" => $elm["room_fld_nm_$lg"],
             "lang" =>$lg,
             "room_fld_desc" => $elm["room_fld_desc_$lg"],
             "room_fld_desc_draft" => $elm["room_fld_desc_$lg"],
             "room_fld_stat_chng"=>'A',
            );
               if($this->db->insert('tbl_room_details', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }else{
            $data = array(
             "room_fld_nm" => $elm["room_fld_nm_$lg"],
             "lang" =>$lg,
             "room_fld_desc" => $elm["room_fld_desc_$lg"],
             "room_fld_desc_draft" => $elm["room_fld_desc_$lg"],
             "room_fld_stat_chng"=>'A',
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('lang',$lg);
               if($this->db->update('tbl_room_details', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }
     }
}





function Add_up_cry($elm,$room_id){
$date_document=date("Y-m-d");
$results_lang = $this->get_crcy_code("CRCY_CODE");
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        $lglow = strtolower($lg);
        if($this->ch_cur_distich($room_id,$lg)==0){
            $data = array(
             "room_id" =>$room_id,
             "crcy_code" =>$lg,
             "default_price" => $elm["default_price_$lglow"],
             "default_dscnt_price" => $elm["dscnt_price_$lglow"],
             "extra_bed_price" => $elm["extra_bed_price_$lglow"],
            );
            
               if($this->db->insert('tbl_room_default_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
               
          }else{
            $data = array(
             "crcy_code" =>$lg,
             "default_price" => $elm["default_price_$lglow"],
             "default_dscnt_price" => $elm["dscnt_price_$lglow"],
             "extra_bed_price" => $elm["extra_bed_price_$lglow"],
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('crcy_code',$lg);
               if($this->db->update('tbl_room_default_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
     }
     return $resultData;
}




function Add_up_cry_season($elm,$room_id,$season_id){
$date_document=date("Y-m-d");
$results_lang = $this->get_crcy_code("CRCY_CODE");
    foreach($results_lang as $vldata){
        $lg = trim($vldata->fld_valu);
        $lglow = strtolower($lg);
        if($this->ch_cur_distich_season($room_id,$season_id,$lg)==0){
            $data = array(
             "room_id" =>$room_id,
             "season_id" =>$season_id,
             "crcy_code" =>$lg,
             "price" => $elm["default_price_$lglow"],
             "dscnt_price" => $elm["dscnt_price_$lglow"],
             "extra_bed_price" => $elm["extra_bed_price_$lglow"],
            );
            
               if($this->db->insert('tbl_room_season_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
               
          }else{
            $data = array(
             "crcy_code" =>$lg,
             "price" => $elm["default_price_$lglow"],
             "dscnt_price" => $elm["dscnt_price_$lglow"],
             "extra_bed_price" => $elm["extra_bed_price_$lglow"],
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('season_id',$season_id);
               $this->db->where('crcy_code',$lg);
               if($this->db->update('tbl_room_season_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
     }
          return $resultData;
}







function del_room_data($idrun,$hotel_id,$room_id){
$img_url = "";
$sql = "DELETE from `tbl_room_img`  WHERE id=$idrun";
$query = $this->db->query("SELECT * FROM tbl_room_img WHERE id=$idrun");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           $img_url = $row->img_nm;
     }
if($this->db->query($sql) && $img_url!=""){
      unlink($img_url);
      return 1;
}else{
      return 0;
   }
}

function main_room_data($idrun,$hotel_id,$room_id){
$img_url = "";
$sql1 = "UPDATE `tbl_room_img` SET img_main='0'   WHERE room_id=$room_id";
$sql2 = "UPDATE `tbl_room_img` SET img_main='1' WHERE id=$idrun";
if($this->db->query($sql1)){
  if($this->db->query($sql2)){
     return 1;
  }return 0;
  }return 0; 
}


function ch_detail_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_room_details 
    where room_id=$id1 AND lang = '$id2'";
    return $this->db->query($sql)->num_rows();
}

function ch_cur_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_room_default_price 
    where room_id=$id1 AND crcy_code = '$id2'";
    return $this->db->query($sql)->num_rows();
}


function ch_cur_distich_season($id1,$id2,$id3){
  $sql = "SELECT  * FROM  tbl_room_season_price 
    where (room_id=$id1 AND season_id=$id2 )AND crcy_code = '$id3'";
    return $this->db->query($sql)->num_rows();
}


function ch_address_distich($id1,$id2){
  $sql = "SELECT  * FROM  tbl_hotel_addr 
    where hotel_id=$id1 AND lang = '$id2'";
    return $this->db->query($sql)->num_rows();
}


function chk_hotel_id($client_id_ses){
$query = $this->db->query("SELECT hotel_id FROM tbl_hotels WHERE client_id=$client_id_ses");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
          return $row->hotel_id;
     }
     return 0;
}


function get_name_room($room_id){

$query = $this->db->query("SELECT room_title FROM tbl_rooms WHERE room_id=$room_id");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
          return $row->room_title;
     }
     return "No Room";

}


function get_select_room($room_id=NULL,$hotel_id=NULL){
$eleroom="";
if(isset($room_id)){$eleroom="AND tbl_rooms.room_id=$room_id";}
$sql_detail = "SELECT *,
  (tbl_rooms.hotel_id) as hotel_idrun ,(tbl_rooms.room_id) as room_idrun 
  FROM  tbl_rooms
  LEFT JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id
  where (tbl_rooms.hotel_id= $hotel_id $eleroom) ORDER BY tbl_room_details.lang ASC";
    return $this->db->query($sql_detail)->result();
}


function get_cry($room_id=NULL,$hotel_id=NULL){
$eleroom="";
if(isset($room_id)){$eleroom="AND tbl_rooms.room_id=$room_id";}
$sql_detail = "SELECT *,
  (tbl_rooms.hotel_id) as hotel_idrun ,(tbl_rooms.room_id) as room_idrun 
  FROM  tbl_rooms
  LEFT JOIN tbl_room_default_price on tbl_room_default_price.room_id = tbl_rooms.room_id
  where (tbl_rooms.hotel_id= $hotel_id $eleroom) ORDER BY tbl_room_default_price.crcy_code ASC";
    return $this->db->query($sql_detail)->result();
}


function get_results_icon($room_f){
 $sql="SELECT * FROM `tbl_field_added_values` JOIN tbl_field_lang_values ON (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu) AND tbl_field_added_values.fld_nm = '$room_f' AND tbl_field_lang_values.fld_nm = '$room_f' AND
 tbl_field_lang_values.lang ='en'";
 return $this->db->query($sql)->result();

}


function get_tbl_season_period($hotel_id){
     header('Content-Type: application/json');
     $sql="SELECT * FROM tbl_season_period WHERE hotel_id=$hotel_id";
     $query = $this->db->query($sql);
     echo json_encode($query->result());
}


function get_tbl_season_room_season($room_id,$season_id){

    header('Content-Type: application/json');
    $sql="SELECT * FROM tbl_room_season_price WHERE room_id=$room_id AND season_id=$season_id ORDER BY crcy_code DESC";
     $query = $this->db->query($sql);
     echo json_encode($query->result());

}


function  set_stat_cd($booking_number){
           $data = array(
             "booking_stat_cd" => 'N',
               );         
               $this->db->where('booking_number',$booking_number);
               if($this->db->update('tbl_pre_booking', $data)){
                     return 1;
               }
               require 0;
}

function get_booking_list($idclient,$filter){
  $txt_filter = "";
  if($filter!="all"){
    $txt_filter = "AND tbl_pre_booking.booking_stat_cd = '$filter'";
  }
$sql_detail = "SELECT 
tbl_gp_booking.add_date,
tbl_pre_booking.booking_number,
tbl_pre_booking.pre_booking_id,
sum(tbl_pre_booking_room_detail.total_price) as sum_price,
tbl_pre_booking.cus_first_name,
tbl_pre_booking.cus_last_name,
tbl_pre_booking.cus_phone,
tbl_pre_booking.cus_email,
tbl_pre_booking.cus_addr,
tbl_pre_booking.booking_stat_cd,
tbl_hotels.comm_price
FROM tbl_pre_booking
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_rooms on tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id AND tbl_gp_booking_detail.book_type = 'HT'
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
WHERE tbl_hotels.client_id = $idclient AND tbl_pre_booking.booking_stat_cd <> 'N' 
$txt_filter
GROUP BY
tbl_gp_booking.add_date,
tbl_pre_booking.booking_number,
tbl_pre_booking.pre_booking_id,
tbl_pre_booking.cus_first_name,
tbl_pre_booking.cus_last_name,
tbl_pre_booking.cus_phone,
tbl_pre_booking.cus_email,
tbl_pre_booking.cus_addr,
tbl_pre_booking.booking_stat_cd,
tbl_hotels.comm_price

ORDER BY tbl_pre_booking.pre_booking_id DESC
";
    return $this->db->query($sql_detail)->result();
}



function get_room_list($idclient){
$sql = "SELECT  hotel_id FROM  tbl_hotels 
    where client_id=$idclient";
   $query = $this->db->query($sql);
   $row = $query->row();
   if(isset($row)){
        $hotel_id = $row->hotel_id;
$sql_detail = "SELECT *,
  IF(tbl_rooms.published_status='Y', 'Yes', 'No') AS v_published_status,
  IF(tbl_rooms.booking_status='Y', 'Yes', 'No') AS v_booking_status,
  (tbl_rooms.hotel_id) as hotel_idrun ,(tbl_rooms.room_id) as room_idrun 
  FROM  tbl_rooms
  LEFT JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id
   AND tbl_room_details.lang = 'en'
  where tbl_rooms.hotel_id= $hotel_id AND (tbl_rooms.published_status <> 'N' AND tbl_rooms.booking_status <> 'N') ORDER BY tbl_room_details.lang ASC";
    return $this->db->query($sql_detail)->result();
  }
}


/*  Show tbl_field_values  [CRCY_CODE]  */
function get_tbl_field_values($st_data,$st_pr){
        header('Content-Type: application/json');
        $element_data = "";
        if($st_data==1){$element_data=" WHERE fld_nm='$st_pr'";}
        if($st_data==2){$element_data=" WHERE Like '%$name%'";}
        $sql = "SELECT * FROM tbl_field_values $element_data ";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
}

function get_crcy_code($st_pr){
  $sql = "SELECT 
   tbl_field_values.fld_nm,
   tbl_field_values.fld_valu,
   tbl_field_lang_values.fld_valu_desc
   FROM tbl_field_values
   LEFT JOIN  tbl_field_lang_values on  (tbl_field_lang_values.fld_nm = tbl_field_values.fld_nm)
   AND (tbl_field_lang_values.fld_valu =tbl_field_values.fld_valu)
   WHERE tbl_field_values.fld_nm='$st_pr' ORDER BY tbl_field_values.fld_valu DESC";
  return $this->db->query($sql)->result();
}




function get_address_hotel($idfind){
 $sql = "SELECT  
(tbl_hotels.hotel_id) AS hotel_id_run ,
tbl_hotel_addr.lang,
tbl_hotel_addr.hotel_addr,
tbl_hotel_addr.addr_subdistrict
FROM  tbl_hotels
 JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
 JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
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




function get_room_data($hotel_id=NULL,$room_id=NULL){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_room_img WHERE room_id=$room_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
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