<?php
/*
 * Controller xử lý sản phẩm của front end
 * Phiên bản : CI 1.0
 * Ngày sửa gần nhất : Sang Nguyễn 14/03/2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller
{

    // Controller xác định URL vào để load giao diện và các thông tin cần thiết
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
    }
    public function index() {
    	echo "<h1>Post content";
    }
    public function product_view($product_url = NULL)
    {
    	
    	
    	 # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #Cắt http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());
        $this->load->module('home/url');
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
                    # Nếu tìm thấy site thì hiển thị site đó
                    	
                        
                        #Lấy dữ liệu cho ra view
                        $dataview = array();
                         #thêm dữ liệu chung 
                        $chung = modules::run('home/chung/index');
                        array_push($dataview,$chung);
                        
                        $dataview['global'] = $dataview[0];
                        unset($dataview[0]);
                        
                         if ($result_siteURL[0]->url_pre != "" && $result_siteURL[0]->url_primary == 1) {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
					
                        //Load model Post_model để load nội dung page load ra trang
                        $this->load->model("Products_model");
                        $product = $this->Products_model->get_content_product_by_url($result_siteURL[0]->id_store, $product_url);
						
                        //Nếu page này chưa có, thì chuyển về trang chủ
                    
                        if (($product)) {
                        	// 
                        	$option = json_decode($product[0]->product_options,true);
                        	$dataview['title'] = $product[0]->product_name;
                        	$dataview['description'] = $option['description'];
                        	$dataview['keywords'] = $option['keyword'];
                        	$dataview['image'] = $product[0]->_thumnail;
                        	$product[0]->catelogys = $this->Products_model->get_catelogy_by_id_product($product[0]->id_product);
                        	// bài liên quan relate
                        	// số bài
                        	$number= (isset($dataview['global']['layout']['detailpost']['postperpage'])?$dataview['global']['layout']['detailpost']['postperpage']:6); 
                        	$dataview['relateproducts'] = $this->Products_model->get_products_by_catelogy($result_siteURL[0]->id_store,$product[0]->catelogys[0]->idcatelogy,$number,$product[0]->id_product,"random");
                        	$dataview['product'] = $product[0];
                        	
                        	$dataview['id_store'] = $result_siteURL[0]->id_store;
                        	
                        	
                        	
                        	$dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/single-product/content_single_product';	
                        	
                        } else {
                        	$dataview['title'] = "không tìm thấy";
                            $dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/404';	
                        }
                        #Load model Dashboard_model để lấy giá trị layout và cho ra ngoài
                  
                        
                		

                        

                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/index', $dataview);

                    
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }
    }	
}   