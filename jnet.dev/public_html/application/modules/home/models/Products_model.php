<?php
/**
 * Model x? l? s?n ph?m front end
 * Ngày c?p nh?t: Sang Nguy?n 14/03/2016
 * Version : JNETCI 1.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Products_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_products_by_catelogy($id_store,$idCatelogy,$limit=0,$except=0,$orderBy="desc") {
		
		
		
		# N?u có không có ID product, l?y t?t c? products cùa store
		if($idCatelogy != 0) {
			# L?y t?t c? product t? id store
			$rs =$this->db->select("p.id_product id,p.product_name name,p.product_url url,p._price price,p._price_sale sale,p._thumnail thumnail,p.product_options options,p.time_created time, pcate.name category")
			->from('site_products p')->join('site_product_posted_catelogy pc', 'p.id_product = pc.id_product', 'left')->join('site_products_categorys pcate', 'pcate.id_category = pc.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->where_not_in('p.id_product',$except)->limit($limit)->order_by("p.id_product", $orderBy)->get();
			if ($rs->num_rows() >=1 ) {
				# N?u có k?t qu? 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# N?u sai tr? v? không có trang nào c?a store này
				return FALSE;
			}
		} else {
			$rs =$this->db->select("p.id_product id,p.product_name name,p.product_url url,p._price price,p._price_sale sale,p._thumnail thumnail,p.product_options options,p.time_created time, pcate.name category")
			->from('site_products p')->join('site_product_posted_catelogy pc', 'p.id_product = pc.id_product', 'left')->join('site_products_categorys pcate', 'pcate.id_category = pc.id_category', 'left')->where('p.id_store',$id_store)->limit($limit)->order_by("p.id_product", $orderBy)->group_by("p.id_product")->get();
			if ($rs->num_rows() >=1 ) {
				# N?u có k?t qu? 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# N?u sai tr? v? không có trang nào c?a store này
				return FALSE;
			}
		}
	}
	public function get_catelogy_by_id_product($id_product) {
		$rs = $this->db->select("pcate.id_category idcatelogy, pcate.name name,pcate.link url, pcate.id_parent")->from("site_products_categorys pcate")->join("site_product_posted_catelogy pc","pc.id_category = pcate.id_category","left")->where("pc.id_product",$id_product)->order_by("pc.id", "asc")->get();
		if($rs->num_rows() >= 1) {
			$rs = $rs->result();
			return $rs;
		} else 
			return FALSE;
	}
	public function get_products_by_catelogy_phantrang($number, $offset, $id_store, $idCatelogy) {
		$rs =$this->db->select("p.id_product id,p.product_name name,p.product_url url,p.product_options options,p.time_created time, pcate.name category")
			->from('site_products p')->join('site_product_posted_catelogy pc', 'p.id_product = pc.id_product', 'left')->join('site_products_categorys pcate', 'pc.id_category = pcate.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->limit($number,$offset)->order_by("p.id_product", "desc")->get();
			if ($rs->num_rows() >=1 ) {
				# N?u có k?t qu? 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function get_product_by_catelogy_phantrang_beta($number, $offset, $id_store, $idCatelogy,$orderBy = null) {
		if($orderBy == null) {
			$orderBy[0] = 'id';
			$orderBy[1] = "desc";
		} else {
			$orderBy = explode("-",$orderBy);
		}
		$rs =$this->db->select("p.id_product id,p.product_name name,p.product_url url,p._thumnail thumnail,p._price price,p._price_sale sale,p.product_options options,p.time_created time, pcate.name category")
			->from('site_products p')->join('site_product_posted_catelogy pc', 'p.id_product = pc.id_product', 'left')->join('site_products_categorys pcate', 'pc.id_category = pcate.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->limit($number,$offset)->order_by("$orderBy[0]", $orderBy[1])->get();
			if ($rs->num_rows() >=1 ) {
				# N?u có k?t qu? 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function count_product_by_catelogy($id_store,$idCatelogy) {
		$rs =$this->db->select('p.id_product id,p.product_name name,p.product_url url,p.product_options options,p.time_created time, pcate.name category')
			->from('site_products p')->join('site_product_posted_catelogy pc', 'p.id_product = pc.id_product', 'left')->join('site_products_categorys pcate', 'pc.id_category = pcate.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->get()->num_rows();
            
            return $rs;
	}
	public function get_content_product_by_id($productID,$storeID) {
		# L?y d? li?u product
		$rs =$this->db->select("product_content")
		->from('site_products')->where('id_store',$storeID)->where('id_product',$productID)->limit(1)->get();
		if ($rs->num_rows()==1) {
			# N?u có k?t qu?
			return $rs->result();
		} else {
			# N?u sai tr? v? false
			return FALSE;
		}
	
	}
	public function get_content_product_by_url($storeID,$url) {
		# L?y d? li?u product
		$rs =$this->db->select("*")
		->from('site_products')->where('id_store',$storeID)->where('product_url',$url)->where('status',1)->limit(1)->get();
		if ($rs->num_rows()>=1) {
			
			$rs = $rs->result();
			# c?p nh?t lı?t view c?a product
			$data = array(
					'product_views' => $rs[0]->product_views + 1
			);
			
			$this->db->where('product_url', $url);
			$this->db->where('id_store',$storeID);
			$this->db->update('site_products', $data);
			
			# Tr? v? d? li?u
			return $rs;
		} else {
			# N?u sai tr? v? false
			return FALSE;
		}
	
	}
	public function get_all_product_by_view($id_store,$except_product = 0) {
		# L?y d? li?u product
		$rs =$this->db->select("product_name,product_url,product_options,time_created,product_catelogy")
		->from('site_products')->where('id_store',$id_store)->where('product_status','public')->where_not_in('id_product', $except_product)->order_by("product_views", "desc")->limit(10)->get();
		if ($rs->num_rows()>=1) {
				
			$rs = $rs->result();
			# Tr? v? d? li?u
			return $rs;
		} else {
		# N?u sai tr? v? false
			return FALSE;
		}
	}
	public function get_all_product_by_desc($id_store,$limit = 10,$except_product = 0) {
		# L?y d? li?u product
		$rs =$this->db->select("product_name,product_url,product_options,time_created,product_catelogy")
		->from('site_products')->where('id_store',$id_store)->where('product_status','public')->where_not_in('id_product', $except_product)->order_by("id_product", "desc")->limit(10)->get();
		if ($rs->num_rows()>=1) {
	
			$rs = $rs->result();
			# Tr? v? d? li?u
			return $rs;
		} else {
			# N?u sai tr? v? false
			return FALSE;
		}
	}
	public function get_all_product_featured($id_store,$limit = 10,$except_product = 0) {
		# L?y d? li?u product
		$rs =$this->db->select("product_name,product_url,product_options,time_created,product_catelogy")
		->from('site_products')->where('id_store',$id_store)->where('product_status','public')->where('featured',1)->where_not_in('id_product', $except_product)->order_by("id_product", "desc")->limit(10)->get();
		if ($rs->num_rows()>=1) {
	
			$rs = $rs->result();
			# Tr? v? d? li?u
			return $rs;
		} else {
			# N?u sai tr? v? false
			return FALSE;
		}
	}
	public function get_catelogy_by_product($id_catelogy) {
		$rs =$this->db->select("name,link")
		->from('site_products_categorys')->where('id_category',$id_catelogy)->get();
		if ($rs->num_rows()>=1) {
		
			$rs = $rs->result();
			# Tr? v? d? li?u
			return $rs;
		} else {
			# N?u sai tr? v? false
			return FALSE;
		}
	}
	
        public function count_all_products($id_store) {
            $rs =$this->db->select("*")->from('site_products')->where('id_store',$id_store)->get()->num_rows();
            
            return $rs;
            
        }
        public function check_link_product($id_store,$link)
        {
        	
        		$rs = $this->db->select("*")
        		->from('site_products')->where('id_store', $id_store)->where('product_url', $link)->get();
        		return $rs->num_rows();
        	
        
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
   

}	