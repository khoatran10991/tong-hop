<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class Templates_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_list_by_cate($id) {
		# Lấy tất cả thông tin danh mục giao diện
		if($id == 0) {
			$templates =$this->db->select("*")
			->from('site_theme')->get();
		} else {
			$templates =$this->db->select("*")
			->from('site_theme')->where('catalogue',$id)->get();
		}	
		if ($templates->num_rows() >= 1) {
			# Nếu đúng trả về thông tin lấy được
			return $templates->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
		
	}
	public function change_theme($id,$store_id) {
		echo "Ok";
	}
	public function save_settings($store_id,$options) {
		$data = array(
				
				'layout' => $options
				
		
		);
		$this->db->where('id_store', $store_id);
		if($this->db->update('site_config', $data))
			return true;
		else 
			return false;
	}
	
}	