<?php
namespace ItPHP\Library;

class Route
{
	public $ctrl;
	public $action;
	public $moudle;
	/* URL参数信息 */
	public $patharr = array();
	public function __construct()
	{
		/**
		 * 1开启phpinfo模式、隐藏index.php
		 * 2获取url的参数部分
		 * 3返回对应控制器和方法
		 */
		$this->getPathInfo();
		$this->dealPathInfo();
	}
	/* 获取PATH_INFO  */
	private function getPathInfo()
	{
		$this->patharr = _PathInfo();
		if(empty($this->patharr)){
			/* 指定到默认模块 默认Controller 下的index方法 */
			$i = 0;
			if(defined('MOUDLE')){
				$this->patharr[$i] = MOUDLE;
				$i++;
			}
			$this->patharr[$i] = PAGE_CTRL;
			$this->patharr[$i+1] = PAGE_ACTION;
		}
	}
	/* 将参数映射到ctrl 及对应方法 */
	private function dealPathInfo()
	{
		$patharr = $this->patharr;
		$i = 0;
		/**
		 *1、如果MOUDLE存在 设置model
		 *2、涉及内容 URL 参数对应内容变化 文件Controller引入变化
		 *3、需要加载对应的模块common function config view controoler
		 *4、模块存在，做对应处理加载进 对应common
		 */
		if(defined('MOUDLE')){
			if(isset($patharr[$i])){
				$this->moudle = $patharr[$i];
				$i++;
			}
		}

		/* 第一个参数为控制器  */
		if(isset($patharr[$i]))
			$this->ctrl = $patharr[$i];
		else 
			$this->ctrl = PAGE_CTRL;
		/* 第二个参数为方法 */
		if(isset($patharr[$i+1]))
			$this->action = $patharr[$i+1];
		else 
			$this->action = PAGE_ACTION;
		/* 多余部分的转为$_GET参数 */
		for($j = 2 + $i,$count = count($patharr); $j < $count; $j+=2){
			if(isset($patharr[$j+1]))
				$_GET[$patharr[$j]] = $patharr[$j+1];
		}
	}


}
