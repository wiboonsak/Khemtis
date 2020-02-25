<?php

class Register_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //--------------------------- 
    function addregister($first_name = null, $last_name = null, $cus_email = null, $cus_tel = null, $cus_addr = null, $cus_password = null) {
        $h_lg = $this->session->userdata('ch_lang');
        $password = md5($cus_password);
        $today = date("Y-m-d H:i:s");
        $data = array('first_name' => $first_name,
            'last_name' => $last_name,
            'cus_email' => $cus_email,
            'cus_password' => $password,
            'cus_tel' => $cus_tel,
            'cus_addr' => $cus_addr,
            'default_lang' => $h_lg,
            'default_crcy_code' => 'THB',
            'cus_stat_cd' => 'Y',
            'ip_address' => '',
            'sign_up_dt' => $today,
            'facebook_id' => '',
            'member_ty' => 'm');
        if ($this->db->insert('tbl_customers', $data)) {
            $pass = 1;
        } else {
            $pass = 0;
        }

        return $pass;
    }
function add_lang($m_id,$h_lg){
 $data = array(
            'default_lang' => $h_lg);
        $this->db->where("id",$m_id);
       if($this->db->update('tbl_customers', $data)){     
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
}

    //------------------------------ 
    function count_email($mail = NULL) {
        $sql = "SELECT * FROM `tbl_customers` WHERE cus_email ='" . $mail . "' ";
        $query = $this->db->query($sql);
        $numberCount = $query->num_rows();
        return $numberCount;
    }




    function get_member($mail,$pss){
$pss = md5($pss);
$sql = "SELECT * FROM `tbl_customers` WHERE cus_email = '$mail' AND cus_password='$pss'";
$datare = $this->db->query($sql)->result();
    foreach($datare as  $value) {
                $data = array(
                    'id_typ_mem' => $value->member_ty
                    );
           $this->session->set_userdata($data);
    }


           return $datare;
}



    function get_member_fac($idcus){
$sql = "SELECT * FROM `tbl_customers` WHERE id = $idcus";
$datare = $this->db->query($sql)->result();
    foreach($datare as  $value) {
                $data = array(
                    'id_typ_mem' => $value->member_ty
                    );
           $this->session->set_userdata($data);
    }


           return $datare;
}








}




?>

























