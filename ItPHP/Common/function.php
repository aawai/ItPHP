<?php
/* PATH_INFO deal*/
function _PathInfo(){
	if(isset($_SERVER['PATH_INFO']) || isset($_SERVER['ORIG_PATH_INFO'])){
		$pathInfo = isset($_SERVER['PATH_INFO']) ? 
							$_SERVER['PATH_INFO']:
							$_SERVER['ORIG_PATH_INFO'];
		$path = substr($pathInfo, 1);
		return explode('/',$path);
	}
	return null;
}

/* 加载config设置 */
function _DealConfig()
{
	//应用入口常量设置 
	defined('APP_PATH') || define('APP_PATH','App');
	
	define('APP', ROOT.'/'.APP_PATH);
	/* 文件夹设置 */
	if(!is_dir(APP)) mkdir(APP);
	
	/* 读取根目录下的config */
	if(is_file(APP.'/config.php'))
	{
		$appConfig = include(APP.'/config.php');
		foreach ($appConfig as $key => $value) {
			define($key, $value);
		}
	}
	/**
	 * 1、Common文件夹设置
	 * 2、引入Common下的congif
	 * 3、引入Common下的function
	 */
	if(!is_dir(APP.'/Common')) mkdir(APP.'/Common');
	
	if(is_file(APP.'/Common/config.php'))
	{
		$commonConfig = include(APP.'/Common/config.php');
		foreach ($commonConfig as $key => $value) {
			define($key, $value);
		}
	}

	if(is_file(APP.'/Common/function.php'))
		include APP.'/Common/function.php';

	/* 其他文件夹生成 */
	if(!is_dir(APP.'/Runtime')) mkdir(APP.'/Runtime');
	if(!is_dir(ROOT.'/Public')) mkdir(ROOT.'/Public');

	/* 自定义模块存在 (默认站点)*/
	if(defined('MOUDLE')){
		/* 引入公共资源 */
		$moudle = _PathInfo()[0];
		if(empty($moudle)) $moudle = MOUDLE;
		
		defined('APPMOUDLE') || define('APPMOUDLE', APP.'/'.$moudle);
		$_MOUDLE = APP.'/'.MOUDLE;
		if(!is_dir($_MOUDLE)) mkdir($_MOUDLE);//默认模块
		if(!is_dir($_MOUDLE.'/Model')) mkdir($_MOUDLE.'/Model');//模块MODEL
		if(!is_dir($_MOUDLE.'/Common')) mkdir($_MOUDLE.'/Common');//模块Common
		if(!is_dir($_MOUDLE.'/Controller')) mkdir($_MOUDLE.'/Controller');//模块Controller

		if(is_dir(APPMOUDLE.'/Common'))
		{
			if(is_file(APPMOUDLE.'/Common/config.php'))
			{
				$commonConfig = include(APPMOUDLE.'/Common/config.php');
				foreach ($commonConfig as $key => $value) {
					define($key, $value);
				}
			}
			if(is_file(APPMOUDLE.'/Common/function.php'))
				include APPMOUDLE.'/Common/function.php';
		}
	}

}

?>