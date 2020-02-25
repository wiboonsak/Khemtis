<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChartertransportList extends CI_Controller {

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
       if($this->session->userdata('client_user_id')==''){ 
          redirect(base_url('Transport_login.php'), 'refresh');
       }
            $this->load->model("Hotel_model");
       		$this->load->model("Place_model");
       		$this->load->model("Chartertran_model");
          } 

	public function index(){

	  $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');

	  $data["results_service"] = $this->Hotel_model->get_service($idclient);
	  $data["results_lang"] = $this->Chartertran_model->get_lang();
	  $data["data_table"]=true;	
	  //$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
          $data["get_chartertran_list"]= $this->Chartertran_model->get_chartertran_list($idclient);
	  $this->load->view('Header',$data);// Load Heder And Script Top Page
	  //$this->load->view('Home');
	  $this->load->view('ChartertranManageList_view',$data);
	  $this->load->view('Footer');// Load Footer And Script Buttom Page
	  $this->load->view('Text_script');
	  $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

public function deleteData(){  
	
		$dataID = $this->input->post('dataID');								
		$Result = $this->Chartertran_model->deleteDatacharter($dataID);
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
