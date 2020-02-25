<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
       $this->load->library('session');
       if($this->session->userdata('client_user_id')==''){ 
       	  $this->session->userdata('client_user_id');
         redirect(base_url('Hotel_login'), 'refresh');
       }
       $this->load->model("Hotel_model");
  } 
  ///////////////////////////////////////////////////
  public function index(){

	  // Gen Varible Arrary Send View 
    $idclient = $this->session->userdata('client_user_id');
	$data["results_service"] = $this->Hotel_model->get_service($idclient);
		
	$this->load->view('Header',$data);// Load Heder And Script Top Page
	$this->load->view('Home');
	$this->load->view('Footer');// Load Footer And Script Buttom Page
	$this->load->view('Text_script');
	$this->load->view('End_page'); // End Page Not Delete
  }
}

?>
