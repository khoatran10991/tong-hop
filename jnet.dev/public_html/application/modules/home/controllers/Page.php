<?php
/*
* Controller xử lý trang của front end
* Phiên bản : CI 1.0
* Ngày sửa gần nhất : Sang Nguyễn 21/01/2016
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MX_Controller
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
    	echo "<h1>Page content";
    }
 public function page_view($page_url = NULL)
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
                if ($result_siteURL[0]) {
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
					
                        //Load model Page_model để load nội dung page load ra trang
                        $this->load->model("Pages_model");
                        $rs_page = $this->Pages_model->select_page_by_url($result_siteURL[0]->id_store, $page_url);

                        //Nếu page này chưa có, thì chuyển về trang chủ
                        if ($rs_page) {
                            $dataview['page'] = $rs_page[0];
                            $dataview['title'] = $rs_page[0]->page_name;
                            if (!empty($rs_page[0]->page_options) && isset($rs_page[0]->page_options)) {
                                extract(json_decode($rs_page[0]->page_options, true));
                                $dataview['keywords'] = $keyword;
                                $dataview['description'] = $description;
                            }

                            #Load model Dashboard_model để lấy giá trị layout và cho ra ngoài
                            $this->load->model('dashboard/Dashboard_model');
                            $rs_info_site = $this->Dashboard_model->info_site($result_siteURL[0]->id_store);
                            $dataview['layout'] = json_decode($rs_info_site[0]->layout, true);
							$dataview['_path'] = "template/frontend-users/". $result_siteURL[0]->id_theme ."/public";
							
                            #Load model Menu_model để lấy giá trị menu cho ra ngoài
                            $this->load->model('dashboard/Menu_model');
                            $rs_menus = $this->Menu_model->info_menu($result_siteURL[0]->id_store);
                            $dataview['menu']=$rs_menus;

//								echo "<pre>";
//									print_r($dataview);
//								echo "</pre>";

                        } else {
                            redirect($dataview['url_site'], 'refresh');
                        }
                        #load widget
                        $footer =  $this->Home_model->get_widgets("footer",$result_siteURL[0]->id_store);
                        $dataview['widgetfooter'] = json_decode($footer[0]->options);
                        #Lấy các giá trị banner có trong sql để sử dụng

                        $dataview['banner_top'] = modules::run('dashboard/advertising/select_one',$dataview['id_store'],'top');
                        $dataview['banner_left'] = modules::run('dashboard/advertising/select',$dataview['id_store'],'left');
                        $dataview['banner_right'] = modules::run('dashboard/advertising/select',$dataview['id_store'],'right');
                        $dataview['banner_popup'] = modules::run('dashboard/advertising/select_one',$dataview['id_store'],'popup');
                        #Load dữ liệu ra ngoài view
                    	$rs_page[0]->page_content = str_replace("<code>[jnetmap=17]</code>", "hello word !", $rs_page[0]->page_content );		
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/header', $dataview);
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/page', $rs_page[0]);
                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme . '/footer', $dataview);

                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }

    }
}    