<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller đăng nhập vào site
*/
class Login extends MX_Controller
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
		# Lấy thông tin email và password đã đăng kí mà đăng nhập, cũng như set lever cho user
		$error_login_user=array();
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		$this->load->model('User_model');
		$this->load->library('jnetcaptcha');
		// kiểm tra xem có tồn tại session đã đăng nhập chưa, chuyển thẳng đến trang dashboard
		if($this->session->userdata('user_session')) {

			$user_session=$this->session->userdata('user_session');

			$info_site=$this->User_model->info_site($user_session['id_store']);

			if($info_site[0]->url_pre == "") {

				$pageURL=$info_site[0]->url_base;
			}
			else{
				$pageURL=$info_site[0]->url_pre;
			}

			$token = "";
			if(isset($_COOKIE['jnet_session']));
				$token = $_COOKIE['jnet_session'];
			redirect($pageURL.'/dashboard.html?token='.$token,'refresh');

		}
		
		if($this->input->post("submit_login")){

			$this->form_validation->set_rules('email_login', 'Email Đăng Nhập', 'required|valid_email');
			$this->form_validation->set_rules('password_login', 'Mật Khẩu', 'required|min_length[5]|max_length[50]');
			$this->form_validation->set_message('required','%s không được bỏ trống');
			$this->form_validation->set_message('valid_email','%s định dạng là ab@abc.com');
			$this->form_validation->set_message('min_length','{field} không được ít hơn {param} ký tự');
			$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
			if($this->form_validation->run()){
				$email = $this->input->post("email_login");
				
				// load thư viện tạo mật khẩu an toàn
				$this->load->library('jnetpassword');
				$password = $this->jnetpassword->encodemd5($this->input->post("password_login"));
				$result_login=$this->User_model->login($email,$password);
				if ($result_login) {
					# Xét Parrent, lưu sesion email, password, id_site
					foreach ($result_login as $login) {
						//lưu session và chuyển về dashboard của site
						//Dựa vào ID Site lấy các thông tin của site 
						//Redirect nếu site đăng nhập ko phải là site của khách
						$this->load->model('User_model');
						$result_info_site=$this->User_model->info_site($login->id_store);
						foreach ($result_info_site as $info_site) {
							# Nếu đúng url_base hoặc id_pre thì giữ nguyên, ko thì ngược lại
							if (($info_site->url_base == $pageURL) or ($info_site->url_pre == $pageURL)) {
							
							} elseif($info_site->url_pre == "") {

								$pageURL=$info_site->url_base;
							}
							else{
								$pageURL=$info_site->url_pre;
							}
							$login_session=array(
							'id_store' =>$login->id_store,
							'url'=>$pageURL,
							'username'=>$login->username,
							'email'=>$login->email,
							'id_parent'=>$login->id_parent,
							'fullname' => $login->full_name		

							);
							$this->session->set_userdata('user_session',$login_session);
							
							$token = $this->generateRandomString(50);
							#set cookie token
							setcookie("jnet_session", $token, time() + (86400 * 30), "/");
						
							$this->User_model->insert_log_session($login->username,$token);
							if(isset($_GET['returnURL']))
								redirect($pageURL.'/'.addslashes($_GET['returnURL']),'refresh');
							else 
							redirect($pageURL.'/dashboard.html?token='.$token,'refresh');
						}
					}
				} else {
					# Thong bao loi dang nhap
					$error_login_user=array('error_login'=>"Tên Đăng Nhập hoặc Mật Khẩu không đúng!");
				}
				
			}
		}

		if($this->input->post("submit_reset")) {
			$email = $this->input->post("email_login");
			if($email=="") :
				$error_login_user=array('error_login'=>"Email không được phép rỗng !");
			else :
				$captcha =  $this->jnetcaptcha->result_captcha();
				if($captcha == false)
					$error_login_user=array('error_login'=>"Mã bảo mật bạn nhập không đúng !");
				else {
				
					$reset = $this->User_model->reset_pass_by_email($email);
					if($reset) {
	//					$this->load->library('email');
	
	// 						$this->email->initialize(array(
	// 						  'protocol' => 'smtp',
	// 						  'smtp_host' => 'email-smtp.us-east-1.amazonaws.com',
	// 						  'smtp_user' => 'AKIAJGL2FLFCARS4DN5Q',
	// 						  'smtp_pass' => 'Ap5d1hWEr3yKMdsR08WYsV1LNjNbAwETpP+1XrWXJE77',
	// 						  'smtp_port' => 587,
							  
	// 						  'newline' => "\r\n"
	// 						));
							//$this->email->initialize($config);
							
	// 						$this->email->from('no-reply@jnet.vn', 'JNET SERVICE');
	// 						$this->email->to('sangnguyendev@gmail.com');
	// 						$this->email->subject('Khôi phục mật khẩu đăng nhập '.$_SERVER['HTTP_HOST']);
							
	// 						$data = array(
	// 							"key" => $reset,
	// 							"website" => $_SERVER['HTTP_HOST']		
	// 						);
	// 						$htmlMessage = $this->parser->parse('email/resetpass', $data, true);
	// 						$this->email->message($htmlMessage);
	// 						if($this->email->send()) redirect('http://'.$_SERVER['HTTP_HOST'].'/login.html?resetpass='.md5("resetpass"),'refresh');
	// 						else 
	// 							$error_login_user=array('error_login'=>"Email không tồn tại trong hệ thống!");
							$this->load->library('jnetmailer');
							$data = array(
								"key" => $reset,
								"website" => $_SERVER['HTTP_HOST']
							);
							$htmlMessage = $this->parser->parse('email/resetpass', $data, true);
							$sent =  $this->jnetmailer->resetpass($email,$_SERVER['HTTP_HOST'],$reset,$htmlMessage);
							if($sent)
								redirect('http://'.$_SERVER['HTTP_HOST'].'/login.html?resetpass='.md5("resetpass"),'refresh');
							else 
								$error_login_user=array('error_login'=>"Hệ thống đang quá tải, vui lòng liên hệ suppport!");
							
					}
					else $error_login_user=array('error_login'=>"Địa chỉ email này không tồn tại trong hệ thống !");
				}
			
			
			endif;
		}
		if($this->input->get("resetpass"))
			$error_login_user=array('error_login'=>"Vui lòng kiểm tra email và làm theo hướng dẫn để đổi mật khẩu mới.");

		$error_login_user['image_captcha']= $this->jnetcaptcha->create_captcha();
		$this->parser->parse('login/index',$error_login_user);
	}
	public function resetpass($key = null) {
		$this->load->model('User_model');
		$check = $this->User_model->check_key_resetpass($key);
		$data = array("key" => md5($key));
		if($check) :
		
			if($this->input->post("submit_change_pass")) {
				$pass1 = $this->input->post("password-".md5($key)."-1");
				$pass2 = $this->input->post("password-".md5($key)."-2");
				if($pass1 == $pass2)  {
					$this->load->library('jnetpassword');
					$pass_encode =  $this->jnetpassword->encodemd5($pass1);
					$update = $this->User_model->update_password($key,$pass_encode);
					
					if($update) $data['message'] = "Đổi mật khẩu thành công."; 
					else $data['message'] = "Đang quá tải vui lòng thử lại.";
				}else 
					echo "error";
					
			}
		
			$this->parser->parse('login/resetpass',$data);

		else :
			echo '<meta charset="utf-8"> <p><b>Liên kết này không hợp lệ, hoặc đã được sử dụng.</b></p>';
		
		endif;
	}
}
