<?php
class Home extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		if(!$this->session->userdata('userid')){
			Header("Location:".site_url('admin/identity'));
			exit() ;
		}
	}
	function index() {
		$this->data['title'] = '后台管理登入';
		$this->data['meta_keywords'] = '后台管理登入';
		$this->data['meta_description'] = '后台管理登入';
			
		$this->load->view('admin/manage',$this->data);
	}
}