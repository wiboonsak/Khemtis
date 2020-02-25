<?php $pthc= base_url();?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD --> 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="author" content="Me-fi.com" />
    <title>KHEMTHIS | HOTEL LIST</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?php echo $pthc?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="<?php echo $pthc?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/plugins/summernote/summernote.css" rel="stylesheet">
     <!-- morris chart -->
    <link href="<?php echo $pthc?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
    <!-- Template Styles -->
    <link href="<?php echo $pthc?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?=$pthc?>assets/img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark">
<div class="page-wrapper">

        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top" id="hdrweb">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                   <div>
                    <img alt="" src="<?=$pthc?>assets/img/logo-black-color-1.png">
                   </div>
                    <div class="logo-default" ><font color="#1777a4">Van Transfer</font> Khemtis</div> 
                </div>
                <!-- logo end -->
                <!--
                 <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn search-btn">
                          <a href="javascript:;" class="btn submit">
                             <i class="icon-magnifier"></i>
                           </a>
                        </span> 
                    </div>
                </form>
                -->
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">                        
                        <!-- start message dropdown -->
 						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge headerBadgeColor2"> 2 </span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">
                                <li class="external">
                                    <h3><span class="bold">Messages</span></h3>
                                    <span class="notification-label cyan-bgcolor">New 2</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                	<img src="<?=$pthc?>assets/img/user/user2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                	<span class="from"> Sarah Smith </span>
                                                	<span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Jatin I found you on LinkedIn... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                	<img src="<?=$pthc?>assets/img/user/user3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                	<span class="from"> John Deo </span>
                                                	<span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Fwd: Important Notice Regarding Your Domain Name... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                	<img src="<?=$pthc?>assets/img/user/user1.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                	<span class="from"> Rajesh </span>
                                                	<span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> pls take a print of attachments. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                	<img src="<?=$pthc?>assets/img/user/user8.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                	<span class="from"> Lina Smith </span>
                                                	<span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Apply for Ortho Surgeon </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                	<img src="<?=$pthc?>assets/img/user/user5.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                	<span class="from"> Jacob Ryan </span>
                                                	<span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Request for leave application. </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="#"> All Messages </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end message dropdown -->
 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="<?=$pthc?>assets/img/dp.jpg" /><font color="3f82bb">User</font> 
                                <span class="username username-hide-on-mobile"> : <?php echo $this->session->userdata('client_user_full_name')?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">                               
                                <li>
                                    <a href="#">
                                        <i class="icon-lock"></i> Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Boat_login/log_out');?>">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                       <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                             <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
	                           <i class="material-icons">settings</i>
	                        </a>
                        </li>-->
                    </ul>
                </div>
            </div>
            <?php $plink = base_url();?>
            <div class="navbar-custom">
				<div class="hor-menu hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li class="mega-menu-dropdown ">
                            <a href="<?php echo base_url("Home")?>" class="dropdown-toggle"> <i class="material-icons">dashboard</i> Dashboard</a>                           
                        </li>
                      <?php 
                            $disp = "none"; 
                            if($this->session->userdata('client_user_type')=="A"){
                                $disp = "show"; 
                            }
                      ?>

                      <li class="mega-menu-dropdown " style="display:<?php echo $disp;?>;">
                            <a href="<?php echo base_url("Home")?>" class="dropdown-toggle"> <i class="material-icons">view_list</i>Menu Service
                                <i class="fa fa-angle-down"></i>
                                <span class="arrow "></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="mega-menu-submenu">
      <?php foreach($results_service as $value){
               $sername = $value->service_cd;
               $full_name = $value->fld_valu_desc;
      ?>
                                                   <li class="nav-item" style="height:35px;padding-top:0px!important;">
                                                   
                                                        <a href="http://<?php echo ucfirst(strtolower($sername)).".localhost";?>" class="nav-link ">
                                                            <span class="title"><?php echo " ".ucfirst(strtolower($full_name))." ";?></span>
                                                        </a>
                                                    </li>
      <?php }?>     
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>                       

                        <li class="mega-menu-dropdown ">
                            <a href="<?php echo base_url("VanManageList")?>" class="dropdown-toggle"> <i class="material-icons">directions_car</i>&nbsp;Van Manage</a>                 
                        </li>
						<li class="mega-menu-dropdown ">
                            <a href="<?php echo base_url("PlacesManageList")?>" class="dropdown-toggle"> <i class="material-icons">pin_drop</i>&nbsp;Place Manage</a>                 
                        </li>

                       <!--<li class="mega-menu-dropdown ">
                            <a href="<?php// echo base_url("HotelDetail")?>" class="dropdown-toggle"> <i class="material-icons">grid_on</i>&nbsp;TEST</a>                           
                        </li>-->



	                    </ul>
	                </div>
                </div>
            </div>
        </div>


        <!-- end sidebar menu --> 