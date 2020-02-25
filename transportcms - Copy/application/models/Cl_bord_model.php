<?php

class Cl_bord_model extends CI_Model{
   public function __construct(){
    parent::__construct();
  }


function check_tk_ses($idtk){
  $query = $this->db->query("
SELECT  tbl_users.user_id,tbl_users.client_id,tbl_users.user_full_name,tbl_users.admin_type,tbl_users.user_name,tbl_clients.user_prefix
From tbl_users 
JOIN tbl_clients ON tbl_clients.client_id = tbl_users.client_id 
WHERE tbl_users.user_token_gen ='$idtk'");
$row = $query->row();
if($query->num_rows()==1 && (isset($row)))
{
            $data = array(
                    'user_user_id' => $row->user_id,
                    'client_user_id' => $row->client_id,
                    'client_user_full_name' => $row->user_full_name,
                    'client_user_type' => $row->admin_type,
                    'client_user_user' => $row->user_name,
                    'client_user_prefix' =>$row->user_prefix,
                    'token_sesion' => $idtk,
                    );
             $this->session->set_userdata($data);
             return 1;
    }
           return 0;
}




  public function recheck_session(){
    return  $this->session->userdata('name_user');
  }

  public function log_out($url){
          $this->session->sess_destroy();
         // @header('Location:'.base_url($url);
  }

  public function record_count_client(){
 
         return $this->db->count_all("tbl_clients");
  }

function get_service($id=NULL){
      $sql = "SELECT service_cd FROM tbl_services WHERE  client_id =$id";
      return $this->db->query($sql)->result();
}

function get_lang(){
      $sql = "SELECT * FROM `tbl_field_lang_values` 
JOIN tbl_field_values ON (tbl_field_values.fld_nm = tbl_field_lang_values.fld_nm)
AND (tbl_field_values.fld_valu = tbl_field_lang_values.fld_valu) WHERE  tbl_field_lang_values.fld_nm ='LANG'";
      return $this->db->query($sql)->result();
}

function Sa_Up_data($allData=NULL,$comm=NULL,$prefix=NULL,$data_service=NULL,$client_id_ses){
$date_document=date("Y-m-d");
if($comm=="1"){
//$user_prefix = $this->update_tbl_user();
             $data = array(
             "client_id" =>$client_id_ses,
             "user_name" =>$allData["user_name"].$prefix,
             "admin_level" => '',
             "admin_type" => 'U',
             "user_full_name" => $allData["user_full_name"],
             "user_password" =>md5($allData["user_pass"]),
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "default_lang"=>'EN',
             "user_status"=>$allData["user_Status"],
             "terminated_dt"=>'',
               );
              
               if($this->db->insert('tbl_users', $data)){ 
$this->db->select_max('user_id');
$query=$this->db->get('tbl_users');
$ret = $query->row();
$maxid = $ret->user_id;

                     $sql = "DELETE from `tbl_user_services`  WHERE user_id=$maxid";
                     $this->db->query($sql);
                      while ($name_service = current($data_service)) {
                          $data_s = array("user_id"=>$maxid,"service_cd"=>$name_service,);
                          $this->db->insert('tbl_user_services',$data_s); 
                          next($data_service);
                      }
                         
                        $resultData = 1; //$this->add_tbl_user($allData,$maxid,$date_document,$user_prefix);
               }else{
                   $resultData=0;
               }
 }else 
 if($comm=="2"){

  if($allData["user_pass"]!=""){
             $data = array(
             "user_name" =>$allData["user_name"].$prefix,
             "admin_level" => '',
             "user_full_name" => $allData["user_full_name"],
             "user_password" =>md5($allData["user_pass"]),
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "default_lang"=>'EN',
             "user_status"=>$allData["user_Status"],
             "terminated_dt"=>'',
               );

}else{
               $data = array(
             "user_name" =>$allData["user_name"].$prefix,
             "admin_level" => '',
             "user_full_name" => $allData["user_full_name"],
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "default_lang"=>'EN',
             "user_status"=>$allData["user_Status"],
             "terminated_dt"=>'',
               );


}


          $id_up = $allData["id_row"];
           $this->db->where('user_id',$id_up);
               if($this->db->update('tbl_users', $data)){
                     $sql = "DELETE from `tbl_user_services`  WHERE user_id=$id_up";
                     $this->db->query($sql);
                      while ($name_service = current($data_service)) {
                          $data_s = array("user_id"=>$id_up,"service_cd"=>$name_service,);
                          $this->db->insert('tbl_user_services',$data_s); 
                          next($data_service);
                      }
                     $resultData=2;
               }else{
                    $resultData=0;
               }
  }
      return $resultData;
}

function update_tbl_user(){
    $length = 4;
    $str = "";
    $characters = array_merge(range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
       $rand = mt_rand(0, $max);
       $str .= $characters[$rand];
    }
$query = $this->db->query("
                           SELECT user_prefix
                           FROM  tbl_clients 
                           WHERE user_prefix ='$str'");
$row = $query->row();
if($query->num_rows()==1 && (isset($row)))
{
   $this->update_tbl_user();
}else{
   return $str;
  }
}

function Del_cl_us($id){
    $sql = "DELETE from `tbl_clients`  WHERE client_id=$id";
    if($this->db->query($sql)){
           return  $resultData=1;
         }else{
           return $resultData=0;
   }
}

 public function get_count_row(){     
    return $this->db->count_all("tbl_users");
 }


/* GET Session */
  public function check_login($user,$pass){
         $username = $this->security->xss_clean($user);
         $password = $this->security->xss_clean($pass);    
         $query = $this->db->query("
SELECT  tbl_users.user_id,tbl_users.client_id,tbl_users.user_full_name,tbl_users.admin_type,tbl_users.user_name,tbl_clients.user_prefix
From tbl_users 
JOIN tbl_clients ON tbl_clients.client_id = tbl_users.client_id
                                WHERE tbl_users.user_name ='$username'
                                AND   tbl_users.user_status = 'A' 
                                AND   tbl_users.user_password='".md5($password)."'");
$row = $query->row();
if($query->num_rows()==1 && (isset($row)))
{
            $txt_md5 = md5($username.$password.date("m-Y-d").time());
            $data = array(
                    'user_user_id' => $row->user_id,
                    'client_user_id' => $row->client_id,
                    'client_user_full_name' => $row->user_full_name,
                    'client_user_type' => $row->admin_type,
                    'client_user_user' => $row->user_name,
                    'client_user_prefix' =>$row->user_prefix,
                    'token_sesion' => $txt_md5,
                    );
             $this->session->set_userdata($data);
             $this->db->where('user_name',$username);
             $this->db->where('user_password',md5($password));
             $data_gen = array(
             "user_token_gen" =>$txt_md5,
               );
          if($this->db->update('tbl_users', $data_gen)){
               return array(1,$txt_md5);
          }else{return array(0,0);}
    }
           return array(0,0);
  } 


/*  Show tbl_field_values  [CRCY_CODE]  */
public function get_tbl_field_values($st_data,$st_pr){
        header('Content-Type: application/json');
        $element_data = "";
        if($st_data==1){$element_data=" WHERE client_id='$st_pr'";}
        if($st_data==2){$element_data=" WHERE Like '%$name%'";}
        $sql = "SELECT * FROM tbl_services $element_data ";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
}


function fetch_field_values($get_fd=NULL){
      $sql = "SELECT * FROM  tbl_services WHERE  client_id =$get_fd";
      return $this->db->query($sql)->result();
}

// show Data Client User
 public function get_client_data($id_data,$st_data,$rw_con,$max_tab){
      header('Content-Type: application/json');
      $clid = $this->session->userdata('client_id');
        $element_data = "";
        if($st_data==1){$element_data=" AND tbl_users.user_id=$id_data";}
        if($st_data==2){$element_data=" AND Like '%$id_data%'";}
        $sql = "SELECT 
tbl_clients.user_prefix,
tbl_users.user_id,
tbl_users.admin_type,
(CASE WHEN tbl_users.admin_type= 'A' THEN 'Admin' 
     WHEN tbl_users.admin_type= 'U' THEN 'User'  
     END) AS admin_type_c,
(CASE WHEN tbl_users.user_status= 'A' THEN 'Active'
     WHEN tbl_users.user_status= 'T' THEN 'Terminated'
     END) AS user_status_c,     
tbl_users.user_full_name,
tbl_users.user_email,
tbl_users.user_mobile,
tbl_users.user_status,
tbl_users.user_name,
GROUP_CONCAT(tbl_user_services.service_cd) as tbl_all_sevice 
FROM `tbl_users` 
LEFT JOIN tbl_user_services ON tbl_users.user_id=tbl_user_services.user_id
LEFT JOIN tbl_clients ON tbl_clients.client_id = tbl_users.client_id 
WHERE  tbl_users.client_id = $clid
$element_data 
GROUP BY
tbl_clients.user_prefix,
tbl_users.user_id,
tbl_users.admin_type,
CASE WHEN tbl_users.admin_type= 'A' THEN 'Admin'
     WHEN tbl_users.admin_type= 'U' THEN 'User' 
     END,
CASE WHEN tbl_users.user_status= 'A' THEN 'Active'
     WHEN tbl_users.user_status= 'T' THEN 'Terminated'
     END,     
tbl_users.user_full_name,
tbl_users.user_email,     
tbl_users.user_mobile,
tbl_users.user_status,
tbl_users.user_name 
order by tbl_users.user_id asc LIMIT $rw_con,$max_tab
";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
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