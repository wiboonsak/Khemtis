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

function get_customer_hotel($id_bookin){
  $query = $this->db->query("SELECT * FROM tbl_pre_booking WHERE pre_booking_id = $id_bookin");
  $row = $query->row();
  return $row;
}




function get_service_comm($ty,$clid){
 if($ty=='HOTEL'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='HOTEL' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else if($ty=='TRANSPORT'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='TRANSPORT' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else if($ty=='PACKAGE'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='PACKAGE' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else if($ty=='RESTAURANT'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='RESTAURANT' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else{
      return 0;
 }
}


function get_book_hotel_detail($utoid_book,$ty){
  $sql = "SELECT 
  tbl_pre_booking.booking_number,
  tbl_pre_booking.str_st,
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
 (tbl_pre_booking_room_detail.total_extra_bed) as ext_qty,
 tbl_gp_booking.add_date,
 sum(tbl_pre_booking.total_comm)  as total_comm_sum
FROM `tbl_pre_booking_room_detail`
    JOIN  tbl_rooms ON tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
    JOIN tbl_pre_booking ON (tbl_pre_booking.pre_booking_id = tbl_pre_booking_room_detail.pre_booking_id)
    JOIN tbl_gp_booking_detail ON tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id
    JOIN tbl_gp_booking ON tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
   WHERE tbl_pre_booking_room_detail.pre_booking_id=$utoid_book
   GROUP BY
    tbl_pre_booking.date_in,
 tbl_pre_booking.date_out,
 tbl_pre_booking.adults,
 tbl_pre_booking.child,
  tbl_pre_booking_room_detail.pre_booking_id,
  tbl_pre_booking_room_detail.room_id,
  tbl_rooms.room_title,
  tbl_pre_booking.num_day,
  tbl_gp_booking.add_date";

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

$sql = "SELECT  `hotel_id`, `season_nm`, 
      GROUP_CONCAT(CONCAT(`start_day`,'-', `start_month`) order by start_month desc) as d1, 
      GROUP_CONCAT(CONCAT(`end_day`,'-', `end_month`) order by end_month desc) as d2,
      GROUP_CONCAT(season_id) as d3
      FROM tbl_season_period 
    
      WHERE hotel_id=$hotel_id
    GROUP BY  `hotel_id`, `season_nm`
    ORDER BY tbl_season_period.season_id ASC";
/*
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

*/
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

function del_tbl_season_period($hotel_id,$all_sessid){
$ardel =  explode(",",$all_sessid);
for($i=0;$i<count($ardel);$i++){
$season_id = $ardel[$i];
  $this->db->where('season_id', $season_id);
  $this->db->where('hotel_id', $hotel_id);
if($this->db->delete('tbl_season_period')){
     $this->db->where('season_id', $season_id);
     if($this->db->delete('tbl_room_season_price')){

     }
  }
}
return 1;

}

function delete_room_data($room_id){
//*****************************************************************
$this->db->where('room_id', $room_id);
if($this->db->delete('tbl_rooms')){
  return 1;
}
return 0;


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


function chnamedis($namedata){
$query = $this->db->query("SELECT count(hotel_id) FROM tbl_season_period  WHERE season_nm ='$namedata'");
$row = $query->row();
if (isset($row))
{
  return $row->max_num;
}
  return 1;
}    

function btween($val_hotel_id,$d1,$d2){


$max_id = 0;
//$d1 = '02-12';
//$d2 = '02-30';
$y =  date("Y");
$now = strtotime($y."-".$d1);
$your_date = strtotime($y."-".$d2);
$datediff =  $your_date-$now;
$numday =  round($datediff / (60 * 60 * 24));

for($i=0;$i<=$numday;$i++){
$date = date_create($y."-".$d1);
date_add($date, date_interval_create_from_date_string($i.' days'));
$youdate =  date_format($date, 'Y-m-d');

$sql = "SELECT count(*) as max_num FROM tbl_season_period 
WHERE '$youdate' BETWEEN CONCAT(YEAR(CURDATE()),'-',start_month,'-',start_day) 
AND CONCAT(YEAR(CURDATE()),'-',end_month,'-',end_day)
AND hotel_id = $val_hotel_id";
$query = $this->db->query($sql);
$row = $query->row();

if(isset($row))
{
  $max_id = $max_id +($row->max_num);
 }
}



  return $max_id;
 }    



function chyear_over($allData=NULL){

$md1=$allData["p_st_mon"];$d1 = $allData["p_st_day"];
$md2=$allData["p_en_mon"];$d2 = $allData["p_en_day"];
$news_d1 = "";
$newe_d1 = "";

$news_d2 = "";
$newe_d2 = "";
$stadd = 2;
  $y=date("Y");
    $m1= ($md1);
    $m2= ($md2);
  $mc1 = $md1;
  $mc2 = $md2;
    if($m1>$m2){
  $stadd = 1;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.'12'.'-'.'31';
   $news_d2 = $y.'-'.'01'.'-'.'01';
   $newe_d2 = $y.'-'.$mc2.'-'.$d2;

  }else{
    if($m1==$m2){
  if($d1 >$d2){
   $stadd = 1;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.'12'.'-'.'31';
   $news_d2 = $y.'-'.'01'.'-'.'01';
   $newe_d2 = $y.'-'.$mc2.'-'.$d2;
  }else{
   $stadd = 2;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.$mc2.'-'.$d2;
  }
    }else{
    $stadd = 2;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.$mc2.'-'.$d2;
   }
  }

  $news_d1 = date("Y-m-d", strtotime($news_d1));
  $newe_d1 = date("Y-m-d", strtotime($newe_d1));
if($stadd==1){
  $news_d2 = date("Y-m-d", strtotime($news_d2));
  $newe_d2 = date("Y-m-d", strtotime($newe_d2));
  }
  return array ($news_d1,$newe_d1,$news_d2,$newe_d2,$stadd);
}    

function get_id_pre($h,$s){
  $sql = "SELECT season_id FROM tbl_season_period WHERE hotel_id=$h AND season_nm='$s'";
   return $this->db->query($sql)->result();
}


function add_update_season($allData=NULL){
$stchang1 = 0;
$stchang2 = 0;
$md1=$allData["p_st_mon"];$d1 = $allData["p_st_day"];
$md2=$allData["p_en_mon"];$d2 = $allData["p_en_day"];
$old_sts = $allData["old_sts"];
$old_mos = $allData["old_mos"];
$old_ste = $allData["old_ste"];
$old_moe = $allData["old_moe"];

$chd1 = $md1."-".$d1;
$chd2 = $md2."-".$d2;
$ochd1= $old_mos."-".$old_sts;
$ochd2= $old_moe."-".$old_ste;
if(trim($chd1)!=trim($ochd1)){$stchang1=1;}
if(trim($chd2)!=trim($ochd2)){$stchang2=1;}
//return $stchang1.":".$stchang2;


  if($stchang1==1 || $stchang2==1){
    $ch_btween = $this->btween($allData["val_hotel_id"],$chd1,$chd2);
    if($ch_btween>0){return 9;}
  }



   $command = $allData["command_typ"];
   list ($news_d1, $newe_d1, $news_d2,$newe_d2,$stadd)  =  $this->chyear_over($allData);  
   //$idup = $this->chnamedis($allData["idup"]);
  
  if($command=="UP"){
     $resultData=0;
    /*
    if($stadd==1){
     $variable = $this->get_id_pre($allData["val_hotel_id"],$allData["name_season_edit"]);
     $i=0;
     foreach ($variable as $value) {$i++;
        $ar_dds1 =  explode("-",$news_d1);
        $ar_dde1 =  explode("-",$newe_d1);

        $ar_dds2 =  explode("-",$news_d2);
        $ar_dde2 =  explode("-",$newe_d2);

        $start_day = "";
        $start_month = "";
        $end_day = "";
        $end_month = "";

             if($i==1){$start_day=$ar_dds1[2];$start_month=$ar_dds1[1];$end_day=$ar_dde1[2];$end_month=$ar_dde1[1];}
             if($i==2){$start_day=$ar_dds2[2];$start_month=$ar_dds2[1];$end_day=$ar_dde2[2];$end_month=$ar_dde2[1];}

             $season_id = $value->season_id;
             $data = array(
             "season_nm" => $allData["name_season"],
             "start_day" => $start_day,
             "start_month" => $start_month,
             "end_day" =>$end_day,
             "end_month" =>$end_month,
               );         
               $this->db->where('season_id',$season_id);
               if($this->db->update('tbl_season_period', $data)){
                     $resultData=1;
               }else{$resultData=0;}
      }
    }else{

     $variable = $this->get_id_pre($allData["val_hotel_id"],$allData["name_season_edit"]);
     $i=0;
     foreach ($variable as $value) {$i++;
        $ar_dds1 =  explode("-",$news_d1);
        $ar_dde1 =  explode("-",$newe_d1);

             $start_day=$ar_dds1[2];$start_month=$ar_dds1[1];$end_day=$ar_dde1[2];$end_month=$ar_dde1[1];

             $season_id = $value->season_id;
             $data = array(
             "season_nm" => $allData["name_season"],
             "start_day" => $start_day,
             "start_month" => $start_month,
             "end_day" =>$end_day,
             "end_month" =>$end_month,
               );         
               $this->db->where('season_id',$season_id);
               if($this->db->update('tbl_season_period', $data)){
                     $resultData=1;
               }else{$resultData=0;}
         }
    }
*/
    }else{


 if($stadd==1){
     $i=0;
     for ($i=1;$i<=2;$i++) {
        $ar_dds1 =  explode("-",$news_d1);
        $ar_dde1 =  explode("-",$newe_d1);

        $ar_dds2 =  explode("-",$news_d2);
        $ar_dde2 =  explode("-",$newe_d2);

        $start_day = "";
        $start_month = "";
        $end_day = "";
        $end_month = "";

             if($i==1){$start_day=$ar_dds1[2];$start_month=$ar_dds1[1];$end_day=$ar_dde1[2];$end_month=$ar_dde1[1];}
             if($i==2){$start_day=$ar_dds2[2];$start_month=$ar_dds2[1];$end_day=$ar_dde2[2];$end_month=$ar_dde2[1];}
           
    $d1 = $start_month."-".$start_day;
    $d2 = $end_month."-".$end_day;
    $ch_btween = $this->btween($allData["val_hotel_id"],$d1,$d2);
    if($ch_btween>0){return 9;}

             $data = array(
             "hotel_id" =>$allData["val_hotel_id"],
             "season_nm" => $allData["name_season"],
             "start_day" => $start_day,
             "start_month" => $start_month,
             "end_day" =>$end_day,
             "end_month" =>$end_month,
               );         
                if($this->db->insert('tbl_season_period', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
      }
    }else{

        $ar_dds1 =  explode("-",$news_d1);
        $ar_dde1 =  explode("-",$newe_d1);

             $start_day=$ar_dds1[2];$start_month=$ar_dds1[1];$end_day=$ar_dde1[2];$end_month=$ar_dde1[1];

    $d1 = $start_month."-".$start_day;
    $d2 = $end_month."-".$end_day;
    $ch_btween = $this->btween($allData["val_hotel_id"],$d1,$d2);
    if($ch_btween>0){return 9;}

             $data = array(
             "hotel_id" =>$allData["val_hotel_id"],
             "season_nm" => $allData["name_season"],
             "start_day" => $start_day,
             "start_month" => $start_month,
             "end_day" =>$end_day,
             "end_month" =>$end_month,
               );         
                if($this->db->insert('tbl_season_period', $data)){ 
                     $resultData=1;
               }else{$resultData=0;}
         
    }

















/*
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
*/
   





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




function Add_up_cry_season($elm,$room_id,$season_id,$ids){
$date_document=date("Y-m-d");
$results_lang = $this->get_crcy_code("CRCY_CODE");

$ars = explode(",",$elm["idrun_s".$ids]);

for($j=0;$j<count($ars);$j++){
  $season_id = $ars[$j];
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
     $sql="SELECT  `hotel_id`, `season_nm`, 
      GROUP_CONCAT(CONCAT(`start_day`,'-', `start_month`,'-<font color=#cccccc>0000</font>') order by start_month desc) as d1, 
      GROUP_CONCAT(CONCAT(`end_day`,'-', `end_month`,'-<font color=#cccccc>0000</font>') order by end_month desc) as d2,
      GROUP_CONCAT(season_id) as d3
      FROM tbl_season_period WHERE hotel_id=$hotel_id
    GROUP BY  `hotel_id`, `season_nm`
    ORDER BY GROUP_CONCAT(CONCAT(`start_month`)) ASC
    ";
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

function  edit_roomlist($idrun,$room_name,$quata,$extabed,$npub,$nboo,$nfb){

  $tr1 = "N";
  $tr2 = "N";
  $tr3 = "N";
  
  if($npub==1){$tr1="Y";}else{$tr1="N";}
  if($nboo==1){$tr2="Y";}else{$tr2="N";}
  if($nfb==1){$tr3="Y";}else{$tr3="N";}
             $data = array(
             "room_title" => $room_name,
             "default_quota" => $quata,
             "max_extra_bed" => $extabed,
             "published_status" => $tr1,
             "booking_status" => $tr2,
             "free_breakfast" => $tr3,
               );         
               $this->db->where('room_id',$idrun);
               if($this->db->update('tbl_rooms', $data)){
                     return 1;
               }
               require 0;
}


function get_booking_list($idclient,$filter){
  $txt_filter = "";
  if($filter!="all"){
     $txt_filter = "AND tbl_pre_booking.str_st = $filter";
  }
  //echo "ssssssss".$txt_filter;
$sql_detail = "SELECT 
tbl_gp_booking.add_date,
tbl_pre_booking.booking_number,
tbl_pre_booking.pre_booking_id,
sum(tbl_pre_booking_room_detail.total_price) as sum_price,
tbl_pre_booking.total_comm,
tbl_pre_booking.cus_first_name,
tbl_pre_booking.cus_last_name,
tbl_pre_booking.cus_phone,
tbl_pre_booking.cus_email,
tbl_pre_booking.cus_addr,
tbl_pre_booking.str_st,
tbl_hotels.comm_price
FROM tbl_pre_booking
JOIN tbl_pre_booking_room_detail on tbl_pre_booking_room_detail.pre_booking_id = tbl_pre_booking.pre_booking_id
JOIN tbl_rooms on tbl_rooms.room_id = tbl_pre_booking_room_detail.room_id
JOIN tbl_hotels on tbl_hotels.hotel_id = tbl_rooms.hotel_id
JOIN tbl_gp_booking_detail on tbl_gp_booking_detail.id_booking = tbl_pre_booking_room_detail.id AND tbl_gp_booking_detail.book_type = 'HT'
JOIN tbl_gp_booking on tbl_gp_booking.id_run = tbl_gp_booking_detail.id_gp_booking
WHERE tbl_hotels.client_id = $idclient 
$txt_filter
GROUP BY
tbl_gp_booking.add_date,
tbl_pre_booking.booking_number,
tbl_pre_booking.pre_booking_id,
tbl_pre_booking.total_comm,
tbl_pre_booking.cus_first_name,
tbl_pre_booking.cus_last_name,
tbl_pre_booking.cus_phone,
tbl_pre_booking.cus_email,
tbl_pre_booking.cus_addr,
tbl_pre_booking.str_st,
tbl_hotels.comm_price
ORDER BY tbl_pre_booking.pre_booking_id DESC
";
    return $this->db->query($sql_detail)->result();
}



function get_room_list_list($idclient){
$sql = "SELECT  hotel_id FROM  tbl_hotels 
    where client_id=$idclient";
   $query = $this->db->query($sql);
   $row = $query->row();
   if(isset($row)){
        $hotel_id = $row->hotel_id;
$sql_detail = "SELECT *,
  IF(tbl_rooms.published_status='Y', 'Yes', 'No') AS v_published_status,
  IF(tbl_rooms.booking_status='Y', 'Yes', 'No') AS v_booking_status,
  IF(tbl_rooms.free_breakfast='Y', 'Yes', 'No') AS v_free_breakfast,
  (tbl_rooms.hotel_id) as hotel_idrun ,(tbl_rooms.room_id) as room_idrun 
  FROM  tbl_rooms
  LEFT JOIN tbl_room_details on tbl_room_details.room_id = tbl_rooms.room_id
   AND tbl_room_details.lang = 'en'
   AND tbl_rooms.published_status = 'Y' 
  where tbl_rooms.hotel_id= $hotel_id  ORDER BY tbl_room_details.lang ASC";
    return $this->db->query($sql_detail)->result();
  }
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
   WHERE tbl_field_values.fld_nm='$st_pr' AND tbl_field_values.fld_valu='THB' ORDER BY tbl_field_values.fld_valu DESC";
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