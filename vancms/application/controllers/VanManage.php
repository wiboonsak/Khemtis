<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VanManage extends CI_Controller {

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
       	  $this->session->userdata('client_user_id');
          redirect(base_url('Van_model'), 'refresh');
       }
       $this->load->model("Hotel_model");
       $this->load->model("Van_model");
  } 
  ///////////////////////////////////////////////////
	
  public function index($car_id =NULL){	
    //$boat_id = 13;
	//if($boat_id ==''){
		$car_id = 0;
	//}     
	$data["car_id"] = $car_id; 
	// อาโต้ยมะ 5555555555555   $boat_id รับมาเป็น GET หรือ Post ก็ได้จ๊ะน้องรัก
    $idclient = $this->session->userdata('client_user_id');
	$data["results_service"] = $this->Hotel_model->get_service($idclient);
	$data["results_lang"] = $this->Van_model->get_lang();	
	//$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	//$this->load->view('Home');
	$this->load->view('VanManage_view',$data);
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
  ///////////////////////////////////////////////////
	
  public function VanDetail($car_id =NULL){
	//$boat_id = $this->uri->segment(3);  
    //$boat_id = 13;
	//if($boat_id ==''){
		//$boat_id = 0;
	//}     
	$data["car_id"] = $car_id; 
	// อาโต้ยมะ 5555555555555   $boat_id รับมาเป็น GET หรือ Post ก็ได้จ๊ะน้องรัก
    $idclient = $this->session->userdata('client_user_id');
	$data["results_service"] = $this->Hotel_model->get_service($idclient);
	$data["results_lang"] = $this->Van_model->get_lang();	
	$data["get_van"]= $this->Van_model->get_Van_detail($car_id);
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	//$this->load->view('Home');
	$this->load->view('VanManage_view',$data);
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
  //////////////////////////////////////////////	
	
  public function insertUpdate_van(){
	  
    $formdata = $this->input->post('formdata');
    //$send_commnd = $this->input->post('send_commnd');
    $get_formdata = array();
 	parse_str($formdata, $get_formdata);
    $Result = $this->Van_model->Add_update_data($get_formdata);
	echo $Result;
  }
}

?>
