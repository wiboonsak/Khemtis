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
 <!-- data tables -->
   <link href="<?php echo $pthc?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>


<style type="text/css">
  .select_bt{
    background-color: red;color:#ffffff;
  }
  .select_bt:hover{
    background-color: #0758b7;color:#ffffff;
  }
  .lb_yes{
     padding:3px;
     border-radius: 3px;
     width: 50px;
     background-color: #2cb99c;
     text-align: center;
     color:#ffffff;
  }
  .lb_no{
     padding:3px;
     border-radius: 3px;
     width: 50px;
     background-color: #d03869;
     text-align: center;
     color:#ffffff;
  }

</style>
<!----------------------------->
<?php if($chk_hotel_id!=""){?>
<div style="margin-top:8vw;">     
<form id="form_season" name="form_season">
<input type="hidden" id="val_hotel_id" name="val_hotel_id" value="<?php echo$chk_hotel_id?>">


 <div class="row" style="padding:15px;">
            <div class="col-sm-12">
              <div class="card-box">
<div class="card-body row">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#cccccc;padding-bottom:5px;border-radius:5px;background-color:#d4d4d4;"> 
<font style="font-size: 18px;font-weight: bold;color:#6f6f6f;">Season Price Data&nbsp;&nbsp;</font><font style="font-size: 18px;color:#0a69b3;"></font>
</div>
<input type="hidden" id = "name_season_edit" name="name_season_edit">
                        <div class="col-lg-12 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="name_season_txt">
                               <input class = "mdl-textfield__input" value="<?php //echo $p_room_title; ?>" type = "text" id = "name_season" name="name_season">
                               <label class = "mdl-textfield__label">Name Season</label>
                            </div>
                        </div>
<?php 
function get_day(){
$txt_day="";
$str_length = 2;
for($d=1;$d<=31;$d++){
    $str = substr("00{$d}", -$str_length);
    $txt_day=$txt_day."<li class='mdl-menu__item' id='$str'>$str</li>";
 }
 return $txt_day;
}
function get_mont(){
$txt_mount="";
$str_length = 2;
for($d=1;$d<=12;$d++){
    $str = substr("00{$d}", -$str_length);
    $txt_mount=$txt_mount."<li class='mdl-menu__item' id='$str'>$str</li>";
 }
 return $txt_mount;
}
?>
<input type="hidden" value="" id="p_st_day" name="p_st_day">
<input type="hidden" value="" id="p_st_mon" name="p_st_mon">
<input type="hidden" value="" id="p_en_day" name="p_en_day">
<input type="hidden" value="" id="p_en_mon" name="p_en_mon">
<input type="hidden" value="ADD" id="command_typ" name="command_typ">
<input type="hidden" value="" id="idup" name="idup">
                       <div class="col-lg-2 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width" id="day_str_txt">
                            <input class="mdl-textfield__input" type="text" id="day_str"  value="<?php //echo$p_published_status?>" readonly tabIndex="-1">
                            <label for="day_str" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="day_str" class="mdl-textfield__label">Start Day</label>
                            <ul data-mdl-for="day_str" id="get_p_st_day" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" style="height:300px;overflow:auto; ">
                                <?php echo get_day()?>
                            </ul>
                        </div>
                       </div>    
                      
                       <div class="col-lg-2 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width" id="m_str_txt">
                            <input class="mdl-textfield__input" type="text" id="m_str"  value="<?php //echo$p_published_status?>" readonly tabIndex="-1">
                            <label for="m_str" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="m_str" class="mdl-textfield__label">Start Month</label>
                            <ul data-mdl-for="m_str" id="get_p_st_mon" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"  style="height:300px;overflow:auto; ">
                               <?php echo get_mont()?>
                            </ul>
                        </div>
                       </div>    
                      <div class="col-lg-8 p-t-10"></div>
                       <div class="col-lg-2 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width" id="day_end_txt">
                            <input class="mdl-textfield__input" type="text" id="day_end"  value="<?php //echo$p_published_status?>" readonly tabIndex="-1">
                            <label for="day_end" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="day_end" class="mdl-textfield__label">End Day</label>
                            <ul data-mdl-for="day_end" id="get_p_en_day" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"  style="height:300px;overflow:auto; ">
                                <?php echo get_day()?>
                            </ul>
                        </div>
                       </div>    

                       <div class="col-lg-2 p-t-10"> 
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width" id="m_end_txt">
                            <input class="mdl-textfield__input" type="text" id="m_end"  value="<?php //echo$p_published_status?>" readonly tabIndex="-1">
                            <label for="m_end" class="pull-right margin-0">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                            </label>
                            <label for="m_end" class="mdl-textfield__label">End Month</label>
                            <ul data-mdl-for="m_end" id="get_p_en_mon" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"  style="height:300px;overflow:auto; ">
                                <?php echo get_mont()?>
                            </ul>
                        </div>
                       </div>    
 <div class="col-lg-12 p-t-10 text-center"> 
                            <button type="button" onclick="add_season()" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
                    <button type="button" onclick="clsdata()" class="btn btn-secondary">Cancel</button>
                        </div>
</div>
            </div>
      </div>
</div>
<input type="hidden" name="old_sts" id="old_sts" value="">
<input type="hidden" name="old_mos" id="old_mos" value="">
<input type="hidden" name="old_ste" id="old_ste" value="">
<input type="hidden" name="old_moe" id="old_moe" value="">
<?php 

/*
$md1=1;$d1 = 20;
$md2=2;$d2 = 20;
$news_d1 = "";
$newe_d1 = "";

$news_d2 = "";
$newe_d2 = "";
$stadd = 0;
  $y=date("Y");
    $m1= ($md1);
    $m2= ($md2);
  $mc1 = $md1;
  $mc2 = $md2;
    if($m1>$m2){
  $stadd = 1;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.'12'.'-'.'31';
   $news_d2 = $y.'-'.'01'.'-'.'01';
   $newe_d2 = $y.'-'.$mc2.'-'.$d2;

  }else{
    if($m1==$m2){
  if($d1 >$d2){
   $stadd = 1;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.'12'.'-'.'31';
   $news_d2 = $y.'-'.'01'.'-'.'01';
   $newe_d2 = $y.'-'.$mc2.'-'.$d2;
  }else{
   $stadd = 0;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.$mc2.'-'.$d2;
  }
    }else{
    $stadd = 0;
   $news_d1 = $y.'-'.$mc1.'-'.$d1;
   $newe_d1 = $y.'-'.$mc2.'-'.$d2;
   }
  }

  $news_d1 = date("Y-m-d", strtotime($news_d1));
  $newe_d1 = date("Y-m-d", strtotime($newe_d1));
   echo $news_d1." : ".$newe_d1;
   echo "<br>";
if($stadd==1){
  $news_d2 = date("Y-m-d", strtotime($news_d2));
  $newe_d2 = date("Y-m-d", strtotime($newe_d2));
   echo $news_d2." : ".$newe_d2;
  }
*/

/*
$d1 = '02-12';
$d2 = '02-30';
$y =  date("Y");
$now = strtotime($y."-".$d1);
$your_date = strtotime($y."-".$d2);
$datediff =  $your_date-$now;
$numday =  round($datediff / (60 * 60 * 24));


$numc= 0;
for($i=0;$i<=$numday;$i++){
$date = date_create($y."-".$d1);
date_add($date, date_interval_create_from_date_string($i.' days'));
$youdate =  date_format($date, 'Y-m-d');

$sql = "SELECT count(*) as max_num FROM tbl_season_period 
WHERE '$youdate' BETWEEN CONCAT(YEAR(CURDATE()),'-',start_month,'-',start_day) 
AND CONCAT(YEAR(CURDATE()),'-',end_month,'-',end_day)
AND hotel_id = 90";
$query = $this->db->query($sql);
$row = $query->row();

if(isset($row))
{
   $numc = $numc+ ($row->max_num);
 }
}

echo $numc;

*/
?>

<div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-head">
                                    <header> List Season Price</header>
                                    <div class="tools">
                                        <!--<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>-->
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr style="background-color:#628dab;color:#ffffff;">
                                                <th style="text-align: center;">Number</th>
                                                <th> Season Name </th>
                                                <th> Start Date </th>
                                                <th> End Date</th>
                                                <th style="text-align: center;"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_season">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</form>
 <?php }else{?>
<br><br>
   <div style="font-size: 35px;margin-top:8vw;"><center>Hotel Information not available
    <br><br>
    <br> 
  <br>
<br>

  <?php }?>

<!--Scipt-->
 <script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
<script type="text/javascript">
var ar2 = []; 
get_season();
function re_deley(link,relay){
   setTimeout(function () {
       window.location.href = link; 
    }, relay); 
}

 $("#get_p_st_day li").click(function() {
    $("#p_st_day").val(this.id);
});
  $("#get_p_st_mon li").click(function() {
    $("#p_st_mon").val(this.id);
});

 $("#get_p_en_day li").click(function() {
    $("#p_en_day").val(this.id);
});

 $("#get_p_en_mon li").click(function() {
    $("#p_en_mon").val(this.id);
});

function clsdata(){
  var  txt_cls="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width is-upgraded";
        $('#idup').val("");
        $('#name_season_edit').val("");
        $('#name_season').val("");
        $('#name_season').closest("div").removeClass();
        $('#name_season').closest("div").addClass(txt_cls);
        $('#day_str').val("");
        $('#day_str').closest("div").removeClass();
        $('#day_str').closest("div").addClass(txt_cls);
        $('#m_str').val("");
        $('#m_str').closest("div").removeClass();
        $('#m_str').closest("div").addClass(txt_cls);
        $('#day_end').val("");
        $('#day_end').closest("div").removeClass();
        $('#day_end').closest("div").addClass(txt_cls);
        $('#m_end').val("");
        $('#m_end').closest("div").removeClass();
        $('#m_end').closest("div").addClass(txt_cls);
        $('#command_typ').val("ADD");

         $('#p_st_day').val("");
         $('#p_st_mon').val("");
         $('#p_en_day').val("");
         $('#p_en_mon').val("");



         $('#old_sts').val("");
         $('#old_mos').val("");
         $('#old_ste').val("");
         $('#old_moe').val("");




}

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

function add_season(){
   var form_data = $('#form_season').serialize();
   var hotel_id = $("#val_hotel_id").val();
        $.ajax({
                    url: "<?php echo base_url('SeasonPeriod/add_season')?>",
                    type: "POST",
                    data: ({hotel_id: hotel_id,form_data:form_data}),
                    dataType: "html",
      success:function(data) {
         if(data!=0){
          if(data==9){
            show_msg('Not Delete Season is using',2);
          }else{
           show_msg('Insert Season success',1,1500);
          }
           window.location.reload(true);
           get_season();
         }else{
            show_msg('Not Insert Room',2);
         }
              }
       });

/*

       $.post("<?php// echo base_url('SeasonPeriod/add_season')?>", 
      {hotel_id: hotel_id,form_data:form_data},
      function(result){
       if(result!=0){
         alert(result);
        show_msg('Insert Season success',1,1500);
        get_season();
      }else{
        show_msg('Not Insert Room',2);
      }
    },'json');
*/


  }



function get_season(){
var p1 = $('#val_hotel_id').val();
$.ajax({
                    url: "<?php echo base_url('SeasonPeriod/DoShow_season')?>",
                    type: "POST",
                    data: ({hotel_id:p1}),
                    dataType: "json",
              success:function(data) {
              $("#show_season").empty();
               var idnum = 0; var tr = "";
               
  $.each(data, function(key, value) {idnum++;
  var ar1 = [];
  var season_id = value.d3;
  var val_d1,val_txt1;
  var val_d2,val_txt2;
  var ard1 = value.d1.split(",");
  var ard2 = value.d2.split(",");
  if(ard1.length==2 && ard2.length==2){
    val_d1 = ard1[0];
    val_d2 = ard2[1];
        val_txt1 = val_d1.replace("-<font color=#cccccc>0000</font>","").split("-");
        val_txt2 = val_d2.replace("-<font color=#cccccc>0000</font>","").split("-");
  }else{
    val_d1 = ard1[0];
    val_d2 = ard2[0];
        val_txt1 = val_d1.replace("-<font color=#cccccc>0000</font>","").split("-");
        val_txt2 = val_d2.replace("-<font color=#cccccc>0000</font>","").split("-");
  }
  
  ar1.push(value.season_nm,value.season_nm,val_txt1[0],val_txt1[1],val_txt2[0],val_txt2[1]); 
  ar2.push(ar1);

  tr=tr+" <tr class='odd gradeX'>"+
              "<td style='text-align: center;'>"+idnum+"</td>"+
              "<td>"+value.season_nm+"</td>"+
              "<td>"+val_d1+"</td>"+
              "<td>"+val_d2+"</td>"+
              "<td align='center'> "+
              "<div id='addRow1' class='btn select_bt'  onclick=\"select_season('"+season_id+"')\">"+
               "  DELETE <i class='fa fa-wpforms'></i>"+
              "</div>"+
             "</td>"+
          "</tr>"
 });
$('#show_season:last').append(tr);
         }
    });
}

function select_season(idnum){
       var hotel_id = $('#val_hotel_id').val();
 if(confirm("You confirm delete this data !")){
 $.ajax({
                    url: "<?php echo base_url('SeasonPeriod/del_season')?>",
                    type: "POST",
                    data: ({hotel_id: hotel_id,all_sessid:idnum}),
                    dataType: "html",
      success:function(data) {
         if(data!=0){
           show_msg('Delete Season success',1,1500);
           window.location.reload(true);
           get_season();
         }else{
            show_msg('Not Delete Season is using',2);
         }
              }
       });
   }

  /*
  var  txt_cls="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-upgraded is-dirty";
        $('#name_season_edit').val(ar2[idnum][1]);
        $('#idup').val(ar2[idnum][0]);
        $('#name_season').val(ar2[idnum][1]);
        $('#name_season').closest("div").addClass(txt_cls);
        $('#day_str').val(ar2[idnum][2]);
        $('#day_str').closest("div").addClass(txt_cls);
        $('#m_str').val(ar2[idnum][3]);
        $('#m_str').closest("div").addClass(txt_cls);
        $('#day_end').val(ar2[idnum][4]);
        $('#day_end').closest("div").addClass(txt_cls);
        $('#m_end').val(ar2[idnum][5]);
        $('#m_end').closest("div").addClass(txt_cls);
        $('#command_typ').val("ADD");

        
         $('#old_sts').val(ar2[idnum][2]);
         $('#old_mos').val(ar2[idnum][3]);
         $('#old_ste').val(ar2[idnum][4]);
         $('#old_moe').val(ar2[idnum][5]);


         $('#p_st_day').val(ar2[idnum][2]);
         $('#p_st_mon').val(ar2[idnum][3]);
         $('#p_en_day').val(ar2[idnum][4]);
         $('#p_en_mon').val(ar2[idnum][5]);
        */
}


</script>
</div>





  