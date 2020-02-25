<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PackageDetail extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	   public function __construct(){
        parent::__construct();
                  $this->load->model("Cl_bord_model");
                  $this->load->model("Package_model");
       if($this->session->userdata('client_user_id')==''){ 
       	  $this->session->userdata('client_user_id');
         redirect(base_url('Package_login'), 'refresh');
        }  
       } 

public function index(){
	    // Gen Varible Arrary Send View 
          $idclient =  $this->session->userdata('client_user_id');
		  $data["results_service"]  = $this->Package_model->get_service($idclient);
		  $data["results_lang"]  = $this->Package_model->get_lang();
		  $data["results_province"]  = $this->Package_model->get_results_province();
		  $data["results_country"]  = $this->Package_model->get_results_country();
		  $client_id_ses = $this->session->userdata('client_user_id');
          $autorunid = $this->input->get("autorunid");
          if($autorunid==""){$autorunid=0;}
		  $data["get_update_Package"] = $this->Package_model->get_update_Package($autorunid);
		  $chk_Package_id = $this->Package_model->chk_Package_id($idclient);
		  $data["chk_Package_id"] = $chk_Package_id;
		  $data["tokengenered"] =$this->session->userdata('token_sesion');

		$this->load->view('Header',$data);// Load Heder And Script Top Page
	    $this->load->view('Package_view',$data);
	    $this->load->view('Footer');// Load Footer And Script Buttom Page
	    $this->load->view('Text_script');
	    $this->load->view('End_page'); // End Page Not Delete
	}
    // Insert data To Database 

 function Do_insert_And_Update_Package(){
 	
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $client_id_ses = $this->session->userdata('client_user_id');
        $get_formdata = array();
		parse_str($formdata, $get_formdata);

        $this->Package_model->Add_update_data($get_formdata,$send_commnd,$client_id_ses);
        
       
	}

function Pdf_upload($userfile){
$idc = $this->session->userdata('client_user_id');
  if (!file_exists("tmppack/client".$idc."/pdffile")) {
         mkdir("tmppack/client".$idc."/pdffile");
         chmod("tmppack/client".$idc."/pdffile", 0777);
     }
$config['upload_path'] = "tmppack/client".$idc."/pdffile";
$config['allowed_types'] = 'pdf';
$config['file_name'] = $userfile;
$this->load->library('upload', $config);

}


    function Do_add_Package_id(){
        $client_id_ses = $this->session->userdata('client_user_id');
        $Result = $this->Package_model->add_Package_id($client_id_ses);
		echo $Result;
    }

   public function Do_inser_image(){
	     $idclient =  $this->session->userdata('client_user_id');
         $formdata = $this->input->post('formdata');
         $send_commnd = $this->input->post('send_commnd');
         $get_formdata = array();
		 parse_str($formdata, $get_formdata);
         $storedVal = $this->input->post('storedVal');
		 $package_id = $this->input->post('package_id');
		 /*
		    if($send_commnd=="ADD"){
		    	$Package_id = $this->Package_model->Add_new_data($get_formdata,$send_commnd,$idclient);
		    }
		 */
                $Data_re = $this->Package_model->Image_upload($storedVal,$package_id,$idclient);
                echo $Data_re;
	}



	function Do_update_icon(){
        $idclient =  $this->session->userdata('client_user_id');
        $formdata = $this->input->post('formdata');
        $send_commnd = $this->input->post('send_commnd');
        $get_formdata = array();
		parse_str($formdata, $get_formdata);
        $id_icon = $this->input->post('id_icon');
        $Package_feature = $this->input->post('Package_feature');
		$Package_id = $this->input->post('Package_id');
		    if($send_commnd=="ADD"){
		    	$Package_id = $this->Package_model->Add_new_data($get_formdata,$send_commnd,$idclient);
		    }
                $Result = $this->Package_model->update_icon($Package_id,$id_icon,"N");
		        echo $Result;
	}


	function Do_set_true_icon(){
      $Package_id = $this->input->post('Package_id');
      $id_valu = $this->input->post('id_valu');
      $ch_true = $this->input->post('ch_true');
               $Result = $this->Package_model->set_true_icon($Package_id,$id_valu,$ch_true);
		       echo $Result;
	}

	function DoShow_Package(){
		 $Package_id =$this->input->post('Package_id');
		 $this->Package_model->get_Package_data($Package_id);
	}

    function DoShow_icon(){
    	$Package_id =$this->input->post('Package_id');
		$this->Package_model->get_Package_icon("Package_FEATURE",$Package_id);
    }

	function Do_delete_image(){
		 $idrun =$this->input->post('idrun');
         $Package_id =$this->input->post('Package_id');
		 $re_st = $this->Package_model->del_Package_data($idrun,$Package_id);
		 echo $re_st;
	}

     function Do_main_img(){
   	   	 $idrun =$this->input->post('idrun');
         $Package_id =$this->input->post('Package_id');
		 $re_st = $this->Package_model->main_Package_data($idrun,$Package_id);
		 echo $re_st;
     }

function upload_file() {
        //upload file
   $id = "";
   $idc = $this->session->userdata('client_user_id');
   if (!file_exists("tmppack/client".$idc."/pdffile")) {
                   mkdir("tmppack/client".$idc."/pdffile");
                   chmod("tmppack/client".$idc."/pdffile", 0777);
    }

      $recrow = $this->Package_model->get_lang();
     foreach ($recrow as  $value) {
         $lg = $value->fld_valu;
         $id = $_POST["id".$lg];

        $config['upload_path'] = 'tmppack/client'.$idc.'/pdffile/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1240'; //1 MB

        if (isset($_FILES['file'.$lg]['name'])) {
            if (0 < $_FILES['file'.$lg]['error']) {
                echo 'Error during file upload' . $_FILES['file'.$lg]['error'];
            } else {
                if (file_exists('tmppack/client'.$idc.'/pdffile/' . $_FILES['file'.$lg]['name'])) {
                    echo 'File already exists : uploads ' . $_FILES['file'.$lg]['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file'.$lg)) {
                        echo $this->upload->display_errors();
                    } else {
                      
                        $chdata = $this->Package_model->update_pdf($id,'tmppack/client'.$idc.'/pdffile/'.$_FILES['file'.$lg]['name']);
                        if($chdata==1){
                           echo "File successfully uploaded ";
                         } 


                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
        
   }
        

     
    }
    


}
