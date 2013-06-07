<?php defined('BASEPATH') or die('Access restricted!');


/**
 * 这是一个smarty的初始化类
 *
 * @copyright Copyright (c) 2005 - 2006 Itlong.com (www.itlong.com)
 * @author    杨金焕 itlongtom@tom.com * @package Core
 * @date      Tue Jul 22 08:54:37 CST 2008 2008
 * @version   $Id$
 */
require (ROOT.DS.APPPATH."libraries".DS."smarty".DS."Smarty.class.php");//APPPATH是CI系统预定义的application/ ,ROOT,DS是第三步定义的
//继承smarty类,Ci_smarty注意如果文件名为大写,类名必须也大写
class Cismarty extends Smarty{
	function __construct(){
		parent::__construct();
		self::loadsmarty();
	}
	//配置smarty
	function loadsmarty(){
		$this->template_dir		= ROOT.DS.APPPATH.'tpl'.DS;
		$this->compile_dir		= ROOT.DS.APPPATH.'tpl_c'.DS;
		$this->config_dir		= ROOT.DS.APPPATH.'config'.DS;
		$this->cache_dir		= ROOT.DS.APPPATH.'cache'.DS;
		$this->left_delimiter 		= '{';
		$this->right_delimiter	= '}';
	}
}