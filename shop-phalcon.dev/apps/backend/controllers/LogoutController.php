<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;

class LogoutController extends Controller
{
    public function indexAction()
    {
        $this->session->remove('auth');
        return $this->response->redirect('login');
    }
}