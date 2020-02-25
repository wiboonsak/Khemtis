<?php

class Cl_model extends CI_Model{
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

function fetch_field_values($get_fd=NULL){
      $sql = "SELECT id,fld_nm,fld_valu FROM tbl_field_values WHERE  fld_nm ='$get_fd' AND rec_status= 'A'";
      return $this->db->query($sql)->result();
}

function   data_book(){
      $sql="SELECT  * FROM tbl_gp_booking WHERE st_book = 1 ORDER BY id_run DESC ";
      return $this->db->query($sql)->result();
}
function show_client($txt_fild){
      $txt_q = "";
     // if(trim($txt_fild)!=""){$txt_q= " where client_id = $txt_fild";}
      $sql = "SELECT * FROM tbl_clients where client_id = $txt_fild";
      return $this->db->query($sql)->result();
}

function get_service_comm($ty,$clid){
 if($ty=='HOTEL'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='HOTEL' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else if($ty=='TRANSPORT'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='TRANSPORT' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else if($ty=='PACKAGE'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='PACKAGE' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else if($ty=='RESTAURANT'){
       $num_com = 0;
       $sql = "SELECT comm_price FROM tbl_comprice WHERE typ='RESTAURANT' AND client_id=$clid";
       $variable1 = $this->db->query($sql)->result();
       foreach ($variable1 as $value1) {$num_com = $value1->comm_price;}
       return $num_com;
 }else{
      return 0;
 }
}


function Sa_Up_data($allData=NULL,$comm=NULL,$data_service=NULL,$id_update=NULL){
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
                         
                          $resultData = $this->add_tbl_user($allData,$maxid,$date_document,$user_prefix,1,$id_update);
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
                      $resultData = $this->add_tbl_user($allData,$id_up,$date_document,$allData["user_prefix"],2,$id_update); 
               }else{
                    $resultData=0;
               }
  }
      return $resultData;
      //$this->add_tbl_user($allData,'12',$date_document,'bbbbb');
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

function add_tbl_user($allData,$user_id,$date_document,$user_prefix,$pr1,$id_update){
if($pr1==1){
     $data = array(
             "client_id" =>$user_id,
             "user_name" =>$allData["user_name"].$user_prefix,
             "admin_level" => ' ',
             "admin_type" => 'A',
             "user_full_name" => $allData["user_full_name"],
             "user_password" =>md5($allData["user_pass"]),
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "default_lang"=>'EN',
             "user_status"=>$allData["user_Status"],
             "terminated_dt"=>$date_document,
               );
           if($this->db->insert('tbl_users', $data)){ 
                return 1;
         }return 0;

}else if($pr1==2){

  $data = array(
             "client_id" =>$user_id,
             "user_name" =>$allData["user_name"].$user_prefix,
             "user_full_name" => $allData["user_full_name"],
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "user_status"=>$allData["user_Status"],
              );
   if($allData["user_pass"]!=""){
           $data = array(
             "user_name" =>$allData["user_name"].$user_prefix,
             "user_full_name" => $allData["user_full_name"],
             "user_password" =>md5($allData["user_pass"]),
             "user_email" =>$allData["user_email"],
             "user_mobile" =>$allData["user_mobile"],
             "user_status"=>$allData["user_Status"],
              );
   }
       $this->db->where('user_id',$id_update);
               if($this->db->update('tbl_users', $data)){
                return 2;
            }return 0;

}            }

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

/*  Show tbl_field_values  [CRCY_CODE]  */
public function get_tbl_field_values($st_data,$st_pr){
        header('Content-Type: application/json');
        $element_data = "";
        if($st_data==1){$element_data=" WHERE fld_nm='$st_pr'";}
        if($st_data==2){$element_data=" WHERE Like '%$name%'";}
        $sql = "SELECT * FROM tbl_field_values $element_data ";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
}

// show Data Client User
 public function get_client_data($id_data,$st_data,$rw_con,$max_tab){
      header('Content-Type: application/json');
        $element_data = "";
        if($st_data==1){$element_data=" AND tbl_clients.client_id=$id_data";}
        if($st_data==2){$element_data=" AND Like '%$id_data%'";}
        $sql = "SELECT 
tbl_users.user_id,
tbl_users.admin_type,
tbl_users.user_full_name,
tbl_users.user_email,
tbl_users.user_mobile,
tbl_users.user_status,
tbl_users.user_name,
tbl_clients.client_id,
tbl_clients.crcy_code,
tbl_clients.client_name,
tbl_clients.user_prefix,
tbl_clients.contact_addr,
tbl_clients.contact_email,
tbl_clients.contact_person,
tbl_clients.contact_phone,
GROUP_CONCAT(tbl_services.service_cd) as tbl_all_sevice
FROM `tbl_clients` 
LEFT JOIN tbl_services ON tbl_services.client_id=tbl_clients.client_id
INNER JOIN tbl_users ON tbl_users.client_id = tbl_clients.client_id
WHERE tbl_users.admin_type =  'A'
$element_data 
GROUP BY
tbl_users.user_id,
tbl_users.admin_type,
tbl_users.user_full_name,
tbl_users.user_email,
tbl_users.user_mobile,
tbl_users.user_status,
tbl_users.user_name,
tbl_clients.client_id,
tbl_clients.crcy_code,
tbl_clients.client_name,
tbl_clients.user_prefix,
tbl_clients.contact_addr,
tbl_clients.contact_email,
tbl_clients.contact_person,
tbl_clients.contact_phone 
order by tbl_clients.client_id asc LIMIT $rw_con,$max_tab
";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
 }

  public function fetch_client($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_clients");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            } 
           return $data;
        }
       return false;
   }
// ------------------------------- //

/* GET Session */
  public function check_login($user,$pass){
         $username = $this->security->xss_clean($user);
         $password = $this->security->xss_clean($pass);    
         $query = $this->db->query("
                                SELECT user_id,user_full_name,admin_type,user_name
                                FROM  tbl_users 
                                WHERE user_name ='$username' 
                                AND   user_password='".md5($password)."'");
$row = $query->row();
if($query->num_rows()==1 && (isset($row)))
{
            $data = array(
                    'client_id' => $row->user_id,
                    'client_full_name' => $row->user_full_name,
                    'client_type' => $row->admin_type,
                    'client_user' => $row->user_name,
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