<?php
use Phalcon\Mvc\View;
class DashboardController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Quản lý và cài đặt');
        $this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
    }

    public function indexAction()
    {
        $this->view->setVar('name_action','Tổng quan');
    }

    public function productsAction()
    {
        $this->view->setVar('name_action','Danh sách sản phẩm');
    }
    public function addproductAction()
    {
        $this->view->setVar('name_action','Thêm sản phẩm');
    }
    public function saleproductAction()
    {
        $this->view->setVar('name_action','Quản lý khuyến mãi');
    }

}

