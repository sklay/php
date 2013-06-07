<?php

class Home extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		header('Content-type: text/html; charset=utf-8');
	}


	function index(){

		$this->load->library('cismarty');

		$this->cismarty->assign('containerMap', '');
		$this->data['code'] = '';

		/** 系统根路径  */
		$path = '' ;


		$this->load->tile('edit','admin/edit/page',$this->data);

	}

	function tree(){
		header('Content-Type:text/html; charset=utf-8');

		$this->load->view('admin/edit/tree') ;
	}

	function loadfile(){
		header('Content-Type:text/html; charset=utf-8');
		/** 文件路径  */
		$path = isset($_POST['path'])?$_POST['path']:'';
		$extend = empty($path) ? '' :pathinfo($path);
		$extend = empty($extend) ? '' :strtolower($extend["extension"]);

		$this->data['code'] = file_get_contents($path) ;
		$code = file_get_contents($path) ;
		$file['text'] = $code ;
		$file['syntax'] = $extend ;

		$this->load->view('admin/edit/page',$this->data) ;
		//echo json_encode($file) ;
	}

	function writefile(){
		header('Content-Type:text/html; charset=utf-8');
		/** 文件路径  */
		$path = isset($_POST['path'])?$_POST['path']:'';
		$content = isset($_POST['content'])?$_POST['content']:'';

		echo 'path =>'.$path.'<br/> content=>'.$content.'<br/>' ;

		exit() ;

		$size = file_put_contents($path, $content) ;

		$msg['state'] = $size > 0 ? 'succes' : '' ;
		echo json_encode($msg) ;
	}
	function treedata(){
		header('Content-Type:text/html; charset=utf-8');
		/** 文件路径  */
		$path = '' ;
		echo  $this->getFile($path) ;

	}


	//获取文件列表
	function getFile($dir) {

		$dir = empty($dir) ? ROOT.DS : ROOT.DS.$dir ;

		$fileArray =NULL;
		if (false != ($handle = opendir ( $dir ))) {
			$i = 0 ;
			$fileArray['id']= "1" ; //ID只能包含英文数字下划线中划线
			$fileArray['text']= '根目录';
			$fileArray['value']= '根目录';
			$fileArray['showcheck']= false;
			$fileArray['checkstate']= 1;         //0,1,2
			$fileArray['hasChildren']= true;
			$fileArray['isexpand']= true;
			$fileArray['complete']= true;//是否已加载子节点
			while ( false !== ($file = readdir ( $handle )) ) {
				//去掉"“.”、“..”以及带“.xxx”后缀的文件
				if($file != "." && $file != ".."){

					$fileArray['ChildNodes'][$i]['id']= "".(2+$i)."" ; //ID只能包含英文数字下划线中划线
					$fileArray['ChildNodes'][$i]['text']= $file;
					$fileArray['ChildNodes'][$i]['value']= $file;
					$fileArray['ChildNodes'][$i]['showcheck']= false;
					$fileArray['ChildNodes'][$i]['checkstate']= 1;         //0,1,2
					$fileArray['ChildNodes'][$i]['hasChildren']= is_dir($file);
					$fileArray['ChildNodes'][$i]['isexpand']= false;
					$fileArray['ChildNodes'][$i]['complete']= false; //是否已加载子节点
					$fileArray['ChildNodes'][$i]['ChildNodes']= '' ;
					$fileArray['ChildNodes'][$i]['src']= !is_dir($file) ? $dir.$file :'';
					$i ++ ;
				}

			}
			//关闭句柄
			closedir ( $handle );
		}
		$fileArrays[0] = $fileArray ;
		return json_encode($fileArrays);
	}
}