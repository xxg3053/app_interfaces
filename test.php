<?php
require_once('response.php');
require_once('file.php');
$arr = array('id'=>1,'name'=>'kenfo','type'=>array(1,2,3));

//Response::json(200,'tishi',$arr);
//Response::show(200,'tishi',$arr,'array');
//
$file = new File();
if($file->cacheData('index_mk_cache',null)){
	//var_dump($file->cacheData('index_mk_cache'));
	echo 'success';
}else{
	echo 'error';
}
