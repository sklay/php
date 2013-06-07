<?php

/** 判断用户是否登录(登录情况下，返回用户对象，反之false)*/
function checklogin()
{
	$CI = & get_instance();
	$CI->load->model("M_user") ;
	$token_name = $CI->config->item('token_name');
	$token = $CI->input->cookie($token_name, TRUE);
	$validate = $CI->identity_model->validateToken($token);//验证token是否有效
	if($validate>0)
	{
		return $CI->identity_model->validateTokenWithUser($token);
	}
	else
	{
		return false;;
	}
}