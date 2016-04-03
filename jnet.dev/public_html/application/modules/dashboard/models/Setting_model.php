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
	public function get_social($id_store) {
		$rs =$this->db->select("social")
		->from('site_config')->where('id_store',$id_store)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			$rs = $rs->result();
			return $rs;
		} else {
			return FALSE;
		}
	}
	public function update_social($id_store,$social) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('social' => $social));
		if($rs_update)
			return true;
		else
			return false;
	}
	// get footer
	public function get_footer($id_store) {
		$rs =$this->db->select("footer")
		->from('site_config')->where('id_store',$id_store)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			$rs = $rs->result();
			return $rs;
		} else {
			return FALSE;
		}
	}
	public function update_footer($id_store,$footer) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('footer' => $footer));
		if($rs_update)
			return true;
		else
			return false;
	}
	
	// xử lý xác thực google
	public function get_verification_google($id_store) {
		$rs =$this->db->select("verification_google")
		->from('site_config')->where('id_store',$id_store)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			$rs = $rs->result();
			return $rs;
		} else {
			return FALSE;
		}
	}
	public function update_verification_google($id_store,$google) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('verification_google' => $google));
		if($rs_update)
			return true;
		else
			return false;
	}
	// xử lý thông báo trang chủ
	public function get_notification($id_store) {
		$rs =$this->db->select("home_notification")
		->from('site_config')->where('id_store',$id_store)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			$rs = $rs->result();
			return $rs;
		} else {
			return FALSE;
		}
	}
	public function update_notification($id_store,$notification) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('home_notification' => $notification));
		if($rs_update)
			return true;
		else
			return false;
	}
	// xử lý cấu hình nâng cao
	public function get_advance_config($id_store) {
		$rs =$this->db->select("advance_config")
		->from('site_config')->where('id_store',$id_store)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			$rs = $rs->result();
			return $rs;
		} else {
			return FALSE;
		}
	}
	public function update_advance_config($id_store,$config) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('advance_config' => $config));
		if($rs_update)
			return true;
		else
			return false;
	}
	
	# Bắt đầu Quản lý domain 
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
	// update domain 
	public function update_domain($domain,$id_store) {
		$domain = "http://".$domain;
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('url_pre' => $domain));
		if($rs_update)
			return true;
		else
			return false;
	}
	public function delete_domain($id_store) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('url_pre' => null,'url_primary' => 0));
		if($rs_update)
			return true;
		else
			return false;
	}
	public function update_domain_primary($id_store,$primary) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('url_primary' => $primary));
		if($rs_update)
			return true;
		else
			return false;
	}
	public function check_domain($domain) {
		$rs =$this->db->select("id_store")
		->from('site_config')->where('url_pre',$domain)->get();
		if ($rs->num_rows()>=1) {
			
			return TRUE;
		} else {
			return FALSE;
		}
	}
}			