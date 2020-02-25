<?php
class RestaurantMail_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }
	//----------------------------	 
	function do_checkEmail($mail=NULL,$username=Null){
		  $sql2 = "SELECT * FROM tbl_users WHERE user_email ='".$mail."' AND user_name = '".$username."' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  if($numberCount > 0){
			  //$pass=1;
			  
			  $sql = "SELECT * FROM tbl_users WHERE user_email ='".$mail."' AND user_name = '".$username."' ";
          	 // $query = $this->db->query($sql);
			  
			  $query = $this->db->query($sql);
			  $row=$query->row();
			  $pass = $row->user_id;
		  
		  } else {
			  $pass=0;			  
		  }
		 return $pass;
	} 
        //---------------------------------
	function update_newPass($password=NULL,$dataID=NULL){			 
		 $data = array(
         'user_password' => md5($password)                
         );
		 
		 $this->db->where('user_id', $dataID);
		 if($this->db->update('tbl_users', $data)){
		 	$pass = 1;
		 }else{
		    $pass=0;
		 }
		return $pass;
	}	
        	//---------------------------	 
	function get_user($user_id=NULL){	   
		   
		 $sql = "SELECT * FROM `tbl_users` WHERE user_id ='".$user_id."' ORDER BY user_id DESC ";
         $query=$this->db->query($sql);
         return $query;			
	}
                //---------------------------------
	function checkcurrent($password=NULL,$dataID=NULL){
            	  $sql2 = "SELECT * FROM tbl_users WHERE user_password ='".md5($password)."' AND user_id = '".$dataID."' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();
		 if($numberCount >0){
		 	$pass = 1;
		 }else{
		    $pass=0;
		 }
		return $pass;
	}
   
 


}
?>