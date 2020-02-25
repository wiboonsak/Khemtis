<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_login extends CI_Controller {

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
    $this->load->model("HotelMail_model");
  }
   public function index(){

$getid = $this->input->get("getid");
$tak1 = $this->input->get("tak1");
$tak2 = $this->input->get("tak2");


    list($str,$txtmd5,$name_admin) =  $this->Cl_bord_model->check_login_admin($getid,$tak1,$tak2);
     if($str==1){
        $data = array(
                  'admin_proof' => '',
                    );
      $this->session->set_userdata($data);
       redirect(base_url("hotelDetail"), 'refresh');}
       $this->load->view('Hotel_login');
	}
			

	 public function check_log(){
     $rch=0;
     $u = $this->input->post('username_002');
     $p = $this->input->post('pass_002');
 
      list($str,$txtmd5) =  $this->Cl_bord_model->check_login($u,$p);
     if($str==1){
      redirect(base_url("Bookdata?filter=all"), 'refresh');}else{
     	redirect(base_url('Hotel_login'), 'refresh');}
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
            $this->session->sess_destroy();

           /*
             $this->db->where('user_id',$user_user_id);
             $data_gen = array(
             "user_token_gen" =>'',
               );
          if($this->db->update('Bookdata', $data_gen)){
            $this->session->set_userdata($data);
           
          }
          */
           redirect(base_url('Hotel_login'), 'refresh');
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
		$result = $this->HotelMail_model->update_newPass($password,$dataID);
		echo $result;			
	}
}
