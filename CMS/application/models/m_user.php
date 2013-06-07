<?php
class M_user extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	/**
	 * 新增用户
	 */
	function insert($data=array()){
		//$table_name='identity_user' ;
		return $this->db->insert(TABLE_INDETITY_USER,$data);
	}

	/**
	 * 根据用户Id获取用户信息
	 */
	function get($id=0){
		return $this->db->update(TABLE_INDETITY_USER, $data,array('id'=>$id));
	}

	/**
	 * 修改用户
	 */
	function update($id=0,$data=array()){
		return $this->db->update(TABLE_INDETITY_USER, $data,array('id'=>$id));
	}

	/**
	 * 登入验证
	 */
	function check_login($login_name,$user_pwd){

		$query= $this->db->get_where(TABLE_INDETITY_PASSWORD,array('email'=>$login_name,'pwd'=>$user_pwd));

	//	echo "query".$this->db->last_query();

		return $query->row();
	}



	/**
	 * 根据条件查询用户信息含分页
	 */
	function get_list_page($pagesize=0,$pageindex=0,$data=array()) {

		if(!empty($data)) {
			$this->db->where($data);
		}
		$query= $this->db->get(TABLE_INDETITY_USER,$pagesize,$pageindex);

//		echo $this->db->last_query().'<br/>';
		return $query->result();
	}

	/**
	 * 根据条件查询用户信息总数
	 */
	function get_count($data=array()) {

		if(!empty($data)) {
			$this->db->where($data);
		}
//		echo $this->db->last_query().'<br/>';
		return $this->db->count_all_results(TABLE_INDETITY_USER);
	}
}
