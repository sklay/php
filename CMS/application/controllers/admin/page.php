<?php
class Page extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		header('Content-type: text/html; charset=utf-8');

		$this->load->helper('url','date');
		$this->load->library('session');
		$this->load->model(array('M_page','M_widget')) ;

		$index = 0 ;
		foreach ($this->M_page->getAll() as $row) {
			$this->data['pages'][$index]['id'] = $row->id ;
			$this->data['pages'][$index]['alias'] = $row->alias ;
			$this->data['pages'][$index]['custom_css'] = empty($row->custom_css) ? '': $row->custom_css;
			$this->data['pages'][$index]['description'] = empty($row->description) ? '': $row->description ;
			$this->data['pages'][$index]['keywords'] =  empty($row->keywords) ? '': $row->keywords ;
			$this->data['pages'][$index]['layout'] =  empty($row->layout) ? '': $row->layout ;
			$this->data['pages'][$index]['name'] =  empty($row->name) ? '': $row->name ;
			$this->data['pages'][$index]['title'] =  empty($row->title) ? '': $row->title ;
			$this->data['pages'][$index]['parent_id'] =  empty($row->parent_id) ? '': $row->parent_id ;
			$this->data['pages'][$index]['can_show'] =  empty($row->can_show) ? '': $row->can_show ;

			$index ++ ;
		}
	}

	public function index() {

		if(empty($this->data['pages'])){
			Header("Location:".site_url('admin/core/main'));
			exit();
		} else {
			$page = $this->data['pages'][0];
			$this->renderPage($page);
		}
	}


	public function create() {

		$this->data['title'] = 'title';
		$this->data['meta_keywords'] = 'meta_keywords';
		$this->data['meta_description'] = 'meta_description.';

		$pageId = $this->uri->segment(4) ;
		
		$this->data['param']->pageId = $pageId ;
		
		if (empty($pageId)){
			$data = array('id'=> $pageId) ;
			$this->data['currentPage'] = $this->M_page->findOne($data) ;
		}
		
		$this->load->view('web/pageCreate',$this->data);
		
	
	}

	public function createPage() {
		$pageId = isset($_POST['pageId']) ? trim($_POST['pageId']):'';
		$widgetName =  isset($_POST['widgetName']) ? trim($_POST['widgetName']):'';
		
		$pageName = isset($_POST['pageName']) ? trim($_POST['pageName']):'';
		$pageName = isset($_POST['pageName']) ? trim($_POST['pageName']):'';
		$pageName = isset($_POST['pageName']) ? trim($_POST['pageName']):'';
		$pageName = isset($_POST['pageName']) ? trim($_POST['pageName']):'';
		$pageName = isset($_POST['pageName']) ? trim($_POST['pageName']):'';
		$pageName = isset($_POST['pageName']) ? trim($_POST['pageName']):'';
		
		
		$this->data['title'] = 'title';
		$this->data['meta_keywords'] = 'meta_keywords';
		$this->data['meta_description'] = 'meta_description.';
	//	$this->load->view('web/page',$this->data,false);
		$this->data['param'] = '' ;
		$this->data['currentPage'] = '' ;
	//	$this->load->tile('web','web/pageCreate',$this->data);
		$this->load->view('web/pageCreate',$this->data);
	
	}
	
	public function layout(){

		/** 模版路径  */
		$layoutPath = LAYOUT_PATH ;
		$trim_suffix = true ;
		$suffix ='tpl' ;
		$this->data['layoutNames'] = $this->getFile($layoutPath,$trim_suffix ,$suffix) ;
		$this->data['title'] = 'title';
		$this->data['meta_keywords'] = 'sssss  sssaaaaa meta_keywords';
		$this->data['meta_description'] = 'meta_description.';

		//	foreach ($this->data['layoutNames'] as $row) {
		//		echo  'row =>'.$row.'<br/>' ;
		//	}

		//		$this->load->view('admin/core/layoutChange',$this->data);

		$this->load->tile('admin','admin/core/layoutChange',$this->data);
	}

	//获取文件目录列表,该方法返回数组
	function getDir($dir) {
		$dirArray[]=NULL;
		if (false != ($handle = opendir ( $dir ))) {
			$i=0;
			while ( false !== ($file = readdir ( $handle )) ) {
				//去掉"“.”、“..”以及带“.xxx”后缀的文件
				if ($file != "." && $file != ".."&&!strpos($file,".")) {
					$dirArray[$i]=$file;
					$i++;
				}
			}
			//关闭句柄
			closedir ( $handle );
		}
		return $dirArray;
	}

	//获取文件列表
	function getFile($dir,$trim_suffix,$suffix) {
		$fileArray[]=NULL;
		if (false != ($handle = opendir ( $dir ))) {
			$i=0;
			while ( false !== ($file = readdir ( $handle )) ) {
				//去掉"“.”、“..”以及带“.xxx”后缀的文件
				if ($file != "." && $file != ".."&&strpos($file,".")) {
					$fileArray[$i]=$trim_suffix==TRUE? preg_replace('/.'.$suffix.'/', '', $file):$file;
					if($i==100){
						break;
					}
					$i++;
				}
			}
			//关闭句柄
			closedir ( $handle );
		}
		return $fileArray;
	}

	// render page
	private function renderPage($page){
		$this->load->library('cismarty');
		$parmas = array(
			'parent_id'=>null
		);
		$this->data['pages'] = $this->M_page->findPages($parmas) ;
		$this->data['currentPage'] = $page ;
		//		sharedModel.put("pages", cmsService.findRootPages());
		//		sharedModel.put("currentPage", page);
		$page_id = array(
			'page_id' => $page['id']
		);
		$widgets = $this->M_widget->getWidgets($page_id);
		$containerMap = '';
		$fs = count($widgets) ;

		for ($i = 0; $i <  $fs; $i++) {

			$widget = $widgets[$i];

			$container = $widget->container;
			$containerMap[$container] = $widget;
			//	$widgets = $containerMap[$container];
			//	if($widgets == null){
			//		$containerMap[$container] = $widget;
			//	}
			//	$widgets[i]=$widget;
		}

		$this->data["containerMap"]= $containerMap;
		$this->data["content"]="content";
		/** 模版路径  */
		$layoutPath = LAYOUT_PATH.DS.$page['layout'] ;

		//	$code = file_get_contents($layoutPath);
		//	$this->data['content'] = $code;
		$this->cismarty->assign('containerMap', $containerMap);
		$this->data['content'] = $this->cismarty->fetch('layout'.DS.$page['layout']);

		$this->load->tile('admin','admin/core/page',$this->data);
	}
	
	
	
}