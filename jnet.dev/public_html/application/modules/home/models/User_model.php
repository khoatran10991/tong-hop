<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class User_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function siteURL($pageURL)
	{
		# Trả về kết quả thông tin cơ bản trong mục site_config ứng với URL nhận được
		$rs_siteURL=$this->db->select("*")->from('site_config')->where('url_base',$pageURL)->or_where('url_pre',$pageURL)->limit(1)->get();
		return $rs_siteURL;
	}
	public function login($email,$password)
	{
		# Trả kết quả về phiên đăng nhập
		$rs_login=$this->db->select("*")
					->from('site_users')->where('email',$email)->where('password',$password)
					->limit(1)->get();
		if ($rs_login->num_rows()==1) {
			# Nếu đúng email và mật khẩu
			return $rs_login->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
		
	}
	public function info_site($id_site)
	{
		# Lấy thông tin site từ ID Site
		$rs_info_site =$this->db->select("*")
						->from('site_config')->where('id_store',$id_site)
						->limit(1)->get();
		if ($rs_info_site->num_rows()==1) {
			# Nếu đúng trả về thông tin lấy được từ id_site
			return $rs_info_site->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
	public function update_pass($username,$newpassword)
	{
		# Đổi password cho username
		$data_pass['password']=$newpassword;
		$rs_update_pass=$this->db->where('username',$username)->update('site_users',$data_pass);
		return $this->db->affected_rows();
	}
	public function update_info_site($id_site,$title,$description,$keywords,$phone,$address)
	{
		# Đổi password cho username
		$data_site = array('title' =>$title , 
							'description'=>$description,
							'keywords'=>$keywords,
							'phone'=>$phone,
							'address'=>$address,
									);
		$rs_update_pass=$this->db->where('id_site',$id_site)->update('site_config',$data_site);
		return $this->db->affected_rows();
	}
	public function update_logo($id_site,$file_name)
	{
		# Thay logo cho website
		$file_name_upload=array('logo'=>$file_name);
		$update_logo=$this->db->where('id_site',$id_site)->update('site_config',$file_name_upload);
		return $this->db->affected_rows();
	}
	
	# luu ci_sesssion de doi chieu
	public function insert_log_session($username,$ci_session) {
		
		
		# Kiem tra ci_session da ton tai trong table log_session hay chu
		$session =$this->db->select("id")
		->from('log_session')->where('username',$username)
		->limit(1)->get();
		if ($session->num_rows()==1) {
			# Nếu đã tồn tại thì update thời gian log
			$update_log=$this->db->where('username',$username)->update('log_session',array('ci_session'=>$ci_session,'time_log'=>date("d-m-Y H:i:s",time())));
		} else {
			# Nếu chưa tồn tại thì insert
			$data = array(
				'username' => $username,
				'ci_session' => $ci_session,
				'time_log' => date("d-m-Y H:i:s",time())
					
		
			);
			$check = $this->db->insert('log_session ', $data);
		}

			return true;
		
	}
	// hàm tạo key
	public function generateRandomString($length = 100) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function reset_pass_by_email($email) {
		# khởi tạo key
		$key = $this->generateRandomString(50);
		# Kiem tra email cò tồn tại không ?
		$check =$this->db->select("id_user")
		->from('site_users')->where('email',$email)
		->limit(1)->get();
		if ($check->num_rows()==1) {
			# Nếu đã tồn tại thì update thời gian log
			$update = $this->db->where('email',$email)->update('site_users',array('key_resetpass'=>$key));
			if($update)
				return $key;
			else 
				return false;
		}
	}
	public function check_key_resetpass($key) {
		$rs =$this->db->select("id_user")
		->from('site_users')->where('key_resetpass',$key)
		->limit(1)->get();
		if ($rs->num_rows()>=1) {
			return true;
		} else {
			return FALSE;
		}
	}
	public function update_password($key,$pass_encoded) {
		$update=$this->db->where('key_resetpass',$key)->update('site_users',array('password'=>$pass_encoded,'key_resetpass' => ""));
		if($update) return true;
		else return false;
	}
	
}