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
	
	public function get_posts_by_catelogy($id_store,$idCatelogy,$limit=0,$except=0,$orderBy="desc") {
		
		
		
		# Nếu có không có ID post, lấy tất cả posts cùa store
		if($idCatelogy != 0) {
			# Lấy tất cả post từ id store
			$rs =$this->db->select("p.id_post id,p.post_name name,p.post_url url,p.post_options options,p.time_created time, pcate.name category")
			->from('site_posts p')->join('site_posted_catelogy pc', 'p.id_post = pc.id_post', 'left')->join('site_post_categorys pcate', 'pcate.id_category = pc.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->where_not_in('p.id_post',$except)->limit($limit)->order_by("p.id_post", $orderBy)->get();
			if ($rs->num_rows() >=1 ) {
				# Nếu có kết quả 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				# Nếu sai trả về không có trang nào của store này
				return FALSE;
			}
		} else {
			$rs =$this->db->select("p.id_post id,p.post_name name,p.post_url url,p.post_options options,p.time_created time, pcate.name category")
			->from('site_posts p')->join('site_posted_catelogy pc', 'p.id_post = pc.id_post', 'left')->join('site_post_categorys pcate', 'pcate.id_category = pc.id_category', 'left')->where('p.id_store',$id_store)->limit($limit)->order_by("p.id_post", "desc")->group_by("p.id_post")->get();
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
	public function get_catelogy_by_id_post($id_post) {
		$rs = $this->db->select("pcate.id_category idcatelogy, pcate.name name,pcate.link url, pcate.id_parent")->from("site_post_categorys pcate")->join("site_posted_catelogy pc","pc.id_category = pcate.id_category","left")->where("pc.id_post",$id_post)->order_by("pc.id", "asc")->get();
		if($rs->num_rows() >= 1) {
			$rs = $rs->result();
			return $rs;
		} else 
			return FALSE;
	}
	public function get_posts_by_catelogy_phantrang($number, $offset, $id_store, $idCatelogy) {
		$rs =$this->db->select("p.id_post id,p.post_name name,p.post_url url,p.post_options options,p.time_created time, pcate.name category")
			->from('site_posts p')->join('site_posted_catelogy pc', 'p.id_post = pc.id_post', 'left')->join('site_post_categorys pcate', 'pc.id_category = pcate.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->limit($number,$offset)->order_by("p.id_post", "desc")->get();
			if ($rs->num_rows() >=1 ) {
				# Nếu có kết quả 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function get_posts_by_catelogy_phantrang_beta($number, $offset, $id_store, $idCatelogy) {
		$rs =$this->db->select("p.id_post id,p.post_name name,p.post_url url,p.post_options options,p.time_created time, pcate.name category")
			->from('site_posts p')->join('site_posted_catelogy pc', 'p.id_post = pc.id_post', 'left')->join('site_post_categorys pcate', 'pc.id_category = pcate.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->limit($number,$offset)->order_by("p.id_post", "desc")->get();
			if ($rs->num_rows() >=1 ) {
				# Nếu có kết quả 
				$rs = $rs->result();
				
				// $rs->time_created = date("d-m-Y H:s:i",time());
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function count_posts_by_catelogy($id_store,$idCatelogy) {
		$rs =$this->db->select('p.id_post id,p.post_name name,p.post_url url,p.post_options options,p.time_created time, pcate.name category')
			->from('site_posts p')->join('site_posted_catelogy pc', 'p.id_post = pc.id_post', 'left')->join('site_post_categorys pcate', 'pc.id_category = pcate.id_category', 'left')->where('pc.id_category',$idCatelogy)->where('p.id_store',$id_store)->get()->num_rows();
            
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
        public function select_category($id_store,$id_category = null,$link = null,$id_parent = null)
		{
			if(isset($link)){
				$rs = $this->db->select("*")
				->from('site_post_categorys')->where('id_store', $id_store)->where('link', $link)->get();
				return $rs->num_rows();
			}elseif(isset($id_parent)){
				$rs = $this->db->select("*")
				->from('site_post_categorys')->where('id_store', $id_store)->where('id_parent', $id_parent)->get();
				return $rs->result();
			}elseif(isset($id_category)){
				$rs = $this->db->select("*")
				->from('site_post_categorys')->where('id_store', $id_store)->where('id_category', $id_category)->get();
				if($rs->num_rows() == 1){
					return $rs->result();
				}else{
					return false;
				}
			}elseif(!isset($id_parent)){
				$rs = $this->db->select("*")
				->from('site_post_categorys')->where('id_store', $id_store)->get();
				return $rs->result();
			}
		
		}
   

}	