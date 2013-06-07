<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Face extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper ( array ('image_dir', 'url', 'cookie','email') );
		header('Content-type: text/html; charset=utf-8');
	}

	public function index(){
		$data['base_url']=$this->config->item('base_url');
		$this->load->view('cmsphp',$data);
	}

	/** 上传图片*/
	public function saveavater(){
		$base_url = $this->config->item('base_url') ;
		$action = $this->uri->segment(4) ;
		$user_id  = rand(1000,9999);	//用户ID可以从Session里获取
		$rs = array();
		switch($action){
			//上传临时图片
			case 'uploadtmp':
				$file = 'uploadtmp.jpg';
				@move_uploaded_file($_FILES['Filedata']['tmp_name'], $file);
				$rs['status'] = 1;
				$rs['url'] =$base_url. '/resource/' . $file;
				//file_put_contents("D:\\sina1.txt",$rs['url'],FILE_APPEND);
				break;
				//上传切头像
			case 'uploadavatar':
				
				$input = file_get_contents('php://input');
				$data = explode('--------------------', $input);
				debug_log(count($data)) ;
				//设置上传目录
				$upload_dir = 'user_avatar';
				$dir = UploadPath($upload_dir,$user_id);
				//小图
				$file_name_s = $dir.'/'.$user_id.'_s.jpg';
				//大图
				$file_name = $dir.'/'.$user_id.'.jpg';
				//生成你要的文件路径和名字开始
				@file_put_contents($file_name_s, $data[0]);
				@file_put_contents($file_name, $data[1]);
				
				$thumb_size = array(
						array('width'=>74 , 'height'=> 90)
						,array('width'=>65 , 'height'=> 80)
						) ;
				self::face_thumb($dir, $user_id.'_s.jpg', $user_id, $thumb_size) ;
				//生成你要的文件路径和名字结束
				//写到数据库
				$pic_path = $upload_dir.'/'.date("Y",time()).'/'.date("m",time()).'/'.$user_id.'/'.$user_id.'.jpg';
				
				//写入成功了$rs['status'] = 1;
				//演示用
				//$this->session->set_userdata('pic_path', $pic_path);
				//返回状态
				$rs['status'] = 1;

				break;
			default:
				$rs['status'] = -1;
		}
		print json_encode($rs);
	}
	
	/** 预览*/
	public function show(){
		$base_url=$this->config->item('base_url');
		$pic_path= $this->session->userdata('pic_path');
		$pic_path_s=get_thumb_pic($pic_path,s);
		$image_url  = $base_url.'resource/'.$pic_path;
		$image_url_s= $base_url.'resource/'.$pic_path_s;
		echo $image_url_s.'#'.$image_url;
	}

	/** 缩略图处理**/
	private function face_thumb($source_path , $source_img , $user_id, $thumb_size){
		
		/** 图片压缩处理*/
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['source_image'] = $source_path.'/'.$source_img;
		
		if(isset($thumb_size) && is_array($thumb_size)){
			$i = 0 ;
			foreach ($thumb_size as $thumb){
				$config['new_image'] =  $source_path.'/'.$user_id.'_'.$i.'.jpg';
				$config['width'] = $thumb['width'];
				$config['height'] = $thumb['height'];
				$this->image_lib->initialize($config);
				$this->image_lib->resize() ;
				$i++ ;
			}
		}
		
	}

}
