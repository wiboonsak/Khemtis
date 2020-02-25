

<link rel="stylesheet" href="assets/time/dist/wickedpicker.min.css">
<style type="text/css">
    .title_hdr_box{
       font-size: 20px;
       font-weight: bold;
       color:#066c98;
    }
    
       .csstxt{
       border-style: solid;
       border-width: 1px;
       border-color:#cccccc;
       border-radius: 5px;

   }
</style>
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">
<center>
    <div style="width:50%;">
      <ul class="progressbar">
        <li>Contact Information</li>
        <li>Payment information</li>
        <li>Booking is confirmed!</li>
      </ul>
    </div>
 </center>
 <?php $para = $lastpara;?>
 <form  id="from_booking" name="from_booking" method="post">
         <div class="page-main">
                            <div class="section-faq" style="padding-top:35px!important;">
                                <div class="container">
                                    <div class="wrapper-faq">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12 main-left">
                                                <div class="wrapper-content-faq">
                                                    <div class="content-faq">
                                                        <h3 class="title_hdr_box">Contact Information</h3>
                                                        <div class="wrapper-login">
                                                        <div class="content-login">
                                    					<div class="main-login" style="padding: 15px !important">
															<div class="login-form">
															<div class="row">
																<div class="content-form">
																	<div class="col-md-6">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">First Name
																					<i class="form-icon fa fa-asterisk"></i>
																				</label>
																				<input type="text" name="cus_first_name" class="form-control label-input">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">Last Name
																					<i class="form-icon fa fa-asterisk"></i>
																				</label>
																				<input type="text" name="cus_last_name" class="form-control label-input">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">Email
																					<i class="form-icon fa fa-asterisk"></i>
																				</label>
																				<input type="email" name="cus_email" class="form-control label-input">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">Contact Number
																					<i class="form-icon fa fa-asterisk"></i>
																				</label>
																				<input type="text"  name="cus_phone" class="form-control label-input">
																			</div>
																		</div>
																	</div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-login">
                                                                            <div class="input-login">
                                                                                <label class="label-login">Address
                                                                                  
                                                                                </label>
                                                                                <textarea class="csstxt" name="cus_addr" style="width: 100%; height: 70px; padding: 10px;"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

																	<div class="col-md-12">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">Note
																					
																				</label>
																				<textarea class="csstxt" name="cus_note" style="width: 100%; height: 70px; padding: 10px;"></textarea>
																			</div>
																		</div>
																	</div>


																	<div class="col-md-12">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">
																					<input type="checkbox"> I am the guest
																				</label>																				
																			</div>
																		</div>
																	</div>	

																	<div class="col-md-12">
																		<div class="form-login">
																			<div class="input-login">
																				<label class="label-login">Guest's first name and last name
																					<i class="form-icon fa fa-asterisk"></i>
																				</label>
																				<input type="text" class="form-control label-input">
																				<span style="font-size: 9pt; color:#B4B4B4">Fill in your name as on ID card/passport/driving license (without title/special characters)</span>
																			</div>
																		</div>
																	</div>




																	<div class="col-md-12">

													<div class="content-faq" style="background-color: #ffffff;text-align:left!important">
                                                        <p style="font-size: 16px;font-weight: bold;color:#803232">Special request (optional)</p>
                                                        <div class="panel-body">
                                                          <div class="col-md-12">
														     

																		<div style="padding: 20px; background-color: #F5F5F5; border: 1px solid #E8E8E8; border-radius: 10px; font-size: 10pt">
																			<p><strong>Special request (optional)</strong></p>
																			<p>Have a special request? Ask, and the property will do its best to meet your wish. (Note that special request are not guaranteed and may incur charges)</p>
																			
																			<div style="padding: 10px; background-color: #FFFFFF; border: 1px solid #FFFFFF; border-radius: 10px; font-size: 10pt">
																				<p>All special requests are subject to availability and thus are not guaranteed. Early check-in or Airport Transfer may incur additional charges. Please contact hotel staff directly for further information.</p>
																				<div class="row">
																					<div class="col-md-5">
																					<ul>
																						<li style="list-style: none;">
																							<label class="label-login">
																								<input type="checkbox"> Non-smoking Room
																							</label>
																						</li>
																						<li style="list-style: none;">
																							<label class="label-login">
																								<input type="checkbox"> High Floor
																							</label>
																						</li>
																						<li style="list-style: none;">
																							<label class="label-login">
																								<input type="checkbox"> Connecting Rooms
																							</label>
																						</li>
																						<li style="list-style: none;">
																							<label class="label-login">
																								<input type="checkbox"> Bed Type
																								<ul>
																									<li style="list-style: none;">
																										<label class="label-login">
																											<input type="radio"> 2 Single Beds
																										</label>
																									</li>
																										<li style="list-style: none;">
																										<label class="label-login">
																											<input type="radio"> 1 Large Bed
																										</label>
																									</li>																							
																								</ul>																								
																							</label>
																						</li>		
																					</ul>
																					</div>
																					<div class="col-md-5">
																					<ul>
																						<li style="list-style: none;">
																							<label class="label-login">
																								<input type="checkbox"> Check-in Time
																								<div class="row" style="padding-left: 30px">
																									
<input type="text" id="timepicker1" name="timepicker1" class="timepicker1" style="border-style:solid;border-width:1px;border-color:#cccccc;padding-left:10px;">

																								</div>
																							</label>
																						</li>
																						<li style="list-style: none;">
																							<label class="label-login">
																								<input type="checkbox"> Check-out Time
																								<div class="row" style="padding-left: 30px">
<input type="text" id="timepicker2" name="timepicker2" class="timepicker2"  style="border-style:solid;border-width:1px;border-color:#cccccc;padding-left:10px;">
																								</div>
																							</label>
																						</li>	
																					</ul>
																					</div>
																				</div>

																				<div class="row">													
																					<div class="col-md-12">
																						<div class="form-login">
																							<div class="input-login">
																								<label class="label-login">
																								<input type="checkbox"> Others </label><br>
																								<span style="font-size: 9pt;">Please write in English or in hotel's local language.</span>
																								<textarea style="width: 100%; height: 107px; padding: 10px;"></textarea>
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
														</div></div>
                                                   		</div>
                                                    </div>   
                                                 

                   
                                                   

                                                                                                        
                                                </div>
                                            </div>







                               <?php
$date1=date_create($book_st);
$date2=date_create($book_en);
$diff=date_diff($date1,$date2);
 $numdate= $diff->format("%a ");
 $book_st = strtotime($book_st);
 $book_en = strtotime($book_en);
                                ?>
                                            <div class="col-md-4 col-sm-12 col-xs-12 wrapper-contact-faq" >
                                                <div class="contact-wrapper">
                                                    <div class="contact-box" style="border-radius: 10px;padding:15px!important;">
                                                        <h5 class="title">BOOKING SUMMARY</h5>                                                       
														<div style="background-color: #FFFFFF; padding: 10px;border-top-left-radius:10px;border-top-right-radius:10px;" >
															<table width="100%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>
																<tr>
																  <td><p class="title_hdr_box" style="float: left; font-size: 16px !important">
 <?php echo$name_hotel?>
																  </p></td>
																</tr>
																<tr>
																  <td align="left"><i class="fa fa-arrow-right aria-hidden="true""></i>&nbsp;Check-In</td>
                                                                  <td><?php  echo date('d-M-Y',$book_st);?></td>
																</tr>
                                                                <tr>
                                                                  <td align="left"><i class="fa fa-arrow-left aria-hidden="true""></i>&nbsp;Check-Out</td>
                                                                  <td><?php echo date('d-M-Y',$book_en);?></td>
                                                                </tr>
															  	<tr>
																  <td align="left"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Total Nights</td>
                                                                  <td><?php echo$numdate?>&nbsp;&nbsp;Nights</td>
																</tr>
                                                            <!--
																<tr>
																  <td align="left"><i class="fa fa-hotel" aria-hidden="true"></i>&nbsp;Total Room</td>
                                                                  <td>0</td>
																</tr>	
                                                            -->
															  	<tr>
																  <td align="left"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Total Guests</td>
                                                                  <td>Adults:<?php echo$Adults?>&nbsp;Child:<?php echo$Child?></td>
																</tr>
																<tr>
																  <td align="left" style="height:10px;"></td>
																</tr>
                                                                <tr><td colspan="2">
                                                                <div style="background-color: #f6f6f6;border-style:solid;border-width:1px;border-color:#e2e2e2;padding:5px;width:100%;border-radius: 5px;">
																<table style="width:100%">
<?php
$sum_total = 0 ;
foreach ($book_room_detail as $val_room_detail) {
	    $room_detail = $val_room_detail->room_title;
        $room_price = $val_room_detail->new_pr;
        $room_qty = $val_room_detail->cnt_room;
        $room_total = $val_room_detail->total_sum;
        $sum_total = $sum_total + $val_room_detail->total_sum;
        $sum_extra = $val_room_detail->sum_extra;
        $ext_qty = $val_room_detail->ext_qty;
?>
                                                                <tr>
																  <td align="left" style="background-color: #f6f6f6;"><b><?php echo$room_detail?></b> </td>
																  <td align="right" style="background-color: #E5E5E5;"></td>
																</tr>
                                                                <tr><td colspan="2" style="text-align: left;font-size: 13px;">
                                                    <table width="100%">
                                                       <tr><td> <?php echo$room_qty?> x Room: </td><td style="text-align:right">&nbsp;<?php echo number_format($room_price,2)?>&nbsp;THB</td></tr>
                                                       <tr><td> <?php echo$ext_qty?> x Extra Bed: </td><td style="text-align:right">&nbsp;<?php echo number_format($sum_extra,2)?>&nbsp;THB</td></tr>
                                                       <tr><td> Total: </td><td style="text-align:right"><b>&nbsp;<u><?php echo number_format(($sum_extra+$room_price),2)?></u></b>&nbsp;THB</td></tr>
                                                    </table>

      <div style="height:1px;width:100%;background-color:#dedede;margin-bottom:3px; "></div>
                                                                 </td></tr>
<?php
        }
?>
                                                                </table>

    <!--  <div style="width:100%;text-align: right;"><b><?php //echo$sum_total?>&nbsp;THB</b></div>
      <div style="height:1px;width:100%;background-color:#dedede;margin-bottom:3px; "></div>-->

                                                                </div>
                                                                </td></tr>				
															  </tbody>
															</table>
															

                                                            <!--
															<table width="100%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>
																<tr>
																  <td><h4 class="title_hdr_box" style="float: left; font-size: 16px; margin-top: 30px !important">Return</h4></td>
																</tr>
																<tr>
																  <td align="left"><i class="fa fa-arrow-right aria-hidden="true""></i> From Koh Lipe to Pakbara</td>
																</tr>
															  	<tr>
																  <td align="left"><i class="fa fa-calendar" aria-hidden="true"></i> Date: Wed, 1 Feb 2018</td>
																</tr>
																<tr>
																  <td align="left"><i class="fa fa-clock-o" aria-hidden="true"></i> Time: 09:30 AM</td>
																</tr>
															  	<tr>
																  <td align="left"><i class="fa fa-ship" aria-hidden="true"></i> Type of boat: Speedboat</td>
																</tr>
																<tr>
																  <td align="left"></td>
																</tr>
																<tr>
																  <td align="left" style="background-color: #E5E5E5; padding: 5px;">Adults 2 x 500 Baht</td>
																  <td align="right" style="background-color: #E5E5E5; padding: 5px;">1,000.00</td>
																</tr>
																<tr>
																  <td align="left" style="background-color: #E5E5E5;">Children 2 x 350 Baht</td>
																  <td align="right" style="background-color: #E5E5E5;">700.00</td>
																</tr>
																</tbody>
															</table>	
															-->
														

<!--
															<table width="100%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>
																<tr>
																  <td align="left"><strong>Transfer From Pakbara</strong></td>
																  <td></td>
																</tr>
																<tr>
																  <td align="left">Adults 2 x 500 Baht</td>
																  <td align="right">1,000.00</td>
																</tr>
																<tr>
																  <td align="left">Children 1 x 350 Baht</td>
																  <td align="right"> 700.00</td>
																</tr>
																<tr>
																  <td align="left"><strong>Transfer From Koh Lipe</strong></td>
																  <td></td>
																</tr>
																<tr>
																  <td align="left">Adults 2 x 500 Baht</td>
																  <td align="right">1,000.00</td>
																</tr>
																<tr>
																  <td align="left">Children 1 x 350 Baht</td>
																  <td align="right"> 700.00</td>
																</tr>																
															  </tbody>
															</table>
-->
														</div>
                                                       <div style="background-color: #40b4e7; padding: 10px; margin-top:0px; border-top: 0px solid #FFFFFF; border-bottom: 0px solid #FFFFFF;border-bottom-left-radius:10px;border-bottom-right-radius:10px;" >
                                                       		<table width="100%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>																
																<tr>
																  <td align="left" style="font-weight: bold; color: #FFFFFF;">Total Price:</td>
																  <td align="right" style="font-weight: bold; color: #FFFFFF;"><font style="text-decoration-line: underline;
  text-decoration-style: double;"><?php echo number_format($sum_total,2)?></font>&nbsp;THB&nbsp;&nbsp;</td>
																</tr>																
															  </tbody>
															</table>
                                                       </div>

                                                       <div class="contact-submit">
															<button type="button" data-hover="PAYMENT" class="btn btn-slide" onclick="book_up()">
																<span class="text" style="color:#ffffff">PAYMENT</span>
																<span class="icons fa fa-arrow-right "></span>
															</button>
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
</form>
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
        <script src="assets/js/pages/faq.js"></script>

  
        <script type="text/javascript" src="assets/time/dist/wickedpicker.min.js"></script>


        <script>
            var logo_str = 'assets/images/logo/logo-black-color-1.png';
            if (Cookies.set('color-skin'))
            {
                logo_str = 'assets/images/logo/logo-black-' + Cookies.set('color-skin') + '.png';
            }
            window.loading_screen = window.pleaseWait(
            {
                logo: logo_str,
                backgroundColor: '#fff',
                loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
            });
    
var nextpage= "<?php echo$para?>";

   //------------------------- Delete Img-------------------------
function add_book_id(){
    $.post("<?php echo base_url('HotelBooking/add_sec_book')?>", 
      {idrun:0},
        function(result){
       if(result>0){
         alert("Add Booking Sucsess");
      }else{
         alert("Not Add member");
      }
    },'json');
  }


function book_up(){
 var formdata = $('#from_booking').serialize();
 $.post("<?php echo base_url('HotelBooking/do_up_pre_book')?>", 
      {formdata:formdata},
        function(result){
       if(result=='1'){
          window.location="http://www.khemtis.com/HotelPayment?data=true"+nextpage;
      }else{
   
      }
    },'json');
}




            var twelveHour = $('.timepicker1').wickedpicker();
            $('.time').text('//JS Console: ' + twelveHour.wickedpicker('time'));
            $('.timepicker1').wickedpicker({twentyFour: true});
            $('.timepicker1').wickedpicker({clearable: true});

            var twelveHour = $('.timepicker2').wickedpicker();
            $('.time').text('//JS Console: ' + twelveHour.wickedpicker('time'));
            $('.timepicker2').wickedpicker({twentyFour: true});
            $('.timepicker2').wickedpicker({clearable: true});

        </script>
    </body>
</html>