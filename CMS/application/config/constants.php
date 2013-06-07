<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 |--------------------------------------------------------------------------
 | File and Directory Modes
 |--------------------------------------------------------------------------
 |
 | These prefs are used when checking and setting modes when working
 | with the file system.  The defaults are fine on servers with proper
 | security, but you may wish (or even need) to change the values in
 | certain environments (Apache running a separate process for each
 | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
 | always be used to set the mode correctly.
 |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
 |--------------------------------------------------------------------------
 | File Stream Modes
 |--------------------------------------------------------------------------
 |
 | These modes are used when working with fopen()/popen()
 |
 */

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


define("DEV", 'dev') ;

/**
 * 用户身份
 */
define('USER_PUBLIC',0) ; // 普通用户
define('USER_ADMIN', 1) ; // 管理员
/** 模版路径  */
define("LAYOUT_PATH", ROOT.DS.APPPATH.'tpl'.DS.'layout') ;
/**
 * 数据库表
 */
/** 用户信息*/
define("TABLE_INDETITY_USER", 'identity_user') ;
/** 用户登入日志*/
define("TABLE_INDETITY_LOGIN_LOG", 'identity_login_log') ;
/** 分类栏目*/
define("TABLE_MALL_CATEGORY", 'mall_category') ;
/** 用户信息*/
define("TABLE_MALL_OPTIONS", 'mall_options') ;
/** 用户密码*/
define("TABLE_INDETITY_PASSWORD", 't_identity') ;
/** 图集*/
define("TABLE_MALL_POSTS", 'mall_posts') ;
/** 文章*/
define('TABLE_MALL_ARTICLE', 'mall_article') ;


/**
 * category 分类
 */
define('CATEGORY_TYPE_TOP', 0) ; // 顶部菜单
define('CATEGORY_TYPE_MID', 1) ; // 中间菜单
define('CATEGORY_TYPE_ADV', 2) ; // 中间广告位

/**
 * 分页
 */
define('PAGE_SIZE_MANAGE', 20) ; // 后台分页 20/页


define("EDIT_MAN", "管理") ;
define("EDIT_ADD", "新增") ;
define("EDIT_MOD", "修改") ;
define("EDIT_DEL", "删除") ;


define('ARTICLE', 'article') ;
define('POSTER', 'poster') ;
/* End of file constants.php */
/* Location: ./system/application/config/constants.php */