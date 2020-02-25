<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouteManage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	//$this->load->model('cl_bord_model');
  public function __construct(){
       parent::__construct();
       $this->load->library('session');
       if($this->session->userdata('client_user_id')==''){ 
          redirect(base_url('Transport_login.php'), 'refresh');
       }
       $this->load->model("Hotel_model");
       $this->load->model("Route_model");
  } 
  ///////////////////////////////////////////////////
	
  public function index($route_id =NULL){	
    //$boat_id = 13;
	//if($boat_id ==''){
		$route_id = 0;
	//}     
	$data["route_id"] = $route_id; 
	// อาโต้ยมะ 5555555555555   $boat_id รับมาเป็น GET หรือ Post ก็ได้จ๊ะน้องรัก
	  $idclient = $this->session->userdata('client_user_id');
	  $data["client_user_id"] = $idclient;
	  $data["tokengenered"] =$this->session->userdata('token_sesion');
	$data["results_service"] = $this->Hotel_model->get_service($idclient);
	$data["results_lang"] = $this->Route_model->get_lang();	
	//$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	//$this->load->view('Home');
	$this->load->view('RouteManage_view',$data);
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
  ///////////////////////////////////////////////////
	
  public function RouteDetail($route_id =NULL){
  	  $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');
    $data["client_user_id"] = $idclient;
	$data["route_id"] = $route_id; 
	$data["results_service"] = $this->Hotel_model->get_service($idclient);
	$data["results_lang"] = $this->Route_model->get_lang();	
	$route_detail = $this->Route_model->get_Route_detail($route_id);
	$data["get_route"]= $route_detail;
    $d=0;
    $r=0;
    foreach ($route_detail as $value) {
    	$d = $value->destination_place_id;
    	$r = $value->begin_place_id;
    }
    $data_return = $this->Route_model->get_route_return($r,$d,$idclient);
    $get_r_id=0;
    $get_r_txt = "";
      foreach ($data_return as $value_re){
    	$get_r_id=$value_re->route_id;
    	$get_r_txt = $value_re->route_name;
      }
	$data["get_r_id"]=$get_r_id;
	$data["get_r_txt"]=$get_r_txt;
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	//$this->load->view('Home');
	$this->load->view('RouteManage_view',$data);
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
//  //////////////////////////////////////////////	
//	
//  public function insertUpdate_route(){
//	  
//    $formdata = $this->input->post('formdata');
//    //$send_commnd = $this->input->post('send_commnd');
//    $get_formdata = array();
// 	parse_str($formdata, $get_formdata);
//    $Result = $this->Route_model->Add_update_dataroute($get_formdata);
//	echo $Result;
//  }
//	
  public function insertUpdate_route(){
   $name = "";
   $idc = $this->session->userdata('client_user_id');
   $val_route_active = $_POST["val_route_active"];
   $val_route_id = $_POST["val_route_id"];
   $begin_place_id = $_POST["begin_place_id"];
   $destination_place_id = $_POST["destination_place_id"];
      $recrow = $this->Route_model->get_lang();
      $route_id = $this->Route_model->Add_update_dataroute($idc,$val_route_active,$val_route_id,$begin_place_id,$destination_place_id);

if($route_id>0){
	     foreach ($recrow as  $value) {
         $lg = $value->fld_valu;
         $name = $_POST["name".$lg];
         $resultData = $this->Route_model->Add_up_details_langroute($name,$lg,$route_id);
   }


   if (!file_exists("uploadfile/client".$idc)) {
                   mkdir("uploadfile/client".$idc);
                   chmod("uploadfile/client".$idc, 0777);
    }

   if (!file_exists("uploadfile/client".$idc."/images")) {
                   mkdir("uploadfile/client".$idc."/images");
                   chmod("uploadfile/client".$idc."/images", 0777);
    }

    $config['upload_path'] = 'uploadfile/client'.$idc.'/images/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = false;
        $config['max_size'] = '1240'; //1 MB
        
    if (isset($_FILES['route_image']['name'])) {
            if (0 < $_FILES['route_image']['error']) {
                echo 'Error during file upload' . $_FILES['route_image']['error'];
            } else {
                if (file_exists('uploadfile/client'.$idc.'/images/' . $_FILES['route_image']['name'])) {
                    echo $resultData = 0;
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('route_image')) {
                        echo $this->upload->display_errors();
                    } else {
                      
                        $chdata = $this->Route_model->update_img($route_id,'uploadfile/client'.$idc.'/images/'.$_FILES['route_image']['name']);

                       if($chdata==1){
                           echo $resultData;
                        } 


                    }
                }
            }
        } else {
            echo $resultData;
        }      
}
//echo $resultData;
}
  	//------------------------ 	
    public function remove_file(){ 
		
        $file_name = $this->input->post('file_name');
        $dataID = $this->input->post('dataID');
        
        $result = $this->Route_model->do_removeFile($dataID);
 if($result == '1'){
            $this->load->helper("file");					   
            @unlink($file_name); 
			echo $result;
        }     
    }
//-------------------	
	public function add_transport(){
		$transport_id = $this->input->post('arr_transport');
		$route_id = $this->input->post('route_id');		
		$transfer_h_time = $this->input->post('transfer_h_time');		
		$transfer_m_time = $this->input->post('transfer_m_time');		
		$result = $this->Route_model->selectTransport($transport_id, $route_id, $transfer_h_time, $transfer_m_time);
		echo $result;
	}                    
     //------------------------
	public function modal_setTime(){   
		$idclient = $this->session->userdata('client_user_id');
		$txt_routeType =''; $x =''; $n =1;
		$key = $this->input->post('key');
		$route_id = $this->input->post('route_id');	
		$data = $this->Route_model->get_routeType($route_id, $key, '1', $x, 'id');
		
		foreach($data->result() as $routeType){ 
			if($n == 1){ $txt = '';  } else { $txt = ' + '; }
			
			$listTransport = $this->Route_model->listTransportmodal($routeType->transport_id,$idclient);
			foreach($listTransport->result() as $listTransport2){}
			$txt_routeType = $txt_routeType.$txt.$listTransport2->transport_name;
		
		$n++; }
		
		$txt_script = "'".$key."' , '".$route_id."'";   //  <input type="time" name="arrive_time[]" class="form-control" >
		
		$txtHr = "<option value='00'>00</option>";
		  for($i=1;$i<24;$i++){
			  if($i<10){ 
			  	$HrValue = "0".$i;
			  }else{
				 $HrValue = $i;
			  }
			  $txtHr=$txtHr."<option value='".$HrValue."'>".$HrValue."</option>";
		  }
		
		$txtMin = '';
		  for($i=0;$i<=59;$i++){
			  if($i<10){ 
			  	$iValue = "0".$i;
			  }else{
				 $iValue = $i;
			  }
			  $txtMin=$txtMin."<option value='".$iValue."'>".$iValue."</option>";
		  }
		 
		
		$aa['htmlFom'] = 
                        '<form id="frmTime" role="form" method="post" action="" enctype="multipart/form-data">
				<div class="form-group row">
                    <div class="col-md-2 col-sm-12">Time Depart</div>
					 <div class="col-md-3 form-group" id="divTime">
                      
					  <select  name="hr" id="hr" class="form-control">
					       '.$txtHr.'
					   </select>
					   </div>
					   <div class="col-md-1 form-group"  >
					    :
					  </div>
					   <div class="col-md-3 form-group">
					   <select name="min" id="min" class="form-control">
					       '.$txtMin .'
					   </select>
					   </div>
                    </div>
                 </div>
				 <br><div class="col-12" style="text-align: center;">
				 	 <button type="button" class="btn btn-success btn-sm" onclick="insertTimes('.$txt_script.')" >OK</button> 	
				 </div>
                                 </form>';
		
		   //<div class="col-md-2">
           //             <button type="button" class="btn btn-primary btn-sm" onclick="appendTime()"><i class="fa fa-plus"></i> Add Time</button>
           //         </div>
		$aa['txt_routeType']=$txt_routeType;
		echo json_encode($aa);
 	}
   //------------------------
	public function insert_times(){  
		$hr = $this->input->post('hr');
		$min = $this->input->post('min');
		$route_type_id = $this->input->post('route_type_id');
		$route_id = $this->input->post('route_id');		
		$Result = $this->Route_model->do_insertTimes($hr,$min,$route_type_id,$route_id);
		echo $Result;	
	}
   //------------------------

function diff2time($time_a,$time_b){
    $now_time1=strtotime(date("Y-m-d ".$time_a));
    $now_time2=strtotime(date("Y-m-d ".$time_b));
    $time_diff=abs($now_time2-$now_time1);
    $time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน
    return $time_diff_h." h ".$time_diff_m." m ";
}

	public function RouteType_Times(){ 	
		$idclient = $this->session->userdata('client_user_id');
		$route_id = $this->input->post('route_id');	  
		$key_group = $this->input->post('route_type_id');	  
		$x =''; $txt_routeType =''; $n =1; $times1 =''; $txtTravelTime='';			
		$data = $this->Route_model->get_routeType($route_id, $x, '1', 'yes', 'key_group');
		foreach($data->result() as $routeType){  

		$routeType2 = $this->Route_model->get_routeType($route_id, $routeType->key_group, '1', $x, 'id');		
		foreach($routeType2->result() as $routeType3){ 
			if($n == 1){ $txt = ''; } else { $txt = ' + '; }
			
			$listTransport = $this->Route_model->listTransportmodal($routeType3->transport_id,$idclient);
			foreach($listTransport->result() as $listTransport2){}			
			$txt_routeType = $txt_routeType.$txt.$listTransport2->transport_name;
		$n++; }

		if(($routeType->key_group == $key_group) && ($key_group != 'x')){ $p = 1; } else { $p = 0; }			
		$count_routeType = $this->Route_model->count_routeType($routeType->key_group,$route_id);
		if($count_routeType >0){ $dis = 'disabled'; $style2 = 'cursor: not-allowed'; } else { $dis = ''; $style2 =''; }	
		
         $get_time  = array();
		 $txtTravelTime='';	
		 $time_st="";
		 $time_en="";
         $get_time = $this->Route_model->gettime_max_min($route_id);

         if(count($get_time)>0){
            $time_st = $get_time[0];
            $time_en = $get_time[1];
            $txtTravelTime = $this->diff2time($time_st.":00",$time_en.":00");
         	
         }
          if(($routeType->transfer_m_time!='')&&($routeType->transfer_m_time!='0')){ 
			$TXT_transfer_m_time = $routeType->transfer_m_time." Min";	
		}else{
			$TXT_transfer_m_time = '';
		}
		
		if(($routeType->transfer_h_time!='')&&($routeType->transfer_h_time!='0')){ 
			$TXT_transfer_h_time= $routeType->transfer_h_time." Hrs. ";
		}else{
			$TXT_transfer_h_time	= ''; 
		}	
		
?>		
		
		 <div class="card">
             <div class="card-header" id="heading<?php echo $routeType->key_group?>"   style="cursor: pointer" >
             <h5 class="m-0">
                 <a href="#" class="text-primary" ><?php echo $txt_routeType?>  </a> 
				 &nbsp;&nbsp;
				 
				 Travel Time : <?php echo $TXT_transfer_h_time.$TXT_transfer_m_time?>
				 
				 <button type="button" style="float: right" class="btn btn-danger waves-effect waves-light btn-sm" onClick="delete_routeType('<?php echo $routeType->key_group?>' , '<?php echo $route_id?>')">Delete</button>
				 <button type="button" style="float: right; margin-left: 10px; margin-right: 10px; <?php echo $style2?>" class="btn btn-primary waves-effect waves-light btn-sm" onClick="edit_routeType('<?php echo $routeType->key_group?>' , '<?php echo $route_id?>' , '<?php echo $routeType->transfer_h_time?>' , '<?php echo $routeType->transfer_m_time?>')" <?php echo $dis;?> >Edit</button>
				 <button type="button" style="float: right" class="btn btn-success waves-effect waves-light btn-sm" onClick="modal_addTimes('<?php echo $routeType->key_group?>' , '<?php echo $route_id?>')">Add Time</button>
             </h5>
             </div>
                                    
             <div id="collapse<?php echo $routeType->key_group?>" class="collapse show<?php //if($p == 1){ echo 'show'; }?>" aria-labelledby="heading<?php echo $routeType->key_group?>" data-parent="#accordionExample">
                <div class="card-body">
                   <?php   $times = $this->Route_model->get_timeDetail($route_id,$routeType->key_group,'1');	
						   $numTime = $times->num_rows();	
						   if($numTime >0){						   	
						   		foreach($times->result() as $times2){  
						   		 $times1 = date('H:i', strtotime($times2->arrive_time.'+'.$routeType->transfer_h_time.' hours'));	
								  $timesArrive = date('H:i', strtotime($times1.'+'.$routeType->transfer_m_time.' minutes'));
				   ?>
              
					<div style="width:100%;text-align: left;">
					
					
              			   <div class="form-group row" style="margin-bottom:0">
                              <label class="col-6 col-form-label"><?php echo date('H:i',strtotime($times2->arrive_time));?> <i class="fa fa-play"></i> <?php echo date('H:i',strtotime($timesArrive));?> </label>
							  <div class="col-3" align="left">
							   	<button type="button" style="float: right" id="btn_addRoute" class="btn btn-success  waves-effect waves-light btn-sm" onClick="addRoute_detail('<?php echo $times2->id?>','<?php echo $route_id?>','<?php echo $times2->route_type_id?>','<?php echo $times2->arrive_time?>')"><i class="fa fa-plus-square"></i> Add Detail</button>
								  
							  </div> 
							    <div class="col-3" align="left">  
									<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onClick="deleteTime('<?php echo $times2->id?>' , '<?php echo $times2->arrive_time?> - <?php echo $times1?>','<?php echo $times2->route_type_id?>')"><i class="fa fa-minus-square"></i> Delete time</button> 
							   </div>
                           </div>
					
						  <!-- <div class="form-group row" style="background-color: #f5f5f5;">-->
					<?php 	$checkData = $this->Route_model->get_detailTimeTable($times2->id);	
							$num = $checkData->num_rows();	   
							if($num >0){
								
								foreach($checkData->result() as $checkData2){								
									
								$placeData = $this->Route_model->list_placeDatadatail($checkData2->begin_place_id);
								foreach($placeData->result() as $placeData2){}
									
								$placeData3 = $this->Route_model->list_placeDatadatail($checkData2->destination_place_id);
								foreach($placeData3->result() as $placeData4){}		

								$transportData = $this->Route_model->listTransportmodal($checkData2->transport_id,$idclient);
								foreach($transportData->result() as $transportData2){}			

								//$begin_place_id = $checkData2->begin_place_id;							
								$begin_place = $placeData2->place_title;
								//$destination_place_id = $checkData2->destination_place_id;	
								$destination_place = $placeData4->place_title;
								$transport = $transportData2->transport_name;
					?>						
						   <div class="form-group row" style="background-color: #f0f7ff;border-radius: 10px;border-color:#cccccc;border-width:1px;border-style:solid;">
							<p style="margin: 10px 15px 10px 20px;">
								<label class="col-6 col-form-label" style="height: 35px;width:800px;border-radius:10px;border-style:solid;border-width:1px;border-color:#cccccc;background-color: #ffffff;"><b><?php echo $checkData2->arrive_time?></b> From <?php echo $begin_place?>
								   &nbsp;	<b>:</b> &nbsp;<b><?php echo $checkData2->depart_time?></b> To <?php echo $destination_place?>
								</label>
                               
                                <div style="padding-top:10px;">
								<button type="button" style="float: right; margin-left: 10px;" class="btn btn-danger waves-effect waves-light btn-sm" onclick="removeDetail('<?php echo $checkData2->id?>' , '<?php echo $checkData2->timeTable_id?>')">Delete</button>
                                
								<button type="button" style="float: right;" class="btn btn-primary waves-effect waves-light btn-sm" onclick="editDetail('<?php echo $checkData2->id?>') ">Edit</button>
                                 </div>
								
								<label class="col-12 col-form-label"><strong>Transport :</strong> <?php echo $transport?></label>
								<label class="col-12 col-form-label"><strong>Check-in :</strong> <?php echo $checkData2->note_checkin_en?></label>
								<label class="col-12 col-form-label"><strong>Adult Price :</strong> <?php echo number_format($checkData2->price)?> THB</label>   
								<label class="col-12 col-form-label"><strong>Child Price :</strong> <?php echo number_format($checkData2->price_children)?> THB</label>   
							</p>						
						   </div>
					<?php } ?>																	
					<?php } ?>
					</div>
               			<?php } } ?>              
                </div>
             </div>
         </div>                              
		
<?php  $txt_routeType =''; $n =1;  }		
		
	}
  	//------------------------
	public function deleteRouteType(){  
	
		$key_group = $this->input->post('key_group');
		$route_id = $this->input->post('route_id');		
		$Result = $this->Route_model->do_deleteRouteType($key_group,$route_id);
		echo $Result;	
	}
        //------------------------
	public function editRouteType(){    
                        $idclient = $this->session->userdata('client_user_id');
			$route_id = $this->input->post('route_id');	  
			$key_group = $this->input->post('key');
			$hour = $this->input->post('h');
			$minute = $this->input->post('m');
		
			$listRoute = $this->Route_model->listRoute('Y',$route_id);
			$listTransport = $this->Route_model->listTransport('Y',$idclient);
		
			$m =''; $n =1; $arr = array(); $txt_routeType ='';		
			$data = $this->Route_model->get_routeType($route_id, $key_group, '1', $m, 'id');	
			foreach($data->result() as $routeType){ 
				array_push($arr,$routeType->transport_id);		
			}
?>

	<div class="form-group row"><?php //print_r($arr)?>
                     
                        <div class="col-md-4 col-sm-12">				
                       </div>						
                   </div>					
                                    <div class="form-group row"><?php //print_r($arr)?>
                        <label class="col-md-3 col-sm-12 col-form-label">Travel Time</label>
                        <div class="col-md-4 col-sm-12">						
							
                            <select class="form-control" id="transfer_h_time" name="transfer_h_time">
                                <option value="">-- Hour --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if($hour == $txt.$a){ echo "selected"; }?> ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
                       </div>
						
					   <div class="col-md-4 col-sm-12">							
							
                            <select class="form-control" id="transfer_m_time" name="transfer_m_time">
                               <option value="">-- Minute --</option>
							<?php for($x=0; $x<=59; $x++){ 
								
									if($x < 10){  $txt = '';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$x?>" <?php if($minute == $txt.$x){ echo "selected"; }?> ><?php echo $txt.$x?></option>
	
							<?php }	?><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
							</select>
                       </div>						
                   </div>
				   <div class="form-group row">	
				   		<label class="col-md-3 col-sm-12 col-form-label">Transport for Route</label>
                   		<div class="col-md-9 col-sm-12 row">	
						
				<?php  foreach($listTransport->result() as $listTransport2){ 
							
						if(in_array($listTransport2->tran_id, $arr)){  $bb = 'checked';  } else { $bb = ''; }	
				?>				
					
							<div style="padding-top: 10px;">
                                        <button type="button" class="btn btn-sm btn-primary" onClick="select_transport('<?php echo $listTransport2->tran_id?>' , '<?php echo $listTransport2->transport_name?>')" ><?php echo $listTransport2->transport_name?> &nbsp;<i class=" mdi mdi-plus"></i></button>
                    		</div>
					&nbsp;&nbsp;	

						
				<?php } ?>										
							<br>
							<br>
							<br>
							<div class="col-12 alert alert-info row" style="color:#000000; background-color: #FFFFFF;" id="divSelectTransport" >		
								
						<?php $xx3=''; 	//$routeType2 = $this->transport_model->get_routeType($route_id, $key_group, '1', $x, 'id');		
							foreach($data->result() as $routeType3){ 
		
			
								if($n == 1){ $txt = '';  $txt5 = ''; } else { $txt = '&nbsp;&nbsp;+&nbsp;&nbsp;'; $txt5 = ','; }
								
								$xx3 = $xx3.$txt5.$routeType3->transport_id;

								$listTransport = $this->Route_model->listTransportmodal($routeType3->transport_id,$idclient);
								
								foreach($listTransport->result() as $listTransport20){}	
								$xx = $listTransport20->transport_name;
								//$txt_routeType = $txt_routeType.$txt.$listTransport2->transport_name_en;
							?>		

																							<button style="margin-top: 10px;" type="button" class="btn btn-sm btn-success divX" id="span_<?php echo $routeType3->transport_id?>">&nbsp;&nbsp;<?php echo $xx?>&nbsp;&nbsp;<i class="fa fa-times" onclick="remove_transport('<?php echo $routeType3->transport_id?>')" ></i></button> &nbsp;
		
			<?php	$xx=''; 		$n++; }?>	
							</div>	
							<button type="button" class="btn btn-success" onClick="cancelEdit()" id="btn_cancel">Back</button>
							<input type="hidden" id="dataID" name="dataID" value="<?php echo $route_id?>" >	
							<input type="hidden" id="arr2" name="arr2" value="<?php echo $xx3?>" >	
				    	 </div>				    	
				   </div>				   
				   
				   <div class="form-group row">
						<div class="accordion m-b-30 col-12" id="accordionExample">
                        </div>
				   </div>

		
		
<?php 	}
//------------------------
	public function form_routeDetail(){  // dataID , route_id
                $idclient = $this->session->userdata('client_user_id');
		$timeTable_id = $this->input->post('dataID');
		$route_id = $this->input->post('route_id');
		$key_group = $this->input->post('key2');
		$arriveTime = $this->input->post('arrive_time');
                
		$x =''; 		
		$checkData5 = $this->Route_model->get_detailTimeTable($timeTable_id);		
		$num = $checkData5->num_rows();	   
		if($num >0){
			$checkData = $this->Route_model->get_detailTimeTable($timeTable_id,$x,'yes');
			foreach($checkData->result() as $checkData2){}
			$placeData = $this->Route_model->list_placeDatadatail($checkData2->destination_place_id);
			foreach($placeData->result() as $placeData2){}		
			$begin_place_id = $checkData2->destination_place_id;
			$begin_place = $placeData2->place_title;
			$data_order = 1 + $checkData2->data_order;
		} else {
			$routeData = $this->Route_model->listRoute($x,$route_id);
			foreach($routeData->result() as $routeData2){}	
			$placeData = $this->Route_model->list_placeData($routeData2->begin_place_id);
			foreach($placeData->result() as $placeData2){}			
			$transportID = $this->Route_model->get_routeType($route_id, $key_group, $x, $x, 'id', 'yes');
			foreach($transportID->result() as $transportID2){}			
			
			$transportData = $this->Route_model->listTransportmodal($transportID2->transport_id,$idclient);
			foreach($transportData->result() as $transportData2){}			
			
			$arriveTime1 = $this->Route_model->get_timeDetail($route_id, $key_group, $x, 'yes');
			foreach($arriveTime1->result() as $arriveTime2){}
			
			$begin_place_id = $routeData2->begin_place_id;
			$begin_place = $placeData2->place_title;
			$transport = $transportData2->transport_name;
			$transport_id = $transportID2->transport_id;
			//$arriveTime = $arriveTime2->arrive_time;
			$data_order = '1';
			//echo '2222.....';
		}	
?>

	<form id="frmDetail" role="form" method="post" action="" enctype="multipart/form-data">			 
				 
				<div class="form-group row">					
                    <label class="col-md-3 col-sm-12 col-form-label">Begin Place</label>
                    <label class="col-md-9 col-sm-12 col-form-label" id="labelBegin"><?php echo $begin_place?></label>	
					<input type="hidden" id="Mbegin_place_id" name="begin_place_id" value="<?php echo $begin_place_id?>">
                </div>
					
				<div class="form-group row"> 
					<label class="col-md-3 col-sm-12 col-form-label">Destination Place</label>
                    <div class="col-md-9">
                        <select class="form-control" id="Mdestination_place_id" name="destination_place_id">
                            <option value="">-- Select --</option>
						<?php 	$placeData3 = $this->Route_model->get_placeData($begin_place_id);
								foreach($placeData3->result() as $placeData4){ ?>	
                            <option value="<?php echo $placeData4->id?>" <?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?> ><?php echo $placeData4->place_title?></option>
						<?php } ?>	

                        </select>
                    </div>
                </div>
				 
				<div class="form-group row">					
				 	<label class="col-md-3 col-sm-12 col-form-label">Transport</label>	
					<?php if($num >0){ ?>
					
					<div class="col-md-9">
                        <select class="form-control" id="transport_id" name="transport_id">
                            <option value="">-- Select --</option>
						<?php 	$transportData = $this->Route_model->listTransport('Y',$idclient);
								foreach($transportData->result() as $transportData2){ ?>	
                            <option value="<?php echo $transportData2->transport_id?>" <?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?> ><?php echo $transportData2->transport_name?></option>
						<?php } ?>	
							
                        </select>
                    </div>
					<?php } else { ?>					
				 	<label class="col-md-9 col-sm-12 col-form-label"><?php echo $transport?></label>
					<input type="hidden" id="transport_id" name="transport_id" value="<?php echo $transport_id?>">
					<?php } ?>		 
				</div> 
				 
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Depart Time</label>
					<?php if($num >0){ ?>
					<div class="col-md-9" style="display: inline-flex">
                       <input type="hidden" name="arrive_time" id="arrive_time" class="form-control" value="<?php echo $checkData2->arrive_time?>" >
						
						 <!--<div class="col-md-4 col-sm-12">	-->					
							
                            <select class="form-control col-5" id="Hour" name="Hour" onChange="setTimetoInput('Hour' , 'Minute' , 'arrive_time')">
                               <option value="">-- Hour --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>"  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>&nbsp;&nbsp;
						
							<select class="form-control col-5" id="Minute" name="Minute" onChange="setTimetoInput('Hour' , 'Minute' , 'arrive_time')">
                               <option value="">-- Minute --</option>
							<?php for($a=0; $a<=59; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>"  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
                      <!-- </div>-->
						
						
                    </div>
					<?php /*} else { ?>					
				 	<label class="col-md-9 col-sm-12 col-form-label"><?php echo $arriveTime?></label>
					<input type="hidden" id="arrive_time" name="arrive_time" value="<?php echo $arriveTime?>">
					<?php }*/ ?>
				</div> 
					<?php } else { ?>					
				 	<label class="col-md-9 col-sm-12 col-form-label"><?php echo $arriveTime?></label>
					<input type="hidden" id="arrive_time" name="arrive_time" value="<?php echo $arriveTime?>">
					<?php } ?>
				</div> 

                                <div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Arrive Time</label>

					<div class="col-md-9" style="display: inline-flex">
                        <input type="hidden" name="depart_time" id="depart_time" class="form-control" value="<?php //echo $checkData2->depart_time?>" >
						
						<!--<div class="col-md-4 col-sm-12">	-->					
							
                            <select class="form-control col-5" id="Hour2" name="Hour2" onChange="setTimetoInput('Hour2' , 'Minute2' , 'depart_time')">
                               <option value="">-- Hour --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>"  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>&nbsp;&nbsp;
						
							<select class="form-control col-5" id="Minute2" name="Minute3" onChange="setTimetoInput('Hour2' , 'Minute2' , 'depart_time')">
                               <option value="">-- Minute --</option>
							<?php for($a=0; $a<=59; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>"  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
                      <!-- </div>-->
						
						
                    </div>
					
					
				</div> 
				 
				<div class="form-group row"> 
					<label class="col-md-3 col-sm-12 col-form-label">Check-in Place</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="5" id="note_checkin_en" name="note_checkin_en"></textarea>
                    </div>
                </div>  
					
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Adult Price</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="price" name="price" >
                    </div>&nbsp;Baht					
				</div>
				 
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Child Price</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="price_children" name="price_children" >
                    </div>&nbsp;Baht					
				</div>                
			 
				 <br><div class="col-12" style="text-align: center;">
				 	 <button type="button" class="btn btn-success btn-sm" id="btn3" onclick="insertDetailTime('<?php echo $timeTable_id?>' , '<?php echo $data_order?>' , '<?php echo $route_id?>' , '<?php echo $key_group?>')" >Submit</button> 	
				 </div>
				 
	</form>		
		
<?php 	}
//------------------------
	public function insert_detailTime(){  
	
		$Mbegin_place_id = $this->input->post('Mbegin_place_id');
		$Mdestination_place_id = $this->input->post('Mdestination_place_id');
		$transport_id = $this->input->post('transport_id');
		$arrive_time = $this->input->post('arrive_time');
		$depart_time = $this->input->post('depart_time');
		$note_checkin_en = $this->input->post('note_checkin_en');
		$price = $this->input->post('price');
		$price_children = $this->input->post('price_children');
		$timeTable_id = $this->input->post('timeTable_id');
		$data_order = $this->input->post('data_order');
		$Result = $this->Route_model->do_insertDetailTime($Mbegin_place_id,$Mdestination_place_id,$transport_id,$arrive_time,$depart_time,$note_checkin_en,$price,$price_children,$timeTable_id,$data_order);
		echo $Result;	
	}
        	//------------------------TimeID
	public function  deleteTime(){
		$TimeID = $this->input->post('TimeID');
		$resultDelete = $this->Route_model->deleteRouteTime($TimeID);
		echo $resultDelete;
	}
        	//------------------------
	public function remove_detail(){  
	
		$dataID = $this->input->post('dataID');				
		$timeTable_id = $this->input->post('timeTable_id');				
		$Result = $this->Route_model->do_deleteDetail($dataID,$timeTable_id);
		echo $Result;	
	}
        	//------------------------
	public function edit_routeDetail(){  
                $idclient = $this->session->userdata('client_user_id');
		$dataID = $this->input->post('dataID');
		$x ='';
		$checkData = $this->Route_model->get_detailTimeTable('','','',$dataID);	
			foreach($checkData->result() as $checkData2){}	
			$placeData = $this->Route_model->list_placeDatadatail($checkData2->begin_place_id);
			foreach($placeData->result() as $placeData2){}
									
			$placeData3 = $this->Route_model->list_placeDatadatail($checkData2->destination_place_id);
			foreach($placeData3->result() as $placeData4){}		

			$transportData = $this->Route_model->listTransportmodal($checkData2->transport_id,$idclient);
			foreach($transportData->result() as $transportData2){}			

			$begin_place_id = $checkData2->begin_place_id;							
			$begin_place = $placeData2->place_title;
			//$destination_place_id = $checkData2->destination_place_id;	
			$destination_place = $placeData4->place_title;
                        
			$transport = $transportData2->transport_name;
?>

	<form id="frmEdit" role="form" method="post" action="" enctype="multipart/form-data">
				<div class="form-group row">					
                    <label class="col-md-3 col-sm-12 col-form-label">Begin Place</label>
                    <label class="col-md-9 col-sm-12 col-form-label" id="labelBegin"><?php echo $begin_place?></label>	
					<input type="hidden" id="Mbegin_place_id" name="begin_place_id" value="<?php echo $begin_place_id?>">
                </div>
				<div class="form-group row"> 
					<label class="col-md-3 col-sm-12 col-form-label">Destination Place</label>
                    <div class="col-md-9">
                        <select class="form-control" id="Mdestination_place_id" name="destination_place_id">
                            <option value="">-- Select --</option>
						<?php 	$placeData3 = $this->Route_model->get_placeData($begin_place_id);
								foreach($placeData3->result() as $placeData4){ ?>	
                            <option value="<?php echo $placeData4->id?>" <?php if($placeData4->id == $checkData2->destination_place_id){ echo "selected"; }?> ><?php echo $placeData4->place_title?></option>
						<?php } ?>	
                        </select>
                    </div>
                </div>
				 
				<div class="form-group row">					
				 	<label class="col-md-3 col-sm-12 col-form-label">Transport</label>	
					<?php //if($num >0){ ?>
					
					<div class="col-md-9">
                        <select class="form-control" id="transport_id" name="transport_id">
                            <option value="">-- Select --</option>
						<?php 	$transportData = $this->Route_model->listTransport('Y',$idclient);
								foreach($transportData->result() as $transportData2){ ?>	
                            <option value="<?php echo $transportData2->tran_id?>" <?php if($transportData2->tran_id == $checkData2->transport_id){ echo "selected"; }?> ><?php echo $transportData2->transport_name?></option>
						<?php } ?>	
							
                        </select>
                    </div>		 
				</div> 
		
		
				<?php 	$timeArray = explode(":",$checkData2->arrive_time);
						$Hour = $timeArray[0];
						$Minute = $timeArray[1];
				?>
				 
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Depart Time</label>
					<?php //if($num >0){ ?>
					<div class="col-md-9" style="display: inline-flex">
                       <input type="hidden" name="arrive_time" id="arrive_time" class="form-control" value="<?php echo $checkData2->arrive_time?>" >

                            <select class="form-control col-5" id="Hour" name="Hour" onChange="setTimetoInput('Hour' , 'Minute' , 'arrive_time')">
                               <option value="">-- Hour --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if($Hour == $txt.$a){ echo "selected"; }?> ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>&nbsp;&nbsp;
						
							<select class="form-control col-5" id="Minute" name="Minute" onChange="setTimetoInput('Hour' , 'Minute' , 'arrive_time')">
                               <option value="">-- Minute --</option>
							<?php for($a=0; $a<=59; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if($Minute == $txt.$a){ echo "selected"; }?> ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
                      <!-- </div>-->
						
						
                    </div>

				</div> 
		
				<?php 	$timeArray2 = explode(":",$checkData2->depart_time);
						$Hour2 = $timeArray2[0];
						$Minute2 = $timeArray2[1];
				?>
				 
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Arrive Time</label>
                    <!--<div class="col-md-9">
                        <input type="time" name="depart_time" id="depart_time" class="form-control" value="<?php //echo $checkData2->depart_time?>" >
                    </div>-->	
					
					
					<div class="col-md-9" style="display: inline-flex">
                        <input type="hidden" name="depart_time" id="depart_time" class="form-control" value="<?php echo $checkData2->depart_time?>" >
						
						<!--<div class="col-md-4 col-sm-12">	-->					
							
                            <select class="form-control col-5" id="Hour2" name="Hour2" onChange="setTimetoInput('Hour2' , 'Minute2' , 'depart_time')">
                               <option value="">-- Hour --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if($Hour2 == $txt.$a){ echo "selected"; }?> ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>&nbsp;&nbsp;
						
							<select class="form-control col-5" id="Minute2" name="Minute3" onChange="setTimetoInput('Hour2' , 'Minute2' , 'depart_time')">
                               <option value="">-- Minute --</option>
							<?php for($a=0; $a<=59; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if($Minute2 == $txt.$a){ echo "selected"; }?> ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select><?php //if(($dataID !='') && ($listRoute2->begin_place_id == '1')){ echo "selected"; }?>
                      <!-- </div>-->
						
						
                    </div>
					
					
				</div> 
				 
				<div class="form-group row"> 
					<label class="col-md-3 col-sm-12 col-form-label">Check-in Place</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="5" id="note_checkin_en" name="note_checkin_en"><?php echo $checkData2->note_checkin_en?></textarea>
                    </div>
                </div>  
					
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Adult Price</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $checkData2->price?>" >
                    </div>&nbsp;Baht					
				</div>
				 
				<div class="form-group row">
				 	<label class="col-md-3 col-sm-12 col-form-label">Child Price</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="price_children" name="price_children" value="<?php echo $checkData2->price_children?>" >
                    </div>&nbsp;Baht					
				</div>                
			 
				 <br><div class="col-12" style="text-align: center;">
				 	 <button type="button" class="btn btn-success btn-sm" id="btn3" onclick="updateDetailTime('<?php echo $dataID?>')" >Submit</button> 	
				 </div>
				 
	</form>		
<?php  }
	//------------------------
	public function update_routeDetail(){  
	
		$Mdestination_place_id = $this->input->post('Mdestination_place_id');
		$transport_id = $this->input->post('transport_id');
		$arrive_time = $this->input->post('arrive_time');
		$depart_time = $this->input->post('depart_time');
		$note_checkin_en = $this->input->post('note_checkin_en');
		$price = $this->input->post('price');
		$price_children = $this->input->post('price_children');
		$dataID = $this->input->post('dataID');		
		$Result = $this->Route_model->updateDetail($Mdestination_place_id,$transport_id,$arrive_time,$depart_time,$note_checkin_en,$price,$price_children,$dataID);
		echo $Result;	
	}
        //------------------------  
	public function updateRouteType(){  
		
	//	 arr_transport : arr_transport , route_id : route_id , transfer_h_time : transfer_h_time , transfer_m_time : transfer_m_time , key_group : key_group , old_arr
	
		$transport_id = $this->input->post('arr_transport');
		$route_id = $this->input->post('route_id');		
		$transfer_h_time = $this->input->post('transfer_h_time');		
		$transfer_m_time = $this->input->post('transfer_m_time');		
		$key_group = $this->input->post('key_group');		
		$old_arr = $this->input->post('old_arr');	
		
		$transport_arr = explode(",",$transport_id);
		$old_arr2 = explode(",",$old_arr);	
		
		//$cars = array();
		
		for($i=0; $i < count($old_arr2); $i++){
			
			//if($old_arr2[$i] != $transport_arr[$i]){
				//array_push($cars,$old_arr2[$i]);				
				$this->Route_model->delete_transport($key_group, $route_id, $old_arr2[$i]);				
			//}			
		}
		
		for($i=0; $i < count($transport_arr); $i++){
			
			//if($old_arr2[$i] != $transport_arr[$i]){
				//array_push($cars,$old_arr2[$i]);				
				$this->Route_model->update_routeType($transport_arr[$i], $route_id, $transfer_h_time, $transfer_m_time, $key_group);			
			//}			
		} 	
		$result = '1';
		//$this->transport_model->delete_transport($transport_id, $route_id, $transfer_h_time, $transfer_m_time);
		
		//$result = $this->transport_model->update_routeType($transport_id, $route_id, $transfer_h_time, $transfer_m_time, $key_group);
		echo $result;
			
	}
            //----------------------------------------
 	public  function placedataupdate(){
		$changeValue = $this->input->post('changeValue');
		$client_user_id = $this->input->post('client_user_id');
		$placeData = $this->input->post('placeData');
		$result = $this->Route_model->placedataupdate($changeValue,$client_user_id);?>
                 <option value="">---Select---</option>
            <?php $select3 ='';    
            foreach ($result->result() as $result2){
       ?>
<option value="<?php echo $result2->id ?>"><?php echo $result2->place_title ?></option>
                <?php $select3 ='';  }
         }
	

}


?>
