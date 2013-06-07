<?php
class Home extends Ci_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
		header('Content-Type:text/html; charset=utf-8');
		$this->load->helper('url');
		$this->load->library('session');
		define('S_ROOT', substr(dirname(__FILE__), 0, -12));

		$this->load->model(array('M_page','M_widget','M_news','M_module')) ;
		$this->load->library(array('cismarty','event'));
		$index = 0 ;
		$data= array(
				'parent_id'=> NULL ,
				'can_show' => 0
		) ;

		$pageList = $this->M_page->findPages($data) ;
		$this->data['currentPage'] = $pageList[0] ;
		$this->data['currentPageId'] = $this->data['currentPage']->id ;
		foreach ( $pageList as $row) {
			$data= array(
					'parent_id'=> $row->id ,
					'can_show' => 0
			) ;
			$this->data['pages'][$index]->id = $row->id ;
			$this->data['pages'][$index]->alias = $row->alias ;
			$this->data['pages'][$index]->custom_css = empty($row->custom_css) ? '': $row->custom_css;
			$this->data['pages'][$index]->description = empty($row->description) ? '': $row->description ;
			$this->data['pages'][$index]->keywords =  empty($row->keywords) ? '': $row->keywords ;
			$this->data['pages'][$index]->layout =  empty($row->layout) ? '': $row->layout ;
			$this->data['pages'][$index]->name =  empty($row->name) ? '': $row->name ;
			$this->data['pages'][$index]->title =  empty($row->title) ? '': $row->title ;
			$this->data['pages'][$index]->children = $this->M_page->findPages($data) ;
			$this->data['pages'][$index]->parent =  empty($row->parent_id) ? '': $this->M_page->findOne(array('id'=>$row->parent_id)) ;
			$this->data['pages'][$index]->can_show =  empty($row->can_show) ? '': $row->can_show ;

			$index ++ ;
		}
		$index = 0 ;
		foreach ($this->M_module->getAll() as $module) {
			$this->data['module'][$module->name] = $module->ch_name ;
		}
	}

	function index(){

		$this->load->model('m_seting');
		$seting = $this->m_seting->getSeting(1) ;

		$alias= $this->uri->segment(1);
			
		if (!empty($alias)){
			$page = $this->M_page->findOne(array('alias'=>$alias));
			if(!isset($page) || empty($page)){
				Header("Location:".site_url());
				exit() ;
			}
			$this->data['currentPage'] = $page ;
			$this->data['currentPageId'] = $page->id ;
		}

		$page = $this->data['currentPage'] ;

		/** 模版路径  */
		$layoutPath = LAYOUT_PATH.DS.$page->layout ;

		$page_id = array(
				'page_id' => $page->id
		);
		$widgets = $this->M_widget->getWidgets($page_id);
		$containerMap = array();
		$result = '' ;

		foreach($widgets as $widget ) {

			$container = $widget->container;

			$widget = self::renderWidget($widget,$page) ;
			$widgetArray = array() ;

			if(array_key_exists($container, $containerMap)){
				$widgetArray =  $containerMap[$container] ;
			}
			array_push($widgetArray,$widget) ;
			$containerMap[$container]= $widgetArray;

		}

		$this->cismarty->assign('containerMap', $containerMap);

		$this->data['content'] = $this->cismarty->fetch('layout'.DS.$page->layout);


		if(empty($seting) || !$seting->open ){
			$this->load->view("web/wating",$this->data) ;
		}else {
			$this->load->tile('web' ,'web/page',$this->data) ;
		}
	}

	/**
	 * 新闻列表
	 * Enter description here ...
	 */
	public function news_list($widget){

		$this->cismarty->assign('comments', $this->M_news->getAll());
	}

	/**
	 * 新闻详情
	 */
	public function news_detail($widget){

	}

	/**
	 * 新闻管理
	 */
	public function news_manager($widget) {

		$types = $this->M_news->findAllType() ;
		$newsTypes = array() ;
		$newsType = '' ;
		if($types){
			foreach ($types as $t){

				$type = '' ;
				$type->owner = $t->owner ;
				$type->id = intval($t->id) ;
				$type->type = intval($t->type) ;
				$type->description = $t->description ;

				array_push($newsTypes, $type) ;
			}
		}
		$newsType = $newsTypes[0] ;

		$data = array('comment_type_id'=>$newsType->id) ;

		$widgetSetting = array('widget_id'=>$widget->id,'attr_key'=>'fetchSize') ;

		$pageSetting = $this->M_widget->findOneWidgetSetting($widgetSetting) ;
		$pageSize = !empty($pageSetting->attr_value) ? $pageSetting->attr_value : 2  ;

		$pageModel->pageSize = $pageSize ;
		$pageModel->total = ($newsType=='') ? 0 : $this->M_news->countComment($data);
		$pageModel->type = $newsType->id ;
		$pageModel->baseUrl = base_url() ;

		$this->cismarty->assign('newsTypes', $newsTypes);
		$this->cismarty->assign('newsType', $newsType);
		$this->cismarty->assign('pageModel', $pageModel);
		$this->cismarty->assign('currentPage', 'page');
	}

	/**
	 * 面包屑
	 * Enter description here ...
	 */
	public function breadcrumb_line($widget){

		$page = $this->data['currentPage'] ;

		if(!empty($page->parent_id)){
			$parent = $this->M_page->findOne(array('id'=>$page->parent_id)) ;
			$this->data['currentPage']->parent = $parent ;
		}
		$this->cismarty->assign('currentPage', $this->data['currentPage']);
		$this->cismarty->assign('ctx', base_url('index.php'));
	}

	/** iframe采集 **/
	public function gather_iframe($widget){

		$widget->settings =  self::renderWidgetSeting($widget) ;
		$this->cismarty->assign('widget', $widget);
	}

	/** proxy 代理采集**/
	public function gather_proxy($widget){

		$widget =  self::renderWidgetSeting($widget) ;

		$proxy_URI = $widget->settings->uri ;
		$proxy_METHOD = $widget->settings->method ;
		$proxy_CALL = $widget->settings->callback ;
		$content = '' ;
		if(!empty($proxy_URI)){
			include_once(S_ROOT.'/libraries/HttpClient.php');
			$client = new HttpClient($proxy_URI);
			$client->setDebug(false);
			if(strcasecmp('POST',$proxy_METHOD)== 0){
				$content = !$client->post('/') ? '<p>Request POST failed!</p>':$client->getContent() ;
			}else{
				$content = !$client->get('/') ? '<p>Request GET failed!</p>':$client->getContent() ;
			}
		}
		$this->cismarty->assign('widget', $widget);
		$this->cismarty->assign('content',$content);
	}

	/** 论坛列表**/
	public function forum_list($widget){
	}

	/** 论坛主题列表**/
	public function forum_topic($widget){
	}

	/** 留言板*/
	public function forum_talk($widget){
		$this->cismarty->assign('resource', base_url());
		$this->cismarty->assign('baseUrl', base_url());

	}

	/** 滚动条 滑块**/
	public function slider_flexSlider($widget){

		$this->cismarty->assign('resource', base_url().'resource/slider/');
		$widget_id = $widget->id ;
		$settings = $this->M_widget->findWidgetSetting(array('widget_id'=>$widget_id)) ;
		$widget->settings =  '' ;
		if(!empty($settings)){
			foreach ($settings as $set){
				$key = $set->attr_key ;
				$value = $set->attr_value ;
				if($key=='images' || $key == 'thumbnails'){
					$value = !empty($value) ? preg_split('/,/',$value): '';
					if(is_array($value)){
						$valueArray = array() ;
						foreach($value as $val){
							$_val = strpos($val,"http://") === 0 ? $val : base_url().$val ;
							array_push($valueArray, $_val) ;
						}
						$value = $valueArray ;
					}
				}
				$widget->settings->$key = $value;
			}
		}

		$this->cismarty->assign('widget', $widget);
		$this->cismarty->assign('ctx', base_url());
	}

	/** 滚动条 滑块**/
	public function slider_carousel($widget){

		$this->cismarty->assign('resource', base_url().'resource/slider/');
		$widget_id = $widget->id ;
		$settings = $this->M_widget->findWidgetSetting(array('widget_id'=>$widget_id)) ;
		$widget->settings =  '' ;
		if(!empty($settings)){
			foreach ($settings as $set){
				$key = $set->attr_key ;
				$value = $set->attr_value ;
				if($key=='images' || $key == 'thumbnails'){
					$value = !empty($value) ? preg_split('/,/',$value): '';
					if(is_array($value)){
						$valueArray = array() ;
						foreach($value as $val){
							$_val = strpos($val,"http://") === 0 ? $val : base_url().$val ;
							array_push($valueArray, $_val) ;
						}
						$value = $valueArray ;
					}
				}
				$widget->settings->$key = $value;
			}
		}

		$this->cismarty->assign('widget', $widget);
		$this->cismarty->assign('ctx', base_url());
	}

	public function team_summary($widget){

		$widget_id = $widget->id ;
		$settings = $this->M_widget->findWidgetSetting(array('widget_id'=>$widget_id)) ;
		$widget->settings =  '' ;
		if(!empty($settings)){
			foreach ($settings as $set){
				$key = $set->attr_key ;
				$value = $set->attr_value ;

				if($key=='images'){
					if(isset($value) && !empty($value)){
						$summarys = json_decode($value) ;
						$result = array() ;
						if(is_array($summarys) && count($summarys)>0){

							foreach ($summarys as $summary){
								$domain = $summary->domain ;
								$avatar = $summary->avatar ;
								if(!isset($domain) || empty($domain))
									$summary->domain = 'javascript:void(0) ;' ;
								else
									$summary->domain = strpos($domain,"http://") === 0 ? $domain : base_url().$domain ;
								if(isset($avatar) || !empty($avatar))
									$summary->avatar = strpos($avatar,"http://") === 0 ? $avatar : base_url().$avatar ;

								array_push($result, $summary) ;
							}
						}
					}
					$widget->settings->$key = $result;
				}
			}
		}
		$this->cismarty->assign('widget', $widget);
		$this->cismarty->assign('ctx', base_url());
	}

	public function team_tip($widget){

		$widget_id = $widget->id ;
		$settings = $this->M_widget->findWidgetSetting(array('widget_id'=>$widget_id)) ;
		$widget->settings =  '' ;
		if(!empty($settings)){
			foreach ($settings as $set){
				$key = $set->attr_key ;
				$value = $set->attr_value ;

				if($key=='tips'&& isset($value) && !empty($value)){
					$tips = json_decode($value) ;
					$tipInfo = $tips->tip ;
					$domain = $tips->domain ;
					if(!isset($domain) || empty($domain))
						$tips->domain = 'javascript:void(0) ;' ;
					else
						$tips->domain = strpos($domain,"http://") === 0 ? $domain : base_url().$domain ;
					
					if(isset($tipInfo) || !empty($tipInfo))
						$tips->tip = trim($tipInfo) ;
					
					$value = $tips ;
				}
				$widget->settings->$key = $value;
			}
		}

		$this->cismarty->assign('widget', $widget);
		$this->cismarty->assign('ctx', base_url());
	}


	/** 图片管理**/
	public function slider_manager($widget){
		$this->cismarty->assign('resource', base_url().'resource/slider/');
	}

	/** 游戏 象棋**/
	public function game_chess($widget){
	}

	/** 用户头像**/
	public function user_face($widget){
		$this->cismarty->assign('baseUrl', base_url());

	}

	private function  renderWidget($widget,$page){

		$widget_name = $widget->name ;
		$split_name = explode('.',$widget_name) ;
		$dir = $split_name[0] ;
		$name = $split_name[1] ;
		$tpl = $name.'.tpl' ;

		if(array_key_exists($widget_name,$this->data['module']))
			$widget->name = $this->data['module'][$widget_name] ;

		$fun_name = $dir.'_'.$name;

		$this->event-> bind($fun_name, array( $this,$fun_name ));
		$this->event-> trigger_async($fun_name,$widget);

		$temlpatePath = 'widget'.DS.$dir.DS.$tpl ;

		$widget->content = $this->cismarty->fetch($temlpatePath);

		$widget = self::split_border($widget,$page) ;


		return $widget ;
	}

	private function split_border($widget,$page){

		$border_tpl = $widget->border_tpl ;

		if(empty($border_tpl))
			return $widget_content ;

		$temlpatePath = 'border'.DS.$border_tpl ;

		$this->cismarty->assign('widget', $widget);
		$this->cismarty->assign('currentPage', $page);

		$widget_content = $this->cismarty->fetch($temlpatePath);

		$widget->content = $widget_content;

		return $widget ;
	}

	private function renderWidgetSeting($widget){

		$widget_id = $widget->id ;
		//	echo 'widget=>'.$widget_id ;
		$settings = $this->M_widget->findWidgetSetting(array('widget_id'=>$widget_id)) ;
		$widget->settings =  '' ;
		if(!empty($settings)){
			foreach ($settings as $set){
				$key = $set->attr_key ;
				$widget->settings->$key = $set->attr_value;
			}
		}

		return $widget ;
	}
}