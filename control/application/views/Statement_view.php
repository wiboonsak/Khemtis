
<?php $pthc= base_url();?>
<?php $dataadmin =  $this->Cl_model->recheck_session();?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="รับประกันราคาดีที่สุดสำหรับโรงแรม รีสอร์ท โฮสเทล บ้านพัก และอื่นๆ อีกมากมายทั่วโลก ช่วยท่านค้นเจอที่พักถูกใจ" />
    <meta name="keywords" content="Khemtis, เข็มทิศ, จองโรงแรม, รีสอร์ท, ที่พัก, เกาะหลีเป๊ะ, ประเทศไทย, ต่างประเทศ, จองโรงแรมออนไลน์, จองห้องพัก, สำรองห้องพัก, เอเชีย, ยุโรป, อเมริกา, จองเรือ, จองรถตู้, จองทริปท่องเที่ยว, เกาะเต่า, เกาะล้าน, เกาะสมุย, เกาะพะงัน" />
    <meta name="author" content="Me-fi.com" />
    <title>KHEMTHIS | HOTEL LIST</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
  <!-- icons -->
    <link href="<?php echo $pthc?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <!--bootstrap -->
  <link href="<?php echo $pthc?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $pthc?>assets/plugins/summernote/summernote.css" rel="stylesheet">
   <!-- morris chart -->
    <link href="<?php echo $pthc?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
  <!-- animation -->
  <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/sweet-alert/sweetalert.min.css">
  <!-- Template Styles -->
    <link href="<?php echo $pthc?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  .txtstyle{
    border-radius:5px;
    border-style: solid;
    border-width: 1px;
    border-color:#cccccc;
    text-align: center;
   width:90%;
  }
.tblnone
  tr td{
  padding: 0 !important;
  margin: 0 !important;
}
</style>

  <!-- favicon -->
<link rel="shortcut icon" href="<?=$pthc?>assets/img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark"  onload="Page_load();">
    <div class="page-wrapper">
      <!-- start header and side menu-->    
    <?php include("Header.php"); ?>
    <!-- start page content -->
    <?php  foreach ($Client_data->result() AS $Data) {}?>
        <div class="page-content-wrapper" style="padding-bottom: 50px;">
                <div class="page-content">
<div style="margin-top: 7vw;width: 100%;background-color: #fafcff;padding: 10px;border-radius: 10px;border-color:#d5d5d5;border-width:1px;border-style: solid ;"
class="effect7" >
<div class="row">
    <div class="row" style="width:100%"> 
        <div class="col-md-4" style="text-align:center; "><h2>STATEMENT</h2></div>
        <div class="col-md-4" style="text-align:center; margin-top: 27px">
             <a href="http://control.khemtis.com/Incomereport"><button type="button" class="btn btn-info">Back</button></a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">
  Transfer Money</button>
           
        </div>
        <div class="col-md-4" style="text-align:center;"><h2><?php echo $Data->client_name?></h2></div>
    
<div class="col-md-12">                                  
                                       <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr style="background-color:#5f7790;color:#ffffff;text-align: center;">
                                                <th>Date</th>
                                                <th>ID Booking</th>
                                                <th>Service</th>
                                                <th>Income</th>
                                                <th>Commission</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
 <?php  foreach ($statement_data->result() AS $statement_data1) {?>
                                            <tr class="odd gradeX">
                                            
                                                <td><?php echo $this->Statement_model->GetEngDate($statement_data1->date)?> <?php echo $statement_data1->time?></td>
                                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $statement_data1->id?>">
  Transfer Money</button></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            
                                            </tr>
 <?php }?>
                                        </tbody>
                                    </table>

    </div>
    </div>
    </div>
        <!-- end chat sidebar -->
    </div>
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form enctype="multipart/form-data" id="statementForm" name="statementForm">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer Money to Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Client Name
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <label class="control-label" ><?php echo $Data->client_name?></label>
                                                        <input type="hidden" class="form-control" name="client_name" id="client_name" value="<?php echo $Data->client_name?>" /> 
                                                    <input type="hidden" class="form-control" name="client_id" id="client_id" value="<?php echo $Client_id?>" />
                                                    </div>
                                                </div>
                                            </div>
        <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Date
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <input class="form-control date-picker" name="Date" id="Date" type="date" value="" autocomplete="true"> 
                                                    </div>
                                                </div>
                                            </div>
        <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Time
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <input class="form-control " name="Time" id="Time" type="time" value="" autocomplete="true"> 
                                                    </div>
                                                </div>
                                            </div>
          <div class="form-group row  ">
              <label class="control-label col-md-4" style="padding-left: 50px;" >Bank
                                                    <span class="required">   </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <select name="Bank" id="Bank"  class="form-control" >                                                          
                                                            <option value="Bangkok Bank">Bangkok Bank</option>
                                                            <option value="Bank of Ayudthaya">Bank of Ayudthaya</option>
                                                            <option value="CIMB Thai Bank">CIMB Thai Bank</option>
                                                            <option value="Kasikorn Bank">Kasikorn Bank</option>
                                                            <option value="Kiatnakin Bank">Kiatnakin Bank </option>
                                                            <option value="Krung Thai Bank">Krung Thai Bank</option>
                                                            <option value="Siam Commercial Bank">Siam Commercial Bank</option>
                                                            <option value="Thanachart Bank">Thanachart Bank</option>
                                                            <option value="Tisco Bank">Tisco Bank</option>
                                                            <option value="TMB Bank">TMB Bank </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  
      <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Amount
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <input class="form-control" name="Amount" id="Amount" type="text" value="" autocomplete="true"> 
                                                    </div>
                                                </div>
                                            </div>
      <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Slip Photo
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <input class="form-control" name="img[]" id="img" type="file" > 
                                                    </div>
                                                </div>
                                            </div>
      </div>
      <div class="modal-footer" >
          <button type="button" class="btn btn-primary" onclick="sumbitstatement()">SUBMIT</button>
      </div>
        </form>
    </div>
  </div>
</div>
    <?php  foreach ($statement_data->result() AS $statement_data1) {
        $detail = $this->Statement_model->statement_id($statement_data1->id);
        foreach ($detail->result() AS $detail1) {}
        ?>
            <div class="modal fade bd-example-modal-lg<?php echo $statement_data1->id?>" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form enctype="multipart/form-data" id="statementForm" name="statementForm">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer Money to Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Client Name
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <label class="control-label" ><?php echo $detail1->client_name?></label>
                                                       
                                                    </div>
                                                </div>
                                            </div>
        <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Date
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <label class="control-label" ><?php echo $this->Statement_model->GetEngDate($detail1->date)?></label>
                                                    </div>
                                                </div>
                                            </div>
        <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Time
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <label class="control-label" ><?php echo $detail1->time?></label>
                                                    </div>
                                                </div>
                                            </div>
          <div class="form-group row  ">
              <label class="control-label col-md-4" style="padding-left: 50px;" >Bank
                                                    <span class="required">   </span>
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <label class="control-label" ><?php echo $detail1->bank?></label>
                                                    </div>
                                                </div>
                                            </div>  
      <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Amount
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <label class="control-label" ><?php echo number_format($detail1->amount,2)?></label>
                                                    </div>
                                                </div>
                                            </div>
      <div class="form-group row  ">
                                                <label class="control-label col-md-4" style="padding-left: 50px;">Slip Photo
<!--                                                    <span class="required"> * </span>-->
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <img src="<?php echo base_url('uploadfile/').$detail1->slip?>" style="width:250px;">
                                                    </div>
                                                </div>
                                            </div>
      </div>
      <div class="modal-footer" >
         
      </div>
        </form>
    </div>
  </div>
</div>
    <?php }?>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2018 &copy; KHEMTIS.COM. Powered by 
            <a href="http://www.me-fi.com" target="_top" class="makerCss">ME-FI.com</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="border-radius:10px;">
  <div class="modal-dialog" role="document" style="border-radius:10px;">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
  <div class="col-md-12">
<div  style="margin-bottom:10px;font-size:18px;background-color:#edeff2;padding: 5px;">Set  Commission Price Service</div>
<form action="<?php echo $pthc?>Commission/update_commp" method="post">
  <input type="hidden" name="client_id" id="client_id" value="">
    <div id="txt_service" style="margin-bottom:20px;"></div>
<center>
<button type="submit" class="btn btn-primary" style="width:150px;">SAVE</button>
</center>
</form>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- end footer -->
    <!-- start js include path -->
    
    <script src="<?=$pthc?>assets/plugins/jquery/jquery.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/popper/popper.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=$pthc?>assets/plugins/jquery-validation/js/jquery.validate.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-validation/js/additional-methods.min.js" ></script>

    <!-- bootstrap -->
    <script src="<?=$pthc?>assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/sparkline/jquery.sparkline.min.js" ></script>
    <script src="<?=$pthc?>assets/js/pages/sparkline/sparkline-data.js" ></script>

    <!-- notifications -->
    <script src="<?=$pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/jquery-toast/dist/toast.js" ></script>
       <!-- Sweet Alert -->
    <script src="<?php echo $pthc?>assets/plugins/sweet-alert/sweetalert.min.js" ></script>
    <script src="<?php echo $pthc?>assets/js/pages/sweet-alert/sweet-alert-data.js" ></script>

    <!-- Common js-->

    <script src="<?=$pthc?>assets/js/app.js" ></script>
  <!--  <script src="<?=$pthc?>assets/js/pages/validation/form-validation.js" ></script>-->
    <script src="<?=$pthc?>assets/js/layout.js" ></script>
    <script src="<?=$pthc?>assets/js/theme-color.js" ></script>
    
    <!-- material -->
    <script src="<?=$pthc?>assets/plugins/material/material.min.js"></script>
    <!-- animation -->
    <script src="<?=$pthc?>assets/js/pages/ui/animations.js" ></script>
    <!-- morris chart -->
    <script src="<?=$pthc?>assets/plugins/morris/morris.min.js" ></script>
    <script src="<?=$pthc?>assets/plugins/morris/raphael-min.js" ></script>
    <script src="<?=$pthc?>assets/js/pages/chart/morris/morris_home_data.js" ></script>


 <?php if(isset($data_table) AND $data_table==true){ ?>
        <!-- data tables -->
    <script src="<?php echo $pthc?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $pthc?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
    <script src="<?php echo $pthc?>assets/js/pages/table/table_data.js" ></script>
  <?php }?>

<script type="text/javascript">
 function sumbitstatement(){
       var Client_id = <?php echo $Client_id?>;
       var date = $('#Date').val();
       var time = $('#Time').val();
       var Bank = $('#Bank').val();
       var Amount = $('#Amount').val();
       var Slip = $('#img').val();
      
        if (date == '') {
            swal(
                    {
                        title: 'Please select Date!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
     }else if(time == ''){ 
			    swal(
					{
						title: ' Please select Time!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(Bank == ''){ 
			    swal(
					{
						title: ' Please select Bank!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(Amount == ''){ 
			    swal(
					{
						title: ' Please enter Amount!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
     }else if(Slip == ''){ 
			    swal(
					{
						title: ' Please enter Slip photo!',
						confirmButtonClass: 'btn btn-confirm mt-2',
						type: 'warning'
					}
				)
        } else {

            //---------------------------------------------
            var postData = new FormData($("#statementForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Statement/addstatement') ?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data, status) {
                    if (status == 'success') {
                        swal({
                            title: 'Successfully saved.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                     setTimeout(function(){ window.location.href = "http://control.khemtis.com/Statement?ID="+Client_id; }, 2000);
        } else {
                        swal({
                            title: 'can not be saved.!',
                            //text: "You won't be able to revert this!",
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                    }
    }
            });
       }
 }
 
    </script>

</body>
</html>