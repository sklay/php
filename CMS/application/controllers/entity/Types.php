<?php
namespace entity;

/** 消息对象 */
class ResultMsg {

	public $code ;
	
	public $msg ;
	
	public $url ;
	
	public $data ;
	
	public function __construct() {
	
			$this->code = 0;
			$this->msg = '操作失败!' ;
			$this->url = '' ;
			$this->data = '' ;
	}

}

/** 资讯对象*/
class News_model{
	
	public $id ;
	public $title ;
	public $content ;
	public $comment_type_id ;
	public $parent_id ;
	public $creator ;
	public $create_at ;
	public $modifier ;
	public $modify_at ;
	
}