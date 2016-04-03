<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller này để khởi tạo user và cập nhật id_site ở Controller khác
* 
*/
class Register extends MX_Controller
{
	function __construct()
	{
		#load thư helper url, library database
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
		$this->load->library('jnetpassword');
		require_once 'replace_function.php';
	}
	function index() {
		if($this->input->post("StoreName")){
			$username = $this->replace($this->input->post("StoreName"));
			$email = $this->input->post("Email");
			// load model user
			$this->load->model('Store_model');
			#check username ton tai hay chua
			if(!$this->Store_model->check_username($username)) {
				echo "Tên miền này đã tồn tại, vui lòng chọn tên miền khác <br>";
				return false;
			} 
			#neu username chua ton tai check tiep email
			else if(!$this->Store_model->check_email($email)) {
				echo "Email đã tồn tại trong hệ thống <br>";
				return false;
			}
			#khoi tao user
			else {
				$full_name = $this->input->post("FullName");
				$password = $this->jnetpassword->encodemd5($this->input->post("Password"));
				$address = $this->input->post("Address");
				$phone = $this->input->post("PhoneNumber");
				$insert = "";
				 $insert = $this->Store_model->register($username,$full_name,$password,$email,$address,$phone);
				if($insert) {
					$login_session=array(
							'id_store' => 0,
							'username'=>$username,
							'parent'=>0,
							'fullname' => $full_name,
							'email' => $email,
							'password' => $this->input->post("Password")

							);
							$this->session->set_userdata('user_info',$login_session);
							 echo 1;
							//echo "Đang trong quá trình xây dựng, vui lòng quay lại sau.";
				} else {
					echo "Lỗi trong quá trình đăng ký ! Vui lòng liên hệ supporter.";
				}
			} 
				
			
		
		}
		else {
			echo "404";
		}
		
	}
	public function Popup() {
			if($this->input->post("domain")) {
				$domain = replace($this->input->post("domain"));	
				$config = array(
					'domain' => $domain	
				);
				$this->load->view('register/index',$config);
			}
		
	}
	public function replace($str) {
		if(!$str) return false;
		$unicode = array(
				'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
				'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
				'd'=>array('đ'),
				'-'=>array('-'),
				'-'=>array(' '),
				'd'=>array('Đ'),
				'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
				'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
				'i'=>array('í','ì','ỉ','ĩ','ị'),
				'i'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
				'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
				'o'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
				'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
				'u'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
				'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
				'y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
				'-'=>array(',',' ','&quot;','.',';',':',' ',' ')
		);
	
		foreach($unicode as $nonUnicode=>$uni){
			foreach($uni as $value)
				$str = str_replace($value,$nonUnicode,$str);
			$str = strtolower($str);
	
		}
		return $str;
	}
	
}	