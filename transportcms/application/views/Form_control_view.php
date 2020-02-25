<?PHP $pturl = base_url(); ?>
<!DOCTYPE html>
<!-- Add script CSS New  -->
<!-- Bootstrap styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo $pturl?>assets/plugins/file_upload/css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo $pturl?>assets/plugins/file_upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo $pturl?>assets/plugins/file_upload/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!--          End Script             -->

<style type="text/css">
    

.del_file{
  text-align: center;
  color:#ffffff;
  width: 120px;
  border-style: solid;
  border-radius: 3px;
  border-width: 1px;
  background: #b61f1f;


}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;

}

.btn {
    cursor: pointer;
  border: 1px solid gray;
  color: gray;
  background-color: white;
  padding: 10px 10px;
  border-radius: 5px;
  font-size: 15px;



}

.upload-btn-wrapper input[type=file] {
  font-size: 50px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>




<div  style="margin-top:6vw;">
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                               
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Room Details</li>
                            </ol>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="card-head">
                                    <header>Add Room Details</header>
                                    <button id = "panel-button" 
                                       class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                                       data-upgraded = ",MaterialButton">
                                       <i class = "material-icons">more_vert</i>
                                    </button>
                                    <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                       data-mdl-for = "panel-button">
                                       <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                                       <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                                       <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                                    </ul>
                                </div>
                                <div class="card-body row">
                                    <div class="col-lg-6 p-t-20"> 
                                      <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                         <input class = "mdl-textfield__input" type = "text" id = "txtRoomNo">
                                         <label class = "mdl-textfield__label">Room Number</label>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20"> 
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="list3" value="" readonly tabIndex="-1">
                                            <label for="list3" class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="list3" class="mdl-textfield__label">Room Type</label>
                                            <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="1">Single</li>
                                                <li class="mdl-menu__item" data-val="2">Double</li>
                                                <li class="mdl-menu__item" data-val="3">Quad</li>
                                                <li class="mdl-menu__item" data-val="4">King</li>
                                                <li class="mdl-menu__item" data-val="5">Suite</li>
                                                <li class="mdl-menu__item" data-val="6">Apartments</li>
                                                <li class="mdl-menu__item" data-val="7">Villa</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20"> 
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="sample2" value="" readonly tabIndex="-1">
                                            <label for="sample2" class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="sample2" class="mdl-textfield__label">AC/Non AC</label>
                                            <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="DE">AC</li>
                                                <li class="mdl-menu__item" data-val="BY">Non AC</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20"> 
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="sample3" value="" readonly tabIndex="-1">
                                            <label for="sample3" class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="sample2" class="mdl-textfield__label">Meal</label>
                                            <ul data-mdl-for="sample3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="1">Free Breakfast</li>
                                                <li class="mdl-menu__item" data-val="2">Free Dinner</li>
                                                <li class="mdl-menu__item" data-val="3">Free Breakfast &amp; Dinner</li>
                                                <li class="mdl-menu__item" data-val="4">Free Welcome Drink</li>
                                                <li class="mdl-menu__item" data-val="5">No Free Food</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20"> 
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="sample4" value="" readonly tabIndex="-1">
                                            <label class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label class="mdl-textfield__label">Cancellation Charges</label>
                                            <ul data-mdl-for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="1">Free Cancellation</li>
                                                <li class="mdl-menu__item" data-val="2">10% Before 24 Hours</li>
                                                <li class="mdl-menu__item" data-val="1">No Cancellation Allow</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20"> 
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                            <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">
                                            <label for="list2" class="pull-right margin-0">
                                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                            </label>
                                            <label for="list2" class="mdl-textfield__label">Bad Capacity</label>
                                            <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                <li class="mdl-menu__item" data-val="1">1</li>
                                                <li class="mdl-menu__item" data-val="2">2</li>
                                                <li class="mdl-menu__item" data-val="3">3</li>
                                                <li class="mdl-menu__item" data-val="4">4</li>
                                                <li class="mdl-menu__item" data-val="5">5</li>
                                                <li class="mdl-menu__item" data-val="6">6</li>
                                                <li class="mdl-menu__item" data-val="7">7</li>
                                                <li class="mdl-menu__item" data-val="8">8</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                       <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                         <input class = "mdl-textfield__input" type = "text" 
                                            pattern = "-?[0-9]*(\.[0-9]+)?" id = "text8">
                                         <label class = "mdl-textfield__label" for = "text8">Telephone Number</label>
                                         <span class = "mdl-textfield__error">Number required!</span>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 p-t-20">
                                       <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                         <input class = "mdl-textfield__input" type = "text" 
                                            pattern = "-?[0-9]*(\.[0-9]+)?" id = "text7">
                                         <label class = "mdl-textfield__label" for = "text7">Rent Per Night</label>
                                         <span class = "mdl-textfield__error">Number required!</span>
                                      </div>
                                    </div>
                                    <div class="col-md-12 ">

<!-- id="wrapper" --->









<div class="upload-btn-wrapper">
  <button class="btn">Upload  file</button>
  <input type="file" name="myfile" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple />
</div>






 <div class="row" id="image_preview"></div>

                                       </div>
                                       <div class="col-lg-12 p-t-20"> 
                                      <div class = "mdl-textfield mdl-js-textfield txt-full-width">
                                         <textarea class = "mdl-textfield__input" rows =  "4" 
                                            id = "education" ></textarea>
                                         <label class = "mdl-textfield__label" for = "text7">Room Details</label>
                                      </div>
                                     </div>
                                     <div class="col-lg-12 p-t-20 text-center"> 
                                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- end page content -->
<script type="text/javascript">
var fileIdCounter = 0;
var upload_file1= Array();
$(document).ready(function() 
{ 
 $('form').ajaxForm(function() 
 {
   alert("Uploaded SuccessFully");
 }); 
});
function preview_image() 
{
  var total_file=document.getElementById("upload_file");
  var files_up = total_file.files;
  for(var i=0;i<files_up.length;i++)
 {
    fileIdCounter++;
    // file = total_file.item(i);
    file = files_up[i];
    var tmppath = URL.createObjectURL(file);
    // $("img").fadeIn("fast").attr('src',tmppath);
    // alert(tmppath); 
    upload_file1.push("drw1"+fileIdCounter);

  $('#image_preview').append("<div id='drw1"+fileIdCounter+"' style='padding:3px;border:solid;border-radius:4px;border-width:1px;margin-left: 4px;margin-top:5px;border-color:#cccccc;cursor:pointer'>"+
      "<table><tr><td><img src='"+tmppath+
      "'height=100px ></td><tr><td style='text-align:center;padding:10px; '>"+
      " <button class='btn btn-danger btn-xs' onclick='remove_lis("+fileIdCounter+","+upload_file1+")'><i class='fa fa-trash-o'></i></button></td></tr></table></div>");
  }
  alert(upload_file1);
}


function remove_lis(idl,upload_file1){

$("#drw1"+idl).removeAttr("style").hide();
upload_file1.splice(idl,1);
  // alert(idl);

}



</script>



<img src="">



</div>



