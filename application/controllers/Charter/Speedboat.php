<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speedboat extends CI_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model("./Page_model");
        $this->load->model("./Book_model");
        $this->load->model("./Register_model");
        $this->load->model('Routetranfer/Routetranfer_model');
        $this->load->model('Charter/Charter_model');
        $this->load->model("./Lang_fc");
    }
            //-------------------	
    public function index() {


//**************************ห้ามลบ****************************
            $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $data["chk_lang"] = $chk;
        $data["get_lang"] = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
        $lang = $this->input->get("lang");
        if ($lang == "") {
            $lang = "en";
        }
        $get_lang_icon = $this->Page_model->get_icon_lang($lang);
        
        foreach ($get_lang_icon as $lang_val) {
            $icn_lang = $lang_val->field1;
            $text_lang = $lang_val->fld_valu_desc;
        }

        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
        $str_date =  $this->input->get("str_date");
      
        $data["str_date"] = $str_date;
        $end_date = $this->input->get("end_date");
        $data["end_date"] = $end_date;

//*****************************************************************************************************************************************

$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 
$adults = $this->input->get("Adults");
$data["adults"] = $adults;
$child = $this->input->get("Child");
$data["child"] = $child;

$url_txt = "";
if($adults!="" && $child !=""){$url_txt= "?str_date=".$str_date."&end_date=".$end_date."&Adults=".$adults."&Child=".$child;}
$data["para_url"] = $url_txt;

        $this->load->view('header',$data);
        $this->load->view('Charter/Speedboat_view');
        $this->load->view('footer');
    }
    //-------------------RouteID , TimetableID detailRoute 
	public function timetable_detail(){
		$data['tranid'] = $this->input->post('tranid');
		$data['tranname'] = $this->input->post('tranname');
                $data['loadImg']=$this->Charter_model->loadImg2($data['tranid']);	
		$this->load->view('Charter/RouteDetail',$data);
	}
    //--------------------------------------------
 	public  function placedataupdate(){
		$changeValue = $this->input->post('changeValue');
		$placeData = '';//$this->input->post('placeData');
		$result = $this->Charter_model->placedataland($changeValue);?>
            <option value="">---Select---</option>
            <?php $select3 ='';    
            foreach ($result->result() as $result2){
                 if($result2->destination_place_id  == $placeData){ $select3 = 'selected';}?>
            <option value="<?php echo $result2->destination_place_id ?>"<?php echo $select3?>><?php echo $result2->place_title ?></option>
                <?php $select3 ='';  }
         }
          //---------------------------------------------
        function calculatedate(){
         $datedata = $this->input->post('datedata');
         $returndate = $this->input->post('returndate');
         $datest=date_create($datedata);
         $datestart = date_format($datest,"Y-m-d");
         $dateen=date_create($returndate);
         $dateend = date_format($dateen,"Y-m-d");
         $date1 = str_replace('/', '-', $datestart);
         $date2 = str_replace('/', '-', $dateend);
         $calculate =strtotime("$date2")-strtotime("$date1");
         $summary=floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
            
        echo $summary;
    }
     //------------------------------------------
         public function adddetail(){
             $landid = $this->input->post('landid');
             $priceid = $this->input->post('priceid');
             $transport = $this->input->post('transport');
             $price = $this->input->post('price');
             $amount = $this->input->post('amount');
             $datetotal = $this->input->post('datetotal');
             if($datetotal!='0'){
             $total = $price*$amount*$datetotal;
             }else{
              $total = $price*$amount;   
             }
             ?>
            <div id="detail<?php echo $priceid?>">
          
                 <table class="table" width="100%" >
                <tr >
                   <td colspan="2" style="background-color:#E1E1E1"><?php echo $transport?>  <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" style="float:right;width: 50px;" onclick="deleteselect('<?php echo $priceid?>')"> <i class="fas fa-times"></i> </button></td>
                   </tr>
                    <tr >
                        <td colspan="2" style="background-color:#E1E1E1">(<?php echo number_format($price,2)?> x <?php echo $amount?> <?php if($datetotal!='0'){?>x <?php echo $datetotal?> วัน<?php }?>) <span style="float:right"><?php echo number_format($total,2)?></span></td>
                    </tr>
               <input type="hidden" class="priceland" value="<?php echo $total?>"/>
               <input type="hidden" name="landid[]" value="<?php echo $landid?>">
               <input type="hidden" name="priceid[]"  value="<?php echo $priceid?>"/>
               <input type="hidden" name="totalamount[]"  value="<?php echo $amount?>"/>
               
                </table>
            </div>
        <?php }



         //---------------------------------------
    public function trip_list() { 

       $lang_q = $this->session->userdata('ch_lang');

       $routedata = $this->input->post("routedata");
       $data["routedata"] = $routedata;
       $placedata = $this->input->post("placedata");
       $data["placedata"] = $placedata;
       
      
        $str_date =  $this->input->get("str_date");
        $end_date = $this->input->get("end_date");
        
        $adults = $this->input->get("Adults");
      echo  $child = $this->input->get("Child");

        $data['routedata'] = $this->input->post('routedata');
        $data['placedata'] = $this->input->post('placedata');
        $data['datedata'] = $this->input->post('book_st');
        $data['dateReturn'] = $this->input->post('book_en');
        $data['dateback'] = $this->input->post('book_en');
        
         $date1 = str_replace('/', '-', $data['datedata']);
         $date2 = str_replace('/', '-', $data['dateReturn']);
         $calculate =strtotime("$date2")-strtotime("$date1");
         $summary=floor($calculate / 86400);
         $data["datetotal"] = $summary;

if($str_date==""){$str_date = $this->input->post('book_st');}
if($end_date==""){$end_date = $this->input->post('book_en');}

        $data["str_date"] = $str_date;
        $data["end_date"] = $end_date;
        $data["lang_q"] = $lang_q;

if($adults==""){$adults = $this->input->post('Adults');}
if($child==""){$child = $this->input->post('Child');}
        $data["adults"] = $adults;
        $data["child"] = $child;

$Total = $adults+$child;
if($child=="" || !isset($child)){$child=0;}
        $data['Adults'] = $adults;
        $data['Children'] = $child;

        $data['Total'] = $Total;
	    $data['travelRound'] = $this->input->post('travelRound');

              $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $data["chk_lang"] = $chk;
        $data["get_lang"] = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
        $lang = $this->input->get("lang");
        if ($lang == "") {
            $lang = "en";
        }
        $get_lang_icon = $this->Page_model->get_icon_lang($lang);
        
        foreach ($get_lang_icon as $lang_val) {
            $icn_lang = $lang_val->field1;
            $text_lang = $lang_val->fld_valu_desc;
        }

        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
//************************************************************

$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 
$data['getLandData']=$this->Charter_model->getLandData($routedata,$placedata);

        $this->load->view('header',$data);
		if(!isset($data['routedata'])){
			 redirect(base_url(), 'refresh');
		}else{
        	$this->load->view('Charter/trip_list',$data);
            $this->load->view('footer');
		}
		
    }
     //------------------dataID changeValue //
	public  function transportDetail(){
		$transportID = $this->input->post('transportID');
		$transportData = $this->Routetranfer_model->listTransport($transportID);
foreach ($transportData->result() as $transportData2){}?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 18px; font-weight: bold;"><?php echo $transportData2->transport_name?> Information
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		</h5>
      </div>
        <div class="modal-body" style="margin-left: 15px">
		  
		  <div class="row">
    <!--<div><h5><?php //echo $transportData2->transport_name_en?> Information</h5></div>
    <div>--><p class="col-12" style="padding-left: 15px; padding-bottom: 15px;"><?php echo $transportData2->transport_info?></p>
                      <?php  $imglist = $this->Routetranfer_model->loadImg3($transportID);
        foreach ($imglist->result() AS $data) {?>
                      <!--<div >--><div class="col-sm-6"><img class="img-fluid " style="width: 235px; height: 145px;" src="http://transportcms.khemtis.com/<?php echo $data->img_name?>"></div><!--</div>
    </div>-->
                <?php }?>
   
               </div>
		  
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
    </div>

        <?php }
        //--------------------------------------
        	public  function selecttrip(){
                $this->load->library('session');
             $data = array(
                    'chk_pay' =>'no'
                    );
             $this->session->set_userdata($data);
                $idclient = $this->session->userdata('client_user_id');

                $nadult = $this->input->post('nadult');
                $nchild = $this->input->post('nchild');

                $TimeIDGo = $this->input->post('TimeIDGo');
                $Drid = $this->input->post('Drid');
                $DTotalPrice = $this->input->post('DTotalPrice');
                $DAdultPrice = $this->input->post('DAdultPrice');
                $DChildPrice = $this->input->post('DChildPrice');

                $TimeIDBack = $this->input->post('TimeIDBack');
                $Rrid = $this->input->post('Rrid');
                $RTotalPrice = $this->input->post('RTotalPrice');
                $RAdultPrice = $this->input->post('RAdultPrice');
                $RChildPrice = $this->input->post('RChildPrice');   

                $travelRound = $this->input->post('travelRound');
                $d1 = $this->input->post('d1');   
                $d2 = $this->input->post('d2');   
                $DepartDuration = $this->input->post('DepartDuration');   
                $ReturnDuration = $this->input->post('ReturnDuration');   

                $time_dep = $this->input->post('time_dep');   
                $time_arr = $this->input->post('time_arr');  

                $pra_dep_ar = $this->input->post('pra_dep_ar');
                $pra_rep_ar = $this->input->post('pra_rep_ar');
                
                $this->setsession_gp();

          $pra_dep = $this->input->post('pra_dep');
          $prc_dep = $this->input->post('prc_dep');
          $pra_ret = $this->input->post('pra_ret');
          $prc_ret = $this->input->post('prc_ret');

             /*
        if(($datedata != '')&&($datedata!= '0000-00-00')){
			$dateArray = explode("-",$datedata);
			$date= $dateArray[2];
			$mon= $dateArray[1];
			$year= $dateArray[0];			
			$datedata = $year."-".$mon."-".$date;
         }
         if(($dateReturn != '')&&($dateReturn!= '0000-00-00')){
			
			$dateArray = explode("-",$dateReturn);
			$date= $dateArray[2];
			$mon= $dateArray[1];
			$year= $dateArray[0];			
			$dateReturn = $year."-".$mon."-".$date;

         }

        $ch_keygroup = $this->Routetranfer_model->check_keygroup($keygroup);
        if($ch_keygroup >0){
            $keygroup = $this->Routetranfer_model->generateRandomString();
        } 
        */       

                $keygroup = $this->Routetranfer_model->getkeygroup();
                $selecttrip = $this->Routetranfer_model->selecttrip($idclient,$nadult,$nchild,$TimeIDGo,$Drid,$DTotalPrice,$DAdultPrice,$DChildPrice,$TimeIDBack,$Rrid,$RTotalPrice,$RAdultPrice,$RChildPrice,$travelRound,$keygroup,$d1,$d2,$DepartDuration,$ReturnDuration,$time_dep,$time_arr,
                	$pra_dep,$prc_dep,$pra_ret,$prc_ret,$pra_dep_ar,$pra_rep_ar);
                 if($selecttrip == 1){
                      
                 }

                echo $selecttrip;
         }

function setsession_gp(){

           if($this->session->userdata('sec_gp_book')==''){
                  $gp_id  = $this->Book_model->add_pre_gp(0);
                  $id_set = array(
                    'sec_gp_book' =>$gp_id,
                    );
                 $this->session->set_userdata($id_set);
            }
}



function  chdate($d){
  $time = strtotime($d);
  $newformat = date('d-m-Y',$time);
return $newformat;
}


             //-------------------	
    public function book_transport($keygroub=null) {
            $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $data["chk_lang"] = $chk;
        $data["get_lang"] = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
        $lang = $this->input->get("lang");
        if ($lang == "") {
            $lang = "en";
        }
        $get_lang_icon = $this->Page_model->get_icon_lang($lang);
        
        foreach ($get_lang_icon as $lang_val) {
            $icn_lang = $lang_val->field1;
            $text_lang = $lang_val->fld_valu_desc;
        }

        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
//************************************************************
        $data['keygroub'] = $keygroub;


        $this->load->view('header',$data);
        $this->load->view('Transport/book_transport',$data);
        $this->load->view('footer');
    }
         //---------------------------------
	public  function mapDetail(){
		$routeID = $this->input->post('routeID');
		$r = 'Y';
		$listroute = $this->Routetranfer_model->listRoute($r,$routeID);
		foreach($listroute->result() as $listroute2){} 
                ?>

    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
		  <div class="row">
    <img src="http://transportcms.khemtis.com/<?php echo $listroute2->route_image?>" class="img-responsive">
               </div>
		  
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>


        <?php }
    //------------------------------- 	
    public function AddBookingTransport() {
        $Name = $this->input->post('Name');
        $Last = $this->input->post('Last');
        $Email = $this->input->post('Email');
        $Line = $this->input->post('Line');
        $Phone = $this->input->post('Phone');
        $keygroub = $this->input->post('keygroub');
        $accept = $this->input->post('accept');
       
        $result_id = $this->Routetranfer_model->AddBookingTransport($Name ,$Last,$Email,$Line,$Phone,$keygroub,$accept);
        if($result_id==1){$result_id = $keygroub;}
        echo $result_id;
//         '............................',$Departing,$Adults,$Children,$Name,$Last,$Email,$Line,$Phone;
    }
    //-------------------	
    public function book_transport_comfirm($keygroub=null) {
                     $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $data["chk_lang"] = $chk;
        $data["get_lang"] = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
        $lang = $this->input->get("lang");
        if ($lang == "") {
            $lang = "en";
        }
        $get_lang_icon = $this->Page_model->get_icon_lang($lang);
        
        foreach ($get_lang_icon as $lang_val) {
            $icn_lang = $lang_val->field1;
            $text_lang = $lang_val->fld_valu_desc;
        }

        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
//************************************************************
        $data['keygroub'] = $keygroub;
        $this->load->view('header',$data);
        $this->load->view('Transport/book_transport_comfirm',$data);
        $this->load->view('footer');
    }
                //-------------------	
    public function TransportPayment($keygroub=null) {
             $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $data["chk_lang"] = $chk;
        $data["get_lang"] = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
        $lang = $this->input->get("lang");
        if ($lang == "") {
            $lang = "en";
        }
        $get_lang_icon = $this->Page_model->get_icon_lang($lang);
        
        foreach ($get_lang_icon as $lang_val) {
            $icn_lang = $lang_val->field1;
            $text_lang = $lang_val->fld_valu_desc;
        }

        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
//************************************************************
        $data['keygroub'] = $keygroub;
        $this->load->view('header',$data);
        $this->load->view('Transport/Transport_payment_view',$data);
  
    }
        //----------------------------
    public function confrim_data() {
        $keygroup = $this->input->post('keygroup');
        echo 
        $result_id = $this->Routetranfer_model->confrim_data1($keygroup);
        echo $result_id;
    }

    	
	
    
}

