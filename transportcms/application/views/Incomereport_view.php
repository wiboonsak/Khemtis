
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
  border-color:#000000!important;
}
.ch_bt{
  background-color:#337ab7!important  ;border:1px solid  #000000;color:#ffffff;
}
.ch_bt:hover{
  background-color:#c56868!important;border:1px solid  #000000;color:#ffffff;

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
    <div style="margin-top:100px;margin-left:20px;margin-right: 20px;">
<?php 

function s_mont($txt){
$monthNum  = $txt;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('M');

return $monthName;
}


if($p_dc1=="" || $p_mc1=="" || $p_yc1==""){
$p_dc1 = date("d");
$p_mc1 = date("m");
$p_yc1 = date("Y"); 

$p_dc2 = date("d");
$p_mc2 = date("m");
$p_yc2 = date("Y"); 
}
?>
<br>
<center>
  <h3>INCOME REPORT</h3>
</center>
<h4>Form : <b><?php echo$p_dc1."-".$p_mc1."-".$p_yc1?></b> To <b><?php echo$p_dc2."-".$p_mc2."-".$p_yc2?></b></h4>
<table>
      <tr>
        <td>
<div style="width:100%;text-align:left;background-color:#e6e6e6">
 <table class="non_bd">
  <tr><td>Date:</td>
     <td>
      <select style="border-radius:3px;border:1px solid #cccccc" id="dc1">
         <?php $dy=1;for($dy=1;$dy<=31;$dy++){
               $txtd =  sprintf("%02d", $dy);
               $txt_s = "";
               if($p_dc1==$txtd){$txt_s = " selected";}else{$txt_s="";}
               echo "<option value='".$txtd."' ".$txt_s.">".$txtd."</option>";
         } ?>
      </select>
    </td>
     <td>
      <select style="border-radius:3px;border:1px solid #cccccc" id="mc1">
         <?php $my=1;for($my=1;$my<=12;$my++){
               $txtm  = sprintf("%02d", $my);
               $txt_s = "";
               if($p_mc1==$txtm){$txt_s = " selected";}else{$txt_s="";}
               echo "<option value='".$txtm."' ".$txt_s.">".s_mont($txtm)."</option>";
         } ?>
      </select>
    </td>
     <td>
      <select style="border-radius:3px;border:1px solid #cccccc" id="yc1">
         <?php $yy=(date("Y"));for($ty=($yy-2);$ty<=($yy+2);$ty++){
               $txt_s = "";
               if($p_yc1==$ty){$txt_s = " selected";}else{$txt_s="";}
               echo "<option value='".$ty."' ".$txt_s.">".$ty."</option>";
         } ?>
      </select>
  </td></tr></table>
                  </td>
                  <td>

<div style="width:100%;text-align:left;background-color:#e6e6e6">
 <table class="non_bd">
  <tr><td style="width:50px;text-align: center;">To</td>
     <td>
      <select style="border-radius:3px;border:1px solid #cccccc" id="dc2">
         <?php $dy=1;for($dy=1;$dy<=31;$dy++){
               $txtd  = sprintf("%02d", $dy);
               $txt_s = "";
               if($p_dc2==$txtd){$txt_s = " selected";}else{$txt_s="";}
               echo "<option value='".$txtd."' ".$txt_s.">".$txtd."</option>";
         } ?>
      </select>
    </td>
     <td>
      <select style="border-radius:3px;border:1px solid #cccccc" id="mc2">
         <?php $my=1;for($my=1;$my<=12;$my++){
               $txtm  = sprintf("%02d", $my);
               $txt_s = "";
               if($p_mc2==$txtm){$txt_s = " selected";}else{$txt_s="";}
               echo "<option value='".$txtm."' ".$txt_s.">".s_mont($txtm)."</option>";
         } ?>
      </select>
    </td>
     <td>
      <select style="border-radius:3px;border:1px solid #cccccc" id="yc2">
         <?php $yy=(date("Y"));for($ty=($yy-2);$ty<=($yy+2);$ty++){
               $txt_s = "";
               if($p_yc2==$ty){$txt_s = " selected";}else{$txt_s="";}
               echo "<option value='".$ty."' ".$txt_s.">".$ty."</option>";
         } ?>
      </select>
    </td>
    <td><input type="button" onclick="find_data()" 
      value="SEARCH" style="cursor:pointer;background-color:#888888;color:#ffffff;border-radius:3px;border-style:none;"></td>
  </tr>
 </table>
  </div>
                </td>
                </tr>
                </table>
              <br>
       <table style="border-style:solid;border-width:1px;width:100%" class="tbdt">
          <tr style="text-align: center;background-color:#e6e6e6;color:#000000;color">
          <td rowspan="2">No.</td>
          <td rowspan="2">Date</td>
          <td colspan="2">Package</td>
          <!--
          <td colspan="2">Package</td>
          <td colspan="2">Transport</td>
          <td colspan="2">Restuarant</td>
        -->
          <td colspan="2" style="background-color:#cccccc;font-weight:bold;color:#888888">Total</td>
          <td rowspan="2" style="background-color:#cccccc;font-weight:bold;color:#888888;display: none;">Action</td></tr>
          <tr style="text-align: center;background-color:#e6e6e6;color:#000000">
            <td>Income</td><td style="color:#547ca7">Commission</td>
  <!--
            <td>Income</td><td style="color:#547ca7">Commission</td>
            <td>Income</td><td style="color:#547ca7">Commission</td>
            <td>Income</td><td style="color:#547ca7">Commission</td>
  -->
         <td style="background-color:#cccccc;font-weight:bold;color:#888888">Income</td><td style="background-color:#cccccc;font-weight:bold;color:#888888">Commisstion</td>
          </tr>
<?php 

function  zenum($num){
$num_padded = sprintf("%02d", $num);
return $num_padded; 
}

$bgcolor = "#ffffff";
$def_m = 0;

  $a_date  = date('Y-m-d');
  $def_m = date('m');
  $def_lt =  date("t", strtotime($a_date));
  $def_y = date('Y');

$noid=0; 
$s_day = "";
$s_mo = "";
$s_yr = "";
$sum_total = 0;
 
$datetime1 = date_create($p_dc1.'-'.$p_mc1.'-'.$p_yc1); 
$datetime2 = date_create($p_dc2.'-'.$p_mc2.'-'.$p_yc2); 
  
// Calculates the difference between DateTime objects 
$interval = date_diff($datetime1, $datetime2); 
$numday =  $interval->format('%a');

$h_sumall = 0;$hc_sumall = 0;
$p_sumall = 0;$pc_sumall = 0;
$t_sumall = 0;$tc_sumall = 0;
$r_sumall = 0;$rc_sumall = 0;
$r_com_h = 0;
$r_com_t = 0;
$r_com_p = 0;
$r_com_r = 0;
$sumall_commis =0;
$cli_id = $idclient;
$new_day = "";
$d_add= "";
//$nummd = 0;
     for($b=0;$b<=$numday;$b++){
$datetime = new DateTime($p_yc1.'-'.$p_mc1.'-'.$p_dc1);
$datetime->modify('+'.$b.' day');
$d_add =  $datetime->format('d-m-Y');

       $next_day = "<font style='font-family: Arial, Helvetica, sans-serif'>".$d_add.'</font>';
       $new_day =$datetime->format('Y-m-d');
$sum_all= $this->Page_model->get_incom_price('All',$cli_id,$s_day,$s_mo,$s_yr,$new_day);
         $nnum_ht  = 0;
         $nnum_pk  = 0;
         $nnum_tr  = 0;
         $nnum_rr  = 0;
         $sum_all_service = 0;
         $sum_all_service_com = 0;
if(isset($sum_all))
{
         $nnum_ht  =  $sum_all['n_h'];
         $nnum_tr  =  $sum_all['n_t'];
         $nnum_pk  =  $sum_all['n_p'];
         $nnum_rr  =  $sum_all['n_r'];

   $h_sumall = ($h_sumall + $nnum_ht);
   $p_sumall = ($p_sumall + $nnum_pk);
   $t_sumall = ($t_sumall + $nnum_tr);
   $r_sumall = ($r_sumall + $nnum_rr);

         $sum_all_service = ($nnum_tr);
         $sum_total = $sum_total + $sum_all_service;
}

   //$hotel_comm = $this->Cl_model->get_service_comm('HOTEL',$cli_id);
     $tran_comm = $this->Cl_model->get_service_comm('TRANSPORT',$cli_id);
   //$pack_comm = $this->Cl_model->get_service_comm('PACKAGE',$cli_id);
   //$rest_comm = $this->Cl_model->get_service_comm('RESTAURANT',$cli_id);
   
   //$hotel_comm1 = ($hotel_comm * $nnum_ht) /100;
     $tran_comm1 = ($tran_comm * $nnum_tr) /100;
   //$pack_comm1 = ($pack_comm * $nnum_pk) /100;
   //$rest_comm1 = ($rest_comm * $nnum_rr) /100;

   $sum_all_service_com = ($tran_comm1);
   $sumall_commis = ($sumall_commis + $sum_all_service_com);

   //$hc_sumall = ($hc_sumall + $hotel_comm1);
   //$pc_sumall = ($pc_sumall + $pack_comm1);
     $tc_sumall = ($tc_sumall + $tran_comm1);
   //$rc_sumall = ($rc_sumall + $rest_comm1);

   $noid++;
 
          if($sum_all_service<1){$bgcolor="#fff4da";
           ?>
             <tr style="background-color:#ffffff"><td style="text-align: center;background-color:#e6e6e6"><?php echo$noid?></td><td style="padding-left:10px;text-align: left;"><?php echo$next_day?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
             </tr>
           <?php
                }else{$bgcolor="#fff4da";

           ?>
           
            <tr class="hlcolor" style="text-align: right;background-color:<?php echo$bgcolor?>">
              <td style="text-align: center;background-color:#e6e6e6"><?php echo$noid?></td>
              <td style="padding-left:10px;text-align: left;"><?php echo$next_day?></td>
              <!--
              <td>&nbsp;<?php //echo number_format($nnum_ht,2)?></td>
              <td style="color:#000000">&nbsp;<?php //echo number_format($hotel_comm1,2)?></td>
             
              <td>&nbsp;<?php// echo number_format($nnum_pk,2)?></td>
              <td style="color:#000000">&nbsp;<?php //echo number_format($pack_comm1,2)?></td>
           
              -->
              <td>&nbsp;<?php echo number_format($nnum_tr,2)?></td>
              <td style="color:#000000">&nbsp;<?php echo number_format($tran_comm1,2)?></td>
              
              <!--
              <td>&nbsp;<?php //echo number_format($nnum_rr,2)?></td>
              <td style="color:#000000">&nbsp;<?php //echo number_format($rest_comm1,2)?></td>
              -->
              <td style="color:red;font-weight: normal;">&nbsp;<?php echo number_format($sum_all_service,2)?></td>
              <td style="color:red;font-weight: normal;">&nbsp;<?php echo number_format($sum_all_service_com,2)?></td>


              <td onclick="window.location='http://control.khemtis.com/Statement?ID=<?php echo $cli_id?>'" style="display:none;font-size:11px;cursor: pointer;text-align:center;padding: 3px" class="ch_bt">STATEMENT</td>
            </tr>
          <?php }}?>
          <tr style="text-align: right;font-weight: bold;background-color:#ffffff">
<td></td>
<td></td>
<td><?php echo number_format($t_sumall,2)?></td>
<td><?php echo number_format($tc_sumall,2)?></td>
<!--
<td><?php// echo number_format($p_sumall,2)?></td>
<td><?php //echo number_format($pc_sumall,2)?></td>

<td><?php //echo number_format($t_sumall,2)?></td>
<td><?php //echo number_format($tc_sumall,2)?></td>

<td><?php //echo number_format($r_sumall,2)?></td>
<td><?php //echo number_format($rc_sumall,2)?></td>
-->
            <td style="font-weight: bold;color:red;text-align: right;"><?php echo number_format($sum_total,2)?></td><td style="font-weight: bold;color:red;text-align: right;"><?php echo number_format($sumall_commis,2)?></td></tr>
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
      
function find_data(){
   var dc1 = $('#dc1').val();
   var mc1 = $('#mc1').val();
   var yc1 = $('#yc1').val();

   var dc2 = $('#dc2').val();
   var mc2 = $('#mc2').val();
   var yc2 = $('#yc2').val();
    
   var date1 = yc1+mc1+dc1;
   var date2 = yc2+mc2+dc2;
if(date1>date2){
  alert("Start date is greater than the end date !");
  window.location="http://transportcms.khemtis.com/Incomereport";
}else{
   window.location="http://transportcms.khemtis.com/Incomereport?dc1="+dc1+"&mc1="+mc1+"&yc1="+yc1+"&dc2="+dc2+"&mc2="+mc2+"&yc2="+yc2;
}
}


function gopage(){
  var id_se = $('#id_se').val();
  window.location='http://control.khemtis.com/Incomereport?sevice='+id_se;

}

               function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
         }
     

</script>


</body>
</html>