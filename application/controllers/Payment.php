<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {
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

	function index()
	{
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

            $fbid_member = $this->input->post("fbid_member");
            $cus_first_name = $this->input->post("cus_first_name");
            $cus_last_name = $this->input->post("cus_last_name");
            $cus_email = $this->input->post("cus_email");
            $cus_number = $this->input->post("cus_number");
            $cus_address = $this->input->post("cus_address");
          

        //    $hotel_sum_price = $this->session->userdata('sec_hotel_sum_price'); 

            


            $cus_id = $this->session->userdata('idget_member007');
            $book_id = $this->session->userdata('sec_gp_book');
            $hotel_sum_price = $this->Book_model->get_cmp($book_id,'ht_sum');

            $id_run_trans_val =  $this->input->post("id_run_trans_val");
            $id_run_pack_val =  $this->input->post("id_run_pack_val");
            $id_run_res_val =  $this->input->post("id_run_res_val");

            $id_run_boat_val =  $this->input->post("id_run_boat_val");
            $id_run_van_val =  $this->input->post("id_run_van_val");

           if($cus_first_name!="" && $cus_last_name!="" && $cus_email!="" && $cus_number!=""){
            $ch_up = 0;
            if($book_id!=""){
               //$add_address();
               $chkupbook_hotel=$this->Book_model->update_book_hotel($book_id,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member,
               $hotel_sum_price
               );
               $ch_up++;
           //    echo "hotel";
            }

            if($id_run_trans_val!=""){
               $chkupbook_trans=$this->Book_model->update_book_trans(
               $id_run_trans_val,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member
               );
               $ch_up++;
             //  echo "tran";
             }

             if($id_run_pack_val!=""){
               $chkupbook_pack=$this->Book_model->update_book_pack($id_run_pack_val,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member
               );
               $ch_up++;
             //  echo "pack";
              }

             if($id_run_res_val!=""){
               $chkupbook_res=$this->Book_model->update_book_res($id_run_res_val,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member
               );
               $ch_up++;
             //  echo "pack";
              }

             if($id_run_boat_val!=""){
               $chkupbook_res=$this->Book_model->update_book_boat($id_run_res_val,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member
               );
               $ch_up++;
             //  echo "pack";
              }


             if($id_run_van_val!=""){
               $chkupbook_res=$this->Book_model->update_book_van($id_run_res_val,
               $cus_first_name,
               $cus_last_name,
               $cus_email,
               $cus_number,
               $cus_address,
               $fbid_member
               );
               $ch_up++;
             //  echo "pack";
              }







           if($ch_up>0){
               $gp_id = $this->session->userdata('sec_gp_book');
               $this->Book_model->up_st_gm($gp_id,0);
           }}else{
              header( "location: https://www.khemtis.com/AllBooking" );
              exit(0);
           }

            /*
            $get_lang_icon= $this->Page_model->get_icon_lang($lang);
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }
            $data["icn_lang"]=$icn_lang;
           */

           // $data["ttlang"]=$text_lang;

            $data["txt_search"] = $txt_find;
            $data["book_st"] = $book_st;
            $data["book_en"] = $book_en;
            $data["Rooms"] = $Rooms;
            $data["Child"] = $Child;
            $data["Adults"] = $Adults;           
            $hotel_id = $this->input->get("hotel_id");
            $data["lastpara"] = "&hotel_id=$hotel_id&txt_find=$txt_find&book_st=$book_st&book_en=$book_en&Rooms=$Rooms&Adults=$Adults&Child=$Child";
          //  $data["data_hotel"] =$this->Page_model->data_find_hotel_id($hotel_id,$lang);
          //  $data["get_room"] =  $this->Page_model->get_room_data($hotel_id,$lang);
            $data["lang"]=$lang;
            $hotel_nm = "";
            $hotel_id = "";
            $get_lang_icon= $this->Book_model->get_icon_lang('en');
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }

             $data["icn_lang"]=$icn_lang;
             $data["ttlang"]=$text_lang;
            
             $book_id=$this->session->userdata('sec_book_id');
             if($book_id=="" || $book_id==0){$book_id=0;}
             $data["book_id"]=$book_id;
             $data["book_page"]=true;


            $utoid_book =$this->session->userdata('sec_gp_book');
            if($utoid_book==""){$utoid_book=0;}

            $dis_count = $this->Page_model->get_id_pro_code($utoid_book);
            $data["dis_count"] = $dis_count;

            $book_room_detail= $this->Page_model->get_book_hotel_detail($utoid_book,"HT");
            $customer_hotel = $this->Page_model->get_customer_hotel($book_id);
            $idroom = 0;
            foreach ($book_room_detail as  $value) {
              $idroom = $value->room_id;
            }
            $hotel_nm = $this->Page_model->get_hotel_name($idroom);
            foreach ($hotel_nm as  $value1) {
              $hotel_id = $value1->hotel_id;
              $hotel_nm = $value1->hotel_nm;
              $hotel_policy = $value1->txt_policy;
            }
$data["hotel_id"] = $hotel_id;
$data["hotel_nm"] = $hotel_nm;
$data["hotel_policy"] = $hotel_policy;
$data["book_room_detail"] = $book_room_detail;
$data["customer_hotel"] = $customer_hotel;
$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 
             $sec_book_id=$this->session->userdata('sec_book_id');
             $utoid_book =$this->session->userdata('sec_gp_book');
            if($utoid_book==""){$utoid_book=0;}
            $book_trans_detail= $this->Page_model->get_book_transport_detail($utoid_book,"TS");
            $pack_detail= $this->Page_model->get_book_package_detail($utoid_book);
            $pack_res = $this->Page_model->get_book_res_detail($utoid_book);
            $pack_boat = $this->Page_model->get_book_boat_detail($utoid_book);
            $pack_van = $this->Page_model->get_book_van_detail($utoid_book);

            $customer_transport  = $this->Page_model->get_customer_transport($utoid_book,'TS');
$data["customer_transport"]=$customer_transport;
$data["book_trans_detail"]=$book_trans_detail;
$data["pack_detail"]=$pack_detail;
$data["pack_res"]=$pack_res;
$data["pack_boat"] = $pack_boat;
$data["pack_van"] = $pack_van;
            $this->load->view('header',$data);
            $this->load->view('payment_view');
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
