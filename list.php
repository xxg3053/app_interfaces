<?php
require_once('response.php');
require_once('db.php');
require_once('jtCache.php');
//xx/php.list?page=1&pageSize=1
$page = isset($_GET['page'])?$_GET['page']:1;
$pageSize = isset($_GET['pageSize'])?$_GET['pageSize']:1;
if(!is_numeric($page) || !is_numeric($pageSize)){
	return Response::show(401,'数据不合法');
}
$offset = ($page - 1)*$pageSize;//起始页
$sql = "select * from document limit ".$offset.",".$pageSize;
//echo "$sql";
$cache = new JtCache();
$rs = array();
if(!$rs=$cache->cacheData('index_mk_cache'.$page.'-'.$pageSize)){
	echo 1;exit;
	try{
		$con = Db::getInstance()->connect();
	}catch(Exception $e){
		//$e->getMessage();
		return Response::show(403,'数据库连接失败');
	}
	$result = mysql_query($sql,$con);
	//var_dump($result);
	while ($r = mysql_fetch_assoc($result)) {
		$rs[] = $r;
	}
	//var_dump($rs);
	
	if($rs){
		$cache->cacheData('index_mk_cache'.$page.'-'.$pageSize,$rs,1200);
	}
}

if($rs){
	return Response::show(200,'首页数据获取成功',$rs);
}else{
	return Response::show(400,'首页数据获取失败',$rs);
}