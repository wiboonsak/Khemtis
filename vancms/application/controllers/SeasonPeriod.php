<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SeasonPeriod extends CI_Controller {

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
             /*
             if($this->session->userdata('sessid')==''){ 
                redirect(base_url('sessid'), 'refresh');
              }
             */
               $this->load->model("Room_model");
          } 

	public function index()
	{

	    // Gen Varible Arrary Send View 
          $idclient =  $this->session->userdata('client_user_id');
		  $data["results_service"]  = $this->Room_model->get_service($idclient);
          $data["get_room_list"]  = $this->Room_model->get_room_list($idclient);

          $chk_hotel_id = $this->Room_model->chk_hotel_id($idclient);
		  $data["chk_hotel_id"] = $chk_hotel_id;
	

		  $data["data_table"]=true;
		$this->load->view('Header',$data);// Load Heder And Script Top Page
	    $this->load->view('SeasonPeriod_view');
	    $this->load->view('Footer');// Load Footer And Script Buttom Page
	    $this->load->view('Text_script',$data);
	    $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

function DoShow_season(){
	 $hotel_id = $this->input->post('hotel_id');
     $this->Room_model->get_tbl_season_period($hotel_id);
}


 function add_season(){
 	    $hotel_id = $this->input->post('hotel_id');
 	    $form_data = $this->input->post('form_data');
 	     $get_formdata = array();
		parse_str($form_data, $get_formdata);
 	    if($hotel_id!=""){
  	          $Result = $this->Room_model->add_update_season($get_formdata,$hotel_id);
              echo $Result;
        }else{echo 0;}
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
