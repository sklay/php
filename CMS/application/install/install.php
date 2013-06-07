<?php
class Install extends Controller {
	var $data;
	function  __construct() {
		parent::Controller();

		$this->load->helper('url');
		$this->load->model(array('Options_m','Category_m'));

		/**获取顶部及中间菜单*/
		$this->data['category_top']=$this->Category_m->get_list_type(CATEGORY_TYPE_TOP);
		$this->data['category_mid']=$this->Category_m->get_list_type(CATEGORY_TYPE_MID);

		foreach($this->Category_m->get_list_type(CATEGORY_TYPE_ADV) as $row) {
			$this->data['advertise']['category_id'] = $row->category_id ;
		}

		foreach($this->Options_m->get_list() as $row) {
			$this->data['options'][$row->option_slug]=$row->option_value;
		}
	}


	function index(){

		//程序目录
		define('S_ROOT', substr(dirname(__FILE__), 0, -7));
		if(!@include_once(S_ROOT.'./config/database.php')){
			@include_once(S_ROOT.'./config/database.new.php');
			$this->show_msg('您需要首先将程序根目录下面的 "config/database.new.php" 文件重命名为 "config.php"', 999);
		}

		$configfile = S_ROOT.'./config/database.php';

		//变量
		$step = empty($_GET['step'])?0:intval($_GET['step']);
		$action = empty($_GET['action'])?'':trim($_GET['action']);
		

		$lockfile = S_ROOT.'./data/install.lock';

		if(file_exists(base_url()."config/config.php")){
			echo("true");
		}else{
			echo base_url()."config/config.php";
		};
	}

	//显示
	function show_msg($message, $next=0, $jump=0) {
		global $theurl;

		$nextstr = '';
		$backstr = '';

		//	obclean();
		if(empty($next)) {
			$backstr .= "<a href=\"javascript:history.go(-1);\">返回上一步</a>";
		} elseif ($next == 999) {
		} else {
			$url_forward = "$theurl?step=$next";
			if($jump) {
				$nextstr .= "<a href=\"$url_forward\">请稍等...</a><script>setTimeout(\"window.location.href ='$url_forward';\", 1000);</script>";
			} else {
				$nextstr .= "<a href=\"$url_forward\">继续下一步</a>";
				$backstr .= "<a href=\"javascript:history.go(-1);\">返回上一步</a>";
			}
		}

		$this->show_header();
		print<<<END
	<table>
	<tr><td>$message</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>$backstr $nextstr</td></tr>
	</table>
END;
		$this->show_footer();
		exit();
	}


	//页面头部
	function show_header() {
		global $_SGLOBAL, $nowarr, $step, $theurl, $_SC;

		$nowarr[$step] = ' class="current"';
		print<<<END
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=$_SC[charset]" />
	<title> UCenter Home 程序安装 </title>
	<style type="text/css">
	* {font-size:12px; font-family: Verdana, Arial, Helvetica, sans-serif; line-height: 1.5em; word-break: break-all; }
	body { text-align:center; margin: 0; padding: 0; background: #F5FBFF; }
	.bodydiv { margin: 40px auto 0; width:720px; text-align:left; border: solid #86B9D6; border-width: 5px 1px 1px; background: #FFF; }
	h1 { font-size: 18px; margin: 1px 0 0; line-height: 50px; height: 50px; background: #E8F7FC; color: #5086A5; padding-left: 10px; }
	#menu {width: 100%; margin: 10px auto; text-align: center; }
	#menu td { height: 30px; line-height: 30px; color: #999; border-bottom: 3px solid #EEE; }
	.current { font-weight: bold; color: #090 !important; border-bottom-color: #F90 !important; }
	.showtable { width:100%; border: solid; border-color:#86B9D6 #B2C9D3 #B2C9D3; border-width: 3px 1px 1px; margin: 10px auto; background: #F5FCFF; }
	.showtable td { padding: 3px; }
	.showtable strong { color: #5086A5; }
	.datatable { width: 100%; margin: 10px auto 25px; }
	.datatable td { padding: 5px 0; border-bottom: 1px solid #EEE; }
	input { border: 1px solid #B2C9D3; padding: 5px; background: #F5FCFF; }
	.button { margin: 10px auto 20px; width: 100%; }
	.button td { text-align: center; }
	.button input, .button button { border: solid; border-color:#F90; border-width: 1px 1px 3px; padding: 5px 10px; color: #090; background: #FFFAF0; cursor: pointer; }
	#footer { font-size: 10px; line-height: 40px; background: #E8F7FC; text-align: center; height: 38px; overflow: hidden; color: #5086A5; margin-top: 20px; }
	</style>
	<script type="text/javascript">
	function $(id) {
		return document.getElementById(id);
	}
	//添加Select选项
	function addoption(obj) {
		if (obj.value=='addoption') {
			var newOption=prompt('请输入:','');
			if (newOption!=null && newOption!='') {
				var newOptionTag=document.createElement('option');
				newOptionTag.text=newOption;
				newOptionTag.value=newOption;
				try {
					obj.add(newOptionTag, obj.options[0]); // doesn't work in IE
				}
				catch(ex) {
					obj.add(newOptionTag, obj.selecedIndex); // IE only
				}
				obj.value=newOption;
			} else {
				obj.value=obj.options[0].value;
			}
		}
	}
	</script>
	</head>
	<body id="append_parent">
	<div class="bodydiv">
	<h1>UCenter Home程序安装</h1>
	<div style="width:90%;margin:0 auto;">
	<table id="menu">
	<tr>
	<td>1.安装开始</td>
	<td>2.设置UCenter信息</td>
	<td>3.设置数据库连接信息</td>
	<td>4.创建数据库结构</td>
	<td>5.添加默认数据</td>
	<td>6.安装完成</td>
	</tr>
	</table>
END;
	}

	//页面顶部
	function show_footer() {
		print<<<END
	</div>
	<iframe id="phpframe" name="phpframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
	<div id="footer">&copy; Comsenz Inc. 2001-2009 u.discuz.net</div>
	</div>
	<br>
	</body>
	</html>
END;
	}

}