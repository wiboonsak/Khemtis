<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Page_model");
        $this->load->model("Register_model");
        $this->load->model('Routetranfer/Routetranfer_model');
        $this->load->model("./Lang_fc");
    }

    function index() {
        $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $h_lg = $this->session->userdata('ch_lang');
if(trim($h_lg)==""){
}else if(trim($h_lg)=="English"){
         $chk = "English";
}else if(trim($h_lg)=="Thai"){
         $chk = "Thai";
}
        $data["chk_lang"] = $chk;
        $data["get_lang"] = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
        $lang = $this->input->get("lang");
        if ($lang == "") {
            $lang = "en";
        }
        $get_lang_icon = $this->Page_model->get_icon_lang($lang);
        
        foreach ($get_lang_icon as $lang_val) {
            $icn_lang = $lang_val->field1;
            $text_lang = $lang_val->fld_valu_desc;
        }

        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;

        $pro_show_sld = $this->Page_model->get_pro_show_sld();
        $data["pro_show_sld"] = $pro_show_sld;
        
        $data["fname_member"]=$this->session->userdata('fname_member'); 
        $data["lname_member"]=$this->session->userdata('lname_member'); 
        $get_url = "https://www.khemtis.com/";
        $typ_mem = 0;
        $data["paramem"] = $get_url;
        $data["typ_mem"] = $typ_mem;
        $data["get_vdo_play"] = $this->Page_model->get_vdo_play();
        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

function seslang(){
     $lg = $this->input->post("lg");
             $data = array(
                    'ch_lang' => $lg,

                    );
            $this->session->set_userdata($data);
            $m_id = $this->session->userdata('idget_member007'); 
            if($m_id!=""){
               $this->Register_model->add_lang($m_id,$lg);
            } 
}


    function get_member(){
        $mail = $this->input->post("mail");
        $pss = $this->input->post("pss");
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
        $st=0;
        if($fname!=""){$st=1;}
        $arr = array('st' =>$st);
        echo json_encode($arr);
       
    }




    function logout_member(){



                     $data = array(
                    'fname_member' => "",
                    'lname_member' => "",
                    'email_member' => "",
                    'phone_member' => "",
                    'address_member' => ""
                    );

                     /*
       $this->session->set_userdata($data);
       $this->session->unset_userdata('sec_gp_book');
      // $this->session->unset_userdata('chk_pay');
       $this->session->unset_userdata('sec_book_id');
       $this->session->unset_userdata('sec_book_res_id');
       $this->session->unset_userdata('sec_book_package_id');
       $this->session->unset_userdata('session_tranfer_bookid');

       $this->session->unset_userdata('sec_book_bot_id');
       $this->session->unset_userdata('sec_book_van_id');
       */


       echo 1;

//$this->session->sess_destroy();



    }


    function goto_page() {
        $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
        }
        $data["chk_lang"] = $chk;
    }


   
    //------------------------------- 	
    public function addregister() {

        $first_name = $this->input->post('name');
        $last_name = $this->input->post('lastname');
        $cus_email = $this->input->post('email');
        $cus_tel = $this->input->post('phone');
        $cus_addr = $this->input->post('Address');
        $cus_password = $this->input->post('password');
        $result_id = $this->Register_model->addregister($first_name, $last_name, $cus_email, $cus_tel, $cus_addr, $cus_password);
        echo $result_id;
    }

    //------------------------------------------
    public function checkemail() {
        $changeValue = $this->input->post('email');
        $result = $this->Register_model->count_email($changeValue);
        echo $result;
    }

}
