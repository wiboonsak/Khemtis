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


.button {
  border-radius: 4px;
  background-color: #e4e4e4;
  border: none;
  color: #FFFFFF;
  text-align: left;
  font-size: 28px;
  padding: 0px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button a {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  color:#cccccc;
}

.button a:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 3px;
  right: -20px;
  transition: 0.4s;
  color: #0c648e!important;
  font-size: 23px!important;
  border-right-style: none!important;
}

.button:hover a {
  color: #0c648e!important;
  padding-right: 25px;
}

.button:hover a:after {
  opacity: 1;
  right: 0;
}
</style>
<!----------------------------->
<?php if($chk_hotel_id!=""){
         $tab_firse = 0;
  ?>
<div style="margin-top:8vw;">     

<input type="hidden" id="val_hotel_id" name="val_hotel_id" value="<?php echo$chk_hotel_id?>">
<input type="hidden" id="val_room_id" name="val_room_id" value="<?php echo$get_val_room_id?>">
 <div class="row" style="padding:15px;">
            <div class="col-sm-12">
              <div class="card-box">
<div class="card-body row">
<div class="col-lg-12 p-t-10" style="border:0px;border-width:1px;border-style: solid;border-color:#ffffff;padding-bottom:5px;border-radius:5px;background-color:#222c3c;"> 
<font style="font-size: 18px;font-weight: bold;color:#ffffff;">Title: &nbsp;<font color='#d9efff'><?php echo$get_name_room?></font>&nbsp;</font><font style="font-size: 18px;color:#ffffff;"></font>
</div>
 <div class="row" style="margin-top: 20px;width:100%">
                        <div class="col-md-12 col-sm-12" style="width:100%;">
                            <div class="card card-box">
                                <div class="card-body " id="bar-parent" style="width:100%;">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <ul class="nav nav-tabs tabs-left" style="border-style: none!important;">
                                      <?php $i=0;
                                          foreach($get_season_data as $Val_season){$i++;$act="";$bgcolor="#000000";
                                            $season_id = $Val_season->season_id;
                                            $season_nm = $Val_season->season_nm;
                                            $ch_f = $Val_season->ch_f;
                                             if($i==1){$act="active";$tab_firse=$season_id;}
                                             if($ch_f>0){$bgcolor="#00a943";}
                                      ?>
                                                <li class="nav-item button">
                                                    <a href="#tab_<?php echo$i?>" onclick="get_room_season(<?php echo$season_id?>,<?php echo$get_val_room_id?>,<?php echo$i?>)" data-toggle="tab" class="<?php echo$act?>" style="color:<?php echo$bgcolor?>"> <?php echo$season_nm?> </a>
                                                </li>
                                      <?php }?>
                                            </ul>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                        <div class="tab-content">
                                      <?php $i=0;
                                          foreach($get_season_data as $Val_season){$i++;$act="";
                                            $season_id = $Val_season->season_id;
                                            $season_nm = $Val_season->season_nm;
                                            $start_day = $Val_season->start_day;
                                            $start_month = $Val_season->start_month;
                                            $end_day = $Val_season->end_day;
                                            $end_month = $Val_season->end_month;
                                            if($i==1){$act="active";}
                                      ?>
                                                <div class="tab-pane <?php echo$act?>" id="tab_<?php echo$i?>">

             <form id="form_<?php echo$i?>">                                       
              <div class="row" style="width:auto;";>
                <div class="col-md-12" style="background-color:#222c3c;font-size:18px;padding: 6px;border-radius: 3px;color:#ffffff;">
                  <center><b><?php echo$season_nm;?></b></center></div>
                 <div class="col-md-2">
                  <center>
                   <table style="text-align:center;"  class="table table-bordered">
                      <tr style="background-color:#dee5ea;color:#165877"><td>Start Day</td><td>Start Mont</td></tr>
                      <tr><td><?php echo$start_day?></td><td><?php echo$start_month?></td></tr>
                   </table>
                 </center>
                 </div>
                 <div class="col-md-2">
                  <center>
                   <table style="text-align:center"  class="table table-bordered">
                      <tr style="background-color:#dee5ea;color:#165877"><td>End Day</td><td>End Mont</td></tr>
                      <tr><td><?php echo$end_day?></td><td><?php echo$end_month?></td></tr>
                   </table>
                 </center>
                 </div>

<!---------- Rooom Price ---------------------------------------------------------->

   <div class="col-md-12 col-sm-12" style="padding:0px!important">
      <div class="panel tab-border ">
    <header class="panel-heading panel-heading-gray custom-tab ">
    <ul class="nav nav-tabs">        
      <?php $b=0;
        foreach($get_crcy_code as $cry_val){$b++;
          $actab="";$txt_color="color:#000000;";

          $name_tab = $cry_val->fld_valu;
          $name_dis = $cry_val->fld_valu_desc;
        if($name_tab=="USD"){$txt_color="color:#00b2c5;";}
        if($b==1){$actab = "class='active'";}
      ?>
     <li class="nav-item"><a href="#<?php echo$name_tab.$i?>" style="<?php echo $txt_color?>" data-toggle="tab" <?php echo$actab?>><?php echo$name_dis?> (<?php echo $name_tab?>)</a></li>
      <?php } ?>
    </ul>
    </header>
<div class="panel-body">
<div class="tab-content">
 <?php $j=0;
     foreach($get_crcy_code as $cry_val_text){$j++;
         $actab="";
         $name_tab = $cry_val_text->fld_valu;
         $lglow = strtolower($name_tab);
         if($j==1){$actab = "active";}  
           
 ?>

  <div class="tab-pane <?php echo $actab?>" id="<?php echo$name_tab.$i?>">                                     
    <!-- start page content -->

          <div class="row">
            <div class="col-sm-12">
              <div class="">
                <div class="card-body row">

                        <div class="col-lg-6 p-t-10"> 
                          <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="" type = "text" id = "default_price<?php echo$i?>_<?php echo$lglow?>" name="default_price_<?php echo$lglow?>">
                               <label class = "mdl-textfield__label">Price</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                               <input class = "mdl-textfield__input" value="" type = "text" id = "dscnt_price<?php echo$i?>_<?php echo$lglow?>" name="dscnt_price_<?php echo$lglow?>">
                               <label class = "mdl-textfield__label">discount price </label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-10"> 
                         <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                            <input class = "mdl-textfield__input" value="" type = "text" id = "extra_bed_price<?php echo$i?>_<?php echo$lglow?>" name="extra_bed_price_<?php echo$lglow?>">
                            <label class = "mdl-textfield__label">Extra bed price </label>
                            </div>
                        </div>


                        <div class="col-lg-12 p-t-10 text-center"> 
                            <button type="button" onclick="submit_data('form_<?php echo$i?>',<?php echo$season_id?>)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                            <button type="button" onclick="clsdata(<?php echo$i?>,'<?php echo$lglow?>')" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>

            
</div></div></div></div>
</div>

<?php }?>
</div></div></div></div>
  
</div>

   </form>
                                  </div>
                                       <?php }?>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>



</div>
            </div>
      </div>
</div>


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

get_room_season(<?php echo$tab_firse?>,<?php echo$get_val_room_id?>,1);

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

function get_room_season(season_id,room_id,i){
$.ajax({
                    url: "<?php echo base_url('RoomSeason/DoShow_room_season')?>",
                    type: "POST",
                    data: ({season_id:season_id,room_id:room_id}),
                    dataType: "json",
              success:function(data) {
               $.each(data, function(key, value) {
                     var crcy = value.crcy_code.toLowerCase();
                     var txt_cls="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width is-upgraded is-dirty";
          
                     $('#default_price'+i+'_'+crcy).val(value.price);
                     $('#dscnt_price'+i+'_'+crcy).val(value.dscnt_price);
                     $('#extra_bed_price'+i+'_'+crcy).val(value.extra_bed_price);

   $('#default_price'+i+'_'+crcy).closest("div").addClass(txt_cls);
   $('#dscnt_price'+i+'_'+crcy).closest("div").addClass(txt_cls);
   $('#extra_bed_price'+i+'_'+crcy).closest("div").addClass(txt_cls);

               });

         }
    });
}

function clsdata(i,crcy){
  var  txt_cls="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width is-upgraded";


   $('#default_price'+i+'_'+crcy).val("");
   $('#default_price'+i+'_'+crcy).closest("div").removeClass();
   $('#default_price'+i+'_'+crcy).closest("div").addClass(txt_cls);

   $('#dscnt_price'+i+'_'+crcy).val("");
   $('#dscnt_price'+i+'_'+crcy).closest("div").removeClass();
   $('#dscnt_price'+i+'_'+crcy).closest("div").addClass(txt_cls);

   $('#extra_bed_price'+i+'_'+crcy).val("");
   $('#extra_bed_price'+i+'_'+crcy).closest("div").removeClass();
   $('#extra_bed_price'+i+'_'+crcy).closest("div").addClass(txt_cls);

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


function submit_data(elm,season_id){
   var room_id = $('#val_room_id').val();
   var form_data = $('#'+elm).serialize();
   var season_id = season_id;
    $.post("<?php echo base_url('RoomSeason/Doadd_room_season')?>", 
      {form_data:form_data,room_id:room_id,season_id:season_id},
      function(result){
       if(result!=0){
        show_msg('Insert Room Season success',1,1500);
        get_season();
      }else{
        show_msg('Not Insert Season Room',2);
      }
    },'json');

}


function add_season(){
   var form_data = $('#form_season').serialize();
   var hotel_id = $("#val_hotel_id").val();
       $.post("<?php echo base_url('SeasonPeriod/add_season')?>", 
      {hotel_id: hotel_id,form_data:form_data},
      function(result){
       if(result!=0){
        show_msg('Insert Season success',1,1500);
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





  