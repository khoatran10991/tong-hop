<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho trang
/**
 *
*/
class AdvanceTemplates_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getWidgets($store,$location) {
		$rs =$this->db->select("*")
		->from('site_widgets')->where('id_store',$store)->where('location',$location)->order_by("id", "desc")->get();
		if ($rs->num_rows()>=1) {
			# Nếu có kết quả
			$rs = $rs->result();
		
			// $rs->time_created = date("d-m-Y H:s:i",time());
			return $rs;
		} else {
			# Nếu sai trả về không có trang nào của store này
			return FALSE;
		}
	}
	
	public function updateWidgets($store,$location,$options) {
		$data = array(
				'options' => $options
		);
		
		$this->db->where('id_store', $store);
		$this->db->where('location', $location);
		 if($this->db->update('site_widgets', $data))
		 	return true;
		 else 
		 	return false;
		 	
	}
	
}	