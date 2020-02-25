<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->



<section class="flight-list" style="margin-top: -20px;">

                                <!-- Flight List Head -->
                                <div class="flight-list-head"> 
      
                                    <h3><?php echo $WAYTO?> : <?php echo $location1?> - <?php echo $location2?></h3>
                                    <br><i class="far fa-calendar-alt"></i><span style="color: orangered"> <?php echo $DateTravel?></span>
                                </div>
                                <!-- Flight List Head -->
                                <!-- Flight List Table -->
                                <div class="flight-list-cn">
                                    <div class="responsive-table ">
                                       
										<table class="table flight-table table-radio">
                                            <thead>
                                                <tr>
                                                    <th style="padding-left: 10px;">Select</th>
                                                    <th class="text-center">Vehicle</th>
                                                    <th class="text-center">Departure</th>
                                                    <th class="text-center">Arrival</th>
                                                    <th class="text-center">Duration</th>
                                                    <th class="text-center">Adult</th>
                                                    <th class="text-center">Child</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
<?php
if($WAYTO =="DEPART"){
	$txtdep="";$ar_st= array();
  $tbl_transport_route_data =  $this->Routetranfer_model->tbl_transport_route_data_code($v_num1,$v_num2);
  $idrun_st=0;
  $txt_company = "";
  foreach ($tbl_transport_route_data as $value) {$idrun_st++;
     $route_id = $value->route_id;
     $id_time = $value->id_time;
  	 $txtdep = $value->tran_name;
     $ar_st= $this->Routetranfer_model->gettime_max_min($id_time);
     $dura = $value->dura;
        $num_price = explode("=",$value->num_price);
        $txt_company  = $value->client_name;
        $get_detail = $this->Routetranfer_model->get_transport_detail($route_id);
        $deley = diff2time($ar_st[0].":00",$ar_st[1].":00");
   // $data_time = $this->Routetranfer_model->get_data_timeline();
?>
<tr style="cursor: pointer;" onclick="show_box(<?php echo$idrun_st?>,'<?php echo $route_id?>','<?php echo $id_time?>' , '<?php echo$ar_st[0]." - ".$ar_st[1]?>' , '<?php echo$deley?>' , '<?php echo $num_price[0]?>' , '<?php echo $num_price[1]?>' , '<?php echo $WAYTO?>',true)" class="rowtd" id="rows<?php echo$idrun_st?>">
<td>
  <input type="radio" class="new_radio" name="dep" id=icheck<?php echo$idrun_st?>>
</td>
<td>
 <table style="padding:0px!important;margin:0px!important;"><tr><td>
  <?php echo str_replace(","," + ",$txtdep)?>&nbsp;<i class="fa fa-info-circle"></i></td></tr><tr><td>
<font style="color:#b16161;font-size:13px;"><?php echo$txt_company?></font>
</td></tr></table>
</td>
   <td style="text-align: center;"><?php echo $ar_st[0]?></td>
   <td style="text-align: center;"><?php echo $ar_st[1]?></td>
   <td style="text-align: center;"><?php echo $deley?></td>
   <td style="text-align: right;"><?php echo number_format($num_price[0],2)?></td>
   <td style="text-align: right;"><?php echo number_format($num_price[1],2)?></td>
   <td style="text-align: right;"><?php echo number_format(($num_price[0]+$num_price[1]),2)?></td>
</tr>
<tr><td colspan="8" style="border-style:none!important;padding:0px!important  "><div class="content_hid bubble" id="colep<?php echo$idrun_st?>">
   <table style="font-size:12px">
       <?php
       $sumall = 0; 
       $ir=0;
                $ad_txt = "";
                $ch_txt = "";
          foreach ($get_detail  as $value_detail) {$ir++;
           $suball = ($value_detail->price+$value_detail->price_children);
           $sumall = $sumall + $suball;
            $ad_txt = $ad_txt."/".$value_detail->price;
            $ch_txt = $ch_txt."/".$value_detail->price_children;
       ?>
       <tr><td class="bddoc"><div class="cicle_box"><?php echo$ir?></div></td><td class="padtd"><b><?php echo$value_detail->arrive_time?></b> <?php echo$value_detail->name_st?> <i class='fas fa-arrow-right'></i>  <b><?php echo$value_detail->depart_time?></b> <?php echo$value_detail->name_en?></td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Transport : <b><?php echo$value_detail->transport_name?></b>
          &nbsp;(&nbsp; Adult&nbsp;x <?php echo$value_detail->price?> )&nbsp;(&nbsp; Child&nbsp;x <?php echo$value_detail->price_children?>&nbsp;) = <u><?php echo number_format($suball,2)?></u>
       </td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Check-in : <?php echo$value_detail->note_checkin_en?></td></tr>
       <tr><td class="bddoc"></td><td style="border-bottom: 1px dotted #cccccc"></td></tr>
       <?php } ?>
       <tr><td>&nbsp;</td><td><b> Total: </b><u><?echo number_format($sumall,2)?></u></td></tr>
   </table>
</div>
<input type="hidden" value="<?php echo substr($ad_txt,1)?>" id="dpa_<?php echo$idrun_st?>">
<input type="hidden" value="<?php echo substr($ch_txt,1)?>" id="dpc_<?php echo$idrun_st?>">
</td></tr>
<?php 
}}
?>

<?php
if($WAYTO =="RETURN"){
	$txtret="";$ar_en = array();
  $tbl_transport_route_data =  $this->Routetranfer_model->tbl_transport_route_data_code($v_num2,$v_num1);
  $idrun_en=0;$deley='';
  foreach ($tbl_transport_route_data as $value) {$idrun_en++;
     $route_id = $value->route_id;
     $id_time = $value->id_time;
  	 $txtret = $value->tran_name;
     $ar_en= $this->Routetranfer_model->gettime_max_min($id_time);
     $dura = $value->dura;
         $num_price = explode("=",$value->num_price);
         $txt_company  = $value->client_name;
         $get_detail = $this->Routetranfer_model->get_transport_detail($route_id);
         $deley = diff2time($ar_en[0].":00",$ar_en[1].":00");
?>

<tr style="cursor: pointer;" onclick="show_box_r(<?php echo$idrun_en?>,'<?php echo $route_id?>','<?php echo $id_time?>' , '<?php echo$ar_en[0]." - ".$ar_en[1]?>' , '<?php echo$deley?>' , '<?php echo $num_price[0]?>' , '<?php echo $num_price[1]?>' , '<?php echo $WAYTO?>',true)" class="rowtd" id="rowe<?php echo$idrun_en?>">
<td>
  <input type="radio" class="new_radio" name="ret" id=icheck<?php echo$idrun_en?>>
</td>
<td>
<table style="padding:0px!important;margin:0px!important;"><tr><td>
<?php echo str_replace(","," + ", $txtret)?>&nbsp;<i class="fa fa-info-circle"></i></td></td></tr><tr><td>
<font style="color:#b16161;font-size:12px;"><?php echo$txt_company?></font>
</td></tr></table>
  <td style="text-align: center;"><?php echo $ar_en[0]?></td>
  <td style="text-align: center;"><?php echo $ar_en[1]?></td>
  <td style="text-align: center;"><?php echo $deley?></td>
  <td style="text-align: right;"><?php echo number_format($num_price[0],2)?></td>
  <td style="text-align: right;"><?php echo number_format($num_price[1],2)?></td>
  <td style="text-align: right;"><?php echo number_format(($num_price[0]+$num_price[1]),2)?></td>
</tr>
<tr><td colspan="8" style="border-style:none!important;padding:0px!important  "><div class="content_hid bubble" id="colep_r<?php echo$idrun_en?>">
<table style="font-size:12px">
       <?php
       $sumall = 0; 
       $ir=0;
                $ad_txt = "";
                $ch_txt = "";
          foreach ($get_detail  as $value_detail) {$ir++;
            $suball = ($value_detail->price+$value_detail->price_children);
            $sumall = $sumall + $suball;
            $ad_txt = $ad_txt."/".$value_detail->price;
            $ch_txt = $ch_txt."/".$value_detail->price_children;
       ?>
       <tr><td class="bddoc"><div class="cicle_box"><?php echo$ir?></div></td><td class="padtd"><b><?php echo$value_detail->arrive_time?></b> <?php echo$value_detail->name_st?> <i class='fas fa-arrow-right'></i>  <b><?php echo$value_detail->depart_time?></b> <?php echo$value_detail->name_en?></td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Transport : <b><?php echo$value_detail->transport_name?></b>
          &nbsp;(&nbsp; Adult&nbsp;x <?php echo$value_detail->price?> )&nbsp;(&nbsp; Child&nbsp;x <?php echo$value_detail->price_children?>&nbsp;) = <u><?php echo number_format($suball,2)?></u>
       </td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Check-in : <?php echo$value_detail->note_checkin_en?></td></tr>
       <tr><td class="bddoc"></td><td style="border-bottom: 1px dotted #cccccc"></td></tr>
       <?php } ?>
       <tr><td>&nbsp;</td><td><b> Total: </b><u><?echo number_format($sumall,2)?></u></td></tr>
   </table>
</div>
<input type="hidden" value="<?php echo substr($ad_txt,1)?>" id="rea_<?php echo$idrun_en?>">
<input type="hidden" value="<?php echo substr($ch_txt,1)?>" id="rec_<?php echo$idrun_en?>">
</td></tr>
<?php 
}}
?>
                                                                
                                            </tbody>
                                        </table>
							
                                    </div>
                                </div>
                                <!-- End Flight List Table -->
                            </section>
					