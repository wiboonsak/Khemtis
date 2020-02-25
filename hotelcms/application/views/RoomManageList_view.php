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
        <link href="<?php echo $pthc?>assets/css/bootstrap-editable.css" rel="stylesheet">
        

<style type="text/css">
  .select_bt{
    background-color: #628dab;color:#ffffff;
  }

  .select_bt:hover{
    background-color: #0758b7;color:#ffffff;
  }

    .del_bt{
    background-color: #d03869;color:#ffffff;
  }
  
  .del_bt:hover{
    background-color: red;color:#ffffff;
  }
  .lb_yes{
     padding:3px;
     border: solid  1px #2cb99c;
     width: 50px;
     font-weight:   bold; 
     text-align: center;
     color:#2cb99c;
  }
  .lb_no{
     padding:3px;
      border: solid  1px #d03869;
     width: 50px;
     font-weight:   bold; 
     text-align: center;
     color:#d03869;
  }
</style>
<!----------------------------->
<?php if($chk_hotel_id!=""){?>
<div style="margin-top:8vw;">     
<input type="hidden" id="val_hotel_id" value="<?php echo$chk_hotel_id?>">
<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header>Rooms Manage</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                      <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                       <button id="addRow1" class="btn" style="background-color: #628dab;color:#ffffff;" onclick="add_RoomManage('<?php echo$tokengenered?>')">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr style="background-color:#628dab;color:#ffffff;text-align: center;">
                                                <th style="text-align: center;">Number</th>
                                                <th> Room Title </th>
                                                <th> Default Quata </th>
                                                <th> Max extra bed</th>
                                                <th> Published Status </th>
                                                <th> Booking Status </th>
                                                <th> Free breakfast </th>
                                                <th> Edit Data</th>
                                                <th style="text-align: center;"> Detail Room </th>
                                  <th style="text-align: center;"> Delete Room </th>

                                            </tr>
                                        </thead>
                                        <tbody>
<?php $i=0;
if(isset($get_room_list)){
 foreach($get_room_list as $value_list){
    $i++;
    $room_id=$value_list->room_idrun;
    $hotel_id=$value_list->hotel_idrun;
       if($value_list->published_status=='Y'){$ch_p="lb_yes";}else{$ch_p="lb_no";}
       if($value_list->booking_status=='Y'){$ch_b="lb_yes";}else{$ch_b="lb_no";}
       if($value_list->free_breakfast=='Y'){$ch_f="lb_yes";}else{$ch_f="lb_no";}
       
?>
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $i;?></td>
                                                <td><?php echo $value_list->room_title?><a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username"></a></td>
                                                <td ><?php echo $value_list->default_quota?></td>
                                                <td ><?php echo $value_list->max_extra_bed?></td>
                                                <td><center><div class="<?php echo$ch_p?>"><?php echo $value_list->v_published_status?></div></div></td>
                                                <td><center><div class="<?php echo$ch_b?>"><?php echo $value_list->v_booking_status?></div></div></td>
                                                  <td><center><div class="<?php echo$ch_f?>"><?php echo $value_list->v_free_breakfast?></div></div></td>
                                                <td>
<div class="text-center">
  <p class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm" onclick="edit_data('<?php echo$value_list->room_title?>',<?php echo $value_list->default_quota?>,<?php echo $value_list->max_extra_bed?>,'<?php echo $value_list->v_published_status?>','<?php echo $value_list->v_booking_status?>',<?php echo$room_id?>,'<?php echo $value_list->v_free_breakfast?>')">EDIT</p>
</div>
                                               </td>
                                                <td align="center"> 
                                                <button id="addRow1" class="btn select_bt"  onclick="window.location='RoomManage?autorunid=<?php echo$room_id?>&hotelid=<?php echo$hotel_id?>&typ=Update&token_id=<?php echo$tokengenered?>'">
                                                    SELECT <i class="fa fa-wpforms"></i>
                                                </button>
                                              </td>
                                              <td align="center">
                                              <button id="addRow1" class="btn del_bt"  onclick="del_roomlist(<?php echo$room_id?>)">
                                                    DELETE <i class="fa fa-trash-o"></i>
                                                </button>
                                              </td>
                                            </tr>
<?php  }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
 <?php }else{?>
<br><br>
   <div style="font-size: 35px;margin-top:8vw;"><center>Hotel Information not available
    <br><br>
   <br> 
<br><br>
<?php }?>


<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><p id="title_edit"></p></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="defaultForm-email"><b>Room Title</b></label>
          <input type="text" id="room_id" class="form-control validate">
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="defaultForm-email"><b>Default Quata</b></label>
          <input type="text" id="quata" class="form-control validate">
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="defaultForm-email"><b>Max exta bed</b></label>
          <input type="text" id="extabed" class="form-control validate">
        </div>
         <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="defaultForm-email"><b>Free Breakfast</b></label>
           <table><tr><td>
            <div id="fb1" class="btn btn-defaul" onclick="set_fb(1)">YES</div></td>
           <td><div id="fb2" class="btn btn-defaul" onclick="set_fb(0)">NO</div></td>
           </tr></table>
        </div><hr>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="defaultForm-email"><b>Published Status</b></label>
           <table><tr><td>
           	<div id="py" class="btn btn-defaul" onclick="set_pub(1)">YES</div></td>
           <td><div id="pn" class="btn btn-defaul" onclick="set_pub(0)">NO</div></td>
           </tr></table>
        </div><hr>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="defaultForm-email"><b>Booking Status</b></label>
          <table><tr><td>
          	<div id="by" class="btn btn-defaul" onclick="set_boo(1)">YES</div></td>
           <td><div id="bn" class="btn btn-defaul" onclick="set_boo(0)">NO</div></td>
           </tr></table>
        </div><hr>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" onclick="edit_roomlist()">SAVE</button>
       
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="idrun" value="">
<!--Scipt-->
 <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
 <script type="text/javascript">

function re_deley(link,relay){
   setTimeout(function () {
       window.location.href = link; 
    }, relay); 
}
var npub = 0;
var nboo = 0;
var nfb = 0;
function edit_data(n1,n2,n3,n4,n5,idrun,fbid){
 nfb = 0;
 npub = 0;
 nboo = 0;
 $('#idrun').val(idrun);
	$('#title_edit').html("<b> EDIT : ( "+n1+" )</b>");
	$('#room_id').val(n1);
	$('#quata').val(n2);
	$('#extabed').val(n3);

$('#fb1').removeClass('btn-defaul');$('#fb1').removeClass('btn-success');
$('#fb2').removeClass('btn-defaul');$('#fb2').removeClass('btn-danger');

$('#py').removeClass('btn-defaul');$('#py').removeClass('btn-success');
$('#pn').removeClass('btn-defaul');$('#pn').removeClass('btn-danger');

$('#by').removeClass('btn-defaul');$('#by').removeClass('btn-success');
$('#bn').removeClass('btn-defaul');$('#bn').removeClass('btn-danger');


  if(fbid=="Yes"){
     nfb = 1;
    $('#fb1').removeClass('btn-defaul');
    $('#fb1').addClass('btn-success');
  }else{
     nfb = 0;
    $('#fb2').removeClass('btn-defaul');
    $('#fb2').addClass('btn-danger');  
  }


	if(n4=="Yes"){
		 npub = 1;
		$('#py').removeClass('btn-defaul');
		$('#py').addClass('btn-success');
	}else{
		 npub = 0;
		$('#pn').removeClass('btn-defaul');
		$('#pn').addClass('btn-danger');	
	}


	if(n5=="Yes"){
		nboo = 1;
		$('#by').removeClass('btn-defaul');
		$('#by').addClass('btn-success');
	}else{
		nboo = 0;
		$('#bn').removeClass('btn-defaul');
		$('#bn').addClass('btn-danger');	
	}
}

function set_fb(n){
   nfb   =  n;
  if(n==1){
    $('#fb1').removeClass('btn-defaul');
    $('#fb2').removeClass('btn-danger');
    $('#fb1').addClass('btn-success');
  }else{
    $('#fb2').removeClass('btn-defaul');
    $('#fb1').removeClass('btn-success');
    $('#fb2').addClass('btn-danger');  
  }
}


function set_pub(n){
   npub   =  n;
	if(n==1){
		$('#py').removeClass('btn-defaul');
		$('#pn').removeClass('btn-danger');
		$('#py').addClass('btn-success');
	}else{
		$('#pn').removeClass('btn-defaul');
		$('#py').removeClass('btn-success');
		$('#pn').addClass('btn-danger');	
	}
}

function set_boo(n){
   nboo   =  n;
	if(n==1){
		$('#by').removeClass('btn-defaul');
		$('#bn').removeClass('btn-danger');	
		$('#by').addClass('btn-success');
	}else{
		$('#bn').removeClass('btn-defaul');
		$('#by').removeClass('btn-success');
		$('#bn').addClass('btn-danger');	
	}
}

function del_roomlist(idrun){
         $.ajax({
                    url: "<?php  echo base_url('RoomManageList/del_room')?>",
                    datatype: 'html',
                    type: "POST",
                    data: ({room_id:idrun}),
                  success:function(data) {
                     show_msg('Delete Room success',1,1500);
                     window.location.reload();
                  }
                });
}



function edit_roomlist(){
	var idrun = $('#idrun').val();
	var room_name = $('#room_id').val();
	var quata = $('#quata').val();
	var extabed = $('#extabed').val();
         $.ajax({
                    url: "<?php  echo base_url('RoomManageList/edit_roomlist')?>",
                    datatype: 'html',
                    type: "POST",
                      data: ({idrun:idrun,room_name:room_name,quata:quata,extabed:extabed,npub:npub,nboo:nboo,nfb:nfb}),
                  success:function(data) {
                     show_msg('Edit Room success',1,1500);
                     window.location.reload();
                  }
                });
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

function add_RoomManage(tokengenered){
   var hotel_id = $("#val_hotel_id").val();
       $.post("<?php echo base_url('RoomManageList/add_new_room')?>", 
      {hotel_id: hotel_id},
       function(result){
       if(result!=0){
        show_msg('Insert Room success',1,1500);
        re_deley("RoomManage?autorunid="+result+"&hotelid="+hotel_id+"&typ=New&token_id="+tokengenered,1500);
      }else{
        show_msg('Not Insert Room',2);
      }
    },'json');
  }











</script>



</div>





  