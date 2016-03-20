<?php
/**
 * 工具类
 */
class Utils{

	/**
	 * REQUEST值
	 *
	 * @param mixed $name 支持字符串或者数组，如果是数据，需要递归检查，默认什么都不过滤
	 * @param string $type 1) int integer 整形；2) float 浮点型；3) json传过来的数据为json数据；4) /.../需要符合正则；
	 * @param string $default 如果取不到，默认值
	 * @return string
	 */
	public static function V($name, $type = '', $default = ''){
		return self::getValue($name, $_REQUEST, $type, $default);
	}
	/**
	 * GET值
	 *
	 * @param mixed $name 支持字符串或者数组，如果是数据，需要递归检查，默认什么都不过滤
	 * @param string $type 1) int integer 整形；2) float 浮点型；3) json传过来的数据为json数据；4) /.../需要符合正则；
	 * @param string $default 如果取不到，默认值
	 * @return string
	 */
	protected static function get($name, $type = '', $default = ''){
		return self::getValue($name, $_GET, $type, $default);
	}
	/**
	 * POST值
	 *
	 * @param mixed $name 支持字符串或者数组，如果是数据，需要递归检查，默认什么都不过滤
	 * @param string $type 1) int integer 整形；2) float 浮点型；3) json传过来的数据为json数据；4) /.../需要符合正则；
	 * @param string $default 如果取不到，默认值
	 * @return string
	 */
	protected static function post($name, $type = '', $default = ''){
		return self::getValue($name, $_POST, $type, $default);
	}

	private static function getValue($name, $data, $type, $default){
		if(isset($data[$name])){
			return self::_ff($data[$name], $type, $default);
		}else{
			return $default;
		}
	}

	/*
	 * 过滤函数
	 */
	private static function _ff($value, $type = '', $default = ''){
		if(is_array($value)){
			return array_map(array($this, '_ff'), $value);
		}else{
			//系统自动转义的情况下需要将转义的字符串纠正回来
			if(get_magic_quotes_gpc()){
				$value = stripslashes($value);
			}

			$isReg = preg_match("/^\/.*\/[a-z]*$/", $type) ? true : false;

			if(in_array($type, array('int', 'integer', 'float'))){
				settype($value, $type);
				if(!$value){
					$value = $default;
				}
			}elseif($type == 'json'){
				$value = json_decode($value, true);
				if(!$value){
					$value = array();
				}
				$value = json_encode($value);
			}elseif($isReg) {
				if (!preg_match($type, $value)) {
					$value = $default;
				}
			}
			return $value;
		}
	}

	/**
	 * 获取$_SERVER值
	 */
	protected static function getServer($key = null, $default = null) {
        if (null === $key) {
            return $_SERVER;
        }

        return (isset($_SERVER[$key])) ? $_SERVER[$key] : $default;
    }
}