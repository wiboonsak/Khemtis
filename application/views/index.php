<?php $pthc= base_url();?>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/font/flaticon/flaticon.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="assets/theme/t-datepicker.min.css" rel="stylesheet" type="text/css">
<link href="assets/theme/t-datepicker-blue.css" rel="stylesheet" type="text/css">

<style type="text/css">

.txt_title{
	text-align:left!important;
	font-weight: normal!important;
}


    .over_tb{
    width:100%; 
    border-collapse:collapse; 
  }
  .over_tb td{ 
    cursor: pointer;
    padding:7px; border:#4e95f4 1px solid;
  }
  /* Define the default color for all the table rows */
  .over_tb tr{
   background-color: rgba(0, 0, 0, 0.3)
   color:#cccccc;
  }
  /* Define the hover highlight color for the table row */
    .over_tb tr:hover {
         background-color: rgba(0, 0, 0, 0.8);
    }



  .search_categories_dep{
  width: 150px!important;
  cursor: pointer;  
  padding: 4px 8px 5px 10px;
  background: #fff;
  border: 1px solid #ffffff;
  border-radius: 3px;
  overflow: hidden;
  position: relative;
  font-size:17px;
}

.radio{
  cursor: pointer;
  -webkit-appearance:button;
  -moz-appearance:button;
  appearance:button;
  border:2px solid #cccccc;
  border-top-color:#cccccc;
  border-left-color:#cccccc;
  background:#fff;
  width:20px;
  height:20px;
  border-radius:50%;
}


.radio:checked{
  border:5px solid #4099ff;
}


.big{ width: 27px; height: 27px;vertical-align:middle;}
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

.bootstrap-datetimepicker-widget table td.today:before {
    content: '';
    display: inline-block;
    border: solid transparent;
    border-width: 0 0 0px 0px;
    border-bottom-color: #ffffff;
    border-top-color: rgba(0, 0, 0, 0);
    position: absolute;
    bottom: 4px;
    right: 4px;
}

.imgs{
    -webkit-filter: brightness(0) invert(1);
    filter: brightness(0) invert(1);
}
.tab-btn{
    background-color:#3c3c3c;
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

.fix_size_pro_img{
  height: 470px!important;
}


.large-2 {
  margin-left: 5px;
  float: left;
  height: 300px;
  overflow-y: scroll;
  margin-bottom: 25px;
  width: 100%;
  background: #ccc;
}

.force-overflow {
  min-height: 450px;
}

.large-2::-webkit-scrollbar-track {
  border: 0px solid #000;
  padding: 0px 0;
  background-color: #404040;
}

.large-2::-webkit-scrollbar {
  width: 10px;
}

.large-2::-webkit-scrollbar-thumb {
  border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #737272;
  border: 0px solid #000;
}
</style> 
                    <!-- WRAPPER-->
                    <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content" >
                    <section class="page-banner-2 homepage-02" style="padding-bottom: 10px">
                    <div class="container" style="height:auto;">
<?php 
 $date = date("Y-m-d");
$date1 = str_replace('-', '/', $date);
$def_add_day = date('d-M-Y',strtotime($date1 . "+1 days"));

$h_lg = $this->session->userdata('ch_lang');
$hm_ar = array();
$hm_ar = $this->Lang_fc->get_home($h_lg);
?>
<input type="hidden" id="type_page" value="1">
              <div class="row" >
                     <div class="col-md-6" style="padding-bottom:30px;">
                     <div style="margin-top: 70px"></div>
                     <div class="tab-search">
                     <div style="background-color: #ffdd00;height:auto!important;padding: 0px!important;">
                     <ul role="tablist" class="nav nav-tabs" style="background-color:#3c3c3c;padding:0px;margin:0px;"> 
                      
                                                <li role="presentation" class="tab-btn-wrapper " style="padding:0px;margin:0px;">
                                                    <a href="#hoteltab" style="border-radius:0px!important;" aria-controls="hoteltab" role="tab" data-toggle="tab" class="tab-btn">
                                                    <img src="http://www.khemtis.com/assets/icon/hotel_icon.png"  style="height:30px;margin-top: 10px;" class="imgs">
                                                    </a>
                                                </li>
                      
                                                <!--
                                                <li role="presentation" class="tab-btn-wrapper">
                                                    <a href="#cruises" aria-controls="cruises" role="tab" data-toggle="tab" class="tab-btn">
                                                        <img src="http://www.khemtis.com/assets/icon/boat01.png">
                                                    </a>
                                                </li>
                                                -->
                                                 <li role="presentation" class="tab-btn-wrapper active" style="padding:0px;margin:0px;">
                                                    <a href="#tours" style="border-radius:0px!important" aria-controls="tours" role="tab" data-toggle="tab" class="tab-btn">
                                                        <img src="http://www.khemtis.com/assets/icon/package_icon.png" style="height:30px;margin-top: 10px;" class="imgs">
                                                    </a>
                                                </li>
                                                <li role="presentation" class="tab-btn-wrapper " style="padding:0px;margin:0px;">
                                                    <a href="#car-rent" style="border-radius:0px!important" aria-controls="car-rent" role="tab" data-toggle="tab" class="tab-btn">
                                                       <img src="http://www.khemtis.com/assets/icon/route_con.png" style="height:30px;margin-top: 10px;" class="imgs">
                                                    </a>
                                                </li>
                                                

                                                
                                                <li role="presentation" class="tab-btn-wrapper" style="padding:0px;margin:0px;">
                                                    <a href="#dinner" style="border-radius:0px!important" aria-controls="dinner" role="tab" data-toggle="tab" class="tab-btn">
                                                       <img src="http://www.khemtis.com/assets/icon/dinner_icon.png" style="height:30px;margin-top: 10px;" class="imgs">
                                                    </a>
                                                </li>
                                                                    
                                            </ul>
                                            <div class="tab-content-bg" style="border-color:#ffffff;border-width:0px;border-top-style: solid;padding:20px!important;height: 422px">
                                                <div class="tab-content">
                                                <div role="tabpanel" id="hoteltab" class="tab-pane fade in" >
                                                        <div class="find-widget find-flight-widget widget">
                                                            <h4 class="title-widgets"><?php echo$hm_ar['ht_title']?></h4>
                                                            <form class="content-widget" id="form_search" action="<?php echo base_url('HotelList')?>" method="get">   <input type="hidden" value="<?php echo$lang?>" name="lang" id="lang">              
                                                                <div class="text-input small-margin-top">                                                               
                                                                   <div class="left" style="text-align: left !important">
 <!-- <label class="tb-label">Our HOTELS, RESORTS, HOSTELS</label>   -->
                                                                   <div class="select-wrapper" style="border-radius: 3px;">                    
<div class="input-group">
  <input type="text" name="txt_find" id="txt_find" class="form-control" placeholder="<?php echo$hm_ar['find_input']?>" aria-label="Amount (to the nearest dollar)" style="width:100%;border-style:none;height:40px;font-size:15px;padding-left: 5px;">
  <span class="input-group-addon" style="border-style:none;height:40px;font-size:22px;background-color:#ffffff;text-align:center"><span style="color:#cccccc;" class="fa fa-search"></span>
  </span>
</div>



                                                                            <!--<div class="fa fa-search"></div>-->
                                                                        </div>                                                                            
                                                                    </div>
                                                                </div>   
                                                                           
                                                                <div class="text-input" style="margin-top:10px;">               
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label class="tb-label" style="font-weight:normal;"><?php echo$hm_ar['ht_poly']?></label>
                                                                            <?php 
                                                                            $def_in=date("Y-m-d");
                                                                            $def_out=date('Y-m-d', strtotime(' +1 day'));
                                                                            ?>
<input type="hidden" id="book_st_n" value="<?php echo$def_in?>">
<input type="hidden" id="book_en_n" value="<?php echo$def_out?>">
<div class="t-datepicker">
  <div class="t-check-in" id="b_st" style="background-color:#ffffff"></div>
  <div class="t-check-out" id="b_en" style="background-color:#ffffff"></div>
</div>                      
                                                                        </div>
                                                                    </div>
                                                                   


                                                                    <div class="text-input" style="margin-top:10px;">
                                                                    <div class="text-box-wrapper half left outer">
                                                                        <div class="text-box-wrapper half left">
                                                                            <label class="tb-label"><?php echo$hm_ar['adu']?></label>
                                                                            <div class="select-wrapper">
                                                                               <select class="form-control custom-select selectbox" style="width:100%!important" id="Adults" name="Adults">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-box-wrapper half right">
                                                                            <label class="tb-label"><?php echo$hm_ar['chi']?></label>
                                                                            <div class="select-wrapper">
                                                                                <select class="form-control custom-select selectbox" style="width:100%!important" id="Child" name="Child">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                
                                                                    </div>
                                                                </div>
                                                                
                                                                <button  type="button" data-hover="SEARCH NOW" class="btn btn-slide small-margin-top"  onclick="search_hotel()">
                                                                    <span class="text"><a href="#" style="color:#ffffff"><?php echo$hm_ar['SEARCH']?></a></span>
                                                                    <span class="icons fa fa-arrow-right"></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div role="tabpanel" id="car-rent" class="tab-pane ">
                                                        <div class="find-widget find-flight-widget widget">
                                                            <h4 class="title-widgets" style="margin:0px!important"><?php echo$hm_ar['tr_title']?></h4>
                                                                 <form class="content-widget" action="<?php echo base_url('Transport/Routetranfer/trip_list') ?>" method="post" enctype="multipart/form-data" onsubmit="return CheckForm()" name="frm_transport" id="frm_transport">
<input type="hidden" id="travelRound" name="travelRound">                                       
<div class="col-md-12" style="float: left;margin-top:15px;">
                                                                   <span class="ffw-radio-btn-wrapper" style="margin-right:40px;">
                                                                        <input type="radio" name="flight type" value="2" id="cruises-type-1" class="big" onClick="changeSearchForm('roundTrip', this.checked)"  checked>
                                                                        <label for="cruises-type-1" class="ffw-radio-label" style="color:#383838;"><?php echo$hm_ar['round']?></label>
                                                                    </span>
                                                                    <span class="ffw-radio-btn-wrapper">
                                                                        <input type="radio" name="flight type" value="1" id="cruises-type-2" class="big" onClick="changeSearchForm('oneTrip', this.checked)">
                                                                        <label for="cruises-type-2" class="ffw-radio-label" style="color:#383838"><?php echo$hm_ar['oneway']?></label>
                                                                    </span>
 </div>
  <div class="row">
 	<div class="col-md-6" style="text-align:left!important;">
                           <label for="exampleInputEmail1" class="txt_title"><?php echo$hm_ar['Departure']?></label>
                                     <div class="select">
                                        <span hidden="true" id="formroute">From:</span>
                                             <div class="select-wrapper"  style="border-radius:5px;"> 
                                                <select id="routedata" class="search_categories_dep"  name="routedata" onchange="placedataupdate(this.value)" style="width: 100%!important;height: 35px;">
                                                    <option value="">---<?php echo$hm_ar['secl']?>---</option>
                                                    <?php
                                                    $routeData = $this->Routetranfer_model->getrouteList();
                                                    foreach ($routeData->result() as $routeData2) {
                                                    ?>
                                                        <option value="<?php echo $routeData2->begin_place_id ?>"><?php echo $routeData2->place_title ?> </option>
                                                    <?php } ?>
                                                </select>
                                              </div>
                                     </div>                                                                        
     </div>
     <div class="col-md-6" style="text-align:left!important;">                                    
                              <label for="exampleInputEmail1" class="txt_title"><?php echo$hm_ar['Arrival']?></label>
                                   <div class="select" >
                                         <span hidden="true" id="formto">To:</span>
                                             <div class="select-wrapper"  style="border-radius:5px;"> 
                                                 <select id="placedata" name="placedata" class="search_categories_dep" style="width: 100%!important;height: 35px;" >
                                                    <option value="">---<?php echo$hm_ar['secl']?>---</option>
                                                    <?php
                                                    $placeData = $this->Routetranfer_model->list_placeData();
                                                    foreach ($placeData->result() as $placeData2) {
                                                        ?>
                                                    <option value="<?php echo $placeData2->id ?>"><?php echo $placeData2->place_title ?></option>
                                                    <?php } ?>
                                                    </select>
                                               </div>
                                            </div>
</div>
<div class="row">
  <div class="col-md-6" style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;padding-left: 30px;">
                            <label for="id_start_date" class="txt_title"><?php echo$hm_ar['date_dep']?>:</label>
                            <div class="input-group date" id="startdate_trn">
                                <input type="text" value="<?php echo $def_add_day?>" name="book_st" id="book_st" placeholder="DD-MM-YY" class="form-control" style="width:100%;background-color: #ffffff;border-top-left-radius:5px!important;border-bottom-left-radius:5px!important;"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
  </div>
  <div class="col-md-6" style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;border-right-style: none;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;padding-right: 30px;">
                            <label for="id_end_date" class="txt_title"><?php echo$hm_ar['date_rep']?>:</label>
                            <div class="input-group date" id="enddate_trn">
                                <input type="text" value="<?php echo $def_add_day?>" name="book_en" id="book_en" placeholder="DD-MM-YY" class="form-control"  style="width:100%;background-color: #ffffff;border-top-left-radius:5px!important;border-bottom-left-radius:5px!important;"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
  </div>
</div>                                                  
</div>
                                                                <div class="text-input">
                                                                    <div class="text-box-wrapper half left outer">
                                                                        <div class="text-box-wrapper half left">
                                                                            <label class="tb-label"><?php echo$hm_ar['adu']?></label>
                                                                            <div class="select-wrapper">
                                                                               <select class="form-control custom-select selectbox" style="width:100%!important" id="Adults" name="Adults">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-box-wrapper half right">
                                                                            <label class="tb-label"><?php echo$hm_ar['chi']?></label>
                                                                            <div class="select-wrapper">
                                                                                <select class="form-control custom-select selectbox" style="width:100%!important" id="Child" name="Child">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <button  type="button" data-hover="SEARCH NOW" class="btn btn-slide small-margin-top"  onclick="search_transport()">
                                                                    <span class="text"><a href="#" style="color:#ffffff"><?php echo$hm_ar['SEARCH']?></a></span>
                                                                    <span class="icons fa fa-arrow-right"></span>
                                                                </button>
                                                            </form>
                                                            <center><div style="padding: 10px;"><font style="color:#8a0e24;font-weight:bold;"><?php echo$hm_ar['tr_poly']?></font></div></center>
                                                        </div>

                                                    </div>




                                                    <div role="tabpanel" id="tours" class="tab-pane fade in active" style="height:480px;">
                                                        <div class="find-widget find-flight-widget widget">
                                                            <h4 class="title-widgets"><?php echo$hm_ar['pack_title']?></h4>
                                                            <form class="content-widget" action="<?php echo base_url('Packages')?>" method="post"  enctype="multipart/form-data" id="frm_package">                                                                
                                                                <div class="text-input small-margin-top">                                                               
                                                                   <div class="left" style="text-align: left !important">
                                                                        <!--<label class="tb-label">Our Packace Tours</label>    -->
 <div class="select-wrapper" style="border-radius: 3px;">
 <div class="input-group">
  <input type="text" name="txt_find" id="txt_find" class="form-control" placeholder="<?php echo$hm_ar['find_input']?>" aria-label="Amount (to the nearest dollar)" style="width:100%;border-style:none;height:40px;font-size:15px;padding-left: 5px;">
  <span class="input-group-addon" style="border-style:none;height:40px;font-size:22px;background-color:#ffffff;text-align:center"><span style="color:#cccccc;" class="fa fa-search"></span>
  </span>
</div>
</div>                                                                            
   </div>
   </div>                                                                                                                                          
<div class="row">
<div class="col-md-12" 
  style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;padding-top:10px;border-bottom-style: none;border-top-style: none;"><label for="id_start_date" class="txt_title"><?php echo$hm_ar['date']?></label>
                            <div class="input-group date" id="startdate_pack">
                                <input type="text" value="<?php echo$def_add_day?>" name="book_pack" id="book_pack" placeholder="DD-MM-YY" class="form-control" style="width:100%;background-color: #ffffff;border-top-left-radius:5px!important;border-bottom-left-radius:5px!important;"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
</div>
<input type="hidden" name="pack_adu" id="pack_adu">
<input type="hidden" name="pack_chi" id="pack_chi">
<!--
    <div class="col-md-4" style="padding-top:10px;">
    	<label class="tb-label" style="font-weight:normal!important;"><?php //echo$hm_ar['adu']?></label>
               <div class="select-wrapper">
                   <select class="form-control custom-select selectbox" name="pack_adu">

                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                   </select>
               </div>
    </div>
    <div class="col-md-4" style="padding-top:10px;">
    	<label class="tb-label" style="font-weight:normal!important;"><?php //echo$hm_ar['chi']?></label>
                <div class="select-wrapper">
                    <select class="form-control custom-select selectbox" name="pack_chi">
                        <option value="0">0</option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                    </select>
                </div>
    </div>
  -->
</div>

                                                            
                                                                                                                                
                                                    
                                                                <button  data-hover="SEARCH NOW" onclick="search_package()" class="btn btn-slide small-margin-top">
                                                                    <span class="text"><?php echo$hm_ar['SEARCH']?></span>
                                                                    <span class="icons fa fa-long-arrow-right"></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                   
                                                    <div role="tabpanel" id="dinner" class="tab-pane fade" style="height:480px;">
                                                        <div class="find-widget find-flight-widget widget">
                                                            <h4 class="title-widgets"><?php echo$hm_ar['res_title']?></h4>
                                                            <form class="content-widget" action="<?php echo base_url('Resturants')?>" method="post"  enctype="multipart/form-data" id="frm_res">                                                                
                                                                <div class="text-input small-margin-top">                                                               
                                                                <div class="left" style="text-align: left !important">
 <div class="select-wrapper" style="border-radius: 3px;">
 <div class="input-group">
  <input type="text" name="txt_find" id="txt_find" class="form-control" placeholder="<?php echo$hm_ar['find_input']?>" aria-label="Amount (to the nearest dollar)" style="width:100%;border-style:none;height:40px;font-size:15px;padding-left: 5px;border-radius: 10px!important;">
  <span class="input-group-addon" style="border-style:none;height:40px;font-size:22px;background-color:#ffffff;text-align:center"><span style="color:#cccccc;" class="fa fa-search"></span>
  </span>
</div>
</div>                                                                          
                                               </div>
                                               </div>   
<div class="row">
<div class="col-md-4" 
  style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;padding-top:10px;border-bottom-style: none;border-top-style: none;">
                            <label for="id_start_date" class="txt_title"><?php echo$hm_ar['date']?></label>
                            <div class="input-group date" id="startdate_res">
                                <input type="text" value="<?php echo$def_add_day?>" name="book_res" id="book_res" placeholder="DD-MM-YY" class="form-control" style="width:100%;background-color: #ffffff;border-top-left-radius:5px!important;border-bottom-left-radius:5px!important;"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>

</div>
    <div class="col-md-4" style="padding-top:10px;">
    	<label class="tb-label" style="font-weight:normal!important;"><?php echo$hm_ar['adu']?></label>
               <div class="select-wrapper">
                   <select class="form-control custom-select selectbox" name="res_adu">
               
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                   </select>
               </div>
    </div>

    <div class="col-md-4" style="padding-top:10px;">
    	<label class="tb-label" style="font-weight:normal!important;"><?php echo$hm_ar['chi']?></label>
                <div class="select-wrapper">
                    <select class="form-control custom-select selectbox" name="res_chi">
                        <option value="0">0</option>
               
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                    </select>
                </div>
    </div>

</div>                   

                                                                <button type="button" data-hover="SEARCH NOW" onclick="search_res()" class="btn btn-slide small-margin-top">
                                                                    <span class="text"><?php echo$hm_ar['SEARCH']?></span>
                                                                    <span class="icons fa fa-long-arrow-right"></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                    <div class="col-md-6">                                      
                                      <div class="special-offer" style="margin:70px auto !important">
                                   
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                              <!-- Indicators -->
                                              <ol class="carousel-indicators">
                                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                              </ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">
  <?php 
  $ipro = 0;
  $active = "";
  foreach ($pro_show_sld as  $vpro) {
    $ipro++;
    $id_pro= $vpro->gp_id;
    $ipro_title= $vpro->pro_title;
    $url_img = $vpro->url_img;
   if($ipro==1){$active= "active";}else{$active="";}
  ?>
                                                <div class="item <?php echo$active?>">
                                                  <img src="http://control.khemtis.com/<?php echo$url_img?>" class="fix_size_pro_img" alt="Khemtis">
                                                </div>
                                              
<?php }?>
</div>

                                              <!-- Left and right controls -->
                                              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                        </div>
                                    </div> 
                                        
                                    <!--    <div class="container">
                                            <div class="special-offer margin-top70" style="margin-top: 150px; margin-left:50px !important">
                                            <h3 class="title-style-2">special offer</h3>
                                            <div class="special-offer-list">
                                                <div class="special-offer-layout" >
                                                    <div class="image-wrapper">
                                                        <a href="tour-view.html" class="link">
                                                            <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                        </a>
                                                        <div class="title-wrapper">
                                                            <a href="tour-view.html" class="title">11111</a>
                                                            <i class="icons flaticon-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="special-offer-layout">
                                                    <div class="image-wrapper">
                                                        <a href="tour-view.html" class="link">
                                                            <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                        </a>
                                                        <div class="title-wrapper">
                                                            <a href="tour-view.html" class="title">22222</a>
                                                            <i class="icons flaticon-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="special-offer-layout">
                                                    <div class="image-wrapper">
                                                        <a href="tour-view.html" class="link">
                                                            <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                        </a>
                                                        <div class="title-wrapper">
                                                            <a href="tour-view.html" class="title">33333</a>
                                                            <i class="icons flaticon-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="special-offer-layout">
                                                    <div class="image-wrapper">
                                                        <a href="tour-view.html" class="link">
                                                            <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                        </a>
                                                        <div class="title-wrapper">
                                                            <a href="tour-view.html" class="title">44444</a>
                                                            <i class="icons flaticon-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="special-offer-layout">
                                                    <div class="image-wrapper">
                                                        <a href="tour-view.html" class="link">
                                                            <img src="assets/images/footer/offer-20.jpg" alt="" class="img-responsive">
                                                        </a>
                                                        <div class="title-wrapper">
                                                            <a href="tour-view.html" class="title">55555</a>
                                                            <i class="icons flaticon-circle"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="tours  padding-bottom"  style="margin-bottom: 0px!important;padding-bottom:30px!important;margin-top: 30px;padding-top: 25px;">
                            <div class="container">
                                <div class="tours-wrapper">
                                    <div class="group-title">
                                        <div class="sub-title">
                                            <p class="text" style="color:#434a54;font-weight: bold; ">PACK AND GO</p>
                                           <img src="http://www.khemtis.com/assets/icon/package_icon.png" style="width:25px;">
                                        </div>
                                        <h4 class="main-title" style="font-size:27px;"><?php echo$hm_ar['pack_title_list']?></h>
                                    </div>
                                    <div >
                                        <div  style="width:100%;margin-bottom: 10px!important;">
                    
                                      <p id="show_package">&nbsp;<font style="color:#000000;font-size: 30px;">COMMING ZOON</font></p>
                                        </div>
                                        <a href="about-us.html" class="btn btn-transparent" style="margin-top: 30px!important;display: none;">more tours</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <section class="videos layout-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5" style="padding: 30px;">
                                         <div class="">
                                            <h5 class="sub-title">REVIEW VDO 
                                                <strong>AND</strong> ENJOY
                                            </h5>
                                         <div class="large-2" style="background-color: rgba(0, 0, 0, 0.3);height: 310px;" >
                                         <table class="over_tb">
                                          <?php
                                          $sid = 0;$ur_vdo="";
                                           foreach ($get_vdo_play as $v_vdo) {$sid++;
                                            if($sid==1){$ur_vdo=$v_vdo->url_img;}
                                             $pt_img1 = $v_vdo->url_img;
                                             $pt_title = $v_vdo->pro_title;
                                             $pt_img = str_replace('https://www.youtube.com/watch?v=','https://img.youtube.com/vi/',$pt_img1.'/0.jpg');
                                             $pt_vdo = str_replace('/watch?v=','/v/',$pt_img1);
                                            ?>
                                          <tr onclick="vdoplay('<?php echo$pt_vdo?>')"><td style="border:solid 0px #000000;padding: 3px!important;">
                                            <img width="80px" height="75px" src="<?php echo$pt_img?>">
                                            </td>
                                            <td style="border:solid 0px #000000;padding: 3px!important;font-size: 12px;color:#ececec;width:100%" >
                                               <?php echo$pt_title?>
                                            </td>
                                          </tr>     
                                          <?php }?>
                                          </table>
                                          </div>
                                            <a href="#"
                                                class="btn btn-maincolor" style="display:none">read more</a>
                                        </div>
                                     </div>
                                     <div class="col-md-7" style="padding: 30px;margin-bottom: 10px;">
                                          <?php 
                                             $pt_vdo = $ur_vdo;
                                             $pt_vdo = str_replace('/watch?v=','/v/',$pt_vdo);
                                          ?>
                                          
                                              <p id="vdo_play"></p>                                         
                                    
                                  </div>
                                </div>
                            </div>
                        </section>
                        <section class="hotels padding-top padding-bottom"  style="margin-bottom: 0px!important;padding-bottom:30px!important;margin-top: 0px;padding-top: 30px;">
                            <div class="container">
                                <div class="hotels-wrapper">
                                    <div class="group-title">
                                        <div class="sub-title">
                                            <p class="text" style="color:#434a54;font-weight:bold;">GUARANTEED QUALITY</p>
                                            <img src="http://www.khemtis.com/assets/icon/hotel_icon.png" style="width:20px;">
                                        </div>
                                        <h2 class="main-title" style="color:#434a54;font-size:27px;"><?php echo$hm_ar['ht_title_list']?></h2>
                                    </div>
                                    <div class="hotels-content">
                                        <div class="row hotels-list">
                          

<div id="mycontent_hotem_min_price"></div>
<script type="text/javascript">
  
vdoplay('<?php echo$pt_vdo?>');
function vdoplay(txt){

      var txt = '  <object width="100%" height="330px" style="background-color: rgba(0, 0, 0, 0.5);padding: 10px;border-radius: 3px" data="'+txt+'"></object>';  
       $('#vdo_play').empty(); 
       $('#vdo_play').append(txt);

}
      
</script>




                                            </div>                                                                               
                                           </div>
                                        <a href="hotel_list.php" class="btn btn-transparent" style="margin-top: 20px!important;display: none;">more resort</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <section class="a-fact padding-top padding-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="group-title">
                                            <div class="sub-title">
                                                <p class="text">HOW TO GET HERE</p>
                                               <img src="http://www.khemtis.com/assets/icon/package_icon.png" style="width:25px;">
                                            </div>
                                            <h2 class="main-title">Koh Lipe Transport</h2>
                                        </div>
                                        <div class="a-fact-wrapper">
                                            <p class="text">From November until early May all boats arrive on a platform in front of Pattaya Beach. Longtail boats will take you anywhere on Koh Lipe for 50 THB per person. Motorbike taxi's (with sidecar) are waiting near popular drop of points on the beach and can also take you anywhere on the island for a fixed price per person. </p>
                                            <div class="a-fact-list">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <p class="text">From Malaysia</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">From Bangkok</p>
                                                    </li>
                                                    <li>
                                                        <p class="text">Island Hopping</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="https://www.khemtis.com/Transport/Routetranfer" class="btn btn-maincolor">read more</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="a-fact-image-wrapper">
                                            <div class="a-fact-image">
                                                <a href="#" class="icons icons-1">
                                                    <i class="fa fa-ship"></i>
                                                </a>
                                                <img src="assets/images/homepage/guide-koh-lipe-blog-how-to-get-to-koh-lipe.jpg" alt="" class="img-responsive">
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
     <!---       Promotion             -- >
                        
                        <section class="news padding-top padding-bottom" style="display:none;">
                            <div class="container">
                                <div class="news-wrapper">
                                    <div class="group-title">
                                        <div class="sub-title">
                                            <p class="text">KHEMTIS.COM</p>
                                             <img src="http://www.khemtis.com/assets/icon/package_icon.png" style="width:25px;">
                                        </div>
                                        <h2 class="main-title">NEWS & PROMOTION</h2>
                                    </div>
                                    <div class="news-content margin-top70">
                                        <div class="news-list">
                                            <div class="new-layout">
                                                <div class="image-wrapper">
                                                    <a href="#" class="link">
                                                        <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="description">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</div>
                                                </div>
                                                <div class="content-wrapper">
                                                    <a href="#" class="title">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</a>
                                                    <ul class="info list-inline list-unstyled">
                                                        <li>
                                                            <a href="#" class="link">November 17, 2017 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="link">admin</a>
                                                        </li>
                                                    </ul>
                                                    <p class="text">'หลีเป๊ะ' เกาะสวรรค์และสถานที่เที่ยวในฝันของใครหลายคน หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล</p>
                                                    <p class="text">หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล ถือเป็นเกาะที่อยู่ใต้ที่สุดของทะเลอันดามันของไทย ภายในเกาะมีชายหาดสวยงาม น้ำทะเลใส แถมบริเวณรอบๆ เกาะยังเต็มไปด้วยปะการังมากมาย จึงเป็นจุดหมายปลายทางของเหล่านักดำน้ำ    เพื่อนๆ คนไหนที่กำลังจะเดินทางไปเยือนเกาะหลีเป๊ะแล้วยังไม่รู้ว่าจะพักที่ไหน กินอะไร แล้วมีกิจกรรมอะไรทำบ้าง? ตามเราไปเที่ยวหลีเป๊ะด้วยกัน กับ <strong>เที่ยวหลีเป๊ะ แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ!</strong></p>
                                                    <a href="news_detail.php" class="btn btn-maincolor">read more</a>
                                                    <div class="tags">
                                                        <div class="title-tag">tags:</div>
                                                        <ul class="list-inline list-unstyled list-tags">
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองเรือ</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองโรงแรม</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">หลีเป๊ะ</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="new-layout">
                                                <div class="image-wrapper">
                                                    <a href="#" class="link">
                                                        <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="description">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</div>
                                                </div>
                                                <div class="content-wrapper">
                                                    <a href="#" class="title">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</a>
                                                    <ul class="info list-inline list-unstyled">
                                                        <li>
                                                            <a href="#" class="link">November 17, 2017 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="link">admin</a>
                                                        </li>
                                                    </ul>
                                                    <p class="text">'หลีเป๊ะ' เกาะสวรรค์และสถานที่เที่ยวในฝันของใครหลายคน หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล</p>
                                                    <p class="text">หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล ถือเป็นเกาะที่อยู่ใต้ที่สุดของทะเลอันดามันของไทย ภายในเกาะมีชายหาดสวยงาม น้ำทะเลใส แถมบริเวณรอบๆ เกาะยังเต็มไปด้วยปะการังมากมาย จึงเป็นจุดหมายปลายทางของเหล่านักดำน้ำ    เพื่อนๆ คนไหนที่กำลังจะเดินทางไปเยือนเกาะหลีเป๊ะแล้วยังไม่รู้ว่าจะพักที่ไหน กินอะไร แล้วมีกิจกรรมอะไรทำบ้าง? ตามเราไปเที่ยวหลีเป๊ะด้วยกัน กับ <strong>เที่ยวหลีเป๊ะ แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ!</strong></p>
                                                    <a href="news_detail.php" class="btn btn-maincolor">read more</a>
                                                    <div class="tags">
                                                        <div class="title-tag">tags:</div>
                                                        <ul class="list-inline list-unstyled list-tags">
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองเรือ</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองโรงแรม</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">หลีเป๊ะ</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="new-layout">
                                                <div class="image-wrapper">
                                                    <a href="#" class="link">
                                                        <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="description">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</div>
                                                </div>
                                                <div class="content-wrapper">
                                                    <a href="#" class="title">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</a>
                                                    <ul class="info list-inline list-unstyled">
                                                        <li>
                                                            <a href="#" class="link">November 17, 2017 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="link">admin</a>
                                                        </li>
                                                    </ul>
                                                    <p class="text">'หลีเป๊ะ' เกาะสวรรค์และสถานที่เที่ยวในฝันของใครหลายคน หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล</p>
                                                    <p class="text">หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล ถือเป็นเกาะที่อยู่ใต้ที่สุดของทะเลอันดามันของไทย ภายในเกาะมีชายหาดสวยงาม น้ำทะเลใส แถมบริเวณรอบๆ เกาะยังเต็มไปด้วยปะการังมากมาย จึงเป็นจุดหมายปลายทางของเหล่านักดำน้ำ    เพื่อนๆ คนไหนที่กำลังจะเดินทางไปเยือนเกาะหลีเป๊ะแล้วยังไม่รู้ว่าจะพักที่ไหน กินอะไร แล้วมีกิจกรรมอะไรทำบ้าง? ตามเราไปเที่ยวหลีเป๊ะด้วยกัน กับ <strong>เที่ยวหลีเป๊ะ แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ!</strong></p>
                                                    <a href="news_detail.php" class="btn btn-maincolor">read more</a>
                                                    <div class="tags">
                                                        <div class="title-tag">tags:</div>
                                                        <ul class="list-inline list-unstyled list-tags">
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองเรือ</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองโรงแรม</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">หลีเป๊ะ</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="new-layout">
                                                <div class="image-wrapper">
                                                    <a href="#" class="link">
                                                        <img src="assets/images/homepage/new-1.jpg" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="description">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</div>
                                                </div>
                                                <div class="content-wrapper">
                                                    <a href="#" class="title">เที่ยว 'หลีเป๊ะ' แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ</a>
                                                    <ul class="info list-inline list-unstyled">
                                                        <li>
                                                            <a href="#" class="link">November 17, 2017 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="link">admin</a>
                                                        </li>
                                                    </ul>
                                                    <p class="text">'หลีเป๊ะ' เกาะสวรรค์และสถานที่เที่ยวในฝันของใครหลายคน หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล</p>
                                                    <p class="text">หลีเป๊ะเป็นเกาะขนาดเล็กที่ตั้งอยู่ในเขตจังหวัดสตูล ถือเป็นเกาะที่อยู่ใต้ที่สุดของทะเลอันดามันของไทย ภายในเกาะมีชายหาดสวยงาม น้ำทะเลใส แถมบริเวณรอบๆ เกาะยังเต็มไปด้วยปะการังมากมาย จึงเป็นจุดหมายปลายทางของเหล่านักดำน้ำ    เพื่อนๆ คนไหนที่กำลังจะเดินทางไปเยือนเกาะหลีเป๊ะแล้วยังไม่รู้ว่าจะพักที่ไหน กินอะไร แล้วมีกิจกรรมอะไรทำบ้าง? ตามเราไปเที่ยวหลีเป๊ะด้วยกัน กับ <strong>เที่ยวหลีเป๊ะ แบบเป๊ะเวอร์ ด้วยมินิไกด์ฉบับเดียว กินเที่ยวพักครบ!</strong></p>
                                                    <a href="news_detail.php" class="btn btn-maincolor">read more</a>
                                                    <div class="tags">
                                                        <div class="title-tag">tags:</div>
                                                        <ul class="list-inline list-unstyled list-tags">
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองเรือ</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">จองโรงแรม</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-detail.html" class="tag">หลีเป๊ะ</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- BUTTON BACK TO TOP-->
                    <div id="back-top" style="display: none">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>
                <!-- FOOTER-->
           
            </div>
        </div>





        <!--<div class="theme-setting">
            <div class="theme-loading">
                <div class="theme-loading-content">
                    <div class="dots-loader"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn-theme-setting">
                <i class="fa fa-tint"></i>
            </a>
            <div class="content-theme-setting">
                <h2 class="title">setting color</h2>
                <ul class="list-unstyled list-inline color-skins">
                    <li data-color="color-1"></li>
                    <li data-color="color-2"></li>
                    <li data-color="color-3"></li>
                    <li data-color="color-4"></li>
                    <li data-color="color-5"></li>
                    <li data-color="color-6"></li>
                    <li data-color="color-7"></li>
                    <li data-color="color-8"></li>
                    <li data-color="color-9"></li>
                    <li data-color="color-10"></li>
                </ul>
            </div>
        </div>-->

 

        <?php include("html_tool/modal_login_register.php"); ?>
        <!-- LIBRARY JS-->
        <?php           $ds_date = date('d-M-Y');
                        $de_date = date('d-M-Y', strtotime(' +1 day')); ?>

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

   






<script>



//======================================================================================================================
function placedataupdate(changeValue) {

        $.post('<?php echo base_url('Transport/Routetranfer/placedataupdate') ?>', {changeValue: changeValue},
         function (data) {
         $('#placedata').empty();
         $('#placedata').html(data);
     });
}
        

   function CheckForm() {
          var routedata = $('#routedata').val();
          var placedata = $('#placedata').val();
          var datedata = $('#book_st').val();
          var Adults = $('#Adults').val();

        
      var dateReturn = $('#book_en').val();   
        
           if ((routedata == '')) {
             alert('Please Select Form .');
             return false;
           } else if ((placedata == '')) {
             alert('Please Select To .');
             return false;
                } else if ((Adults == '0')) {
             alert('Please Select Adults .');
             return false;
        } else if ((datedata == '')) {
             alert('Please Select Depart Date .');
             return false;
       }else if($('#cruises-type-1').is(':checked')&&(dateReturn=='')){ 
        alert('Please Select Return Date .');
             return false;
           }else{

              return true;
        }}


$(document).ready(function(){

            $('#startdate_trn').datetimepicker({
       useCurrent: true,
       minDate: moment(), // Current day
       format: 'DD-MMM-YYYY'
            })

            $('#startdate_pack').datetimepicker({
       useCurrent: true,
       minDate: moment(), // Current day
       format: 'DD-MMM-YYYY'
            })

            $('#startdate_res').datetimepicker({
       useCurrent: true,
       minDate: moment(), // Current day
       format: 'DD-MMM-YYYY'
            })



            $('#startdate_trn,#enddate_trn').datetimepicker({
       useCurrent: true,
       minDate:moment().add(1, 'days'), // Current day
       format: 'DD-MMM-YYYY'
            });

           // $("#startdate_trn").datetimepicker("setDate", "20-08-2019");


            $('#startdate_trn').datetimepicker().on('dp.change', function (e) {
                var incrementDay = moment(new Date(e.date));
                incrementDay.add(0, 'days');
                $('#enddate_trn').data('DateTimePicker').minDate(incrementDay);
                $(this).data("DateTimePicker").hide();
                $('#enddate_trn').data('DateTimePicker').show();
            });
            $('#enddate_trn').datetimepicker().on('dp.change', function (e) {
                var decrementDay = moment(new Date(e.date));
                decrementDay.subtract(0, 'days');
                $('#startdate_trn').data('DateTimePicker').maxDate(decrementDay);
                $(this).data("DateTimePicker").hide();
            });



$('.t-datepicker').tDatePicker({
  // auto close after selection
  autoClose        : true,
  // animation speed in milliseconds
  durationArrowTop : 700,
  // the number of calendars
  numCalendar    : 2,
  // localization
  titleCheckIn   : 'Check In',
  titleCheckOut  : 'Check Out',
  titleToday     : 'Today',
  titleDateRange : 'night',
  titleDateRanges: 'nights',
  titleDays      : [ 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su' ],
  titleMonths    : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'Septemper', 'October', 'November', "December"],

  // the max length of the title
  titleMonthsLimitShow : 3,

  // replace moth names
  replaceTitleMonths : null,

  // e.g. 'dd-mm-yy'
  showDateTheme   : null,

  // icon options
  iconArrowTop : true,
  iconDate     : '&#x279C;',
  arrowPrev    : '&#x276E;',
  arrowNext    : '&#x276F;',
  // https://fontawesome.com/v4.7.0/icons/
  // iconDate: '<i class="li-calendar-empty"></i><i class="li-arrow-right"></i>',
  // arrowPrev: '<i class="fa fa-chevron-left"></i>',
  // arrowNext: '<i class="fa fa-chevron-right"></i>',

  // shows today title
  toDayShowTitle       : true, 

  // showss dange range title
  dateRangesShowTitle  : true,

  // highlights today
  toDayHighlighted     : false,

  // highlights next day
  nextDayHighlighted   : false,

  // an array of days
  daysOfWeekHighlighted: [0,6],

  // custom date format
  formatDate      : 'yyyy-mm-dd',

  // dateCheckIn: '25/06/2018',  // DD/MM/YY
  // dateCheckOut: '26/06/2018', // DD/MM/YY
  dateCheckIn  : null,
  dateCheckOut : null,
  startDate    : null,
  endDate      : null,

  // limits the number of months
  limitPrevMonth : 0,
  limitNextMonth : 11,

  // limits the number of days
  limitDateRanges    : 31,

  // true -> full days || false - 1 day
  showFullDateRanges : false, 

  // DATA HOLIDAYS
  // Data holidays
  fnDataEvent   : null

});

 var d_s = $('#book_st_n').val();
 var d_e = $('#book_en_n').val();

$('.t-datepicker').tDatePicker('updateCI', d_s);
$('.t-datepicker').tDatePicker('updateCO', d_e);



  });
</script>
<script src="assets/theme/t-datepicker.min.js"></script>
<script type="text/javascript">


   

window.onload=function(){


    load_backage('en');
    show_hotel_data('en',2,6,4);
    }



          function  changeSearchForm(tripType,ischecked){
              if(tripType=='roundTrip'){
                  $('#dateReturn').val('');
                    $('#dateReturn').show();
          $('#book_en').removeAttr('disabled');
          $('#book_en').css("background-color","#fff");
          $('#travelRound').val('return');  
              }else if(tripType=='oneTrip'){ 
                    $('#dateReturn').val('');
                    $('#dateReturn').show();
            $('#book_en').val('');
            $('#book_en').attr('disabled', 'disabled');
            $('#book_en').css("background-color","#eee");
            $('#travelRound').val('oneWay');
              }
          }
    
function search_transport(){
    $('#frm_transport').submit();
}

function search_package(){
    $('#frm_package').submit();
}

function search_res(){
    $('#frm_res').submit();
}

 function   changeSearchForm1(tripType,ischecked){
              
              if(tripType=='roundTrip'){
        
          $('#book_en1').removeAttr('disabled');
          $('#book_en1').css("background-color","#fff");
         // $('#travelRound').val('return');  
              }else if(tripType=='oneTrip'){ 
             
            $('#book_en1').val('');
            $('#book_en1').attr('disabled', 'disabled');
            $('#book_en1').css("background-color","#eee");
          //  $('#travelRound').val('oneWay');
              }
          }





function show_hotel_data(lang,star,c,l){

    var txt_find = "";
    var book_st = "<?php echo$ds_date?>";
    var book_en = "<?php echo$de_date?>";
    var minprice = 100;
    var maxprice = 50000;
    var pr_para = 0;
    var str_txt = "";
    var fac_txt = "";
    var hotel_ty = "";
    var p_min = 0; 
    var p_max = 6;
    /*
    for(var i=1;i<=fac_num;i++){
      if ($('#fac'+i).is(':checked')) {fac_txt.push($('#fac'+i).val());}
    }
    */
    if(minprice==0 || minprice==null){minprice=100;}
    if(maxprice==0 || maxprice==null){maxprice=max_price;}
        //alert(str_txt[0]);
 var pr_para = '&txt_find=&book_st='+book_st+'&book_en='+book_en+'&Adults=1&Child=0';


//alert("txt_find : "+txt_find+"   lang : "+lang+"   str_txt : "+str_txt+"   fac_txt : "+fac_txt+"   minprice : "+minprice+"   maxprice : "+maxprice+"   lastpara : "+pr_para+"   book_st : "+book_st+"   book_en : "+book_en+"   c : "+c+"   l : "+l+"   p_min : "+p_min+"   p_max : "+p_max+"   hotel_ty : "+hotel_ty);

 $.ajax({
                    url: "<?php echo base_url('HotelList/show_data')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({txt_find:txt_find,lang:lang,str_txt:str_txt,fac_txt:fac_txt,minprice:minprice,maxprice:maxprice,lastpara:pr_para,book_st:book_st,book_en:book_en,c:c,l:l,p_min:p_min,p_max:p_max,hotel_ty:hotel_ty,page:9}),
              success:function(data){
           
                    $('#mycontent_hotem_min_price').html(data);
              }
     });
}


  function show_pr_de(idroom){
    if($('#popup_room'+idroom).css('display')=='none'){
       $('#popup_room'+idroom).css('display','block');
       fc_room_price(idroom);
    }else{
       $('#popup_room'+idroom).css('display','none');
    }
  }


  function load_backage(lang){
  $.ajax({
       url: "<?php echo base_url('Packages/show_package')?>",
             type: "POST",
             data: ({id:0,txtfind:'none',chk_loop:1,lang:lang}),
             dataType: "html",
             
      success:function(data) {

        $('#show_package').empty();
        $('#show_package').html(data);
      },
      complete: function(){
             
      }
    });
       }




</script>

       <script type="text/javascript">
            function search_hotel() {
                var ch = true;
                //if(n1==""){$('#str_er1').css("display", "block");ch=false;}else{$('#str_er1').css("display", "none");}
                //if(n2==""){$('#str_er2').css("display", "block");ch=false;}else{$('#str_er2').css("display", "none");}
                  
                if(ch==true){
                    $('#form_search').submit();
                }
            }

        </script>
        <script>
            var logo_str = 'assets/images/logo/logo-khemtis-black.png';
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