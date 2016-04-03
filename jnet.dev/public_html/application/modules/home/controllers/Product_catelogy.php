<?php
/*
 * Controller xử lý bài viết của front end
 * Phiên bản : CI 1.0
 * Ngày sửa gần nhất : Sang Nguyễn 23/01/2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_catelogy extends MX_Controller
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
    public function index($catelogy_url = null,$child = null,$subchild = null) {
    	// get url trừ tên miền , kq  có dạng /chuyen-muc/sang-nguyen.html
       // $catelogy_url =$_SERVER['REQUEST_URI'];
        // loại bỏ .html sau cùng , kq trả về /chuyen-muc/sang-nguyen để đối chiếu với csdl
       // $catelogy_url = explode(".",$catelogy_url);
     	# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
     	if($child != null) $catelogy_url = $child;
     	if($subchild != null) $catelogy_url = $subchild;
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
                        
                        
                        
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
                            'description' => $result_siteURL[0]->description,
                            'keywords' => $result_siteURL[0]->keywords,
                            'phone' => $result_siteURL[0]->phone,
                            'address' => $result_siteURL[0]->address,
                            'title' => "Chuyên mục",
                            'url_site' => $pageURL		
                        );
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
                           $this->load->model("Product_catelogy_model");
                           $this->load->model("Products_model");
                           // lấy ID của catelogy bởi url catelogy
                           $catelogy = $this->Product_catelogy_model->select_id_by_url_catelogy($result_siteURL[0]->id_store, $catelogy_url);
							
							
                           if($catelogy) :
	                           // lấy bài viết bởi ID catelogy
	                           
	                          // $products = $this->Products_model->get_products_by_catelogy($result_siteURL[0]->id_store,$catelogy[0]->id_category);
	                         
                           	   $dataview['title'] = $catelogy[0]->name ." - ".$result_siteURL[0]->title ;	
                           	   
                           	   // thong tin của chuyên mục
                           	   $dataview['catelogys'][1] = array(
                           	   		"name" => $catelogy[0]->name,
                           	   		"url" => $this->url->get_url_cate($catelogy[0]->link,$result_siteURL[0]->id_store),
                           	   		"description" => $catelogy[0]->description
                           	   );
                          
                           	   // chuyên mục này có nằm trong 1 chuyên mục khác không ?
                           	   // nếu có show cả chuyên mục tên chuyên mục cha của nó ra breadcrumbs luôn
                           	   if($catelogy[0]->id_parent != 0) {
									$subcatelogy = $this->Product_catelogy_model->select_by_id_catelogy($result_siteURL[0]->id_store,$catelogy[0]->id_parent);
									if($subcatelogy) {
										$dataview['catelogys'][2] = array(
		                           	   		"name" => $subcatelogy[0]->name,
		                           	   		"url" => $this->url->get_url_cate($subcatelogy[0]->link,$result_siteURL[0]->id_store),
		                           	   		"description" => $subcatelogy[0]->description
		                           	   );
		                      
									}
									
									$subsubcatelogy = $this->Product_catelogy_model->select_by_id_catelogy($result_siteURL[0]->id_store,$subcatelogy[0]->id_parent);
									if($subsubcatelogy) {
										$dataview['catelogys'][3] = array(
		                           	   		"name" => $subsubcatelogy[0]->name,
		                           	   		"url" => $this->url->get_url_cate($subsubcatelogy[0]->link,$result_siteURL[0]->id_store),
		                           	   		"description" => $subsubcatelogy[0]->description
		                           	   );
									}
									
								}	
								
								
						  
                           endif;  
                           	   
                           	 
                           	   // phân trang 
                           	  if(isset($dataview['global']['layout']['detailproduct']['numberproducts']) && $dataview['global']['layout']['detailproduct']['numberproducts'] != 0)
                           	   		$per_page = $dataview['global']['layout']['detailproduct']['numberproducts'];
                           	   	else 
                           	   		$per_page = 12;	
                           	   		
                           	   		
                           	   		
                           	   if($catelogy) {
                           	   		$this->load->library('pagination');
						            $config = array();
						            $config['page_query_string'] = TRUE;
						            $config['query_string_segment'] = 'p';
						            $config['base_url'] = $dataview['url_site'] .$_SERVER['PHP_SELF'];
						            $config['total_rows'] = $this->Products_model->count_product_by_catelogy($result_siteURL[0]->id_store,$catelogy[0]->id_category); //Đếm tổng số post có trong store
						           
						            $config['use_page_numbers'] = TRUE;
									$config["per_page"] = $per_page;
						            $config['num_links'] = 5; // số hiển thị xung quang item
					
									// kiểm tra phân trang 
									$segment = $this->uri->segment(3);
									if($this->input->get('p'))
										$segment =  $this->input->get('p');
									
						            $config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
						            $config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
						            $config['next_tag_open'] = "<li>";
						            $config['next_tagl_close'] = "</li>";
						            $config['prev_tag_open'] = "<li>";
									$config['prev_tagl_close'] = "</li>";
						            $config['num_tag_open'] = '<li>';
						            $config['num_tag_close'] = '</li>';
						            $config['full_tag_open'] = '<ul class="pagination" style="margin: 0">';
						            $config['full_tag_close'] = '</ul>';
						            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
						            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						          
						            $this->pagination->initialize($config);
						            $dataview['pagination']['pagination'] = $this->pagination->create_links();
						            $dataview['pagination']['total'] = $config['total_rows'];
						            $dataview['pagination']['cur_display'] = $segment;
						            $dataview['pagination']['per_page'] = $per_page;
						            
						            if($this->input->get('orderBy') && $this->input->get('orderBy') != 'date') {
						            	$orderBy = str_replace("'","",$this->input->get('orderBy'));
										$orderBy =  addslashes($orderBy);
									} else 
										$orderBy = null;
						            
									$products = $this->Products_model->get_product_by_catelogy_phantrang_beta($config["per_page"],$segment,$result_siteURL[0]->id_store,$catelogy[0]->id_category,$orderBy);
								
							   		
							   }
	                          
						   if(isset($products)) {
						   		$dataview['products'] = $products;	
						   }
                           #load widget
 
                         
						if($catelogy)
							$dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/products_catelogy';	
						else 
							$dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/404';	

                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme  . '/index', $dataview);

                   
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }
    	
    }

}    