<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AllBooking extends CI_Controller {
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
        $this->load->model("Register_model");
        $this->load->model("./Lang_fc");
      } 

	function index(){
		    $chk=$this->input->post("chk_lang");
		    if($chk==""){$chk="English";}
          
		    $data["chk_lang"]  = $chk;
		    $data["get_lang"]  = $this->Book_model->get_lang();
            $data["get_crcy_code"] = $this->Book_model->get_crcy_code("CRCY_CODE");

            $package_id = $this->input->get("package_id");
            $Room_id = $this->input->post("Room_id");
            $book_st = $this->input->post("id_start_date");
            $Adults= $this->input->post("Adults"); 
            $Child= $this->input->post("Child");
            $Single= $this->input->post("Single");
            $lang = $this->input->get("lang");

             $namepack = $this->input->post("namepack");

            $ad_pr = $this->input->post("ad_pr");
            $ld_pr = $this->input->post("ld_pr");
            $sg_pr = $this->input->post("sg_pr");

            $data["book_st"] = $book_st; 
          
            $data["Child"] = $Child;
            $data["Adults"] = $Adults;   
            $data["Single"] = $Single;  

            $data["ad_pr"] = $ad_pr;
            $data["ld_pr"] = $ld_pr;   
            $data["sg_pr"] = $sg_pr;     

            $data["namepack"] = $namepack;

            $hotel_id = $this->input->get("hotel_id");
            $data["lastpara"] = "&package_id=$package_id&book_st=$book_st&Adults=$Adults&Child=$Child&Single=$Single";

            $data["lang"]=$lang;
            
            $get_lang_icon= $this->Book_model->get_icon_lang('en');
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }

            $data["ses_hotel_id"]=$this->session->userdata('sec_book_id');
            
            $data["icn_lang"]=$icn_lang;
            $data["ttlang"]=$text_lang;
            
            $book_id=$this->session->userdata('sec_book_id'); 
            $data["book_id"]=$book_id;
            
    $book_st = $this->input->get("book_st");
    $time1 = strtotime($book_st);
    $newformat1 = date('Y-m-d',$time1);

$data["fname_member"]= $this->session->userdata('fname_member'); 
$data["lname_member"]= $this->session->userdata('lname_member'); 
$data["email_member"]= $this->session->userdata('email_member'); 
$data["phone_member"]= $this->session->userdata('phone_member'); 
$data["address_member"]= $this->session->userdata('address_member'); 

$data["id_run_trans_val"]= $this->input->post("id_run_trans_val");
$data["id_run_pack_val"]= $this->input->post("id_run_pack_val");
$data["id_run_res_val"]= $this->input->post("id_run_res_val");

            $this->load->view('header',$data);
            $this->load->view('all_booking',$data);
	}







function get_mem(){
   $mail = $this->input->post("mail");
   $pss = $this->input->post("pss");
   $idcus = "";
        $result = $this->Register_model->get_member($mail,$pss);
        $fname = "";
        $lname = "";
        $email = "";
        $phone = "";
        $address = "";
        foreach ($result as  $value) {
           $fname = $value->first_name;
           $lname = $value->last_name;
           $email = $value->cus_email;
           $phone = $value->cus_tel;
           $address = $value->cus_addr;
           $idcus = $value->id;
        }
        $ty_mem='';
        if($idcus!=""){$ty_mem='m';}
           $data = array(
                    'fname_member' => $fname,
                    'lname_member' => $lname,
                    'email_member' => $email,
                    'phone_member' => $phone,
                    'address_member' => $address,
                    'idget_member007' => $idcus,
                    'id_typ_mem' => $ty_mem
                    );
           $this->session->set_userdata($data);




   $cus_id =  $this->Book_model->chk_member_ty($fid);
       if($cus_id>0){
           $data = array(
                    'id_typ_mem' => 'm',
                    'idget_member007' =>$idcus
                    );
             $this->session->set_userdata($data);
        }
}




function get_fac(){
   $fid = $this->input->post("fid");
   $name = $this->input->post("name");
   $last = $this->input->post("last");
   $email = $this->input->post("email");
   $idcus = "";
   $cus_id = $this->Book_model->chk_facb_ty($fid);
   if($cus_id<1){
      $cus_id = $this->Book_model->add_cus_face($fid,$name,$last,$email);
   }
   $result = $this->Register_model->get_member_fac($cus_id);
        $fname = "";
        $lname = "";
        $email = "";
        $phone = "";
        $address = "";
        foreach ($result as  $value) {
           $fname = $value->first_name;
           $lname = $value->last_name;
           $email = $value->cus_email;
           $phone = $value->cus_tel;
           $address = $value->cus_addr;
           $idcus = $value->id;
        }
        $ty_mem='';
        if($idcus!=""){$ty_mem='f';}
           $data = array(
                    'fname_member' => $fname,
                    'lname_member' => $lname,
                    'email_member' => $email,
                    'phone_member' => $phone,
                    'address_member' => $address,
                    'idget_member007' => $idcus,
                    'id_typ_mem' => $ty_mem
                    );
             $this->session->set_userdata($data);
       if($cus_id>0){
        $data = array(
                    'id_typ_mem' => 'f',
                    'idget_member007' =>$idcus

                    );
             $this->session->set_userdata($data);
        }
        echo 'f';
}
  







function upfacebook(){
   $fid = $this->input->post("fid");
   $fir_name = $this->input->post("fir_name");
   $last_name = $this->input->post("last_name");
   $email = $this->input->post("email");
   $id_typ_mem = $this->session->userdata('id_typ_mem');


   $cus_res =  $this->Book_model->upfacebook_data($fid,$fir_name,$last_name,$email);
   if($cus_res==1){
     $data = array(
                    'fname_member' => $fir_name,
                    'lname_member' => $last_name,
                    'email_member' => $email,
                    'phone_member' => '',
                    'address_member' => '',
                    'idget_member007' => $cus_res
                    );
             $this->session->set_userdata($data);
     }
    echo $cus_res;                      
  }


function set_ty_ses(){
     $tyc = $this->input->post("tyc");
     $id_typ_mem = "";
     if($tyc=='m'){

      $id_typ_mem=$data_ty;}
     else if($tyc=='f'){

      $id_typ_mem=$data_ty;}

       $data = array(
                    'id_typ_mem' => $id_typ_mem
                    );
             $this->session->set_userdata($data);

}



  function goto_page(){
  			    $chk=$this->input->post("chk_lang");
		        if($chk==""){$chk="English";}
		        $data["chk_lang"]  = $chk;
  }

  function do_up_pre_book(){
    $dataall = $this->input->post("formdata");
    $get_array = array();
    parse_str($dataall, $get_array);

    $book_id=$this->session->userdata('sec_book_id');
    echo $this->Book_model->up_pre_book($get_array,$book_id);    
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
