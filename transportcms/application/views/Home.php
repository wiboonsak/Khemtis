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
<!--<div style="margin-top:8vw;">  -->   
<div style="padding-top: 147px;" id="setPadding" >
<!--<input type="hidden" id="val_hotel_id" value="<?php //echo $chk_hotel_id?>">-->
<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header>Transport Booking</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">

                                        <thead>
                                            <tr style="background-color:#628dab;color:#ffffff;">
                                                <th width="5%" style="text-align:center;">Select All <br><input type="checkbox" id="ckbCheckAll"></th>
                                                <th>Booking number</th>

                                                <th>Date Depart</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Date Booking</th>
                                                <th>Detail</th>
                                                <th>Cancel</th>
                                                <th>Save</th>
                                                <th>Delete</th>
                                                <!--<th style="text-align: center;"> Room season price </th>-->
                                            </tr>
                                        </thead>
                                        <tbody>

<?php 
	 $book_title = $this->Booking_model->getbooking_title();
	 foreach($book_title as $Data){?>
<tr id="row<?php echo $Data->id ?>" class="removech">
                                            <th style="text-align:center;"> <input type="checkbox" class="delete_checkbox" value="<?php echo $Data->id ?>" /></th>
                                            <td><?php echo $Data->id ?></td>
                                            <td><?php echo $Data->date_depart ?></td>
                                            <td><?php echo $Data->cust_name ?><br><?php echo $Data->cust_telephone_num ?></td>
                                            <td style="text-align:center;"><?php echo number_format($Data->total_price) ?></td>
                                            <td><?php if ($Data->cf_status == 1){echo 'Pending';}else if($Data->cf_status == 2){echo 'Confrimed ';}else{echo 'Cancel';} ?></td>
                                            <td style="text-align:center;"><?php echo $this->Booking_model->GetEngDateTime2($Data->date_booking);?></td>
                                            <td style="text-align:center;" > <a href="#" onClick="windowOpener('770', '1000', 'windowName', '<?php echo $pthc?>Home/email_book_transport/<?php echo $Data->id?>')"><button type="button" class="btn btn-xs btn-info btn-sm" data-toggle="button" style="width: 88.28px" >Detail</button></a></td>
                                            <td style="text-align:center;" > <button <?php if ($Data->cf_status == 1){ ?> style="cursor: not-allowed;" <?php }?> type="button" class="btn btn-warning btn-sm" data-toggle="button" <?php if ($Data->cf_status == 1){ ?> disabled <?php   } ?> onClick="windowOpener('770', '1000', 'windowName', '<?php echo $pthc?>Home/email_book_transport/<?php echo $Data->id?>')"><i class="fa fa-archive"></i></button></td>
                                           
                                            <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm" <?php if ($Data->cf_status == 1){ ?> style="cursor: not-allowed;" <?php }?> onClick="save_data('<?php echo $Data->id ?>', 'tbl_pre_transport_booking_title')" <?php if ($Data->cf_status == 1){ ?> disabled <?php   } ?> ><i class="fa fa-archive"></i></button></td>
                                            <td style="text-align:center;"><button <?php if ($Data->cf_status != 1){ ?> style="cursor: not-allowed;" <?php }?> type="button" class="btn btn-danger btn-sm " onClick="delete_data('<?php echo $Data->id ?>', 'tbl_pre_transport_booking_title')" <?php if ($Data->cf_status != 1){ ?> disabled <?php   } ?>><i class="icon-trash"></i> </button></td>
                                        </tr>
                                           
<?php }  ?>

                                        </tbody>
                                    </table>
                                    <button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button>
<button type="button" name="save_all" id="save_all" class="btn btn-success btn-xs">Archive</button>
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
$(document).ready(function () {
    $("#ckbCheckAll").click(function () {
        $(".delete_checkbox").prop('checked', $(this).prop('checked'));
         $(".removech").addClass('removeRow');
    });
        $('.delete_checkbox').click(function(){
  if($(this).is(':checked'))
  {
   $(this).closest('tr').addClass('removeRow');
  }
  else
  {
   $(this).closest('tr').removeClass('removeRow');
  }
 });

 $('#delete_all').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {
   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url(); ?>Home/delete_alltransport",
    method:"POST",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     $('.removeRow').fadeOut(1500);
     $("#ckbCheckAll").prop('checked',false);
      setTimeout(function(){ window.location.href = "<?php echo base_url('Home')?>"; }, 2000);
    }
   })
  }
  else
  {
   alert('Select atleast one records');
  }
 });
 $('#save_all').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {
   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url(); ?>Home/save_allTransport",
    method:"POST",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     $('.removeRow').fadeOut(1500);
     $("#ckbCheckAll").prop('checked',false);
      setTimeout(function(){ window.location.href = "<?php echo base_url('Home')?>"; }, 2000);
    }
   })
  }
  else
  {
   alert('Select atleast one records');
  }
 });

});
        //--------------------------------------
        	 function windowOpener(windowHeight, windowWidth, windowName, windowUri)
			{
					var centerWidth = (window.screen.width - windowWidth) / 2;
					var centerHeight = (window.screen.height - windowHeight) / 2;
    				newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=yes,width=' + windowWidth +  ',height=' + windowHeight +  ',left=' +centerWidth + ',top=' + centerHeight);
					newWindow.focus();
					return newWindow.name;
		}
                  //----------------------
	function delete_data(dataID,table){  
		   $.post('<?php echo base_url('Home/deleteData')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'ลบข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                    setTimeout(function(){ window.location.href = "<?php echo base_url('Home')?>"; }, 2000);
				}else{
					swal({
						title: 'ไม่สามารถลบข้อมูลได้!',
						//text: "You won't be able to revert this!",
						type: 'warning',
						confirmButtonClass: 'btn btn-confirm mt-2'
					})
				}
			})

	}
                        //----------------------
	function save_data(dataID,table){  
		
		   $.post('<?php echo base_url('Home/saveData')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'จัดเก็บข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                    setTimeout(function(){ window.location.href = "<?php echo base_url('Home')?>"; }, 2000);
				}else{
					swal({
						title: 'ไม่สามารถจัดเก็บข้อมูลได้!',
						//text: "You won't be able to revert this!",
						type: 'warning',
						confirmButtonClass: 'btn btn-confirm mt-2'
					})
				}
			})
	}
</script>



</div>





  