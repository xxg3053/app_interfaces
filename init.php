<?php
/**
* 
*/
require_once('common.php');
class Init extends Common
{
	
	function __construct()
	{
		
	}

	public function index(){
		$this->check();
		//获取版本升级信息
		$versionUpgrade = $this->getVersionUpgrade($this->app['id']);
		//var_dump($versionUpgrade);
		if($versionUpgrade){
			if($versionUpgrade['type'] && $this->params['version_id'] < $versionUpgrade['version_id']){
				$versionUpgrade['is_upload'] = $versionUpgrade['type'];
			}else{
				$versionUpgrade['is_upload'] = 0;
			}
			return Response::show(403,'版本信息获取成功',$versionUpgrade);
		}else{
			return Response::show(400,'版本信息获取失败');
		}
	}
}

$init = new Init();
$init->index();