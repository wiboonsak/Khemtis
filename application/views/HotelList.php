<?php $pthc= base_url();?>
<style type="text/css">
    .center_cal {
     font-size: 16px;
     line-height: 0;
}
.cls_bt{
    text-align: center;
    background-color:#ffdd00!important;
    border-style: none!important;
    font-size: 22px;
}
.fcolor{
    font-size: 15px;
}
.fa_color{
    color:#444444;
    font-size: 18px;
}
.div_border{
    border: 1px solid #cab741;
    box-shadow: 0 7px 24px 0 rgba(0, 0, 0, .09);
    background-color: #ffdd00 ;
}
.div_valign {
  text-align: center;
    font-size: 13px;
    line-height: 1;
    margin-left: -50px!important;
    position: absolute;
    display: inline-block;
    margin-top: 10px!important;
    padding: 5px 0; 
    color: #6e747c;
}

  .bdgheader{
    background-color: #ffffff;
    padding: 30px;
     font-size: 16px;
  }
  .chil_border{
    width: 100%;
    border-width: 1px;
    border-style: solid;
    background-color: #ffffff;
    border-color: #ffdd00;
    height: 39px;
    line-height: 40px;
    border-radius:5px;
    padding-left: 10px;
    padding-right:10px;
  }
  .box_fac{
    font-size: 9pt;
    text-align: center;
    color: #464545;
    padding: 4px;
  }
  .title{
  	font-size: 15px!important;
  	color:#5f656d!important;
  	margin-bottom: 1px!important;
  }
  .borderless td, .borderless th {
    border: none!important;

}

.tblnew tr td{
  padding: 0 !important;
  margin: 0 !important;
  border: none!important;
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
.btfind{

    width: 100%;
    border-width: 1px;
    border-style: solid;
    background-color: #ffdd00;
    border-color: #cccccc;
    height: 38px;
    line-height: 40px;
    border-radius:5px;
    padding-left: 10px;
    padding-right:10px;
    background: #f2f2f2;
  background-image: -webkit-linear-gradient(top, #ffffff, #e3e3e3);
  background-image: -moz-linear-gradient(top, #ffffff, #e3e3e3);
  background-image: -ms-linear-gradient(top, #ffffff, #e3e3e3);
  background-image: -o-linear-gradient(top, #ffffff, #e3e3e3);
  background-image: linear-gradient(to bottom, #ffffff, #e3e3e3);
  color: #555555;

}
.btfind:hover{
  background-image: -webkit-linear-gradient(top, #52859c, #1a79a4);
  background-image: -moz-linear-gradient(top, #52859c, #1a79a4);
  background-image: -ms-linear-gradient(top, #52859c, #1a79a4);
  background-image: -o-linear-gradient(top, #52859c, #1a79a4);
  background-image: linear-gradient(to bottom, #52859c, #1a79a4);
  border-color: #52859c;
   color:#ffffff;
}

.loader {
  border: 3px solid  #1b7aa6;
  border-radius: 50%;
  border-top: 3px solid #fafafa;
  width: 35px;
  height: 35px;
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

.load_show{
  visibility: visible;
}
.hidd_show{
  visibility: hidden;
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



.hilight{
  width:100%!important;margin-left:-20px!important; background-image:linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,1));text-align: center!important;padding:3px;padding-left: 10px;
}

.border_lo{
  width:110px;
  padding:5px;
  color:#396fc6;
}
.border_non{
  padding:5px;
  border:1px dotted #cccccc;
  background-color:#ffffff;
}

.btn-grad {color:#ffdd00;height:39px!important;width: 90px;background-image: linear-gradient(to right, #3c3c3c 0%, #000000 51%, #3c3c3c 100%);border-radius:5px!important;border-style: none!important;}
.btn-grad:hover { background-position: right center;color:#ffffff!important; }


.sbSelector_ad{
   font-family: FontAwesome;
   font-weight: normal;
   font-style: normal;
   color:#cccccc;
   margin:8px 20px 20px 10px;
   text-decoration:none;
   display: block;
   position: absolute;
   z-index: 4;
   cursor:pointer;
}




.range-control {
  position: relative;
}

input[type=range] {
  display: block;
  width: 100%;
  margin: 0;
  -webkit-appearance: none;
  outline: none;
}

input[type=range]::-webkit-slider-runnable-track {
  position: relative;
  height: 10px;
  border: 1px solid #ffffff;
  border-radius: 0px;
  background-color: #ffdd00;
  box-shadow: inset 0 1px 2px 0 rgba(0, 0, 0, 0.1);
}

input[type=range]::-webkit-slider-thumb {
  position: relative;
  top: -6px;
  width: 20px;
  height: 20px;
  border: 1px solid #999;
  -webkit-appearance: none;
  background-color: #fff;
  box-shadow: inset 0 -1px 2px 0 rgba(0, 0, 0, 0.20);
  border-radius: 100%;
  cursor: pointer;
}

output {
  position: absolute;
  top: -50px;
  display: none;
  width: 50px;
  height: 40px;
  border: 1px solid #e2e2e2;
  background-color: #fff;
  border-radius: 3px;
  color: #777;
  font-size: .8em;
  line-height: 24px;
  text-align: center;
}

input[type=range]:active + output {
  display: block;
  transform: translateX(-50%);
}

</style>


          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/font/flaticon/flaticon.css">
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="assets/theme/t-datepicker.min.css" rel="stylesheet" type="text/css">
<link href="assets/theme/t-datepicker-blue.css" rel="stylesheet" type="text/css">

   <!--<link rel="stylesheet" type="text/css" href="<?php // echo $pthc ?>assets/font/flaticon/flaticon.css">-->
<input type="hidden" id="type_page" value="1">
        <input type="hidden" id="acc_type">
        <input type="hidden" id="val_nig">
        <input type="hidden" id="val_rat">
        <input type="hidden" id="val_fac">
  <input class="form-control datepicker" type="hidden" id="fdate" name="fdate">
  <input class="form-control datepicker" type="hidden" id="tdate" name="tdate">
  <input class="form-control" type="hidden" name="days" id="days">


                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">
<div style="width:100%;background-color:#ffdd00;height:auto  ;border-bottom-style:solid; border-width:1px;border-color:#cbb522;padding-bottom: 14px;"> 
<div class="container"> 
 <form class="content-widget" id="form_search" action="<?php echo base_url('HotelList')?>" method="get">  
 <input type="hidden" value="<?php echo$lang?>" name="lang" id="lang">         
 <center>


<div style="width:100%;margin-top:10px;border-style: none;" class="row">
  <div class="col-md-4 col-sm-12" style="padding: 5px;">
  <div class="chil_border">
  <div class="input-group">
  <input type="text" value="<?php echo$txt_search?>" onfocusout="chk_hotel()" name="txt_find" id="txt_find" class="form-control" aria-label="Amount (to the nearest dollar)"
   style="width:100%;height:37px;font-size:15px;padding-left: 5px;border-style:solid;border-color:#ffffff;border-width:1px;border-radius:5px!important;border-right-style:none!important;border-top-right-radius:0px!important;border-bottom-right-radius:0px!important;">
  <span class="input-group-addon" style="border-style:solid;border-color:#ffffff;border-width:1px;height:35px;font-size:22px;background-color:#ffffff;text-align:center"><span style="color:#cccccc;" class="fa fa-search"></span></span>
  </div>
  </div>
  </div>

      <div class="col-md-4 col-sm-12" style="padding: 5px;">                        
                              <input type="hidden"  value="<?php echo$book_st?>" name="book_st" id="book_st" readonly  placeholder="DD-MM-YY" class="form-control" style="width:100%;height:38px!important;background-color: #ffffff;cursor: pointer;border-radius: 5px!important;" />                              

                              <input type="hidden" value="<?php echo$book_en?>" name="book_en" id="book_en" readonly placeholder="DD-MM-YY" class="form-control"  style="width:100%;height:38px!important;background-color: #ffffff;cursor: pointer;border-radius: 5px!important;"/>
<div class="t-datepicker">
  <div class="t-check-in"  id="b_st" style="background-color:#ffffff;height:38px!important"></div>
  <div class="t-check-out" id="b_en" style="background-color:#ffffff;height:38px!important"></div>
</div>
</div>









<div class="col-md-3 col-sm-12">
   <div class="rows">
       <div class="col-md-6 col-sm-12" style="padding-top:4px!important;">
        
                                                                            <div class="select-wrapper" style="height:38px!important;border-style: none!important;"><div class="sbSelector_ad">Adults</div>
                                                                               <select class="form-control custom-select selectbox" style="width:100%!important;height:38px!important" id="Adults" name="Adults">
                                                                                 <?php for($i=1;$i<=10;$i++){ ?>
                                                                                    <option value="<?php echo$i?>" <?php if($Adults==$i){echo" selected";}else{echo "";}?>><?php echo$i?></option>
                                                                                 <?php }?>

                                                                                </select>
                                                                            </div>
</div>
<div class="col-md-6 col-sm-12" style="padding-top:4px!important;">
    
                                                                            <div class="select-wrapper" style="height:38px!important">
                                                                              <div class="sbSelector_ad">Child</div>
                                                                               <select class="form-control custom-select selectbox" style="width:100%!important;height:38px!important" id="Child" name="Child">
                                                                                  <?php for($i=0;$i<=10;$i++){ ?>
                                                                                    <option value="<?php echo$i?>" <?php if($Child==$i){echo" selected";}else{echo "";}?>><?php echo$i?></option>
                                                                                 <?php }?>
                                
                                                                                </select>
                                                                            </div>
      </div>
   </div>
</div>

<div class="col-md-1 col-sm-12" style="padding: 5px;">
<button type="button" class="btn btn-grad"  onclick="search_hotel()">SEARCH</button>
</div> 

</form>
 </center>

                                        </div>                                        
                                  
                                        

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="hotel-result-main padding-top padding-bottom" style="padding-top: 20px !important">
                                <div class="container">
                                    <div class="result-body">
                                        <div class="row">
                                            <div class="col-md-9 main-right">
                                                <div class="hotel-list">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
    <div class="result-meta" style="margin-bottom: 1px !important">
                                        <div class="row">   
                                         <div class="col-lg-12 col-md-3 col-sm-4">
                                                <div class="result-filter-wrapper" style="background-color:#ffffff;">
                                                    <form>         

                                                         <div class="selection-bar" style="display: none">
                                                            <label style="font-size: 12px;color:#8e8e8e";>Sort by</label>

                                                                <select name="" id="maxmin_sort"  onchange="chcmaxmin()" style="border-color:#dcdcdc;border-radius:3px;color:#8e8e8e">
                                                                    <option value="0" selected="selected">Lowest price</option>
                                                                    <option value="1" >Cheapest price</option>
                                                                </select>
                                                        
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                 </div>

 </div>
 
 <center><div id="spin001" class="loader"></div></center>
 <div id="mycontent_hotem_min_price"></div>


                                 

                                                    </div>
                                                </div>
                                        
                                            </div>

                                            <div class="col-lg-3 col-md-12 sidebar-widget per_nigth" style="display: none">
                                                <div class="price-widget widget">
                                                     <div class="title-widget" >
                                                       	 <div class="title">Choose your price per night</div>
                                                     </div>



<center>
 <div class="range-control">
    <input id="inputRange" type="range" min="500" max="5500" step="100" value="2500" data-thumbwidth="10">
    <output name="rangeVal">500</output>
  </div>

<div class="row" style="width:100%;font-size: 12px;">
  <div class="col-md-4" style="text-align:left;">500</div>
  <div class="col-md-4" style="text-align:center;">0</div>
  <div class="col-md-4" style="text-align:right;">5500</div>
</div>
</center>


          <!--
                                                     <div class="content-widget">
                                                          <div class="price-wrapper">
                                                                    <div data-range_min="0" data-range_max="<?php //echo$get_max_price?>" data-cur_min="300" data-cur_max="<?php //echo$get_max_price?>" class="nstSlider" style="cursor: pointer;">
                                                                        <div class="leftGrip indicator" onmouseup="per_nig()">
                                                                            <div class="number" id="minprice"></div>

                                                                        </div>
                                                                        <div class="rightGrip indicator" onmouseup="per_nig()">
                                                                            <div class="number" id="maxprice"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="leftLabel"><b>0</b></div>
                                                                    <div class="rightLabel"><b><?php //echo$get_max_price?></b></div>
                                                          </div>
                                                     </div>
         -->


                                                 </div>
                                            </div>
 <?php 
 $arstr = explode(",",$str_all);
 $txt_acc = "";
 $txt_fac = "";
 $txt_tat = "";
 if($lang_q=='en'){
 $txt_acc = "ACCOMMODATION";
 $txt_fac = "FACILITIES";
  $txt_tat = "rating hotel";
 }else{
 $txt_acc = "ประเภทห้องพักทั้งหมด";
 $txt_fac = "สิ่งอำนวยความสะดวอก";
  $txt_tat = "ระดับของโรงแรม";
 }

 ?>
                                          
                                            <div class="col-md-3 col-md-12  sidebar-widget " id="mobile_rating" style="display:show;">
                                                
                                                <div class="col-2">
                                                    <div class="col-2">
                                                        
                                       
                                                        <div class="turkey-cities-widget widget" id="rating_v" style="display: show">
                                                            <div class="title-widget">
                                                                <div class="title" style="font-size:15px;font-weight:bold;"><?php echo$txt_tat?></div>
                                                            </div>
                                                            <div class="content-widget">
                                                                <form class="radio-selection">
                                                                    <div class="radio-btn-wrapper">
                                                                        <input type="checkbox"  name="rating" value="5" id="1stars" class="radio-btn" onclick="set_rat(5);">
                                                                        <label for="1stars" class="radio-label stars stars5">1stars</label>
                                                                        <span class="count"><?php echo$arstr[0]?></span>
                                                                    </div>
                                                                    <div class="radio-btn-wrapper" >
                                                                        <input type="checkbox"  name="rating" value="4" id="2stars" class="radio-btn" onclick="set_rat(4);">
                                                                        <label for="2stars" class="radio-label stars stars4">2stars</label>
                                                                        <span class="count"><?php echo$arstr[1]?></span>
                                                                    </div>
                                                                    <div class="radio-btn-wrapper">
                                                                        <input type="checkbox"  name="rating" value="3" id="3stars" class="radio-btn" onclick="set_rat(3);">
                                                                        <label for="3stars" class="radio-label stars stars3">3stars</label>
                                                                        <span class="count"><?php echo$arstr[2]?></span>
                                                                    </div>
                                                                    <div class="radio-btn-wrapper">
                                                                        <input type="checkbox"  name="rating" value="2" id="4stars" class="radio-btn" onclick="set_rat(2);">
                                                                        <label for="4stars" class="radio-label stars stars2">4stars</label>
                                                                        <span class="count"><?php echo$arstr[3]?></span>
                                                                    </div>
                                                                    <div class="radio-btn-wrapper">
                                                                        <input type="checkbox"  name="rating" value="1" id="5stars" class="radio-btn" onclick="set_rat(1);">
                                                                        <label for="5stars" class="radio-label stars stars1">5stars</label>
                                                                        <span class="count"><?php echo$arstr[4]?></span>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-1 mobile_accommodation">
                                                        <div class="accommodation-widget widget">
                                                            <div class="title-widget">
                                                                <div class="title"  style="font-size:15px;font-weight:bold;"><?php echo$txt_acc?></div>
                                                            </div>
                                                            <div class="content-widget">
                                                                <form class="radio-selection">
                                                                 <?php $iloop=0;  $tyc=0;foreach($get_typ_hotel as $typ_hotel){$iloop++;
                                                                        $hotel_typ = $typ_hotel->idty;
                                                                        $ty = $this->Page_model->get_typ_all($hotel_typ);
                                                                    $tyc++;?>
                                                          <div class="radio-btn-wrapper">
                                                          <input type="checkbox"   name="accommodation" value="<?php echo$hotel_typ?>" id="hotel_ty<?php echo$iloop?>" onclick="set_accom(<?php echo$hotel_typ?>);" class="radio-btn">
                                                                        <label for="hotel_ty<?php echo$iloop?>" class="radio-label"><?php echo$typ_hotel->fld_valu_desc?></label>
                                                                        <span class="count"><?php echo$ty?></span>
                                                                    </div>
                                                                <?php }?>
                                                                <input type="hidden" id="max_acc" value="<?php echo$tyc?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2 mobile_faciliti">
                                                    <div class="col-1">
                                                        <div class="stop-widget widget">
                                                            <div class="title-widget">
                                                                <div class="title" style="font-size:15px;font-weight:bold;"><?php echo$txt_fac?></div>
                                                            </div>
                                                            <div class="content-widget">
                                                                <form class="radio-selection">
                                                                	<?php $numf =0; $fac=0;foreach($get_fac_hotel as $fac_hotel){$numf++;
                                                                    $fld_valu = $fac_hotel->fld_valu;
                                                                       $fac = $this->Page_model->get_fac_all($fld_valu);

                                                                    $fac++;?>
                                                                    <div class="radio-btn-wrapper">
                                                                        <input type="checkbox"   name="facilities" value="<?php echo$fac_hotel->fld_valu?>" id="fac<?php echo$fac?>" id="fac<?php echo$fac?>" class="radio-btn" onclick="set_fac(<?php echo$fld_valu?>);"> 
                                                                        <label for="fac<?php echo$fac?>" class="radio-label">
                                                                        	<span class="box_fac">&nbsp;<i class="<?php echo$fac_hotel->field1?>">&nbsp;&nbsp;</i>&nbsp;<?php echo$fac_hotel->fld_valu_desc?></span></label>
                                                                        <span class="count"><?php echo$fac?></span>
                                                                    </div>
                                                                    <?php }?>
                                                                    <input type="hidden" value="<?php echo$numf?>" id="max_fac">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  




                                    <div class="special-offer margin-top70 mobile_special">
                                        <h3 class="title-style-2">special offer</h3>
                                        <div class="special-offer-list">
                                       <?php foreach ($tbl_package_img as $val_pack) {
                                                            if($val_pack->booking_status=='Y'){
                                                               $link_book = "PackagesDetail?packageid=".$val_pack->package_id;
                                                            }else{$link_book="#";}
                                                                    
                                       ?>
                                            <div class="special-offer-layout">
                                                <div class="image-wrapper box_shadow" style="cursor: pointer;" onclick="window.open('<?php echo$link_book?>')">
                                                    <div style="overflow:hidden;height:150px;border:1px solid #888888;">
                                                        <img src="http://packagecms.khemtis.com/<?php echo$val_pack->img_name?>" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="title-wrapper hilight" style="width:100%;padding-left:10px!important;">
                                                        <div><a href="#" class="title" style="font-size:10px!important;color:#efefef!important"><?php echo$val_pack->package_title?></a></div>
                                                      <i class="icons flaticon-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                       <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <input type="hidden" value="" id="num_min">
                    <input type="hidden" value="" id="num_max">

                    <input type="hidden" value="<?php echo$book_st_n?>" id="book_st_n">
                    <input type="hidden" value="<?php echo$book_en_n?>" id="book_en_n">

                    <!-- BUTTON BACK TO TOP-->
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

	  <?php include("modal_login_register.php"); ?>
               
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

        <script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
        <script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="assets/js/pages/sidebar.js"></script>
        <script src="assets/js/pages/result.js"></script>
        <!---date_tiem--->
     
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
     <!--
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>


        


<script>


$('input[type="range"]').on('input', function() {
  var control = $(this),
    controlMin = control.attr('min'),
    controlMax = control.attr('max'),
    controlVal = control.val(),
    controlThumbWidth = control.data('thumbwidth');

  var range = controlMax - controlMin;
  
  var position = ((controlVal - controlMin) / range) * 100;
  var positionOffset = Math.round(controlThumbWidth * position / 100) - (controlThumbWidth / 2);
  var output = control.next('output');
  
  output
    .css('left', 'calc(' + position + '% - ' + positionOffset + 'px)')
    .text(controlVal);

});






$(document).ready(function(){
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
function chcmaxmin(ty){
   alert(ty);
}


function set_accom(n){
  $('#acc_type').val(n);
  show_hotel_data();

}

function per_nig(){
  //$('#val_nig').val(n);
  show_hotel_data();

}


function set_rat(n){
  $('#val_rat').val(n);
  show_hotel_data();

}

function set_fac(n){
  $('#val_fac').val(n);
  show_hotel_data();


}


    $(window).load(function(){
    $(document).ready(function(){
     $('#book_st').css('z-index', 99999999999999);
     $('#book_en').css('z-index', 99999999999999);

        $("#book_st").datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
            onSelect: function () {
                var dt2 = $('#book_en');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                var dt2Date = dt2.datepicker('getDate');

                //difference in days. 86400 seconds in day, 1000 ms in second
                var dateDiff = (dt2Date - minDate)/(86400 * 1000);
                
               var da1min = (minDate / (86400 * 1000) );
               var da2min = (dt2Date / (86400 * 1000) );
                
                startDate.setDate(startDate.getDate()+365 );

if(dt2Date != null &&  da1min >= da2min){
    var opts=new Date();
    $(this).datepicker('setDate', opts);
    $(this).datepicker('option','dt2Date',opts);
    $(this).datepicker('option', 'minDate', opts);
    alert("Not Max Day");
}else{
                if (dt2Date == null || dateDiff < 0) {
                        dt2.datepicker('setDate', minDate);
                }
                else if (dateDiff > 30){
                        dt2.datepicker('setDate', startDate);
                }
                     //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                dt2.datepicker('option', 'minDate', minDate); 
                }
            }
        });

        $('#book_en').datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
            onSelect:function(){
                 
            }
        });
    });
});

    
</script>



<script language="javascript">

  $('#mobile_rating').hide();

function set_numminmax(mn,mx){
 $('#num_min').val(mn);
 $('#num_max').val(mx);
 $('#mobile_rating').hide();
 show_hotel_data();
}

var lang = 'en';
var pr_para= '<?php echo$lastpara?>';
var max_price = <?php echo$get_max_price?>;


show_hotel_data();




function show_hotel_data(){
var fac_num = $('#max_fac').val();
var hot_num = $('#max_acc').val();
l = 9;
c = 12;
   p_min =  $('#num_min').val();
   p_max = $('#num_max').val();

 if(p_min==""){p_min=0};
 if(p_max==""){p_max=10};

  $('#spin001').show();
 // $('#spin002').show();
  
    var txt_find = $('#txt_find').val();
    //alert(txt_find);
    var book_st = $('#book_st').val();
    var book_en = $('#book_en').val();
	  var minprice = ($('#minprice').html());
  	var maxprice = ($('#maxprice').html());
 	  
    minprice = 100;
    maxprice = 500000;
var hotel_ty = [];
for(var i=1;i<=hot_num;i++){
 // alert($('#hotel_ty'+i).val());
if ($('#hotel_ty'+i).is(':checked')) {hotel_ty.push($('#hotel_ty'+i).val());}

}

	var str_txt = [];
	if ($('#1stars').is(':checked')) {str_txt.push($('#1stars').val());}
	if ($('#2stars').is(':checked')) {str_txt.push($('#2stars').val());}
	if ($('#3stars').is(':checked')) {str_txt.push($('#3stars').val());}
	if ($('#4stars').is(':checked')) {str_txt.push($('#4stars').val());}
	if ($('#5stars').is(':checked')) {str_txt.push($('#5stars').val());}
    var fac_txt = [];
    for(var i=1;i<=fac_num;i++){
      if ($('#fac'+i).is(':checked')) {fac_txt.push($('#fac'+i).val());}


    }
    if(minprice==0 || minprice==null){minprice=300;}
    if(maxprice==0 || maxprice==null){maxprice=max_price;}

//alert("txt_find : "+txt_find+"   lang : "+lang+"   str_txt : "+str_txt+"   fac_txt : "+fac_txt+"   minprice : "+minprice+"   maxprice : "+maxprice+"   lastpara : "+pr_para+"   book_st : "+book_st+"   book_en : "+book_en+"   c : "+c+"   l : "+l+"   p_min : "+p_min+"   p_max : "+p_max+"   hotel_ty : "+hotel_ty);

 $.ajax({
                 url: "<?php echo base_url('HotelList/show_data')?>",
                 datatype: 'html',
                 type: "POST",
                 data: ({txt_find:txt_find,lang:lang,str_txt:str_txt,fac_txt:fac_txt,minprice:minprice,maxprice:maxprice,lastpara:pr_para,book_st:book_st,book_en:book_en,c:c,l:l,p_min:p_min,p_max:p_max,hotel_ty:hotel_ty}),
              success:function(data) {
                    re_deley(500,0,data);
              }
     });
}


function re_deley(relay,day_dinamic,data){
   setTimeout(function () {
                     $('#mycontent_hotem_min_price').html(data);
                     $('#spin001').hide();
                     $('#spin002').hide();
                     $('#mobile_rating').show();
    }, relay); 
}


function check() {
    var dropdown = document.getElementById("OperationType");
    var current_value = dropdown.options[dropdown.selectedIndex].value;
}
   <?php 
       echo "$('#txt_dtp_input1').empty();
             $('#txt_dtp_input1').append(chang_date('".$book_st."'));
             $('#txt_dtp_input2').empty();
             $('#txt_dtp_input2').append(chang_date('".$book_en."'));";
   ?>
function chang_date(ev){
    var today = new Date();
var ddc = today.getDate();
var mmc = today.getMonth()+1;
var yyc = today.getFullYear();
if(ev==""){ev= yyc + '/' + mmc + '/' + ddc;}
var monthNames = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov", "Dec"];
var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var fday = new Date(ev);
    var dtxt = fday.getDay();
    var dd = fday.getDate();
    var mm = fday.getMonth();
    var yy = fday.getFullYear();
    return fulldate = "&nbsp;"+(dd+" "+monthNames[(mm)]+" "+yy+" "+days[dtxt]);
    // retunr data insernt () value()
}
function call_get_date(ev,nm){
var monthNames = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov", "Dec"];
var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var nm = nm.replace("#","")
    var fday = new Date(ev);
    var dtxt = fday.getDay();
    var dd = fday.getDate();
    var mm = fday.getMonth();
    var yy = fday.getFullYear();
    var fulldate = "&nbsp;"+(dd+" "+monthNames[(mm)]+" "+yy+" "+days[dtxt]);
             $('#txt_'+nm).empty();
             $('#txt_'+nm).append(fulldate);
            // $('#show_date_cal').addClass("center_cal");
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

  function show_pr_de(idroom){

       $('#popup_room'+idroom).css('display','block');
       fc_room_price(idroom);

  }

  function hid_pr_de(idroom){

       $('#popup_room'+idroom).css('display','none');
       //fc_room_price(idroom);

  }

     function search_hotel() {
     
                 $('#form_search').submit();
     }



        </script>
    </body>
</html>