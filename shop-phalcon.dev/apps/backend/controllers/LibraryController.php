<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;

class LibraryController extends Controller
{
	public function initialize(){
		if(!$this->session->has('auth')){
			$this->response->redirect('login');
		}
	}

	public function indexAction()
	{
		$this->tag->setTitle('Thư viện hình ảnh - video');
	}
}
