        <!-- start header -->

        <div class="page-header navbar navbar-fixed-top">
           <div class="page-header-inner ">
               <!-- logo start -->
                <div class="page-logo">
                   <div>
                    <img alt="" src="assets/img/logo-black-color-1.png">
                   </div>
                    <div class="logo-default" ><font color="#1777a4">Control</font> Khemtis</div> 
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
 						
                        <!-- end message dropdown -->
 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="assets/img/dp.jpg" />User : 
                                <span class="username username-hide-on-mobile"><?php echo $this->session->userdata('admin_full_name')?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">                               
                                <li>
                                    <a href="#">
                                        <i class="icon-lock"></i> Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Admin_login/log_out');?>">
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
                          <a href="<?php echo ("Dashboard")?>" class="dropdown-toggle"> <i class="material-icons">dashboard</i> Dashboard</a>                          
                        </li>
                        <li class="mega-menu-dropdown ">
                            <a href="<?php echo $plink?>Admin_user" class="dropdown-toggle">  <i class="material-icons">group</i>  Admin User</a>                            
                        </li>
                         <li class="mega-menu-dropdown ">
                            <a href="<?php echo $plink?>Client_user" class="dropdown-toggle">  <i class="material-icons">people_outline</i>  Client User</a>                            
                        </li>

                                                 <li class="mega-menu-dropdown ">
                            <a href="<?php echo $plink?>Commission" class="dropdown-toggle">  <i class="material-icons">attach_money</i>  Commission</a>                            
                        </li>
                         <li class="mega-menu-dropdown ">
                            <a href="<?php echo $plink?>Client_user" class="dropdown-toggle">  <i class="material-icons">library_bookss</i>  Report Manage <i class="fa fa-angle-down"></i></a>

                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="mega-menu-submenu">


                                                   <li class="nav-item" style="height:35px;padding-top:0px!important;">
                                                        <a href="#" class="nav-link ">
                                                           <i class="fa fa-database" aria-hidden="true"></i> <span class="title">Income Report</span>
                                                        </a>
                                                    </li>

                                                   <li class="nav-item" style="height:35px;padding-top:0px!important;">
                                                        <a href="#" class="nav-link ">
                                                           <i class="fa fa-database" aria-hidden="true"></i> <span class="title">Commission Report</span>
                                                        </a>
                                                    </li>  


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>                            
                        </li>
	                    </ul>






                        
	                </div>
                </div>
            </div>
        </div>

        <!-- end sidebar menu --> 