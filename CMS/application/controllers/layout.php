<?php
class Layout extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		header('Content-type: text/html; charset=utf-8');
		$this->load->model(array('M_page','M_widget')) ;
		$this->load->helper('url','date');
		$this->load->library('session');

	}

	public function index() {


	}

	public function initLay(){

		/** 模版路径  */
		$layoutPath = LAYOUT_PATH ;
		$trim_suffix = true ;
		$suffix ='tpl' ;
		$this->data['layoutNames'] = self::getFile($layoutPath,$trim_suffix ,$suffix) ;

		$this->load->view('web/layoutChange',$this->data);
	}

	public function change(){
		$pageId = intval($_POST['pageId']) ;
		$newLayout = $_POST['newLayout'] ;


		echo 'pagrId=>'.$pageId.'  lay =>'.$newLayout ;
		$page = $this->M_page->findOne(array('id'=>$pageId)) ;
		if($page->layout != $newLayout){
			$newRows = preg_split('/-/',str_replace('_', '-', $newLayout)) ;
			$oldRows = preg_split('/-/',str_replace('_', '-', $page->layout)) ;

			if(count($newRows)<count($oldRows)){
				//update widgets' container
				$widget_modify = array() ;
				$maxIndex = count($newRows)-1;
				$widgets = $this->M_widget->getWidgets(array('page_id'=>$pageId)) ;
				if (!empty($widgets)){
					foreach ($widgets as $widget){
						$w_modify = array() ;
						$container = $widget->container ;
						//skip 'row'
						$containerIndex = intval(substr($container, 3));
						if($containerIndex > $maxIndex){
							$w_modify->container = "row"+maxIndex ;
							$w_modify->id = $widget->id ;
							array_push($widget_modify,$w_modify) ;
						}
					}
					if(!empty($widget_modify)){
						$this->M_widget->batch_updataWidget($widget_modify,'id') ;
					}
				}
			}
			$this->M_page->update(array('layout'=>$newLayout),array('id'=>$page->id)) ;
		}
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

}