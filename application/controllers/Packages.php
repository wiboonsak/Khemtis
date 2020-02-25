<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends CI_Controller {
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


        $data["str_date"] = $this->input->get("str_date");
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

          $data["pst_txtfind"] = $this->input->post("txt_find");
          $data["pst_adu"] = $this->input->post("pack_adu");
          $data["pst_chi"] = $this->input->post("pack_chi");
         // echo $this->input->post("book_pack");
          $data["pst_book_st"] = $this->input->post("book_pack");

        $data["fname_member"]=$this->session->userdata('fname_member'); 
        $data["lname_member"]=$this->session->userdata('lname_member'); 
        $data["adults"] = $this->input->get("Adults");
        $data["child"] = $this->input->get("Child");
        $data["str_date"] = $this->input->get("str_date");
        $this->load->view('header', $data);
        $this->load->view('packages_view');
    }


    function show_package(){
     $txtfind = $this->input->post("txtfind");
     $chk_loop = $this->input->post("chk_loop");
     $id_start_date = $this->input->post("id_start_date");
     $adults =  $this->input->post("adults");

     $date=date_create($id_start_date);
     $date_cur = date_format($date,"Y-m-d");

     $child = $this->input->post("child");
     if($adults=="" || !isset($adults)){$adults=1;}
     if($child=="" || !isset($child)){$child=0;}
     if(trim($txtfind)!="" && trim($txtfind)!="none"){
     }else{$txtfind='none';}

            $lang_q = $this->session->userdata('ch_lang');
        if($lang_q=="en"){
            $txt_book = "BOOK NOW";
        }else{
            $txt_book = "จองเดี๋ยวนี้";
        }
  
        $package_data = $this->Page_model->get_data_Package($txtfind,$lang_q,$date_cur);
        echo '<div class="row">';
        $i=0;
        foreach ($package_data as  $val_backage) {
        $i++;
        if($i==7 && $chk_loop==1){break;}
        $p_pdf = "";
        $img = "http://packagecms.khemtis.com/".$val_backage->img_name;
        $title_pack = $val_backage->package_title;
        $detail_pac = $val_backage->package_desc;
        $package_id = $val_backage->package_id;
        $p_pdf =  $val_backage->package_desc_file;
        $booking_status = $val_backage->booking_status;
        if($package_id=="" || $package_id<1){$package_id=0;}
        $ar_price = $this->Page_model->get_price_s($package_id,$date_cur);

        
        $ar_min_price =  array();
        $p_c = 0;
        foreach ($ar_price as $v_min) {
        	array_push($ar_min_price,$v_min->per_price);
        }
        
        if(count($ar_price)>0){
        	 $p_c =   min($ar_min_price);
        }
        if($p_c==0){
             $p_c = $this->Page_model->get_def_price($package_id);
        }

        //  echo "xx:".$p_c;
        $pr_p = 0; 
        $pr_d = 0;
        $typeid=0;
        $num_view = $val_backage->num_view;
        $sts = 1;$stx=0;

        if($img=="http://packagecms.khemtis.com/"){$img="";}
        //  $price_all = $this->Page_model->get_price_s($package_id);
          if($p_c > 0){
            //no-image-icon-15
        ?>                    
        <div class="col-sm-4" style="border:solid 0px #ffffff;height:400px;padding:25px;margin-bottom:30px;">
        <div>
        <div class="tours-layout css_border_pack" style="border:solid 0px #000000;height:400px;padding:0px!important;background-color:#ffffff">
                                                                <div class="image-wrapper" style="height:200px;" style="margin-left:0px!important;" >
                                                                     <?php if($booking_status=='Y'){
                                                                            $link_book = "PackagesDetail?packageid=".$package_id;
                                                                      }else{$link_book="#";}
                                                                      ?>
                                                                    <a href="<?php echo$link_book?>" class="link">
                                                                        <img src="<?php echo$img?>" id='img<?php echo$i?>'  class="img-responsive">
                                                                    </a>

                                                                    <div class="title-wrapper" style="width:100%!important;margin-left:-20px!important; background-image:linear-gradient(to left, rgba(0,0,0,0), rgba(0,0,0,1));text-align: left!important;padding:3px;padding-left: 10px;font-size: 13px;">
                                                                        <a href="#" class="title" style="font-size:13px!important;"><?php echo$title_pack?></a>
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
                                                                 </div>

<div>
<?php
        $txtlg="";
         $truncated = (strlen($detail_pac));
        for($ti=0;$ti<=$truncated;$ti++){
          if($ti>100 && substr($detail_pac, $ti, 1)==' '){
             $txtlg = $txtlg."...";break;}
          $txtlg = $txtlg.substr($detail_pac, $ti, 1);
         }
          echo$txtlg
       ?>
<center> 
<?php if($p_c>0){ ?>                                                                             
<div>
   <span  style="font-size:15px;color:#000000"><?php echo number_format($p_c)?> THB</span>
</div>
<?php }else{?>
<?php }?>
</center>
</div>


<div>
 <center>
        
        <div class="group-btn-tours">
               <?php if($p_pdf!="none"){?>
                <a href="javascript:window.open('http://packagecms.khemtis.com/<?php echo$p_pdf?>')" class="left-btn btbook_bdr alink bt_color" style="padding:5px 10px 5px 10px">PDF</a>
               <?php } ?>
               <?php if($booking_status=='Y'){?>
               <a href="javascript:sendpack('PackagesDetail?packageid=<?php echo$package_id?>&typeid=<?php echo$typeid?>')" class="right-btn btbook_bdr btbook_pg alink bt_color" style="padding:5px 10px 5px 10px"><?php echo$txt_book?></a>
               <?php }else{echo "<font color='#cccccc'>Cannot be booked</font>";}?>

         </div>
</center>
</div>





                    </div>
                    </div>
                </div>
             

        <?php }?>                                                                                 
    <?}
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
