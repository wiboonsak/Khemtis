<?php $pthc= base_url();?>
<?php $dataadmin =  $this->Cl_model->recheck_session();?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="รับประกันราคาดีที่สุดสำหรับโรงแรม รีสอร์ท โฮสเทล บ้านพัก และอื่นๆ อีกมากมายทั่วโลก ช่วยท่านค้นเจอที่พักถูกใจ" />
    <meta name="keywords" content="Khemtis, เข็มทิศ, จองโรงแรม, รีสอร์ท, ที่พัก, เกาะหลีเป๊ะ, ประเทศไทย, ต่างประเทศ, จองโรงแรมออนไลน์, จองห้องพัก, สำรองห้องพัก, เอเชีย, ยุโรป, อเมริกา, จองเรือ, จองรถตู้, จองทริปท่องเที่ยว, เกาะเต่า, เกาะล้าน, เกาะสมุย, เกาะพะงัน" />
    <meta name="author" content="Me-fi.com" />
    <title>KHEMTHIS | HOTEL LIST</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="<?php echo $pthc?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="<?php echo $pthc?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $pthc?>assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- morris chart -->
    <link href="<?php echo $pthc?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
	<!-- animation -->
	<link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/sweet-alert/sweetalert.min.css">
	<!-- Template Styles -->
    <link href="<?php echo $pthc?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />

<!-- favicon -->
<link rel="shortcut icon" href="<?=$pthc?>assets/img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark"  onload="Page_load();">
    <div class="page-wrapper">
    	<!-- start header and side menu-->    
		<?php include("Header.php"); ?>
		<!-- start page content -->
        <div class="page-content-wrapper" style="padding-bottom: 50px;">
        <div class="page-content">
<div class="row">
<div class="col-sm-4">
<div style="margin-top: 7vw;width: 100%;background-color: #fafcff;padding: 10px;border-radius: 10px;border-color:#d5d5d5;border-width:1px;border-style: solid ;"
class="effect7" 
 >
                                <div class="card-body" id="bar-parent2">
                                
                                    <form method="post" id="form_sample_2" class="form-horizontal">
                                      <input type="hidden" name="user_prefix" id="user_prefix">
                                      <input type="hidden" name="id_row" id="id_row"> 
                                      <input type="hidden" name="id_update" id="id_update"> 

                                        <div class="form-body">

   <div style="padding: 10px;padding-top: 1px;font-size:20px;color:#ffffff;width:100%;height:35px;background-color:#5f7790;border-radius:4px;">User Contact</div>

                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-4">Client Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i id="v_client_name" class="fa"></i>
                                                        <input type="text" class="form-control" name="client_name" id="client_name" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-4">Crcy Code
                                                    <span class="required">   </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_crcy_code"></i>
                                                        <select name="crcy_code" id="crcy_code"  class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                
                                                    
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Contact Person
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_contact_person"></i>
                                                        <input type="text" class="form-control" name="contact_person" id="contact_person" /> </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Contact Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_contact_addr"></i>
                                                        <input type="text" class="form-control" name="contact_addr" id="contact_addr" /> </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Contact Phone
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_contact_phone"></i>
                                                        <input type="text" class="form-control" name="contact_phone" id="contact_phone" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Contact Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_contact_email"></i>
                                                        <input type="text" class="form-control" name="contact_email" id="contact_email" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Contact Service
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                         <div class="row" style="width:100%">

<?php
$idf=0;
 foreach ($tbl_field_values as $val)
{$idf++;
?>
                                                              <div class="col-md-6" style="padding-bottom: 10px;">
                                                                  <div class="form-check">
                                                                  <input class="form-check-input" type="checkbox" value="<?php echo $val->fld_valu;?>" name="fid_val<?php echo$idf;?>" id="fid_val<?php echo$idf;?>">
                                                                   <label class="form-check-label" for="fid_val<?php echo$idf;?>" style="cursor: pointer;">
                                                                  <?php echo $val->fld_valu; ?>
                                                                   </label>
                                                                   </div>
                                                              </div>
<?php } ?>
<input type="hidden" VALUE="<?php echo$idf;?>" id="ch_box_c">
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>

     <div style="padding: 10px;padding-top: 1px;font-size:20px;color:#ffffff;width:100%;height:35px;background-color:#5f7790;border-radius:4px;">User Detail</div>
     <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-4">User Full Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i id="v_user_full_name" class="fa"></i>
                                                        <input type="text" class="form-control" name="user_full_name" id="user_full_name" /> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-4">User Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_user_email"></i>
                                                        <input type="text" class="form-control" name="user_email" id="user_email" /> </div>
                                                </div>
                                            </div>                
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">User Mobile
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_user_mobile"></i>
                                                        <input type="text" class="form-control" name="user_mobile" id="user_mobile" /> </div>
                                                </div>
                                            </div>                                                                                                                                                                                                                       
                                           <div class="form-group row">
                                                <label class="control-label col-md-4">User Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa" id="v_user_name"></i>
                                                        <input type="text" class="form-control" name="user_name" id="user_name" /> </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="control-label col-md-4">User Password
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-8">
                                               
 <div class="form-group">
    <label for="inputPassword" class="control-label">  &nbsp;Minimum of 6 characters</label>
    <div class="form-inline row">
     <div class="input-icon right">
        <i class="fa" id="v_user_pass"></i>
        <input type="password" data-minlength="6" class="form-control" id="user_pass" name="user_pass" placeholder="Password" required >
     </div>
     <div class="input-icon right">
         <i class="fa" id="v_conf_pass"></i>
          <input type="password" class="form-control"  id="conf_pass" name="conf_pass" placeholder="Confirm" required>
     </div>
  </div>
</div>


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">User Status
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-8">
             <select class="form-control"  id="user_Status" name="user_Status">
              <option value="A">Active</option>
              <option value="T">Terminated</option>
             </select>
        <div class="help-block with-errors"></div>
                                                </div>
                                            </div>      
                                                                         
                                         <div class="form-group">
                                            <div class="offset-md-3 col-md-9">
        <button type="button" class="btn btn-primary" onclick="submitForm()" id="bt_add_command">SAVE DATA</button>
        <button type="button" class="btn btn-default" onclick="Page_load()" id="bt_cancel">CANCEl</button>     </div>
                                        </div>
                                    </form>
                                </div>
</div></div>
</div>
<div class="col-sm-8" style="margin-top: 7vw">
    <div style="background-color: #fafcff;border-radius: 10px;border-color:#d5d5d5;border-width:1px;border-style: solid ;height:auto;padding:10px" class="table-scrollable effect7">
<table class="table table-bordered" id="tb_client">
    <thead>
      <tr style="background-color: #5f7790;color:#ffffff;">
        <th style="text-align: center">&nbsp;N</th>
        <th>Client Name</th>
        <th>User Name</th>
        <th>Contact Person</th>
        <th>Contact Address</th>
        <th>Contact Phone</th>
        <th>Contact Email</th>
        <th>Contact Service</th>
        <th>User Status</th>
        <th align="center">Action</th>
      </tr>
    </thead>
    <tbody id="tbd_client">
    </tbody>
  </table>
<hr>
<center>
<table >
 <tr>
   <td><img src="<?php echo$pthc?>assets/img/prev.png" style="width:30px;cursor: pointer;" onclick="first_data()"></td>
    <td id="bar_value"></td>
   <td><img src="<?php echo$pthc?>assets/img/next.png" style="width:30px;cursor: pointer;" onclick="last_data()"></td>
</tr>
</table>
</center>
</div>
</div>
</div>
            </div>
            </div>
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2018 &copy; KHEMTIS.COM. Powered by 
            <a href="http://www.me-fi.com" target="_top" class="makerCss">ME-FI.com</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>


<script>
 // Action Javascript Code All command for Database
 // Load Valiable and Function Default  All 
 var cur_row = 0;
 var row_tab = 0;
 var numdiv = 0;

  function Page_load(){
      row_tab = 10;
       get_data_table(0,0,0,1);
       get_crcy_code(1,"CRCY_CODE");
       if($('#bt_cancel').is(":visible")){
           $('#bt_cancel').hide();
        }else{
           $('#bt_cancel').hide();
        }
      $("#form_sample_2").closest('form')
      .find("input[type=text], textarea, input[type=email], input[type=password]").val("");
                   $('#bt_add_command').text("SAVE DATA");
                   $('#bt_add_command').val("1");
                       cler_er($('#v_client_name'));
                       cler_er($('#v_crcy_code'));
                       cler_er($('#v_contact_addr'));
                       cler_er($('#v_contact_person'));
                       cler_er($('#v_contact_phone'));
                       cler_er($('#v_contact_email'));

                           cler_er($('#v_user_full_name'));
                           cler_er($('#v_user_email'));
                           cler_er($('#v_user_mobile'));
                           cler_er($('#v_user_name'));
                           cler_er($('#v_user_pass'));
                           cler_er($('#v_conf_pass'));
                       $('input:checkbox').prop('checked',false);    
  }

  // Insert And Update Data New Row
function ch_email(emltxt){
   if(emltxt.indexOf("@") != -1){
    return true;
  }
   chv_form($('#v_contact_email'));
  return false;
}
function validate_ch(){
    var ivd = true;
      ivd = (ch_email($('#contact_email').val()));
      if($('#client_name').val().trim()==''){ivd=false;chv_form($('#v_client_name'));}
      if($('#crcy_code').val().trim()==''){ivd=false;chv_form($('#v_crcy_code'));}
      if($('#contact_addr').val().trim()==''){ivd=false;chv_form($('#v_contact_addr'));}
      if($('#contact_person').val().trim()==''){ivd=false;chv_form($('#v_contact_person'));}
      if($('#contact_phone').val().trim()==''){ivd=false;chv_form($('#v_contact_phone'));}
      if($('#contact_email').val().trim()==''){ivd=false;chv_form($('#v_contact_email'));}

      if($('#user_full_name').val().trim()==''){ivd=false;chv_form($('#v_user_full_name'));}
      if($('#user_email').val().trim()==''){ivd=false;chv_form($('#v_user_email'));}
      if($('#user_mobile').val().trim()==''){ivd=false;chv_form($('#v_user_mobile'));}
      if($('#user_name').val().trim()==''){ivd=false;chv_form($('#v_user_name'));}

if($(bt_add_command).val()==1){
if($('#user_pass').val().trim()==''){ivd=false;chv_form($('#v_user_pass'));}
if($('#conf_pass').val().trim()==''){ivd=false;chv_form($('#v_conf_pass'));}
}


    return  ivd;
}
function chv_form(element){
         element.removeClass('fa-check').addClass("fa-warning");  
}
function cler_er(element){
         element.removeClass('fa-warning');
         element.removeClass('fa-check');
}

  function submitForm(){
  if(validate_ch()==true){  
   var send_commnd = $('#bt_add_command').val().trim();
   var data_service = $("form input:checkbox").serialize();
   var formdata = $('#form_sample_2').serialize();
   var id_row = $('#id_row').val().trim();
   var id_update = $('#id_update').val().trim();

       $.post("<?php echo base_url('Client_user/DoUpdate_client_user')?>", 
        { suggest: formdata,
          send_commnd: send_commnd,
          data_service:data_service,
          id_row:id_row,
          id_update:id_update
        },

         function(result){
     
       if(result=='1'){
             Page_load();
              $.toast({
              heading: 'บันทึกข้อมูลสำเร็จแล้ว!',
              text: '',
              position: 'mid-center',
              loaderBg: '#5ba035',
              icon: 'success',
              hideAfter: 1500,
              stack: 0
            });
       }else if(result=='2'){
           Page_load();
              $.toast({
              heading: 'บันทึกการแก้ไขข้อมูลสำเร็จแล้ว!',
              text: '',
              position: 'mid-center',
              loaderBg: '#5ba035',
              icon: 'success',
              hideAfter: 1500,
              stack: 0
            });
      }else{
             Page_load();
              $.toast({
              heading: 'ไม่สามารถบันทึกข้อมูลได้!',
              text: '',
              position: 'mid-center',
              loaderBg: '#da8609',
              icon: 'warning',
              hideAfter: 2000,
              stack: 0
            });
      }
    },'json');
  }else{
              $.toast({
              heading: 'ไม่สามารถบันทึกข้อมูลได้!',
              text: '',
              position: 'mid-center',
              loaderBg: '#da8609',
              icon: 'warning',
              hideAfter: 2000,
              stack: 0
            });
  }
 }
// GET CRCY_CODE
 function get_crcy_code(st_data,st_pr){
  $.ajax({
                    url: "<?php echo base_url('Client_user/Do_tbl_field_values')?>",
                    type: "POST",
                    data: ({st_data:st_data,st_pr:st_pr}),
                    dataType: "json",
              success:function(data) {
                  $("#crcy_code").empty();
              var idnum = 0;
              $.each(data, function(key, value) {
                  var tr = "";
                      tr = tr + "<option value='"+value.fld_valu+"'>"+value.fld_valu+"</option>";
                  $('#crcy_code:last').append(tr);
               });
          }
     });
 }

// Get Table
function get_data_table(id,st_prda,rw_con,nex_rw){
$.ajax({
                    url: "<?php echo base_url('Client_user/DoShow_client')?>",
                    type: "POST",
                    data: ({id_data:id,st_data:st_prda,rw_con:rw_con,max_tab:row_tab}),
                    dataType: "json",
              success:function(data) {
              $("#tbd_client").empty();
              var idnum = 0;
              $.each(data, function(key, value) {idnum++;
                 if(value.user_status=="T"){cl_txt="#c33f3f";}else{cl_txt = "green";}
                  var tr = ""+
                  "<tr>"+
                  "<td align='center'>" +eval((nex_rw*row_tab)+idnum-row_tab) + "</td>"+
                  "<td>" +  value.client_name  + "</td>"+
                  "<td>" +  value.user_name  + "</td>"+
                  "<td>" +  value.contact_person + "</td>"+
                  "<td>" +  value.contact_addr + "</td>"+
                  "<td>" +  value.contact_phone + "</td>"+
                  "<td>" +  value.contact_email + "</td>"+
                  "<td>" +  value.tbl_all_sevice + "</td>"+
                  "<td style='color:"+cl_txt+";'>"+ value.user_status_c +"</td>"+
                  "<td align='center'>"+
                  "<a href='javascript:get_data_select("+value.client_id+","+cur_row+")' class='btn btn-tbl-edit btn-xs'>"+
                  "<i class='fa fa-pencil'></i></a>"+
                  "</td>"+
                  "</tr>";
                  $('#tb_client > tbody:last').append(tr);
               });
          }
     });
get_bar_number(eval(rw_con/row_tab));
}
// Get Bar Number 
function get_bar_number(num_row_con){
  $.post("<?php echo base_url('Client_user/Do_count_row')?>", 
      {suggest: '0'},
       function(result){
        $("#bar_value").empty();
             numdiv = eval(result/row_tab);
               for(var i=0;i<numdiv;i++){
                   var tr = "";var st_bt="";
                   if(num_row_con==i){st_bt="set_pt_ac"}else{st_bt="set_pt_page";}
                  tr = tr + "<td style='padding-left:0px;' onclick='get_data_table(0,0,"+eval(i*row_tab)+","+eval(i+1)+")'><div class='"+st_bt+"'>"+eval(i+1)+"</div></td>";
                  $('#bar_value:last').append(tr);
               }
       },'json');
 }
function last_data(){
    var ln = ((Math.ceil(numdiv)-1)*row_tab);
    get_data_table(0,0,ln,(Math.ceil(numdiv)));
}
function first_data(){
    get_data_table(0,0,0,1);
}
 // Get Select Data Row
function get_data_select(id,cr){
   // Page_load();
  cur_row = cr;
  $(bt_cancel).show();
  $(bt_add_command).text("UPDATE DATA");
  $(bt_add_command).val("2");
$.ajax({
                    url: "<?php echo base_url('Client_user/DoShow_client')?>",
                    type: "POST",
                    data: ({id_data:id,st_data:1,rw_con:cr,max_tab:row_tab}),
                    dataType: "json",
              success:function(data) {
                   $('input:checkbox').prop('checked',false); 
              $.each(data, function(key, value) {          
                 
                   $('#id_update').val(value.user_id);
                   $('#id_row').val(value.client_id);

                   $('#client_name').val(value.client_name);
                   $('#crcy_code').val(value.crcy_code);
                   $('#contact_person').val(value.contact_person);
                   $('#contact_addr').val(value.contact_addr);
                   $('#contact_phone').val(value.contact_phone);
                   $('#contact_email').val(value.contact_email);
                   $('#user_prefix').val(value.user_prefix);

                   $('#user_full_name').val(value.user_full_name);
                   $('#user_email').val(value.user_email);
                   $('#user_mobile').val(value.user_mobile);
                   $('#user_Status').val(value.user_status);
                   $('#user_name').val(value.user_name.replace(value.user_prefix,""));

                           var txt_ex = value.tbl_all_sevice;
                           var strArray = txt_ex.split(',');
                           var max_ch= $('#ch_box_c').val();
                       for(var i = 0; i < strArray.length; i++){
                                for(var j=1;j<=max_ch;j++){
                                   if($('#fid_val'+j).val().trim()==strArray[i].trim()){
                                      $('#fid_val'+j).prop  ('checked', true);
                                   }
                                }   
                             }
               });
          }
     });
}

// Delete Data Row
function del_client_user(id){
    swal({
        title: "คุณต้องการลบรายการนี้หรือไม่",
        text: "ยืนยันการลบรายการ",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }, function () {
       var ch=0;
            $.post("<?php echo base_url('Client_user/DoDel_cl_us')?>", {id_data: id}, function(result){
              ch=result;
               if(ch==1){
                     setTimeout(function () {swal("ลบรายการเสร็จสิ้น!"); get_data_table(0,0,0,1);}, 1000);
                     Page_load();

               }else{
                     setTimeout(function () {swal("ไม่สามารถลบรายการนี้ได้!");}, 1000);
               }
            },'json');
    });
}


// End Action 

</script>
    <!-- end footer -->
    <!-- start js include path -->
    
    <script src="<?=$pthc?>assets/plugins/jquery/jquery.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/popper/popper.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
	  <script src="<?=$pthc?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=$pthc?>assets/plugins/jquery-validation/js/jquery.validate.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-validation/js/additional-methods.min.js" ></script>

    <!-- bootstrap -->
    <script src="<?=$pthc?>assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/sparkline/jquery.sparkline.min.js" ></script>
	  <script src="<?=$pthc?>assets/js/pages/sparkline/sparkline-data.js" ></script>

    <!-- notifications -->
    <script src="<?=$pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-toast/dist/toast.js" ></script>
       <!-- Sweet Alert -->
    <script src="<?php echo $pthc?>assets/plugins/sweet-alert/sweetalert.min.js" ></script>
    <script src="<?php echo $pthc?>assets/js/pages/sweet-alert/sweet-alert-data.js" ></script>

    <!-- Common js-->

	  <script src="<?=$pthc?>assets/js/app.js" ></script>
  <!--  <script src="<?=$pthc?>assets/js/pages/validation/form-validation.js" ></script>-->
    <script src="<?=$pthc?>assets/js/layout.js" ></script>
    <script src="<?=$pthc?>assets/js/theme-color.js" ></script>
    
    <!-- material -->
    <script src="<?=$pthc?>assets/plugins/material/material.min.js"></script>
    <!-- animation -->
    <script src="<?=$pthc?>assets/js/pages/ui/animations.js" ></script>
    <!-- morris chart -->
    <script src="<?=$pthc?>assets/plugins/morris/morris.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/morris/raphael-min.js" ></script>
    <script src="<?=$pthc?>assets/js/pages/chart/morris/morris_home_data.js" ></script>
     <!-- end js include path -->


<script type="text/javascript">
      

</script>


</body>
</html>