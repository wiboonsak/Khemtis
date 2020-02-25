
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
.tbdt tr td{
  border-width:1px;
  border-style: solid;
  border-color:#000000;
}
.hlcolor:hover td{
  background-color:#f9e9e9;
  border-style:solid;
  border-width: 1px;
  border-color:red!important;
}
</style>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md page-full-width header-white dark-sidebar-color logo-dark" onload="Page_load();">
    <div class="page-wrapper">
    	<!-- start header and side menu-->   
		<?php include("Header.php"); ?>
    <?php echo $sevice = $this->input->get('service');?>
		<!-- start page content -->

    <div class="page-content-wrapper" style="padding-bottom:100px;">
       <div style="margin-top:150px;margin-left:20px;margin-right: 20px;">
<center>
  <h3>INCOME REPORT</h3>
</center>
                <table>
                  <tr><td>แสดงข้อมูลตาม&nbsp;&nbsp;</td><td>
                       <select>
                          <option value="HT">ALL</option>
                          <option value="HT">HOTEL</option>
                          <option value="BT">BOAT</option>
                          <option value="PK">PACKAGE</option>
                          <option value="RS">RESTAURANT</option>
                          <option value="TS">TRANSPORT</option>
                       </select>
                  </td>
                  <td>
                    วัน-เดือน-ปี
                  </td>
                  <td><input type="text" name=""></td>
                  <td>
                    วัน-เดือน-ปี
                  </td>
                  <td><input type="text" name=""></td>
                </tr>
                </table>

              <br>
       <table style="border-style:solid;border-width:1px;width:100%" class="tbdt">
          <tr style="text-align: center;background-color:#e6e6e6;color:#000000;color"><td rowspan="2">No.</td><td  rowspan="2">Client Name</td>
          <td colspan="2">Hotel</td><td colspan="2">Package</td><td colspan="2">Transport</td><td colspan="2">Speedboat</td><td colspan="2">Van</td><td colspan="2">Restuarant</td><td colspan="2">Total</td><td rowspan="2">Action</td></tr>
          <tr style="text-align: center;background-color:#e6e6e6;color:#000000"><td>Income</td><td>Commisstion</td><td>Income</td><td>Commisstion</td><td>Income</td><td>Commisstion</td><td>Income</td><td>Commisstion</td><td>Income</td><td>Commisstion</td><td>Income</td><td>Commisstion</td><td>Income</td><td>Commisstion</td></tr>

          <?php $noid=0; foreach($client_data as $value) { $noid++;?>
            <tr class="hlcolor" style="text-align: right;">
              <td style="text-align: center;background-color:#e6e6e6"><?php echo$noid?></td>
              <td style="padding-left:10px;text-align: left;"><?php echo$value->client_name?></td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td style="text-align:center;"><button type="button" onclick="window.location='http://control.khemtis.com/Statement?ID=<?php echo $value->client_id?>'" style="background-color:#9c2612;border-radius:5px;color:#ffffff;font-size:13px;cursor: pointer;">STATEMENT</button></td>
            </tr>

          <?php }?>
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