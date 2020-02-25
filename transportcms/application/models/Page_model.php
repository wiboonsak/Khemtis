<?php

class Page_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }

function confBook(){


}


function  get_incom_price($service,$id_ci,$ds,$dm,$dy,$new_day){
 //echo $new_day."<br>" ;
 //echo $id_ci;
if($id_ci==0){
$ciq_h = "";
$ciq_p = "";
$ciq_t = "";
$ciq_r = "";
}else{
$ciq_h = "
JOIN tbl_rooms on tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
JOIN tbl_hotels on tbl_hotels.hotel_id =  tbl_rooms.hotel_id AND tbl_hotels.client_id=$id_ci";

$ciq_p = "JOIN tbl_packages on tbl_packages.package_id = tbl_package_pre_booking.package_id AND tbl_packages.client_id=$id_ci
 JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_package_pre_booking.id_gp";

$ciq_t = "JOIN tbl_transport_route_data on tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id AND tbl_transport_route_data.client_id=$id_ci";

$ciq_r = "JOIN tbl_resturant_detail on tbl_resturant_detail.res_id = tbl_res_pre_booking.res_id AND tbl_resturant_detail.lang = 'en' AND tbl_resturant_detail.client_id = $id_ci 
  JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_res_pre_booking.id_gp";
}

$hotel_q = "(SELECT sum(DISTINCT tbl_pre_booking.net_price)  FROM  tbl_pre_booking_room_detail 
JOIN tbl_pre_booking on tbl_pre_booking.pre_booking_id = tbl_pre_booking_room_detail.pre_booking_id
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
$ciq_h
WHERE  tbl_pre_booking.str_st = 1 AND tbl_gp_booking.add_date='$new_day'
) as n_h";

$tran_q = "(
SELECT  sum(tbl_pre_transport_booking_detail.total_price) FROM tbl_pre_transport_booking_detail 
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     Join tbl_pre_transport_booking_title on tbl_pre_transport_booking_title.id = tbl_pre_transport_booking_detail.booking_id
     $ciq_t
   WHERE  tbl_pre_transport_booking_title.booking_status = 'P' AND tbl_gp_booking.add_date='$new_day'
) n_t";

$pack_q = "(SELECT  sum(total_price) FROM  tbl_package_pre_booking $ciq_p  WHERE  tbl_package_pre_booking.booking_status='P' AND tbl_gp_booking.add_date='$new_day' ) as n_p";

$res_q = "(SELECT sum(tbl_res_pre_booking.total_price) FROM tbl_res_pre_booking  $ciq_r WHERE tbl_res_pre_booking.booking_status='P' AND tbl_gp_booking.add_date='$new_day' ) as n_r";

if($service=="Hotel"){
$pack_q  = "(0) as n_p";
$tran_q = "(0) as n_t";
$res_q = "(0) as n_r";
}elseif ($service=="Package") {
$hotel_q = "(0) as n_h";
$tran_q = "(0) as n_t";
$res_q = "(0) as n_r";
}elseif ($service=="Transport") {
$hotel_q = "(0) as n_h";
$pack_q = "(0) as n_p";
$res_q = "(0) as n_r";
}elseif ($service=="Restaurant") {
$hotel_q  = "(0) as n_h";
$pack_q  = "(0) as n_p";
$tran_q = "(0) as n_t";
}

$sql = "SELECT tbl_clients.client_id,
$hotel_q,
$pack_q,
$tran_q,
$res_q
from tbl_clients WHERE tbl_clients.client_id=$id_ci";
$query = $this->db->query($sql);
return $row = $query->row_array();
}







function  get_all_price($id_gp_run,$service,$id_ci,$ds,$dm,$dy){
if($id_ci==0){
$ciq_h = "";
$ciq_p = "";
$ciq_t = "";
$ciq_r = "";
}else{
$ciq_h = "
JOIN tbl_rooms on tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
JOIN tbl_hotels on tbl_hotels.hotel_id =  tbl_rooms.hotel_id AND tbl_hotels.client_id=$id_ci
";
$ciq_p = "JOIN tbl_packages on tbl_packages.package_id = tbl_package_pre_booking.package_id AND tbl_packages.client_id=$id_ci";

$ciq_t = "JOIN tbl_transport_route_data on tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id AND tbl_transport_route_data.client_id=$id_ci";

$ciq_r = "JOIN tbl_resturant_detail on tbl_resturant_detail.res_id = tbl_res_pre_booking.res_id AND tbl_resturant_detail.lang = 'en' AND tbl_resturant_detail.client_id = $id_ci";
}

 $hotel_q = "(
SELECT  sum((tbl_pre_booking_room_detail.total_extra_bed * tbl_pre_booking_room_detail.extra_bed_price)+tbl_pre_booking_room_detail.total_price)  FROM  tbl_pre_booking_room_detail 
JOIN tbl_pre_booking on tbl_pre_booking.pre_booking_id = tbl_pre_booking_room_detail.pre_booking_id
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
$ciq_h
WHERE tbl_gp_booking.id_run = $id_gp_run AND tbl_pre_booking.str_st = 1
) as n_h";

$tran_q = "(
SELECT  sum(tbl_pre_transport_booking_detail.total_price) FROM tbl_pre_transport_booking_detail 
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     Join tbl_pre_transport_booking_title on tbl_pre_transport_booking_title.id = tbl_pre_transport_booking_detail.booking_id
     $ciq_t
   WHERE tbl_gp_booking.id_run =$id_gp_run AND tbl_pre_transport_booking_title.booking_status = 'P'
) n_t";
$pack_q = "(SELECT  total_price FROM  tbl_package_pre_booking $ciq_p  WHERE  id_gp =  $id_gp_run AND tbl_package_pre_booking.booking_status='P') as n_p";
$res_q = "(SELECT tbl_res_pre_booking.total_price FROM tbl_res_pre_booking  $ciq_r WHERE tbl_res_pre_booking.id_gp = $id_gp_run AND tbl_res_pre_booking.booking_status='P') as n_r";

if($service=="Hotel"){
$pack_q  = "(0) as n_p";
$tran_q = "(0) as n_t";
$res_q = "(0) as n_r";
}elseif ($service=="Package") {
$hotel_q = "(0) as n_h";
$tran_q = "(0) as n_t";
$res_q = "(0) as n_r";
}elseif ($service=="Transport") {
$hotel_q = "(0) as n_h";
$pack_q = "(0) as n_p";
$res_q = "(0) as n_r";
}elseif ($service=="Restaurant") {
$hotel_q  = "(0) as n_h";
$pack_q  = "(0) as n_p";
$tran_q = "(0) as n_t";
}

$sql = "SELECT tbl_gp_booking.id_run,
$hotel_q,
$pack_q,
$tran_q,
$res_q
from tbl_gp_booking WHERE tbl_gp_booking.id_run=$id_gp_run";
$query = $this->db->query($sql);
return $row = $query->row_array();
}


function get_book_transport_detail($sec_gp_book,$ty){
$sql = "SELECT *,
  (SELECT tbl_place_details.place_title FROM tbl_place_details WHERE id=tbl_transport_route_data.begin_place_id) as from_data,
  (SELECT tbl_place_details.place_title FROM tbl_place_details WHERE id=tbl_transport_route_data.destination_place_id) as to_data 
  FROM `tbl_pre_transport_booking_detail`
     JOIN tbl_transport_route_timeTable ON tbl_transport_route_timeTable.id = tbl_pre_transport_booking_detail.time_id
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     JOIN tbl_transport_route_data ON  tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id
     LEFT JOIN tbl_transport_profile ON tbl_transport_profile.client_id = tbl_transport_route_data.client_id AND tbl_transport_profile.lang = 'en'
   WHERE tbl_gp_booking.id_run = $sec_gp_book";
   return $this->db->query($sql)->result();
}

function get_book_package_detail($utoid_book){
$sql = "SELECT *,tbl_package_pre_booking.id as del_pack FROM  tbl_package_pre_booking
JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_pre_booking.room_id
JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id AND tbl_room_details.lang = 'en'
JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_rooms.hotel_id AND tbl_hotel_details.lang = 'en'
JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_package_pre_booking.package_id AND tbl_package_detail.lang = 'en'
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_package_pre_booking.id_gp
WHERE tbl_package_pre_booking.id_gp = $utoid_book";
  return $this->db->query($sql)->result();
}

function get_data_Package($txtfild){
   $sql_find = "";
   $date_cur = date("Y-m-d");
   if($txtfild!='none' && trim($txtfild)!=""){
    $sql_find = " AND (tbl_package_detail.package_title like '%$txtfild%' OR tbl_package_detail.package_desc like '%$txtfild%')";
   }
 $sql = "SELECT  *
    FROM  tbl_packages 
    LEFT JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_packages.package_id
    LEFT JOIN tbl_package_img on tbl_package_img.package_id = tbl_packages.package_id AND tbl_package_img.img_main = 1
    WHERE  tbl_package_detail.lang ='en' AND ('$date_cur' BETWEEN tbl_packages.str_date AND tbl_packages.end_date  OR ( tbl_packages.str_date = '0000-00-00' AND tbl_packages.end_date= '0000-00-00')) $sql_find
    ORDER BY tbl_packages.package_id ASC";
    return $this->db->query($sql)->result();
}

function get_price_pack($package_id){
  $sql = "SELECT * FROM tbl_package_season_price WHERE package_id = $package_id";  
  return $this->db->query($sql)->result();
}

function get_price_s($package_id){
  $sql="SELECT 
IF(dscnt_price_adult >0,dscnt_price_adult,price_adult) AS pr_ad,
IF(dscnt_price_child >0,dscnt_price_child,price_child) AS pr_ac,
price_adult,
dscnt_price_adult
FROM tbl_package_season_price WHERE package_id = $package_id
AND (CURDATE() BETWEEN  CONCAT(YEAR(CURDATE()),'-',period_start) AND  CONCAT(YEAR(CURDATE()),'-',period_end))
AND IF(dscnt_price_adult >0,dscnt_price_adult,price_adult) <> 0 
ORDER BY IF(dscnt_price_adult >0,dscnt_price_adult,price_adult)  DESC
";
  return $this->db->query($sql)->result();
}

function get_price_def($package_id){
  $sql="SELECT 
IF(dscnt_price_adult >0,dscnt_price_adult,price_adult) AS pr_ad,
IF(dscnt_price_child >0,dscnt_price_child,price_child) AS pr_ac,
price_adult,
dscnt_price_adult
  FROM tbl_package_default_price WHERE package_id = $package_id
  AND IF(dscnt_price_adult >0,dscnt_price_adult,price_adult) <> 0 
ORDER BY IF(dscnt_price_adult >0,dscnt_price_adult,price_adult)  DESC
  ";
  return $this->db->query($sql)->result();
}

function  get_detail_package($package_id){
  $sql="SELECT * FROM tbl_packages 
  JOIN tbl_package_detail on tbl_package_detail.package_id   = tbl_packages.package_id  AND tbl_package_detail.lang  = 'en'
  JOIN tbl_package_img on tbl_package_img.package_id = tbl_packages.package_id  AND tbl_package_img.img_main=1
  WHERE tbl_packages.package_id  =$package_id 
  ";
  return $this->db->query($sql)->result();
}

function get_hotel_name($idroom){
  $sql ="SELECT hotel_nm,txt_policy FROM tbl_hotel_details 
  JOIN tbl_rooms ON tbl_rooms.hotel_id = tbl_hotel_details.hotel_id AND tbl_hotel_details.lang = 'en'
  WHERE tbl_rooms.room_id = $idroom
  ";
  return $this->db->query($sql)->result();
}


function get_customer_hotel($id_bookin){
  $query = $this->db->query("SELECT * FROM tbl_pre_booking
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
WHERE tbl_gp_booking_detail.id_gp_booking = $id_bookin");
  $row = $query->row();
  return $row;
}


function get_book_res_detail($utoid_book){
$sql = "SELECT *,tbl_res_pre_booking.id as del_pack FROM  tbl_res_pre_booking
JOIN tbl_resturant_detail on tbl_resturant_detail.res_id = tbl_res_pre_booking.res_id AND tbl_resturant_detail.lang = 'en'
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_res_pre_booking.id_gp
WHERE tbl_res_pre_booking.id_gp = $utoid_book";
  return $this->db->query($sql)->result();
}





function get_customer_transport($sec_gp_book,$ty){
    $sql="SELECT 
tbl_pre_transport_booking_title.cust_name,
tbl_pre_transport_booking_title.cust_lastname,
tbl_pre_transport_booking_title.cust_telephone_num,
tbl_pre_transport_booking_title.cust_email,
tbl_pre_transport_booking_title.cust_line as cus_addr,
tbl_pre_transport_booking_detail.date_depart,
tbl_pre_transport_booking_detail.date_return,
tbl_pre_transport_booking_title.checkin_data_dep,
tbl_pre_transport_booking_title.checkin_data_ret
FROM `tbl_pre_transport_booking_detail`
     JOIN tbl_transport_route_timeTable ON tbl_transport_route_timeTable.id = tbl_pre_transport_booking_detail.time_id
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     JOIN tbl_transport_route_data ON  tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id
     JOIN tbl_pre_transport_booking_title ON tbl_pre_transport_booking_title.id = tbl_pre_transport_booking_detail.booking_id
   WHERE tbl_gp_booking.id_run = $sec_gp_book
   GROUP BY
   tbl_pre_transport_booking_title.cust_name,
tbl_pre_transport_booking_title.cust_lastname,
tbl_pre_transport_booking_title.cust_telephone_num,
tbl_pre_transport_booking_title.cust_email,
tbl_pre_transport_booking_title.cust_line,
tbl_pre_transport_booking_detail.date_depart,
tbl_pre_transport_booking_detail.date_return,
tbl_pre_transport_booking_title.checkin_data_dep,
tbl_pre_transport_booking_title.checkin_data_ret";

  $query = $this->db->query($sql);
  $row = $query->row();
  return $row;


}



function get_book_hotel_detail($utoid_book,$ty){
  $sql = "SELECT 
  (tbl_gp_booking.add_date) as book_id_hotel,
  tbl_pre_booking.date_in,
  tbl_pre_booking.date_out,
  tbl_pre_booking.adults,
  tbl_pre_booking.child,
  tbl_pre_booking_room_detail.pre_booking_id,
  tbl_pre_booking_room_detail.room_id,
  tbl_rooms.room_title,
  tbl_pre_booking.num_day,
  tbl_pre_booking.date_in,
  tbl_pre_booking.date_out,
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
    JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id AND tbl_gp_booking_detail.book_type='HT')
    JOIN tbl_pre_booking ON (tbl_pre_booking.pre_booking_id = tbl_pre_booking_room_detail.pre_booking_id)
    JOIN tbl_gp_booking ON (tbl_gp_booking.id_run =tbl_gp_booking_detail.id_gp_booking )
   WHERE tbl_gp_booking_detail.id_gp_booking=$utoid_book
   GROUP BY
   tbl_gp_booking.add_date,
  tbl_pre_booking.date_in,
  tbl_pre_booking.date_out,
  tbl_pre_booking.adults,
  tbl_pre_booking.child,
  tbl_pre_booking_room_detail.pre_booking_id,
  tbl_pre_booking_room_detail.room_id,
  tbl_rooms.room_title,
  tbl_pre_booking.num_day,
  tbl_pre_booking.date_in,
  tbl_pre_booking.date_out
  ";

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



function getRoomQuota($room_id,$date_quota){
  $sql = "SELECT  getRoomQuota($room_id,'$date_quota') as numQuota  FROM `tbl_rooms` WHERE room_id = $room_id";
  $row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $row->numQuota;
     }else{return 0;}
     return 0;
  }

function find_hotel_min_price(){
  $sql="select * from data hotal_data";
}


function data_find_hotel($txt_find,$lang,$star,$fac_txt,$minprice,$maxprice){
$sql = "SELECT 
(tbl_hotels.hotel_id) as hotel_idrun,
tbl_rooms.room_id,
  ('1000') as Price,
  ('1000') as DscntPrice,
  ('1000') as roomQuota,
tbl_hotels.client_id,
tbl_hotels.hotel_phone,
tbl_hotels.booking_email,
tbl_hotels.hotel_map_url,
tbl_hotels.province_id,
tbl_hotels.country_id,
tbl_hotels.key_words,
tbl_hotels.hotel_grade,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_details.lang,
tbl_hotel_details.hotel_nm,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_img.img_name ,
      GROUP_CONCAT(DISTINCT tbl_field_added_values.field1) as tbl_all_sevice1,
      GROUP_CONCAT(DISTINCT tbl_field_lang_values.fld_valu_desc) as tbl_all_sevice2 
FROM  tbl_hotels
  JOIN tbl_rooms on tbl_rooms.hotel_id = tbl_hotels.hotel_id 
  JOIN tbl_room_default_price on tbl_room_default_price.room_id = tbl_rooms.room_id AND tbl_room_default_price.crcy_code = 'USD'
  JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
  JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
 LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang'
 LEFT JOIN tbl_hotel_img on (tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1)
  JOIN tbl_hotel_features on tbl_hotel_features.hotel_id = tbl_hotels.hotel_id  AND tbl_hotel_features.hotel_feature_hilight = 'Y'
  JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_hotel_features.hotel_feature AND tbl_field_lang_values.fld_nm='HOTEL_FEATURE' AND tbl_field_lang_values.lang = '$lang')
  JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu AND tbl_field_added_values.fld_nm='HOTEL_FEATURE'  AND tbl_field_added_values.lang='$lang')
WHERE tbl_hotel_details.lang ='$lang' AND (tbl_hotels.key_words LIKE '%$txt_find%' OR tbl_hotel_details.hotel_nm LIKE '%$txt_find%' OR tbl_hotel_details.long_desc LIKE '%$txt_find%')  
  
GROUP BY
tbl_hotels.client_id,
tbl_hotels.hotel_phone,
tbl_hotels.booking_email,
tbl_hotels.hotel_map_url,
tbl_hotels.province_id,
tbl_hotels.country_id,
tbl_hotels.key_words,
tbl_hotels.hotel_grade,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_details.lang,
tbl_hotel_details.hotel_nm,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_img.img_name 
";

//  AND $fac_txt
return $this->db->query($sql)->result();

}



function data_find_hotel_id($txt_id,$lang){
  $sql = "SELECT  *,
(tbl_hotels.hotel_id) as hotel_idrun 
FROM  tbl_hotels
 LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
 LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
 LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id 
 LEFT JOIN tbl_hotel_img on (tbl_hotel_img.hotel_id = tbl_hotels.hotel_id)
WHERE tbl_hotel_details.lang ='$lang' And  tbl_hotels.hotel_id = $txt_id ORDER BY img_main Desc" ;
  return $this->db->query($sql)->result();
}


function get_icon_lang($lg){
$sql = "SELECT * FROM `tbl_field_lang_values` 
JOIN tbl_field_added_values ON (tbl_field_added_values.fld_nm = tbl_field_lang_values.fld_nm AND tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu)
JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_added_values.fld_nm)
AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE  tbl_field_lang_values.fld_nm ='LANG' AND tbl_field_values.fld_valu='$lg'";
      return $this->db->query($sql)->result();
}

function show_qta_room(){

}

function get_room_data($hotel_id,$lang){
  $sql_detail = "SELECT
  (0) as Price,
  (0) as DscntPrice,
  (0) as roomQuota,
  tbl_rooms.published_status,
  tbl_rooms.booking_status,
  tbl_room_img.img_nm,
  tbl_rooms.room_title,
  tbl_room_details.lang,
  tbl_room_default_price.default_price,
  tbl_room_default_price.default_dscnt_price,
  tbl_room_details.room_fld_nm,
  tbl_room_details.room_fld_desc,
  tbl_rooms.default_quota,
  tbl_rooms.max_extra_bed,
  tbl_room_default_price.extra_bed_price,
  IF(tbl_rooms.published_status='Y', 'Yes', 'No') AS v_published_status,
  IF(tbl_rooms.booking_status='Y', 'Yes', 'No') AS v_booking_status,
  (tbl_rooms.hotel_id) as hotel_idrun ,
  (tbl_rooms.room_id) as room_idrun,
      GROUP_CONCAT(tbl_field_added_values.field1) as tbl_all_sevice1,
      GROUP_CONCAT(tbl_field_lang_values.fld_valu_desc) as tbl_all_sevice2 
  FROM  tbl_rooms
  LEFT JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id AND tbl_room_details.lang = '$lang'
  LEFT JOIN tbl_room_img on tbl_room_img.room_id = tbl_rooms.room_id AND tbl_room_img.img_main=1 
  LEFT JOIN tbl_room_default_price on tbl_room_default_price.room_id = tbl_rooms.room_id AND tbl_room_default_price.crcy_code ='USD'
  JOIN tbl_room_features on tbl_room_features.room_id = tbl_rooms.room_id  AND tbl_room_features.room_feature_hilight = 'Y'
  JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_room_features.room_feature AND tbl_field_lang_values.fld_nm='ROOM_FEATURE' AND tbl_field_lang_values.lang = 'en')
  JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_room_features.room_feature AND tbl_field_added_values.fld_nm='ROOM_FEATURE'  AND tbl_field_added_values.lang='$lang')
  WHERE tbl_rooms.hotel_id= $hotel_id  AND  tbl_rooms.published_status = 'Y' AND tbl_rooms.booking_status = 'Y'
  GROUP BY
  tbl_rooms.published_status,
  tbl_rooms.booking_status,
  tbl_room_img.img_nm,
  tbl_rooms.room_title,
  tbl_room_details.lang,
  tbl_room_default_price.default_price,
  tbl_room_default_price.default_dscnt_price,
  tbl_room_details.room_fld_nm,
  tbl_room_details.room_fld_desc,
  tbl_rooms.default_quota,
  tbl_rooms.max_extra_bed
  ORDER BY tbl_room_details.lang ASC";
    return $this->db->query($sql_detail)->result();
}


function def_package($package_id){
    $sql = "SELECT 
      tbl_package_default_price.package_id,
      (tbl_package_default_price.price_adult) as pr_adl,
      (tbl_package_default_price.price_child) as pr_cld,
      (tbl_package_default_price.price_single_charge) as pr_csg
    FROM `tbl_package_default_price` 
    JOIN  tbl_packages on tbl_packages.package_id = tbl_package_default_price.package_id
    WHERE tbl_packages.package_id = $package_id";
    return $this->db->query($sql)->result();
}



function ch_ty_package($package_id){
  $sql = "SELECT  package_room_id FROM  tbl_package_season_price 
    where package_room_id <> 0  AND package_id = $package_id";
    return $this->db->query($sql)->num_rows();   
}


function get_hotel_package($package_id,$dbook){
  $sql="SELECT 
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id
FROM `tbl_package_season_price`
RIGHT JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
RIGHT JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
RIGHT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = 'en'
JOIN tbl_packages on tbl_packages.package_id = tbl_package_season_price.package_id 
WHERE tbl_package_season_price.package_id = $package_id 
AND ('$dbook' BETWEEN tbl_packages.str_date AND tbl_packages.end_date  OR ( tbl_packages.str_date = '0000-00-00' AND tbl_packages.end_date= '0000-00-00'))
GROUP BY
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id
ORDER BY  tbl_hotel_details.hotel_nm  ASC
 ";
 
    return $this->db->query($sql)->result();
 
}

/*
SELECT 
CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_start) as cur_date,
CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_end) as cur_date
FROM `tbl_package_season_price`
WHERE 
('2019-11-03'
 BETWEEN 
CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_start) 
 AND
CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_end)
)

*/


function get_room_package($package_id,$hotel_id,$dbook){
$roomsql = "SELECT 
  tbl_room_details.room_id,
  tbl_room_details.room_fld_nm,
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id
FROM `tbl_package_season_price`
  JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
  JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id AND tbl_room_details.lang = 'en' 
  JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
  JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = 'en'
  WHERE tbl_package_season_price.price_adult >0 AND tbl_package_season_price.package_id = $package_id AND tbl_hotels.hotel_id = $hotel_id
  GROUP BY
  tbl_room_details.room_id,
  tbl_room_details.room_fld_nm,
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id";
 $lppack = $this->db->query($roomsql)->result();
 $ar1 = array();
foreach ($lppack as $value) {
    $ar2 =  array();

  $rm_id = $value->room_id;
  $sql="SELECT 
    IF(tbl_package_season_price.dscnt_price_adult<>0,tbl_package_season_price.dscnt_price_adult,tbl_package_season_price.price_adult) as price_ad,
    IF(tbl_package_season_price.dscnt_price_child<>0,tbl_package_season_price.dscnt_price_child,tbl_package_season_price.price_child) as price_ch,
    IF(tbl_package_season_price.price_single_charge<>0,tbl_package_season_price.price_single_charge,tbl_package_season_price.price_single_charge) as price_sg,
       tbl_package_season_price.id as runid_room

FROM `tbl_package_season_price`
JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id AND tbl_room_details.lang = 'en' 
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = 'en'
WHERE 
tbl_package_season_price.price_adult >0 
AND tbl_package_season_price.package_id = $package_id 
AND tbl_hotels.hotel_id = $hotel_id 
AND tbl_rooms.room_id  = $rm_id
AND ('$dbook' BETWEEN CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_start)
AND CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_end)) 
GROUP BY
  tbl_package_season_price.price_adult,
  tbl_package_season_price.price_child,
  tbl_package_season_price.price_single_charge
ORDER BY  tbl_hotel_details.hotel_nm  ASC";
 if(count($this->db->query($sql)->result())<1){
    $sql1 = "SELECT 

    IF(tbl_package_default_price.dscnt_price_adult<>0,tbl_package_default_price.dscnt_price_adult,tbl_package_default_price.price_adult) as price_ad,
    IF(tbl_package_default_price.dscnt_price_child<>0,tbl_package_default_price.dscnt_price_child,tbl_package_default_price.price_child) as price_ch,
    IF(tbl_package_default_price.price_single_charge<>0,tbl_package_default_price.price_single_charge,tbl_package_default_price.price_single_charge) as price_sg,
       0 as runid_room

    FROM `tbl_package_default_price` 
    RIGHT JOIN  tbl_packages on tbl_packages.package_id = tbl_package_default_price.package_id
    WHERE tbl_packages.package_id = $package_id";
      $room_no = $this->db->query($sql1)->result();
           foreach ($room_no as $value_no) {
                 array_push(
                            $ar2,
                            $value->room_id,
                            $value->room_fld_nm,
                            $value->hotel_nm,
                            $value->hotel_id,
                            $value_no->price_ad,
                            $value_no->price_ch,
                            $value_no->price_sg,
                            $value_no->runid_room
                          );
           }                   
   }else{
      $room_yes = $this->db->query($sql)->result();
           foreach ($room_yes as $value_yes) {
                 array_push(
                            $ar2,
                            $value->room_id,
                            $value->room_fld_nm,
                            $value->hotel_nm,
                            $value->hotel_id,
                            $value_yes->price_ad,
                            $value_yes->price_ch,
                            $value_yes->price_sg,
                            $value_yes->runid_room
                      );
           }
 } 
   array_push($ar1,$ar2);  
}
  return $ar1;
}







function get_min_price(){
$sql="SELECT hotel_id,room_id, getRoomPrice(room_id,'2018-12-20','2018-12-20','THB') as Price 
, getRoomDscntPrice(room_id,'2018-12-20','2018-12-20','THB') as DscntPrice 
, getRoomQuota(room_id,'2018-12-20') as roomQuota
FROM tbl_rooms WHERE published_status = 'Y' AND booking_status = 'Y'
AND getRoomPrice(room_id,'2018-12-20','2018-12-20','THB') IS NOT NULL";
 return $this->db->query($sql)->result();
}

function get_hotel_icon($hotel_f,$hotel_id,$lang){
        $sql_detail = "SELECT 
         tbl_field_added_values.fld_valu,
         tbl_field_added_values.field1,
         tbl_field_added_values.fld_nm,
         tbl_field_lang_values.fld_valu_desc,
         tbl_hotel_features.hotel_feature_hilight
         FROM `tbl_field_added_values` 
                JOIN tbl_field_lang_values ON (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu) 
                AND tbl_field_added_values.fld_nm = '$hotel_f' 
                AND tbl_field_lang_values.fld_nm = '$hotel_f' 
                AND tbl_field_lang_values.lang ='$lang'
         JOIN tbl_hotel_features on (tbl_hotel_features.hotel_feature = tbl_field_added_values.fld_valu AND tbl_hotel_features.hotel_id = $hotel_id 
         AND tbl_hotel_features.hotel_feature_hilight = 'Y')
           ORDER BY tbl_field_added_values.id ASC";
         return $this->db->query($sql_detail)->result();

}

function get_hotel_icon_def($hotel_f,$lang){
        $sql_detail = "SELECT 
        tbl_field_added_values.fld_valu,
        tbl_field_added_values.field1,
        tbl_field_added_values.fld_nm,
        tbl_field_lang_values.fld_valu_desc 
         FROM `tbl_field_added_values` 
                JOIN tbl_field_lang_values ON (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu) 
                AND tbl_field_added_values.fld_nm = '$hotel_f' 
                AND tbl_field_lang_values.fld_nm = '$hotel_f' 
                AND tbl_field_lang_values.lang ='$lang' 
         ORDER BY tbl_field_added_values.id ASC";
         return $this->db->query($sql_detail)->result();

}





function show_hote_room_min($txt_find,$lang,$star,$fac,$minprice,$maxprice,$dt_st,$dt_en){

$date1=date_create($dt_st);
$date2=date_create($dt_en);
$diff=date_diff($date1,$date2);
$numdate= $diff->format("%a ");
$nextpage = "Hotel";
$hotel_id_one = 0;
$sql = "SELECT 
(tbl_hotels.hotel_id) as hotel_idrun,
tbl_hotels.client_id,
tbl_hotels.hotel_phone,
tbl_hotels.booking_email,
tbl_hotels.hotel_map_url,
tbl_hotels.province_id,
tbl_hotels.country_id,
tbl_hotels.key_words,
tbl_hotels.hotel_grade,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_details.lang,
tbl_hotel_details.hotel_nm,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_img.img_name ,
      GROUP_CONCAT(DISTINCT tbl_field_added_values.field1) as tbl_all_sevice1,
      GROUP_CONCAT(DISTINCT tbl_field_lang_values.fld_valu_desc) as tbl_all_sevice2,
tbl_hotels.hotel_id
FROM  tbl_hotels
LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang'
LEFT JOIN tbl_hotel_img on (tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1)
LEFT JOIN tbl_hotel_features on tbl_hotel_features.hotel_id = tbl_hotels.hotel_id  AND tbl_hotel_features.hotel_feature_hilight = 'Y'
LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_hotel_features.hotel_feature AND tbl_field_lang_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_lang_values.lang = '$lang')
LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu AND tbl_field_added_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_added_values.lang='$lang')
WHERE tbl_hotel_details.lang ='$lang'  AND 
 (tbl_hotel_details.hotel_nm LIKE '%$txt_find%' ) 
 AND $star
GROUP BY
tbl_hotels.client_id,
tbl_hotels.hotel_phone,
tbl_hotels.booking_email,
tbl_hotels.hotel_map_url,
tbl_hotels.province_id,
tbl_hotels.country_id,
tbl_hotels.key_words,
tbl_hotels.hotel_grade,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_details.lang,
tbl_hotel_details.hotel_nm,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_img.img_name 
";
 $data_find_hotel = $this->db->query($sql)->result();
 $datacount = $this->db->query($sql);
 $rowcount = $datacount->num_rows();
 $rowcn = $datacount->row();
if(isset($rowcn)){
   $hotel_id_one = $datacount->row()->hotel_id;
}

if($rowcount !=1){
$nextpage = "All";
$hotel_id_one = 0;
$sql = "SELECT 
(tbl_hotels.hotel_id) as hotel_idrun,
tbl_hotels.client_id,
tbl_hotels.hotel_phone,
tbl_hotels.booking_email,
tbl_hotels.hotel_map_url,
tbl_hotels.province_id,
tbl_hotels.country_id,
tbl_hotels.key_words,
tbl_hotels.hotel_grade,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_details.lang,
tbl_hotel_details.hotel_nm,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_img.img_name ,
      GROUP_CONCAT(DISTINCT tbl_field_added_values.field1) as tbl_all_sevice1,
      GROUP_CONCAT(DISTINCT tbl_field_lang_values.fld_valu_desc) as tbl_all_sevice2,
tbl_hotels.hotel_id
FROM  tbl_hotels
LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang'
LEFT JOIN tbl_hotel_img on (tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1)
LEFT JOIN tbl_hotel_features on tbl_hotel_features.hotel_id = tbl_hotels.hotel_id  AND tbl_hotel_features.hotel_feature_hilight = 'Y'
LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_hotel_features.hotel_feature AND tbl_field_lang_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_lang_values.lang = '$lang')
LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu AND tbl_field_added_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_added_values.lang='$lang')
WHERE tbl_hotel_details.lang ='$lang'  AND 
 (tbl_hotels.key_words LIKE '%$txt_find%' OR tbl_hotel_details.hotel_nm LIKE '%$txt_find%'  OR tbl_hotel_details.long_desc LIKE '%$txt_find%') 
 AND $star
GROUP BY
tbl_hotels.client_id,
tbl_hotels.hotel_phone,
tbl_hotels.booking_email,
tbl_hotels.hotel_map_url,
tbl_hotels.province_id,
tbl_hotels.country_id,
tbl_hotels.key_words,
tbl_hotels.hotel_grade,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_details.lang,
tbl_hotel_details.hotel_nm,
tbl_country.country_nm,
tbl_province.province_nm,
tbl_hotel_img.img_name 
";
//  AND $fac_txt
 $data_find_hotel = $this->db->query($sql)->result();
}




 $txt_lang_hotel=array();
                    foreach($data_find_hotel as $value_hotel){
                         $ch_num_btw_pr = 0;
                         $a_lang=  array();
                         $ar_get_min_pr = $this->get_room_hotel_price_min($value_hotel->hotel_idrun,'THB',$minprice,$maxprice,$dt_st,$dt_en);
                         $ar1=$ar_get_min_pr[0];
                         $ar2=$ar_get_min_pr[1];
                         $ar3=$ar_get_min_pr[2];
                         $ar4=$ar_get_min_pr[3];
                         if($numdate==0){$numdate=1;}
                         if($ar1==0){$ar1=1;}
                         $ch_num_btw_pr = ($ar1/($numdate));
                         if($ar1>0){
                            if(($ch_num_btw_pr >= $minprice && $ch_num_btw_pr <= $maxprice)){
                         array_push(
                            $a_lang,
                            $value_hotel->lang,
                            $value_hotel->hotel_nm,
                            $value_hotel->country_nm,
                            $value_hotel->province_nm,
                            $value_hotel->hotel_grade,
                            $value_hotel->img_name,
                            $value_hotel->hotel_idrun,
                            $value_hotel->tbl_all_sevice1,
                            $value_hotel->tbl_all_sevice2,
                            $value_hotel->img_name,
                            $ar1,/*sum_price*/
                            $ar2,/*price_dis*/
                            $ar3,/*txt_price*/
                            $ar4 /*show_n_pri*/
                          );
                         array_push($txt_lang_hotel,$a_lang);  
                            } 
                        }    
                    } 

return array($txt_lang_hotel,$nextpage,$hotel_id_one);

}






// End Bookin Zone
function get_room_hotel_price_min($hotel_id,$crcy_code,$minprice,$maxprice,$dt_st,$dt_en){
//$hotel_id = 99;
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
tbl_room_default_price.extra_bed_price
FROM tbl_rooms
JOIN tbl_room_default_price on  tbl_room_default_price.room_id  = tbl_rooms.room_id
WHERE  tbl_rooms.hotel_id = $hotel_id
AND tbl_room_default_price.crcy_code='$crcy_code'
";
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
             $value_room->default_price
        );
        array_push($ar_room_data,$ar_room);  
 }



$ar_iv_room = array();
foreach($ar_room_data as $value_room){
$final_add_rom_price =array();
$iv_dis = "";
$nor_dis= "";
for($d=0;$d<$numdate;$d++){
    $get_date = date('Y-m-d', strtotime($dt_st .' +'.$d.'day'));
    $room_id = $value_room[0];
    $def_price = $value_room[12];
    $hotel_id = $value_room[1];
    $room_title = $value_room[2];
    $max_extra_bed = $value_room[4];
    $published_status = $value_room[5];
    $booking_status = $value_room[6];
    $crcy_code = $value_room[7];

       $default_dscnt_price = $value_room[8];
       $extra_bed_price = $value_room[10];

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

if(!isset($room_id)){ $room_id=0;}
if(!isset($room_title)){ $room_title="";}
if(!isset($ar_re_room)){ $ar_re_room = array();}
if(!isset($crcy_code)){ $crcy_code='THB';}
        $new_all_ar = array();
        array_push($new_all_ar, 
            $room_id,
            $hotel_id,
            $room_title,
            $ar_re_room,
            $crcy_code
          );
        array_push($show_all_price_room,$new_all_ar);  
}


$ar_min_pice = array();
$ar_price_min =[3];
$number_min=9999999999;
         if(count($show_all_price_room)<1){
            $ar_price_min[0]=0;$ar_price_min[1]=0;$ar_price_min[2]="";$ar_price_min[3]=0;
           }

       foreach($show_all_price_room as $value_all_data){
        $cry = $value_all_data[4];
       // echo $value_all_data[0]."----".$value_all_data[1]."----".$value_all_data[2]."----<br>";
        $sum_price = 0;
        $sum_def_price = 0;
        $txt_list_head="";
        $txt_list_price="";
        $ij=0;$jk=0;$trd="";
        $show_n_pri=0;
        $price_dis = 0;

        foreach ($value_all_data[3] as  $valuedef){
          $dis_strik=0;$n_pri=0;
          $ij++;$jk++;$txt_in_out="";
          if($jk==1){$txt_in_out="<font color='red'>Check In </font><br>";}
          else if($jk==count($value_all_data[3])){$txt_in_out="<font color='red'></font><br>";}
          else{$txt_in_out="<br>";}


          if($valuedef[8]>0){
          	    $or_num=$valuedef[8];
             	$dis_strik=number_format($valuedef[1])." ".$cry;
             	$sum_price = $sum_price+$valuedef[1];
                $price_dis = $price_dis + $or_num;
          }else{
          	    $or_num=$valuedef[1];
                $dis_strik = number_format($valuedef[11])." ".$cry;
                if($or_num >= $valuedef[11]){$dis_strik="";$sum_price = $sum_price+$or_num;}
                else if($or_num < $valuedef[11]){$sum_price = $sum_price+$valuedef[11];$price_dis = $price_dis + $or_num;}
          }
           if($ij==4){$ij=0;$trd="</tr><tr>";}else{$trd="";}

           $show_n_pri  = $show_n_pri + $or_num;
           
           //$sum_price =  $sum_price +($or_num);
           //$sum_def_price = $sum_def_price + ($valuedef[1]);

           $txt_list_price = $txt_list_price."<td><font color='#337ab7'><b>".$txt_in_out.($valuedef[10])."</b></font><br><font color='#000000'>".number_format(($or_num))." ".$valuedef[7]."</font><br><strike><font color='#adadad'>".$dis_strik."</font></strike></td>".$trd;
        }
            //echo $sum_price."::".$sum_def_price."<br>";
    if(!isset($numdate) || $numdate==0){$numdate=1;}
    if(!isset($show_n_pri) || $show_n_pri==0){$show_n_pri=1;}
    $row_sum_av = "<tr><td colspan=4 style='text-align:left;'><b style='color:red;font-size:11px;'>Average: ".number_format(($show_n_pri/($numdate)))." ".$cry." / Night</b></td></tr>";
    $txt_price = "<table class='table borderless' style='border-radius:5px;width:auto;border-width:0px;border-style: none;padding: 2px;border-color:#cccccc;font-size:10px;background-color: #ffffff;box-shadow: 1px 3px 3px 3px #cccccc;'><tr>".$txt_list_price.$row_sum_av."</table>";
          if($sum_price < $number_min){
            $ar_price_min[0]=$sum_price;
            $ar_price_min[1]=$price_dis;
            $ar_price_min[2]=$txt_price;
            $ar_price_min[3]=$show_n_pri;
            $number_min = $sum_price;
          }
  
    }
        return $ar_price_min;
          // echo $ar_price_min[0].$ar_price_min[1].$ar_price_min[2];

        
    
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























function get_btw_price($crcy_code){
$query = $this->db->query("SELECT max(default_price) as max_price FROM tbl_room_default_price WHERE crcy_code='$crcy_code'");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return $row->max_price;
     }else{return 0;}
  return 0;
}
}
?>