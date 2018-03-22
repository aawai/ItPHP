<?php
namespace ItPHP\Library;
use \ItPHP\Library\Route;

class Controller
{
	protected $assign;
	//public function __construct($route){}

	/* 应该单独放到Controller */
	public function assign($key,$value)
	{
		$this->assign[$key] = $value;
	} 

	public function display($action=false)
	{
		/* 开始 应单独存放 判断目录及文件是否存在 并返回值 */
		if(!$action){
			$route = $this->getRoute();
			$ctrl =  $route['ctrl'];
			$action =  $route['action'];
		}

		if(defined('MOUDLE')){
			$filePath =APPMOUDLE;	
		}else {
			$filePath = APP;
		}
		$file = $filePath.'/View/'.$ctrl.'/'.$action.'.'.FILE_EXT;
		/* 结束 */
		if(is_file($file)){
			/* extract 函数用于打散数组 把键值对变作普通变量 */
			extract($this->assign);
			include_once $file;
		}
	}
	/* 得到路由 */
	private function getRoute()
	{
		$i = 0;
		$arrayName = array();
		$patharr = _PathInfo();

		if(defined('MOUDLE')){
				$i++;
		}

		/* 第一个参数为控制器  */
		if(isset($patharr[$i]))
			$arrayName['ctrl'] = $patharr[$i];
		else 
			$arrayName['ctrl'] = PAGE_CTRL;

		if(isset($patharr[$i+1]))
			$arrayName['action'] = $patharr[$i+1];
		else 
			$arrayName['action'] = PAGE_ACTION;

		return $arrayName;
	}
	
}
