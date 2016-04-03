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
	
	public function get_products_for_menu($store) {
		$rs =$this->db->select("product_name,product_url")
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
			->from('site_products')->where('id_store',$store)->where('id_product',$idProduct)->limit(1)->get();
			if ($rs->num_rows()==1) {
				# Nếu có kết quả
				return $rs->result();
			} else {
				# Nếu sai trả về false
				return FALSE;
			}
		}
	}
	public function get_catelogys_by_id_product($idProduct) {
		$rs_all_post = $this->db->select("id_category")->from('site_product_posted_catelogy')->where('id_product',$idProduct)->get();
            if($rs_all_post){
                # Nếu đúng trả về thông tin lấy được
                return $rs_all_post->result();
            }  else {
                # Nếu sai trả về FALSE
                return FALSE;
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
		if($this->db->delete('site_products', array('id_product' => $idProduct,'id_store' => $idStore)))
			return true;
		else
			return false;
	}
	
	
	# add product 
	public function add_product($idStore,$title,$thumnail,$gallery,$price,$price_sale,$url,$product_options,$detail_product,$manage_stock) {
		$data = array(
				'id_store' => $idStore,
				'product_name' => $title,
				'_thumnail' => $thumnail,
				'gallery' => $gallery,
				'_price' => $price,
				'_price_sale' => $price_sale,
				'product_url' => $url,
				'product_content' => $detail_product,
				'product_options' =>$product_options,
				'manage_stock' => $manage_stock,
				'time_created' => date("d-m-Y H:i:s",time())
			
				
		);
		
		if($this->db->insert('site_products', $data))
			return  $this->db->insert_id();
	}
	public function add_product_catelogy($idProduct,$idCatelogy) {
		$data = array(
			'id_product' => $idProduct,
			'id_category' => $idCatelogy
		);
		if($this->db->insert('site_product_posted_catelogy', $data))
			return true;
	}
	public function update_product($idproduct,$idStore,$title,$thumnail,$gallery,$price,$price_sale,$url,$product_options,$detail_product,$manage_stock,$status = null) {
		$data = array(
				'product_name' => $title,
				'product_url' => $url,
				'_thumnail' => $thumnail,
				'gallery' => $gallery,
				'_price' => $price,
				'_price_sale'=> $price_sale,
				'manage_stock' => $manage_stock,
				'product_content' => $detail_product,
				'product_options' => $product_options,
				'status' => $status
	
		);
		$this->db->where('id_store', $idStore);
		$this->db->where('id_product', $idproduct);
		
		if($this->db->update('site_products', $data))
			return 1;
	}
	public function delete_product_catelogy($idProduct) {
		$check = $this->db->where('id_product',$idProduct)->delete('site_product_posted_catelogy');
		if($check) return true;
		else return FALSE;
	}
	public function select_category($id_store,$id_category = null,$link = null,$id_parent = null)
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
	public function select_catelogy_url($id_catelogy) {
	
		#Lấy tất cả các trang tương ứng với id_page
	
		$rs_page = $this->db->select("*")->from('site_products_categorys')->where('id_category',$id_catelogy)->get();
				if($rs_page){
						# Nếu đúng trả về thông tin lấy được
						return $rs_page->result();
						}  else {
						# Nếu sai trả về FALSE
						return FALSE;
						}
	
	}
	
	
}	