<?php $pthc= base_url();?>
<!-------- CSS --------->
<!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- animation -->

   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
   <link rel="stylesheet" href="<?php echo $pthc ?>assets/plugins/sweet-alert/sweetalert.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/font/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/inputfile/css/component.css" />


<style type="text/css">
#selectedFiles img {
    max-width: 200px;
    max-height: 200px;
    float: left;
    margin-bottom:10px;
  }
.imgshow{
  margin;border-style: solid;border-width: 1px;border-radius: 5px;height:100px;border-color:#cccccc;margin-left:5px;cursor: pointer;
}
.imgshow:hover {
 margin;border-style: solid;border-width: 1px;border-radius: 5px;height:100px;border-color:red;margin-left:5px;cursor: pointer;
}

.cct1{
  border:0px;border-width:1px;border-style: solid;border-color:#ffffff;padding-bottom:5px;border-radius:5px;background-color:#ffffff;
}
.cct2{
  font-size: 18px;font-weight: bold;color:#adadad;
}
.cct3{
  width:auto;height:150px;border-style:solid;border-width: 1px;border-color:#cccccc;border-radius:5px;padding:0px;overflow: hidden; position: relative;
}
.cct4{
  height:150px;width:auto;margin-bottom: 15px; 
}
.cct5{
  height:20px;padding-top:1px!important;margin-left:2px;padding-bottom:5PX;
}
.cct6{
  height:170px;margin-top:-10px;margin-left:-10px;
}
.del_file{
  text-align: center;
  color:#ffffff;
  width: 120px;
  border-style: solid;
  border-radius: 3px;
  border-width: 1px;
  background: #b61f1f;
}
.saveImage {
    position: relative;
    overflow: hidden;
    margin: 0px;
    margin-bottom: 10px;
}
}
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 0px;
     margin-bottom: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.hidmain1{
  display: none;
}
.hidmain2{
  display: show;
}

.border_icon{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   background-color: #b1b1b1;
   cursor: pointer;
}


.border_icon_fix_gra{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   background-color: #cccccc;
   cursor: pointer;
}

.border_icon_fix_gra:hover{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   background-color: #ec9200;
   cursor: pointer;
}

.border_icon_fix_orang{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   background-color: #ec9200;
   cursor: pointer;
}

.border_icon_fix_orang:hover{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   background-color: #cccccc;
   cursor: pointer;
}




.border_icon_fix{
   padding:3px;
   padding-right: 7px;
   padding-left: 7px;
   border-style: solid;
   border-width: 1px;
   border-radius: 5px;
   color: #ffffff;
   background-color: #1079aa;
    cursor: pointer;
}


.row_ling_fix{
  border-radius:5px;
  border-style: solid;
  border-color: #1079aa;
  border-width: 1px;
  background-color:#acd4e6;
  margin-top: 10px;
  
}
.row_ling{
  border-radius:5px;
  border-style: solid;
  border-color: #ffffff;
  border-width: 1px;
  width: auto;
margin-top: 10px;
}
.row_ling:hover{
  border-radius:5px;
  border-style: solid;
  border-color: #cccccc;
  border-width: 1px;
margin-top: 10px;

  background-color:#ececec;

}

.set_row_icon{
  border-radius:5px;
  border-style: solid;
  border-color: #cccccc;
  border-width: 1px;

  cursor: pointer;
  background-color:#ececec;
}

</style>
<!----------------------------->
<?php if($chk_Package_id!=""){?>



<div style="margin-top:8vw;" >     
<form id="form_package" name="form_package" class="form-horizontal" enctype="multipart/form-data">   
            <?php  
            $type_comd = "ADD";
            $p_package_id="";
            $p_client_id="";$p_hotel_phone="";$p_booking_email="";
            $p_hotel_map_url="";$p_province_id="";$p_country_id="";
            $p_key_words="";$p_hotel_grade="";
            $dis_cty="";$dis_prov="";
            $txt_lang=array();
            $package_room_type = "";
            $published_status = "";
            $booking_status="";
                    foreach($get_update_Package as $value_package){
                        $a_lang=  array();
                            $p_package_id = $value_package->package_id;
                            $p_client_id =$value_package->client_id;
                            $package_code =$value_package->package_code;
                            $package_room_type =$value_package->package_room_type;
                            $published_status =$value_package->published_status;
                            $booking_status =$value_package->booking_status;

                           array_push(
                            $a_lang,$value_package->lang,
                            $value_package->package_title,
                            $value_package->package_desc,
                            $value_package->package_desc_file
                          );
                           array_push($txt_lang,$a_lang);  
                    }       
                    if($p_package_id!=""){$type_comd="UP";}
                   
            ?>


          <div class="row" style="padding:15px;">
            <div class="col-sm-12">
              <div class="card-box">

    <button type="button" class="btn" style="background-color:#1777a4;color:#ffffff;" onclick="window.location='<?php echo base_url('PackageDetail')?>'">Add Package</button>
    <button type="button" class="btn" style="background-color:#ffffff" onclick="window.location='<?php echo base_url('PackageList')?>'">View Package</button>
    <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel tab-border ">
                     <header class="panel-heading panel-heading-gray custom-tab ">
                            <ul class="nav nav-tabs">        
    <?php  
                    $itab=0;
                    foreach($results_lang as $value_tab){$itab++;
                        $actab="";
                        $naem_lang = $value_tab->fld_valu_desc;
                        $fld_valu = $value_tab->fld_valu;
                        if($itab==1){$actab = "class='active'";}
    ?>
   <li class="nav-item"><a href="#<?php echo $fld_valu?>" style="color:#000000;" data-toggle="tab" <?php echo $actab?>><?php echo $naem_lang?></a></li>
   <?php } ?>
                                </ul>
                                </header>
                                <div class="panel-body">
                               <div class="tab-content">
    <?php  
                  $itab=0;$lang_q=array();
                  foreach($results_lang as $value_bx){$itab++;
                        $actab="";
                        $naem_lang = $value_bx->fld_valu_desc;
                        $fld_valu = $value_bx->fld_valu;
                        if($itab==1){$actab = "active";}
                        $lang_txt = "";
                        $package_title = "";
                        $package_desc = "";
                        $package_desc_file = "";

                        for($lg=0;$lg<(count($txt_lang));$lg++){
                        if(isset($txt_lang[$lg][1])  && ($txt_lang[$lg][0]==$fld_valu)){
                        $lang_txt =  $txt_lang[$lg][0];
                        $package_title =  $txt_lang[$lg][1];
                        $package_desc =  $txt_lang[$lg][2];
                        $package_desc_file =  $txt_lang[$lg][3];
                       }
                      }
    ?>
    <div class="tab-pane <?php echo $actab?>" id="<?php echo $fld_valu?>">
                                        
<!-- start page content -->

          <div class="row">
            <div class="col-sm-12">
              <div class="card-box">
                <div class="card-body row">

<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
    <font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Package Details <?php echo $naem_lang ?></font>
</div>

                          <div class="col-lg-12 p-t-10"> 
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo$package_title?>" type = "text" name="package_title<?php echo $fld_valu?>" id="package_title<?php echo $fld_valu?>">
                               <label class = "mdl-textfield__label">Package title</label>
                            </div>
                          </div>
                               <div class="col-lg-12 p-t-10"> 
                                  <label class = "mdl-textfield__label" style="margin-left:15px;">Package Desc</label><br>
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <textarea class = "mdl-textfield__input ex" style="background-color:#ffffff" rows =  "5" 
                                 name="short_desc_<?php echo $fld_valu?>" id = "short_desc_<?php echo $fld_valu?>" ><?php echo$package_desc?></textarea>
                               <input type="hidden" value="" name="val_short_desc_<?php echo $fld_valu?>" id="val_short_desc_<?php echo $fld_valu?>">
                              <!-- <label class = "mdl-textfield__label" for = "text7">Package Desc</label>-->
                            </div>
                       </div>
                          <div class="col-lg-12 p-t-10"> 
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

          <input type="file"  name="file<?php echo $fld_valu?>" id="file<?php echo $fld_valu?>" class="inputfile inputfile-6" style="display:none"  data-multiple-caption="{count} files selected" multiple />
          <label for="file<?php echo $fld_valu?>"><span><?php echo$package_desc_file?></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> PDF FILE</strong></label>
 
                         </div>
                     </div>
                </div>
                     </div>
                         </div>
                             </div> 
   <!-- end page content -->
                                        </div>
   <?php } ?>




<div class="card-body row">
<input type="hidden" id="val_package_id" name="val_package_id" value="<?php echo$p_package_id?>">
<input type="hidden" id="val_package_room" name="val_package_room" value="<?php echo$package_room_type?>">
<input type="hidden" id="val_published_status" name="val_published_status" value="<?php echo$published_status?>">
<input type="hidden" id="val_booking_status" name="val_booking_status" value="<?php echo$booking_status?>">
<input type="hidden" id="typ" value="<?php echo$type_comd?>">




                        <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo ''; ?>" type = "text" id = "package_code" name="package_code">
                               <label class = "mdl-textfield__label">Package code</label>
                            </div>
                        </div>
                        <div class="col-lg-4 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="package_room"  value="<?php echo''?>" readonly tabIndex="-1">
                            <label for="package_room" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="package_room" class="mdl-textfield__label">Package Room Type</label>
                            <ul data-mdl-for="package_room" id="get_package_room" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="Y">YES</li>
                                <li class="mdl-menu__item" id="N">NO</li>
                            </ul>
                        </div>
                       </div>    

                       <div class="col-lg-4 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="published_status"  value="<?php echo''?>" readonly tabIndex="-1">
                            <label for="published_status" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="published_status" class="mdl-textfield__label">Published status</label>
                            <ul data-mdl-for="published_status" id="get_published_status" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="Y">YES</li>
                                <li class="mdl-menu__item" id="N">NO</li>
                            </ul>
                        </div>
                       </div>    
                       
                       <div class="col-lg-4 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="booking_status"  value="<?php echo''?>" readonly tabIndex="-1">
                            <label for="booking_status" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="booking_status" class="mdl-textfield__label">Booking status</label>
                            <ul data-mdl-for="booking_status" id="get_booking_status" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="Y">YES</li>
                                <li class="mdl-menu__item" id="N">NO</li>
                            </ul>
                        </div>
                     </div>    

                    


                       <div class="col-lg-12 p-t-10 text-center" style="margin-bottom:45px;"> 
                            <button type="button" onclick="submit_data()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>



<!---------------------- Add Features ----------------------------------------------
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
    <font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Hotel Features&nbsp;&nbsp;</font><font style="font-size: 18px;color:#0a69b3;"></font>
</div>
<div id="show_icon"></div>

-->
         </div>
      </div>
   </div>
</div>


<!-------------UPLOAD FILE------------------->
<div class="row" style="padding:15px;">
     <div class="col-sm-12">
         <div class="card-box">
<div class="card-body row"  id="imglis">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
  <font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Package Image Upload</font>
</div>
<div class="col-lg-12 p-t-10"> 
<div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
<table id="btn_upload"><tr><td valign="top">
     <div class="fileUpload btn btn-primary">
       <span><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;Select IMAGE</span>
       <input type="file" id="files" name="files" multiple class="upload" />
     </div>
</td><td valign="top">
     <div class="saveImage btn btn-warning">
        <span><i class="fa fa-upload"></i>&nbsp;Upload IMAGE</span>
     </div>
</td>
<td valign="top">
      <div class="clsimage btn btn-danger">
        <span><i class="fa fa-remove"></i>&nbsp;CLEAR IMAGE</span>
      </div>
</td>
</tr></table>
</div>
 <div class="row" id="selectedFiles"></div>   
 <!-------------- Show File Of database Last Upload ----->
 <div id="tbd_room">&nbsp;</div>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-------------- END UPLOAD------------------->
                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>
          
               </form>
</div>
<!-------------------------Add Script Command ----------------------------->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
  <script src="<?php echo $pthc?>assets/inputfile/js/custom-file-input.js"></script>
  <script src="<?php echo $pthc ?>assets/plugins/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">





 $("#get_package_room li").click(function() {
    $("#val_package_room").val(this.id);
});

 $("#get_published_status li").click(function() {
    $("#val_published_status").val(this.id);
});

 $("#get_booking_status li").click(function() {
    $("#val_booking_status").val(this.id);
});

pubt(numreve($('#val_package_room').val()));
pubp(numreve($('#val_published_status').val()));
pubb(numreve($('#val_booking_status').val()));


hidimg($('#val_package_id').val());
function hidimg(idcheck){
   if(idcheck!=""){
   	$("#imglis").css("display", "block");
   }else{
   	$("#imglis").css("display", "none");
   }
}


function numreve(n){
    if(n=="Y"){return 0;}
    else if(n=="N"){return 1;}
    else{return -1;}
}

function pubt(lid){
  if(lid!=-1){
    $("#package_room").val($("#get_package_room li")[lid].textContent);
  }
}
function pubp(lid){
  if(lid!=-1){
    $("#published_status").val($("#get_published_status li")[lid].textContent);
  }
}
function pubb(lid){
  if(lid!=-1){
    $("#booking_status").val($("#get_booking_status li")[lid].textContent);
  }
}



function ch_txt_edit(){
    <?php foreach($results_lang as $value_bx){
          $fld_valu = $value_bx->fld_valu;
    ?>
      var txtid= '<?php echo$fld_valu?>';
      $('#val_short_desc_'+txtid).val(tinyMCE.editors[$('#short_desc_'+txtid).attr('id')].getContent());
    <?php } ?>
}


function ajupload(data_ar){
        var dar = data_ar.length;
        var form_data = new FormData();
            for(var i=0;i<=(dar-1);i++){
	               var file_data = $('#file'+data_ar[i][2]).prop('files')[0];
                    form_data.append('file'+data_ar[i][2], file_data);
                    form_data.append('id'+data_ar[i][2],data_ar[i][0]);

            }
                    $.ajax({
                        url: "<?php echo base_url('PackageDetail/upload_file')?>", // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        	if(response!="Yes"){
                              show_msg("Save Success And "+response,1,5000);
                            }
                        },
                        error: function (response) {
                           alert("Error Upload File PDF !");
                        }
                    });
}


function submit_data(){
ch_txt_edit();
var formdata =  $('#form_package').serialize(); //new FormData($("#form_package")[0]);
var send_commnd = $('#typ').val();
pk_ar = [];
  $.ajax({
       url: "<?php echo base_url('PackageDetail/Do_insert_And_Update_Package')?>",
             type: "POST",
             data: ({formdata:formdata,send_commnd:send_commnd}),
             dataType: "json",
             
      success:function(data) {
          $.each(data, function(key, value) {
                         var ar = [];
                 ar.push(value.idmg,value.pkid,value.lg);
                 pk_ar.push(ar);
          });
      },
      complete: function(){

      	ajupload(pk_ar);
      
      }
    });


/*


$.ajax({
    url: "<?php // echo base_url('PackageDetail/Do_insert_And_Update_Package')?>",
    type: "POST",
    dataType: "json",        
    contentType: 'application/json; charset=utf-8', 
    data:({formdata:formdata,send_commnd:send_commnd}),

    success: function(data){

          $.each(data, function(key, value) {
          	alert(value.idmg);
                 var ar = [];
                 ar.push(value.idmg,value.pid,value.lg);
                 pk_ar.push(ar);
          });
     /*
      if(data!=0){
        show_msg('บันทึกข้อมูลสำเร็จแล้ว',1);
             //if(send_commnd=="ADD"){$('#typ').val('UP');$('#val_hotel_id').val(result);hotel_id=result;}
             ajupload(data);
             clsimage_all();
             // showTableImg(hotel_id);
      }else{
         show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
      }
      
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
         alert(textStatus);
    },
    complete: function(){
    }
});


*/








}



function set_icon(id_icon){
     var hotel_id=$('#val_hotel_id').val();
     var formdata = $('#form_hotel').serialize();
     var send_commnd = $('#typ').val();
     $.post("<?php echo base_url('HotelDetail/Do_update_icon')?>", 
      {id_icon: id_icon,hotel_id:hotel_id,formdata: formdata,send_commnd: send_commnd},
       function(result){
       if(result!=0){
              if(send_commnd=="ADD"){$('#typ').val('UP');$('#val_hotel_id').val(result);}
              reset_icon();
      }else{
        show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
      }
    },'json');
  }


  function show_msg(txtdata,idtyp){
    var txttyp = "";
       if(idtyp==1){txttyp="success";}
       if(idtyp==2){txttyp="warning";}
               $.toast({
              heading: txtdata,
              text: '',
              position: 'mid-center',
              loaderBg: '#da8609',
              icon: txttyp,
              hideAfter: 2000,
              stack: 0
            });
  }

  //------------------------------------------------------------------UPLOAD IMAGE-----------------------------------------------------
  var selDiv = "";
  var storedFiles=[];
  var storedVal=[];
 
  var btbn =0;
  $(document).ready(function(){

           tinymce.init({
            selector: "textarea.ex",
            theme: "modern",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });

    $("#files").on("change", handleFileSelect);
    $("#form_package").on("click",".saveImage",handleForm);
    $("#form_package").on("click",".selFile",removeFile);
    $("#form_package").on("click",".clsimage",clsimage_all);
     showTableImg($('#val_package_id').val());
   // reset_icon();
  });


    
  function clsimage_all(e){
         selDiv="";
         storedFiles=[];
         storedVal=[];
         $("#selectedFiles").empty();
  }



  function handleFileSelect(e) {
    selDiv = $("#selectedFiles"); 
    var files = e.target.files;var i=0;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {   
      if(!f.type.match("image.*")) {
        return;
      } 

      storedFiles.push(f);
      var reader = new FileReader();
      reader.onload = function (e) {i++; 
        var html = "<div><img  src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selFile imgshow' title='Click to remove'></div>";
         storedVal.push({pname:f.name,ptemp:e.target.result});
         btbn=eval(btbn+f.size);
         selDiv.append(html);
      }
      reader.readAsDataURL(f); 
    });
   var $el = $('#files');
   $el.wrap('<form>').closest('form').get(0).reset();
   $el.unwrap();

  }

//---------------------------------------------------------------------------------------------------------------------------
function handleForm(e){
    if(btbn>7000000){
         show_msg("no uploaded File Maximum 8.MB",2)
    }else{
    if(storedVal.length<1){
         show_msg("Not select File Image",2)
    }else{
    var package_id = $('#val_package_id').val();
    var formdata = $('#form_package').serialize();
    var send_commnd = $('#typ').val();

    $.post("<?php echo base_url('PackageDetail/Do_inser_image')?>", 
      {formdata: formdata,send_commnd: send_commnd,storedVal: storedVal,package_id:package_id},
        function(result){
       if(result!=0){
        show_msg("บันทึกข้อมูลสำเร็จแล้ว",1);
              //if(send_commnd=="ADD"){$('#typ').val('UP');$('#val_package_id').val(result);package_id=result;}
              clsimage_all();
              showTableImg(package_id);
      }else{
        show_msg("ไม่สามารถบันทึกข้อมูลได้",2);
      }
    },'json');
   }
  }
}
  
//--------------------------------------------

  function removeFile(e) {

    var file = $(this).data("file");
    for(var i=0;i<storedFiles.length;i++) {
      if(storedFiles[i].name === file) {
        btbn=eval(btbn-storedFiles[i].size);
          storedVal.splice(i,1);
          storedFiles.splice(i,1);
        break;
      }
    }
    $(this).parent().remove();
  }



// Show Imag Table
function reset_icon(){
var p1 = $('#val_hotel_id').val();
$.ajax({
                    url: "<?php echo base_url('HotelDetail/DoShow_icon')?>",
                    type: "POST",
                    data: ({hotel_id:p1}),
                    dataType: "json",
              success:function(data) {
              $("#show_icon").empty();
              var idnum = 0; var tr = "";
tr =tr+ "<div class='row' style='margin-top: 15px;'>";
$.each(data, function(key, value) {idnum++;
  var ch_class = value.hotel_feature_hilight;
  var txt_yes_no = "";
  if(ch_class!=null){txt_class ="row_ling_fix";txt_icon="border_icon_fix"
                      txt_yes_no="<div class='border_icon_fix_gra'><li class='fa fa-ban'></li></div>";
    if(ch_class=='Y'){txt_yes_no="<div class='border_icon_fix_orang'><li class='fa fa-check'></li></div>";}
  }else{txt_class="row_ling";txt_icon="border_icon";}
  tr=tr +
    "<div class='col-md-3'>"+
    "<div class='"+txt_class+"'>"+
            "<table style='width:100%'><tr valign='top' style='cursor:pointer'><td style='width:10%' onclick=set_icon('"+value.fld_valu+"')>"+
            "<div class='"+txt_icon+"'><i class='"+value.field1+"'></i></div>"+
            "</td><td align='left' onclick=set_icon('"+value.fld_valu+"')>"+value.fld_valu_desc+"</td><td style='width:10%' onclick=set_true_icon('"+value.fld_valu+"','"+ch_class+"')>"+txt_yes_no+"</td></tr></table>"+
    "</div>"+
  "</div>";    
 });
tr=tr+"</div>";
$('#show_icon').append(tr);
          }
     });
}



function set_true_icon(id_valu,ch_true){
var p1 = $('#val_hotel_id').val();
 $.post("<?php echo base_url('HotelDetail/Do_set_true_icon')?>", 
      {id_valu:id_valu,hotel_id:p1,ch_true:ch_true},
        function(result){
       if(result=='1'){
             show_msg("Enable Show success",1,600);
             reset_icon();
      }else{
             show_msg("Not Set Enable !",2,600); 
      }
    },'json');

}





function showTableImg(p1){
if(p1==""){p1=-1;}
$.ajax({
                    url: "<?php echo base_url('PackageDetail/DoShow_Package')?>",
                    type: "POST",
                    data: ({Package_id:p1}),
                    dataType: "json",
              success:function(data) {
              $("#tbd_room").empty();
              var idnum = 0; var tr = "";
tr =tr+ "<div  class='row' style='padding: 10px;padding-top: 3px;width: 90%'>";
$.each(data, function(key, value) {idnum++; var bg_c = "btn-primary";var css_hidmain="hidmain2";
  if(value.img_main==1){bg_c="btn-success";css_hidmain="hidmain1";}
  tr=tr +
    "<div class='col-sm-2 cct4'>"+
    "<div class='cct3'>"+
    "<center>"+
       " <div style='position:absolute;z-index: 1000;'>"+
            "<div class='btn "+bg_c+" cct5' onclick='main_img("+value.id+","+value.package_id+")'>Main</div>"+
           " <div class='btn btn-danger cct5 "+css_hidmain+"' onclick='del_img("+value.id+","+value.package_id+")'>Delete</div>"+
         "</div>"+
        "<img src='"+value.img_name+"' class='cct6'>"+
      "</center>"+
    "</div>"+
  "</div>";    
 });
tr=tr+"</div>";
$('#tbd_room').append(tr);
          }
     });
}



//------------------------- Delete Img-------------------------
function del_img(idrun,Package_id){
    $.post("<?php echo base_url('PackageDetail/Do_delete_image')?>", 
      {idrun:idrun,Package_id:Package_id},
        function(result){
       if(result=='1'){
        show_msg("ลบข้อมูลสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(Package_id);
      }else{
        show_msg("ไม่สามารถลบข้อมูลได้",2); 
      }
    },'json');
  }


//------------------------- Delete Img-------------------------
function main_img(idrun,Package_id){
    $.post("<?php echo base_url('PackageDetail/Do_main_img')?>", 
      {idrun:idrun,Package_id:Package_id},
        function(result){
       if(result=='1'){
           show_msg("กำหนดรูปหลักสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(Package_id);
      }else{
           show_msg("ไม่สามารถกำหนดข้อมูลได้",2);
      }
    },'json');
  }
  
</script>
<!--------------------End Script Command----------------------------->


 <?php }else{?>
<br><br>
   <div style="font-size: 35px;margin-top:8vw;"><center>Hotel Information not available
    <br><br>
   <br> <a href="javascript:goto_page_hotel()"><div class="fileUpload btn btn-primary">Click To Page </div></a></center></div>
<br><br>

<script type="text/javascript">

   function goto_page_hotel(){
     $.post("<?php echo base_url('HotelDetail/Do_add_hotel_id')?>", 
      {none:0},
        function(result){
       if(result>0){
           show_msg("Create Hotel Success ",1,1500);
           re_deley("HotelDetail",1500);
      }else{
           show_msg("Not Create Hotel",2,1500);
      }
    },'json');
   }


function show_msg(txtdata,idtyp,deley){
  var txttyp = "";
  if(idtyp==1){txttyp="success";}
  if(idtyp==2){txttyp="warning";}
  if(idtyp==3){txttyp="basic";}
               $.toast({
              heading: txtdata,
              text: '',
              position: 'mid-center',
              loaderBg: '#da8609',
              icon: txttyp,
              hideAfter: deley,
              stack: 0
            });
  }

function re_deley(link,relay){
   setTimeout(function () {
       window.location.href = link; 
    }, relay); 
}


</script>

  <?php }?>