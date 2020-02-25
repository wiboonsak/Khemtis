   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<?php 
       if($lang_q=="en"){
             $select = "Select";
             $Type = "Type";
             $Price = "Price";
             $Days = "Days";
             $amount = "Amount";
             $Day = "Day";
             $no = "No data";
             
       }else{
             $select = "เลือก";
             $Type = "ประเภท";
             $Price = "ราคา";
             $Days = "จำนวนวัน";
             $amount = "จำนวนรถ";
             $Day = "วัน";
             $no = "ไม่มีข้อมูล";
       }
                                      ?>
<section class="flight-list" style="margin-top: -20px;">

                                <!-- Flight List Head -->
                                <div class="flight-list-head"> 
      
                                    <h3><?php echo $WAYTO?> : <?php echo $location1?> - <?php echo $location2?></h3>
                                    <br><i class="far fa-calendar-alt"></i><span style="color: orangered"> <?php echo $this->Charter_model->GetEngDate($DateTravel)?> - <?php echo $this->Charter_model->GetEngDate($Datereturn)?></span>
											
                                </div>
                                <!-- Flight List Head -->

                                <!-- Flight List Table -->
                                <div class="flight-list-cn">
                                    <div class="responsive-table ">
                                       
										<table class="table flight-table table-radio">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="10%"><?php echo $select;?></th>
                                                    <th class="text-center"><?php echo $Type;?></th>
                                                    <th class="text-center"><?php echo $Price;?></th>
                                                    <?php if($datetotal>0){?>
                                                    <th class="text-center"><?php echo $Days;?></th>
                                                    <?php }?>
                                                    <th class="text-center"><?php echo $amount;?></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $countRow = 0;
                                                foreach($getLandData->result() AS $getLandData2){}
                                                $listpriceland = $this->Charter_model->listpricelandvan($getLandData2->id);
                                                foreach($listpriceland->result() AS $Data){
                                                   $listtransportland = $this->Charter_model->listtransportland($Data->transport_id,$lang_q); 
                                                   foreach($listtransportland->result() AS $listtransportland2){}
                                $transport_name = $listtransportland2->transport_name;
                              
                                                ?>
							<tr>
								<td class="td-airline text-center">
									<div class="radio-checkbox">
                                                                            <input type="checkbox" name="airline"  id="radio-air-<?php echo $Data->id?>" class="radio" onclick="adddetail(this.checked,'<?php echo $getLandData2->id?>','<?php echo $Data->id?>','<?php echo $transport_name?>','<?php echo $Data->price?>','1','<?php echo $datetotal?>');">
										<label for="radio-air-<?php echo $Data->id?>"></label>
										&nbsp;
								 </div> 
									
								</td>	
								<td class="td-time text-center" >
                                                                    <p><?php echo $transport_name?>
                                                                
										<a href="javascript:void(0)" onClick="showInfo('<?php echo $listtransportland2->transport_id?>','<?php echo $transport_name?>')" title="info" class="fa-pull-right">
										<i class="<?php echo $listtransportland2->icon_class?>" style="color: skyblue"></i>
									</a>
                                          
                                                                   </p>

									
								</td>
								<td class="td-time text-center">
                                                                    <p style="color:red"><?php echo number_format($Data->price,2)?> ฿</p>
								</td>
                                                                 <?php if($datetotal>0){?>
								<td class="td-time text-center">
                                                                    <p><?php echo $datetotal?> <?php echo $Day;?></p>
								</td>
                                                                 <?php }?>
								<td class="td-time text-center">

                                                                    <select id="amount<?php echo $Data->id?>"  name="amount" onchange="setnumber(this.value,'<?php echo $getLandData2->id?>','<?php echo $Data->id?>','<?php echo $transport_name?>','<?php echo $Data->price?>','<?php echo $datetotal?>')" disabled>
                                                    <?php for ($a = 1; $a <= 10; $a++) {?>
                                        <option value="<?php echo $a ?>" ><?php echo $a ?></option>
<?php } ?>
                                                </select>

								</td>
								
								
                                            
							</tr>
                                                <?php $countRow++; }?>
							
							  <?php if($countRow==0){ ?>
								<tr>
								   <td colspan="6">
									   <h3 align="center" style="color: red"><i class="fas fa-info-circle" ></i> <?php echo $no;?> <?php echo $location1?> - <?php echo $location2?></h3>
								   </td>
								</tr>
							 <?php }?>	
                                            </tbody>
                                        </table>
										
                                    </div>
                                </div>
                                <!-- End Flight List Table -->
</section>
			
   <script>
   
             
   </script>