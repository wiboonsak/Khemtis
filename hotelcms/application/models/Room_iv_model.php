<?php
class Room_iv_model extends CI_Model{
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

function  save_gala_m($room_id,$txt_detail,$price_gala,$txt_date,$price){
  $resultData = 0;

    if($room_id !="" && $txt_date !=""){

       $resultData =  $this->add_new_price($room_id,$txt_detail,$price_gala,$txt_date,$price);
       $resultData = 1;
    }
      return $resultData;
}


function ch_new_price($room_id,$txt_date){
$query = $this->db->query("SELECT count(*) as numrow FROM `tbl_room_price` WHERE room_id=$room_id AND price_dt='$txt_date'");
$row = $query->row();
if (isset($row)){
        return $row->numrow;
   }
   return 1;
}

  
function add_new_price($room_id,$txt_detail,$price_gala,$pdate,$price){
/*
   $data = array(
             "room_id" =>$room_id,
             "crcy_code" => 'THB',
             "price_dt" => $pdate,
             "price" => $price_gala,
             "dscnt_price" =>0,
             "extra_bed_price" =>0,
             "price_gala" =>$price_gala,
             "txt_detail" =>$txt_detail,
               );         
               if($this->db->insert('tbl_room_price', $data)){ 
                     return 1;
               }else{return 0;}
*/
 if($this->ch_cur_distich_iv($room_id,'THB',$pdate)==0){
            $data = array(
             "room_id" =>$room_id,
             "crcy_code" =>'THB',
             "price_dt" =>$pdate,
             "price" => $price_gala,
             "dscnt_price" =>0,
             "extra_bed_price" => 0,
             "price_gala" => 0,
             "txt_detail" =>$txt_detail,
            );
               if($this->db->insert('tbl_room_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
            }else{
            $data = array(
              "price" => $price_gala,
              "price_gala" => 0,
              "txt_detail" =>$txt_detail,
            );
               $this->db->where('room_id',$room_id);
               $this->db->where('price_dt',$pdate);
               $this->db->where('crcy_code','THB');
               if($this->db->update('tbl_room_price', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}   
          }
          return $resultData;


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
ORDER BY tbl_season_period.season_id ASC";

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

function Add_up_qta_iv($room_id,$qta,$pdate,$remain,$def_room){
        if($this->ch_qta_distich_iv($room_id,$pdate)==0){
            $data = array(
             "room_id" =>$room_id,
             "quota_dt" =>$pdate,
             "limit_room" => $qta,
             "remain_room" => $qta,
            );
               if($this->db->insert('tbl_room_quota', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
            }else{
  // $ch_remain = $remain;
  // if($def_room<$qta){$ch_remain=$ch_remain+($qta-$def_room);}

            $data = array(
             "limit_room" => $qta,
             "remain_room"=> $qta,
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
   $ds_pr = 0;

        if($this->ch_cur_distich_iv($room_id,$cry,$pdate)==0){
            $data = array(
             "room_id" =>$room_id,
             "crcy_code" =>$cry,
             "price_dt" =>$pdate,
             "price" => $price,
             "dscnt_price" =>0,
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

//-----------------------------------------------------------------------------------------------------------------------------
  // Check Room Normal Price

function room_normal_pr($hotel_id,$datefind_s,$datefind_e){
  /*
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_rooms
                JOIN tbl_room_price on tbl_room_price.room_id = tbl_rooms.room_id 
         WHERE  (tbl_room_price.price_dt BETWEEN '$datefind_s' AND '$datefind_e')   And tbl_rooms.hotel_id=$hotel_id And tbl_room_price.crcy_code='THB'";
        $query = $this->db->query($sql);
   echo json_encode($query->result());

}
*/
//------------------------------------------------------SUB--------------------------------------------------------------------

$show_all_price_room  =array();
$dt_st=$datefind_s;
$dt_en=$datefind_e;
$numdate= 14;
$hotel_id = $hotel_id;
$ar_room_data_price=array();
$room_sql = "SELECT 
tbl_rooms.room_id,
tbl_rooms.hotel_id,
tbl_room_default_price.crcy_code,
tbl_room_default_price.default_dscnt_price,
tbl_room_default_price.default_price
FROM tbl_rooms
JOIN tbl_room_default_price on tbl_room_default_price.room_id = tbl_rooms.room_id
WHERE  tbl_rooms.hotel_id = $hotel_id
AND tbl_room_default_price.crcy_code='THB'";
$room_data = $this->db->query($room_sql)->result();
$ar_room_data=array();
 foreach($room_data as $value_room){
  $ar_re_room = array();
  $ar_room=array();
        array_push($ar_room,
             $value_room->room_id,
             $value_room->hotel_id,
             $value_room->crcy_code,
             $value_room->default_dscnt_price,
             $value_room->default_price
        );
        array_push($ar_room_data,$ar_room);  
 }
$ar_iv_room = array();
foreach($ar_room_data as $value_room){
$final_add_rom_price =array();
/*
$txt_date = ""
for($ddd=0;$dddd<$numdate;$ddd++){
  $chd = date('Y-m-d', strtotime($dt_st .' +'.$ddd.'day'));
  $chd 
}
*/
$datadd = 0;

for($d=0;$d<$numdate;$d++){
    $get_date = date('Y-m-d', strtotime($dt_st .' +'.$d.'day'));

    $room_id = $value_room[0];
    $def_price = $value_room[4];
    $hotel_id = $value_room[1];
    $crcy_code = $value_room[2];
    $default_dscnt_price = $value_room[3];

//$year = DATE("Y");
 $date = DateTime::createFromFormat("Y-m-d", $get_date);
// $year = $year."-".$date->format("Y-m-d");
 $year = $date->format("Y-m-d");
 $ych = $date->format("Y");

$sql_2 = "SELECT 
tbl_room_season_price.crcy_code,tbl_room_season_price.price,
tbl_room_season_price.dscnt_price,tbl_room_season_price.extra_bed_price
FROM `tbl_room_season_price` 
JOIN tbl_season_period on tbl_season_period.season_id = tbl_room_season_price.season_id
WHERE   tbl_room_season_price.crcy_code = 'THB'  
AND ( '$year'
  BETWEEN 
CONCAT($ych,'-',tbl_season_period.start_month,'-',tbl_season_period.start_day)  
AND 
CONCAT($ych,'-',tbl_season_period.end_month,'-',tbl_season_period.end_day))
AND tbl_room_season_price.price > 0
AND tbl_room_season_price.room_id = $room_id";

$sea_data = $this->db->query($sql_2)->result();
     $query_sea = $this->db->query($sql_2);
     $row_sea = $query_sea->row();
     if($query_sea->num_rows()>0 && (isset($row_sea))){
foreach($sea_data as $value_sea_room){
 $def_price_sea =  $value_sea_room->price;
 $def_price_sea_n = $value_sea_room->price;
 if($value_sea_room->dscnt_price > 0 &&  $value_sea_room->dscnt_price !=""){
  $def_price_sea= "<font color='#ad4444'>".number_format($value_sea_room->dscnt_price,2)."</font>";
  $def_price_sea_n = $value_sea_room->dscnt_price;
  $n_pr_sea=$value_sea_room->dscnt_price;}
 else{
  $def_price_sea =  number_format($value_sea_room->price,2);$n_pr_sea=$value_sea_room->price;
  $def_price_sea_n = $value_sea_room->price;

 }
         $ar_sea =  array();
            array_push($ar_sea, 
            "<b><font color='#1e8daf'>SE</font></b>&nbsp;:&nbsp;".$def_price_sea,
            $n_pr_sea,
            $get_date,
            $def_price_sea_n
        );
         array_push($final_add_rom_price,$ar_sea);  
         $ar_re_room = $final_add_rom_price;
}}else{
  $def_price =  $def_price;
  $def_price_n =  $def_price;
  if($default_dscnt_price > 0 && $default_dscnt_price !=""){
    $def_price= "<font color='#ad4444'>".number_format($default_dscnt_price,2)."</font>";
    $def_price_n = $default_dscnt_price;
    $n_pr_def=$default_dscnt_price;}
  else{$def_price=number_format($def_price,2);
       $def_price_n = $def_price;
       $n_pr_def=$def_price;}
          $ar_def =  array();
           array_push($ar_def, 
            $def_price,
            $n_pr_def,
            $get_date,
            $def_price_n
        );
          array_push($final_add_rom_price,$ar_def);  
          $ar_re_room = $final_add_rom_price;
}}
        $new_all_ar = array();
        array_push($new_all_ar, 
            $room_id,
            $hotel_id,
            $ar_re_room,
            $crcy_code
          );
        array_push($show_all_price_room,$new_all_ar);  

}
$data = array();
 header('Content-Type: application/json');
  foreach ($show_all_price_room as $value){
    foreach ($value[2] as $arsub) {
    // echo "<br>".$value[0]." : (".$arsub[0]."_".$arsub[1].")".$arsub[1];
         array_push($data, array('idr' => $value[0],'ht' => $value[1],'pr' => $arsub[0],'dt' => $arsub[2],'npr' => $arsub[1],'npr_n' => $arsub[3]));
    }
  }
  echo json_encode($data);
 //echo json_encode($room_data);
}

//-------------------------------------------------------------------------------------------------------------------------------


function room_qtr($hotel_id,$datefind_s,$datefind_e){
$ar_room_data_qty=array();
$room_sql = "SELECT 
tbl_rooms.room_id,
tbl_rooms.hotel_id,
tbl_room_default_price.crcy_code,
tbl_room_default_price.default_dscnt_price,
tbl_room_default_price.default_price
FROM tbl_rooms
JOIN tbl_room_default_price on tbl_room_default_price.room_id = tbl_rooms.room_id
WHERE  tbl_rooms.hotel_id = $hotel_id
AND tbl_room_default_price.crcy_code='THB'";
$room_data = $this->db->query($room_sql)->result();
    foreach($room_data as $value_room){
      $ar_room_data=array();
      $id_room = $value_room->room_id;
$numdate= 14;
for($d=0;$d<$numdate;$d++){
 $get_date = date('Y-m-d', strtotime($datefind_s .' +'.$d.'day'));
 $year = DATE("Y");
 $date = DateTime::createFromFormat("Y-m-d", $get_date);
 $year = $year."-".$date->format("m-d");

 $sql = "SELECT tbl_pre_booking.str_st,tbl_pre_booking_room_detail.room_id,count(tbl_pre_booking_room_detail.room_id) as count_room 
FROM tbl_pre_booking 
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
WHERE tbl_pre_booking.str_st = 1 AND ('$year' BETWEEN  tbl_pre_booking.date_in AND DATE_ADD(tbl_pre_booking.date_out, INTERVAL -1 DAY)) AND tbl_pre_booking_room_detail.room_id = $id_room 
GROUP BY 
tbl_pre_booking.str_st,tbl_pre_booking_room_detail.room_id
ORDER BY tbl_pre_booking.pre_booking_id asc";
$room_qty = $this->db->query($sql)->result();
$set_qtr = 0;
  foreach ($room_qty as $key => $v_qtr) {
     $set_qtr = $v_qtr->count_room;
  }
   $ar_room_add_qty=array();
   array_push($ar_room_add_qty,$year,$set_qtr,$id_room);
   array_push($ar_room_data,$ar_room_add_qty);
  }
   array_push($ar_room_data_qty,$ar_room_data);
 }
$data = array();
header('Content-Type: application/json');
 foreach ($ar_room_data_qty as $value) {
   for($i=0;$i<14;$i++){
      array_push($data, array('dmy' => $value[$i][0],'qty' => $value[$i][1],'idr' => $value[$i][2]));
    }
 }
   echo json_encode($data);
}






function room_detail_iv($hotel_id,$datefind_s,$datefind_e){
  //$hotel_id=90;
  //$datefind_s = "2019-02-";
  //$datefind_e = "";
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_rooms
                JOIN tbl_room_price on tbl_room_price.room_id = tbl_rooms.room_id 
         WHERE  (tbl_room_price.price_dt BETWEEN '$datefind_s' AND '$datefind_e')   And tbl_rooms.hotel_id=$hotel_id And tbl_room_price.crcy_code='THB'";
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
   WHERE tbl_field_values.fld_nm='$st_pr' AND tbl_field_values.fld_valu='THB'  ORDER BY tbl_field_values.fld_valu DESC";
  return $this->db->query($sql)->result();
}

function get_room_data($hotel_id=NULL,$room_id=NULL){
   header('Content-Type: application/json');
        $sql = "SELECT  * FROM  tbl_room_img WHERE room_id=$room_id";
        $query = $this->db->query($sql);
   echo json_encode($query->result());
}
 

  public function data_test(){
    
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