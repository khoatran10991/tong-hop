<?php
/*
* Libraries use captcha
* Author: Kai Tran
* Date update : 16/2/2016
* JNET Team
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Jnetcaptcha{
    var $CI = '';
    function __construct(){
        $this->CI =& get_instance();

    }

    function create_captcha(){
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        $this->CI->load->helper('captcha');
        $value = array(
            'img_path' => 'uploads/captcha/images/',
            'img_url' => 'http://'.$pageURL.'/uploads/captcha/images/',
            'font_path' =>'uploads/captcha/fonts/hlfants2.ttf',
            'img_width' => '300',
            'img_height' => '60',
            'expiration' => 300,
            'word_length' => 5,
            'font_size'	=> 30,
            'colors'	=> array(
                'background'	=> array(255,255,255),
                'border'	=> array(255,255,255),
                'text'		=> array(121,182,67),
                'grid'		=> array(153,204,255)
            )
        );
        //Tạo captcha với những giá trị trên, sau đó trả về giá trị để xử dụng
        $captcha = create_captcha($value);

        //Đưa captcha vào session
        $this->CI->load->library('session');
        $this->CI->session->set_userdata('Jnetcaptcha',strtolower($captcha['word']));



        //Trả giá tri về controller khi gọi library
        return '</br>'.$captcha['image'].'</br> <input type="text" name="text-captcha" class="form-control" required placeholder="Điền nội dung ở hình ảnh trên">';


    }

    function result_captcha(){
        $this->CI->load->library('input');
        $this->CI->load->library('session');
        //Xóa tất cả các file ảnh có trong thư mục
        $this->deleteFolder('uploads/captcha/images/');

        //Lấy dữ liệu để xử lý
        $captcha_word = $this->CI->session->userdata('Jnetcaptcha');
        $captcha_form = strtolower($this->CI->input->post('text-captcha'));
        if($captcha_form == $captcha_word){
            return true;
        }else{
            return false;
        }

    }
    function deleteFolder($dir){
        // Tìm kiếm file và thư mục con và loại bỏ '.', '..'
        $files = array_diff(scandir($dir), array('.','..'));
        // Chạy vòng lặp để xóa file
        foreach ($files as $file) {
            // Kiểm tra nếu '$dir/$file' là một folder thì gọi lại hàm deleteFolder để xóa các file trong nó
                unlink("$dir/$file");
        }
        return true;
    }


}