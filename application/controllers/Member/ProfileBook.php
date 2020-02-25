<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileBook extends CI_Controller {
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
        $this->load->model("./Book_model");
        $this->load->model("./Page_model");
        $this->load->model("./Cl_model");
        $this->load->model("./Lang_fc");
      } 

	function index(){
		       $data["TEST"] = "";
            $chk=$this->input->post("chk_lang");
        if($chk==""){$chk="English";}
           $h_lg = $this->session->userdata('ch_lang');
        $data["chk_lang"]  = $chk;
        $data["get_lang"]  = $this->Book_model->get_lang();
        $data["p_ar"] = $this->Lang_fc->get_profile($h_lg);
            $this->load->view('./header_mem',$data);
            $this->load->view('./Member/profileBooking',$data);
	}
//function(){}

function save_review(){
$fantastic_re = $this->input->post("fantastic_re");
$verygood_re = $this->input->post("verygood_re");
$satisfying_re = $this->input->post("satisfying_re");
$average_re = $this->input->post("average_re");
$poor_re = $this->input->post("poor_re");

$cleanliness_re = $this->input->post("cleanliness_re");
$comfort_re = $this->input->post("comfort_re");
$meal_re = $this->input->post("meal_re");
$location_re = $this->input->post("location_re");
$service_re = $this->input->post("service_re");

$review_title = $this->input->post("review_title");
$review_detail = $this->input->post("review_detail");
$pre_booking_id = $this->input->post("pre_booking_id");
$hotel_id = $this->input->post("hotel_id");

$save_qry = $this->Book_model->save_review_data(
$fantastic_re,
$verygood_re,
$satisfying_re,
$average_re,
$poor_re,
$cleanliness_re,
$comfort_re,
$meal_re,
$location_re,
$service_re,
$review_title,
$review_detail,
$pre_booking_id,
$hotel_id
);
echo $save_qry;
}


function save_member(){
$fid = $this->input->post("fid");
$name = $this->input->post("name");
$last = $this->input->post("last");
$mail = $this->input->post("mail");
$addr = $this->input->post("addr");
$phone = $this->input->post("phone");
$pass = $this->input->post("pass");

  $st = $this->Cl_model->save_data_cus($fid,$name,$last,$mail,$addr,$phone,$pass);
  if($st==2){
    echo 1;
  }else{
    echo 0;
  }
}


  function get_booking(){

    $idcus = $this->input->post("idcus");
    $tycommand = $this->input->post("tycommand");
    $idget_member007 = $this->session->userdata('idget_member007');

          $h_lg = $this->session->userdata('ch_lang');
          $p_ar = $this->Lang_fc->get_profile($h_lg);
$alltotal = 0;

  ?>

<input type="hidden" id="idcussec" value="<?php echo$idget_member007?>">
<?php 
$getgp_booking = $this->Book_model->getgp_booking($idget_member007);
$numgp = $getgp_booking->num_rows();
if($numgp>0){
foreach ($getgp_booking->result() AS $gp_booking){
    $dateArray = explode("-",$gp_booking->add_date);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
    $booking_id = $year.$mon.$date.$gp_booking->id_run;
$getgp_bookingjoin = $this->Book_model->getgp_bookingjoin($idget_member007);
foreach ($getgp_bookingjoin->result() AS $gp_bookingjoin){}
$getbooking_room_detail = $this->Book_model->getbooking_room_detail($gp_bookingjoin->id_booking);
foreach ($getbooking_room_detail->result() AS $booking_room_detail){}
$book_id = $booking_room_detail->pre_booking_id;
$utoid_book = $gp_booking->id_run;
$ses_trans_id = $this->Book_model->get_book_id($utoid_book,"TRANSPORT");
  $ses_packs_id = $this->Book_model->get_book_id($utoid_book,"PACKAGE");
  $ses_restr_id = $this->Book_model->get_book_id($utoid_book,"RESTAURANT");
  if($ses_trans_id!=""){
     $this->Book_model->get_st_book("UPDATE `tbl_pre_transport_booking_title` SET booking_status ='P'  WHERE id=$ses_trans_id");
}
if($ses_packs_id!=""){
     $this->Book_model->get_st_book("UPDATE `tbl_package_pre_booking` SET booking_status ='P'  WHERE id=$ses_packs_id");
}
if($ses_restr_id!=""){
     $this->Book_model->get_st_book("UPDATE `tbl_res_pre_booking` SET booking_status ='P'  WHERE id=$ses_restr_id");
}
  $book_room_detail= $this->Page_model->get_book_hotel_detail($utoid_book,"HT");
            $customer_hotel = $this->Page_model->get_customer_hotel($book_id);
            $customer_transport = $this->Page_model->get_customer_transport($utoid_book,"TS");
            $idroom=0;
            foreach ($book_room_detail as  $value) {
              $idroom = $value->room_id;
            }
            $hotel_nm = $this->Page_model->get_hotel_name($idroom);
            foreach ($hotel_nm as  $value1) {
              $hotel_id = $value1->hotel_id;
              $hotel_nm = $value1->hotel_nm;
              $hotel_policy = $value1->txt_policy;
            }

$fname_member = $this->session->userdata('fname_member'); 
$lname_member = $this->session->userdata('lname_member'); 
            if($utoid_book==""){$utoid_book=0;}
             $book_trans_detail= $this->Page_model->get_book_transport_detail($utoid_book,"TS");
             $pack_detail= $this->Page_model->get_book_package_detail($utoid_book);
             $pack_res = $this->Page_model->get_book_res_detail($utoid_book);
$idgp = $utoid_book;
$idh = $book_id;
   $arnum1 = array();
            $chk_hotel =  count($book_room_detail);
?>
<?php if(($tycommand==2)&&($chk_hotel>0)||($tycommand!=2)){?>
        <h4>Booking ID : <?php echo $booking_id?></h4>
      <div class="box_booking menu_left" style="overflow: hidden;">
        <div class="row">
<!--          <div class="col-md-4" style="height:200px;"><img src="http://hotelcms.khemtis.com/<?php //echo$imgbook?>" style="width:100%;"></div>-->
          <div class="col-md-12" style="padding-top: 10px;">
 <div style="width:100%">
 <div class="row">
     <?php
   
            if($chk_hotel>0){
                 foreach($book_room_detail as $val_sec){
                     $book_id_hotel = str_replace('-','', $val_sec->book_id_hotel).$val_sec->pre_booking_id;
                  }
     $sum_total=0;$list_room=0;$sumtotal = 0;
     foreach($book_room_detail as $val_room_detail){
        $room_total = $val_room_detail->total_sum;
        $sum_total = $sum_total + $room_total;
        $sumtotal = ($sumtotal + $room_total);
     }$alltotal=($alltotal+($sumtotal));
        ?>
	 <div class="col-md-12" style="padding-left:20px!important;">
        <h5> Hotel Name : <?php echo $hotel_nm?></h5>
        
        <table style="width:100%">
        	<tr><td><?php echo$p_ar['p_bid']?> : <b>H<?php echo$book_id_hotel?></b></td></tr>
        	
        
        </table>
<div style="border-bottom-style: dotted;border-width: 1px;border-color:#cccccc"></div>
	 </div>
	 <?php }
     $sum1 = 0;$sum2 = 0;$sumd1 =0;$sumd2 =0;

      $FromLocationName ="";
      $ToLocationName = "";
      $Adults = "";
      $Children = "";
      $travelRound = "";
      $dateReturn = "";
   if($tycommand!=2){
         if(count($book_trans_detail)>0){     
$checkin_data_dep = array();
$checkin_data_ret = array();

if (isset($customer_transport)){

         $checkin_data_dep = explode(',', $customer_transport->checkin_data_dep);
         $checkin_data_ret = explode(',', $customer_transport->checkin_data_ret);
}

  foreach ($book_trans_detail as $value_tr) {
    $t_book_id = str_replace('-','', $value_tr->add_date).$value_tr->booking_id;
    $date_depart = $value_tr->date_depart;
    $date_return = $value_tr->date_return;
  

  if($value_tr->transport_ty==1){
      $FromLocationName =$value_tr->from_data;
      $ToLocationName = $value_tr->to_data;
 
      $Adults = $value_tr->adult_traveller;
      $Children = $value_tr->child_traveller;
      $travelRound = "return";
      $dateReturn = $value_tr->date_depart;
  
      $sumd1 = ($value_tr->adult_traveller * $value_tr->adult_price);
      $sumd2 = ($value_tr->child_traveller * $value_tr->child_price);
      $sum1 = $sum1 + ($sumd1 + $sumd2);
 
   }else if($value_tr->transport_ty==2){
      $FromLocationName =$value_tr->to_data;
      $ToLocationName = $value_tr->from_data;
  
      $Children = $value_tr->child_traveller;
      $travelRound = "return";
      $dateReturn = $value_tr->date_depart;
      $sumr1 = ($value_tr->adult_traveller * $value_tr->adult_price);
      $sumr2 = ($value_tr->child_traveller * $value_tr->child_price);
      $sum2 = $sum2 + ($sumr1 + $sumr2);
      }
    }
$num_typ = count($book_trans_detail);

         ?>
     
	 <div class="col-md-12" style="padding-left:20px!important;">
        <h5> Transport : DEPART  <?php echo $FromLocationName." <i class='glyphicon glyphicon-arrow-right'></i> ".$ToLocationName?> - <?php if(count($book_trans_detail)>1){ ?>RETURN  <?php echo $ToLocationName."  <i class='glyphicon glyphicon-arrow-right'></i> ".$FromLocationName?><?php }?></h5>
        
        <table style="width:100%">
        	<tr><td><?php echo$p_ar['p_bid']?> : <b>T<?php echo$t_book_id?></b></td></tr>
        	
        
        </table>
<div style="border-bottom-style: dotted;border-width: 1px;border-color:#cccccc"></div>
	 </div>
<?php }

        }$alltotal=($alltotal+($sum1+$sum2));
       $package_nm ="";$hotel_nm = "";$room_nm = "";
       $ad = 0;$ch = 0;$sg = 0;

       $ad_p = 0;$ch_p = 0;$sg_p = 0;$total = 0;
$total1 = 0;$total2 = 0;$total3 = 0;
$policy = "";$date_check_in = "";$book_id_p = "";
$id_gp = 0;$hotel_nm = "";
  foreach ($pack_detail as  $value) {

$cus_name = $value->customer_name." ".$value->customer_Lastname;
$cus_contact = $value->customer_telephone;
$cus_email = $value->customer_email;
$cus_address = $value->cus_address;
$date_check_in = $value->date_depart;


$book_id_p  = str_replace('-','', $value->date_depart).$value->del_pack;
$ty_pack = $value->ty;
$id_gp =  $value->id_gp;
       $package_nm = $value->package_title;


       $ad = $value->customer_adult;
       $ch = $value->customer_child;
       $sg = $value->customer_single;

       $ad_p = $value->adult_price;
       $ch_p = $value->child_price;
       $sg_p = $value->single_price;
       $total1 = ($ad*$ad_p);
       $total2 = ($ch*$ch_p);
       $total3 = ($sg*$sg_p);

       $total = ($total1)+($total2)+($total3);

       $policy = $value->txt_policy;
   }
 if($tycommand!=2){
if(count($pack_detail) >0){
  if($ty_pack==1 || $ty_pack==0){
     $ar_hotel =  $this->Page_model->get_book_package_hotel($id_gp,'en');
     $ar_ex_hotel = $this->Page_model->get_book_package_hotel_extra($id_gp,'en');

     foreach ($ar_hotel as $ht_name){
         $hotel_nm = $ht_name->hotel_nm;

     }
  }
  //if($ty_pack==0){
      $sum_all_bill = 0;
  foreach ($ar_hotel as $value_hotel) {
     $sum_all_bill = ($sum_all_bill + $value_hotel->price);
     $typ_rb = $value_hotel->ty;
     $ad_peple = $value_hotel->person;
     $total1 = $value_hotel->price;
     $total_sum = $value_hotel->total_price;
   }
   foreach($ar_ex_hotel as  $value_extra) {
   $sum_all_bill = ($sum_all_bill + $value_extra->price);
   }
  
    $sum_all_bill = 0;
    foreach ($ar_hotel as $value_hotel) {
   $sum_all_bill = ($sum_all_bill + $value_hotel->price);
   $typ_rb = $value_hotel->ty;
    }
    foreach($ar_ex_hotel as  $value_extra) {
   $sum_all_bill = ($sum_all_bill + $value_extra->price);
    }
  //}
  
         ?>
     <div class="col-md-12" style="padding-left:20px!important;">
        <h5> Package Name : <?php echo $package_nm?></h5>
        
        <table style="width:100%">
        	<tr><td><?php echo$p_ar['p_bid']?> : <b>P<?php echo$book_id_p?></b></td></tr>
        	
        
        </table>
<div style="border-bottom-style: dotted;border-width: 1px;border-color:#cccccc"></div>
	 </div>
<?php $alltotal=($alltotal+($sum_all_bill));}}
 $package_nm ="";
       $hotel_nm = "";
       $room_nm = "";
       $ad = 0;
       $ch = 0;
       $sg = 0;

       $ad_p = 0;
       $ch_p = 0;
       $sg_p = 0;
       $total = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$policy = "";
$date_check_in = "";
$book_id_p = "";
  foreach ($pack_res as  $value) {

$cus_name = $value->customer_name." ".$value->customer_Lastname;
$cus_contact = $value->customer_telephone;
$cus_email = $value->customer_email;
$cus_address = $value->cus_address;
$date_check_in = $value->date_depart;

$book_id_p  = str_replace('-','', $value->add_date).$value->del_pack;

       $package_nm = $value->res_name;
       $ad = $value->customer_adult;
       $ch = $value->customer_child;

       $ad_p = $value->adult_price;
       $ch_p = $value->child_price;

       $total1 = ($ad*$ad_p);
       $total2 = ($ch*$ch_p);
  
       $total = ($total1)+($total2);
       $policy = $value->txt_policy;
   }
if($tycommand!=2){
if(count($pack_res) >0){
?>
     <div class="col-md-12" style="padding-left:20px!important;">
        <h5> Resturant name : <?php echo $package_nm?></h5>
       
        <table style="width:100%">
        	<tr><td><?php echo$p_ar['p_bid']?> : <b>R<?php echo$book_id_p?></b></td></tr>
        	
        
        </table>
 <div style="border-bottom-style: dotted;border-width: 1px;border-color:#cccccc"></div>
	 </div>
<?php  $alltotal=($alltotal+($total));}}?>
	 <div class="col-md-12">
	 	 <table style="float:right;float:bottom;margin-right: 10px;border-bottom-style:solid;border-width:0px;">
          <tr><td style="font-size:18px;padding-bottom: 15px;" class="dbline">THB <?php echo number_format($alltotal,2)?></td></tr>
	 	 </table>
	 </div>


</div>
</div>
          </div>
        </div>

<div  class="" style="background-color:#ffffff;width:100%;height:35px;padding-bottom: 20px;font-size: 13px;">
<div style="float:right;background-color:#ffffff">
    <?php if($tycommand==2){
        if($chk_hotel>0){

?>
   <button type="button" onclick="form_review(<?php echo $book_id?>,<?php echo $hotel_id?>)" class="btn_new_re" style="height:26px;padding:3px!important;font-size: 12px!important;" ><?php echo$p_ar['p_b_re']?></button>

        <?php }}?>
   <?php if($tycommand==2){?>
<button type="button" class="btn_new" style="height:26px;padding:3px!important;font-size: 12px!important;margin-right: 10px;" onclick="showmember_pay(<?php echo $idget_member007?>,<?php echo $utoid_book?>,<?php echo $book_id?>,'2')" ><?php echo$p_ar['p_b_de']?></button>
   <?php }else{?>
   <button type="button" class="btn_new" style="height:26px;padding:3px!important;font-size: 12px!important;margin-right: 10px;" onclick="showmember_pay(<?php echo $idget_member007?>,<?php echo $utoid_book?>,<?php echo $book_id?>)" ><?php echo$p_ar['p_b_de']?></button>
   <?php }?>
</div>
</div>

      </div>
<?php }?>   
  <?php
    }
    }
    }

}

