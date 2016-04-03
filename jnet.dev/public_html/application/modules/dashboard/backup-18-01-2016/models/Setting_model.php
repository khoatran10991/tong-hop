<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho cấu hình
/**
* 
*/
class Setting_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library("session");
	}
	
	public function get_site($id_store) {
		
			# Lấy tất cả page từ id store
			$rs =$this->db->select("*")
			->from('site_config')->where('id_store',$id_store)->get();
			if ($rs->num_rows()==1) {
				# Nếu có kết quả 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# Nếu sai trả về không có trang nào của store này
				return FALSE;
			}
	}
	public function get_price_domain_by_ext($ext) {
	
		$rs =$this->db->select("price")
		->from('price_domains')->where('extension',$ext)->get();
		if ($rs->num_rows()>=1) {
			# Nếu có kết quả
			$rs = $rs->result();
			$rs = $rs[0]->price;
			
			
			
			// $rs->time_created = date("d-m-Y H:s:i",time());
			return $rs;
		} else {
			# Nếu sai trả về không có trang nào của store này
			return FALSE;
		}
	}
	public function get_user_by_email($email) {
	
		$rs =$this->db->select("*")
		->from('site_users')->where('email',$email)->get();
		if ($rs->num_rows()>=1) {
			# Nếu có kết quả
			$rs = $rs->result();
			$rs = $rs[0];
			return $rs;
		} else {
			return FALSE;
		}
	}
	public function create_order_domain($_data) {
		$_data = json_encode($_data);
		$data = array(
				'_data' => $_data ,
				'_time' => date("d-m-Y H:i:s",time()) ,
				'_order_number' => 'JN4343'
		);
		
		if($this->db->insert('domain_orders', $data))
			return true;
		else 
			return false;
	}
	public function get_banks() {

		$rs =$this->db->select("*")
		->from('bank_account')->where('bank_active',1)->get();
		if ($rs->num_rows()>=1) {
			# Nếu có kết quả
			$rs = $rs->result();
			//$rs = $rs[0];
			return $rs;
		} else {
			return FALSE;
		}
	}
}			