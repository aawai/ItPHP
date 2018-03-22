<?php
namespace ItPHP\Library;

class Model extends \PDO
{
	public function __construct()
	{
		$dsn = DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME;
		$username = DB_USER;
		$password = DB_PWD;
		try{
			parent::__construct($dsn,$username,$password);
		}catch(\PDOException $e){
			p($e->getMessage());
		}
	}
}