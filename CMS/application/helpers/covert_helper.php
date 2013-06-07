<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'controllers/entity/Types.php';

function toNews($data){
	if(!isset($data) || empty($data))
		return NULL ;
	$news = new \entity\News_model() ;
	
	$news->id = $data->id ;
	$news->comment_type_id = $data->comment_type_id ;
	$news->content = $data->content ;
	$news->create_at = $data->create_at ;
	$news->modify_at = $data->modify_at ;
	$news->creator = $data->creator ;
	$news->modifier = $data->modifier ;
}


function toNewsArray($data = array()){
	
	
	
}