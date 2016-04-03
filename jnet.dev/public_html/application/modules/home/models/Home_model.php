<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class Home_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function siteURL($pageURL)
	{
		# Trả về kết quả thông tin cơ bản trong mục site_config ứng với URL nhận được
		#Gán thêm http và https vào trong chuỗi để tìm kiếm
		$pageURLhttp='http://'.$pageURL;
		$pageURLhttps='https://'.$pageURL;
		$rs_siteURL=$this->db->select("*")->from('site_config')
		->where('url_base',$pageURLhttp)->or_where('url_pre',$pageURLhttp)
		->or_where('url_base',$pageURLhttps)->or_where('url_pre',$pageURLhttps)
		->get();
		if ($rs_siteURL->num_rows()==1) {
			# Nếu đúng trả về thông tin lấy được từ pageURL
			return $rs_siteURL->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
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
	public function info_site($id_store)
	{
		# Lấy thông tin site từ ID Site
		$rs_info_site =$this->db->select("*")
						->from('site_config')->where('id_store',$id_store)
						->limit(1)->get();
		if ($rs_info_site->num_rows()==1) {
			# Nếu đúng trả về thông tin lấy được từ id_store
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
	public function update_info_site($id_store,$title,$description,$keywords,$phone,$address)
	{
		# Đổi password cho username
		$data_site = array('title' =>$title , 
							'description'=>$description,
							'keywords'=>$keywords,
							'phone'=>$phone,
							'address'=>$address,
									);
		$rs_update_pass=$this->db->where('id_store',$id_store)->update('site_config',$data_site);
		return $this->db->affected_rows();
	}
	public function update_logo($id_store,$file_name)
	{
		# Thay logo cho website
		$file_name_upload=array('logo'=>$file_name);
		$update_logo=$this->db->where('id_store',$id_store)->update('site_config',$file_name_upload);
		return $this->db->affected_rows();
	}
	public function set_cookie($id_store,$id_user,$username)
	{
		$value_cookie=sha1($username.time());
		$data_cookie=array(
							"id_store"=>$id_store,
							"id_user"=>$id_user,
							"value"=>$value_cookie,
								);
		#Gán Cookie cho site
		setcookie("jnet",$value_cookie);
		#Kiểm tra xem user đó có cookie chưa, nếu có rồi thì update cookie, ngược lại thì insert cookie
		$rs_cookie = $this->db->select("*")
						->from('site_cookies')->where('id_user',$id_user)
						->get();
		if ($rs_cookie->num_rows()==1) {
			# Nếu có thì update cookie vào
			$this->db->where('id_user',$id_user)->update('site_cookies', $data_cookie);
		} else {
			# Nếu sai thì insert vào database
			$this->db->insert('site_cookies', $data_cookie);
		}
		return $this->db->affected_rows();
	}
	public function get_widgets($location,$id_store) {
		$rs_info_site =$this->db->select("options")
		->from('site_widgets')->where('id_store',$id_store)->where('location',$location)
		->limit(1)->get();
		if ($rs_info_site->num_rows()>=1) {
			# Nếu đúng trả về thông tin lấy được từ id_store
			 return $rs_info_site->result();
			  
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
}