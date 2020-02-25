<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			
		if(!$this->input->cookie('template',true)){
			$this->input->set_cookie(array('name'=>'template','value'=>'1','expire' =>'86500'));
		}
	
	}
	
	public function layout1()
	{
		delete_cookie('template');
		$this->input->set_cookie(array('name'=>'template','value'=>'1','expire' =>'86500'));

		$data['content_view'] = 'web/home';
		$this->load->view('default1',$data);
	}
	
	public function layout2()
	{
		delete_cookie('template');
		$this->input->set_cookie(array('name'=>'template','value'=>'2','expire' =>'86500'));
		
		$data['content_view'] = 'web/home';
		$this->load->view('default2',$data);
	}
	
	public function webboard()
	{
		$data['content_data'] = array('q'=>$this->db->get('board_topic'));
		$data['content_view'] = 'web/webboard';
		$this->load->view('default'.$this->input->cookie('template',true),$data);
	}
	
	public function contact()
	{
		$data['content_view'] = 'web/contact';
		$this->load->view('default'.$this->input->cookie('template',true),$data);
	}
	
}
?>