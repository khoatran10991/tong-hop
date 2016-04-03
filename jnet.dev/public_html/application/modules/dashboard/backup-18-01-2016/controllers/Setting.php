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

			$this->parser->parse('index',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
			
	}
	public function domain() {
		$user_session=$this->session->userdata('user_session');
		
		if ($user_session) {
			$this->load->model('Setting_model');
			$result_info_site=$this->Setting_model->get_site($user_session['id_store']);
			$pre_domain = $result_info_site[0]->url_pre;
			if($pre_domain != "") {
				$checkDNS =  gethostbyname(str_replace("http://","",$pre_domain));
				if($checkDNS == "188.166.255.34")
					$status = 1;
				else 
					$status = 0;
			
				$domain = array(
						"base_domain" => array(
							"value" => $user_session['url'],
							"status" => 1	
						),
						"pre_domain" => array(
							"value" => $pre_domain,
							"status" => $status	
						)		
				);
			} else {
				$domain = array(
						"base_domain" => array(
								"value" => $user_session['url'],
								"status" => 1
						)
				);
				
			}
			
			$data_view = array(
									'title'=>"Quản lý tên miền",
									'user'=>$user_session,
									'template'=>'domain/domain',
									'url_site'=>$user_session['url'],
									'domains' => $domain
			);;
			$this->parser->parse('index',$data_view);
		} else {
			redirect('http://'.$pageURL.'/login.html?token='.$_COOKIE['jnet_session'],'refresh');
		}

	}
	public function checkDomain() {
		$user_session=$this->session->userdata('user_session');
 		if($this->input->post("domain") && isset($user_session)) {
 		
 			#get domain
	 		$domain = $this->input->post("domain");
 			#get type : dang ky moi hay da co ten mien
 			$type = $this->input->post("type");
 			#get https hay http
 			$https = $this->input->post("https");
 			
			$ch = curl_init();
			$timeout = 0; // set to zero for no timeout
			curl_setopt ($ch, CURLOPT_URL, 'http://www.whois.net.vn/whois.php?domain='.$domain);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$kq = curl_exec($ch);
			curl_close($ch);
			echo $kq;
			
			# xu ly neu da co ten mien, cap nhat vao csdl
			if($type == "update") {
				if($https == 1) {
					
					$data = array(
							'url_pre' => "https://".$domain,
					);
				} else {
					$data = array(
							'url_pre' => "http://".$domain,
					);
				}
				
				$this->db->where('id_store', $user_session['id_store']);
				$this->db->update('site_config', $data);
				
			} else if($type == "new") {
				
			}
 		}
		else { 
		
			echo "";
		
		}
	
	}
	public function get_domain_price() {
		$this->load->model('Setting_model');
		$user_session=$this->session->userdata('user_session');
		if($this->input->post("domain")) {
			$extension = explode(".", $this->input->post("domain"));
			
			if(isset($extension[2]))
				$ext = $extension[1].".".$extension[2]; 
			else 
				$ext = $extension[1];
			
			$price = $this->Setting_model->get_price_domain_by_ext($ext);
			if($price) {
				$info_billing = $this->Setting_model->get_user_by_email($user_session['email']);
				if(!$info_billing) {
					$info_billing = array();
				}
				$data = array(
						"domain" => $this->input->post("domain"),
						"ext" => $ext,
						"price" => $price,
						"data_billing" => $info_billing
				);
				$return = $this->load->view("domain/form_billing",$data);
				echo $return;
			}
			
			
			else  echo 0;
				
			
			
		}	
			
	} 
	public function create_order_domain() {
		$this->load->model("Setting_model");
		if($this->input->post("billing")) {
			
			$billing =  $this->input->post("billing") ;
			
			
			// get price 
			$extension = explode(".", $billing['domain']);
				
			if(isset($extension[2]))
				$ext = $extension[1].".".$extension[2];
			else
				$ext = $extension[1];
				
			$price = $this->Setting_model->get_price_domain_by_ext($ext);
			if($price)
				$total = $price*$billing['year'];
			else 
				$total = 0;
			
			$create = $this->Setting_model->create_order_domain($billing);
			if($create) {
				if($billing['method'] == "6351e4efddc359eca697894df2bfd02d") {
					$banks = $this->Setting_model->get_banks();
					$data = array(
						"banks" => $banks,
						"orderID" => "JNET354354",
						"total" => $total				
					);
					$return = $this->load->view("domain/payment_bank",$data);
					echo $return;
				} 
			
			} 
					
			else 
				echo 0;
		}
	}
	
}