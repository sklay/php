<?php
class M_news extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	/** 创建资讯*/
	function createComment($data){
		
		$id = 0 ;
		if(isset($data)){
			//添加文章表一条记录
			$this->db->insert('t_comment', $data);
			$id = $this->db->insert_id();
		}
		return $id ;
	}

	/** 获取列表**/
	function getAll() {
		$this->db->order_by("id", "asc");
		$query= $this->db->get('t_comment');
		//	 echo $this->db->last_query().'<br/>';
		return $query->result();
	}

	/** 查询单个新闻**/
	function findOneComment($data) {
		if(!empty($data)) {
			$this->db->where($data);
			$query= $this->db->get('t_comment');
			// echo $this->db->last_query().'<br/>';
			return $query->row();
		}
	}

	function removeComment($data){
		
		if(isset($data) && !empty($data)){
			$this->db->where_in('id', $data);
			$this->db->delete('t_comment');
		}
	}
	
	/** 获取新闻类型列表**/
	function findAllType() {

		$this->db->order_by("id", "asc");
		$query= $this->db->get('t_comment_type');
		// echo $this->db->last_query().'<br/>';
		return $query->result();

	}

	/** 获取新闻类型列表**/
	function findOneType($data) {
		if(!empty($data)) {
			$this->db->where($data);
			$query= $this->db->get('t_comment_type');
			// echo $this->db->last_query().'<br/>';
			return $query->row();
		}
	}

	/** 获取指定新闻类型的新闻个数**/
	function countComment($data){
		if('' != $data)
			$this->db->where($data);
		//	$this->db->from('t_comment') ;
		return  $this->db->count_all_results('t_comment');
	}

	/**
	 * 根据条件查询登入历史含分页
	 */
	function getCommentPage($pagesize=0,$pageindex=0,$data=array()) {

		$this->db->order_by("modify_at", "desc");
		if(!empty($data)) {
			$this->db->where($data);
		}
		$query= $this->db->get('t_comment',$pagesize,$pageindex);

		//		echo $this->db->last_query().'<br/>';
		return $query->result();
	}
}
