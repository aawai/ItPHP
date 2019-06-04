<?php
namespace App\Iyou\Controller;
use ItPHP\Library\Controller;
use ItPHP\Library\Model;

class IndexController extends Controller {
	public function index()
	{
		$this->assign('name','IYOYU');
		$this->assign('age','18');
		//报错 不知道是什么原因 希望去查找是否是因为数据库原因
		//这是测试git 拉取功能
		//$model = new Model();
		//$sql = "SELECT username FROM top_user WHERE id = 31";
		//$result = $model->query($sql);
		//p($result->fetchAll());

		//p($_SERVER);
		$this->display();
	}



}


?>
