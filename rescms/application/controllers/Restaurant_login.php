<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_login extends CI_Controller {

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
    $this->load->model('RestaurantMail_model');
  }
	public function index()
	{
		$this->load->view('Restaurant_login');
	}
	 public function check_log(){
     $rch=0;
     $u = $this->input->post('username_002');
     $p = $this->input->post('pass_002');
 
     list($str,$txtmd5) =  $this->Cl_bord_model->check_login($u,$p);
     if($str==1){
        redirect(base_url("Bookdata/index/$txtmd5?filter=all"), 'refresh');}else{
      	redirect(base_url('Restaurant_login'), 'refresh');}
     }
   public function log_out(){
             $data = array(
            	      'user_user_id' => '',
                    'client_user_id' => '',
                    'client_user_full_name' => '',
                    'client_user_type' => '',
                    'client_user_user' => '',
                    'client_user_prefix' => '',
                    'token_sesion' => '',
                    );
             $user_user_id =  $this->session->userdata('user_user_id');
             $this->db->where('user_id',$user_user_id);
             $data_gen = array(
             "user_token_gen" =>'',
               );
          if($this->db->update('tbl_users', $data_gen)){
            $this->session->set_userdata($data);
            redirect(base_url('Restaurant_login'), 'refresh');
          }
      }
   public function ResetPassword()
	{
        $user_id = $this->uri->segment(3);
		$data['user_id'] = $user_id;
		$this->load->view('Resetpassword',$data);
	}
                //---------------------------
    public function save_newPass(){ 		
		
		$password = $this->input->post('pass');		
		$dataID = $this->input->post('myId');		
		$result = $this->RestaurantMail_model->update_newPass($password,$dataID);
		echo $result;			
	}
}
