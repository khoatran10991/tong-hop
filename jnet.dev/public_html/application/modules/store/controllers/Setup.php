<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller này nhằm lấy url khách vào và tải giao diện lên cho khách, cũng như những sản phẩm của site.
* 
*/
class Setup extends MX_Controller
{
	function __construct()
	{
		#load thư helper url, library database
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('parser');
		$this->load->library('session');
	}
	public function generateRandomString($length = 100) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function index()
	{
				$this->load->model('Store_model');
				$info_session=$this->session->userdata('user_info');
		
// 				echo "<pre>";
// 				print_r ($info_session);
// 				echo "</pre>";
				
				if($info_session) {
		
					$this->load->view('setup/index',$info_session);
				} else {
					$this->load->view('setup/error');
				}
	}
	public function create() {
		$this->load->model('Store_model');
		$info_session=$this->session->userdata('user_info');
		if(!$this->session->userdata('user_info')) {
			die("Not accept!");
		} else {
			if($this->input->post("website-title")) {
				
				$title = $this->input->post("website-title");
				$desc = $this->input->post("website-desc");
				$type = $this->input->post("website-type");
				
				if(!$this->Store_model->check_username($info_session['username'])) {
					
					
					
					
					$create = $this->Store_model->create_store($info_session['username'],$title,$desc,$type);
				    if($create) {
						
						
						// khởi tạo session 
						$token = $this->generateRandomString(50);
						// tạo token 
						$create_token = $this->Store_model->insert_session($info_session['username'],$token);
						if($create_token)
							$info_session['token'] = $token;
						// load view 
						$this->load->view('setup/welcome',$info_session);
					
						// bắt đầu gửi email thống báo chúc mừng
						$this->load->library('jnetmailer');
						$data = array(
							"fullname" => $info_session['fullname'],
							"email" => $info_session['email'],
							"url" => $info_session['username'],
							"password" => $info_session['password']
							
							
						);
						$htmlMessage = $this->parser->parse('email/welcome', $data, true);
					
						$sent =  $this->jnetmailer->welcome($info_session['email'],$info_session['username'],$htmlMessage);
						
						// tạo thư mục uploads cho user 
						$oldumask = umask(0);
						mkdir('uploads/'.$info_session['username'],0777,true);
						umask($oldumask); 
						$oldumask = umask(0);
						mkdir('uploads/'.$info_session['username'].'/images',0777,true);
						umask($oldumask); 
						$oldumask = umask(0);
						mkdir('uploads/'.$info_session['username'].'/thumbs',0777,true);
						umask($oldumask); 
						// tạo file htaccess 
						$file = 'uploads/.htaccess';
						@copy($file,'uploads/'.$info_session['username'].'/images/.htaccess');
						@copy($file,'uploads/'.$info_session['username'].'/thumbs/.htaccess');
						@copy($file,'uploads/'.$info_session['username'].'/.htaccess');
				    }	
				    else 
				    	$this->load->view('setup/error',$info_session);
				}	
				else {
					echo "Lỗi";
					$this->load->view('setup/error',$info_session);
				}	
			} else {
				$this->load->view('setup/error',$info_session);
			}
			
		}
	}
}	