<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller Setting and Config Infomation Website
*/
class Setting extends MX_Controller
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
		// print_r ($user_session);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Dashboard_model');
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				$data_view = array('logo' =>$info_site->logo ,
								'title'=>$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'phone'=>$info_site->phone,
								'address'=>$info_site->address,
								'url_site'=>$user_session['url'],
								'template'=>'setting',
								'email'=>$user_session['email'],
								'username'=>$user_session['username'],
								'date_exp'=>$info_site->time_exp,
								 );
			}
			//Bắt đầu code cho form chỉnh thông tin website
			if($this->input->post("submit_change_info")){

				$this->form_validation->set_rules('txt_title', 'Tiêu Đề', 'required|min_length[10]|max_length[150]');
				$this->form_validation->set_rules('txt_description', 'Mô Tả', 'max_length[300]');
				$this->form_validation->set_rules('txt_keywords', 'Từ Khóa', 'max_length[250]');
				$this->form_validation->set_rules('txt_phone', 'Số Điện Thọai', 'numeric|max_length[11]');
				$this->form_validation->set_rules('txt_address', 'Địa Chỉ', 'max_length[300]');



				$this->form_validation->set_message('required','%s không được bỏ trống');
				$this->form_validation->set_message('min_length','{field} không được ít hơn {param} ký tự');
				$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
				$this->form_validation->set_message('numeric','%s phải là số từ 0 - 9');
				if($this->form_validation->run()){
					$id_site= $user_session['id_site'];
					$title=$this->input->post("txt_title");
					$description=$this->input->post("txt_description");
					$keywords=$this->input->post("txt_keywords");
					$phone=$this->input->post("txt_phone");
					$address=$this->input->post("txt_address");
					
					

					//Gọi model và update thông tin nhận được, sau đó cho ra kết quả cập nhật thông tin
					$this->load->model('Dashboard_model');
					$result_update_info_site=$this->Dashboard_model->update_info_site($id_site,$title,$description,$keywords,$phone,$address);
					if ($result_update_info_site==1) {
								$data_view = array('logo' =>$info_site->logo ,
												'title'=>$title,
												'description'=>$description,
												'keywords'=>$keywords,
												'phone'=>$phone,
												'address'=>$address,
												'url_site'=>$user_session['url'],
												'template'=>'setting',
												'email'=>$user_session['email'],
												'date_exp'=>$info_site->date_exp,
												'error_info_site'=>'Đã Cập Nhật Thông Tin Thành Công',
												 );
					}
				}
			}

			$this->parser->parse('index',$data_view);
			

		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	public function user()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		// print_r ($user_session);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Dashboard_model');
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				$data_view = array('logo' =>$info_site->logo ,
								'title'=>$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'url_site'=>$user_session['url'],
								'email'=>$user_session['email'],
								'username'=>$user_session['username'],
								'template'=>'setting-user',
								 );
			}
			//Bắt đầu code cho form đổi mật khẩu
			if($this->input->post("submit_change_pass")){
				$this->form_validation->set_rules('txt_oldpassword', 'Mật Khẩu', 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('txt_newpassword', 'Mật Khẩu Mới', 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('txt_renewpassword', 'Nhập Lại Mật Khẩu Mới', 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_message('required','%s không được bỏ trống');
				$this->form_validation->set_message('min_length','{field} không được ít hơn {param} ký tự');
				$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');

				if($this->form_validation->run()){
					# Kiểm tra xem nhập mật khẩu và nhập lại mật khẩu đã chính xác chưa
					if ($this->input->post("txt_newpassword")==$this->input->post("txt_renewpassword")) {
						#Nếu được rồi thì kiểm tra password cũ xem có đúng với email ko?
						$email = $user_session['email'];
						$oldpassword = md5($this->input->post("txt_oldpassword"));
						$newpassword = md5($this->input->post("txt_newpassword"));
						$this->load->model('Dashboard_model');
						$result_login=$this->Dashboard_model->login($email,$oldpassword);
						if ($result_login) {
							$this->load->model('Dashboard_model');
							$result_change_pass=$this->Dashboard_model->update_pass($email,$newpassword);
							if ($result_change_pass==1) {
								$data_view['error_password']='Đã Đổi Mật Khẩu Thành Công';
							} else {
								$data_view['error_password']='****Lỗi: Liên Hệ Admin Để Được Giải Quyết';
							}
						

						}
						else{
							$data_view['error_password']='***Lỗi: Mật Khẩu Cũ Nhập Không Đúng!!!';
						}
					}
					else{
						$data_view['error_password']='***Lỗi: Mật Khẩu Mới Nhập Không Giống Nhau!!!';
					}
				}
			}
			//Kết thúc code cho form đổi mật khẩu
			$this->parser->parse('index',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
			
	}
}