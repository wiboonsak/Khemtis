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
.def_proof{
  border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;
}
.def_proof_ch{
  border:0px;border-width:1px;border-style: solid;border-color:#da8982;color:#ffffff;padding-bottom:5px;border-radius:5px;background-color:#eabcb8;
}

</style>
<!----------------------------->
<?php if($chk_hotel_id!=""){?>
<div style="margin-top:8vw;" >    

<form id="form_hotel" class="form-horizontal">   
<?php  
            $txt_bar_proff = "";
            $txt_bt_proof = "";
            $idst = 0;
            $admin_proof = $this->session->userdata('hotel_admin_full_name');
            if($admin_proof==""){$txt_bar_proff='def_proof';$idst = 0;}else{$txt_bar_proff='def_proof_ch';$txt_bt_proof="<button type=\"button\" class=\"btn btn-danger\" style='width:200px;'>APROOF DATA</button>";$idst = 1;}

            $type_comd = "ADD";
            $p_hotel_id="";
            $p_client_id="";$p_hotel_phone="";$p_booking_email="";
            $p_hotel_map_url="";$p_province_id="";$p_country_id="";
            $p_key_words="";$p_hotel_grade="";
            $dis_cty="";$dis_prov="";
            $get_lat = "13.102218";
            $get_lng = "100.298768";
            $vlp_txt_policy = '';
            $get_type = "";
            $txt_lang=array();

    $st_draff1 = 0;
    $st_draff2 = 0;
    $st_draff3 = 0;
    $st_draff4 = 0;

    $st_ad_drf1 = 0;
    $st_ad_drf2 = 0;

                    foreach($get_update_hotel as $value_hotel){
                            $p_hotel_id = $value_hotel->hotel_idrun;
                            $p_client_id =$value_hotel->client_id;
                            $p_hotel_phone =$value_hotel->hotel_phone;
                            $p_booking_email =$value_hotel->booking_email;
                            $p_hotel_map_url =$value_hotel->hotel_map_url;
                            $p_province_id =$value_hotel->province_id;
                            $p_country_id =$value_hotel->country_id;
                            $p_key_words =$value_hotel->key_words;
                            $p_hotel_grade =$value_hotel->hotel_grade;  
   $get_lat =$value_hotel->h_lat;
   $get_lng =$value_hotel->h_lng;
   $get_type = $value_hotel->hotel_typ;
                           $dis_cty = $value_hotel->country_nm;
                           $dis_prov = $value_hotel->province_nm;


                             $vlp_hotel_nam =  $value_hotel->hotel_nm;
                             $vlp_short_desc = $value_hotel->short_desc;
                             $vlp_long_desc = $value_hotel->long_desc;
                             $vlp_txt_policy = $value_hotel->txt_policy;

                             $vlp_st1 = $value_hotel->hotel_nm_stat_chng;
                             $vlp_st2 = $value_hotel->short_desc_stat_chng;
                             $vlp_st3 = $value_hotel->long_desc_stat_chng;

                         
                           if($vlp_st1=="P"){
                             $vlp_hotel_nam =  $value_hotel->hotel_nm_draft;
                             $st_draff1 = 1;
                           }
                           if($vlp_st2=="P"){
                             $vlp_short_desc = $value_hotel->short_desc_draft;
                             $st_draff2 = 1;
                           }
                           if($vlp_st3=="P"){
                             $vlp_long_desc = $value_hotel->long_desc_draft;
                             $st_draff3 = 1;

                             $vlp_txt_policy = $value_hotel->txt_policy_draft;
                             $st_draff4 = 1;
                           }

                           $a_lang=  array();
                           array_push(
                            $a_lang,
                            $value_hotel->lang,
                            $vlp_hotel_nam,
                            $vlp_short_desc,
                            $vlp_long_desc,
                            $vlp_txt_policy,
                            $vlp_st1
                          );
                           array_push($txt_lang,$a_lang);  
                    } 

                    $txt_addr_lang=array();
                    foreach($get_address_hotel as $value_address){
                             $vlp_hotel_addr =  $value_address->hotel_addr;
                             $vlp_addr_subdistrict = $value_address->addr_subdistrict;
                             $vlp_st1 = $value_address->hotel_addr_ch;
                             $vlp_st2 = $value_address->addr_subdistrict_ch;
                         
                           if($vlp_st1=="P"){
                             $vlp_hotel_addr =  $value_address->hotel_addr_draf;
                             $st_ad_drf1 = 1;
                           }
                           if($vlp_st2=="P"){
                             $vlp_addr_subdistrict = $value_address->addr_subdistrict_draf;
                             $st_ad_drf2 = 1;
                           }

                           $address_lang=  array();
                           array_push(
                            $address_lang,$value_address->lang,
                            $vlp_hotel_addr,
                            $vlp_addr_subdistrict
                          );
                           array_push($txt_addr_lang,$address_lang);  
                    }      
                    if($p_hotel_id!=""){$type_comd="UP";}
if($get_lat==""){$get_lat = "13.102218";}
if($get_lng==""){$get_lng = "100.298768";}    
            ?>

       <div class="row" style="padding:15px;">
            <div class="col-sm-12">
            <div class="card-box">
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
                         $txt_policy  = "";

                        for($lg=0;$lg<(count($txt_lang));$lg++){
                        if(isset($txt_lang[$lg][1])  && ($txt_lang[$lg][0]==$fld_valu)){
                        $lang_txt =  $txt_lang[$lg][0];
                        $hotel_name =  $txt_lang[$lg][1];
                        $short_desc =  $txt_lang[$lg][2];
                        $long_desc =  $txt_lang[$lg][3];
                        $hotel_addr=$txt_addr_lang[$lg][1];
                        $addr_subdistrict=$txt_addr_lang[$lg][2];
                        $txt_policy = $txt_lang[$lg][4];
                        $st_df = $txt_lang[$lg][5];
                       }
                      }
    ?>
    <div class="tab-pane <?php echo $actab?>" id="<?php echo $fld_valu?>">
                                        
<!-- start page content -->

          <div class="row">
            <div class="col-sm-12">
              <div class="card-box">
                <div class="card-body row">

<div class="col-lg-12 p-t-10 <?php echo$txt_bar_proff?>"> 
 
  <input type="hidden" name="old_hotel_nm_<?php echo $fld_valu?>" id="" value="<?php echo$hotel_name?>">
  <input type="hidden" name="old_short_desc_<?php echo $fld_valu?>" id="" value="<?php echo$short_desc?>">
  <input type="hidden" name="old_long_desc_<?php echo $fld_valu?>" id="" value="<?php echo$long_desc?>">

    <font style="font-size: 18px;font-weight: bold;">Hotel Details <?php echo $naem_lang?></font>
    <b><font color="red"><?php if($st_draff1){echo "<i class='fa fa-exclamation-triangle' aria-hidden='true' style='float:right;font-size: 15px;'>  Waiting to check from the staff !</i>";}?></font></b>
 
</div>

                          <div class="col-lg-12 p-t-10"> 
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="<?php echo$hotel_name?>" type = "text" name="hotel_nm_<?php echo $fld_valu?>" id="hotel_nm_<?php echo $fld_valu?>">
                               <label class = "mdl-textfield__label">Hotel name</label>
                            </div>
                          </div>
                        
                               <div class="col-lg-12 p-t-5"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "5" 
                                 name="short_desc_<?php echo $fld_valu?>" id = "short_desc_<?php echo $fld_valu?>"><?php echo$short_desc?></textarea>
                               <label class = "mdl-textfield__label" for = "text7">Short Desc</label>
                            </div>
                          </div>

                          <div class="col-lg-12 p-t-5"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "5" 
                                  name="long_desc_<?php echo $fld_valu?>" id = "long_desc_<?php echo $fld_valu?>"><?php echo$long_desc?></textarea>
                               <label class = "mdl-textfield__label" for = "text7">Long Desc</label>
                            </div>
                       </div>


<div class="col-lg-12 p-t-10 <?php echo$txt_bar_proff?>"> 
  <input type="hidden" name="old_hotel_addr_<?php echo $fld_valu?>" id="" value="<?php echo$hotel_addr?>">
  <input type="hidden" name="old_addr_subdistrict_<?php echo $fld_valu?>" id="" value="<?php echo$addr_subdistrict?>">
      <font style="font-size: 18px;font-weight: bold;">Hotel Address <?php echo $naem_lang ?></font>
      <b><font color="red"><?php if($st_ad_drf1){echo "<i class='fa fa-exclamation-triangle' aria-hidden='true' style='float:right;font-size: 15px;'>  Waiting to check from the staff !</i>";}?></font></b>
      
</div>
  
                       <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "5" 
                                  id = "hotel_addr_<?php echo $fld_valu?>" name="hotel_addr_<?php echo $fld_valu?>"><?php echo$hotel_addr?></textarea>
                               <label class = "mdl-textfield__label" for = "hotel_addr<?php echo $fld_valu?>">Hotel Address</label>
                            </div>
                       </div>

                       <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                               <textarea class = "mdl-textfield__input" rows =  "5" 
                                  id = "addr_subdistrict_<?php echo $fld_valu?>" name="addr_subdistrict_<?php echo $fld_valu?>"><?php echo$addr_subdistrict?></textarea>
                               <label class = "mdl-textfield__label" for = "addr_subdistrict<?php echo $fld_valu?>">Hotel Subdistrict </label>
                            </div>
                       </div>






<div class="col-lg-12 p-t-10 <?php echo$txt_bar_proff?>"> 
  <input type="hidden" name="old_val_short_policy_<?php echo $fld_valu?>" id="old_val_short_policy_<?php echo $fld_valu?>" value="">
  <font style="font-size: 18px;font-weight: bold;">Hotel Policy <?php echo $naem_lang ?></font>
  <b><font color="red"><?php if($st_draff1){echo "<i class='fa fa-exclamation-triangle' aria-hidden='true' style='float:right;font-size: 15px;'>  Waiting to check from the staff !</i>";}?></font></b>

</div>
  
                          <div class="col-lg-12 p-t-10"> 
                                  <label class = "mdl-textfield__label" style="margin-left:15px;">Package Policy</label><br>
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <textarea class = "mdl-textfield__input ex" style="background-color:#ffffff" rows =  "5" 
                                 name="short_policy_<?php echo $fld_valu?>" id = "short_policy_<?php echo $fld_valu?>" ><?php echo$txt_policy?></textarea>
                               <input type="hidden" value="" name="val_short_policy_<?php echo $fld_valu?>" id="val_short_policy_<?php echo $fld_valu?>">
                              <!-- <label class = "mdl-textfield__label" for = "text7">Package Desc</label>-->
                            </div>
                       </div>





<div class="col-lg-12 p-t-10 def_proof"> 
  <font style="font-size: 18px;font-weight: bold;">Hotel Location travel <?php echo $naem_lang ?></font>
</div>
  
                       <div class="col-lg-12 p-t-10"> 
                       	<div class="row" >
                          <div class="col-md-3">
  <div class="form-group">
    <label for="exampleFormControlInput1">Name Place</label>
    <input type="text" class="form-control" id="name_location_<?php echo $fld_valu ?>" placeholder="">
  </div>
                          </div>
    <div class="col-md-3">
  <div class="form-group">
    <label for="exampleFormControlInput1">Distance</label>
    <input type="text" class="form-control" id="number_distance_<?php echo $fld_valu ?>" placeholder="0">
  </div>
    </div>
      <div class="col-md-1">
  <div class="form-group">
    <label for="exampleFormControlInput1">&nbsp;</label>
    <select type="text" class="form-control" id="type_distance_<?php echo $fld_valu ?>">
     <option value="km">km</option>
     <option value="m">m</option>
    </select>
  </div>
    </div>      
 <div class="col-md-1">
  <div class="form-group">
    <label for="exampleFormControlInput1">&nbsp;</label>
    <button type="button" class="btn btn-primary form-control" onclick="add_hotel_travel()">ADD</button>
  </div>
    </div>          
  </div>                
  </div>


<div style="width:100%;height:auto;border-style: solid;border-width:1px;border-color:#cccccc;margin-left: 15px;">
    <div id="show_hotel_travel_<?php echo $fld_valu ?>"></div>
</div>

                </div>
                     </div>
                         </div>
                             </div> 
   <!-- end page content -->
                                        </div>
   <?php } ?>




                <div class="card-body row">

<input type="hidden">
<input type="hidden">
<input type="hidden">
<input type="hidden" id="typ" value="<?php echo$type_comd?>">
<input type="hidden" id="val_hotel_id" name="val_hotel_id" value="<?php echo$p_hotel_id?>">













<div class="col-lg-12 p-t-10 def_proof"> 
<font style="font-size: 18px;font-weight: bold;">Hotel Data Profile</font>
</div>



                       <div class="col-lg-6 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
          
    <font color="#a7a7a7">Accommodataion:&nbsp;</font>
    <label for="exampleFormControlInput1">&nbsp;</label>
    <select type="text" class="form-control" id="type_id" name="type_id" style="border-color:#e2e2e2!important;background-color:#ffffff">
      <?php $txt_type_ch=""; foreach ($get_tbl_hotel_type   as $value) {
         if($get_type == $value->idty){$txt_type_ch=" selected";}else{$txt_type_ch="";} 
      ?>
     <option value="<?php echo$value->idty?>" <?php echo$txt_type_ch ?>><?php echo$value->type_name?></option>
      <?php } ?>
    </select>
                        </div>
                     </div>      
     <div class="col-lg-6 p-t-10"> </div>


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
                         <div style="background-color:#e8e8e8;padding:5px;">
    Lng:<input type="text" id="get_lat" name="get_lat" value="<?php echo$get_lat?>">&nbsp;&nbsp;
    Lat:<input type="text" id="get_lng" name="get_lng" value="<?php echo$get_lng?>"></div>
                               <input class = "mdl-textfield__input" readonly value="<?php echo $p_hotel_map_url; ?>" type = "text" id = "hotel_map_url" name="hotel_map_url">
                               <label class = "mdl-textfield__label">Hotel Map URL</label>
                               <button class="btn btn-primary" type="button" onclick="add_map('<?php echo$get_lat?>','<?php echo$get_lng?>',<?php echo$chk_hotel_id;?>)">ADD MAP</button>
                            </div>
                        </div>      
                      <div class="col-lg-6 p-t-10"> 

    Country:&nbsp;
    <label for="exampleFormControlInput1">&nbsp;</label>
    <select type="text" class="form-control" id="val_country_id" name="val_country_id" style="border-color:#e2e2e2!important;background-color:#ffffff">
      <?php $txt_type_ch=""; foreach ($results_country   as $value_cot) {
         if($p_country_id == $value_cot->country_id){$txt_type_ch=" selected";}else{$txt_type_ch="";} 
      ?>
     <option value="<?php echo$value_cot->country_id?>" <?php echo$txt_type_ch ?>><?php echo$value_cot->country_nm?></option>
      <?php } ?>
    </select>


                 </div>                                        
                 <div class="col-lg-6 p-t-10"> 




   <font color="#a7a7a7"> Province:&nbsp;</font>
    <label for="exampleFormControlInput1">&nbsp;</label>
    <select type="text" class="form-control" id="val_province_id" name="val_province_id"  style="border-color:#e2e2e2!important;background-color:#ffffff">
      <?php $txt_type_ch=""; foreach ($results_province   as $value_pro) {
         if($p_province_id == $value_pro->province_id){$txt_type_ch=" selected";}else{$txt_type_ch="";} 
      ?>
     <option value="<?php echo$value_pro->province_id?>" <?php echo$txt_type_ch?>><?php echo$value_pro->province_nm?></option>
      <?php } ?>
    </select>

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


   <font color="#a7a7a7"> Grade:&nbsp;</font>
    <label for="exampleFormControlInput1">&nbsp;</label>
    <select type="text" class="form-control" id="val_grade" name="val_grade"  style="border-color:#e2e2e2!important;background-color:#ffffff;">
      <?php $txt_type_ch="";$g=0; for($g=1;$g<=5;$g++) {
         if($p_hotel_grade == $g){$txt_type_ch=" selected";}else{$txt_type_ch="";} 
      ?>
     <option value="<?php echo$g?>" <?php echo$txt_type_ch?>>Grade&nbsp;<?php echo$g?></option>
      <?php } ?>
    </select>


                       </div>     

                       <div style="height:50px!important;" class="col-lg-12"></div> 
                       <div class="col-lg-12 p-t-10 text-center" style="margin-bottom:45px;"> 
                            <button type="button" onclick="submit_data(<?php echo$idst?>)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                       <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>
<!---------------------- Add Features ---------------------------------------------->
<div class="col-lg-12 p-t-10 def_proof"> 
    <font style="font-size: 18px;font-weight: bold;">Hotel Features&nbsp;&nbsp;</font><font style="font-size: 18px;color:#0a69b3;"></font>
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
<div class="col-lg-12 p-t-10 def_proof"> 
<font style="font-size: 18px;font-weight: bold;">Hotel Image Upload</font>
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
           <center><?php echo$txt_bt_proof?></center>
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
  <script src="<?php echo $pthc ?>assets/plugins/tinymce/tinymce.min.js"></script>

<script type="text/javascript">

var hotel_id = <?php echo$chk_hotel_id;?>;

function add_map(n1,n2,hotel_id){
	var n1 = $('#get_lat').val();
	var n2 = $('#get_lng').val();
  PopupCenter('<?php echo$pthc?>HotelDetail/load_map?hotel_id='+hotel_id+'&lat_p='+n1+'&lng_p='+n2,'xtf','900','600'); 
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




show_hotel_tra(hotel_id);
function show_hotel_tra(hotel_id){
var lang = 'en';

	$.ajax({
       url: "<?php echo base_url('HotelDetail/show_hotel_travel')?>",
             type: "POST",
             data: ({hotel_id:hotel_id,lang:lang}),
             dataType: "html",
      success:function(data) {
      	
      if(data!=""){
        $('#show_hotel_travel_en').html(data);
      }else{
  
      }},complete: function(){
             
      }
    });
}




function set_pop(id_run,st){
		$.ajax({
       url: "<?php echo base_url('HotelDetail/set_pop')?>",
             type: "POST",
             data: ({id_run:id_run,st:st}),
             dataType: "html",
      success:function(data) {
      if(data==1){
           show_hotel_tra(hotel_id);
      }else{
      }},complete: function(){
             
      }
    });

}


function del_tra(iddel){
		$.ajax({
       url: "<?php echo base_url('HotelDetail/del_hotel_travel')?>",
             type: "POST",
             data: ({iddel:iddel}),
             dataType: "html",
      success:function(data) {
      if(data==1){
           show_hotel_tra(hotel_id);
      }else{
      }},complete: function(){
             
      }
    });

}

function add_hotel_travel(){

var lang = 'en';
var name_location = $('#name_location_en').val();
var number_distance = $('#number_distance_en').val();
var type_distance = $('#type_distance_en').val();
		$.ajax({
       url: "<?php echo base_url('HotelDetail/add_hotel_travel')?>",
             type: "POST",
             data: ({hotel_id:hotel_id,lang:lang,name_location:name_location,number_distance:number_distance,type_distance:type_distance}),
             dataType: "html",
      success:function(data) {
      if(data==1){
           show_hotel_tra(hotel_id);
      }else{
      }},complete: function(){
             
      }
    });
}


</script>

<script type="text/javascript">


/*
 $("#get_country li").click(function(){
    $("#val_country_id").val(this.id);
});

 $("#get_province li").click(function(){
    $("#val_province_id").val(this.id);
});

 $("#get_grade li").click(function(){
    $("#val_grade").val(this.id);
});

*/




function ch_txt_edit(){
    <?php foreach($results_lang as $value_bx){
          $fld_valu = $value_bx->fld_valu;
    ?>
    // alert("OK");
      var txtid= '<?php echo$fld_valu?>';
      $('#val_short_policy_'+txtid).val(tinyMCE.editors[$('#short_policy_'+txtid).attr('id')].getContent());
      $('#old_val_short_policy_'+txtid).val(tinyMCE.editors[$('#short_policy_'+txtid).attr('id')].getContent());
    <?php } ?>
}


function submit_data(idst){
ch_txt_edit();
var formdata = $('#form_hotel').serialize();
var send_commnd = $('#typ').val();
    $.post("<?php echo base_url('HotelDetail/Do_insert_And_Update_hotel')?>", 
      {formdata: formdata,send_commnd: send_commnd,idst:idst},
       function(result){
       if(result!=0){
        show_msg('บันทึกข้อมูลสำเร็จแล้ว',1);
        window.location.reload(true);
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
                    data: ({hotel_id:p1,}),
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

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------






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