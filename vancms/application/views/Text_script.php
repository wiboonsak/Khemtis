<?PHP $pturl = base_url(); ?>


    <!-- Material -->
    <script src="<?php echo$pturl?>assets/plugins/material/material.min.js"></script>
    <script src="<?php echo$pturl?>assets/js/pages/material_select/getmdl-select.js" ></script>
    <script  src="<?php echo$pturl?>assets/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
    <script  src="<?php echo$pturl?>assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
    <script  src="<?php echo$pturl?>assets/plugins/material-datetimepicker/datetimepicker.js"></script>

    <!---date_tiem--->

    <script src="<?php echo$pturl?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" ></script>
    <script src="<?php echo$pturl?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js" ></script>
    <script src="<?php echo$pturl?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" ></script>
    <script src="<?php echo$pturl?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js" ></script>

    <!-- dropzone -->
    <script src="<?php echo$pturl?>assets/plugins/dropzone/dropzone.js" ></script>
    <script src="<?php echo$pturl?>assets/plugins/dropzone/dropzone-call.js" ></script>

    <!-- notifications -->
    <script src="<?=$pturl?>assets/plugins/jquery-toast/dist/jquery.toast.min.js" ></script>
    <script src="<?=$pturl?>assets/plugins/jquery-toast/dist/toast.js" ></script>
       <!-- Sweet Alert -->
    <script src="<?php echo $pturl?>assets/plugins/sweet-alert/sweetalert.min.js" ></script>
    <script src="<?php echo $pturl?>assets/js/pages/sweet-alert/sweet-alert-data.js" ></script>



  <?php if(isset($data_table) AND $data_table==true){ ?>
        <!-- data tables -->
    <script src="<?php echo $pturl?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $pturl?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
    <script src="<?php echo $pturl?>assets/js/pages/table/table_data.js" ></script>
  <?php }?>