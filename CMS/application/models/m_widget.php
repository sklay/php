<?php
class M_widget extends Ci_Model {

	function __construct(){
		parent::__construct();
	}

	/**
	 * 新增模块
	 */
	function insert($data=array()){

		//	echo $this->db->last_query().'<br/>';
		$this->db->insert('t_widget',$data);

		return $this->db->insert_id() ;

	}

	/** 修改模块**/
	function update($data=array() ,$id){
		if(!empty($data)){
			return $this->db->update('t_widget',$data,array('id'=>$id));
		}
	}

	function getWidgets($data) {
		$this->db->where($data);
		$this->db->order_by("rank", "asc");
		$query= $this->db->get('t_widget');
		//		echo $this->db->last_query().'<br/>';
		return $query->result();
	}

	function findOne($data){
		if(!empty($data)) {
			$this->db->where($data);
			$query= $this->db->get('t_widget');

			//	echo $this->db->last_query().'<br/>';
			return $query->row();
		}
	}

	function batch_updataWidget($set_data,$set_where){
		if(!empty($set_where) && !empty($set_data) ) {
			$this->db->update_batch('t_widget', $set_data, $set_where);
			//	print_r($this->db->last_query().'<br/>');
		}
	}

	function insertWidgetSetting($data=array()){

		//echo $this->db->last_query().'<br/>';
		return $this->db->insert('t_widget_setting',$data);

	}

	function updataWidgetSetting($data=array(),$set_where=array()){
		if(!empty($data)){
			return $this->db->update('t_widget_setting',$data,$set_where);
		}
	}

	function batch_updataWidgetSetting($set_data,$set_where){
		if(!empty($set_where) && !empty($set_data) ) {
			$this->db->update_batch('t_widget_setting', $set_data, $set_where);
			//	print_r($this->db->last_query().'<br/>');
		}
	}

	function insert_batch_WidgetSetting($data=array()){
		if(!empty($data)){
			return $this->db->insert_batch('t_widget_setting' ,$data) ;
			// print_r($this->db->last_query().'<br/>');
		}

	}

	function findOneWidgetSetting($data){
		if(!empty($data)) {
			$this->db->where($data);
			$query= $this->db->get('t_widget_setting');
			//		echo $this->db->last_query().'<br/>';
			return $query->row();
		}
	}

	function findWidgetSetting($data){
		if(!empty($data)) {
			$this->db->where($data);
			$query= $this->db->get('t_widget_setting');
			//		echo $this->db->last_query().'<br/>';
			return $query->result();
		}
	}

	function findWidgetOneSetting($data){
		if(!empty($data)) {
			$this->db->where($data);
			$query= $this->db->get('t_widget_setting');
			//		echo $this->db->last_query().'<br/>';
			return $query->row();
		}
	}

	function setSort($set_data,$set_where){
		if(!empty($set_where) && !empty($set_data) ) {
			$this->db->update_batch('t_widget', $set_data, 'id');

			//print_r($this->db->last_query().'<br/>');
		}
	}

	function removeSetting($data){
		if(!empty($data))
		return $this->db->delete('t_widget_setting', $data);
	}

	function removeWidget($data){
		if(!empty($data))
		return $this->db->delete('t_widget', $data);
	}
}
