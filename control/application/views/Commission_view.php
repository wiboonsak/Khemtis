
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
        <div class="page-content-wrapper" style="padding-bottom: 50px;">
                <div class="page-content">
<div style="margin-top: 7vw;width: 100%;background-color: #fafcff;padding: 10px;border-radius: 10px;border-color:#d5d5d5;border-width:1px;border-style: solid ;"
class="effect7" >
<div class="row">
<div class="col-md-12">                                  
                                       <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr style="background-color:#5f7790;color:#ffffff;text-align: center;">
                                               <th >No. </th>
                                                <th >Client Name </th>
                                                <th> Contact Person  </th>
                                                <th> Contact Address   </th>
                                                <th> Contact Phone  </th>
                                                <th> Contact Email   </th>
                                                <th> Commission Service  </th>
                                                <th> Commission Data </th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php $i=0;


if(isset($tbl_client_service)){
 foreach($tbl_client_service as $value_list){$i++;
$txt_tbl_comm = "";$artxt = "";
$hotel_comm = $this->Cl_model->get_service_comm('HOTEL',$value_list->client_id);
$ars = explode(",",$value_list->tbl_all_sevice);
for($j=0;$j<count($ars);$j++){
  if($ars[$j]=="HOTEL"){
     $artxt = $artxt.',HOTEL='.$hotel_comm;
     $txt_tbl_comm = $txt_tbl_comm."<td style='text-align:center;border-color:#cccccc!important'>".$ars[$j]."<br>".$hotel_comm."%</td>";
  }else{
     $artxt = $artxt.',NONE=0';
     $txt_tbl_comm = $txt_tbl_comm."<td style='text-align:center;border-color:#cccccc!important'>".$ars[$j]."<br>0%</td>";
  }
}
?>
                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $i;?></td>
                                                <td><?php echo$value_list->client_name?></td>
                                                <td><?php echo$value_list->contact_person?></td>
                                                <td><?php echo$value_list->contact_addr?></td>
                                                <td><?php echo$value_list->contact_phone?></td>
                                                <td><?php echo$value_list->contact_email?></td>
                                                <td><table style="width:100%;" class="tblnone"><tr><?php echo$txt_tbl_comm?></tr></table></td>
                                                <td align="center"> 
                                                <button id="addRow1" class="btn select_bt"  onclick="show_modal('<?php echo$value_list->tbl_all_sevice?>','<?php echo$artxt?>',<?php echo$value_list->client_id?>)">
                                                    SELECT <i class="fa fa-wpforms"></i>
                                                </button>
                                              </td>
                                            </tr>
<?php  }}?>
                                        </tbody>
                                    </table>

    </div>
    </div>
    </div>
        <!-- end chat sidebar -->
    </div>
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
     <!-- end js include path -->
 <SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<script type="text/javascript">
      function show_modal(txtsr,artxt,client_id){
        $('#client_id').val(client_id);
        var artxt1 = artxt.substr(1);
        var resj =  artxt1.split(",");
         $('#txt_service').empty();
        var res = txtsr.split(",");
        var txtdata = "";
        var i = 0;
        for(i=0;i<res.length;i++){
          var numcomm = 0;
          var spr_comm =  resj[i].split("=");
          if(spr_comm[0]==res[i]){numcomm=spr_comm[1];}else{numcomm=0;}
          txtdata = txtdata+"<tr><td><div class='row'><div class='col-md-3' style='padding-left:30px;'>"+res[i]+"</div><div class='col-md-9'> <input type='text'  value='"+numcomm+"' onkeypress='return isNumberKey(event)' class='txtstyle' id='"+res[i]+"' name='"+res[i]+"'>&nbsp;%</div></td></tr>";
        }
         $('#exampleModalLong').modal('show');
         $('#txt_service').html("<table style='width:100%'>"+txtdata+"</table>");
      }
</script>

</body>
</html>