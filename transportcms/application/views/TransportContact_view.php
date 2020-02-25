<?php $pthc = base_url(); ?>
<!-------- CSS --------->
<!-- Material Design Lite CSS -->
<link rel="stylesheet" href="<?php echo $pthc ?>assets/plugins/material/material.min.css">
<link rel="stylesheet" href="<?php echo $pthc ?>assets/css/material_style.css">
<!-- animation -->
<link href="<?php echo $pthc ?>assets/css/pages/animate_page.css" rel="stylesheet">
<link href="<?php echo $pthc ?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $pthc ?>assets/css/pages/animate_page.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $pthc ?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
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
    .icon-click {
        cursor: pointer;
        padding: 0 7px 0 7px;
    }

    .select-icon {
        font-size: 50px;
        padding: 0 10px 0 10px;
        color: #1d70af;
    }
</style>
<!--<div style="margin-top:8vw;" >-->       
<div style="padding-top: 147px;" id="setPadding" >       
    <form id="form_route" class="form-horizontal" enctype="multipart/form-data">   
        <input type="hidden" id="val_tran_id" name="val_tran_id" value="<?php echo$idclient?>">
        <?php
        $type_comd = "ADD";
        $client_id = "";
        $trn_keyword = "";
        $trn_phone = "";
        $trn_email = "";
        $txt_lang = array();
        if ($idclient != "") {

            foreach ($get_tbl_transport_profile as $value_profile) {
                $a_lang = array();
                $client_id = $value_profile->client_id;
                $trn_keyword = $value_profile->trn_keyword;
                $trn_phone = $value_profile->trn_phone;
                $trn_email = $value_profile->trn_email;
                array_push(
                        $a_lang,
                        $value_profile->lang,
                        $value_profile->trn_name,
                        $value_profile->trn_addr,
                        $value_profile->trn_polic
                );
                array_push($txt_lang, $a_lang);
            }
        } else {
           echo "not Data Transport";
        }
        ?>
        <div class="row">
            <div class="col-md-12 col-sm-12">                           
                <div class="panel tab-border ">
                    <header class="panel-heading panel-heading-gray custom-tab ">
                        <ul class="nav nav-tabs">                                
                            <?php
                            $itab = 0;
                            foreach ($results_lang as $value_tab) {
                                $itab++;
                                $actab = "";
                                $naem_lang = $value_tab->fld_valu_desc;
                                $fld_valu = $value_tab->fld_valu;
                                if ($itab == 1) {
                                    $actab = "class='active'";
                                }
                                ?>
<li class="nav-item"><a href="#<?php echo $fld_valu ?>" style="color:#000000;" data-toggle="tab" <?php echo $actab ?>><?php echo $naem_lang ?></a></li>
<?php } ?>
                    </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <?php
                            $itab = -1;
                            $lang_q = array();
                            $trn_name = "";
                            $trn_addr = "";
                            $trn_polic = "";
                            foreach ($results_lang as $value_bx) {
                                $itab++;
                                $actab = "";
                                $naem_lang = $value_bx->fld_valu_desc;
                                $fld_valu = $value_bx->fld_valu;
                                if ($itab == 0) {
                                    $actab = "active";}
                               $lang_txt = "";
                                for ($lg = 0; $lg < (count($txt_lang)); $lg++) {
                                    if (isset($txt_lang[$lg][1]) && ($txt_lang[$lg][0] == $fld_valu)) {
                                        $lang_txt = $txt_lang[$lg][0]; 
                                        $trn_name = $txt_lang[$lg][1];
                                        $trn_addr = $txt_lang[$lg][2];
                                        $trn_polic = $txt_lang[$lg][3];
                                    }
                                }
                                ?>
                                <div class="tab-pane <?php echo $actab ?>" id="<?php echo $fld_valu ?>">                                     
                                    <!-- start page content -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
                                                    <font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Transport Details <?php echo $naem_lang ?></font>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-sm-1"></div>       
                                                <div class="form-group row col-sm-12" >
                                                    <label class="col-sm-3 col-form-label">Transport Name :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="trn_name<?php echo $fld_valu ?>" name="trn_name<?php echo $fld_valu ?>" class="form-control form-control-sm" value="<?php echo$trn_name?>" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div> 
                                                <div class="col-sm-1"></div> 
                                                <div class="form-group row col-sm-12" >
                                                    <label class="col-sm-3 col-form-label">Address :</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="trn_addr<?php echo $fld_valu ?>" style="width:100%;height:90px;border-color:#cccccc;border-radius:5px;" name="trn_addr<?php echo $fld_valu ?>"><?php echo$trn_addr?>   
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row col-sm-12">
                                                    <label class="col-sm-3 col-form-label">Policy :</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="trn_polic<?php echo $fld_valu ?>" name="trn_polic<?php echo $fld_valu ?>" type="text" class="ex"><?php echo$trn_polic?></textarea>
                                                        <input type="hidden" id="trn_polic_val<?php echo $fld_valu ?>"  name="trn_polic_val<?php echo $fld_valu ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                <!-- end page content -->
                             </div>
<?php } ?>
                        </div>
                           <div class="col-md-12" style="padding:23px;">
                               <div class="card-box">
                                    <div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
                                                    <font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Transport Contact</font>
                                                </div>
                                                <div class="row" style="padding:20px;">
                                                <div class="form-group row col-sm-12" >
                                                    <label class="col-sm-3 col-form-label"> Keywords :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="trn_keyword" name="trn_keyword" class="form-control form-control-sm" value="<?php echo$trn_keyword?>" >
                                                    </div>
                                                </div>
                                                 <div class="form-group row col-sm-12" >
                                                    <label class="col-sm-3 col-form-label"> Phone :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="trn_phone" name="trn_phone" class="form-control form-control-sm" value="<?php echo$trn_phone?>" >
                                                    </div>
                                                </div>
                                                 <div class="form-group row col-sm-12" >
                                                    <label class="col-sm-3 col-form-label"> Email :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="trn_email" name="trn_email" class="form-control form-control-sm" value="<?php echo$trn_email?>" >
                                                    </div>
                                                </div>
                                    </div>
                                  </div>
                               </div>




                                                    <div class="col-sm-12" style="text-align: center">
                                                        <button type="button" onclick="submit_data()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                                                    </div>




                    </div>
                </div>
            </div>
        </div>
    </form>
     
</div>
<!-------------------------Add Script Command ----------------------------->
<?php
$checkURL02 = $this->uri->segment(3);
$classIcon = '';

if (isset($checkURL02)) {
    $curriculumDataX = $this->Van_model->list_researchClusters($checkURL02);
    foreach ($curriculumDataX->result() as $curriculumDataY) {
        
    }
    $classIcon = $curriculumDataY->icon_class;
}
?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
<script src="<?php echo $pthc ?>assets/plugins/tinymce/tinymce.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
    tinymce.init({
      selector: "textarea.ex",
      theme: "modern",
      height: 300,
      plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor"],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
   style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}]
            });
                              /////////////////////////////////	

            var url3 = '<?php echo $checkURL02; ?>';
            var classIcon = '<?php echo $classIcon; ?>';
            if ((url3 != '') && (classIcon != '')) {
            var classIcon2 = classIcon.replace(' ', '.');
            $('.' + classIcon2 + '.icon-click').removeClass("icon-click");
            $('.' + classIcon2).addClass('select-icon');}
            });
            $("#get_pulis li").click(function () {
            $("#val_active").val(this.id);});
            publ(numreve($('#transport_active').val()));
            function numreve(n) {
             if (n == "Y") {return 0;} else if (n == "N") {return 1;} else {return -1;}}
            function publ(lid) {if (lid != -1) {
              $("#transport_active").val($("#get_pulis li")[lid].textContent);
               }}

 function ch_txt_edit() {
<?php
foreach ($results_lang as $value_bx) {
    $fld_valu = $value_bx->fld_valu;
    ?>
       var txtid = '<?php echo$fld_valu ?>';
       $('#trn_polic_val' + txtid).val(tinyMCE.editors[$('#trn_polic' + txtid).attr('id')].getContent());
<?php } ?>
                          }
//------------------------------------------------------------------------------------------------
function submit_data(){
    ch_txt_edit();
    var tran_id = $('#val_tran_id').val();
	var formdata = $('#form_route').serialize();
//alert(formdata);
$.ajax({
                    url: "<?php echo base_url('TransportContact/insert_profile')?>",
                    type: "POST",
                    data: ({formdata:formdata}),
                    dataType: "html",
           success:function(data) {
        //alert(data);
		   if(data=='save'){ 
            show_msg('บันทึกข้อมูลสำเร็จแล้ว',1,2000);
			//var link = '<?php //echo base_url('TransportContact')?>';   
			if(tran_id == '0'){
            show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
				//re_deley(link,2500);
			}			    
		  }else{
			show_msg('ไม่สามารถบันทึกข้อมูลได้',2);
		  }
        }
     });
}
//------------------------------------------------------------------------------------------------- 
                          function re_deley(link, relay) {
                              setTimeout(function () {
                                  window.location.href = link; //will redirect to your blog page (an ex: blog.html)
                              }, relay); //will call the function after 2 secs.
                          }
                          //----------------------------
                          $(".icon-click").click(function () {
                              $(".select-icon").addClass("icon-click");
                              $(".select-icon").removeClass("select-icon");
                              $(this).removeClass("icon-click");
                              var class2 = $(this).attr("class");
                              $(this).addClass("select-icon");
                              console.log("class2...." + class2);

                              //var class3 = 
                              $("#icon_class").val(class2);

                          });
                          
                           //------------------------------------------------------------------UPLOAD IMAGE-----------------------------------------------------
  var selDiv = "";
  var storedFiles=[];
  var storedVal=[];
 


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

//console.log('img.....'+storedVal)
//
// $("#storedVal").val(storedVal);
//    var form_data = new FormData($("#form_route")[0]);
//    
////    var formdata = $('#form_route').serialize();
//    var transport_id = $("#val_tran_id").val();
//
//$.ajax({
//		 type:'POST',
//		 url:'<?php //echo base_url('Vehicle/Do_inser_image')?>',
//		 processData: false,
//		 contentType: false,
//		 data : form_data,
//		 xhr: function(){
//			//upload Progress
//			var xhr = $.ajaxSettings.xhr();
//			if (xhr.upload) {
//				$(".progress").show();
//				xhr.upload.addEventListener('progress', function(event) {
//					var percent = 0;
//					var position = event.loaded || event.position;
//					var total = event.total;
//					if (event.lengthComputable) {
//						percent = Math.ceil(position / total * 100);
//					}
//					//update progressbar
//					$(".progress-bar").css("width", + percent +"%");
//					$('#progress_bar_id' + " .status").text(percent +"%");
//				}, true);
//			}
//			return xhr;
//		},
//		 success:function(data){
//			console.log(data);
//                        $(".progress-bar").css("width", + 0 +"%");
//			$(".progress").hide();
//			$('#files').val('');
//			      if(data == 1){
//       show_msg("บันทึกข้อมูลสำเร็จแล้ว",1);
//              clsimage_all();
//              showTableImg(transport_id);
//      }else{
//        show_msg("ไม่สามารถบันทึกข้อมูลได้",2);
//      }
//		 }
//	});
//   }
//  }
 var transport_id = $('#val_tran_id').val();
    var formdata = $('#form_route').serialize();
    var send_commnd = $('#typ').val();
    
    $('#divprogress').show();

    $.post("<?php echo base_url('Vehicle/Do_inser_image')?>", 
      {formdata: formdata,send_commnd: send_commnd,storedVal: storedVal,transport_id:transport_id},
        function(result){
       if(result == 1){
        show_msg("บันทึกข้อมูลสำเร็จแล้ว",1);
         $('#divprogress').hide();
              clsimage_all();
              showTableImg(transport_id);
      }else{
          
        show_msg("ไม่สามารถบันทึกข้อมูลได้",2);
        $('#divprogress').hide();
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



function showTableImg(p1){
if(p1==""){p1=-1;}
$.ajax({
                    url: "<?php echo base_url('Vehicle/DoShow_transport')?>",
                    type: "POST",
                    data: ({transport_id:p1}),
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
            "<div class='btn "+bg_c+" cct5' onclick='main_img("+value.id+","+value.tran_id+")'>Main</div>"+
           " <div class='btn btn-danger cct5 "+css_hidmain+"' onclick='del_img("+value.id+","+value.tran_id+")'>Delete</div>"+
         "</div>"+
        "<img src='../../"+value.img_name+"' class='cct6'>"+
      "</center>"+
    "</div>"+
  "</div>";    
 });
tr=tr+"</div>";
$('#tbd_room').append(tr);
          }
     });
}

function del_img(idrun,tran_id){
    $.post("<?php echo base_url('Vehicle/Do_delete_image')?>", 
      {idrun:idrun,tran_id:tran_id},
        function(result){
       if(result=='1'){
        show_msg("ลบข้อมูลสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(tran_id);
      }else{
        show_msg("ไม่สามารถลบข้อมูลได้",2); 
      }
    },'json');
  }


//------------------------- Delete Img-------------------------
function main_img(idrun,tran_id){
    $.post("<?php echo base_url('Vehicle/Do_main_img')?>", 
      {idrun:idrun,tran_id:tran_id},
        function(result){
       if(result=='1'){
           show_msg("กำหนดรูปหลักสำเร็จแล้ว",1);
              clsimage_all();
              showTableImg(tran_id);
      }else{
           show_msg("ไม่สามารถกำหนดข้อมูลได้",2);
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

                     
</script>


<!--------------------End Script Command----------------------------->