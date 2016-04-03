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
                        $dataview['title'] = $siteURL->title;
                        $dataview['description'] = $siteURL->description;
                        $dataview['keywords'] = $siteURL->keywords;
                        if ($result_siteURL[0]->url_pre != "" && $result_siteURL[0]->url_primary == 1) {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
 
						 #thêm dữ liệu chung 
                        $chung = modules::run('home/chung/index');
                        array_push($dataview,$chung);
                        
                        $dataview['global'] = $dataview[0];
                        unset($dataview[0]);

						$dataview['template'] = 'frontend/' . $siteURL->id_theme . '/404';	

                        $this->load->view('frontend/' . $siteURL->id_theme . '/index', $dataview);

                    }
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }

    }
}   