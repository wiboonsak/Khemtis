<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Promotion extends CI_Controller {
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
        $this->load->model("./Lang_fc");
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
        $data["ses_hotel_id"]=$this->session->userdata('sec_book_id');
        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;

     $data["fname_member"]=$this->session->userdata('fname_member'); 
     $data["lname_member"]=$this->session->userdata('lname_member'); 


if($this->input->get("Adults")!=''){


          $data["pst_txtfind"] ='';
          $data["pst_adu"] =$this->input->get("Adults");
          $data["pst_chi"] = $this->input->get("Child");
          $data["pst_book_st"] = $this->input->get("str_date");
       
}else if($this->input->post("res_adu")!=''){

          $data["pst_txtfind"] = $this->input->post("txt_find");
          $data["pst_adu"] = $this->input->post("res_adu");
          $data["pst_chi"] = $this->input->post("res_chi");
          $data["pst_book_st"] = $this->input->post("book_res");
      
}else{
          $data["pst_txtfind"] ='';
          $data["pst_adu"] ='';
          $data["pst_chi"] = '';
          $data["pst_book_st"] = '';

}



        $this->load->view('header', $data);
        $this->load->view('promotion_view');
    }


    function show_res(){
     $lang_q = $this->session->userdata('ch_lang');
       if($lang_q=="en"){
            $txt_book = "BOOK NOW";

       }else{
            $txt_book = "จองเดี๋ยวนี้";
       }

     $txtfind = $this->input->post("txtfind");
     $id_start_date = date('y-m-d');


     if(trim($txtfind)!="" && trim($txtfind)!=""){
     }else{$txtfind='';}

     $date_find = "";
     $get_res = $this->Page_model->get_pro_data($txtfind,$lang_q);
$i=0;
foreach ($get_res as  $res_val) {

     $res_id = $res_val->gp_id;
     $booking_status = $res_val->st;
     $res_name = $res_val->pro_title;
     $num_view =  rand(80, 150);
     $detail_res = $res_val->pro_dec_short;
     $i++;
     $img= "http://control.khemtis.com/".$res_val->url_img;


    
?>                                            
                                                        <div class="col-sm-4" style="margin-bottom: 15px;">
                                                          <div class="tours-layout css_border_pack">
                                                          <div class="image-wrapper" style="height:200px;" style="margin-left:0px!important;">
                                                                	   <?php if($booking_status==0){
                                                                     $link_book = 'PromotionDetail?pro_id='.$res_id;
                                                                      }else{$link_book="#";}
                                                                      ?>
                                                                    <a href="<?php echo$link_book?>" class="link">
                                                                        <img src="<?php echo$img?>" id='img<?php echo$i?>'  class="img-responsive">
                                                                    </a>
                                                                    <div class="title-wrapper" style="width:100%!important;margin-left:-20px!important; background-image:linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,1));text-align: center!important;padding:3px;padding-left: 10px;">
                                                                        <a href="#" class="title" style="font-size:12px!important;">
                                                                          <?php echo$res_name?></a>
                                                                    </div>
         
                                                                </div>
                                                                <div class="content-wrapper">
                                                                   <table style="width:100%;padding:30px;" class="table table-bordered">
                                                                    <tr><td style="cursor: pointer;" class="css_over_pack">
                                                                            <a href="#" class="link">
                                                                                <i style="color:#3c3c3c" class="icons fa fa-eye"></i>
                                                                                <span class="text number" style="color:#3c3c3c;margin-left:5px;"><?php echo$num_view?></span>
                                                                            </a>
                                                                       </td><td style="cursor: pointer;" class="css_over_pack" onclick="fbs_click('img<?php echo$i?>')">
                                                                            <a href="#" class="link">
                                                                                <img src="https://www.khemtis.com/assets/icon/fcb_ic.png" style="width:20px;">
                                                                                <span class="text number" style="color:#3c3c3c;margin-left:5px;">share</span>
                                                                            </a>
                                                                       </td></tr></table>                                                     
                                                                 
                                                          <div class="content" style="width: 100%!important;height:200px!important;padding-left:20px!important;padding-right:20px!important;padding-top:0px!important">
                                                            <center>
                                                          <table style="width: 100%!important"><tr><td style="text-align:left!important;border-style:none;">
                                                                            <?php
                                                                              $txtlg="";
                                                                              $truncated = (strlen($detail_res));
                                                                              for($ti=0;$ti<=$truncated;$ti++){
                                                                                if($ti>150 && substr($detail_res, $ti, 1)==' '){$txtlg = $txtlg."...";break;}
                                                                                $txtlg = $txtlg.substr($detail_res, $ti, 1);
                                                                              }
                                                                              echo$txtlg
                                                                             ?>

                                                        </td></tr></table>
                                                                    </div>
                                                                </div>
                                                            <?php //} ?>
                                                            </div>
                                                        </div>                                                                                               
    <?  
      }
      echo '</div>';
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
