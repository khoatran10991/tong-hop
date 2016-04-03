<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_product_by_id($id_product,$id_store) {
		$rs = $this->db->select("product_name,_thumnail,_price,	_price_sale,product_url")->from('site_products')->where('id_store',$id_store)->where('id_product',$id_product)->get();
		if($rs->result()){
			$return = $rs->result();
			
			return $return;
	
	
		} else {
			return FALSE;
			
		}
	}
	public function get_provinces() {
		$rs = $this->db->select("id,title")->from('provinces')->order_by('ordering','asc')->get();
		if($rs->result()){
			$return = $rs->result();
			
			return $return;
	
	
		} else {
			return FALSE;
			
		}
	}
	public function get_shipping($id_store) {
		$rs = $this->db->select("id,shipping_name,shipping_description,shipping_fee,shipping_apply")->from('site_shipping')->where('id_store',$id_store)->get();
		if($rs->result()){
			$return = $rs->result();
			
			return $return;
	
	
		} else {
			return FALSE;
			
		}
	}
	public function get_shipping_by_id($id,$id_store) {
		$rs = $this->db->select("id,shipping_name,shipping_description,shipping_fee")->from('site_shipping')->where('id_store',$id_store)->where('id',$id)->get();
		if($rs->result()){
			$return = $rs->result();
			
			return $return;
	
	
		} else {
			return FALSE;
			
		}
	}
	public function insert_order($data) {
		if($this->db->insert('site_orders', $data))
			return true;
		else 
			return FALSE;	
	}
}		