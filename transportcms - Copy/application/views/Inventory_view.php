<?php $pthc= base_url();?>
<!-------- CSS --------->
<!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/material/material.min.css">
  <link rel="stylesheet" href="<?php echo $pthc?>assets/css/material_style.css">
<!-- animation -->
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link href="<?php echo $pthc?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $pthc?>assets/css/pages/animate_page.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo $pthc?>assets/plugins/jquery-toast/dist/jquery.toast.min.css">
   <link rel="stylesheet" href="<?php echo $pthc ?>assets/plugins/sweet-alert/sweetalert.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <!-- data tables -->
     <link href="<?php echo $pthc?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
 <!---Date Time--->

    <link href="<?php echo $pthc?>assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $pthc?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" media="screen">

        <!--tagsinput-->
    <link href="<?php echo $pthc?>assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
    <!--select2-->
    <link href="<?php echo $pthc?>assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $pthc?>assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />



<style type="text/css">
        .headcol {
              color:#1078a9;
             
        }

        .row_sty{
            font-size: 14px;
        }
.button {
	 background-image: linear-gradient(#cccccc, #ffffff);
  border-radius: 5px;
  border: none;
  color: #8f8f8f;
  text-align: center;
  font-size: 15px;
 padding-top: 3px;
  width: 40px;
  transition: all 0.2s;
  cursor: pointer;
  margin: 5px;
  outline: none;
  height: 30px!important;
   box-shadow: 2px 2px 4px #000000;
}
.button:hover{
	 background-image: linear-gradient(#095b73, #008f98);
  color:#ffffff;
  outline: none;
   box-shadow: 2px 2px 2px #000000;
}
.show_cal{
    border-top-left-radius: 5px!important;
    border-bottom-left-radius: 5px!important;
    height: 30px;width:200px;background-color: #1e8daf;
    color:#ffffff;
    font-size: 16px;
    text-align: center;;
    padding-top: 5px;
}
.button_cal {
  border-radius: 6px;
  background-color: #1e8daf;
  border: none!important;
  width:35px;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px!important;
  padding: 5px!important;
  cursor: pointer!important;
  outline: none!important;
  height: 30px!important;
}



.head_sty{
  background-image: linear-gradient(#cccccc 0%, #ffffff 110%);
}

.tr_head{
  background-color: #1e8daf;
  color:#ffffff;
  font-size:15px;
}
.td_width{
  width:100px;
}


/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
.select-selected {
  background-color: #1e8daf;
  border-radius: 5px;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}
/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #80b6c7;
  border-radius: 5px;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}
/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}

.tr_border1{
  border-color:#156d88!important;
}

body, html { position:relative; margin:0; padding:0;}

#task_flyout {background-color:blue}

.fixed {position:fixed; top:140px!important; z-index:2;}
.fixed_cal {position:fixed; top:135px!important; z-index:4;}
.fixed_cal_ap{position:fixed; top:135px!important; z-index:4;}
.borderless td, .borderless th {
    border: none;
    padding: 0px;

}

.onoff{
	width:100%;
	padding: 10px;
	text-align: center;
	background-color:#4e947d;
	color:#ffffff;
	cursor: pointer;
}
.onoff:hover{
	width:100%;
	padding: 10px;
	text-align: center;
	background-color:#ec9200;
	color:#ffffff;
	cursor: pointer;

}
.offon{
	width:100%;
	padding: 10px;
	text-align: center;
	background-color:#da7070;
	color:#ffffff;
	cursor: pointer;
}
.offon:hover{
	width:100%;
	padding: 10px;
	text-align: center;
	background-color:#ec9200;
	color:#ffffff;
	cursor: pointer;
}

.loader {
  border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 35px;
  height: 35px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 0.5s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.load_show{
	visibility: visible;
}
.hidd_show{
	visibility: hidden;
}
</style>
<!----------------------------->
<?php if($chk_hotel_id!=""){?>
<div style="margin-top:140px;">     
<input type="hidden" id="val_hotel_id" value="<?php echo$chk_hotel_id?>">

  <table id="cal_date_sld" class="fixed_cal_ap hidd_show" border="0" style="width:10%;padding:0px!important;margin-left:10px;">
  <tr>
  	 <td style="padding:5px;" colspan="3">
                  <div style="width:100%!important" class="input-group date form_date col-md-8" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                      <input class="form-control" size="16" type="hidden" value="" style="width:180px;">

                       <table width="100%"><tr>
                       	<td style="width:100%;"><div style="width:120px;color: #ffffff" id="show_date_cal"></div></td><td><div class="input-group-addon button_cal"><span  class="fa fa-calendar" style="color:#ffffff"></span></div></td></tr></table>

                  </div>
                <input type="hidden" id="dtp_input2" value=""/>
     </td>
     </tr>
     <tr>
        <td style="padding:0px;">
          <button id="bt1" class="button" onclick="pre_day()"><i class="material-icons f-left">fast_rewind</i></button>
       </td>
       <td align="center">
       	 <div id="spin001" class="loader"></div>
       </td>
        <td style="padding:0px;" align="right">
          <button id="bt2" class="button" onclick="next_day()"><i class="material-icons f-left">fast_forward</i> </button>
       </td>
   </tr>
</table>





</div>
<div class="col-sm-12" style="position: relative;padding:0;margin: 0">
    <div id="show_inv" style="position: relative;padding:0;margin: 0"></div>
    <div id="show_test"></div>
</div>
</div>

<div style="width:100%;height:20px;background-color:#efefef "></div>
<?php
      $dtsever = date("d");
      $mtsever = (date("m")+1);
      $ytsever = date("Y");
?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
<script type="text/javascript">
 var dataroom=[];
 var ar_room = [];
var compo_cal ="";
var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];




 
 $('#spin001').hide();
<?php
  foreach($get_room as $room_val){
    echo "
    ar_room = [];
    ar_room.push(\"".$room_val->room_id."\",\"".$room_val->room_title."\",\"".$room_val->default_quota."\");
    dataroom.push(ar_room);";
  }
?>
 var data_cur=[];
 var ar_cur=[];
<?php
  foreach($get_cur as $cur_val){
    echo "
    ar_cur = [];
    ar_cur.push(\"".$cur_val->fld_valu."\",\"".$cur_val->fld_valu_desc."\");
    data_cur.push(ar_cur);";
  }
?>

 var all_day=[];
 var firstday=[];
 var nnex = 0;
 var dateNow = new Date();
 var day = <?php echo$dtsever?>;
 var fixday = <?php echo$dtsever?>;
 var day_dinamic=0;
 var m = <?php echo$mtsever?>;
 var year = <?php echo$ytsever?>;
 var month = (m);
 var nextMonth = month+1; 
 var prevMonth = month-1;
 var numall_i = 0;
 var txtdate = <?php echo$ytsever?>+"/"+<?php echo($mtsever-1)?>+"/"+<?php echo$dtsever?>;


    $('#show_date_cal').empty();
    $('#show_date_cal:last').append(day+" "+monthNames[month-2]+" "+year);



re_deley(500,0);
        var specialKeys = new Array();
        specialKeys.push(8); 


        function IsNumeric(e,nm) {
            var keyCode = e.which ? e.which : e.keyCode
            var str = document.getElementById("txt_pr"+nm).value
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1) ||(keyCode==46) || (keyCode==13);
            return ret;
        }
        function IsNumeric_qta(e,nm) {
            var keyCode = e.which ? e.which : e.keyCode
            var str = document.getElementById("txt_qta"+nm).value
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1) ||(keyCode==46) || (keyCode==13);
            return ret;
        }


function  covert_day(id){
    var txt = "";
    if(id==1){txt="Mon";}
    if(id==2){txt="Tue";}
    if(id==3){txt="Wed";}
    if(id==4){txt="Thu";}
    if(id==5){txt="Fri";}
    if(id==6){txt="Sat";}
    if(id==7){txt="Sun";}
  return txt;
}

function set_date(){

}

function set_coler_row(id,dd){
  var txt = "";
   if(id==0){txt="#ecf6ff";}
   else if(id==6){txt="#ecf6ff";}
   else{txt="#ffffff";}
   if(dd==txtdate){txt="#f3d7d7";}
   return txt;
}

function set_coler_row_h(id,dd){
   if(id==0){txt="#095b73";}
   else if(id==6){txt="#095b73";}
   else{txt="#1e8daf";}
   if(dd==txtdate){txt="#6d2b2b";}
   return txt;
}

function set_nm_day(y,m,d){
var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
var drun = new Date(y+"/"+m+"/"+fixday);
var dayName = days[drun.getDay()];
return dayName;
}

function load_iv(numdi,day){
  inv_cal(numdi,day);
}


function call_get_date(get_value){
  $('#spin001').show();
  $('#bt1').hide();
  $('#bt2').hide();

var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var fday = new Date(get_value);
    var dtxt = fday.getDay();
    var dd = fday.getDate();
     month = (fday.getMonth()+2);
     year = fday.getFullYear();
     fixday = dd;
    $('#show_date_cal').empty();
    $('#show_date_cal:last').append(dd+" "+monthNames[month-2]+" "+year);
   day_dinamic=0;
   re_deley(500,0,dd);
}


function nextDay(d,m,y,i){
 var d_day = new Date(y+"/"+m+"/"+fixday);
 var nextDay = new Date(d_day);
 return nextDay.setDate(d_day.getDate()+i);
}
 

function re_deley(relay,day_dinamic,day){
   setTimeout(function () {
      load_data_off(day_dinamic,day);
    }, relay); 
}







var room_off = [];
function load_data_off(day_dinamic,day){
  var fday1 = new Date((nextDay(0,(month-1),year,day_dinamic)));
  var fday2 = new Date((nextDay(0,(month-1),year,14+day_dinamic)));

  var datefind_s = (fday1.getFullYear()+"-"+(fday1.getMonth()+1)+"-"+fday1.getDate());
  var datefind_e = (fday2.getFullYear()+"-"+(fday2.getMonth()+1)+"-"+fday2.getDate());

  //alert(datefind_s+":"+datefind_e);

  room_off = [];
  var hotel_id = $('#val_hotel_id').val();
  $.ajax({
       url: "<?php echo base_url('Inventory/DoShow_off')?>",
             type: "POST",
             data: ({hotel_id:hotel_id,
             datefind_s:datefind_s,
             datefind_e:datefind_e}),
             dataType: "json",
      success:function(data_qta) {
          $.each(data_qta, function(key, value_off) {
                 var ar_off = [];
                 ar_off.push(value_off.room_id);
                 ar_off.push(ch_between(value_off.start_dt,value_off.end_dt));
                 room_off.push(ar_off);
          });
      },
      complete: function(){
       load_data_qta(day_dinamic,day,room_off);
      }
    });
}





var room_qta = [];
function load_data_qta(day_dinamic,day,room_off){
  var fday1 = new Date((nextDay(0,(month-1),year,day_dinamic)));
  var fday2 = new Date((nextDay(0,(month-1),year,14+day_dinamic)));

  var datefind_s = (fday1.getFullYear()+"-"+(fday1.getMonth()+1)+"-"+fday1.getDate());
  var datefind_e = (fday2.getFullYear()+"-"+(fday2.getMonth()+1)+"-"+fday2.getDate());

  //alert(datefind_s+":"+datefind_e);

  room_qta = [];
  var hotel_id = $('#val_hotel_id').val();
  $.ajax({
       url: "<?php echo base_url('Inventory/DoShow_qta')?>",
             type: "POST",
             data: ({hotel_id:hotel_id,
             datefind_s:datefind_s,
             datefind_e:datefind_e}),
             dataType: "json",
      success:function(data_qta) {
          $.each(data_qta, function(key, value_qta) {
                 var ar_qta = [];
                 ar_qta.push(value_qta.room_id,value_qta.limit_room,value_qta.quota_dt,value_qta.remain_room);
                 room_qta.push(ar_qta);
          });
      },
      complete: function(){
       load_data_iv(day_dinamic,day,room_qta,room_off);
      }
    });
}


var room_ar = [];
function load_data_iv(day_dinamic,day,room_qta,room_off){
  var fday1 = new Date((nextDay(0,(month-1),year,day_dinamic)));
  var fday2 = new Date((nextDay(0,(month-1),year,14+day_dinamic)));

  var datefind_s = (fday1.getFullYear()+"-"+(fday1.getMonth()+1)+"-"+fday1.getDate());
  var datefind_e = (fday2.getFullYear()+"-"+(fday2.getMonth()+1)+"-"+fday2.getDate());
 // alert(datefind_s+":"+datefind_e);

  room_ar = [];
  $('#spin001').hide();
  $('#bt1').show();
  $('#bt2').show();
  var hotel_id = $('#val_hotel_id').val();
  $.ajax({
       url: "<?php echo base_url('Inventory/DoShow_iv')?>",
             type: "POST",
             data: ({hotel_id:hotel_id,
             datefind_s:datefind_s,
             datefind_e:datefind_e}),
             dataType: "json",
      success:function(data) {
          $.each(data, function(key, value) {
                 var ar = [];
                 ar.push(value.room_id,value.crcy_code,value.price_dt,value.price);
                 room_ar.push(ar);
          });
      },
      complete: function(){
       inv_cal(day_dinamic,day,room_ar,room_qta,room_off);
      }
    });
}

function next_day(){
  $('#spin001').show();
  $('#bt1').hide();
  $('#bt2').hide();
    day_dinamic+=14;
  re_deley(500,day_dinamic,day);
}

function pre_day(){
  $('#spin001').show();
  $('#bt1').hide();
  $('#bt2').hide();
    day_dinamic-=14;
  re_deley(500,day_dinamic,day);
}

function conv_d(txt){
	var fday = new Date(txt);
    var dd = fday.getDate();
    var mm = fday.getMonth();
    var yy = fday.getFullYear();
    var txtch = yy+"-"+("0" + (mm+1)).slice(-2)+"-"+("0" + dd).slice(-2);   
	return txtch;
}

function inv_cal(numdi,nnex,room_ar,room_qta,room_off){
	//$('#show_test').append(room_off);

idrun=0;
idqta=0;
var monthNames = ["January","February","March","April","May","June","July","August","September","October","November", "December"];
var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
var t="";
var i=0;var j=0;var k=0;
var idn1=0;
 
//$('#showtest:last').append(ar_room_detail.length);
$("#show_inv").empty();
t+="<table style='width:100%;' id='myHeader' class='table table-bordered'>"+
   "<tr class='tr_head'>"+
   "<td class='tr_border1' style='width:16%;'>"+compo_cal+"</td>";
  var d=0;
  for(i=0;i<=13;i++){
    var fday = new Date(nextDay((nnex),month-1,year,(numdi+i)));
    var dtxt = fday.getDay();
    var dd = fday.getDate();
    var mm = fday.getMonth();
    var yy = fday.getFullYear();
    var txty= yy+"/"+(mm+1)+"/"+dd; 

    t+="<td class='td_width tr_border1' align='center' style='width:6%;background-color:"+set_coler_row_h(dtxt,txty)+"'>"+yy+"<br><font style='font-size:12px;'>"+days[dtxt]+"  "+dd+"<br>"+monthNames[mm]+"</font></td>";
  }
t+="</tr></table><table style='width:100%;'  class='table table-bordered'>";
for(j=1;j<=dataroom.length;j++){ var txt_room_id=dataroom[j-1][0];var txt_default_quota = dataroom[j-1][2];var txtch_qta = "";
   t+="<tr  class='row_sty'><td class='headcol' colspan=15 style='background-color:#e3edf1;border-color:#cccccc!important;'> "+dataroom[j-1][1]+"</td></tr>"+
       "<tr style='background-color:#d0dce0'><td style='width:16%;'>Room quota</td>";
     for(var rb=0;rb<=13;rb++){idqta++;
    var fday = new Date(nextDay((nnex),month-1,year,(numdi+rb)));
    var dtxt = fday.getDay();
    var dd = fday.getDate();
    var mm = fday.getMonth();
    var yy = fday.getFullYear(); 
    var txtch = yy+"-"+("0" + (mm+1)).slice(-2)+"-"+("0" + dd).slice(-2);   
         var txtshow_qta=txt_default_quota;
         var txtcolor = "#ffffff";
         for(var qta=0;qta<room_qta.length;qta++){
         	 if(room_qta[qta][0]==txt_room_id && room_qta[qta][2]==txtch){txtshow_qta=room_qta[qta][1];
         	 	if(room_qta[qta][1]!=txt_default_quota){txtcolor="#ebf8a4";}
         	 }
         }

// check BetweenDate On and Off
var defoff=1;
var txtdisplay = "ON";
var css_onoff = "onoff";
 for(var x1=0;x1<room_off.length;x1++){
 	 var t1_off=room_off[x1][0];
        if(room_off[x1][1].length==1){jj=0;}else{jj=1;}
 	for(var x2=0;x2<(room_off[x1][1].length-jj);x2++){
 		var t2_off=conv_d(room_off[x1][1][x2]);
           if(t1_off==txt_room_id && t2_off==txtch){defoff=0;css_onoff="offon";txtdisplay="OFF";}

 	}
 }
//-----------------------------------

         
         t+="<td style='width:6%;'><table style='width:100%' class='table borderless'><tr><td><input type='hidden' value='"+txt_default_quota+"' id='txt_hidqta"+idqta+"'><input type='hidden' value='"+defoff+"' id='txt_off"+idqta+"'><input type='text' value='"+txtshow_qta+"' id='txt_qta"+idqta+"'"+
          " onchange=\"savedata_qta("+idqta+","+txt_room_id+",'"+yy+"','"+(mm+1)+"','"+dd+"',"+txtshow_qta+")\" "+
          " style='width:100%;background-color:"+txtcolor+";height:40px;outline: none;overflow: auto;border-style: none; text-align: center;' onkeypress='return IsNumeric_qta(event,"+idqta+");'></td><td>"+
          "<div class='"+css_onoff+"' onclick=\"add_off("+idqta+","+txt_room_id+",'"+yy+"','"+(mm+1)+"','"+dd+"')\" )'>"+txtdisplay+"</div>"+
          "</td></tr></table></td>";
     }
   t+="</tr>";
for(r=1;r<=data_cur.length;r++){ var txtcry=data_cur[r-1][0];
   t+="<tr><td style='border-color:#cccccc!important;background-color:#f1f1f1'>&nbsp;&nbsp;("+data_cur[r-1][0]+")&nbsp;"+data_cur[r-1][1]+"</td>";
   var rt=0;
    for(k=0;k<=13;k++){idrun++;
    var fday = new Date(nextDay((nnex),month-1,year,(numdi+k)));
    var dtxt = fday.getDay();
    var dd = fday.getDate();
    var mm = fday.getMonth();
    var yy = fday.getFullYear();
    var txty= yy+"/"+(mm+1)+"/"+dd;   
    var txtch = yy+"-"+("0" + (mm+1)).slice(-2)+"-"+("0" + dd).slice(-2);   
    var txtshow = "";
   for(var dt=0;dt<room_ar.length;dt++){
      if(room_ar[dt][0]==txt_room_id && room_ar[dt][1]==txtcry && room_ar[dt][2]==txtch){txtshow=room_ar[dt][3];}
   }
    t+="<td class='long' style='padding:0px!important'><input type='text' value='"+txtshow+"' "+
       "onchange=\"savedata("+idrun+","+txt_room_id+",'"+txtcry+"','"+yy+"','"+(mm+1)+"','"+dd+"')\"  id='txt_pr"+idrun+"' style='width:100%;height:100%;"+ 
       "overflow: auto;border-style: none; text-align: right;background-color:"+set_coler_row(dtxt,txty)+"' onkeypress='return IsNumeric(event,"+idrun+");'></td>";
    }
   t+="</tr>";
 }
}
t+="</table>";
$('#show_inv:last').append(t);
myFunction();
 $('#cal_date_sld').removeClass("hidd_show");
 $('#cal_date_sld').addClass("load_show");
}



function ch_between(st,en){
var start = new Date(st),
    end = new Date(en),
    year = start.getFullYear(),
    month = start.getMonth()
    day = start.getDate(),
    dates = [start];

while(dates[dates.length-1] < end) {
  dates.push(new Date(year, month, ++day));
}
return dates;
}

function add_off(id_run,room_id,yy,mm,dd){

  //	var n1 = $('#txt_off'+(id_run-1)).val();
	var n2 = $('#txt_off'+(id_run)).val();
  //	var n3 = $('#txt_off'+(id_run+1)).val();
  // alert(n1+":"+n2+":"+n3);
	var d1 = nextDay_off(dd,mm,yy,-1);
	var d2 = nextDay_off(dd,mm,yy,0);
	var d3 = nextDay_off(dd,mm,yy,1);
 // alert(d1+":"+d2+":"+d3+"="+room_id);	
	  $.post("<?php echo base_url('Inventory/add_up_off')?>", 
      {defoff:n2,room_id:room_id,d1:d1,d2:d2,d3:d3},
      function(result){
      	//alert(result);
       if(result!=0){
        show_msg('Update success',1,500);
        re_deley(500,day_dinamic,day);
      }else{
        show_msg('Not Update  status',2);
      }
    },'json');
}

function nextDay_off(d,m,y,i){
 var d_day = new Date(y+"/"+m+"/"+d);
 var nextDay = new Date(d_day);
 var dtxt = new Date(nextDay.setDate(d_day.getDate()+i));
 var dd = dtxt.getDate();
 var mm = (dtxt.getMonth()-1);
 var yy = dtxt.getFullYear();
var ddd = ("0" + dd).slice(-2);  
var mmm = ("0" + (mm+2)).slice(-2);  

 return yy+"-"+mmm+"-"+ddd;
}
 

function savedata_qta(e,room_id,yy,mm,dd,v){
var vl = $('#txt_qta'+e);
var vlhid= $('#txt_hidqta'+e);
if(vl.val().trim()!="" && vl.val().trim()<=vlhid.val().trim()){
qta = vl.val().trim();
    $.post("<?php echo base_url('Inventory/Doup_qta_iv')?>", 
      {room_id:room_id,qta:qta,yy:yy,mm:mm,dd:dd},
      function(result){
       if(result!=0){
        show_msg('Update success',1,1000);
        re_deley(500,day_dinamic,day);
      }else{
        show_msg('Not Update  Room',2);
      }
    },'json');
    
}else{
	show_msg('Quata Max',2,1000);
  vl.val(v);

}}



function savedata(e,room_id,cry,yy,mm,dd){
var vl = $('#txt_pr'+e);
if(vl.val().trim()!=""){
price = vl.val().trim();
    $.post("<?php echo base_url('Inventory/Doup_cry_iv')?>", 
      {room_id:room_id,cry:cry,price:price,yy:yy,mm:mm,dd:dd},
      function(result){
       if(result!=0){
        show_msg('Update success',1,1000);
      }else{
        show_msg('Not Update  Room',2);
      }
    },'json');
    
}else{
  vl.val("");
}}

function show_msg(txtdata,idtyp,relay){
  var txttyp = "";
  if(idtyp==1){txttyp="success";}
  if(idtyp==2){txttyp="warning";}
               $.toast({
              heading: txtdata,
              text: '',
              position: 'mid-center',
              loaderBg: '#da8609',
              icon: txttyp,
              hideAfter: relay,
              stack: 0
        });
}


window.onscroll = function() {myFunction()};
function myFunction() {
if ($(this).scrollTop() > 50) {
          $('#myHeader').addClass('fixed');
          $('#cal_date_sld').addClass('fixed_cal');
      } else {
          $('#myHeader').removeClass('fixed');
          $('#cal_date_sld').removeClass('fixed_cal');
      }
}






</script>

                       </div>


 <?php }else{?>
<br><br>
   <div style="font-size: 35px;margin-top:8vw;"><center>Hotel Information not available
    <br><br>
   <br> 
<br><br>


  <?php }?>







</div>





  