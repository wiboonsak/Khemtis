<?php

class Cl_bord_model extends CI_Model{
   public function __construct(){
    parent::__construct();
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

function Sa_Up_data($allData=NULL,$comm=NULL,$data_service=NULL){

$date_document=date("Y-m-d");
if($comm=="1"){
$user_prefix = $this->update_tbl_user();
             $data = array(
             "client_name" =>$allData["client_name"],
             "start_ctr_date" =>$date_document,
             "end_ctr_date" => '0000-00-00',
             "crcy_code" => $allData["crcy_code"],
             "user_prefix" => $user_prefix,
             "contact_person" =>$allData["contact_person"],
             "contact_addr" =>$allData["contact_addr"],
             "contact_phone" =>$allData["contact_phone"],
             "contact_email"=>$allData["contact_email"],
               );
               if($this->db->insert('tbl_clients', $data)){ 
    
$this->db->select_max('client_id');
$query=$this->db->get('tbl_clients');
$ret = $query->row();
$maxid = $ret->client_id;
                     $sql = "DELETE from `tbl_services`  WHERE client_id=$maxid";
                     $this->db->query($sql);
                      while ($name_service = current($data_service)) {
                          $data_s = array("client_id"=>$maxid,"service_cd"=>$name_service,);
                          $this->db->insert('tbl_services',$data_s); 
                          next($data_service);
                      }
                         
                        $resultData = $this->add_tbl_user($allData,$maxid,$date_document,$user_prefix);
               }else{
                   $resultData=0;
               }
 }else 
 if($comm=="2"){
            $data = array(  
             "client_name" =>$allData["client_name"],    
             "crcy_code" =>$allData["crcy_code"],
             "contact_person" =>$allData["contact_person"],
             "contact_addr" =>$allData["contact_addr"],
             "contact_phone" =>$allData["contact_phone"],
             "contact_email"=>$allData["contact_email"],
               );
          $id_up = $allData["id_row"];
           $this->db->where('client_id',$id_up);
               if($this->db->update('tbl_clients', $data)){
                     $sql = "DELETE from `tbl_services`  WHERE client_id=$id_up";
                     $this->db->query($sql);
                      while ($name_service = current($data_service)) {
                          $data_s = array("client_id"=>$id_up,"service_cd"=>$name_service,);
                          $this->db->insert('tbl_services',$data_s); 
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


function add_tbl_user($allData,$user_id,$date_document,$user_prefix){


     $data = array(
             "client_id" =>$user_id,
             "user_name" =>$allData["user_name"].$user_prefix,
             "admin_level" => ' ',
             "admin_type" => 'A',
             "user_full_name" => $allData["user_full_name"],
             "user_password" =>$allData["user_pass"],
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "default_lang"=>'EN',
             "user_status"=>$allData["user_Status"],
             "terminated_dt"=>$date_document,
               );
         if($this->db->insert('tbl_users', $data)){ 
                return 1;
         }
                return 0;
                
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
    return $this->db->count_all("tbl_clients");
 }


/* GET Session */
  public function check_login($user,$pass){
         $username = $this->security->xss_clean($user);
         $password = $this->security->xss_clean($pass);    
         $query = $this->db->query("
                                SELECT user_id,client_id,user_full_name,admin_type,user_name
                                FROM  tbl_users 
                                WHERE user_name ='$username'
                                AND   user_status = 'A' 
                                AND   user_password='".md5($password)."'");
$row = $query->row();
if($query->num_rows()==1 && (isset($row)))
{
            $data = array(
                    'user_id' => $row->user_id,
                    'client_id' => $row->client_id,
                    'client_full_name' => $row->user_full_name,
                    'client_type' => $row->admin_type,
                    'client_user' => $row->user_name,
                    );
            $this->session->set_userdata($data);
           return 1;
    }
           return 0;
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
WHERE  tbl_users.client_id = $clid
$element_data 
GROUP BY
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