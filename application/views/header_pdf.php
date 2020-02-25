
<!DOCTYPE html>
<?php $pthc= base_url();


?>

<header>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</header>









        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/font/font-icon/font-awesome/css/font-awesome.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/font/font-icon/font-flaticon/flaticon.css">
        <!-- LIBRARY CSS-->
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/animate/animate.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/slick-slider/slick.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/slick-slider/slick-theme.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/selectbox/css/jquery.selectbox.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/please-wait/please-wait.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/fancybox/css/jquery.fancybox.css?v=2.1.5">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/fancybox/css/jquery.fancybox-buttons.css?v=1.0.5">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/libs/fancybox/css/jquery.fancybox-thumbs.css?v=1.0.7">
        <!-- STYLE CSS-->
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/css/layout.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/css/components.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/css/responsive.css">
        <link type="text/css" rel="stylesheet" href="<?php echo$pthc?>assets/css/color.css">
        <!--link(type="text/css", rel='stylesheet', href='assets/css/color-1/color-1.css', id="color-skins")-->
        <link type="text/css" rel="stylesheet" href="#" id="color-skins">
        <script src="<?php echo$pthc?>assets/libs/jquery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo$pthc?>assets/libs/js-cookie/js.cookie.js"></script>

<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.css">-->

<style type="text/css">


@media only screen and (max-width: 700px) {
   .pc_nav{
    display:none;   
   }
   .mobile_nav{
    display:block ;   
   }
   .per_nigth{
    display:none;  
   }
   .mobile_rating{
    display:none;  
   }
   .mobile_accommodation{
    display:none;   
   }
   .mobile_faciliti{
    display:none;   
   }
   .mobile_special{
    display:none;   
   }
   .menu_hs{
    float:right;
    position: fixed;
    z-index: 110;
    color:#cecece;
    padding-left: 5px;

    margin: 12% auto;
    margin-right:-13px;
/*
    width: 0;
    height: 0;
    border-top: 60px solid transparent;
    border-right: 50px solid #1b7aa6;
    border-bottom: 60px solid transparent;
*/
    right: 5px;
    cursor: pointer;
}
.bgbox_tran{
  background-color:#ffffff;padding:20px!important;
}
.mainbox{
  display:none;
}
.vbook{
  display:block!important;
}
}




@media  only screen and  (min-width: 900px) {
  .vbook{
  display:none!important;
}
.mainbox{
  display:block;
}
  .bgbox_tran{
    background-color:#ffffff;padding:0px!important;
  }
   .mobile_nav{
    display:none;   
   }
      .pc_nav{
    display:block;   
   }
   .menu_hs{
    float:right;
    position: fixed;
    z-index: 110;
    color:#cecece;
    padding-left: 5px;

    margin: 12% auto;
    margin-right:-13px;
/*
    width: 0;
    height: 0;
    border-top: 60px solid transparent;
    border-right: 50px solid #1b7aa6;
    border-bottom: 60px solid transparent;
    */
    right: 10px;
    cursor: pointer;
}





}


  .alink {
     font-family: 'Roboto', Helvetica, Arial, sans-serif;font-size:12px;
  }


  .menu {
    position: fixed;
    right: -20em;
    top: 25%;
    border-radius: 10px!important;
    margin: 0 0 0 0;
    z-index: 1111111!important  ;
    background:#ffffff;
    color: #3c3c3c;
    font-size: large;
    text-align: left;

    padding: 0.0em 0.5em 0.5em 0em;
   
    transition: 0.2s;
-webkit-box-shadow: -1px 2px 15px -5px rgba(0,0,0,0.47);
-moz-box-shadow: -1px 2px 15px -5px rgba(0,0,0,0.47);
box-shadow: -1px 2px 15px -5px rgba(0,0,0,0.47);
  }

.imgdis {
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
}

.hid_icn_pay{
   display:none;    
}
.sow_icn_pay{
   display:block;   
}

  .menu_act { right: 0 }
  .menu li { margin: 0 }
  .menu a {
    position: relative;
    left: 0;
    color: inherit;
    transition: 0.2s;
  }
  .menu a:focus {
    left: -7em;
    
  }
  .menu:hover a:focus {
    left: 0;
    background: none;
}
.link_mem:hover{
  color:red;
}
.link_mem{
  font-size: 13px!important;
color:#505050;
}



/*  Mobile Conntent **/


.mobile-container {
  max-width: 480px;
  margin: auto;
  background-color: #555;
  /*height: 500px;*/
  color: white;
  border-radius: 10px;
}

.topnav {
  overflow: hidden;
  background-color: #ffffff;
  position: relative;
}

.topnav #myLinks {
  display: none;
}

.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;

}

.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.txt_menu{
    background-color: #ffffff!important ;
    color:#8e9192!important ;
    border:0px solid  #e2e2e2;
}

.mobile_list{
    height:40px!important;
      padding-top: 5px!important    ;
  padding-right: 0px;
  padding-bottom: 5px;
  padding-left: 12px;
   /* background-image: linear-gradient(#f5f5f5,#ffffff, #ffffff,#ffffff)!important;*/
   border-bottom-width:1px;
   border-bottom-style: solid;
   border-color:#ececec;
    color:#3a3a3a!important ;
    font-size:13px!important    ;

}
.bt_book{
  margin-left:4px;
  margin-top:3px;
  border:solid   0px #cccccc;
  border-radius: 5px;
  background-color:  #efefef;
  font-size: 12px;
}


.bt_book:hover{
  margin-left:4px;
  margin-top:3px;
  border:solid   0px #000000;
  border-radius: 5px;
  background-color:  #ffdd00!important  ;
  font-size: 12px;
}





.btn-set{
 border-radius:5px!important  ;
 background-color:#ffdd00;
 height:45px!important  ;
 width: 250px!important ;
 border:solid 0px #ffdd00;
 margin-bottom:10px!important ;
 color:#000000;
 text-align: left!important ;
 cursor:  pointer;  
}
.btn-notset{
 border-radius: 5px!important  ;
 background-color:#cccccc;
  height:45px!important  ;
 width: 250px!important ;
 border:solid 0px #b5b5b5;
 margin-bottom:10px!important ;
  text-align: left!important ;
  cursor:  pointer;  
}

.btn-notset:hover{
 border-radius: 5px!important  ;
 background-color:#0398db;
  height:45px!important  ;
 width: 250px!important ;
 border:solid 0px #0398db;
 margin-bottom:10px!important ;
  text-align: left!important ;
  cursor:  pointer;  
  color:#ffffff;

}
.btn-notset:hover .img_bt{
  filter: brightness(0) invert(1);
}

.tb_rever tr td{
  padding:5px!important ;margin:0px!important  ;

}






/*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
  .modal.left .modal-dialog,
  .modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 320px;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
         -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
  }

  .modal.left .modal-content,
  .modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
  }
  
  .modal.left .modal-body,
  .modal.right .modal-body {
    padding: 15px 15px 80px;
  }

/*Left*/
  .modal.left.fade .modal-dialog{
    left: -320px;
    -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
         -o-transition: opacity 0.3s linear, left 0.3s ease-out;
            transition: opacity 0.3s linear, left 0.3s ease-out;
  }
  
  .modal.left.fade.in .modal-dialog{
    left: 0;
  }
        
/*Right*/
  .modal.right.fade .modal-dialog {
    right: -320px;
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
  }
  
  .modal.right.fade.in .modal-dialog {
    right: 0;
  }

/* ----- MODAL STYLE ----- */
  .modal-content {
    border-radius: 0;
    border: none;
  }

  .modal-header {
    border-bottom-color: #EEEEEE;
    background-color: #FAFAFA;
  }

/* ----- v CAN BE DELETED v ----- */


.demo {
  padding-top: 60px;
  padding-bottom: 110px;
}

.btn-demo {
  margin: 15px;
  padding: 10px 15px;
  border-radius: 0;
  font-size: 16px;
  background-color: #FFFFFF;
}

.btn-demo:focus {
  outline: 0;
}

.demo-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  padding: 15px;
  background-color: #212121;
  text-align: center;
}

.demo-footer > a {
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  color: #fff;
}


.tbl_test tr td{
  padding: 0 !important;
  margin: 0 !important;
}
.noneborder tr td{
    padding: 0 !important;
    margin: 0 !important;
}


.find-widget .sbHolder .sbOptions{
   border-top-right-radius:0px!important;
   border-top-left-radius:0px!important;
   text-align: center!important;
   padding:0px!important;
}

.find-widget .sbHolder .sbDisabled, .find-widget .sbHolder .sbSelector, .find-widget .sbHolder a{
  /*padding: 0px!important;*/
}

div {
  font-family: 'Prompt', sans-serif!important;
}
body {
  font-family: 'Prompt', sans-serif!important;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">



<?php
function frmd($d){
$date=date_create($d);
return date_format($date,"d-M-Y");
}

function frmd_n($d){
$date=date_create($d);
return date_format($date,"d-m-Y");
}
$h_lg = $this->session->userdata('ch_lang');
if(trim($h_lg)==""){
            $data = array(
                    'ch_lang' => 'en',
                    );
            $this->session->set_userdata($data);
}

$m_id = $this->session->userdata('idget_member007');


if(trim($m_id)!=""){
            $lg = $this->Lang_fc->get_lg($m_id);
            $data = array(
                    'ch_lang' => $lg,
                    );
            $this->session->set_userdata($data);
}




$list_lang = array();
$list_lang = $this->Lang_fc->get_hd($h_lg);
$m_lg = $this->Lang_fc->get_lg_menu();
$id_typ_mem = $this->session->userdata('id_typ_mem');
$idget_member007 = $this->session->userdata('idget_member007');
$sec_url_cur = $this->session->userdata('sec_url_cur');
//$sec_hotel_sum_price = $this->session->userdata('sec_hotel_sum_price');
//echo $sec_hotel_sum_price;
?>

<!-- Simulate a smartphone / tablet -->

<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="201184597091955"
  logged_in_greeting="Welcom to khemtis.com"
  logged_out_greeting="Welcom to khemtis.com">
      </div>





<div class="mobile-container mobile_nav">
<!-- Top Navigation Menu -->
<div class="topnav">
<div style="border-bottom-style:solid!important ;border-bottom-width:1px!important  ;border-color:#d0d0d0!important ">
                                        <div class="logo">
                                            <a href="#" class="header-logo logo-black">
                                              <img src="<?php echo $pthc?>assets/images/logo/logo-black-color-1.png" class="logowid" style="margin-top:0px;height: 25px;"/>
                                            </a>
                                        </div>
</div>





<div id="myLinks">

    <a href="<?echo base_url("")?>" class="mobile_list"><img src="http://www.khemtis.com/assets/icon/hotel_icon.png" style="width:15px;">&nbsp;&nbsp;<?php echo$list_lang[0]?>
    </a>

    <a href="<?echo base_url("Transport/Routetranfer")?>" class="mobile_list"><img src="http://www.khemtis.com/assets/icon/route_con.png" style="width:17px;">&nbsp;&nbsp;<?php echo$list_lang[1]?></a>
    <a href="<?echo base_url("Packages")?>" class="mobile_list"><img src="http://www.khemtis.com/assets/icon/package_icon.png" style="width:17px;">&nbsp;&nbsp;<?php echo$list_lang[2]?></a>
    <a href="#" class="mobile_list"><img src="http://www.khemtis.com/assets/icon/dinner_icon.png" style="width:17px;">&nbsp;&nbsp;<?php echo$list_lang[3]?></a>
    <!--
    <a href="#" class="mobile_list"><img src="http://www.khemtis.com/assets/icon/hotel_icon.png" style="width:17px;">&nbsp;&nbsp;TODAY'S DEALS</a>
    <a href="#" class="mobile_list"><img src="http://www.khemtis.com/assets/icon/hotel_icon.png" style="width:17px;">&nbsp;&nbsp;CONTACT</a>
    -->
  </div>
  <a href="javascript:void(0);" class="icon txt_menu" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



</div>
<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

<?php 
 $lang_q = $this->session->userdata('ch_lang');
 $txt_dis = 'English';
if($lang_q=='th'){
      $txt_lang = "<img src='https://www.khemtis.com//assets/icon/th_lg.png' style='width:25px;'>";
       $txt_dis = 'Thai';
}else{
      $txt_lang = "<img src='https://www.khemtis.com//assets/icon/en_lg.png' style='width:25px;'>";
}
?>
<input type="hidden" id="id_typ_mem" value="<?php echo$id_typ_mem?>">










  
  <!-- Modal -->
  <div class="modal right fade" id="myModal_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <center>
<div style="width:100%;height:100px;position: absolute;margin-top:10vw;">
<div style="width:325px;height:auto;background-color:#f3f3f3;padding: 30px!important;border-radius:5px;border:solid 5px #cccccc;" class="row">
<?php
$txt_url   = "https://www.khemtis.com";
if($sec_url_cur!=""){$txt_url=$sec_url_cur;}
 ?>
 <div class="modal-header modal-header-confirm" style="background-color:#f3f3f3;">
    <h4 class="modal-title ng-binding" style="background-color:#f3f3f3;">
 <?php echo$m_lg['re_title']?><a title="Close" style="cursor:pointer;"><i style="color:#cccccc"  data-dismiss="modal" class="glyphicon glyphicon-remove icon-arrow-right pull-right"></i></a> </h4>
        
</div>
    <div style="margin-bottom: 25px;"></div>

<?php
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$show_hotel = 0;
if (strpos($actual_link,'HotelView')) {

  $show_hotel = 1;
} else {
  $show_hotel = 0;
}
 ?>



  </div>
</div>
</center>
    <div class="modal-dialog mainbox" role="document" id="box_show_list">
      <div class="modal-content">



<table style="width:100%!important"><tr><td style="padding: 0px;background-color:#ffdd00" valign="top">



<!--
<div id="icn_pay" class="icon_pay sow_icn_pay" disalbe style="cursor: pointer;margin-top:5px;padding-bottom: 20px" onclick="window.location='<?php //echo$pthc?>AllBooking'">
   <img id="imgpay" src="http://www.khemtis.com/assets/icon/payment.png" style="width:40px;">
</div>
-->

    <div style="background-color:#ffffff;border-width:0px;" class="tbl_bd_rl">
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd"><p id="show_hotel"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd"><p id="pack"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd;width:100%"><p id="boet"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd;width:100%"><p id="res"></p></div>

<div style="width:100%;height:40px!important;border:solid 0px #cccccc;margin:5px"><table style="width:100%">

  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
      <td style="padding-left:7px!important"><?php echo$m_lg['total_sum']?> :</td>
      <td style="text-align: right;"><div style="color:red;font-weight:bold;" id="all_price">&nbsp;0</div></td>
  </tr></table></div>


  <div  style="text-align:center;cursor: pointer;font-size:20px;padding-bottom: 10px;width:100%;margin-top: 20px;" > <center>  
   <input type="hidden"  name="sum_hotel_val" id="sum_hotel_val" value="0">
   <input type="hidden"  name="sum_tran_val" id="sum_tran_val" value="0">
   <input type="hidden"  name="sum_pack_val" id="sum_pack_val" value="0">
   <input type="hidden"  name="sum_res_val" id="sum_res_val" value="0">

    <form action="<?php echo$pthc?>AllBooking" method="post" name="frm_go_p" id="frm_go_p">
      <input type="hidden"  name="id_run_trans_val" id="id_run_trans_val" value="">
      <input type="hidden"  name="id_run_pack_val" id="id_run_pack_val" value="">
      <input type="hidden"  name="id_run_res_val" id="id_run_res_val" value="">
 
      </form>
           <!--  <div class="box_icon_close" style="margin-top:10px;" onclick="cls_menu()">Close</div>-->
           </center>
       </div>
</div>
</td>
</tr>
</table>
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->


<script>





function   show_book_detail(){
$('#box_show_list').css("display","block");
}

function langpage(lg){
         $.ajax({
                    url: "<?php  echo base_url('Welcome/seslang')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({lg:lg}),
                  success:function(data) {
                  window.location.reload(true);
                  }
         });
//window.location.reload(true);
}

function submit_pay(){
  $('#frm_go_p').submit();
}

function pack_link(){
  var h_d_s = $('#h_d_s').val();
  var h_ad = $('#h_ad').val();
  var h_ch = $('#h_ch').val();
  if(h_d_s!="" && h_d_s!=undefined){
    window.location='https://www.khemtis.com/Packages?str_date='+h_d_s+"&Adults="+h_ad+"&Child="+h_ch;
  }else{
    window.location='https://www.khemtis.com/Packages';
  }
}

function tran_link(){
    var h_d_s = $('#h_d_s').val();
    var h_d_e = $('#h_d_e').val();
    var h_ad = $('#h_ad').val();
    var h_ch = $('#h_ch').val();
 if(h_d_s!="" && h_d_s!=undefined){
     window.location='https://www.khemtis.com/Transport/Routetranfer?str_date='+h_d_s+'&end_date='+h_d_e+'&Adults='+h_ad+'&Child='+h_ch;
  }else{
     window.location='https://www.khemtis.com/Transport/Routetranfer';
  }
}


function res_link(){
    var h_d_s = $('#h_d_s').val();
    var h_d_e = $('#h_d_e').val();
    var h_ad = $('#h_ad').val();
    var h_ch = $('#h_ch').val();
 if(h_d_s!="" && h_d_s!=undefined){
     window.location='https://www.khemtis.com/Resturants?str_date='+h_d_s+'&Adults='+h_ad+'&Child='+h_ch;
  }else{
     window.location='https://www.khemtis.com/Resturants';
  }
}


function hotel_link(){
  var h_d_s = $('#h_d_s').val();
  //window.location='https://www.khemtis.com/Packages?str_date='+h_d_s;
}


var myVar;
chk_time();
        

   // $('#hotel').css('display','none');
    $('#boet').css('display','none');
    $('#pack').css('display','none');
    $('#res').css('display','none');


function show_pay(){

      var n1 = $('#sum_hotel_val').val();
      var n2 = $('#sum_tran_val').val();
      var n3 = $('#sum_pack_val').val();
      var n4 = $('#sum_res_val').val();

      $('#box_icon_pay').css("display","none");
     if(n1>0){$('#box_icon_pay').css("display","block");}
      if(n2>0){$('#box_icon_pay').css("display","block");}
      if(n3>0){$('#box_icon_pay').css("display","block");}
      if(n4>0){$('#box_icon_pay').css("display","block");}


}




page_load_first();

function page_load_first(){


      if($('#sum_res_val').val()>0 && $('#sum_res_val').val()!=""){
 $('#bt4').css('display','block');
 clk_menu(4);
   }else{
 $('#bt4').css('display','none');
   }



      if($('#sum_pack_val').val()>0 && $('#sum_pack_val').val()!=""){
 $('#bt3').css('display','block');
 clk_menu(3);
   }else{
 $('#bt3').css('display','none');
   }



      if($('#sum_tran_val').val()>0 && $('#sum_tran_val').val()!=""){
 $('#bt2').css('display','block');
clk_menu(2);
   }else{
 $('#bt2').css('display','none');
   }



      if($('#sum_hotel_val').val()>0 && $('#sum_hotel_val').val()!=""){
 $('#bt1').css('display','block');
 clk_menu(1);
   }else{
 $('#bt1').css('display','none');
   }
show_pay();
}







function page_load(){


      if($('#sum_res_val').val()>0 && $('#sum_res_val').val()!=""){
 $('#bt4').css('display','block');
   }else{
 $('#bt4').css('display','none');
   }

      if($('#sum_pack_val').val()>0 && $('#sum_pack_val').val()!=""){
 $('#bt3').css('display','block');
   }else{
 $('#bt3').css('display','none');
   }

      if($('#sum_tran_val').val()>0 && $('#sum_tran_val').val()!=""){
 $('#bt2').css('display','block');
   }else{
 $('#bt2').css('display','none');
   }

      if($('#sum_hotel_val').val()>0 && $('#sum_hotel_val').val()!=""){
 $('#bt1').css('display','block');
   }else{
 $('#bt1').css('display','none');
   }
show_pay();
}






function chk_time(){

        $('#menu_right').css("display","block");
        $('#menu_hs').css("display","none");
        f_menu_right();
    //myVar = setTimeout(f_menu_right, 1);
}


function f_menu_right(){
    $('#menu_right').css("display","none");
    $('#menu_hs').css("display","block");
}


function f_menu_right_sh(){
 // page_load();
    $('#myModal_book').modal('toggle');
    $('#menu_right').css("display","block");

   // $('#menu_hs').css("display","none");
}




    chk(<?php echo$test?>);
    show_booklist(1,0);
    show_packlist();
    show_tansklist();
    show_reslist();

/*
    function gotoBooking(){
       window.location="HotelBooking?data=true<?php //echo$lastpara?>";
    }
*/
var ch_hotel =0;
var ch_trans =0;
var ch_packa =0;
var ch_res =0;
function show_booklist(idhd,max_room_hotel){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_booking_list_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:idhd,max_room_hotel:max_room_hotel}),
                  success:function(data) {
                     ch_hotel = data.length;
                   //  if(ch_hotel>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
                     showallbook();
                     $('#show_hotel').html(data);
                     $('#sum_hotel_val').val($('#sum_hotel').val());
                    
   sumprice_all();
   page_load();
                   
                  }
         });
}


function show_packlist(){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_book_package_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:0}),
                  success:function(data) {
                     ch_packa = data.length;
                   //  if(ch_packa>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
                     showallbook();
                     $('#pack').html(data);
                     $('#id_run_pack_val').val($('#id_run_pack').val());
                     $('#sum_pack_val').val($('#sum_pack').val());
                 
   sumprice_all();
   page_load();                   
                  }
         });
}


function show_tansklist(){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_booking_transport_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:0}),
                  success:function(data) {
                     ch_trans = data.length;
                     //if(ch_trans>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
                     showallbook();
                     $('#boet').html(data);
                     $('#id_run_trans_val').val($('#id_run_trans').val());
                     $('#sum_tran_val').val($('#sum_tran').val());
                    
   sumprice_all();
   page_load();
                  }
         });
}


function show_reslist(){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_booking_res_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:0}),
                  success:function(data){
                 
                     ch_res = data.length;
                    // if(ch_res>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
                     
                     showallbook();
                     $('#res').html(data);
                     $('#id_run_res_val').val($('#id_run_res').val());
                     $('#sum_res_val').val($('#sum_res').val());
     sumprice_all();      
     page_load();          
                  }
         });
}


function crf(num) {
  return   num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}



function sumprice_all(){
  var sumall = 0;
      var pr1 = $('#sum_hotel_val').val()*1;
      var pr2 = $('#sum_tran_val').val()*1;
      var pr3 = $('#sum_pack_val').val()*1;
      var pr4 = $('#sum_res_val').val()*1;

   sumall = (pr1+pr2+pr3+pr4)*1;
   $('#all_price').empty();
   $('#all_price').html(" "+crf(sumall));
}

function  showallbook(){
   if(ch_hotel>0 || ch_packa>0 || ch_packa>0 || ch_res>0){
     $('#imgpay').removeClass('imgdis');
   }else{
     $('#imgpay').addClass('imgdis');
   }
}


function  clk_menu(n){

    $('#icn_pay').removeClass("sow_icn_pay");
    $('#icn_pay').addClass("hid_icn_pay");

    $('#hotel').css('display','none');
    $('#boet').css('display','none');
    $('#pack').css('display','none');
    $('#res').css('display','none');

     $('#menu_right').addClass("menu_act");
     if(n==1){cls_all();show_booklist();$('#bt1').addClass("fix_cl");$('#hotel').css('display','block');}
     if(n==2){cls_all();show_tansklist();$('#bt2').addClass("fix_cl");$('#boet').css('display','block');}
     if(n==3){cls_all();show_packlist();$('#bt3').addClass("fix_cl");$('#pack').css('display','block');}
     if(n==4){cls_all();show_reslist();$('#bt4').addClass("fix_cl");$('#res').css('display','block');}
}


function  cls_all(){
 $('#bt1').removeClass("fix_cl");
 $('#bt2').removeClass("fix_cl");  
 $('#bt3').removeClass("fix_cl"); 
 $('#bt4').removeClass("fix_cl"); 

 $('#bt1').removeClass("clck_ch");
 $('#bt2').removeClass("clck_ch");  
 $('#bt3').removeClass("clck_ch"); 
 $('#bt4').removeClass("clck_ch"); 
}





        </script>