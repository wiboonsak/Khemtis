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
        $this->load->model("Page_model");
        $this->load->model("Cl_bord_model");
  } 

	public function index()
	{
        if($this->session->userdata('client_user_id')==''){ 
           $this->session->userdata('client_user_id');
           redirect(base_url('Hotel_login'), 'refresh');
        }else{
        
          $idclient =  $this->session->userdata('client_user_id');
          $data["idclient"] = $idclient;
		  $data["results_service"]  = $this->Cl_bord_model->get_service($idclient);

         // $data["show_client"] = $this->Cl_model->show_client($idclient);
          $data["data_book"] = $this->Cl_model->data_book();
          $data["client_data"] = $this->Cl_model->show_client($idclient);

          $data["p_dc1"] = $this->input->get("dc1");
          $data["p_mc1"] = $this->input->get("mc1");
          $data["p_yc1"] = $this->input->get("yc1");

          $data["p_dc2"] = $this->input->get("dc2");
          $data["p_mc2"] = $this->input->get("mc2");
          $data["p_yc2"] = $this->input->get("yc2");
          
        	 $this->load->view('Incomereport_view',$data);
        	 
       }


	}



	
}

?>
