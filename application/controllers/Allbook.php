<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allbook extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	   public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Page_model");
        $this->load->model("Book_model");
      } 

	function index()
	{
		
	}

    function do_booking_detail_sum(){
            $formdata = $this->input->post('formdata');
            $send_commnd = $this->input->post('send_commnd');
            $get_formdata = array();
           parse_str($formdata, $get_formdata);
              $Result = $this->Book_model->add_pre_book_detail($get_formdata,$send_commnd);
           echo $Result;
        }

function check_payment(){
$book_st = $this->input->post("book_st");
$book_en = $this->input->post("book_en");
$time1 = strtotime($book_st);
$dt_st = date('Y-m-d',$time1);
$time2 = strtotime($book_en);
$dt_en = date('Y-m-d',$time2);


    $utoid_book =$this->session->userdata('sec_gp_book');
    $book_room_detail= $this->Page_model->get_book_hotel_detail($utoid_book,"HT");
    $txt="";$sum_total=0;$list_room=0;$sumtotal = 0;
    $chqty = "No";
    $del_temp="";
    foreach($book_room_detail as $value) {
        $num_day = $value->num_day;
        $pre_booking_id =  $value->pre_booking_id;
        $room_id =  $value->room_id;
        $room_detail = $value->room_title;
        $room_price = $value->new_pr;
        $room_qty = $value->cnt_room;
        $room_total = $value->total_sum;
        $sum_total = $sum_total + $room_total;
        $sum_extra = $value->sum_extra;
        $sumtotal = ($sumtotal + $room_total);
        $ext_qty = $value->ext_qty;
        $roo_quota = $this->Book_model->get_room_quato($room_id,$dt_st,$dt_en);
    if(($roo_quota-$room_qty)<0){
         
  $del_temp=$del_temp.",".$pre_booking_id.":=:".$room_id;
  $txt=$txt.'<tr><td>&nbsp;&nbsp;<p class="glyphicon glyphicon-info-sign" style="color:#fbacac"></p>&nbsp;&nbsp;'.$room_detail.'</td><td style="text-align:center;color:red">&nbsp;&nbsp;'.number_format($roo_quota).'</td><td style="text-align:center">&nbsp;&nbsp;'.number_format($room_qty).'</td></tr>';
/*
  "<tr style='background-color:#ffe4e4;border-width:1px;'><td>
  <table style='width:300px;'><tr><td style='text-align:left' colspan=2><b>".$room_detail."</b></td></tr>
  <tr><td>Qty Book</td><td style='text-align:right'>".number_format(($roo_quota))."</td></tr>
  <tr><td>Qty Room</td><td style='text-align:right'>".number_format($room_qty)."</td></tr>
  <tr><td>Room Price</td><td style='text-align:right'>".number_format($room_price,2)."</td></tr>
  <tr><td>Bed Extra</td><td style='text-align:right'>".number_format($sum_extra,2)."</td></tr>
  <tr><td><b>Total</b></td><td style='text-align:right'>".number_format($room_total,2)."</td><tr></table>
  </td></tr>";
  */
  $chqty = "<table class='table table-bordered'><tr style='background-color:#f7f7f7'><td>Room detail</td><td  style='text-align:center'>Balance</td><td style='text-align:center'>Book</td></tr>".$txt."</table>
  <script>
    $('#del_temp').val('".substr($del_temp,1)."');
  </script>
  ";
         }
      }
      echo $chqty;

    }

    
  function del_hotel_list_temp(){
     $del_temp = $this->input->post('del_temp');
     $del_temp = explode(",",$del_temp);
     for($i=0;$i<(count($del_temp));$i++){
        $pid = explode(":=:",$del_temp[$i]);
        $pdel_id = $pid[0];
        $rdel_id = $pid[1]; 

        $chk = $this->Page_model->del_hotel_list($pdel_id,$rdel_id);
        
     }
    echo 1;

  }


   function del_hotel_list(){

    $pdel_id = $this->input->post('pdel_id');
    $rdel_id = $this->input->post('rdel_id');
    $chk = $this->Page_model->del_hotel_list($pdel_id,$rdel_id);
                  $data = array('sec_url_cur' =>'',);
                  $this->session->set_userdata($data);
    echo $chk;
   }

   function del_trans_list(){
    $iddel = $this->input->post('iddel');
    $chk = $this->Page_model->del_trans_list($iddel);
    echo $chk;
   }

   function del_pack_list(){
    $iddel = $this->input->post('iddel');
    $chk = $this->Page_model->del_pack_list($iddel);
    echo $chk;
   }

   function del_res_list(){
    $iddel = $this->input->post('iddel');
    $chk = $this->Page_model->del_res_list($iddel);
    echo $chk;
   }

function  chdate($d){
  $time = strtotime($d);
  $newformat = date('d-M-Y',$time);
return $newformat;
}

       function show_booking_list_detail(){
            $arnum1 = array();
            $utoid_book =$this->session->userdata('sec_gp_book');
            $paramit ="";
            $adults = "";
            $child = "";
            $hotel_id = 0;

            if($utoid_book==""){$utoid_book=0;}
            $idroom=0;$d_in= "";$d_out="";
            $book_room_detail= $this->Page_model->get_book_hotel_detail($utoid_book,"HT");
            foreach ($book_room_detail as  $value) {
              $idroom = $value->room_id;
              $d_in =  $value->date_in;
              $d_out = $value->date_out;
              $adults = $value->adults;
              $child = $value->child;
            }
            $hotel_nm = $this->Page_model->get_hotel_name($idroom);
            foreach ($hotel_nm as  $value1) {
              $hotel_id = $value1->hotel_id;
              $hotel_nm = $value1->hotel_nm;
            }
            $chk_hotel =  count($book_room_detail);
            if($chk_hotel>0){
                 foreach($book_room_detail as $val_sec){
                     $arnum2 = array();
                     array_push($arnum2,$val_sec->room_id,$val_sec->cnt_room);
                     array_push($arnum1,$arnum2);
                 }
               ?>

    <table style="font-size:12px;display:show;width:100%!important" id="hotel" class="table table-sm">
    <thead>
      <tr><th colspan="2"> <?php echo$hotel_nm?></th></tr>
      <tr><td colspan="2"> 
        <b>Check-in:</b> <?php echo $this->chdate($d_in)?>&nbsp;&nbsp;<b>Check-out:</b> <?php echo $this->chdate($d_out)?>
        <input type="hidden" id="h_d_s" value="<?php echo $this->chdate($d_in)?>">
        <input type="hidden" id="h_d_e" value="<?php echo $this->chdate($d_out)?>">
        <input type="hidden" id="h_ad" value="<?php echo$adults?>">
        <input type="hidden" id="h_ch" value="<?php echo$child?>">
      </td></tr>
      <tr><td colspan="2"> <b>Adult:</b> <?php echo$adults?>&nbsp;&nbsp;Child: <?php echo$child?></td></tr>
    </thead>
    <tbody>
  <?php

     $sum_total=0;$list_room=0;$sumtotal = 0;
     $ar_qtr= "";
     foreach($book_room_detail as $val_room_detail){
        $list_room++;
        $num_day = $val_room_detail->num_day;
        $pre_booking_id =  $val_room_detail->pre_booking_id;
        $room_id =  $val_room_detail->room_id;
        $room_detail = $val_room_detail->room_title;
        $room_price = $val_room_detail->new_pr;
        $room_qty = $val_room_detail->cnt_room;
        $room_total = $val_room_detail->total_sum;
        $sum_total = $sum_total + $room_total;
        $sum_extra = $val_room_detail->sum_extra;
        $sumtotal = ($sumtotal + $room_total);
        $ext_qty = $val_room_detail->ext_qty;
        $ar_qtr = $ar_qtr.":".$room_id."=>".$room_qty;
  ?>
          <tr><td style="cursor: pointer;" colspan="2">
          <table style="width:100%"><tr><td><i class="glyphicon glyphicon-trash" style="" onclick="del_hotel_list(<?php echo$pre_booking_id?>,<?php echo$room_id?>)"></i></td><td colspan="2"><b>
            <?php echo$room_detail?></b></td></tr>
          	<tr><td></td><td>Price x <?php echo$room_qty?> </td><td style="text-align:right"><?php echo number_format($room_price,2)?></td></tr>
          	<tr><td></td><td>Extra bed <?php echo$ext_qty?></td><td style="text-align:right"><?php echo number_format(($sum_extra*$num_day),2)?></td></tr>
          	<tr><td></td><td><b>Total</b></td><td style="text-align:right"><?php echo number_format($room_total,2)?>
             
             <input type="hidden" value="<?php echo$room_total?>" id="num_ht_total"> 
            </td></tr>
          </table>
          </tr>
      <?php }?>
      <tr style="background-color:#efefef;color:#888888"><td  style="text-align: left;"><b>Total :</b></td><td style="text-align: right;"><b><?php echo number_format($sumtotal,2)?></b><input type="hidden" value="<?php  echo$ar_qtr?>" id="get_roomqtr"></td></tr>
      <tr style="color:red"><td>Discount :</td><td style="text-align: right;"><div id="price_pro">&nbsp;</div></td></tr>
      <tr style="background-color:#efefef;color:#888888"><td><b>Net total :</b></td><td style="text-align: right;"><div id="price_pro_sum">&nbsp;</div></td></tr>
       </tbody>
    </table>
<div style="padding-left:10px!important">promotion code : <table><tr><td>
	<input type="text" id="ch_promotion_code" style="height:25px;border-radius:3px;border:solid 1px #cccccc;width:100%" >
    <input type="hidden" value="<?php echo$hotel_id?>" id="val_hotel_id">
</td><td><input type="button" value="GO" onclick="ch_promotion()" style="border-radius:5px;" ></td></tr></table></div>
    <input type="hidden" value="<?php echo$sumtotal?>" id="sum_hotel" >
    <?php 
      $this->Book_model->up_temp_numhotel($sumtotal,$utoid_book,'ht_sum');
    ?>
<script type="text/javascript">
 if($('#sum_hotel').val()>0 && $('#sum_hotel').val()!=""){
   $('#bt1').css('display','block');
   $('#b01').css('background-color','#ffdd00');
   }else{
        $('#bt1').css('display','none');
        $('#b01').css('background-color','#cccccc');;
   }
   reset_qta();
   </script>
             <?php 
                /*
                  $price = array(
                    'sec_hotel_sum_price' =>$sumtotal,
                    );
                 $this->session->set_userdata($price);
                 */
                 
              }else{
                 echo "";
              }

             

}



function cuttime($time){
	$time2 = strtotime($time);
    return date('H:i',$time2);
}


function show_booking_transport_detail(){
          $utoid_book =$this->session->userdata('sec_gp_book');
            if($utoid_book==""){$utoid_book=0;}
            $book_trans_detail= $this->Page_model->get_book_transport_detail($utoid_book,"TS");
            $id_run_trans = $this->Page_model->get_id_run_trans($utoid_book);
    echo '<input type="hidden" id="id_run_trans" value="'.$id_run_trans.'">';
            $sum1 = 0;
            $sum2 = 0;
      $sumd1 =0;
      $sumd2 =0;

      $FromLocationName ="";
      $ToLocationName = "";
      $dateGo =date("Y-m-d");
      $Adults = "";
      $Children = "";
      $travelRound = "";
      $dateReturn = "";
      $DepartTime = "";
      $duration_d = "";

      $iddep = 0;
      $idret = 0;
  foreach ($book_trans_detail as $value_tr) {
  if($value_tr->transport_ty==1){
   $iddep = $value_tr->id_tr;
      $FromLocationName =$value_tr->from_data;
      $ToLocationName = $value_tr->to_data;
      $dateGo = $value_tr->date_depart;
      $Adults = $value_tr->adult_traveller;
      $Children = $value_tr->child_traveller;
      $travelRound = "return";
      $dateReturn = $value_tr->date_depart;
      $DepartTime = $this->cuttime($value_tr->time_st)."-".$this->cuttime($value_tr->time_en);
  
      $sumd1 = ($value_tr->adult_traveller * $value_tr->adult_price);
      $sumd2 = ($value_tr->child_traveller * $value_tr->child_price);
      $sum1 = $sum1 + ($sumd1 + $sumd2);
      $duration_d = $value_tr->duration;
   }else if($value_tr->transport_ty==2){
    $idret = $value_tr->id_tr;
      $FromLocationName =$value_tr->to_data;
      $ToLocationName = $value_tr->from_data;
      $datebg = $value_tr->date_return;
      $Adults = $value_tr->adult_traveller;
      $Children = $value_tr->child_traveller;
      $travelRound = "return";
      $dateReturn = $value_tr->date_depart;
      $ReturnDepartTime = $this->cuttime($value_tr->time_st)."-".$this->cuttime($value_tr->time_en);
      $sumr1 = ($value_tr->adult_traveller * $value_tr->adult_price);
      $sumr2 = ($value_tr->child_traveller * $value_tr->child_price);
      $sum2 = $sum2 + ($sumr1 + $sumr2);
      $duration_r = $value_tr->duration;
      }
    }
    if($FromLocationName!=""){
     if($sum1>0){
    ?>

                        <table class="table"  style="font-size: 12px;width:100%!important">
                          <tr>
                            <td colspan="2" style="background-color:#efefef">DEPART:
        <strong>&nbsp;&nbsp;<?php echo $FromLocationName." <i class='glyphicon glyphicon-arrow-right'></i> ".$ToLocationName?></strong>&nbsp;&nbsp;<i onclick="del_trans_list(<?php echo$iddep?>)" style="cursor: pointer;" class="glyphicon glyphicon-trash" style="color:red"></i> </td>
                          </tr>
                          <tr>
                            <td colspan="2"></span>
                            <span style="color:#3c3c3c;font-size: 12px;font-weight: bold;" >
                              <?php 
                              echo $this->chdate($dateGo)?> ,
                              <?php echo $DepartTime?></span></td>
                          </tr>
                          <tr>
                            <td>Duration:</td>
                            <td align="right"><?php echo$duration_d?></td>
                          </tr>
                          <tr>
                            <td>Adult x <?php echo $Adults?></td>
                            <td align="right"><?php echo number_format($sumd1,2)?></td> 
                          </tr>
                          <tr>
                            <td>Children x <?php echo ($Children)?></td>
                            <td align="right"><?php echo number_format($sumd2,2)?></td>
                          </tr>
                          <tr>
                            <td><b>Total depart :</td>
                            <td align="right"><u>
                              <?php echo number_format($sum1,2)?></u>
                            </td>
                          </tr> 
                        </table>
                       <?php 
                      }
                       if(count($book_trans_detail)>0){ 
                       if($sum2>0){

                        ?> 
                           <table class="table" style="font-size: 13px;width:100%!important">
                          <tr>
                            <td colspan="2" style="background-color:#efefef">RETURN:</b>
                              &nbsp;&nbsp;<strong><?php echo $ToLocationName."  <i class='glyphicon glyphicon-arrow-right'></i> ".$FromLocationName?></strong> 
                              &nbsp;&nbsp;<i onclick="del_trans_list(<?php echo$idret?>)" style="cursor: pointer;" class="glyphicon glyphicon-trash" style="color:red"></i> </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                                <span style="color:#3c3c3c;font-size: 12px;font-weight: bold;" >
                                <?php

                                 echo $this->chdate($datebg)?> ,
                                <?php echo $ReturnDepartTime?></td>
                          </tr> 
                          <tr>
                            <td>Duration:</td>
                            <td align="right"><?php echo$duration_r?></td>
                          </tr>
                          <tr>
                            <td>Adult x <?php echo $Adults?></td>
                            <td align="right"><?php echo number_format($sumr1,2)?></td> 
                          </tr>
                          <tr>
                            <td>Children x <?php echo $Children?></td>
                            <td align="right"><?php echo number_format($sumr2,2)?></td>
                          </tr>
                          <tr>
                            <td><b>Total return :</td>
                            <td align="right"><u>
                               <?php echo number_format($sum2,2)?></u>
                            </td>
                          </tr>
                        </table>
                                             <?php }?> 
                        <table class="table" width="100%" style="font-size: 12px;">
                          <tr  style="background-color:#efefef">
                            <td><b>TOTAL PRICE</b></td>
                            <td  align="right" ><p class="undouble"><?php echo number_format(($sum1+$sum2),2)?></p></td>
                          </tr>
                          <tr>
                        </table>                   

           <input type="hidden" value="<?php echo($sum1+$sum2)?>" id="sum_tran">

           <script type="text/javascript">
             
  if($('#sum_tran').val()>0 && $('#sum_tran').val()!=""){
 $('#bt2').css('display','block');
 $('#b03').css('background-color','#ffdd00');
   }else{
 $('#bt2').css('display','none');
 $('#b03').css('background-color','#cccccc');
   }
           </script>
               <?php                
           }}else{
              echo "";
           }
}



function show_book_package_detail(){
     $utoid_book =$this->session->userdata('sec_gp_book');
  if($utoid_book==""){$utoid_book=-1;}
  $pack_detail= $this->Page_model->get_book_package_detail($utoid_book);
  $id_run_pack = $this->Page_model->get_id_run_pack($utoid_book);

  echo '<input type="hidden" id="id_run_pack" value="'.$id_run_pack.'">';

       $package_nm ="";
       $hotel_nm = "";
       $room_nm = "";
       $ad = 0;
       $ch = 0;
       $sg = 0;

       $ad_p = 0;
       $ch_p = 0;
       $sg_p = 0;
       $total = 0;

$total1 = 0;
$total2 = 0;
$total3 = 0;

  foreach ($pack_detail as  $value) {

       $del_pack_id = $value->del_pack;
       $package_nm = $value->package_title;
       $ad = $value->customer_adult;
       $ch = $value->customer_child;
       $sg = $value->customer_single;

       $ad_p = $value->adult_price;
       $ch_p = $value->child_price;
       $sg_p = $value->single_price;

       $total1 = ($ad*$ad_p);
       $total2 = ($ch*$ch_p);
       $total3 = ($sg*$sg_p);

       $total = ($total1)+($total2)+($total3);

       $chkdata = $value->ty;
       $datedata = $value->date_depart;


}if(count($pack_detail) >0){
 $sum_all_bill = $total;
?>
<table style="font-size:12px;display:show;width:100%!important" id="pack">
           <thead style="color:#4a4040">
           <tr><td colspan="4" style="border-width:1px;border-bottom-style:solid;border-color:#cccccc;padding-left:5px;" ><b>Package: </b><?php echo$package_nm?>
<i style="cursor: pointer;" onclick="del_pack_list(<?php echo$del_pack_id?>)">&nbsp;&nbsp;<i class="glyphicon glyphicon-trash" style=""></i>
          </td></tr>
          <tr><td colspan="4" style="padding-left:5px;border-bottom-style:solid;border-width:1px;border-color:#cccccc"><b>Check-in: </b><?php echo $this->chdate($datedata)?></td></tr>
          </thead>
    <tbody>
    <?php if($chkdata==0){
      ?>
    <tr><td colspan="4">
    <table style="width:100%!important;" class="table table-sm">
      <?php 
      //echo $utoid_book;
        $ar_hotel =  $this->Page_model->get_book_package_hotel($utoid_book,'en');
        $ar_ex_hotel = $this->Page_model->get_book_package_hotel_extra($utoid_book,'en');
        foreach ($ar_hotel as $ht_name){
            $hotel_nm = $ht_name->show_ty;
        }
    ?>
 
   <tr style="background-color:#efefef"><td>Type</td><td>Person</td><td style="text-align: right;">Price</td></tr>
    <?php $sum_all_bill = 0;?>
  <?php foreach ($ar_hotel as $value_hotel) {
   $sum_all_bill = ($sum_all_bill + $value_hotel->price);
    ?>
     <tr>
      <td><?php echo$value_hotel->show_ty?></td>
      <td style="text-align:center;"><?php echo$value_hotel->person?></td>
      <td style="text-align:right"><?php echo number_format($value_hotel->price)?>฿</td>
    </tr>
  <?php }?>
     <tr><td colspan="4" style="background-color:#efefef;font-weight:bold;">Extra Service</td></tr>
  <?php foreach($ar_ex_hotel as  $value_extra) {
   $sum_all_bill = ($sum_all_bill + $value_extra->price);
    ?>
     <tr><td><?php echo$value_extra->extra_name?></td>
      <td style="text-align:center;"><?php echo $value_extra->person?></td>
      <td style="text-align:right"><?php echo number_format($value_extra->price)?>฿</td></tr>
  <?php } ?>

     <tr  style="background-color:#efefef;color:#888888;text-align: right;"><td colspan="4"><p class="undouble"><b><u><?php echo number_format($sum_all_bill)?></u>฿</b></p></td></tr>

    </table>
    </td></tr>





   <?php }else{

    ?>

<tr><td colspan="4">
    <table style="width:100%!important;" class="table table-sm">
      <?php 
        $ar_hotel =  $this->Page_model->get_book_package_hotel($utoid_book,'en');
        $ar_ex_hotel = $this->Page_model->get_book_package_hotel_extra($utoid_book,'en');
        foreach ($ar_hotel as $ht_name){
            $hotel_nm = $ht_name->hotel_nm;
        }
    ?>
   <tr><td colspan="4"><b>Hotel :</b> <?php echo$hotel_nm?>  </td></tr>
   <tr style="background-color:#efefef"><td>Room</td><td>Person</td><td>Room</td><td>Price</td></tr>
    <?php $sum_all_bill = 0;?>
  <?php foreach ($ar_hotel as $value_hotel) {
    $ty_rb = $value_hotel->ty;
   $sum_all_bill = ($sum_all_bill + $value_hotel->price);
    ?>
     <tr>
      <td><?php echo$value_hotel->room_fld_nm?></td>
      <td style="text-align:center;"><?php echo$value_hotel->person?></td>
      <td style="text-align:center;"><?php if($ty_rb=='Room'){echo$value_hotel->room;}else{echo'-';}?></td>
      <td style="text-align:right"><?php echo number_format($value_hotel->price)?>฿</td>
    </tr>
  <?php }?>
     <tr><td colspan="4" style="background-color:#efefef;font-weight:bold;">Extra Service</td></tr>
  <?php foreach($ar_ex_hotel as  $value_extra) {
   $sum_all_bill = ($sum_all_bill + $value_extra->price);
    ?>
     <tr><td><?php echo$value_extra->extra_name?></td>
      <td style="text-align:center;"><?php echo $value_extra->person?></td>
      <td style="text-align:center;">-</td>
      <td style="text-align:right"><?php echo number_format($value_extra->price)?>฿</td></tr>
  <?php } ?>

     <tr  style="background-color:#efefef;color:#888888;text-align: right;"><td colspan="4"><p class="undouble"><b><u><?php echo number_format($sum_all_bill)?></u>฿</b></p></td></tr>

    </table>
</td></tr>

   <?php }?>
    </tbody>
    </table>
    
<input type="hidden" value="<?php echo($sum_all_bill)?>" id="sum_pack">
<script type="text/javascript">
if($('#sum_pack').val()>0 && $('#sum_pack').val()!=""){
     $('#bt3').css('display','block');
     $('#b02').css('background-color','#ffdd00');
   }else{
     $('#bt3').css('display','none');
     $('#b02').css('background-color','#cccccc');
   }
</script>
               <?php 
           }else{
              echo "";
           }
}








function show_booking_res_detail(){
  $utoid_book = $this->session->userdata('sec_gp_book');
  if($utoid_book==""){$utoid_book=-1;}
     $pack_detail= $this->Page_model->get_book_res_detail($utoid_book);
     $id_run_res = $this->Page_model->get_id_run_res($utoid_book);

  echo '<input type="hidden" id="id_run_res" value="'.$id_run_res.'">';

       $package_nm ="";
       $hotel_nm = "";
       $room_nm = "";
       $ad = 0;
       $ch = 0;

       $ad_p = 0;
       $ch_p = 0;

       $total = 0;

$total1 = 0;
$total2 = 0;

  foreach ($pack_detail as  $value) {
       $del_pack_id = $value->del_pack;
       $package_nm = $value->res_name;

       $ad = $value->customer_adult;
       $ch = $value->customer_child;

       $ad_p = $value->adult_price;
       $ch_p = $value->child_price;

       $total1 = ($ad*$ad_p);
       $total2 = ($ch*$ch_p);
    
       $total = (($total1)+($total2));
       $chkdata = $value->total_customer;
       $datedata = $value->date_depart;
   }
if(count($pack_detail) >0 && $chkdata>0){?>
<table style="font-size:12px;display:show;width:100%!important" id="pack" class="table table-sm">
     <thead style="color:#4a4040">
         <tr><td colspan="4"><b>Resturants: </b><?php echo$package_nm?>
<i style="cursor: pointer;" onclick="del_res_list(<?php echo$del_pack_id?>)">&nbsp;&nbsp;<i class="glyphicon glyphicon-trash" style=""></i>
         </td></tr>
         <tr><td colspan="4"><b>Check-in: </b><?php echo $this->chdate($datedata)?></td></tr>
         </thead>
    <tbody>
         <tr><td><b>Adults</b></td><td><?php echo$ad?></td><td style="text-align:right"><?php echo$ad_p?></td><td style="text-align:right"><?php echo number_format($total1,2)?></td></tr>
          <?php if($ch>0){?><tr><td><b>Child</b></td><td><?php echo$ch?></td><td  style="text-align:right"><?php echo number_format($ch_p,2)?></td><td style="text-align:right"><?php echo number_format($total2,2)?></td></tr><?php }?>
         <tr  style="background-color:#efefef;color:#888888"><td><b>Total</b></td><td colspan="3" style="text-align:right"><p class="undouble"><b><u><?php echo number_format($total,2)?></u></b></p></td></tr>
    </tbody>
    </table>
    <input type="hidden" value="<?php echo($total)?>" id="sum_res">
    <script type="text/javascript">
      
  if($('#sum_res').val()>0 && $('#sum_res').val()!=""){
     $('#bt4').css('display','block');
     $('#b04').css('background-color','#ffdd00');
   }else{
     $('#bt4').css('display','none');
     $('#b04').css('background-color','#cccccc');
   }
    </script>
    <?php 
       }else{
          echo "";
       }
}


function do_ch_promotion_code(){
	$code_dec = $this->input->post("code_dec");
	$hotel_id = $this->input->post("hotel_id");
    echo $this->Book_model->check_promotion_code($hotel_id,$code_dec);

}


function show_room_price_detail(){
    $hotel_id = "57";
    $crcy_code = "THB";
    $room_data =  $this->Book_model->get_room_price_detail($hotel_id,$crcy_code);
}} 
?>
