
        <!-- FONT CSS-->
        <link type="text/css" rel="stylesheet" href="assets/css/tab_payment.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="assets/js/tab_payment.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style>
        /* Style the tab */
		.tab {
			float: left;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
			width: 30%;
			height: 300px;
		}

		/* Style the buttons inside the tab */
		.tab button {
			display: block;
			background-color: inherit;
			color: black;
			padding: 22px 16px;
			width: 100%;
			border: none;
			outline: none;
			text-align: left;
			cursor: pointer;
			transition: 0.3s;
			font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
			background-color: #ddd;
		}

		/* Create an active/current "tab button" class */
		.tab button.active {
			background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
			float: left;
			padding: 0px 12px;
			border: 1px solid #ccc;
			width: 70%;
			border-left: none;
			height: 300px;
		}
		</style>
                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                    <div class="main-content">

<center>
    <div style="width:50%;">
      <ul class="progressbar">
        <li class="active">Contact Information</li>
        <li>Payment information</li>
        <li>Booking is confirmed!</li>
      </ul>
    </div>
 </center>

                        <div class="page-main">
                            <div class="section-faq padding-top">
                                <div class="container">
                                    <div class="wrapper-faq">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 main-left">
                                                <div class="wrapper-content-faq">
                                                    <div class=""><!--<div class="container">-->
														<div class="row" style="padding-bottom: 50px">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
															<!--<div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">-->
																<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
																  <div class="list-group">
																  	<!--
																  	<a href="#" class="list-group-item  text-center" style="visibility: hidden;">
																		<h2><i class="fas fa-money-check-alt"></i></h2>
																		<h4>Transfer</h4>
																	</a>
																-->
																    <a href="#" class="list-group-item active text-center">
																	  	<h2><i class="far fa-credit-card"></i></h2>
																		<h4>Credit Card</h4>
																	</a>
																	<!--
																	<a href="#" class="list-group-item text-center">
																	  	<h2><i class="fab fa-cc-paypal"></i></h2>
																		<h4>Paypal</h4>
																	</a>
																-->
																  </div>
																</div>
																<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
																	<!-- transfer -->																	
																	<div class="bhoechie-tab-content">
																		<center>
																		  <h1><img src="assets/images/transfer-bank.jpg" width="200"></h1>
																		  <h3 style="margin-top: 0;color:#1376a4">Transfer</h3>
																		</center>
																		
																		<p style="text-align: left">You can make secure and convenient payments via Internet Banking, Mobile Banking or ATM.</p>
																		<p style="text-align: left; font-size:12pt; font-weight: 600;">Read Befor You Pay</p>
																		  	<div style="border: 1px solid #EBEBEB; padding: 5px; margin: 5px;">
																		  		<ul>
																				  <li style="text-align: left;">The transfer amount must be an exact amount stated below otherwise the booking will not be processed.</li>
																				  <li style="text-align: left;">International funds transfer from overseas bank accounts for any booking will not be facilitated and processed. Be advised that an international transfer fee will be deducted from the refund.</li>
																				  <li style="text-align: left;">The originating bank and beneficiary bank must be the same in order to quicken the payment confirmation process.</li>
																				  <li style="text-align: left;">Transfer can be done via Mobile Banking, Internet Banking, ATM or bank counter.</li>
																				</ul>																		  
																		  	</div>
																		  	
																		 <p style="text-align: left; font-size: 12pt; font-weight: 600; padding:20px 5px;">Select a Destination Account</p>
																	  	  
																		  <div class="row" style="border: 1px solid #EBEBEB; height: 50px; line-height: 50px; padding: 5px; margin: 5px; ">
																				<div class="col-sm-1"><input type="radio"></div>
																				<div class="col-sm-7" style="float: left; text-align: left; font-size: 12pt;">Kasikorn Bank</div>
																				<div class="col-sm-2" style="float: right"><img src="assets/images/kaskikorn-bank.png" width="30"></div>
																		  </div>
																	  	  <div class="row" style="border: 1px solid #EBEBEB; height: 50px; line-height: 50px; padding: 5px; margin: 5px; ">
																				<div class="col-sm-1"><input type="radio"></div>
																				<div class="col-sm-7" style="float: left; text-align: left; font-size: 12pt;">Siam Commercial Bank</div>
																				<div class="col-sm-2" style="float: right"><img src="assets/images/scb-bank.png" width="30"></div>
																		  </div>
																	  	  <div class="row" style="border: 1px solid #EBEBEB; height: 50px; line-height: 50px; padding: 5px; margin: 5px; ">
																				<div class="col-sm-1"><input type="radio"></div>
																				<div class="col-sm-7" style="float: left; text-align: left; font-size: 12pt;">Bualuang Bank</div>
																				<div class="col-sm-2" style="float: right"><img src="assets/images/bbl-bank.png" width="30"></div>
																		  </div>	
																		
																		
																		<div class="col-md-12"  style="padding: 30px 0px; font-size: 12pt;">
																			<div class="form-login">
																				<div class="input-login">
																					<label class="label-login">
																						<input type="checkbox"> Add Coupon
																						<div class="form-email">		
																							<form action="">
																								<div class="input-group col-md-6" >
																									<input type="text" placeholder="Coupon" class="form-control form-email-widget">
																									<span class="input-group-btn">
																										<button type="submit" class="btn-email">✔</button>
																									</span>
																								</div>
																							</form>
																						</div>
																					</label>																				
																				</div>
																			</div>
																		</div>	
																		
																		<div class="content-faq" style="padding-top: 40px">
																		<h3 class="title-style-2" style="font-size: 12pt;">Price details</h3>
																		<div class="panel-body" style="background-color: #f4f4f4; padding: 10px; font-size: 14pt; margin-bottom: 50px !important">
																			<h3 style="font-size: 12pt;">Akira Lipe Resort</h3>
																			<p style="color:#399600; font-size: 11pt;"><i class="fa fa-list"></i> Free cancellation until 07-Nov-2018</p>
																			<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center"  style="font-size: 11pt;">
																			  <tbody>
																				<tr>
																				  <td>(1x) Villa Suite (2 Nights)</td>
																				  <td style="text-align: right;">THB 12,723.88</td>
																				</tr>
																				<tr>
																				  <td>Tax Recovery Charges</td>
																				  <td style="text-align: right;">THB 2,252.12</td>
																				</tr>
																				<tr>
																				  <td>Fee</td>
																				  <td style="text-align: right;">Free</td>
																				</tr>
																				<tr style="border-top: 1px solid #3F3F3F; border-bottom: 2px solid #3f3f3f;">
																					<td><b>Total</b></td>
																					<td style="text-align: right;"><b>THB 14,976.00</b></td>
																				</tr>
																				<tr>
																				  <td>&nbsp;</td>
																				  <td>&nbsp;</td>
																				</tr>
																			  </tbody>
																			</table>
																			<p style="font-size: 10pt;">By clicking "Pay", You agree to <a href="#">the Terms & Conditions</a> and <a href="#">Privacy Policy</a> of Khemtis</p>
																			<p></p>
																			<div class="contact-submit" align="center" style="margin:20px 0px !important">
																				<button type="submit" data-hover="Pay" class="btn btn-slide btn-default">
																					<span class="text">Pay</span>
																					<span class="icons fas fa-lock"></span>
																				</button>
																			</div>
																		 </div>
																		 </div> 
																	</div>
																	
																	<!-- credit card -->
																	<div class="bhoechie-tab-content active" >
																		<center>
																		  <h1><img src="assets/images/visa-mastercard.png" width="200"></h1>
																		  <h3 style="margin-top: 0;color:#1376a4">Credit/Debit Card</h3>
																		</center>
																		
																		<div class="wrapper-login">
																		<div class="content-login">
																		<div class="main-login" style="padding: 15px !important">
																		<div class="login-form">
																		<div class="row">
																				<div class="content-form">
																					<div class="col-md-12">
																						<div class="form-login">
																							<div class="input-login">
																								<label class="label-login">Card Number
																									<i class="form-icon fa fa-asterisk"></i>
																								</label>
																								<input type="text" class="form-control label-input" placeholder="16 digit and card number">
																							</div>
																						</div>
																					</div>																	
																					<div class="col-md-6">
																						<div class="form-login">
																							<div class="input-login">
																								<label class="label-login">Valid until
																									<i class="form-icon fa fa-asterisk"></i>
																								</label>
																								<input type="text" class="form-control label-input" placeholder="MM/YY">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-login">
																							<div class="input-login">
																								<label class="label-login">CVV
																									<i class="form-icon fa fa-asterisk"></i>
																								</label>
																								<input type="password" class="form-control label-input" placeholder="3 digit CVV">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-12">
																						<div class="form-login">
																							<div class="input-login">
																								<label class="label-login">Name on card
																									<i class="form-icon fa fa-asterisk"></i>
																								</label>
																								<input type="text" class="form-control label-input" placeholder="Name on card">
																							</div>
																						</div>
																					</div>	
																					<div class="col-md-12">
																						<div class="form-login">
																							<div class="input-login">
																								<label class="label-login">
																									<input type="checkbox"> Make your next booking faster by adding your card details
																								</label>																				
																							</div>
																							<div class="input-login">
																								<label class="label-login">
																									<input type="checkbox"> Add Coupon
																									<div class="form-email">		
																										<form action="">
																											<div class="input-group">
																												<input type="text" placeholder="Coupon" class="form-control form-email-widget">
																												<span class="input-group-btn">
																													<button type="submit" class="btn-email">✔</button>
																												</span>
																											</div>
																										</form>
																									</div>
																								</label>																				
																							</div>
																						</div>
																					</div>																						
																				</div>

																				<div class="clearfix"></div>

																			</div>
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
                                            <div class=""  style="border-style: solid;border-width:1px;border-color:#cccccc;margin-bottom: 50px;border-radius:3px;width:90%;margin-left: 10px;margin-right: 100px">
                                                <div class="">
                                                	<center>
                                                    <div class="" style="border-radius: 10px;padding:15px!important;">
                                                        <h5 class="title">BOOKING SUMMARY</h5>   

														<div style="background-color: #FFFFFF; padding: 10px;border-top-left-radius:10px;border-top-right-radius:10px;" >
															
															<table width="80%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>
																<tr>
																  <td><p class="title_hdr_box" style="float: left; font-size: 16px !important">
 <?php echo$name_hotel?>
																  </p></td>
																</tr>


														        <tr>
																  <td align="left">&nbsp;Name </td>
                                                                  <td> <?php echo$name_cus ?></td>
																</tr>


																<tr>
																  <td align="left">&nbsp;Check-In</td>
                                                                  <td><?php  echo date('d-M-Y',$book_st);?></td>
																</tr>
                                                                <tr>
                                                                  <td align="left">&nbsp;Check-Out</td>
                                                                  <td><?php echo date('d-M-Y',$book_en);?></td>
                                                                </tr>
															  	<tr>
																  <td align="left">&nbsp;Total Nights</td>
                                                                  <td><?php echo$numdate?>&nbsp;&nbsp;Nights</td>
																</tr>
                                                            <!--
																<tr>
																  <td align="left"><i class="fa fa-hotel" aria-hidden="true"></i>&nbsp;Total Room</td>
                                                                  <td>0</td>
																</tr>	
                                                            -->
															  	<tr>
																  <td align="left"></i>&nbsp;Total Guests</td>
                                                                  <td>Adults:<?php echo$Adults?>&nbsp;Child:<?php echo$Child?></td>
																</tr>
																<tr>
																  <td align="left" style="height:10px;"></td>
																</tr>
                                                                <tr><td colspan="2">
                                                                <div style="background-color: #ffffff;border-style:solid;border-width:0px;border-color:#ffffff;padding:5px;width:100%;border-radius: 0px;">
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
																  <td align="left" style="background-color: #f6f6f6;padding:5px!important;"><b><?php echo$room_detail?></b> </td>
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

                                                                </div>
                                                                </td></tr>				
															  </tbody>
															</table>
														

														</div>
                                                       <div style="padding: 10px; margin-top:0px; border-top: 0px solid #FFFFFF; border-bottom: 0px solid #FFFFFF;border-bottom-left-radius:10px;border-bottom-right-radius:10px;" >
                                                       		<table width="80%" border="0" cellspacing="1" cellpadding="1">
															  <tbody>																
																<tr>
																  <td align="left" style="font-weight: bold; color: #000000;">Total Price:</td>
																  <td align="right" style="font-weight: bold; color: #000000;"><font style="text-decoration-line: underline;
  text-decoration-style: double;"><?php echo number_format($sum_total,2)?></font>&nbsp;THB&nbsp;&nbsp;</td>
																</tr>																
															  </tbody>
															</table>
															
                                                       </div>
	</center>





<div class="contact-submit" align="center" style="margin:20px 0px !important">
																				<button type="button" data-hover="Pay" onclick="up_pay()" class="btn btn-slide btn-default">
																					<span class="text">Pay</span>
																					<span class="icons fas fa-lock"></span>
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
        <script>
        function up_pay() {
        alert("Pay Sucsess");
      $.post("<?php echo base_url('HotelPayment/up_book_st')?>", 
      {idrun:0},
        function(result){

       if(result>0){

         alert("Pay Sucsess");
      }else{
         alert("Not Pay");
      }
    },'json');
        }


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