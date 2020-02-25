<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_member extends CI_Controller {
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
        $this->load->model("./Book_model");
        $this->load->model("./Page_model");
      } 

	function index($idget_member007,$utoid_book,$book_id,$tycommand)
	{
		    $data["get_lang"]  = $this->Book_model->get_lang();
        $data["get_crcy_code"] = $this->Book_model->get_crcy_code("CRCY_CODE");

            $txt_find = $this->input->get("txt_find");  
            $book_st= $this->input->get("book_st");    
            $book_en= $this->input->get("book_en");  
            $Rooms= $this->input->get("Rooms");
            $Adults= $this->input->get("Adults");
            $Child= $this->input->get("Child");
            $lang = $this->input->get("lang");
          
            $paymentId = $this->input->get("paymentId");

            if(isset($paymentId) && $paymentId!=""){
                $idget_member007 = $this->session->userdata('idget_member007');
                $this->Book_model->up_st_pay($utoid_book,$idget_member007);
            }
     
  $ses_trans_id = $this->Book_model->get_book_id($utoid_book,"TRANSPORT");
  $ses_packs_id = $this->Book_model->get_book_id($utoid_book,"PACKAGE");
  $ses_restr_id = $this->Book_model->get_book_id($utoid_book,"RESTAURANT");
            
if($ses_trans_id!=""){
     $this->Book_model->get_st_book("UPDATE `tbl_pre_transport_booking_title` SET booking_status ='P'  WHERE id=$ses_trans_id");
}
if($ses_packs_id!=""){
     $this->Book_model->get_st_book("UPDATE `tbl_package_pre_booking` SET booking_status ='P'  WHERE id=$ses_packs_id");
}
if($ses_restr_id!=""){
     $this->Book_model->get_st_book("UPDATE `tbl_res_pre_booking` SET booking_status ='P'  WHERE id=$ses_restr_id");
}

              $gp_id = $this->session->userdata('sec_gp_book');
               $this->Book_model->up_st_gm($gp_id,1);

            $data["txt_search"] = $txt_find;
            $data["book_st"] = $book_st;
            $data["book_en"] = $book_en;
            $data["Rooms"] = $Rooms;
            $data["Child"] = $Child;
            $data["Adults"] = $Adults;           
            $hotel_id = $this->input->get("hotel_id");
            $data["lastpara"] = "&hotel_id=$hotel_id&txt_find=$txt_find&book_st=$book_st&book_en=$book_en&Rooms=$Rooms&Adults=$Adults&Child=$Child";

            $data["lang"]=$lang;
            $hotel_nm = "";
            $get_lang_icon= $this->Book_model->get_icon_lang('en');
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }

             $data["icn_lang"]=$icn_lang;
             $data["ttlang"]=$text_lang;
            
             if($book_id==""){$book_id=0;}
             $data["book_id"]=$book_id;
             $data["book_page"]=true;

           
            if($utoid_book==""){$utoid_book=0;}
            $book_room_detail= $this->Page_model->get_book_hotel_detail($utoid_book,"HT");
            $customer_hotel = $this->Page_model->get_customer_hotel($book_id);
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
$data["idgp"] = $utoid_book;
$data["idh"] = $book_id;
$data["tycommand"] = $tycommand;
            $this->load->view('./Member/payment_member_view',$data);
	}
  
  function up_pay_book(){
 $utoid_book =$this->session->userdata('sec_gp_book');
    if($utoid_book==""){$utoid_book=0;}
    $pay_st = $this->input->post("pay_st");
    if($pay_st==1){
      echo $this->Book_model->up_pay_book($pay_st,$utoid_book);
    }else{
      echo 0;
    }
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
