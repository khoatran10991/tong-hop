<?php
use Phalcon\Mvc\View;
class LoginController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
        $this->tag->setTitle('Đăng nhập hệ thống');
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }

    public function indexAction()
    {

    }

}

