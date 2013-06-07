<?php

include_once 'entity/Types.php';

class Page extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		header('Content-type: text/html; charset=utf-8');

		$this->load->helper('url','date');
		$this->load->library('session');
		$this->load->model(array('M_page','M_widget')) ;

	}

	public function index() {

	}

	/**
	 * 初始化创建页面
	 */
	public function initCreate() {

		$this->data['title'] = 'title';
		$this->data['meta_keywords'] = 'meta_keywords';
		$this->data['meta_description'] = 'meta_description.';

		$pageId = intval($this->uri->segment(3)) ;

		$this->data['param']->pageId = $pageId ;

		if (empty($pageId)){
			$data = array('id'=> $pageId) ;
			$this->data['currentPage'] = $this->M_page->findOne($data) ;
		}

		$this->load->view('web/pageCreate',$this->data);


	}

	/**
	 * 初始化修改页面
	 */
	public function initEdit(){

		$pageId = intval($this->uri->segment(3)) ;

		$this->data['param']->pageId = $pageId ;
		if ($pageId>0){
			$data = array('id'=> $pageId) ;
			$this->data['currentPage'] = $this->M_page->findOne($data) ;
		}

		$this->load->view('web/pageEdit',$this->data);
	}

	/** 修改*/
	public function edit() {
		$rst = new \entity\ResultMsg() ;

	//	$r = new \entity\Result() ;
		
		$pageId = isset($_POST['pageId']) ? intval(trim($_POST['pageId'])):'';
		$pageName = isset($_POST['name']) ? trim($_POST['name']):'';
		$pageTitle = isset($_POST['title']) ? trim($_POST['title']):'';
		$alias = isset($_POST['alias']) ? trim($_POST['alias']):'';
		$description = isset($_POST['description']) ? trim($_POST['description']):'';
		$keywords = isset($_POST['keywords']) ? trim($_POST['keywords']):'';
		$customCss = isset($_POST['customCss']) ? trim($_POST['customCss']):'';

		if(!isset($pageId)){
			$rst->msg = '页面Id不存在' ;
			echo json_encode($rst) ;
			return  ;
		}
		$data = array('id'=> $pageId) ;
		$page = $this->M_page->findOne($data) ;

		if(!isset($page)){
			$rst->msg  = '页面Id不存在' ;
			echo json_encode($rst) ;
			return  ;
		}
		$data = array() ;
		$existAlias = 0 ;
		if($page->alias != $alias){
			$existAlias = $this->M_page->findAliasCount(array($pageId),$alias) ;
			$data = array(
				  'name' => $pageName 
			, 'title' => $pageTitle
			, 'alias' => $alias
			, 'keywords' => $keywords
			, 'description' => $description
			, 'custom_css' => $customCss
			) ;
		}else {
			$data = array(
				  'name' => $pageName 
			, 'title' => $pageTitle
			, 'keywords' => $keywords
			, 'description' => $description
			, 'custom_css' => $customCss
			) ;
		}
		if($existAlias){
			$rst->msg = $alias.'别名已存在' ;
			echo json_encode($rst) ;
			return ;
		}
		$where = array( 'id' => $page->id) ;
		$this->M_page->update($data,$where) ;

		$rst->msg = '修改成功' ;
		$rst->code = 1 ;
		$rst->url = site_url('index.php/'.$alias);
		echo json_encode($rst) ;
		return ;
	}

	/**
	 * 创建新页
	 *
	 */
	public function create() {
		$rst = new \entity\ResultMsg() ;
		
		$parentPageId = isset($_POST['parentPageId']) ? intval(trim($_POST['parentPageId'])):'';
		$widgetName =  isset($_POST['widgetName']) ? trim($_POST['widgetName']):'';

		$pageName = isset($_POST['name']) ? trim($_POST['name']):'';
		$pageTitle = isset($_POST['title']) ? trim($_POST['title']):'';
		$alias = isset($_POST['alias']) ? trim($_POST['alias']):'';
		$description = isset($_POST['description']) ? trim($_POST['description']):'';
		$keywords = isset($_POST['keywords']) ? trim($_POST['keywords']):'';
		$isCopy = isset($_POST['copy']) ? trim($_POST['copy']):'';
		$isChildren = isset($_POST['isChildren']) ? trim($_POST['isChildren']):'';

		$page = self::returnPage($parentPageId, $pageName, $pageTitle, $isCopy,$description ,$keywords) ;
		$pageId = 0 ;
		if(isset($isChildren) && !empty($isChildren))
		$page['parent_id'] = $parentPageId ;
		if(isset($alias) && !empty($alias)){
			$existAlias = $this->M_page->findAliasCount(NULL,$alias) ;
			if($existAlias){
				$rst->msg = "别名：".$alias.' 已经存在!'; 
				echo json_encode($rst) ;
				return  ;
			}
			$page['alias'] = $alias;
			
			$pageId = $this->M_page->insert($page) ;
			$rst->code  = 1 ;
			$rst->msg = '添加陈功!';
			$rst->url = site_url('index.php/'.$alias);
			echo json_encode($rst) ;
			return  ;
		}else{
			$pageId = $this->M_page->insert($page) ;
			$alias = $pageId;
			$data=array(
				'alias' => $pageId
			);
			$where=array('id'=>$pageId) ;
			$this->M_page->update($data,$where) ;
			
			$rst->code  = 1 ;
			$rst->msg = '添加陈功!';
			$rst->url = site_url('index.php/'.$alias);
			echo json_encode($rst) ;
		}
	}

	/** 删除页面**/
	public function remove($pageId = 0){
	
		if(isset($pageId) && !empty($pageId) && intval($pageId)){
			
			$data = array('id'=> $pageId) ;
			$page = $this->M_page->findOne($data) ;
			
			$this->M_page->remove(array($pageId)) ;
			Header("Location:".site_url());
			exit() ;
		}
	
	}

	private function curPageURL() {
		$pageURL = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	private function copyWidget($isCopy,$parentId , $targetPageId){
		
	}
	
	private function returnPage($pageId ,$pageName,$pageTitle,$isCopy,$description ,$keywords){
		$page =array() ;
		if($isCopy){
			$data = array('id'=> $pageId) ;
			$copy_page = $this->M_page->findOne($data) ;

			$page =  array(
					'custom_css' => $copy_page->custom_css | '' ,
					'description' => $copy_page->description  | $description ,
					'keywords' => $copy_page->keywords  | $keywords ,
					'layout' => $copy_page->layout | '1-1.tpl' ,
					'name' => $copy_page->name  | $pageName ,
					'title' => $copy_page->title | $pageTitle ,
					'can_show' => 0
			) ;
		}else{

			$page =  array(
					'custom_css' => '' ,
					'description' => $description ,
					'keywords' => $keywords ,
					'layout' => '1-1.tpl' ,
					'name' => $pageName ,
					'can_show' => 0,
					'title' => $pageTitle
			) ;
		}
		return $page ;
	}
}