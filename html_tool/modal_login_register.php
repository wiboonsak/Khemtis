<!-- Modal Register -->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="main-content">
                    <div class="wrapper-login">
                        <div class="content-login">
                            <div class="main-login" style="padding: 20px !important">
                                <div class="logo-login">
                                    <a href="index.html" class="logo-black">
                                        <img src="assets/images/logo/logo-black-color-1.png" alt="" class="img img-reponsive">
                                    </a>
                                </div>
                                <div class="login-title">create your account and join with us!</div>
                                <div class="login-form" style="padding-top: 40px !important">
                                    <form enctype="multipart/form-data" id="frm1" name="frm1">
                                        <div class="row">
                                            <div class="content-form">
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">name
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <input type="text" id="name" name="name" class="form-control label-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">last name
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <input type="text" id="lastname" name="lastname" class="form-control label-input">
                                                        </div>
                                                    </div>
                                                </div>                                                   

                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">password
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <input type="password" id="password" name="password" class="form-control label-input" onfocusout="isThaichar(this.value,this,'password','data_text_er')"><p id="data_text_er"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-login">

                                                        <div class="input-login">
                                                            <label class="label-login">confirm password
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control label-input" onchange="chpasswordss(this.value)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <p id="data_text_er"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">Email
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <input type="email" id="email" name="email" class="form-control label-input"  onchange="validateEmail2(this.value, 'email')" >  
                                                            <span id='email_error'></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">Number Phone
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <input type="text" id="phone" name="phone" class="form-control label-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">Address 
                                                            </label>
                                                            <textarea class="form-control label-input" style="width:100%" rows="3" id="Address" name="Address">
                                                                     
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="contact-submit">
                                                <button type="button" data-hover="SEND NOW" class="btn btn-slide" onclick="ADD()">
                                                    <span class="text">create account</span>
                                                    <span class="icons fa fa-long-arrow-right"></span>
                                                </button>
                                            </div>
                                            <br>
                                            <div>- OR -</div>
                                            <div class="contact-submit">
                                                <button type="submit" data-hover="SEND NOW" class="btn btn-slide" style="width: 90%; background-color: #4267b2; border:none;">
                                                    <span class="text"><i class="fa fa-facebook-square"></i>&nbsp;&nbsp; Login with Facebook</span>
                                                    <span class="icons fa fa-long-arrow-right"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="main-content">
                    <div class="wrapper-login">
                        <div class="content-login">
                            <div class="main-login" style="padding: 20px !important">
                                <div class="logo-login" >
                                    <a href="index.html" class="logo-black">
                                        <img src="assets/images/logo/logo-black-color-1.png" alt="" class="img img-reponsive">
                                    </a>
                                </div>
                                <div class="login-title">Login to your Khemtis.com account!</div>
                                <div class="login-form" style="padding-top: 40px !important">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">email
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="email" class="form-control label-input">
                                                </div>
                                                <div class="input-login">
                                                    <label class="label-login">password
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="password" class="form-control label-input">
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" checked="checked" name="remember"> Remember me
                                                    </label>
                                                    <span  style="float: right;"><a href="#">Forgot password?</a></span>
                                                </div>
                                                <div class="contact-submit">
                                                    <button type="submit" data-hover="SEND NOW" class="btn btn-slide">
                                                        <span class="text">sign in</span>
                                                        <span class="icons fa fa-long-arrow-right"></span>
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
<script type="text/javascript">
    //---------------------- txtTitle catFiles 
    function chpasswordss(changeValue) {
        var password = $("#password").val();
            if (password != changeValue) {
                alert('Passwords do not match.');
                $("#confirmpassword").val('');
                $("#confirmpassword").focus();
            }
        }
    
    function ADD() {
        var name = $('#name').val();
        var lastname = $('#lastname').val();
        var password = $('#password').val();
        var confirmpassword = $('#confirmpassword').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var Address = $('#Address').val();
        if (name == '') {
            alert('Please enter a Name');
        } else if (lastname == '') {
            alert('Please enter a Lastname');
        } else if (password == '') {
            alert('Please enter a Password');
        } else if (confirmpassword == '') {
            alert('Please enter a Confirm password');
        } else if (email == '') {
            alert('Please enter a Email');
        } else if (phone == '') {
            alert('Please enter a Phone');
        } else if (Address == '') {
            alert('Please enter a Address');
        } else {
            $.post('<?php echo base_url('Welcome/addregister') ?>', {name: name, lastname: lastname, password: password, email: email, phone: phone, Address: Address}, function (data) {
                console.log(data);
                if (data == 1) {
                    alert('Successfully');
                    setTimeout(function () {
                        window.location.href = "<?php //echo base_url('Control/GalleryAdd/')  ?>";
                    }, 2000);
                } else {
                    alert('Can not be saved.!');
                }
            });
        }
    }
    //-----------------------------
    function checkEmail(email) {
        $.post('<?php echo base_url('Welcome/checkemail') ?>', {email: email}, function (data) {
            if (data > 0) {
                alert('This email is already a mamber.');
                $('#email').val('');
                $('#email').focus();
                return false;
            }
            ;
        });

    }

    function validateEmail2(email, idemail) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (email == '') {
            $('.spError').remove();
            $('#' + idemail).removeClass('validate-has-error');
        } else if ((re.test(email) == true) && (email != '')) {
            $('.spError').remove();
            checkEmail(email, idemail);
        } else {
            $('#' + idemail).addClass('validate-has-error');
            var html2 = "<span style='color: red' class='spError'>Please specify the correct email.</span>";
            $(html2).insertAfter("#" + idemail);
            //$('#email_error').html('กรุณาระบุ email ให้ถูกต้อง').css('color', 'red');
        }
        ;

    }

function isThaichar(str,obj,txt1,txt2){
 var edValue = document.getElementById(txt1);
 var edValue_er = document.getElementById(txt2);
    var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ";
    var str_length=str.length;
    var str_length_end=str_length-1;
    var isThai=true;
    var Char_At="";
    for(i=0;i<str_length;i++){
        Char_At=str.charAt(i);
        if(orgi_text.indexOf(Char_At)!=-1){
            isThai=false;
        }   
    }
    if(str_length>=1){
        if(isThai==false){
            edValue.value = '';
           edValue_er.innerHTML='<font color=red>Not key font Thai !</font>';
        }else{
          edValue_er.innerHTML='';
        }
    }
    return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
}
    

</script>
