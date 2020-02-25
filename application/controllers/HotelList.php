<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HotelList extends CI_Controller {
    
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

	   function index()
	   {
		    $chk=$this->input->post("chk_lang");
        $lang_q = $this->session->userdata('ch_lang');
 
            $txt_find =  $this->input->get("txt_find");  
            $book_st= $this->condate($this->input->get("t-start"));    
            $book_en= $this->condate($this->input->get("t-end"));  
            
            $Rooms= $this->input->get("Rooms");
            $Adults= $this->input->get("Adults");
            $Child= $this->input->get("Child");
            $lang = $this->input->get("lang");

            $data["book_st_n"] = $this->input->get("t-start");
            $data["book_en_n"] = $this->input->get("t-end");

          if(!isset($book_st)){  
              redirect(base_url("Welcome"), 'refresh');
          }
          if(!isset($book_en)){  
              redirect(base_url("Welcome"), 'refresh');
          }
          if($book_st =="" || $book_en == ""){
       
            redirect(base_url("Welcome"), 'refresh');
          }
          
          if(!isset($Adults)){$Adults=1; }
          if(!isset($Child)){ $Child=0; }
          if($book_st == $book_en){

             redirect(base_url("Welcome"), 'refresh');

          }


            $Child= $this->input->get("Child");


		    if($chk==""){$chk="English";}
		    $data["chk_lang"]  = $chk;
		    $data["get_lang"]  = $this->Page_model->get_lang();
        $data["get_crcy_code"] = $this->Page_model->get_crcy_code("CRCY_CODE");

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
            $data["Child"] = $Child;
            $data["Adults"] = $Adults;     
            $data["lastpara"] = "book_st=$book_st&book_en=$book_en&Adults=$Adults&Child=$Child";
        
            $data["tbl_package_img"] = $this->Page_model->get_tbl_package_img(4);
            $data["get_fac_hotel"] = $this->Page_model->get_hotel_icon_def("HOTEL_FEATURE",$lang_q);
            $data["get_typ_hotel"] = $this->Page_model->get_hotel_typ($lang_q);
            $data["get_max_price"] = $this->Page_model->get_btw_price("THB");

            $data["lang"]=$lang;
            $data["hotel_id"]=0;
$str5 = 0;
$str4 = 0;
$str3 = 0;
$str2 = 0;
$str1 = 0;
$str5 = $this->Page_model->get_str5();
$str4 = $this->Page_model->get_str4();
$str3 = $this->Page_model->get_str3();
$str2 = $this->Page_model->get_str2();
$str1 = $this->Page_model->get_str1();

$data["str_all"] = "$str5,$str4,$str3,$str2,$str2,$str1";

$data["fname_member"]=$this->session->userdata('fname_member'); 
$data["lname_member"]=$this->session->userdata('lname_member'); 
$data["lang_q"] = $lang_q;
            $this->load->view('header',$data);
            $this->load->view('HotelList');
	}

function do_room_hotel_price_min(){
	$this->Page_model->get_room_hotel_price_min(57,'THB');
}


function goto_page(){
  			    $chk=$this->input->post("chk_lang");
		        if($chk==""){$chk="English";}
		        $data["chk_lang"]  = $chk;
    }


function condate($n){
  $time = strtotime($n);
  $newformat = date('Y-M-d',$time);
  return $newformat;
}


function show_data(){
$lang_q = $this->session->userdata('ch_lang');

   $p_min = $this->input->post("p_min");
   $p_max = $this->input->post("p_max");

  $c = $this->input->post("c");
  $l = $this->input->post("l");

    $txt_find = trim($this->input->post("txt_find"));
    $fac_txt =  $this->input->post("fac_txt");
    $str_txt =  $this->input->post("str_txt");
    $minprice = $this->input->post("minprice");
    $maxprice = $this->input->post("maxprice");
    $lastpara = $this->input->post("lastpara");
    $hotel_ty = $this->input->post("hotel_ty");

   $page = $this->input->post("page");
   $lang = $this->input->post("lang");
   $lgquage = $this->input->post("lang");
  // $stdata_ok = $this->input->post("star");

$book_st = $this->input->post("book_st");
$book_en = $this->input->post("book_en");

$time1 = strtotime($book_st);
$newformat1 = date('Y-m-d',$time1);
$time2 = strtotime($book_en);
$newformat2 = date('Y-m-d',$time2);

$date1=date_create($book_st);
$date2=date_create($book_en);
$diff=date_diff($date1,$date2);
$numdate= $diff->format("%a ");

  $txt_ar_str="";
  $txt_ar_fac="";
  $txt_ar_hol="";
  $txt_hotel_ty = "";
  $star = "";
  $fac = "";

if(isset($page) && $page==9){
   
}else{
if(count($str_txt)>0){
for($str=0;$str<count($str_txt);$str++){
    $txt_ar_str=$txt_ar_str.",".$str_txt[$str];
}}
   if($txt_ar_str==""){$star="";}else{$star="AND tbl_hotels.hotel_grade IN (".substr($txt_ar_str,1).")";}

if(count($fac_txt)>0){
for($str=0;$str<count($fac_txt);$str++){
    $txt_ar_fac=$txt_ar_fac."OR tbl_field_lang_values.fld_valu = ".$fac_txt[$str]." ";
}}
    $fac="(".substr($txt_ar_fac,2).")";
if(count($hotel_ty)>0){   
for($str=0;$str<count($hotel_ty);$str++){
    $txt_ar_hol = $txt_ar_hol.",".$hotel_ty[$str];
}}   

 if($txt_ar_hol==""){$txt_hotel_ty="";}else{$txt_hotel_ty= "AND tbl_hotel_type.idty IN(".substr($txt_ar_hol,1).")";}
}

//echo $txt_hotel_ty;

//echo $txt_find;
//echo $minprice."<br>";
//echo $maxprice;
$loop_id_room = 0;
$data_find_hotel=$this->Page_model->show_hote_room_min($txt_find,$lang_q,$star,$fac,$minprice,$maxprice,$newformat1,$newformat2,$txt_hotel_ty);

if(!$data_find_hotel[0]){
    if(!isset($txt_find) || trim($txt_find)==""){$txt_find="None Text Search information";}
    echo "<div style='width:100%;height:150px;border-style:solid;border-width:1px;margin-top:100px;border-radius:10px;border-color:#cccccc;padding:20px;'>
       <center><font style='font-size:25px;color:red'>No hotels found. Search information</font><br>
       <font style='font-size:21px;color:#cccccc'><u>".$txt_find."</u></font></center>
    </div>";
}

if($data_find_hotel[1]=="Hotel"){
    //echo "<script>window.location='HotelView?lang=".$lgquage."&hotel_id=".$data_find_hotel[2].$lastpara."';</script>";
}

//echo $star;
$checknum=0;
//echo $data_find_hotel[0][2][2];
$numrow_hotel = count($data_find_hotel[0]);
$numpage = ceil($numrow_hotel/10);
$hn =0;
for($hn=0;$hn<$numrow_hotel;$hn++){
 $checknum++;
if($l==4 && $checknum==10){break;}
if($hn<$p_max && $hn>=$p_min){
$loop_id_room++;
    $hotel_name = $data_find_hotel[0][$hn][1];
    $conty = $data_find_hotel[0][$hn][2];
    $province_nm =$data_find_hotel[0][$hn][3];
    $hotel_grade =($data_find_hotel[0][$hn][4]*20);
    $img_main = $data_find_hotel[0][$hn][9];
    $hotel_id = $data_find_hotel[0][$hn][6];
$icon  = $data_find_hotel[0][$hn][7];
$icon_txt  = $data_find_hotel[0][$hn][8];
$icon_ar = explode(",",$icon);
$icon_txt_ar = explode(",",$icon_txt);
$dis_pr =$data_find_hotel[0][$hn][11];
$pr=  $data_find_hotel[0][$hn][10];
$dis_show =  $data_find_hotel[0][$hn][12];
$show_n_pri=  $data_find_hotel[0][$hn][13];
$qty_ch = $data_find_hotel[0][$hn][14];
$txt_location = $data_find_hotel[0][$hn][15];
$pr_per =  number_format((($pr - $show_n_pri)* 100)/$pr); 
$txt_find_new = "&txt_find=".$hotel_name."&";
?>
<div class="col-md-<?php echo$c?>">                                                                                                  
<div class="hotels-layout" style="width: 100%;background-color:#ffffff!important;">    
<div class="image-wrapper">
                                                                    <a href="HotelView?lang=<?php echo$lgquage?>&hotel_id=<?php echo$hotel_id?><?php echo $txt_find_new?><?php echo$lastpara?>" class="link">
                                                                        <img src="http://hotelcms.khemtis.com/<?php echo$img_main?>" alt="" class="img-responsive">
                                                                    </a>
                                                                    <!--
                                                                    <div class="label-sale">
                                                                        <p class="text">Best Seller</p>
                                                                        <p class="number">Best Seller</p>
                                                                    </div>
                                                                    -->
                                                                    <div class="title-wrapper">
                                                                        <a href="HotelView?lang=<?php echo$lgquage?>&hotel_id=<?php echo$hotel_id?><?php echo $txt_find_new?><?php echo$lastpara?>" class="title" style="color:#ffffff!important;font-size:14px!important;text-shadow: 0px 0px #cccccc;"><?php echo ucfirst($hotel_name)?></a>
                                                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span class="width-<?php echo$hotel_grade?>">
                                                                                <strong class="rating">5.00 out of 5</strong>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
      <div class="content-wrapper" style="height:250px!important;">
      <div class="content" style="text-align: left; padding-top: 0px !important;margin-top: 0px!important;vertical-align: top;">
      <?php if($page!=9){?>
                          <div class="title" style="padding:0px!important;" onmouseout="hid_pr_de(<?php echo$loop_id_room?>)" onmouseover="show_pr_de(<?php echo$loop_id_room?>)" >
                                  <div class="price">
                                                            <?php  $cspr="margin-left: 0px;color:#000000;"; if($pr_per > 0){ ?>
                                                             <sub class="price-gray linetub" style="font-size:13px;" ><?php echo number_format($pr)?>&nbsp;THB&nbsp;</sub></br>
                                                              <?php $cspr="margin-left: 0px!important;"; }?>
                                                             <span class="price-red"  style="font-size:17px;line-height: 25px;cursor: pointer;<?php echo$cspr; ?>">
                                                                                    <?php echo number_format($show_n_pri)?>&nbsp;THB&nbsp;<span style="font-size: 7pt; color:#353535; font-weight: 100 !important">/ room / <?php echo ($numdate)?> night(s)</span>
                                                         <span aria-hidden="true" data-icon="+">
                                                            <p class="glyphicon glyphicon-info-sign" style="color:#c1cdd2;font-size:15px;"></p>
                                                         </span>
                                                         </span>
                                    </div>
                                </div>
<?php }?>


                  <div style="width:100%;height:auto;position: absolute;z-index:100000;display: none;
                                    " id="popup_room<?php echo$loop_id_room?>"><?php echo$dis_show?>
                  </div>   
                  <div>
                  <?php if($pr_per > 0){ ?>
                 <p class="label-red-bg" style="margin-left:0px;width:150px;height: 25px;line-height: 20px;"><?php echo$pr_per?>% OFF TODAY</p>
                  <?php }else{echo"<p style='line-height:3px;'></p>";}?>
                 <p  style="line-height:15px;margin-top:1px;font-size:15px;font-weight: bold;"><a href="HotelView?lang=<?php echo$lgquage?>&hotel_id=<?php echo$hotel_id?><?php echo $txt_find_new?><?php echo$lastpara?>" class="link"><?php echo$hotel_name?></a></p>
                 <p style="line-height:7px;margin-top:1px;font-size:13px;" class="border_lo"><i class="fa fa-map"></i> <a href="javascript:window.open('https://www.khemtis.com/HotelView/load_map?hotel_id=<?php echo$hotel_id?>')" class="link">  View on map</a></p>
                 <p style="line-height:15px;margin-top:1px;font-size:12px;" ><b>Location</b> :&nbsp;<?php echo$txt_location?>,&nbsp;<?php echo$province_nm?>
                  
                 </p>
                 <div style="height:80px;">
                  <div class="rows">
                                       <?php $txt_more = "&nbsp;&nbsp;<font color='##337ab7'>More...</font>";$ib=0;
                                        $show_fac = $this->Page_model->show_fac($hotel_id,$lang_q);
                                        foreach ($show_fac as $value){$ib++;
                                        $data_txt = $value->fld_valu_desc;
                                        $data_ic = $value->field1;
                                        
                                       ?>   
                              <div class="col-md-12" style="font-size: 13px!important">                                                              
                        &nbsp;<i class="<?php echo$data_ic?>">&nbsp;&nbsp;</i>&nbsp; <?php echo$data_txt?> <?php if($ib==3){echo$txt_more;} ?>

                              </div>

                                       
                                       <?php if($ib==3){break;} } ?>

                  </div>
                  </div>
                </div>
              </div>
                                                                    <ul class="list-info list-unstyled">
                                                                        <li>
                                                                            <a href="#" class="link">
                                                                                <i class="icons hidden-icon fa fa-eye"></i>
                                                                                <span class="number">234</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="link">
                                                                                <i class="icons hidden-icon fa fa-star"></i>
                                                                                <span class="number">156</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="link">
                                                                                <i class="icons hidden-icon fa fa-comment"></i>
                                                                                <span class="number">19</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="link">
                                                                                <i class="icons hidden-icon fa fa-facebook"></i>
                                                                                 <span class="number">19</span>
                                                                            </a>
                                                                            
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="link">
                                                                                <i class="icons fa fa-map-marker"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>



                                                            </div>        

<?php }}?>








<?php if($page!=9){?>
<br><center><div id="spin002" class="loader"></div></center><br>
<div>
<nav class="pagination-list margin-top50">
                                                    <ul class="pagination">
                                                        <li>
                                                            <a href="#" aria-label="Previous" class="btn-pagination previous">
                                                                <span aria-hidden="true" class="fa fa-angle-left"></span>
                                                            </a>
                                                        </li>
                                                      <?php for($npage=0;$npage<$numpage;$npage++){
                                                             $nummin =  ($npage * 10);
                                                             $nummax =  ($npage * 10)+10;
                                                      	?>  
                                                        <li>
                                                            <a href="javascript:set_numminmax(<?php echo($nummin)?>,<?php echo($nummax)?>)" class="btn-pagination"><?echo $this->app_num($npage+1)?></a>
                                                        </li>
                                                      <?php }?>
                                                        <li>
                                                            <a href="#" aria-label="Next" class="btn-pagination next">
                                                                <span aria-hidden="true" class="fa fa-angle-right"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
</nav>
</div>
<?php }?>
<script>
//sortTable(0);
//minTable();

function load_data(){

}

function sortTable(n) {
  /*
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
     // alert(x.innerHTML.toLowerCase()+":"+y.innerHTML.toLowerCase());
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}



function chcmaxmin(){
 var maxmin_sort = $('#maxmin_sort').val();
 sortTable(maxmin_sort);
 
}

</script>
 <?
 
}

   function app_num($number){
$num_padded = sprintf("%02d", $number);
return $num_padded; // returns 04
   }

 
    function get_fac_hotel(){

    }
    function chk_Accom(){

    }
    function chk_Facil(){

    }
    

}
