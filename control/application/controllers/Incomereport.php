<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomereport extends CI_Controller{

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
        $this->load->model("Cl_model");
    } 

	public function index()
	{
      
    if($this->session->userdata('admin_id')==''){ 
       	 $this->session->userdata('admin_id');
            redirect(base_url('Admin_login'), 'refresh');
       }else{

         $data["show_client"] = $this->Cl_model->show_client();
         $data["data_book"] = $this->Cl_model->data_book();
         $data["client_data"] = $this->Cl_model->show_client();
          
        	 $this->load->view('Incomereport_view',$data);
       }


	}



	
}

?>
