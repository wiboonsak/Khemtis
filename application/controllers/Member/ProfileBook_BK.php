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


  ?>

<input type="hidden" id="idcussec" value="<?php echo$idget_member007?>">
<?php 
$get_price_book = $this->Book_model->get_price_book($idget_member007);

foreach ($get_price_book as $value_book) {
$hid_ch = 0;$sumall = 0;
$hotel_id = $value_book->hotel_id;

	$imgbook = $value_book->img_name;
	$pre_booking_id = $value_book->pre_booking_id;
	$date_in = $value_book->date_in;
	$date_out = $value_book->date_out;
	$booking_number = $value_book->booking_number;
	$check_review = $this->Book_model->check_review_data($pre_booking_id);
	if(count($check_review)>0){
        $hid_ch = 1;
	}
?>
      <div class="box_booking menu_left" style="overflow: hidden;">
        <div class="row">
          <div class="col-md-4" style="height:200px;"><img src="http://hotelcms.khemtis.com/<?php echo$imgbook?>" style="width:100%;"></div>
          <div class="col-md-8" style="padding-top: 10px;">
 <div style="width:100%">
 <div class="row">
	 <div class="col-md-8" style="padding-left:20px!important;">
        <h4> <?php echo$value_book->hotel_nm?></h4>
        <div style="border-bottom-style: dotted;border-width: 1px;border-color:#cccccc"></div>
<?php if($hid_ch==0 || $tycommand==1){?>

        <table style="width:100%">
        	<tr><td><?php echo$p_ar['p_bid']?> : <b><?php echo$booking_number?></b></td></tr>
        	<tr><td style="color:#159415"><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;<?php echo$p_ar['p_comp']?></td></tr>
          <tr><td><?php echo$p_ar['p_rty']?> :<br>
<table style="width:100%">
<?php
$get_price_book = $this->Book_model->get_price_book_detail($idget_member007,$pre_booking_id);
foreach ($get_price_book as $value_book) {
  $sumextra = $value_book->sumextra;
  $sum_room = $value_book->sum_room;
  $room_fld_nm = $value_book->room_fld_nm;
  $sumall = $sumall + ($sumextra + $sum_room);
?>
<tr><td><font style="font-size:13px;">&nbsp;&nbsp;-&nbsp;<?php echo$room_fld_nm?></font></td></tr>
 <?php }?>
</table>
        </td></tr>
        </table>
<?php }else{
if(count($check_review)>0){
	foreach ($check_review as  $vldata) {
       $txt_title = $vldata->review_title;
       $txt_detail = $vldata->review_detail;
       $number_re = $vldata->num_re;
       if($number_re>0){
       	 $number_re = (($number_re * 10) / 100);
       }
	}
}
?>

 <table style="width:100%;background-color:#f3f3f3;">
 	<tr><td style="padding-left: 10px;"><h4><b><font color="#3c89ce"><?php echo number_format($number_re,1)?></font>&nbsp;&nbsp;<?php echo$txt_title?></b></h4></td></tr>
 	<tr><td style="padding-left: 10px;"><?php echo$txt_detail?></td></tr>
 </table>


<?php }?>
	 </div>
	 <div class="col-md-4">
     <table style="float:right;text-align:center;font-size: 12px;margin-right: 10px;">
     	<tr><td style="padding-right: 10px;border-right-style: solid;border-width:1px;border-color:#cccccc"><?php echo$p_ar['p_in']?> <br><?php echo$date_in?></td>
     	<td style="padding-left: 10px;"><?php echo$p_ar['p_out']?> <br><?php echo$date_out?></td></tr>
     </table>
	 </div>

	 <div class="col-md-12">
	 	<?php if($hid_ch==0 || $tycommand==1){?>
	 	 <table style="float:right;float:bottom;margin-right: 10px;border-bottom-style:solid;border-width:0px;">
          <tr><td style="font-size:18px;padding-bottom: 15px;" class="dbline">THB <?php echo number_format($sumall,2)?></td></tr>
	 	 </table>
	 	<?php } ?>
	 </div>


</div>
</div>
          </div>
        </div>

<div  class="" style="background-color:#ffffff;width:100%;height:35px;padding-bottom: 20px;font-size: 13px;">
<div style="float:right;background-color:#ffffff">
<?php if($tycommand==2){
   if($hid_ch==0){
?>
   <button type="button" onclick="form_review(<?php echo$pre_booking_id?>,<?php echo$hotel_id?>)" class="btn_new_re" style="height:26px;padding:3px!important;font-size: 12px!important;" ><?php echo$p_ar['p_b_re']?></button>

<?php }}?>
<button type="button" class="btn_new" style="height:26px;padding:3px!important;font-size: 12px!important;margin-right: 10px;" onclick="showmember_pay(<?php echo$pre_booking_id?>)" ><?php echo$p_ar['p_b_de']?></button>
</div>
</div>

      </div>




    <?php } ?>  
  <?php
   }

}

