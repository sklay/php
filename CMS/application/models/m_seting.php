<?php
class M_seting extends Ci_Model {

	function __construct(){
		parent::__construct();
	}
	
	/** 获取网站配置**/
	function getSeting($id) {
		if(!empty($id)) {
			$data = array('id' => $id) ;
			$this->db->where($data);
			$query= $this->db->get('t_seting');
			return $query->row();
		}
	}

}
