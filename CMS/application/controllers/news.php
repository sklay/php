<?php
include_once 'entity/Types.php';

class News extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
		$this->load->helper(array('url','covert'));
		$this->load->model(array('M_news','M_widget')) ;
		$this->load->library(array('cismarty'));
		header('Content-Type:text/html; charset=utf-8');
	}

	function index(){
	}

	/**
	 * 新闻管理
	 */
	function manager() {

		$typeId = intval($this->uri->segment(3)) ;
		$widgetId = intval($this->uri->segment(4)) ;


		$data = array('comment_type_id'=>$typeId) ;
		$newsType = $this->M_news->findOneType(array('id'=>$typeId)) ;

		$widgetSetting = array('widget_id'=>$widgetId,'attr_key'=>'fetchSize') ;

		$pageSetting = $this->M_widget->findOneWidgetSetting($widgetSetting) ;
		$pageSize = isset($pageSetting->attr_value) ? $pageSetting->attr_value : 2  ;

		$pageModel->pageSize = $pageSize ;
		$pageModel->total = ($newsType == '') ? 0 : $this->M_news->countComment($data);
		$pageModel->type = $newsType->id ;
		$pageModel->baseUrl = base_url() ;

		$this->cismarty->assign('newsType', $newsType);
		$this->cismarty->assign('pageModel', $pageModel);

		$this->cismarty->display('widget'.DS.'pagination.tpl');

	}

	/**
	 * 获取新闻分页数据
	 */
	function page() {

		$pageSize =  intval($_POST['pageSize']) ;
		$pageLimit =  intval($_POST['pageLimit']) ;
		$comment_type =  intval($_POST['comment_type']) ;

		//	echo 'pageSize=>'.$pageSize.'pageLimit=>'.$pageLimit.'comment_type=>'.$comment_type ;

		$newsList= $this->M_news->getCommentPage($pageSize,$pageLimit,array('comment_type_id'=>$comment_type));

		echo json_encode($newsList) ;
	}

	/** 新闻详情**/
	function detail($newId) {
		$data=array(
				'article_id' =>$this->uri->segment(3)
		);
		$this->data['article']=$this->Article_m->get($data);
		if(empty($this->data['article'])){
			echo  '该文章不存在' ;
			exit() ;
		}

		$this->load->view('web/detail',$this->data);
	}

	/** 添加新闻**/
	function addNews(){
		$msg = new \entity\ResultMsg() ;

		$news_type = intval($_POST['comment_type']);
		$news_title = isset($_POST['title']) ? trim($_POST['title']):'';
		$news_contenr = isset($_POST['content']) ? trim($_POST['content']):'';

		if(empty($news_type)){
			$msg->msg = '新闻类型不能为空!' ;
			echo json_encode($msg) ;
			return  ;
		}
		if(empty($news_title)){
			$msg->msg = '新闻标题不能为空!' ;
			echo json_encode($msg) ;
			return  ;
		}
		$date = date("Y-m-d H:i:s") ;

		$news = new \entity\News_model() ;

		$news->title = $news_title ;
		$news->comment_type_id = $news_type ;
		$news->content = $news_contenr ;
		$news->create_at = $date ;
		$news->modify_at = $date ;
		$news->creator = 1 ;
		$news->modifier = 1 ;

		$this->M_news->createComment($news) ;

		$msg->code = 1 ;
		$msg->msg = '添加成功!' ;
		echo json_encode($msg) ;
			
		return  ;
	}

	function get($id){
		$newsId = intval($id) ;
		$msg = new \entity\ResultMsg() ;
		if($newsId){
			echo json_encode($msg) ;
			return ;
		}
		
		$news = $this->M_news->findOneComment(array('id' => $newsId)) ;

		$msg->code = 1 ;
		$msg->msg = "获取成功！" ;
		$msg->data = toNews($news) ;
		
		echo json_encode($msg) ;
	}

	function remove($id){
		$newsId = intval($id) ;
		$msg = new \entity\ResultMsg() ;
		if($newsId){
			echo json_encode($msg) ;
			return ;
		}
		
		$news = $this->M_news->removeComment(array($newsId)) ;
		
		$msg->code = 1 ;
		$msg->msg = "删除成功！" ;
		
		echo json_encode($msg) ;
	}
}