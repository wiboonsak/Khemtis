<?php $pthc= base_url();?>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/font/flaticon/flaticon.css">
              <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


<style type="text/css">
 #menu_right{
 	display: none!important;
 }
.menu_left{
-webkit-box-shadow: 1px 2px 5px -1px rgba(128,128,128,0.48);
-moz-box-shadow: 1px 2px 5px -1px rgba(128,128,128,0.48);
box-shadow: 1px 2px 5px -1px rgba(128,128,128,0.48);
  }
.stl_b {
  width:100%!important;
  background-color:#f1f1f1;
  border: none;
  color: #444444;
  padding: 12px 16px;
  font-size: 15px;
  cursor: pointer;
  border-radius: 0px!important;
  text-align:left!important;
  font-style: normal!important;
}

/* Darker background on mouse-over */
.stl_b:hover {
  background-color: #dedede;
    width:100%!important;

  border: none;
  color: #353434;
  padding: 12px 16px;
font-size: 15px;
  cursor: pointer;
  border-radius: 0px!important;
  text-align:left!important;
  font-style: normal!important;
}
.stl_b:hover img {
   -webkit-filter: brightness(0) invert(1);
   filter: brightness(9) invert(0);
font-size: 15px;
}



.stl_b_fuc {
  background-color: #4392d8;
    width:100%!important;

  border: none;
  color: #ffffff;
  padding: 12px 16px;
font-size: 15px;
  cursor: pointer;
  border-radius: 0px!important;
  text-align:left!important;
  font-style: normal!important;
}

.stl_b_fuc img {
   -webkit-filter: brightness(0) invert(1);
   filter: brightness(0) invert(1);
font-size: 15px;
}


.box_booking{

background-color:#ffffff;
width:100%;
height:auto;
margin-bottom: 30px;
}
.box_sub_border{
  border-style:   solid;  
  border-width:  1px;
  border-color:#f1f1f1;
  background-color:#ffffff;
}
.btn_new{
   border-radius:5px!important  ;
   background-color: #4392d8;
 
   color:#ffffff;
width:110px;
border-style:none!important ;
border-width:0px!important  ;
padding-right: 10px!important ;
padding-left: 10px!important  ;
padding-top: 0px!important  ;
;
}
.btn_new_re{
   border-radius:5px!important  ;
   background-color: #42a9a6;
 
   color:#ffffff;
width:110px;
border-style:none!important ;
border-width:0px!important  ;
padding-right: 10px!important ;
padding-left: 10px!important  ;
padding-top: 0px!important  ;
;
}

.dbline {
  text-decoration-line: underline;
  text-decoration-style: double;
}
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
.tbl_col{
  background-color:#4392d8;
  color:#ffffff;
}

</style>
<div id="wrapper-content">
                  <!-- MAIN CONTENT-->
                  <div class="main-content" >
                  <div style="width:100%;height: auto;border-style: solid;border-width: 0px;padding-right: 50px;padding-left: 50px;">
<div class="row" style="width:100%;">
   <div class="col-md-3" style="border-style: solid;height:auto;border-width:0px;border-right-style: none;border-color:#cccccc">
     <div class="" style="width:100%;height:auto;padding: 7px;">
       <table style="width:100%">
          <tr><td style="padding: 5px;">
<div class="stl_b" onclick="showbook(1)" id="stlb1" style="border-left-style:solid;border-color:#d3d7da"><img src="<?php echo $pthc ?>assets/icon/booking_online-512.png" style="width:50px;"> &nbsp;&nbsp;<?php echo$p_ar['p_my']?></div></td></tr>
          <tr><td style="padding: 5px;">
<div class="stl_b"  onclick="showbook(2)" id="stlb2" style="border-left-style:solid;border-color:#d3d7da"><img src="<?php echo $pthc ?>assets/icon/31-512.png" style="width:50px;">&nbsp;&nbsp; <?php echo$p_ar['p_re']?></div></td></tr>
          <tr><td style="padding: 5px;">
<div class="stl_b"  onclick="showbook(3)" id="stlb3" style="border-left-style:solid;border-color:#d3d7da"><img src="<?php echo $pthc ?>assets/icon/profile.png" style="width:50px;">&nbsp;&nbsp; <?php echo$p_ar['p_pro']?></div>

<div style="background-color:#f1f1f1;width:100%;height:80px;padding-top:10px;" id="show_profile">
   <div class="col-md-12" style="margin-left:10px;"><i class="fa fa-bullseye" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo$p_ar['p_title']?></div>
   <div class="col-md-12" style="margin-left:10px;"><i class="fa fa-bullseye" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo$p_ar['p_so']?></div>

</div>
</td></tr>
       </table>
     </div>
   </div>
   <div class="col-md-9" style="border-style: solid;height:auto;border-width:0px;border-color:#cccccc">
   <div class="menu_left" style="width:100%;height:auto;background-color:#f1f1f1;padding: 20px;">
       <div id="show_booking"></div>







<div id="show_form_profile">
	<h4><?php echo$p_ar['p_title']?></h4>
	<div style="height:35px;width:100%;background-color:#4392d8;color:#ffffff;padding: 5px;border-radius: 5px;margin-bottom: 15px;padding-right: 10px;cursor:pointer;" onclick="edit_name()">
		<?php echo$p_ar['p_name']?> : <?php echo$this->session->userdata('fname_member')?>&nbsp;&nbsp;<?php echo$this->session->userdata('lname_member')?> 
	</div>
		<div class="menu_left" onclick="edit_email()" style="height:45px;width:100%;background-color:#ffffff;color:#000000;padding: 10px;border-radius: 0px;margin-bottom: 15px;cursor:pointer;">
		<?php echo$p_ar['p_em']?> : <font color="#ababab"><?php echo$this->session->userdata('email_member')?></font>
	</div>
		<div class="menu_left" onclick="edit_phone()"  style="height:45px;width:100%;background-color:#ffffff;color:#000000;padding: 10px;border-radius: 0px;margin-bottom: 15px;cursor:pointer;">
		<?php echo$p_ar['p_num']?> : <font color="#ababab"><?php echo$this->session->userdata('phone_member')?></font>
	</div>
      <div class="menu_left" onclick="edit_phone()"  style="height:150px;width:100%;background-color:#ffffff;color:#000000;padding: 10px;border-radius: 0px;margin-bottom: 15px;cursor:pointer;">
    <?php echo$p_ar['p_add']?> : <font color="#ababab"><?php echo$this->session->userdata('address_member')?></font>
  </div>


		<div class="menu_left" onclick="edit_pass()" style="height:45px;width:100%;background-color:#ffffff;color:#000000;padding: 10px;border-radius: 0px;margin-bottom: 15px;cursor:pointer;">
		<?php echo$p_ar['p_pass']?> : <font color="#ababab">*************</font>
	</div>


  <center><div style="cursor:pointer;" class="btn btn-info" onclick="editcus()"><?php echo$p_ar['p_edit']?></div></center>
	<br>
<!--
<h4><?php// echo$p_ar['p_so']?>&nbsp;<div style="width:150px!important;background-color:#4267b2;padding: 3px;color:#ffffff;border-radius:5px;"><i class="fa fa-facebook-f">&nbsp;&nbsp;Login facebook</i></div></h4>
		<div class="menu_left" onclick="edit_so()"  style="height:45px;width:100%;background-color:#ffffff;color:#000000;padding: 10px;border-radius: 0px;margin-bottom: 15px;cursor:pointer;">
		<font color="#4392d8"><?php //echo$p_ar['p_fac']?></font>&nbsp;&nbsp;<font color="#cccccc">&nbsp;<input id="val_facbook" style="border-style: none;">&nbsp;</font>&nbsp;<div style="float:right;color:#c1c1c1"><?php// echo$p_ar['p_con']?></div>
	</div>
-->
</div>
       <div id="form_review_data">
<form>
  <div>
<div class="container" style="border-style: solid;padding: 5px;border-radius: 10px;border-width: 1px;margin-bottom: 25px;border-color:#cccccc">
<div class="row">
  <div class="col-md-6">
<table class="table" style="width:100%">
	<tr><td style="width:20%;border-top-style: none!important;"><font  style="font-weight: bold!important;font-size: 15px!important;">Fantastic</font></td>
    <td style="border-top-style: none!important;"> <input type="range" min="1" max="100" value="1" class="slider" id="fantastic_re"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Very Good</font></td>
    <td> <input type="range" min="1" max="100" value="1" class="slider" id="verygood_re"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Satisfying</font></td>
    <td> <input type="range" min="1" max="100" value="1" class="slider" id="satisfying_re"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Average</font></td>
    <td> <input type="range" min="1" max="100" value="1" class="slider" id="average_re"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Poor</font></td>
    <td> <input type="range" min="1" max="100" value="1" class="slider" id="poor_re"></td>
	</tr>
</table>
</div>
  <div class="col-md-6">
 <table class="table" style="width:100%">
	<tr><td style="width:10%;border-top-style: none!important;"><font  style="font-weight: bold!important;font-size: 15px!important;">Cleanliness</font></td>
    <td style="border-top-style: none!important;"><input id="cleanliness_re" name="cleanliness_re" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0" data-size="xs"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Comfort</font></td>
    <td><input id="comfort_re" name="comfort_re" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0" data-size="xs"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Meal</font></td>
    <td><input id="meal_re" name="meal_re" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0" data-size="xs"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Location</font></td>
    <td><input id="location_re" name="location_re" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0" data-size="xs"></td>
	</tr>
	<tr><td><font  style="font-weight: bold!important;font-size: 15px!important;">Service</font></td>
    <td><input id="service_re" name="service_re" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0" data-size="xs"></td>
	</tr>
</table> 	
</div>
</div>

</div>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Your review title</label>
    <input type="text" class="form-control" id="review_title" placeholder="review this">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Your review detail</label>
    <textarea class="form-control" id="review_detail" placeholder="review this" style="width:100%;height:150px;"></textarea>
  </div>
   <input type="hidden" id="hidpre_booking_id">
   <input type="hidden" id="hidhotel_id">
  
</form>
<center><button type="button" class="btn btn-primary tbl_col" onclick="save_review()">SAVE</button></center>
       </div>
     </div>
   </div>
</div>
  </div>
    </div>
</div>



<?php 
$id_typ_mem = $this->session->userdata('id_typ_mem');
$mem_id = $this->session->userdata('idget_member007');
?>

 
<!-- Modal Login -->
<div class="modal fade" id="editcus" role="dialog" style="height:750px;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="main-content">
                    <div class="wrapper-login">
                        <div class="content-login">
                            <div class="main-login" style="padding: 20px !important">
               <input type="hidden" value="<?php echo$mem_id?>" id="mem_id" name="mem_id">
                                <div class="login-title">Edit Profile</div>
                                <div class="login-form" style="padding-top: 40px !important">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-login">

                                                <div class="input-login">
                                                    <label  style="font-size:14px!important;"><?php echo$p_ar['p_name']?>
                                                     
                                                    </label>
                                                    <input type="text" class="form-control label-input" id="name_val" name="name_val" value="<?php echo$this->session->userdata('fname_member')?>" style="margin-bottom:7px">
                                                    <input type="text" class="form-control label-input" id="last_val" name="last_val" value="<?php echo$this->session->userdata('lname_member')?>">
                                                </div>

                  

                                                <div class="input-login">
                                                    <label  style="font-size:14px!important;"><?php echo$p_ar['p_em']?>
                                                    </label>
                                                    <input type="text" class="form-control label-input" id="email_val" name="email_val" value="<?php echo$this->session->userdata('email_member')?>">
                                                </div>
                                                <div class="input-login">
                                                    <label  style="font-size:14px!important;"><?php echo$p_ar['p_num']?>
                                                    </label>
                                                    <input type="text" class="form-control label-input" id="phone_val" name="phone_val" value="<?php echo$this->session->userdata('phone_member')?>">
                                                </div>
                                                <div class="input-login">
                                                    <label  style="font-size:14px!important;"><?php echo$p_ar['p_add']?>
                                                    </label>
                                                    <textarea class="form-control label-input" id="addr_val" name="addr_val" style="height:100px;"><?php echo$this->session->userdata('address_member')?></textarea>
                                                </div>





<?php if($id_typ_mem=='m'){?>

                                                <div class="input-login">
                                                    <label  style="font-size:14px!important;"><?php echo$p_ar['p_pass']?>
                                                    </label>
                                                    <input type="password" class="form-control label-input" id="pass_val" name="pass_val" value="">
                                                </div>
<?php }else{ ?>
                                                <div class="input-login">
                                                    <label  style="font-size:14px!important;"><?php echo$p_ar['p_pass']?>
                                                    </label> : 
                                                    <h4><font color="blue">use password facebook</font></h4>
                                                    <input type="hidden" value="" id="pass_val" name="pass_val">
                                                </div>

<?php } ?>



                                                <div class="contact-submit">
                                                    <button type="submit" data-hover="SEND NOW" class="btn btn-slide" onclick="save_member()">
                                                        <span class="text"><?php echo$p_ar['p_my']?></span>
                                                        <span class="icons fa fa-lock"></span>
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













        <?php include("html_tool/modal_login_register.php"); ?>
        <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="../assets/libs/detect-browser/browser.js"></script>
        <script src="../assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
        <script src="../assets/libs/wow-js/wow.min.js"></script>
        <script src="../assets/libs/slick-slider/slick.min.js"></script>
        <script src="../assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
        <script src="../assets/libs/please-wait/please-wait.min.js"></script>
        <script src="../assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="../assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <script src="../assets/libs/fancybox/js/jquery.fancybox-thumbs.js"></script>
        <!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")-->
        <!-- MAIN JS-->
        <script src="../assets/js/main.js"></script>
        <!-- LOADING JS FOR PAGE-->

        <script src="../assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
        <script src="../assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="../assets/js/pages/sidebar.js"></script>
        <script src="../assets/js/pages/result.js"></script>
        <!---date_tiem--->
     
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
     <!--
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>




<script type="text/javascript">



function editcus(){
   $('#editcus').modal('show');
}

function save_member(){
 var mem_id = $('#mem_id').val();
  var name = $('#name_val').val();
   var last = $('#last_val').val();
    var mail = $('#email_val').val();
     var addr = $('#addr_val').val();
      var phone = $('#phone_val').val();
       var pass = $('#pass_val').val();
   $.ajax({
                    url: "<?php echo base_url('Member/ProfileBook/save_member')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({
                      fid:mem_id,
                      name:name,
                      last:last,
                      mail:mail,
                      phone:phone,
                      addr:addr,
                      pass:pass
                  }),
                  success:function(data) {
                    if(data==1){
                      alert('Save Profile success');
                     window.location.reload(true);
                   }else{
                       alert('Not Save profile');
                   }
                  }
         });

}

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
            getFbUserData();
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
            getFbUserData();
        } else {
          //  document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}







function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,picture'},
    function (response) {

    var txt = response.first_name+' '+response.last_name;
    
       $('#val_facbook').val(txt);

    });
}


showbook(1);

function edit_name(){


}
function edit_email(){

}
function edit_phone(){
  
}
function edit_pass(){

}

function edit_so(){

}


function save_review(){

var pre_booking_id = $('#hidpre_booking_id').val();
var hotel_id = $('#hidhotel_id').val();
var review_title = $('#review_title').val();
var review_detail = $('#review_detail').val();

   var fantastic_re = $('#fantastic_re').val();
   var verygood_re = $('#verygood_re').val();
   var satisfying_re = $('#satisfying_re').val();
   var average_re = $('#average_re').val();
   var poor_re = $('#poor_re').val();

    var cleanliness_re = $('#cleanliness_re').val()*1;
    cleanliness_re = (cleanliness_re*4);
    var comfort_re = $('#comfort_re').val()*1;
    comfort_re = (comfort_re*4);
    var meal_re = $('#meal_re').val()*1;
    meal_re = (meal_re*4);
    var location_re = $('#location_re').val()*1;
    location_re = (location_re*4);
    var service_re = $('#service_re').val()*1;
    service_re = (service_re*4);
  
$.ajax({
       url: "<?php echo base_url('Member/ProfileBook/save_review')?>",
             type: "POST",
             data: ({
              review_title:review_title,
              review_detail:review_detail,
              fantastic_re:fantastic_re,
              verygood_re:verygood_re,
              satisfying_re:satisfying_re,
              average_re:average_re,
              poor_re:poor_re,
              cleanliness_re:cleanliness_re,
              comfort_re:comfort_re,
              meal_re:meal_re,
              location_re:location_re,
              service_re:service_re,
              pre_booking_id:pre_booking_id,
              hotel_id:hotel_id
            }),
             dataType: "html",
      success:function(data) {
        $('#show_booking').empty();
        if(data==1){
           showbook(2);
        }else{
           alert("Can't save Data!")
        }
      },
      complete: function(){
      }
    });
}

  function showbook(n1){
  	$('#form_review_data').css("display","none");
       $('#stlb1').addClass("stl_b");$('#stlb1').removeClass("stl_b_fuc");
       $('#stlb2').addClass("stl_b");$('#stlb2').removeClass("stl_b_fuc");
       $('#stlb3').addClass("stl_b");$('#stlb3').removeClass("stl_b_fuc");
    if(n1==1){
       $('#stlb1').removeClass("stl_b");
       $('#stlb1').addClass("stl_b_fuc");
       $('#show_profile').css("display","none");
       $('#show_form_profile').css("display","none");
       $('#show_booking').css("display","block");
    }
    if(n1==2){
       $('#stlb2').removeClass("stl_b");
       $('#stlb2').addClass("stl_b_fuc");
       $('#show_profile').css("display","none");
       $('#show_form_profile').css("display","none");
       $('#show_booking').css("display","block");
    }
    if(n1==3){
       $('#stlb3').removeClass("stl_b");
       $('#stlb3').addClass("stl_b_fuc");
       $('#show_profile').css("display","block");
       $('#show_form_profile').css("display","block");
       $('#show_booking').css("display","none");
    }else{
       $.ajax({
       url: "<?php echo base_url('Member/ProfileBook/get_booking')?>",
             type: "POST",
             data: ({id:0,idcus:8,tycommand:n1}),
             dataType: "html",
      success:function(data) {
        $('#show_booking').empty();
        $('#show_booking').html(data);
      },
      complete: function(){
             
      }
    });
    }
  }

function form_review(pre_booking_id,hotel_id){
	        $('#hidpre_booking_id').val(pre_booking_id);
          $('#hidhotel_id').val(hotel_id);
	        $('#form_review_data').css("display","block");
	        $('#show_booking').empty();        
}

function showmember_pay(idget_member007,utoid_book,book_id,tycommand){
    if(tycommand!=''){
        PopupCenter('<?php echo base_url("Member/Payment_member/index/")?>'+idget_member007+'/'+utoid_book+'/'+book_id+'/'+tycommand,'member_pay','1250','750');  
    }else{
	PopupCenter('<?php echo base_url("Member/Payment_member/index/")?>'+idget_member007+'/'+utoid_book+'/'+book_id,'member_pay','1250','750');  
    }
}

function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft
var top = (height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}


</script>





