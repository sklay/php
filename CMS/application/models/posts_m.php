<?php
class Posts_m extends Ci_Model {

	function __construct(){
		parent::__construct();
	}
  function get_hot($topnum=10,$cate=0) {
    if($cate>0) {
      $this->db->where('post_category',$cate);
    }
    $this->db->order_by("post_hit", "desc");
    $query= $this->db->get(TABLE_MALL_POSTS,$topnum,0);
    return $query->result();
  }
  function get_newest($topnum=10,$cate=0) {
    if($cate>0) {
      $this->db->where('post_category',$cate);
    }else {
      $this->db->join(TABLE_MALL_CATEGORY,'category_id=post_category','left');
    }
    $this->db->order_by("post_pubdate", "desc");
    $query= $this->db->get(TABLE_MALL_POSTS,$topnum,0);
    return $query->result();
  }
  function get_list_by($tid=0,$cateid=0,$pageindex=0,$pagesize=10) {
    $this->db->where('post_type',$tid);
    if($cateid>0) {
      $this->db->where('post_category',$cateid);
    }
    $this->db->order_by("post_id", "desc");
    $query= $this->db->get(TABLE_MALL_POSTS,$pagesize,$pageindex);
    return $query->result();
  }
  function get_list($cateid=0,$pageindex=0,$pagesize=10) {
    $this->db->where('post_category',$cateid);
    $this->db->order_by("post_id", "desc");
    $query= $this->db->get(TABLE_MALL_POSTS,$pagesize,$pageindex);
    return $query->result();
  }
  function get_list_all($pageindex=0,$pagesize=10) {
    $this->db->join(TABLE_MALL_CATEGORY,'category_id=post_category','left');
    $this->db->order_by("post_id", "desc");
    $query= $this->db->get(TABLE_MALL_POSTS,$pagesize,$pageindex);
    return $query->result();
  }
  function get_byslug($slug='') {
    $query= $this->db->get_where(TABLE_MALL_POSTS,array('post_slug'=>$slug));
    return $query->row();
  }
  function get_byid($id=0) {
    $query = $this->db->get_where(TABLE_MALL_POSTS,array('post_id'=>$id));
    return $query->row();
  }
  
  function get_bycategory($id=0) {
    $query = $this->db->get_where(TABLE_MALL_POSTS,array('post_category'=>$id));
    return $query->row();
  }
  
  function get_count($cateid=0) {
    if($cateid>0) {
      $this->db->where('post_category',$cateid);
    }
    return $this->db->count_all_results(TABLE_MALL_POSTS);
  }
  function update($id=0,$data=array()) {
    return $this->db->update(TABLE_MALL_POSTS, $data,array('post_id'=>$id));
  }
  function insert($data=array()) {
    return $this->db->insert(TABLE_MALL_POSTS,$data);
  }
  function del($id=0) {
    return $this->db->delete(TABLE_MALL_POSTS, array('post_id' => $id));
  }
  function update_hit($postid=0) {
    if($postid>0) {
      $this->db->query('update '.$this->db->dbprefix(TABLE_MALL_POSTS).' set post_hit=post_hit+1 where post_id='.$postid);
    }
  }
}
