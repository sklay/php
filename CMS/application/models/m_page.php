<?php
class M_page extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	/** 获取所有页面**/
	function getAll() {
		$this->db->order_by("id", "asc");
		$query= $this->db->get('t_page');
		// echo $this->db->last_query().'<br/>';
		return $query->result();
	}

	/** 获取一级页面**/
	function findPages($data) {
		if(!empty($data)) {
			$this->db->where($data);
			$this->db->order_by("id", "asc");
			$query= $this->db->get('t_page');
			// echo $this->db->last_query().'<br/>';
			return $query->result();
		}
	}

	/** 获取单个页面**/
	function findOne($data) {
		if(!empty($data)) {
			$this->db->where($data);
			$this->db->order_by("id", "asc");
			$query= $this->db->get('t_page');
			// echo $this->db->last_query().'<br/>';
			return $query->row();
		}
	}

	/** 检查别名**/
	function findAliasCount($page_ids ,$alias) {

		if(!isset($alias) && empty($alias))
		return 0 ;
		$this->db->where('alias', $alias);
		if(!empty($page_ids) && count($page_ids) > 0) {
			// 			$this->db->where_not_in('id', array_flip($page_ids));
			$this->db->where_not_in('id', $page_ids);
		}
		$this->db->from('t_page');
		// 		$this->db->count_all_results() ;
		// 		debug_log($page_ids) ;
		// 		debug_log($this->db->last_query()) ;
		return $this->db->count_all_results();
	}

	/** 更新页面**/
	function update($data=array(),$where=array()){

		if(!empty($data) && !empty($where)){
				
			$this->db->where($where) ;
			return	$this->db->update('t_page',$data) ;
				
		}
	}

	/** 新增页面**/
	function insert($data=array()){
		if(!empty($data)){
			$this->db->insert('t_page',$data);
			return $this->db->insert_id() ;
		}
	}

	/** 刪除页面*/
	function  remove($ids = array()){

		if (is_array($ids) && count($ids) > 0){
			$this->db->where_in('id', $ids);
			return 	$this->db->delete('t_page');
		}

	}
}
