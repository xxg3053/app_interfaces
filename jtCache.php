<?php
class JtCache
{
	private $_dir;
	const EXT ='.txt';

	function __construct()
	{
		$this->_dir = dirname(__FILE__).'/file/';
	}
	/**
	 * [cacheData description]
	 * @Author   KENFO
	 * @Email    xxg3053@qq.com
	 * @DateTime 2015-06-28T21:22:47+0800
	 * @Describe
	 * @param    [type]                   $key       [缓存key]
	 * @param    string                   $value     [缓存数据]
	 * @param    integer                  $cacheTime [缓存失效实现]
	 * @return   [type]                              [description]
	 */
	public function cacheData($key,$value='',$cacheTime=0){
		$filename = $this->_dir.$key.self::EXT;

		if($value !== ''){//将value写入缓存
			if(is_null($value)){
				return @unlink($filename);
			}
			$dir = dirname($filename);
			if(!is_dir($dir)){
				mkdir($dir,0777);
			}
			//缓存失效时间长度11位，不满的补0
			$cacheTime = sprintf('%011d',$cacheTime);
			return file_put_contents($filename, $cacheTime.json_encode($value));
		}

		if(!is_file($filename)){
			return FALSE;
		}
		$contents = file_get_contents($filename);
		$cacheTime = (int)substr($contents, 0,11);
		$value = substr($contents,11);
		if($cacheTime !=0 && ($cacheTime+filemtime($filename)) < time()){
			unlink($filename);
			return FALSE;
		}
		return json_decode($value,true);
	}
}
/**
$c = new JtCache();
$c->cacheData('test1','测试数据adfasdf',180);
**/