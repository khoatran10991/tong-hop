<?php
/**
 * Model xử lý bài viết front end
 * Ngày cập nhật: Sang Nguyễn 23/01/2016
 * Version : JNETCI 1.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Posts_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_posts_by_catelogy($id_store,$idCatelogy) {
		
		
		
		# Nếu có không có ID post, lấy tất cả posts cùa store
		if(isset($id_store) && isset($idCatelogy)) {
			# Lấy tất cả post từ id store
			$rs =$this->db->select("id_post,post_name,post_url,post_options,time_created")
			->from('site_posts')->where('id_store',$id_store)->where('post_catelogy',$idCatelogy)->order_by("id_post", "desc")->get();
			if ($rs->num_rows() >=1 ) {
				# Nếu có kết quả 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# Nếu sai trả về không có trang nào của store này
				return FALSE;
			}
		}
	}
	public function get_posts_by_catelogy_phantrang($number, $offset, $id_store, $idCatelogy) {
		$rs =$this->db->select("id_post,post_name,post_url,post_options,time_created")
			->from('site_posts')->where('id_store',$id_store)->where('post_catelogy',$idCatelogy)->limit($number,$offset)->order_by("id_post", "desc")->get();
			if ($rs->num_rows() >=1 ) {
				# Nếu có kết quả 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# Nếu sai trả về không có trang nào của store này
				return FALSE;
			}
	}
	public function count_posts_by_catelogy($id_store,$idCatelogy) {
		$rs =$this->db->select("id_post")->from('site_posts')->where('id_store',$id_store)->where('post_catelogy',$idCatelogy)->get()->num_rows();
            
            return $rs;
	}
	public function get_content_post_by_id($postID,$storeID) {
		# Lấy dữ liệu post
		$rs =$this->db->select("post_content")
		->from('site_posts')->where('id_store',$storeID)->where('id_post',$postID)->limit(1)->get();
		if ($rs->num_rows()==1) {
			# Nếu có kết quả
			return $rs->result();
		} else {
			# Nếu sai trả về false
			return FALSE;
		}
	
	}
	public function get_content_post_by_url($storeID,$url) {
		# Lấy dữ liệu post
		$rs =$this->db->select("*")
		->from('site_posts')->where('id_store',$storeID)->where('post_url',$url)->where('post_status','public')->limit(1)->get();
		if ($rs->num_rows()==1) {
			
			$rs = $rs->result();
			# cập nhật lượt view của post
			$data = array(
					'post_views' => $rs[0]->post_views + 1
			);
			
			$this->db->where('post_url', $url);
			$this->db->where('id_store',$storeID);
			$this->db->update('site_posts', $data);
			
			# Trả về dữ liệu
			return $rs;
		} else {
			# Nếu sai trả về false
			return FALSE;
		}
	
	}
	public function get_all_post_by_view($id_store,$except_post = 0) {
		# Lấy dữ liệu post
		$rs =$this->db->select("post_name,post_url,post_options,time_created,post_catelogy")
		->from('site_posts')->where('id_store',$id_store)->where('post_status','public')->where_not_in('id_post', $except_post)->order_by("post_views", "desc")->limit(10)->get();
		if ($rs->num_rows()>=1) {
				
			$rs = $rs->result();
			# Trả về dữ liệu
			return $rs;
		} else {
		# Nếu sai trả về false
			return FALSE;
		}
	}
	public function get_all_post_by_desc($id_store,$limit = 10,$except_post = 0) {
		# Lấy dữ liệu post
		$rs =$this->db->select("post_name,post_url,post_options,time_created,post_catelogy")
		->from('site_posts')->where('id_store',$id_store)->where('post_status','public')->where_not_in('id_post', $except_post)->order_by("id_post", "desc")->limit(10)->get();
		if ($rs->num_rows()>=1) {
	
			$rs = $rs->result();
			# Trả về dữ liệu
			return $rs;
		} else {
			# Nếu sai trả về false
			return FALSE;
		}
	}
	public function get_all_post_featured($id_store,$limit = 10,$except_post = 0) {
		# Lấy dữ liệu post
		$rs =$this->db->select("post_name,post_url,post_options,time_created,post_catelogy")
		->from('site_posts')->where('id_store',$id_store)->where('post_status','public')->where('featured',1)->where_not_in('id_post', $except_post)->order_by("id_post", "desc")->limit(10)->get();
		if ($rs->num_rows()>=1) {
	
			$rs = $rs->result();
			# Trả về dữ liệu
			return $rs;
		} else {
			# Nếu sai trả về false
			return FALSE;
		}
	}
	public function get_catelogy_by_post($id_catelogy) {
		$rs =$this->db->select("name,link")
		->from('site_products_categorys')->where('id_category',$id_catelogy)->get();
		if ($rs->num_rows()>=1) {
		
			$rs = $rs->result();
			# Trả về dữ liệu
			return $rs;
		} else {
			# Nếu sai trả về false
			return FALSE;
		}
	}
	
        public function count_all_posts($id_store) {
            $rs =$this->db->select("*")->from('site_posts')->where('id_store',$id_store)->get()->num_rows();
            
            return $rs;
            
        }
        public function check_link_post($id_store,$link)
        {
        	
        		$rs = $this->db->select("*")
        		->from('site_posts')->where('id_store', $id_store)->where('post_url', $link)->get();
        		return $rs->num_rows();
        	
        
        }
   

}	