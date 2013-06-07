<?php
class Identity extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url','date');
		header('Content-Type:text/html; charset=utf-8');
	}

	function index(){
		$this->data['title'] = '后台管理登入';
		$this->data['meta_keywords'] = '后台管理登入';
		$this->data['meta_description'] = '后台管理登入';

		if($this->session->userdata('userid')){
			Header("Location:".site_url('admin/manage'));
			exit() ;
		}
		$this->load->view('admin/index',$this->data);
	}

	/** 用户登入*/
	public function login() {
		/** 获取用户名  */
		$login_name = isset($_POST['login_name']) ? trim($_POST['login_name']):'';
		/** 获取密码 */
		$login_pwd = isset($_POST['login_pwd']) ? trim($_POST['login_pwd']):'';

		debug_log('$login_name=>'.$login_name) ;
		/** 网络异常 **/
		$rsult = 3 ;

		/** 请填入邮箱或密码 **/
		if(empty($login_name) || empty($login_pwd))
		$rsult = 1;
		/** 请输入正确的邮箱**/
		//	else if(ereg("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+",$login_name))
		//	$rsult = 2;
		else {
			$this->load->model("M_user") ;
			$user = $this->M_user->check_login($login_name,md5($login_pwd)) ;
			if(count($user)){
				$rsult = 1;
				//	$token = parent::gen_token() ;
				$current_date = date("Y-m-d H:i:s") ;
				$this->session->set_userdata(array('userid'=>$user->id ,'login_time'=> $current_date ,'nick_name'=>$user->nick_name));
				Header("Location:".site_url('admin/home'));
			}
			else {
				$rsult = 0;
			}
		}
		debug_log('$rsult=>'.$rsult) ;
		echo $rsult ;
	}

	function regist(){
		header('Content-type: text/html; charset=utf-8');
		$data['title'] = 'title';
		$data['meta_keywords'] = 'meta_keywords';
		$data['meta_description'] = 'meta_description.';

		$this->load->view('admin/regist' ,$this->data) ;

	}

	function logout() {
		$this->load->library('session');
		$this->load->model('History_m');

		$current_date = date("Y-m-d H:i:s") ;
		$login_time = $this->session->userdata('login_time') ;
		$user_id = $this->session->userdata('userid') ;
		if(isset($login_time) && isset($user_id)){
			$data = array(
			 'logout_time' => $current_date
			) ;
			$this->History_m->update($user_id,$login_time,$data) ;
		}

		$this->session->sess_destroy();
		Header("Location:".site_url('admin/login'));
	}


	function check() {

		$username=isset($_POST['username'])?$_POST['username']:'';
		$passwords=isset($_POST['passwords'])?$_POST['passwords']:'';

		$this->load->model('User_m');
		$user=$this->User_m->check_login($username,$passwords);
		if(count($user)<=0) {
			$this->data['err']='错误：用户名或密码不正确。';
			$this->load->view('admin/login',$this->data);
		}else {
			$this->load->model('History_m');
			$current_date = date("Y-m-d H:i:s") ;
			$data = array(
			 'login_expore' => isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '',
			 'uid' => $user->uid, 
			 'login_time' => $current_date, 
			 'login_user_type' => $user->user_type, 
			 'login_ip' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '' 
			 ) ;

			 $this->History_m->insert($data) ;
			 $this->session->set_userdata(array('userid'=>$user->uid ,'login_time'=> $current_date));
			 Header("Location:".site_url('admin/home'));
		}
	}
}