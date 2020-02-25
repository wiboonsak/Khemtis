<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_user extends CI_Controller {
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
        $this->load->library('session');
       if($this->session->userdata('admin_id')==''){ 
       	 $this->session->userdata('admin_id');
         redirect(base_url('Admin_login'), 'refresh');
       }
        $this->load->model("Ad_model");
    } 
	public function index()
	{
        $rc = ($this->Ad_model->record_count_admin()-1);
        $data["results"] = $this->Ad_model->fetch_admin(25,0);
        $this->load->view('Admin_user',$data);
	}
	public function DoUpdate_admin_user(){
        $suggest = $this->input->post('suggest');
        $send_commnd = $this->input->post('send_commnd');
		$get_array = array();
		parse_str($suggest, $get_array);
	    $Result = $this->Ad_model->Update_ad_us($get_array,$send_commnd);
		echo $Result;
	}	
	public function Do_count_row(){
        $suggest = $this->input->post('suggest');
        $Result = $this->Ad_model->get_count_row();
        echo $Result;
	}
	public function DoShow_admin(){
		 $id_data = $this->input->post('id_data');
		 $st_data = $this->input->post('st_data');
		 $rw_con = $this->input->post('rw_con');
		 $max_tab = $this->input->post('max_tab');
		 $this->Ad_model->get_admin_data($id_data,$st_data,$rw_con,$max_tab);


		 
	}
    public function DoDel_ad_us(){
        $id_data = $this->input->post('id_data');
    	$Result = $this->Ad_model->Del_ad_us($id_data);
    	echo $Result;
    }
    public function DoEdit_ad_us(){
        $suggest = $this->input->post('suggest');
		$get_array = array();
		parse_str($suggest, $get_array);
	    $Result = $this->Ad_model->Edit_ad_us($get_array);
		echo $Result;
    }



}
