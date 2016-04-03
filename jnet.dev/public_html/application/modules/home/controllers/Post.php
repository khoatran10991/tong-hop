<?php
/*
 * Controller xử lý bài viết của front end
 * Phiên bản : CI 1.0
 * Ngày sửa gần nhất : Sang Nguyễn 24/03/2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MX_Controller
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
 public function post_view($post_url = NULL)
    {
        # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #Cắt http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());
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
                        
                        //Tùy vào địa chỉ trang web là sub hay pre để gắn url_site
                        if ($result_siteURL[0]->url_pre != "" && $result_siteURL[0]->url_primary == 1) {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
					
                        //Load model Post_model để load nội dung page load ra trang
                        $this->load->model("Posts_model");
                        $post = $this->Posts_model->get_content_post_by_url($result_siteURL[0]->id_store, $post_url);
						
                        //Nếu page này chưa có, thì chuyển về trang chủ
                    
                        if ($post) {
                        	// 
                        	$option = json_decode($post[0]->post_options,true);
                        	$dataview['title'] = $post[0]->post_name;
                        	$dataview['description'] = $option['description'];
                        	$dataview['keywords'] = $option['keyword'];
                        	$dataview['image'] = $option['image'];
                        	$post[0]->catelogys = $this->Posts_model->get_catelogy_by_id_post($post[0]->id_post);
                        	// bài liên quan relate
                        	// số bài
                        	$number= (isset($dataview['global']['layout']['detailpost']['postperpage'])?$dataview['global']['layout']['detailpost']['postperpage']:6); 
                        	$dataview['relateposts'] = $this->Posts_model->get_posts_by_catelogy($result_siteURL[0]->id_store,$post[0]->catelogys[0]->idcatelogy,$number,$post[0]->id_post,"random");
                        	$dataview['post'] = $post[0];
                        	
                        	
                        	
                        	
                        	$dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/single';	
                        	
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