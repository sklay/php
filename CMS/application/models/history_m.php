<?php
class History_m extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	/**
	 * 新增管理员登入日志
	 */
	function insert($data=array()){
		return $this->db->insert(TABLE_INDETITY_LOGIN_LOG,$data);
	}

	/**
	 * 根据用户id与创建日期获取日志
	 */
	function get_login_log($user_id , $login_time){
		$query= $this->db->get_where(TABLE_INDETITY_LOGIN_LOG,array('login_account'=>$user_id,'login_time'=>$login_time));
		return $query->row();
	}

	/**
	 *修改登入日志信息
	 */
	function update($uid=0,$login_time='',$data=array()) {
		return $this->db->update(TABLE_INDETITY_LOGIN_LOG, $data,array('uid'=>$uid,'login_time'=>$login_time));
	}

	/**
	 * 根据条件查询登入历史含分页
	 */
	function get_list_page($pagesize=0,$pageindex=0,$data=array()) {

		$this->db->join(TABLE_INDETITY_USER,TABLE_INDETITY_USER.'.id=uid','left');
		$this->db->order_by("login_time", "desc");
		if(!empty($data)) {
			$this->db->where($data);
		}
		$query= $this->db->get(TABLE_INDETITY_LOGIN_LOG,$pagesize,$pageindex);

//		echo $this->db->last_query().'<br/>';
		return $query->result();
	}
	/**
	 * 根据条件查询登入历史总数
	 */
	function get_count($data=array()) {

		$this->db->join(TABLE_INDETITY_USER,TABLE_INDETITY_USER.'.id=uid','left');
		$this->db->order_by("login_time", "desc");
		if(!empty($data)) {
			$this->db->where($data);
		}

//		echo $this->db->last_query().'<br/>';
		return $this->db->count_all_results(TABLE_INDETITY_LOGIN_LOG);
	}
}