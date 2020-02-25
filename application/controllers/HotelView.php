<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HotelView extends CI_Controller {
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
        $this->load->model("Page_model");
        $this->load->model("Book_model");
        $this->load->model("./Lang_fc");
      } 

function index(){
  /*
                $id_set = array(
                    'sec_book_id' =>"",
                    );
               $this->session->set_userdata($id_set);
  */
  $lang = $this->session->userdata('ch_lang');   
            $data = array(
                    'chk_pay' =>'no'
                    );
            $this->session->set_userdata($data);
		    $chk=$this->input->post("chk_lang");
		    if($chk==""){$chk="English";}
		    $data["chk_lang"]  = $chk;
		    $data["get_lang"]  = $this->Page_model->get_lang();
            $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");
            $txt_find =  $this->input->get("txt_find");  
            $book_st= $this->input->get("book_st");    
            $book_en= $this->input->get("book_en");  
            $Rooms= $this->input->get("Rooms");
            $Adults= $this->input->get("Adults");
            $Child= $this->input->get("Child");
          //  $lang = $this->input->get("lang");
            
            $data["book_st_n"] = $this->condate($this->input->get("book_st"));
            $data["book_en_n"] = $this->condate($this->input->get("book_en"));
            /*
            $get_lang_icon= $this->Page_model->get_icon_lang($lang);
            foreach($get_lang_icon as $lang_val){
               $icn_lang =  $lang_val->field1;
               $text_lang = $lang_val->fld_valu_desc;
            }
            $data["icn_lang"]=$icn_lang;
            $data["ttlang"]=$text_lang;
            */
            $data["txt_search"] = $txt_find;
            $data["book_st"] = $book_st;
            $data["book_en"] = $book_en;
            $data["Rooms"] = $Rooms;
            $hotel_id = $this->input->get("hotel_id");
            $data["hotel_id"]=  $hotel_id;

                  $dtr = array('ses_hotel_id' => $hotel_id,);
                  $this->session->set_userdata($dtr);

            $data["ses_hotel_id"]=$this->session->userdata('sec_book_id');
            $data["Child"] = $Child;
            $data["Adults"] = $Adults;           
          
            $data["lastpara"] = "&hotel_id=$hotel_id&book_st=$book_st&book_en=$book_en&Adults=$Adults&Child=$Child";
            
            $data["data_hotel"] = $this->Page_model->data_find_hotel_id($hotel_id,$lang);
            $data["get_room"] = $this->Page_model->get_room_data($hotel_id,$lang);
            $data["lang"]=$lang;
            $data["hotel_feature"] = $this->Page_model->get_hotel_icon("HOTEL_FEATURE",$hotel_id,$lang);

$data['hotel_tra_pop'] = $this->Page_model->get_hotel_tra_pop($hotel_id,$lang);
$data['hotel_tra_def'] = $this->Page_model->get_hotel_tra_def($hotel_id,$lang);         

$book_st = $this->input->get("book_st");
$book_en = $this->input->get("book_en");
$time1 = strtotime($book_st);
$newformat1 = date('Y-m-d',$time1);
$time2 = strtotime($book_en);
$newformat2 = date('Y-m-d',$time2);

$data["get_room_price_detail"] = $this->Book_model->get_room_price_detail($hotel_id,'THB',$newformat1,$newformat2,$lang);

            // $this->Book_model->get_room_quato(126,'2019-06-15','2019-06-18');

$member_review = $this->Book_model->member_review_data($hotel_id);
$avg_all = $this->Book_model->avg_all($hotel_id);
$avg_all_star = $this->Book_model->avg_all_star($hotel_id);
$data["tbl_package_img"] = $this->Page_model->get_tbl_package_img(8);
$data["member_review"] = $member_review;
$data["avg_all"] = $avg_all;
$data["avg_all_star"] = $avg_all_star;
$data["fname_member"] = $this->session->userdata('fname_member'); 
$data["lname_member"] = $this->session->userdata('lname_member'); 
$data["lang_q"] = $lang;
            $data["hotel_id"]=$hotel_id;
            $this->load->view('header',$data);
            $this->load->view('Hotel_View',$data);
	    }
  
    function goto_page(){
  			    $chk=$this->input->post("chk_lang");
		        if($chk==""){$chk="English";}
		        $data["chk_lang"]  = $chk;
    }


    function do_booking_detail_sum(){
            $formdata = $this->input->post('formdata');
            $send_commnd = $this->input->post('send_commnd');
            $get_formdata = array();
            parse_str($formdata, $get_formdata);
              $Result = $this->Book_model->add_pre_book_detail($get_formdata,$send_commnd);
            echo $Result;
    }


    function reset_hotel($hotel_id,$date_in,$date_out){
    	      $utoid_book =$this->session->userdata('sec_book_id');
            if($utoid_book==""){$utoid_book=0;}
                 $check_book = $this->Book_model->ses_book_ch($utoid_book);


              $chk_date_book = $this->Book_model->chk_date_book($utoid_book,$date_in,$date_out);
             if($chk_date_book==0){$this->cls_sec();}
             if($check_book!=$hotel_id && $check_book!=0){$this->cls_sec();}
    }


    function set_num_book(){

    }


function condate($n){
  $time = strtotime($n);
$newformat = date('Y-m-d',$time);
return $newformat;

}


function chk_hotel(){
	$txt_find = $this->input->post('txt_find');
	 $Result = $this->Page_model->chk_hotel($txt_find);
     if(count($Result)==1){
	 foreach ($Result as $value) {
	     $txt_re = $value->hotel_id."::".$value->chnum;
	 }
	}else{
		 $txt_re = "0::".count($Result);
	}
   echo $txt_re;
}

function test_day(){
    $data["test"]="";
            $this->load->view('header',$data);
            $this->load->view('v_d',$data);
}
   
/*
  function  get_cl_room_quato(){
  $book_st = $this->input->get("book_st");
  $book_en = $this->input->get("book_en");
  $time1 = strtotime($book_st);
  $newformat1 = date('Y-m-d',$time1);
  $time2 = strtotime($book_en);
  $newformat2 = date('Y-m-d',$time2);
  $result = $this->Book_model->get_room_quato($room_id,$newformat1,$newformat2);
  echo $Result; 
   }
*/
         function add_pre_book(){

                  $url_cur = $this->input->post('url_cur');
                  $data = array('sec_url_cur' =>$url_cur,);
                  $this->session->set_userdata($data);



          $hotel_id = $this->input->post('hotel_id');
          $numdate = $this->input->post('numdate');
          $room_id = $this->input->post('room_id');
          $room_detail = $this->input->post('room_detail');
          $get_num_room = $this->input->post('get_num_room');
          $get_extra_room = $this->input->post('get_extra_room');
          $room_ex_pr = $this->input->post('room_ex_pr');

          $adults = $this->input->post('adults');
          $child = $this->input->post('child');

          $date_in = $this->input->post('date_in');
          $date_out = $this->input->post('date_out');

          $room_ex_pr = ($room_ex_pr);
        //$room_ex_pr = ($room_ex_pr * $numdate);
          $this->reset_hotel($hotel_id,$date_in,$date_out);
    $utoid_book = $this->get_room_id($room_id,$room_detail,$get_num_room,$get_extra_room,$room_ex_pr,$numdate,$adults,$child,$date_in,$date_out);
          echo $utoid_book;
         }
 

function load_map(){
          //   $data["lat_p"]=$this->input->get('lat_p');
          //   $data["lng_p"]=$this->input->get('lng_p');
      $hotel_id = $this->input->get('hotel_id');
      $get_hotel = $this->Page_model->show_hotel_data($hotel_id,'en');

 foreach ($get_hotel as  $value) {
  $hotel_name = $value->hotel_nm;
  $hotel_str = $value->hotel_grade;
  $short_desc = $value->short_desc;
  $img_data = "http://hotelcms.khemtis.com/".$value->img_name;
  $h_lat = $value->h_lat;
  $h_lng = $value->h_lng;
  
 }
        $data["hotel_id"] = $hotel_id;
        $data["hotel_name"] = $hotel_name;
        $data["hotel_str"]= $hotel_str;
        $data["img_data"] = $img_data;
        $data["price"] = "Price";
        $data["hotel_id"] = $hotel_id;
        $data["short_desc"] = $short_desc;
    $data["lat_p"] =  $h_lat;
    $data["lng_p"] =  $h_lng;  
            $this->load->view('map',$data);
}


     function add_gp_booking(){
       	$sql = "";
     }


     function get_img(){
            $room_id =$this->input->post('room_id');
            $this->Page_model->get_img($room_id);
     }


     function get_room_id($room_id,$room_detail,$get_num_room,$get_extra_room,$room_ex_pr,$numdate,$adults,$child,$date_in,$date_out){
            // $room_id = $this->input->post('room_id');
            // $room_detail = $this->input->post('room_detail');
            // $get_num_room = $this->input->post('get_num_room');

              if($this->session->userdata('sec_gp_book')==''){
 	               $gp_id  = $this->Book_model->add_pre_gp(0);
                 $id_set = array(
                    'sec_gp_book' =>$gp_id,
                    );
                 $this->session->set_userdata($id_set);
              }
         	       if($this->session->userdata('sec_book_id')==''){
                       $utoid_book = $this->Book_model->add_pre_book_new($adults,$child,$date_in,$date_out);
                       $id_set = array(
                       'sec_book_id' =>$utoid_book,
                    );
                 $this->session->set_userdata($id_set);
                 return  $this->Book_model->add_pre_book_detail($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr,$numdate);
            }else{
            	   $utoid_book =$this->session->userdata('sec_book_id');
                 return  $this->Book_model->add_pre_book_detail($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr,$numdate); 
            }
                 return $utoid_book;
          }


        function do_sec_book(){
             $utoid_book="";
             $room_id=$this->input->post("room_id");
             $room_qta=$this->input->post("room_qta");
             $stay_dt = $this->input->post("stay_dt");
             $price = $this->input->post("price");
             $dscnt_price = $this->input->post("dscnt_price");
             $checkin_dt = $this->input->post("checkin_dt");
             $checkout_dt = $this->input->post("checkout_dt");
             if($utoid_book==""){}
         }

        function cls_sec(){
                $sec_gp_book =$this->session->userdata('sec_gp_book');
                $utoid_book =$this->session->userdata('sec_book_id');
                
                $id_set = array(
                    'sec_book_id' =>"",
                    );
               $this->session->set_userdata($id_set);
               $del_check = $this->Book_model->del_pre_booking_all($utoid_book,$sec_gp_book); 
               echo $del_check;
        }

        function do_del_list_booking(){
       	            $idrun=  $this->input->post("idrun");
                    $room_id=$this->input->post("room_id");
               $del_check =  $this->Book_model->del_list_booking($idrun,$room_id); 
               echo $del_check;
        }

        function show_booking_list_detail(){
 
            $arnum1 = array();
            $utoid_book =$this->session->userdata('sec_book_id');
            $paramit ="";
            if($utoid_book==""){$utoid_book=0;}
            $book_room_detail= $this->Page_model->get_book_room_detail($utoid_book);
            $get_nm_hotel = $this->input->post("max_room_hotel");
            $idhd = $this->input->POST("idhd");
               foreach($book_room_detail as $val_sec){
                  $arnum2 = array();
                  array_push($arnum2,$val_sec->room_id,$val_sec->cnt_room);
                  array_push($arnum1,$arnum2);
         }

echo "<script>";
for($ib=0;$ib<$get_nm_hotel;$ib++){
   $jj=0;$txt="";
     foreach($book_room_detail as $val_sec){
   $vl_sc = $arnum1[$jj][0];
   $ds_sc = $arnum1[$jj][1];
$txt = substr($txt,1);
echo "
var rmid = $('#hotel_ch".($ib+1)."').val();
var max_nm = eval($('#max_nm".($ib+1)."').val()-".$ds_sc.");
 if(rmid==".$vl_sc."){
 var newOptions".($ib+1)." = {".$txt."};
 $('#num_room".($ib+1)."').empty();
 for(var ck=0;ck<(max_nm);ck++){
   $('#num_room".($ib+1)."')
      .append($('<option></option>')
      .attr('value',ck+1)
      .text(ck+1)); 
}}
";
   $jj++;
 }
}
echo "</script>";
?>


<div class="nav-search hide" style="border-radius:5px;margin-top: 0px!important;padding:10px!important;border-style: solid!important;border-width:1px!important;border-color:#cccccc">
<p style="font-weight:2px;font-size:17px;"><b>Booking List Room Detail</b></p>
<p>
<div style="width: 100%;height: auto;background-color:#ffffff;border-radius:5px;padding: 10px;
                 border-color:#cccccc!important;border-style: solid!important;border-width:0px!important;">
<table  class="table table-sm">
  <tr style="font-weight:bold;color:#4082bb;background-color:#f1f1f1">
     <td>รายการห้องพัก</td>
     <td>ราคาห้อง</td>
     <td>ราคาเตียงเสริม</td>
     <!--<td>จำนวน</td>-->
     <td style="text-align:right;">รวมราคา</td>
     <td>&nbsp;</td>
  </tr>
    
    <?php
     $sum_total=0;$list_room=0;
     foreach($book_room_detail as $val_room_detail){
        $list_room++;
        $pre_booking_id =  $val_room_detail->pre_booking_id;
        $room_id =  $val_room_detail->room_id;
        $room_detail = $val_room_detail->room_title;
        $room_price = $val_room_detail->new_pr;
        $room_qty = $val_room_detail->cnt_room;
        $room_total = $val_room_detail->total_sum;
        $sum_total = $sum_total + $val_room_detail->total_sum;
        $sum_extra = $val_room_detail->sum_extra;
     ?>

     <tr>
        <td><?php echo$room_detail?></td>
        <td style="text-align:right"><?php echo number_format($room_price,2)?></td>
        <td style="text-align:right;"><?php echo number_format($sum_extra,2)?></td>
        <!--<td style="text-align:center;"><?php //echo$room_qty?></td>-->
        <td style="text-align:right;"><?php echo number_format($room_total,2)?></td>
        <td onclick="del_list(<?php echo$pre_booking_id?>,<?php echo$room_id?>)" style="cursor:pointer;">&nbsp;<i class="fa fa-trash"></i></td>
    </tr>
    <?php } ?>
     <tr><td colspan="3" style="text-align:right"><b>Sum Total </b></td><td style="text-align:right;"><b>&nbsp;<?php echo number_format($sum_total,2)?></b></td><td>&nbsp;</td></tr>
</table>
<center>
<?php if($idhd!=0 && $list_room!=0){?>
    <button type="button" class="btn" style="padding:3px!important;background-color: #459850;color:#ffffff;border-color:#ffffff"
    onclick="gotoBooking()" 
    >Confirm Order </button>
<?php }  ?>
    <button type="button"  onclick="cls_booking()" class="btn" style="padding:3px!important;background-color: #d2223f;color:#ffffff;border-color:#ffffff">Cancel Order</button>
</center>
</div>
</p>
</div>



<script>
$('#show_num_book').html("<?php echo$list_room?>");
function del_list(p1,p2){
    $.post("<?php echo base_url('HotelView/do_del_list_booking')?>", 
      {idrun:p1,room_id:p2},
        function(result){
      if(result>0){
         show_booklist(<?php echo$idhd?>,0);
         location.reload();
       }else{
     }
   },'json');
 }



function cls_booking(){
    $.post("<?php echo base_url('HotelView/cls_sec')?>", 
      {idrun:0},
        function(result){
            if(result>0){
               show_booklist(<?php echo$idhd?>,0);
               location.reload();
           }else{
        }
     },'json');
  }
</script>
<?
}



function show_room_price_detail(){
    $hotel_id = "57";
    $crcy_code = "THB";
    $room_data =  $this->Book_model->get_room_price_detail($hotel_id,$crcy_code);
    /*
       foreach($room_data as $value_room){
           echo $value_room[2].$value_room[3]."<br>";
       }
    */
}






} 
