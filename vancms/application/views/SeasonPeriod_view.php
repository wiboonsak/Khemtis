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
    background-color: #628dab;color:#ffffff;
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
                            <label for="m_str" class="mdl-textfield__label">Start Mount</label>
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
                            <label for="m_end" class="mdl-textfield__label">End Mount</label>
                            <ul data-mdl-for="m_end" id="get_p_en_mon" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"  style="height:300px;overflow:auto; ">
                                <?php echo get_mont()?>
                            </ul>
                        </div>
                       </div>    
 <div class="col-lg-12 p-t-10 text-center"> 
                            <button type="button" onclick="add_season()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                    <button type="button" onclick="clsdata()" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>


</div>
            </div>
      </div>
</div>
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
                                                <th> Start Day </th>
                                                <th> Start Mounth</th>
                                                <th> End Day</th>
                                                <th> End Mounth </th>
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
<br><br>

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
       $.post("<?php echo base_url('SeasonPeriod/add_season')?>", 
      {hotel_id: hotel_id,form_data:form_data},
      function(result){
       if(result!=0){
        show_msg('Insert Season success',1,1500);
        get_season();
      }else{
        show_msg('Not Insert Room',2);
      }
    },'json');
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
  ar1.push(value.season_id,value.season_nm,value.start_day,value.start_month,value.end_day,value.end_month); 
  ar2.push(ar1);
  tr=tr+" <tr class='odd gradeX'>"+
              "<td style='text-align: center;'>"+idnum+"</td>"+
              "<td>"+value.season_nm+"</td>"+
              "<td>"+value.start_day+"</td>"+
              "<td>"+value.start_month+"</td>"+
              "<td>"+value.end_day+"</td>"+
              "<td>"+value.end_month+"</td>"+
              "<td align='center'> "+
              "<div id='addRow1' class='btn select_bt'  onclick='select_season("+(idnum-1)+")'>"+
               "  SELECT <i class='fa fa-wpforms'></i>"+
              "</div>"+
             "</td>"+
          "</tr>"
 });
$('#show_season:last').append(tr);
         }
    });
}

function select_season(idnum,idup){
  var  txt_cls="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-upgraded is-dirty";
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
         $('#command_typ').val("UP");


         $('#p_st_day').val(ar2[idnum][2]);
         $('#p_st_mon').val(ar2[idnum][3]);
         $('#p_en_day').val(ar2[idnum][4]);
         $('#p_en_mon').val(ar2[idnum][5]);
        
}

</script>
</div>





  