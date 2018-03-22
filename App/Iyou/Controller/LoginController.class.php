<?php
namespace App\Iyou\Controller;
use ItPHP\Library\Controller;

class LoginController extends Controller {

	public function login(){

		$this->assign('Login','IYOU This ia sLogin');

		$this->display();
	}
}


