<?php

namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Product;
use Phalcon\Mvc\Controller;
use Multiple\Backend\Models\Products as Products;
use Phalcon\Tag;
use Faker\Factory as Faker;
class ProductController extends Controller
{
	public function initialize()
	{
		if(!$this->session->has('auth')){
			$this->response->redirect('login');
		}
		$this->tag->setTitle('Sản phẩm');
	}
	public function indexAction()
	{
			$products = Product::find(
				array(
					"order" =>"id DESC"
				)
			);
			$this->view->products = $products;
	}
	public function addAction()
	{
		if($this->request->isPost()){
			$product = new Product();
			$product->name_product = $this->request->getPost('name_product');
			$product->content_product = $this->request->getPost('content_product');
			$product->sku_product = $this->request->getPost('sku_product');
			$product->price_product = $this->request->getPost('price_product');
			$product->shipping_cost = $this->request->getPost('shipping_cost');
			$product->image_repersent = $this->request->getPost('image_repersent');
			$product->gallery_images = json_encode($this->request->getPost('gallery_images'));
			$product->tag_product = $this->request->getPost('tag_product');
			$product->description_seo_product = $this->request->getPost('description_seo_product');
			if($this->request->getPost('tag_product')=='Lưu nháp'){
				$product->status = 'draft';
			}else{
				$product->status = 'public';
			}
			$product->created = date('Y-m-d');
			if ($product->save() == false) {
				foreach ($product->getMessages() as $message) {
					$this->flash->error((string) $message);
				}
			} else {
				$product->link_product = $this->replace_titleAction($product->name_product)."-".$product->id;
				if($product->save() == false){
					foreach ($product->getMessages() as $message) {
						$this->flash->error((string) $message);
					}

				}else{
					$this->flash->success('Đã thêm thành công sản phẩm!');
					$this->dispatcher->forward(
						array(
							"controller" => "product",
							"action"     => "index"
						)
					);
				}


			}


		}
	}
	public function saleAction()
	{

	}
	public function fakerAction()
	{
		require_once '/faker/autoload.php';
		$faker = Faker::create('vi_VN');
		for($i=1;$i<=1;$i++){
			$product = new Product();
			$product->name_product = $faker->sentence($nbWords = 5, $variableNbWords = true);
			$product->content_product = $faker->paragraph($nbSentences = 50, $variableNbSentences = true);
			$product->sku_product = $faker->swiftBicNumber;;
			$product->price_product = $faker->numberBetween($min = 1000, $max = 100000000);
			$product->shipping_cost = 'free';
			$product->image_repersent = '/uploads/635918163077929185_s7e-g1.jpg';
			$product->gallery_images = '["\/uploads\/635918163289949185_s7e-g2.jpg","\/uploads\/635918163077929185_s7e-g1.jpg","\/uploads\/635918163660339185_s7e-g5.jpg","","",""]';
			$product->tag_product = $faker->words($nb = 3, $asText = true).",".$faker->words($nb = 3, $asText = true).",".$faker->words($nb = 3, $asText = true);
			$product->description_seo_product = $faker->paragraph($nbSentences = 10, $variableNbSentences = true);
			$product->status = 'public';
			$product->created = date('Y-m-d');
			if ($product->save()) {
				$product->link_product = $this->replace_titleAction($product->name_product."-".$product->id);
				if($product->save()){
					$this->flash->success('Thêm sản phẩm thành công! - '.$product->id);
				}
			}
		}
	}

	public function replace_titleAction($str = null)
	{
		if($this->request->getPost('str')){
			$str = $this->request->getPost('str');
		}
		if(!$str) return false;
		$unicode = array(
			'' => array(":","-"),
			'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
			'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
			'd'=>array('đ'),
			'-'=>array('-'),
			'D'=>array('Đ'),
			'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
			'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
			'i'=>array('í','ì','ỉ','ĩ','ị'),
			'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
			'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
			'0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
			'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
			'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
			'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
			'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
			'-'=>array(',',' ','&quot;','.',';',':'),
			''=>array(' ,',', ',' .','. ',' ;','; ',' :',': ',"'"),
			''=>array('/',', ',' .','. ',' ;','; ',' :',': ',"'"),
			'' => array("'","?"," ?","? ")

		);

		foreach($unicode as $nonUnicode=>$uni){
			foreach($uni as $value)
				$str = str_replace($value,$nonUnicode,$str);
			$str = strtolower($str);

		}
		return $str;
	}
}
