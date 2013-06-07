<?php

class Tree extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		header('Content-type: text/html; charset=utf-8');
	}

	function index(){

		header('Content-Type:text/html; charset=utf-8');

		$this->load->view('admin/edit/tree') ;
	}

	function loadfile(){
		header('Content-Type:text/html; charset=utf-8');
		/** 文件路径  */
		$path = isset($_POST['path'])?$_POST['path']:'';

		//	echo 'path = >'.$path;
		$extend = empty($path) ? '' :pathinfo($path);
		$extend = empty($extend) ? '' :strtolower($extend["extension"]);

		$this->data['code'] = file_get_contents($path) ;
		$code = file_get_contents($path) ;
		$file['text'] = $code ;
		$file['syntax'] = $extend ;

		$this->load->view('admin/edit/page',$this->data) ;
		//	echo json_encode($this->data['code']) ;
	}

	/**保存文件**/
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

	/**获取tree数据**/
	function treedata(){
		header('Content-Type:text/html; charset=utf-8');
		/** 文件路径  */
		$src = isset($_POST['src']) ? $_POST['src'].DS : '';
		$id = isset($_POST['id']) ? $_POST['id'] : 0;

		$is_root =empty($src) ? TRUE : FALSE ;
		echo  $this->getFile($src,$is_root,$id) ;

	}

	/**获取文件列表**/
	private function getFile($dir,$is_root,$dirId) {

		$dirPath = empty($dir) ? ROOT.DS : $dir ;
		if ( is_dir($dirPath) &&  false != ($handle = opendir ( $dirPath ))) {
			$arrays = array();
			$i = 0 ;
			while (false !== ($file = readdir ( $handle )) ) {
				//去掉"“.”、“..”以及带“.xxx”后缀的文件
				if($file != "." && $file != ".."){

					$file_dir = $dirPath.$file ;

					$id = ($dirId == 0) ? "".($i+1)."" : $dirId."-".($i+1)."" ; //ID只能包含英文数字下划线中划线
					$text = $file;
					$value = $file;
					$showcheck = TRUE;
					$checkstate = 0;         //0,1,2
					$hasChildren = is_dir($file_dir);;
					$isexpand = FALSE;
					$complete = FALSE;//是否已加载子节点
					$src = $dir.$file;
					$childNodes = '' ;

					$fileNode = $this->split_tree($id, $text, $value, $showcheck, $checkstate, $hasChildren, $isexpand, $complete, $childNodes, $src) ;

					array_push($arrays, $fileNode) ;
					$i++ ;
				}
			}
			//关闭句柄
			closedir ( $handle );
		}
		echo $this->split_json($arrays,$is_root);
	}

	/**拼接json对象**/
	private function split_json($arrays , $is_root){

		$fileArray = NULL ;
		$fileArrays = NULL ;

		if($is_root){
			$i = 1 ;
			$id = "".$i."" ; //ID只能包含英文数字下划线中划线
			$text = '根目录';
			$value = '根目录';
			$showcheck = true;
			$checkstate = 0;         //0,1,2
			$hasChildren = true;
			$isexpand = true;
			$complete = true;//是否已加载子节点
			$childNodes= $arrays;
			$src = ROOT.DS ;
			/** 拼装节点**/
			$fileArray = $this->split_tree($id, $text, $value, $showcheck, $checkstate, $hasChildren, $isexpand, $complete,$childNodes,$src) ;

			$fileArrays[0] = $fileArray ;
		}else{
			$fileArrays = $arrays ;
		}

		//	echo 'file=>'. json_encode($fileArrays) ; ;

		return json_encode($fileArrays);
	}

	/**拼接tree节点对象**/
	private function split_tree($id,$text,$value,$showcheck,$checkstate,$hasChildren,$isexpand,$complete,$childNodes,$src) {

		$file = '' ;

		$file['id']= "".$id."" ; //ID只能包含英文数字下划线中划线
		$file['text']= $text;
		$file['value']= $value;
		$file['showcheck']= $showcheck;
		$file['checkstate']= $checkstate;         //0,1,2
		$file['hasChildren']= $hasChildren;
		$file['isexpand']= $isexpand;
		$file['complete']= $complete;//是否已加载子节点
		$file['ChildNodes']= $childNodes ;
		$file['src']= $src ;

		return $file ;
	}
}