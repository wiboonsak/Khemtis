<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commission extends CI_Controller {

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
         $this->load->model("Cl_model");



        } 

	public function index()
	{

	    // Gen Varible Arrary Send View 

           $data["tokengenered"] =$this->session->userdata('token_sesion');
           $data_service = $this->Cl_model->show_client_service();
        $data["tbl_client_service"] = $data_service;
		$data["data_table"]=true;
	    $this->load->view('Commission_view',$data);

	}
    // Insert data To Database 
   function update_commp(){
   	$boat = 0;
   	$car=0;
   	$hotel=0;
   	$rest=0;
   	$tran=0;
$client_id = $this->input->post('client_id');

        $boat = $this->input->post('BOAT');
        $car = $this->input->post('CAR');
        $hotel = $this->input->post('HOTEL');
        $rest = $this->input->post('RESTAURANT');
        $tran = $this->input->post('TRANSPORT');
   	$this->Cl_model->update_commp_data($boat,$car,$hotel,$rest,$tran,$client_id);
   	$this->index();
   }

    // Insert data To Database 
	public function Do_insert_Example1(){

	}
	// Update data To Database 
	public function Do_update_Example1(){

	}
	// Delete data To Database 
	public function Do_delete_Example1(){

	}
	// Selected data To Database 
	public function Do_select_Example1(){

	}
	// All Select data To Database 
	public function Do_Allselect_Example1(){

	}
}
