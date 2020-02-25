<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PackageBooking extends CI_Controller {
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

            //$book_detail = $this->Book_model->get_package_detail($package_id);
            $data["hotel_room"]=$this->Book_model->package_hotel_room($Room_id);
            $data["book_page"]=true;
            $data["hotel_id"]=$hotel_id;
            $this->load->view('header',$data);
            $this->load->view('package_booking',$data);
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
