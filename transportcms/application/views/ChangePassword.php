<?php $pthc= base_url();?>
<!-------- CSS --------->
<!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
<!-- animation -->
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
   <link rel="stylesheet" href="<?php echo $pthc ?>assets/plugins/sweet-alert/sweetalert.min.css">
 <!-- data tables -->
   <link href="<?php echo $pthc?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>


<style type="text/css">
  .select_bt{
    background-color: #628dab;color:#ffffff;
  }
  .select_bt:hover{
    background-color: #0758b7;color:#ffffff;
  }
  .lb_yes{
     padding:3px;
     border-radius: 3px;
     width: 50px;
     background-color: #2cb99c;
     text-align: center;
     color:#ffffff;
  }
  .lb_no{
     padding:3px;
     border-radius: 3px;
     width: 50px;
     background-color: #d03869;
     text-align: center;
     color:#ffffff;
  }
</style>
<!----------------------------->
<?php //if($chk_hotel_id!=""){?>
<!--<div style="margin-top:8vw;">-->
<div style="padding-top: 147px;" id="setPadding" >     
<!--<input type="hidden" id="val_hotel_id" value="<?php //echo $chk_hotel_id?>">-->
<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header>Change Password</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body "> 
                                    <?php $user3=''; if($user_id !=''){ ?>	
                                           <div class="form-group half-group">
                  <label>Current password*</label>
                    <div class="input-group">
                        <input type="password" placeholder="" class="form-control" name="Current" id="Current" onchange="checkcurrent()">
                    </div>
              </div>
                                           <div class="form-group half-group">
                  <label>New Password*</label>
                    <div class="input-group">
                      <input type="password" placeholder="" class="form-control" name="password" id="password" >
                    </div>
              </div>
              <div class="form-group half-group" >
                  <label>Repeat Password*</label>
                    <div class="input-group">
                        <input type="password" placeholder="" class="form-control" name="repeatpassword" id="repeatpassword" onchange="checkpass(this.value)">
                    </div>
              </div>
                                    <div class="form-group">
                	<button id="btn_submit" name="submit" type="button" onClick="saveNewPass()" class="button border animated middle-fill" ><span>Save</span></button><!--onClick="formRegis()"-->
   </div>
                                      <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
 <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
<script type="text/javascript">
function saveNewPass(){		
		
		//var username = $('#username').val();
                var Current = $('#Current').val();
		var password = $('#password').val();
		var repeatpassword = $('#repeatpassword').val();
		var myId = '<?php echo $user_id?>';	
		
		if(Current ==''){					
			alert('Please insert Current password.');				
			$('#Current').focus();
			return false;
			} else if(password ==''){					
			alert('Please insert your password.');				
			$('#password').focus();
			return false;	
		} else if(repeatpassword ==''){					
			alert('Please insert Confirm password.');				
			$('#repeatpassword').focus();
			return false;
	
		} else {  
		$.post('<?php echo base_url('Home/save_newPass')?>' , { Password : password , myId : myId }  , function(data){
                    if(data ==1){
                        alert('Your password has been reset successfully.');
                        window.location.href='<?php echo base_url('Transport_login/log_out')?>';
                    }
			
		});  
	}
        }
        //-------------------------------------
  function checkpass(repeatpassword){
  var password = $('#password').val();
  if(repeatpassword != password){
      alert("Password and repeat password don't match.");				
			$('#repeatpassword').val('');
			$('#repeatpassword').focus();
                        return false;
  }
  
  }
  //-------------------------------
  function checkcurrent(){		
		var Current = $('#Current').val();
		var myId = '<?php echo $user_id?>';	
		
		if(Current ==''){					
			alert('Please insert your Current Password.');				
			$('#password').focus();
			return false;
		} else {  
		$.post('<?php echo base_url('Home/checkcurrent')?>' , { Current : Current , myId : myId }  , function(data){
                    if(data == 0){
                        alert('Password is incorrect.');
                        $('#Current').val('');
                        $('#Current').focus();
                    }
		});  
	}
        }

</script>



</div>





  