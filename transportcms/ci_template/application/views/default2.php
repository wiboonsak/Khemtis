<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample codeigniter template</title>
<?php echo css_asset('default.css'); ?>
</head>
<body>
<div id="con">
<?php echo $this->load->view('template/header'); ?>
<div>
	<div style="float:left; width:200px; margin-top:20px;"><?php echo $this->load->view('template/menu',array('id'=>'2')); ?></div>
    <div style="float:left; width:780px; margin:0 0 30px 0">
        <div id="my_content">
<?php
        if(isset($content_text))echo $content_text;
        if(isset($content_view)){
            if(isset($content_data)){
                foreach($content_data as $key=>$value){$data[$key]=$value;}
                $this->load->view($content_view,$data);	
            }else{
                $this->load->view($content_view);
            }
        }
        ?>
        </div>
    </div>
</div>
<?php echo $this->load->view('template/other_link'); ?>
</div>
<?php echo $this->load->view('template/footer'); ?>
</body>
</html>
