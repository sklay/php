<?php
class Contact extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->helper('url');
		//	$this->load->library('fckeditor', 'content');
		//	$this->fckeditor->Value = $some_object->content;
	}



	function index() {
		//	$data['fckeditor'] = $this->fckeditor->CreateHtml();
		$this->load->view('web/contact');
	}

	//function save($info){
	function save(){
		//	echo "参数 ——>".$info ;
		$content = $this->input->post('info') ;
		echo "common ->".$content ;
	}
}