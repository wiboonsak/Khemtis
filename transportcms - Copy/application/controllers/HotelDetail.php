<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HotelDetail extends CI_Controller {

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
             /*
             if($this->session->userdata('sessid')==''){ 
                redirect(base_url('sessid'), 'refresh');
              }
             */
               $this->load->model("Hotel_model");
          } 

	public function index()
	{
	    // Gen Varible Arrary Send View 
          $idclient =  $this->session->userdata('client_user_id');
		  $data["results_service"]  = $this->Hotel_model->get_service($idclient);
		  $data["results_lang"]  = $this->Hotel_model->get_lang();
		  $data["results_province"]  = $this->Hotel_model->get_results_province();
		  $data["results_country"]  = $this->Hotel_model->get_results_country();
		  $client_id_ses = $this->session->userdata('client_user_id');
		  $data["get_update_hotel"] = $this->Hotel_model->get_update_hotel($client_id_ses);
		  $data["get_address_hotel"] = $this->Hotel_model->get_address_hotel($client_id_ses);
		  $chk_hotel_id = $this->Hotel_model->chk_hotel_id($idclient);
		  $data["chk_hotel_id"] = $chk_hotel_id;

		//  $data["results_icon"] = $this->Hotel_model->get_results_icon("HOTEL_FEATURE");
		
		$this->load->view('Header',$data);// Load Heder And Script Top Page
	    $this->load->view('Form_hotel_view');
	    $this->load->view('Footer');// Load Footer And Script Buttom Page
	    $this->load->view('Text_script');
	    $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

   public function Do_insert_And_Update_hotel(){
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $client_id_ses = $this->session->userdata('client_user_id');
        $get_formdata = array();
		parse_str($formdata, $get_formdata);
        $Result = $this->Hotel_model->Add_update_data($get_formdata,$send_commnd,$client_id_ses);
		echo $Result;
	}

    function Do_add_hotel_id(){
        $client_id_ses = $this->session->userdata('client_user_id');
        $Result = $this->Hotel_model->add_hotel_id($client_id_ses);
		echo $Result;
    }

   public function Do_inser_image(){
	    $idclient =  $this->session->userdata('client_user_id');
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $get_formdata = array();
		parse_str($formdata, $get_formdata);
        $storedVal = $this->input->post('storedVal');
		$hotel_id = $this->input->post('hotel_id');
		    if($send_commnd=="ADD"){
		    	$hotel_id = $this->Hotel_model->Add_new_data($get_formdata,$send_commnd,$idclient);
		    }
                $Data_re = $this->Hotel_model->Image_upload($storedVal,$hotel_id,$idclient);
                echo $Data_re;
	}

	function Do_update_icon(){
        $idclient =  $this->session->userdata('client_user_id');
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $get_formdata = array();
		parse_str($formdata, $get_formdata);
        $id_icon = $this->input->post('id_icon');
        $hotel_feature = $this->input->post('hotel_feature');
		$hotel_id = $this->input->post('hotel_id');
		    if($send_commnd=="ADD"){
		    	$hotel_id = $this->Hotel_model->Add_new_data($get_formdata,$send_commnd,$idclient);
		    }
               $Result = $this->Hotel_model->update_icon($hotel_id,$id_icon,"N");
		       echo $Result;
	}

	function Do_set_true_icon(){
      $hotel_id = $this->input->post('hotel_id');
      $id_valu = $this->input->post('id_valu');
      $ch_true = $this->input->post('ch_true');
               $Result = $this->Hotel_model->set_true_icon($hotel_id,$id_valu,$ch_true);
		       echo $Result;
	}

	function DoShow_hotel(){
		 $hotel_id =$this->input->post('hotel_id');
		 $this->Hotel_model->get_hotel_data($hotel_id);
	}

    function DoShow_icon(){
    	$hotel_id =$this->input->post('hotel_id');
		$this->Hotel_model->get_hotel_icon("HOTEL_FEATURE",$hotel_id);
    }

	function Do_delete_image(){
		 $idrun =$this->input->post('idrun');
         $hotel_id =$this->input->post('hotel_id');
		 $re_st = $this->Hotel_model->del_hotel_data($idrun,$hotel_id);
		 echo $re_st;
	}

     function Do_main_img(){
   	   	 $idrun =$this->input->post('idrun');
         $hotel_id =$this->input->post('hotel_id');
		 $re_st = $this->Hotel_model->main_hotel_data($idrun,$hotel_id);
		 echo $re_st;
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
