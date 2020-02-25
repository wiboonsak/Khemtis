<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	//$this->load->model('cl_bord_model');
  public function __construct(){
       parent::__construct();
       //$this->load->library('session');
       $this->load->model("Hotel_model");
       $this->load->model("Cl_bord_model");
       $this->load->model("Booking_model");
       $this->load->model("TransportMail_model");
            if($this->session->userdata('client_user_id')==''){ 
            redirect(base_url('Transport_login.php'), 'refresh');
        }
  } 
  ///////////////////////////////////////////////////
  public function index(){
        $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');

	  $data["results_service"] = $this->Hotel_model->get_service($idclient);
	  $data["results_lang"] = $this->Booking_model->get_lang();
	  $data["data_table"]=true;	
	  //$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
//	  $data["get_book_list"]= $this->Booking_model->get_book_list($idclient);
	  $this->load->view('Header',$data);// Load Heder And Script Top Page
	  //$this->load->view('Home');
	  $this->load->view('Home',$data);
	  $this->load->view('Footer');// Load Footer And Script Buttom Page
	  $this->load->view('Text_script');
	  $this->load->view('End_page'); // End Page Not Delete
	  // Gen Varible Arrary Send View 
//  	                 $str =  $this->Cl_bord_model->check_tk_ses($tokengenered);
//                     if($str==1){}else{redirect(base_url('Transport_login'), 'refresh');}
//                     $data["tokengenered"] =$this->session->userdata('token_sesion');
//
//    $idclient = $this->session->userdata('client_user_id');
//	$data["results_service"] = $this->Hotel_model->get_service($idclient);
//	$data["tokengenered"] =$this->session->userdata('token_sesion');
//	$this->load->view('Header',$data);// Load Heder And Script Top Page
//	$this->load->view('Home');
//	$this->load->view('Footer');// Load Footer And Script Buttom Page
//	$this->load->view('Text_script');
//	$this->load->view('End_page'); // End Page Not Delete
  }
      //-----------------------------------------
    public function email_book_transport() {
        //$data['keygroub'] = $this->input->get('ID');
         $this->load->view('email_book_transport');
      
    }
        //-----------
    public function insertnotecheckin() {
        //$ticket = $this->input->post('ticket');
        $countTicket = count($this->input->post('ticket'));
        //$Place = $this->input->post('Place');
        $booking_id = $this->input->post('booking_id');
        //$transport_id = $this->input->post('transport_id'); 
        if ($countTicket > 0) {
            for ($i = 0; $i < $countTicket; $i++) {
                $ticket = $this->input->post('ticket')[$i];
                $Place = $this->input->post('Place')[$i];
                $transport_id = $this->input->post('transport_id')[$i];
                $TicketBook = $this->input->post('TicketBook')[$i];

                if (($TicketBook == '') && ($ticket != '') && ($Place != '')) {
                    $result_id = $this->Booking_model->insertnotecheckin($ticket, $Place, $booking_id, $transport_id, $TicketBook);
                } else if (($TicketBook != '') && ($ticket != '') && ($Place != '')) {
                    $result_id = $this->Booking_model->insertnotecheckin($ticket, $Place, $booking_id, $transport_id, $TicketBook);
                } else if (($TicketBook != '') && ($ticket == '') && ($Place == '')) {
                    $result_id = $this->Booking_model->deletenotecheckin($TicketBook);
                }
            }
            $result_id = 1;
        }
        echo $result_id;
    }
        //----------------------------
    public function confrim_data1() {
        $keygroup = $this->input->post('keygroup');
        $textareapdf = $this->input->post('textareapdf');
        $result_id = $this->Booking_model->confrim_data1($keygroup, $textareapdf);
        echo $result_id;
    }
        //----------------------------
    public function cancel_data1() {
        $keygroup = $this->input->post('keygroup');
        $textareapdf = $this->input->post('textareapdf');
        $result_id = $this->Booking_model->cancel_data1($keygroup, $textareapdf);
        echo $result_id;
    }
    //-------------------
    public function deleteData() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Booking_model->deleteData($dataID, $table);
        echo $result;
    }
        //-------------------
    public function saveData() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Booking_model->saveData($dataID, $table);
        echo $result;
    }
        //----------------------------------
    function delete_alltransport() {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->Booking_model->delete_alltransport($id[$count]);
            }
        }
    }
        //----------------------------------
    function save_allTransport() {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->Booking_model->save_allTransport($id[$count]);
            }
        }
    }
     //------------------------
    public function Change_password(){ 
        $user_id = $this->uri->segment(3);
		$data['user_id'] = $user_id;
                    $idclient = $this->session->userdata('client_user_id');
	  $data["tokengenered"] =$this->session->userdata('token_sesion');

	  $data["results_service"] = $this->Hotel_model->get_service($idclient);
	  $data["results_lang"] = $this->Booking_model->get_lang();
	  $data["data_table"]=true;	
	  //$data["get_boat"]= $this->Boat_model->get_boat_detail($boat_id);
//	  $data["get_book_list"]= $this->Booking_model->get_book_list($idclient);
	  $this->load->view('Header',$data);// Load Heder And Script Top Page
	  //$this->load->view('Home');
	  $this->load->view('ChangePassword',$data);
	  $this->load->view('Footer');// Load Footer And Script Buttom Page
	  $this->load->view('Text_script');
	  $this->load->view('End_page');
    }
        //---------------------------
    public function save_newPass(){ 		
		
		$password = $this->input->post('Password');		
		$dataID = $this->input->post('myId');		
		$result = $this->TransportMail_model->update_newPass($password,$dataID);
		echo $result;			
	}	
        //---------------------------
    public function checkcurrent(){ 		
		
		$password = $this->input->post('Current');		
		$dataID = $this->input->post('myId');		
		$result = $this->TransportMail_model->checkcurrent($password,$dataID);
		echo $result;			
	}	

}

?>
