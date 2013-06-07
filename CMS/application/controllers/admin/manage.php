<?php
class Manage extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url','date');
		header('Content-Type:text/html; charset=utf-8');

		if(!$this->session->userdata('userid')){
			Header("Location:".site_url('admin/identity'));
			exit() ;
		}
	}

	function index(){
		$this->data['title'] = '后台管理登入';
		$this->data['meta_keywords'] = '后台管理登入';
		$this->data['meta_description'] = '后台管理登入';

		$this->load->tile('admin', 'admin/page', $this->data);
	}



}