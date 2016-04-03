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
		$rs_login=$this->db->select("email,password,id_site,parent")
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
	public function update_info_site($id_site,$title,$description,$keywords,$phone,$address)
	{
		# Đổi thông tin cho website
		$data_site = array('title' =>$title , 
							'description'=>$description,
							'keywords'=>$keywords,
							'phone'=>$phone,
							'address'=>$address,
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
}