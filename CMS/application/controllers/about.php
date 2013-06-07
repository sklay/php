<?php
class About extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->helper('url');
		/**获取顶部菜单*/
		$category_type = CATEGORY_TYPE_TOP;
		$this->load->model('Options_m');
		$this->load->model('Category_m');
		$this->data['category_top']=$this->Category_m->get_list_type($category_type);

		foreach($this->Options_m->get_list() as $row) {
			$this->data['options'][$row->option_slug]=$row->option_value;
		} 
	}



	function index() {
		$this->data['webtitle']=$this->data['options']['webtitle'];

		$this->data['cateid']=0;

		$this->load->view('web/services',$this->data);
	}

}