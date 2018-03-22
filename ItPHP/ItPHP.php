<?php
//设置编码UTF-8
header("Content-Type:text/html;charset=utf-8");
/* 根目录 */
define('ROOT',substr(__DIR__,0,-6));
/* 框架核心文件目录 */
define('ITPHP',ROOT.'/ItPHP');

/* 加载函数库 */
include ITPHP.'/Common/function.php';

/* 加载核心文件 */
include ITPHP.'/Library/ItCore.class.php';


/* 版本支持 */
if(version_compare(PHP_VERSION,'5.3.0','>')) 
	_DealConfig();//初始化
else
	die('require PHP > 5.3.0 !');

/*debug 设置*/
defined('DEBUG') || define('DEBUG', false);

/* 数据库 */
defined('DB_TYPE') || define('DB_TYPE', 'mysql');
/*'DB_TYPE' => 'mysql',           //数据库类型
'DB_HOST' => 'localhost',       //服务器地址
'DB_USER' => 'root',            //用户名
'DB_PWD' => 'abcd1234',       	//密码
'DB_NAME' => 'top',       		//数据库名称
'DB_PORT' => 3306,              //端口
'DB_PREFIX' => 'top_' ,         //表前缀*/
/* 路径定义 */

$_ROOT = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', ROOT));
define('__ROOT__', $_ROOT);
define('__PUBLIC__',__ROOT__.'/Public');
define('UPLOAD',__ROOT__.'/Upload');
//class类后缀
defined('CLASS_EXT') || define('CLASS_EXT', '.class.php');
//默认模块 首页
defined('PAGE_CTRL') || define('PAGE_CTRL', 'Index');
defined('PAGE_ACTION') || define('PAGE_ACTION', 'index');

/*时区设置*/
defined('TIMEZONE') || define('TIMEZONE', 'Asia/Shanghai');
date_default_timezone_set(TIMEZONE);

/* 开启调试 默认关闭 */
if(DEBUG){
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}
/* 日志 */
defined('Logstart') || define('Logstart', true);
defined('Logtype') || define('Logtype', 1);

/* 类库自动加载 */
spl_autoload_register('\ItPHP\Library\ItCore::load');
//new \ItPHP\Library\Log();
//启动
\ItPHP\Library\ItCore::start();
