<?php
class Room_iv_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }

function check_0($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
    return $this->db->query($sql)->num_rows();
}
function check_1($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1' BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
    return $this->db->query($sql)->num_rows();
}
function check_2($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3' BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
    return $this->db->query($sql)->num_rows();
}

function add_ch1($d1,$d2,$d3,$room_id){
   $data = array("end_dt" =>$d2,);
      $this->db->where('room_id',$room_id);
      $this->db->where('end_dt',$d1);
   if($this->db->update('tbl_room_time_off', $data)){
      return 1;
   }else{return 0;}
}

function add_ch2($d1,$d2,$d3,$room_id){
   $data = array("start_dt" =>$d2,);
      $this->db->where('room_id',$room_id);
      $this->db->where('start_dt',$d3);
   if($this->db->update('tbl_room_time_off', $data)){
      return 1;
   }else{return 0;}
}


function add_ch0($d1,$d2,$d3,$room_id){
    $data = array(
      "room_id" =>$room_id,
      "start_dt" =>$d2,
      "end_dt" =>$d2,
  );
    if($this->db->insert('tbl_room_time_off', $data)){ 
       return 1;
    }else{return 0;}
}

function check_off1($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
    return $this->db->query($sql)->num_rows();
}
function off_ch1($d1,$d2,$d3,$room_id){
   $data = array("end_dt" =>$d1,);
      $this->db->where('room_id',$room_id);
      $this->db->where('end_dt',$d2);
   if($this->db->update('tbl_room_time_off', $data)){
      return 1;
   }else{return 0;}
}

function check_off2($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
    return $this->db->query($sql)->num_rows();
}
function off_ch2($d1,$d2,$d3,$room_id){
   $data = array("start_dt" =>$d3,);
      $this->db->where('room_id',$room_id);
      $this->db->where('start_dt',$d2);
   if($this->db->update('tbl_room_time_off', $data)){
      return 1;
   }else{return 0;}
}

function check_off3($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3' NOT BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
    return $this->db->query($sql)->num_rows();
}
function off_ch3($d1,$d2,$d3,$room_id){
  $sql = "DELETE FROM tbl_room_time_off WHERE (room_id=$room_id AND start_dt='$d2' AND end_dt='$d2')";
  $query = $this->db->query($sql);
   if($query){
      return 1;
   }else{return 1;}
}

function check_off4($d1,$d2,$d3,$room_id){
  $sql = "SELECT * FROM `tbl_room_time_off` WHERE tbl_room_time_off.room_id = $room_id
AND '$d1'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d2'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt
AND '$d3'  BETWEEN tbl_room_time_off.start_dt AND tbl_room_time_off.end_dt";
   $query = $this->db->query($sql);
   $row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
          return $row->end_dt;
     }
     return "No";

}
function   off_ch4($d1,$d2,$d3,$room_id,$last_dt){
   $data = array("end_dt" =>$d1,);
      $this->db->where('room_id',$room_id);
      $this->db->where('end_dt',$last_dt);
   if($this->db->update('tbl_room_time_off', $data)){
      $data = array(
      "room_id" =>$room_id,
      "start_dt" =>$d3,
      "end_dt" =>$last_dt,
  );
    if($this->db->insert('tbl_room_time_off', $data)){ 
       return 1;
    }else{return 0;}
   }else{return 0;}
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

function ch_onoff(){

  return 0;
}
function Update_onoff(){
  if($this->ch_onoff()){
   
  }
}


function Add_up_qta_iv($room_id,$qta,$pdate){
        if($this->ch_qta_distich_iv($room_id,$pdate)==0){
            $data = array(
             "room_id" =>$room_id,
             "quota_dt" =>$pdate,
             "limit_room" => $qta,
             "remain_room" => 0,
            );
               if($this->db->insert('tbl_room_quota', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }else{
            $data = array(
             "limit_room" => $qta,
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('quota_dt',$pdate);
               if($this->db->update('tbl_room_quota', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
     
          return $resultData;
}



function Add_up_cry_iv($room_id,$cry,$price,$pdate){
        if($this->ch_cur_distich_iv($room_id,$cry,$pdate)==0){
            $data = array(
             "room_id" =>$room_id,
             "crcy_code" =>$cry,
             "price_dt" =>$pdate,
             "price" => $price,
             "dscnt_price" => 0,
             "extra_bed_price" => 0,
            );
               if($this->db->insert('tbl_room_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
          }else{
            $data = array(
             "price" => $price,
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('price_dt',$pdate);
               $this->db->where('crcy_code',$cry);
               if($this->db->update('tbl_room_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
     
          return $resultData;
}


function room_detail($hotel_id){
        $sql = "SELECT  * FROM  tbl_rooms WHERE hotel_id=$hotel_id";
         return $this->db->query($sql)->result();
}

function room_detail_iv($hotel_id,$datefind_s,$datefind_e){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_rooms
                JOIN tbl_room_price on tbl_room_price.room_id = tbl_rooms.room_id 
         WHERE  (tbl_room_price.price_dt BETWEEN '$datefind_s' AND '$datefind_e')   And tbl_rooms.hotel_id=$hotel_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
}

function room_detail_qta($hotel_id,$datefind_s,$datefind_e){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_rooms
                JOIN tbl_room_quota on tbl_room_quota.room_id = tbl_rooms.room_id 
         WHERE  (tbl_room_quota.quota_dt BETWEEN '$datefind_s' AND '$datefind_e')   And tbl_rooms.hotel_id=$hotel_id";
       

 $query = $this->db->query($sql);


   echo json_encode($query->result());
}

function room_detail_off($hotel_id,$datefind_s,$datefind_e){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_rooms
                JOIN tbl_room_time_off on tbl_room_time_off.room_id = tbl_rooms.room_id 
         WHERE  tbl_rooms.hotel_id=$hotel_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
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

function ch_qta_distich_iv($id1,$id2){
  $sql = "SELECT  * FROM  tbl_room_quota 
    where (room_id=$id1 AND quota_dt = '$id2')";
    return $this->db->query($sql)->num_rows();
}


function ch_cur_distich_iv($id1,$id2,$id3){
  $sql = "SELECT  * FROM  tbl_room_price 
    where (room_id=$id1 AND crcy_code='$id2' AND price_dt = '$id3')";
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


function get_service($id=NULL){
      $sql = "SELECT
       tbl_services.service_cd,
       tbl_field_lang_values.fld_valu_desc
       FROM tbl_services
       LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_services.service_cd)
       AND (tbl_field_lang_values.lang = 'en') AND (tbl_field_lang_values.fld_nm='SERVICE_CD')
       WHERE  tbl_services.client_id =$id";
       return $this->db->query($sql)->result();
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


function get_room_data($hotel_id=NULL,$room_id=NULL){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_room_img WHERE room_id=$room_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
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