
<!DOCTYPE html>
<?php $pthc= base_url();

//============================================================================
        $test = $this->input->get('test007');
       $test=8585;
          if(isset($test)){
             if($test==8585){
             $data = array(
                    'test007' => '8585',
                    );
            $this->session->set_userdata($data);
            }else{
                          $test = $this->session->userdata('test007');
                 }
            }else{
                          $test = $this->session->userdata('test007');     
          }
//============================================================================

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
    padding: 2px !important;
    margin: 1px !important;
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

/*
function  testdata(){

}
*/


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

<?php 
$val_hotel_id = $this->input->get("hotel_id");;
if(isset($val_hotel_id)){
$val_hotel_id = $val_hotel_id;
}?>

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
                    <div class="bg-white header-02 pc_nav">
                        <div class="header-topbar" style="background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;">
                            <div class="container">
                                <ul class="topbar-left list-unstyled pull-left">
<!--
                                    <li>
                                        <a href="javascript:void(0)" class="country dropdown-text">
                                            <span>Country</span>
                                            <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                          </a>
                                        <ul class="dropdown-topbar list-unstyled hide">
                                            <li>
                                                <a href="#" class="link">Vietnam</a>
                                            </li>
                                            <li>
                                                <a href="#" class="link">Japan</a>
                                            </li>
                                            <li>
                                                <a href="#" class="link">Korea</a>
                                            </li>
                                        </ul>
                                    </li>
-->
                                    <li>
                                      <table><tr><td style="padding-right:10px"><?echo $txt_lang?></td><td>
                                        <a href="javascript:void(0)" class="language dropdown-text">
                                            <span><?echo $txt_dis?></span>
                                            <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-topbar list-unstyled hide">
                                            <li onclick="langpage('th')" style="cursor: pointer;">
                                               <table><tr><td>
                                              <img src="https://www.khemtis.com//assets/icon/th_lg.png" style="width:30px;">
                                              </td><td>&nbsp;&nbsp;Thai</td></tr></table>
                                    
                                            </li>
                                            <li onclick="langpage('en')" style="cursor: pointer;">
                                               <table><tr><td>
                                              <img src="https://www.khemtis.com//assets/icon/en_lg.png" style="width:30px;">
                                              </td><td>&nbsp;&nbsp;English</td></tr></table>
          
                                            </li>
                                        </ul>
                                         </td></tr></table>
                                    </li>
                                    <!--
                                    <li> 
                                        <a href="javascript:void(0)" class="monney dropdown-text">
                                            <span>USD</span>
                                            <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-topbar list-unstyled hide">
                                            <li>
                                                <a href="#" class="link">THB</a>
                                            </li>
                                            <li>
                                                <a href="#" class="link">CNY</a>
                                            </li>
                                        </ul>
                                    </li>
                                -->
                                </ul>
                        
                        <ul class="list-unstyled list-inline login-widget" style="float:right;">
                        <?php if($this->session->userdata('fname_member')==""){?>
                           <li><button id="login_mh" type="button" data-toggle="modal" data-target="#login" style="border: none; background: none;font-weight: bold;"><?php echo$list_lang[5]?>
                           </button></li>
                        <?php  }else{?>
                           <li><a href="<?php echo$pthc?>Member/ProfileBook" class="link_mem" target="_black"><i class="fa fa-id-card-o"></i></a></li><a href="<?php echo$pthc?>Member/ProfileBook" class="link_mem" target="_black"><?php echo$this->session->userdata('fname_member')?>&nbsp;&nbsp;<?php echo$this->session->userdata('lname_member')?></a>
                           <li><button type="button" onclick="log_out()"  style="border: none; background: none;color:#9c1414;font-weight: bold;"><?php echo$list_lang[7]?></button></li>
                        <?php }?>
                         <?php if($this->session->userdata('fname_member')==""){?>
                        <li><button type="button" data-toggle="modal" data-target="#register" style="border: none; background: none;font-weight: bold;"><?php echo$list_lang[6]?></button></li>
                         <?php }?>
                        </ul>
                        <input type="hidden" value="<?php echo$this->session->userdata('email_member')?>" id="mem_email_chdata">
                            </div>
                        </div>
                        <div class="header-main">
                            <div class="container">
                                <div class="header-main-wrapper">
                                    <div class="hamburger-menu">
                                        <div class="hamburger-menu-wrapper">
                                            <div class="icons"></div>
                                        </div>
                                    </div>
                                    <div class="navbar-header">
                                        <div class="logo">
                                            <a href="<?echo base_url()?>" class="header-logo logo-black">
                                              <img src="<?php echo $pthc?>assets/images/logo/logo-black-color-1.png" class="logowid" style="margin-top:0px;"/>
                                            </a>
                                        </div>
                                    </div>
                                    <nav class="navigation">
                                        <ul class="nav-links nav navbar-nav">
                                            <li class="dropdown">
                                                <a href="<?echo base_url()?>" class="main-menu">
                                                    <span class="text" style="font-size:14px"><?php echo$list_lang[0]?></span>                                                    
                                                </a>                                                
                                            </li>
                                            <li class="dropdown ">
                                           <?php 

$today  = date('Y-m-d');    
$date1 = date('m-d-Y');
$date2 = str_replace('-', '/', $date1);
$tomorrow = date('Y-m-d',strtotime($date2 . "+1 days"));
                                                ?>
                                                <a href="https://www.khemtis.com/HotelList?txt_find=&t-start=<?php echo$today?>&t-end=<?php echo$tomorrow?>&Adults=1&Child=0" class="main-menu">
                                                   <span class="text" style="font-size:14px"><?php echo$list_lang[8]?></span>                                      
                                                </a>                                                
                                            </li>

                                             <li class="dropdown">
                                                <a href="<?echo base_url("Transport/Routetranfer")?>" class="main-menu">
                                                    <span class="text" style="font-size:14px"><?php echo$list_lang[1]?></span>
                                                      <!--<span class="icons-dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>-->
                                                </a>
                                              <!--
                                                 <ul class="dropdown-menu dropdown-menu-1">                                                    
                                                    <li>
                                                        <a href="<? //echo base_url("Transport/Routetranfer")?>" class="link-page">Book Transport</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="link-page">Speedboats (Chartered ship)</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="link-page">Van (Chartered Van)</a>
                                                    </li>
                                                </ul>    
                                                -->      
                                            </li>

                                             <li class="dropdown">
                                                <a href="<?echo base_url("Transport/Routetranfer")?>" class="main-menu">
                                                    <span class="text" style="font-size:14px">CHARTER</span>
                                                      <span class="icons-dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </a>
                                              
                                                 <ul class="dropdown-menu dropdown-menu-1">                                                    
                                                    <li>
                                                        <a href="<?echo base_url("Charter/Speedboat")?>" class="link-page">SPEEDBOATS</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?echo base_url("Charter/Van")?>" class="link-page">VAN</a>
                                                    </li>
                                                </ul>    
                                                     
                                            </li>
                                            


                                            <li class="dropdown">
                                                <a href="<?echo base_url("Packages")?>" class="main-menu">
                                                    <span class="text" style="font-size:14px"><?php echo$list_lang[2]?></span>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="<?echo base_url("Resturants")?>" class="main-menu">
                                                    <span class="text" style="font-size:14px"><?php echo$list_lang[3]?></span>
                                                </a>
                                            </li>
                                           
                                            <li class="dropdown">
                                                <a href="<?echo base_url("Promotion")?>" class="main-menu">
                                                    <span class="text" style="font-size:14px"><?php echo$list_lang[4]?></span>                                                    
                                                </a>                                               
                                            </li>                                            

                                           
                                        </ul>
                                    </nav>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
             


<?php 
 // $date = "15-jan-2020";
 //echo $next_date = date('Y-m-d', strtotime($date .' +1 day'));
/*

 $date1 = '27-jan-2020';
 $date2 = '01-feb-2020';

$date_f1=date_create($date1);
$date_t1=date_format($date_f1,"Y-m-d");

$date_f2=date_create($date2);
$date_t2=date_format($date_f2,"Y-m-d");





$date=date_create("2013-03-15");
echo date_format($date,"Y/m/d H:i:s");



$startTimeStamp = strtotime($date_t1);
$endTimeStamp = strtotime($date_t2);

$timeDiff = abs($endTimeStamp - $startTimeStamp);
$numberDays = $timeDiff/86400; 
$numberDays = intval($numberDays);




for($i=0;$i<=$numberDays;$i++){
echo "<br>".date('Y-m-d', strtotime($date_t1 .' +'.$i.' day'));
}
*/
?>






  
  <!-- Modal -->
  <div class="modal right fade" id="myModal_book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <center>
<div style="width:100%;height:100px;position: absolute;margin-top:10vw;">
<div style="width:325px;height:auto;background-color:#f3f3f3;padding: 30px!important;border-radius:5px;border:solid 5px #cccccc;" class="row">
<?php
$txt_url   = "https://www.khemtis.com";
if($sec_url_cur!=""){$txt_url=$sec_url_cur;}
 ?>
 <div  style="background-color:#f3f3f3;">
    <h4 class="modal-title ng-binding" style="background-color:#f3f3f3;">
 <?php echo$m_lg['re_title']?>
   </h4>
</div>
 

<?php
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$show_hotel = 0;
if (strpos($actual_link,'HotelView')) {

  $show_hotel = 1;
} else {
  $show_hotel = 0;
}
 ?>
<?php if($show_hotel==0){?>
     <div id="btr_1"><div id="b01" class="bt btn-notset bouton-image monBouton" 
      onclick="window.location='<?php echo$txt_url?>'">
      <table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/hotel_icon.png" class="img_bt" style="width:23px"></td><td><?php echo$m_lg['re_hotel']?></td></tr></table></div></div>
<?php }else{?>
      <div id="btr_1"><div id="b01" class="bt btn-notset bouton-image monBouton" 
     data-dismiss="modal">
      <table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/hotel_icon.png" class="img_bt" style="width:23px"></td><td><?php echo$m_lg['re_hotel']?></td></tr></table></div></div>   
<?php } ?>
     <div id="btr_2"><div id="b02" class="bt btn-notset bouton-image monBouton" onclick="pack_link()"><table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/package_icon.png" style="width:23px" class="img_bt"></td><td><?php echo$m_lg['re_pack']?></td></tr></table></div></div>
     <div id="btr_3"><div id="b03" class="bt btn-notset bouton-image monBouton" onclick="tran_link()"><table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/van-boat.png" style="width:23px" class="img_bt"></td><td><?php echo$m_lg['re_tran']?></td></tr></table></div></div>
     <div id="btr_4"><div id="b04" class="bt btn-notset bouton-image monBouton" onclick="res_link()"><table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/dinner_icon.png" style="width:23px" class="img_bt"></td><td><?php echo$m_lg['re_res']?></td></tr></table></div></div>
     <div id="btr_5"><div id="b05" class="bt btn-notset bouton-image monBouton" onclick="boat_link()"><table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/motorboat.png" style="width:23px" class="img_bt"></td><td><?php echo$m_lg['re_bot']?></td></tr></table></div></div>
     <div id="btr_6"><div id="b06" class="bt btn-notset bouton-image monBouton" onclick="van_link()"><table class="tb_rever"><tr><td><img src="http://www.khemtis.com/assets/icon/van.png" style="width:23px" class="img_bt"></td><td><?php echo$m_lg['re_van']?></td></tr></table></div></div>     
     <div style="width:100%">
      <table style="width:100%">
          <tr>
            <td style="padding:0px">
   <center> 
   <div class="box_icon_pay vbook" id="box_icon_view" onclick="show_book_detail()"
    style="margin-left:4px;width:80%;padding:3px;border:solid 1px #b7b7b7;border-radius:5px;background-color:#ffffff;color:#b7b7b7;font-size:16px;text-align: center;margin-bottom:10px;cursor: pointer;">view book</div>
             
   <div class="box_icon_pay" id="box_icon_pay" onclick="submit_pay() "
    style="margin-top:50px!important;margin-left:4px;width:100%!important;padding:3px;border-radius:0px;background-color:#3057d5;color:#ffffff;font-size:16px;text-align: center;cursor: pointer;">Pay</div>
    </center>
   </td>
          </tr>
      </table>
     </div>

  </div>
</div>
</center>
    <div class="modal-dialog mainbox" role="document" id="box_show_list">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="f_menu_right()"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel2"><?php echo$m_lg['book_summary']?></h4>
        </div>


<table style="width:100%!important"><tr><td style="padding: 0px;background-color:#ffdd00" valign="top">
<table>
  <tr><td>
<div   onclick="clk_menu(1,0)" id="bt1" style="padding:3px;cursor: pointer;margin-left:5px!important;margin-top:5px!important;border-radius:3px!important;width:32px!important;border:solid 1px #000000;">
<img src="http://www.khemtis.com/assets/icon/hotel_icon.png" style="width:23px;" >
</div>
</td><td>
<div   onclick="clk_menu(2,0)" id="bt2" style="padding:3px;cursor: pointer;margin-left:5px!important;margin-top:5px!important;border-radius:3px!important;width:32px!important;border:solid 1px #000000;">
<img src="http://www.khemtis.com/assets/icon/van-boat.png" style="width:23px;" >
</div>
</td><td>
<div onclick="clk_menu(3,0)" id="bt3" style="padding:3px;cursor: pointer;margin-left:5px!important;margin-top:5px!important;border-radius:3px!important;width:32px!important;border:solid 1px #000000;">
<img src="http://www.khemtis.com/assets/icon/package_icon.png" style="width:23px;" >
</div>
</td><td>
<div   onclick="clk_menu(4,0)" id="bt4" style="padding:3px;cursor: pointer;margin-left:5px!important;margin-top:5px!important;border-radius:3px!important;width:32px!important;border:solid 1px #000000;">
<img src="http://www.khemtis.com/assets/icon/dinner_icon.png" style="width:23px;" >
</div>
</td><td>
<div   onclick="clk_menu(5,0)" id="bt5" style="padding:3px;cursor: pointer;margin-left:5px!important;margin-top:5px!important;border-radius:3px!important;width:32px!important;border:solid 1px #000000;">
<img src="http://www.khemtis.com/assets/icon/motorboat.png" style="width:23px;" >
</div>
</td><td>

<div  onclick="clk_menu(6,0)" id="bt6" style="padding:3px;cursor: pointer;margin-left:5px!important;margin-top:5px!important;border-radius:3px!important;width:32px!important;border:solid 1px #000000;">
<img src="http://www.khemtis.com/assets/icon/van.png" style="width:23px;" >
</div>
</td>
</tr></table>


<!--
<div id="icn_pay" class="icon_pay sow_icn_pay" disalbe style="cursor: pointer;margin-top:5px;padding-bottom: 20px" onclick="window.location='<?php //echo$pthc?>AllBooking'">
   <img id="imgpay" src="http://www.khemtis.com/assets/icon/payment.png" style="width:40px;">
</div>
-->

    <div style="background-color:#ffffff;border-width:0px;margin-top:5px!important" class="tbl_bd_rl">
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd"><p id="show_hotel"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd"><p id="pack"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd;width:100%"><p id="boet"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd;width:100%"><p id="res"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd;width:100%"><p id="boat"></p></div>
    <div id="hotel" style="border-left-style:solid;border-width:1px;border-color:#dddddd;width:100%"><p id="van"></p></div>

<div style="width:100%;height:40px!important;border:solid 0px #cccccc;margin:5px"><table style="width:100%">
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
      <td style="padding-left:7px!important"><?php echo$m_lg['total_sum']?> :</td>
      <td style="text-align: right;"><div style="color:red;font-weight:bold;" id="all_price">&nbsp;0</div>
 <input type="hidden" value="" id="sum_all_bill_kt">
      </td>
  </tr></table></div>
  <div  style="text-align:center;cursor: pointer;font-size:20px;padding-bottom: 10px;width:100%;margin-top: 20px;" > <center>  
   <input type="hidden"  name="sum_hotel_val" id="sum_hotel_val" value="0">
   <input type="hidden"  name="sum_tran_val" id="sum_tran_val" value="0">
   <input type="hidden"  name="sum_pack_val" id="sum_pack_val" value="0">
   <input type="hidden"  name="sum_res_val" id="sum_res_val" value="0">
   <input type="hidden"  name="sum_boat_val" id="sum_boat_val" value="0">
   <input type="hidden"  name="sum_van_val" id="sum_van_val" value="0">

    <form action="<?php echo$pthc?>AllBooking" method="post" name="frm_go_p" id="frm_go_p">
      <input type="hidden"  name="id_run_trans_val" id="id_run_trans_val" value="">
      <input type="hidden"  name="id_run_pack_val" id="id_run_pack_val" value="">
      <input type="hidden"  name="id_run_res_val" id="id_run_res_val" value="">
      <input type="hidden"  name="id_run_boat_val" id="id_run_boat_val" value="">
      <input type="hidden"  name="id_run_van_val" id="id_run_van_val" value="">
      
      
      <div class="box_icon_pay" id="box_icon_pay" onclick="submit_pay()"
           style="margin-left:0px;width:100%;padding: 3px 10px 3px 10px;border-radius:0px;margin-right: 0px;background-color:#3057d5;color:#ffffff">Pay</div>
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

<div class="menu_hs" id="menu_hs" onclick="f_menu_right_sh()"  style="display:none;">
<div style="padding:5px;width:60px;height:65px;background-color:#3c3c3c;border-top-left-radius:10px;border-bottom-left-radius:10px;text-align: center;color:#ffdd00">
  <center>
<table class="tbl_test" style="width:35px!important;">
<tr><td> 
 <img src="<?php echo$pthc?>assets/icon/booking_icn.png" style="width:35px;">
</td></tr>
<tr><td style="text-align:center;font-size: 12px;background-color:#3c3c3c;height:10px!important;">
  BOOK
</td></tr>
</table>
</center>
</div>
</div>
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

function boat_link(){
     window.location='https://www.khemtis.com/Charter/Speedboat';
}


function van_link(){
     window.location='https://www.khemtis.com/Charter/Van';
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
    $('#boat').css('display','none');
    $('#van').css('display','none');

function show_pay(){

      var n1 = $('#sum_hotel_val').val();
      var n2 = $('#sum_tran_val').val();
      var n3 = $('#sum_pack_val').val();
      var n4 = $('#sum_res_val').val();
      var n5 = $('#sum_boat_val').val();
      var n6 = $('#sum_van_val').val();


      $('#box_icon_pay').css("display","none");
     if(n1>0){$('#box_icon_pay').css("display","block");}
      if(n2>0){$('#box_icon_pay').css("display","block");}
      if(n3>0){$('#box_icon_pay').css("display","block");}
      if(n4>0){$('#box_icon_pay').css("display","block");}
      if(n5>0){$('#box_icon_pay').css("display","block");}
      if(n6>0){$('#box_icon_pay').css("display","block");}


}




page_load_first();

function page_load_first(){




      if($('#sum_van_val').val()>0 && $('#sum_van_val').val()!=""){

 $('#bt6').css('display','block');
 clk_menu(6,0);
   }else{
 $('#bt6').css('display','none');
   }


      if($('#sum_boat_val').val()>0 && $('#sum_boat_val').val()!=""){

 $('#bt5').css('display','block');
 clk_menu(5,0);
   }else{
 $('#bt5').css('display','none');
   }



      if($('#sum_res_val').val()>0 && $('#sum_res_val').val()!=""){
 $('#bt4').css('display','block');
 clk_menu(4,0);
   }else{
 $('#bt4').css('display','none');
   }



      if($('#sum_pack_val').val()>0 && $('#sum_pack_val').val()!=""){
 $('#bt3').css('display','block');
 clk_menu(3,0);
   }else{
 $('#bt3').css('display','none');
   }



      if($('#sum_tran_val').val()>0 && $('#sum_tran_val').val()!=""){
 $('#bt2').css('display','block');
clk_menu(2,0);
   }else{
 $('#bt2').css('display','none');
   }



      if($('#sum_hotel_val').val()>0 && $('#sum_hotel_val').val()!=""){
 $('#bt1').css('display','block');
 clk_menu(1,0);
   }else{
 $('#bt1').css('display','none');
   }
show_pay();
}







function page_load(){



      if($('#sum_van_val').val()>0 && $('#sum_van_val').val()!=""){
 $('#bt6').css('display','block');
   }else{
 $('#bt6').css('display','none');
   }


      if($('#sum_boat_val').val()>0 && $('#sum_boat_val').val()!=""){
 $('#bt5').css('display','block');
   }else{
 $('#bt5').css('display','none');
   }


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
    show_booklist(1,0,0);
    show_packlist();
    show_tansklist();
    show_reslist();
    show_boatlist();
    show_vanlist();

/*
    function gotoBooking(){
       window.location="HotelBooking?data=true<?php //echo$lastpara?>";
    }
*/

var ch_hotel =0;
var ch_trans =0;
var ch_packa =0;
var ch_res =0;
var ch_boat =0;
var ch_van = 0;

function show_booklist(idhd,max_room_hotel,st){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_booking_list_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:idhd,max_room_hotel:max_room_hotel,st:st}),
                  success:function(data) {
                     ch_hotel = data.length;
                    // if(ch_hotel>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
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


function show_boatlist(){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_booking_boat_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:0}),
                  success:function(data){
           
                     ch_boat = data.length;
                    // if(ch_res>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
                     showallbook();
                     $('#boat').html(data);
                     $('#id_run_boat_val').val($('#id_run_boat').val());
                     $('#sum_boat_val').val($('#sum_boat').val());
     sumprice_all();      
     page_load();          
                  }
         });
}



function show_vanlist(){
$('#bt_list').css("display","none");
         $.ajax({
                    url: "<?php  echo base_url('Allbook/show_booking_van_detail')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:0}),
                  success:function(data){
           
                     ch_van = data.length;
                    // if(ch_res>0){$("#box_icon_pay").css("display", "block");}else{$("#box_icon_pay").css("display", "none");}
                     showallbook();
                     $('#van').html(data);
                     $('#id_run_van_val').val($('#id_run_van').val());
                     $('#sum_van_val').val($('#sum_van').val());
     sumprice_all();      
     page_load();          
                  }
         });
}

function crf(num) {
  return   num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}



function ch_promotion(){
var hotel_id = $('#val_hotel_id').val();
var code_dec = $('#ch_promotion_code').val();
var date1 = $('#form_search').find('input[name="t-start"]').val();
var date2 = $('#form_search').find('input[name="t-end"]').val();
var email = $('#mem_email_chdata').val();

//alert(date1+":"+date1);
if(email!=""){
             $.ajax({
                    url: "<?php  echo base_url('Allbook/do_ch_promotion_code')?>",
                    datatype: 'HTML',
                    type: "POST",
                    data: ({code_dec:code_dec,hotel_id:hotel_id,date1:date1,date2:date2,email_conf:email}),
                  success:function(data) {
                    //alert(data);
                    var num_ht_total = $('#num_ht_total').val()*1;
                    var txt_ar = data.split(",");
     var sum_dis = 0;
     var sum_tol = 0;
  
   // alert(data);
                   if((data.length)>0){
                    var num_per = (txt_ar[1].split("<::>"));
                    var limit_price = (txt_ar[2].split("<::>"));
                    var pr_pre = (num_per[1] *1);
                    var pr_lit = (limit_price[1] *1);
                    sum_dis = (num_ht_total * pr_pre)  /100;
                   
                    if(sum_dis>pr_lit){
                      sum_dis = pr_lit;
                    }
                    var idgp = $('#utoid_book').val();

                         insert_user_id_code(idgp,sum_dis,code_dec,hotel_id);
      
                   }else{
                         $('#error_promotion_hotel').html("<font color='red'>Code is not available.</font>");
                   }
                  }
         });

      }else{
           $('#error_promotion_hotel').html("<font color='red'>Please login member </font>");
      }
}




function insert_user_id_code(idgp,sum_dis,code_dec,hotel_id){
               $.ajax({
                    url: "<?php  echo base_url('Allbook/do_insert_user_id_code')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idgp:idgp,sum_dis:sum_dis,code_dec:code_dec,hotel_id:hotel_id}),
                  success:function(data){
                     if(data==1){
                      clk_menu(1,data);
                   }
                  }

         });
}







function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+".00";
}



function sumprice_all(){
  var sumall = 0;
      var pr1 = $('#sum_hotel_val').val()*1;
      var pr2 = $('#sum_tran_val').val()*1;
      var pr3 = $('#sum_pack_val').val()*1;
      var pr4 = $('#sum_res_val').val()*1;
      var pr5 = $('#sum_boat_val').val()*1;
      var pr6 = $('#sum_van_val').val()*1;

   sumall = (pr1+pr2+pr3+pr4+pr5+pr6)*1;
   $('#all_price').empty();
   $('#all_price').html(" "+crf(sumall));
   $('#sum_all_bill_kt').val(sumall);
}

function  showallbook(){
   if(ch_hotel>0 || ch_packa>0 || ch_packa>0 || ch_res>0 || ch_boat >0 || ch_van > 0){
     $('#imgpay').removeClass('imgdis');
   }else{
     $('#imgpay').addClass('imgdis');
   }
}

function chk(ts){
 if(ts=='8585'){}else{window.location='https://khemtis.com/frontend/404.html';}
}

function  clk_menu(n,j){

    $('#icn_pay').removeClass("sow_icn_pay");
    $('#icn_pay').addClass("hid_icn_pay");

    $('#hotel').css('display','none');
    $('#boet').css('display','none');
    $('#pack').css('display','none');
    $('#res').css('display','none');
    $('#boat').css('display','none');
    $('#van').css('display','none');

    $('#menu_right').addClass("menu_act");
     
     if(n==1){cls_all();show_booklist(0,0,j);$('#bt1').addClass("fix_cl");$('#hotel').css('display','block');}
     if(n==2){cls_all();show_tansklist();$('#bt2').addClass("fix_cl");$('#boet').css('display','block');}
     if(n==3){cls_all();show_packlist();$('#bt3').addClass("fix_cl");$('#pack').css('display','block');}
     if(n==4){cls_all();show_reslist();$('#bt4').addClass("fix_cl");$('#res').css('display','block');}
     if(n==5){cls_all();show_boatlist();$('#bt5').addClass("fix_cl");$('#boat').css('display','block');}
     if(n==6){cls_all();show_vanlist();$('#bt6').addClass("fix_cl");$('#van').css('display','block');}
    
}


function  cls_all(){
 $('#bt1').removeClass("fix_cl");
 $('#bt2').removeClass("fix_cl");  
 $('#bt3').removeClass("fix_cl"); 
 $('#bt4').removeClass("fix_cl"); 
 $('#bt5').removeClass("fix_cl"); 

 $('#bt1').removeClass("clck_ch");
 $('#bt2').removeClass("clck_ch");  
 $('#bt3').removeClass("clck_ch"); 
 $('#bt4').removeClass("clck_ch"); 
 $('#bt5').removeClass("clck_ch"); 
}

function  cls_menu(){
    $('#icn_pay').removeClass("hid_icn_pay");
    $('#menu_right').removeClass("menu_act"); 
}


function log_out(){
         $.ajax({
                    url: "<?php  echo base_url('Welcome/logout_member')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:''}),
                  success:function(data) {
                     window.location.reload();
                  }
         });
}

function del_hotel_list(p,r){

             $.ajax({
                    url: "<?php  echo base_url('Allbook/del_hotel_list')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({pdel_id:p,rdel_id:r}),
                  success:function(data) {
                     show_booklist(0,0,0);
                     window.location.reload();
                  }
         });
}


function del_hotel_list_temp(hotel_id,txt_find,book_st,book_en,Adults,Child){
    var del_temp = $('#del_temp').val();
             $.ajax({
                    url: "<?php  echo base_url('Allbook/del_hotel_list_temp')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({del_temp:del_temp}),
                  success:function(data) {
                                      
              if(data==1){
                     show_booklist(0,0,0);
                     window.location ='https://www.khemtis.com/HotelView?hotel_id='+hotel_id+'&txt_find='+txt_find+'&book_st='+book_st+'&book_en='+book_en+'&Adults='+Adults+'&Child='+Child+'';
              }
              
                  }
         });
         
         
}


function del_trans_list(iddel){
             $.ajax({
                    url: "<?php  echo base_url('Allbook/del_trans_list')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({iddel:iddel}),
                  success:function(data) {
                     show_tansklist();
                     window.location.reload(true);
                  }
         });
}



function del_pack_list(iddel){
               $.ajax({
                    url: "<?php  echo base_url('Allbook/del_pack_list')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({iddel:iddel}),
                  success:function(data) {
                     show_packlist();
                     window.location.reload(true);
                  }
         });  
}


function del_res_list(iddel){
               $.ajax({
                    url: "<?php  echo base_url('Allbook/del_res_list')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({iddel:iddel}),
                  success:function(data) {
                     show_reslist();
                     window.location.reload(true);
                  }
         });  
}



function del_bot(iddel){

               $.ajax({
                    url: "<?php  echo base_url('Allbook/del_bot')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({iddel:iddel}),
                  success:function(data) {
                     show_reslist();
                     window.location.reload(true);
                  }
         });  
}



function del_van(iddel){
               $.ajax({
                    url: "<?php  echo base_url('Allbook/del_van')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({iddel:iddel}),
                  success:function(data) {
                     show_reslist();
                     window.location.reload(true);
                  }
         });  
}







        </script>