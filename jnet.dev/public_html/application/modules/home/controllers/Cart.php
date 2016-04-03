<?php
/*
 * Controller x? l? gi? hàng
 * Phiên b?n : CI 1.0
 * Ngày s?a g?n nh?t : Sang Nguy?n 15/03/2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MX_Controller
{

    // Controller sassasa
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
         $this->load->library('cart');
          
    }
    
    public function index() {
    	
    	$pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #C?t http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());

        $this->load->model('Cart_model');
        $this->load->library('getthumb');
        switch ($pageURL) {
            case  $baseURL:
                //$this->load->view('frontend/home/header');
                // $this->load->view('frontend/home/content');
                // $this->load->view('frontend/home/footer');
                $this->load->view('frontend/home/index');
                break;

            default:
                $this->load->model('Home_model');
                $result_siteURL = $this->Home_model->siteURL($pageURL);
                if ($result_siteURL) {
                    # N?u t?m th?y site th? hi?n th? site đó
                        #L?y d? li?u cho ra view                    
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
                            'description' => $result_siteURL[0]->description,
                            'keywords' => $result_siteURL[0]->keywords,
                            'phone' => $result_siteURL[0]->phone,
                            'address' => $result_siteURL[0]->address,
                            'title' => "Giỏ hàng ",
                            'url_site' => $pageURL		
                        );
                        #thêm d? li?u chung 
                        $chung = modules::run('home/chung/index');
                        array_push($dataview,$chung);
                        
                        $dataview['global'] = $dataview[0];
                        unset($dataview[0]);
                        
                        //Tùy vào đ?a ch? trang web là sub hay pre đ? g?n url_site
                        if ($result_siteURL[0]->url_pre != "" && $result_siteURL[0]->url_primary == 1) {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
                        
                        // cart 
                        if($this->input->post('addcart')) {
							$qty = $this->input->post('qty');
							$id_product = $this->input->post('idproduct');
							$product = $this->Cart_model->get_product_by_id($id_product,$result_siteURL[0]->id_store);
						
							if($product) {
								if($product[0]->_price_sale == "" || $product[0]->_price_sale == 0)
									$price = $product[0]->_price;
								else 
									$price = $product[0]->_price_sale;	
								$insert_data = array( 
										 'id' => $id_product,
										 'name' => $product[0]->product_name,
										 'price' => $price,
										 'qty' => $qty,
										 'id_store' => $result_siteURL[0]->id_store,
										 'thumb' => $product[0]->_thumnail,
										 'url' => $product[0]->product_url
								);

								// This function add items into cart.
								if($this->cart->insert($insert_data)) {
									$dataview['message'] = "<i class='fa fa-smile-o'></i> <p><b>".$product[0]->product_name."</b> đã được thêm vào giỏ hàng.</p>";
									
								}
								
								
							} else {
								$dataview['message'] = "Không tìm thấy sản phẩm này trong website, vui lòng thử lại.";
								
							}
							
							
						} 
						
						if($this->input->post('updateQty')) {
							$rowid = $this->input->post('rowid');
							$qty = $this->input->post('qty');
							$data=$this->cart->contents();
						        foreach($data as $item){
						            if($item['rowid'] == $rowid){
						                $delOne = array("rowid" => $item['rowid'], "qty" => $qty);
						            }
						        }
						        if($this->cart->update($delOne))
						        	$dataview['message'] = "<i class='fa fa-smile-o'></i> <p>Cập nhật số lượng sản phẩm thành công.</p>";
						        else 
						        	$dataview['message'] = '<i class="fa fa-exclamation-triangle"></i> <p>Không thể cập nhật số lượng sản phẩm này, vui lòng thử lại.</p>';	
						}
						
						if($this->input->post('removeItem')) {
							// dùng cho ajax
							$rowid= addslashes($this->input->post('removeItem'));
							$data=$this->cart->contents();
						        foreach($data as $item){
						            if($item['rowid'] == $rowid){
						                $delOne = array("rowid" => $item['rowid'], "qty" => 0);
						            }
						        }
						        if($this->cart->update($delOne))
						        	echo 1;
						        else 
						        	echo 0;	
						} else if($this->input->post('addcartajax')) {
							
							$qty = $this->input->post('qty');
							$id_product = $this->input->post('idproduct');
							$product = $this->Cart_model->get_product_by_id($id_product,$result_siteURL[0]->id_store);
							
							if($product) {
								if($product[0]->_price_sale == "" || $product[0]->_price_sale == 0)
									$price = $product[0]->_price;
								else 
									$price = $product[0]->_price_sale;	
								$insert_data = array( 
										 'id' => $id_product,
										 'name' => $product[0]->product_name,
										 'price' => $price,
										 'qty' => $qty,
										 'id_store' => $result_siteURL[0]->id_store,
										 'thumb' => $product[0]->_thumnail,
										 'url' => $product[0]->product_url
								);

								// This function add items into cart.
								if($this->cart->insert($insert_data)) {
									$return['status'] = 1;
									$return['namw'] = $product[0]->product_name;
									$return['price'] = $price;
									$return['qty'] = $qty;
									$return['thumb'] = $this->getthumb->image($product[0]->_thumnail);
									echo 1;
								}
								
								
							} else {
									echo 0;
							}
						
						}  else {
							$dataview['cart'] = $this->cart->contents();
							$dataview['total'] = $this->cart->total();
							$dataview['template'] = 'frontend/11/cart/view_cart';
						
							$this->load->view('frontend/' . $result_siteURL[0]->id_theme  . '/index', $dataview);
						}
						
						

                        
    			} else {
					redirect(base_url(), 'refresh');
				}
			break;
			
		}		
    	
		
		
		
	}
	
	public function checkout() {
		$pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #C?t http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());

        $this->load->model('Cart_model');
        $this->load->library('getthumb');
        switch ($pageURL) {
            case  $baseURL:
                //$this->load->view('frontend/home/header');
                // $this->load->view('frontend/home/content');
                // $this->load->view('frontend/home/footer');
                $this->load->view('frontend/home/index');
                break;

            default:
                $this->load->model('Home_model');
                $result_siteURL = $this->Home_model->siteURL($pageURL);
                if ($result_siteURL) {
                    # N?u t?m th?y site th? hi?n th? site đó
                        #L?y d? li?u cho ra view                    
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
                            'description' => $result_siteURL[0]->description,
                            'keywords' => $result_siteURL[0]->keywords,
                            'phone' => $result_siteURL[0]->phone,
                            'address' => $result_siteURL[0]->address,
                            'title' => "Đặt hàng và thanh toán ",
                            'url_site' => $pageURL		
                        );
                        #thêm d? li?u chung 
                        $chung = modules::run('home/chung/index');
                        array_push($dataview,$chung);
                        
                        $dataview['global'] = $dataview[0];
                        unset($dataview[0]);
                        
                        //Tùy vào đ?a ch? trang web là sub hay pre đ? g?n url_site
                        if ($result_siteURL[0]->url_pre != "") {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
                        $dataview['template'] = 'frontend/11/cart/checkout';
                        if($this->input->post('order')) {
							$data = $this->input->post();
							
							$cart = $this->cart->contents();
							$total = $this->cart->total();
							$customer = $this->input->post();
							$province = $this->input->post('province');
							$status = 1;
							$shipping = $this->input->post('shipping');
							$payment = $this->input->post('payment');
							$orderNumber = $this->creatOrderNumber(7);
						
							$history = array(
								date('d/m/Y H:i:s',time())." ".$this->input->post('fullname')." đã đặt hàng từ trang thanh toán"
							);
							
							$data = array(
								'id_store' => $result_siteURL[0]->id_store,
								'order_number' => $orderNumber,
								'products' => json_encode($cart),
								'customer' => json_encode($customer),
								'province' => $province,
								'total' => $total,
								'time_order' => time(),
								'status_order' => 3,
								'coupon_code' => '',
								'shipping' => $shipping,
								'payment_method' => $payment,
								'order_history'=>json_encode($history)
							);
							if(count($cart) >= 1 ) {
								$insert = $this->Cart_model->insert_order($data);
								if($insert) {
									$dataview['order_number'] = $orderNumber;
									$dataview['title'] = "Đặt hàng thành công - ".$result_siteURL[0]->title;
									$dataview['customer'] = $customer;
									$dataview['template'] = 'frontend/11/cart/order_success';
									$dataview['total'] = $total;
									$dataview['shipping'] = $this->Cart_model->get_shipping_by_id($shipping,$result_siteURL[0]->id_store);
									$dataview['items'] = $cart;
									$this->cart->destroy();
								} else {
									
									$dataview['message'] = '<i class="fa fa-exclamation-triangle"></i> <p>Không thể tạo đơn hàng, vui lòng thử lại</p>';
								}
							} else {
									$dataview['message'] = '<i style="color:#e74c3c" class="fa fa-exclamation-triangle"></i> <p style="color:#e74c3c">Lỗi trong quá trình đặt hàng, vui lòng thử lại.</p>';
									
								}
							
								
							
						}
						
							$dataview['cart'] = $this->cart->contents();
							$dataview['total'] = $this->cart->total();
							$dataview['provinces'] = $this->Cart_model->get_provinces();
							$dataview['shipping'] = $this->Cart_model->get_shipping($result_siteURL[0]->id_store);
							
							$this->load->view('frontend/' . $result_siteURL[0]->id_theme  . '/index', $dataview);
						
                        
    			} else {
					redirect(base_url(), 'refresh');
				}
			break;
			
		}		
		
	}	
	public function creatOrderNumber($length = 7) {
		$domain = $_SERVER['HTTP_HOST'];
		$key = substr($domain,0,1);
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return strtoupper($key).$randomString;
	}
	
	
 }  
