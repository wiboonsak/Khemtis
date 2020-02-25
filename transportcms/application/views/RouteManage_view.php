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
   <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/sweet-alert/sweetalert.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo $pthc?>assets/font/flaticon/flaticon.css">
   <style type="text/css">
#selectedFiles img {
    max-width: 200px;
    max-height: 200px;
    float: left;
    margin-bottom:10px;
 }
.imgshow{
border-style: solid;border-width: 1px;border-radius: 5px;height:100px;border-color:#cccccc;margin-left:5px;cursor: pointer;
}
.imgshow:hover {
border-style: solid;border-width: 1px;border-radius: 5px;height:100px;border-color:red;margin-left:5px;cursor: pointer;
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
.xx2{
		float: right !important;
	}
  </style>

<!----------------------------->

<!--<div style="margin-top:8vw;" >-->       
<div style="padding-top: 147px;" id="setPadding" >       
<form id="form_route" class="form-horizontal" enctype="multipart/form-data">   
<?php  
            $type_comd = "ADD";
            $p_room_id="";
            $p_default_quota="";$p_max_extra_bed="";
            $p_published_status="";$p_booking_status="";$p_room_title="";
            $p_default_price="";$p_default_dscnt_price="";$p_extra_bed_price="";
            $p_crcy_code="";
		
            $txt_lang=array();
		if($route_id !=0){		
			
                   foreach($get_route as $value_route){
                        $a_lang=  array();
                            $val_route_id = $value_route->route_id;
                            $r_active = $value_route->route_active;
                            $begin_place_id = $value_route->begin_place_id;
                            $destination_place_id = $value_route->destination_place_id;
                            $route_image = $value_route->route_image;
                           array_push($a_lang,
                            $value_route->lang,
                            $value_route->route_name
                          );
                           array_push($txt_lang,$a_lang);  
                    } 
             
		} else { 
			
            $val_route_id = $route_id;
            $r_active = '';
            $begin_place_id = '';
            $destination_place_id = '';
            $route_image = '';
		}$txt_cry=array();
?>
	
<input type="hidden" id="val_route_active" name="val_route_active" value="<?php echo $r_active?>">	
<input type="hidden" id="val_route_id" name="val_route_id" value="<?php echo $val_route_id?>">  


<div class="content">
                    <div class="container-fluid">

					<div class="card-box">
					
					<input type="hidden" id="arr_transport" name="arr_transport" >
						
						<ul class="nav nav-tabs">                            
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                   <i class="fa fa-file-text-o"></i> Route Data
                                </a>
                            </li>							
<?php if($route_id !=0){?>
							<li class="nav-item">
                                <a href="#route" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="fa fa-truck "></i> Route Detail
                                </a>
                            </li>  

<?php 
  //if($get_r_id!=0){
?>



<!--                            <li class="nav-item">
                                <p  class="nav-link" id="show_txt_depart">
                                </p>
                            </li>        


                            <li class="nav-item">
                                <a href="http://transportcms.khemtis.com/RouteManage/RouteDetail/<?php echo$get_r_id?>"  class="nav-link">
                                   <font color='green'> Return  <?php //echo$get_r_txt?> </font>
                                </a>
                            </li>     -->


<?php }//}?>
                       </ul>		
						
						
			<div class="tab-content">
      <div class="tab-pane show active" id="profile">
			<div class="row">
      <div class="col-md-12 col-sm-12">							
			<div class="card-box">
      <div style="display: flex; flex-wrap: wrap;">
			<div class="col-lg-12 p-t-10"> 
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                            <input class="mdl-textfield__input" type="text" id="route_active" value="<?php echo $r_active?>" readonly tabIndex="-1">
                            <label for="route_active" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="route_active" class="mdl-textfield__label">Route Active</label>
                            <ul data-mdl-for="route_active" id="get_pulis" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" id="Y">YES</li>
                                <li class="mdl-menu__item" id="N">NO</li>
                            </ul>
                </div>
  </div>
	</div>
	

  </div>                	
  <div class="card-box"><div style="display: flex; flex-wrap: wrap;">
			<div class="col-lg-6 p-t-10"> 
                             <label class="col-md-3 col-sm-12 col-form-label" for="begin_place_id">Begin Place</label>
                 <select class="form-control" id="begin_place_id" name="begin_place_id" onchange="placedataupdate(this.value)">
                                     <option value="">-- Select --</option>
						        <?php 
                                                $listPlace = $this->Route_model->get_placeData();
                                                foreach($listPlace->result() as $listPlace2){ ?> 
									  
									  
                                     <option value="<?php echo $listPlace2->id?>" <?php if(($route_id !=0) && ($begin_place_id == $listPlace2->id)){ echo "selected"; }?> ><?php echo $listPlace2->place_title?></option>
									  <?php } ?>
									  
				
                                 </select>
          </div>

		<div class="col-lg-6 p-t-10"> 
                     <label class="col-md-3 col-sm-12 col-form-label" for="begin_place_id">Destination Place</label>
                            <select class="form-control" id="destination_place_id" name="destination_place_id">
                                     <option value="">-- Select --</option>
                                     			 <?php if($route_id !=''){									  
									  
									  	   $destination_place = $this->Route_model->get_placename($destination_place_id);
									  	   foreach($destination_place->result() as $destination_place2){}
									 ?>
									  <option value="<?php echo $destination_place2->id?>" selected><?php echo $destination_place2->place_title?></option>
									 <?php } ?> 
                                    <?php 
                           
                                    if($route_id !=''){$placedataupdate = $this->Route_model->placedataupdate($begin_place_id,$client_user_id);
                                    
                                    }else{
                                         $placedataupdate = $this->Route_model->get_placeData();
                                    }
                                                foreach($placedataupdate->result() as $placedataupdate1){ ?> 
									  
									  
                                     <option value="<?php echo $placedataupdate1->id?>"><?php echo $placedataupdate1->place_title?></option>
									  <?php } ?>
				
                                 </select>       
           </div></div>
<br>

</div>
                 
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
                  foreach($results_lang as $value_bx){$itab++;
                        $actab="";
                        $naem_lang = $value_bx->fld_valu_desc;
                        $fld_valu = $value_bx->fld_valu;
                        if($itab==0){$actab = "active";}
                          $route_fld_nm = "";
     

                        for($lg=0;$lg<(count($txt_lang));$lg++){
                        if(isset($txt_lang[$lg][1]) && ($txt_lang[$lg][0]==$fld_valu)){
                          $lang_txt =  $txt_lang[$lg][0];// Static Lang TAB
                          $route_fld_nm =  $txt_lang[$lg][1];
                       
                         }
                     }
    ?>
    <div class="tab-pane <?php echo $actab?>" id="<?php echo $fld_valu?>">                                     
    <!-- start page content -->
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box"> 
                <div class="card-body row">
<input type="hidden" id="show_depart" value="<?php echo$route_fld_nm?>">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Route Details <?php echo $naem_lang ?></font>
</div>
                        <div class="col-lg-12 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class="mdl-textfield__input" value="<?php echo $route_fld_nm?>" type="text" name="name<?php echo $fld_valu?>" id="name<?php echo $fld_valu?>">
                               <label class="mdl-textfield__label">Route Name</label>
                          </div>
                        </div>
                       
                </div>
                     </div>
                         </div>
                             </div> 
   <!-- end page content -->
                                        </div>
   <?php } ?>
                                   
			<div class="col-lg-12 p-t-10"> 
                            <label class="col-md-3 col-sm-12 col-form-label">Route Image</label>
                            <div class="col-md-9 col-sm-12">
									<div class="fileupload <?php  if(($route_id != 0) && ($route_image !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
									<?php if($route_id == 0){ ?>	

										<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
											<img  width="225px" height="150px" src="<?php echo base_url('assets/img/picture-not-available.jpg')?>" alt="image" />
										</div>

										<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
									<?php } ?>	
											
									<?php if($route_id !=''){ ?>	
												
										<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
											<?php if($route_image ==''){ ?>	
											<img  width="225px" height="150px" src="<?php echo base_url('assets/img/picture-not-available.jpg')?>" alt="image" />
											<?php } ?>	
										</div>
												
										<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
										<?php if($route_image !=''){ ?>	
											<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$route_image?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$route_image?>','_blank'); location.reload();" /><!--</a>-->
										<?php } ?>	
										</div>
									<?php } ?>	
												
									<div>
										<button type="button" class="btn btn-custom btn-file">
										<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
										<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
										<input type="file" class="btn-light" id="route_image" name="route_image" value="" />
										</button>
									<?php  if(($route_id != 0) && ($route_image !='')){ ?>
										<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $route_id?>' , '<?php echo $route_image?>')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
										
									<?php } else { ?>
										<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
									<?php } ?>
									</div>
									</div>
											
									<input type="hidden" name="old_pic" id="old_pic" value="<?php if($route_id !=''){ echo $route_image;}?>" >								<p class="text-danger">(Image size width 670 pixel height 300 pixel. jpg png gif support)</p>
								</div>	
                            <div class="col-lg-12 p-t-10 text-center"> 
                            <button type="button" onclick="submit_data()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                    		<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                       </div>
             
 </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>



                    </div>
                                                    <?php if($route_id !=''){	?>
                                                    <div class="tab-pane" id="route">	
					
					   <div style="display: flex; flex-wrap: wrap;">
			<div class="col-lg-12 p-t-10"> 
					<div class="form-group row">
                    
                        <div class="col-md-4 col-sm-12">						
                       </div>						
                   </div>					
                                   <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Travel Time</label>
                        <div class="col-md-4 col-sm-12">						
							
                            <select class="form-control" id="transfer_h_time" name="transfer_h_time">
                                <option value="">-- Hour --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>"  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
                       </div>
						
					   <div class="col-md-4 col-sm-12">							
							
                            <select class="form-control" id="transfer_m_time" name="transfer_m_time">
                               <option value="">-- Minute --</option>
							<?php for($x=0; $x<=59; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$x?>"  ><?php echo $txt.$x?></option>
	
							<?php }	?><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
							</select>
                       </div>						
                   </div>
				   <div class="form-group row">	
				   		<label class="col-md-3 col-sm-12 col-form-label">Transport for Route</label>
                   		
				   <div class="col-md-9 col-sm-12 row">	
						
				<?php 
                                 $idclient = $this->session->userdata('client_user_id');
                                if($route_id !=''){  $bb ='';
                                $y = 'Y';
                                $listTransport = $this->Route_model->listTransport($y,$idclient);
				foreach($listTransport->result() as $listTransport2){  ?>
						 <div style="padding-top: 10px;">
                                        <button type="button" class="btn btn-sm btn-primary" onClick="select_transport('<?php echo $listTransport2->tran_id?>' , '<?php echo $listTransport2->transport_name?>')" ><?php echo $listTransport2->transport_name?> &nbsp;<i class=" mdi mdi-plus"></i></button>
                    		</div>
					&nbsp;&nbsp;	
				<?php }} ?>										
							<br>
							<br>
							<br>
							<div class="col-12 alert alert-info row" style="color:#000000; background-color: #FFFFFF; display: none;" id="divSelectTransport" ><button type="button" class="btn btn-primary" onclick="add_routeType()" style="float: right;">Add</button></div>					
				    	</div>
				</div><!-- container -->
                               
				</div><!-- container -->
				</div><!-- container -->
                                 <div class="form-group row">
						<div class="accordion m-b-30 col-12" id="accordionExample" style="display: none">
                        </div>
				   </div>
                </div>
                                                    <?php }?>
                   <div class="tab-pane" id="route2" style="display: none"></div>
                  
 
                        </div>
	</div>
<!--          Modal                       -->
<div id="modal_Large" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 style="margin-top: 0px;" class="modal-title" id="myModalLabel">Modal Heading</h4>
                 <div style="background-color: #e6e6e1;width: 20px;text-align: center; cursor:pointer"><span style="
    font-weight: 800;" data-dismiss="modal">x</span></div>
                  </div>
             <div class="modal-body"></div>
                 
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
                  
	

                            
                </div>
                </div>
                </div>
                </div>
               
    
               </form>
</div>
<!-------------------------Add Script Command ----------------------------->

  <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
  <script type="text/javascript">
var txt_dep = $('#show_depart').val();
$('#show_txt_depart').html("<font color='000000'> Depart "+txt_dep+"  </font>");



 $("#get_pulis li").click(function() {
    $("#val_route_active").val(this.id);
});


publ(numreve($('#route_active').val()));

function numreve(n){
    if(n=="Y"){return 0;}
    else if(n=="N"){return 1;}
    else{return -1;}
}
function publ(lid){
  if(lid!=-1){
    $("#route_active").val($("#get_pulis li")[lid].textContent);
  }
}


//////////////////////////////////////
//function submit_data() {
//        var tran_id = $('#val_route_id').val();
//                   var nameFunction = 'insertUpdate_route';		
//                   var postData = $('#form_route').serialize();
//				$.ajax({
//					type: 'POST',
//					url: '<?php //echo base_url('RouteManage/')?>'+nameFunction,
//					processData: false,
//					contentType: false,
//					data: postData,
//					success: function(data, status){				
//						
//						if(data !=0){ 
//			var link = '<?php //echo base_url('RouteManage/RouteDetail/')?>'+data;   
//			show_msg('บันทึกข้อมูลสำเร็จแล้ว',1,2000);
//			if(tran_id == '0'){
//				re_deley(link,2500);
//			}			    
//		  }else{
//			show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
//		  }
//					}
//				});
//    }
////////////////////////////////////
function submit_data() {
        var formdata = new FormData();
           <?php foreach($results_lang as $value_bx){
          $fld_valu = $value_bx->fld_valu;
          ?>
           var txtid= '<?php echo$fld_valu?>';
           formdata.append('name'+txtid,$('#name'+txtid).val());
         <?php } ?>
            var file_data = $('#route_image').prop('files')[0];
           formdata.append('val_route_active',$('#val_route_active').val());
           formdata.append('val_route_id',$('#val_route_id').val());
           formdata.append('begin_place_id',$('#begin_place_id').val());
           formdata.append('destination_place_id',$('#destination_place_id').val());
           formdata.append('route_image',file_data);
                    $.ajax({
                        url: "<?php echo base_url('RouteManage/insertUpdate_route')?>", // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formdata,
                        type: 'post',
                        success: function (data) {
                        	if(data != 0 ){
                              show_msg("Save Success",1);
                             setTimeout(function(){ window.location.href = "<?php echo base_url('RouteManage/RouteDetail/')?>"+data; }, 2000);
                            }
                        },
                        error: function (response) {
                           alert("Error Save Data !",2);
                        }
                    });

    }
/////////////////////////////////////////	  
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
    //showTableImg($('#val_hotel_id').val(),$('#val_room_id').val());
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
           // showTableImg(hotel_id,room_id);
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


	//----------------------
	
	$(".fileupload-exists").click(function(){ 
  		$("#upload_preview").empty();
		$("#upload_preview").addClass("fileupload-exists");
		$("#upload_new").removeClass("fileupload-exists");
		$("#route_image").val("");
		$("[data-provides=fileupload]").removeClass("fileupload-exists");
		$("[data-provides=fileupload]").addClass("fileupload-new");
	});
	//-------------------------------	
	function reset_element(){
		
		$('.divX').remove();
		$('#divSelectTransport').css('display', 'none');
		$('#transfer_h_time').val('');
		$('#transfer_m_time').val('');
		$('.checkboxName').prop('checked',false); 
		$('#arr_transport').val('');
		myarray.length = 0;				
	}
        //-------------------------------
    function removeFile(dataID, file_name){
            $.post('<?php echo base_url('RouteManage/remove_file')?>', { dataID : dataID, file_name : file_name },
                    function (data){
                        if(data == '1'){
                             show_msg("Delete Success");
                             setTimeout(function(){ window.location.href = "<?php echo base_url('RouteManage/RouteDetail/')?>"+dataID; }, 2000);

                                        $("#upload_preview").empty();
                                        $("#upload_preview").addClass("fileupload-exists");
                                        $("#upload_new").removeClass("fileupload-exists");
                                        $("#"+field).val("");
                                        $("#"+field+dataID).val("");
                                        $("[data-provides=fileupload]").removeClass("fileupload-exists");
                                        $("[data-provides=fileupload]").addClass("fileupload-new");
                            
                        } else {
                             alert("Error Delete Data !");
                        }
                    });
        }
  //----------------------
	
	function add_routeType(){ //alert('1');
		
		var arr_transport = $('#arr_transport').val();
		var route_id = $('#val_route_id').val();
		var transfer_h_time = $('#transfer_h_time').val();
		var transfer_m_time = $('#transfer_m_time').val();
		
		if(transfer_h_time ==''){
			swal({
				title: 'Please insert travel time (Hour) !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
			
		}else if(transfer_m_time ==''){
			swal({
				title: 'Please insert travel time (Minute) !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
		
		}else if(arr_transport ==''){  
			swal({
				title: 'Please select transport for route !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
				
		}else{ 
		
			$.post('<?php echo base_url('RouteManage/add_transport')?>' , { arr_transport : arr_transport , route_id : route_id , transfer_h_time : transfer_h_time , transfer_m_time : transfer_m_time }, function(data){   //alert('...'+data);

				if(data !=''){   				
					
					/*$('.spanX').remove();
					$('#divSelectTransport').css('display', 'none');
					$('#transfer_h_time').val('');
					$('#transfer_m_time').val('');
					$('.checkboxName').prop('checked',false); 
					$('#arr_transport').val('');
					myarray.length = 0;*/
					reset_element();
					var arr2 = [];
					arr2 = data.split("/");	

					$.post('<?php echo base_url('RouteManage/modal_setTime')?>' , { key : arr2[1] , route_id : arr2[0] }, function(data2){   
						//console.log(data2);
						var myObj = JSON.parse(data2);
						//alert('ok');
						$('#myModalLabel').text(myObj.txt_routeType);
						$('.modal-body').empty();
						$('.modal-body').html(myObj.htmlFom);
						$('#modal_Large').modal('show'); 
					})		
				}					
			})		
		} 
	}
        	//----------------------
	
	function appendTime(){
		
		$('#divTime').append('<br><input type="time" name="arrive_time[]" class="form-control" >');
		
	}
        //----------------------
	
	function insertTimes(route_type_id,route_id){
		
                
		//if($("input[type=time]").filter(function(){ return $(this).val(); }).length > 0){
			
			var hr = $('#hr').val();
			var min = $('#min').val();
			//alert('มีเวลาอยู่');
			$.post('<?php echo base_url('RouteManage/insert_times')?>' , { hr:hr,min:min, route_type_id : route_type_id , route_id : route_id }, function(data){
				console.log(data);
					if(data == 1){
					   //alert('ok');
					   showRouteType_Times(route_type_id);	
					   $('#modal_Large').modal('hide'); 
					   swal({
							title: 'Saved Successfully.',
							//text: 'You clicked the button!',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
					   })	
					}				
			})			
		//}	
	}
        //----------------------
	
	function showRouteType_Times(route_type_id){
		
		var route_id = $('#val_route_id').val();
	
		$.post('<?php echo base_url('RouteManage/RouteType_Times')?>' , { route_id : route_id , route_type_id : route_type_id }, function(data){				
			
			$('#accordionExample').empty();
			$('#accordionExample').html(data);
			$('#accordionExample').show();			
				
		})			
	}
        //-----------------------------------------
        function delete_routeType(key_group,route_id){  
		   $.post('<?php echo base_url('RouteManage/deleteRouteType')?>' , { key_group : key_group , route_id : route_id }, function(data2){
			   
				if(data2 == '1'){ 
                	swal({
                        title: 'Deleted Successfully',
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    })
					reset_element();
					showRouteType_Times('x');
					
		   		}else{
					
					swal({
						title: "Data can't be deleted. !",
						type: 'warning',								
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 							
				}
			})	
					
	}
        //----------------------
	
	function edit_routeType(key,route_id,h,m){

		$.post('<?php echo base_url('RouteManage/editRouteType')?>' , { key : key , route_id : route_id , h : h , m : m }, function(data2){   
			$('#route').empty();
			$('#route').html(data2);
			var xxx = "'"+key+"'";
			$('#divSelectTransport').append('&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" style="float: right;" id="btnS" onClick="update_routeType('+xxx+')">Save</button>'); 
			$('#btnS').addClass('xx2');
			var transport_id = $('#arr2').val();
			var arr2 = [];
			arr2 = transport_id.split(",");
			for(var i=0; i<arr2.length; i++){
				myarray.push(arr2[i]);
			}
			$('#arr_transport').val(myarray);  
		})
	}
      //----------------------
		
	var myarray = [];	
	function select_transport(transport_id, transport){

			$('#divSelectTransport').css('display', 'block');
			$('#divSelectTransport').append('<button style="margin-top: 10px;" type="button" class="btn btn-sm btn-success divX" id="span_'+transport_id+'">&nbsp;&nbsp;'+transport+'&nbsp;&nbsp;<i class="fa fa-times" onclick="remove_transport('+transport_id+')" ></i></button> &nbsp; ');
			
			myarray.push(transport_id);
			//arr_transport = $('#arr_transport').val(myarray);
			$('#arr_transport').val(myarray);

	}
        /////////////////////////////////////////////////
        	var myarray = [];
                
	function remove_transport(transport_id){

			$('#span_'+transport_id).remove();
			myarray.splice($.inArray(transport_id, myarray), 1);
			$('#arr_transport').val(myarray); 

	}
        	//----------------------
	
	function cancelEdit(){
		
		/*$('#transfer_h_time').val('');
		$('#transfer_m_time').val('');
		$('#arr_transport').val('');
		$('#divSelectTransport').empty();
		$('#divSelectTransport').hide();
		//$('.js-check-change').removeAttr('checked');
		 $('input:checkbox').attr('checked',false);*/
		reset_element();
		showRouteType_Times('x');
		$('#btn_cancel').remove();
	}
        //------------------------------------------
	
	function modal_addTimes(key,route_id){
		
			$.post('<?php echo base_url('RouteManage/modal_setTime')?>' , { key : key , route_id : route_id }, function(data2){   
				//console.log(data2);
				var myObj = JSON.parse(data2);
				//alert('ok');
				$('#myModalLabel').text(myObj.txt_routeType);
				$('.modal-body').empty();
				$('.modal-body').html(myObj.htmlFom);
				$('#modal_Large').modal('show'); 
			})
	
	}
        //----------------------
	
	function addRoute_detail(dataID,route_id,key2,arrive_time){  
		
		$.post('<?php echo base_url('RouteManage/form_routeDetail')?>' , { dataID : dataID , route_id : route_id , key2 : key2 ,arrive_time:arrive_time}, function(data2){   
			//console.log(data2);
			//var myObj = JSON.parse(data2);
			//alert('ok');
			$('#myModalLabel').text('Add / Edit Detail');
			$('.modal-body').empty();
			$('.modal-body').html(data2);
			//$('#modal_Large33').modal('show'); 
			$('#modal_Large').modal('show'); 
		})			
	}
        //----------------------
	
	function insertDetailTime(timeTable_id,data_order,route_id,key_group){
		
		if($('#Mdestination_place_id').val() == ''){
		   swal({
				title: 'Please select Destination Place.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#Mdestination_place_id').focus();
			return false;		   
		   
		} else if($('#transport_id').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please select Transport.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#transport_id').focus();
			return false;
		
		} else if($('#arrive_time').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please insert Arrive Time.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#Hour').focus();
			return false;
			
		} else if($('#depart_time').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please insert Depart Time.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#Hour2').focus();
			return false;
		
		} else if($('#price').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please insert Adult Price.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#price').focus();
			return false;
		
		} else {		
			
			var Mbegin_place_id = $('#Mbegin_place_id').val();
			var Mdestination_place_id = $('#Mdestination_place_id').val();
			var transport_id = $('#transport_id').val();
			var arrive_time = $('#arrive_time').val();
			var depart_time = $('#depart_time').val();
			var note_checkin_en = $('#note_checkin_en').val();
			var price = $('#price').val();
			var price_children = $('#price_children').val();
			$.post('<?php echo base_url('RouteManage/insert_detailTime')?>' , { Mbegin_place_id : Mbegin_place_id,Mdestination_place_id:Mdestination_place_id,transport_id:transport_id,arrive_time:arrive_time,depart_time:depart_time,note_checkin_en:note_checkin_en,price:price,price_children:price_children , timeTable_id : timeTable_id , data_order : data_order }, function(data){
				
				  if(data != 'x'){
					   
					   showRouteType_Times(key_group);
					   swal({
							title: 'Saved Successfully.',
							//text: 'You clicked the button!',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
					   })						   
						   addRoute_detail(timeTable_id,route_id,key_group);
										  
				 }				
			})	}	
	}
        //-------------------------------------------
           function deleteTime(TimeID , TimeName, route_type_id){
//		 		swal({
//			   title: 'Want to delete '+TimeName+' ?',
//			   //text: "You won't be able to revert this!",
//			   type: 'warning',
//			   showCancelButton: true,
//			   confirmButtonClass: 'btn btn-confirm mt-2',
//			   cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
//			   confirmButtonText: 'Delete'
//			}).then(function () {

			   $.post('<?php echo base_url('RouteManage/deleteTime')?>' , { TimeID : TimeID }, 
				function(data){  
					if(data==1){ 
						swal({
							title: 'Deleted Successfully',
							//text: "Your file has been deleted", 
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						})
							   //location.reload();
							   showRouteType_Times(route_type_id)
						   
										
					}else{
						swal({
							title: "Data can't be deleted. !",
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}) 							
					}
				})	
		
	 }
         //----------------------  
	
	function removeDetail(dataID,timeTable_id){
//	
//		 swal({
//			   title: 'Want to delete this data ?',
//			   //text: "You won't be able to revert this!",
//			   type: 'warning',
//			   showCancelButton: true,
//			   confirmButtonClass: 'btn btn-confirm mt-2',
//			   cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
//			   confirmButtonText: 'Delete'
//		}).then(function () {

			   $.post('<?php echo base_url('RouteManage/remove_detail')?>' , { dataID : dataID , timeTable_id : timeTable_id }, function(data2){

					if(data2 == 1){ 
						swal({
							title: 'Deleted Successfully',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						})
						//reset_element();
						showRouteType_Times('x');

					}else{

						swal({
							title: "Data can't be deleted. !",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}) 							
					}
			  })	
		//})
	}
        //----------------------
	
	function editDetail(dataID){  
		
		$.post('<?php echo base_url('RouteManage/edit_routeDetail')?>' , { dataID : dataID }, function(data2){   
			//console.log(data2);
			//var myObj = JSON.parse(data2);
			//alert('ok');
			$('#myModalLabel').text('Add / Edit Detail');
			$('.modal-body').empty();
			$('.modal-body').html(data2);
			//$('#modal_Large33').modal('show'); 
			$('#modal_Large').modal('show'); 
		})			
	}
        //---------------------- 
	
	function setTimetoInput(Hour,Minute,element){  
		
		var Hour2 = $('#'+Hour).val();
		var Minute2 = $('#'+Minute).val();	
		var time = Hour2+':'+Minute2;
		$('#'+element).val(time);		
	}
        //----------------------
	
	function updateDetailTime(dataID){  
		
		if($('#Mdestination_place_id').val() == ''){
		   swal({
				title: 'Please select Destination Place.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#Mdestination_place_id').focus();
			return false;		   
		   
		} else if($('#transport_id').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please select Transport.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#transport_id').focus();
			return false;
		
		} else if($('#arrive_time').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please insert Arrive Time.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#Hour').focus();
			return false;
			
		} else if($('#depart_time').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please insert Depart Time.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#Hour2').focus();
			return false;
		
		} else if($('#price').val() == ''){
				//alert('Please select Editor in Chief.');	
			swal({
				title: 'Please insert Adult Price.',
				//text: "You won't be able to revert this!",
				type: 'warning',								
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#price').focus();
			return false;
		
		} else {	
			
			var Mdestination_place_id = $('#Mdestination_place_id').val();
			var transport_id = $('#transport_id').val();
			var arrive_time = $('#arrive_time').val();
			var depart_time = $('#depart_time').val();
			var note_checkin_en = $('#note_checkin_en').val();
			var price = $('#price').val();
			var price_children = $('#price_children').val();
			$.post('<?php echo base_url('RouteManage/update_routeDetail')?>' , { dataID : dataID , Mdestination_place_id : Mdestination_place_id,transport_id:transport_id,arrive_time:arrive_time,depart_time:depart_time,note_checkin_en:note_checkin_en,price:price,price_children:price_children }, function(data2){ 
				
				if(data2 == 1){
					
				   swal({
						title: 'Saved Successfully.',
						//text: 'You clicked the button!',
						type: 'success',
						confirmButtonClass: 'btn btn-confirm mt-2'
				   }) 	
					
				   showRouteType_Times('x');
				   $('#modal_Large').modal('hide'); 
					
				}
				
				
				//console.log(data2);
				//var myObj = JSON.parse(data2);
				//alert('ok');
				/*$('#myModalLabel').text('Add / Edit Detail');
				$('.modal-body').empty();
				$('.modal-body').html(data2);*/
				//$('#modal_Large33').modal('show'); 
				
				//$('#modal_Large').modal('hide'); 
			})			
	   }
	}
        //----------------------
	
	function update_routeType(key_group){		
		
		var arr_transport = $('#arr_transport').val();
		var route_id = $('#dataID').val();
		var transfer_h_time = $('#transfer_h_time').val();
		var transfer_m_time = $('#transfer_m_time').val();
		var old_arr = $('#arr2').val();
		
		if(transfer_h_time ==''){
			swal({
				title: 'Please insert travel time (Hour) !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
			
		}else if(transfer_m_time ==''){
			swal({
				title: 'Please insert travel time (Minute) !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
		
		}else if(arr_transport ==''){  
			swal({
				title: 'Please select transport for route !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
				
		}else{ 
		
			$.post('<?php echo base_url('RouteManage/updateRouteType')?>' , { arr_transport : arr_transport , route_id : route_id , transfer_h_time : transfer_h_time , transfer_m_time : transfer_m_time , key_group : key_group , old_arr : old_arr }, function(data){   
				
				console.log('...'+data+' transfer_h_time>'+transfer_h_time+' transfer_m_time>'+transfer_m_time);
				
				if(data == '1'){   	
					
					reset_element();
					showRouteType_Times('x');
					$('#btn_cancel').remove();					
						
				}					
			})		
		} 		
	}
	//==================================
        function placedataupdate(changeValue) {
        var client_user_id = <?php echo $client_user_id?>;
        $.post('<?php echo base_url('RouteManage/placedataupdate') ?>', {changeValue: changeValue,client_user_id:client_user_id},
         function (data) {
         $('#destination_place_id').empty();
         $('#destination_place_id').html(data);});
        }
    

</script>
<script type="text/javascript">
   $(document).ready(function(){
	
	   
	    showRouteType_Times('x');
	   
	 /*   $('[data-plugin="switchery"]').each(function (idx, obj){
       		new Switchery($(this)[0], $(this).data());
		});*/
				
   })
</script>

<!--------------------End Script Command----------------------------->