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
			$this->load->model('Setting_model');
			// cập nhật các thông tin
			// khởi tạo biến thông báo;
			$message = array();
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
					$id_site= $user_session['id_store'];
					$title=$this->input->post("txt_title");
					$description=$this->input->post("txt_description");
					$keywords=$this->input->post("txt_keywords");
					$phone=$this->input->post("txt_phone");
					$address=$this->input->post("txt_address");
					$logo=$this->input->post("txt_logo");
					$favicon=$this->input->post("txt_favicon");
			
			
					$result_update_info_site=$this->Dashboard_model->update_info_site($id_site,$title,$description,$keywords,$phone,$address,$logo,$favicon);
					if($result_update_info_site == 1)
						$message['success'] = "Cập nhật thông tin website thành công.";
				}
			}
			if($this->input->post("submit_change_social")) {
				$social = array("facebook" => $this->input->post("txt_facebook"),"google" => $this->input->post("txt_google"),"youtube" => $this->input->post("txt_youtube"));
				$social = json_encode($social);
				$rs = $this->Setting_model->update_social($user_session['id_store'],$social);
				if($rs)
					$message['success'] = "Cập nhật mạng xã hội thành công.";
			}
			
			// xử lý cuối trang
			if($this->input->post("submit_change_footer")) {
				$footer = $this->input->post();
				$footer = json_encode($footer);
				$rs = $this->Setting_model->update_footer($user_session['id_store'],$footer);
				if($rs)
					$message['success'] = "Cập nhật cuối trang thành công.";
			}
			// xử lý xác thực google
			if($this->input->post("submit_change_google")) {
			  $google = ($this->input->post());
			  if(strpos($google['txt_google_analytics_content'],"script") != "")	 {
			  	 $message['error'] = "Mã google analytics không được bao gồm thẻ &lt;script&gt và &lt;/script&gt <a target='_blank' href='https://docs.jnet.vn/huong-dan/them-ma-google-analytics'><i class='fa fa-question-circle'></i> Xem hướng dẫn</a>";
			  } else {

			  	$google = json_encode($google);
			  	$rs = $this->Setting_model->update_verification_google($user_session['id_store'],$google);
			  	if($rs)
			  		$message['success'] = "Cập nhật thông tin xác thực website thành công.";
			  	else 
			  		$message['error'] = "Đang quá tải, vui lòng thử lại";
			  }
			}
			// xử lý thông báo trang chủ
			if($this->input->post("submit_change_notification")) {
				$notification = json_encode($this->input->post());
				$update = $this->Setting_model->update_notification($user_session['id_store'],$notification);
				if($update)
					$message['success'] = "Cập nhật thông báo trên trang chủ thành công.";
				else
					$message['error'] = "Đang quá tải, vui lòng thử lại";
				
			}
			
			// mạng xã hội
			$social = $this->Setting_model->get_social($user_session['id_store']);
			if($social[0]->social != "")
				$social_site = json_decode($social[0]->social,true);
			else
				$social_site = "[]";
			$info_site=$this->Dashboard_model->info_site($user_session['id_store']);
				$data_view = array('logo' =>$info_site[0]->logo,
								'favicon' =>$info_site[0]->favicon,
								'title'=> $info_site[0]->title,
								'description'=>$info_site[0]->description,
								'keywords'=>$info_site[0]->keywords,
								'phone'=>$info_site[0]->phone,
								'address'=>$info_site[0]->address,
								'domains'=> array("pre"=> $info_site[0]->url_pre,"base" => $info_site[0]->url_base),
								'url_site'=>$user_session['url'],
								'template'=>'setting/simple',
								'email'=>$user_session['email'],
								'username'=>$user_session['username'],
								'date_exp'=>$info_site[0]->time_exp,
								'social' => $social_site,
								'message' => $message,
								'footer' => json_decode($info_site[0]->footer,true),
								'verification_google' => json_decode($info_site[0]->verification_google,true),
								'notification' => json_decode($info_site[0]->home_notification,true),
								'editor' => $this->ckeditor(),
								 );

			
	
			$this->parser->parse('index',$data_view);
			
			

		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html?dashboard/setting.html','refresh');
		}
	}
	// chức năng cấu hình nâng cao
	
	public function advande() {
		$this->load->model('Dashboard_model');
		$this->load->model('Setting_model');
		$user_session=$this->session->userdata('user_session');
		$message = array();
		if ($user_session) {
			# xử lý lưu bố cục
			if($this->input->post("submit_change_layout")) {
				$config = $this->Setting_model->get_advance_config($user_session['id_store']);
				$config = json_decode($config[0]->advance_config,true);
				$layout = $this->input->post();
				$config['layout'] = $layout;
				$config = json_encode($config);
				$update = $this->Setting_model->update_advance_config($user_session['id_store'],$config);
				if($update)
					$message['success'] = "Cập nhật bố cục trang web thành công.";
				else 
					$message['error'] = "Đang quá tải, vui lòng thử lại";
			}
			# xử lý bố cục chuyên mục
			if($this->input->post("submit_change_catelogy")) {
				$config = $this->Setting_model->get_advance_config($user_session['id_store']);
				$config = json_decode($config[0]->advance_config,true);
				$catelogy = $this->input->post();
				$config['catelogy'] = $catelogy;
				$config = json_encode($config);
				$update = $this->Setting_model->update_advance_config($user_session['id_store'],$config);
				if($update)
					$message['success'] = "Cập nhật trình bày trang chuyên mục thành công.";
				else
					$message['error'] = "Đang quá tải, vui lòng thử lại";
			}
			if($this->input->post("submit_change_detailpost")) {
				$config = $this->Setting_model->get_advance_config($user_session['id_store']);
				$config = json_decode($config[0]->advance_config,true);
				$detailpost = $this->input->post();
				$config['detailpost'] = $detailpost;
				$config = json_encode($config);
				$update = $this->Setting_model->update_advance_config($user_session['id_store'],$config);
				if($update)
					$message['success'] = "Cập nhật trình bày trang chi tiết thành công.";
				else
					$message['error'] = "Đang quá tải, vui lòng thử lại";
			}
			if($this->input->post("backup")) {
				//header('Content-Type: application/json');
				$config = $this->Setting_model->get_advance_config($user_session['id_store']);
				//$config = json_decode($config[0]->advance_config,true);
				$filename = 'CauHinhNangCao-'.$_SERVER['HTTP_HOST'].'-'.date("dmY",time()).'.txt';
					$fp = fopen("json_advance_config/$filename", 'w');
				    fwrite($fp, ($config[0]->advance_config));
				    fclose($fp);
				 $message['download'] = $filename; 
				 $message['success'] ='Bản sao lưu đã sẳn sàng. <a target="_blank" href="downloadjson.php?file='.$filename.'"><i class="fa fa-cloud-download"></i> Tải về</a>';  
			}
			// Khôi phục bản backup
			if($this->input->post("restore")) {
				$config =$this->input->post("txt_json_restore");
				if($config != "") {
					$update = $this->Setting_model->update_advance_config($user_session['id_store'],$config);
					if($update)
						$message['success'] = "Đẵ khôi phục cấu hình nâng cao từ bản backup.";
					else
						$message['error'] = "Đang quá tải, vui lòng thử lại";
				} else 
					$message['error'] = "Nội dung sao lưu không được rỗng !";
			}
			$info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			$data_view = array(
					'title'=> "Cấu hình nâng cao",
					'domains'=> array("pre"=> $info_site[0]->url_pre,"base" => $info_site[0]->url_base),
					'url_site'=>$user_session['url'],
					'template'=>'setting/advande',
					'message' => $message,
					'config' => json_decode($info_site[0]->advance_config,true)

			);
			$this->parser->parse('index',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$user_session['url'].'/login.html?return=','refresh');
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
			
			$message = "";
			$info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			
			// load thông tin ra view
			$data_view = array('logo' =>$info_site[0]->logo ,
				'title'=>$info_site[0]->title,
				'description'=>$info_site[0]->description,
				'keywords'=>$info_site[0]->keywords,
				'url_site'=>$user_session['url'],
				'email'=>$user_session['email'],
				'username'=>$user_session['username'],
				'template'=>'setting/setting-user',
				'message' => $message
			);
			
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
						// load thư viên mk an toàn
						$this->load->library('jnetpassword');
						$oldpassword = $this->jnetpassword->encodemd5($this->input->post("txt_oldpassword"));
						$newpassword = $this->jnetpassword->encodemd5($this->input->post("txt_newpassword"));
						
						$result_login=$this->Dashboard_model->login($email,$oldpassword);
						if ($result_login) {
							$this->load->model('Dashboard_model');
							$result_change_pass=$this->Dashboard_model->update_pass($email,$newpassword);
							if ($result_change_pass==1) {
								$data_view['error_password']='Đã Đổi Mật Khẩu Thành Công';
							} else {
								$data_view['error_password']='Không có sự thay đổi';
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

			
			$base_domain = $result_info_site[0]->url_base;
			$pre_domain = $result_info_site[0]->url_pre;
			$pageURL = $base_domain;
			
			
			
			
			if($pre_domain != "" && !empty($pre_domain) && $result_info_site[0]->url_primary == 1)
				$pageURL = $pre_domain;
			if($pre_domain != "") {
				$checkDNS =  gethostbyname(str_replace("http://","",$pre_domain));
				if($checkDNS == "188.166.255.34")
					$status = 1;
				else 
					$status = 0;
			
				$domain = array(
						"base_domain" => array(
							"value" => $base_domain,
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
								"value" => $base_domain,
								"status" => 1
						)
				);
				
			}
			
			$data_view = array(
									'title'=>"Quản lý tên miền",
									'user'=>$user_session,
									'template'=>'domain/domain',
									'url_site'=>$user_session['url'],
									'domains' => $domain,
									'primary' =>$result_info_site[0]->url_primary
			);
			
			
			if($this->input->post('submit_change_primary_domain')) {
				$primary = $this->input->post('domain_primary');
				if($status == 0 && $primary == 1) {
					$data_view['message']['type'] = 'alert-danger';
					$data_view['message']['notice'] = "Tên miền của bạn chưa trỏ IP về của máy chủ JNet, không thể thực hiện thay đổi này. Việc cập nhật IP cho tên miền có thể mất từ 30 phút đến 2 giờ đồng hồ mới có hiệu lực.";
				} else {
					$update = $this->Setting_model->update_domain_primary($user_session['id_store'],$primary);
					if($update) {
						$data_view['message']['type'] = 'alert-success';
						$data_view['message']['notice'] = "Đã thay đổi tên miền chính của website.";
						$data_view['primary'] = $primary;
					} else {
						$data_view['message']['type'] = 'alert-danger';
						$data_view['message']['notice'] = "Hệ thống đang quá tải, không thể lưu tùy chọn này.";
					}
					
				}
			}
			
			if($this->input->get('edit')) {
				$message = "";
				$domain = str_replace("'", "", $this->input->get('edit'));
				$domain = str_replace("--", "", $domain);
				$domain = ((addslashes($domain)));
				if($this->input->post("submit_change_domain")) {
					$domain = $this->input->post("domain");
					if($domain != "") {
						$domain = str_replace("http://", "", $domain);
						$domain = str_replace("https://", "", $domain);
						$update = $this->Setting_model->update_domain($domain,$user_session['id_store']);
						if($update)
							$message = "Cập nhật tên miền thành công.";
						else
							$message = "Hệ thống đang quá tải, vui lòng thử lại";
					}
				}
				if($this->input->post("submit_delete_domain")) {
					$domain = $this->input->post("domain");
					$update = $this->Setting_model->delete_domain($user_session['id_store']);
					if($update)
						redirect($result_info_site[0]->url_base.'/dashboard/setting/domain.html','refresh');
					else
						$message = "Hệ thống đang quá tải, vui lòng thử lại";
				}
				$data_view = array(
						'title'=>"Chỉnh sửa tên miền",
						'user'=>$user_session,
						'template'=>'domain/editdomain',
						'url_site'=>$user_session['url'],
						'domain' => $domain,
						'message' => $message
				);
				$this->parser->parse('index',$data_view);
			} else 	
				$this->parser->parse('index',$data_view);
		} else {
			redirect('login.html?return=dashboard/setting/domain','refresh');
		}

	}
	
	// sửa/xóa domain
	public function editdomain($domain = null) {
		$user_session=$this->session->userdata('user_session');
		
		if ($user_session) {
			$this->load->model('Setting_model');
			$result_info_site=$this->Setting_model->get_site($user_session['id_store']);
			$base_domain = $result_info_site[0]->url_base;
			$pre_domain = $result_info_site[0]->url_pre;
			$pageURL = $base_domain;
			if($pre_domain != "" && !empty($pre_domain) && $result_info_site[0]->url_primary == 1)
				$pageURL = $pre_domain;
			
			$message = "";
			
			// form cập nhật
			if($this->input->post("submit_change_domain")) {
				$domain = $this->input->post("domain");
				if($domain != "") {
					$update = $this->Setting_model->update_domain($domain,$user_session['id_store']);
					if($update)
						$message = "Cập nhật tên miền thành công.";
					else 
						$message = "Hệ thống đang quá tải, vui lòng thử lại";
				}
			}
			if($this->input->post("submit_delete_domain")) {
				$domain = $this->input->post("domain");
				$update = $this->Setting_model->delete_domain($user_session['id_store']);
				if($update)
					redirect('dashboard/setting/domain.html','refresh');
				else 
					$message = "Hệ thống đang quá tải, vui lòng thử lại";
			}
			if(isset($domain) && $domain != "") {
				$data_view = array(
						'title'=>"Chỉnh sửa tên miền",
						'user'=>$user_session,
						'template'=>'domain/editdomain',
						'url_site'=>$user_session['url'],
						'domain' => $domain,
						'message' => $message
				);
				$this->parser->parse('index',$data_view);
			} else {
				redirect('dashboard/setting/domain.html','refresh');
			}
		} else {
			redirect('login.html?return=dashboard/setting/domain','refresh');
		}	
	}
	public function checkDomain() {
		$this->load->model('Setting_model');
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
			
			
			# xu ly neu da co ten mien, cap nhat vao csdl
			if($type == "update") {
				if($https == 1) {
					
					$url_pre = "https://".$domain;
				
				} else {
					$url_pre = "http://".$domain;
					
				}
				if($kq != "0") {
					// kiểm tra tên miền có trong hệ thống chưa
					$check = $this->Setting_model->check_domain($url_pre);
					if($check)
						$kq = 2;
					else {
						$data = array(
						"url_pre" => $url_pre
						);
						$this->db->where('id_store', $user_session['id_store']);
						$this->db->update('site_config', $data);
					}
					
					
				}
				
				
			} else if($type == "new") {
				
			}
			echo $kq;
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
			else if(isset($extension[1])) 
				$ext = $extension[1];
			else 
				echo 0;	
			
			if(isset($ext)) {
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
	public function ckeditor() {
		# Chèn và xử lý code ckeditor nhúng vào trang
		$user_session = $this->session->userdata('user_session');
		$url_site = $user_session['url'];
		$username = $user_session['username'];
		$editor = "
					<script src='$url_site/editor/ckeditor/ckeditor.js'></script>
				<script type='text/javascript'>
					config = {};
					config.entities_latin = false;
					config.language = 'vi';
				
				    config.filebrowserImageBrowseUrl= '$url_site/editor/filemanager/dialog.aspx?type=1&editor=ckeditor&fldr'
				   
			
				    
			   	CKEDITOR.replace('txt_editor',config);
			   																		
				</script>
		";
		return $editor;
	}
	
}