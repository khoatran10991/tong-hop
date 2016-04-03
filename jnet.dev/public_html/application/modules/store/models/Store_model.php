<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này khoi tao website va thanh vien
/**
 *
*/
class Store_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function check_username($username) {

		$check =$this->db->select("*")
		->from('site_users')->where('username',$username)
		->limit(1)->get();
		if ($check->num_rows()==0) {
			# Nếu đúng trả về thông tin lấy được từ id_site
			return true;
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
	public function check_email($email) {

		$check =$this->db->select("*")
		->from('site_users')->where('email',$email)
		->limit(1)->get();
		if ($check->num_rows()==0) {
			# Nếu đúng trả về thông tin lấy được từ id_site
			return true;
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
	public function register($username,$fullname,$password,$email,$address,$phone) {
		$data = array(
				'username' => $username,
				'full_name' => $fullname,
				'password' => $password,
				'email'	=> $email,
				'address' => $address,
				'phone' => $phone
					

		);
		$check = $this->db->insert('site_users', $data);
		if($check)
			return true;
		else
			return false;
	}
	public function create_store($url,$title,$desc,$type) {
		
		$url_full = "http://".$url.".jweb.vn";
		$date_created = time();
		$date_exp = time() + (60*60*24*365);
		
		#-- thêm dữ liệu mẫu 
	    $layout = file_get_contents('data/data_11_congnghe.json', true);
		
		
		$data = array(
				'url_base' => $url_full,
				'title' => $title,
				'description' => $desc,
				'type' => $type,
				'id_theme' => 11,
				'layout' => $layout,
				'time_start'  => $date_created,
				'time_exp' => $date_exp,
				
		);
		$check = $this->db->insert('site_config', $data);
		
		
		
		#update lai site_id cua user
		$store_id = $this->db->insert_id();
		
	
			$data = array(
					'id_store' => $store_id
			);
			
			$this->db->where('username', $url);
			$this->db->update('site_users', $data);
		
			// dữ liệu html mẫu 
			$footer = file_get_contents('data/footer_11_congnghe.txt',true);
				$data_html = array(
				'id_store' => $store_id,
				'id_widget' => 'footer',
				'html_content' => $footer
			);
			$insert = $this->db->insert('site_box_html', $data_html);
	    
	    
	    
		
		if($check)
			return $store_id;
		else
			return false;
	}
	public function insert_session($username,$ci_session) {
		$session= array(
						
					'username' => $username,
					'ci_session' => $ci_session,
					'time_log' => date('d/m/Y H:i:s',time())
				
			);
			$check = $this->db->insert('log_session', $session);
			if($check)
				return true;
			else 
				return FALSE;	
		
	}
	public function get_type() {

		$check =$this->db->select("*")
		->from('site_type')->where('active',1)->get();
		if ($check->num_rows()>=1) {
			# Nếu đúng trả về thông tin lấy được từ id_site
			return $check->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
}

