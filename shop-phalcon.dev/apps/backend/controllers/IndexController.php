<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
	public function initialize(){
		if(!$this->session->has('auth')){
			$this->response->redirect('login');
		}
	}

	public function indexAction()
	{
		$this->tag->setTitle('Quản lý website');

	}
}
