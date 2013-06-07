<?php
class Widget extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library(array('session','event'));
		$this->load->model(array('M_module','M_widget')) ;
		//	$this->load->library(array('cismarty','event'));
		header('Content-Type:text/html; charset=utf-8');
	}

	function index() {
		$widgetInfoMap = $this->M_module->getAll() ;

		if(count($widgetInfoMap)>0){
			$manage_module = array() ;$index = 0 ;
			foreach ($widgetInfoMap as $widgetInfo){
				if($widgetInfo->level == 1){
					$manage_module[$index]->key = $widgetInfo->name ;
					$manage_module[$index]->value = $widgetInfo->ch_name ;
				}
			}
			$this->data['manage_module'] = $manage_module ;
		}

		$this->data['widgetInfoMap'] = $widgetInfoMap ;

		$this->load->view('web/widgetEdit',$this->data);
	}

	function initCreate(){

		$pageId = intval($this->uri->segment(3)) ;

		$widgetInfoMap = $this->M_module->getAll() ;

		if(count($widgetInfoMap)>0){
			$manage_module = array() ;
			foreach ($widgetInfoMap as $widgetInfo){
				$level = $widgetInfo->level ;
				$key = $widgetInfo->name ;
				$value = $widgetInfo->ch_name ;
				$show =  $widgetInfo->show ;
				$type =  $widgetInfo->type ;
				if($level == 1){
					$children = array() ;
					foreach ($widgetInfoMap as $widget){
						$sub_level = $widget->level ;
						$sub_key = $widget->name ;
						$sub_value = $widget->ch_name ;
						$sub_show =  $widget->show ;
						$sub_type =  $widget->type ;
						$sub_children = '' ;
						if($sub_level != 1 && $type == $sub_type){
							$sub_module = self::split_module($sub_key, $sub_value, $sub_type, $sub_show, $sub_children) ;
							if(!in_array($sub_module,$children))
								array_push($children,$sub_module) ;
						}
					}
					$module = self::split_module($key, $value, $type, $show, $children) ;
					array_push($manage_module,$module) ;
				}
			}
			$this->data['manage_modules'] = $manage_module ;
		}
		$this->load->view('web/widgetAdd',$this->data);

	}

	function initEdit(){

		$widget_id=intval($this->uri->segment(3));
		$widget = $this->M_widget->findOne(array('id'=>$widget_id)) ;
		$this->data['widget'] = $widget ;
		$widget_setings = $this->M_widget->findWidgetSetting(array('widget_id'=>$widget_id)) ;
		if(!empty($widget_setings)){
			$index = 0 ;
			$st = array() ;
			foreach ($widget_setings as $seting){
				$st[$index]->widget_id = $seting->widget_id ;
				$st[$index]->key = empty($seting->attr_key)? '' : trim($seting->attr_key) ;
				$st[$index]->value =empty($seting->attr_value) ? '' : trim($seting->attr_value) ;
				$index++ ;
			}
			$widget_setings = $st ;
		}
		$this->data['settings'] = $widget_setings ;
		$this->load->view('web/widgetEdit',$this->data);
	}

	function create(){
		$pageId = intval($_POST['pageId']);
		$widget_name = $_POST['widgetName'];
		$widget = self::initWidget($pageId, $widget_name) ;

		$widget_id = $this->M_widget->insert($widget) ;

		echo 'widget_id=>'.$widget_id ;
		/** 设置模块参数*/
		$fun_name =  str_replace(".","_",$widget_name);

		$this->event-> bind($fun_name, array( $this,$fun_name ));
		$this->event-> trigger($fun_name,$widget_id);
	}

	function edit(){

		$widget = !empty($_POST['widget'])? $_POST['widget']:'' ;
		if(!empty($widget)){
			$widget = json_decode($widget) ;
			$widget_id = intval($widget->id) ;

			$w_modify= array('title' => $widget->title
					,'border_tpl' => $widget->borderTpl
					,'border_class' => $widget->borderClass
			) ;
			$this->M_widget->update($w_modify,$widget_id) ;

			$w_setings = $widget->settings ;
			if(!empty($w_setings)){
				foreach ($w_setings as $w_key => $w_value){
					if(!empty($w_key)){
						$setting = array('attr_value'=>$w_value) ;
						$set_where =  array('widget_id'=>$widget_id,'attr_key'=>trim($w_key)) ;
						$this->M_widget->updataWidgetSetting($setting,$set_where) ;
					}
				}
			}
		}
	}

	function remove(){
		$widget_id=intval($_POST['widgetId']);
		if($widget_id>0){
			$this->M_widget->removeSetting(array('widget_id'=>$widget_id)) ;
			$this->M_widget->removeWidget(array('id'=>$widget_id)) ;
		}
	}

	function sort(){

		$widgetSorts = !empty($_POST['widgets']) ? trim($_POST['widgets']):'';

		$widgetSorts = json_decode($widgetSorts) ;

		$set_where = 'id';
		$set_data = array() ;

		if($widgetSorts){
			foreach ($widgetSorts as $widgetSort){
				$widget_id = $widgetSort -> id ;
				$widget_rank = $widgetSort -> rank ;
				$widget_container = !empty($widgetSort -> container) ? $widgetSort -> container:'' ;

				$widget_data = empty($widget_container)? array('id'=>$widget_id ,'rank'=>$widget_rank) : array('id'=>$widget_id ,'rank'=>$widget_rank,'container'=>$widget_container) ;

				array_push($set_data, $widget_data) ;
			}
			$this->M_widget->setSort($set_data,$set_where) ;
		}
	}

	private function initWidget($pageId , $widgetName){

		$widget= array('page_id' => $pageId ,
				'name' => $widgetName ,
				'border_tpl' => 't-c-f.tpl' ,
				'container' => 'row0' ,
				'rank' => -1
		) ;

		return $widget ;
	}

	private function split_module($key,$value,$type,$show,$children){
		$module->key = $key ;
		$module->value = $value ;
		$module->type = $type ;
		$module->show = $show ;
		if(!empty($children))
			$module->children = $children ;

		return $module ;
	}

	//[WidgetSetting]

	/** 新闻列表参数设置**/
	public function news_list($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'type','attr_value'=>'')
				,array('widget_id'=>$widget_id ,'attr_key'=>'style','attr_value'=>'')
				,array('widget_id'=>$widget_id ,'attr_key'=>'template','attr_value'=>'list.tpl')
				,array('widget_id'=>$widget_id ,'attr_key'=>'fetchSize','attr_value'=>'10')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** 新闻管理参数设置**/
	public function news_manager($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'pageSize','attr_value'=>'10')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** 论坛列表**/
	public function forum_list($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'size','attr_value'=>'10')
				,array('widget_id'=>$widget_id ,'attr_key'=>'style','attr_value'=>'11')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** iframe采集**/
	public function gather_iframe($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'url','attr_value'=>'')
				,array('widget_id'=>$widget_id ,'attr_key'=>'width','attr_value'=>'100%')
				,array('widget_id'=>$widget_id ,'attr_key'=>'height','attr_value'=>'100%')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** proxy 代理采集**/
	public function gather_proxy($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'uri','attr_value'=>'')
				,array('widget_id'=>$widget_id ,'attr_key'=>'method','attr_value'=>'GET')
				,array('widget_id'=>$widget_id ,'attr_key'=>'callback','attr_value'=>'')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** 滚动 滑块**/
	public function slider_flexSlider($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'images','attr_value'=>'resource/slider/demo/slide1.jpg,resource/slider/demo/slide2.jpg,resource/slider/demo/slide3.jpg')
				,array('widget_id'=>$widget_id ,'attr_key'=>'thumbnails','attr_value'=>'')
				,array('widget_id'=>$widget_id ,'attr_key'=>'itemWidth','attr_value'=>'')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** 滚动 滑块**/
	public function slider_carousel($widget_id){
		$setting = array(
				array('widget_id'=>$widget_id ,'attr_key'=>'images','attr_value'=>'resource/slider/demo/slide1.jpg,resource/slider/demo/slide2.jpg,resource/slider/demo/slide3.jpg')
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	/** 面包屑**/
	public function breadcrumb_line($widget_id){
	}

	public function team_summary($widget_id){

		$list = array(

				array(
						'title' => '量身打造' ,
						'description' => '当考虑重新设计你的公司网站,您所需要做的事,就是研究什么是你想要的。这是您唯一需要做的。' ,
						'domain' => '',
						'avatar' => 'resource/team/team-1.jpg'
				),
				array(
						'title' => '完美的云计算' ,
						'description' => '云服务帮助您自由、快速地实现内部流程，让它们有条不紊地运行。而你只需要关注统计结果，来辅佐您的决策。' ,
						'domain' => '',
						'avatar' => 'resource/team/team-2.jpg'
				),
				array(
						'title' => '个性化' ,
						'description' => '我们提供一些简单的步骤，来完成某些典型业务的个性化，这为您后续的业务调整提供便利。' ,
						'domain' => '',
						'avatar' => 'resource/team/team-3.jpg'
				),
				array(
						'title' => '快速响应' ,
						'description' => '您可以通过设置电子邮件、手机的预警来监控您的业务，这让一切繁杂变得更简单、放心。' ,
						'domain' => '',
						'avatar' => 'resource/team/team-4.jpg'
				)
		);

		$defaultData = array() ;
		$defaultData['widget_id'] = $widget_id ;
		$defaultData['attr_key'] = images ;
		$defaultData['attr_value'] = json_encode($list) ;

		$setting = array(
				$defaultData
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}

	public function team_tip($widget_id){

		$list = array(
				'tip' => '欢迎来到SKLAY(天籁)官方首页，我们为您提供个人、企业软件的个性化解决方案。' ,
				'domain' => base_url()
		);

		$defaultData = array() ;
		$defaultData['widget_id'] = $widget_id ;
		$defaultData['attr_key'] = 'tips' ;
		$defaultData['attr_value'] = json_encode($list) ;

		$setting = array(
				$defaultData
		) ;
		$this->M_widget->insert_batch_WidgetSetting($setting) ;
	}
	//[WidgetSetting End]

}