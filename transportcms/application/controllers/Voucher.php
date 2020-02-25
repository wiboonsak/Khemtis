<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voucher extends CI_Controller {
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
        $this->load->model("Book_model");
        $this->load->model("Page_model");
      } 

	function index()
	{


    $service = 'Transport';
    $utoid_book = $this->input->get("trans_id");
    $book_id = 0;
          //echo $service;
            if($utoid_book==""){$utoid_book=0;}
            $book_room_detail= $this->Page_model->get_book_hotel_detail($utoid_book,"HT");
            $customer_hotel = $this->Page_model->get_customer_hotel($utoid_book);
            $customer_transport = $this->Page_model->get_customer_transport($utoid_book,"TS");
            $idroom=0;
            foreach ($book_room_detail as  $value) {
              $idroom = $value->room_id;
            }
            $hotel_nm = $this->Page_model->get_hotel_name($idroom);
            foreach ($hotel_nm as  $value1) {
              $hotel_nm = $value1->hotel_nm;
              $hotel_policy = $value1->txt_policy;
            }
$data["customer_hotel"] = $customer_hotel;
$data["customer_transport"] = $customer_transport;
$data["hotel_nm"] = $hotel_nm;
$data["hotel_policy"] = $hotel_policy;
$data["book_room_detail"] = $book_room_detail;
$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 

     
            if($utoid_book==""){$utoid_book=0;}
             $book_trans_detail= $this->Page_model->get_book_transport_detail($utoid_book,"TS");
             $pack_detail= $this->Page_model->get_book_package_detail($utoid_book);
             $pack_res = $this->Page_model->get_book_res_detail($utoid_book);
$data["book_trans_detail"]=$book_trans_detail;
$data["pack_detail"]=$pack_detail;
$data["pack_res"]=$pack_res;
$data["service"]=$service;



            $this->load->view('voucher_view',$data);
	}


     function goto_page(){
  			    $chk=$this->input->post("chk_lang");
		        if($chk==""){$chk="English";}
		        $data["chk_lang"]  = $chk;
     }


  function up_book_st(){
    $sec_book_id=$this->session->userdata('sec_book_id');
   echo $this->Book_model->up_st($sec_book_id);
  }
     function add_sec_book(){
            if($this->session->userdata('sec_book_id')==''){
             $utoid_book = $this->Book_model->add_pre_book();
             $id_set = array(
                    'sec_book_id' =>$utoid_book,
                    );
            $this->session->set_userdata($id_set);
            echo $utoid_book;
            }
           
  }
}
