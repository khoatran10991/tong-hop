<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho trang cho front end
/**
* 
*/
class Catelogy_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function select_id_by_url_catelogy($id_store,$catelogy_url){
			$rs_page = $this->db->select("id_category,name,link,description,id_parent")->from('site_post_categorys')->where('id_store',$id_store)->where('link',$catelogy_url)->get();
			if($rs_page){
				# Nếu đúng trả về thông tin lấy được
				return $rs_page->result();
			}  else {
				# Nếu sai trả về FALSE
				return FALSE;
			}
	}
	public function select_by_id_catelogy($id_store,$IDcatelogy){
			$rs_page = $this->db->select("id_category,name,link,description,id_parent")->from('site_post_categorys')->where('id_store',$id_store)->where('id_category',$IDcatelogy)->get();
			if($rs_page){
				# Nếu đúng trả về thông tin lấy được
				return $rs_page->result();
			}  else {
				# Nếu sai trả về FALSE
				return FALSE;
			}
	} 
	public function select_by_id_catelogy_2($id_store,$IDcatelogy){
			$rs_page = $this->db->select("id_category,name,link,description,id_parent")->from('site_post_categorys')->where('id_store',$id_store)->where('id_parent',$IDcatelogy)->get();
			if($rs_page){
				# Nếu đúng trả về thông tin lấy được
				return $rs_page->result();
			}  else {
				# Nếu sai trả về FALSE
				return FALSE;
			}
	}   
}	