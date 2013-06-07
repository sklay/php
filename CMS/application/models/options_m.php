<?php
class Options_m extends Ci_Model {

	function __construct(){
		parent::__construct();
	}
  function get_list() {
    $query=$this->db->get(TABLE_MALL_OPTIONS);
    return $query->result();
  }
  function get($slug = '') {
    $query = $this->db->get_where(TABLE_MALL_OPTIONS, array('option_slug'=>$slug));

    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function mod($option_slug='',$option_value='') {
    if($option_slug!='') {
      $this->db->update(TABLE_MALL_OPTIONS,array('option_value'=>$option_value),array('option_slug'=>$option_slug));
    }
  }
}