<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RoomManage extends CI_Controller {

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
                 $this->load->model("Room_model");
                 $this->load->library('upload');
          } 

public function index()
	{
	    // Gen Varible Arrary Send View 
          $idclient =  $this->session->userdata('client_user_id');

          $get_hotel_id = $this->input->get('hotelid');
          $get_room_id  = $this->input->get('autorunid');
          $get_typ  = $this->input->get('typ');
          
          if(!isset($get_hotel_id)){$get_hotel_id=-1;}
          if(!isset($get_room_id)){$get_room_id=-1;}
          if(!isset($get_typ)){$get_typ="";}

		  $data["results_service"]  = $this->Room_model->get_service($idclient);
		  $data["results_lang"]  = $this->Room_model->get_lang();
		  $data["get_typ"] = $get_typ;

		  $chk_hotel_id = $this->Room_model->chk_hotel_id($idclient);
		  $data["chk_hotel_id"] = $chk_hotel_id;
		  //if($chk_hotel_id!=0){$get_hotel_id=$chk_hotel_id;}

		  $data["get_room"] = $this->Room_model->get_select_room($get_room_id,$get_hotel_id);
		  $data["get_cry"] = $this->Room_model->get_cry($get_room_id,$get_hotel_id);
		  $data["get_address_hotel"] = $this->Room_model->get_address_hotel($idclient);
          $data["results_icon"] = $this->Room_model->get_results_icon("ROOM_FEATURE");
          $data["get_crcy_code"] = $this->Room_model->get_crcy_code("CRCY_CODE");

		
		$this->load->view('Header',$data);// Load Heder And Script Top Page
	    $this->load->view('RoomManage_view');
	    $this->load->view('Footer');// Load Footer And Script Buttom Page
	    $this->load->view('Text_script');
	    $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

	public function Do_insert_And_Update_room(){
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $get_formdata = array();
		   parse_str($formdata, $get_formdata);
           $Result = $this->Room_model->Add_update_data($get_formdata,$send_commnd);
		   echo $Result;
	}




	public function Do_inser_image(){
	    $idclient =  $this->session->userdata('client_user_id');
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $get_formdata = array();
		   parse_str($formdata, $get_formdata);
    
        $storedVal = $this->input->post('storedVal');
        $room_id = $this->input->post('room_id');
		$hotel_id = $this->input->post('hotel_id');
          $Data_re = $this->Room_model->Image_upload($storedVal,$room_id,$idclient);
          echo $Data_re;
         
	}


    function Do_update_icon(){
        $id_icon = $this->input->post('id_icon');
		$room_id = $this->input->post('room_id');
               $Result = $this->Room_model->update_icon($room_id,$id_icon,"N");
		       echo $Result;
	}
	
	function Do_set_true_icon(){
      $room_id = $this->input->post('room_id');
      $id_valu = $this->input->post('id_valu');
      $sty = $this->input->post('sty');
               $Result = $this->Room_model->set_true_icon($room_id,$id_valu,$sty);
		       echo $Result;

	}

    function DoShow_icon(){
    	$room_id =$this->input->post('room_id');
		$this->Room_model->get_room_icon("ROOM_FEATURE",$room_id);
    }


     function Do_tbl_field_values(){
         $st_data = $this->input->post('st_data');
		 $st_pr = $this->input->post('st_pr');
		 $this->Room_model->get_tbl_field_values($st_data,$st_pr);
	}
 
	function DoShow_room(){
		 $hotel_id =$this->input->post('hotel_id');
		 $room_id = $this->input->post('room_id');
		 $this->Room_model->get_room_data($hotel_id,$room_id);
	}

	function Do_delete_image(){
		 $idrun =$this->input->post('idrun');
         $hotel_id =$this->input->post('hotel_id');
		 $room_id = $this->input->post('room_id');
		 $re_st = $this->Room_model->del_room_data($idrun,$hotel_id,$room_id);
		 echo $re_st;
	}
   function Do_main_img(){
   	   	 $idrun =$this->input->post('idrun');
         $hotel_id =$this->input->post('hotel_id');
		 $room_id = $this->input->post('room_id');
		 $re_st = $this->Room_model->main_room_data($idrun,$hotel_id,$room_id);
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
