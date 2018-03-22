<?php
/* 输出函数 */
function abc($var)
{
	if(is_bool($var))
		var_dump($var);
	elseif(is_null($var))
		var_dump($var);
	elseif(is_string($var))
		echo $var;
	else
		echo '<pre>'.print_r($var,true).'</pre>';
}

