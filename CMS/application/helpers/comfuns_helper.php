<?php
//通用方法
if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 封装ajax请求结果
 * @param $data string or array 需要返回给客户端的数据
 * @param $msg string 返回的消息
 * @param $errno int 错误号，成功返回0
 * 
 * @return $tmp array 
 */
function RST($data,$msg='',$errno=0){

	$data_new = $data;
		
	$data_new = forUnset( $data , $data_new );
	
	$tmp = array();
    $tmp['data'] = $data_new;
    $tmp['msg'] = $msg;
    $tmp['errno'] = $errno;
    
    
	return json_encode($tmp);

    
}

function forUnset($arr ,$arr_new )
{
	if(is_array($arr) && count($arr))
	{
		foreach ($arr as $k => $item)
		{
			if(!isset( $item ) || $item === null )
			{
				unset($arr_new[$k]);
			}
			else
			{			
				$arr_new[$k] = forUnset($item , $arr_new[$k] );
			}
		}

	}
	return $arr_new;
}

function strlen_utf8($str) {      
	$i = 0;      
	$count = 0;      
	$len = strlen ($str);      
	while ($i < $len) {      
	   $chr = ord ($str[$i]);      
	   $count++;      
	   $i++;      
	   if($i >= $len) break;      
	   if($chr & 0x80) {      
	      $chr <<= 1;      
	      while ($chr & 0x80) {      
	        $i++;      
	        $chr <<= 1;      
	      }      
	     }      
	  }      
	  return $count;      
}  

// quiz_question_1233
// toc_1234
// paper_1234
// article_12345
// quiz_descriont_123445
// quiz_121234

function debug_log($input,$debugflag="log",$die=false){
	if(true){
		@$fp=fopen($_SERVER['DOCUMENT_ROOT']."/debug.txt",'a');
		$val = vardump($input,$debugflag);
		$val = str_replace("__set_state","",$val);
		$val = str_replace("stdClass::(array(","object((",$val);
		fwrite($fp,$val);
		fclose($fp);
		if($die){
			echo "stoped";
			die();
		}
	}
}

function vardump($ary,$flag="log"){
	$str = $pre = '';
	$r = "\r\n";
	$flgs = "-------------------------".$flag.' time =>  '.date("Y-m-d H:i:s")." start-----------------------------".$r;
	$flge = "-------------------------".$flag.' time =>  '.date("Y-m-d H:i:s")." end-------------------------------".$r;
	if(!is_array($ary)){
		if(is_string($ary)){
			$str .= 'string('.strlen($ary).') \''.$ary.'\'';
		}elseif(is_int($ary)){
			$str .= 'int('.$ary.')';
		}elseif(is_float($ary)){
			$str .= 'float('.$ary.')';
		}elseif(is_bool($ary)){
			$str .= 'bool('.var_export($ary, TRUE).')';
		}elseif(is_object($ary)){
			$str .= 'object('.var_export($ary, TRUE).')';
		}else{
			$str .= var_export($ary, TRUE);
		}
	}else{
		$str .= 'array('.count($ary).'){'.$r;
		foreach($ary as $key=>$value){
			$str .= '[\''.$key.'\']='.vardump($value, '[\''.$key.'\']');
		}
		$str .= '}'.$r;
	}
	return $flgs.$str.$r.$flge;
}
