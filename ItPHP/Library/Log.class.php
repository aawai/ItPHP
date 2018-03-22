<?php
namespace ItPHP\Library;
class Log
{
	/**
	 *1、日志存储方式
	 *
	 *
	 *2、写日志
	 *
	 *3、默认被错误类掉用
	 */
	
	public function construct()
	{
		if(Logstart)
		{
			/* 目录设置 */
			if(!is_dir(APP.'/Runtime/Log')) mkdir(APP.'/Runtime/Log');
			/* 日志文件设置 日/个 */
			$logFile = APP.'/Runtime/Log/'.date('Y-m-d').'.txt';
			//file_put-contents 会依次执行fopen fwrite fclose
		   	file_put_contents($logFile, 'this is a log - '.date('Y-m-d H:i:s').PHP_EOL,FILE_APPEND);
		}
	}



}
