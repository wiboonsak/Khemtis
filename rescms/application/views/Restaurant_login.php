

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

    </style>
</head>
<body>






    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">



<div style="width:100%;text-align: center;">
</div>

				<form class="login100-form validate-form" method="post" data-toggle="validator" role="form" action="<?php echo base_url('Restaurant_login/check_log')?>">
					<span class="login100-form-logo">
						<img src="<?php echo base_url('assets/img/logo-black-color-1.png')?>">
					</span>
					<span class="login100-form-title p-b-34 p-t-27" id="login">
						Restaurant log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username" id="user002">
						<input class="input100" type="text" id="username_002" name="username_002" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password" id="password002">
						<input class="input100" type="password" id="pass_002" name="pass_002" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
	
					<div class="container-login100-form-btn" id="loginbotton">
						<button type="submit" class="login100-form-btn"  name="clientlogin" value="1">
							Login
						</button>
					</div>
					<div class="text-center p-t-90" id="forgotbotton">
						<a class="txt1" href="#" onClick="show_ForgotPassword()">
						 <font color="#000000">	Forgot Password?</font>
						</a>
					</div>
				</form>
                            <span class="login100-form-title p-b-34 p-t-27" id="forgot" style="display: none">
						Forgot password
					</span>
                             <div class="wrap-input100 validate-input" data-validate = "Enter username" id="username002" style="display: none">
						<input class="input100" type="text" id="username" name="username" placeholder="Username" >
                                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
					
					</div>
                            <div class="wrap-input100 validate-input" data-validate = "Enter email" id="email002" style="display: none">
						<input class="input100" type="text" id="email_002" name="email_002" placeholder="Email" >
                                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
				
					</div>
                           
                            <div class="container-login100-form-btn" id="sendmail" style="display: none">
						<button type="button" class="login100-form-btn" onClick="check_Email2()" value="Send Email">
							Send mail
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
        	
    function show_ForgotPassword(){ 
		$('#login').hide();
		$('#user002').hide();
		$('#password002').hide();
		$('#forgotbotton').hide();
		$('#loginbotton').hide();
		$('#forgot').show();		
		$('#email002').show();		
		$('#username002').show();		
		$('#sendmail').show();				
	}
              //---------------------------------------------
	
    function check_Email2(){
		var email = $('#email_002').val();	
		var username = $('#username').val();	
		 if (username == ''){  
                        var txt = 'Please insert your User name.'; 
                        alert(txt);				
			$('#username').focus();
		  
                    }else if(email ==''){
			var txt = 'Please insert your Email Address.';                                
			alert(txt);				
			$('#email_002').focus();
				            
		} else {
			
    
            $.post('<?php echo base_url('RestaurantMail/check_Email')?>',{ email : email,username:username}, function(data){ 
			
                if(data >0){  
					   
						$.post('<?php echo base_url('RestaurantMail/mail_forgotPassword')?>' , { email : email , userID : data} , function(data){
							//console.log(data);
							if(data == 1){
									alert('A link to reset your password has been successfully sent to your email.');
									var url = '<?php echo base_url('')?>';                 window.location.href = url;
							}
						});
					
				} else {
                    var txt = 'This email is invalid or not available in the system.';
                    alert(txt);	
					$('#email_002').val('');
					$('#username').val('');
					$('#username').focus();
                    return false;	
                }			
			});
       }
	//return true
	}
    </script>
</body>
</html>