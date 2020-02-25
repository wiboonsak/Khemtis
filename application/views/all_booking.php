

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
  .form_book{
    width: 100%;
  padding: 12px!important 20px!important;
  margin: 8px 0!important;
  display: inline-block!important;
  border: 1px solid #ccc;
  border-radius: 4px!important;
  box-sizing: border-box!important;

      margin-top:2px!important;
    padding-top: 0px!important;


  }
  .form_book select{
 border: 1px solid #cccccc!important;
  }
  .label-login i{
    font-size: 17px!important;color:red;
    font-weight: bold;
    font-style: normal;
  }
  .label-login{
    color:#696969;
    font-style: normal!important;
    font-size: 15px!important;

  }
   .btbook{
    cursor: pointer;
    padding-top: 7px;
    background-color:#03a9f4;
    width:20%;
    height:35px;
    border-radius:5px;
    color:#ffffff;
  }
  .fbook{
    padding-top: 5px;
    background-color:#3057d5;
    font-size: 10px!important;
    color:#ffffff;
    border-style: solid;
    border-width: 1px;
    border-color:#3057d5;
    border-radius: 3px!important;
    height:32px;

  }
  .mbook{
    margin-top: 3px;
padding-left: 10px!important;
    background-color:#ffdd00;
    font-size:10px!important;
    color:#3e2904;
    border-style: solid;
    border-width: 1px;
    border-color:#ffdd00;
    border-radius: 3px!important;
    height:20px;
    padding-top:2px;
    width: auto;
    margin-left:4px;
  }


    .fb_log{



    margin-top: 3px;
    padding-left: 10px!important;
    background-color:#4267b2;
    font-size:10px!important;
    color:#ffffff!important;
    border-style: solid;
    border-width: 1px;
    border-color:#4267b2;
    border-radius: 3px!important;
    height:20px;
    padding-top:2px;
    width: auto;

  }

</style>
                <!-- WRAPPER-->
                <div id="wrapper-content">
                <!-- MAIN CONTENT-->
<div class="main-content">
<form id="frm_pay"  action="<?php echo base_url('Payment')?>" method="post">
    <input type="hidden" name="id_run_trans_val" value="<?php echo$id_run_trans_val?>">
    <input type="hidden" name="id_run_pack_val" value="<?php echo$id_run_pack_val?>">
    <input type="hidden" name="id_run_res_val" value="<?php echo$id_run_res_val?>">
    <input type="hidden" name="hotel_sum_price" id="hotel_sum_price" value="">
<center>
    <div style="width:50%;">
      <ul class="progressbar">
        <li class="active">Contact Information</li>
        <li>Payment information</li>
        <li>Booking is confirmed!</li>
      </ul>
    </div>
 </center>

<center>
 <div class="container">
 <div id="status">
</div>
<div class="row" style="width:90%">
   <div class="col-md-12"  style="text-align:left!important;margin-bottom: 25px;">

<!-- Display login status -->
<div id="status"></div>
<!-- Display user profile data -->
<div id="userData"></div>


<table><tr><td>
   <button  type="button" class="btn fb_log" onclick="set_idface()" id="fbLink"><i class="fa fa-facebook-f"></i>&nbsp;&nbsp;Continue with Facebook</button>
</td><td>
      <button id="logmember" type="button" class="btn mbook" data-toggle="modal" data-target="#login">Login Member</button>
</td></tr></table>
   </div>
<div>
   <input type="hidden" name="fbid_member" id="fbid_member" value="">
   <div class="col-md-6"  style="text-align:left!important;">
           <label class="label-login">First Name
                 <i>&#9913;</i>
           </label>
           <input type="text" name="cus_first_name" id="cus_first_name" class="form-control form_book" value="<?php echo$fname_member?>">
   </div>
   <div class="col-md-6"  style="text-align:left!important;">
           <label class="label-login">Last Name
                 <i>&#9913;</i>
           </label>
           <input type="text" name="cus_last_name" id="cus_last_name" class="form-control form_book" value="<?php echo$lname_member?>">
   </div>
   <div class="col-md-6"  style="text-align:left!important;">
           <label class="label-login">Email 
                  <i>&#9913;</i>
           </label>
           <input type="text" name="cus_email" id="cus_email" class="form-control form_book" value="<?php echo$email_member?>">
   </div>
   <div class="col-md-6"  style="text-align:left!important;">
           <label class="label-login">Contact Number
                  <i>&#9913;</i>
           </label>
           <input type="text" name="cus_number" id="cus_number" class="form-control form_book" value="<?php echo$phone_member?>">
   </div>
   <div class="col-md-12"  style="text-align:left!important;">
           <label class="label-login">Address
                 
           </label>
           <textarea class="form-control form_book" name="cus_address" id="cus_address" rows="4"><?php echo$address_member?></textarea>
   </div>
   <div class="col-md-12"  style="text-align:left!important;">
           <label class="label-login">Note
           </label>
           <textarea class="form-control form_book" rows="4"></textarea>
   </div>
</div>
      <div class="col-md-12"  style="text-align:left!important;">
           <label class="label-login">
             <input type="checkbox" value="1" id="conf_member">  Accept confirm your identity  <i id="showiden"><?php if($fname_member!=""){echo "<font color='#9e8a04'></font>";}?></i> 
           </label>
      </div>
   <div class="col-md-12">
      <div class="btbook" onclick="conf_member()">CONFIRM</div>
   </div>
</div>
<br><br>
</div>
</center>
</form>
                    </div>
                    <!-- BUTTON BACK TO TOP-->
                    <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>
                <!-- FOOTER-->
           
            </div>
        </div>
        <script>
            if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1'))
            {
                $('.logo .header-logo img ,.logo-footer img, .group-logo .img-logo').attr('src', 'assets/images/logo/logo-white-' + Cookies.get('color-skin') + '.png');
                $('.logo-black img').attr('src', 'assets/images/logo/logo-black-' + Cookies.get('color-skin') + '.png');
            }
            else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1'))
            {
                $('.logo .header-logo img , .logo-footer img, .group-logo .img-logo').attr('src', 'assets/images/logo/logo-white-color-1.png');
                $('.logo-black img').attr('src', 'assets/images/logo/logo-black-color-1.png');
            }


        </script>
 

        <?php include("html_tool/modal_login_register.php"); ?>
        <?php include("footer.php");?>
   <!-- LIBRARY JS-->


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>


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
        <script src="assets/js/pages/home-page.js"></script>
  
        <script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="assets/libs/parallax/TweenMax.min.js"></script>



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
    

   //$('#hotel_sum_price').val($('#sum_hotel').val());



    }



  function conf_member(){
   var cus_first_name = $('#cus_first_name').val();
   var cus_last_name = $('#cus_last_name').val();
   var cus_email = $('#cus_email').val();
   var cus_number = $('#cus_number').val();
var check = true;
var txt_er = "";
if(cus_first_name.trim()==""){check=false;txt_er+=" x First Name \n";}
if(cus_last_name.trim()==""){check=false;txt_er+=" x Last Name \n";}
if(cus_email.trim()==""){check=false;txt_er+=" x Emai \n";}else{
  var n = cus_email.trim().search('@');
   if (n==-1) {
      txt_er+=" x Email Input @ format \n";
   }
}
if(cus_number.trim()==""){check=false;txt_er+=" x Conntact Number \n";}

if(check==true){
      var conf_member = $('#conf_member').prop('checked');
      if(conf_member==true){

           $('#frm_pay').submit();
      }else{
            alert("Please accept confirm ?");
      }
    }else{
            alert("Please Specify  information ? \n"+txt_er);
    }
  }

</script>




<script>
/*
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '2042799232681806', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.3' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            //getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            // getFbUserData();
        } else {
            // document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,picture'},
    function (response) {
       // $('#fbLink').html('<i class="fa fa-facebook-f"></i>&nbsp;&nbsp;log out');
       // $('#logmember').css('display','none');
        //$('#login_mh').css('display','none');
       // document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
       // document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
      //  document.getElementById('userData').innerHTML = '<div style="width:49%;height:110px;border-style: solid;border-width: 1px;padding: 10px;border-radius: 5px;border-color:#cccccc"><table  style="border:none!important;"><tr><td valign="top" style="padding:0px;width:10px;"><img  src="'+response.picture.data.url+'"/></td><td valign="top" style="padding-left:20px;"><b>FB ID:</b> '+response.id+'<br><b>Name:</b> '+response.first_name+' '+response.last_name+'<br><b>Email:</b> '+response.email+'</td></tr></table></div>';
        $('#cus_first_name').val(response.first_name);
        $('#cus_last_name').val(response.last_name);
        $('#cus_email').val(response.email);
        $('#fbid_member').val(response.id);
        $('#showiden').html('<font color="#4267b2"><b>Face Book ID</b></font>');
        $.ajax({
                    url: "<?php // echo base_url('https://www.khemtis.com/AllBooking/upfacebook')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({
                      fid:response.id,
                      fir_name:response.first_name,
                      last_name:response.last_name,
                      email:response.email}),
                  success:function(data) {
                     //window.location.reload();
                  }
         });
    });
}


// Logout from facebook
function fbLogout() {
    FB.logout(function() {
      //$('#logmember').css('display','block');
      $('#fbLink').html('<i class="fa fa-facebook-f"></i>&nbsp;&nbsp;Continue with Facebook');
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('userData').innerHTML = '';
       // window.location.reload();
         $.ajax({
                    url: "<?php  //echo base_url('Welcome/logout_member')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({idhd:''}),
                  success:function(data) {
                     window.location.reload();
                  }
         });
       // document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}
*/
</script>
    </body>
</html>