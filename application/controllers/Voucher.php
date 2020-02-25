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
        $this->load->model("./Lang_fc");
      } 

	function index(){
        $utoid_book =$this->session->userdata('sec_gp_book');
   if($utoid_book!=""){
   }else{
      redirect(base_url(), 'refresh');
   }


		    $chk=$this->input->post("chk_lang");
		    if($chk==""){$chk="English";}
          
		    $data["chk_lang"]  = $chk;
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
            
              $book_id=$this->session->userdata('sec_book_id');
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
            $this->load->view('header',$data);
            $this->load->view('voucher_view');
	}
  



function send_email(){ 
    	$from_email = '23streetkingz@gmail.com';
		$subject = "Package Voucher";		
		//$to_email = $editor_data2->email;
		//$to_email = $emaildata;
		$to_email = 'wiboonsak.suw@gmail.com';
		$email_body = '<div class="row" style="width:300px;text-align: center;">
    <div class="col-md-12" style="padding:10px;margin:5px"><img src="'.base_url().'/assets/images/logo/logo-black-color-1.png"></div>
    <div class="col-md-12" style="padding:10px;background-color:#ffdd00;color:#000000;margin:5px;font-size:15px;border-radius:5px">
      <b>Hotel Voucher</b><br>2,000 Bhat</div>
    <div class="col-md-12" style="padding:10px;background-color:#ffdd00;color:#000000;margin:5px;font-size:15px;border-radius:5px">
      <b> Package Voucher</b><br>2,000 Bhat</div>
    <div class="col-md-12" style="padding:10px;background-color:#ffdd00;color:#000000;margin:5px;font-size:15px;border-radius:5px">
       <b>Transport Voucher</b><br>2,000 Bhat</div>
    <div class="col-md-12" style="padding:10px;background-color:#ffdd00;color:#000000;margin:5px;font-size:15px;border-radius:5px">
       <b>Restuarants Voucher</b><br>2,000 Bhat</div>
           <div class="col-md-12" style="padding:10px;background-color:#efefef;color:#000000;margin:5px;font-size:15px;border-radius:5px">
       <b>TOTAL</b><br>2,000 Bhat</div>
       <div class="col-md-12" style="padding:10px;background-color:#1182b5;color:#ffffff;margin:5px;font-size:15px;border-radius:5px;cursor: pointer;" >
         <a href = "'.base_url().'/Createpdf?idgp=298&idh=164"><div style="border-radius: 10px;background-color:">DOWNLOAD PDF</div></a>
      </div>    
</div>';	 			
                    $this->email->from($from_email, 'Package Voucher'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
       	$this->email->message($email_body); 
        if($this->email->send()){
              	$result = 1;	
        }else{
            $result = 0;  	
        }	
		echo $result;
}




  function  reset_user_all(){
    /*
       $this->session->unset_userdata('sec_gp_book');
       $this->session->unset_userdata('chk_pay');
       $this->session->unset_userdata('sec_book_id');
       $this->session->unset_userdata('sec_book_res_id');
       $this->session->unset_userdata('sec_book_package_id');
       $this->session->unset_userdata('session_tranfer_bookid');
       */
  }


  function resetpage(){
       //$this->session->sess_destroy();
      $sec_007_cls = $this->input->post("sec_007_cls");
      if($sec_007_cls==1){
        /*
       $this->session->unset_userdata('sec_gp_book');
       $this->session->unset_userdata('chk_pay');
       $this->session->unset_userdata('sec_book_id');
       $this->session->unset_userdata('sec_book_res_id');
       $this->session->unset_userdata('sec_book_package_id');
       $this->session->unset_userdata('session_tranfer_bookid');
       */
      }else{
       
      }
        /*
       $this->session->unset_userdata('sec_gp_book');
       $this->session->unset_userdata('chk_pay');
       $this->session->unset_userdata('sec_book_id');
       $this->session->unset_userdata('sec_book_res_id');
       $this->session->unset_userdata('sec_book_package_id');
       $this->session->unset_userdata('session_tranfer_bookid');
       */
       //redirect(base_url(), 'refresh');
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
