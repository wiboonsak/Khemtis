<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends CI_Controller {

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
               $this->load->model("Room_iv_model");
          } 

	public function index()
	{

	    // Gen Varible Arrary Send View 
          $idclient =  $this->session->userdata('client_user_id');
          $data["results_service"]  = $this->Room_iv_model->get_service($idclient);
          $chk_hotel_id = $this->Room_iv_model->chk_hotel_id($idclient);
		  $data["chk_hotel_id"] = $chk_hotel_id;
		  $data["get_room"] =$this->Room_iv_model->room_detail($chk_hotel_id);
		  $data["get_cur"]=  $this->Room_iv_model->get_crcy_code("CRCY_CODE");
		  $data["data_table"]=true;
		  $this->load->view('Header',$data);// Load Heder And Script Top Page
	      $this->load->view('Inventory_view');
	      $this->load->view('Footer');// Load Footer And Script Buttom Page
	      $this->load->view('Text_script',$data);
	      $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 


function add_up_off(){
	$defoff = $this->input->post('defoff');
	$room_id = $this->input->post('room_id');
	   $d1 = $this->input->post('d1');
	   $d2 = $this->input->post('d2');
	   $d3 = $this->input->post('d3');


switch ($defoff) {
	case 1:
		   if($this->Room_iv_model->check_1($d1,$d2,$d3,$room_id)==1){
              echo $this->Room_iv_model->add_ch1($d1,$d2,$d3,$room_id);
           	}
           else if($this->Room_iv_model->check_2($d1,$d2,$d3,$room_id)==1){
              echo $this->Room_iv_model->add_ch2($d1,$d2,$d3,$room_id);
            }
           else if($this->Room_iv_model->check_0($d1,$d2,$d3,$room_id)==0){
              echo $this->Room_iv_model->add_ch0($d1,$d2,$d3,$room_id);
            }
		break;
    case 0:
		    if($this->Room_iv_model->check_off1($d1,$d2,$d3,$room_id)==1){
              echo $this->Room_iv_model->off_ch1($d1,$d2,$d3,$room_id);
            }
		    else if($this->Room_iv_model->check_off2($d1,$d2,$d3,$room_id)==1){
              echo $this->Room_iv_model->off_ch2($d1,$d2,$d3,$room_id);
            }
		    else if($this->Room_iv_model->check_off3($d1,$d2,$d3,$room_id)==1){
              echo $this->Room_iv_model->off_ch3($d1,$d2,$d3,$room_id);
            }
		    else{
		    	$last_dt = $this->Room_iv_model->check_off4($d1,$d2,$d3,$room_id);
                 if($last_dt!="No"){
                 	echo $this->Room_iv_model->off_ch4($d1,$d2,$d3,$room_id,$last_dt);
                 }
            }                                         
		break;
   }
}


function DoRoom_data(){
 $hotel_id = $this->input->post('hotel_id');
 	    if($hotel_id!=""){
           $this->Room_iv_model->room_detail($hotel_id);
 	    }
}

function DoShow_iv(){
 $hotel_id = $this->input->post('hotel_id');
 $datefind_s = $this->input->post('datefind_s');
 $datefind_e = $this->input->post('datefind_e');

        if($hotel_id!=""){
             $this->Room_iv_model->room_detail_iv($hotel_id,$datefind_s,$datefind_e);
        }
}

function DoShow_off(){
  $hotel_id = $this->input->post('hotel_id');
  $datefind_s = $this->input->post('datefind_s');
  $datefind_e = $this->input->post('datefind_e');
        if($hotel_id!=""){
             $this->Room_iv_model->room_detail_off($hotel_id,$datefind_s,$datefind_e);
        }
}


function DoShow_qta(){
  $hotel_id = $this->input->post('hotel_id');
  $datefind_s = $this->input->post('datefind_s');
  $datefind_e = $this->input->post('datefind_e');


        if($hotel_id!=""){
             $this->Room_iv_model->room_detail_qta($hotel_id,$datefind_s,$datefind_e);
        }
}
 function Doup_qta_iv(){
 	    $room_id = $this->input->post('room_id');
 	    $qta = $this->input->post('qta');
 	    $yy = $this->input->post('yy');
 	    $mm = $this->input->post('mm');
 	    $dd = $this->input->post('dd');
 	    $pdate = $yy."-".$mm."-".$dd; 
 	    if($room_id!=""){
  	          $Result = $this->Room_iv_model->Add_up_qta_iv($room_id,$qta,$pdate);
              echo $Result;
        }else{echo 0;}

 }

 function Doup_cry_iv(){
 	    $room_id = $this->input->post('room_id');
 	    $cry = $this->input->post('cry');
 	    $price = $this->input->post('price');
 	    $yy = $this->input->post('yy');
 	    $mm = $this->input->post('mm');
 	    $dd = $this->input->post('dd');
 	    $pdate = $yy."-".$mm."-".$dd; 
 	    if($room_id!=""){
  	          $Result = $this->Room_iv_model->Add_up_cry_iv($room_id,$cry,$price,$pdate);
              echo $Result;
        }else{echo 0;}
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
