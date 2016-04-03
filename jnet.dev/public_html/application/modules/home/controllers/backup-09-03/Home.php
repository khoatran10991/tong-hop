<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller
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

    public function index()
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
                    foreach ($result_siteURL as $siteURL) {
                        #Nếu có domain chính thì chuyển từ subdomain sang domain chính
                        if ($siteURL->url_pre != "" and $siteURL->url_base == 'http://' . $pageURL) {
                            redirect($siteURL->url_pre, 'refresh');
                        }
                        # nếu không tìm thấy thì hiển thị nội dung
                        $dataview['title'] = "Trang chủ";
                      
                        //Tùy vào địa chỉ trang web là sub hay pre để gắn url_site
                        if (!empty($siteURL->url_pre)) {
                            $dataview['url_site'] = $siteURL->url_pre;
                        } else {
                            $dataview['url_site'] = $siteURL->url_base;
                        }
                        #Load model Dashboard_model để lấy giá trị layout và cho ra ngoài
                        $this->load->model('dashboard/Dashboard_model');
 
                        # lấy các bài viết mới cho trang chủ
                        $this->load->model('Posts_model');
                        $dataview['news'] = $this->Posts_model->get_all_post_by_desc($siteURL->id_store,5);
        
                        $i = 0;
                        foreach ($dataview['news'] as $news) {
                        	$dataview['news'][$i]->catelogy_name = $this->Posts_model->get_catelogy_by_post($dataview['news'][$i]->post_catelogy);
                        	$i++;
                        }
                        # lấy các bài viết nổi bật
                        $dataview['featured'] = $this->Posts_model->get_all_post_featured($siteURL->id_store,8);
                        $j = 0;
                        foreach ($dataview['featured'] as $news) {
                        	$dataview['featured'][$j]->catelogy_name = $this->Posts_model->get_catelogy_by_post($dataview['featured'][$j]->post_catelogy);
                        	$j++;
                        }
                        
                        # các bài viết xem nhiều
                        $dataview['populars'] = $this->Posts_model->get_all_post_by_view($siteURL->id_store);
                        $dataview['layout'] = json_decode($siteURL->layout, true);
                        # nếu trang chủ là 1 trang tĩnh
						if(isset($dataview['layout']['home-display']) && $dataview['layout']['home-display'] == 'page') {
							$pageId = $dataview['layout']['home-page-id'];
							$this->load->model('Pages_model');
							$page = $this->Pages_model->get_content_page_by_id($pageId,$siteURL->id_store);
				
						}
                       
						 #thêm dữ liệu chung 
                        $chung = modules::run('home/chung/index');
                        array_push($dataview,$chung);
                        
                        $dataview['global'] = $dataview[0];
                        unset($dataview[0]);

						$dataview['template'] = 'frontend/' . $siteURL->id_theme . '/home';	

                        $this->load->view('frontend/' . $siteURL->id_theme . '/index', $dataview);

                    }
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }


    }

}