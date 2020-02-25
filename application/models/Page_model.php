<?php

class Page_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }

function confBook(){


}


function get_id_pro_code($utoid_book){

   $sql = "SELECT * FROM `tbl_gp_booking` WHERE id_run=$utoid_book";
  // return $this->db->query($sql)->result();
   $query = $this->db->query($sql);
   $row = $query->row();
   return $row;


}


function get_typ_package($package_id){
$query = $this->db->query("SELECT * from tbl_packages WHERE package_id = $package_id");
$row = $query->row();

if (isset($row))
{
       $ty = $row->package_room_type;
       if(trim($ty)=="Y"){
        return 1;
       }else{
        return 0;
       }

}
 return -1;
}


function   get_def_price($package_id  ){
$query = $this->db->query("SELECT 
 IF(dscnt_price_adult >0,dscnt_price_adult,price_adult) AS pr_ad
 FROM `tbl_package_default_price` WHERE package_id = $package_id ");
$row = $query->row();
if (isset($row))
{
        return  $row->pr_ad;
}
}


function get_pro_show_sld(){
$sql  =  "SELECT * from tbl_promo_detail 
JOIN tbl_pro_img on tbl_pro_img.idpro = tbl_promo_detail.gp_id
WHERE tbl_promo_detail.lang = 'en' and tbl_pro_img.img_main = 1 order by tbl_promo_detail.gp_id desc";
return $this->db->query($sql)->result();

}

function get_res_data($txt_find,$lg){
  $txt_ser = "";
  if($txt_find!=""){
     $txt_ser = " WHERE tbl_resturant_detail.res_name like '%$txt_find%'  or tbl_resturant_detail.res_desc like '%$txt_find%'";
  }
   $sql = "SELECT * FROM tbl_resturant_detail 
JOIN tbl_restaurant_img on tbl_restaurant_img.restaurant_id = tbl_resturant_detail.res_id and tbl_resturant_detail.lang = '$lg' and tbl_restaurant_img.img_main = 1
JOIN tbl_services on tbl_services.client_id = tbl_resturant_detail.client_id AND tbl_services.service_cd = 'RESTAURANT' AND tbl_services.st = 0
 $txt_ser
";
return $this->db->query($sql)->result();
}



function get_pro_data($txt_find,$lang_q){
    $txt_ser = "";
  if($txt_find!=""){
     $txt_ser = " WHERE tbl_promo_detail.pro_title like '%$txt_find%'  or tbl_promo_detail.pro_dec_short like '%$txt_find%'";
  }
   $sql = "SELECT * FROM tbl_promo_detail 
JOIN tbl_pro_img on tbl_pro_img.idpro = tbl_promo_detail.gp_id AND tbl_pro_img.img_main=1 AND tbl_promo_detail.lang='$lang_q'
 $txt_ser
";
return $this->db->query($sql)->result();
}



function get_id_run_trans($num){
$sql = "SELECT DISTINCT tbl_pre_transport_booking_detail.booking_id  FROM `tbl_pre_transport_booking_detail`
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id
WHERE tbl_gp_booking_detail.id_gp_booking = $num AND tbl_gp_booking_detail.book_type='TS'";
$query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->booking_id;
  }
}


function get_id_run_pack($num){
$sql = "SELECT DISTINCT tbl_package_pre_booking.id  FROM `tbl_package_pre_booking`
WHERE tbl_package_pre_booking.id_gp = $num";
$query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->id;
  }
}




function get_id_run_res($num){
  $sql = "SELECT DISTINCT tbl_res_pre_booking.id  FROM `tbl_res_pre_booking`
WHERE tbl_res_pre_booking.id_gp = $num";
$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
   {
        return $row->id;
    }
}





function get_tbl_package_img($num){
$sql = "SELECT *  FROM `tbl_package_img` 
JOIN  tbl_package_detail on tbl_package_detail.package_id = tbl_package_img.package_id AND tbl_package_detail.lang = 'en'
JOIN tbl_packages on tbl_packages.package_id = tbl_package_detail.package_id
WHERE tbl_package_img.img_main=1 AND  tbl_packages.booking_status = 'Y'
AND tbl_packages.published_status = 'Y'
ORDER BY RAND()
LIMIT $num";
      return $this->db->query($sql)->result();
}

function chk_hotel($txt_find){
$sql = "SELECT hotel_id,(SELECT COUNT(hotel_id)  FROM tbl_hotel_details 
WHERE lang = 'en' and hotel_nm like '%$txt_find%') as chnum FROM tbl_hotel_details 
WHERE lang = 'en' and hotel_nm like '%$txt_find%'";
return $this->db->query($sql)->result();
}




// =--------------------------------------------------- F---------------------------------------
function get_fac_all($tyid){
  $sql = "SELECT COUNT(tbl_hotels.hotel_id) fact FROM tbl_hotels 
JOIN tbl_hotel_features on tbl_hotel_features.hotel_id = tbl_hotels.hotel_id
WHERE tbl_hotel_features.hotel_feature=$tyid";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->fact;
}
return 0;
}
//-----------------------------------------------------------------------------------------------

function get_typ_all($tyid){
  $sql = "SELECT COUNT(tbl_hotels.hotel_id) typc FROM tbl_hotels 
JOIN tbl_hotel_type on tbl_hotel_type.idty = tbl_hotels.hotel_typ
WHERE tbl_hotel_type.idty=$tyid";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->typc;
}
return 0;
}



// =--------------------------------------------------- START---------------------------------------
function get_str5(){
  $sql = "SELECT COUNT(tbl_hotels.hotel_grade) str FROM tbl_hotels WHERE tbl_hotels.hotel_grade=5";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->str;
}
return 0;
}

function get_str4(){
  $sql = "SELECT COUNT(tbl_hotels.hotel_grade) str FROM tbl_hotels WHERE tbl_hotels.hotel_grade=4";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->str;
}
return 0;
}


function get_str3(){
  $sql = "SELECT COUNT(tbl_hotels.hotel_grade) str FROM tbl_hotels WHERE tbl_hotels.hotel_grade=3";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->str;
}
return 0;
}


function get_str2(){
  $sql = "SELECT COUNT(tbl_hotels.hotel_grade) str FROM tbl_hotels WHERE tbl_hotels.hotel_grade=2";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->str;
}
return 0;
}


function get_str1(){
  $sql = "SELECT COUNT(tbl_hotels.hotel_grade) str FROM tbl_hotels WHERE tbl_hotels.hotel_grade=1";
  $query = $this->db->query($sql);
$row = $query->row();
if (isset($row)){
        return $row->str;
}
return 0;
}



function get_img($room_id){
         $sql = "SELECT * FROM tbl_room_img WHERE room_id=$room_id";
         return $this->db->query($sql)->result();
}


function  add_view($packageid){
 $nnum =  rand(1,3);
    $sql1 = "UPDATE `tbl_packages` SET num_view=num_view+$nnum WHERE package_id=$packageid";
  $this->db->query($sql1);
  return 1;
}

function show_hotel_data($hotel_id,$lang){
$sql = "SELECT tbl_hotels.hotel_id,tbl_hotels.hotel_grade,tbl_hotel_details.hotel_nm,tbl_hotel_img.img_name,tbl_hotel_details.short_desc,tbl_hotels.h_lat,tbl_hotels.h_lng FROM `tbl_hotel_details`
 JOIN tbl_hotels ON tbl_hotels.hotel_id = tbl_hotel_details.hotel_id
 JOIN tbl_hotel_img ON tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main=1
 WHERE tbl_hotel_details.hotel_id=$hotel_id AND tbl_hotel_details.lang='$lang'";
      return $this->db->query($sql)->result();
}


function get_hotel_tra_pop($hotel_id,$lang){
$sql = "SELECT * FROM `tbl_hotel_location_travel` WHERE hotel_id=$hotel_id AND lang='$lang' ORDER BY  st_p DESC,
(CASE
    WHEN `type_distance` ='km' THEN  (`number_distance` * 1000)
    ELSE `number_distance`
END) ASC";
      return $this->db->query($sql)->result();
}

function get_hotel_tra_def($hotel_id,$lang){
$sql = "SELECT * FROM `tbl_hotel_location_travel` WHERE hotel_id=$hotel_id AND lang='$lang' ORDER BY 
(CASE
    WHEN `type_distance` ='km' THEN  (`number_distance` * 1000)
    ELSE `number_distance`
END) ASC";
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


function get_book_transport_detail($sec_gp_book,$ty){
$sql = "SELECT *,tbl_pre_transport_booking_detail.id as id_tr,
  (SELECT tbl_place_details.place_title FROM tbl_place_details WHERE id=tbl_transport_route_data.begin_place_id) as from_data,
  (SELECT tbl_place_details.place_title FROM tbl_place_details WHERE id=tbl_transport_route_data.destination_place_id) as to_data 
  FROM `tbl_pre_transport_booking_detail`
     JOIN tbl_transport_route_timeTable ON tbl_transport_route_timeTable.id = tbl_pre_transport_booking_detail.time_id
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     JOIN tbl_transport_route_data ON  tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id
     JOIN tbl_clients ON tbl_clients.client_id = tbl_transport_route_data.client_id 
  WHERE tbl_gp_booking.id_run = $sec_gp_book";
  return $this->db->query($sql)->result();
}



function get_book_package_hotel($id_gp,$lg){
$sql = "SELECT *,IF(tbl_rooms.hotel_id=0,'Adult', tbl_hotel_details.hotel_nm) as show_ty FROM tbl_package_pre_booking
JOIN  tbl_package_pre_hotel_price on tbl_package_pre_hotel_price.id_connect = tbl_package_pre_booking.id_gp
JOIN tbl_room_details on tbl_room_details.room_id =  tbl_package_pre_hotel_price.room_id  AND tbl_room_details.lang  = '$lg'
JOIN tbl_rooms on tbl_rooms.room_id  = tbl_room_details.room_id 
JOIN tbl_hotels on tbl_hotels.hotel_id   = tbl_rooms.hotel_id 
JOIN tbl_hotel_details on tbl_hotel_details.hotel_id   = tbl_hotels.hotel_id  AND tbl_hotel_details.lang = '$lg'
WHERE tbl_package_pre_booking.id_gp = $id_gp";
  return $this->db->query($sql)->result();
}




function get_book_package_hotel_extra($id_gp,$lg){
  $sql = "SELECT * FROM tbl_package_pre_extra_price
JOIN  tbl_pack_extra on tbl_pack_extra.idrun = tbl_package_pre_extra_price.idl
WHERE tbl_package_pre_extra_price.id_connect =  $id_gp";
return $this->db->query($sql)->result();
}


function get_book_package_detail($utoid_book){
$sql = "SELECT *,tbl_package_pre_booking.id as del_pack FROM  tbl_package_pre_booking
JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_package_pre_booking.package_id AND tbl_package_detail.lang = 'en'
WHERE tbl_package_pre_booking.id_gp = $utoid_book";
  return $this->db->query($sql)->result();
}


/*
function get_book_res_detail($utoid_book){
$sql = "SELECT *,tbl_res_pre_booking.id as del_pack FROM  tbl_res_pre_booking
JOIN tbl_resturant_detail on tbl_resturant_detail.res_id = tbl_res_pre_booking.res_id AND tbl_resturant_detail.lang = 'en'
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_res_pre_booking.id_gp
WHERE tbl_res_pre_booking.id_gp = $utoid_book";
  return $this->db->query($sql)->result();
}
*/



function get_book_res_detail($utoid_book){
$sql = "SELECT *,tbl_res_pre_booking.id as del_pack FROM  tbl_res_pre_booking
JOIN tbl_resturant_detail on tbl_resturant_detail.res_id = tbl_res_pre_booking.res_id AND tbl_resturant_detail.lang = 'en'
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_res_pre_booking.id_gp
WHERE tbl_res_pre_booking.id_gp = $utoid_book";
  return $this->db->query($sql)->result();
}



function get_img_package($idpack){
   $sql = "SELECT img_name  FROM tbl_package_img WHERE package_id = $idpack ORDER BY img_main desc";
   return $this->db->query($sql)->result();
}

function get_img_res($idres){
   $sql = "SELECT img_name  FROM tbl_restaurant_img WHERE restaurant_id = $idres ORDER BY img_main desc";
   return $this->db->query($sql)->result();
}

function get_img_pro($idpro){
   $sql = "SELECT url_img  FROM tbl_pro_img WHERE idpro = $idpro ORDER BY img_main desc";
   return $this->db->query($sql)->result();
}


/*

function get_data_res($txtfild){
   $sql_find = "";
   $date_cur = date("Y-m-d");
   if($txtfild!='none' && trim($txtfild)!=""){
      $sql_find = " AND (tbl_resturant_detail.res_name like '%$txtfild%' OR tbl_resturant_detail.res_desc like '%$txtfild%')";
   }
 $sql = "SELECT  *
    FROM  tbl_resturant_detail 
    LEFT JOIN tbl_restaurant_img on tbl_resturant_detail.res_id = tbl_restaurant_img.restaurant_id AND tbl_restaurant_img.img_main = 1
    WHERE  tbl_resturant_detail.lang ='en'  AND tbl_resturant_detail.published_status = 'Y'
    AND ('$date_cur' BETWEEN tbl_resturant_detail.str_date AND tbl_resturant_detail.end_date  OR ( tbl_resturant_detail.str_date = '0000-00-00' AND tbl_resturant_detail.end_date= '0000-00-00')) $sql_find
    ORDER BY tbl_resturant_detail.res_id ASC";
    return $this->db->query($sql)->result();
}
*/

function get_data_Package($txtfild,$txtlang,$date_cur){
   $sql_find = "";
  // $date_cur = date("Y-m-d");
   if($txtfild!='none' && trim($txtfild)!=""){
      $sql_find = " AND (tbl_package_detail.package_title like '%$txtfild%' OR tbl_package_detail.package_desc like '%$txtfild%')";
   }
 $sql = "SELECT  *
    FROM  tbl_packages 
    LEFT JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_packages.package_id
    LEFT JOIN tbl_package_img on tbl_package_img.package_id = tbl_packages.package_id AND tbl_package_img.img_main = 1
    JOIN tbl_services on tbl_services.client_id = tbl_packages.client_id AND  tbl_services.service_cd = 'PACKAGE'
    WHERE  tbl_package_detail.lang ='$txtlang'  AND tbl_packages.published_status = 'Y'
    AND ('$date_cur' BETWEEN tbl_packages.str_date AND tbl_packages.end_date  OR ( tbl_packages.str_date = '0000-00-00' AND tbl_packages.end_date= '0000-00-00')) $sql_find
    AND tbl_services.st = 0 
    ORDER BY tbl_packages.package_id ASC";
    return $this->db->query($sql)->result();
}



function get_data_Res($txtfild){
   $sql_find = "";
   $date_cur = date("Y-m-d");
   if($txtfild!='none' && trim($txtfild)!=""){
      $sql_find = " AND (tbl_package_detail.package_title like '%$txtfild%' OR tbl_package_detail.package_desc like '%$txtfild%')";
   }
 $sql = "SELECT  *
    FROM  tbl_packages 
    LEFT JOIN tbl_package_detail on tbl_package_detail.package_id = tbl_packages.package_id
    LEFT JOIN tbl_package_img on tbl_package_img.package_id = tbl_packages.package_id AND tbl_package_img.img_main = 1
    WHERE  tbl_package_detail.lang ='en'  AND tbl_packages.published_status = 'Y'
    AND ('$date_cur' BETWEEN tbl_packages.str_date AND tbl_packages.end_date  OR ( tbl_packages.str_date = '0000-00-00' AND tbl_packages.end_date= '0000-00-00')) $sql_find
    ORDER BY tbl_packages.package_id ASC";
    return $this->db->query($sql)->result();
}



function get_price_pack($package_id){
  $sql = "SELECT * FROM tbl_package_season_price WHERE package_id = $package_id";  
  return $this->db->query($sql)->result();
}


function get_price_s($package_id,$dbook){
   $txt_yer1 = "";
   $txt_yer2 = $this->check_package_s($package_id,$dbook);
   if($txt_yer2>0){
          $txt_yer1 = $dbook;
   }else{
     $date = date_create($dbook);
     date_add($date, date_interval_create_from_date_string('1 years'));
     $txt_yer1 =  date_format($date, 'Y-m-d');
   }

$sql="SELECT package_room_id,st,(if(nst=1,price_one,per_price)) as per_price
FROM tbl_package_season_price
WHERE package_id = $package_id
AND per_price <> 0 
AND st = 0
AND 
'$txt_yer1' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)   
ORDER BY  per_price  DESC
";
  return $this->db->query($sql)->result();
}





function check_package_s($package_id,$dbook){
$sql = "SELECT    sum(tbl_package_season_price.price_one) as sum_ch  
FROM `tbl_package_season_price` 
WHERE package_id = $package_id
AND per_price <> 0 
AND st = 0
AND 
'$dbook' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)   
  ORDER BY (CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)) ASC";

$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
{
        return $row->sum_ch;
}}













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
   $lang_q = $this->session->userdata('ch_lang');
  $sql="SELECT * FROM tbl_packages 
  JOIN tbl_package_detail on tbl_package_detail.package_id   = tbl_packages.package_id  AND tbl_package_detail.lang  = '$lang_q'
  JOIN tbl_package_img on tbl_package_img.package_id = tbl_packages.package_id  AND tbl_package_img.img_main=1
  WHERE tbl_packages.package_id  =$package_id 
  ";
  return $this->db->query($sql)->result();
}



function  get_detail_res($res_id){
   $lang_q = $this->session->userdata('ch_lang');
  $sql="SELECT * FROM tbl_resturant_detail 
JOIN tbl_restaurant_img on tbl_restaurant_img.restaurant_id = tbl_resturant_detail.res_id and tbl_resturant_detail.lang = '$lang_q' and tbl_restaurant_img.img_main = 1
WHERE tbl_resturant_detail.res_id = $res_id 
  ";
  return $this->db->query($sql)->result();
}


function get_vdo_play(){
   $lang_q = $this->session->userdata('ch_lang');
  $sql="SELECT * FROM tbl_present_detail 
JOIN tbl_present_img on tbl_present_img.idpro = tbl_present_detail.gp_id and tbl_present_detail.lang = '$lang_q' and tbl_present_img.img_main = 1
  ";
  return $this->db->query($sql)->result();
}



function  get_detail_pro($res_id){
   $lang_q = $this->session->userdata('ch_lang');
  $sql="SELECT * FROM tbl_promo_detail 
JOIN tbl_pro_img on tbl_pro_img.idpro = tbl_promo_detail.gp_id and tbl_promo_detail.lang = '$lang_q' and tbl_pro_img.img_main = 1
WHERE tbl_promo_detail.gp_id = $res_id 
  ";
  return $this->db->query($sql)->result();
}



function get_hotel_name($idroom){
  $sql ="SELECT tbl_hotel_details.hotel_id,tbl_hotel_details.hotel_nm,tbl_hotel_details.txt_policy FROM tbl_hotel_details 
  JOIN tbl_rooms ON tbl_rooms.hotel_id = tbl_hotel_details.hotel_id AND tbl_hotel_details.lang = 'en'
  WHERE tbl_rooms.room_id = $idroom
  ";
  return $this->db->query($sql)->result();
}


function del_hotel_list($pdel_id,$rdel_id){

$sql ="SELECT id FROM tbl_pre_booking_room_detail WHERE pre_booking_id=$pdel_id AND room_id=$rdel_id";
$rows = $this->db->query($sql)->result();
foreach ($rows as  $value) {
  $iddel = $value->id;
  $sql2 = "DELETE FROM tbl_gp_booking_detail WHERE id_booking=$iddel AND book_type='HT'";
  $this->db->query($sql2);
}
  $sql1 = "DELETE FROM tbl_pre_booking_room_detail WHERE pre_booking_id=$pdel_id AND room_id=$rdel_id";
  $this->db->query($sql1);



 return 1;

}

function del_trans_list($iddel){
  $sql1 = "DELETE FROM tbl_pre_transport_booking_detail WHERE id=$iddel";
  $this->db->query($sql1);
  $sql2 = "DELETE FROM tbl_gp_booking_detail WHERE id_booking=$iddel AND book_type='TS'";
  $this->db->query($sql2);
  return 1;
}

function del_pack_list($iddel){
  $sql1 = "UPDATE `tbl_package_pre_booking` SET total_customer=0 WHERE id=$iddel";
  $this->db->query($sql1);
  return 1;
}

function del_res_list($iddel){
 echo  $sql1 = "UPDATE  tbl_res_pre_booking SET total_customer=0 WHERE id=$iddel";
  $this->db->query($sql1);
  return 1;
}




function get_member_book_hotel_detail($utoid_book){
  $sql = "SELECT 
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
WHERE tbl_pre_booking.pre_booking_id=$utoid_book
   GROUP BY
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


function get_customer_hotel($id_bookin){
  $query = $this->db->query("SELECT * FROM tbl_pre_booking WHERE pre_booking_id = $id_bookin");
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
      (IF(tbl_package_default_price.dscnt_price_adult>0,tbl_package_default_price.dscnt_price_adult,tbl_package_default_price.price_adult)) as pr_adl,
      (IF(tbl_package_default_price.dscnt_price_child>0,tbl_package_default_price.dscnt_price_child,tbl_package_default_price.price_child)) as pr_cld,
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



function check_package_date_all_room($hotel_id,$package_id,$dbook){
$sql = "SELECT    sum(tbl_package_season_price.price_one) as sum_ch  FROM `tbl_package_season_price` 
JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
WHERE (`package_id` = $package_id AND tbl_hotels.hotel_id = $hotel_id AND tbl_package_season_price.st = 0)
AND 
'$dbook' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)   
  ORDER BY (CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)) ASC";

$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
{
        return $row->sum_ch;
}}





function   chk_non_hotel($hotel_id,$package_id,$dbook){
   $txt_yer1 = "";
   $txt_yer2 = $this->check_package_date_all_room($hotel_id,$package_id,$dbook);
   if($txt_yer2>0){
          $txt_yer1 = $dbook;
   }else{
     $date = date_create($dbook);
     date_add($date, date_interval_create_from_date_string('1 years'));
     $txt_yer1 =  date_format($date, 'Y-m-d');
   }

$sql = "SELECT    sum(tbl_package_season_price.price_one) as sum_ch  FROM `tbl_package_season_price` 
JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
WHERE (`package_id` = $package_id AND tbl_hotels.hotel_id = $hotel_id AND tbl_package_season_price.st = 0)
AND 
'$txt_yer1' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)
";
$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
{
        return $row->sum_ch;
}
return  0;
}













function get_hotel_night($package_id){
$query = $this->db->query("SELECT night FROM tbl_packages WHERE package_id=$package_id");
$row = $query->row();
if (isset($row)){
          return $row->night;
}}


function get_hotel_package($package_id,$dbook){
  $lang_q = $this->session->userdata('ch_lang');
  $sql="SELECT 
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id
FROM `tbl_package_season_price`
RIGHT JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
RIGHT JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
RIGHT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang_q'
JOIN tbl_packages on tbl_packages.package_id = tbl_package_season_price.package_id 
WHERE (tbl_package_season_price.package_id = $package_id)
AND ('$dbook' BETWEEN tbl_packages.str_date AND tbl_packages.end_date  OR ( tbl_packages.str_date = '0000-00-00' AND tbl_packages.end_date= '0000-00-00'))
GROUP BY
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id
ORDER BY  tbl_hotel_details.hotel_nm  DESC
 ";
    return $this->db->query($sql)->result();
}




function get_extra_detail($idpack,$hotel_id,$dbook){
   $txt_yer1 = "";
   $txt_yer2 = $this->check_package_date_extra($idpack,$hotel_id,$dbook);
   if($txt_yer2>0){
          $txt_yer1 = $dbook;
   }else{
     $date = date_create($dbook);
     date_add($date, date_interval_create_from_date_string('1 years'));
          $txt_yer1 =  date_format($date, 'Y-m-d');
   }

//echo $txt_yer1;
$sql = "SELECT 
tbl_package_season_price_extra.night_net,
tbl_package_season_price_extra.night_selling,
tbl_package_season_price_extra.per_price,
tbl_pack_extra.extra_name,
tbl_pack_extra.idrun,
tbl_package_season_price_extra.txt_detail_extra
FROM tbl_package_season_price_extra 
JOIN tbl_pack_extra on tbl_pack_extra.idrun = tbl_package_season_price_extra.ser_id
WHERE package_id = $idpack
AND tbl_package_season_price_extra.per_price  > 0
AND tbl_package_season_price_extra.hotel_id = $hotel_id
AND 
'$txt_yer1' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price_extra.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price_extra.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end)
        ELSE '0000-00-00'
    END)   

ORDER BY tbl_pack_extra.idrun ASC";
//echo $sql;
return $this->db->query($sql)->result();
}









function   check_package_date_extra($idpack,$hotel_id,$dbook){
$sql = "SELECT 
sum(tbl_package_season_price_extra.per_price) as sum_all
FROM tbl_package_season_price_extra 
JOIN tbl_pack_extra on tbl_pack_extra.idrun = tbl_package_season_price_extra.ser_id
WHERE package_id = $idpack
AND tbl_package_season_price_extra.per_price  > 0
AND tbl_package_season_price_extra.hotel_id = $hotel_id
AND 
'$dbook' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price_extra.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price_extra.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_end)
        ELSE '0000-00-00'
    END)   
  ORDER BY (CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_extra.period_start)) ASC";

$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
{
        return $row->sum_all;

}
}





//--------------------------------------------------------------------------------------------------------------------------------


function check_package_date($dbook,$package_id,$room_id){
  $sql = "SELECT  
       count(tbl_package_season_price.price_one) as cnc
FROM 
tbl_package_season_price
WHERE tbl_package_season_price.package_id = $package_id AND 
tbl_package_season_price.package_room_id = $room_id
AND 
'$dbook' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)   
  ORDER BY (CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)) ASC";

$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
{
        return $row->cnc;

}


}




function get_room_package($package_id,$hotel_id,$dbook){
$lang_q = $this->session->userdata('ch_lang');
 $roomsql = "SELECT 
  tbl_room_details.room_id,
  tbl_room_details.room_fld_nm,
  tbl_hotel_details.hotel_nm,
  tbl_hotel_details.hotel_id
FROM `tbl_package_season_price`
  JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
  JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id AND tbl_room_details.lang = '$lang_q' 
  JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
  JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang_q'
  WHERE (tbl_package_season_price.per_price >0 or tbl_package_season_price.price_one >0) AND tbl_package_season_price.package_id = $package_id AND tbl_hotels.hotel_id = $hotel_id
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

   $txt_yer1 = "";
   $txt_yer2 = $this->check_package_date($dbook,$package_id,$rm_id);
   if($txt_yer2==1){
          $txt_yer1 = $dbook;
   }else{
     $date = date_create($dbook);
     date_add($date, date_interval_create_from_date_string('1 years'));
     $txt_yer1 =  date_format($date, 'Y-m-d');
   }

   $sql="SELECT 
    (tbl_package_season_price.per_price) as price_per,
    tbl_package_season_price.id as id_pr_season,
    (tbl_package_season_price.price_one) as price_per1,
    (tbl_package_season_price.nst) as nst_ch,
    (tbl_package_season_price.st) as st,
    (tbl_package_season_price.night_net) as net_p,
    (tbl_package_season_price.night_selling) as sel_p,
    (tbl_package_season_price.txt_detail_service) as ar_ser


FROM `tbl_package_season_price`
JOIN tbl_rooms on tbl_rooms.room_id = tbl_package_season_price.package_room_id
JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id AND tbl_room_details.lang = '$lang_q' 
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang_q'
WHERE 
 tbl_package_season_price.package_id = $package_id 
AND tbl_hotels.hotel_id = $hotel_id 
AND tbl_rooms.room_id  = $rm_id
AND '$txt_yer1' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)  
GROUP BY
  tbl_package_season_price.per_price
ORDER BY  tbl_hotel_details.hotel_nm  ASC";
 if(count($this->db->query($sql)->result())<1){
    $sql1 = "SELECT 
    (tbl_package_season_price.per_price) as price_per,
    tbl_package_season_price.id as runid_room,
    (tbl_package_season_price.price_one) as price_per1,
    (tbl_package_season_price.nst) as nst_ch,
    (tbl_package_season_price.st) as st,
    (tbl_package_season_price.night_net) as net_p,
    (tbl_package_season_price.night_selling) as sel_p,
    (tbl_package_season_price.txt_detail_service) as ar_ser
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
                            $value_no->price_per,
                            $value_no->id_pr_season,
                            $value_no->price_per1,
                            $value_no->nst_ch,
                            $value_no->st,
                            $value_no->net_p,
                            $value_no->sel_p,
                            $value_no->ar_ser
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
                            $value_yes->price_per,
                            $value_yes->id_pr_season,
                            $value_yes->price_per1,
                            $value_yes->nst_ch,
                            $value_yes->st,
                            $value_yes->net_p,
                            $value_yes->sel_p,
                            $value_yes->ar_ser
                          );
           }
 } 
   array_push($ar1,$ar2);  
 }
   return $ar1;
 }



// AND ('2019-12-25' BETWEEN CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_start)
// AND CONCAT(YEAR(CURDATE()),'-',tbl_package_season_price.period_end)) 


function get_data_sel_ser($pty,$per_son,$room,$package_id,$p_room_id,$pk_night,$dbook){
   $txt_yer1 = "";
   $txt_yer2 = $this->check_package_date($dbook,$package_id,$p_room_id);
   if($txt_yer2==1){
          $txt_yer1 = $dbook;
   }else{
     $date = date_create($dbook);
     date_add($date, date_interval_create_from_date_string('1 years'));
     $txt_yer1 =  date_format($date, 'Y-m-d');
   }
   //echo $txt_yer1;
$query = $this->db->query("SELECT tbl_package_season_price.night_selling FROM tbl_package_season_price 
 WHERE package_id = $package_id 
 AND `package_room_id` = $p_room_id
 AND 
'$txt_yer1' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price.period_end)
        WHEN  (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price.period_end)
        ELSE '0000-00-00'
    END)   
ORDER BY `tbl_package_season_price`.`id`  ASC");

$row_room = $query->row();
$room_price = 0;
$ser_vice_price = 0;
// ------------------------------------- ส่่วนของ service package ----------------------------------------------------------------------------------------------
if (isset($row_room)){
    $room_price = $row_room->night_selling;

$query = $this->db->query("SELECT sum(tbl_package_season_price_detail.price) as smprice FROM tbl_package_season_price_detail 
 WHERE tbl_package_season_price_detail.package_id = $package_id 
 AND tbl_package_season_price_detail.room_id = $p_room_id
 AND 
'$txt_yer1' BETWEEN 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start)
        ELSE '0000-00-00'
    END) 
    AND 
    (CASE 
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end),'%Y%m%d') *1) AND (YEAR('$dbook') = YEAR(CURDATE()))  THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price_detail.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start),'%Y%m%d') *1) > (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end),'%Y%m%d') *1) THEN
     CONCAT(YEAR('$dbook')+1,'-',tbl_package_season_price_detail.period_end)
        WHEN (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_start),'%Y%m%d') *1) <= (DATE_FORMAT(CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end),'%Y%m%d') *1) THEN 
     CONCAT(YEAR('$dbook'),'-',tbl_package_season_price_detail.period_end)
        ELSE '0000-00-00'
    END)   
ORDER BY `tbl_package_season_price_detail`.`idrun`  ASC

");
$row_ser = $query->row();
if (isset($row_ser)){
    $ser_vice_price = $row_ser->smprice;
}
    $sum_all = 0;
    if($pty==2){
      $sum_all = (($per_son * $ser_vice_price) + ($room * ($room_price*$pk_night)));
    }else if($pty==1){
      $sum_all = (($per_son * $ser_vice_price) + ($per_son * ($room_price*$pk_night)));
    }else{
      $sum_all = 0;
    }
    return $sum_all;
}}









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


function get_hotel_typ($lg){
        $sql_detail = "SELECT *  FROM tbl_hotel_type
          JOIN tbl_field_lang_values on tbl_field_lang_values.fld_nm ='HOTEL_TY' 
          AND (tbl_field_lang_values.fld_valu = tbl_hotel_type.type_name)
         where tbl_field_lang_values.lang = '$lg'
         ORDER BY tbl_hotel_type.idty  ASC";
         return $this->db->query($sql_detail)->result();
}



function get_qtr_iv($dte,$get_room){
   $sql = "SELECT remain_room FROM tbl_room_quota WHERE room_id=$get_room AND quota_dt='$dte'";
$room_qty = $this->db->query($sql)->result();
$set_qtr = 0;
foreach ($room_qty as $v_qtr) {
   $set_qtr = $v_qtr->remain_room;
}
return $set_qtr;
}


function get_qtr_room($dte,$get_room){

   $sql = "SELECT tbl_pre_booking.str_st,tbl_pre_booking_room_detail.room_id,count(tbl_pre_booking_room_detail.room_id) as count_room
FROM tbl_pre_booking 
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
WHERE tbl_pre_booking.str_st = 1 AND ('$dte' BETWEEN  tbl_pre_booking.date_in AND DATE_ADD(tbl_pre_booking.date_out, INTERVAL -1 DAY)) AND tbl_pre_booking_room_detail.room_id = $get_room
GROUP BY 
tbl_pre_booking.str_st,tbl_pre_booking_room_detail.room_id
ORDER BY tbl_pre_booking.pre_booking_id asc";
$room_qty = $this->db->query($sql)->result();
$set_qtr = 0;
foreach ($room_qty as $v_qtr) {
   $set_qtr = $v_qtr->count_room;
}
return $set_qtr;
}




function get_qty_def($get_room){
            $query2 = $this->db->query("SELECT default_quota FROM tbl_rooms WHERE room_id=$get_room");
            $row2 = $query2->row();
             if($row2){
             if($row2->default_quota>0 && (isset($row2))){
                return ($row2->default_quota);
              }else{
                 return 0;
             }}else{return 0;}
}



function get_room_quato($get_room,$run_date1,$run_date2){
$date1 = date_create($run_date1);
$date2 = date_create($run_date2);
$diff = date_diff($date1,$date2);
$num_check=0;
$num_qty=0;
$numtr=0;
$num_vqt = 0;
$num_book = 0;
  $num_qty = $this->get_qty_def($get_room);
$cnt_data = number_format($diff->format("%a"));
$armin = array();
for($k=0;$k<=($cnt_data-1);$k++){
  $txtd = " +".$k." day";
  $txt_nd = date('Y-m-d', strtotime($run_date1.$txtd));
  $num_book = $this->get_qtr_room($txt_nd,$get_room);
  $num_vqt = $this->get_qtr_iv($txt_nd,$get_room);

  $numtr = 0;
  if($num_vqt>0){$numtr=$num_vqt;}
  else{$numtr=$num_qty;}

  //echo $txt_nd.":";
  //echo $num_book." | (".$num_qty."-".$num_vqt.")=".($numtr-$num_book)."<br>";
  array_push($armin,($numtr-$num_book));
}
//echo min($armin);
//echo "<hr>";
return min($armin);;
}

function show_fac($hotel_id,$lg){
  $sql = "SELECT *  FROM tbl_hotel_features
        JOIN tbl_field_lang_values on tbl_field_lang_values.fld_nm ='HOTEL_FEATURE' 
        AND (tbl_field_lang_values.fld_valu = tbl_hotel_features.hotel_feature)
        LEFT JOIN tbl_field_added_values on tbl_field_added_values.fld_nm =  'HOTEL_FEATURE'
         AND tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu
        where tbl_field_lang_values.lang = '$lg' ANd tbl_hotel_features.hotel_id = $hotel_id
        ORDER BY tbl_field_lang_values.id  ASC";
        return $this->db->query($sql)->result();

}


function show_fac_room($room_id,$lg){
  $sql = "SELECT *  FROM tbl_room_features
        JOIN tbl_field_lang_values on tbl_field_lang_values.fld_nm ='ROOM_FEATURE' 
        AND (tbl_field_lang_values.fld_valu = tbl_room_features.room_feature)
        LEFT JOIN tbl_field_added_values on tbl_field_added_values.fld_nm =  'ROOM_FEATURE'
         AND tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu
        where tbl_field_lang_values.lang = '$lg' ANd tbl_room_features.room_id = $room_id
        ORDER BY tbl_field_lang_values.id  ASC";
        return $this->db->query($sql)->result();
}


function show_hote_room_min($txt_find,$lang,$star,$fac,$minprice,$maxprice,$dt_st,$dt_en,$txt_hotel_ty){
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
tbl_hotels.hotel_id,
tbl_hotel_addr.addr_subdistrict
FROM  tbl_hotels
LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang'
LEFT JOIN tbl_hotel_img on (tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1)
LEFT JOIN tbl_hotel_features on tbl_hotel_features.hotel_id = tbl_hotels.hotel_id  AND tbl_hotel_features.hotel_feature_hilight = 'Y'
LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_hotel_features.hotel_feature AND tbl_field_lang_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_lang_values.lang = '$lang')
LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu AND tbl_field_added_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_added_values.lang='$lang')
LEFT JOIN tbl_hotel_addr on (tbl_hotel_addr.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_addr.lang='$lang')
LEFT JOIN tbl_hotel_type on (tbl_hotel_type.idty = tbl_hotels.hotel_typ)
JOIN tbl_services on (tbl_services.client_id = tbl_hotels.client_id) and (tbl_services.service_cd='HOTEL')
WHERE tbl_hotel_details.lang ='$lang'   AND tbl_services.st = 0 and
 (tbl_hotels.key_words LIKE '%$txt_find%' OR tbl_hotel_details.hotel_nm LIKE '%$txt_find%'  OR tbl_hotel_details.long_desc LIKE '%$txt_find%') 
  AND (tbl_hotel_details.hotel_nm <> '')
  $star
  $txt_hotel_ty
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
tbl_hotel_img.img_name,
tbl_hotel_addr.addr_subdistrict
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
tbl_hotels.hotel_id,
tbl_hotel_addr.addr_subdistrict
FROM  tbl_hotels
LEFT JOIN tbl_country on tbl_country.country_id = tbl_hotels.country_id 
LEFT JOIN tbl_province on tbl_province.province_id = tbl_hotels.province_id 
LEFT JOIN tbl_hotel_details on tbl_hotel_details.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_details.lang = '$lang'
LEFT JOIN tbl_hotel_img on (tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1)
LEFT JOIN tbl_hotel_features on tbl_hotel_features.hotel_id = tbl_hotels.hotel_id  AND tbl_hotel_features.hotel_feature_hilight = 'Y'
LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_hotel_features.hotel_feature AND tbl_field_lang_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_lang_values.lang = '$lang')
LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_field_lang_values.fld_valu AND tbl_field_added_values.fld_nm='HOTEL_FEATURE'   AND tbl_field_added_values.lang='$lang')
LEFT JOIN tbl_hotel_addr on (tbl_hotel_addr.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_addr.lang='$lang')
LEFT JOIN tbl_hotel_type on (tbl_hotel_type.idty = tbl_hotels.hotel_typ)
JOIN tbl_services on (tbl_services.client_id = tbl_hotels.client_id) and (tbl_services.service_cd='HOTEL')
WHERE tbl_hotel_details.lang ='$lang'  AND tbl_services.st = 0 and
 (tbl_hotels.key_words LIKE '%$txt_find%' OR tbl_hotel_details.hotel_nm LIKE '%$txt_find%'  OR tbl_hotel_details.long_desc LIKE '%$txt_find%') 
  AND (tbl_hotel_details.hotel_nm <> '')
  $star
  $txt_hotel_ty
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
tbl_hotel_img.img_name,
tbl_hotel_addr.addr_subdistrict
";
//  AND $fac_txt
 $data_find_hotel = $this->db->query($sql)->result();
}

 $txt_lang_hotel=array();
                    foreach($data_find_hotel as $value_hotel){
                         $ch_num_btw_pr = 0;
                         $numtrue000 = 0;
                         $a_lang=  array();
                         $ar_get_min_pr = $this->get_room_hotel_price_min($value_hotel->hotel_idrun,'THB',$minprice,$maxprice,$dt_st,$dt_en);
                         $ar1=$ar_get_min_pr[0];
                         $ar2=$ar_get_min_pr[1];
                         $ar5=explode(':', $ar_get_min_pr[5]);

                           $check_numqty = $ar5[0];
                         if($check_numqty>0){
                          //echo"<br>".$ar1.":".$ar2;
                          if($ar2>0){$numtrue000=$ar2;}else{$numtrue000=$ar1;}
                          //echo "<br>".$numtrue000.":".$ar2;
                         $ar3=$ar_get_min_pr[2];
                         $ar4=$ar_get_min_pr[3];
                         if($numdate==0){$numdate=1;}
                         if($numtrue000==0){$numtrue000=1;}
                         $ch_num_btw_pr = ($numtrue000/($numdate));
                         if($numtrue000>0){
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
                            $ar4,/*show_n_pri*/
                            $ar5,
                            $value_hotel->addr_subdistrict
                          );
                         array_push($txt_lang_hotel,$a_lang);  
                          } 
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
$ar_price_min =[5];
$sum_qty = 0;
$number_min=99999999999;
         if(count($show_all_price_room)<1){
            $ar_price_min[0]=0;$ar_price_min[1]=0;$ar_price_min[2]="";$ar_price_min[3]=0;$ar_price_min[4]=0;$ar_price_min[5]=0;
           }
 //echo "<hr>";
       foreach($show_all_price_room as $value_all_data){
        $cry = $value_all_data[4];
        $hotel_ar_id = $value_all_data[1];
        $room_ar_id = $value_all_data[0];
       
          
  $roo_quota = $this->get_room_quato($room_ar_id,$dt_st,$dt_en);
  //echo "= H".$hotel_ar_id."= R".$room_ar_id."<br>";
  $sum_qty = ($sum_qty + $roo_quota);
        $sum_price = 0;
        $sum_def_price = 0;
        $txt_list_head="";
        $txt_list_price="";
        $ij=0;$jk=0;$trd="";
        $show_n_pri=0;
        $price_dis =0;

        foreach ($value_all_data[3] as  $valuedef){

      $room_sub_id = $value_all_data[0];

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
            $ar_price_min[4]=$room_ar_id;
            $ar_price_min[5] = $sum_qty.":".$hotel_ar_id;
            $number_min = $sum_price;

          }
// echo $number_min."<br>";
    }
       // echo $number_min."<br>";
        //echo print_r($ar_price_min);
        //echo $ar_price_min[5]."<br>";
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