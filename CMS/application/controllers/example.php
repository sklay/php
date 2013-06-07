<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Drew Harvey (http://www.daharveyjr.com/) 
 */
class Example extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
	}

	public function index() {
	
		/*
		 * These variables are meant to be populated from the content
		 * of the page currently in view, and will most likely be dynamically
		 * generated, depending upon your application.
		 */
		$data['title'] = 'CodeIgniter Tiles Plugin Example';
		$data['meta_keywords'] = 'codeigniter, tiles, plugin';
		$data['meta_description'] = 'This page serves as an example showing the implementation of the CodeIgniter Tiles plugin by Drew Harvey.';
		
		$this->load->tile('test2', 'example/example_index.php', $data);
	
	}

}

/* End of file example.php */
/* Location: ./application/controllers/example.php */