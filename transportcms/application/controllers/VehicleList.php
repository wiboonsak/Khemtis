<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class VehicleList extends CI_Controller {

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
            $this->load->model("Hotel_model");
       		$this->load->model("Van_model");
         if($this->session->userdata('client_user_id')==''){ 
            redirect(base_url('Transport_login.php'), 'refresh');
        }
               
          } 

	public function index(){

	  $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');

	  $data["results_service"] = $this->Hotel_model->get_service($idclient);
	  $data["results_lang"] = $this->Van_model->get_lang();
	  $data["data_table"]=true;	
	  //$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
	  $data["get_Van_list"]= $this->Van_model->get_Van_list($idclient);
	  $this->load->view('Header',$data);// Load Heder And Script Top Page
	  //$this->load->view('Home');
	  $this->load->view('VehicleList_view',$data);
	  $this->load->view('Footer');// Load Footer And Script Buttom Page
	  $this->load->view('Text_script');
	  $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

}
