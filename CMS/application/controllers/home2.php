<?php

class Home extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		define('S_ROOT', substr(dirname(__FILE__), 0, -12));

		$this->load->model(array('M_page','M_widget')) ;

		$index = 0 ;
		
		$data= array(
			'parent_id'=> NULL ,
			'can_show' => 1 
		) ;
		
		foreach ($this->M_page->findPages($data) as $row) {
			
			$data= array(
				'parent_id'=> $row->id ,
				'can_show' => 1 
			) ;
			$this->data['pages'][$index]['id'] = $row->id ;
			$this->data['pages'][$index]['alias'] = $row->alias ;
			$this->data['pages'][$index]['custom_css'] = empty($row->custom_css) ? '': $row->custom_css;
			$this->data['pages'][$index]['description'] = empty($row->description) ? '': $row->description ;
			$this->data['pages'][$index]['keywords'] =  empty($row->keywords) ? '': $row->keywords ;
			$this->data['pages'][$index]['layout'] =  empty($row->layout) ? '': $row->layout ;
			$this->data['pages'][$index]['name'] =  empty($row->name) ? '': $row->name ;
			$this->data['pages'][$index]['title'] =  empty($row->title) ? '': $row->title ;
			$this->data['pages'][$index]['children'] = $this->M_page->findPages($data) ;
			$this->data['pages'][$index]['parent_id'] =  empty($row->parent_id) ? '': $row->parent_id ;
			$this->data['pages'][$index]['can_show'] =  empty($row->can_show) ? '': $row->can_show ;

			$index ++ ;
		}
	}

	function index(){

		$this->load->model('m_seting');
		$seting = $this->m_seting->getSeting(1) ;
		$this->data['title'] = 'CodeIgniter Tiles Plugin Example';
		$this->data['meta_keywords'] = 'codeigniter, tiles, plugin';
		$this->data['meta_description'] = 'This page serves as an example showing the implementation of the CodeIgniter Tiles plugin by Drew Harvey.';
		
		if(empty($seting) || !$seting->open ){
			$this->load->view("web/wating",$this->data) ;
		}else {
			$this->load->tile('web' ,'web/page',$this->data) ;
		}
	}

		function setup_index(){

			$configfile = S_ROOT.'/config/database.php';
			if(!@include_once($configfile)){
				@include_once($configfile);
				$this->show_msg('您需要首先将程序根目录下面的 "config/database.new.php" 文件重命名为 "config.php"', 999);
			}

			$theurl = 'index.php';
			$sqlfile = S_ROOT.'/install/data/install.sql';

			$nowarr = array('','','','','','','');
			$nowtable = array('none','none','none','none','none','none','none');
			if(!file_exists($sqlfile)) {
				$this->show_msg('请上传最新的 install.sql 数据库结构文件到程序的 ./install/data 目录下面，再重新运行本程序', 999);
			}


			$lockfile = S_ROOT.'/data/install.lock';
			//$lockfile = S_ROOT.'/data/install.txt';
			/** 验证是否已经安装*/
			if(file_exists($lockfile)) {
				$this->show_msg('警告!您已经安装过UCenter Home<br>
		为了保证数据安全，请立即手动删除 install/index.php 文件<br>
		如果您想重新安装UCenter Home，请删除 data/install.lock 文件，并到UCenter后台应用管理处删除该应用，再运行安装文件');
			}

			//检查config是否可写
			if(!@$fp = fopen($configfile, 'a')) {
				$this->show_msg("文件 $configfile 读写权限设置错误，请设置为可写，再执行安装程序");
			} else {
				@fclose($fp);
			}

			$step = 0 ;
			$nowarr[$step]='class="current"' ;
			$nowtable[$step]='show' ;
			$this->data['nowarr']=$nowarr ;
			$this->data['nowtable']=$nowtable ;
			$step = 1 ;
			$this->data['step']=$step ;

			$this->load->view('install/install',$this->data) ;
		}


		function setup(){
			$nowarr = array('','','','','','','');
			$nowtable = array('none','none','none','none','none','none','none');

			$step = intval($this->uri->segment(2));

			for ($i=0 ;$i<$step ;$i++){
				$nowarr[$i] = 'class="current"' ;
			}
			$nowtable[$i]='show' ;
			if($step==1){
				$nowtable[0]='show' ;
			}
			$this->data['nowarr']=$nowarr ;
			$this->data['nowtable']=$nowtable ;
			$this->data['step']=$step ;

			switch ($step){

				/** 检查环境*/
				case 1: {

					$this->data['step']=$step+1 ;
					$this->load->view('install/install',$this->data) ;
					break ;
				}

				/** 设置数据库连接信息*/
				case 2: {
					$this->data['step']=$step+1 ;
					$this->load->view('install/install',$this->data) ;
					break ;
				}

				/** 检查数据库连接信息是否正确信息*/
				case 3: {

					$configfile = S_ROOT.'/config/database.php';
					//先写入config文件
					$configcontent = $this->sreadfile($configfile);
					$keys = array_keys($_POST['db']);
					foreach ($keys as $value) {
						$configcontent = preg_replace("/[$]\db['default']\[\'".$value."\'\](\s*)\=\s*[\"'].*?[\"']/is", "\$db['default']['".$value."']\\1= '".$_POST['db'][$value]."'", $configcontent);

						echo 'value=>'.$configcontent.'<br/>' ;
					}
					if(!$fp = fopen($configfile, 'w')) {
						$this->show_msg("文件 $configfile 读写权限设置错误，请设置为可写后，再执行安装程序");
						break ;
					}
					fwrite($fp, trim($configcontent));

					echo 'configcontent=>'.$configcontent.'<br/>' ;
					fclose($fp);


					exit() ;
					if(empty($_POST['db']['tablepre'])) {
						$this->show_msg("填写的表名前缀不能为空");
						break ;
					}

					//判断UCenter Home数据库
					$havedata = false;
					if(!@mysql_connect($_POST['db']['dbhost'], $_POST['db']['dbuser'], $_POST['db']['dbpw'])) {
						$this->show_msg('数据库连接信息填写错误，请确认');
						break ;
					}
					if(mysql_select_db($_POST['db']['dbname'])) {
						if(mysql_query("SELECT COUNT(*) FROM {$_POST['db']['tablepre']}space")) {
							$havedata = true;
						}
					} else {
						if(!mysql_query("CREATE DATABASE `".$_POST['db']['dbname']."`")) {
							$this->show_msg('设定的UCenter Home数据库无权限操作，请先手工操作后，再执行安装程序');
							break ;
						}
					}

					if($havedata) {
						$this->show_msg('危险!指定的UCenter Home数据库已有数据，如果继续将会清空原有数据!', ($step+1));
						break ;
					} else {
						$this->show_msg('数据库配置成功，进入下一步操作', ($step+1), 1);
						break ;
					}

					break ;
				}
				case 4: {

					$this->data['step']=$step+1 ;
					$this->load->view('install/install',$this->data) ;
					break ;
				}
				case 5: {


					$this->load->view('install/install',$this->data) ;
					break ;
				}
				case 6: {


					$this->load->view('install/install',$this->data) ;
					break ;
				}

				default:{

				}
			}
		}


		//显示
		function show_msg($message, $next=0, $jump=0) {
			global $theurl;
			$nowarr = array('','','','','','','');
			$nowtable = array('none','none','none','none','none','none','none');
			$nextstr = '';
			$backstr = '';
			$nowtable[5]='show' ;
			if(empty($next)) {
				$backstr .= "<a href=\"javascript:history.go(-1);\">返回上一步</a>";
			} elseif ($next == 999) {
				$backstr .= "<a href=\"javascript:history.go(-1);\">返回上一步</a>";
			} else {
				$url_forward = site_url("setup/".$next);

				if($jump) {
					$nextstr .= "<a href=\"$url_forward\">请稍等...</a><script>setTimeout(\"window.location.href ='$url_forward';\", 10000);</script>";
				} else {
					$nextstr .= "<a href=\"$url_forward\">继续下一步</a>";
					$backstr .= "<a href=\"javascript:history.go(-1);\">返回上一步</a>";
				}
			}
			$this->data['message'] = $message ;
			$this->data['backstr'] = $backstr ;
			$this->data['nextstr'] = $nextstr ;
			$this->data['nowarr'] = $nowarr ;
			$this->data['nowtable'] = $nowtable ;
			$this->load->view('install/install',$this->data) ;
		}



		//获取文件内容
		function sreadfile($filename) {
			$content = '';
			if(function_exists('file_get_contents')) {
				@$content = file_get_contents($filename);
			} else {
				if(@$fp = fopen($filename, 'r')) {
					@$content = fread($fp, filesize($filename));
					@fclose($fp);
				}
			}
			return $content;
		}

		//写入文件
		function swritefile($filename, $writetext, $openmod='w') {
			if(@$fp = fopen($filename, $openmod)) {
				flock($fp, 2);
				fwrite($fp, $writetext);
				fclose($fp);
				return true;
			} else {
				echo ('error File: '.$filename.' write error.<br/>');
				return false;
			}
		}
		/**数据库连接
		 function dbconnect() {
		 global $_SGLOBAL, $_SC;

		 include_once(S_ROOT.'./source/class_mysql.php');

		 if(empty($_SGLOBAL['db'])) {
		 $_SGLOBAL['db'] = new dbstuff;
		 $_SGLOBAL['db']->charset = $_SC['dbcharset'];
		 $_SGLOBAL['db']->connect($_SC['dbhost'], $_SC['dbuser'], $_SC['dbpw'], $_SC['dbname'], $_SC['pconnect']);
		 }
		 }
		 */
}