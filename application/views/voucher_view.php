
        <!-- FONT CSS-->
        <link type="text/css" rel="stylesheet" href="assets/css/tab_payment.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="assets/js/tab_payment.js"></script>
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
border:solid 1px #cccccc;
padding: 30px;
border-radius: 5px;
}


.undouble{
    text-decoration-line: underline;
      text-decoration-style: double;
      font-weight: bold;
}


.cicle_box {
    width: 15px;
    height: 15px;
    border-style: solid;
    border-width: 1px;
    border-radius: 50%;
    border-color: #cccccc;
    color: #ffffff;
    background-color: #cccccc;
    text-align: center;
    font-size: 4px;
}
    </style>



<?php
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

<center>
  <!--<div><input type="button" value="Reset New Booking " onclick="window.location='https://www.khemtis.com/Voucher/resetpage'"></div>-->
    <div style="width:50%;">
      <ul class="progressbar">
        <li class="active">Contact Information</li>
        <li class="active">Payment information</li>
        <li class="active">Booking is confirmed!</li>
      </ul>
    </div>
 </center>
<input type="hidden" id="hid_num" value="1">


<?php
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
<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 50px;">       
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
   <div class="col-md-4" style="border-right:2px solid #ffffff;height: 70px;font-size:15px;">
     <table>
       <tr><td style="text-align:right">Customer Name : </td><td>&nbsp;<?php echo$cus_name?></td></tr>
       <tr><td style="text-align:right">Tel : </td><td >&nbsp;<?php echo$cus_contact?></td></tr>
       <tr><td style="text-align:right">Email : </td><td >&nbsp;<?php echo$cus_email?></td></tr>
       <tr><td style="text-align:right">Address : </td><td >&nbsp;<?php echo$cus_address?></td></tr>
     </table>
   </div>

   <div class="col-md-4" style="border-right:2px solid #ffffff;height: 70px;font-size:15px;">
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
<?php }$alltotal=($alltotal+($sumtotal));?>

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
         $checkin_data_dep = explode(',', $customer_transport->checkin_data_dep);
         $checkin_data_ret = explode(',', $customer_transport->checkin_data_ret);
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
      $compay_de = $value_tr->client_name;
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
      $compay_re = $value_tr->client_name;
      }
    }
$num_typ = count($book_trans_detail);
    ?>

<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 40px;">         
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
   <div class="col-md-4" style="border-right:2px solid #ffffff;height: 70px;font-size:15px;">
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
    <div class="col-md-4" style="font-size:15px;border-right:2px solid #ffffff;">
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
                           <tr><td colspan="2" style="color:#000000"><?php echo$compay_de?></td></tr>
                          <tr>
                            <td colspan="2" style="background-color:#efefef"><b>DEPART:</b>
     <strong>&nbsp;&nbsp;<?php echo $FromLocationName." <i class='glyphicon glyphicon-arrow-right'></i> ".$ToLocationName?></strong></td>
                            </tr>
                            <tr>
                            <td colspan="2"></span>
                            <span style="color:#7b2c2a;font-size: 15px;font-weight: bold;" ></span>
                            <?php 
$time1 = strtotime($dateGo);
$newformat = date('d-M-Y',$time1);
                              echo $newformat?> ,
                            <?php echo $DepartTime?>
                            </span>
                             </td>
                           </tr>
                          <tr>
                            <td colspan="2" valign="top" style="padding-left:20px!important">
                              <table style="height:35px;font-size:13px!important;">
                                 <?php             
                                     for($k1=0;$k1<count($checkin_data_dep);$k1++){
                                  $str_dep = str_replace("<->","&nbsp;&nbsp;<i class='fa fa-arrow-circle-right custom'></i>&nbsp;&nbsp;",$checkin_data_dep[$k1]); 
                                 ?>
                                  <tr><td><div class="cicle_box"><?php echo$k1?></div></td><td>&nbsp;&nbsp;<?php echo$str_dep?></td></tr>
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
                             <tr><td colspan="2" style="color:#000000"><?php echo$compay_re?></td></tr>
                          <tr>
                            <td colspan="2" style="background-color:#efefef"><b>RETURN:</b>&nbsp;&nbsp;<strong><?php echo $ToLocationName."  <i class='glyphicon glyphicon-arrow-right'></i> ".$FromLocationName?></strong> </td>
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
                            <td colspan="2" valign="top" style="padding-left:20px!important">
                              <table style="height:35px;font-size: 13px!important ;" >
                                  <?php 
                                     for($k2=0;$k2<count($checkin_data_ret);$k2++){
              $str_rep = str_replace("<->","&nbsp;&nbsp;<i class='fa fa-arrow-circle-right custom'></i>&nbsp;&nbsp;",$checkin_data_ret[$k2]);         
                                 ?>
                                  <tr><td><div class="cicle_box"><?php echo$k2?></div></td><td>&nbsp;&nbsp;<?php echo$str_rep?></td></tr>
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

            
       <?php }$alltotal=($alltotal+($sum1+$sum2));?>             
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
$id_gp = 0;
$hotel_nm = "";
  foreach ($pack_detail as  $value) {

$cus_name = $value->customer_name." ".$value->customer_Lastname;
$cus_contact = $value->customer_telephone;
$cus_email = $value->customer_email;
$cus_address = $value->cus_address;
$date_check_in = $value->date_depart;


$book_id_p  = str_replace('-','', $value->date_depart).$value->del_pack;
$ty_pack = $value->ty;
$id_gp =  $value->id_gp;
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

       $policy = $value->txt_policy;
   }

if(count($pack_detail) >0){
  if($ty_pack==1 || $ty_pack==0){
     $ar_hotel =  $this->Page_model->get_book_package_hotel($id_gp,'en');
     $ar_ex_hotel = $this->Page_model->get_book_package_hotel_extra($id_gp,'en');

     foreach ($ar_hotel as $ht_name){
         $hotel_nm = $ht_name->hotel_nm;

     }
  }
?>


<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 40px;">             
<div style="width:100%;border-style: solid;border-width:0px;">
  <div class="row">
    <div class="col-md-6" style="font-size: 38px;"><b>Package Voucher</b></div>
    <div class="col-md-6" style="text-align: right;"><img src="http://khemtis.com/frontend/assets_bill/images/logo-khemtis-black.png" style="height:auto;width:120px;"></div>

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
   <div class="col-md-4" style="border-right:2px solid #ffffff;height: 70px;font-size:15px;">
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

<?php if($ty_pack==0){?>

  <!---------------------------------Packe Not Room Hotel --------------------------------------->
          <thead style="color:#4a4040;font-size:13px;">
           <tr><td colspan="3"><b>Package: </b><?php echo$package_nm?></td></tr>
            <tr style="background-color:#efefef;font-weight:bold;">
               <td>Type</td><td  style="text-align:center; ">
Number of people</td><td style="text-align:right">Price</td>
            </tr>
          </thead>  

  <?php $sum_all_bill = 0;?>
  <?php foreach ($ar_hotel as $value_hotel) {
     $sum_all_bill = ($sum_all_bill + $value_hotel->price);
     $typ_rb = $value_hotel->ty;
     $ad_peple = $value_hotel->person;
     $total1 = $value_hotel->price;
     $total_sum = $value_hotel->total_price;
   }
  ?>
    <tbody style="font-size:13px;">
          <tr>
            <td><b>Adults</b></td><td style="text-align:center; "><?php echo$ad_peple?></td>
            <td style="text-align:right"><?php echo number_format($total1,2)?>฿</td>
          </tr>
   <tr><td colspan="3" style="background-color:#efefef;font-weight:bold;">Extra Service</td></tr>
   <?php foreach($ar_ex_hotel as  $value_extra) {
   $sum_all_bill = ($sum_all_bill + $value_extra->price);
    ?>
     <tr><td><?php echo$value_extra->extra_name?></td>
      <td style="text-align:center;"><?php echo $value_extra->person?></td>
      <td style="text-align:right"><?php echo number_format($value_extra->price,2)?>฿</td></tr>
  <?php } ?>


    </tbody>
<?
 $sum_all_bill=(($total_sum));
}else{?> 
  <!---------------------------------Packe Room Hotel --------------------------------------->
          <thead style="color:#4a4040;font-size:13px;">
           <tr><td colspan="5"><b>Package: </b><?php echo$package_nm?></td></tr>
           <tr><td colspan="5"><b>Hotel:</b>&nbsp;&nbsp;<?php echo$hotel_nm?></td></tr>
            <tr style="background-color:#efefef;font-weight:bold;">
               <td>Room type</td><td style="text-align:center;">
Person Qty</td><td style="text-align:center; ">Room Qty</td><td style="text-align: center;">Type</td><td style="text-align:right">Price</td>
            </tr>
          </thead>
    <tbody style="font-size:13px;">
  <?php $sum_all_bill = 0;?>
  <?php foreach ($ar_hotel as $value_hotel) {
   $sum_all_bill = ($sum_all_bill + $value_hotel->price);
   $typ_rb = $value_hotel->ty;
  ?>
     <tr>
      <td><?php echo$value_hotel->room_fld_nm?></td>
      <td style="text-align:center;"><?php echo$value_hotel->person?></td>
      <td style="text-align:center;"><?php if($typ_rb=='Room'){echo$value_hotel->room;}else{echo'-';}?></td>
      <td style="text-align:center;"><?php echo$typ_rb?></td>
      <td style="text-align:right"><?php echo number_format($value_hotel->price,2)?>฿</td>
    </tr>
  <?php }?>
     <tr><td colspan="5" style="background-color:#efefef;font-weight:bold;">Extra Service</td></tr>
  <?php foreach($ar_ex_hotel as  $value_extra) {
   $sum_all_bill = ($sum_all_bill + $value_extra->price);
    ?>
     <tr><td><?php echo$value_extra->extra_name?></td>
      <td style="text-align:center;"><?php echo $value_extra->person?></td>
      <td style="text-align:center;">-</td>
      <td style="text-align:center;">&nbsp;</td>
      <td style="text-align:right"><?php echo number_format($value_extra->price,2)?>฿</td></tr>
  <?php } ?>
    </tbody>


  <?php } ?>
    </table>
</div>
           <?php 
           $alltotal=($alltotal+($sum_all_bill));
            ?>
</div>




<div style="border-top:1px solid #cccccc;border-bottom:1px solid #cccccc;">
  <div class="row">
    <div class="col-md-6"  style="font-size:15px;">
  Customer Service<br>
  <b>+66-81-2345-795</b>
   </div>
    <div class="col-md-6"  style="font-size:15px;text-align: right;">
       Sub-total:&nbsp;&nbsp;<b><?php echo number_format($sum_all_bill,2)?>฿</b><br> 
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
$date_check_in = $value->date_depart;

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



<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 40px;">             
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
   <div class="col-md-4" style="border-right:2px solid #ffffff;height: 70px;font-size:15px;">
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
           $alltotal=($alltotal+($total));
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




<center>                          
<div class="container" style="padding:0px!important;margin:0px!important  ">
<table style="width:100%"><tr><td><div style="border-radius:3px;border-style: solid;border-width:0px;border-color:#b9b9b9;background-color:#efefef;width:100%;padding: 5px;text-align: right;padding-right: 35px;"><font style="margin-right:34px;"> <b>Total:</b></font><font class="undouble"><b><u><?php echo number_format($alltotal,2)?></u></b></font></div></td></tr></table>
</div>
</center>     

                             <div class="contact-submit" align="center" style="margin:20px 0px !important">
                                        <button type="button" data-hover="PRINT" onclick="up_pay(<?php echo$idgp?>,<?php echo$idh?>)" class="btn btn-slide btn-default">
                                          <span class="text">PRINT</span>
                                          <span class="icons fa fa-print"></span>
                                        </button>
                                      </div>

<center>
<div id="show_email"></div>
</center>

                    <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>
                <!-- FOOTER-->
                 <?php include("footer.php"); ?>

            </div>
        </div>

   <?php include("html_tool/modal_login_register.php"); ?>
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

         $('#menu_hs').css("display","none");
         $('#menu_right').css("display", "none");
        function up_pay(idgp,idh) {
        window.location = "https://www.khemtis.com/Createpdf?idgp="+idgp+"&idh="+idh;
        }


            var logo_str = 'assets/images/logo/logo-black-color-1.png';
            if (Cookies.set('color-skin'))
            {
                logo_str = 'assets/images/logo/logo-black-' + Cookies.set('color-skin') + '.png';
            }
            window.loading_screen = window.pleaseWait(
            {
                logo: logo_str,
                backgroundColor: '#fff',
                loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
            });
        </script>

  <script type="text/javascript">
          
load_email();
  function load_email(){
  $.ajax({
       url: "<?php echo base_url('Voucher/send_email')?>",
             type: "POST",
             data: ({id:0}),
             dataType: "html",
      success:function(data) {
        $('#show_email').empty();
        $('#show_email').html();
      },
      complete: function(){ 
      }
    });
         }
  

  </script>
  </body>
</html>