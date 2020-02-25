<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client_user extends CI_Controller {

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
     if($this->session->userdata('admin_id')==''){ 
       	 $this->session->userdata('admin_id');
         redirect(base_url('Admin_login'), 'refresh');
       }
    $this->load->model("Cl_model");
   } 

	public function index()
	{
           $rc = ($this->Cl_model->record_count_client()-1);
           $data['tbl_field_values']= $this->Cl_model->fetch_field_values("SERVICE_CD");
           $this->load->view('Client_user',$data);
	}
  
	public function DoUpdate_Client_user(){
        $suggest = $this->input->post('suggest');
        $send_commnd = $this->input->post("send_commnd");
        $data_service = $this->input->post('data_service');
        $id_row = $this->input->post('id_row');
        $id_update = $this->input->post('id_update');
		$get_array = array();
		parse_str($suggest, $get_array);
		$get_ar_service = array();
		parse_str($data_service,$get_ar_service);
	

	        $Result = $this->Cl_model->Sa_Up_data($get_array,$send_commnd,$get_ar_service,$id_row,$id_update);
		echo $Result;
	}	
    public function Do_count_row(){
        $suggest = $this->input->post('suggest');
        $Result = $this->Cl_model->get_count_row();
        echo $Result;
	}

	public function Do_tbl_field_values(){
         $st_data = $this->input->post('st_data');
		 $st_pr = $this->input->post('st_pr');
		 $this->Cl_model->get_tbl_field_values($st_data,$st_pr);
	}

	public function DoShow_Client(){
		 $id_data = $this->input->post('id_data');
		 $st_data = $this->input->post('st_data');
		 $rw_con = $this->input->post('rw_con');
		 $max_tab = $this->input->post('max_tab');
		 $this->Cl_model->get_client_data($id_data,$st_data,$rw_con,$max_tab);
	}

    public function DoDel_cl_us(){
        $id_data = $this->input->post('id_data');
    	$Result = $this->Cl_model->Del_cl_us($id_data);
    	echo $Result;
    }

    public function DoEdit_cl_us(){
        $suggest = $this->input->post('suggest');
		$get_array = array();
		parse_str($suggest, $get_array);
	    $Result = $this->ad_model->Edit_cl_us($get_array);
		echo $Result;
    }

}
