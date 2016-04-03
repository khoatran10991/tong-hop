<?php

namespace Multiple\Backend\Controllers;
use Multiple\Backend\Forms\LoginForm;
use Multiple\Backend\Models\Login;
use Multiple\Backend\Models\Product;
use Multiple\Backend\Models\Products;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
class LoginController extends Controller
{
	private function _registerSession($user)
	{
		$this->session->set('auth', array(
			'id' => $user->id,
			'username' => $user->username,
			'level'		=> $user->level,
			'name'		=> $user->name
		));
	}
	public function indexAction()
	{
		$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
		$form = new LoginForm();
		$this->view->form = $form;
		if ($this->request->isPost()) {
			$username = $this->request->getPost('username','alphanum');
			$password = $this->request->getPost('password');
			$user = Login::findFirst(array(
				"username = :username: AND password = :password:",
				'bind' => array('username' => $username, 'password' => $password)
			));
			if ($user != false) {
				$this->_registerSession($user);
				return $this->response->redirect('dashboard/index');
			}else{
				$this->flash->warning('Vui lòng nhập lại tài khoản và mật khẩu!');
			}
		}
	}
}
