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
<?php if($chk_hotel_id!=""){?>
<div style="margin-top:8vw;" >     
<form id="form_hotel" class="form-horizontal">   
            <?php  
            $type_comd = "ADD";
            $p_hotel_id="";
            $p_client_id="";$p_hotel_phone="";$p_booking_email="";
            $p_hotel_map_url="";$p_province_id="";$p_country_id="";
            $p_key_words="";$p_hotel_grade="";
            $dis_cty="";$dis_prov="";
            $txt_lang=array();
                    foreach($get_update_hotel as $value_hotel){
                        $a_lang=  array();
                            $p_hotel_id = $value_hotel->hotel_idrun;
                            $p_client_id =$value_hotel->client_id;
                            $p_hotel_phone =$value_hotel->hotel_phone;
                            $p_booking_email =$value_hotel->booking_email;
                            $p_hotel_map_url =$value_hotel->hotel_map_url;
                            $p_province_id =$value_hotel->province_id;
                            $p_country_id =$value_hotel->country_id;
                            $p_key_words =$value_hotel->key_words;
                            $p_hotel_grade =$value_hotel->hotel_grade;  
                           $dis_cty = $value_hotel->country_nm;
                           $dis_prov = $value_hotel->province_nm;
                           array_push(
                            $a_lang,$value_hotel->lang,
                            $value_hotel->hotel_nm,
                            $value_hotel->short_desc,
                            $value_hotel->long_desc
                          );
                           array_push($txt_lang,$a_lang);  
                    } 

            $txt_addr_lang=array();
                    foreach($get_address_hotel as $value_address){
                        $address_lang=  array();
                           array_push(
                            $address_lang,$value_address->lang,
                            $value_address->hotel_addr,
                            $value_address->addr_subdistrict
                          );
                           array_push($txt_addr_lang,$address_lang);  
                    }      
                    if($p_hotel_id!=""){$type_comd="UP";}

                   
            ?>



          <div class="row" style="padding:15px;">
            <div class="col-sm-12">
              <div class="card-box">
                <div class="card-body row">

<input type="hidden" id="val_country_id" name="val_country_id" value="<?php echo $p_country_id?>">
<input type="hidden" id="val_province_id" name="val_province_id" value="<?php echo $p_province_id?>">
<input type="hidden" id="val_grade" name="val_grade" value="<?php echo $p_hotel_grade?>">
<input type="hidden" id="typ" value="<?php echo$type_comd?>">
<input type="hidden" id="val_hotel_id" name="val_hotel_id" value="<?php echo$p_hotel_id?>">

<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Hotel Data Profile</font>
</div>

                        <div class="col-lg-6 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_hotel_phone; ?>" type = "text" id = "hotel_phone" name="hotel_phone">
                               <label class = "mdl-textfield__label">Hotel Phone</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_booking_email; ?>" type = "text" id = "booking_email" name="booking_email">
                               <label class = "mdl-textfield__label">Booking Email</label>
                            </div>
                        </div>
                         <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_hotel_map_url; ?>" type = "text" id = "hotel_map_url" name="hotel_map_url">
                               <label class = "mdl-textfield__label">Hotel Map URL</label>
                            </div>
                        </div>      
                      <div class="col-lg-6 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="country_id"  value="<?php echo $dis_cty?>"  readonly tabIndex="-1">
                            <label for="country_id" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="country_id" class="mdl-textfield__label">Country</label>
                            <ul data-mdl-for="country_id" id="get_country" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <?php  
                         foreach($results_country as $value_cot){
                            $country_id = $value_cot->country_id;
                            $country_nm = $value_cot->country_nm;
                      ?>
                         <li class="mdl-menu__item" id ="<?php echo$country_id?>"><?php echo$country_nm?></li>
                      <?php } ?>
                            </ul>
                        </div>
                        </div>                                        
                        <div class="col-lg-6 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                          <input class="mdl-textfield__input" type="text" id="province_id"   value="<?php echo $dis_prov?>" readonly tabIndex="-1">
                            <label class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label class="mdl-textfield__label">Province</label>
                            <ul data-mdl-for="province_id"  id="get_province" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <?php  
                         foreach($results_province as $value_pro){
                            $province_id = $value_pro->province_id;
                            $province = $value_pro->province_nm;
                      ?>
                         <li class="mdl-menu__item" id="<?php echo$province_id?>"><?php echo$province?></li>
                      <?php } ?>
                            </ul>
                        </div>
                        </div>
                        <div class="col-lg-6 p-t-10">
                           <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo $p_key_words; ?>" type = "text" name="key_words"
                                  id = "key_word">
                               <label class = "mdl-textfield__label" for = "key_word">Key Words</label>
                               <span class = "mdl-textfield__error">Number required!</span>
                            </div>
                         </div>
                       <div class="col-lg-6 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="hotel_grade"  value="" readonly tabIndex="-1">
                            <label for="hotel_grade" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="hotel_grade" class="mdl-textfield__label">Hotel Grade</label>
                            <ul data-mdl-for="hotel_grade" id="get_grade" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="1">Grade 1 <font color='f55e0c' size='4px;'>&#9733;</font> </li>
                                <li class="mdl-menu__item" id="2">Grade 2 <font color='f55e0c' size='4px;'>&#9733;&#9733;  </font></li>
                                <li class="mdl-menu__item" id="3">Grade 3 <font color='f55e0c' size='4px;'>&#9733;&#9733;&#9733; </font> </li>
                                <li class="mdl-menu__item" id="4">Grade 4 <font color='f55e0c' size='4px;'>&#9733;&#9733;&#9733;&#9733;</font>  </li>
                                <li class="mdl-menu__item" id="5">Grade 5 <font color='f55e0c' size='4px;'>&#9733;&#9733;&#9733;&#9733;&#9733;</font>  </li>
                            </ul>
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



<!-------------UPLOAD FILE------------------->

  <div class="row" style="padding:15px;">
     <div class="col-sm-12">
         <div class="card-box">
<div class="card-body row">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Hotel Image Upload</font>
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
                        $hotel_name = "";
                        $short_desc = "";
                        $long_desc = "";
                        $hotel_addr="";
                        $addr_subdistrict="";

                        for($lg=0;$lg<(count($txt_lang));$lg++){
                        if(isset($txt_lang[$lg][1])  && ($txt_lang[$lg][0]==$fld_valu)){
                        $lang_txt =  $txt_lang[$lg][0];
                        $hotel_name =  $txt_lang[$lg][1];
                        $short_desc =  $txt_lang[$lg][2];
                        $long_desc =  $txt_lang[$lg][3];
                        $hotel_addr=$txt_addr_lang[$lg][1];
                        $addr_subdistrict=$txt_addr_lang[$lg][2];
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
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Hotel Details <?php echo $naem_lang ?></font>
</div>
  

                        <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo$hotel_name?>" type = "text" name="hotel_nm_<?php echo $fld_valu?>" id="hotel_nm_<?php echo $fld_valu?>">
                               <label class = "mdl-textfield__label">Hotel name</label>
                            </div>
                        </div>
                        
                               <div class="col-lg-12 p-t-5"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "3" 
                                 name="short_desc_<?php echo $fld_valu?>" id = "short_desc_<?php echo $fld_valu?>" ><?php echo$short_desc?></textarea>
                               <label class = "mdl-textfield__label" for = "text7">Short Desc</label>
                            </div>
                       </div>

                          <div class="col-lg-12 p-t-5"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "3" 
                                  name="long_desc_<?php echo $fld_valu?>" id = "long_desc_<?php echo $fld_valu?>" ><?php echo$long_desc?></textarea>
                               <label class = "mdl-textfield__label" for = "text7">Long Desc</label>
                            </div>
                       </div>




<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Hotel Address <?php echo $naem_lang ?></font>
</div>
  
                               <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "3" 
                                  id = "hotel_addr_<?php echo $fld_valu?>" name="hotel_addr_<?php echo $fld_valu?>"><?php echo$hotel_addr?></textarea>
                               <label class = "mdl-textfield__label" for = "hotel_addr<?php echo $fld_valu?>">Hotel Address</label>
                            </div>
                       </div>


                                                    <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "3" 
                                  id = "addr_subdistrict_<?php echo $fld_valu?>" name="addr_subdistrict_<?php echo $fld_valu?>"><?php echo$addr_subdistrict?></textarea>
                               <label class = "mdl-textfield__label" for = "addr_subdistrict<?php echo $fld_valu?>">Hotel Subdistrict </label>
                            </div>
                       </div>



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
                   </div>
               </form>
</div>
<!-------------------------Add Script Command ----------------------------->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>

  <script type="text/javascript">

 $("#get_country li").click(function() {
    $("#val_country_id").val(this.id);
});

 $("#get_province li").click(function() {
    $("#val_province_id").val(this.id);
});

 $("#get_grade li").click(function() {
    $("#val_grade").val(this.id);
});

pageLoad(<?php echo($p_hotel_grade-1)?>);
function pageLoad(lid){
  if(lid!=-1){
    $("#hotel_grade").val($("#get_grade li")[lid].textContent);
  }
}

function submit_data(){
var formdata = $('#form_hotel').serialize();
var send_commnd = $('#typ').val();
    $.post("<?php echo base_url('HotelDetail/Do_insert_And_Update_hotel')?>", 
      {formdata: formdata,send_commnd: send_commnd},
       function(result){
       if(result!=0){
        show_msg('บันทึกข้อมูลสำเร็จแล้ว',1);
        if(send_commnd=="ADD"){$('#typ').val('UP');$('#val_hotel_id').val(result);hotel_id=result;}
              clsimage_all();
              showTableImg(hotel_id);
      }else{
        show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
      }
    },'json');

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
  $(document).ready(function() {

    $("#files").on("change", handleFileSelect);
    $("#form_hotel").on("click",".saveImage",handleForm);
    $("#form_hotel").on("click",".selFile",removeFile);
    $("#form_hotel").on("click",".clsimage",clsimage_all);
    showTableImg($('#val_hotel_id').val());
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

//---------------------------------------------------------------------------------------------------------------------------
function handleForm(e){
    if(btbn>7000000){
         show_msg("no uploaded File Maximum 8.MB",2)
    }else{
    if(storedVal.length<1){
         show_msg("Not select File Image",2)
    }else{
    var hotel_id = $('#val_hotel_id').val();
    var formdata = $('#form_hotel').serialize();
    var send_commnd = $('#typ').val();

    $.post("<?php echo base_url('HotelDetail/Do_inser_image')?>", 
      {formdata: formdata,send_commnd: send_commnd,storedVal: storedVal,hotel_id:hotel_id},
        function(result){
       if(result!=0){
        show_msg("บันทึกข้อมูลสำเร็จแล้ว",1);
        if(send_commnd=="ADD"){$('#typ').val('UP');$('#val_hotel_id').val(result);hotel_id=result;}
              clsimage_all();
              showTableImg(hotel_id);
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
  }else{txt_class="row_ling";txt_icon="border_icon"}
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
                    url: "<?php echo base_url('HotelDetail/DoShow_Hotel')?>",
                    type: "POST",
                    data: ({hotel_id:p1}),
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
            "<div class='btn "+bg_c+" cct5' onclick='main_img("+value.id+","+value.hotel_id+")'>Main</div>"+
           " <div class='btn btn-danger cct5 "+css_hidmain+"' onclick='del_img("+value.id+","+value.hotel_id+")'>Delete</div>"+
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
function del_img(idrun,hotel_id){
    $.post("<?php echo base_url('HotelDetail/Do_delete_image')?>", 
      {idrun:idrun,hotel_id:hotel_id},
        function(result){
       if(result=='1'){
        show_msg("ลบข้อมูลสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(hotel_id);
      }else{
        show_msg("ไม่สามารถลบข้อมูลได้",2); 
      }
    },'json');
  }


//------------------------- Delete Img-------------------------
function main_img(idrun,hotel_id){
    $.post("<?php echo base_url('HotelDetail/Do_main_img')?>", 
      {idrun:idrun,hotel_id:hotel_id},
        function(result){
       if(result=='1'){
           show_msg("กำหนดรูปหลักสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(hotel_id);
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