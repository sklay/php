<?php
class Picture extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->helper('url');

		/**获取顶部及中间菜单*/
	}

	function index() {
		echo "picture" ;
		
/*		
		$this->data['webtitle']=$this->data['options']['webtitle'];
		$this->data['cateid']=0;

		$cateslug =$this->uri->segment(1,'') ;
		$pageindex=intval($this->uri->segment(2));

		$data = array(
			'category_id' =>$cateslug
		) ;

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
			$config['per_page'] = 4;
			$config['uri_segment'] = 2;
			$config['num_links'] = 10;
			$config['first_link'] = '第一页';
			$config['next_link'] = '下一页';
			$config['prev_link'] = '上一页';
			$config['last_link'] = '最后一页';
			$this->pagination->initialize($config);
			$this->data['page']=$this->pagination->create_links();

			$this->data['posts']=$this->Posts_m->get_list($cate->category_id,$pageindex,$config['per_page']);
			$this->load->view('web/picture',$this->data);
		}
*/
	}

	function view() {
		$picid=intval($this->uri->segment(2));
		$pid=intval($this->uri->segment(3));
		
		echo 'view' ;
		
		exit() ;
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

			$this->load->view('web/picture',$this->data);
		}else {
			Header("Location:".site_url());
			exit();
		}
	}
}