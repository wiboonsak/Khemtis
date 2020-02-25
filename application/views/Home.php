
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





	<!-- favicon -->
    <link rel="shortcut icon" href="<?=$pthc?>assets/img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark" onload="Page_load();">
    <div class="page-wrapper">
    
    	<!-- start header and side menu-->   
    
		<?php include("Header.php"); ?>
    
		<!-- start page content -->
        <div class="page-content-wrapper" style="padding-bottom: 50px;">
                <div class="page-content">
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
      

</script>


</body>
</html>