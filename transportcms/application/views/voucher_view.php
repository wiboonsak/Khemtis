  <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
        <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/font/font-icon/font-awesome/css/font-awesome.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/font/font-icon/font-flaticon/flaticon.css">
        <!-- LIBRARY CSS-->
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/animate/animate.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/slick-slider/slick.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/slick-slider/slick-theme.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/selectbox/css/jquery.selectbox.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/please-wait/please-wait.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/fancybox/css/jquery.fancybox.css?v=2.1.5">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/fancybox/css/jquery.fancybox-buttons.css?v=1.0.5">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/libs/fancybox/css/jquery.fancybox-thumbs.css?v=1.0.7">
        <!-- STYLE CSS-->
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/css/layout.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/css/components.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/css/responsive.css">
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/css/color.css">
        <!--link(type="text/css", rel='stylesheet', href='assets/css/color-1/color-1.css', id="color-skins")-->
        <link type="text/css" rel="stylesheet" href="#" id="color-skins">
        <script src="https://www.khemtis.com/assets/libs/jquery/jquery-2.2.3.min.js"></script>
        <script src="https://www.khemtis.com/assets/libs/js-cookie/js.cookie.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- FONT CSS-->
        <link type="text/css" rel="stylesheet" href="https://www.khemtis.com/assets/css/tab_payment.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://www.khemtis.com/assets/js/tab_payment.js"></script>
       <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">-->
    <style>
        /* Style the tab */
    .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 30%;
      height: 300px;
    }

    /* Style the buttons inside the tab */
    .tab button {
      display: block;
      background-color: inherit;
      color: black;
      padding: 22px 16px;
      width: 100%;
      border: none;
      outline: none;
      text-align: left;
      cursor: pointer;
      transition: 0.3s;
      font-size: 17px;
    }
    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }
    /* Create an active/current "tab button" class */
    .tab button.active {
      background-color: #ccc;
    }
    /* Style the tab content */
    .tabcontent {
      float: left;
      padding: 0px 12px;
      border: 1px solid #ccc;
      width: 70%;
      border-left: none;
      height: 300px;
    }
      .box_transport{


  }

.box_all{
  -webkit-box-shadow: -1px 2px 15px -5px rgba(0,0,0,0.47);
-moz-box-shadow: -1px 2px 15px -5px rgba(0,0,0,0.47);
box-shadow: -1px 2px 15px -5px rgba(0,0,0,0.47);
padding: 30px;
border-radius: 20px;
}


.undouble{
    text-decoration-line: underline;
      text-decoration-style: double;
      font-weight: bold;
}

    </style>




<?php

function frmd($d){
$date=date_create($d);
return date_format($date,"d-M-Y");
}


function cuttime($time){
  $time2 = strtotime($time);
    return date('H:i',$time2);
}

function ch_date($dt){
  $time = strtotime($dt);
  $newformat = date('d-M-Y',$time);
  return $newformat;
}
$alltotal=0;
$cus_name = "";
$cus_email = "";
$cus_contact = "";
$cus_address = "";



?>
                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">



<?php
//echo $service;
$txt_ch_ser_h = "none";
$txt_ch_ser_p = "none";
$txt_ch_ser_t = "none";
$txt_ch_ser_r = "none";

if($service=="Hotel"){
   $txt_ch_ser_h = "block";
}else if($service=="Package"){
   $txt_ch_ser_p = "block";
}else if($service=="Transport"){
   $txt_ch_ser_t = "block";
}else if($service=="Restaurant"){
   $txt_ch_ser_r = "block";
}else{
   $txt_ch_ser_h = "block";
   $txt_ch_ser_p = "block";
   $txt_ch_ser_t = "block";
   $txt_ch_ser_r = "block";
}




$book_date = date('d-M-Y');
$arnum1 = array();
    $chk_hotel =  count($book_room_detail);
    if($chk_hotel>0){
if (isset($customer_hotel)){
     $cus_name = $customer_hotel->cus_first_name."  ".$customer_hotel->cus_last_name;
     $cus_email = $customer_hotel->cus_email;
     $cus_contact = $customer_hotel->cus_phone;
     $cus_address = $customer_hotel->cus_addr;
}
                 foreach($book_room_detail as $val_sec){
                     $arnum2 = array();
                     array_push($arnum2,$val_sec->room_id,$val_sec->cnt_room);
                     array_push($arnum1,$arnum2);
                     $date_in = $val_sec->date_in;
                     $date_out = $val_sec->date_out;
                     $adults = $val_sec->adults;
                     $child = $val_sec->child;
                     $book_id_hotel = str_replace('-','', $val_sec->book_id_hotel).$val_sec->pre_booking_id;
                  }
?>   

<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 50px;display:<?php echo$txt_ch_ser_h?>">
            
<div style="width:100%;border-style: solid;border-width:0px;">
  <div class="row">
    <div class="col-md-6" style="font-size: 38px;"><b>Hotel Voucher</b></div>
    <div class="col-md-6" style="text-align: right;"><img src="http://khemtis.com/frontend/assets_bill/images/logo-khemtis-black.png" style="height:auto;"></div>
    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Booking ID</font><br>
      H<?php echo$book_id_hotel?>
    </div>
    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Khemtis Company</font><br>
      370 Moo 7 Koh Lipe, Koh Sarai Sub-district, Muang, Satun 91000 Thailand.
Phone:+66 (0) 74 750777, +66 (0) 91 301 3012, +66 (0) 91 301 3013
    </div>
    <div class="col-md-4" style="text-align:right;margin-top: 15px;font-size:15px;">
      <div style="text-align: right;">
      Booking Date: <?php echo ch_date($book_date)?><br>
      Booking Status: <font color="green"><b>Paid</b></font>
    </div>
    </div>
   <div class="col-md-12" style="border-bottom-style:solid;border-width: 0px;border-color:#cccccc;height: 15px;"></div>
   <div class="col-md-4" style="border-right:2px solid #1c8bb8;height: 70px;font-size:15px;">
     <table>
       <tr><td style="text-align:right">Customer Name : </td><td>&nbsp;<?php echo$cus_name?></td></tr>
       <tr><td style="text-align:right">Tel : </td><td >&nbsp;<?php echo$cus_contact?></td></tr>
       <tr><td style="text-align:right">Email : </td><td >&nbsp;<?php echo$cus_email?></td></tr>
       <tr><td style="text-align:right">Address : </td><td >&nbsp;<?php echo$cus_address?></td></tr>
     </table>
   </div>

   <div class="col-md-4" style="border-right:2px solid #1c8bb8;height: 70px;font-size:15px;">
Check-in<br>
<b><?php echo ch_date($date_in)?></b>
    </div>
    <div class="col-md-4" style="font-size:15px;">
Check-out<br>
<b><?php echo ch_date($date_out) ?></b>
    </div>
</div>
</div>

<br>
<div style="width:100%">
<?php
if($chk_hotel>0){
?>
<div class="box_transport" style="margin-bottom: 50px;margin-top:30px;">
 <!-- <i class="flaticon-three" style="font-style:normal;color:#7b2c2a">&nbsp;&nbsp;Hotels & Resort</i>-->
    <table style="font-size:13px;display:show;width:100%!important;" id="hotel" class="table table-sm">
    <thead>
      <tr><th colspan="4"><h4>Hotel Name : <?php echo$hotel_nm?></h4></th></tr>
      <tr><th colspan="4">
       Adults : <?php echo$adults?>&nbsp;&nbsp;&nbsp;&nbsp; Child : <?php echo$child?></th>
      <tr style="background-color:#efefef;">
          <th>Room</th>
          <th style="text-align:right">Price</th>
          <th style="text-align:right">Exra bed</th>
          <th style="text-align:right">Total</th>
      </tr>
      </thead>
      <tbody>
    <?php
     $sum_total=0;$list_room=0;$sumtotal = 0;
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
     ?>
          <tr><td><?php echo$room_detail?></td>
            <td style="text-align:right"><?php echo number_format($room_price,2)?></td>
            <td style="text-align:right"><?php echo number_format(($sum_extra*$num_day),2)?></td>
            <td style="text-align:right"><?php echo number_format($room_total,2)?></td>
          </tr>
      <?php } ?>
      <!--
      <tr style="background-color:#ffffff;"><td colspan="3" style="text-align: left;"><b>Total:</b></td><td style="text-align: right;"><b><p class="undouble"><?php //echo number_format($sumtotal,2)?></p></b></td></tr>
    -->
       </tbody>
    </table>
<?php }
if($txt_ch_ser_h=="block"){
$alltotal=($alltotal+($sumtotal));
}
?>

</div>
</div>


<div style="border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;">
  <div class="row">
    <div class="col-md-6"  style="font-size:15px;">
  Customer Service<br>
  <b>+66-81-2345-795</b>
   </div>
    <div class="col-md-6"  style="font-size:15px;text-align: right;">
       Sub-total:&nbsp;&nbsp;<b><?php echo number_format($sumtotal,2)?></b><br>
   </div>
 </div>
</div>
  <div class="col-12">
                                            <div style="padding-top: 35px;">
                                                <?php echo$hotel_policy?>
                                            </div>

                                      </div>
                                    </div>
                                  </div>                        
                                </div>
                              </div>
                            </div>
                          </div>


                                                </div>
                                            </div>
                                           

<?php      
           }
?>


<?php 
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
      $duration_d="";
 if(count($book_trans_detail)>0){     
$checkin_data_dep = array();
$checkin_data_ret = array();

if (isset($customer_transport)){
     $cus_name = $customer_transport->cust_name."  ".$customer_transport->cust_lastname;
     $cus_email = $customer_transport->cust_email;
     $cus_contact = $customer_transport->cust_telephone_num;
     $cus_address = $customer_transport->cus_addr;
         $checkin_data_dep = explode('[=]', $customer_transport->checkin_data_dep);
         $checkin_data_ret = explode('[=]', $customer_transport->checkin_data_ret);
}




  foreach ($book_trans_detail as $value_tr) {
    $t_book_id = str_replace('-','', $value_tr->add_date).$value_tr->booking_id;
    $date_depart = $value_tr->date_depart;
    $date_return = $value_tr->date_return;
  

  if($value_tr->transport_ty==1){
      $FromLocationName =$value_tr->from_data;
      $ToLocationName = $value_tr->to_data;
      $dateGo = $value_tr->date_depart;
      $Adults = $value_tr->adult_traveller;
      $Children = $value_tr->child_traveller;
      $travelRound = "return";
      $dateReturn = $value_tr->date_depart;
      $DepartTime = cuttime($value_tr->time_st)."-".cuttime($value_tr->time_en);
  
      $sumd1 = ($value_tr->adult_traveller * $value_tr->adult_price);
      $sumd2 = ($value_tr->child_traveller * $value_tr->child_price);
      $sum1 = $sum1 + ($sumd1 + $sumd2);
      $duration_d = $value_tr->duration;
   }else if($value_tr->transport_ty==2){
      $FromLocationName =$value_tr->to_data;
      $ToLocationName = $value_tr->from_data;
      $datebg = $value_tr->date_return;
      $Adults = $value_tr->adult_traveller;
      $Children = $value_tr->child_traveller;
      $travelRound = "return";
      $dateReturn = $value_tr->date_depart;
      $ReturnDepartTime = cuttime($value_tr->time_st)."-".cuttime($value_tr->time_en);
      $sumr1 = ($value_tr->adult_traveller * $value_tr->adult_price);
      $sumr2 = ($value_tr->child_traveller * $value_tr->child_price);
      $sum2 = $sum2 + ($sumr1 + $sumr2);
      $duration_r = $value_tr->duration;

      }
    }

    $num_typ = count($book_trans_detail);
    ?>

<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 40px;display:<?php echo$txt_ch_ser_t?>">         
<div style="width:100%;border-style: solid;border-width:0px;">
  <div class="row">
    <div class="col-md-6" style="font-size: 38px;"><b>Transport Voucher</b></div>
    <div class="col-md-6" style="text-align: right;"><img src="http://khemtis.com/frontend/assets_bill/images/logo-khemtis-black.png" style="height:auto;"></div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Booking ID</font><br>
      T<?php echo$t_book_id?>
    </div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Khemtis Company</font><br>
      370 Moo 7 Koh Lipe, Koh Sarai Sub-district, Muang, Satun 91000 Thailand.
Phone:+66 (0) 74 750777, +66 (0) 91 301 3012, +66 (0) 91 301 3013
    </div>

    <div class="col-md-4" style="text-align:right;margin-top: 15px;font-size:15px;">
      <div style="text-align: right;">
      Booking Date: <?php echo ch_date($book_date)?><br>
      Booking Status: <font color="green"><b>Paid</b></font>
    </div>
    </div>
   <div class="col-md-12" style="border-bottom-style:solid;border-width: 0px;border-color:#cccccc;height: 15px;"></div>
   <div class="col-md-4" style="border-right:2px solid #1c8bb8;height: 70px;font-size:15px;">
    <table>
       <tr><td style="text-align:right">Customer Name : </td><td>&nbsp;<?php echo$cus_name?></td></tr>
       <tr><td style="text-align:right">Tel : </td><td >&nbsp;<?php echo$cus_contact?></td></tr>
       <tr><td style="text-align:right">Email : </td><td >&nbsp;<?php echo$cus_email?></td></tr>
       <tr><td style="text-align:right">Address : </td><td >&nbsp;<?php echo$cus_address?></td></tr>
     </table>
   </div>
   <?php if($num_typ>1){$span=4;$span2=6;}else{$span=8;$span2=12;}?>
   <div class="col-md-<?php echo$span?>" style="height: 70px;font-size:15px;">
Depart Date<br>
<b><?php echo ch_date($date_depart) ?></b>
    </div>
<?php if($num_typ>1){?>    
    <div class="col-md-4" style="font-size:15px;border-right:2px solid #1c8bb8;">
Return Date<br>
<b><?php echo ch_date($date_return) ?></b>
    </div>
<?php } ?>    
</div>
</div>
<br>

<div style="width:100%"> 
<?php 
    if($FromLocationName!=""){ ?>
     <div class="box_transport" style="margin-bottom: 50px;margin-top:30px;">
      <!--<i class="flaticon-transport-4" style="font-style:normal;color:#7b2c2a;">&nbsp;&nbsp;Route Transport </i>-->
     <div class="row">
     <div class="col-md-<?php echo$span2?>">
                        <table class="table" width="100%" style="font-size: 15px;">
                          <tr>
                            <td colspan="2" style="background-color:#efefef"><b>DEPART:</b>
     <strong>&nbsp;&nbsp;<?php echo $FromLocationName." &gt; ".$ToLocationName?></strong></td>
                            </tr>
                            <tr>
                            <td colspan="2"></span>
                            <span style="color:#7b2c2a;font-size: 15px;font-weight: bold;" ></span>
                              <?php 
$time1 = strtotime($dateGo);
$newformat = date('d-M-Y',$time1);
                              echo $newformat?> ,
                              <?php echo $DepartTime?></span></td>
                          </tr>
                          <tr>
                            <td colspan="2" valign="top">
                              <table style="height:35px;">
                                 <?php 
                              

                                     for($k1=1;$k1<count($checkin_data_dep);$k1++){
                                 ?>
                                  <tr><td><div class="cicle_box"><?php echo$k1?></div></td><td>&nbsp;&nbsp;Check In&nbsp;:&nbsp;<?php echo$checkin_data_dep[$k1]?></td></tr>
                                 <?php } ?>
                              </table>

                            </td>
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
                            <td><b>Total depart :</b></td>
                            <td align="right"><u>
                              <?php echo number_format($sum1,2)?></u>
                            </td>
                          </tr> 
                        </table>
       </div>
                       <?php if(count($book_trans_detail)>1){ ?> 
        <div class="col-md-6">
                           <table class="table" width="100%" style="font-size: 15px;">
                          <tr>
                            <td colspan="2" style="background-color:#efefef"><b>RETURN:</b>&nbsp;&nbsp;<strong><?php echo $ToLocationName."  &gt; ".$FromLocationName?></strong> </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                                <span style="color:#7b2c2a;font-size: 12px;font-weight: bold;" ></span>
                                <?php
$time = strtotime($datebg);
$newformat = date('d-M-Y',$time);
                                 echo $newformat?> ,
                                <?php echo $ReturnDepartTime?></td>
                          </tr> 
                          <tr>
                            <td colspan="2" valign="top">
                              <table style="height:35px;">
                                  <?php 
                                     for($k2=1;$k2<count($checkin_data_ret);$k2++){
                                 ?>
                                  <tr><td><div class="cicle_box"><?php echo$k2?></div></td><td>&nbsp;&nbsp;Check In&nbsp;:&nbsp;<?php echo$checkin_data_ret[$k2]?></td></tr>
                                 <?php } ?>
                               
                              </table>

                            </td>
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
                            <td><b>Total return :</b></td>
                            <td align="right"><u>
                               <?php echo number_format($sum2,2)?></u>
                            </td>
                          </tr>
                        </table>
                      </div>
                     <?php }?> 

         </div>
        <!--
                  <table class="table" width="100%" style="font-size: 13px;">
                          <tr>
                            <td><b>Total:</b></td>
                            <td  align="right" ><p class="undouble"><?php //echo number_format(($sum1+$sum2),2)?></p></td>
                          </tr>
                          <tr>
                        </table>
         -->

            
       <?php }
if($txt_ch_ser_t=="block"){
       $alltotal=($alltotal+($sum1+$sum2));
}
       ?>             
</div>
</div>





<div style="border-top:1px solid #cccccc;border-bottom:0px solid #cccccc;">
  <div class="row">
    <div class="col-md-6"  style="font-size:15px;">
  Customer Service<br>
  <b>+66-81-2345-795</b>
   </div>
    <div class="col-md-6"  style="font-size:15px;text-align: right;">
       Sub-total:&nbsp;&nbsp;<b><?php echo number_format(($sum1+$sum2),2)?></b><br>
     

   </div>
 </div>
</div>


  <div class="col-12">
                                            <div style="padding:10px">


 <div class="row">
   <div class="col-md-6" style="height:auto;border:0px solid #efefef;padding:10px;">Policy1</div>
   <div class="col-md-6" style="height:auto;border:0px solid #efefef;padding:10px;">Policy2</div>
 </div>


                                            </div>

                                        </div>






                                     </div>
                                  </div>                        
                                </div>
                              </div>
                            </div>
                          </div>


                                                </div>
                                            </div>
                                           


<?php }?>










<?php
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
$policy = "";
$date_check_in = "";
$book_id_p = "";
  foreach ($pack_detail as  $value) {

$cus_name = $value->customer_name." ".$value->customer_Lastname;
$cus_contact = $value->customer_telephone;
$cus_email = $value->customer_email;
$cus_address = $value->cus_address;
$date_check_in = $value->date_booking;


$book_id_p  = str_replace('-','', $value->add_date).$value->del_pack;

       $package_nm = $value->package_title;
       $hotel_nm = $value->hotel_nm;
       $room_nm = $value->room_fld_nm;
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
       $policy = $value->txt_policy;
   }

if(count($pack_detail) >0){
?>



<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 40px;display:<?php echo$txt_ch_ser_p?>">             
<div style="width:100%;border-style: solid;border-width:0px;">
  <div class="row">
    <div class="col-md-6" style="font-size: 38px;"><b>Package Voucher</b></div>
    <div class="col-md-6" style="text-align: right;"><img src="http://khemtis.com/frontend/assets_bill/images/logo-khemtis-black.png" style="height:auto;"></div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Booking ID</font><br>
      P<?php echo$book_id_p?>
    </div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Khemtis Company</font><br>
      370 Moo 7 Koh Lipe, Koh Sarai Sub-district, Muang, Satun 91000 Thailand.
Phone:+66 (0) 74 750777, +66 (0) 91 301 3012, +66 (0) 91 301 3013
    </div>

    <div class="col-md-4" style="text-align:right;margin-top: 15px;font-size:15px;">
      <div style="text-align: right;">
      Booking Date: <?php echo ch_date($book_date)?><br>
      Booking Status:<font color="green"> <b>Paid</b></font>
    </div>
    </div>
 <div class="col-md-12" style="border-bottom-style:solid;border-width: 0px;border-color:#cccccc;height: 15px;"></div>
   <div class="col-md-4" style="border-right:2px solid #1c8bb8;height: 70px;font-size:15px;">
    <table>
       <tr><td style="text-align:right">Customer Name : </td><td>&nbsp;<?php echo$cus_name?></td></tr>
       <tr><td style="text-align:right">Tel : </td><td >&nbsp;<?php echo$cus_contact?></td></tr>
       <tr><td style="text-align:right">Email : </td><td >&nbsp;<?php echo$cus_email?></td></tr>
       <tr><td style="text-align:right">Address : </td><td >&nbsp;<?php echo$cus_address?></td></tr>
     </table>
   </div>
   <div class="col-md-8" >
Check-in<br>
<b><?php echo frmd($date_check_in)?></b>
    </div>

</div>
</div>


<div style="width:100%">
<div class="box_transport" style="margin-bottom: 50px;margin-top:30px;">
  <!--  <i class="flaticon-people" style="font-style:normal;color:#7b2c2a;">&nbsp;&nbsp;Package Tours </i>-->
    <table style="font-size:15px;display:show;width:100%" id="pack" class="table table-sm">
          <thead style="color:#4a4040;font-size:13px;">
           <tr><td colspan="4"><b>Package: </b><?php echo$package_nm?></td></tr>
           <?php if($hotel_nm!="No hotel"){?><tr><td colspan="4"><b>Hotel: </b><?php echo$hotel_nm?></td></tr><?php }?>
           <?php if($room_nm!="-"){?><tr><td colspan="4"><b>Room: </b><?php echo$room_nm?></td></tr><?php }?>
            <tr style="background-color:#efefef;font-weight:bold;">
               <td>Type</td><td>
Number of people</td><td style="text-align:right">Price</td><td style="text-align:right">Total price</td>
            </tr>
          </thead>
    <tbody style="font-size:13px;">
          <tr><td><b>Adults</b></td><td><?php echo$ad?></td><td style="text-align:right"><?php echo$ad_p?></td><td style="text-align:right"><?php echo number_format($total1,2)?></td></tr>
          <?php if($ch>0){?><tr><td><b>Child</b></td><td><?php echo$ch?></td><td  style="text-align:right"><?php echo number_format($ch_p,2)?></td><td style="text-align:right"><?php echo number_format($total2,2)?></td></tr><?php }?>
          <?php if($sg>0){?><tr><td><b>Single</b></td><td><?php echo$sg?></td><td  style="text-align:right"><?php echo number_format($sg_p,2)?></td><td style="text-align:right"><?php echo number_format($total3,2)?></td></tr><?php }?>
<!--
          <tr  style="background-color:#ffffff;"><td><b>Total:</b></td><td colspan="3" style="text-align:right"><p class="undouble"><b><u><?php // echo number_format($total,2)?></u></b></p></td></tr>-->
    </tbody>
    </table>
 </div>
           <?php 
           if($txt_ch_ser_p=="block"){
           $alltotal=($alltotal+($total));
           }
            ?>
</div>


<div style="border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;">
  <div class="row">
    <div class="col-md-6"  style="font-size:15px;">
  Customer Service<br>
  <b>+66-81-2345-795</b>
   </div>
    <div class="col-md-6"  style="font-size:15px;text-align: right;">
       Sub-total:&nbsp;&nbsp;<b><?php echo number_format($total,2)?></b><br>
    

   </div>
 </div>
</div>

  <div class="col-12">
                                            <div>
           <?php echo $policy ?>
              
                                            </div>

                                        </div>





                                     </div>
                                  </div>                        
                                </div>
                              </div>
                            </div>
                          </div>


                                                </div>
                                            </div>

<?php 
           }else{
              echo "";
           }
?>













<?php
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
$policy = "";
$date_check_in = "";
$book_id_p = "";
  foreach ($pack_res as  $value) {

$cus_name = $value->customer_name." ".$value->customer_Lastname;
$cus_contact = $value->customer_telephone;
$cus_email = $value->customer_email;
$cus_address = $value->cus_address;
$date_check_in = $value->date_booking;

$book_id_p  = str_replace('-','', $value->add_date).$value->del_pack;

       $package_nm = $value->res_name;
       $ad = $value->customer_adult;
       $ch = $value->customer_child;

       $ad_p = $value->adult_price;
       $ch_p = $value->child_price;

       $total1 = ($ad*$ad_p);
       $total2 = ($ch*$ch_p);
  
       $total = ($total1)+($total2);
       $policy = $value->txt_policy;
   }

if(count($pack_res) >0){
?>



<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 40px;display:<?php echo$txt_ch_ser_r?>">             
<div style="width:100%;border-style: solid;border-width:0px;">
  <div class="row">
    <div class="col-md-6" style="font-size: 38px;"><b>Resturants Voucher</b></div>
    <div class="col-md-6" style="text-align: right;"><img src="http://khemtis.com/frontend/assets_bill/images/logo-khemtis-black.png" style="height:auto;"></div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Booking ID</font><br>
      R<?php echo$book_id_p?>
    </div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Khemtis Company</font><br>
      370 Moo 7 Koh Lipe, Koh Sarai Sub-district, Muang, Satun 91000 Thailand.
Phone:+66 (0) 74 750777, +66 (0) 91 301 3012, +66 (0) 91 301 3013
    </div>

    <div class="col-md-4" style="text-align:right;margin-top: 15px;font-size:15px;">
      <div style="text-align: right;">
      Booking Date: <?php echo ch_date($book_date)?><br>
      Booking Status:<font color="green"> <b>Paid</b></font>
    </div>
    </div>
 <div class="col-md-12" style="border-bottom-style:solid;border-width: 0px;border-color:#cccccc;height: 15px;"></div>
   <div class="col-md-4" style="border-right:2px solid #1c8bb8;height: 70px;font-size:15px;">
    <table>
       <tr><td style="text-align:right">Customer Name : </td><td>&nbsp;<?php echo$cus_name?></td></tr>
       <tr><td style="text-align:right">Tel : </td><td >&nbsp;<?php echo$cus_contact?></td></tr>
       <tr><td style="text-align:right">Email : </td><td >&nbsp;<?php echo$cus_email?></td></tr>
       <tr><td style="text-align:right">Address : </td><td >&nbsp;<?php echo$cus_address?></td></tr>
     </table>
   </div>
   <div class="col-md-8" >
Check-in<br>
<b><?php echo frmd($date_check_in)?></b>
    </div>

</div>
</div>


<div style="width:100%">
<div class="box_transport" style="margin-bottom: 50px;margin-top:30px;">
  <!--  <i class="flaticon-people" style="font-style:normal;color:#7b2c2a;">&nbsp;&nbsp;Package Tours </i>-->
    <table style="font-size:15px;display:show;width:100%" id="pack" class="table table-sm">
          <thead style="color:#4a4040;font-size:15px;">
           <tr><td colspan="4"><b>Resturant name: </b><?php echo$package_nm?></td></tr>

            <tr style="background-color:#efefef;font-weight:bold;">
               <td>Type</td><td>
Number of people</td><td style="text-align:right">Price</td><td style="text-align:right">Total price</td>
            </tr>
          </thead>
    <tbody style="font-size:13px;">
          <tr><td><b>Adults</b></td><td><?php echo$ad?></td><td style="text-align:right"><?php echo$ad_p?></td><td style="text-align:right"><?php echo number_format($total1,2)?></td></tr>
          <?php if($ch>0){?><tr><td><b>Child</b></td><td><?php echo$ch?></td><td  style="text-align:right"><?php echo number_format($ch_p,2)?></td><td style="text-align:right"><?php echo number_format($total2,2)?></td></tr><?php }?>
          <?php if($sg>0){?><tr><td><b>Single</b></td><td><?php echo$sg?></td><td  style="text-align:right"><?php echo number_format($sg_p,2)?></td><td style="text-align:right"><?php echo number_format($total3,2)?></td></tr><?php }?>
<!--
          <tr  style="background-color:#ffffff;"><td><b>Total:</b></td><td colspan="3" style="text-align:right"><p class="undouble"><b><u><?php // echo number_format($total,2)?></u></b></p></td></tr>-->
    </tbody>
    </table>
 </div>
           <?php 
           if($txt_ch_ser_r=="block"){
             $alltotal=($alltotal+($total));
           } 
            ?>
</div>


<div style="border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;">
  <div class="row">
    <div class="col-md-6"  style="font-size:15px;">
  Customer Service<br>
  <b>+66-81-2345-795</b>
   </div>
    <div class="col-md-6"  style="font-size:15px;text-align: right;">
       Sub-total:&nbsp;&nbsp;<b><?php echo number_format($total,2)?></b><br>
    

   </div>
 </div>
</div>

  <div class="col-12">
                                            <div>
           <?php echo $policy ?>
              
                                            </div>

                                        </div>





                                     </div>
                                  </div>                        
                                </div>
                              </div>
                            </div>
                          </div>


                                                </div>
                                            </div>

<?php 
           }else{
              echo "";
           }
?>










                                           
<div class="container">
<table style="width:100%"><tr><td><div style="border-radius:10px;border-style: solid;border-width:0px;border-color:#b9b9b9;background-color:#efefef;width:100%;padding: 5px;text-align: right;padding-right: 35px;"><font style="margin-right:34px;"> <b>Total:</b></font><font class="undouble"><b><u><?php echo number_format($alltotal,2)?></u></b></font></div></td></tr></table>
</div>













                             <div class="contact-submit" align="center" style="margin:20px 0px !important">
                                        <button type="button" data-hover="PRINT" onclick="up_pay()" class="btn btn-slide btn-default">
                                          <span class="text">PRINT</span>
                                          <span class="icons fa fa-print"></span>
                                        </button>
                                      </div>






                    <!-- BUTTON BACK TO TOP-->
                    <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>
                <!-- FOOTER-->
            


            </div>
        </div>


        <!-- LIBRARY JS-->
        <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/libs/detect-browser/browser.js"></script>
        <script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
        <script src="assets/libs/wow-js/wow.min.js"></script>
        <script src="assets/libs/slick-slider/slick.min.js"></script>
        <script src="assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
        <script src="assets/libs/please-wait/please-wait.min.js"></script>
        <script src="assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <script src="assets/libs/fancybox/js/jquery.fancybox-thumbs.js"></script>
        <!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")-->
        <!-- MAIN JS-->
        <script src="assets/js/main.js"></script>
        <!-- LOADING JS FOR PAGE-->
        <script src="assets/js/pages/faq.js"></script>
        <script>
    
     
        </script>
    </body>
</html>