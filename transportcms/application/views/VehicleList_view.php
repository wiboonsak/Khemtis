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
                                    <header>Van Manage</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                      <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <button id="addRow1" class="btn" style="background-color: #628dab;color:#ffffff;" onclick="window.location.href='<?php echo base_url('Vehicle')?>'">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">

                                        <thead>
                                            <tr style="background-color:#628dab;color:#ffffff;">
                                                <th style="text-align: center;">Number</th>
                                                <th> Transport Name </th>
                                                <!--<th> Default Quata </th>
                                                <th> Max extra bed</th>-->
                                                <th style="text-align: center;"> Transport Active </th>
                                                <th style="text-align: center;"> Detail Transport </th>
                                                <!--<th style="text-align: center;"> Room season price </th>-->
                                            </tr>
                                        </thead>
                                        <tbody>

<?php $i=0;
if(isset($get_Van_list)){
 foreach($get_Van_list as $value_list){
    $i++;
    $tran_id = $value_list->tran_id; 
    $ch_p = '';
    //$hotel_id=$value_list->hotel_idrun;
       if($value_list->transport_active == 'Y'){  $ch_p = "lb_yes"; $ch_p2 = 'Yes'; }else{ $ch_p = "lb_no";  $ch_p2 = 'No'; }

	 $tran_detail = $this->Van_model->get_Van_title($tran_id);
	 foreach($tran_detail as $tran_detail2){}

?>

                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $i;?></td>
                                                <td><?php echo $tran_detail2->transport_name?></td>
                                                <!--<td><?php //echo $value_list->default_quota?></td>-->
                                                <!--<td><?php //echo $value_list->max_extra_bed?></td>-->
                                                <td style="text-align: center;"><div class="<?php echo $ch_p?>"><?php echo $ch_p2?></div></td>
                                                <td align="center"> 
                                                <button id="addRow1" class="btn select_bt" onclick="window.location.href='<?php echo base_url('Vehicle/VanDetail/').$tran_id?>'">
                                                    SELECT <i class="fa fa-wpforms"></i>
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












</script>



</div>





  