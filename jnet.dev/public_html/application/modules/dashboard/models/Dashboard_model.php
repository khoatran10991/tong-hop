<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class Dashboard_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function login($email,$password)
	{
		# Trả kết quả về phiên đăng nhập
		$rs_login=$this->db->select("email,password,id_store,id_parent")
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
	public function update_pass($email,$newpassword)
	{
		# Đổi password cho email
		$data_pass['password']=$newpassword;
		$rs_update_pass=$this->db->where('email',$email)->update('site_users',$data_pass);
		return $this->db->affected_rows();
	}
	public function update_info_site($id_site,$title,$description,$keywords,$phone,$address,$logo,$favicon)
	{
		# Đổi thông tin cho website
		$data_site = array('title' =>$title , 
							'description'=>$description,
							'keywords'=>$keywords,
							'phone'=>$phone,
							'address'=>$address,
							'logo'=>$logo,
							'favicon'=>$favicon
									);
		$rs_update_pass=$this->db->where('id_store',$id_site)->update('site_config',$data_site);
		return $this->db->affected_rows();
	}
	public function update_logo($id_site,$file_name)
	{
		# Thay logo cho website
		$file_name_upload=array('logo'=>$file_name);
		$update_logo=$this->db->where('id_site',$id_site)->update('site_config',$file_name_upload);
		return $this->db->affected_rows();
	}
	public function info_theme()
	{
		# Lấy tất cả thông tin theme
		$rs_info_site =$this->db->select("*")
						->from('site_theme')->get();
		if ($rs_info_site) {
			# Nếu đúng trả về thông tin lấy được
			return $rs_info_site->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
	
	public function get_templates_list() {
		# Lấy tất cả thông tin danh mục giao diện
		$templates =$this->db->select("*")
		->from('site_template_cataloge')->get();
		if ($templates) {
			# Nếu đúng trả về thông tin lấy được
			return $templates->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
	public function get_notification($file_view,$id_store) {
		
		$notification =$this->db->select("*")
		->from('site_notification_view')->where("file_view",$file_view)->where("id_store",$id_store)->limit(1)->get();
		if ($notification->num_rows()==1) {
			
			return true;
		} else {
			
			return FALSE;
		}
	}
	public function viewed_notification($file_view,$id_store) {
		$data = array(
				'id_store' => $id_store,
				'viewed' => date("d-m-Y H:i:s",time()) ,
				'file_view' => $file_view
		);
		
		$this->db->insert('site_notification_view', $data);
	}
	
	// kiểm tra token 
	public function check_token($token) {
		$check =$this->db->select("username")
		->from('log_session')->where('ci_session',$token)->limit(1)->get();
		if ($check->num_rows() >= 1) {
			# Nếu đúng trả về thông tin lấy được
			$return =  $check->result();
			# lấy info từ username 
			$info = $this->db->select("id_store,username,email,full_name,id_parent")
				->from('site_users')->where('username',$return[0]->username)->limit(1)->get();
			if($info->num_rows() >= 1) {
				# xóa token tránh bọn sửu nhi sử dụng token nhiều lần
				//$update_token=$this->db->where('username',$return[0]->username)->update('log_session',array('ci_session'=>"jnettokendeleted-snaghacker"));
				
				# trả về dữ liệu 
				return $info->result();
			}	
			else 
				return FALSE;		
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
		
	}
}