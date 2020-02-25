<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client_admin extends CI_Controller {

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
     if($this->session->userdata('client_id')==''){ 
       	 $this->session->userdata('client_id');
         redirect(base_url('Client_login'), 'refresh');
       }
    $this->load->model("Cl_bord_model");
   } 

	public function index()
	{
  
          $idclient =  $this->session->userdata('client_id');
		  $data["results_service"]  = $this->Cl_bord_model->get_service($idclient);
		  $data['user_field_values']= $this->Cl_bord_model->fetch_field_values($idclient);
          $this->load->view('Client_admin',$data);
	}
  


	public function DoUpdate_Client_admin(){
		$pre_fix = $this->session->userdata('client_prefix');
		$client_id_ses = $this->session->userdata('client_id');
        $suggest = $this->input->post('suggest');
        $data_service = $this->input->post('data_service');
        $send_commnd = $this->input->post("send_commnd");
		$get_array = array();
		parse_str($suggest, $get_array);

	    $get_ar_service = array();
		parse_str($data_service,$get_ar_service);


	        $Result = $this->Cl_bord_model->Sa_Up_data($get_array,$send_commnd,$pre_fix,$get_ar_service,$client_id_ses);
		echo $Result;
	}	
  
	public function DoShow_Client(){
		 $id_data = $this->input->post('id_data');
		 $st_data = $this->input->post('st_data');
		 $rw_con = $this->input->post('rw_con');
		 $max_tab = $this->input->post('max_tab');
		 $this->Cl_bord_model->get_client_data($id_data,$st_data,$rw_con,$max_tab);
	}

	public function Do_tbl_field_values(){
         $st_data = $this->input->post('st_data');
		 $st_pr = $this->input->post('st_pr');
		 $this->Cl_bord_model->get_tbl_field_values($st_data,$st_pr);
	}

	   public function Do_count_row(){
        $Result = $this->Cl_bord_model->get_count_row();
        echo $Result;
	}


}
 