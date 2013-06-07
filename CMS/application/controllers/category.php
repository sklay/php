<?php
class Category extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
		$this->load->helper('url');

		$this->load->model('Options_m');
		foreach($this->Options_m->get_list() as $row) {
			$this->data['options'][$row->option_slug]=$row->option_value;
		}
		$this->load->model('Category_m');
		$this->data['category']=$this->Category_m->get_list();
	}


	function index() {
			
		$pageindex=intval($this->uri->segment(2));
		$cateslug=$this->uri->segment(1,'');
		$cate = $this->Category_m->get_byslug($cateslug);
		$this->data['cate']=$cate;
		if($cate!='') {
			$this->data['cateid']=$cate->category_id;
		}else {
			$this->data['cateid']=0;
		}

		if(count($cate)<=0) {
			Header("Location:".site_url());
			exit();
		}else {
			$this->load->model('Posts_m');
			$this->load->library('pagination');
			$config['base_url'] = site_url($cateslug);
			$config['total_rows'] = $this->Posts_m->get_count($cate->category_id);
			$config['per_page'] = 20;
			$config['uri_segment'] = 2;
			$config['num_links'] = 10;
			$config['first_link'] = '第一页';
			$config['next_link'] = '下一页';
			$config['prev_link'] = '上一页';
			$config['last_link'] = '最后一页';
			$this->pagination->initialize($config);
			$this->data['page']=$this->pagination->create_links();

			$this->data['webtitle']=$cate->category_name.'_第'.(($pageindex/$config['per_page'])+1).'页 -- '.$this->data['options']['webtitle'];
			$this->data['posts']=$this->Posts_m->get_list($cate->category_id,$pageindex,$config['per_page']);
			$this->load->view('category',$this->data);
		}
	}

}
