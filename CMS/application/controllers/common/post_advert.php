<?php

// If you want to ignore the uploaded files,
// set $demo_mode to true;


class Post_advert extends CI_Controller {

	private $demo_mode = false;
	private $allowed_ext = array('jpg','jpeg','png','gif');

	function  __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->helper(array('url','date','image_dir'));
		header('Content-Type:text/html; charset=utf-8');
	}

	function index(){

		if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
			self::exit_status('Error! Wrong HTTP method!');
		}
		if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){

			$pic = $_FILES['pic'];
			$pic_extension = self::get_extension($pic['name']) ;
			if(!in_array($pic_extension,$this->allowed_ext)){
				self::exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
			}

			if($this->demo_mode){
				// File uploads are ignored. We only log them.
				$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
				file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);

				self::exit_status('Uploads are ignored in demo mode.');
			}

			// Move the uploaded file from the temporary
			// directory to the uploads folder:
			//设置上传目录
			$upload_dir = 'advert';
			$user_id  = rand(1000,9999);
			$dir = UploadPath($upload_dir,$user_id);
			$path = $dir.'/'.$user_id.'.'.$pic_extension ;
			if(move_uploaded_file($pic['tmp_name'], $path)){
				self::exit_status('File was uploaded successfuly!');
			}
		}

		self::exit_status('Something went wrong with your upload!');
	}

	// Helper functions
	function exit_status($str){
		echo json_encode(array('status'=>$str));
		exit;
	}

	function get_extension($file_name){
		$ext = explode('.', $file_name);
		$ext = array_pop($ext);
		return strtolower($ext);
	}
}