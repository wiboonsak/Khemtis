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
 <!-- data tables -->
   <link href="<?php echo $pthc?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>


<style type="text/css">
  .select_bt{
    background-color: #628dab;color:#ffffff;
  }
  .select_bt:hover{
    background-color: #0758b7;color:#ffffff;
  }
  .lb_yes{
     padding:3px;
     border-radius: 3px;
     width: 50px;
     background-color: #2cb99c;
     text-align: center;
     color:#ffffff;
  }
  .lb_no{
     padding:3px;
     border-radius: 3px;
     width: 50px;
     background-color: #d03869;
     text-align: center;
     color:#ffffff;
  }
</style>
<!----------------------------->
<?php //if($chk_hotel_id!=""){?>
<!--<div style="margin-top:8vw;">-->
<div style="padding-top: 147px;" id="setPadding" >     
<!--<input type="hidden" id="val_hotel_id" value="<?php //echo $chk_hotel_id?>">-->
<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header>Charter Boat Manage</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                      <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <button id="addRow1" class="btn" style="background-color: #628dab;color:#ffffff;" onclick="window.location.href='<?php echo base_url('Charterpoat')?>'">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">

                                        <thead>
                                            <tr style="background-color:#628dab;color:#ffffff;">
                                                <th style="text-align: center;">Number</th>
                                                <th style="text-align: center;">Route Name</th>
                                                <th style="text-align: center;">Begin Place</th>
                                                <th style="text-align: center;">Destination Place</th>
                                                <th style="text-align: center;">Detail Route</th>
                                                <th style="text-align: center;">Delete Route</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php $i=0; $dis_prov =''; $dis_cty =''; $place_titleName ='';
if(isset($get_chartertran_list)){
 foreach($get_chartertran_list as $value_list){  
    $i++;
    $get_chartertran_title = $this->Charterpoat_model->get_chartertran_title($value_list->id);
    foreach($get_chartertran_title as $get_chartertran_title2){}
    $begin_place_id = $value_list->begin_place_id; 
    $destination_place_id = $value_list->destination_place_id; 

	 $place_title = $this->Place_model->get_place_title($begin_place_id);
	 foreach($place_title as $place_title2){}
	 $begin_place = $place_title2->place_title;
	 $place_title3 = $this->Place_model->get_place_title($destination_place_id);
	 foreach($place_title3 as $place_title4){}
	 $destination_place = $place_title4->place_title;
	 

?>

                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $i;?></td>
                                                <td><?php echo $get_chartertran_title2->route_name?></td>
                                                <!--<td><?php //echo $value_list->default_quota?></td>-->
                                                <!--<td><?php //echo $value_list->max_extra_bed?></td>-->
                                                <td><?php echo $begin_place?></td>
                                                <td><?php echo $destination_place?></td>
                                                <td align="center"> 
                                                  <!--
-->                       <button id="addRow1" class="btn select_bt" onclick="window.location.href='<?php echo base_url('Charterpoat/CharterpoatDetail/').$value_list->id?>'">
                                                    SELECT <i class="fa fa-wpforms"></i>
                                                </button>
                                                </td>
                                                <td align="center"> 
                                                  <!--
-->                       <button  class="btn select_bt btn-danger" onClick="delete_data('<?php echo $value_list->id ?>')">
                                                    Delete <i class="fa fa-window-close"></i>
                                                </button>
                                                </td>
                                            </tr>

<?php } } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

 <?php /*}else{?>
<br><br>
   <div style="font-size: 35px;margin-top:8vw;"><center>Hotel Information not available
    <br><br>
   <br> 
<br><br>


  <?php }*/ ?>



<!--Scipt-->
 <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
<script type="text/javascript">

function re_deley(link,relay){
   setTimeout(function () {
       window.location.href = link; 
    }, relay); 
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


function add_RoomManage(){
   var hotel_id = $("#val_hotel_id").val();
       $.post("<?php echo base_url('RoomManageList/add_new_room')?>", 
      {hotel_id: hotel_id},
       function(result){
       if(result!=0){
        show_msg('Insert Room success',1,1500);
        re_deley("RoomManage?autorunid="+result+"&hotelid="+hotel_id+"&typ=New",1500);
      }else{
        show_msg('Not Insert Room',2);
      }
    },'json');
  }
 //------------------------------
	
	function delete_data(dataID){  
             if (confirm("Want to delete this data ?")) {
                 $.post('<?php echo base_url('CharterpoatList/deleteData')?>' , { dataID : dataID }, 
		function(data){  
		if(data==1){ 
                	show_msg("Save Success",1);
                  setTimeout(function(){ window.location.href = "<?php echo base_url('CharterpoatList')?>"; }, 2000);
			}else{
			return false;
			}
			});	
  } else {
    
  }
  }










</script>



</div>





  