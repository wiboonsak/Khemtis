<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HotelBooking extends CI_Controller {
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
		    $chk=$this->input->post("chk_lang");
		    if($chk==""){$chk="English";}
          
		    $data["chk_lang"]  = $chk;
		    $data["get_lang"]  = $this->Book_model->get_lang();
            $data["get_crcy_code"] = $this->Book_model->get_crcy_code("CRCY_CODE");

            $txt_find =  $this->input->get("txt_find");  
            $book_st= $this->input->get("book_st");    
            $book_en= $this->input->get("book_en");  
            $Rooms= $this->input->get("Rooms");
            $Adults= $this->input->get("Adults");
            $Child= $this->input->get("Child");
            $lang = $this->input->get("lang");

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
            $data["lastpara"] = "&hotel_id=$hotel_id&book_st=$book_st&book_en=$book_en&Rooms=$Rooms&Adults=$Adults&Child=$Child";
          //  $data["data_hotel"] =$this->Page_model->data_find_hotel_id($hotel_id,$lang);
          //  $data["get_room"] =  $this->Page_model->get_room_data($hotel_id,$lang);
            $data["lang"]=$lang;
            
            $get_lang_icon= $this->Book_model->get_icon_lang('en');
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }
            $data["icn_lang"]=$icn_lang;
            $data["ttlang"]=$text_lang;
            
            $book_id=$this->session->userdata('sec_book_id');
            $data["book_id"]=$book_id;
            
            if($book_id==""){$book_id=0;}
            $book_room_detail= $this->Page_model->get_book_room_detail($book_id);
            $txt_sql="";
            foreach ($book_room_detail as $val_room_detail) {
                 $txt_sql = $txt_sql.",".$val_room_detail->room_id;
            }

$book_st = $this->input->get("book_st");
$book_en = $this->input->get("book_en");
$time1 = strtotime($book_st);
$newformat1 = date('Y-m-d',$time1);
$time2 = strtotime($book_en);
$newformat2 = date('Y-m-d',$time2);

            $data["get_room_price_detail"] = $this->Book_model->get_room_price_detail($hotel_id,'THB',$newformat1,$newformat2,
              " AND tbl_rooms.room_id IN(".substr($txt_sql,1).")");
            $data["book_room_detail"]=$book_room_detail;
            $data["name_hotel"] = $this->Book_model->get_name_hotel($hotel_id);
            $data["book_page"]=true;
            $data["hotel_id"]=$hotel_id;
            $this->load->view('header',$data);
            $this->load->view('hotel_booking',$data);
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
