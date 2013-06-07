<?php
class Post extends CI_Controller {
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
		Header("Location:".site_url());
		exit();
	}

	function view() {
		$picid=intval($this->uri->segment(2));
		$pid=intval($this->uri->segment(3));
		if($picid>0) {
			$this->load->model('Posts_m');
			$this->Posts_m->update_hit($picid);
			$post=$this->Posts_m->get_byid($picid);
			$this->data['post']=$post;

			$this->data['cateid']=$post->post_category;
			$pictures=unserialize($post->post_pictures);
			$pic_count=count($pictures);

			$pid=$pid>($pic_count-1)?($pic_count-1):$pid;

			$this->load->library('pagination');
			$config['base_url'] = site_url('pictures/'.$picid);
			$config['total_rows'] = $pic_count;
			$config['per_page'] = 1;
			$config['uri_segment'] = 3;
			$config['num_links'] = 10;
			$config['first_link'] = '第一页';
			$config['next_link'] = '下一页';
			$config['prev_link'] = '上一页';
			$config['last_link'] = '最后一页';
			$this->pagination->initialize($config);
			$this->data['page']=$this->pagination->create_links();

			$this->data['pageindex']=$pid;
			$this->data['pictures']=$pictures;
			$this->data['webtitle']=$post->post_title.'_第'.($pid+1).'张 -- '.$this->data['options']['webtitle'];
			$this->data['hotlist']=$this->Posts_m->get_hot(15,$post->post_category);
			$this->data['newest']=$this->Posts_m->get_newest(15,$post->post_category);

			$this->load->view('post',$this->data);
		}else {
			Header("Location:".site_url());
			exit();
		}
	}
}