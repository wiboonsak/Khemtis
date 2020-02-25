<?php
class Book_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }

function update_book_hotel($sec_book_id,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address){

$sec_book_id = $this->get_gp_id($sec_book_id);
              $data = array(
             "cus_first_name" =>$cus_first_name,
             "cus_last_name" =>$cus_last_name,
             "cus_email" =>$cus_email,
             "cus_phone" =>$cus_number,
             "cus_addr" =>$cus_address,
              );
               $this->db->where('pre_booking_id',$sec_book_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}

function get_gp_id($sec_book_id){
$query = $this->db->query("SELECT tbl_pre_booking_room_detail.pre_booking_id   from tbl_gp_booking_detail
JOIN tbl_pre_booking_room_detail ON tbl_pre_booking_room_detail.id = tbl_gp_booking_detail.id_booking AND tbl_gp_booking_detail.book_type = 'HT'
WHERE tbl_gp_booking_detail.id_gp_booking = $sec_book_id
GROUP BY
tbl_pre_booking_room_detail.pre_booking_id");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $row->pre_booking_id;
     }else{return 0;}
  return 0;
}


function get_name_cus($pre_booking_id){
$query = $this->db->query("SELECT cus_first_name,cus_last_name FROM tbl_pre_booking WHERE pre_booking_id=$pre_booking_id");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $row->cus_first_name."  ".$row->cus_last_name;
     }else{return "";}
  return "";
}


function autoid_book(){
$query = $this->db->query("SELECT max(pre_booking_id) as max_id FROM tbl_pre_booking");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return ($row->max_id+1);
     }else{return 1;}
  return 1;
}

function autoid_book_package(){
$query = $this->db->query("SELECT max(pre_booking_id) as max_id FROM tbl_pre_package_booking");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return ($row->max_id+1);
     }else{return 1;}
  return 1;
}

function autoid_book_gp(){
$query = $this->db->query("SELECT max(id_run) as max_id FROM tbl_gp_booking");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return ($row->max_id+1);
     }else{return 1;}
  return 1;
}


function get_icon_lang($lg){
$sql = "SELECT * FROM `tbl_field_lang_values` 
JOIN tbl_field_added_values ON (tbl_field_added_values.fld_nm = tbl_field_lang_values.fld_nm AND tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu)
JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_added_values.fld_nm)
AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE  tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_values.fld_valu='$lg'";
      return $this->db->query($sql)->result();
}


function get_lang(){
$sql = "SELECT * FROM `tbl_field_lang_values` 
JOIN tbl_field_added_values ON (tbl_field_added_values.fld_nm = tbl_field_lang_values.fld_nm AND tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu)
JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_added_values.fld_nm)
AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE  tbl_field_lang_values.fld_nm ='LANG' ORDER BY tbl_field_values.fld_nm ASC";
      return $this->db->query($sql)->result();
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
// Add Function Bookin Zone

function up_pre_book($dataall,$pre_booking_id){
//$cus_id = $dataall["cus_id"];
  $cus_id = 0;
  $data = array(
             "cus_id" =>$cus_id,
             "cus_first_name" =>$dataall["cus_first_name"],
             "cus_last_name" =>$dataall["cus_last_name"],
             "cus_addr" =>$dataall["cus_addr"],
             "country_id" =>1,
             "cus_phone" =>$dataall["cus_phone"],
             "cus_email" =>$dataall["cus_email"],
             "Total_price" =>0,
             "dscnt_price" =>0,
             "tax" =>0,
             "fee" =>0,
             "payment_charge_fee" =>0,
             "net_price" =>0,
             "crcy_code" =>'THB',
             "booking_stat_cd" =>'I',
             "cus_note" =>$dataall["cus_note"],
             "ip_address" =>"99999999",
              );
               $this->db->where('pre_booking_id',$pre_booking_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}


function up_st($sec_book_id){
  $data = array(
             "booking_stat_cd" =>'P',
              );
               $this->db->where('pre_booking_id',$sec_book_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}


function add_pre_book_new($adults,$child,$date_in,$date_out){
 $utoid_book = $this->autoid_book();
 $y = date("Y");
 $m = date("m");
 $d = date("d");
 $id_rn = $y.$m.$d.$utoid_book;
 $data = array(
             "pre_booking_id" =>$utoid_book,
             "booking_number"=>$id_rn,
              );
                if($this->db->insert('tbl_pre_booking', $data)){ 
                 //return $utoid_book;
              $data1 = array(
             "booking_stat_cd" =>'I',
             "date_in" =>$date_in,
             "date_out" =>$date_out,
             "adults" =>$adults,
             "child" =>$child,
              );
                   $this->db->where("pre_booking_id",$utoid_book);
                if($this->db->update('tbl_pre_booking', $data1)){ 
                  return $utoid_book;
               }
                  return 0;
               }
                  return 0;
}


function add_pre_book_package_new($room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child + $Single);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr)+($Single*$sg_pr));
 $y = date("Y");
 $m = date("m");
 $d = date("d");
 $id_rn = $y.$m.$d;
 $date = date("Y-m-d");
 $data = array(
             "package_id" =>$package_id,
             "total_customer"=>$total_customer,
             "cf_status"=>0,
             "booking_status"=>4,
             "date_booking"=>$date,
             "date_depart"=>$date_depart,
             "customer_adult"=>$Adults,
             "customer_child"=>$Child,
             "customer_single"=>$Single,
             "adult_price"=>$ad_pr,
             "child_price"=>$ld_pr,
             "single_price"=>$sg_pr,
             "total_price"=>$total_price,
             "room_id"=>$room_id,
             "id_gp"=>$id_gp,
              );
                if($this->db->insert('tbl_package_pre_booking', $data)){ 
                   return $this->db->insert_id();
                }
                   return 0;
}
 
function up_pre_book_package_new($room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$utoid_book){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child + $Single);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr)+($Single*$sg_pr));
 $y = date("Y");
 $m = date("m");
 $d = date("d");
 $id_rn = $y.$m.$d;
 $date = date("Y-m-d");
 $data = array(
             "package_id" =>$package_id,
             "total_customer"=>$total_customer,
             "cf_status"=>0,
             "booking_status"=>4,
             "date_booking"=>$date,
             "date_depart"=>$date_depart,
             "customer_adult"=>$Adults,
             "customer_child"=>$Child,
             "customer_single"=>$Single,
             "adult_price"=>$ad_pr,
             "child_price"=>$ld_pr,
             "single_price"=>$sg_pr,
             "total_price"=>$total_price,
             "room_id"=>$room_id,
             "id_gp"=>$id_gp,
              );
             $this->db->where('id',$utoid_book);
             if($this->db->update('tbl_package_pre_booking', $data)){
                 return 1;
             }
                 return 0;
}
 

function add_pre_gp($id_member){
 $utoid_book = $this->autoid_book_gp();
 $date_add = date("Y-m-d");
 $data = array(
             "id_run" =>$utoid_book,
             "add_date"=>$date_add,
             "id_member"=>$id_member,
             "st_book"=>0,
              );
                if($this->db->insert('tbl_gp_booking', $data)){ 
                    return $utoid_book;
                }
                    return 0;
}


function ch_pre_book($pre_booking_id){
   $query = $this->db->query("SELECT count(pre_booking_id) as nmdata FROM tbl_pre_booking WHERE pre_booking_id=$pre_booking_id");
   $row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $query->row()->nmdata;
     }else{return 0;}
           return 0;
}


function add_gp_book_new(){
    $data = array(
               "pre_booking_id" =>$utoid_book,
               "stay_dt" =>$book_st,
               "room_id" =>$room_id,
               "room_seq" =>$j,
               "price" =>$price_room,
               "dscnt_price" =>$price_dis,
               "total_extra_bed" =>$room_extra_bed,
               "extra_bed_price" =>$room_extra_price,
               "total_price" =>($total_price),
              );
              if($this->db->insert('tbl_pre_booking_room_detail', $data)){ 
              }
}


function up_pre_book_package(){

  $cus_id = $dataall["cus_id"];
  $cus_id = 0;
  $data = array(
             "cus_id" =>$cus_id,
             "ip_address" =>"99999999",
              );
               $this->db->where('pre_booking_id',$pre_booking_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}


function add_pre_book_detail($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr,$numdate){
  $max_ex = $this->chk_room_id($utoid_book,$room_id);
  $room_detail = explode("=>",$room_detail);
  $book_st=$room_detail[0];
  $price_room=$room_detail[1];
  $price_dis=$room_detail[2];
  $room_extra_bed=$get_extra_room;
  $room_extra_price = $room_ex_pr;
  $sum_extra = ($room_extra_bed * $room_extra_price);
  $new_pr= 0;
  if($price_dis >0){$new_pr=$room_detail[2];}else{$new_pr=$room_detail[1];}
  $total_price = ($new_pr  + $sum_extra );
  for($j=1;$j<=$get_num_room;$j++){
  $id_run = 0;
  $data = array(
             "pre_booking_id" =>$utoid_book,
             "stay_dt" =>$book_st,
             "room_id" =>$room_id,
             "room_seq" =>$j,
             "price" =>$price_room,
             "dscnt_price" =>$price_dis,
             "total_extra_bed" =>$room_extra_bed,
             "extra_bed_price" =>$room_extra_price,
             "total_price" =>($total_price),
              );
              if($this->db->insert('tbl_pre_booking_room_detail', $data)){ 
                 $id_run = $this->max_id_run();      
                  //$this->add_pre_book_sum($dataall);
              }

  $sec_gp_book =$this->session->userdata('sec_gp_book');
  $data_gp = array(
                    "id_booking" =>$id_run,
                    "id_gp_booking" =>$sec_gp_book,
                    "book_type" =>'HT',
              );
              if($this->db->insert("tbl_gp_booking_detail",$data_gp)){
       }
    }

$this->up_num_day($utoid_book,$numdate);
if($max_ex>-1){
   $sql = "UPDATE tbl_pre_booking_room_detail SET total_extra_bed=($max_ex+$room_extra_bed)
   WHERE pre_booking_id = $utoid_book AND room_id = $room_id";
   $this->db->query($sql)->result();
}
   return 1;
}


function chk_room_id($utoid_book,$room_id){
   $query = $this->db->query("SELECT max(total_extra_bed) as nmdata FROM tbl_pre_booking_room_detail WHERE room_id=$room_id AND pre_booking_id=$utoid_book");
   $row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $query->row()->nmdata;
     }else{return -1;}
           return -1;
}


function max_id_run(){
$query = $this->db->query("SELECT max(id) as max_id FROM tbl_pre_booking_room_detail");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return ($row->max_id);
     }else{return 1;}
  return 1;
}


function up_num_day($pre_booking_id,$numdate){
  $data = array(
             "num_day" =>$numdate,
              );
               $this->db->where('pre_booking_id',$pre_booking_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}


function up_pay_book($pay_st,$sec_book_id){
$sec_book_id = $this->get_gp_id($sec_book_id);
    $data = array(
             "booking_stat_cd" =>'M',
              );
               $this->db->where('pre_booking_id',$sec_book_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}


function add_pre_book_sum($dataall){
 $data = array(
             "pre_booking_id" =>$dataall["pre_booking_id"],
             "checkin_dt" =>$dataall["checkin_dt"],
             "checkout_dt" =>$dataall["checkout_dt"],
             "room_id" =>$dataall["room_id"],
             "room_seq" =>$dataall["room_seq"],
             "avg_price" =>$dataall["avg_price"],
             "avg_dscnt_price" =>$dataall["avg_dscnt_price"],
             "total_extra_bed" =>$dataall["total_extra_bed"],
             "extra_bed_price" =>$dataall["extra_bed_price"],
             "total_price" =>$dataall["total_price"],
               );
              if($this->db->insert('tbl_pre_booking_sum_room', $data)){ 
          return 1;
               }
          return 0;
}


function del_list_booking($idrun,$room_id){
  $this->db->where("pre_booking_id",$idrun);
  $this->db->where("room_id",$room_id);
   if($this->db->delete("tbl_pre_booking_room_detail")){
       /*
       $this->db->where("pre_booking_id",$iddel);
        if($this->db->delete("tbl_pre_booking_sum_room")){
           return 1;
        }    
       */
      return 1;
   }
   return 0;
}


function package_hotel_room($room_id){
      $sql="SELECT * FROM tbl_hotels
         JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = 'en'
         JOIN tbl_rooms on tbl_rooms.hotel_id = tbl_hotels.hotel_id
         JOIN tbl_room_details on tbl_room_details.room_id  = tbl_rooms.room_id AND tbl_room_details.lang = 'en'
         WHERE tbl_rooms.room_id = $room_id
      ";
        return $this->db->query($sql)->result();
 }



function ses_book_ch($book_id){
$query = $this->db->query("SELECT DISTINCT tbl_rooms.hotel_id FROM tbl_pre_booking
JOIN tbl_pre_booking_room_detail ON tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_rooms ON tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
 WHERE tbl_pre_booking.pre_booking_id = $book_id");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return$query->row()->hotel_id;
     }else{return 0;}
  return 0;
}


function get_name_hotel($hotel_id){
$query = $this->db->query("SELECT tbl_hotel_details.hotel_nm FROM tbl_hotels
 JOIN tbl_hotel_details on  (tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang='en')
 WHERE tbl_hotels.hotel_id=$hotel_id
  ");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return$query->row()->hotel_nm;
     }else{return "None";}
  return "None";
}


function del_pre_book_detail_all($iddel){
   $this->db->where("pre_booking_id",$iddel);
   if($this->db->delete("tbl_pre_booking_room_detail")){
       /*
       $this->db->where("pre_booking_id",$iddel);
       if($this->db->delete("tbl_pre_booking_sum_room")){
           return 1;
        }    
       */
      return 1;
   }
   return 0;
}


function del_pre_booking_all($iddel,$sec_gp_book){
  $this->db->where("pre_booking_id",$iddel);
  if($this->db->delete("tbl_pre_booking")){

     $this->db->where("id_gp_booking",$sec_gp_book);
     $this->db->where("book_type",'HT');


     if($this->db->delete("tbl_gp_booking_detail")){

     return $this->del_pre_book_detail_all($iddel);
    }
  }
  return 0;
}


function get_pre_book_detail($pre_booking_id){
  $sql="SELECT * FROM tbl_pre_booking
        JOIN tbl_pre_booking_detail ON tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id";
        return $this->db->query($sql)->result();
}


// End Bookin Zone
function get_room_price_detail($hotel_id,$crcy_code,$dt_st,$dt_en,$txt_sql){

$show_all_price_room  =array();
$date1=date_create($dt_st);
$date2=date_create($dt_en);
$diff=date_diff($date1,$date2);
$numdate= $diff->format("%a ");

$ar_room_data_price=array();
$room_sql = "SELECT 
tbl_rooms.room_id,
tbl_rooms.hotel_id,
tbl_rooms.room_title,
tbl_rooms.default_quota,
tbl_rooms.max_extra_bed,
tbl_rooms.published_status,
tbl_rooms.booking_status,
tbl_room_default_price.crcy_code,
tbl_room_default_price.default_dscnt_price,
tbl_room_default_price.default_price,
tbl_room_default_price.extra_bed_price,
GROUP_CONCAT(distinct tbl_room_img.img_nm) as ar_img,
GROUP_CONCAT(distinct tbl_field_lang_values.fld_valu_desc) as ar_lang,
GROUP_CONCAT(distinct tbl_field_added_values.field1) as ar_added
FROM tbl_rooms
JOIN tbl_room_default_price on  tbl_room_default_price.room_id  = tbl_rooms.room_id
LEFT JOIN tbl_room_img on tbl_room_img.room_id = tbl_rooms.room_id  AND tbl_room_img.img_main=1 
LEFT JOIN tbl_room_features on tbl_room_features.room_id = tbl_rooms.room_id  AND tbl_room_features.room_feature_hilight = 'Y'
LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_room_features.room_feature AND tbl_field_lang_values.fld_nm='ROOM_FEATURE' AND tbl_field_lang_values.lang = 'en')
LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_room_features.room_feature AND tbl_field_added_values.fld_nm='ROOM_FEATURE'  AND tbl_field_added_values.lang='en')
WHERE  tbl_rooms.hotel_id = $hotel_id
AND tbl_room_default_price.crcy_code='$crcy_code'
$txt_sql
GROUP BY
tbl_rooms.room_id,
tbl_rooms.hotel_id,
tbl_rooms.room_title,
tbl_rooms.default_quota,
tbl_rooms.max_extra_bed,
tbl_rooms.published_status,
tbl_rooms.booking_status,
tbl_room_default_price.crcy_code,
tbl_room_default_price.default_dscnt_price,
tbl_room_default_price.default_price,
tbl_room_default_price.extra_bed_price";
$room_data = $this->db->query($room_sql)->result();
$ar_room_data=array();
 foreach($room_data as $value_room){
  $ar_re_room = array();
  $ar_room=array();
        array_push($ar_room,
             $value_room->room_id,
             $value_room->hotel_id,
             $value_room->room_title,
             $value_room->default_quota,
             $value_room->max_extra_bed,
             $value_room->published_status,
             $value_room->booking_status,
             $value_room->crcy_code,
             $value_room->default_dscnt_price,
             $value_room->default_price,
             $value_room->extra_bed_price,
             "-",
             $value_room->default_price,
             $value_room->ar_img,
             $value_room->ar_lang,
             $value_room->ar_added
        );
        array_push($ar_room_data,$ar_room);  
 }

$ar_iv_room = array();
foreach($ar_room_data as $value_room){
$final_add_rom_price =array();
$iv_dis = "";
$ext_price = 0;$sql_day="";
for($d=0;$d<$numdate;$d++){
    $get_date = date('Y-m-d', strtotime($dt_st .' +'.$d.'day'));

    $sql_day = $sql_day." OR ('".$get_date."' BETWEEN start_dt AND end_dt)";

    $room_id = $value_room[0];
    $def_price = $value_room[12];
    $hotel_id = $value_room[1];
    $room_title = $value_room[2];
    $max_extra_bed = $value_room[4];
    $published_status = $value_room[5];
    $booking_status = $value_room[6];
    $crcy_code = $value_room[7];
    $ar1 = $value_room[13];
    $ar2 = $value_room[14];
    $ar3 = $value_room[15];

       $default_dscnt_price = $value_room[8];
       $extra_bed_price = $value_room[10];
      // $roo_quota =  $this->get_room_quota($room_id,$get_date);


$sql_1 = "SELECT 
 tbl_room_price.room_id,
 tbl_room_price.crcy_code,
(tbl_room_price.price) as iv_price,
(tbl_room_price.dscnt_price) as iv_dsc,
(tbl_room_price.extra_bed_price) as iv_extra 
FROM tbl_room_price 
WHERE tbl_room_price.price_dt = '$get_date'
AND tbl_room_price.room_id = $room_id
AND tbl_room_price.crcy_code = '$crcy_code'
AND tbl_room_price.price >0
";
     $query = $this->db->query($sql_1);
     $row = $query->row();
     if($query->num_rows()>0 && (isset($row))){

$ivn_data = $this->db->query($sql_1)->result();
$ar_iv_room_data = array();
    foreach($ivn_data as $value_iv_room){
        $ar_iv_room = array();
        array_push($ar_iv_room,
            $value_iv_room->room_id,
            $value_iv_room->crcy_code,
            $value_iv_room->iv_price,
            $value_iv_room->iv_dsc,
            $value_iv_room->iv_extra
        );
        $iv_dis = $this->ch_dis_iv($get_date,$room_id,$hotel_id);
        $ar_iv =  array();
        array_push($ar_iv, 
            $room_id,
            $value_iv_room->iv_price,
            $hotel_id,
            $room_title,
            $max_extra_bed,
            $published_status,
            $booking_status,
            $crcy_code,
            0,
            $extra_bed_price,
            $get_date,
            $iv_dis

        );
        array_push($final_add_rom_price,$ar_iv);  
        $ar_re_room = $final_add_rom_price;
    }

}else{

 $year = DATE("Y");
 $date = DateTime::createFromFormat("Y-m-d", $get_date);
 $year = $year."-".$date->format("m-d");

$sql_2 = "SELECT 
tbl_room_season_price.crcy_code,tbl_room_season_price.price,
tbl_room_season_price.dscnt_price,tbl_room_season_price.extra_bed_price 
FROM `tbl_room_season_price` 
JOIN tbl_season_period on tbl_season_period.season_id = tbl_room_season_price.season_id
WHERE   tbl_room_season_price.crcy_code = '$crcy_code'   AND ( '$year' 
BETWEEN 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.start_month,'-',tbl_season_period.start_day)  
AND 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.end_month,'-',tbl_season_period.end_day))
AND tbl_room_season_price.price > 0
AND tbl_room_season_price.room_id = $room_id
";
$sea_data = $this->db->query($sql_2)->result();
     $query_sea = $this->db->query($sql_2);
     $row_sea = $query_sea->row();
     if($query_sea->num_rows()>0 && (isset($row_sea))){
foreach($sea_data as $value_sea_room){
 //echo $value_sea_room->price."<br>";
         $ar_sea =  array();
         array_push($ar_sea, 
            $room_id,
            $value_sea_room->price,
            $hotel_id,
            $room_title,
            $max_extra_bed,
            $published_status,
            $booking_status,
            $crcy_code,
            $value_sea_room->dscnt_price,
            $value_sea_room->extra_bed_price,
            $get_date,
            0
        );
         array_push($final_add_rom_price,$ar_sea);  
         $ar_re_room = $final_add_rom_price;
}
}else{
          $ar_def =  array();
           array_push($ar_def, 
            $room_id,
            $def_price,
            $hotel_id,
            $room_title,
            $max_extra_bed,
            $published_status,
            $booking_status,
            $crcy_code,
            $default_dscnt_price,
            $extra_bed_price,
            $get_date,
            0
        );
          array_push($final_add_rom_price,$ar_def);  
          $ar_re_room = $final_add_rom_price;
}
}}  
//echo "<br>-------------------------------------------------------------------------------------------------------------------<br>";
//echo $ar_re_room[0][0]."<br>";
if(!isset($room_id)){$room_id=0;}
  $roo_quota = $this->get_room_quato($room_id,$dt_st,$dt_en);
  $room_off = $this->get_off_room($room_id,substr($sql_day,3));
  if($room_off ==1){
        $new_all_ar = array();
        array_push($new_all_ar, 
            $room_id,
            $hotel_id,
            $room_title,
            $ar_re_room,
            $ar1,
            $ar2,
            $ar3,
            $crcy_code,
            $roo_quota,
            $max_extra_bed,
            $extra_bed_price
          );
        array_push($show_all_price_room,$new_all_ar);  
    }
}
/*
       foreach($show_all_price_room as $value_all_data){
        echo $value_all_data[0]."----".$value_all_data[1]."----".$value_all_data[2]."----<br>";
        foreach ($value_all_data[3] as  $valuedef) {
         echo  $valuedef[1]."<br>";
        }
    }
*/

return $show_all_price_room;
 }

function get_room_quato($get_room,$run_date1,$run_date2){
$prev_date = date('Y-m-d', strtotime($run_date2 .' -1 day'));
$query1 = $this->db->query("SELECT MIN(remain_room) AS minroom FROM tbl_room_quota
 WHERE room_id=$get_room
 AND quota_dt BETWEEN '$run_date1' AND '$prev_date'");
     $row1 = $query1->row();
     if($row1->minroom>0 && (isset($row1))){
           return $row1->minroom;
     }else{
            $query2 = $this->db->query("SELECT default_quota FROM tbl_rooms WHERE room_id=$get_room");
            $row2 = $query2->row();
             if($row2){
             if($row2->default_quota>0 && (isset($row2))){
                return $row2->default_quota;
              }else{
                 return 0;
             }}else{return 0;}
     }
  return 0;
}

function get_off_room($room_id,$sql_day){

     $query = $this->db->query("SELECT count(room_id) as cn FROM tbl_room_time_off 
     WHERE room_id=$room_id
     AND ($sql_day) 
 ");


            $row = $query->row();
             if($row->cn==0 && (isset($row))){
                 return 1;
              }else{
                 return 0;
            }
}


function ch_dis_iv($date_run,$room_id,$hotel_id){

$room_sql = "SELECT 
tbl_rooms.room_id,
tbl_rooms.hotel_id,
tbl_room_default_price.crcy_code,
tbl_room_default_price.default_dscnt_price,
tbl_room_default_price.default_price
FROM tbl_rooms
JOIN tbl_room_default_price on tbl_room_default_price.room_id = tbl_rooms.room_id
WHERE  tbl_rooms.hotel_id = $hotel_id AND tbl_rooms.room_id=$room_id
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


foreach($ar_room_data as $value_room){

$nor_price = 0;
$get_date = $date_run;
    $room_id = $value_room[0];
    $def_price = $value_room[4];
    $hotel_id = $value_room[1];
    $crcy_code = $value_room[2];
    $default_dscnt_price = $value_room[3];


 $year = DATE("Y");
 $date = DateTime::createFromFormat("Y-m-d", $get_date);
 $year = $year."-".$date->format("m-d");

$sql_2 = "SELECT 
tbl_room_season_price.crcy_code,tbl_room_season_price.price,
tbl_room_season_price.dscnt_price,tbl_room_season_price.extra_bed_price 
FROM `tbl_room_season_price` 
JOIN tbl_season_period on tbl_season_period.season_id = tbl_room_season_price.season_id
WHERE   tbl_room_season_price.crcy_code = 'THB'   AND ( '$year' 
BETWEEN 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.start_month,'-',tbl_season_period.start_day)  
AND 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.end_month,'-',tbl_season_period.end_day))
AND tbl_room_season_price.price > 0
AND tbl_room_season_price.room_id = $room_id";

$sea_data = $this->db->query($sql_2)->result();
     $query_sea = $this->db->query($sql_2);
     $row_sea = $query_sea->row();
     if($query_sea->num_rows()>0 && (isset($row_sea))){
foreach($sea_data as $value_sea_room){
 $def_price_sea =  $value_sea_room->price;
 if($value_sea_room->dscnt_price > 0 &&  $value_sea_room->dscnt_price !=""){
    $n_pr_sea=$value_sea_room->dscnt_price;}
 else{$n_pr_sea=$value_sea_room->price;}
 /*
            $ar_sea =  array();
            array_push($ar_sea, 
            $n_pr_sea,
            $get_date
        );
         array_push($final_add_rom_price,$ar_sea);  
*/
         $nor_price = $n_pr_sea;
}}else{
  $def_price =  $def_price;
  if($default_dscnt_price > 0 && $default_dscnt_price !=""){
     $n_pr_def=$default_dscnt_price;}
  else{$n_pr_def=$def_price;}
   /*
            $ar_def =  array();
            array_push($ar_def, 
            $def_price,
            $n_pr_def,
            $get_date
        );
         array_push($final_add_rom_price,$ar_def);  
   */
          $nor_price = $n_pr_def;
}}
return $nor_price;

}


/*
function get_room_extra_bed($get_room,$run_date){
  $query1 = $this->db->query("SELECT limit_room FROM tbl_room_season_price WHERE room_id=$get_room AND quota_dt='$run_date'");
  $row1 = $query1->row();
     if($query1->num_rows()==1 && (isset($row1))){
           return $row1->limit_room;
     }else{
      
            $query2 = $this->db->query("SELECT extra_bed_price FROM tbl_room_default_price WHERE room_id=$get_room AND crcy_code='THB'");
            $row2 = $query2->row();
             if($query2->num_rows()==1 && (isset($row2))){
                return $row2->default_quota;
              }else{
                 return 0;
            }
         return 0;
     }
  return 0;

}  
*/



function get_room_quota($get_room,$run_date){
  $query1 = $this->db->query("SELECT limit_room FROM tbl_room_quota WHERE room_id=$get_room AND quota_dt='$run_date'");
  $row1 = $query1->row();
     if($query1->num_rows()==1 && (isset($row1))){
           return $row1->limit_room;
     }else{
      
            $query2 = $this->db->query("SELECT default_quota FROM tbl_rooms WHERE room_id=$get_room");
            $row2 = $query2->row();
             if($query2->num_rows()==1 && (isset($row2))){
                return $row2->default_quota;
              }else{
                 return 0;
            }
         return 0;
     }
  return 0;

}  






}
?>