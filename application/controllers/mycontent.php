<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class mycontent extends CI_Controller {
	   public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Page_model");
      } 

	function index()
	{

		
	}
  
   function data_get_contents(){
  			   ?>
 ddddddddddddddddddddddddddddddddddddddd


               <?php
  }
}
