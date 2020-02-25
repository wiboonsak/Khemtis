<?php $pthc= base_url();?>

<style type="text/css">
.div_border{
    border: 1px solid #cccccc;
    /*box-shadow: 0 7px 24px 0 rgba(0, 0, 0, .09);*/
     background-image: linear-gradient(#e2e2e2, #e2e2e2,#ffffff);
     border-radius: 3px;
     color: #434a54;
    font-size: 15px;
    font-weight: bold;
    text-align: center;
vertical-align: middle;
line-height: 40px; 
}  
.font_header{
    font-size: 21px;
    font-weight: bold;
    display: inline-block;
    text-transform: uppercase;
    color: #434a54;
}

.div_crop{
  position: relative;
  height: 35vw;
  overflow-y: hidden;

}
.div_thum_crop{
    position: relative;
    height: 7vw;
    overflow-y: hidden;
}
.line_gradients{

/* background-image: linear-gradient(#e4e4e4, #e8e8e8,#fbfbfb);*/
  border-color:#e8e8e8;
}
.border_icon{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   cursor: pointer;
}
.bdricon{
  color:#481d46;
}
.bdricon_bg{
  color:#434a54;
}
.sl_css{
  border-style:solid;	
  border-width:1px;
  border-radius: 5px;
  border-color:#e5e5e5;
  background-color:#ffffff;
  width:50px;
  height:26px;
  font-size: 18px;
  cursor: pointer;
}
.border_css_extra{
  border-style: solid;
  border-width: 1px;
  border-color:#e3f2f5;
  background-color:#f2f8f9;
  padding:5px;
  border-radius:5px;
  margin-bottom: 10px;
}

.ar_right {
    width: 300px;
    margin: 0;
    padding: 3px 6px;
    vertical-align: middle;
    border: none;
    background-color: #ffffff;
    color: red;
    text-align: left;
    text-decoration: none;
    white-space: nowrap;
    cursor: pointer;
    text-transform: uppercase;
    [data-icon] {
       float:right;
        display: block;
        margin-left: 10px;
    widhth: 10px; height: 10px;
        &:before { content: attr(data-icon); }
    }
} 

.is-hidden {display: none; position: absolute;
  
}

  .borderless td, .borderless th {
    border: none!important;

}
.tblnew tr td{
  padding: 0 !important;
  margin: 0 !important;
  border: none!important;
  height:10px!important;
  text-align: left!important;
}
.tblnew{
  width:100%!important;
}

.nodrop{
	 background-color:#eeeeee;cursor:no-drop;
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

#map {
        height: 200px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
.modal-box_hotel {
  width: 80%;
  height: auto;
  margin: 0;
  padding: 0;
}

.vertical-align-center {
    /* To center vertically */
    display: table-cell!important ;
    vertical-align: middle!important  ;
}

.modal-content {
  height: auto;
  min-height: 80%;
  border-radius: 0;
}

.vertical-alignment-helper {
  margin-top: 5vw;
    display:table;
    height: auto;
    width: 100%;
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
}
.modal-content {
    /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
    width:inherit;
    height:inherit;
    /* To center horizontally */
    margin: 0 auto;
}


  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width:auto  ;
      }


      /* The popup bubble styling. */
      .popup-bubble {
        /* Position the bubble centred-above its parent. */
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the bubble. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
      /* The parent of the bubble. A zero-height div at the top of the tip. */
      .popup-bubble-anchor {
        /* Position the div a fixed distance above the tip. */
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      /* This element draws the tip. */
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }
      /* JavaScript will position this div at the bottom of the popup tip. */
      .popup-container {
        cursor: auto;
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 300px;
      }

.menu_left{
-webkit-box-shadow: 1px 2px 5px -1px rgba(128,128,128,0.48);
-moz-box-shadow: 1px 2px 5px -1px rgba(128,128,128,0.48);
box-shadow: 1px 2px 5px -1px rgba(128,128,128,0.48);
  }


div.ex3 {
  background-color: #ffffff;
  width: auto;
  height: 800px;

  padding-left:10px;
  padding-top: 10px;
  padding-bottom: 20px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  border: 1px solid #cccccc;

}

.topleft_menu_g {
  position: absolute;
  top: 0px;
  right: 0px;
      width: 0;
      height: 0;
      border-top: 55px solid red;
      border-left: 55px solid transparent;
      cursor: pointer;
      color:#ffffff!important;
}

.aphaimg{
	 opacity: 0.6;
   transition: opacity .25s ease-in-out;
   -moz-transition: opacity .25s ease-in-out;
   -webkit-transition: opacity .25s ease-in-out;
	  border: 1px solid #ffffff;
}
.aphaimg:hover{
		 opacity: 1;
	  border: 1px solid #000000;
	  cursor: pointer;

}
.di_box_gala{
  padding: 0px!important;
  border-bottom-style: dotted;border-width:1px;border-color:#cccccc;

}
.hilight{
  width:100%!important;margin-left:-20px!important; background-image:linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,1));text-align: center!important;padding:3px;padding-left: 10px;
}

table {
  border-spacing: 0;
  width: 100%;
  border: 0px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #ffffff
}
.border_min{
  border: 1px solid #ff9f2d;
  position:  relative;
  padding-top: 0px!important;
  background-color:#f5d2aa;
}
 
.border_min::after { 
  content: "Lowest price available !";
  font-weight: bold;
  border-bottom-left-radius:5px;background-color:#ff9f2d;width:35px;width:200px;color:#ffffff;position: absolute;right:0;text-align: center;z-index:9;

}



.border_no{
   border: 0px solid #d8d8d8;

  
}
.border_lo{
  background-color:#dde9fd;
  padding:5px;
  color:#396fc6;
}


#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 999999999999;
  cursor: pointer;
}

#text{
  position: absolute;
  z-index: 999999999999;



     width:1200px;
    height:400px;
    position:fixed;
    top:50%;
    left:50%;
    margin-top:-300px;
    margin-left:-600px;

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



.notification-container {
  position: absolute;
  top: 0;
  right: 0;
  width: 300px;
  display: none;
  height: 100%;
  overflow: hidden;
  background: #107b10;
  z-index: 999;
  transform: translateX(100%);
  -webkit-transform: translateX(100%);
}

.selected {
  animation: slide-in 0.5s forwards;
  -webkit-animation: slide-in 0.5s forwards;
}

.dismiss {
  animation: slide-out 0.5s forwards;
  -webkit-animation: slide-out 0.5s forwards;
}











#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #ffdd00;
  color: #3c3c3c ;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  right: 0px;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}




</style>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/font/flaticon/flaticon.css">
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="assets/theme/t-datepicker.min.css" rel="stylesheet" type="text/css">
<link href="assets/theme/t-datepicker-blue.css" rel="stylesheet" type="text/css">



<?php 

//echo  $utoid_book = $this->session->userdata('sec_book_id')."Book_id";
            $txt_lang_hotel=array();
            $hotel_name_show = "";
            $hotel_policy = "";
            $hotel_dec = "";
                    foreach($data_hotel as $value_hotel){
                        $a_lang=  array();
                            $p_hotel_id = $value_hotel->hotel_idrun;
                            $p_client_id =$value_hotel->client_id;
                            $p_hotel_phone =$value_hotel->hotel_phone;
                            $p_booking_email =$value_hotel->booking_email;
                            $p_hotel_map_url =$value_hotel->hotel_map_url;
                            $p_province_id =$value_hotel->province_id;
                            $p_country_id =$value_hotel->country_id;
                            $p_key_words =$value_hotel->key_words;
                            $p_hotel_grade =$value_hotel->hotel_grade;  
                            $dis_cty = $value_hotel->country_nm;
                            $dis_prov = $value_hotel->province_nm;
                            $hotel_name_show = $value_hotel->hotel_nm;
                            $hotel_policy = $value_hotel->long_desc;
                            $hotel_dec = $value_hotel->txt_policy;
                           array_push(
                            $a_lang,
                            $value_hotel->lang,
                            $value_hotel->hotel_nm,
                            $value_hotel->country_nm,
                            $value_hotel->province_nm,
                            $value_hotel->hotel_grade,
                            $value_hotel->img_name,
                            $value_hotel->hotel_idrun
                          );
                           array_push($txt_lang_hotel,$a_lang);  
            } 
          $txt_lang=array();
                    foreach($get_room as $value_room){
                        $a_lang=  array();
                            $p_room_id =$value_room->room_idrun;
                            $p_room_title =$value_room->room_title;
                            $p_default_quota =$value_room->default_quota;
                            $p_max_extra_bed =$value_room->max_extra_bed;
                            $p_published_status =$value_room->published_status;
                            $p_booking_status =$value_room->booking_status;
                            $tbl_all_sevice1 = $value_room->tbl_all_sevice1;
                            $tbl_all_sevice2 = $value_room->tbl_all_sevice2;
                           array_push($a_lang,
                            $value_room->lang,
                            $value_room->room_fld_nm,
                            $value_room->room_fld_desc,
                            $value_room->img_nm,
                            $value_room->default_price,
                            $value_room->default_dscnt_price,
                            $value_room->tbl_all_sevice1,
                            $value_room->tbl_all_sevice2,
                            $value_room->roomQuota,
                            $value_room->Price,
                            $value_room->room_idrun,
                            $value_room->max_extra_bed,
                            $value_room->extra_bed_price
                          );
                           array_push($txt_lang,$a_lang);  
                    } 
?>

<div id="snackbar">There is 3 person lookin at <?php echo$hotel_name_show?></div>
                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">
<div style="width:100%;background-color:#ffdd00;height:auto  ;border-bottom-style:solid; border-width:1px;border-color:#cbb522;padding-bottom: 14px;"> 
<div class="container"> 
 <input type="hidden" id="type_page" value="1">
 <input type="hidden" value="<?php echo$hotel_id?>" id="hotel_id">
 <input type="hidden" value="<?php echo$Adults?>" id="adu">
 <input type="hidden" value="<?php echo$Child?>" id="acu">
 <input type="hidden" value="<?php echo$txt_search?>" id="txt_search">
<?php
  $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<input type="hidden" value="<?php echo$actual_link?>" id="usr_curent">

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
<button type="button" class="btn btn-grad" id="btfd"  onclick="search_hotel()">UPDATE</button>

</div>
</form>
 </center>
</form>
</div>
</div>
                   
                        <section>
                            <div class="hotel-view-main" style="padding: 0px 0px !important;width: 	100%">
                                <div class="container">
                                    <div class="journey-block" style="background-color:#ffffff" > 
                                         <div style="width:100%;height:auto  ;background-color:#f7f7f7;margin-bottom:0px;margin-top:13px;padding: 5px;border-color:#d8d8d8;border-width:1px;border-style:  solid; border-radius: 5px;">                                  
                                         <div class="row">
                                              <div class="col-md-12" style="height:auto  ;">
                                               <h3 class="font_header" style="margin: 0px !important;font-size:18px!important"><?php echo$hotel_name_show?></h3>
                                                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span class="width-<?php echo($p_hotel_grade * 20)?>">
                                                                                <strong class="rating">5.00 out of 5</strong>
                                                                            </span>
                                                                        </div>
                                               </div>
                                               <div class="col-md-12">

         <?php   foreach($hotel_feature as $value_icon){
             $img_icon = $value_icon->field1;
             $fld_valu_desc = $value_icon->fld_valu_desc;
         ?>
           <div  class="col-sm-1" style="border-color:#ffffff;height:32px;width:auto;">
                <div class="bdricon"><i class="<?php echo$img_icon?>" style="font-style:normal!important ;">&nbsp;&nbsp;<?php echo$fld_valu_desc?></i></div>
           </div>
        <?php } ?>
                                              </div>
                                           </div>       
                                        </div>        
<style type="text/css">
  .bdgheader{
    background-color: #ffffff;
    padding: 5px;
     font-size: 16px;
  }
  .chil_border{
    width: 100%;
    border-width: 1px;
    border-style: solid;
    background-color: #ffdd00;
    border-color: #ffffff;
    height: 38px;
    line-height: 40px;
    border-radius:5px;
  }
  .box_fac{
  	font-size: 9pt;
    text-align: center;
    color: #464545;
    padding: 4px;
  }


.txt_box_gala{
  display: none;
  padding-left:5px;font-size: 11px;position: absolute;top:17px;right:0px;height:auto;width:150px;background-color:#ffffff;border:1px solid #cccccc;
  border-bottom-right-radius: 5px;border-bottom-left-radius:5px;border-top-left-radius: 5px;
}
.ov_gala:hover .txt_box_gala{
  display: block;
  color:#69737b;
}
</style>       
                             
<div class="image-hotel-view-block" style="width: 100% !important;">
      <div style="width:100%;height:auto;margin-top:10px;" class="line_gradients">
      <center>
      <div class="row">
           <!--<div class="col-md-2"><b>Hotel Facility</b></div>-->
      <div class="col-md-12">
      <div class="row">
      	<div class="col-md-12" style="border-color:#ffffff;height:5px;width:auto;">
        </div>
    </div>
    </div>

                                      </center>
                                        </div>



                                        <div class="div_crop">
                                            <div class="slider-for group1">
<?php 

       if($lang_q=="en"){
            $txt_book = "BOOK NOW";

       }else{
            $txt_book = "จองเดี๋ยวนี้";
       }


for($hotel=0;$hotel<(count($txt_lang_hotel));$hotel++){
    $hotel_grade = 0;
    $hotel_name = $txt_lang_hotel[$hotel][1];
    $conty = $txt_lang_hotel[$hotel][2];
    $province_nm = $txt_lang_hotel[$hotel][3];
    $hotel_grade = $txt_lang_hotel[$hotel][4];
    $hotel_grade = ($hotel_grade * 20);
    $img_main = $txt_lang_hotel[$hotel][5];
    $hotel_id = $txt_lang_hotel[$hotel][6];
?>
                                                 <div class="item">
                                                     <img src="http://hotelcms.khemtis.com/<?php echo$img_main?>" alt="">
                                                 </div>             
<?php }?>
                                            </div>
                                        </div>

                                        <div class="div_thum_crop">
                                        <div class="slider-nav group1" style="background-color: #ECECEC;padding-top: 3px;">
<?php 
for($hotel=0;$hotel<(count($txt_lang_hotel));$hotel++){
    $hotel_grade = 0;
    $hotel_name = $txt_lang_hotel[$hotel][1];
    $conty = $txt_lang_hotel[$hotel][2];
    $province_nm = $txt_lang_hotel[$hotel][3];
    $hotel_grade = $txt_lang_hotel[$hotel][4];
    $hotel_grade = ($hotel_grade * 20);
    $img_main = $txt_lang_hotel[$hotel][5];
    $hotel_id = $txt_lang_hotel[$hotel][6];
?>
                                                 <div class="item">
                                                      <img src="http://hotelcms.khemtis.com/<?php echo$img_main?>" alt="">
                                                 </div>
<?php } ?>
                                            </div>
                                        </div>


                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
						
                       
                        <div class="page-main">
                            <div class="clearfix"></div>
                            <div class="hotel-result-main padding-top padding-bottom" style="padding:5px!important;padding-top: 20px; padding-bottom: 20px !important">
                                <div class="container">
                                    <div class="result-meta" style="margin-bottom: 1px !important">  
                                        <div class="row">   
                                            <div class="col-lg-12 col-md-12" style="background-color:#ffffff;padding:1px;border-radius:4px;">

         <table><tr><td><font style="font-size:18px;margin-left: 0px;color:#337ab7;font-weight:bold;"><?php echo$hotel_name_show?></font>&nbsp;&nbsp;&nbsp;<b></b>&nbsp;</td><td>
         <?php   foreach($hotel_feature as $value_icon){
             $img_icon = $value_icon->field1;
             $fld_valu_desc = $value_icon->fld_valu_desc;
         ?>
           <div  class="col-sm-1" style="border-color:#ffffff;height:32px;width:auto;">
                <div class="bdricon"><i class="<?php echo$img_icon?>" style="font-style:normal!important;font-size: 15px;">&nbsp;&nbsp;<?php echo$fld_valu_desc?></i></div>
           </div>
        <?php } ?>
        </td></tr></table>
										</div>       
                      <!--
                        <div class="col-lg-3 col-md-12">
												<p class="label-red-bg"><i class="fa fa-dollar"></i> 20% discount is waiting for you! Login Now!</p>
											</div>                                        
                                            <div class="col-lg-9 col-md-12" style="font-size: 12pt">
                                               <div style="height: 60px; line-height: 60px; width: 30%; float: left; text-align: center; background-color:#ECECEC; border: 2px solid #FFFFFF; font-size: 12pt"><input type="checkbox" style="width: 18px; height: 18px; vertical-align: sub;"> Free Breakfast</div>
                                               <div style="height: 60px; line-height: 60px; width: 30%; float: left; text-align: center; background-color:#ECECEC; border: 2px solid #FFFFFF; font-size: 12pt"><input type="checkbox" style="width: 18px; height: 18px; vertical-align: sub;"> Free Cancellation</div>
                                               <div style="height: 60px; line-height: 60px; width: 40%; float: left; text-align: center; background-color:#ECECEC; border: 2px solid #FFFFFF; padding-top: 10px; font-size: 12pt">
                                                    <select class="selectbox">
                                                       <option value="">Total Price</option>
                                                       <option value="">Per Night</option>
                                                    </select>
                                               </div>
                                             </div>
    -->
                                        </div>
                                    </div>
    <div class="result-body"> 
    <div class="row ">
<table id="myTable">
    <tr>
    <th style="height:5px;"></th>
    <th style="height:5px;"></th>
  </tr>
<?php
$date1=date_create($book_st);
$date2=date_create($book_en);
$diff=date_diff($date1,$date2);
$numdate= $diff->format("%a ");
$numdef = 0;
$loop_id_room = 0;
$ic=0; 
$listl = 0;


foreach($get_room_price_detail as $value_all_data){
$icon_model = "";
$txt_val_detail= "";
    $loop_id_room=$value_all_data[0];
    $disc = "";
    $price = "";
$room_id_run = $loop_id_room;
$room_id = $value_all_data[0];

$img_room = "";
$get_img = $this->Page_model->get_img($room_id);
foreach ($get_img as  $value_img) {
        $img_room=$img_room.",".$value_img->img_nm;
}

  

$room_name = $value_all_data[2];
$cry = $value_all_data[7];
$room_pict_main = $value_all_data[4];
$icon  =  $value_all_data[6];
$icon_txt  =  $value_all_data[5];

$sum_quota  = $value_all_data[8];
//echo $sum_quota."<br>";

if($sum_quota>0){
$price_room = 0;
$price_dis = 0;
$txt_show_list_h = "";
$txt_show_list_p = "";
$ij=0;$trd="";$jk=0;
$show_n_pri=0;
$txt_gala  = "";
$ch_gala = "";
$txt_show_gala = "";
$n_ch_gl=0;
$txt_bf = '';

foreach($value_all_data[3] as $get_price_all){
      $txt_gala = trim($get_price_all[12]);
      $txt_iv_dt = trim($get_price_all[14]);
  if($txt_gala==''){$ch_gala="display:none;";}else{$ch_gala="display:block;";$n_ch_gl=1; $txt_show_gala = $txt_show_gala."<div class='di_box_gala'>".$txt_iv_dt." : ".$txt_gala."</div>";}
  
$txt_bf =  $get_price_all[13];

$ij++;
$n_pri=0;
$dis_strik=0;
  if($get_price_all[8]>0){
    $n_pri = $get_price_all[8];
    $dis_strik=number_format($get_price_all[1])." ".$cry;
    $price_room = $price_room+$get_price_all[1];
    $price_dis = $price_dis + $n_pri;

  }else{
    $n_pri = $get_price_all[1];
    $dis_strik=number_format($get_price_all[11])." ".$cry;
    if($n_pri >= $get_price_all[11]){$dis_strik="";$price_room = $price_room+$n_pri;}
    else if($n_pri < $get_price_all[11]){$price_room = $price_room+$get_price_all[11];$price_dis = $price_dis + $n_pri;}
  }
  if($ij==3){$ij=0;$trd="</tr><tr>";}else{$trd="";}
  $show_n_pri  = $show_n_pri + $n_pri;
  $jk++;$txt_in_out="";
  if($jk==1){$txt_in_out="<font color='red'>Check In </font><br>";}
  else if($jk==count($value_all_data[3])){$txt_in_out="<font color='red'> </font><br>";}
  else{$txt_in_out="<br>";}

$txt_show_list_p =  $txt_show_list_p."<td><font color='#337ab7'><b>".$txt_in_out.$get_price_all[10]."</b></font><br><font color='#000000'>".number_format($n_pri)." ".$cry."<br><strike><font color='#adadad'>".$dis_strik."</font></strike></td>".$trd;
}


if($n_ch_gl==0){$ch_gala="display:none;";}else{$ch_gala="display:block;";}
$av_dis =  number_format((($price_room - $show_n_pri)* 100)/$price_room);
$row_sum_av = "<tr><td colspan=3 style='text-align:left;'><b style='color:red;font-size:11px;'>Average: ".number_format(($show_n_pri/($numdate)))." ".$cry." / Night</b></td></tr>";
$txt_show_list_p =  "<table class='table borderless' style='border-radius:5px;width:auto;border-width:0px;border-style: none;padding: 0px;border-color:#cccccc;font-size:11px;background-color: #ffffff;box-shadow: 1px 3px 3px 3px #cccccc;'><tr>".$txt_show_list_p.$row_sum_av."</table>";
$new_price = $show_n_pri;
$icon_ar = explode(",",$icon);
$icon_txt_ar = explode(",",$icon_txt);

$nic =  count($icon_ar);
for($ci=0;$ci<$nic;$ci++){
	$icon_model=$icon_model."::".$icon_ar[$ci]."[=]".$icon_txt_ar[$ci];
}
$max_extra_bed =   $value_all_data[9];
$extra_bed_price = $value_all_data[10];

$time = strtotime($book_st);
$newformat = date('Y-m-d',$time);
$txt_val_detail = $newformat."=>".$price_room."=>".$new_price."=>0";
//echo $price_room.":".$price_dis;
?>                         

<?php 
                                     $txt_more1 = "";
                                     $numberc1 = count($icon_ar);
                                     $txt_fac1 = "";
                                     $txt_fac2 = "";
                                     for($ic=0;$ic<4;$ic++){
                                       if(!isset($icon_ar[$ic])){break;}
                                       $data_ic1 = $icon_ar[$ic];
                                       $data_txt1 = $icon_txt_ar[$ic];
                                       if($ic==3){$txt_more1="... <font color='#337ab7'>More</font>";}
                                        $txt_fac1  = $txt_fac1.$data_ic1."<br>";
                                        $txt_fac2  = $txt_fac2.$data_txt1."<br>";
                                      }



$txt_bcolor = "#d8d8d8";
$txt_bd = "1";


/*
if($show_n_pri>$numdef){
   $numdef = $show_n_pri;
   $listl = 0;
}else{
   $listl = 1;
}

if($listl==1){
  $txt_bcolor = "#ff9f2d";
  $txt_bd = "1";
}else{
    $txt_bcolor = "#d8d8d8";
  $txt_bd = "1";
}

*/

?>
<tr>
  <td style="display: none;"><?php echo trim($show_n_pri)?></td>
<td>
                                   <div class="col-md-12 main-right" style="border-style:none;margin-top: 10px;border-radius:0px;position: relative;">
                                   	
                   
                                                 <div class="hotel-list">
                                                     <div class="row" style=" border:solid 1px #cccccc;background-color:#ffffff;">
                                                         <div class="col-md-12" style="padding:0px!important">
                                                            <div>
                                                                <div class="col-md-3" style="padding:0px!important;background-color:#71706e">

                                                                    <?php 
                                                                       $coler="color:#000000;";
                                                                    if($av_dis>0){
                                                                        $coler="color:red;";
                                                                     }
                                                                    ?>  

                                                                    <a href="javascript:show_model('<?php echo$room_pict_main?>','<?php echo$txt_fac1?>','<?php echo$txt_fac2?>','<?php echo number_format($show_n_pri,2)?>','<?php echo$coler?>','<?php echo$room_name?>',<?php echo$av_dis?>,'<?php echo$icon_model?>','<?php echo$txt_bf?>','<?php echo$img_room?>')" class="link" >
                                                                       <img src="http://hotelcms.khemtis.com/<?php echo$room_pict_main?>" style="width: 100%;">
                                                                    </a>            
                                    <?php if($av_dis>0){?>                                                     
                                                                    <div class="label-sale" style="margin-top: 1px;margin-left: 5px;color:red">
                                                                        <p class="text">Save <?php echo$av_dis?>%</p>
                                                                        <p class="number">Save <?php echo$av_dis?>%</p>
																	                              </div>
																	  <?php }?>                                                              
                                                                </div>
                                                                <div class="col-md-4">
                                                   <div class="content" style="text-align: left; padding-top: 10px !important;">
																		<p class="text-title"><a href="hotel-view.html" class="link"><?php echo$room_name?></a></p>
                                    <?php 
                                     $txt_more = "";
                                     $lang = $this->session->userdata('ch_lang'); 
                                     $numberc = count($icon_ar);
                                     $txt_fac = "";
                                     $txt_more = "&nbsp;&nbsp;<font color='##337ab7'>More...</font>";$ib=0;
                                        $show_fac = $this->Page_model->show_fac_room($room_id,$lang);
                                        foreach ($show_fac as $value){$ib++;
                                        $data_txt = $value->fld_valu_desc;
                                        $data_ic = $value->field1;
                                        if($ib==4){$txt_fac=$txt_more;}
                                       ?>  															
						<table class="tblnew">
              <tr><td valign="top" style="width:10px!important"> <i class="<?php echo$data_ic?>" >&nbsp;&nbsp;</i></td>
              <td style="text-align:left!important;font-size:14px!important;"><?php echo$data_txt?><?php echo$txt_fac?></td>
              </tr>
            </table>
            <?php if($ib==4){break;}} ?>
                                               </div>
                                                       </div>
                                                                <div class="col-md-3"  style="text-align: left; padding-top: 20px !important">
                                                                    <div class="price" style="position:relative;">
                                                                    <?php 
                                                                     $coler="color:#000000;";
                                                                    if($av_dis>0){
                                                                        $coler="color:red;";
                                                                    ?>  
                                                                        <sup class="price-gray linetub"  style="font-size: 10pt !important"><?php echo number_format($price_room)?>&nbsp;THB&nbsp;
                                                                        </sup>
                                                                    <?php }?>
                                                            
																		<span class="price-red ar_right " onmouseout="show_prout(<?php echo$loop_id_room?>)" onmouseover="show_pr_de(<?php echo$loop_id_room?>)" style="<?php echo$coler?>font-size:14pt !important"><?php echo number_format($show_n_pri)?>&nbsp;THB&nbsp; <span style="font-size: 9pt; color:#353535; font-weight: 100 !important">/ room / <?php echo($numdate)?> night(s)</span><span aria-hidden="true" data-icon="+">
                                     <p class="glyphicon glyphicon-info-sign" style="color:#c1cdd2;font-size:15px;"></p>                  
                                    </span></span>

                                    <div onmouseout="show_prout(<?php echo$loop_id_room?>)" onmouseover="show_pr_de(<?php echo$loop_id_room?>)" id="popup_room<?php echo$loop_id_room?>" style="cursor: pointer;width:100%;right:-40px;top:25px;height:auto;border-width:0px;position: absolute;z-index:100000;display: none;">
                                            <?php echo$txt_show_list_p?>
                                    </div>
                                                                        <br>
																		<span style="font-size: 9pt; color:#00A2E7">All charges included</span>
                                    <span style="<?php echo$ch_gala?>font-size: 11px;position:absolute;top:-17px;right:0px;line-height: 15px;border: 1px dashed #0599dc;background-color:#0599dc ;cursor: pointer;color:#ffffff;float:right;padding-right:10px;padding-left:10px;border-radius: 3px;" class="ov_gala">Galadinner <i class="fa fa-info-circle">

                                    </i>
 <div class="txt_box_gala"><?php echo$txt_show_gala?></div>

                                  </span>
                                   
                                     
                                                                        <br>
                                                                        <?php if($av_dis>0){?>
                                                                        <p class="label-red-bg" style="border-radius:5px;width:150px;"><?php echo$av_dis?>% OFF TODAY</p>
                                                                        <?php }?>

                                   <?if($txt_bf=='Y'){?>
                                      <span style="font-size: 9pt;width:100%;line-height: 18px;border: 1px dashed #32a923;border-radius:3px;border-color:#83b587;border-width:1px;font-weight:bold;background-color:#f3f9f2 ; color:#0c7d16;float:right;padding-right:10px;padding-left:10px">Free Breakfast</span>
                                   <?php }?>

                                                                    </div>  
                                                                    <div>
                                <div class="border_css_extra" style="font-size:13px;">
                                <input type="hidden" value="<?php echo$extra_bed_price?>" id="room_ex_pr<?php echo$loop_id_room?>" name="room_ex_pr<?php echo$loop_id_room?>">
                                  Extra Bed: <span id="txt_extra<?php echo$loop_id_room?>"><b><?php echo number_format($extra_bed_price)?>&nbsp;THB&nbsp;</b></span>&nbsp;/ NIGHT
                                <br>
                                <div id="show_extra<?php echo$loop_id_room?>">
                                <table><tr><td>
                                No.Bed:</td><td>
         <select class="sl_css" onchange="get_num_extra(<?php echo$loop_id_room?>,<?php echo$extra_bed_price?>,<?php echo$numdate?>)" name="num_room_extra<?php echo$loop_id_room?>" id="num_room_extra<?php echo$loop_id_room?>">
                                	<option value="0">0</option>
                                  <?php
                                   for($q=1;$q<=$max_extra_bed;$q++){
                                   ?>
                                  <option value="<?php echo$q?>"><?php echo$q?> </option>
                                  <?php }?>
                                </select>
                                </td><td><span id="sh_ext_pr<?php echo$loop_id_room?>"></span></td></tr></table>
                                </div>
        
                                  </div>
                                  </div>                                                                      
																</div>                             
                                <div class="col-md-2"  style="text-align: center; padding-top: 50px !important">
                                
                                 No.Room:
                                <input type="hidden" value="<?php echo$room_id?>" id="hotel_ch<?php echo$loop_id_room?>">
                                <select class="sl_css"  name="num_room<?php echo$loop_id_room?>" id="num_room<?php echo$loop_id_room?>"
                                  onchange="add_extra(<?php echo$loop_id_room?>,<?php echo$max_extra_bed?>,<?php echo$extra_bed_price?>,<?php echo$numdate?>)" >
                                  <?php
                                   for($q=1;$q<=$sum_quota;$q++){
                                   ?>
                                  <option value="<?php echo$q?>"><?php echo$q?></option>
                                  <?php }?>
                                </select>
                                
                                <input type="hidden" value="<?php echo($q-1)?>" id="numqtr_room<?php echo$loop_id_room?>">
                              <!--  <input type="hidden" value="<?php// echo($q-1)?>" id="max_nm<?php //echo$loop_id_room?>">-->
                                   <br><br>
                                    <button id="addbt<?php echo$loop_id_room?>"  class="btn" style="background-color: #03a9f4; color: #FFFFFF !important;border-style: none!important;border-radius:5px!important;width:110px!important;text-align: center!important;"
                                     onclick="add_booking_hotel(<?php echo$room_id?>,<?php echo$loop_id_room?>,'<?php echo$txt_val_detail?>',<?php echo$numdate?>,<?php echo$hotel_id?>,<?php echo$Adults?>,<?php echo$Child?>)"><?php echo$txt_book?></button>
                                         <br>
																	   <p style="color:green; text-align: center;"><?php echo$sum_quota?> room(s) available</p>
																      </div>
                                           </div>
                                                </div>
                                                    </div>
                                                </div>
                                             </div> 
</td></tr>
<?php }} ?>
</table>
<input type="hidden" value="<?php echo$loop_id_room?>" id="max_room">
                                    </div>  
                                    </div>
                                <div class="row" style="background-color: #ffffff; padding: 20px !important">
                                    <div class="col-md-12 main-left">
                                        <div class="item-blog-detail">
                                            <div class="blog-post blog-text">
                                          <div class="blog-comment">
<?php $numreview=1;?>                                    
<div class="comment-count blog-comment-title sideline" style="margin-bottom:10px!important;margin-top:10px">Based on <?php echo$numreview?> reviews</div>
     
<div style="width:100%;height:auto	;margin-bottom:20px;padding-top: 0px;">
<center>
<div class="row" style="width:98%;padding-bottom: 20px">
<div class="col-md-4" style="padding-top: 10px;">
<p style="color:#03a9f4;font-weight:bold;">location</p>

<iframe src="<?php echo$pthc?>HotelView/load_map?hotel_id=<?php echo$hotel_id?>" style="height:200px;width:100%;border:none;"></iframe>

</div>
	<div class="col-md-4" style="padding-left:20px;border-style:solid;border-color:#ffffff;border-right-color: #f5f5f5;border-width: 1px;	">
			<div style="border-bottom-style: solid;border-color:#ffdd00;border-width:1px;padding-top: 10px;"><p style="color:#03a9f4;font-weight:bold;">Popular</p></div>

 <table  style="width:100%;">
    <?php 
        foreach ($hotel_tra_pop as $value) {
          $txtb = "none";
          if($value->st_p==1){$txtb="bold";}
    ?>
            <tr style="font-size:13px;"><td style="font-weight:<?php echo$txtb?>"><?php echo$value->name_location?></td><td style="text-align: right;"><?php echo$value->number_distance?>&nbsp;&nbsp;</td><td><?php echo$value->type_distance?></td></tr>
    <?php } ?>
   </table>
    

	</div>
	<div class="col-md-4" style="padding-left:20px;border-style:solid;border-color:#ffffff;	">
			<div style="border-bottom-style: solid;border-color:#ffdd00;border-width:1px;padding-top: 10px;"><p style="color:#03a9f4;font-weight:bold;">Nearby</p></div>

 <table  style="width:100%;">
    <?php 
        foreach ($hotel_tra_def as $value) {
    ?>
            <tr style="font-size:13px;"><td><?php echo$value->name_location?></td><td style="text-align: right;"><?php echo$value->number_distance?>&nbsp;&nbsp;</td><td><?php echo$value->type_distance?></td></tr>
    <?php } ?>
   </table>

		</div>
	</div>
</center>
</div>
<?php 
$fantastic_re=0;
$verygood_re=0;
$satisfying_re=0;
$average_re=0;
$poor_re=0;
foreach ($avg_all as $value_avg) {
	 $fantastic_re = round($value_avg->num_re1);
	 $verygood_re = round($value_avg->num_re2);
	 $satisfying_re = round($value_avg->num_re3);
	 $average_re = round($value_avg->num_re4);
	 $poor_re = round($value_avg->num_re5);
	}
	 $num_re_st1 = 0;
	 $num_re_st2 = 0;
	 $num_re_st3 = 0;
	 $num_re_st4 = 0;
	 $num_re_st5 = 0;
foreach ($avg_all_star as $value_avg_str) {
	 $num_re_st1 = round($value_avg_str->num_re1);
	 $num_re_st2 = round($value_avg_str->num_re2);
	 $num_re_st3 = round($value_avg_str->num_re3);
	 $num_re_st4 = round($value_avg_str->num_re4);
	 $num_re_st5 = round($value_avg_str->num_re5);
	}


?>
                                	   <div class="col-md-3" align="center" style=" padding: 10px !important">
															<div style="text-align: center; width: 120px; height: 120px;  background-color: #ffdd00; border: 4px #eaeaea solid;  border-radius: 50%;  display: inline-block; padding: 30px;">
																<p style="font-size: 30pt; color:#000000; text-align: center; font-weight: bold;"><div style="	padding:0px!important;margin:0px!important" id="showevgall">0</div>
																	<span style="font-size: 14pt; color: #00000; text-align: center; font-weight: bold;">Superb</span>
																</p>
															</div>
															
														</div>
														<div class="col-md-5" style="background-color:#FFFFFF; padding: 10px; font-size: 12pt !important">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tbody>
																<tr>
																  <td width="25%" align="left">Fantastic</td>
																  <td width="60%" align="left" valign="middle">
																  	<div class="progress" style="height: 18px; margin-bottom: 0px !important">
																  	    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo$fantastic_re?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo$fantastic_re?>%;">
																  	    <?php echo$fantastic_re?> Fantastic
																  	 </div>
																  </td>																  
																</tr>
																<tr>
																  <td width="25%" align="left">Very Good</td>
																  <td width="60%" align="left" valign="middle">
																  	<div class="progress" style="height: 18px; margin-bottom: 0px !important">
																  	    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo$verygood_re?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo$verygood_re?>%;">
																  	    <?php echo$verygood_re?> Very Good
																  	 </div>
																  </td>																  
																</tr>
																<tr>
																  <td width="25%" align="left">Satisfying</td>
																  <td width="60%" align="left" valign="middle">
																  	<div class="progress" style="height: 18px; margin-bottom: 0px !important">
																  	    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo$satisfying_re?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo$satisfying_re?>%;">
																  	    <?php echo$satisfying_re?> Satisfying
																  	 </div>
																  </td>																  
																</tr>
																<tr>
																  <td width="25%" align="left">Average</td>
																  <td width="60%" align="left" valign="middle">
																  	<div class="progress" style="height: 18px;  margin-bottom: 0px !important">
																  	    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo$average_re?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo$average_re?>%;">
																  	    <?php echo$average_re?> Average
																  	 </div>
																  </td>																  
																</tr>
																<tr>
																  <td width="25%" align="left">Poor</td>
																  <td width="60%" align="left" valign="middle">
																  	<div class="progress" style="height: 18px; margin-bottom: 0px !important">
																  	    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo$poor_re?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo$poor_re?>%;">
																  	    <?php echo$poor_re?> Poor
																  	 </div>
																  </td>																  
																</tr>
																
															  </tbody>
															</table>
														</div>
														<div class="col-md-4" style="background-color:#FFFFFF; padding: 10px; font-size: 12pt !important">
<?php 

function disstr($n){
$n = round($n);
$txtst = "";
for($i=1;$i<=$n;$i++){
	$txtst = $txtst.'<i class="fa fa-star" style="color: #ffdd00;margin-left:7px"></i>';
}
for($k=$i;$k<=5;$k++){
	$txtst = $txtst.'<i class="fa fa-star" style="color: #cccccc;margin-left:7px"></i>';
}
return $txtst;
}

?>

														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															  <tbody>
																<tr>
																  	<td>Cleanliness</td>
																  	<td> 
                                                                        <?php echo disstr($num_re_st1)?>	
                                                        			</td>
																</tr>
																<tr>
																  	<td>Comfort</td>
																  	<td>
                                                                        <?php echo disstr($num_re_st2)?>		
                                                                	</td>
																</tr>
																<tr>
																  	<td>Meal</td>
																  	<td>
																	   <?php echo disstr($num_re_st3)?>		
                                                                	</td>
																</tr>
																<tr>
																  <td>Location</td>
																  <td>
																  		<?php echo disstr($num_re_st4)?>	
                                                       			   </td>
																</tr>
																<tr>
																  <td>Service</td>
																  <td>
																     	<?php echo disstr($num_re_st5)?>	
                                                       			  </td>
																</tr>
																
															  </tbody>
															</table>															
														</div>
												     </div>
                                                   <br>


<?php 
  function	 condate($date){
  	$time = strtotime($date);
    $newformat = date('d-M-Y',$time);
    return $newformat;
  }


?>
   
<div class="clearfix" style="margin-bottom:20px;margin-top: 10px;"></div>
<div class="comment-count blog-comment-title sideline" style="margin-bottom:20px!important;margin-top:20px!important">
  REVIEW BY KHEMTIS USERS
</div>   
<ul class="comment-list list-unstyled" style="background-color: #f7f7f7; padding: 10px">
<?php 
$number_re = 0;
$txt_title = "";
$txt_detail = "";
$numallre = 0;$ipc=0;$sum_all_re=0;
foreach ($member_review as $vldata){
$ipc++;
$proof_cd = $vldata->proof_cd;
$cus_first_name= $vldata->cus_first_name;
$cus_last_name= $vldata->cus_last_name;
$num_day= $vldata->num_day;
$date_in= $vldata->date_in;
$date_out= $vldata->date_out; 
$add_date = $vldata->add_date;
       $txt_title = $vldata->review_title;
       $txt_detail = $vldata->review_detail;
       $number_re = $vldata->num_re;
       if($number_re>0){
         $number_re = (($number_re * 10) / 100);
       }
  $numallre	 = ($numallre + $number_re);
  $sum_all_re = ($sum_all_re + $number_re);
 ?>
                                                            <li class="media parent menu_left" style="border-bottom-style: solid;border-color:#ffffff">
                                                            <div class="comment-item" style="background-color: #ffffff;padding: 15px;">
                                                                 <div class="media-left">
                                                                 <div class="author" style="width:190px;text-align: left;">

 <center>	
 	 <div style="border-style:solid;width:50px;border-width: 1px;border-color:#d8d8d8;border-radius: 5px;background-color:#ffffff">
<font style="font-size: 20px;font-weight: bold;color:#03a9f4">
	<?php echo number_format($number_re,1)?></font>
</div>
</center>
<table>
<tr><td style="padding-right:5px;"><i class="fa fa-address-book-o" aria-hidden="true"></i></td><td><b><?php echo$cus_first_name?></b></td></tr>
<!--<tr><td style="padding-right:5px;"><i class="fa fa-bed" aria-hidden="true"></i></td><td></td></tr>-->
<tr><td style="padding-right:5px; vertical-align: top;	"><i class="fa fa-calendar" aria-hidden="true"></i></td><td style="font-size: 13px;">
	<div style="line-height: 1.5;">Stay <b><?php echo$num_day?></b> night</div>
	<div style="line-height: 1.5;">when <?php echo condate($date_in)?></div>
</td></tr>
</table>
</div>
                                                                </div>
                                                                <div class="media-right" style="width:100%">
                                                                    <div class="pull-left">
                                                                    </div>
                                                                    <div class="pull-right time">
                                                                        <i class="fa fa-clock-o"> </i>
                                                                        <span><?php echo condate($add_date)?></span>
                                                                    </div>
                                                                    <div class="des" style="width:100%" >

 <table style="width:100%!important;background-color:#ffffff;">
  <tr><td style="padding-left: 10px;"><h4><b>"<?php echo$txt_title?>"</b></h4></td></tr>
  <tr><td style="padding-left: 10px;"><?php echo$txt_detail?></td></tr>
 </table>
                                                                    </div>
                                                                    <!--<a href="#comment-form" class="btn-crystal btn"><i class="fa fa-reply"> </i>Reply</a>-->
                                                                </div>
                                                            </div>
                                                        </li>
<?php } 
if($ipc<=0){$ipc=1;}
$sum_all_re	 = ($sum_all_re / $ipc);
?>
<input type="hidden" value="<?php echo number_format($sum_all_re,1)?>" id="number_re"> 	
</ul>
<div class="comment-count blog-comment-title sideline" style="margin-bottom:20px!important;margin-top:20px!important">HOTEL DESCRIPTION</div>   
        <div class="panel panel-default" style="border-style: none!important;border-radius:0px!important;">
        <div class="panel-heading"  id="heading1" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1" style="background-image: linear-gradient(#ffffff, #ffffff,#ffffff,#ffffff)!important;text-align:left!important;height:30px!important;padding:2px!important;padding-left: 10px!important;color:#676262;border-style: solid;border-width: 1px!important">
                <b>
                Hotel Facility
                </b>
          </div>
          <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1" style="padding-top: 0px!important;">
            <div class="panel-body" style="border-style: solid!important;border-width:1px;border-color:#e6e6e6;border-radius:0px!important;text-align:left!important;padding-top:5px!important;border-top-style: none!important;">  
         <?php  foreach($hotel_feature as $value_icon){
             $img_icon = $value_icon->field1;
             $fld_valu_desc = $value_icon->fld_valu_desc;
         ?>
                <div class="col-md-12" style="margin-bottom:5px;"><i class="<?php echo$img_icon?>" style="font-style:normal!important;font-size: 15px;">&nbsp;&nbsp;<?php echo$fld_valu_desc?></i></div>
         <?php } ?>
            </div>
          </div>
        </div>
        <div class="panel panel-default" style="border-style: none!important;border-radius:0px!important;">
        <div class="panel-heading"  id="heading1" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse1" style="background-image: linear-gradient(#ffffff, #ffffff,#ffffff,#ffffff)!important;text-align:left!important;height:30px!important;padding:2px!important;padding-left: 10px!important;color:#676262;border-style: solid;border-width: 1px!important">
                <b>
                Description
                </b>
          </div>
          <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2" style="padding-top: 0px!important;">
            <div class="panel-body" style="border-style: solid!important;border-width:1px;border-color:#e6e6e6;border-radius:0px!important;text-align:left!important;padding-top:5px!important;border-top-style: none!important;">
                                <div class="panel-body">
																	  <?php echo$hotel_dec?>
                                </div>

            </div>
          </div>
        </div>

        <div class="panel panel-default" style="border-style: none!important;border-radius:0px!important;">
        <div class="panel-heading"  id="heading1" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse1" style="background-image: linear-gradient(#ffffff, #ffffff,#ffffff,#ffffff)!important;text-align:left!important;height:30px!important;padding:2px!important;padding-left: 10px!important;color:#676262;border-style: solid;border-width: 1px!important">
                <b>
                Hotel Policy
                </b>
          </div>
          <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3" style="padding-top: 0px!important;">
            <div class="panel-body" style="border-style: solid!important;border-width:1px;border-color:#e6e6e6;border-radius:0px!important;text-align:left!important;padding-top:5px!important;border-top-style: none!important;">
                     <?php echo$hotel_policy?>

            </div>
          </div>
        </div>        


                                </div>
                            </div>
                        </div>
                   
           
                         
                        <div class="page-main">
                            <div class="section-faq">
                                <div class="container">
                                    <div class="wrapper-faq">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 main-right">
                                                <div class="wrapper-content-faq">
                                                    <div class="content-faq">
                                                        <div id="accordion-1" class="panel-group wrapper-accordion">
                                                          



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                   	  
                    </div>

                    <?php 

                    $time1 = strtotime($book_st);
                    $newformat1 = date('Y-m-d',$time1);

                    $time2 = strtotime($book_en);
                    $newformat2 = date('Y-m-d',$time2);
                    ?>
                     <input type="hidden" value="<?php echo$newformat1?>" id="date_in">      
                     <input type="hidden" value="<?php echo$newformat2?>" id="date_out">  


                    <!-- BUTTON BACK TO TOP-->
                    <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>
                	<div class="special-offer margin-top70" style="padding-bottom: 50px !important">
                                        <h3 class="title-style-2">special offer</h3>
                                        <div class="special-offer-list">
<!--
                                            <div class="special-offer-layout">
                                                <div class="image-wrapper">
                                                    <a href="hotel-view.html" class="link">
                                                        <img src="assets/images/hotels/hotel-1.jpg" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="title-wrapper">
                                                        <a href="hotel-view.html" class="title">Akira Lipe Resort</a>
                                                        <i class="icons flaticon-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
-->
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
                                                        <div><a href="#" class="title" style="font-size:10px;color:#efefef!important"><?php echo$val_pack->package_title?></a></div>
                                                      <i class="icons flaticon-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                       <?php } ?>








                                        </div>
                                    </div>
                    </div>

                <!-- FOOTER-->
             
            </div>
        </div>

    <?php include("footer.php"); ?>
    <?php include("modal_login_register.php"); ?>
               
<div id="overlay">
<div id="text">


                    <input type="hidden" value="<?php echo$book_st_n?>" id="book_st_n">
                    <input type="hidden" value="<?php echo$book_en_n?>" id="book_en_n">

<div class="modal-content" style="background-color:#000000;padding:0px!important;">
<center>
    <div class="row" style="background-color:#ffffff;width:100%" >
        <div class="col-md-3" style="background-color:#ffffff;text-align: left;padding-top: 10px;">
            <div id="detail_hotel"></div>

        </div>
        <div class="col-md-9" style="margin-top:0px;background-color:#000000;position: relative;">
          <div id="imgshow" style="margin-top:15px;margin-bottom:15px;"></div>
          <div  onclick="off()" style="cursor: pointer;width:100px;color:#ffffff;background-color:#000000;height:30px;position: absolute;top:10px;right:0px;border-bottom-left-radius:5px;">Close</div>
           <center>
           <div style="position: absolute;bottom:20px;overflow:hidden;width: 95%;" id="show_img">
           </div>
           </center>
        </div>
    </div>
</center>


</div>
</div>




<!-- Modal --
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-box_hotel vertical-align-center">


</div>
        </div>
    </div>
-->

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
        <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
        <script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="assets/js/pages/sidebar.js"></script>
        <script src="assets/js/pages/result.js"></script>
        <!-- LOADING JS FOR PAGE
        <script src="assets/js/pages/tour-view.js"></script>
        <script src="assets/libs/isotope/isotope.min.js"></script>
        <script src="assets/libs/fancybox/js/jquery.mousewheel-3.0.6.pack.js"></script>  -->     
        
        <!-- LOADING JS FOR PAGE-->
        <script src="assets/js/pages/hotel-view.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>

        


<script>
myFunction();
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5500);
}



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

}).on('selectedCO',function(e, slDateCO) {

})
;


 var d_s = $('#book_st_n').val();
 var d_e = $('#book_en_n').val();

$('.t-datepicker').tDatePicker('updateCI', d_s);
$('.t-datepicker').tDatePicker('updateCO', d_e);




  });
</script>
<script src="assets/theme/t-datepicker.min.js"></script>
<script type="text/javascript">
var st_find=0;
function chk_hotel(){
var txt_find = $("#txt_find").val().trim();
 $.ajax({
       url: "<?php echo base_url('HotelView/chk_hotel')?>",
             type: "POST",
             data: ({txt_find:txt_find,}),
             dataType: "html",
      success:function(data) {
      var ardata =  data.split("::");

      if(ardata[1]>1){
           st_find = 1;
           $('#btfd').html("SEARCH");
      }else{
           st_find = 0;     
           $('#hotel_id').val(ardata[0]);
           $('#btfd').html("UPDATE");
      }


    },complete: function(){
             
      }
    });
}

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
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
            minDate: 0
        });
    });
});
</script>


<script>
sortTable();
minTable();
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      if (parseInt(x.innerHTML)> parseInt(y.innerHTML)) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}


function minTable() {
    var table, rows,num1,num2,i;
    num2 = 100000000;
    table = document.getElementById("myTable");
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      num1 = rows[i].getElementsByTagName("TD")[0].innerHTML;
      if (parseInt(num1)< parseInt(num2)) {
          num2 = num1;
      }
    }
      for (i = 1; i < (rows.length); i++) {
       num1 = rows[i].getElementsByTagName("TD")[0].innerHTML;
      if (parseInt(num1)==num2) {
           rows[i].getElementsByTagName("TD")[1].classList.add("border_min");

      }else{
           rows[i].getElementsByTagName("TD")[1].classList.add("border_no");
      }
    }
}
</script>



<script>
$('#showevgall').html('<div style="padding:0px!important;margin:0px!important;font-size: 30pt; color:#000000; text-align: center; font-weight: bold;" id="showevgall">'+$('#number_re').val()+'</div>');

function show_model(imgd,txtp2,txtp2,price,clr,room_name,disc,icon_model,txt_bf,img_room){	

//$('#myModal').show();
  on();
  var txt1 = "";
  var txt2 = "";
  var txt3 = "";
 
  var text4 = "";

  var i =0;
  var ic_txt="";
  var fac_txt="";
  var txt_icon = "";
  var icon_model = icon_model.split("::");
  var icn = icon_model.length;
  for(i=1;i<icn;i++){
  	 var sub_icon_model = icon_model[i].split("[=]");
  	ic_txt +='<span class="box_fac">&nbsp;<i  class="'+sub_icon_model[0]+'" >&nbsp;&nbsp;</i>&nbsp; '+sub_icon_model[1]+'</span><br>';
  }

 var txt_free_break = "";
  if(txt_bf=='Y'){
     txt_free_break = '<span style="font-size: 10pt;width:100%;line-height: 25px;border: 1px dashed #32a923;border-radius:3px;border-color:#83b587;border-width:1px;font-weight:bold;background-color:#f3f9f2 ; color:#0c7d16;float:right;padding-right:10px;padding-left:10px">Free Breakfast</span>';
  }

  txt1 +=' <img src="http://hotelcms.khemtis.com/'+imgd+'" style="width:100%;" id="img_show">';
  if(disc>0){
    txt2 +='<div style="position:absolute;" class="topleft_menu_g"></div>';
    txt2 +='<div style="position:absolute;top:5px;right:0px;color:#ffffff;padding-right:5px;font-weight:bold">'+disc+'%</div>';
  }

  txt2 +='<span class="box_fac"><font style="font-size:18px;color:#2d6da5;font-weight:bold">'+room_name+'</font><br>&nbsp; <font style="font-weight:bold;font-size:15px;'+clr+'">  '+price+'&nbsp;THB</font></span><br>';
  txt2 += '<div>'+txt_free_break+'</div><div style="width:auto;height:auto;" class="ex3"><font color="#000000">Features detail</font><br>'+ic_txt+'</div>';


  var s_img = img_room.split(",");
  var s_cn = s_img.length;
  var k = 0;
  for(k=1;k<s_cn;k++){
     txt3+='<td style="padding-right:3px;padding-left:3px;"><img src="http://hotelcms.khemtis.com/'+s_img[k]+'" onclick="chg_img(this)" class="aphaimg" style="height:100px;"></td>';
  }
     txt3 += '<table><tr>'+txt3+'</tr></table>';  

  $('#detail_hotel').html(txt2);
  $('#imgshow').html(txt1);
  $('#show_img').html(txt3);
  
}	


function chg_img(elm){
  $('#img_show').attr('src', elm.src);
}


</script>




<script>$(document).ready(function () {

    
    $("#popup").hide().fadeIn(1000);

     //close the POPUP if the button with id="close" is clicked
    $("#close").on("click", function (e) {
        e.preventDefault();
        $("#popup").fadeOut(1000);
    });

});
</script>







<script type="text/javascript">
window.onload=function(){
 $(function () {
           
            $('#startdate,#enddate').datetimepicker({
                useCurrent: false,
                minDate: moment(),
                format: 'DD-MMM-YYYY'
            });
            $('#startdate').datetimepicker().on('dp.change', function (e) {
                var incrementDay = moment(new Date(e.date));
                incrementDay.add(1, 'days');
                $('#enddate').data('DateTimePicker').minDate(incrementDay);
                $(this).data("DateTimePicker").hide();
                $('#enddate').data('DateTimePicker').show();
            });

            $('#enddate').datetimepicker().on('dp.change', function (e) {
                var decrementDay = moment(new Date(e.date));
                decrementDay.subtract(1, 'days');
                $('#startdate').data('DateTimePicker').maxDate(decrementDay);
                $(this).data("DateTimePicker").hide();
            });

        });
        

    }
</script>

        <script>

//------------------------- Delete Img-------------------------
function clsmodel(){$('#myModal').modal('toggle');}
     function search_hotel() {
      //alert(st_find);
          if(st_find==1){
                 $('#form_search').submit();
          }else{
                 var hotel_id = $('#hotel_id').val();
                 //var book_st = $('#book_st').val();
                 //var book_en = $('#book_en').val();
                 var adu = $('#Adults').val();
                 var acu = $('#Child').val();
                 var txt_search = $('#txt_find').val();
                 var book_st = $('#wrapper-content').find('input[name="t-start"]').val();
                 var book_en = $('#wrapper-content').find('input[name="t-end"]').val();
                //var tds =  $('t-start').val();

              
                window.location= "https://www.khemtis.com/HotelView?lang=en&hotel_id="+hotel_id+"&txt_find="+txt_search+"&book_st="+book_st+"&book_en="+book_en+"&Adults="+adu+"&Child="+acu;
          }
     }


function get_num_extra(idrun,ex_p,ntn){
   var get_exv = $('#num_room_extra'+idrun).val();
   if(get_exv==0){$('#txt_extra'+idrun).html("<b>"+currencyFormatDE(ex_p)+"</b>");$('#sh_ext_pr'+idrun).html("");}else{
   $('#txt_extra'+idrun).html("<b>"+currencyFormatDE(get_exv*ex_p)+"</b>");
   $('#sh_ext_pr'+idrun).html("<font style='font-size:10px'> &nbsp;<b>"+currencyFormatDE((get_exv*ex_p)*ntn)+"</b> / "+ntn+" NIGHT(S)</font>");
  }
}

function currencyFormatDE(num) {
  return (
    num
      .toFixed(2) // always two decimal digits
      .replace(',', ',') // replace decimal point character with ,
      .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' '
  ) 
}



function add_booking_hotel(room_id,loop_id_room,room_detail,numdate,hotel_id,adults,child){
  var max_room = $('#max_room').val();
  var get_num_room = $('#num_room'+loop_id_room).val();
  var get_extra_room = $('#num_room_extra'+loop_id_room).val();
  var room_ex_pr = $('#room_ex_pr'+loop_id_room).val();

  var date_in = $("input[name*='t-start']").val();
  var date_out = $("input[name*='t-end']").val();
  var url_cur  = $('#usr_curent').val();
  adults = $('#Adults').val();
  child = $('#Child').val();

  //alert(date_in );
 $.ajax({
       url: "<?php echo base_url('HotelView/add_pre_book')?>",
             type: "POST",
             data: ({room_id:room_id,room_detail:room_detail,get_num_room:get_num_room,get_extra_room:get_extra_room,room_ex_pr:room_ex_pr,numdate:numdate,hotel_id:hotel_id,max_room:max_room,adults:adults,child:child,date_in:date_in,date_out:date_out,url_cur:url_cur}),
             dataType: "html",
      success:function(data) {
      if(data>0){
        f_menu_right_sh();
         show_booklist(hotel_id,max_room);
         clk_menu(1);
       
      }else{
          alert("Not This Room available !");
      }},complete: function(){
             
      }
    });
}


function  reset_qta(){
if($('#get_roomqtr').val()!=""){
var txt_qtr = $('#get_roomqtr').val().split(":");
for(var i=1;i<txt_qtr.length;i++){
   var sbi = (txt_qtr[i]).split("=>");
   var sel_qtr = $('#numqtr_room'+sbi[0]).val();
   add_ata(sbi[0],sel_qtr);
    for(var k=(sel_qtr);k>(sel_qtr-sbi[1]);k--){
      $("#num_room"+sbi[0]+" option[value='"+k+"'").remove();   
   }
   if(sel_qtr-sbi[1]<1){
    $('#addbt'+sbi[0]).prop('disabled', true);
   }else{
    $('#addbt'+sbi[0]).prop('disabled', false);
   }

 }}
}

function add_ata(idn,max){
    $('#num_room'+idn).empty();
    $('#num_room_extra'+idn).empty();
 for(var i=1;i<=max;i++){
    $('#num_room'+idn).append('<option value="'+i+'">'+i+'</option>');
 }
    $('#num_room_extra'+idn).append('<option value="0">0</option><option value="1">1</option>');
}

function add_extra(room_id,max_extra_bed,ex_p,nt){
var add_num_extra = $('#num_room'+room_id).val();
var txt = "";
$('#show_extra'+room_id).empty();
                        txt +='<table><tr><td>No.Bed:</td><td>'+
                                '<select class="sl_css" onchange="get_num_extra('+room_id+','+ex_p+','+nt+')" name="num_room_extra'+room_id+'" id="num_room_extra'+room_id+'">'+
                                '<option value="0">0</option>';
                                for(var q=1;q<=(max_extra_bed*add_num_extra);q++){
                                txt +='<option value="'+q+'">'+q+'</option>';
                                   }
                                txt+= '</select></td><td><span id="sh_ext_pr'+room_id+'"></span></td></tr></table>';
                                $('#show_extra'+room_id).html(txt);
                             
}

 function show_pr_de(idroom){
$('#popup_room'+idroom).css('display','block');
        show_prout();
}

function show_prout(idroom){
$('#popup_room'+idroom).css('display','none');
}

 function fc_room_price(idroom){
  var txt = '<table class="table">';
   txt += '<tr style="background-color:#f7f7f7"><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>';
     for(i=1;i<5;i++){
      txt += '<tr><td>100.00</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
     }
      txt +='</table>';
    $('#show_lis_room_price'+idroom).html(txt);
 }

 </script>  


   </body>
</html>