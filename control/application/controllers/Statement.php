<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statement extends CI_Controller {

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
         $this->load->model("Statement_model");



        } 

	public function index()
	{

	    // Gen Varible Arrary Send View 

           $data["tokengenered"] =$this->session->userdata('token_sesion');
           $data_service = $this->Cl_model->show_client_service();
        $data["tbl_client_service"] = $data_service;
		$data["data_table"]=true;
                
            $Client_id = $this->input->get('ID');
            $data["Client_data"] = $this->Statement_model->clientselect($Client_id);
            $data["Client_id"] = $Client_id;
            $data["statement_data"] = $this->Statement_model->statement_data($Client_id);
	    $this->load->view('Statement_view',$data);

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

    //------------------------------- 	
    public function addstatement() {
        $client_name = $this->input->post('client_name');
        $client_id = $this->input->post('client_id');
        $Date = $this->input->post('Date');
        $Time = $this->input->post('Time');
        $Bank = $this->input->post('Bank');
        $Amount = $this->input->post('Amount');
       // $img = $_FILES['img']['name'];
        $upload_path = './uploadfile/';
        $upload_pathName = 'uploadfile/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '0';
        $image_data = array();
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img']['name']);
        if ($countFiles > 0) {
            for ($i = 0; $i < $countFiles; $i++) {
                //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                    $result_id = $this->Statement_model->adddata($client_id,$client_name,$Date,$Time,$Bank,$Amount,$img);
                    echo $result_id;
                }
            }
        }
        //echo $client_name.$Date.$Time.$Bank.$Amount.$img.'..............';
    }
}
