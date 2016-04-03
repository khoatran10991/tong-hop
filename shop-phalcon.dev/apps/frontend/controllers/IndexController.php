<?php

namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Product;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
	public function initialize(){
		$this->tag->setTitle('Trang chủ');
	}

	public function indexAction()
	{
		$product_fearture = Product::find(
			array(
				"order" => "id DESC",
				"limit"	=> 10
			)
		);
		$this->view->product_fearture = $product_fearture;
	}
}
