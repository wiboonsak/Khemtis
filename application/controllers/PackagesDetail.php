<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class PackagesDetail extends CI_Controller {
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
        $this->load->model("Book_model");
        $this->load->model("Register_model");
        $this->load->model("./Lang_fc");
    }



    function index() {
        $chk = $this->input->post("chk_lang");
         $package_id = $this->input->get("packageid");
         $date_book = $this->input->get("date_book");
       // $dbook = $this->input->get("dbook");
        if(!isset($dbook)){
             $dbook = date("Y-m-d");
        }

        if ($chk == "") {
            $chk = "English";
        }

        $packageid = $this->input->get("packageid");
        $this->Page_model->add_view($packageid);

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


       $get_detail_package = $this->Page_model->get_detail_package($package_id);
       $data["ses_hotel_id"]=$this->session->userdata('sec_book_id');
        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
        $data["package_id"]=$package_id;
        $data["p_typeid"] = $this->input->get("typeid");
$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 
$data["date_book"] = $date_book;
$data["pst_book_st"] = $date_book;
$data["adults"] = $this->input->get("adults");
$data["child"] = $this->input->get("child");

$typ_book = $this->Page_model->get_typ_package($package_id);
$data["typ_book"] = $typ_book;
        $data["get_detail_package"]=$get_detail_package;
        $data["packageid"]=$package_id;
        $this->load->view('header', $data);
        $this->load->view('packages_detail_view');
    }


  function add_pre_book(){
          $data = array(
                    'chk_pay' =>'no'
                    );
          $this->session->set_userdata($data);
          $ty_pack = $this->input->post('ty_pack');

          $Room_id = $this->input->post('Room_id');
          $Adults = $this->input->post('Adults');
          $Child = $this->input->post('Child');
          $Single = $this->input->post('Single');
          $ad_pr = $this->input->post('ad_pr');
          $ld_pr = $this->input->post('ld_pr');
          $sg_pr = $this->input->post('sg_pr');
          
          $date_check = $this->input->post('date_check');
          $namepack = $this->input->post('namepack');
          $package_id = $this->input->post('package_id');
         
          $net_price =  $this->input->post('net_price');
          $date_depart = $this->input->post('date_depart');

          $ar_pack_service = $this->input->post('ar_pack_service');
          $ar_pack_extra = $this->input->post('ar_pack_extra');

          $date=date_create($date_depart);
          $date_depart =  date_format($date,"Y-m-d");

          $txt_room = "";
             $utoid_book = $this->get_package_id_hotel($Adults,$Child,0,0,0,0,$package_id,$date_depart,$date_check,$net_price,$ar_pack_service,$ar_pack_extra,$ty_pack);
             echo $utoid_book;
           
         
  }
 

function  add_pre_not_hotel(){

          $Adults = $this->input->post('Adults');
          $Child = $this->input->post('Child');
          $Single = $this->input->post('Single');
          $ad_pr = $this->input->post('ad_pr');
          $ld_pr = $this->input->post('ld_pr');
          $sg_pr = $this->input->post('sg_pr');
 $package_id = $this->input->post('package_id');
 $date_depart = $this->input->post('date_depart');
 $date=date_create($date_depart);
 $date_depart =  date_format($date,"Y-m-d");

            $data = array(
                    'chk_pay' =>'no'
                    );
          $this->session->set_userdata($data);

               $ty_pack = $this->input->post('ty_pack');
               $utoid_book = $this->get_package_id($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,'');
               echo $utoid_book;
             
}






  function get_package_id_hotel($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check,$net_price,$ar_pack_service,$ar_pack_extra,$ty_pack){
      $utoid_book = 0;
           if($this->session->userdata('sec_gp_book')==''){
                $gp_id  = $this->Book_model->add_pre_gp(0);
                $id_set = array(
                    'sec_gp_book' =>$gp_id,
                    );
                 $this->session->set_userdata($id_set);
              }
            
            if($this->session->userdata('sec_book_package_id')==''){
                 $utoid_book = $this->Book_model->add_pre_book_package_new($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$utoid_book,$date_check,2,$net_price,$ar_pack_service,$ar_pack_extra,$ty_pack);
                       $id_set = array(
                       'sec_book_package_id' =>$utoid_book,
                    );
                 $this->session->set_userdata($id_set);
                 return 1;

                 // เก็บไว้เผื่อว่า จะเพิ่ม package ในอนาคต ได้หลายรายการ
                 //return  $this->Book_model->up_pre_book_package($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr);
            }else{
              
                 $utoid_book =$this->session->userdata('sec_book_package_id');
                 $this->Book_model->up_pre_book_package_new($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$utoid_book,$date_check,2,$net_price,$ar_pack_service,$ar_pack_extra,$ty_pack); 
                 return 1;
            }
                 return 0;
          }







  function get_package_id($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check){
           $utoid_book = 0;
           if($this->session->userdata('sec_gp_book')==''){
                $gp_id  = $this->Book_model->add_pre_gp(0);
                $id_set = array(
                    'sec_gp_book' =>$gp_id,
                    );
                 $this->session->set_userdata($id_set);
              }
              // add insert data
                 if($this->session->userdata('sec_book_package_id')==''){
                       $utoid_book = $this->Book_model->add_pre_book_package_not($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check);
                       $id_set = array(
                       'sec_book_package_id' =>$utoid_book,
                    );
                 $this->session->set_userdata($id_set);
                 return 1;
                 // เก็บไว้เผื่อว่า จะเพิ่ม package ในอนาคต ได้หลายรายการ
                 //return  $this->Book_model->up_pre_book_package($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr);
            }else{
              // update data
                 $utoid_book =$this->session->userdata('sec_book_package_id');
                 return  $this->Book_model->up_pre_book_package_not($Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$package_id,$date_depart,$date_check,$utoid_book); 
                
            }
                 return 0;
          }





function conf_pack_price($price_num1,$price_num2,$get_night,$nst){
$ty = "";
if($nst==0){
    $ty = ($price_num2);
}else if($nst==1){
    $ty = ($price_num1);
}else{
	$ty = "0";
}
return $ty;
}


function conf_pack($price_num1,$price_num2,$nst){
$ty = "";
if($nst==0){
    $ty = "Room";
}else if($nst==1){
    $ty = "Bed&nbsp;&nbsp;";
}else{
	  $ty = "";
}
return $ty;
}


function price_chang(){
 $pk_night = $this->input->post("pk_night");
 $pty = $this->input->post("pty");
 $per_son = $this->input->post("per_son"); 
 $room = $this->input->post("room");
 $package_id = $this->input->post("package_id");
 $p_room_id = $this->input->post("p_room_id");
 $dbook = $this->input->post("dbook");
 $data_sel_ser = $this->Page_model->get_data_sel_ser($pty,$per_son,$room,$package_id,$p_room_id,$pk_night,$dbook);
 echo $data_sel_ser;
}


function show_extra_pack(){
$idrun =0;
$typ_data = $this->input->post("typ_data");
$hotel_id = $this->input->post("hotel_id");
$package_id = $this->input->post("package_id");
$dbook = $this->input->post("v_dbook");

$idadd=0;
if($typ_data>0){
$get_extra_detail = $this->Page_model->get_extra_detail($package_id,$hotel_id,$dbook);
$numextra =  count($get_extra_detail);
if($numextra>0){
?>
 <div class="panel polaroid_con" style="width:100%">
 <header class="panel-heading" style="padding:5px!important;background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;color:#969278;font-size:13px;font-weight:normal;text-align:left!important"> <div id="ty_title">Select Extra Service  ( Price per Person )</div></header>                 
<div class="panel-body css_your_ticket"  style="width:100%;text-align: left;padding-left:0px!important;background-color:#ffffff!important">

<table style="padding: 4px!important;margin-bottom:1px;width: 100%!important">
<tr style="background-color:#f1f1f1!important;font-size:12px;text-align:center;"><td>Select extra type</td><td>Person</td><td style="text-align:right;padding-right: 10px!important;	">Price</td></tr>
<?php foreach ($get_extra_detail as $value){$idadd++;?>
          <tr  target=“_blank” onclick="typ_extra('<?php echo$dbook?>',<?php echo$hotel_id?>);"><td valign="middle" style="padding-left:0px!important;width:60%">
            <input type="hidden" value="<?php echo$value->per_price?>" id="ex_pack<?php echo$idadd?>">
            <input type="hidden" value="<?php echo$value->idrun?>" id="id_extra<?php echo$idadd?>">

            <input type="hidden" value="<?php echo$value->night_net?>" id="txt_net_price_ex<?php echo$idadd?>">
            <input type="hidden" value="<?php echo$value->night_selling?>" id="txt_sell_price_ex<?php echo$idadd?>">
            <input type="hidden" value="<?php echo$value->txt_detail_extra?>" id="txt_ser_ar_ex<?php echo$idadd?>">

          <div style="width:100%;border-radius: 5px;padding-left:0px!important;font-size:13px!important" >
              <label class="container1" style="font-weight:normal!important;"><?php echo$value->extra_name?>
                <input type="checkbox" id="ex_select<?php echo$idadd?>">
                <span class="checkmark1"></span>
              </label>
          </div>      
          </td>
          <td style="text-align: center;">
     <select id="ex_person<?php echo$idadd?>" style="border-radius:3px;border-color:#cccccc;cursor: pointer;" onchange="ch_extra(<?php echo$idadd?>,<?php echo$value->per_price?>)">
	 	<?php for($i=1;$i<=10;$i++){?>
	 		<option value="<?php echo$i?>"><?php echo$i?></option>
	 	<?php }?>
	 </select>
          </td>
          <td align="right" style="padding-right:15;font-size: 12px!important;padding-right:10px;">
          	 <table class="boxtb_none">
              <tr><td><div id="idex_price<?php echo$idadd?>"><?php echo number_format($value->per_price)?>
               </div> <input type="hidden" value="<?php echo $value->per_price?>" id="ex_price<?php echo$idadd?>">
                 <input type="hidden" value="<?php echo$value->txt_detail_extra?>" id="txt_detail_extra<?php echo$idadd?>">
                </td>
                <td><font color='#cccccc'>฿</font>
              </td></tr>
            </table>
         
      </td></tr>
<?php }?>
    </table>
<input type="hidden" value="<?php echo$idadd?>" id="max_extra">
 </div>
</div>
<?php
}
}}


//--------------- ส่วนของ แสงดผลห้องที่ร่ว่มกับ package ทั้งหมด -------------------------------------------------------------


function showDatapack(){
               $pr_rm_ch = 0;
               $pr_rm_sg = 0;
               $pr_rm = 0;
               $idr =0 ;
$irun_option=0;
$typ_data = 0;
$package_id = $this->input->post("packageid");   
$dbook = $this->input->post("dbook");
$date=date_create($dbook);
$dbook =  date_format($date,"Y-m-d");

$namepack = $this->input->post("namepack");
$typeid = $this->input->post("typeid");
     $adults =  $this->input->post("adults");
     $child = $this->input->post("child");
// $package_id=119;
// $dbook='2019-12-21';
$numall = 0;
        $get_hotel_package = $this->Page_model->get_hotel_package($package_id,$dbook);
        $get_night = $this->Page_model->get_hotel_night($package_id);

        $data_ar =array();
        $ar1 = array();
        foreach($get_hotel_package as $value_p){
           $ar2 = array();
           $ar3 = array();
               $h_id = $value_p->hotel_id;
               $h_nm = $value_p->hotel_nm;
           $lp_room = $this->Page_model->get_room_package($package_id,$h_id,$dbook);
           $ar_rm1 = array();
             for($i=0;$i<count($lp_room);$i++){
               $ar_rm2 = array();

               $txt_nm = $lp_room[$i][2];
               $txt_rm = $lp_room[$i][1];
               $pr_rm = $lp_room[$i][4];
               $pr_rm_ch = 0;
               $pr_rm_sg = 0;
               $id  = $lp_room[$i][3];
               $idr = $lp_room[$i][0];
               $idrun = $lp_room[$i][5];
               $pr_rm2 = $lp_room[$i][6];
               $nst_ch = $lp_room[$i][7];
               $st = $lp_room[$i][8];
               $net_p = $lp_room[$i][9];
               $sel_p = $lp_room[$i][10];
               $txt_ser = $lp_room[$i][11];

               array_push($ar_rm2,$txt_nm,$txt_rm,$pr_rm,$pr_rm_ch,$pr_rm_sg,$id,$idr,$idrun,$pr_rm2,$nst_ch,$st,$net_p,$sel_p,$txt_ser);
               array_push($ar_rm1,$ar_rm2);
             }
            array_push($ar2,$h_id,$h_nm,$ar_rm1);
            array_push($data_ar,$ar2);
         }
        $numroom = $this->Page_model->ch_ty_package($package_id);
        $def_package = $this->Page_model->def_package($package_id);
        
        $get_hotel_package = $data_ar;
        $def_package = $def_package;
        $numroom =$numroom;
?>
 
 
<form action="http://www.khemtis.com/PackageBooking?package_id=75&lang=en" method="post" id="frm_confirm">

	<input type="hidden" value="<?php echo$get_night?>" id="pk_night">
	<input type="hidden" value="<?php echo$dbook?>" id="v_dbook">
<center>
<?php
$hoteldata=$get_hotel_package;
  $get_chk = -1;
  $id_number = 0;
  $get_ad = 0;
  $get_ch = 0;
  $get_sg = 0;

 if($numroom>-1){ $typ_data = 1;  ?>
    <div class="panel polaroid" style="width:100%">
        <header class="panel-heading" style="padding:5px!important;background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;color:#969278;font-size:13px;font-weight:normal;text-align: left!important;">
          <table><tr><td style="width:25px;"><div id="spin001" class="loader"></div></td><td>
          <?php if($numroom==0){?>
             Select type person and number person
          <?php }else{?>
             Select hotels & room type ( price per 2 persons / room )
          <?php } ?></td></tr></table>
          
</header>               
    <div class="panel-body css_your_ticket"  style="width:100%;text-align: left;padding:5px!important;padding-bottom:0px!important">
    <nav class="navbar navbar-default" style="background-color:#ffffff!important;border-style:none;">
    <div style="padding:0px!important">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<?php 
  $hl=0;
  $n= array(); 
  $txtc1= '';
  $txtc2= '';
  $txtc3= '';
  $id_number_l = 0;
  $id_number = 0;
for($hl=0;$hl<count($hoteldata);$hl++){
$vr_show = -1;
       $room_chk= $hoteldata[$hl][2];
        for($rck=0;$rck<count($room_chk);$rck++){
           $id_number_l++;
           $pr_ad_k = $room_chk[$rck][2];
           $pr_ch_k = $room_chk[$rck][3];
           $pr_sg_k = $room_chk[$rck][4];

            $idr_chk = $room_chk[$rck][6]*1;
             if($idr_chk==$typeid){
              $vr_show=$hl;$get_chk=$idr_chk;
              $get_ad = $pr_ad_k;
              $get_ch = $pr_ch_k;
              $get_sg = $pr_sg_k;
              $id_number = $id_number_l;
            }
            //echo $vr_show."<br>";
        }

if($hl==$vr_show){
  $txtc1 = " panel-heading slcolor_fix";
  $txtc2 = " panel-collapse collapse in";
  $txtc3 = " ";
}else{
  $txtc1 = " panel-heading slcolor";
  $txtc2 = " panel-collapse collapse";
  $txtc3 = " ";
}

$vr_show=-1;
$chk_non_hotel = $this->Page_model->chk_non_hotel($hoteldata[$hl][0],$package_id,$dbook);
//echo $hoteldata[$hl][0].":".$package_id."=".$chk_non_hotel;
$hot_hid = "block";
if($chk_non_hotel<1){
$hot_hid = "none";
}
?>
          <div class="panel panel-default" style="border-style: none!important;border-radius:0px!important;position:relative;display:<?php echo$hot_hid?>" onclick="css_lock(<?php echo$hl?>,<?php echo count($hoteldata)?>)" >
          <div class="<?php echo$txtc1?>" onclick="chcolor(<?php echo$hl?>,<?php echo count($hoteldata)?>,1,<?php echo$package_id?>,<?php echo$hoteldata[$hl][0]?>)"  id="heading<?php echo$hl?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo$hl?>" aria-expanded="false" aria-controls="collapse<?php echo$hl?>">
                <b style="font-size: 12px!important;">
                	<?php if($numroom==0){?>
                    &#10010; Select number of person&nbsp;&nbsp;&nbsp;
                    <?php }else{?>
                    &#10010; <?php echo$hoteldata[$hl][1]?>&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                </b>
          </div>
          <div style="font-size: 12px;padding:0px!important;">
          <div class="box_hotel" style="display:none;"><a href="javascript:hotel_page(<?php echo$hoteldata[$hl][0]?>)">
           <p class="chview"><i class="fa fa-info-circle" aria-hidden="true"></i></i>&nbsp;Hotel</p>
          </a></div>
          </div>
        <div id="collapse<?php echo$hl?>" class="<?php echo$txtc2?>" role="tabpanel" aria-labelledby="heading<?php echo$hl?>" style="padding-top: 0px!important;">
        <div style="padding:0px!important" id="form_select">
      <table style="padding:0px!important;margin-bottom:1px;width:100%!important"  id="tbid<?php echo$numall?>" onclick="slc_room(<?php echo$numall?>,'<?php echo$pr_rm?>','<?php echo$pr_rm_ch?>','<?php echo$pr_rm_sg?>',<?php echo$idr?>,0)">
     	<tr style="background-color:#f1f1f1!important;font-size:12px;text-align:center;">
     		<td>
     			<?php if($numroom==0){?>
     				Type person
     			<?php }else{?>
     				Select room type
     			<?php } ?>
     		</td>
     		<td>Person</td><td>
     		    <?php if($numroom==0){?>
     				-
     			<?php }else{?>
     				Room
     			<?php } ?>
     	  </td><td style="text-align:right;padding-right:25px">Price</td></tr>
    <?php
     $roomdata= $hoteldata[$hl][2];
        for($rl=0;$rl<count($roomdata);$rl++){
           $irun_option++;
           $numall++;
           $txt_nm = $roomdata[$rl][0];
           $txt_rm = $roomdata[$rl][1];
           $pr_rm = $roomdata[$rl][2];
           $pr_rm_ch = $roomdata[$rl][3];
           $pr_rm_sg = $roomdata[$rl][4];
           $id = $roomdata[$rl][5];
           $idr = $roomdata[$rl][6]*1;
           $idrun = $roomdata[$rl][7];
           $pr_rm2 = $roomdata[$rl][8];
           $nst = $roomdata[$rl][9];
           $stst = $roomdata[$rl][10];

           $txt_net = $roomdata[$rl][11];
           $txt_sel = $roomdata[$rl][12];
           $txt_ser = $roomdata[$rl][13];
  
          if($stst==0){
           array_push($n,$idr);
           $typack = $this->conf_pack($pr_rm2,$pr_rm,$nst);
           $disp = "display:block";$txt_dis="";
           $def_num = 1;
           if($typack=="Room"){
                   $disp = "";
                   $txt_dis="";
                   $def_num = 2;
           }else{
                   $disp = "display:none";
                   $txt_dis="background-color:#dcdcdc;color:#dcdcdc";
                   $def_num = 1;
           }
    ?> 
    <?php 
      $price_tr = $this->conf_pack_price($pr_rm2,$pr_rm,$get_night,$nst);
      if($price_tr > 0){
    ?>

        <tr  target=“_blank” class="hov_ch" style="border-bottom-style:solid!important;" onclick="typ_extra('<?php echo$dbook?>',<?php echo$hoteldata[$hl][0]?>)">
            <td style="width:60%!important">
            <input type="hidden" value="<?php echo$idr?>" id="def_pack<?php echo$irun_option?>">
            <input type="hidden" value="<?php echo$idr?>" id="id_room_txt<?php echo$irun_option?>">
            <input type="hidden" value="<?php echo$def_num?>" id="typ_pack<?php echo$irun_option?>">

            <input type="hidden" value="<?php echo$txt_net?>" id="txt_net_price<?php echo$irun_option?>">
            <input type="hidden" value="<?php echo$txt_sel?>" id="txt_sell_price<?php echo$irun_option?>">
            <input type="hidden" value="<?php echo$txt_ser?>" id="txt_ser_ar<?php echo$irun_option?>">

<label class="container1" style="font-weight:normal!important;">
	<?php if($numroom>0){?><?php echo$txt_rm?><?php }else{echo"Adults ";}?>
  <input type="checkbox" id="check_box<?php echo$irun_option?>">
  <span class="checkmark1"></span>
</label>
</td>
<td style="text-align: center;">
	 <select id="id_person<?php echo$irun_option?>" style="border-radius:3px;border-color:#cccccc;cursor: pointer;" onchange="ch_person(<?php echo$irun_option?>,<?php echo$hoteldata[$hl][0]?>,<?php echo$def_num?>,<?php echo$package_id?>,<?php echo$idr?>,'<?php echo$dbook?>')">
	   <?php for($i=1;$i<=10;$i++){?>
	 		  <option value="<?php echo$i?>" <?php if($i==$def_num){echo" selected";}else{echo"";}?>><?php echo$i?></option>
	 	 <?php }?>
	 </select>
</td>
<td style="text-align: center;">
	 <select id="id_room<?php echo$irun_option?>" style="border-radius:3px;border-color:#cccccc;cursor: pointer;<?php echo$txt_dis?>;<?php echo$disp?>"  onchange="ch_room(<?php echo$irun_option?>,<?php echo$hoteldata[$hl][0]?>,<?php echo$def_num ?>,<?php echo$package_id?>,<?php echo$idr?>,'<?php echo$dbook?>')">
	 	<?php for($i=1;$i<=5;$i++){?>
	 		 <option value="<?php echo$i?>"><?php echo$i?></option>
	 	<?php }?>
	 </select>
</td>
<td align="right" style="font-size: 12px!important;">

          	<table class="boxtb_none">
              <tr><td><div id="idprice<?php echo$irun_option?>"><?php echo number_format($price_tr)?>
               </div><input type="hidden" value="<?php echo $price_tr?>" id="room_price<?php echo$irun_option?>"></td>
                <td><font color='#cccccc'>฿</font>&nbsp;
                	 <?php if($numroom>0){?>
                	 / <font color='#969278'><?php echo$typack?></font>
                     <?php }?>&nbsp;
                     <input type="hidden" value="<?php echo $typack?>" id="typack<?php echo$irun_option?>">
                </td></tr>
            </table>
            </td></tr>
            <?php }}} ?>

            </table>
            </div>
          </div>
        </div>
<?php }?>
   <center><p id="err_hotel" style="padding:0px!important;margin-top:5px!important"></p></center>
      <input type="hidden" id="numc" value="<?php echo$numall?>">
      </div>
   </div>
 </nav>
   </div>
 </div>
   <input type="hidden" value="<?php echo$irun_option?>" id="max_run_room">
   <input type="hidden" value="<?php echo$get_ad?>" id="hid_p1">
   <input type="hidden" value="<?php echo$get_ch?>" id="hid_p2">
   <input type="hidden" value="<?php echo$get_sg?>" id="hid_p3">
   <input type="hidden" value="<?php echo$adults?>" id="adults_p">
   <input type="hidden" value="<?php echo$child?>" id="child_p">
<?php }else{
  $pr_rm = 0;
  $pr_rm_ch = 0;
  $pr_rm_sg = 0;
if(count($hoteldata)>0){
     $roomdata = $hoteldata[0][2];
     for($rl=0;$rl<count($roomdata);$rl++){
         $txt_nm = $roomdata[$rl][0];
         $txt_rm = $roomdata[$rl][1];
         $pr_rm = $roomdata[$rl][2];
         $pr_rm_ch = $roomdata[$rl][3];
         $pr_rm_sg = $roomdata[$rl][4];
         $id = $roomdata[$rl][5];
         $idr = $roomdata[$rl][6];
     } 
$typ_data = 1;     
    }else{
        foreach ($def_package as $value) {
            $id_pack = $value->package_id;
            $pr_rm = $value->pr_adl;
            $pr_rm_ch = $value->pr_cld;
            $pr_rm_sg = $value->pr_csg;
        }
$typ_data = 0;
    }
?>
<input type="hidden" value="<?php echo$package_id?>" id="package_id">
<input type="hidden" value="<?php echo$pr_rm?>" id="hid_p1">
<input type="hidden" value="<?php echo$pr_rm_ch?>" id="hid_p2">
<input type="hidden" value="<?php echo$pr_rm_sg?>" id="hid_p3">

   <input type="hidden" value="<?php echo$adults?>" id="adults_p">
   <input type="hidden" value="<?php echo$child?>" id="child_p">

   <input type="hidden" value="1" id="ad_num_not">
   <input type="hidden" value="0" id="ch_num_not">
   <input type="hidden" value="0" id="sg_num_not">
<?php
}?>
<?php if($get_chk=="" || !isset($get_chk)){$get_chk=-1;}?>
 <input type="hidden" value="<?php echo $get_chk;?>" id="num_chk">
 <input type="hidden" value="<?php echo$id_number?>" id="id_number">
 <input type="hidden" value="<?php echo$typ_data?>"  id="typ_data">

<!--
 <div class="panel polaroid_con" style="width:100%">
 <header class="panel-heading" style="padding:5px!important;background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;color:#969278;font-size:13px;font-weight:normal;text-align:left!important"> <div id="ty_title">Number of room staying</div></header>                 
 <div class="panel-body css_your_ticket"  style="width:100%;text-align: left;padding-left:10px!important">

                            <div class="panel-body css_your_ticket"  style="width:100%"  id="box_room">
                              <table style="width:100%" class="boxtb_last">
                                <tr style="font-size:14px;">
                                <td style="text-align:left;padding-left: 10px!important">Room</td><td style="width:30px;cursor: pointer;"  onclick="add_peple(3,2)">
                                   <img src="http://www.khemtis.com/assets/font/num2.png">
                                </td>
                                <td style="width:25px;cursor: pointer;">
                                    <input type="text" id="room_num" value="0" style="width:30px;border-style:solid;border-color:#cccccc;border-width:1px;text-align: center; background: transparent;border-radius:5px;">
                                </td>
                                <td style="width:30px;cursor: pointer;" onclick="add_peple(3,1)">
                                  <img src="http://www.khemtis.com/assets/font/num1.png">
                                </td>
                                <td style="width:120px;text-align:right"><p id="pr_rm_sg"></p></td>
                                </tr>
                            </table>
      </div>
   </div>
</div>
-->

<?php if($typ_data==0){?>
 <div class="panel polaroid_con" style="width:100%">
 <header class="panel-heading" style="padding:5px!important;background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;color:#969278;font-size:13px;font-weight:normal;;text-align:left!important"> <div id="ty_title">Number of people staying</div></header>                 
 <div class="panel-body css_your_ticket"  style="width:100%;text-align: left;padding-left:0px!important">
                           <div class="panel-body css_your_ticket"  style="width:100%;padding-top:0px!important;" id="box_1">
                              <table style="width:100%" class="boxtb">
                                <tr style="font-size:14px;">
                                <td style="text-align:left;padding-left: 10px!important">Adult</td><td style="width:30px;cursor: pointer;" onclick="add_peple(1,2)">
                                   <img src="http://www.khemtis.com/assets/font/num2.png">
                                </td>
                                <td style="width:25px">
                                    <input type="text" id="pnum1" value="1" style="width:30px;border-style:solid;border-color:#cccccc;border-width:1px;text-align: center; background: transparent;border-radius:5px; ">
                                </td>
                                <td style="width:30px;cursor: pointer;" onclick="add_peple(1,1)">
                                  <img src="http://www.khemtis.com/assets/font/num1.png">
                                </td>
                                <td style="width:120px;text-align:right"><p id="pr_rm"></p></td>
                                </tr></table>
                           </div>

                           <div class="panel-body css_your_ticket"  style="width:100%"  id="box_2">
                              <table style="width:100%" class="boxtb">
                                <tr style="font-size:14px;">
                                <td style="text-align:left;padding-left: 10px!important">Child</td><td style="width:30px;cursor: pointer;"  onclick="add_peple(2,2)">
                                   <img src="http://www.khemtis.com/assets/font/num2.png">
                                </td>
                                <td style="width:25px;cursor: pointer;">
                                    <input type="text" id="pnum2" value="0" style="width:30px;border-style:solid;border-color:#cccccc;border-width:1px;text-align: center; background: transparent;border-radius:5px;">
                                </td>
                                <td style="width:30px;cursor: pointer;" onclick="add_peple(2,1)">
                                  <img src="http://www.khemtis.com/assets/font/num1.png">
                                </td>
                                <td style="width:120px;text-align:right"><p id="pr_rm_ch"></p></td>
                            </tr></table>
                           </div>

                           <div class="panel-body css_your_ticket"  style="width:100%"  id="box_3">
                              <table style="width:100%" class="boxtb_last">
                                <tr style="font-size:14px;">
                            <td style="text-align:left;padding-left: 10px!important">Single</td><td style="width:30px;cursor: pointer;"  onclick="add_peple(3,2)">
                                   <img src="http://www.khemtis.com/assets/font/num2.png">
                                </td>
                                <td style="width:25px;cursor: pointer;">
                                    <input type="text" id="pnum3" value="0" style="width:30px;border-style:solid;border-color:#cccccc;border-width:1px;text-align: center; background: transparent;border-radius:5px;">
                                </td>
                                <td style="width:30px;cursor: pointer;" onclick="add_peple(3,1)">
                                  <img src="http://www.khemtis.com/assets/font/num1.png">
                                </td>
                                <td style="width:120px;text-align:right"><p id="pr_rm_sg"></p></td>
                            </tr></table>
                           </div>
   </div>
   </div>


<?php }?>


</center>
  <input type="hidden" id="Room_id" name="Room_id">
  <input type="hidden" id="Adults" name="Adults">
  <input type="hidden" id="Child" name="Child">
  <input type="hidden" id="Single" name="Single">

  <input type="hidden" id="ad_pr" name="ad_pr">
  <input type="hidden" id="ld_pr" name="ld_pr">
  <input type="hidden" id="sg_pr" name="sg_pr">
  <input type="hidden" id="namepack" name="namepack" value="<?php echo$namepack?>"> 
  <input type="hidden" id="typeid" name="typeid" value="<?php echo$typeid?>">
  </form>

<script type="text/javascript">


  $('#spin001').hide();

  
chcolor(0,0,1,<?php echo$package_id?>,0);

function chcolor(id,maxid,typ_data,package_id,hotel_id){
var i = 0;
for(i=0;i<maxid;i++){
  $('#heading'+i).addClass("slcolor");
  $('#heading'+i).removeClass("slcolor_fix");

}
  $('#heading'+id).removeClass("slcolor");
  $('#heading'+id).addClass("slcolor_fix"); 
  $('#hotel_select').val(hotel_id);
   $("input[type=checkbox]").prop('checked', false);

   show_extra_pack(typ_data,package_id,hotel_id);
   typ_extra('',hotel_id);


}

function hotel_page(hotel_id){
 var d = new Date();
 var dd = d.getDate();
 var mm = (d.getMonth()+1);
 var yy = d.getFullYear();
   var d1 = (nextDay_off(dd,mm,yy,1));
   var d2 = (nextDay_off(dd,mm,yy,2));
   window.open("https://www.khemtis.com/HotelView?lang=en&hotel_id="+hotel_id+"&book_st="+d1+"&book_en="+d2+"&Adults=1&Child=0");
}

function load_data_information(){
  
}



function nextDay_off(d,m,y,i){
var month = new Array();
month[0] = "Jan";
month[1] = "Feb";
month[2] = "Mar";
month[3] = "Apr";
month[4] = "May";
month[5] = "Jun";
month[6] = "Jul";
month[7] = "Aug";
month[8] = "Sep";
month[9] = "Oct";
month[10] = "Nov";
month[11] = "Dec";

 var d_day = new Date(y+"/"+m+"/"+d);
 var nextDay = new Date(d_day);
 var dtxt = new Date(nextDay.setDate(d_day.getDate()+i));
 var dd = dtxt.getDate();
 var mm = (dtxt.getMonth()-1);
 var yy = dtxt.getFullYear();
 var ddd = ("0" + dd).slice(-2);  
 var mmm = ("0" + (mm+2)).slice(-2);  
 var nm = ((mmm-1)*1);
 return ddd+"-"+month[nm]+"-"+yy;
}
 





//--------------------------------------------------------------------------------------------------------------------
var room_id  =0;
$( "#btgo_conf" ).click(function() {


  if($('#ch_price_all').val()>0){
    var ad = n_al;
    var ld = n_ch;
    var sg = n_gl;

$('#Adults').val(ad);
$('#Child').val(ld);
$('#Single').val(sg);
   
      var Room_id = $('#Room_id').val();

      var Adults = $('#Adults').val();
      var Child = $('#Child').val();
      var Single = $('#Single').val();

      var ad_pr = $('#ad_pr').val();
      var ld_pr = $('#ld_pr').val();
      var sg_pr = $('#sg_pr').val();
      var namepack = $('#namepack').val();
      var package_id = $('#package_id').val();
      var date_check = $('#date_check').val();
      var id_start_date = $('#id_start_date').val();


 }else{
   //$('#err_hotel').html("<font color='red'>Select Hotel please !</font>");
 }
});



$('#ch_price_all').val(0);
var adults_p = $('#adults_p').val();
var child_p = $('#child_p').val();
//if(adults_p==""){adults_p=1;}
//if(child_p==""){child_p=0;}

if(adults_p=="" || adults_p==0){adults_p=0;}
if(child_p=="" || child_p==0){child_p=0;}
var n_al=adults_p;
var n_ch=child_p;
var n_gl=0;

var pr_al=$('#hid_p1').val();
var pr_ch=$('#hid_p2').val();
var pr_gl=$('#hid_p3').val();
var typeid=$('#typeid').val();
var id_number=$('#id_number').val();
slc_room(id_number,$('#hid_p1').val(),$('#hid_p2').val(),$('#hid_p3').val(),typeid,0);

function add_peple(ty,st){
if(pr_al>0){
if(st==1){
  if(ty==1){n_al++;}
  if(ty==2){n_ch++;}
  if(ty==3){n_gl++;}
}else if(st==2){
  if(ty==1){n_al--;}
  if(ty==2){n_ch--;}
  if(ty==3){n_gl--;}
     if(n_al<1){n_al=1;}
     if(n_ch<0){n_ch=0;}
     if(n_gl<0){n_gl=0;}
  }
 $('#ad_num_not').val(n_al);
 $('#ch_num_not').val(n_ch);
 $('#sg_num_not').val(n_gl);
 //$('#ch_price_all').val((n_al*1)+(n_ch*1)+(n_gl*1));

     sum_total();
  }else{
     $('#err_hotel').html("<font color='red'>Select Hotel please !</font>");
  }
}


function set_price_room(){
   sum_total();
}

sum_total();
function sum_total(){


$('#ad_pr').val(pr_al);
$('#ld_pr').val(pr_ch);
$('#sg_pr').val(pr_gl);

  $('#pnum1').val(n_al);
  $('#pnum2').val(n_ch);
  $('#pnum3').val(n_gl);
  $('#err_hotel').empty();

    var num_total_al = (n_al*pr_al);
    var num_total_ch = (n_ch*pr_ch);
    var num_total_gl = (n_gl*pr_gl);
    var all_total = (num_total_al+num_total_ch+num_total_gl);
if(n_ch==0){num_total_ch=pr_ch;}
if(n_gl==0){num_total_gl=pr_gl;}

     //alert(num_total_ch);
     $('#pr_rm').html(numberWithCommas(num_total_al)+" ฿");
     $('#pr_rm_ch').html(numberWithCommas(num_total_ch)+" ฿");
     $('#pr_rm_sg').html(numberWithCommas(num_total_gl)+" ฿");
     //$('#total_price').html(numberWithCommas(all_total)+" THB");
     $('#total_price').html(numberWithCommas(all_total)+" ฿");
     $('#ch_price_all').val(all_total);

if($('#ch_price_all').val()>0){
      $('#btgo_conf').removeClass("css_bt_go2");
      $('#btgo_conf').addClass("css_bt_go1");
  }
}


  //load_backage();
  function slc_room(id,p1,p2,p3,p4,typeid){

  	/*
  $('#Room_id').val(p4);
  var numc = $('#numc').val();
  for(var i=0;i<=numc;i++){
          $('#tbid'+i).removeClass("hov_sc");
          $('#icn'+i).addClass("glyphicon-record");
       }
 
     $('#def_pack'+typeid).parent("table tr td").addClass("hov_sc");  
     
     $('#tbid'+id).addClass("hov_sc");
     $('#icn'+id).removeClass("glyphicon-record");
     $('#icn'+id).addClass("glyphicon-ok");
     
     $('#pr_rm').html(numberWithCommas(p1)+" THB");
     $('#pr_rm_ch').html(numberWithCommas(p2)+" THB");
     $('#pr_rm_sg').html(numberWithCommas(p3)+" THB");

     pr_al = p1;
     pr_ch = p2;
     pr_gl = p3;

    if(parseInt(p1)==0){$('#box_1').css('display','none');}else{$('#box_1').css('display','block');}
    if(parseInt(p2)==0){$('#box_2').css('display','none');}else{$('#box_2').css('display','block');}
    if(parseInt(p3)==0){$('#box_3').css('display','none');}else{$('#box_3').css('display','block');}
      sum_total();
      */
 }



  function load_backage(){
  $.ajax({
       url: "<?php echo base_url('Packages/show_package')?>",
             type: "POST",
             data: ({id:0}),
             dataType: "html",
      success:function(data) {
        $('#show_package').empty();
        $('#show_package').html(data);
      },
      complete: function(){
      }
    });
   }



function css_lock(id,numc){
  for(var i=0;i<numc;i++){
       $('#collapse'+i).addClass("collapse");
    }
       $('#collapse'+id).removeClass("collapse");
}


window.onload=function(){
 $(function () {
    $('#dp3').datepicker();
            $('#dp3').datetimepicker({
                format: 'DD-MMM-YYYY'
            });
            $('#dp3').datetimepicker().on('dp.change', function (e) {
                  $(this).data("DateTimePicker").hide();
            });
        });
    }


function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts[0];
    //   return parts.join(".");
}
</script>
<?php
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
