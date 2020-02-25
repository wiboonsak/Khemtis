 
<?php $pthc= base_url();?>

  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
  <link href="<?php echo $pthc?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- animation -->
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
   <link rel="stylesheet" href="<?php echo $pthc ?>assets/plugins/sweet-alert/sweetalert.min.css">
 <!-- data tables -->
   <link href="<?php echo $pthc?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
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
function cuttime($time){
  $time2 = strtotime($time);
    return date('H:i',$time2);
}
function cvd($txt){
$time = strtotime($txt);
$newformat = date('d-M-Y',$time);
return $newformat;
}
$alltotal=0;
?>
                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">



<?php



$st_txt = "";
      $arnum1 = array();$book_date="";
            $chk_hotel =  count($book_room_detail);
            if($chk_hotel>0){

                 foreach($book_room_detail as $val_sec){
                  $st_txt = "";
                     $arnum2 = array();
                     array_push($arnum2,$val_sec->room_id,$val_sec->cnt_room);
                     array_push($arnum1,$arnum2);
                     $date_in = $val_sec->date_in;
                     $date_out = $val_sec->date_out;
                     $adults = $val_sec->adults;
                     $child = $val_sec->child;
                     $booking_number = $val_sec->booking_number;
                     $st = $val_sec->str_st;
                     $date_in =  $val_sec->date_in;
                     $date_out = $val_sec->date_out;
                     $book_date = $val_sec->add_date;

                  }

  $str = $this->input->get("str");
  if($str=="M"){$txt="<font color='#5cb85c'>Paid</font>";}
  else if($str=="I"){$txt="<font color='#337ab7'>Pending</font>";}
  else if($str=="1"){
    $txt="<font color='#5cb85c'>Paid</font>";
  }



?>   

<div class="container box_all" style="padding-top:50px;margin-bottom: 20px;margin-top: 50px;">
            
<div style="width:100%;border-style: solid;border-width:0px;">
  <div class="row">
    <div class="col-md-6" style="font-size: 38px;"><b>Voucher</b></div>
    <div class="col-md-6" style="text-align: right;"><img src="http://khemtis.com/frontend/assets_bill/images/logo-khemtis-black.png" style="height:auto;"></div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">
      <font style="font-size:20px;font-weight:bold;">Booking ID</font><br>
      H<?php echo$booking_number?>
    </div>

    <div class="col-md-4" style="margin-top: 15px;font-size: 15px;">

      <font style="font-size:20px;font-weight:bold;">Khemtis Company</font><br>
      370 Moo 7 Koh Lipe, Koh Sarai Sub-district, Muang, Satun 91000 Thailand. Phone:+66 (0) 74 750777, +66 (0) 91 301 3012, +66 (0) 91 301 3013
    </div>

    <div class="col-md-4" style="text-align:right;margin-top: 15px;font-size:15px;">
      <div style="text-align: right;">
      Booking Date: <?php echo cvd($book_date)?><br>
      Booking Status: <b><?php echo$txt?></b>
    </div>
    </div>
   <div class="col-md-12" style="border-bottom-style:solid;border-width: 0px;border-color:#cccccc;height: 15px;"></div>
   <div class="col-md-4" style="border-right:4px solid #1c8bb8;height: 70px;font-size:15px;">
    <?php 

if (isset($customer_hotel)){
     $cus_name = $customer_hotel->cus_first_name."  ".$customer_hotel->cus_last_name;
     $cus_email = $customer_hotel->cus_email;
     $cus_contact = $customer_hotel->cus_phone;
     $cus_address = $customer_hotel->cus_addr;
}

    ?>
    <table>
       <tr><td style="text-align:right">Customer Name : </td><td>&nbsp;<?php echo$cus_name?></td></tr>
       <tr><td style="text-align:right">Tel : </td><td >&nbsp;<?php echo$cus_contact?></td></tr>
       <tr><td style="text-align:right">Email : </td><td >&nbsp;<?php echo$cus_email?></td></tr>
       <tr><td style="text-align:right">Address : </td><td >&nbsp;<?php echo$cus_address?></td></tr>
     </table>

   </div>

   <div class="col-md-4" style="border-right:4px solid #1c8bb8;height: auto;font-size:15px;padding-bottom: 50px!important;">
Check-in<br>
<b><?php echo cvd($date_in)?></b>
    </div>
    <div class="col-md-4" style="font-size:15px;">
Check-out<br>
<b><?php echo cvd($date_out) ?></b>
    </div>
</div>
</div>

<div style="width:100%">
<?php

            if($chk_hotel>0){

               ?>
<div class="box_transport" style="margin-bottom: 50px;margin-top:30px;">
 <!-- <i class="flaticon-three" style="font-style:normal;color:#7b2c2a">&nbsp;&nbsp;Hotels & Resort</i>-->
    <table style="font-size:13px;display:show;width:100%!important;" id="hotel" class="table table-sm">
    <thead>
      <tr><th colspan="4" style="text-align:left;"><?php echo$hotel_nm?></th></tr>
      <tr><th colspan="4" style="text-align:left;">
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

   </div>
    <div class="col-md-6"  style="font-size:15px;text-align: right;">
       Sub-total:&nbsp;&nbsp;<b><?php echo number_format($sumtotal,2)?></b><br>

   </div>
 </div>
</div>
<div class="col-12" style="padding-top:20px;">
                                            <div>
                                               <p style="font-weight: bold;">Hotel Policy</p>
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



                </div>
       
   
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
         $('#menu_right').css("display", "none");
        function up_pay() {

      $.post("<?php echo base_url('HotelPayment/up_book_st')?>", 
      {idrun:0},
        function(result){

       if(result>0){

         alert("Pay Sucsess");
      }else{
         alert("Not Pay");
      }
    },'json');
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
    </body>
</html>