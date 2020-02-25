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
  .ble{
    padding: 2px;
     width:140px;
     background-color: #337ab7;
     border-radius:10px;
     color:#ffffff;
     text-align: center;
  }
  .grn{
    padding: 2px;
     width:140px;
     background-color: #5cb85c;
     border-radius:10px;
     text-align: center;
     color:#ffffff;
  }
  .gry{
    padding: 2px;
     width:140px;
     background-color: #bbbbbb;
     border-radius:10px;
     text-align: center;
     color:#ffffff;
  }

.panel.with-nav-tabs .panel-heading{
    padding: 5px 5px 0 5px;
}
.panel.with-nav-tabs .nav-tabs{
  border-bottom: none;
}
.panel.with-nav-tabs .nav-justified{
  margin-bottom: -1px;
}
/********************************************************************/
/*** PANEL DEFAULT ***/
.with-nav-tabs.panel-default .nav-tabs > li > a,
.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
    color: #777;
}
.with-nav-tabs.panel-default .nav-tabs > .open > a,
.with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-default .nav-tabs > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li > a:focus {
    color: #777;
  background-color: #ddd;
  border-color: transparent;
}
.with-nav-tabs.panel-default .nav-tabs > li.active > a,
.with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
  color: #555;
  background-color: #fff;
  border-color: #ddd;
  border-bottom-color: transparent;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #f5f5f5;
    border-color: #ddd;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #777;   
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #ddd;
}
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #555;
}
/********************************************************************/
/*** PANEL PRIMARY ***/
.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
  color: #fff;
  background-color: #3071a9;
  border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
  color: #428bca;
  background-color: #fff;
  border-color: #428bca;
  border-bottom-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #fff;   
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    background-color: #4a9fe9;
}
/********************************************************************/
/*** PANEL SUCCESS ***/
.with-nav-tabs.panel-success .nav-tabs > li > a,
.with-nav-tabs.panel-success .nav-tabs > li > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li > a:focus {
  color: #3c763d;
}
.with-nav-tabs.panel-success .nav-tabs > .open > a,
.with-nav-tabs.panel-success .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-success .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-success .nav-tabs > li > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li > a:focus {
  color: #3c763d;
  background-color: #d6e9c6;
  border-color: transparent;
}
.with-nav-tabs.panel-success .nav-tabs > li.active > a,
.with-nav-tabs.panel-success .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li.active > a:focus {
  color: #3c763d;
  background-color: #fff;
  border-color: #d6e9c6;
  border-bottom-color: transparent;
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #3c763d;   
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #d6e9c6;
}
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #3c763d;
}
/********************************************************************/
/*** PANEL INFO ***/
.with-nav-tabs.panel-info .nav-tabs > li > a,
.with-nav-tabs.panel-info .nav-tabs > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li > a:focus {
  color: #31708f;
}
.with-nav-tabs.panel-info .nav-tabs > .open > a,
.with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-info .nav-tabs > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li > a:focus {
  color: #31708f;
  background-color: #bce8f1;
  border-color: transparent;
}
.with-nav-tabs.panel-info .nav-tabs > li.active > a,
.with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
  color: #31708f;
  background-color: #fff;
  border-color: #bce8f1;
  border-bottom-color: transparent;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #31708f;   
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #31708f;
}
/********************************************************************/
/*** PANEL WARNING ***/
.with-nav-tabs.panel-warning .nav-tabs > li > a,
.with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
  color: #8a6d3b;
}
.with-nav-tabs.panel-warning .nav-tabs > .open > a,
.with-nav-tabs.panel-warning .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
  color: #8a6d3b;
  background-color: #faebcc;
  border-color: transparent;
}
.with-nav-tabs.panel-warning .nav-tabs > li.active > a,
.with-nav-tabs.panel-warning .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li.active > a:focus {
  color: #8a6d3b;
  background-color: #fff;
  border-color: #faebcc;
  border-bottom-color: transparent;
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #fcf8e3;
    border-color: #faebcc;
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #8a6d3b; 
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #faebcc;
}
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #8a6d3b;
}
/********************************************************************/
/*** PANEL DANGER ***/
.with-nav-tabs.panel-danger .nav-tabs > li > a,
.with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
  color: #a94442;
}
.with-nav-tabs.panel-danger .nav-tabs > .open > a,
.with-nav-tabs.panel-danger .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
  color: #a94442;
  background-color: #ebccd1;
  border-color: transparent;
}
.with-nav-tabs.panel-danger .nav-tabs > li.active > a,
.with-nav-tabs.panel-danger .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li.active > a:focus {
  color: #a94442;
  background-color: #fff;
  border-color: #ebccd1;
  border-bottom-color: transparent;
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #f2dede; /* bg color */
    border-color: #ebccd1; /* border color */
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #a94442; /* normal text color */  
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #ebccd1; /* hover bg color */
}
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff; /* active text color */
    background-color: #a94442; /* active bg color */
}
</style>
<!----------------------------->
<?php 
$chk_hotel_id = 1;
if($chk_hotel_id!=""){?>
<div style="margin-top:8vw;">   
<input type="hidden" id="val_hotel_id" value="<?php echo$chk_hotel_id?>">
<div style="height:45px;width:100%;background-color:#f2f2f2;margin-left:20px">
  <table>
   <tr>
    <td><div class="gry" style="cursor:pointer;" onclick="show_hotel_book('all','<?php echo$tokengenered?>')">All Booking</div></td>
    <td><div class="ble" style="cursor:pointer;" onclick="show_hotel_book('0','<?php echo$tokengenered?>')">Pending</div></td>
    <td><div class="grn" style="cursor:pointer;" onclick="show_hotel_book('P','<?php echo$tokengenered?>')">Paid</div></td>
   </tr>
  </table>
 </div>
<div class="row">
                      <div class="col-md-12">
                          <div class="card card-topline-gray">
                              <div class="card-body ">
                                  <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                                     <thead>
                                            <tr style="background-color:#628dab;color:#ffffff;text-align: center;">
                                                <th style="text-align: center;">Number</th>
                                                <th>Booking Date</th>
                                                <th>Customer Name </th>
                                                <th>Phone </th>
                                                <th>Email</th>
                                                <th>Booking Status </th>
                                                <th>Booking Price</th>
                                                <th>commission Price</th>
                                                <th>Total Price</th>
                                                <th style="text-align: center;"> voucher </th>                                         
                                            </tr>
                                        </thead>
                                        <tbody>
<?php $i=0;$comm =0;
$sum1=0;
$sum2=0;
$sum3=0;
     $txt = "";
     $total_comm_sum = 0;
     $price_net = 0;
if(isset($get_booking)){
  foreach($get_booking as $value_list){
  $i++;
  $book_price = $value_list->book_price;
  $total_comm_sum = $value_list->comm_price;
  $str = $value_list->booking_status;
  $booking_number = $value_list->id;
  $pre_booking_id = $value_list->id_gp_booking;
  if($str=="0"){$txt="<div class='ble'>Pending</div>";}
  else if($str=="P"){$txt="<div class='grn'>Paid</div>";}
  else if($str=="P"){$txt="<div class='grn'>Paid</div>";}

  $sumtotal = $value_list->book_price;
  $comis = $total_comm_sum;
    $sum1 = ($sum1 + $sumtotal);
    $sum2 = ($sum2 + $comis);
    $sum3 = ($sum3 + ($sumtotal-$comis));

?>

                                            <tr class="odd gradeX">
                                                <td style="text-align: center;"><?php echo $i;?></td>
                                                <td style="text-align: center;"><?php echo $value_list->add_date?></td>
                                                <td><?php echo $value_list->cust_name?>&nbsp;&nbsp;<?php echo $value_list->cust_lastname?></td>
                                                <td><?php echo $value_list->cust_telephone_num?></td>
                                                <td><?php echo $value_list->cust_email?></td>
                                               
                                                <td style="text-align: center;"><center><?php echo$txt?></center></td>
                                                <td style="text-align: right;"><?php echo number_format($book_price,2)?></td>
                                                <td style="text-align: right;">
                                                	<?php echo number_format($comis,2)?>
                                                </td>
                                                <td style="text-align: right;">
                                                	<font style=" border-bottom: 1px solid;"><?php echo number_format($value_list->book_price-$comis,2)?></font>
                                                </td>
                                                <td align="center"> 
                                                <button id="addRow1" class="btn select_bt"  onclick="myPopup('<?php echo base_url("Voucher?trans_id=".$pre_booking_id)?>', 'web', 1050, 800)">
                                                    SELECT <i class="fa fa-wpforms"></i>
                                                </button>
                                                </td>
 <!--
                                                <td align="center"> 
                                                <button id="addRow1" class="btn select_bt" onclick="set_data_manage(<?php // echo$booking_number?>)"   >
                                                    SELECT <i class="fa fa-wpforms"></i>
                                                </button>
                                                </td>
-->
                                            </tr>
<?php  }}?>
<tr><td colspan="6" style="text-align: right;"></td><td  style="text-align: right;"><font style=" border-bottom: 3px double;"><?php echo number_format($sum1,2)?></td><td  style="text-align: right;"><font style=" border-bottom: 3px double;"><?php echo number_format($sum2,2)?></td><td  style="text-align: right;"><font style=" border-bottom: 3px double;"><?php echo number_format($sum3,2)?></td><td  style="text-align: center;">THB</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
 <?php }else{?>
<br><br>
   <div style="font-size: 35px;margin-top:8vw;"><center>Transport Information not available
    <br><br>
   <br> 
<br><br>
<?php }?>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
  <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">CANCEL ORDER</a></li>
                            <li><a href="#tab2default" data-toggle="tab">REFUND ORDER</a></li>                       
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                          
                          <label><input type="checkbox">&nbsp;&nbsp;Confirm Cancel This Book id !</label><br>
 <button type="button" class="btn btn-danger" onclick="booking_number()">CANCEL</button>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
<div class="form-group">
    <label for="exampleFormControlInput1">Money Refund:</label>
    <input type="text" class="form-control" id="m_refund" placeholder="00.00">
  </div>
 <button type="button" class="btn btn-primary">REFUND</button>
                        </div>
             
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
      </div>
    </div>
  </div>
</div>


<input type="hidden" value="" id="h_book_id">
<!--Scipt-->
<script type="text/javascript" src="//code.jquery.com/jquery-1.4.2.js"></script>
<script type="text/javascript">

function show_hotel_book(ty,token){
   window.location.href ="<?php echo base_url('Bookdata')?>?token="+token+"&filter="+ty;
}


function set_data_manage(idb){
  $('#exampleModalLongTitle').html("Book id : <b>"+idb+"</b>");
  $('#exampleModalLong').modal('show');
  $('#h_book_id').val(idb);
}



         function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
         }
     

function re_deley(link,relay){
   setTimeout(function () {
       window.location.href = link; 
    }, relay); 
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


function   booking_number(){
   var h_book_id = $("#h_book_id").val();
       $.post("<?php echo base_url('Bookdata/data_set_stat_cd')?>", 
      {booking_number: h_book_id},
       function(result){
       if(result!=0){
        show_msg('Update  success',1,1500);
        window.location.reload();
      }else{
        show_msg('Not Update ',2);
      }
    },'json');

}

function add_RoomManage(tokengenered){
   var hotel_id = $("#val_hotel_id").val();
       $.post("<?php echo base_url('RoomManageList/add_new_room')?>", 
      {hotel_id: hotel_id},
       function(result){
       if(result!=0){
        show_msg('Insert Room success',1,1500);
        re_deley("RoomManage?autorunid="+result+"&hotelid="+hotel_id+"&typ=New&token_id="+tokengenered,1500);
      }else{
        show_msg('Not Insert Room',2);
      }
    },'json');
  }


</script>
</div>





  