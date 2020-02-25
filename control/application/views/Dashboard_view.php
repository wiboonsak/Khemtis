
<?php $pthc= base_url();?>
<?php  $this->load->model("Cl_bord_model");?>

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
    <link type="text/css" rel="stylesheet" href="http://www.khemtis.com/assets/font/font-icon/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="http://www.khemtis.com/assets/font/font-icon/font-flaticon/flaticon.css">
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



        <link type="text/css" rel="stylesheet" href="http://www.khemtis.com/assets/font/font-icon/font-awesome/css/font-awesome.css">
        <link type="text/css" rel="stylesheet" href="http://www.khemtis.com/assets/font/font-icon/font-flaticon/flaticon.css">

	<!-- favicon -->
    <link rel="shortcut icon" href="<?=$pthc?>assets/img/favicon.ico" /> 
        <link href="http://www.khemtis.com/assets/css/flag-icon.css" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<style type="text/css">
    
.bd_box{
    border-radius: 10px;
    border-style: solid;
    border-width: 3px;
    background-color:#b3c3d2;
 border-color:#eef1f5;
    padding:10px;
    cursor: pointer;
text-align: center!important;
}
.bd_box:hover{
    background-color: #337ab7;
    color:#ffffff;
  
}
.row_over:hover{
    background-color:#dbe0e4
}
.row_over{
    background-color:#ffffff;
}
.table-borderless td,
.table-borderless th {
    border: 0;
    padding: 0;
    padding-left:10px;
    text-align: center;


}
.table-borderless{
    width:50%;
}
.bd_box:hover .imgw{
      -webkit-filter: brightness(0) invert(1);
       filter: brightness(0) invert(1);
}

.fixbox{
       -webkit-filter: brightness(0) invert(1);
       filter: brightness(0) invert(1);
}

.fixtxt{
  background-color:#337ab7;
  color:#ffffff;
}

</style>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark" onload="Page_load();">
    <div class="page-wrapper">
    
    	<!-- start header and side menu-->   
    
		<?php include("Header.php"); ?>
    <?php echo $sevice = $this->input->get('service');?>
		<!-- start page content -->
        <div class="page-content-wrapper" style="padding-bottom: 100px;">
                <div style="margin-top: 150px;margin-left: 20px;">

            <table style="width:100%;height: auto;" class="table table-bordered">
                <tr><td style="width:20%;vertical-align: text-top;">
               <div style="width:100%;background-color:#337ab7;padding:20px;text-align: center;margin-bottom: 5px;color:#ffffff">
                <b> Booking All</b>
               </div>                  
              <div style="width:100%;background-color:#cccccc;padding:10px 0px 10px 0px;text-align: center;">
                 Booking of Client
               </div>   
<div style="width:100%;">
    <table style="width:100%">
       <?php 
          foreach ($show_client as $value) {
           
       ?>
         <tr class="row_over"><td>&nbsp;<?php echo$value->client_name?></td></tr>  
       <?php } ?>
    </table>
</div>


                </td><td style="width:80%;vertical-align: text-top;text-align: center;">
                    <center>
<div class="row" style="text-align: center;width:90%">
    <div class="col-md-2 bd_box <?php if($sevice=='Hotel'){echo"fixtxt";}else{echo'';}?>" onclick="window.location='http://control.khemtis.com/Dashboard?service=Hotel'">
    <center>
        <table class=" table-borderless" >
    <tr><td><img src="http://control.khemtis.com/assets/icon/hotel_icon.png" style="width:25px;" class="<?php if($sevice=='Hotel'){echo"fixbox";}else{echo"imgw";}?>"></td><td>
        00000<br>
       Hotel
   </td></tr></table>
   </center>
    </div>

    <div class="col-md-2 bd_box <?php if($sevice=='Package'){echo"fixtxt";}else{echo'';}?>" onclick="window.location='http://control.khemtis.com/Dashboard?service=Package'">
    <center>
        <table class=" table-borderless ">
    <tr><td><img src="http://control.khemtis.com/assets/icon/package_icon.png" style="width:30px;" class="<?php if($sevice=='Package'){echo"fixbox";}else{echo"imgw";}?>"></td><td>
        00000<br>
       Package
   </td></tr></table>
   </center>
    </div>
    <div class="col-md-2 bd_box <?php if($sevice=='Speedboat'){echo"fixtxt";}else{echo'';}?>" onclick="window.location='http://control.khemtis.com/Dashboard?service=Speedboat'">
    <center>
        <table class=" table-borderless ">
    <tr><td><img src="http://control.khemtis.com/assets/icon/speedboat_icon.png" style="width:35px;" class="<?php if($sevice=='Speedboat'){echo"fixbox";}else{echo"imgw";}?>"></td><td>
        00000<br>
       Speedboat
   </td></tr></table>
   </center>
    </div>
    <div class="col-md-2 bd_box <?php if($sevice=='Car'){echo"fixtxt";}else{echo'';}?>" onclick="window.location='http://control.khemtis.com/Dashboard?service=Car'">
    <center>
        <table class=" table-borderless ">
    <tr><td><img src="http://control.khemtis.com/assets/icon/car_icon.png" style="width:35px;" class="<?php if($sevice=='Car'){echo"fixbox";}else{echo"imgw";}?>"></td><td>
        00000<br>
       Car
   </td></tr></table>
   </center>
    </div>
    <div class="col-md-2 bd_box <?php if($sevice=='Routh'){echo"fixtxt";}else{echo'';}?>" onclick="window.location='http://control.khemtis.com/Dashboard?service=Routh'">
    <center>
        <table class=" table-borderless ">
    <tr><td><img src="http://control.khemtis.com/assets/icon/route_con.png" style="width:30px;" class="<?php if($sevice=='Routh'){echo"fixbox";}else{echo"imgw";}?>"></td><td>
        00000
        <br>
       Routh
   </td></tr></table>
   </center>
    </div>
    <div class="col-md-2 bd_box <?php if($sevice=='Restaurant'){echo"fixtxt";}else{echo'';}?>" onclick="window.location='http://control.khemtis.com/Dashboard?service=Restaurant'">
    <center>
        <table class=" table-borderless ">
    <tr><td><img src="http://control.khemtis.com/assets/icon/dinner_icon.png" style="width:30px;" class="<?php if($sevice=='Restaurant'){echo"fixbox";}else{echo"imgw";}?>"></td><td>
        00000<br>
       Restaurant
   </td></tr></table>
   </center>
    </div>


</div>
</center>

<div style="width:100%;border-width:1px;border-style: solid;height:auto;border-color:#cccccc;border-radius: 5px;margin-top: 20px;vertical-align: text-top;padding: 20px;">

<table style="width:100%">
    <tr style="background-color:#cccccc ">
      <th>No.</th> <th>Booking No.</th> <th>Check-in Date</th> <th>Status</th> <th>Amount</th> <th>Manage</th>
    </tr> 
    <?php $i=0; foreach($data_book as $value) {$i++?>
     <tr><td><?php echo$i?></td><td style="text-align:left">KT<?php echo str_replace('-','',$value->add_date) ?><?php echo$value->id_run?></td><td><?php echo$value->add_date ?></td><td>Paid</td><td>000</td><td onclick="myPopup('<?php echo base_url("/hotel_voucher.php")?>', 'web', 1050, 800)" style="cursor:pointer; "><button type="button" class="btn btn-primary">Voucher</button></td></tr>
<?php } ?>
</table>
</div>
            </td></tr>
            </table>

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
     <!-- end js include path -->


<script type="text/javascript">
      
               function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
         }
     

</script>


</body>
</html>