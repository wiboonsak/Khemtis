<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" type="text/css"
        media="all" rel="stylesheet" />

<style type="text/css">
     .chil_border{
    width: 100px;
    border-width: 1px;
    border-style: solid;
    background-color: #ffdd00;
    border-color: #ffdd00;
    height: 40px;
    text-align: center;
    line-height: 42px;
    border-radius:5px;
    margin-left:5px;
  }

  .css_border_pack{
-webkit-box-shadow: 5px 6px 5px -4px rgba(0,0,0,0.31);
-moz-box-shadow: 5px 6px 5px -4px rgba(0,0,0,0.31);
box-shadow: 5px 6px 5px -4px rgba(0,0,0,0.31);
  }
  .css_border{
    -webkit-box-shadow: 4px 4px 5px -2px rgba(0,0,0,0.63)!important;
    -moz-box-shadow: 4px 4px 5px -2px rgba(0,0,0,0.63)!important;
    box-shadow: 4px 4px 5px -2px rgba(0,0,0,0.63)!important;
    width:100%;height:auto  ;background-color:#ffdd00;padding:30px;

    border-bottom-style: solid;
    border-width: 1px;
   border-bottom-color:#e0c200;
  }

  .css_over_pack:hover {
     background-color:#ffdd00;
  }
  
.strikethrough {
  position: relative;
}
.strikethrough:before {
  position: absolute;
  content: "";
  left: 0;
  top: 50%;
  right: 0;
  border-top: 1px solid;
  border-color: inherit;
  
  -webkit-transform:rotate(-5deg);
  -moz-transform:rotate(-5deg);
  -ms-transform:rotate(-5deg);
  -o-transform:rotate(-5deg);
  transform:rotate(-5deg);
}

.btbook_pg{
  background-color:#40b4e7!important;
}

.btbook_pg:hover{
   background-color:#ffdd00!important;
}

.btbook_bdr{
  border-radius:5px!important;
}

.bt_color{
  background-color:#3c3c3c;
  color:#ffffff;
}

.bootstrap-datetimepicker-widget table td.today:before{
      content: '';
    display: inline-block;
    border: solid transparent;
    border-width: 0 0 7px 7px;
  background-color: #d8d8d8!important;
  
    position: absolute;
    bottom: 4px;
    right: 4px;
}
.bootstrap-datetimepicker-widget table td.disabled, .bootstrap-datetimepicker-widget table td.disabled{
color:#c5c5c5!important;
}

</style>



<script>
     function fbs_click(idimg) {
     var simg = document.getElementById(idimg);
     u=simg.src;
     // t=document.title;
     t=simg.getAttribute('alt');
     PopupCenter('','',626,436,u,t);
     //window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
    return false;
}

function PopupCenter(url, title, w, h,u,t) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft
var top = 100; //(height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t), 'sharer', 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);
    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}
</script>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
            <!-- WRAPPER CONTENT-->
            <div class="wrapper-content">
                <!-- HEADER-->
                <?php //include("header.php"); ?>
                <!-- WRAPPER-->
                <div id="wrapper-content">
                    <!-- MAIN CONTENT-->
                      <div class="main-content">
                      <div class="css_border">  
<?php
 $h_lg = $this->session->userdata('ch_lang');
 $pk_ar = array();
 $pk_ar = $this->Lang_fc->package_lang($h_lg);
?>



          
                                                    
<div class="container">
<div class="col-md-3" style="padding-bottom:5px;">
<?php
 $dt = new DateTime();
     $d= $dt->format('d');
     $m= $dt->format('M');
     $y= $dt->format('Y');
if($m==1){$txt="January";}
if($m==2){$txt="February";}
if($m==3){$txt="March";}
if($m==4){$txt="April";}
if($m==5){$txt="May";}
if($m==6){$txt="June";}
if($m==7){$txt="July";}
if($m==8){$txt="August";}
if($m==9){$txt="September";}
if($m==10){$txt="October";}
if($m==11){$txt="November";}
if($m==12){$txt="December";}

//echo $pst_book_st;
if(isset($pst_book_st)){
$def_add_day = $pst_book_st;
}else{
$datec = $y."-".$m."-".$d;
$date = date("Y-m-d");
$date1 = str_replace('-', '/', $date);
 $def_add_day = date('d-M-Y',strtotime($date1 . "+1 days"));
 $newDate = date("Y-m-d", strtotime($def_add_day));
}
?>

                            <div class="input-group date" id="startdate_pack" style=" border:0px solid  #ffffff">
                                <input type="text" value="<?php echo$def_add_day?>" name="id_start_date" id="id_start_date" placeholder="DD-MM-YY" class="form-control" style="width:100%;background-color: #ffffff;border-top-left-radius:5px!important;border-bottom-left-radius:5px!important;"/>
                                <span class="input-group-addon" style="border-color:#ffffff;">
                                    <span class="glyphicon-calendar glyphicon"></span>
                                </span>
                            </div>


</div>
<input type="hidden" value="0" id="adults">
<input type="hidden" value="0" id="child">
<input type="hidden" id="type_page" value="2">
<div class="col-md-6" style="padding-bottom:5px;">
<div class="input-group">
  <input type="text" name="txtfind" id="txtfind"  placeholder="find package"   class="form-control" aria-label="Amount (to the nearest dollar)" 
  style="width:100%;border-style:none;height:35px;font-size:15px;padding-left: 5px;border-top-left-radius:3px!important;border-bottom-left-radius:3px!important;">
  <span class="input-group-addon" style="border-style:none;height:32px;font-size:22px;background-color:#ffffff;text-align:center"><span style="color:#cccccc;" class="fa fa-search"></span></span>
</div>
</div>
  <div class="col-md-2" style="padding-bottom:5px;">                                              
   <div class="chil_border"  onclick="find_package()" style="padding-bottom:10px!important;background-color:#3c3c3c!important;height:37px!important;float:right;cursor: pointer;">
         <font color='#ffdd00'><?php echo$pk_ar['UPDATE']?></font>
      </div>
  </div>                                    
  </div>                                      
  </div>


<?php
 $dt = new DateTime();
     $d= $dt->format('d');
     $m= $dt->format('m');
     $y= $dt->format('Y');
     
if($m==1){$txt="January";}
if($m==2){$txt="February";}
if($m==3){$txt="March";}
if($m==4){$txt="April";}
if($m==5){$txt="May";}
if($m==6){$txt="June";}
if($m==7){$txt="July";}
if($m==8){$txt="August";}
if($m==9){$txt="September";}
if($m==10){$txt="October";}
if($m==11){$txt="November";}
if($m==12){$txt="December";}
 $datec = $d."-".$txt."-".$y;

if(isset($str_date)){
$time = strtotime($str_date);
$newformat = date('d-M-Y',$time);
$datec = $newformat;
}else{

 if(isset($pst_book_st)){
$time = strtotime($pst_book_st);
$newformat = date('d-M-Y',$time);
$datec = $newformat;
 }else{
 
$datec = date("Y-m-d");
$date1 = str_replace('-', '/', $datec);
$datec = date('d-M-Y',strtotime($date1 . "+1 days"));
 }}?>
 

           

<input type="hidden" value="<?php echo$adults?>" id="adults">
<input type="hidden" value="<?php echo$child?>" id="child">






                        <section class="tours padding-top padding-bottom" style="padding-bottom: 20px; padding-top: 20px !important">
                            <div class="container">
                            <div class="tours-wrapper">                                 
                                 
                            <div class="page-main">
                            <div class="clearfix"></div>
                            <div class="tour-result-main padding-top padding-bottom" style="padding-bottom: 20px; padding-top: 20px !important">
                                <div class="container">
                                    <div class="result-body">
                                        <div class="row">
                                            <div class="col-md-12 main-right">
                                                <div class="tours-list">
                                                 <p id="show_package">&nbsp;<font style="color:#000000;font-size: 30px;">COMMING ZOON</font></p>
                                                </div>
                                                  <!--
                                                <nav class="pagination-list margin-top70">
                                                    <ul class="pagination">
                                                        <li>
                                                            <a href="#" aria-label="Previous" class="btn-pagination previous">
                                                                <span aria-hidden="true" class="fa fa-angle-left"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-pagination active">01</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-pagination">02</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-pagination">03</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="btn-pag
                                                            ination">...</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" aria-label="Next" class="btn-pagination next">
                                                                <span aria-hidden="true" class="fa fa-angle-right"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </section>       




                    </div>
                    
                    <!-- BUTTON BACK TO TOP-->
                <div id="back-top">
                        <a href="#top" class="link">
                            <i class="fa fa-angle-double-up"></i>
                        </a>
                    </div>
                </div>
                <!-- FOOTER-->
                <?php include("footer.php"); ?>

            </div>
        </div>
              
        <?php include("html_tool/modal_login_register.php"); ?>
        <!-- LIBRARY JS-->
        <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="assets/libs/detect-browser/browser.js"></script>
        <script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
        <script src="assets/libs/wow-js/wow.min.js"></script>
        <script src="assets/libs/slick-slider/slick.min.js"></script>
        <script src="assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
        <script src="assets/libs/please-wait/please-wait.min.js"></script>
        <script src="assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <script src="assets/libs/fancybox/js/jquery.fancybox-thumbs.js"></script>
        <!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")-->
        <!-- MAIN JS-->
        <script src="assets/js/main.js"></script>
        <!-- LOADING JS FOR PAGE-->

        <script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
        <script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="assets/js/pages/sidebar.js"></script>
        <script src="assets/js/pages/result.js"></script>
        <!---date_tiem--->
     
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
     <!--
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
      <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>

   



<script type="text/javascript">
var  pst_txtfind = '<?php  echo $pst_txtfind?>';
var  adu = '<?php  echo $pst_adu?>';
var  chi = '<?php  echo $pst_chi?>';
var  book_st = '<?php  echo $pst_book_st?>';
load_backage(pst_txtfind,adu,chi,book_st);




function sendpack(url){
var date_book = $('#id_start_date').val();
var adults = $('#adults').val();
var child = $('#child').val();

window.location=url+"&date_book="+date_book+"&adults="+adults+"&child="+child;
}


$(document).ready(function(){
            $('#startdate_pack').datetimepicker({
       useCurrent: true,
       minDate: moment(), // Current day
       format: 'DD-MMM-YYYY'
            })
            $('#startdate_pack').datetimepicker().on('dp.change', function (e) {
                  
                 // find_package();
            });
});




window.onload=function(){
 $(function () {
            $('#startdate').datetimepicker({
       useCurrent: true,
        minDate: moment(), // Current day
       format: 'DD-MMM-YYYY'
      
            });
        });
    }

var input = document.getElementById("txtfind");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
     find_package();
  }
});


function find_package(){
  var txtfind = $('#txtfind').val();
var id_start_date = $('#id_start_date').val();
  //alert(id_start_date);
  var adults = $('#adults').val();
  var child = $('#child').val();
//alert(id_start_date);

  $.ajax({
       url: "<?php echo base_url('Packages/show_package')?>",
             type: "POST",
             data: ({txtfind:txtfind,id_start_date:id_start_date,adults:adults,child:child}),
             dataType: "html",
      success:function(data) {
        $('#show_package').empty();
        $('#show_package').html(data);
      },
      complete: function(){
        //alert("Save complete")     
      }
    });
}


  function load_backage(pst_txtfind,adu,chi,book_st){
    if(book_st==""){
       book_st = $('#book_st').val();
    }

  var id_start_date = book_st;
  var adults = adu;
  var child = chi;
  var txtfind = pst_txtfind;
  $.ajax({
       url: "<?php echo base_url('Packages/show_package')?>",
             type: "POST",
             data: ({id:0,txtfind:txtfind,id_start_date:id_start_date,adults:adults,child:child}),
             dataType: "html",
      success:function(data) {
       
      	$('#show_package').empty();
        $('#show_package').html(data);
      },
      complete: function(){
             
      }
    });
       }





        </script>
    </body>
</html>