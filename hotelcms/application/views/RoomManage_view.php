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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $pthc ?>assets/font/flaticon/flaticon.css">
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
<div style="margin-top:8vw;" >       
<form id="form_room" class="form-horizontal" enctype="multipart/form-data">   
            <?php  
            $type_comd = "ADD";
            $p_room_id="";
            $p_default_quota="";$p_max_extra_bed="";
            $p_published_status="";$p_booking_status="";$p_room_title="";
            $p_default_price="";$p_default_dscnt_price="";$p_extra_bed_price="";
            $p_crcy_code="";
            $txt_lang=array();
                    foreach($get_room as $value_room){
                        $a_lang=  array();
                            $p_room_id =$value_room->room_idrun;
                            $p_room_title =$value_room->room_title;
                            $p_default_quota =$value_room->default_quota;
                            $p_max_extra_bed =$value_room->max_extra_bed;
                            $p_published_status =$value_room->published_status;
                            $p_booking_status =$value_room->booking_status;
                            
                           array_push($a_lang,
                            $value_room->lang,
                            $value_room->room_fld_nm,
                            $value_room->room_fld_desc
                          );
                           array_push($txt_lang,$a_lang);  
                    } 


             $txt_cry=array();
                    foreach($get_cry as $value_cry){
                        $type_cry=  array();
                           array_push(
                            $type_cry,
                            $value_cry->crcy_code,
                            $value_cry->default_price,
                            $value_cry->default_dscnt_price,
                            $value_cry->extra_bed_price
                          );
                           array_push($txt_cry,$type_cry);  
                    }    
                    if($p_room_id!=""){$type_comd="UP";$disstr="Update";}else{$disstr="Add New";}
           
            ?>
<?php if($chk_hotel_id!=""){?>
          <div class="row" style="padding:15px;">
            <div class="col-sm-12">











              <div class="card-box">
<input type="hidden" id="typ" value="<?php echo$type_comd?>">
<input type="hidden" id="val_hotel_id" name="val_hotel_id" value="<?php echo$chk_hotel_id?>">
<input type="hidden" id="val_room_id" name="val_room_id" value="<?php echo$p_room_id?>">
<input type="hidden" id="val_pulis" name="val_pulis" value="<?php echo$p_published_status?>">
<input type="hidden" id="val_book" name="val_book" value="<?php echo$p_booking_status?>">
<div class="card-body row">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Rooms Data&nbsp;:&nbsp;</font><font style="font-size: 18px;color:#0a69b3;"><?php echo$get_typ?></font>
</div>
                        <div class="col-lg-6 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_room_title; ?>" type = "text" id = "room_title" name="room_title">
                               <label class = "mdl-textfield__label">Room Title</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_default_quota; ?>" type = "text" id = "default_quota" name="default_quota">
                               <label class = "mdl-textfield__label">Quota Limit</label>
                            </div>
                        </div>
                         <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_max_extra_bed; ?>" type = "text" id = "max_extra_bed" name="max_extra_bed">
                               <label class = "mdl-textfield__label">Max extra bed</label>
                            </div>
                       </div>    
                       <div class="col-lg-3 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="published_status"  value="<?php echo$p_published_status?>" readonly tabIndex="-1">
                            <label for="published_status" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="published_status" class="mdl-textfield__label">Published status</label>
                            <ul data-mdl-for="published_status" id="get_pulis" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="Y">YES</li>
                                <li class="mdl-menu__item" id="N">NO</li>
                            </ul>
                        </div>
                       </div>    
                       <div class="col-lg-3 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="booking_status"  value="<?php echo$p_booking_status?>" readonly tabIndex="-1">
                            <label for="booking_status" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="booking_status" class="mdl-textfield__label">Booking status</label>
                            <ul data-mdl-for="booking_status" id="get_book" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="Y">YES</li>
                                <li class="mdl-menu__item" id="N">NO</li>
                            </ul>
                        </div>
                     </div>    
<!---------- Rooom Price ---------------------------------------------------------->
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;">
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Rooms Default Price&nbsp;&nbsp;</font><font style="font-size: 18px;color:#0a69b3;"></font>
</div>
   <div class="col-md-12 col-sm-12" style="padding:0px!important">
      <div class="panel tab-border ">
    <header class="panel-heading panel-heading-gray custom-tab ">
    <ul class="nav nav-tabs">        
      <?php $i=0;
        foreach($get_crcy_code as $cry_val){$i++;
          $actab="";$txt_color="color:#000000;";
          $name_tab = $cry_val->fld_valu;
          $name_dis = $cry_val->fld_valu_desc;
        if($name_tab=="USD"){$txt_color="color:#00b2c5;";}
        if($i==1){$actab = "class='active'";}
      ?>
     <li class="nav-item"><a href="#<?php echo$name_tab?>" style="<?php echo $txt_color?>" data-toggle="tab" <?php echo$actab?>><?php echo$name_dis?> (<?php echo $name_tab?>)</a></li>
      <?php } ?>
    </ul>
    </header>
 <div class="panel-body">
<div class="tab-content">
 <?php $j=0;
     foreach($get_crcy_code as $cry_val_text){$j++;
         $actab="";
         $name_tab = $cry_val_text->fld_valu;
         $lglow = strtolower($name_tab);
         if($j==1){$actab = "active";}
                     for($lg=0;$lg<(count($txt_cry));$lg++){
                        if(isset($txt_cry[$lg][1]) && ($txt_cry[$lg][0]==$name_tab)){
                          $cry_txt =  $txt_cry[$lg][0];// Static Lang TAB
                          $p_default_price =  $txt_cry[$lg][1];
                          $p_default_dscnt_price =  $txt_cry[$lg][2];
                          $p_extra_bed_price =  $txt_cry[$lg][3];
                         }
                     }
 ?>
  <div class="tab-pane <?php echo $actab?>" id="<?php echo$name_tab?>">                                     
    <!-- start page content -->
          <div class="row">
            <div class="col-sm-12">
              <div class="">
                <div class="card-body row">
                        <div class="col-lg-6 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo$p_default_price; ?>" type = "text" id = "default_price_<?php echo$lglow?>" name="default_price_<?php echo$lglow?>">
                               <label class = "mdl-textfield__label">Default Price</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo$p_default_dscnt_price; ?>" type = "text" id = "dscnt_price_<?php echo$lglow?>" name="dscnt_price_<?php echo$lglow?>">
                               <label class = "mdl-textfield__label">Default discount price </label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" value="<?php echo$p_extra_bed_price; ?>" type = "text" id = "extra_bed_price_<?php echo$lglow?>" name="extra_bed_price_<?php echo$lglow?>">
                            <label class = "mdl-textfield__label">Extra bed price </label>
                            </div>
                        </div>
             
</div></div></div></div></div>
<?php }?>
</div></div></div></div>







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
                  $itab=-1;$lang_q=array();
                  $room_name="";
                  $room_desc="";
                  $room_long_desc="";
                  foreach($results_lang as $value_bx){$itab++;
                        $actab="";
                        $naem_lang = $value_bx->fld_valu_desc;
                        $fld_valu = $value_bx->fld_valu;
                        if($itab==0){$actab = "active";}
                          $room_fld_nm = "";
                          $room_fld_desc = "";


                        for($lg=0;$lg<(count($txt_lang));$lg++){
                        if(isset($txt_lang[$lg][1]) && ($txt_lang[$lg][0]==$fld_valu)){
                          $lang_txt =  $txt_lang[$lg][0];// Static Lang TAB
                          $room_fld_nm =  $txt_lang[$lg][1];
                          $room_fld_desc =  $txt_lang[$lg][2];
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
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Room Details <?php echo $naem_lang ?></font>
</div>
                          <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo$room_fld_nm?>" type = "text" name="room_fld_nm_<?php echo $fld_valu?>" id="room_fld_nm_<?php echo $fld_valu?>">
                               <label class = "mdl-textfield__label">Room name</label>
                            </div>
                        </div>
                          <div class="col-lg-12 p-t-5"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "3" 
                                 name="room_fld_desc_<?php echo $fld_valu?>" id = "room_fld_desc_<?php echo $fld_valu?>" ><?php echo$room_fld_desc?></textarea>
                               <label class = "mdl-textfield__label" for = "text7">Room Desc</label>
                            </div>
                       </div>
      <!--
                          <div class="col-lg-12 p-t-5"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "3" 
                                  name="long_desc_<?php //echo $fld_valu?>" id = "long_desc_<?php //echo $fld_valu?>" ><?php echo$room_fld_desc?></textarea>
                               <label class = "mdl-textfield__label" for = "text7">Long Desc</label>
                            </div>
                       </div>
     -->
                       <div class="col-lg-12 p-t-10 text-center"> 
                            <button type="button" onclick="submit_data()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>
                </div>
                     </div>
                         </div>
                             </div> 
   <!-- end page content -->
                                        </div>
   <?php } ?>

                                  </div>
                              </div>
                          </div>
                      </div>
   






<!---------------------- Add Features ---------------------------------------------->
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
    <font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Hotel Features&nbsp;&nbsp;</font><font style="font-size: 18px;color:#0a69b3;"></font>
</div>
<div id="show_icon"></div>
         </div>
      </div>
   </div>
</div>
   <div class="row" style="padding:15px;">
     <div class="col-sm-12">
         <div class="card-box">
<div class="card-body row">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Rooms Image Upload</font>
</div>
                          <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">         
<!-------------UPLOAD FILE------------------->
<table><tr><td valign="top">
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
<!-------------- END UPLOAD------------------->
<!-------------- Show File Of database Last Upload ----->
<div id="tbd_room">&nbsp;</div>
<!------------------------------------------------------>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


    <?php }else{?>
<br><br>
   <div style="font-size: 35px"><center>Hotel Information not available
    <br><br>
   <br> <a href="<?php echo$pthc?>HotelDetail"><div class="fileUpload btn btn-primary">Click To Page </div></a></center></div>
<br><br>


  <?php }?>
               </form>
</div>
<!-------------------------Add Script Command ----------------------------->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
  <script type="text/javascript">

 $("#get_pulis li").click(function() {
    $("#val_pulis").val(this.id);
});

  $("#get_book li").click(function() {
    $("#val_book").val(this.id);
});

publ(numreve($('#published_status').val()));
book(numreve($('#booking_status').val()));
function numreve(n){
    if(n=="Y"){return 0;}
    else if(n=="N"){return 1;}
    else{return -1;}
}
function publ(lid){
  if(lid!=-1){
    $("#published_status").val($("#get_pulis li")[lid].textContent);
  }
}
function book(lid){
  if(lid!=-1){
    $("#booking_status").val($("#get_book li")[lid].textContent);
  }
}





function submit_data(){
var formdata = $('#form_room').serialize();
var send_commnd = $('#typ').val();
var hotel_id = $('#val_hotel_id').val();
//alert(formdata);
    $.post("<?php echo base_url('RoomManage/Do_insert_And_Update_room')?>", 
      {formdata: formdata,send_commnd: send_commnd},
       function(result){
       if(result!=0){
        show_msg('บันทึกข้อมูลสำเร็จแล้ว',1,2000);
      }else{
        show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
      }
    },'json');

  }
function re_deley(link,relay){
   setTimeout(function () {
       window.location.href = link; //will redirect to your blog page (an ex: blog.html)
    }, relay); //will call the function after 2 secs.

}

//------------------------------------------------------------------UPLOAD IMAGE-----------------------------------------------------
  var selDiv = "";
  var storedFiles=[];
  var storedVal=[];
  var btbn =0;
  $(document).ready(function() {
    $("#files").on("change", handleFileSelect);
    $("#form_room").on("click",".saveImage",handleForm);
    $("#form_room").on("click",".selFile",removeFile);
    $("#form_room").on("click",".clsimage",clsimage_all);
    showTableImg($('#val_hotel_id').val(),$('#val_room_id').val());
    reset_icon();
   
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

function show_msg(txtdata,idtyp,relay){
  var txttyp = "";
  if(idtyp==1){txttyp="success";}
  if(idtyp==2){txttyp="warning";}
               $.toast({
              heading: txtdata,
              text: '',
              position: 'mid-center',
              loaderBg: '#da8609',
              icon: txttyp,
              hideAfter: relay,
              stack: 0
            });
}
//---------------------------------------------------------------------------------------------------------------------------
function handleForm(e){
    if(btbn>7000000){
         show_msg("no uploaded File Maximum 8.MB",2)
    }else{
    if(storedVal.length<1){
         show_msg("Not select File Image",2)
    }else{
 		var hotel_id = $('#val_hotel_id').val();
 		var room_id = $('#val_room_id').val();
 		var formdata = $('#form_room').serialize();
 		var send_commnd = $('#typ').val();
    $.post("<?php echo base_url('RoomManage/Do_inser_image')?>", 
      {formdata: formdata,send_commnd: send_commnd,storedVal: storedVal,room_id:room_id,hotel_id:hotel_id},
        function(result){
       if(result!=0){
            show_msg('บันทึกข้อมูลสำเร็จแล้ว',1,2000);   
            clsimage_all();
            showTableImg(hotel_id,room_id);
        if(send_commnd=="ADD"){
           re_deley("RoomManage?room_id="+result+"&hotel_id="+hotel_id,2000);
        }
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


function set_icon(id_icon){
     var room_id=$('#val_room_id').val();
     $.post("<?php echo base_url('RoomManage/Do_update_icon')?>", 
      {id_icon: id_icon,room_id:room_id},
       function(result){
       if(result!=0){
              reset_icon();
      }else{
        show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
      }
    },'json');
  }


function set_true_icon(id_valu,sty){
var p1 = $('#val_room_id').val();
 $.post("<?php echo base_url('RoomManage/Do_set_true_icon')?>", 
      {id_valu:id_valu,room_id:p1,sty:sty},
        function(result){
       if(result=='1'){
             show_msg("Enable Show success",1,600);
             reset_icon();
      }else{
             show_msg("Not Set Enable !",2,600); 
      }
    },'json');
}


// Show Imag Table
function reset_icon(){
var p1 = $('#val_room_id').val();
$.ajax({
                    url: "<?php echo base_url('RoomManage/DoShow_icon')?>",
                    type: "POST",
                    data: ({room_id:p1}),
                    dataType: "json",
              success:function(data) {
              $("#show_icon").empty();
              var idnum = 0; var tr = "";
tr =tr+ "<div class='row' style='margin-top: 15px;'>";
$.each(data, function(key, value) {idnum++;
  var ch_class = value.room_feature_hilight;
  var txt_yes_no = "";
  if(ch_class!=null){txt_class ="row_ling_fix";txt_icon="border_icon_fix"
                      txt_yes_no="<div class='border_icon_fix_gra'><li class='fa fa-ban'></li></div>";
    if(ch_class=='Y'){txt_yes_no="<div class='border_icon_fix_orang'><li class='fa fa-check'></li></div>";}
  }else{txt_class="row_ling";txt_icon="border_icon"}
  tr=tr +
    "<div class='col-md-3'>"+
    "<div class='"+txt_class+"'>"+
            "<table style='width:100%'><tr valign='top' style='cursor:pointer'><td style='width:10%' onclick=set_icon('"+value.fld_valu+"')>"+
            "<div class='"+txt_icon+"'><i class='"+value.field1+"'></i></div>"+
            "</td><td align='left'  onclick=set_icon('"+value.fld_valu+"')>"+value.fld_valu_desc+"</td><td style='width:10%' onclick=set_true_icon('"+value.fld_valu+"','"+ch_class+"')>"+txt_yes_no+"</td></tr></table>"+
    "</div>"+
  "</div>";    
 });
tr=tr+"</div>";
$('#show_icon').append(tr);
          }
     });
}


// Show Imag Table
function showTableImg(p1,p2){
 // alert("<?php echo base_url('RoomManage/DoShow_room')?>");
$.ajax({
                    url: "<?php echo base_url('RoomManage/DoShow_room')?>",
                    type: "POST",
                    data: ({hotel_id:p1,room_id:p2}),
                    dataType: "json",
              success:function(data) {
              $("#tbd_room").empty();
              var idnum = 0; var tr = "";
tr =tr+ "<div  class='row' style='padding: 10px;padding-top: 3px;width: 90%'>";
$.each(data, function(key, value) {
  idnum++; var bg_c = "btn-primary";var css_hidmain="hidmain2";
  if(value.img_main==1){bg_c="btn-success";css_hidmain="hidmain1";}
  tr=tr +
    "<div class='col-sm-2 cct4'>"+
    "<div class='cct3'>"+
    "<center>"+
       " <div style='position:absolute;z-index: 1000;'>"+
            "<div class='btn "+bg_c+" cct5' onclick='main_img("+value.id+","+value.room_id+","+p1+")'>Main</div>"+
           " <div class='btn btn-danger cct5 "+css_hidmain+"' onclick='del_img("+value.id+","+value.room_id+","+p1+")'>Delete</div>"+
         "</div>"+
        "<img src='"+value.img_nm+"' class='cct6'>"+
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
function del_img(idrun,room_id,hotel_id){
    $.post("<?php echo base_url('RoomManage/Do_delete_image')?>", 
      {idrun:idrun,room_id:room_id,hotel_id:hotel_id},
        function(result){
       if(result=='1'){
        show_msg("ลบข้อมูลสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(hotel_id,room_id);
      }else{
        show_msg("ไม่สามารถลบข้อมูลได้",2); 
      }
    },'json');
  }


//------------------------- Delete Img-------------------------
function main_img(idrun,room_id,hotel_id){
    $.post("<?php echo base_url('RoomManage/Do_main_img')?>", 
      {idrun:idrun,room_id:room_id,hotel_id:hotel_id},
        function(result){
       if(result=='1'){
           show_msg("กำหนดรูปหลักสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(hotel_id,room_id);
      }else{
           show_msg("ไม่สามารถกำหนดข้อมูลได้",2);
      }
    },'json');
  }





// ---------------------- insert Form Data------------------------------






</script>


<!--------------------End Script Command----------------------------->