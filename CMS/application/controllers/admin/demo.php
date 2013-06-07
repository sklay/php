<?php defined('BASEPATH') or die('Access restricted!');


/**
 * 测试smarty
 *
 * @copyright Copyright (c) 2005 - 2006 Itlong.com (www.itlong.com)
 * @author    杨金焕 itlongtom@tom.com * @package Core
 * @date      Tue Jul 22 09:39:35 CST 2008 2008
 * @version   $Id$
 */
class Demo extends CI_Controller {
	var $data;

	function  __construct() {
		parent::__construct();

		Events::register('unit_test', array($this, 'callback'));
		Events::register('unit_test', array($this, 'callback2'));
	}



	public function index()
	{

		/*
		 $this->load->helper('text');
		 $config = array();
		 $this->load->library('cismarty');
		 $this->cismarty->assign('title', '这是我第一个smarty在CI中的应用!');
		 $this->cismarty->assign('content', 'smarty和Codeigniter的结合使用:');
		 $code = file_get_contents(APPPATH.'libraries/Cismarty.php');
		 $this->cismarty->assign('code', highlight_code($code));
		 $this->cismarty->display('demo.tpl');
		 */
	}






	public function callback()
	{
		echo "callback <br/>" ;
		return 'test';
	}

	public function callback2($var = '')
	{
		echo "callback2 <br/>" ;
		return $var;
	}

	public function test_has_listeners()
	{
		Events::register('unit_test', array($this, 'callback'));
		
		
		echo '1 test_has_listeners =>'.Events::has_listeners('non_existant').'<br/>';
		echo '2 test_has_listeners =>'.Events::has_listeners('unit_test').'<br/>';
		
		Events::trigger('unit_test','sss','string') ;
	}

	public function test_single_callback()
	{
		Events::register('single', array($this, 'callback'));
		echo  $this->assertEquals(Events::trigger('single', 'test'), 'test');
	}

	public function test_multiple_callback()
	{
		echo  	$this->assertEquals(Events::trigger('unit_test', 'test'), 'testtest2');
		echo  	$this->assertEquals(Events::trigger('unit_test', 'test2'), 'testtest2');
	}

	public function test_array_callback()
	{
		Events::register('test_array_callback', array($this, 'callback'));
		$arr = array('foo' => 'bar');
		Events::trigger('test_array_callback', $arr);
	}


}