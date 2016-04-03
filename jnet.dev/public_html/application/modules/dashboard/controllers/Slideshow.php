<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller quản trị của users
 */
class Slideshow extends MX_Controller
{

    function __construct()
    {
        # code...
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('parser');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        # lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        # code...
        $user_session = $this->session->userdata('user_session');
//         echo "<pre>";
//         print_r ($user_session);
//         echo "</pre>";
        if ($user_session) {
            # Nếu có session trong phiên đăng nhập
            $this->load->model('Dashboard_model');
            $result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
            foreach ($result_info_site as $info_site) {
                $data_view = array('logo' =>$info_site->logo ,
                    'title'=>$info_site->title,
                    'url_site'=>$user_session['url'],
                    'username' => $user_session['username'],
                );
            }
//            Load model slideshow
            $this->load->model('Slideshow_model');


            if($this->input->post("submit-slideshow")){

                //Lấy tất cả thông tin của form khi nhấn Lưu
                $data_slideshow = $this->input->post();

                //Chuyển sang dạng json để lưu
                $data_slideshow = json_encode($data_slideshow);

                //update hoặc insert thông tin slideshow và csdl
                $this->Slideshow_model->update_slideshow($user_session['id_store'],$data_slideshow);
            }
            //Lấy dữ liệu slideshow để đưa ra index

            $rs_select_slide = $this->Slideshow_model->select_slideshow($user_session['id_store']);
            if($rs_select_slide)
            	$rs_select_slide =  $rs_select_slide[0]->data;
           	 $data_view['data_slide'] = json_decode($rs_select_slide,true);
//                				echo "<pre>";
//                				print_r($rs_select_slide);
//                				echo "</pre>";

            $this->parser->parse('header',$data_view);
            $this->parser->parse('slide-show',$data_view);
            $this->parser->parse('footer',$data_view);
        } else {
            # Nếu không thì chuyển về trang login
            redirect('http://' . $pageURL . '/login.html', 'refresh');
        }
    }
}