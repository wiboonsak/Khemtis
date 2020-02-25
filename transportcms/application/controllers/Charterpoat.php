<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charterpoat extends CI_Controller {

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
        $this->load->model("Place_model");
       $this->load->model("Charterpoat_model");
  } 
  ///////////////////////////////////////////////////
	
  public function index(){	
$tran_id = 0;
	//}     
	$data["tran_id"] = $tran_id; 
	// อาโต้ยมะ 5555555555555   $boat_id รับมาเป็น GET หรือ Post ก็ได้จ๊ะน้องรัก
	  $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');

	$data["results_service"] = $this->Hotel_model->get_service($idclient);
	$data["results_lang"] = $this->Charterpoat_model->get_lang();
        
	//$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	//$this->load->view('Home');
	$this->load->view('CharterpoatManage_view',$data);
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
  ///////////////////////////////////////////////////
	
  public function CharterpoatDetail($tran_id =NULL){
  	  $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');
	$data["tran_id"] = $tran_id; 
	$data["results_service"] = $this->Hotel_model->get_service($idclient);
	$data["results_lang"] = $this->Charterpoat_model->get_lang();	
	$data["get_chartertran"]= $this->Charterpoat_model->get_chartertran_detail($tran_id);
        
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	//$this->load->view('Home');
	$this->load->view('CharterpoatManage_view',$data);
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
  //////////////////////////////////////////////	
 public function insertUpdate_route(){
   $name = "";
   $idc = $this->session->userdata('client_user_id');
   $val_route_active = $_POST["val_route_active"];
   $val_route_id = $_POST["val_route_id"];
   $begin_place_id = $_POST["begin_place_id"];
   $destination_place_id = $_POST["destination_place_id"];
      $recrow = $this->Charterpoat_model->get_lang();
      $route_id = $this->Charterpoat_model->Add_update_dataroute($idc,$val_route_active,$val_route_id,$begin_place_id,$destination_place_id);

if($route_id>0){
	     foreach ($recrow as  $value) {
         $lg = $value->fld_valu;
         $name = $_POST["name".$lg];
         $resultData = $this->Charterpoat_model->Add_up_details_langroute($name,$lg,$route_id);
   }
}
echo $route_id;
}
  //---------------------------------------
     public function Do_inser_image(){
	$idclient = $this->session->userdata('client_user_id');
        $storedVal = $this->input->post('storedVal');
        
		$transport_id = $this->input->post('transport_id');
                $Data_re = $this->Van_model->Image_upload($storedVal,$transport_id,$idclient);
                //print_r($storedVal);
                echo $Data_re;
	}
  

     //-------------------	
	public function Addpriceland(){
        $transport = $this->input->post('transport'); 
        $price = $this->input->post('price');
        
        $landID = $this->input->post('tran_id');
        $pricelandID = $this->input->post('pricelandID');
            $result = $this->Charterpoat_model->insertpriceLand($transport,$price,$landID,$pricelandID);

        echo $result;		
				
	}
              //---------------------------------------------------------
    public function loadland() {
        $dataID = $this->input->post('dataID');
        $pricelandData = $this->Charterpoat_model->loadland($dataID);
        ?>
<table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4" >
                <thead>	
                    <tr style="background-color: #999999">
                        <th width="10" style="text-align:center">No</th>
                        <th width="281" style="text-align:center">Transport</th>
                        <th width="281" style="text-align:center">Price</th>
                        <th width="100" nowrap="nowrap" style="text-align:center">Edit </th>
                        <th width="100" nowrap="nowrap" style="text-align:center">Delete</th>
                    </tr>
                </thead>	
                <tbody>	
        <?php $n = 1; $y = 'Y';
        $idclient = $this->session->userdata('client_user_id');
        foreach ($pricelandData->result() as $pricelandData2) {
            $listTransport = $this->Charterpoat_model->listTransport($y,$idclient,$pricelandData2->transport_id);
            foreach ($listTransport->result() AS $listTransport2){}
            ?>
                    
                        <tr>
                            <td style="text-align:center"><?php echo $n ?></td>
                            <td style="text-align:center"><?php echo $listTransport2->transport_name ?></td>
                            <td style="text-align:center"><?php echo number_format($pricelandData2->price,2) ?></td>
                            <td style="text-align:center;" ><button type="button" class="btn btn-success btn-sm" onClick="updateThis('<?php echo $pricelandData2->id ?>','<?php echo $pricelandData2->transport_id?>','<?php echo $pricelandData2->price?>')"><i class="icon-pencil"></i></button></td>
                            <td style="text-align:center;"><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $pricelandData2->id ?>', 'tbl_pricelandpoat')"><i class="icon-trash"></i></button></td>
                        </tr>
            <?php $n++;} ?>
                </tbody>
</table>
   
        <?php
    }    
      //-------------------
	public function deleteData1(){  
	
		$dataID = $this->input->post('dataID');				
		$table = $this->input->post('table');				
		$Result = $this->Charterpoat_model->deleteData($dataID,$table);
		echo $Result;	
	}
}

?>
