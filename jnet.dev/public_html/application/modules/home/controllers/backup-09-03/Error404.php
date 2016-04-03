<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends MX_Controller
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
                        $dataview = array(
                            'id_store' => $siteURL->id_store,
                            'title' => "404 - ".$siteURL->title,
                            'description' => $siteURL->description,
                            'keywords' => $siteURL->keywords,
                            'phone' => $siteURL->phone,
                            'address' => $siteURL->address,
                            'layout' => $siteURL->layout,
                            'time_exp' => $siteURL->time_exp,
                            '_path' => "template/frontend-users/". $siteURL->id_theme ."/public"
                        );
                        //Tùy vào địa chỉ trang web là sub hay pre để gắn url_site
                        if (!empty($siteURL->url_pre)) {
                            $dataview['url_site'] = $siteURL->url_pre;
                        } else {
                            $dataview['url_site'] = $siteURL->url_base;
                        }

                        #Load model Dashboard_model để lấy giá trị layout và cho ra ngoài
                        $this->load->model('dashboard/Dashboard_model');
                        $rs_info_site = $this->Dashboard_model->info_site($siteURL->id_store);
                        $dataview['layout'] = json_decode($rs_info_site[0]->layout, true);
                        
               
                        $this->load->model('dashboard/Menu_model');
                        $rs_menus = $this->Menu_model->info_menu($siteURL->id_store);
                        $dataview['menu']=$rs_menus;

                        $this->parser->parse('frontend/' . $siteURL->id_theme . '/header', $dataview);
                       
                        $this->parser->parse('frontend/' . $siteURL->id_theme . '/404', $dataview);
                        $this->parser->parse('frontend/' . $siteURL->id_theme . '/footer', $dataview);

                    }
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }


    }
}   