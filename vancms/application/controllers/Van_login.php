<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Van_login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it
	 's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   public function __construct(){
    parent::__construct();
    $this->load->model("Cl_bord_model");
  
  }
	public function index()
	{
		$this->load->view('Van_login');
	}

	 public function check_log(){
      $rch=0;
      $u = $this->input->post('username_002');
      $p = $this->input->post('pass_002');
      $rch =  $this->Cl_bord_model->check_login($u,$p);
     if($rch==1){redirect(base_url('Home'), 'refresh');}else{
     	           redirect(base_url('Va_login'), 'refresh');}
   }
   public function log_out(){
            $data = array(
            	    'user_user_id' => '',
                    'client_user_id' => '',
                    'client_user_full_name' => '',
                    'client_user_type' => '',
                    'client_user_user' => '',
                    'client_user_prefix' => '',
                    );
            $this->session->set_userdata($data);
   	      redirect(base_url('Van_login'), 'refresh');
   }
}
