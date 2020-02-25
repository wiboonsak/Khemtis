<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestaurantMail extends CI_Controller {

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
	 function __construct() {
       parent::__construct();
          $this->load->model('RestaurantMail_model');
    }
	//--------------------
	public function index(){		
				
	}
	//-------------------
	//---------------------------
	public function check_Email(){ 		
		
		$mail = $this->input->post('email');				
		$username = $this->input->post('username');				
		$result = $this->RestaurantMail_model->do_checkEmail($mail,$username);
		echo $result;
			
	}

        //-------------------
	public function mail_forgotPassword(){	 
		
		$email = $this->input->post('email');				
		$userID = $this->input->post('userID');

             $user_data = $this->RestaurantMail_model->get_user($userID);
             foreach($user_data->result() as $user_data2){ }
             $name = $user_data2->user_full_name;
             $url = 'Restaurant_login/ResetPassword';

		$from_email = 'rsvn@khemtis.com';
		$subject = "Profile Password Updated";		
		//$to_email = $editor_data2->email;
		//$to_email = $emaildata;
		$to_email = $email;
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title></title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height="59" align="center" bgcolor="#ffdd00" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Profile Password Updated</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>You recently asked to reset your http://rescms.khemtis.com  password. To complete your request, please follow this link: Click to change<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>            
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
			</tbody>
        </table>
        <p>&nbsp;</p>
		        	
		  <a href="'.base_url().$url.'/'.$userID.'" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #ffdd00; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Reset Password</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#ffdd00" style="font-size: 10pt; color:#FFFFFF;">	370 Moo 7 Koh Lipe, Koh Sarai Sub-district, Muang, Satun 91000 Thailand,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: +66(0)913013011, +66(0)913013012 &nbsp; Email: rsvn@khemtis.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 	
		
		$this->email->from($from_email, 'rsvn@khemtis.com'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
       	$this->email->message($email_body); 
        //Send mail 
		//$this->email->send();  
		if($this->email->send()){ 
		   	$result2 = 1;
			
          	$result = $result2;  
        }			
		echo $result;		
	}
} ?>