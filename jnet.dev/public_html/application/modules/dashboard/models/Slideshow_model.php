<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class Slideshow_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function update_slideshow($id_store,$data_slide)
	{
		# cập nhật hoặc thêm mới slideshow cho khách hàng
		$rs_slide=$this->db->select("data")
					->from('site_slideshows')->where('id_store',$id_store)->get();
		if ($rs_slide->num_rows()==1) {
			# Nếu đúng thì update thông tin slideshow
			$data = array(
				'data'=>$data_slide,
			);
			$this->db->where('id_store',$id_store)->update('site_slideshows',$data);
		} else {
			# Nếu sai thì insert thông tin slideshow
			$data = array(
				'id_store'=>$id_store,
				'data'=>$data_slide,
			);
			$this->db->insert('site_slideshows',$data);
		}
		
	}
	public function select_slideshow($id_store){
		#Lấy thông tin về slideshow để show ra index
		$rs_slide=$this->db->select("data")
			->from('site_slideshows')->where('id_store',$id_store)->get();
		if ($rs_slide->num_rows()==1) {
			# Nếu đúng thì trả thông tin slideshow
			return $rs_slide->result();
		} else {
			# Nếu sai thì trả về false
			return false;
		}
	}
}