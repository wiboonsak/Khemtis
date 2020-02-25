<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ResturantsDetail extends CI_Controller {
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
         $res_id = $this->input->get("res_id");
          $date_book = $this->input->get("date_book");
       // $dbook = $this->input->get("dbook");
        if(!isset($dbook)){
             $dbook = date("Y-m-d");
        }

        if ($chk == "") {
            $chk = "English";
        }

     
        $this->Page_model->add_view($res_id);

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


       $get_detail_res = $this->Page_model->get_detail_res($res_id);
       $data["ses_hotel_id"]=$this->session->userdata('sec_book_id');
        $data["icn_lang"] = $icn_lang;
        $data["ttlang"] = $text_lang;
        $data["lang"] = $lang;
        $data["lastpara"] = "";
        $data["hotel_id"] = 0;
        $data["book_page"]=true;
        $data["res_id"]=$res_id;
        $data["p_typeid"] = $this->input->get("typeid");
$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 
$data["date_book"] = $date_book;
$data["adults"] = $this->input->get("Adults");
$data["child"] = $this->input->get("Child");
        $data["get_detail_res"]=$get_detail_res;
        $this->load->view('header', $data);
        $this->load->view('resturants_detail_view');
    }




  function add_pre_book(){
             $data = array(
                    'chk_pay' =>'no'
                    );
             $this->session->set_userdata($data);
  
          $Room_id = 0;
          $Adults = $this->input->post('Adults');
          $Child = $this->input->post('Child');
          $ad_pr = $this->input->post('ad_pr');
          $ld_pr = $this->input->post('ld_pr');
          $sg_pr = 0;
          
          $date_check = $this->input->post('date_check');
          $namepack = $this->input->post('namepack');
          $res_id = $this->input->post('res_id');
          $date_depart = $this->input->post('id_start_date');
          $Single = 0;
             //$this->reset_package($res_id);
             $utoid_book = $this->get_res_id($Room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$res_id,$date_depart,$date_check);
             echo $utoid_book;
             //echo 'xxxxxxx';
         
   }


 

  function get_res_id($Room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$res_id,$date_depart,$date_check){
           $utoid_book = 0;
           if($this->session->userdata('sec_gp_book')==''){
                $gp_id  = $this->Book_model->add_pre_gp(0);
                $id_set = array(
                    'sec_gp_book' =>$gp_id,
                    );
                 $this->session->set_userdata($id_set);
              }

            if($this->session->userdata('sec_book_res_id')==''){
                       $utoid_book = $this->Book_model->add_pre_book_res_new($Room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$res_id,$date_depart,$date_check);
                       $id_set = array(
                       'sec_book_res_id' =>$utoid_book,
                    );
                 $this->session->set_userdata($id_set);
                 return 1;
                 // เก็บไว้เผื่อว่า จะเพิ่ม package ในอนาคต ได้หลายรายการ
                 //return  $this->Book_model->up_pre_book_package($room_id,$room_detail,$get_num_room,$utoid_book,$get_extra_room,$room_ex_pr);
            }else{
              
                 $utoid_book =$this->session->userdata('sec_book_res_id');
                 $this->Book_model->up_pre_book_res_new($Room_id,$Adults,$Child,$Single,$ad_pr,$ld_pr,$sg_pr,$res_id,$date_depart,$utoid_book,$date_check); 

                 return 1;
            }
                 return 0;
          }


function showDatares(){
$res_id = $this->input->post("res_id");   
$dbook = $this->input->post("dbook");
$namepack = $this->input->post("namepack");
$typeid = $this->input->post("typeid");
     $adults =  $this->input->post("adults");
     $child = $this->input->post("child");


  $get_chk = 0;
  $id_number = 0;
  $adults_pr = 0;
  $child_pr = 0;

$tr_price = $this->Book_model->tr_get_price($res_id);
foreach ($tr_price as $value) {
   $adults_pr = $value->pr_ad;
   $child_pr = $value->pr_ch;
}

?>
<input type="hidden" value="<?php echo$res_id?>" id="res_id">
<input type="hidden" value="<?php echo$adults_pr?>" id="hid_p1">
<input type="hidden" value="<?php echo$child_pr?>" id="hid_p2">

   <input type="hidden" value="<?php echo$adults?>" id="adults_p">
   <input type="hidden" value="<?php echo$child?>" id="child_p">



 <input type="hidden" value="<?php echo $get_chk;?>" id="num_chk">
 <input type="hidden" value="<?php echo$id_number?>" id="id_number">
 <div class="panel polaroid_con" style="width:100%">
 <header class="panel-heading" style="padding:5px!important;background-image: linear-gradient(#e2e2e2, #ffffff,#ffffff)!important;color:#b7b7b7;font-size:15px;font-weight:normal;"> Number of people</header>                 
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

                          
   </div>
   </div>
<div class="polaroid css_bt_go3" style="width:100%;" id="btgo">
  <table style="width:100%">
    <!--
      <tr style="font-size:14px;font-weight:bold;color:#b81807!important;padding-left: px!important">
      <td style="padding-left: 10px">DISCOUNT</td><td style="text-align:right;padding-right: 20px">0 THB</td></tr>
    -->
    <tr style="font-size:14px;font-weight:bold;">
      <td style="padding-left: 10px">TOTAL</td><td style="text-align:right;padding-right: 20px"><input type="hidden" id="ch_price_all"><p id="total_price"></p></td></tr>
  </table>
</div>
<div class="polaroid css_bt_go2"  style="width:100%;" onclick="add_booking()"  id="btgo_conf">BOOK NOW</div>
</div>
</center>

  <input type="hidden" id="Room_id" name="Room_id">
  <input type="hidden" id="Adults" name="Adults">
  <input type="hidden" id="Child" name="Child">


  <input type="hidden" id="ad_pr" name="ad_pr">
  <input type="hidden" id="ld_pr" name="ld_pr">
  <input type="hidden" id="sg_pr" name="sg_pr">
  <input type="hidden" id="namepack" name="namepack" value="<?php echo$namepack?>"> 
  <input type="hidden" id="typeid" name="typeid" value="<?php echo$typeid?>">
  </form>


<script type="text/javascript">
  
function chcolor(id,maxid){
var i = 0;
for(i=0;i<maxid;i++){
  $('#heading'+i).addClass("slcolor");
  $('#heading'+i).removeClass("slcolor_fix");

}
  $('#heading'+id).removeClass("slcolor");
  $('#heading'+id).addClass("slcolor_fix");
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

$( "#btgo_conf" ).click(function() {
  if($('#ch_price_all').val()>0){
    var ad = n_al;
    var ld = n_ch;
 
$('#Adults').val(ad);
$('#Child').val(ld);
   
      var Adults = $('#Adults').val();
      var Child = $('#Child').val();

      var ad_pr = $('#ad_pr').val();
      var ld_pr = $('#ld_pr').val();
 
      var namepack = $('#namepack').val();
      var res_id = $('#res_id').val();
      var date_check = $('#date_check').val();
      var id_start_date = $('#id_start_date').val();

     // alert(id_start_date);

    //alert(Adults+" : "+Child+" : "+ad_pr+" : "+ld_pr+" : "+namepack+" : "+res_id+":"+id_start_date);
     
      $.ajax({
       url: "<?php  echo base_url('ResturantsDetail/add_pre_book')?>",
             type: "POST",
             data: ({
              Adults:Adults,
              Child:Child,
              ad_pr:ad_pr,
              ld_pr:ld_pr,
              namepack:namepack,
              res_id:res_id,
              id_start_date:id_start_date,date_check:date_check
            }),
             dataType: "html",
      success:function(data) {
       
       clk_menu(4);
       f_menu_right_sh();
      },
      complete: function(){   
      }
    });
   




 }else{
   $('#err_hotel').html("<font color='red'>Select resturants please !</font>");
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


var pr_al=$('#hid_p1').val();
var pr_ch=$('#hid_p2').val();

var typeid=$('#typeid').val();
var id_number=$('#id_number').val();
//slc_room(id_number,$('#hid_p1').val(),$('#hid_p2').val(),0,typeid);



sum_total();

function add_peple(ty,st){
if(pr_al>0){
if(st==1){
  if(ty==1){n_al++;}
  if(ty==2){n_ch++;}

}else if(st==2){
  if(ty==1){n_al--;}
  if(ty==2){n_ch--;}

     if(n_al<1){n_al=1;}
     if(n_ch<0){n_ch=0;}

  }
     sum_total();
  }else{
     $('#err_hotel').html("<font color='red'>Select resturants please !</font>");
  }
}

function set_price_room(){
   sum_total();
}


function sum_total(){
$('#ad_pr').val(pr_al);
$('#ld_pr').val(pr_ch);

  $('#pnum1').val(n_al);
  $('#pnum2').val(n_ch);

  $('#err_hotel').empty();

    var num_total_al = (n_al*pr_al);
    var num_total_ch = (n_ch*pr_ch);

    var all_total = (num_total_al+num_total_ch);
 if(n_ch==0){num_total_ch=pr_ch;}
     //alert(num_total_ch);
     //alert(num_total_ch);

     $('#pr_rm').html(numberWithCommas(num_total_al)+" THB");
     $('#pr_rm_ch').html(numberWithCommas(num_total_ch)+" THB");
   if(num_total_ch==0){
     $('#pr_rm_ch').html(numberWithCommas(num_total_ch)+" THB");
   }
     $('#total_price').html(numberWithCommas(all_total)+" THB");
     $('#ch_price_all').val(all_total);


if($('#ch_price_all').val()>0){
      $('#btgo_conf').removeClass("css_bt_go2");
      $('#btgo_conf').addClass("css_bt_go1");
  }
}


/*

  //load_backage();
  function slc_room(id,p1,p2,p4,typeid){
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


     pr_al = p1;
     pr_ch = p2;


    if(parseInt(p1)==0){$('#box_1').css('display','none');}else{$('#box_1').css('display','block');}
    if(parseInt(p2)==0){$('#box_2').css('display','none');}else{$('#box_2').css('display','block');}

      sum_total();
 }



  function load_backage(){
  $.ajax({
       url: "<?php // echo base_url('Packages/show_package')?>",
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



*/

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
