

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

																</div>															
															</div>
														</div>
														</div></div>
                                                   		</div>
                                                    </div>                                                                                                             
                                                </div>
                                            </div>


 <?php
 $book_st = strtotime($book_st);
 ?>
                                            <div class="col-md-4 col-sm-12 col-xs-12 wrapper-contact-faq" >
                                                <div class="contact-wrapper">
                                                    <div class="contact-box" style="border-radius: 10px;padding:15px!important;">
                                                        <h5 class="title">BOOKING SUMMARY</h5>                                                       
														<div style="background-color: #FFFFFF; padding: 10px;border-top-left-radius:10px;border-top-right-radius:10px;" >
															<table width="100%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>
																<tr>
																  <td colspan="2"><p class="title_hdr_box" style="float: left; font-size: 14px !important">
<?php echo $namepack?>
																  </p></td>
																</tr>
																<tr>
																  <td align="left">&nbsp;<i class="fas fa-suitcase" aria-hidden="true"></i>&nbsp;&nbsp;Date Comes</td>
                                                                  <td><?php  echo date('d-M-Y',$book_st);?></td>
																</tr>
															  	<tr>
																  <td align="left">&nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;Total Guests</td>
                                                                  <td><?php echo($Adults + $Child + $Single)?> Peple</td>
																</tr>
																<tr>
																  <td align="left" style="height:10px;"></td>
																</tr>
                                                                <tr><td colspan="2">
                                                                <div style="background-color: #f6f6f6;border-style:solid;border-width:1px;border-color:#e2e2e2;padding:5px;width:100%;border-radius: 5px;">
																<table style="width:100%">
<?php
$sum_total = 0 ;
foreach ($hotel_room as $val) {
?>
                                <tr>
						          <td align="left" style="background-color: #f6f6f6;">
                                <?php if($val->hotel_id!=0){ ?>
                                    <table>
                                        <tr><td style="width:50px;"><b>Hotel:</b></td><td><b><?php echo$val->hotel_nm?></b></td></tr>
                                        <tr><td style="width:50px;"><b>Room:</b></td><td><?php echo$val->room_fld_nm?></td></tr>
                                    </table>
                                <?php } ?>
                                   </td>
							      <td align="right" style="background-color: #E5E5E5;"></td>
								       </tr>
                                                <tr><td colspan="2" style="text-align: left;font-size: 13px;">
                                                    <table width="100%">
                                                    	<?php 
                                      $total1= 0;
                                      $total2= 0;
                                      $total3= 0;
                                                    	?>
                                                      <?php if($Adults!=0){
                                                                $total1 = ($Adults*$ad_pr);     
                                                      ?>
                                                            <tr><td style="padding-left: 5px;"> Adults</td><td style="text-align:center">x&nbsp;<?php echo number_format($Adults)?> </td><td style="text-align: right;"><?php echo number_format($total1)?> THB</td></tr>
                                                      <?php } ?>
                                                      <?php if($Child!=0){
                                                                $total2 = ($Child*$ld_pr);     
                                                       	?>
                                                            <tr><td style="padding-left: 5px;"> Child</td><td style="text-align:center">x&nbsp;<?php echo number_format($Child)?> </td><td style="text-align: right;"><?php echo number_format($total2)?> THB</td></tr>
                                                      <?php } ?>
                                                      <?php if($Single!=0){
                                                                 $total3 = ($Single*$sg_pr);  
                                                        	?>
                                                            <tr><td style="padding-left: 5px;"> Single</td><td style="text-align:center">x&nbsp;<?php echo number_format($Single)?> </td><td style="text-align: right;"><?php echo number_format($total3)?> THB</td></tr>
                                                      <?php } ?>
                                                    </table>
                                                </td></tr>
<?php } ?>
                                         </table>
                                      </div>
                                   </td></tr>				
															  </tbody>
															</table>
														</div>
                            <div style="background-color: #40b4e7; padding: 10px; margin-top:0px; border-top: 0px solid #FFFFFF; border-bottom: 0px solid #FFFFFF;border-bottom-left-radius:10px;border-bottom-right-radius:10px;" >
                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>																
																<tr>
																  <td align="left" style="font-weight: bold; color: #FFFFFF;">Total Price:</td>
																  <td align="right" style="font-weight: bold; color: #FFFFFF;"><font style="text-decoration-line: underline;
  text-decoration-style: double;"><?php echo number_format($total1 + $total2+$total3)?></font>&nbsp;THB&nbsp;&nbsp;</td>
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
    




        </script>
    </body>
</html>