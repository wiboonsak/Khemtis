<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Createpdf extends CI_Controller {



     public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Book_model");
        $this->load->model("Page_model");
        $this->load->model("./Lang_fc");
      } 


  function index(){

       $utoid_book = $this->input->get("idgp");  // gp Groub id sesiion ID  (package,transerpot,resterrang)
        $chk=$this->input->post("chk_lang");
        if($chk==""){$chk="English";}
          
        $data["chk_lang"]  = $chk;
        $data["get_lang"]  = $this->Book_model->get_lang();
        $data["get_crcy_code"] = $this->Book_model->get_crcy_code("CRCY_CODE");
    


            if(isset($paymentId) && $paymentId!=""){
                $idget_member007 = $this->session->userdata('idget_member007');
                $this->Book_model->up_st_pay($utoid_book,$idget_member007);
            }
     
  $ses_trans_id = $this->Book_model->get_book_id($utoid_book,"TRANSPORT");
  $ses_packs_id = $this->Book_model->get_book_id($utoid_book,"PACKAGE");
  $ses_restr_id = $this->Book_model->get_book_id($utoid_book,"RESTAURANT");
            
      

            $data["lang"]='EN';
            $hotel_nm = "";
            $get_lang_icon= $this->Book_model->get_icon_lang('en');
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }

             $data["icn_lang"]=$icn_lang;
             $data["ttlang"]=$text_lang;
            
             $book_id= $this->input->get("idh");  // Hotel sesiion ID
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
         //   $this->load->view('header_pdf',$data);
          //  $this->load->view('generatepdf',$data);

$data["book_date"] = date('d-M-Y');

    $this->load->view('generatepdf',$data);

    
    $html = $this->output->get_output();
            // Load pdf library
    $this->load->library('pdf');
    $this->pdf->loadHtml($html,'UTF-8');
    $this->pdf->setPaper('A4', 'portrait');//portrait//landscape
$this->pdf->set_option('defaultMediaType', 'all');
$this->pdf->set_option('isFontSubsettingEnabled', true);



    $this->pdf->render();
    // Output the generated PDF (1 = download and 0 = preview)
    $this->pdf->stream("VoucherKhemtis.pdf", array("Attachment"=> 0));  
   
  }






  function  reset_user_all(){
        echo "";
  }


  function resetpage(){
      $sec_007_cls = $this->input->post("sec_007_cls");
      if($sec_007_cls==1){
        echo "";
      }else{
       
      }
        echo "";
  }
  

  function goto_page(){
            echo "";
  }


  function up_book_st(){
    echo "";
  }

  function add_sec_book(){
          echo ""; 
  }








}