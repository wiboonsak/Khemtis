     <?php $pthc= base_url();?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />
    
<style type="text/css">
  
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


  .search_categories{

  cursor: pointer;	
  padding: 4px 8px 5px 10px;
  background: #fff;
  border: 1px solid #ffffff;
  border-radius: 3px;
  overflow: hidden;
  position: relative;


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


.search_categories .select{
 width: 350px!important;
  background:url('arrow.png') no-repeat;
  background-position:80% center;
}

.search_categories .select select{
  background: transparent;
  line-height: 1;
  border: 0;
  padding: 0;
  border-radius: 0;
  width: 350px!important;
  position: relative;
  z-index: 10;
  font-size: 1em;
}
.service-small 
{ font-size:17px;
border-style: solid;	
border-color:red;
 }
.boxbd{
   margin-top: -10px!important;
   border-radius:0px 0px 10px 10px;
  -moz-border-radius:0px 0px 10px 10px;
  -webkit-border-radius:0px 0px 10px 10px;
   border-bottom: 3px solid rgba(255, 255, 255, 0.5);
}

 #clock {
    background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;color:#b7b7b7;
  padding: 0;
  float:right;
  top:0px;

  right: 0px;
  position:absolute;
  line-height: 40px;
  color: #3c3c3c;
  font-size: 28px;
  font-family: calibri;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
  padding: 0px 10px 0px 10px;
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

  </style>



<?php 
$h_lg = $this->session->userdata('ch_lang');
$tr_ar =  array();
$tr_ar = $this->Lang_fc->transport($h_lg);
?>


            <!-- WRAPPER CONTENT-->
            <div class="wrapper-content">
                <!-- HEADER-->
                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">                        
                        <section>
                            <div class="tab-search tab-search-long tab-search-default bgbox_tran">

                                <div class="tab-content-bg" style="background-color: #ffdd00;">
                                   <!--<div style="height:1px;background-color:#d0b81d"></div>-->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="tab-content">
                                                    <div role="tabpanel" id="cruises" class="tab-pane fade in active">
                                                        <div class="find-widget find-cruises-widget widget" style="padding: 0px!important;">


                                                    <form class="content-widget" action="<?php echo base_url('Charter/Van/trip_list') ?>" method="post" enctype="multipart/form-data" onsubmit="return CheckForm()" name="frm1" id="frm1">

<input type="hidden" id="type_page" value="3">
<div style="width:100%;height:auto!important;padding:0px!important;">
<div class="row">

<br>
<br>
<div class="col-md-2" style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;">
                              <label for="exampleInputEmail1"><?php echo$tr_ar["dep_txt"]?></label>
                              <div class="select">
                                        <span hidden="true" id="formroute">From:</span>
                                             <div class="select-wrapper"  style="border-radius:5px;"> 
                                                <select id="routedata" class="search_categories_dep"  name="routedata" onchange="placedataupdate(this.value)" style="width: 100%;height: 35px;">
                                                    <option value="">---Select---</option>
                                                    <?php
                                                    $getcharterboatList = $this->Charter_model->getchartervanList();
                                                    foreach ($getcharterboatList->result() as $charterboatList) {
                                                        ?>
                                                        <option value="<?php echo $charterboatList->begin_place_id ?>"><?php echo $charterboatList->place_title ?> </option>
                                                    <?php } ?>
                                                </select>
                                               </div>
                                            </div>


  </div>
  <div class="col-md-2" style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;">
                              <label for="exampleInputEmail1"><?php echo$tr_ar["rep_txt"]?></label>
                              <div class="select" >
                                         <span hidden="true" id="formto">To:</span>
                                             <div class="select-wrapper"  style="border-radius:5px;"> 
                                               <select id="placedata" name="placedata" class="search_categories_dep" style="width: 100%;height: 35px;" >
                                                  <option value="">---Select---</option>
                                               <?php
                                                    $placeData = $this->Routetranfer_model->list_placeData();
                                                    foreach ($placeData->result() as $placeData2) {?>
                                                  <option value="<?php echo $placeData2->id ?>"><?php echo $placeData2->place_title ?></option>
                                                    <?php } ?>
                                               </select>
                                               </div>
                                             </div>

  </div>
  <div class="col-md-2" style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;">
                            <label for="id_start_date"><?php echo$tr_ar["date_dep"]?>:</label>
                            <div class="input-group date" id="startdate">
                                <input type="text" value="<?php echo frmd_n($str_date)?>" name="book_st" id="book_st" placeholder="DD-MM-YY" class="form-control" style="width:100%;background-color: #ffffff;" onchange="calculatedate(this.value)"/>
                                 <input type="hidden" id="datetotal" name="datetotal" value="">
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>


  </div>
  <div class="col-md-2" style="text-align:left!important;border-left-style:none;border-width: 1px;border-color:#b59d00;border-right-style: none;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;">
               <div id="dateReturn">
                            <label for="id_end_date"><?php echo$tr_ar["date_rep"]?>:</label>
                            <div class="input-group date" id="enddate">
                                <input type="text" value="<?php echo frmd_n($end_date)?>" name="book_en" id="book_en" placeholder="DD-MM-YY" class="form-control"  style="width:100%;background-color: #ffffff;" onchange="calculatereturndate(this.value)"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>
                </div>
  </div>


<div class="col-md-2" style=";border-width: 1px;border-color:#b59d00;border-right-style: none;border-bottom-style: none;padding-bottom: 10px;border-top-style: none;position:relative;">
<table style="width:100%!important;"><tr><td style="padding-right:10px!important">
                                                                     <label class="tb-label"><?php echo$tr_ar["Adult"]?></label> 
                                                                     <div style="margin-top:0px;">
                                                                     <select id="Adults" class="search_categories" name="Adults" style="text-align:left!important;font-size: 18px;">
                                                                    <option value="0">...</option>
                                                        <?php for ($a = 1; $a <= 10; $a++) {?>        
                                                          <option class="service-small" value="<?php echo $a ?>"
                                                          <?php if($adults==$a){echo "selected";}else{echo "";}?>
                                                            ><?php echo $a ?></option>
                                                        <?php } ?>
                                                                     </select>
                                                                 </div>
</td><td>
                                                                     <label class="tb-label"><?php echo$tr_ar["Children"]?></label>
                                                                     <div  style="margin-top:0px;">
                                                                      <select  id="Children" class="search_categories" name="Child" style="background-color:#ffffff;font-size: 18px;">
                                                                      <option value="0">...</option>
                                                    <?php for ($a = 1; $a <= 10; $a++) { ?>                                                 
                                                         <option  class="service-small" value="<?php echo $a ?>"
                                                         <?php if($child==$a){echo "selected";}else{echo "";}?>
                                                          ><?php echo $a ?></option>
                                                    <?php } ?>
                                                                    </select>
                                                                </div>
</td></tr></table>
</div>
<div class="col-md-2" style="text-align: center;padding:25px;">
<center>	
      <div class="chil_border"  onclick="submitdata()"  style="background-color:#3c3c3c!important;height:40px!important;cursor: pointer;">
          <b></b><font color='#ffdd00'><?php echo$tr_ar["SEARCH"]?></font>
      </div>
</center>
</div>
<div id="clock"></div>
<div class="col-md-12" style="padding-bottom:10px!important"><font style="font-size:15px;font-weight:bold;color:#8a0e24;" ><?php echo$tr_ar['tr_poly']?></font></div>
</div>
</div>
</div>




                                                    <input type="hidden" id="spanRoute" name="spanRoute" value="">
                                                    <input type="hidden" id="spanTo" name="spanTo" value="">
                                                     </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div style="height:1px;background-color:#d0b81d"></div>
                        </section>
                        
                        <section class="a-fact padding-top padding-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="group-title">
                                            <div class="sub-title">
                                                <p class="text">HOW TO GET HERE</p>
                                                <i class="icons flaticon-people"></i>
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
                                            <a href="#" class="btn btn-maincolor">Boat Timetable</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="a-fact-image-wrapper">
                                            <div class="a-fact-image">
                                                <a href="#" class="icons icons-1">
                                                    <i class="fa fa-ship"></i>
                                                </a>
                                                <img src="http://www.khemtis.com/assets/images/homepage/guide-koh-lipe-blog-how-to-get-to-koh-lipe.jpg" alt="" class="img-responsive">
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- BUTTON BACK TO TOP-->
                    <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>

      <?php include("html_tool/modal_login_register.php"); ?>
              
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>

        <script src="<?php echo$pthc?>assets/libs/detect-browser/browser.js"></script>
        <script src="<?php echo$pthc?>assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
        <script src="<?php echo$pthc?>assets/libs/wow-js/wow.min.js"></script>
        <script src="<?php echo$pthc?>assets/libs/slick-slider/slick.min.js"></script>
        <script src="<?php echo$pthc?>assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
        <script src="<?php echo$pthc?>assets/libs/please-wait/please-wait.min.js"></script>
        <script src="<?php echo$pthc?>assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="<?php echo$pthc?>assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <script src="<?php echo$pthc?>assets/libs/fancybox/js/jquery.fancybox-thumbs.js"></script>
        <!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")-->
        <!-- MAIN JS-->
        <script src="<?php echo$pthc?>assets/js/main.js"></script>
        <!-- LOADING JS FOR PAGE-->
        <script src="<?php echo$pthc?>assets/js/pages/home-page.js"></script>
  
        <script src="<?php echo$pthc?>assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="<?php echo$pthc?>assets/libs/parallax/TweenMax.min.js"></script>
        <script src="<?php echo$pthc?>assets/libs/parallax/jquery-parallax.js"></script>


   <script type="text/javascript">
         
     function updateClock() {
    var currentTime = new Date();
    // Operating System Clock Hours for 12h clock
    var currentHoursAP = currentTime.getHours();
    // Operating System Clock Hours for 24h clock
    var currentHours = currentTime.getHours();
    // Operating System Clock Minutes
    var currentMinutes = currentTime.getMinutes();
    // Operating System Clock Seconds
    var currentSeconds = currentTime.getSeconds();
    // Adding 0 if Minutes & Seconds is More or Less than 10
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
    // Picking "AM" or "PM" 12h clock if time is more or less than 12
    var timeOfDay = (currentHours < 12) ? "AM" : "PM";
    // transform clock to 12h version if needed
    currentHoursAP = (currentHours > 12) ? currentHours - 12 : currentHours;
    // transform clock to 12h version after mid night
    currentHoursAP = (currentHoursAP == 0) ? 12 : currentHoursAP;
    // display first 24h clock and after line break 12h version
    var currentTimeString =  currentHours + ":" + currentMinutes + ":" + currentSeconds;
    // print clock js in div #clock.
    $("#clock").html(currentTimeString);}
    $(document).ready(function () {
    setInterval(updateClock, 1000);
});
    </script>



    <script type="text/javascript">
            window.onload=function(){
            $('#startdate,#enddate').datetimepicker({
       useCurrent: true,
       minDate:moment().add(1, 'days'), // Current day
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
    }
 //---------------------------------
		function calculatereturndate(returndate){
                    var datedata = $('#book_st').val();
                    
			$.post('<?php echo base_url('Charter/Speedboat/calculatedate')?>' ,{datedata:datedata,returndate:returndate }, function(data){
                            
				$('#datetotal').val(data);
			});
		}	
		function calculatedate(date){
                     var returndate = $('#book_en').val();
			$.post('<?php echo base_url('Charter/Speedboat/calculatedate')?>' ,{datedata:date,returndate:returndate }, function(data){
                            
				$('#datetotal').val(data);
			});
		}	


    
    var logo_str = 'http://www.khemtis.com/assets/images/logo/logo-khemtis-black.png';
            if (Cookies.set('color-skin'))
            {
                logo_str = 'http://www.khemtis.com/assets/images/logo/logo-black-' + Cookies.set('color-skin') + '.png';
            }
            /*
            window.loading_screen = window.pleaseWait(
            {
                logo: logo_str,
                backgroundColor: '#fff',
                loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
            });
            */d1
         //================================== changeSearchForm('roundTrip',ischecked)changeSearchForm('oneTrip')dateReturn
		  function 	changeSearchForm(tripType,ischecked){
			  
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
	    
function submitdata(){
    $('#frm1').submit();
}

			
         //==================================
        function placedataupdate(changeValue) {

        $.post('<?php echo base_url('Charter/Van/placedataupdate') ?>', {changeValue: changeValue},
         function (data) {
         $('#placedata').empty();
         $('#placedata').html(data);
     });
}
          //-------------------------------------
		function setTopmenySelect(idMenu){
			$('.topmenu').removeClass('current-menu-parent');
			$('#'+idMenu).addClass('current-menu-parent');
		}
			setTopmenySelect('liindex');	
          //================================== $('#radio-5').is(':checked') $('#radio-6').is(':checked')
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
          /*     var postData = new FormData($("#frm1")[0]);
        $.ajax({
            type: 'POST',
            url: '<?php //echo base_url('Welcome/trip_list') ?>',
            processData: false,
            contentType: false,
            data: postData,
            success: function (data, status) {
                if (status == 'success') {
                   
                } else {
                  
                }
            }
        });*/
        }}



        $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
        </script>
    </body>
</html>