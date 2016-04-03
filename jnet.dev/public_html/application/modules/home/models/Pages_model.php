<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho trang cho front end
/**
* 
*/
class Pages_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function select_page_by_url($id_store,$page_url){
			$rs_page = $this->db->select("*")->from('site_pages')->where('id_store',$id_store)->where('page_url',$page_url)->get();
			if($rs_page){
				# Nếu đúng trả về thông tin lấy được
				return $rs_page->result();
			}  else {
				# Nếu sai trả về FALSE
				return FALSE;
			}
	}   
	// function này dùng cho ajax lấy nội dung page trong customize
	public function get_content_page_by_id($pageID,$storeID) {
		# Lấy dữ liệu page
		$rs =$this->db->select("page_content")
		->from('site_pages')->where('id_store',$storeID)->where('id_page',$pageID)->limit(1)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			return $rs->result();
		} else {
			# Nếu sai trả về false
			return FALSE;
		}
	
	}
	
	
}	