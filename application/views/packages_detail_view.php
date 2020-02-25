<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />
<style type="text/css">
     .chil_border{
    width: 100px;
    border-width: 1px;
    border-style: solid;
    background-color: #ffdd00;
    border-color: #ffdd00;
    height: 40px;
    text-align: center;
    line-height: 42px;
    border-radius:5px;
    margin-left:5px;
  }
.css_border{
   /*
    -webkit-box-shadow: 4px 4px 5px -2px rgba(0,0,0,0.63)!important;
    -moz-box-shadow: 4px 4px 5px -2px rgba(0,0,0,0.63)!important;
    box-shadow: 4px 4px 5px -2px rgba(0,0,0,0.63)!important;
        */
    width:100%!important;height:auto;background-color:#ffdd00;padding:30px;

    border-bottom-style: solid;
    border-width: 1px;
    border-bottom-color:#e0c200;
  }

.css_over_pack:hover {
     background-color:#ffdd00;
  }

.strikethrough {
     position: relative;
}

.loader {
  border: 3px solid  #dec000;
  border-radius: 50%;
  border-top: 3px solid #fafafa;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 0.5s linear infinite;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}



.strikethrough:before {
  position: absolute;
  content: "";
  left: 0;
  top: 50%;
  right: 0;
  border-top: 1px solid;
  border-color: inherit;
  
  -webkit-transform:rotate(-5deg);
  -moz-transform:rotate(-5deg);
  -ms-transform:rotate(-5deg);
  -o-transform:rotate(-5deg);
  transform:rotate(-5deg);
}

.sh_dowbox{
  -webkit-box-shadow: 16px 16px 5px -15px rgba(0,0,0,0.45);
-moz-box-shadow: 16px 16px 5px -15px rgba(0,0,0,0.45);
box-shadow: 16px 16px 5px -15px rgba(0,0,0,0.45);
}

div.polaroid {
  width: 284px;
  padding: 0px 0px 0px 0px;
  border: 1px solid #cccccc;
   box-shadow: 2px 2px 7px 2px #e8e8e8;
 
}

div.polaroid_con {
  width: 284px;
  padding: 0px 0px 0px 0px;
  border: 1px solid #cccccc;

  box-shadow: 2px 2px 7px 2px #e8e8e8;
  background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;
  
}


.css_your_ticket{
  padding:0px!important;
  margin:0px!important;
}



.boxtb_none tr td{
  padding: 0px !important;
  margin: 0px !important;
  border-bottom-style:none!important;
}
.boxtb_none tr th{
  padding: 0px !important;
  margin: 0px !important;
  border-bottom-style:none!important;
}



.boxtb tr td{

  padding: 5px !important;
  margin: 0px !important;
  border-bottom-style: solid;
  border-bottom-width: 1px;
  border-color: #e8e8e8;
}

.boxtb_last tr td{

  padding: 5px !important;
  margin: 0px !important;
  border-bottom-style: solid;
  border-bottom-width: 0px;
  border-color: #e8e8e8;
}

.radio{
  cursor: pointer;
  -webkit-appearance:button;
  -moz-appearance:button;
  appearance:button;
  border:4px solid #ccc;
  border-top-color:#bbb;
  border-left-color:#bbb;
  background:#fff;
  width:20px;
  height:20px;
  border-radius:50%;
}
.radio:checked{
  border:8px solid #4099ff;
}


.hov_ch{
  cursor: pointer;  
  background-color:#ffffff;
  width: 100%;
  border-width:1px;padding:4px!important;border-color:#e7e7e7;

}
.hov_sc{
  color:#39a23e;
  font-weight: bold;
}
.hov_ch:hover{
color:#138cc4;
border-bottom-style: solid!important;
border-bottom-width: 1px!important;

}

.css_bt_go1{
    background-color:#138cc4;padding:5px!important  ;color:#ffffff;
    border-radius:0px;cursor:pointer;
    border-bottom-right-radius:10px;
  border-bottom-left-radius:10px;
  border-style: 0px;
}
.css_bt_go2{
  background-color:#e8e8e8;padding:5px!important  ;
  color:#cccccc;border-radius:0px;cursor:pointer;
  border-bottom-right-radius:5px;
  border-bottom-left-radius: 5px;
}
.css_bt_go3{
  background-color:#ffffff;padding:5px!important  ;
  color:#696969;border-radius:0px;cursor:pointer;
    border-top-right-radius:5px;
  border-top-left-radius: 5px;
  text-align: left!important;

}
.navbar {
  padding-top: 20px;
}

label{margin-left: 20px;}
#datepicker{width:180px; margin: 0 20px 20px 20px;}
#datepicker > span:hover{cursor: pointer;}


.product-slider { padding: 0px; }

.product-slider #carousel { border: 1px solid #e6e6e6; margin: 0; }

.product-slider #thumbcarousel { margin: 0px 0px 0; padding: 10px 0px; }

.product-slider #thumbcarousel .item { text-align: center; }

.product-slider #thumbcarousel .item .thumb { border: 1px solid #000000; width: 20%; margin: 0 1%; display: inline-block; vertical-align: middle; cursor: pointer; max-width: 98px; }

.product-slider #thumbcarousel .item .thumb:hover { border-color: #1089c0; }

.product-slider .item img { width: 100%; height: auto; }

.carousel-control { color: #0284b8; text-align: center; text-shadow: none; font-size: 30px; width: 30px; height: 30px; line-height: 20px; top: 23%; }

.carousel-control:hover, .carousel-control:focus, .carousel-control:active { color: #333; }

.carousel-caption, .carousel-control .fa { font: normal normal normal 30px/26px FontAwesome; }
.carousel-control { background-color: rgba(0, 0, 0, 0); bottom: auto; font-size: 20px; left: 0; position: absolute; top: 30%; width: auto; }

.carousel-control.right, .carousel-control.left { background-color: rgba(0, 0, 0, 0); background-image: none; }



.over_div {
  background-image: linear-gradient(#e2e2e2, #ffffff,#e2e2e2)!important;
  width: 100%;
  height: 450px;
  border: 0px dotted black;
  overflow: hidden;
}

.box_hotel{
  position: absolute;
  top:0px;
  right: 0px;
	border-style: solid;
	border-width: 1px;
	border-color:#e7e7e7;
	border-bottom-right-radius :3px;
  border-bottom-right-radius :3px;
    color:#cccccc!important;
	width:50px;
	height:30px;
	padding-bottom: 0px!important;
	background-color: #ffffff;
	text-align: center;
}

.slcolor_fix{
   text-align:left!important;height:30px!important;padding:2px!important;padding-left: 10px!important;color:#5d5d5d!important	;border-style: solid;border-width: 0px!important;
      background-image: linear-gradient(#ffdf12, #ffdf12,#ffdf12,#ffdf12)!important;
}

.slcolor{

    text-align:left!important;height:30px!important;padding:2px!important;padding-left: 10px!important;color:#676262!important	;border-style: solid;border-width: 1px!important;
    background-color:#f5f5f5!important	;
}


.slcolor:hover{
	background-image: linear-gradient(#b3e7ff, #138cc4,#138cc4,#138cc4)!important;
	color:#ffffff!important;
}


.strikethrough {
  position: relative;
}
.strikethrough:before {
  position: absolute;
  content: "";
  left: 0;
  top: 50%;
  right: 0;
  border-top: 1px solid;
  border-color: inherit;
  
  -webkit-transform:rotate(-5deg);
  -moz-transform:rotate(-5deg);
  -ms-transform:rotate(-5deg);
  -o-transform:rotate(-5deg);
  transform:rotate(-5deg);
}
.btbook_pg{
  background-color:#40b4e7!important;
}
.btbook_pg:hover{
   background-color:#ffdd00!important;
}
.btbook_bdr{
  border-radius:5px!important;
}
.bootstrap-datetimepicker-widget table td.today:before{
      content: '';
    display: inline-block;
    border: solid transparent;
    border-width: 0 0 7px 7px;
  background-color: #d8d8d8!important;
  
    position: absolute;
    bottom: 4px;
    right: 4px;
}
.bootstrap-datetimepicker-widget table td.disabled, .bootstrap-datetimepicker-widget table td.disabled{
color:#c5c5c5!important;
}



/*---------------------------------------------------------------*/

/* The container */
.container1 {
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 8px;
  cursor: pointer;
  font-size: 13px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark1 {
  position: absolute;
  top: 6px;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #ffffff;
  color:red!important;
  border:solid 1px #cccccc;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark1 {
  background-color: #f3d617;
}

/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark1 {
  background-color: #ffffff;
  border:solid 1px #cccccc;
  color:#000000;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark1:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark1:after {
  display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark1:after {
  left: 5px;
  top: 2px;
  width: 7px;
  height: 10px;
  border: solid #585454;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}


.container_box{
  width:90%!important;
}
</style>





<script>
     function fbs_click(idimg) {
     var simg = document.getElementById(idimg);
     u=simg.src;
     // t=document.title;
     t=simg.getAttribute('alt');
     PopupCenter('','',626,436,u,t);
     //window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
    return false;
}

function PopupCenter(url, title, w, h,u,t) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft
var top = 100; //(height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t), 'sharer', 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<input type="hidden" value="<?php echo$package_id?>" id="package_id">

            <!-- WRAPPER CONTENT-->
            <div class="wrapper-content">
                <!-- HEADER-->
                <?php //include("header.php"); ?>
 <?php
 $h_lg = $this->session->userdata('ch_lang');
 $pk_ar = array();
 $pk_ar = $this->Lang_fc->package_lang($h_lg);


 ?>     

<div class="css_border">                                                            
<div class="container">
<div class="col-md-4" style="padding-bottom:5px;">
<?php
 $dt = new DateTime();
     $d= $dt->format('d');
     $m= $dt->format('M');
     $y= $dt->format('Y');

if($m==1){$txt="January";}
if($m==2){$txt="February";}
if($m==3){$txt="March";}
if($m==4){$txt="April";}
if($m==5){$txt="May";}
if($m==6){$txt="June";}
if($m==7){$txt="July";}
if($m==8){$txt="August";}
if($m==9){$txt="September";}
if($m==10){$txt="October";}
if($m==11){$txt="November";}
if($m==12){$txt="December";}

//echo $pst_book_st;
if(isset($pst_book_st)){
$def_add_day = $pst_book_st;
 $newDate = date("Y-m-d", strtotime($def_add_day));
}else{
$datec = $y."-".$m."-".$d;
$date = date("Y-m-d");
$date1 = str_replace('-', '/', $date);
 $def_add_day = date('d-M-Y',strtotime($date1 . "+1 days"));
 $newDate = date("Y-m-d", strtotime($def_add_day));
}
?>


                            <div class="input-group date" id="startdate_pack" style=" border:0px solid  #ffffff">
                                <input type="text" value="<?php echo$def_add_day?>" name="id_start_date" id="id_start_date" placeholder="DD-MM-YY" class="form-control" style="width:100%;background-color: #ffffff;border-top-left-radius:5px!important;border-bottom-left-radius:5px!important;"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>



</div>

  
<input type="hidden" value="0" id="adults">
<input type="hidden" value="0" id="child">
<input type="hidden" id="type_page" value="5">

<div class="col-md-6" style="padding-bottom:5px;">
<div class="input-group">
  <input type="text" name="txtfind" id="txtfind"   placeholder="find package"  class="form-control" aria-label="Amount (to the nearest dollar)" 
  style="width:100%;border-style:none;height:35px;font-size:15px;padding-left: 5px;border-top-left-radius:3px!important;border-bottom-left-radius:3px!important;">
  <span class="input-group-addon" style="border-style:none;height:32px;font-size:22px;background-color:#ffffff;text-align:center"><span style="color:#cccccc;" class="fa fa-search"></span></span>
</div>
</div>

  <div class="col-md-2" style="padding-bottom:5px;">                                              
   <div class="chil_border"  onclick="find_package()" style="padding-bottom:10px!important;background-color:#3c3c3c!important;height:37px!important;float:right;cursor: pointer;">
         <font color='#ffdd00'><?php echo$pk_ar['SEARCH']?></font>
      </div>
  </div>                                    
                        </div>                                      
                        </div>

                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->

                        <section class="padding-top padding-bottom" style="padding-bottom: 20px; padding-top: 20px !important">
                            <div class="container">
                                <div class="tours-wrapper">                                 
                                

                    <!-- TRIP CONTENT-->
                        <div class="page-main">
                            <div class="clearfix"></div>
                            <div class="tour-result-main padding-top padding-bottom" style="padding-bottom: 20px; padding-top: 20px !important">
                                <div class="container">

                                    <div class="result-body">
                                        <div class="row">
                                            <div class="col-md-12 main-right">
                                                <div class="tours-list">
                                                 
                                                


                                                 
  <div style="width:100%;background-color:#ffffff;height:auto;">
  <?
       $h_lg = $this->session->userdata('ch_lang');
       $date=date_create($date_book);
       $date_book =  date_format($date,"Y-m-d");
     
       $package_data = $this->Page_model->get_data_Package('none',$h_lg,$date_book);
        echo '<div class="row">';
        $i=0;
     foreach ($package_data as  $val_backage) {$i++;
        $img = "http://packagecms.khemtis.com/".$val_backage->img_name;
        $title_pack = $val_backage->package_title;
        $detail_pac = $val_backage->package_desc;
        $package_id = $val_backage->package_id;
      }
       $p_pdf = "";
     foreach ($get_detail_package  as $value_detail) {
        $imgs = "http://packagecms.khemtis.com/".$value_detail->img_name;
        $p_title = $value_detail->package_title;;
        $p_detail = $value_detail->package_desc;
        $p_pdf =  $value_detail->package_desc_file;

     }
  ?>
<!--  <img src="http://packagecms.khemtis.com/tmppack/client55/5c95bc519ad5b.jpg"  style="width:38vw;height:auto;"> -->
<div style="width:100%">
    <div class="row">
    <input type="hidden" value="<?php echo$p_title?>" id="namepack">
    <input type="hidden" value="<?php echo$p_typeid?>" id="typeid">
    <div class="col-sm-12" style="text-align:left;font-size:20px;padding-bottom: 8px;"><?php echo$p_title?></div>


    <div class="col-sm-6">
<div class="product-slider" style="width:100%!important;">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner over_div">
<?php 
$act = 0;
$idget = $this->input->get("packageid");
$variable_img = $this->Page_model->get_img_package($idget);
foreach ($variable_img as $vlimg) {$act++;$txt_act="";
   $imgm=$vlimg->img_name;
  if($act==1){$txt_act="active";}
 ?>
      <div class="item <?php echo$txt_act?>"> <img src="http://packagecms.khemtis.com/<?php echo$imgm ?>"> </div>
<?php }?>
      </div>
   </div>
<?php if($act>1){?>
  <div class="clearfix">
    <div id="thumbcarousel" class="carousel slide" data-interval="false">
      <div class="carousel-inner">
<?php
$act=0;$idac=-1;
foreach ($variable_img as $vlimg) {
     $act++;$txt_act1="";$txt_act2="";$idac++;
     $imgmd=$vlimg->img_name;
  if($act==1){$txt_act1="<div class='item active'>";$txt_act2="</div>";}
?>
          <?php echo$txt_act1?>
          <div data-target="#carousel" data-slide-to="<?php echo$idac?>" class="thumb"><img src="http://packagecms.khemtis.com/<?php echo$imgmd ?>"></div>    
<?php if($act==4){$act=1;echo"</div><div class='item'>";}  }
   if($act <= 3){echo"</div>";}
  
?>
      </div>
      <!-- /carousel-inner --> 
      <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> </div>
    <!-- /thumbcarousel --> 
  </div>
</div>
<?php }else{echo "</div>";} ?>






<!--<img src="<?php //echo$imgs?>"  style="width:100%;height:auto;">-->

<input type="hidden" value="<?php echo$adults?>" id="adults">
<input type="hidden" value="<?php echo$child?>" id="child">
<input type="text" value="" id="ar_pack_service" style="border-style:none!important;color:#ffffff;" readonly>
<input type="hidden" value="" id="ar_pack_extra">
<input type="hidden" value="" id="hotel_select">

      <div class="col-sm-12" style="text-align: left; padding:15px;padding-top:15px;"> 
      <?php echo$p_detail?>
              <center>
              <?php if($p_pdf!="none"){?>
              <div style="width:250px;padding: 5px;background-color:#138cc4;color:#ffffff;border-radius:50px;margin-top: 30px;cursor: pointer;" onclick="window.open('http://packagecms.khemtis.com/<?php echo$p_pdf?>')">
                                       PDF DOWNLOAD
              </div>    
              <?php } ?>
              </center>
    </div>                                                   
    </div>
<div class="col-sm-6">
<!--
<div class="panel polaroid_con" style="width:100%;">
<div>
<div class="row">
<div class="col-md-12"
style="text-align:center!important;border-left-style:none;border-width: 1px;border-color:#b59d00;font-size: 12px!important;padding-top:1px;border-bottom-style: none;border-top-style: none;">
  Adults: &nbsp;&nbsp;&nbsp;Child: &nbsp;&nbsp;Date: 
</div>
</div>
</div>    
</div>
-->
<div class="panel " style="width:100%">
<input type="hidden" id="date_check" value="">
<p id="show_fillter">&nbsp;</p>
<p id="show_extra">&nbsp;</p>

<div class="polaroid css_bt_go3" style="width:100%;" id="btgo">
  <table style="width:100%">
    <!--
      <tr style="font-size:14px;font-weight:bold;color:#b81807!important;padding-left: px!important">
      <td style="padding-left: 10px">DISCOUNT</td><td style="text-align:right;padding-right: 20px">0 THB</td></tr>
    -->
    <tr style="font-size:14px;font-weight:bold;">
      <td style="padding-left: 10px">TOTAL</td><td style="text-align:right;padding-right: 20px"><input type="hidden" id="ch_price_all"><p id="total_price"></p></td></tr>
  </table>
</div>
<div class="polaroid css_bt_go2"  style="width:100%;" onclick="add_booking(<?php echo$typ_book?>)"  id="btgo_conf">BOOK NOW</div>
    <input type="hidden" id="net_price" value="0">
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
                            </div>
                        </div>
                            </div>
                            </div>
                        </section>                          
                    </div>
                    <p id="test"></p>
                    <!-- BUTTON BACK TO TOP-->
                    <!--
                <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                -->
                </div>
                <!-- FOOTER-->
                <?php include("footer.php"); ?>

            </div>
        </div>
              
        <?php include("modal_login_register.php");?>
               
       <!-- LIBRARY JS-->
       <!-- LIBRARY JS-->
              <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <!--<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>-->
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

        <script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
        <script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="assets/js/pages/sidebar.js"></script>
        <script src="assets/js/pages/result.js"></script>
        <!---date_tiem--->
     
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
     <!--
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>


<script type="text/javascript">

$('#show_extra').css('display','none');

$(document).ready(function(){
            $('#startdate_pack').datetimepicker({
       useCurrent: true,
       minDate: moment(), // Current day
       format: 'DD-MMM-YYYY'
            })
            $('#startdate_pack').datetimepicker().on('dp.change', function (e) {

            });
});



function ch_person(idn,hotel_id,pty,package_id,p_room_id,dbook){
$('#hotel_select').val(hotel_id);
    var id_person = $('#id_person'+idn).val();
    var id_room = $('#id_room'+idn).val();
    var nmod =  parseFloat(id_person / 2);
if(nmod.toFixed(2)>0){
    var dv = (Math.ceil(nmod.toFixed(2)));
    $('#id_room'+idn).val(dv);
    price_person(idn,pty,package_id,p_room_id,dbook,hotel_id );
}else{}
    $('#check_box'+idn).prop('checked', true);
}



function ch_room(idn,hotel_id,pty,package_id,p_room_id,dbook){

$('#hotel_select').val(hotel_id);
    var id_person = $('#id_person'+idn).val();
    var id_room = $('#id_room'+idn).val();
    var nmod =  parseFloat(id_room * 2);
if(nmod>0){
    $('#id_person'+idn).val(nmod);
    price_person(idn,pty,package_id,p_room_id,dbook,hotel_id);
}else{}
    $('#check_box'+idn).prop('checked', true);
}







function price_person(n,pty,package_id,p_room_id,dbook,hotel_id ){
//alert(hotel_id  );
  var pk_night = $('#pk_night').val();
  var id_room =  $('#id_room'+n).val();
  var id_person = $('#id_person'+n).val();

  $.ajax({
       url: "<?php echo base_url('PackagesDetail/price_chang')?>",
             type: "POST",
             data: ({pty:pty,per_son:id_person,room:id_room,p_room_id:p_room_id,package_id:package_id,pk_night:pk_night,dbook:dbook}),
             dataType: "html",
      success:function(data) {
          $('#idprice'+n).html(ncom(data));
          $('#room_price'+n).val(data);
          typ_extra('',hotel_id );

      },
      complete: function(){     
      

      }
    });

   
    
}


function ncom(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}




function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}


function load_data_min_max(){
	var minmax = 0;
	return minmax;
}


function add_insert(){


}


function update_data(){


}






function add_booking(ty){

if(ty==99){
var date_depart = $('#id_start_date').val();
//alert(date_depart);
var package_id = $('#package_id').val();
var ad_pr = $('#hid_p1').val();
var ld_pr = $('#hid_p2').val();
var sg_pr = $('#hid_p3').val();
var Adults = $('#ad_num_not').val();
var Child = $('#ch_num_not').val();
var Single = $('#sg_num_not').val();

//alert(Adults+"::"+Child+"::"+Single+"::"+ad_pr+"::"+ld_pr+"::"+sg_pr+"::"+package_id+"::"+date_depart+"::"+ty);

   $('#err_hotel').html("");
      $.ajax({
       url: "<?php echo base_url('PackagesDetail/add_pre_not_hotel')?>",
             type: "POST",
             data: ({
              ty_pack:ty,
              package_id:package_id,
              Adults:Adults,
              Child:Child,
              Single:Single,
              ad_pr:ad_pr,
              ld_pr:ld_pr,
              sg_pr:sg_pr,
              date_depart:date_depart,
              ar_pack_service:'x',
              ar_pack_extra:'x'
            }),
             dataType: "html",
      success:function(data) {        
    
       clk_menu(3);
       f_menu_right_sh();
      },
      complete: function(){   
      }
    });
}else if(ty==1 || ty==0){


var net_price = $('#net_price').val();
var package_id = $('#package_id').val();
var date_depart = $('#id_start_date').val();

var ar_pack_service = $('#ar_pack_service').val();
var ar_pack_extra = $('#ar_pack_extra').val();

var Adults = $('#adults').val();
var Child = $('#child').val();

//alert(ar_pack_service);
//alert(ar_pack_extra);
if(net_price>0){
   $('#err_hotel').html("");
      $.ajax({
       url: "<?php echo base_url('PackagesDetail/add_pre_book')?>",
             type: "POST",
             data: ({
              net_price:net_price,
              ty_pack:ty,
              package_id:package_id,
              Adults:Adults,
              Child:Child,
              date_depart:date_depart,
              ar_pack_service:ar_pack_service,
              ar_pack_extra:ar_pack_extra
            }),
             dataType: "html",
      success:function(data) {    
  
       clk_menu(3);
       f_menu_right_sh();
      },
      complete: function(){   
      }
    });
}else{
   $('#err_hotel').html("<font color='red'>Select Hotel please !</font>");}
}
}







function find_package(){
     var id_start_date = $('#id_start_date').val();
     load_fillter(id_start_date);
}


function diff_hours(dt2, dt1) 
 {

  var diff =(dt2.getTime() - dt1.getTime()) / 1000;
  diff /= (60 * 60);
  return Math.abs(Math.round(diff));
  
 }

/*
function  ch_date(){
  dt1 = new Date("07-05-2019 08:11:00");
  dt2 = new Date("07-06-2019 12:11:00");
  alert(diff_hours(dt1, dt2));
}
*/

load_fillter('<?php echo$newDate?>');
  function load_fillter(dbook){
        $('#spin001').show();
      var package_id = $('#package_id').val();
      var namepack = $('#namepack').val();
      var typeid = $('#typeid').val();
      var adults = $('#adults').val();
      var child = $('#child').val();
      
  $.ajax({
       url: "<?php echo base_url('PackagesDetail/showDatapack')?>",
             type: "POST",
             data: ({dbook:dbook,packageid:package_id,namepack:namepack,typeid:typeid,adults:adults,child:child}),
             dataType: "html",    
      success:function(data) {
        $('#show_fillter').empty();
        $('#show_fillter').html(data);
        var typ_data = $('#typ_data').val();
        // show_extra_pack(typ_data);
      },
      complete: function(){     
          $('#spin001').hide();
      }
    });
  }




function ch_extra(n,num){
    var data = $('#ex_person'+n).val();
    var sum = (data*1)*(num*1);
           $('#idex_price'+n).html(ncom(sum));
           $('#ex_price'+n).val(sum);
}


function typ_extra(dbook,hotel_id){
         var pk_night = $('#pk_night').val();
         var max = $('#max_run_room').val();
         var i=0;var all_ch=1;
         var tru = 0;
         var txt=false;
         var romp = 0;
         var price_sum = 0;
         for(i=1;i<=max;i++){
            txt = $('#check_box'+i).is(':checked');
            if(txt==true){all_ch=0;
               romp =  $('#room_price'+i).val();
               price_sum = price_sum + (romp*1) ;
               var dt = $('#typ_pack'+i).val();
               if(dt==2){tru=1;}
            }
         }
        var n=0;
        var sum_ex = 0;
        var max_extra = $('#max_extra').val();
        for(n=1;n<=max_extra;n++){
            txt = $('#ex_select'+n).is(':checked');
            if(txt==true){all_ch=0;
               var prex = $('#ex_price'+n).val();
               sum_ex = sum_ex + (prex*1) ;
            }
        }
      

         if(all_ch==0){
               $('#total_price').html(ncom((price_sum + sum_ex))+' ฿');
              if((price_sum + sum_ex)>0){
                $('#btgo_conf').removeClass("css_bt_go2");
                $('#btgo_conf').addClass("css_bt_go1");
                $('#net_price').val((price_sum + sum_ex));
              }else{
                $('#btgo_conf').removeClass("css_bt_go1");
                $('#btgo_conf').addClass("css_bt_go2");
                $('#net_price').val(0);
              }
         }else{
                $('#total_price').html('0 ฿');      
         }

        var tyex = 1;

        if(tru==1){
          $('#show_extra').css('display','block');
        }else{
           if(hotel_id==0){
               $('#show_extra').css('display','block');
               
           }else{
               $('#show_extra').css('display','none');
                tyex = 0;
           }

      // sum extra non select and select
               
              if((tyex)>0){
                $('#btgo_conf').removeClass("css_bt_go2");
                $('#btgo_conf').addClass("css_bt_go1");
                $('#net_price').val((price_sum + sum_ex));
                $('#total_price').html(ncom((price_sum+sum_ex))+' ฿');
              }else{
                $('#btgo_conf').removeClass("css_bt_go2");
                $('#btgo_conf').addClass("css_bt_go1");
                $('#net_price').val((price_sum ));
                $('#total_price').html(ncom((price_sum))+' ฿');
              }

        }
   add_ar_pack(max);
   add_ar_extra(max_extra);

}




function  add_ar_pack(max){
  var ar_txt_pack = "";
  var ar_txt_ser_pack = "";
           var price_sum = 0;
           for(i=1;i<=max;i++){
            txt = $('#check_box'+i).is(':checked');
            if(txt==true){
               romp =  $('#room_price'+i).val();
               id_person =  $('#id_person'+i).val();
               id_room =  $('#id_room'+i).val();
               price_sum =  (romp*1) ;
               var id_room_txt = $('#id_room_txt'+i).val();
               var typack = $('#typack'+i).val();
               
               var txt_net_price = $('#txt_net_price'+i).val();
               var txt_sell_price = $('#txt_sell_price'+i).val();
               var txt_ser_ar = $('#txt_ser_ar'+i).val();

       ar_txt_pack = ar_txt_pack + '[:]'+romp+"<:>"+id_room_txt+"<:>"+id_person+"<:>"+id_room+"<:>"+typack+"<:>"+txt_net_price+"<:>"+txt_sell_price+"<:>"+txt_ser_ar;

              
            }
         }
         $('#ar_pack_service').val(ar_txt_pack);
}





function add_ar_extra(max_extra){
    var ar_txt_pack = "";
           var sum_ex = 0;
        for(n=1;n<=max_extra;n++){
            txt = $('#ex_select'+n).is(':checked');
            if(txt==true){
               var prex = $('#ex_price'+n).val();
               var id_extra = $('#id_extra'+n).val();
               var ex_person = $('#ex_person'+n).val();

               var txt_net_price = $('#txt_net_price_ex'+n).val();
               var txt_sell_price = $('#txt_sell_price_ex'+n).val();
               var txt_ser_ar = $('#txt_ser_ar_ex'+n).val();
               
               sum_ex =  (prex*1) ;
               ar_txt_pack = ar_txt_pack + '[:]'+sum_ex+"<:>"+id_extra+"<:>"+ex_person+"<:>"+txt_net_price+"<:>"+txt_sell_price+"<:>"+txt_ser_ar;
            }
        }
         $('#ar_pack_extra').val(ar_txt_pack);
  
}





function show_extra_pack(typ_data,package_id,hotel_id){
  var v_dbook = $('#v_dbook').val();
  /*
  alert(package_id);
  alert(hotel_id);
  alert(v_dbook);
  */
$.ajax({
       url: "<?php echo base_url('PackagesDetail/show_extra_pack')?>",
             type: "POST",
             data: ({typ_data:typ_data,package_id:package_id,hotel_id:hotel_id,v_dbook:v_dbook}),
             dataType: "html",
      success:function(data) {

        $('#show_extra').empty();
        $('#show_extra').html(data);
      
      },
      complete: function(){
      }
    });

}


            var logo_str = 'assets/images/logo/logo-black-color-1.png';
            if (Cookies.set('color-skin'))
            {
                logo_str = 'assets/images/logo/logo-black-' + Cookies.set('color-skin') + '.png';
            }
            /*
            window.loading_screen = window.pleaseWait(
            {
                logo: logo_str,
                backgroundColor: '#fff',
                loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
            });
  
            */


        </script>
    </body>
</html>