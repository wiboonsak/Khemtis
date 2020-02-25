<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form_hotel extends CI_Controller {

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
               $this->load->model("Form_model");
          } 

	public function index()
	{
 
		// Gen Varible Arrary Send View 
		$data["ar1"]="Test Sentdata 1";
		$data["ar2"]="Test Sentdata 2";
		$data["ar3"]="Test Sentdata 3";

		$this->load->view('Header');// Load Heder And Script Top Page
	    $this->load->view('Form_control_view',$data);// Conntenct Or Form Page
	    $this->load->view('Footer');// Load Footer And Script Buttom Page
	    $this->load->view('Text_script');
	    $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

	public function Do_insert_And_Update_Example1(){
        $get_array = $this->input->post('get_array');
        
        $Result = $this->Form_model->Update_ad_us($get_array,$typ);
		echo $Result;
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
