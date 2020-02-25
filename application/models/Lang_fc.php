<?php

class Lang_fc extends CI_Model{
   public function __construct(){
    parent::__construct();
  }

function get_lg($id){
$query = $this->db->query("SELECT (default_lang) as cu_lg FROM `tbl_customers` WHERE id ='$id'");
$row = $query->row();
if (isset($row)){
        return $row->cu_lg;
 }
}

function  get_profile($lg){
   $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};
if($h_lg=="en" || $h_lg=="EN"){
   $lang=array(
   "p_title"=>"User detail",
   "p_name"=>"Name ",
   "p_em"=>"Email ",
   "p_num"=>"Phone number ",
   "p_pass"=>"Password",
   "p_so"=>"Social networks",
   "p_fac"=>"Facebook",
   "p_my"=>"My Bookings",
   "p_re"=>"Reviews",
   "p_pro"=>"Profile",
   "p_edit"=>"Edit",
   "p_con"=>"Connect Facebook",
   "p_in"=>"CHECK IN",
   "p_out"=>"CHECK OUT",
   "p_b_re"=>"Reviews your stay",
   "p_b_de"=>"View detail",
   "p_bid"=>"BookingID ",
   "p_comp"=>"Completed",
   "p_rty"=>"Room Type",
   "p_add"=>"Address",
   );

   }
   if($h_lg=="th" || $h_lg=="TH"){
   $lang=array(
   "p_title"=>"ข้อมูลส่วนตัวผู้ใช้",
   "p_name"=>"ชื่อ-สกุล ",
   "p_em"=>"อีเมล์ ",
   "p_num"=>"เบอร์โทรศัพท์ ",
   "p_pass"=>"รหัสผ่าน",
   "p_so"=>"โซเชี่ยวเน็ตเวิรค์",
   "p_fac"=>"เฟสบุ๊ค",
   "p_my"=>"ประวัติการจอง",
   "p_re"=>"ความพึงพอใจ",
   "p_pro"=>"จัดการข้อมูลส่วนตัว",
   "p_edit"=>"แก้ไข",
   "p_con"=>"เชื่อมต่อ กับ เฟสบุ๊คนี้",
   "p_in"=>"วันที่เข้าพัก",
   "p_out"=>"วันที่ออก",
   "p_b_re"=>"รีวิวที่พักของคุณ",
   "p_b_de"=>"ประวัติการจอง",
   "p_bid"=>"รหัสการจอง ",
   "p_comp"=>"เข้าพักแล้ว",
   "p_rty"=>"ประเภทห้องที่จอง",
   "p_add"=>"ที่อยู่",
   );
  }
   return $lang;
}



function get_login(){
 $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};
   if($h_lg=="en" || $h_lg=="EN"){
   $lang=array(
   "khem_title"=>"CREATE YOUR ACCOUNT AND JOIN WITH US!",
   "email"=>"Email",
   "pass"=>"Password",
   "repass"=>"confirm password",
   "name"=>"Name",
   "last"=>"Last name",
   "number"=>"Number Phone",
   "addr"=>"Address"
   );
   }
   if($h_lg=="th" || $h_lg=="TH"){
      $lang=array(
   "khem_title"=>"ลงทะเบียนสมาชิก KHEMTIS.COM",
   "email"=>"อีเมล์",
   "pass"=>"รหัสผ่าน",
   "repass"=>"ยืนยันรหัสผ่าน",
   "name"=>"ชื่อ",
   "last"=>"นามสกุล",
   "number"=>"เบอร์โทรศัพท์  ",
   "addr"=>"ที่อยู่"
   );
  }
   return $lang;
}




function get_lg_menu(){


 $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};
   if($h_lg=="en" || $h_lg=="EN"){
   $lang=array(
   "khem_title"=>"LOGIN TO YOUR KHEMTIS.COM ACCOUNT!",
   "email"=>"Email",
   "pass"=>"Password",
   "remem"=>"Remmember me",
   "forgot"=>"Forgot password ?",
   "login"=>"LOGIN",
   "re_title"=>"Want to reserve other service",
   "re_hotel"=>"Hotel book",
   "re_pack"=>"Package Book",
   "re_tran"=>"Transport Book",
   "re_res"=>"Restuarants Book",
   "cls"=>"CLOSE",
   "book_summary"=>"Booking Summary",
    "total_sum"=>"Total",
   "re_van"=>"Van Book",
   "re_bot"=>"Speed Boat Book"
   );

   }
   if($h_lg=="th" || $h_lg=="TH"){
      $lang=array(
   "khem_title"=>"เข้าสู่ระบบ สมาชิก KHEMTIS.COM",
   "email"=>"อีเมล์",
   "pass"=>"รหัสผ่าน",
   "remem"=>"จำรหัสผ่านไว้",
   "forgot"=>"ลืมรหัสผ่าน",
   "login"=>"เข้าสู่ระบบ",
   "re_title"=>"ต้องการจองบริการอื่น ๆ",
   "re_hotel"=>"จองโรงแรม",
   "re_pack"=>"จองแพ็คเกจ",
   "re_tran"=>"จองรถเรือ",
   "re_res"=>"จองร้านอาหาร",
   "cls"=>"ปิดหน้านี้",
   "book_summary"=>"รายการที่จองไว้ทั้งหมด",
   "total_sum"=>"ยอดชำระทั้งหมด",
   "re_van"=>"เช่ารถ",
   "re_bot"=>"เช่าเรือ"
   );
  }
   return $lang;


}

function get_home($lg){
   $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};
   if($h_lg=="en" || $h_lg=="EN"){
   $lang=array(
   "ht_title"=>"SEARCH HOTELS, RESORTS, HOSTELS","ht_title_list"=>"HOTELS, RESORTS, HOSTELS",
   "tr_title"=>"SEARCH  ROUTE  TRANSPORT",
   "pack_title"=>"SEARCH PACKAGE TOURS","pack_title_list"=>"PACKAGE TOURS",
   "res_title"=>"SEARCH BEST RESTURANTS",
   "adu"=>"Adult",
   "chi"=>"Child",
   "DEPART"=>"DEPART ",
   "RETURN"=>"RETURN ",
   "ht_poly"=>"Select Date Check in And Check out",
   "tr_poly"=>"Please book 24 hour in advance",
   "Vehicle"=>"Vehicle",
   "Departure"=>"Departure",
   "Arrival"=>"Arrival",
   "round"=>"Round Trip",
   "oneway"=>"One Way",
   "date_dep"=>"Depart date",
   "date_rep"=>"Return date",
   "secl"=>"Select",
   "find_input"=>"Search input text",
   "date"=>"Date",
   "SEARCH" =>"SEARCH NOW"
   );

   }
   if($h_lg=="th" || $h_lg=="TH"){
      $lang=array(
   "ht_title"=>"ค้นหา โรงแรม, รีสอร์ท, ห้องพัก","ht_title_list"=>" โรงแรม, รีสอร์ท, ห้องพัก",
   "tr_title"=>"ค้นหา เส้นทางในการเดินทาง",
   "pack_title"=>"ค้นหา แพ็คเกจทัวร์","pack_title_list"=>" แพ็คเกจทัวร์",
   "res_title"=>"ค้นหา ร้านอาหาร",
   "adu"=>"ผู้ใหญ่",
   "chi"=>"เด็ก",
   "DEPART"=>"ขาไป ",
   "RETURN"=>"ขากลับ ",
   "ht_poly"=>"เลือกวันที่เข้าพัก และวันที่ออกจากห้องพัก",
   "tr_poly"=>"กรุณาจองก่อนล่วงหน้า 24 ชม. เท่านั้น",
   "Vehicle"=>"ยานพาหนะ",
   "Departure"=>"สถานที่เริ่มต้น",
   "Arrival"=>"สถานที่ปลายทาง",
   "round"=>"ขาไปขากลับ",
   "oneway"=>"ไปขาเดียว",
   "date_dep"=>"วันที่ขาไป",
   "date_rep"=>"วันที่ขากลับ",
   "secl"=>"เลือก",
   "find_input"=>"ระบุข้อความค้นหา",
   "date"=>"วันที่",
   "SEARCH" =>"ค้นหาตอนนี้"
   );
  }
   return $lang;
  }



  function get_hd($lg){
     $lang=array();
         array_push($lang,"HOME");
         array_push($lang,"TRANSPORT");
         array_push($lang,"PACKAGES TOURS");
         array_push($lang,"RESTUARANTS");
         array_push($lang,"PROMOTION");
         array_push($lang,"Login");
         array_push($lang,"Register");
         array_push($lang,"Log out");
         array_push($lang,"HOTEL");
   	
    $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};     
   if($h_lg=="en" || $h_lg=="EN"){
   $lang=array();
         array_push($lang,"HOME");
         array_push($lang,"TRANSPORT");
         array_push($lang,"PACKAGES TOURS");
         array_push($lang,"RESTUARANTS");
         array_push($lang,"PROMOTION");
         array_push($lang,"Login");
         array_push($lang,"Register");
         array_push($lang,"Log out");
         array_push($lang,"HOTEL");
   }
   if($h_lg=="th" || $h_lg=="TH"){
   $lang=array();
         array_push($lang,"หน้าหลัก");
         array_push($lang,"เดินทางรถเรือ");
         array_push($lang,"แพ็คเกจทัวร์");
         array_push($lang,"ร้านอาหาร");
         array_push($lang,"โปรโมชั่น");
         array_push($lang,"เข้าสู่ระบบ");
         array_push($lang,"ลงทะเบียน");
         array_push($lang,"ออกจากระบบ");
          array_push($lang,"โรงแรม");
   }
   return $lang;
  }





function transport($lg){
   $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};
   if($h_lg=="en" || $h_lg=="EN"){
   $lang=array(
   "Duration"=>"Duration",
   "Adult"=>"Adult ",
   "Children"=>"Children",
   "Total_dep"=>"Total depart",
   "Total_rep"=>"Total return ",
   "Sum_total"=>"TOTAL PRICE",
   "DEPART"=>"DEPART ",
   "RETURN"=>"RETURN ",
   "Select"=>"Select",
   "Vehicle"=>"Vehicle",
   "Departure"=>"Departure",
   "Arrival"=>"Arrival",
   "round"=>"Round Trip",
   "oneway"=>"One Way",
   "date_dep"=>"Depart date",
   "date_rep"=>"Return date",
   "dep_txt"=>"Departure",
   "rep_txt"=>"Arrival",
   "SEARCH" =>"SEARCH",
   "tr_poly"=>"Please book 24 hour in advance"
   );

   }
   if($h_lg=="th" || $h_lg=="TH"){
   $lang=array(
   "Duration"=>"ระยะเวลา",
   "Adult"=>"ผู้ใหญ่ ",
   "Children"=>"เด็ก",
   "Total_dep"=>"รวมเงินขาไป",
   "Total_rep"=>"รวมเงินขากลับ ",
   "Sum_total"=>"ยอดชำระสุทธิ",
   "DEPART"=>"ขาไป ",
   "RETURN"=>"ขากลับ ",
   "Select"=>"เลือกรายการ",
   "Vehicle"=>"ยานพาหนะ",
   "Departure"=>"เวลาออก",
   "Arrival"=>"เวลาถึง",
   "round"=>"ขาไปขากลับ",
   "oneway"=>"ไปขาเดียว",
   "date_dep"=>"วันที่ขาไป",
   "date_rep"=>"วันที่ขากลับ",
   "dep_txt"=>"ต้นทาง",
   "rep_txt"=>"ปลายทาง",
   "SEARCH" =>"ค้นหา",
   "tr_poly"=>"กรุณาจองก่อนล่วงหน้า 24 ชม. เท่านั้น"
);
   }
   return $lang;

}


function package_lang($lg){
      $h_lg = $this->session->userdata('ch_lang');
   if($h_lg==""){$h_lg="en";};
   if($h_lg=="en" || $h_lg=="EN"){
   $lang=array(
   "find"=>"FIND PACKAGE TOURS",
   "SEARCH" =>"SEARCH",
   "UPDATE" =>"UPDATE",
   "Share" =>"Share"
   );

   }
   if($lg=="th" || $h_lg=="TH"){
   $lang=array(
   "find"=>"ค้นหาแพ็คเกจทัวร์",
   "SEARCH" =>"ค้นหา",
   "UPDATE" =>"อัพเดท",
   "Share" =>"แนะนำเพื่อน"
);
   }
   return $lang;
}

}


?>