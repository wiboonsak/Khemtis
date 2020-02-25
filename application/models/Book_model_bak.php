<?php
class Book_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }


function autoid_book(){
$query = $this->db->query("SELECT max(pre_booking_id) as max_id FROM tbl_pre_booking");
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
 $data = array(
             "booking_number" =>$dataall["booking_number"],
             "cus_id" =>$dataall["cus_id"],
             "cus_first_name" =>$dataall["cus_first_name"],
             "cus_last_name" =>$dataall["cus_last_name"],
             "cus_addr" =>$dataall["cus_addr"],
             "country_id" =>$dataall["country_id"],
             "cus_phone" =>$dataall["cus_phone"],
             "cus_email" =>$dataall["cus_email"],
             "Total_price" =>$dataall["Total_price"],
             "dscnt_price" =>$dataall["dscnt_price"],
             "tax" =>$dataall["tax"],
             "fee" =>$dataall["fee"],
             "payment_charge_fee" =>$dataall["payment_charge_fee"],
             "net_price" =>$dataall["net_price"],
             "crcy_code" =>$dataall["crcy_code"],
             "booking_stat_cd" =>$dataall["booking_stat_cd"],
             "cus_note" =>$dataall["cus_note"],
             "ip_address" =>$dataall["ip_address"],
               );
               $this->db->where('pre_booking_id',$pre_booking_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}

function add_pre_book_new(){
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
              );
                   $this->db->where("pre_booking_id",$utoid_book);
                if($this->db->update('tbl_pre_booking', $data1)){ 
                  return $utoid_book;
               }
                  return 0;
               }
               //return 0;
}



function add_pre_book_detail($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr){
  $room_detail = explode(",",$room_detail);
  $book_st=$room_detail[0];
  $price_room=$room_detail[1];
  $price_dis=$room_detail[2];
  $room_extra_bed=$get_extra_room;
  $room_extra_price = $room_ex_pr;
  $sum_extra = ($room_extra_bed * $room_extra_price);
  $total_price = (($price_room -$price_dis)) + $sum_extra;

  for($j=1;$j<=$get_num_room;$j++){
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
                 	 //$this->add_pre_book_sum($dataall);
              }
    }

              return 1;
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

function del_pre_booking_all($iddel){
  $this->db->where("pre_booking_id",$iddel);
  if($this->db->delete("tbl_pre_booking")){
     return $this->del_pre_book_detail_all($iddel);
  }
  return 0;
}

function get_pre_book_detail($pre_booking_id){
  $sql="SELECT * FROM tbl_pre_booking
        JOIN tbl_pre_booking_detail ON tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id";
        return $this->db->query($sql)->result();
}

// End Bookin Zone
function get_room_price_detail($hotel_id,$crcy_code){

$date1=date_create("2018-12-06");
$date2=date_create("2018-12-09");
$diff=date_diff($date1,$date2);
$numdate= $diff->format("%a ");



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
tbl_room_default_price.extra_bed_price
FROM tbl_rooms
JOIN tbl_room_default_price on  tbl_room_default_price.room_id  = tbl_rooms.room_id
WHERE  tbl_rooms.hotel_id = $hotel_id
AND tbl_room_default_price.crcy_code='$crcy_code'";
$room_data = $this->db->query($room_sql)->result();
$ar_room_data=array();
 foreach($room_data as $value_room){
     
    $val_all_def=""; 
    for($d=0;$d<=$numdate;$d++){
      $get_date = date('Y-m-d', strtotime('2018-12-06' .' +'.$d.'day'));
      $val_all_def = $val_all_def.",".$get_date."<=>". $value_room->default_price; 
    }

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
             $val_all_def,
             $value_room->default_price
        );
        array_push($ar_room_data,$ar_room);  
 }

$ar_iv_room = array();
foreach($ar_room_data as $value_room){
   $room_id = $value_room[0];
   $sql_1 = "SELECT 
tbl_room_price.room_id,
tbl_room_price.crcy_code,

sum(tbl_room_price.price) as sum_price,
sum(tbl_room_price.dscnt_price) as sum_dsc,
sum(tbl_room_price.extra_bed_price) as sum_extra,
GROUP_CONCAT(CONCAT(tbl_room_price.price_dt,'<=>',tbl_room_price.price)) as show_gp_price

FROM tbl_room_price 
WHERE tbl_room_price.price_dt BETWEEN  '2018-12-06' AND '2018-12-09'
AND tbl_room_price.room_id = $room_id
AND tbl_room_price.crcy_code = '$crcy_code'
AND tbl_room_price.price >0
  GROUP BY
tbl_room_price.room_id,
tbl_room_price.crcy_code
ORDER BY tbl_room_price.price_dt ASC
";
$ivn_data = $this->db->query($sql_1)->result();
$ar_iv_room_data = array();
    foreach($ivn_data as $value_iv_room){
        $ar_iv_room = array();
        array_push($ar_iv_room,
            $value_iv_room->room_id,
            $value_iv_room->crcy_code,
            $value_iv_room->sum_price,
            $value_iv_room->sum_dsc,
            $value_iv_room->sum_extra,
            $value_iv_room->show_gp_price
        );
        array_push($ar_iv_room_data,$ar_iv_room);  
    }
     
     foreach($ar_iv_room_data as $value_iv_data){
        $nnext=0;
        $count_room = count($ar_room_data);
        for($ci=0;$ci<$count_room;$ci++){
        if($ar_room_data[$ci][0]==$value_iv_data[0]){
            $ar_room_data[$ci][11] = $value_iv_data[5];
            $ar_room_data[$ci][9] = $value_iv_data[2];
        }}
    }
}


$nnext =0;
    foreach ($ar_room_data as $val_final_data) {$nnext++;
    	$def_price =  $val_final_data[13];
    for($d=0;$d<=$numdate;$d++){
      $get_date = date('Y-m-d', strtotime('2018-12-06' .' +'.$d.'day'));
      $ar_room_data[$nnext][13]=$get_date."<=>".$def_price;
      
$cut1  = $val_final_data[11];
$dis_cut1 = explode(",", $cut1);
if(isset($dis_cut1[$d])){$tx_cut1=$dis_cut1[$d];}else{$tx_cut1="xxxx";}
//echo "<br>".$tx_cut1."<br>";
$pos = strpos($get_date, $tx_cut1);
if($pos===false){
   echo "<br>".$get_date;
}



/*
if(isset($dis_cut1[$d])){
$cut2 = $dis_cut1[$d];
$dis_cut2 = explode("<=>", $cut2);
    echo "<br>".$dis_cut2[0];
}else{

    
}


/*

if(isset($dis_cut1[$d]) && $dis_cut2[0]==$numdate){

   //   echo "<br>[ ".$dis_cut2[0]."=".$dis_cut2[1]."]<br>";
}else{

    //  echo "<br>[ ".$get_date."=".$val_final_data[13]."]<br>";
}

*/









     //  if($get_date==$val_final_data[13]){}else{$val_final_data[9]=10;}
    }

       $val_txt_def =  substr($val_final_data[12],1);
       echo "<br>".$val_final_data[0]." : ".$val_final_data[9]." : ".$val_final_data[2]." <br>  ".$val_final_data[11]." <br>  ".$val_txt_def;
       $txt_iv = explode(",",$val_txt_def);
       echo "<br><br>".$txt_iv[0]."<br>";
    }




/*
   $sql_2 = "SELECT 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.start_month,'-',tbl_season_period.start_day) as str_date,
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.end_month,'-',tbl_season_period.end_day) as end_date,
tbl_room_season_price.crcy_code,tbl_room_season_price.price,
tbl_room_season_price.dscnt_price,tbl_room_season_price.extra_bed_price 
FROM `tbl_room_season_price` 
JOIN tbl_season_period on tbl_season_period.season_id = tbl_room_season_price.season_id
WHERE   tbl_room_season_price.crcy_code = '$crcy_code'   AND ( '2019-11-28' 
BETWEEN 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.start_month,'-',tbl_season_period.start_day)  
AND 
CONCAT(YEAR(CURDATE()),'-',tbl_season_period.end_month,'-',tbl_season_period.end_day))";
$sea_data $this->db->query($sql_2)->result();


   $sql_3="SELECT 
tbl_room_default_price.crcy_code,
tbl_room_default_price.default_dscnt_price,
tbl_room_default_price.default_price,
tbl_room_default_price.extra_bed_price
FROM `tbl_room_default_price`
WHERE 
tbl_room_default_price.room_id = 81
AND tbl_room_default_price.crcy_code = '$crcy_code'
";
$def_data $this->db->query($sql_3)->result();
*/
}



function get_room_iv_dis(){

  return  0;
}  






}
?>