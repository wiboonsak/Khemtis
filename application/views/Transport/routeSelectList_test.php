<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->

<?php 

$originalDate = $str_date;
 $str_date = date("Y-m-d", strtotime($originalDate));
?>

<section class="flight-list" style="margin-top: -20px;">

                                <!-- Flight List Head -->
                                <div class="flight-list-head"> 
      
                                    <h3><?php if($WAYTO=="DEPART"){
                                           echo $tr_ar['DEPART'];
                                      }else{
                                           echo $tr_ar['RETURN'];
                                      }?> : <?php echo $location1?> - <?php echo $location2?></h3>
                                    <i class="far fa-calendar-alt"></i><span style="color: orangered;font-weight: bold;"> <?php echo frmd($DateTravel)?></span>
                                </div>
                                <!-- Flight List Head -->
                                <!-- Flight List Table -->
                                <div class="flight-list-cn">
                                    <div class="responsive-table ">
                                       
										<table class="table flight-table table-radio">
                                            <thead>
                                                <tr>
                                                    <th style="padding-left: 10px;"><?php echo$tr_ar['Select']?></th>
                                                    <th class="text-center"><?php echo$tr_ar['Vehicle']?></th>
                                                    <th class="text-center"><?php echo$tr_ar['Departure']?></th>
                                                    <th class="text-center"><?php echo$tr_ar['Arrival']?></th>
                                                    <th class="text-center"><?php echo$tr_ar['Duration']?></th>
                                                    <th class="text-center"><?php echo$tr_ar['Adult']?></th>
                                                    <th class="text-center"><?php echo$tr_ar['Children']?></th>
<!--                                                    <th class="text-center">Total</th>-->
                                                </tr>
                                            </thead>
                                            <tbody> 
<?php



if($WAYTO =="DEPART"){
$idrun_st = 0;
$route_id = $this->Routetranfer_model->checkRoute($v_num1,$v_num2);
$numroute = $route_id->num_rows();
if($numroute >0){
    foreach($route_id->result() as $route_id1){
	$x=''; $n=1; $txt_routeType =''; $times1=''; $nRows=1; 
        $txt_company =  $this->Routetranfer_model->get_Client_id($route_id1->route_id);
	$Routetype = $this->Routetranfer_model->get_routeType($route_id1->route_id,$x, '1', 'yes', 'key_group');
	foreach ($Routetype->result() as $Data){ $idrun_st++;
	$countDetail = $this->Routetranfer_model->count_detailTimeTable($route_id1->route_id,$Data->key_group);
	$countnum = $countDetail->num_rows();
	if($countnum >0){
	$routeType2 = $this->Routetranfer_model->get_routeType($route_id1->route_id, $Data->key_group, '1', $x, 'id');		
	foreach($routeType2->result() as $routeType3){ 

	if($n == 1){ $txt = ''; } else { $txt = ' + '; }

	$listTransport = $this->Routetranfer_model->listTransport($routeType3->transport_id);
	foreach($listTransport->result() as $listTransport2){}			
	$txt_routeType = $txt_routeType.$txt.$listTransport2->transport_name;

$n++; }

?>


	<?php   $times = $this->Routetranfer_model->get_timeDetail($route_id1->route_id,$Data->key_group,'1','','',$str_date);	
			 $numTime = count($times);
       $num_n1 = $num_n1 + $numTime;
			   $p =1;
				if($numTime >0){						   	
				foreach($times as $times2){ $idrun_st++; 
				 $times1 = date('H:i', strtotime($times2->arrive_time.'+'.$Data->transfer_h_time.' hours'));	
				 $times1 = date('H:i', strtotime($times1.'+'.$Data->transfer_m_time.' minutes'));

				 $price1 = $this->Routetranfer_model->getPrice($times2->id,'price','1');
				 $price2 = $this->Routetranfer_model->getPrice($times2->id,'price_children','1');
				 $price3 = ($price1*$Adults1)+($price2*$Children1);
         // $data_time = $this->Routetranfer_model->get_data_timeline();


        $deley = diff2time($Data->transfer_h_time.":00",$Data->transfer_m_time.":00");
  
$deley_new  = "";
if($Data->transfer_h_time!=''){
   $deley_new =  $Data->transfer_h_time = str_replace("0", "", $Data->transfer_h_time);
}
   $deley_new = $deley_new." h ".$Data->transfer_m_time." m";


                               
?>
<tr class="" id="rows<?php echo $idrun_st?>">
<td>
  <input type="radio" class="new_radio rowtd" name="dep" id=icheck<?php echo$idrun_st?> onclick="show_box(<?php echo $idrun_st?>,'<?php echo $route_id1->route_id?>','<?php echo $times2->id?>' , '<?php echo $times2->arrive_time." - ".$times1?>' , '<?php echo $deley_new?>' , '<?php echo $price1?>' , '<?php echo $price2?>' , '<?php echo $WAYTO?>',true)" >
</td>
<td>
 <table style="padding:0px!important;margin:0px!important;"><tr><td>
  <?php echo $txt_routeType?>&nbsp;<i class="fa fa-info-circle"></i></td></tr><tr><td>
<font style="color:#b16161;font-size:13px;"><?php echo $txt_company?></font>
</td></tr></table>
</td>
   <td style="text-align: center;"><?php echo $times2->arrive_time?></td>
   <td style="text-align: center;"><?php echo $times1?></td>
   <td style="text-align: center;"><?php echo$deley_new?></td>
   <td style="text-align: right;"><?php echo number_format($price1,2)?></td>
   <td style="text-align: right;"><?php echo number_format($price2,2)?></td>
<!--   <td style="text-align: right;"><?php //echo number_format(($num_price[0]+$num_price[1]),2)?></td>-->
</tr>
<tr><td colspan="8" style="border-style:none!important;padding:0px!important  "><div class="content_hid bubble" id="colep<?php echo$idrun_st?>">
   <table style="font-size:12px">
     <?php $checkDetail = $this->Routetranfer_model->checkDetail($times2->id, '1');
			$numchDetail = $checkDetail->num_rows();
			if($numchDetail>0){
				$a =0; $arr =''; $arr2 ='';$checkin1 = "";$txt_line_de='';
				foreach ($checkDetail->result() as $checkDetail2){
        $a++;
       
				$pricedetail1 = $this->Routetranfer_model->getPrice($times2->id,'price','1',$checkDetail2->data_order);
				$pricedetail2 = $this->Routetranfer_model->getPrice($times2->id,'price_children','1',$checkDetail2->data_order);
				$pricedetail3 = ($pricedetail1*$Adults1)+($pricedetail2*$Children1);
				$arr = $arr.'/'.$pricedetail1;
				$arr2 = $arr2.'/'.$pricedetail2;
                                
                                $checkroute = $this->Routetranfer_model->list_placeData($checkDetail2->begin_place_id);  foreach ($checkroute->result() as $checkroute2){}
                                $checkroute3 = $this->Routetranfer_model->list_placeData($checkDetail2->destination_place_id); foreach ($checkroute3->result() as $checkroute4){}
                                $checktransport = $this->Routetranfer_model->list_transportData($checkDetail2->transport_id);foreach ($checktransport->result() as $checktransport2){}

   $checkin1 = $checkin1."[=]".$checkDetail2->arrive_time."&nbsp;".$checkroute2->place_title;
   $txt_line_de = $txt_line_de.",".$checkDetail2->arrive_time."&nbsp;".$checkroute2->place_title.'<->'.$checkDetail2->depart_time."&nbsp;".$checkroute4->place_title;
			?>
       <tr><td class="bddoc"><div class="cicle_box"><?php echo $a?></div></td><td class="padtd"><b><?php echo $checkDetail2->arrive_time?></b> <?php echo $checkroute2->place_title?> <i class="fa fa-arrow-circle-right custom" ></i> <b><?php echo $checkDetail2->depart_time?></b> <?php echo $checkroute4->place_title?></td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Transport : <b><?php echo $checktransport2->transport_name?></b>
          &nbsp;(&nbsp; Adult Price&nbsp;<?php echo $Adults1?> x <?php echo number_format($pricedetail1,2)?> )&nbsp;(&nbsp; Child Price&nbsp;<?php echo $Children1?> x <?php echo number_format($pricedetail2,2)?>&nbsp;) = <u> <?php echo number_format($pricedetail3,2)?></u>
       </td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Check-in : <?php echo $checkDetail2->note_checkin_en?></td></tr>
       <tr><td class="bddoc"></td><td style="border-bottom: 1px dotted #cccccc"></td></tr>
                        <?php }  $checkin1;}?>
       <tr><td>&nbsp;</td><td><b> Total: </b><u><?php echo number_format($price3,2)?></u></td></tr>
   </table>
</div>

<input type="hidden" value="<?php echo substr($txt_line_de,1)?>" id="dep_ar<?php echo$idrun_st?>">
<input type="hidden" value="<?php echo substr($arr,1)?>" id="dpa_<?php echo$idrun_st?>">
<input type="hidden" value="<?php echo substr($arr2,1)?>" id="dpc_<?php echo$idrun_st?>">
<input type="hidden" value="<?php echo$checkin1?>" id="dp_in_<?php echo $idrun_st?>">

</td></tr>
<?php $p++; $nRows++; }}?>
<?php $txt_routeType='';$n=1;}}}}}?>
<?php
if($WAYTO =="RETURN"){
    $idrun_en = 0;
$route_idnew = $this->Routetranfer_model->checkRoute($placedata,$routedata);
$numroute1 = $route_idnew->num_rows();
if($numroute1!=0){
     foreach($route_idnew->result() as $route_idnew1){
$xnew=''; $nnew=1; $txt_routeTypenew =''; $times1new=''; $nRowsnew=1;
  $txt_company1 =  $this->Routetranfer_model->get_Client_id($route_idnew1->route_id);
$Routetypenew = $this->Routetranfer_model->get_routeType($route_idnew1->route_id,$x, '1', 'yes', 'key_group');
	foreach ($Routetypenew->result() as $Datanew){ $idrun_en++;
	$countDetailnew = $this->Routetranfer_model->count_detailTimeTable($route_idnew1->route_id,$Datanew->key_group);
	$countnumnew = $countDetailnew->num_rows();
	if($countnumnew >0){
	$routeType2new = $this->Routetranfer_model->get_routeType($route_idnew1->route_id, $Datanew->key_group, '1', $xnew, 'id');		
	foreach($routeType2new->result() as $routeType3new){ 

	if($nnew == 1){ $txtnew = ''; } else { $txtnew = ' + '; }

	$listTransportnew = $this->Routetranfer_model->listTransport($routeType3new->transport_id);
	foreach($listTransportnew->result() as $listTransport2new){}			
	$txt_routeTypenew = $txt_routeTypenew.$txtnew.$listTransport2new->transport_name;

$nnew++; }

?>
	<?php   $timesnew = $this->Routetranfer_model->get_timeDetail($route_idnew1->route_id,$Datanew->key_group,'1','','',$str_date);	
			 $numTimenew = count($timesnew);
        $num_n2 = $num_n2 + $numTimenew;
			   $pnew =1;
				if($numTimenew >0){						   	
				foreach($timesnew as $times2new){  $idrun_en++;
				$times1new = date('H:i', strtotime($times2new->arrive_time.'+'.$Datanew->transfer_h_time.' hours'));	
				$times1new = date('H:i', strtotime($times1new.'+'.$Datanew->transfer_m_time.' minutes'));
				$price1new = $this->Routetranfer_model->getPrice($times2new->id,'price','1');
				$price2new = $this->Routetranfer_model->getPrice($times2new->id,'price_children','1');
				$price3new = ($price1new*$Adults)+($price2new*$Children);
                                $deley1 = diff2time($Data->transfer_h_time.":00",$Data->transfer_m_time.":00");


$deley_new2  = "";
if($Datanew->transfer_h_time!=''){
   $deley_new2 =  $Datanew->transfer_h_time = str_replace("0", "", $Datanew->transfer_h_time);
}
   $deley_new2 = $deley_new2." h ".$Datanew->transfer_m_time." m";




	?>
<tr  class="" id="rowe<?php echo $idrun_en?>">
<td>
  <input type="radio" class="new_radio rowtd" name="ret" id=icheck<?php echo $idrun_en?> onclick="show_box_r(<?php echo $idrun_en?>,'<?php echo $route_idnew1->route_id?>','<?php echo $times2new->id?>' , '<?php echo $times2new->arrive_time." - ".$times1new?>' , '<?php echo $deley_new2?>' , '<?php echo $price1new?>' , '<?php echo $price2new?>' , '<?php echo $WAYTO?>',true)">
</td>
<td>
 <table style="padding:0px!important;margin:0px!important;"><tr><td>
  <?php echo $txt_routeTypenew?>&nbsp;<i class="fa fa-info-circle"></i></td></tr><tr><td>
<font style="color:#b16161;font-size:13px;"><?php echo$txt_company1?></font>
</td></tr></table>
</td>
   <td style="text-align: center;"><?php echo $times2new->arrive_time?></td>
   <td style="text-align: center;"><?php echo $times1new?></td>
   <td style="text-align: center;"><?php echo$deley_new2?></td>
   <td style="text-align: right;"><?php echo number_format($price1new,2)?></td>
   <td style="text-align: right;"><?php echo number_format($price2new,2)?></td>
<!--   <td style="text-align: right;"><?php //echo number_format(($num_price[0]+$num_price[1]),2)?></td>-->
</tr>
<tr><td colspan="8" style="border-style:none!important;padding:0px!important  "><div class="content_hid bubble" id="colep_r<?php echo $idrun_en?>">
   <table style="font-size:12px">
     <?php 

     $checkDetailnew = $this->Routetranfer_model->checkDetail($times2new->id, '1');
			$numchDetailnew = $checkDetailnew->num_rows();
			if($numchDetailnew>0){

				$j=0;$anew =1; $arrnew =''; $arr2new ='';$checkin2='';$txt_line_re='';
				foreach ($checkDetailnew->result() as $checkDetail2new){	
          $j++;
				$pricedetail1new = $this->Routetranfer_model->getPrice($times2new->id,'price','1',$checkDetail2new->data_order);
				$pricedetail2new = $this->Routetranfer_model->getPrice($times2new->id,'price_children','1',$checkDetail2new->data_order);
				$pricedetail3new = ($pricedetail1new*$Adults)+($pricedetail2new*$Children);
				$arrnew = $arrnew.'/'.$pricedetail1new;
				$arr2new = $arr2new.'/'.$pricedetail2new;
                                
                                $checkroutenew = $this->Routetranfer_model->list_placeData($checkDetail2new->begin_place_id);  foreach ($checkroutenew->result() as $checkroutenew2){}
                                $checkroutenew3 = $this->Routetranfer_model->list_placeData($checkDetail2new->destination_place_id); foreach ($checkroutenew3->result() as $checkroutenew4){}
                                $checktransport1 = $this->Routetranfer_model->list_transportData($checkDetail2new->transport_id);foreach ($checktransport1->result() as $checktransport3){}

      $checkin2 = $checkin2."[=]".$checkDetail2new->arrive_time."&nbsp;".$checkroutenew2->place_title;
      $txt_line_re = $txt_line_re.",".$checkDetail2new->arrive_time."&nbsp;".$checkroutenew2->place_title.'<->'.$checkDetail2new->depart_time."&nbsp;".$checkroutenew4->place_title;
			?>
       <tr><td class="bddoc"><div class="cicle_box"><?php echo $j?></div></td>
        <td class="padtd"><b><?php echo $checkDetail2new->arrive_time?></b> <?php echo $checkroutenew2->place_title?> <i class="fa fa-arrow-circle-right custom" ></i>  <b><?php echo $checkDetail2new->depart_time?></b> <?php echo $checkroutenew4->place_title?></td>
      </tr>
       <tr><td class="bddoc"></td><td class="padtd">Transport : <b><?php echo $checktransport3->transport_name?></b>
          &nbsp;(&nbsp; Adult Price&nbsp;<?php echo $Adults1?> x <?php echo number_format($pricedetail1,2)?> )&nbsp;(&nbsp; Child Price&nbsp;<?php echo $Children1?> x <?php echo number_format($pricedetail2,2)?>&nbsp;) = <u> <?php echo number_format($pricedetail3,2)?></u>

       </td></tr>
       <tr><td class="bddoc"></td><td class="padtd">Check-in : <?php echo $checkDetail2new->note_checkin_en?></td></tr>
       <tr><td class="bddoc"></td><td style="border-bottom: 1px dotted #cccccc"></td></tr>
                        <?php }  $checkin2;}?>
       <tr><td>&nbsp;</td><td><b> Total: </b><u><?php echo number_format($price3new,2)?></u></td></tr>
   </table>
</div>

<input type="hidden" value="<?php echo substr($txt_line_re,1)?>" id="rep_ar<?php echo $idrun_en?>">
<input type="hidden" value="<?php echo substr($arrnew,1)?>" id="rea_<?php echo $idrun_en?>">
<input type="hidden" value="<?php echo substr($arr2new,1)?>" id="rec_<?php echo $idrun_en?>">
<input type="hidden" value="<?php echo$checkin2?>" id="re_in_<?php echo $idrun_en?>">
</td></tr>
<?php $pnew++; $nRowsnew++; }}?>
<?php $txt_routeTypenew='';$nnew=1;}}}}}?>

                                                                
                                            </tbody>
                                        </table>
							
                                    </div>
                                </div>
                                <!-- End Flight List Table -->
                            </section>
					