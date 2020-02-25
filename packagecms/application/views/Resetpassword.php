
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Spice Hotel | Bootstrap 4 Admin Dashboard Template + UI Kit</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/iconic/css/material-design-iconic-font.min.css')?>">
    <!-- bootstrap -->
	<link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pages/extra_pages.css')?>">
	<!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico')?>" /> 
    <link rel="stylesheet" href="<?php echo base_url('asset/www/external/slick/slick.css')?>">


    <style type="text/css">
    	body{background-color:#e7e7e7!important;}
        .sty_text{
            width:100%!important;
            height:25px!important;
            background-color:#ffffff!important;
            border-radius:10px!important; 
        }
    </style>
</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<span class="login100-form-logo">
						<img src="<?php echo base_url('assets/img/logo-black-color-1.png')?>">
					</span>
                                    <span class="login100-form-title p-b-34 p-t-27" id="login">
						Reset Password
					</span>
                                    <div class="wrap-input100 validate-input" data-validate="Enter password" id="password002">
						<input class="input100 sty_text" type="password" id="pass_002" name="pass_002" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                                    <div class="wrap-input100 validate-input" data-validate="Enter password" id="repeatpassword002">
                                        <input class="input100 sty_text" type="password" id="repeatpassword_002" name="repeatpassword_002" onchange="checkpass(this.value)" placeholder="Repeatpassword"  required >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                                    
					<div class="container-login100-form-btn" id="savebotton">
                     <button type="button" class="login100-form-btn"  onclick="savenewpass()">
							Save
						</button>
					</div>
			</div>
		</div>
	</div>
	

    <!-- start js include path -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>" ></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>" ></script>
    <script src="<?php echo base_url('assets/js/pages/extra_pages/login.js')?>" ></script>
    <!-- end js include path -->
    <script>
    //---------------------------------------------
	
    function savenewpass(){
		var pass = $('#pass_002').val();	
		var repeatpassword = $('#repeatpassword_002').val();
                var myId = '<?php echo $user_id?>';
		if(pass ==''){										
			alert('Please insert your password.');				
			$('#pass_002').focus();
			return false;	
		} else if(repeatpassword ==''){					
			alert('Please insert Confirm password.');				
			$('#repeatpassword_002').focus();
			return false;
		} else {  
		$.post('<?php echo base_url('Package_login/save_newPass')?>' , { pass : pass , myId : myId }  , function(data){
                    if(data ==1){
                        alert('Your password has been reset successfully.');
                        window.location.href='<?php echo base_url('Package_login')?>';
                    }
			
		});  
	}
		
	}
                //-------------------------------------
  function checkpass(repeatpassword){
  var password = $('#pass_002').val();
  if(repeatpassword != password){
      alert("Password and repeat password don't match.");				
			$('#repeatpassword_002').val('');
			$('#repeatpassword_002').focus();
                        return false;
  }
  }
    </script>
</body>
</html>