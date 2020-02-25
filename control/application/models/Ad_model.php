<?php

class Ad_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }


  public function log_out($url){
          $this->session->sess_destroy();
         // @header('Location:'.base_url($url);
  }

  public function record_count_admin(){
         return $this->db->count_all("tbl_admin_users");
  }



function Update_ad_us($allData=NULL,$comm=NULL){
           $date_document=date("Y-m-d");

           if($allData["user_pass"]!=""){
        
           $data = array(
             "user_name" => $allData["user_name"],
             "admin_level" => '',
             "admin_type" => $allData["admin_type"],
             "user_full_name" => $allData["user_full_name"],
             "user_password" => md5($allData["user_pass"]),
             "user_email" => $allData["user_email"],
             "user_mobile" => $allData["user_mobile_no"],
             "default_lang" => '',
             "admin_status" =>$allData["user_Status"],
             "terminate_date"=>'',
           );
           }else{
            if($allData["user_Status"]=="A"){
               $date_document="0000-00-00";
             }
            $data = array(
             "user_name" => $allData["user_name"],
             "admin_type" => $allData["admin_type"],
             "user_full_name" => $allData["user_full_name"],
             "user_email" => $allData["user_email"],
             "user_mobile" => $allData["user_mobile_no"],
             "admin_status" =>$allData["user_Status"],
             "terminate_date"=>$date_document,
           );

         }
          



if($comm=="SA"){
               if($this->db->insert('tbl_admin_users', $data)){ 
                   $resultData=1;
               }else{
                   $resultData=0;
               }
 }else if($comm=="UP"){
          $id_up = $allData["id_admin"];
           $this->db->where('admin_user_id',$id_up);
               if($this->db->update('tbl_admin_users', $data)){
                   $resultData=2;
               }else{
                   $resultData=0;
              }
  }
  return $resultData;
 }

function Del_ad_us($id){
    $sql = "DELETE from `tbl_admin_users`  WHERE admin_user_id=$id";
    if($this->db->query($sql)){
           return  $resultData=1;
         }else{
           return $resultData=0;
     }
}

/*  Show Adin Table  */
 public function get_admin_data($id_data,$st_data,$rw_con,$max_tab){
        header('Content-Type: application/json');
        $element_data = "";
        if($st_data==1){$element_data=" WHERE admin_user_id=$id_data";}
        if($st_data==2){$element_data=" WHERE Like '%$name%'";}
        $sql = "SELECT  
         `admin_user_id`, 
         `user_name`,
          CASE WHEN `admin_type`= 'A' THEN 'Admin'
               WHEN `admin_type`= 'U' THEN 'User' 
          END AS admin_type_c,
         `user_full_name`, 
         `user_password`, 
         `user_email`, 
         `user_mobile`, 
          CASE WHEN `default_lang`= 'T' THEN 'Thai'
               WHEN `default_lang`= 'E' THEN 'English'
               WHEN `default_lang`= 'C' THEN 'China'
          END AS default_lang_c,
         `admin_status`, 
                   CASE WHEN `admin_status`= 'A' THEN 'Active'
                        WHEN `admin_status`= 'T' THEN 'Terminated'
          END AS user_status_c,
         `terminate_date`,
         default_lang,
         admin_level,
         admin_type 
         FROM  tbl_admin_users  $element_data order by admin_user_id asc  LIMIT $rw_con,$max_tab";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
 }


 public function get_count_row(){     
    return $this->db->count_all("tbl_admin_users");
 }

/* GET Session */
  public function check_login($user,$pass){
         $username = $this->security->xss_clean($user);
         $password = $this->security->xss_clean($pass);    

         $query = $this->db->query("
                                SELECT admin_user_id,user_full_name,admin_type,user_name
                                FROM  tbl_admin_users 
                                WHERE user_name ='$username' 
                                AND admin_status = 'A' 
                                AND   user_password='".md5($password)."'");
$row = $query->row();
if($query->num_rows()==1 && (isset($row)))
{
            $data = array(
                    'admin_id' => $row->admin_user_id,
                    'admin_full_name' => $row->user_full_name,
                    'admin_type' => $row->admin_type,
                    'admin_user' => $row->user_name,
                    );
            $this->session->set_userdata($data);
           return 1;
    }
           return 0;
  } 

  public function fetch_admin($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_admin_users");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            } 
           return $data;
        }
       return false;
   }
}
?>