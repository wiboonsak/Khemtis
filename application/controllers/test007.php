<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *    http://example.com/index.php/welcome
     *  - or -
     *    http://example.com/index.php/welcome/index
     *  - or -
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

    }

    function index() {

        $chk = $this->input->post("chk_lang");
        if ($chk == "") {
            $chk = "English";
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
        $this->load->view('header', $data);
        $this->load->view('index');
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
