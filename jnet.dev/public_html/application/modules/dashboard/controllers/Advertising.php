<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller quản trị của users
 */
class Advertising extends MX_Controller
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
        $user_session=$this->session->userdata('user_session');
        // echo "<pre>";
        // print_r ($_SESSION['username']);
        // echo "</pre>";
        if ($user_session) {
            # Nếu có session trong phiên đăng nhập
            $this->load->model('Dashboard_model');
            $result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
            foreach ($result_info_site as $info_site) {
                $data_view = array('logo' =>$info_site->logo ,
                    'title'=>$info_site->title,
                    'url_site'=>$user_session['url'],
                    'username' => $user_session['username'],
                    'fullname' => $user_session['fullname'],
                    'template'=>'advertising'
                );
            }

            #Load model Advertising
            $this->load->model('Advertising_model');

            #Kiểm tra và thêm vào danh sách quảng cáo
            if($this->input->post("submit_advertising_img") || $this->input->post("submit_advertising_html")){

                    //Lấy tất cả thông tin của form khi nhấn Lưu
                    $data_advertising = $this->input->post();
                $area_advertising = $data_advertising['area-advertising'];
                if(!empty($data_advertising['advertising-img'])){
                    $data_advertising = array(
                        'advertising-img'=>$data_advertising['advertising-img'],
                        'link-advertising'=>$data_advertising['link-advertising'],
                    );
                }else{
                    $data_advertising = array(
                        'advertising-html'=>$data_advertising['advertising-html'],
                        'link-advertising'=>$data_advertising['link-advertising']
                    );
                }


                $data_advertising = json_encode($data_advertising);



                if($this->Advertising_model->insert_banner($user_session['id_store'],$data_advertising,$area_advertising)){
                    $data_view['result_action_banner']="Thêm quảng cáo thành công!";
                }
            }
            if($this->input->post("submit_update_advertising_img") || $this->input->post("submit_update_advertising_html")){
                //Lấy tất cả thông tin của form khi nhấn Lưu
                $data_advertising = $this->input->post();
                $area_advertising = $data_advertising['area-advertising'];
                $id_advertising =$data_advertising['id-advertising'];
                if(!empty($data_advertising['advertising-img'])){
                    $data_advertising = array(
                        'advertising-img'=>$data_advertising['advertising-img'],
                        'link-advertising'=>$data_advertising['link-advertising'],
                    );
                }else{
                    $data_advertising = array(
                        'advertising-html'=>$data_advertising['advertising-html'],
                        'link-advertising'=>$data_advertising['link-advertising']
                    );
                }


                $data_advertising = json_encode($data_advertising);



                if($this->Advertising_model->update_banner($id_advertising,$user_session['id_store'],$data_advertising,$area_advertising)){
                    $data_view['result_action_banner']="Cập nhật quảng cáo thành công!";
                }

            }
            //Kiểm tra xóa nhiều lựa chọn quảng cáo
            if($this->input->post('submit_advertising_del')){
                $selected_advetisings = $this->input->post('advertising-selected');

                $item_remove = 0;
                if(!empty($selected_advetisings)){
                    foreach($selected_advetisings as $id){
                        $remove_advertising = $this->Advertising_model->remove_banner($user_session['id_store'], $id);
                        if($remove_advertising){
                            $item_remove++;
                        }
                    }
                    if($item_remove > 0) {
                        $data_view['result_action_banner'] = 'Đã xóa ' . $item_remove . ' mục quảng cáo';
                    }
                }

            }

            $data_view['result_list_banner'] = $this->Advertising_model->select_banner($user_session['id_store']);


//                echo "<pre>";
//                print_r($data_advertising);
//                echo "</pre>";

            $this->parser->parse('header',$data_view);
            $this->parser->parse($data_view['template'],$data_view);
            $this->parser->parse('footer',$data_view);
        } else {
            # Nếu không thì chuyển về trang login
            redirect('http://'.$pageURL.'/login.html','refresh');
        }
    }
    public function remove()
    {
        $user_session = $this->session->userdata('user_session');
        if ($user_session) {
            //Lấy các giá trị từ ajax post gửi về
            $id_advertising = $this->input->post('id_advertising');
            $id_store = $user_session['id_store'];

            //Delete category và update id_parent của category con
            $this->load->model('Advertising_model');
            $remove_advertising = $this->Advertising_model->remove_banner($id_store, $id_advertising);
            if ($remove_advertising)
                return true;
        }

    }

    public function select($id_store='',$area='')
    {
        $this->load->model('Advertising_model');
        $rs_banner = $this->Advertising_model->select_banner_area($id_store,$area);
        $result = "";
        foreach($rs_banner as $item){
                $item = json_decode($item->data,true);
                if(isset($item['advertising-img'])){
                   $result.= "<a href=".$item['link-advertising']."><img src=".$item['advertising-img']." class='img-responsive' style='margin:auto' /></a>";
                }else{
                    $result.= "<a href=".$item['link-advertising'].">".$item['advertising-html']."</a>";
                }
//                echo "<pre>";
//                print_r($item);
//                echo "</pre>";
        }
        return $result;
    }
    public function select_one($id_store='',$area='')
    {
        $this->load->model('Advertising_model');
        $rs_banner = $this->Advertising_model->select_banner_area($id_store,$area);
        $result = array();
        $rs_html = '';
        foreach($rs_banner as $item){
            $item = json_decode($item->data,true);
            array_push($result,$item);

        }
        $num_rand = rand(0,count($result)-1);
            if(isset($result[$num_rand]['advertising-img']) && !empty($result[$num_rand]['advertising-img'])){
                $rs_html= "<a href=".$result[$num_rand]['link-advertising']."><img src=".$result[$num_rand]['advertising-img']." class='img-responsive' style='margin:auto'/></a>";
            }else if(isset($result[$num_rand]['advertising-html']) && !empty($result[$num_rand]['advertising-html'])){
                $rs_html= "<a href=".$result[$num_rand]['link-advertising'].">".$result[$num_rand]['advertising-html']."</a>";
            }
//        echo "<pre>";
//        print_r($num_rand);
//        print_r($result[$num_rand]['advertising-img']);
//        echo "</pre>";
        echo $rs_html;
        return $rs_html;
    }


}