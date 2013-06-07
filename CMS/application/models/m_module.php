<?php
class M_module extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	/** 获取所有模块**/
	function getAll() {
		$this->db->order_by("id", "asc");
		$query= $this->db->get('t_module');
		//	 echo $this->db->last_query().'<br/>';
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
}
