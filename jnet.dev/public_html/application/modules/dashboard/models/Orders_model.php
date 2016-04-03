<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm vi?c v?i cõ s? d? li?u cho trang
/**
* 
*/
class Orders_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_all($id_store) {
        $rs =$this->db->select("id")->from('site_orders')->where('id_store',$id_store)->get()->num_rows();
            
            return $rs;
            
    }
    public function get_orders($store,$idorder = 0,$keyword = null,$limit= null,$offset=null) {
		
		
		
		# N?u có không có ID post, l?y t?t c? posts cùa store
		if($idorder == 0 && $keyword == null) {
			# L?y t?t c? post t? id store
			$rs =$this->db->select("*")
			->from('site_orders')->where('id_store',$store)->order_by("id", "desc")->limit($limit,$offset)->get();
			if ($rs->num_rows()>=1) {
				# N?u có k?t qu? 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# N?u sai tr? v? không có trang nào c?a store này
				return FALSE;
			}
		}
		
		else if($keyword != null) {
			# L?y t?t c? post t? id store
			$rs =$this->db->select("*")
			->from('site_orders')->where('id_store',$store)->like('order_number', $keyword)->get();
			if ($rs->num_rows()>=1) {
				# N?u có k?t qu?
				$rs = $rs->result();
			
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# N?u sai tr? v? không có trang nào c?a store này
				return FALSE;
			}
		}
		# n?u có id post , l?y d? li?u c?a post này theo id post
		else {
			# L?y d? li?u post
			$rs =$this->db->select("*")
			->from('site_orders')->where('id_store',$store)->where('id',$idorder)->limit(1)->get();
			if ($rs->num_rows()==1) {
				# N?u có k?t qu?
				return $rs->result();
			} else {
				# N?u sai tr? v? false
				return FALSE;
			}
		}
	}
	public function update_status($id_store,$orderId,$status) {
		$data = array(
               'status_order' => $status
            );

		$this->db->where('id', $orderId);
		$this->db->where('id_store',$id_store);
		if($this->db->update('site_orders', $data))
			return true;
		else 
			return FALSE;	
	}
	public function update_historry($id_store,$orderId,$history) {
		$data = array(
               'order_history' => $history
            );

		$this->db->where('id', $orderId);
		$this->db->where('id_store',$id_store);
		if($this->db->update('site_orders', $data))
			return true;
		else 
			return FALSE;	
	}
	public function get_province($id) {
		$rs =$this->db->select("title")
			->from('provinces')->where('id',$id)->limit(1)->get();
			if ($rs->num_rows()==1) {
				# N?u có k?t qu?
				return $rs->result();
			} else {
				# N?u sai tr? v? false
				return FALSE;
			}
	}
 }       