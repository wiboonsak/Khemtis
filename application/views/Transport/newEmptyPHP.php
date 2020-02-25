<div class="main-cn flight-page bg-white clearfix" id="BcHead">
                    <div class="row">

                        <!-- Flight Right -->
                        <div class="col-md-9 col-md-push-3">

                            
                            <section class="breakcrumb-sc text-red">
                                <ul class="breadcrumb arrow">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <?php $getplaceDeatailsroute = $this->Routetranfer_model->getplaceDatails($routedata);
        foreach ($getplaceDeatailsroute->result() AS $getplaceDeatailsroute2){}?>
	<?php $getplaceDeatailsplace = $this->Routetranfer_model->getplaceDatails($placedata);
        foreach ($getplaceDeatailsplace->result() AS $getplaceDeatailsplace2){}
        $FromLocationName = $getplaceDeatailsroute2->place_title;
        $ToLocationName = $getplaceDeatailsplace2->place_title;
        $dateGo = $this->Routetranfer_model->GetEngDateTimeshot($datedata);
        $dateReturn = $this->Routetranfer_model->GetEngDateTimeshot($dateReturn);
        ?>
                                    <li><a href="#" title=""><?php echo $FromLocationName." >>".$ToLocationName?></a></li>
                                    
                                </ul>
                            </section>
							<div id="routeList">
                            <!------DEPART------------>
							<?php 	$WAYTO ="DEPART";
									$DateTravel = $dateGo;
									$iddepart = $routedata;
                                                                        $idarrive = $placedata;
                                                                        $Adults1 = $Adults;
                                                                        $Children1 = $Children;
                                                                        $location1 = $FromLocationName;
									$location2 = $ToLocationName;
									include('routeSelectList.php');?>
							<!-----### Return -------->
     						 <?php 
								   $WAYTO ="RETURN";
								   $DateTravel = $dateReturn;
								   $travelGo = $travelReturn;
                                                                   $routedata;
                                                                        $placedata;
								   $location1 = $ToLocationName;
							       $location2 = $FromLocationName;
							      
							      if($travelRound=='return'){ include('routeSelectList.php'); }?>
							</div>
								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Modal title</h4>
									  </div>
									  <div class="modal-body">
										...
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										
									  </div>
									</div>
								  </div>
								</div>	
								<!-- Modal -->
                        </div>
                        <!-- End Flight Right -->

                        <!-- Sidebar -->
                        <div class="col-md-3 col-md-pull-9">
                            <!-- Sidebar Content -->
                            <div class="sidebar-cn">

                                <!-- Search Result -->
                                <div class="search-result">
                                    <p>BOOKING SUMMARY</p>
                                </div>
                                <!-- End Search Result -->
                                <!-- Search Form Sidebar -->
                                <div class="search-sidebar">
                                  
                                    <div class="row">
                                        <div class="form-search clearfix">
                                            <div class="col-md-12 td-airline" style="padding-top: 15px;" >
                                               
												<table class="table" width="100%">
													<tr>
														<td colspan="2" style="background-color:#E1E1E1">DEPART:</td>
													</tr>
													<tr>
														<td colspan="2"><strong><?php echo $FromLocationName."-".$ToLocationName?></strong> </span><br>
												    <span style="color:red;font-size: 12px;" ><?php echo $dateGo?> 
														<span id="DepartTime"></span></td>
													</tr>
												
													<tr>
													  <td>Duration:</td>
													  <td align="right"><span id="DepartDuration"></span></td>
													</tr>
													<tr>
														<td>Adult x <?php echo $Adults?></td>
														<td align="right"><span id="DepartTotalAdult"></span></td> 
													</tr>
													<tr>
														<td>Children x <?php echo $Children?></td>
														<td align="right"><span id="DepartTotalChildren"></span></td>
													</tr>
													<tr>
														<td>Total depart :</td>
														<td align="right">
															<span id="DepartTotalPrice"></span>
															
															<input type="hidden" name="NAdult" id="NAdult" value="<?php echo $Adults?>">
															<input type="hidden" name="NChild" id="NChild" value="<?php echo $Children?>">
															
															
														    <input type="hidden" name="TimeIDGo" id="TimeIDGo">
															<input type="hidden" name="DTotalPrice" id="DTotalPrice"  value="0">
															<input type="hidden" name="DAdultPrice" id="DAdultPrice"  value="0">
															<input type="hidden" name="DChildPrice" id="DChildPrice"  value="0">
															
															
															<input type="hidden" name="TimeIDBack" id="TimeIDBack">
															<input type="hidden" name="RTotalPrice" id="RTotalPrice" value="0">
															<input type="hidden" name="RAdultPrice" id="RAdultPrice" value="0"> 
															<input type="hidden" name="RChildPrice" id="RChildPrice" value="0">
															
															<input type="hidden" name="travelRound" id="travelRound" value="<?php echo $travelRound?>">
														</td>
													</tr> 
												</table>
											 <?php if($travelRound=='return'){ ?>	
										       <table class="table" width="100%">
													<tr>
														<td colspan="2" style="background-color:#E1E1E1">RETURN:</td>
													</tr>
													<tr>
														<td colspan="2"><strong><?php echo $ToLocationName."-".$FromLocationName?></strong> </span><br>
												        <span style="color:red;font-size: 12px;" ><?php echo $dateReturn?> <span id="ReturnDepartTime">  </span></td>
													</tr> 
													<tr>
													  <td>Duration:</td>
													  <td align="right"><span id="ReturnDuration"></span> </td>
													</tr>
													<tr>
														<td>Adult x <?php echo $Adults?></td>
														<td align="right"><span id="ReturnTotalAdult"></span></td> 
													</tr>
													<tr>
														<td>Children x <?php echo $Children?></td>
														<td align="right"><span id="ReturnTotalChildren"></span></td>
													</tr>
													<tr>
														<td>Total depart :</td>
														<td align="right">
															 <span id="ReturnTotalPrice"></span>
															
														</td>
													</tr>
												</table>
                                             <?php }?> 
												<table class="table" width="100%">
													<tr  style="background-color:#E1E1E1">
														<td >TOTAL PRICE</td>
														<td  align="right" ><span id="AllTotalPrice"></span></td>
													</tr>
													<tr>
													<tr>
														<td colspan="2" align="center">
															<button id="conBtn" type="button" class="btn btn-success btn-sm" onClick="doBooking()">CONTINUE</button>
														</td>
													
													</tr>
												</table>
								 		
                                           
									</div>
                                                                                   
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- End Search Form Sidebar -->
                                <!-- Narrow your results -->
    

                            </div>
                            <!-- End Sidebar Content -->
                        </div>
                        <!-- End Sidebar -->

                        
                    </div>
				
                </div>






<div class="flight-list-head" style="margin-top: 10px; padding: 10px !important">
<!--<span class="icon"><img src="images/icon-maker.png" alt=""></span> -->
<h3 style="font-size: 16px !important">
	<span style="color: red"> DEPART : </span>
	<i class="fa fa-ship" aria-hidden="true"></i>
	<?php $getplaceDeatailsroute = $this->Routetranfer_model->getplaceDatails($routedata);
        foreach ($getplaceDeatailsroute->result() AS $getplaceDeatailsroute2){}?>
	<?php $getplaceDeatailsplace = $this->Routetranfer_model->getplaceDatails($placedata);
        foreach ($getplaceDeatailsplace->result() AS $getplaceDeatailsplace2){}?>
	<?php echo $getplaceDeatailsroute2->place_title?><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $getplaceDeatailsplace2->place_title?></h3><p><span style="font-size: 16px !important"><i class="fa fa-calendar-o"></i> <?php echo $this->Routetranfer_model->GetEngDateTimeshot($datedata);?>&nbsp;&nbsp;<i class="fa fa-users"></i> <?php echo $Total?> <?php if($Total >1){echo 'Travellers';}else{echo 'Traveller';}?></span>
</p>
</div>
<!-- Flight List Head -->

<div class="panel-group" id="accordion" style="padding-top: 20px;">
<?php $route_id = $this->Routetranfer_model->checkRoute($routedata,$placedata);
if($route_id!=0){
	$x=''; $n=1; $txt_routeType =''; $times1=''; $nRows=1;
	$Routetype = $this->Routetranfer_model->get_routeType($route_id,$x, '1', 'yes', 'key_group');
	foreach ($Routetype->result() as $Data){ 
	$countDetail = $this->Routetranfer_model->count_detailTimeTable($route_id,$Data->key_group);
	$countnum = $countDetail->num_rows();
	if($countnum >0){
	$routeType2 = $this->Routetranfer_model->get_routeType($route_id, $Data->key_group, '1', $x, 'id');		
	foreach($routeType2->result() as $routeType3){ 

	if($n == 1){ $txt = ''; } else { $txt = ' + '; }

	$listTransport = $this->Routetranfer_model->listTransport($routeType3->transport_id);
	foreach($listTransport->result() as $listTransport2){}			
	$txt_routeType = $txt_routeType.$txt.$listTransport2->transport_name;

$n++; }

?>


	<?php   $times = $this->Routetranfer_model->get_timeDetail($route_id,$Data->key_group,'1');	
			$numTime = $times->num_rows();
			   $p =1;
				if($numTime >0){						   	
				foreach($times->result() as $times2){  
				$times1 = date('H:i', strtotime($times2->arrive_time.'+'.$Data->transfer_h_time.' hours'));	
				$times1 = date('H:i', strtotime($times1.'+'.$Data->transfer_m_time.' minutes'));
				$price1 = $this->Routetranfer_model->getPrice($times2->id,'price','1');
				$price2 = $this->Routetranfer_model->getPrice($times2->id,'price_children','1');
				$price3 = ($price1*$Adults)+($price2*$Children);
	?>
	
		
	   <!-- Accordion 1 -->
		<div class="panel">
			<div class="panel-heading" id="heading<?php echo $times2->id?>">
				<div class="panel-title">
					   
					<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $times2->id?>">
						
						
						<div class="col-md-9" align="left">
						<h4><?php echo $txt_routeType?> </h4>
					
						<i class="fa fa-clock-o" style="color:#000000"></i> <?php echo $times2->arrive_time?> > <?php echo $times1?>
						<span style="padding-left: 30px;"><i class="fa fa-hourglass-start" style="color:#000000"></i> <?php if($Data->transfer_h_time!=''){echo $Data->transfer_h_time = str_replace("0", "", $Data->transfer_h_time); } ?> h <?php echo $Data->transfer_m_time?> m</span>
						&nbsp;
						<span ><i class="fa fa-money" style="color:#A4A4A4">&nbsp;</i><?php echo number_format($price3)?> THB</span>
						
						</div>
						<div class="col-md-1" align="left">
						<span class="icon fa fa-angle-down"></span>
						</div>
					</a>
                                  
						<div class="col-md-2" align="right">
                                                      <?php $gettimechselect =  $this->Routetranfer_model->gettimechselect();
                                                         $numget1 = $gettimechselect->num_rows();
                                   if($numget1 !=''){
                                    foreach($gettimechselect->result() as $gettimechselect2){ } 
                                    if($times2->arrive_time == $gettimechselect2->arrive_time){
                                    ?>
<!--                                                    <button id="btn-select" type="button" class="awe-btn awe-btn-1 awe-btn-small" onclick="SelectTrip('DEPART','<?php //echo $times2->id?>' ,'<?php //echo $Adults?>','<?php //echo $Children?>', '<?php //echo $datedata?>', '<?php //echo $dateReturn?>','<?php //echo $routedata?>','')"><i class="fa fa-ticket"></i>&nbsp;Select trip</button>-->
                                    <?php }}?>
						</div>
                                  
				</div>

			</div>
			
		
			
			
			
			<div  id="collapse<?php echo $times2->id?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $times2->id?>">
			
			<?php $checkDetail = $this->Routetranfer_model->checkDetail($times2->id, '1');
			$numchDetail = $checkDetail->num_rows();
			if($numchDetail>0){
				$a =1; $arr =''; $arr2 ='';
				foreach ($checkDetail->result() as $checkDetail2){	
				$pricedetail1 = $this->Routetranfer_model->getPrice($times2->id,'price','1',$checkDetail2->data_order);
				$pricedetail2 = $this->Routetranfer_model->getPrice($times2->id,'price_children','1',$checkDetail2->data_order);
				$pricedetail3 = ($pricedetail1*$Adults)+($pricedetail2*$Children);
				$arr = $arr.'/'.$pricedetail1;
				$arr2 = $arr2.'/'.$pricedetail2;
			?>

		<div class="panel-body">
			
		<div class="col-md-11">
		<div class="container" style="background-color: #f1f1f1; border: 1px solid #E5E5E5">
			<div class="row" style="padding-top: 20px">
				<div class="col-sm-8">
					<div class="item">
						<span><i class="fa fa-map-marker"></i></span>
						<div>
							<strong>
								<?php echo $checkDetail2->arrive_time?>
								<?php $checkroute = $this->Routetranfer_model->getplaceDatails($checkDetail2->begin_place_id);  foreach ($checkroute->result() as $checkroute2){} echo $checkroute2->place_title?>
							</strong>
						</div>
					</div>
					<?php $checktransport = $this->Routetranfer_model->listTransport($checkDetail2->transport_id);foreach ($checktransport->result() as $checktransport2){} ?>
					<div class="item">
						<span><i class="<?php echo $checktransport2->icon_class?>" aria-hidden="true"  style="color:#2f79b1;"></i></span>
						<div style="color:#2f79b1;">
							<strong>
								<?php  echo $checktransport2->transport_name?>
							</strong> &nbsp;&nbsp;<i class="fa fa-info-circle" style="font-size:20px" onclick="transportData('<?php echo $checkDetail2->transport_id?>')"></i>
						</div>
						<p>
							<small><strong>Note : </strong><?php echo $checkDetail2->note_checkin_en?><br>
</small>
						</p>
						<p>
							<!--<button type="button" class="" data-toggle="collapse" data-target="#price1<?php echo $checkDetail2->id?>" style="font-size: 10pt !important">
								<?php //echo $Total?> Travellers =
								<?php //echo number_format($pricedetail3)?> THB <span style="float: right; padding-left: 15px;"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span>
							</button>-->
							<div id="price1<?php echo $checkDetail2->id?>" ><!--class="collapse" -->
								<ul>
									<?php if($Adults > 0){ ?>
									<li style="font-size: 10pt; font-weight: 100;">
										<?php echo $Adults?> Adults x
										<?php echo number_format($pricedetail1)?> =
										<?php echo number_format($Adults*$pricedetail1)?> THB </li>
									<?php }?>
									<?php if($Children > 0){ ?>
									<li style="font-size: 10pt; font-weight: 100;">
										<?php echo $Children?> Children x
										<?php echo number_format($pricedetail2)?> =
										<?php echo number_format($Children*$pricedetail2)?> THB</li>
									<?php }?>
								</ul>
							</div>
						</p>
					</div>

					<div class="item-end">
						<span><i class="fa fa-map-marker"></i></span>
						<div>
							<strong>
								<?php echo $checkDetail2->depart_time?>
								<?php $checkroute3 = $this->Routetranfer_model->getplaceDatails($checkDetail2->destination_place_id); foreach ($checkroute3->result() as $checkroute4){}echo $checkroute4->place_title?>
							</strong>
						</div>
					</div>
				</div>
				<?php $r = 'Y';
					if($a == 1){ 
					$listroute = $this->Routetranfer_model->listRoute($r,$route_id);
					foreach($listroute->result() as $listroute2){} ?>
				<div class="col-sm-3">
				<img src="http://transportcms.khemtis.com/<?php echo $listroute2->route_image?>" class="img-responsive" style="padding: 20px 0px;" onclick="mapData('<?php echo $route_id?>')">
				</div>
				<?php } ?> </div>
			<?php if($numchDetail == $a){  ?>
			<div >
				<?php ?>
				<button type="button" class="awe-btn awe-btn-1 awe-btn-small" onclick="selecttrip('<?php echo $times2->id?>','<?php echo $Data->key_group?>','<?php echo $arr?>','<?php echo $arr2?>','<?php echo $price3?>')">
					Select this trip</button>
				<?php ?>
				
                         			
<!--				<button type="button" class="awe-btn awe-btn-1 awe-btn-small" onClick="SelectTrip('DEPART','<?php //echo $times2->id?>')" ><i class="fa fa-ticket"></i>&nbsp;Select trip</button>-->
			</div>
			<?php } ?> </div>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
			<?php $a++; }}?>
			</div>
		</div>
	

	<?php $p++; $nRows++; }}?>
	


<!-- Accordion -->

<?php $txt_routeType='';$n=1;}}}?>
</div>	
<!-- start Return List -->
<br>
<div class="flight-list-head" style="margin-top: 10px; padding: 10px !important">
<!--<span class="icon"><img src="images/icon-maker.png" alt=""></span> -->
<h3 style="font-size: 16px !important">
	<span style="color: red"> RETURN : </span>
	<i class="fa fa-ship" aria-hidden="true"></i>
	
	<?php echo $getplaceDeatailsplace2->place_title?> <i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $getplaceDeatailsroute2->place_title?></h3>
<p><span style="font-size: 16px !important"><i class="fa fa-calendar-o"></i> <?php echo $this->Routetranfer_model->GetEngDateTimeshot($dateReturn);?>&nbsp;&nbsp;<i class="fa fa-users"></i> <?php echo $Total?> <?php if($Total >1){echo 'Travellers';}else{echo 'Traveller';}?></span>
</p>
</div>

<div class="panel-group" id="accordion" style="padding-top: 20px;">
<?php $route_idnew = $this->Routetranfer_model->checkRoute($placedata,$routedata);
if($route_idnew!=0){
$xnew=''; $nnew=1; $txt_routeTypenew =''; $times1new=''; $nRowsnew=1;
$Routetypenew = $this->Routetranfer_model->get_routeType($route_id,$x, '1', 'yes', 'key_group');
	foreach ($Routetypenew->result() as $Datanew){ 
	$countDetailnew = $this->Routetranfer_model->count_detailTimeTable($route_idnew,$Datanew->key_group);
	$countnumnew = $countDetailnew->num_rows();
	if($countnumnew >0){
	$routeType2new = $this->Routetranfer_model->get_routeType($route_idnew, $Datanew->key_group, '1', $xnew, 'id');		
	foreach($routeType2new->result() as $routeType3new){ 

	if($nnew == 1){ $txtnew = ''; } else { $txtnew = ' + '; }

	$listTransportnew = $this->Routetranfer_model->listTransport($routeType3new->transport_id);
	foreach($listTransportnew->result() as $listTransport2new){}			
	$txt_routeTypenew = $txt_routeTypenew.$txtnew.$listTransport2new->transport_name;

$nnew++; }

?>
	<?php   $timesnew = $this->Routetranfer_model->get_timeDetail($route_idnew,$Datanew->key_group,'1');	
			$numTimenew = $timesnew->num_rows();
			   $pnew =1;
				if($numTimenew >0){						   	
				foreach($timesnew->result() as $times2new){  
				$times1new = date('H:i', strtotime($times2new->arrive_time.'+'.$Datanew->transfer_h_time.' hours'));	
				$times1new = date('H:i', strtotime($times1new.'+'.$Datanew->transfer_m_time.' minutes'));
				$price1new = $this->Routetranfer_model->getPrice($times2new->id,'price','1');
				$price2new = $this->Routetranfer_model->getPrice($times2new->id,'price_children','1');
				$price3new = ($price1new*$Adults)+($price2new*$Children);
	?>
	
		
	   <!-- Accordion 1 -->
		<div class="panel">
			<div class="panel-heading" id="heading<?php echo $times2new->id?>">
				<div class="panel-title">
					   
					<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $times2new->id?>">
						
						
						<div class="col-md-9" align="left">
						<h4><?php echo $txt_routeTypenew?> </h4>
					
						<i class="fa fa-clock-o" style="color:#000000"></i> <?php echo $times2new->arrive_time?> > <?php echo $times1new?>
						<span style="padding-left: 30px;"><i class="fa fa-hourglass-start" style="color:#000000"></i> <?php if($Datanew->transfer_h_time!=''){echo $Datanew->transfer_h_time = str_replace("0", "", $Datanew->transfer_h_time); } ?> h <?php echo $Datanew->transfer_m_time?> m</span>
						&nbsp;
						<span ><i class="fa fa-money" style="color:#A4A4A4">&nbsp;</i><?php echo number_format($price3new)?> THB</span>
						
						</div>
						<div class="col-md-1" align="left">
						<span class="icon fa fa-angle-down"></span>
						</div>
					</a>
						<div class="col-md-2" align="right">
                                                         <?php $gettimechselectnew =  $this->Routetranfer_model->gettimechselect();
                                   $numget = $gettimechselectnew->num_rows();
                                   if($numget !=''){
                                    foreach($gettimechselectnew->result() as $gettimechselect2new){ } 
                                    if($times2new->arrive_time == $gettimechselect2new->arrive_time){
                                    ?>
<!--                                                    <button id="btn-select" type="button" class="awe-btn awe-btn-1 awe-btn-small" onclick="SelectTrip('DEPART','<?php //echo $times2new->id?>' ,'<?php //echo $Adults?>','<?php //echo $Children?>', '<?php //echo $datedata?>', '<?php //echo $dateReturn?>','<?php //echo $routedata?>','')"><i class="fa fa-ticket"></i>&nbsp;Select trip</button>-->
                                   <?php }}?>    
						</div>
				</div>

			</div>
			<div  id="collapse<?php echo $times2new->id?>" class="panel-collapse collapse" aria-labelledby="heading<?php echo $times2new->id?>">
			
			<?php $checkDetailnew = $this->Routetranfer_model->checkDetail($times2new->id, '1');
			$numchDetailnew = $checkDetailnew->num_rows();
			if($numchDetailnew>0){
				$anew =1; $arrnew =''; $arr2new ='';
				foreach ($checkDetailnew->result() as $checkDetail2new){	
				$pricedetail1new = $this->Routetranfer_model->getPrice($times2new->id,'price','1',$checkDetail2new->data_order);
				$pricedetail2new = $this->Routetranfer_model->getPrice($times2new->id,'price_children','1',$checkDetail2new->data_order);
				$pricedetail3new = ($pricedetail1new*$Adults)+($pricedetail2new*$Children);
				$arrnew = $arrnew.'/'.$pricedetail1new;
				$arr2new = $arr2new.'/'.$pricedetail2new;
			?>

		<div class="panel-body">
			
		<div class="col-md-11">
		<div class="container" style="background-color: #f1f1f1; border: 1px solid #E5E5E5">
			<div class="row" style="padding-top: 20px">
				<div class="col-sm-8">
					<div class="item">
						<span><i class="fa fa-map-marker"></i></span>
						<div>
							<strong>
								<?php echo $checkDetail2new->arrive_time?>
								<?php $checkroutenew = $this->Routetranfer_model->getplaceDatails($checkDetail2new->begin_place_id);  foreach ($checkroutenew->result() as $checkroute2new){} echo $checkroute2new->place_title?>
							</strong>
						</div>
					</div>
					<?php $checktransportnew = $this->Routetranfer_model->listTransport($checkDetail2new->transport_id);foreach ($checktransportnew->result() as $checktransport2new){} ?>
					<div class="item">
						<span><i class="<?php echo $checktransport2new->icon_class?>" aria-hidden="true"  style="color:#2f79b1;"></i></span>
						<div style="color:#2f79b1;">
							<strong>
								<?php  echo $checktransport2new->transport_name?>
							</strong> &nbsp;&nbsp;<i class="fa fa-info-circle" style="font-size:20px" onclick="transportData('<?php echo $checkDetail2new->transport_id?>')"></i>
						</div>
						<p>
							<small><strong>Note : </strong><?php echo $checkDetail2new->note_checkin_en?><br>
</small>
						</p>
						<p>
							<!--<button type="button" class="" data-toggle="collapse" data-target="#price1<?php echo $checkDetail2new->id?>" style="font-size: 10pt !important">
								<?php //echo $Total?> Travellers =
								<?php //echo number_format($pricedetail3)?> THB <span style="float: right; padding-left: 15px;"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span>
							</button>-->
							<div id="price1<?php echo $checkDetail2new->id?>" ><!--class="collapse" -->
								<ul>
									<?php if($Adults > 0){ ?>
									<li style="font-size: 10pt; font-weight: 100;">
										<?php echo $Adults?> Adults x
										<?php echo number_format($pricedetail1new)?> =
										<?php echo number_format($Adults*$pricedetail1new)?> THB </li>
									<?php }?>
									<?php if($Children > 0){ ?>
									<li style="font-size: 10pt; font-weight: 100;">
										<?php echo $Children?> Children x
										<?php echo number_format($pricedetail2new)?> =
										<?php echo number_format($Children*$pricedetail2new)?> THB</li>
									<?php }?>
								</ul>
							</div>
						</p>
					</div>

					<div class="item-end">
						<span><i class="fa fa-map-marker"></i></span>
						<div>
							<strong>
								<?php echo $checkDetail2new->depart_time?>
								<?php $checkroute3new = $this->Routetranfer_model->getplaceDatails($checkDetail2new->destination_place_id); foreach ($checkroute3new->result() as $checkroute4new){}echo $checkroute4new->place_title?>
							</strong>
						</div>
					</div>
				</div>
				<?php $rnew = '1';
					if($anew == 1){ 
					$listroutenew = $this->Routetranfer_model->listRoute($rnew,$routedata);
					foreach($listroute->result() as $listroute2){} ?>
				<div class="col-sm-3">
<!--					<img src="<?php //echo base_url('uploadfile/').$listroute2->route_image?>" class="img-responsive" style="padding: 20px 0px;" onclick="mapData('<?php //echo $routedata?>')">-->
				</div>
				<?php } ?> </div>
			<?php if($numchDetailnew == $anew){  ?>
			<div >
				
				<button type="button" class="awe-btn awe-btn-1 awe-btn-small" onclick="selecttrip('<?php echo $times2->id?>','<?php echo $Data->key_group?>','<?php echo $arr?>','<?php echo $arr2?>','<?php echo $price3?>')">
					Select this trip</button>

<!--				<button type="button" class="awe-btn awe-btn-1 awe-btn-small" onClick="SelectTrip('DEPART','<?php //echo $times2new->id?>')" ><i class="fa fa-ticket"></i>&nbsp;Select trip</button>-->
			</div>
			<?php } ?> </div>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
			<?php $anew++; }}?>
			</div>
		</div>
	

	<?php $pnew++; $nRowsnew++; }}?>
	


<!-- Accordion -->

<?php $txt_routeTypenew='';$nnew=1;}}}?>
</div>