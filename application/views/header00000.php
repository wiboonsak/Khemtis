	
 <style type="text/css">
.icon_flag {
background-position: left center;
background-repeat: no-repeat;
width:  30px;
height: 23px;
border-radius: 0px;
margin-left: 0px;
padding-left: 0px; /* Or size of icon + spacing */
box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.2);

}

    .img_tm{
    display: inline-block;
    max-width: 100%;
    height: auto;
    padding-left:4px;
    line-height: 2;

    border-radius: 0px;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
a p{
    padding-left: 30px;
}
        </style>
            	<header>
                    <div class="bg-white header-02">
                        <div class="header-topbar">
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
                                        <a href="javascript:void(0)" class="language dropdown-text">
                                            <span>English</span>
                                            <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                        </a>
                                       <ul class="dropdown-topbar list-unstyled hide">

  <?php   foreach($get_lang as $lang_val){
          $naem_lang = $lang_val->fld_valu_desc;
          $icon_f = $lang_val->field1;
          $fld_valu = $lang_val->fld_valu;

  ?> 
                                            <li style="padding:0px!important;padding-left:10px!important;height: 35px!important;cursor: pointer;" onclick="link_lang('<?php echo $naem_lang?>')">
                                                <a  class="link" href="?lang=<?php echo$fld_valu?><?php echo$lastpara?>">
                                                    <table><tr><td><div class="flag flag-icon-background  icon_flag <?php echo$icon_f?>">&nbsp;</div></td>
                                                       <td style="padding-left: 10px;"><?php echo $naem_lang?></td>
                                                    </tr></table>
                                                </a>
                                            </li>


 <?php } ?>

                                        </ul>
                                    </li>
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
                                </ul>
                                <ul class="topbar-right pull-right list-unstyled list-inline login-widget">
                                    <li><button type="button" data-toggle="modal" data-target="#login" style="border: none; background: none;">Login</button></li>
                                    <li><button type="button" data-toggle="modal" data-target="#register" style="border: none; background: none;">Register</button>  </li>
                                </ul>
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
                                            <a href="index.php" class="header-logo logo-black">
                                                <img src="assets/images/logo/logo-black-color-1.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <nav class="navigation">
                                        <ul class="nav-links nav navbar-nav">
                                            <li class="dropdown active">
                                                <a href="hotel.php" class="main-menu">
                                                    <span class="text">Rooms</span>                                                    
                                                </a>                                                
                                            </li>
                                            <li>
                                                <a href="speedboat.php" class="main-menu">
                                                    <span class="text">Speedboat</span>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="airport_transfer.php" class="main-menu">
                                                    <span class="text">Airport Transfer</span>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="trip.php" class="main-menu">
                                                    <span class="text">Packages Tours</span>
                                                    <span class="icons-dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-1">
                                                    <li>
                                                        <a href="#" class="link-page">3 Days 2 Nights Koh Lipe</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="link-page">2 Days 1 Nights Koh Lipe</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="link-page">1 Day Trip Koh Lipe</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="dinner.php" class="main-menu">
                                                    <span class="text">Dinners</span>
                                                    <span class="icons-dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-1">                                                    
                                                    <li>
														<a href="#" class="link-page">Art Beach Club</a>
													</li>
													<li>
														<a href="#" class="link-page">The Steak House</a>
													</li>
													<li>
														<a href="#" class="link-page">Chill Out Bar</a>
													</li>
													<li>
														<a href="#" class="link-page">Shine Bar</a>
													</li>
													<li>
														<a href="#" class="link-page">Sugoi Teppanyaki</a>
													</li>
                                                </ul>                                                
                                            </li>
                                            <li class="dropdown">
                                                <a href="javascript:void(0)" class="main-menu">
                                                    <span class="text">Today's Deals</span>                                                    
                                                </a>                                               
                                            </li>                                            
                                            <li>
                                                <a href="contact.php" class="main-menu">
                                                    <span class="text">contact</span>
                                                </a>
                                            </li>
                                            <li class="button-search">
                                                <p class="main-menu">
                                                    <i class="fa fa-search"></i>
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="nav-search hide">
                                            <form>
                                                <input type="text" placeholder="Search" class="searchbox" />
                                                <button type="submit" class="searchbutton fa fa-search"></button>
                                            </form>
                                        </div>
                                    </nav>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>