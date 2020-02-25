<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bookdata extends CI_Controller {

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


	   public function __construct(){
        parent::__construct();
        $this->load->model("Room_model");
         $this->load->model("Cl_bord_model");
         $this->load->model("dasmodel");

        if($this->session->userdata('client_user_id')==''){ 
           $this->session->userdata('client_user_id');
         redirect(base_url('Transport_login'), 'refresh');
        }
       } 

 public function index(){
	    // Gen Varible Arrary Send View 
          $data["tokengenered"] = $this->session->userdata('token_sesion');
          $filter = $this->input->get('filter');
          $idclient = $this->session->userdata('client_user_id');
		  $data["results_service"]  = $this->dasmodel->get_service($idclient);
          $data["get_booking"]  = $this->dasmodel->get_booking_list($idclient,$filter);

    	$data["data_table"]=true;
		$this->load->view('Header',$data);// Load Heder And Script Top Page
	    $this->load->view('Book_data_view');
	    $this->load->view('Footer');// Load Footer And Script Buttom Page
	    $this->load->view('Text_script',$data);
	    $this->load->view('End_page'); // End Page Not Delete
	}

 // Insert data To Database 
 function add_new_room(){
 	    $hotel_id = $this->input->post('hotel_id');
 	    if($hotel_id!=""){
  	          $Result = $this->Room_model->Add_new_data($hotel_id);
              echo $Result;
        }else{echo 0;}
  }
 function data_set_stat_cd(){
	 	    $booking_number = $this->input->post('booking_number');
 	    if($booking_number!=""){
  	          $Result = $this->Room_model->set_stat_cd($booking_number);
              echo $Result;
        }else{echo 0;}
 }

 function loaddata(){
// test data information system //
	

}
    // Insert data To Database 
	public function Do_insert_Example1(){

	}
	// Update data To Database 
	public function Do_update_Example1(){

	}
	// Delete data To Database 
	public function Do_delete_Example1(){

	}
	// Selected data To Database 
	public function Do_select_Example1(){

	}
	// All Select data To Database 
	public function Do_Allselect_Example1(){

	}
}
