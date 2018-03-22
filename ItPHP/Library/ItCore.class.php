<?php
namespace ItPHP\Library;
use \ItPHP\Library\Route;
use \ItPHP\Library\Controller;

class ItCore
{
	static public function start()
	{
		$route = self::getRoute();
		self::parseRoute($route);
	}
	/* 自动加载 */
	static public function load($class)
	{
		/* 转移命名空间的 ‘\’ */
		$class = str_replace('\\', '/', $class);
		/* 获取文件绝对路径地址 */
		$path = ROOT.'/'.$class.CLASS_EXT;
		if (is_file($path)) include_once $path;
	}
	
	/* 得到路由 */
	static protected function getRoute()
	{
		$route = new Route();
		return  array('ctrl' => $route->ctrl,
					'action' => $route->action,
					'moudle' => $route->moudle);
	}
	/* 解析路由 */
	static private function parseRoute($route)
	{
		/* 获取class 及方法 */
		$ctrlClass = $route['ctrl'];
		$action = $route['action'];
		/* 设置相对路径 */
		$classPath = self::moreMoudle($route);
		$path = $classPath['path'];
		$classN = $classPath['className'];

		/* Ctrl文件路径 */
		$classFile = $path.$ctrlClass.'Controller'.CLASS_EXT;

		if(is_file($classFile))
		{
			$className = $classN.$ctrlClass.'Controller';
			$ctrl = new $className();
			/* 执行方法 */
			if(method_exists($className,$action))
			{
				$ctrl->$action($route);
			}
			else
			{
				echo self::pageNone();
			}
		}else{
			/* 跳转到404页面 */
			//throw new Exception("控制器不存在 ： ".$ctrlClass, 1);
			echo self::pageNone();
		}
	}
	/* 路径 多站点设置 */
	static private function moreMoudle($route){

		if(isset($route['moudle']) && !empty($route['moudle'])){
			$moudle = $route['moudle'];
			$classPath =  array(
					'path' =>  APPMOUDLE.'/Controller/',
					'className' => '\\'.APP_PATH.'\\'.$moudle.'\\Controller\\');
		}
		else{
			$classPath =  array(
					'path' =>  APP.'/Controller/',
					'className' => '\\'.APP_PATH.'\\Controller\\');
		}
		return $classPath;
	}
	/* 页面不存在404 */
	static public function pageNone(){
		/*应该 include common 404页面 */
		include_once ITPHP.'/Common/404.php';
	}
}
