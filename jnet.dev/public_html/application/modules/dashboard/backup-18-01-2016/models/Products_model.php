<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho trang
/**
* 
*/
class Products_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_products($store,$idProduct = 0,$keyword = null) {
		
		
		
		# Nếu có không có ID product, lấy tất cả products cùa store
		if($idProduct == 0 && $keyword == null) {
			# Lấy tất cả product từ id store
			$rs =$this->db->select("*")
			->from('site_products')->where('id_store',$store)->order_by("id_product", "desc")->get();
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
		
		else if($keyword != null) {
			# Lấy tất cả product từ id store
			$rs =$this->db->select("*")
			->from('site_products')->where('id_store',$store)->like('product_name', $keyword)->get();
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
		# nếu có id product , lấy dữ liệu của product này theo id product
		else {
			# Lấy dữ liệu product
			$rs =$this->db->select("*")
			->from('site_products')->where('id_store',$store)->where('id_product',1)->limit(1)->get();
			if ($rs->num_rows()==1) {
				# Nếu có kết quả
				return $rs->result();
			} else {
				# Nếu sai trả về false
				return FALSE;
			}
		}
	}
	
	public function get_username_by_session($session) {
		# Lấy username bởi jnet_session
		$rs=$this->db->select("username")
		->from('log_session')->where('ci_session',$session)
		->limit(1)->get();
		if ($rs->num_rows()>=1) {
			# Nếu đúng trả về thông tin lấy được từ id_site
			
			foreach ($rs->result() as $row)
			{
				$user =  $row->username;
			}
			return $user;
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
	}
	
	# xoa product
	public  function del_post_product($idProduct,$idStore) {
		if($this->db->delete('site_product', array('id_product' => $idProduct,'id_store' => $idStore)))
			return true;
		else
			return false;
	}
	
	
	# add product 
	public function add_product($idStore,$title,$thumnail,$gallery,$price,$price_sale,$url,$product_content,$manage_stock) {
		$data = array(
				'id_store' => $idStore,
				'product_name' => $title,
				'_thumnail' => $thumnail,
				'gallery' => $gallery,
				'_price' => $price,
				'_price_sale' => $price_sale,
				'product_url' => $url,
				'product_content' => $product_content,
				'manage_stock' => $manage_stock,
				'time_created' => date("d-m-Y H:i:s",time())
			
				
		);
		
		if($this->db->insert('site_products', $data))
			return  $this->db->insert_id();
	}
	public function update_product($idproduct,$idStore,$title,$url,$product_content,$product_options,$post_status = null) {
		$data = array(
				'id_store' => $idStore,
				'product_name' => $title,
				'product_url' => $url,
				'product_content' => $product_content,
				'product_options' => $product_options,
				'product_status' => $post_status
	
		);
		$this->db->where('id_store', $idStore);
		$this->db->where('id_product', $idproduct);
		
		if($this->db->update('site_products', $data))
			return 1;
	}
	public function select_category($id_store,$id_category,$link,$id_parent)
	{
		if(isset($link)){
			$rs = $this->db->select("*")
			->from('site_products_categorys')->where('id_store', $id_store)->where('link', $link)->get();
			return $rs->num_rows();
		}elseif(isset($id_parent)){
			$rs = $this->db->select("*")
			->from('site_products_categorys')->where('id_store', $id_store)->where('id_parent', $id_parent)->get();
			return $rs->result();
		}elseif(isset($id_category)){
			$rs = $this->db->select("*")
			->from('site_products_categorys')->where('id_store', $id_store)->where('id_category', $id_category)->get();
			if($rs->num_rows() == 1){
				return $rs->result();
			}else{
				return false;
			}
		}elseif(!isset($id_parent)){
			$rs = $this->db->select("*")
			->from('site_products_categorys')->where('id_store', $id_store)->get();
			return $rs->result();
		}
	
	}
	
	public function add_category($data)
	{
	
		if ($this->db->insert('site_products_categorys', $data))
			return TRUE;
	
	}
	
	public function remove_category($id_store,$id_category,$id_parent)
	{
		$data=array('id_parent'=>$id_parent);
		$result_remove_category = $this->db->where('id_store',$id_store)->where('id_category',$id_category)->delete('site_products_categorys');
		if($result_remove_category){
			$this->db->where('id_parent',$id_category)->update('site_products_categorys',$data);
			return true;
		}
	}
	
	public function update_category($id_store,$id_category,$data_form)
	{
		$result_update_category = $this->db->where('id_store',$id_store)->where('id_category',$id_category)->update('site_products_categorys',$data_form);
		if($result_update_category){
			return true;
		}else{
			return false;
		}
	}
	
	
}	