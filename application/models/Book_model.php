<?php
class Book_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }





function  data_insert_user_id_code($idgp,$sum_dis,$code_dec,$hotel_id){
              $data = array(
              "hotel_code" =>$code_dec."<-->".$hotel_id,
              "hotel_dis" =>$sum_dis,
              );
               $this->db->where('id_run',$idgp);
               if($this->db->update('tbl_gp_booking', $data)){
                 return 1;
               }
                 return 0;
}



function check_promotion_code($hotel_id,$code_dec){
$date = date("Y-m-d");
   $sql="SELECT * FROM tbl_promotion_code WHERE code_dec='$code_dec' AND hotel_id=$hotel_id
   AND '$date' BETWEEN st_date AND en_date";
   $query = $this->db->query($sql);
   $row = $query->row();
   if (isset($row)){

    $num = $this->check_use_promo_limit($hotel_id,$code_dec);
   // return  $num.":".$row->user_limit;
    if($num>=$row->user_limit){
       return 'none';
    }else{
       return "code<::>".$row->code_dec.",num_per<::>".$row->num_per_price.",limit_price<::>".$row->limit_price;
    }
         
   }else{
       return 'none';
   }
}







function check_use_promo_limit($hotel_id,$code_dec){
  $hot_code = $code_dec."<-->".$hotel_id;
  $query = $this->db->query("SELECT count(*) as chnum FROM `tbl_gp_booking` WHERE hotel_code ='$hot_code'");
$row = $query->row();
if (isset($row)){
        return $row->chnum;
 }
}



function up_temp_numhotel($sumtotal,$utoid_book,$ty){ 
  $ch_id  = $this->ch_tmp($utoid_book,$ty);
   if($ch_id>0){
              $data1 = array(
             "numtxt" =>$sumtotal,
              );
                   $this->db->where("idcon",$utoid_book);
                   $this->db->where("ms",$ty);
                if($this->db->update('new_temp_add', $data1)){ 
                   return 1;
               }return 0;
   }else{
   $data = array(
             "ms" =>$ty,
             "idcon" =>$utoid_book,
             "numtxt" =>$sumtotal,
              );
                if($this->db->insert('new_temp_add', $data)){ 
                   return 1;
                }return 0;
   }
}


function get_cmp($utoid_book,$ty){
  $query = $this->db->query("SELECT numtxt as chnum FROM `new_temp_add` WHERE idcon =$utoid_book AND ms='$ty'");
$row = $query->row();
if (isset($row)){
        return $row->chnum;
 }
}



function ch_tmp($utoid_book,$ty){
$query = $this->db->query("SELECT count(idm) as chnum FROM `new_temp_add` WHERE idcon =$utoid_book AND ms='$ty'");
$row = $query->row();
if (isset($row)){
        return $row->chnum;
 }
}


function check_fbid($fid){
$query = $this->db->query("SELECT (id) as cus_res FROM `tbl_customers` WHERE facebook_id ='$fid'");
$row = $query->row();
if (isset($row)){
        return $row->cus_res;
 }
}

function chk_member_ty($id){
$query = $this->db->query("SELECT (id) as cus_id FROM `tbl_customers` WHERE id ='$id'");
$row = $query->row();
if (isset($row)){
        return $row->cus_id;
 }
}



function chk_facb_ty($id){
$query = $this->db->query("SELECT (id) as cus_id FROM `tbl_customers` WHERE facebook_id ='$id'");
$row = $query->row();
if (isset($row)){
        return $row->cus_id;
 }else{
        return 0;
 }
}

function add_cus_face($fid,$name,$last,$email){
  $h_lg = $this->session->userdata('ch_lang');
  $data = array(
             "first_name" =>$name,
             "last_name" =>$last,
             "cus_email" =>$email,
             "default_lang" =>$h_lg,
             "default_crcy_code"=>'THB',
              "facebook_id"=>$fid,
              );
                if($this->db->insert('tbl_customers', $data)){ 
                  return $this->db->insert_id();
                }return 0;
}


function upfacebook_data($fid,$fir_name,$last_name,$email){
   $ch_id  = $this->check_fbid($fid);
   if($ch_id>0){
              $data1 = array(
             "first_name" =>$fir_name,
             "last_name" =>$last_name,
             "cus_email" =>$email,
             "default_lang" =>'en',
             "default_crcy_code"=>'THB',
              );
                   $this->db->where("facebook_id",$fid);
                if($this->db->update('tbl_customers', $data1)){ 
                   return 1;
               }return 0;
   }else{
   $data = array(
             "first_name" =>$fir_name,
             "last_name" =>$last_name,
             "cus_email" =>$email,
             "default_lang" =>'en',
             "default_crcy_code"=>'THB',
              "facebook_id"=>$fid,
              );
                if($this->db->insert('tbl_customers', $data)){ 
                   return 0;
                }return 0;
   }
}


function update_book_hotel(
               $sec_book_id,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member,
               $hotel_sum_price){
  $client_id = $this->get_client_id($sec_book_id,'HOTEL');  
  $com_price = $this->get_com_price($client_id,'HOTEL');  
$sec_book_id = $this->get_gp_id($sec_book_id);
$total_comm =  ($hotel_sum_price * $com_price)/100;
/*
echo            "cus_first_name=".$cus_first_name.'<br>'.
              "cus_last_name=".$cus_last_name.'<br>'.
              "cus_emailj=".$cus_email.'<br>'.
              "cus_phone=".$cus_number.'<br>'.
              "cus_addr=".$cus_address.'<br>'.
              "net_price=".$hotel_sum_price.'<br>'.
              "com_price=".$com_price.'<br>'.
              "total_comm=".$total_comm;
*/
              $data = array(
              "cus_first_name" =>$cus_first_name,
              "cus_last_name" =>$cus_last_name,
              "cus_email" =>$cus_email,
              "cus_phone" =>$cus_number,
              "cus_addr" =>$cus_address,
              "str_st" =>0,
              "net_price" =>$hotel_sum_price,
              "com_price" =>$com_price,
              "total_comm" =>$total_comm,
              );
               $this->db->where('pre_booking_id',$sec_book_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
                 return 0;
}




function update_book_trans(
               $sec_book_id,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member){
  $st = 0;$i=0;
  $idc =0;
  $client_id = $this->get_client_id($sec_book_id,'TRANSPORT');  
  $ar_idc = explode(",",$client_id);
  $data = array(
              "cust_name" =>$cus_first_name,
              "cust_lastname" =>$cus_last_name,
              "cust_email" =>$cus_email,
              "cust_telephone_num" =>$cus_number,
              "cust_line" =>$cus_address,
              "booking_status" =>'N',
              );
               $this->db->where('id',$sec_book_id);
 if($this->db->update('tbl_pre_transport_booking_title', $data)){
   $st = 1;
  for($i=0;$i<count($ar_idc);$i++){
   $ar_com2 = $ar_idc[$i];
   $ar_com3 = explode(":",$ar_com2);
   $com_price = $this->get_com_price($ar_com3[0],'TRANSPORT');  
   $idrun = $ar_com3[1];
   $hotel_sum_price = $ar_com3[2];
   $total_comm =  ($hotel_sum_price * $com_price)/100;
   $data = array(
              "com_price" =>$com_price,
              "total_comm" =>$total_comm,
              );
               $this->db->where('id',$idrun);
               if($this->db->update('tbl_pre_transport_booking_detail', $data)){
                 $st = 1;
        }               
     }
  }         
               return $st;
}




function get_st_book($sqldata){
  $this->db->query($sqldata);
}


function update_book_pack(
               $sec_book_id,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member){
  $client_id = $this->get_client_id($sec_book_id,'PACKAGE');  
  $com_price = $this->get_com_price($client_id,'PACKAGE');  

  $sqldata = "UPDATE tbl_package_pre_booking 
SET 
customer_name = '$cus_first_name',
customer_Lastname = '$cus_last_name',
customer_email = '$cus_email',
customer_telephone = '$cus_number',
cus_address = '$cus_address',
booking_status = 'N',
com_price = $com_price,
total_comm = (total_price * $com_price)/100
WHERE id = $sec_book_id";
  if($this->db->query($sqldata)){
    return 1;
  }else{
    return 0;
  }

}


function update_book_res(
               $sec_book_id,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member){
  $client_id = $this->get_client_id($sec_book_id,'RESTAURANT');  
  $com_price = $this->get_com_price($client_id,'RESTAURANT');  

  $sqldata = "UPDATE tbl_res_pre_booking 
SET 
customer_name = '$cus_first_name',
customer_Lastname = '$cus_last_name',
customer_email = '$cus_email',
customer_telephone = '$cus_number',
cus_address = '$cus_address',
booking_status = 'N',
com_price = $com_price,
total_comm = (total_price * $com_price)/100
WHERE id = $sec_book_id";
  if($this->db->query($sqldata)){
    return 1;
  }else{
    return 0;
  }
/*
              $data = array(
              "customer_name" =>$cus_first_name,
              "customer_Lastname" =>$cus_last_name,
              "customer_email" =>$cus_email,
              "customer_telephone" =>$cus_number,
              "cus_address" =>$cus_address,
              "booking_status" =>'N',
              "com_price"=>$com_price,
              );
               $this->db->where('id',$sec_book_id);
               if($this->db->update('tbl_res_pre_booking', $data)){
                 return 1;
               }
               return 0;
*/
}




function get_client_id($sec_book_id,$typ_b){
if($typ_b=="HOTEL"){
   $query = "SELECT  (tbl_hotels.client_id) as idc  FROM `tbl_pre_booking` 
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_rooms on tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id 
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id
WHERE  tbl_gp_booking_detail.id_gp_booking = $sec_book_id
GROUP BY 
tbl_hotels.client_id";
}else if($typ_b=="PACKAGE"){
   $query = "SELECT (tbl_packages.client_id) as idc  FROM tbl_package_pre_booking
JOIN  tbl_packages on tbl_packages.package_id = tbl_package_pre_booking.package_id
WHERE  tbl_package_pre_booking.id =$sec_book_id";
}else if($typ_b=="TRANSPORT"){
   $query = "SELECT  GROUP_CONCAT(CONCAT(tbl_transport_route_data.client_id,':',tbl_pre_transport_booking_detail.id,':',tbl_pre_transport_booking_detail.total_price)) as idc  FROM `tbl_pre_transport_booking_detail`
     JOIN tbl_transport_route_timeTable ON tbl_transport_route_timeTable.id = tbl_pre_transport_booking_detail.time_id
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     JOIN tbl_transport_route_data ON  tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id
     JOIN tbl_pre_transport_booking_title ON tbl_pre_transport_booking_title.id = tbl_pre_transport_booking_detail.booking_id
   WHERE tbl_pre_transport_booking_title.id = $sec_book_id";
}else if($typ_b=="RESTAURANT"){
   $query = "SELECT (tbl_resturant_detail.client_id) as idc  FROM tbl_res_pre_booking
JOIN  tbl_resturant_detail on tbl_resturant_detail.res_id = tbl_res_pre_booking.res_id AND tbl_resturant_detail.lang = 'en'
WHERE  tbl_res_pre_booking.id = $sec_book_id";
}
$queryup = $this->db->query($query);
$row = $queryup->row();
  if(isset($row)){
        return $row->idc;
  }else{
        return 0;
  }
}




function get_book_id($sec_book_id,$typ_b){
if($typ_b=="PACKAGE"){
   $query = "SELECT (tbl_package_pre_booking.id) as book_id  FROM tbl_package_pre_booking
WHERE  tbl_package_pre_booking.id_gp = $sec_book_id";
}else if($typ_b=="TRANSPORT"){
   $query = "SELECT  tbl_pre_transport_booking_title.id as book_id  FROM `tbl_pre_transport_booking_detail`
     JOIN tbl_transport_route_timeTable ON tbl_transport_route_timeTable.id = tbl_pre_transport_booking_detail.time_id
     JOIN tbl_gp_booking_detail ON (tbl_gp_booking_detail.id_booking = tbl_pre_transport_booking_detail.id AND tbl_gp_booking_detail.book_type = 'TS')
     JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
     JOIN tbl_transport_route_data ON  tbl_transport_route_data.route_id = tbl_pre_transport_booking_detail.route_id
     JOIN tbl_pre_transport_booking_title ON tbl_pre_transport_booking_title.id = tbl_pre_transport_booking_detail.booking_id
   WHERE tbl_gp_booking_detail.id_gp_booking =$sec_book_id
   GROUP BY
   tbl_pre_transport_booking_title.id";
}else if($typ_b=="RESTAURANT"){
   $query = "SELECT (tbl_res_pre_booking.id) as book_id  FROM tbl_res_pre_booking
WHERE  tbl_res_pre_booking.id_gp = $sec_book_id";
}

$queryup = $this->db->query($query);
$row = $queryup->row();
  if(isset($row)){
        return $row->book_id;
  }else{
        return 0;
  }
}


function get_com_price($client_id,$typ_b){
$query = $this->db->query("SELECT comm_price FROM tbl_comprice WHERE typ='$typ_b' AND client_id=$client_id");
$row = $query->row();
  if(isset($row)){
        return $row->comm_price;
  }else{
        return 0;
  }
}



function up_st_gm($id_gp,$ty){
 $data = array(
             "st_book" =>$ty,
              );
               $this->db->where('id_run',$id_gp);
               if($this->db->update('tbl_gp_booking', $data)){
                 return 1;
               }
               return 0;
}




function up_st_pay($idbook,$idget_member007){
  if($idget_member007==""){$idget_member007=0;}

                $sec_book_id = $this->get_gp_id($idbook);
                $data = array(
             "str_st" =>1,
             "cus_id"=>$idget_member007,
              );
               $this->db->where('pre_booking_id',$sec_book_id);
               if($this->db->update('tbl_pre_booking', $data)){
                 return 1;
               }
               return 0;
}




function member_review_data($hotel_id){
 $sql = "SELECT 
tbl_pre_booking.cus_first_name,
tbl_pre_booking.cus_last_name,
tbl_pre_booking.num_day,
tbl_pre_booking.date_in,
tbl_pre_booking.date_out,
tbl_review.review_title,
tbl_review.review_detail,
tbl_review.proof_cd,
(cleanliness_re+comfort_re+meal_re+location_re+service_re) as num_re,
add_date
FROM tbl_review 
JOIN tbl_pre_booking ON tbl_pre_booking.pre_booking_id = tbl_review.pre_booking_id
WHERE hotel_id = $hotel_id AND tbl_review.proof_cd<>0";
 return $this->db->query($sql)->result();
}




function  avg_all_star($hotel_id){
  $sql = "SELECT 
count(`pre_booking_id`) as numc,
(sum(`cleanliness_re`) / count(`pre_booking_id`)/4) as num_re1,
(sum(`comfort_re`)  / count(`pre_booking_id`)/4) as num_re2,
(sum(`meal_re`) / count(`pre_booking_id`)/4) as num_re3,
(sum(`location_re`) / count(`pre_booking_id`)/4) as num_re4,
(sum(`service_re`) / count(`pre_booking_id`)/4) as num_re5
FROM tbl_review 
WHERE hotel_id = $hotel_id ";
return $this->db->query($sql)->result();
}


function  avg_all($hotel_id){
  $sql = "SELECT 
count(`pre_booking_id`) as numc,
(sum(`fantastic_re`) / count(`pre_booking_id`)) as num_re1,
(sum(`verygood_re`)  / count(`pre_booking_id`)) as num_re2,
(sum(`satisfying_re`) / count(`pre_booking_id`)) as num_re3,
(sum(`average_re`) / count(`pre_booking_id`)) as num_re4,
(sum(`poor_re`) / count(`pre_booking_id`)) as num_re5
FROM tbl_review 
WHERE hotel_id = $hotel_id ";
return $this->db->query($sql)->result();
}



function check_review_data($pre_booking_id){
 $sql = "SELECT 
`review_title`,
`review_detail`,
(cleanliness_re+comfort_re+meal_re+location_re+service_re) as num_re
FROM tbl_review WHERE pre_booking_id = $pre_booking_id";
 return $this->db->query($sql)->result();
}



function save_review_data(
$fantastic_re,
$verygood_re,
$satisfying_re,
$average_re,
$poor_re,
$cleanliness_re,
$comfort_re,
$meal_re,
$location_re,
$service_re,
$review_title,
$review_detail,
$pre_booking_id,
$hotel_id
){
 $date = date("Y-m-d");
 $data = array(
             "pre_booking_id" =>$pre_booking_id,
             "add_date"=>$date,
             "review_title"=>$review_title,
             "review_detail"=>$review_detail,
             "fantastic_re"=>$fantastic_re,
             "verygood_re"=>$verygood_re,
             "satisfying_re"=>$satisfying_re,
             "average_re"=>$average_re,
             "poor_re"=>$poor_re,
             "cleanliness_re"=>$cleanliness_re,
             "comfort_re"=>$comfort_re,
             "meal_re"=>$meal_re,
             "location_re"=>$location_re,
             "service_re"=>$service_re,
             "hotel_id"=>$hotel_id,
              );
                if($this->db->insert('tbl_review', $data)){ 
                   return 1;
                }
                   return 0;
}




function get_price_book($cus_id){
  $h_lg = $this->session->userdata('ch_lang');
  $sql="SELECT 
  tbl_hotels.hotel_id,
tbl_pre_booking.booking_number,
tbl_hotel_img.img_name,
tbl_pre_booking.pre_booking_id,
tbl_hotel_details.hotel_nm,
tbl_pre_booking.date_in,
tbl_pre_booking.date_out,
tbl_pre_booking.num_day
FROM  tbl_pre_booking 
JOIN tbl_pre_booking_room_detail ON tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_room_details   ON  tbl_room_details.room_id = tbl_pre_booking_room_detail.room_id AND tbl_room_details.lang = '$h_lg'
JOIN tbl_rooms ON tbl_rooms.room_id = tbl_room_details.room_id AND tbl_room_details.lang = '$h_lg'
JOIN tbl_hotel_details ON tbl_hotel_details.hotel_id = tbl_rooms.hotel_id AND tbl_hotel_details.lang = '$h_lg'
JOIN tbl_hotels ON tbl_hotels.hotel_id = tbl_hotel_details.hotel_id
JOIN tbl_hotel_img ON tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1
WHERE tbl_pre_booking.str_st = 1
AND tbl_pre_booking.cus_id = $cus_id
GROUP BY
  tbl_hotels.hotel_id,
tbl_pre_booking.booking_number,
tbl_hotel_img.img_name,
tbl_pre_booking.pre_booking_id,
tbl_hotel_details.hotel_nm,
tbl_pre_booking.date_in,
tbl_pre_booking.date_out,
tbl_pre_booking.num_day";
return $this->db->query($sql)->result();
}


function get_price_book_detail($cus_id,$pre_id){
  $h_lg = $this->session->userdata('ch_lang');
$sql = "SELECT 
tbl_rooms.room_id,
tbl_pre_booking.booking_number,
tbl_hotel_img.img_name,
tbl_pre_booking.pre_booking_id,
tbl_hotel_details.hotel_nm,
tbl_room_details.room_fld_nm,
tbl_pre_booking.date_in,
tbl_pre_booking.date_out,
tbl_pre_booking.num_day,
tbl_pre_booking_room_detail.total_extra_bed,
tbl_pre_booking_room_detail.extra_bed_price,
(tbl_pre_booking_room_detail.total_extra_bed * tbl_pre_booking_room_detail.extra_bed_price) as totalextra1,
((tbl_pre_booking_room_detail.total_extra_bed * tbl_pre_booking_room_detail.extra_bed_price) * tbl_pre_booking.num_day) as sumextra,
sum(tbl_pre_booking_room_detail.dscnt_price) as sum_room
FROM  tbl_pre_booking 
JOIN tbl_pre_booking_room_detail ON tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_room_details   ON  tbl_room_details.room_id = tbl_pre_booking_room_detail.room_id AND tbl_room_details.lang = '$h_lg'
JOIN tbl_rooms ON tbl_rooms.room_id = tbl_room_details.room_id AND tbl_room_details.lang = '$h_lg'
JOIN tbl_hotel_details ON tbl_hotel_details.hotel_id = tbl_rooms.hotel_id AND tbl_hotel_details.lang = '$h_lg'
JOIN tbl_hotels ON tbl_hotels.hotel_id = tbl_hotel_details.hotel_id
JOIN tbl_hotel_img ON tbl_hotel_img.hotel_id = tbl_hotels.hotel_id AND tbl_hotel_img.img_main = 1
WHERE tbl_pre_booking.str_st = 1
AND tbl_pre_booking.cus_id = $cus_id
AND tbl_pre_booking.pre_booking_id = $pre_id
GROUP BY
tbl_rooms.room_id,
tbl_pre_booking.booking_number,
tbl_hotel_img.img_name,
tbl_pre_booking.pre_booking_id,
tbl_hotel_details.hotel_nm,
tbl_room_details.room_fld_nm,
tbl_pre_booking.date_in,
tbl_pre_booking.date_out,
tbl_pre_booking.num_day,
tbl_pre_booking_room_detail.total_extra_bed";
return $this->db->query($sql)->result();
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

function tr_get_price($res_id){
  $sql = "SELECT *,
IF(dis_price_adult>0,dis_price_adult,price_adult) as pr_ad,
IF(dis_price_child>0,dis_price_child,price_child) as pr_ch
FROM `tbl_resturant_detail` WHERE 
lang = 'en' and res_id = $res_id";
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
             "str_st" =>0,
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
             "str_st" =>0,
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
             "str_st" =>0,
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




function add_pre_book_res_new($room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr));
 $y = date("Y");
 $m = date("m");
 $d = date("d");
 $id_rn = $y.$m.$d;
 $date = date("Y-m-d");
 $data = array(
             "res_id" =>$package_id,
             "total_customer"=>$total_customer,
             "cf_status"=>0,
             "booking_status"=>4,
             "date_booking"=>$date,
             "date_depart"=>$date_depart,
             "customer_adult"=>$Adults,
             "customer_child"=>$Child,
             "adult_price"=>$ad_pr,
             "child_price"=>$ld_pr,
             "total_price"=>$total_price,
             "room_id"=>$room_id,
             "id_gp"=>$id_gp,
              );
                if($this->db->insert('tbl_res_pre_booking', $data)){ 
                   return $this->db->insert_id();
                }
                   return 0;
}


function up_pre_book_res_new($room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$utoid_book,$date_check){
$date=date_create($date_depart);
$date_depart =  date_format($date,"Y-m-d H:i:s");

$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr));
 $y = date("Y");
 $m = date("m");
 $d = date("d");
 $id_rn = $y.$m.$d;
 $date = date("Y-m-d");
 $data = array(
             "res_id" =>$package_id,
             "total_customer"=>$total_customer,
             "cf_status"=>0,
             "booking_status"=>4,
             "date_booking"=>$date,
             "date_depart"=>$date_depart,
             "customer_adult"=>$Adults,
             "customer_child"=>$Child,
             "adult_price"=>$ad_pr,
             "child_price"=>$ld_pr,
             "total_price"=>$total_price,
             "room_id"=>$room_id,
             "id_gp"=>$id_gp,
              );
             $this->db->where('id',$utoid_book);
             if($this->db->update('tbl_res_pre_booking', $data)){
                 return 1;
             }
                 return 0;
}
 


// insert not hotel

function add_pre_book_package_not($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child + $Single);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr)+($Single*$sg_pr));
$st_ty=0;
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
             "id_gp"=>$id_gp,
             "ty"=>$st_ty,
              );
                if($this->db->insert('tbl_package_pre_booking', $data)){ 
                   return $this->db->insert_id();
                }
                   return 0;   
}


function up_pre_book_package_not($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check,$utoid_book){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child + $Single);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr)+($Single*$sg_pr));
$st_ty = 0;
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
             "id_gp"=>$id_gp,
             "ty"=>$st_ty,
              );
             $this->db->where('id',$utoid_book);
             if($this->db->update('tbl_package_pre_booking', $data)){
                 $this->del_all_pack($id_gp);
                 return 1;
             }
                 return 0;
}
 

//----------------------------------------------------------------------------------------------------------------------------------------------
// insert have hotel


function add_pre_book_package_new($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$utoid_book,$date_check,$ty,$net_price,$ar_pack_service,$ar_pack_extra,$ty_pack){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child + $Single);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr)+($Single*$sg_pr));
$st_ty=0;
if($ty==2){
  $total_price  = $net_price;$st_ty=1;
}
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
             "customer_single"=>0,
             "adult_price"=>0,
             "child_price"=>0,
             "single_price"=>0,
             "total_price"=>$total_price,
             "id_gp"=>$id_gp,
             "ty"=>$ty_pack,
              );
                if($this->db->insert('tbl_package_pre_booking', $data)){ 
                   $idinsert = $this->db->insert_id();
                   $this->del_all_pack($id_gp);
                   $hotel_id = $this->add_service($ar_pack_service,$id_gp);
                    $this->add_extra($ar_pack_extra,$id_gp,$hotel_id);
                   return $idinsert;
                }
                   return 0;
}


 
function up_pre_book_package_new($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$utoid_book,$date_check,$ty,$net_price,$ar_pack_service,$ar_pack_extra,$ty_pack){
$id_gp = $this->session->userdata('sec_gp_book');
$total_customer = ($Adults + $Child + $Single);
$total_price = (($Adults*$ad_pr)+($Child*$ld_pr)+($Single*$sg_pr));
$st_ty = 0;
if($ty==2){
  $total_price  = $net_price;$st_ty=1;
}
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
             "customer_single"=>0,
             "total_price"=>$total_price,
             "id_gp"=>$id_gp,
             "ty"=>$ty_pack,
              );
             $this->db->where('id',$utoid_book);
             if($this->db->update('tbl_package_pre_booking', $data)){
                 $this->del_all_pack($id_gp);
                   $hotel_id = $this->add_service($ar_pack_service,$id_gp);
                    $this->add_extra($ar_pack_extra,$id_gp,$hotel_id);
                 return 1;
             }
                 return 0;
}
 



function add_service($txt,$id_gp){
  $txt_data =  substr($txt,3);
  $ar_1 = explode('[:]', $txt_data);
  for($i=0;$i<count($ar_1);$i++){
      $ar_2 = explode('<:>', $ar_1[$i]);
      $price = $ar_2[0];
      $room_id = $ar_2[1];
      $person = $ar_2[2];
      $room = $ar_2[3];
      $ty = $ar_2[4];
      $net_price = $ar_2[5];
      $sell_price = $ar_2[6];
      $txt_detail_service = $ar_2[7];

      $data = array(
             "room_id" =>$room_id,
             "id_connect"=>$id_gp,
             "ty"=>$ty,
             "person"=>$person,
             "room"=>$room,
             "price"=>$price,
             "net_price"=>$net_price,
             "sell_price"=>$sell_price,
             "txt_detail_service"=>$txt_detail_service,
              );
               if($this->db->insert('tbl_package_pre_hotel_price', $data)){ 
                  
              }
  }






$query = $this->db->query("SELECT hotel_id FROM tbl_rooms WHERE room_id = $room_id");
$row = $query->row();
if (isset($row))
{
    return $row->hotel_id;
}
  return 0;
}



function add_extra($txt,$id_gp,$hotel_id){
  $txt_data =  substr($txt,3);
  $ar_1 = explode('[:]', $txt_data);
  for($i=0;$i<count($ar_1);$i++){
      $ar_2 = explode('<:>', $ar_1[$i]);
      $price = $ar_2[0];
      $idl = $ar_2[1];
      $person = $ar_2[2];
      $net_price = $ar_2[3];
      $sell_price = $ar_2[4];
      $txt_detail_extra = $ar_2[5];

       $data = array(
             "idl"=>$idl,
             "hotel_id" =>$hotel_id,
             "id_connect"=>$id_gp,
             "person"=>$person,
             "price"=>$price,
             "net_price"=>$net_price,
             "sell_price"=>$sell_price,
             "txt_detail_extra"=>$txt_detail_extra,
              );
        
        if($this->db->insert('tbl_package_pre_extra_price', $data)){ 
                
        }
  }
  return 1;
}




function del_all_pack($iddel){

   $this->db->where("id_connect",$iddel);
   if($this->db->delete("tbl_package_pre_hotel_price")){

   $this->db->where("id_connect",$iddel);
   if($this->db->delete("tbl_package_pre_extra_price")){

      return 1;
   }
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
   $this->db->query($sql);
    return 1;
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
             "str_st" =>1,
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


function del_pre_booking_all($iddel,$sec_gp_book,$idgp){
  $this->db->where("pre_booking_id",$iddel);
  if($this->db->delete("tbl_pre_booking")){

     $this->db->where("id_gp_booking",$sec_gp_book);
     $this->db->where("book_type",'HT');

     if($this->db->delete("tbl_gp_booking_detail")){
        $this->up_reset_promo($idgp);
        return $this->del_pre_book_detail_all($iddel);
    }
  }
  return 0;
}



function up_reset_promo($idgp){
  $data = array(
             "hotel_code" =>'',
             "hotel_dis" =>0,
              );
               $this->db->where('id_run',$idgp);
               if($this->db->update('tbl_gp_booking', $data)){
                 return 1;
               }
               return 0;
}





function chk_date_book($book_id,$date_in,$date_out){

  $query = $this->db->query("SELECT count(*) as count_num FROM tbl_pre_booking WHERE pre_booking_id = $book_id AND (date_in ='$date_in' AND date_out='$date_out')");
$row = $query->row();
     if($query->num_rows()==1 && (isset($row))){
           return$query->row()->count_num;
     }else{return 0;}
  return 0;
}

function get_pre_book_detail($pre_booking_id){
  $sql="SELECT * FROM tbl_pre_booking
        JOIN tbl_pre_booking_detail ON tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id";
        return $this->db->query($sql)->result();
}

// End Bookin Zone
function get_room_price_detail($hotel_id,$crcy_code,$dt_st,$dt_en,$lg){
$txt_sql = "";
$show_all_price_room  =array();
$date1=date_create($dt_st);
$date2=date_create($dt_en);
//echo $dt_st;
//echo ":";
//echo $dt_en;
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
tbl_rooms.free_breakfast,
GROUP_CONCAT(distinct tbl_room_img.img_nm) as ar_img,
GROUP_CONCAT(distinct tbl_field_lang_values.fld_valu_desc) as ar_lang,
GROUP_CONCAT(distinct tbl_field_added_values.field1) as ar_added
FROM tbl_rooms
JOIN tbl_room_default_price on  tbl_room_default_price.room_id  = tbl_rooms.room_id
LEFT JOIN tbl_room_img on tbl_room_img.room_id = tbl_rooms.room_id  AND tbl_room_img.img_main=1 
LEFT JOIN tbl_room_features on tbl_room_features.room_id = tbl_rooms.room_id  AND tbl_room_features.room_feature_hilight = 'Y'
LEFT JOIN tbl_field_lang_values on (tbl_field_lang_values.fld_valu = tbl_room_features.room_feature AND tbl_field_lang_values.fld_nm='ROOM_FEATURE' AND tbl_field_lang_values.lang = '$lg')
LEFT JOIN tbl_field_added_values on (tbl_field_added_values.fld_valu = tbl_room_features.room_feature AND tbl_field_added_values.fld_nm='ROOM_FEATURE'  AND tbl_field_added_values.lang='$lg')

WHERE  tbl_rooms.hotel_id = $hotel_id
AND tbl_room_default_price.crcy_code='$crcy_code'
AND tbl_rooms.published_status='Y'
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
tbl_room_default_price.extra_bed_price,
tbl_rooms.free_breakfast";
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
             $value_room->ar_added,
             $value_room->free_breakfast
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
    $st_bf = $value_room[16];

       $default_dscnt_price = $value_room[8];
       $extra_bed_price = $value_room[10];
      // $roo_quota =  $this->get_room_quota($room_id,$get_date);
$sql_1 = "SELECT 
 tbl_room_price.room_id,
 tbl_room_price.crcy_code,
(tbl_room_price.price) as iv_price,
(tbl_room_price.dscnt_price) as iv_dsc,
(tbl_room_price.extra_bed_price) as iv_extra,
(tbl_room_price.txt_detail) as iv_txt_detail ,
(tbl_room_price.price_dt) as iv_txt_price_dt
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
            $value_iv_room->iv_extra,
            $value_iv_room->iv_txt_detail,
            $value_iv_room->iv_txt_price_dt
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
            $iv_dis,
            $value_iv_room->iv_txt_detail,
            $st_bf,
            $value_iv_room->iv_txt_price_dt
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
            0,'',$st_bf,''
        );
         array_push($final_add_rom_price,$ar_sea);  
         $ar_re_room = $final_add_rom_price;
}}else{
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
            0,'',$st_bf,''
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



//$this->sort_data($show_all_price_room);


return $show_all_price_room;
 }


function sort_data($show_all_price_room){

    foreach($show_all_price_room as $value_all_data){
        $sumsub = 0;
        echo $value_all_data[0]."----".$value_all_data[1]."----".$value_all_data[2]."----<br>";
        foreach ($value_all_data[3] as  $valuedef) {
         $sumsub = $sumsub + $valuedef[1];
        }
        echo $sumsub."<BR>";
    }
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



function get_qtr_iv($dte,$get_room){
   $sql = "SELECT remain_room FROM tbl_room_quota  
   WHERE room_id=$get_room AND quota_dt='$dte'";
$room_qty = $this->db->query($sql)->result();
$set_qtr = 0;
foreach ($room_qty as $v_qtr) {
   $set_qtr = $v_qtr->remain_room;
}
return $set_qtr;
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
 //echo "<hr>";
for($k=0;$k<=($cnt_data-1);$k++){
  $txtd = " +".$k." day";
  $txt_nd = date('Y-m-d', strtotime($run_date1.$txtd));
 // echo $txt_nd;
 // echo "[ ";
       $num_bqt = $this->get_room_qty_book($txt_nd,$get_room);
 // echo " ]";
       $num_vqt = $this->get_qtr_iv($txt_nd,$get_room);

  //echo "";
  $numtr = 0;
  if($num_vqt>0){$numtr=($num_vqt);}
  else{$numtr=($num_qty);}

  //echo "=[".$num_vqt."]<br>";
  array_push($armin,($numtr-$num_bqt));
}
//echo "==";
 min($armin);
//echo "<hr>";
//print_r($armin);
return min($armin);

}


function get_room_qty_book($dt,$room_id){
$sql =  "SELECT tbl_pre_booking.str_st,tbl_pre_booking_room_detail.room_id,count(tbl_pre_booking_room_detail.room_id) as count_room 
FROM tbl_pre_booking 
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
WHERE tbl_pre_booking.str_st = 1 
     AND ('$dt' BETWEEN  tbl_pre_booking.date_in 
     AND DATE_ADD(tbl_pre_booking.date_out, INTERVAL -1 DAY)) 
  AND tbl_pre_booking_room_detail.room_id = $room_id 
GROUP BY 
tbl_pre_booking.str_st,tbl_pre_booking_room_detail.room_id";
$query = $this->db->query($sql);
$row = $query->row();
if (isset($row))
{
        return  $row->count_room;
}
        return 0 ;
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

function getgp_booking($idget_member007){
   $query = $this->db->query("SELECT * FROM tbl_gp_booking  WHERE id_member = $idget_member007 ORDER BY id_run DESC");
           return $query;
    
}
function getgp_bookingjoin($idget_member007){
   $query = $this->db->query("SELECT a.*,b.id_booking FROM tbl_gp_booking AS a LEFT JOIN tbl_gp_booking_detail AS b ON a.id_run = b.id_gp_booking WHERE a.id_member = $idget_member007 AND b.book_type = 'HT'");
           return $query;
    
}
function getbooking_room_detail($id){
   $query = $this->db->query("SELECT * FROM tbl_pre_booking_room_detail WHERE id = $id ");
           return $query;
    
}
function ch_date($dt){
  $time = strtotime($dt);
  $newformat = date('d-M-Y',$time);
  return $newformat;
}






}
?>