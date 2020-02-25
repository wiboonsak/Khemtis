<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap datepicket demo</title>


    
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/css/bootstrap-datepicker.min.css'>
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.min.js'></script>

<script type='text/javascript'>
$(function(){


  $('.input-daterange')
        .datepicker({
            orientation: "auto",
            todayHighlight: true,
            autoclose: true,
            format: "d M yyyy",
            startView: "days",
            minViewDate: 0,
            maxViewDate: 0,
            weekStart: 1
        });

        $('#ArrivalDate').each(function () {
            $(this).on('changeDate', function(e) {
            
                CheckIn = $(this).datepicker('getDate');
                CheckOut = moment(CheckIn).add(1, 'day').toDate();
                $('#DepartDate').datepicker('update', CheckOut).focus();                    
            });             
        });

});

</script>
</head>
<body>
<div class="container">
<h1>Bootstrap datepicker</h1>

<div class="input-daterange input-group" id="datepicker">
    <input id="ArrivalDate" type="text" class="input-sm form-control" name="start" value="12 Jan 2016" />
    <span class="input-group-addon">to</span>
    <input id="DepartDate" type="text" class="input-sm form-control" name="end" value="13 Jan 2016" />
</div>

</div>
</body>
</html>

