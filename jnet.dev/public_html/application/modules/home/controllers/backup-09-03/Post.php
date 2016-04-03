<?php
/*
 * Controller xử lý bài viết của front end
 * Phiên bản : CI 1.0
 * Ngày sửa gần nhất : Sang Nguyễn 22/01/2016
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
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
                            'description' => $result_siteURL[0]->description,
                            'keywords' => $result_siteURL[0]->keywords,
                            'phone' => $result_siteURL[0]->phone,
                            'address' => $result_siteURL[0]->address,
                            'layout' => $result_siteURL[0]->layout,
                            'time_exp' => $result_siteURL[0]->time_exp,
                            'footer' => json_decode($result_siteURL[0]->footer,true),
                            'social' => json_decode($result_siteURL[0]->social,true),
                            'verification_google' => json_decode($result_siteURL[0]->verification_google,true),
                        );
                        //Tùy vào địa chỉ trang web là sub hay pre để gắn url_site
                        if ($result_siteURL[0]->url_pre != "") {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
					
                        //Load model Post_model để load nội dung page load ra trang
                        $this->load->model("Posts_model");
                        $post = $this->Posts_model->get_content_post_by_url($result_siteURL[0]->id_store, $post_url);
						
                        //Nếu page này chưa có, thì chuyển về trang chủ
                        if ($post) {
                        	// lấy các bài viết xem nhiều cho sitebar
                        	$dataview['populars'] = $this->Posts_model->get_all_post_by_view($result_siteURL[0]->id_store,$post[0]->id_post);
                        	$dataview['title'] = $post[0]->post_name;
                        	$options = json_decode($post[0]->post_options,true);
                        	$dataview['description'] = $options['description'];
                        	$dataview['image'] = $options['image'];
                        } else {
                            redirect($dataview['url_site'], 'refresh');
                        }
                        #Load model Dashboard_model để lấy giá trị layout và cho ra ngoài
                        $this->load->model('dashboard/Dashboard_model');
                        $rs_info_site = $this->Dashboard_model->info_site($result_siteURL[0]->id_store);
                        $dataview['layout'] = json_decode($rs_info_site[0]->layout, true);
                        
                       
                        // lấy menu
                        $this->load->model('dashboard/Menu_model');
                        $rs_menus = $this->Menu_model->info_menu($result_siteURL[0]->id_store);
                        $dataview['menu']=$rs_menus;

                        #load widget
                        $footer =  $this->Home_model->get_widgets("footer",$result_siteURL[0]->id_store);
                        $dataview['widgetfooter'] = json_decode($footer[0]->options);
                        #Lấy các giá trị banner có trong sql để sử dụng

                        $dataview['banner_top'] = modules::run('dashboard/advertising/select_one',$dataview['id_store'],'top');
                        $dataview['banner_left'] = modules::run('dashboard/advertising/select',$dataview['id_store'],'left');
                        $dataview['banner_right'] = modules::run('dashboard/advertising/select',$dataview['id_store'],'right');
                        $dataview['banner_popup'] = modules::run('dashboard/advertising/select_one',$dataview['id_store'],'popup');
                        #Load dữ liệu ra ngoài view
                        $dataview['_path'] = "template/frontend-users/". $result_siteURL[0]->id_theme ."/public";
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/header', $dataview);
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/single', $post[0]);
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/sidebar', $dataview);
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/footer', $dataview);

                    
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }

    }
}    