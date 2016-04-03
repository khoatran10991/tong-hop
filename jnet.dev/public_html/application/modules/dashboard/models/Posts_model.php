<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho trang
/**
* 
*/
class Posts_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_posts($store,$idPage = 0,$keyword = null,$limit= null,$offset=null) {
		
		
		
		# Nếu có không có ID post, lấy tất cả posts cùa store
		if($idPage == 0 && $keyword == null) {
			# Lấy tất cả post từ id store
			$rs =$this->db->select("*")
			->from('site_posts')->where('id_store',$store)->order_by("id_post", "desc")->limit($limit,$offset)->get();
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
			# Lấy tất cả post từ id store
			$rs =$this->db->select("*")
			->from('site_posts')->where('id_store',$store)->like('post_name', $keyword)->get();
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
		# nếu có id post , lấy dữ liệu của post này theo id post
		else {
			# Lấy dữ liệu post
			$rs =$this->db->select("*")
			->from('site_posts')->where('id_store',$store)->where('id_post',$idPage)->limit(1)->get();
			if ($rs->num_rows()==1) {
				# Nếu có kết quả
				return $rs->result();
			} else {
				# Nếu sai trả về false
				return FALSE;
			}
		}
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
	
	# xoa post
	public  function del_post_post($idPage,$idStore) {
		if($this->db->delete('site_posts', array('id_post' => $idPage,'id_store' => $idStore)))
			return true;
		else
			return false;
	}
	
	
	# add post 
	public function add_post($idStore,$title,$url,$post_content,$post_options,$post_status = null,$featured) {
		$data = array(
				'id_store' => $idStore,
				'post_name' => $title,
				'post_url' => $url,
				'post_content' => $post_content,
				'post_options' => $post_options,
				'time_created' => date("d-m-Y H:i:s",time()),
				'post_status' => $post_status,
				'featured' => $featured
				
		);
		
		if($this->db->insert('site_posts', $data))
			return  $this->db->insert_id();
	}
	public function add_post_catelogy($idPost,$idCatelogy) {
		$data = array(
			'id_post' => $idPost,
			'id_category' => $idCatelogy
		);
		if($this->db->insert('site_posted_catelogy', $data))
			return true;
	}
	public function get_catelogys_by_id_post($idPost) {
		$rs_all_post = $this->db->select("id_category")->from('site_posted_catelogy')->where('id_post',$idPost)->get();
            if($rs_all_post){
                # Nếu đúng trả về thông tin lấy được
                return $rs_all_post->result();
            }  else {
                # Nếu sai trả về FALSE
                return FALSE;
            }
	}
	public function update_post($idPage,$idStore,$title,$post_content,$post_options,$post_status = null,$featured) {
		$data = array(
				'id_store' => $idStore,
				'post_name' => $title,
				'post_content' => $post_content,
				'post_options' => $post_options,
				'post_status' => $post_status,
				'featured' => $featured
	
		);
		$this->db->where('id_store', $idStore);
		$this->db->where('id_post', $idPage);
		
		if($this->db->update('site_posts', $data))
			return 1;
	}
    public function update_post_catelogy($idPost,$idCatelogy) {
    	

		$data = array(
			'id_post' => $idPost,
			'id_category' => $idCatelogy
		);
		
		if($this->db->insert('site_posted_catelogy', $data))
			return true;
	}   
	public function delete_post_catelogy($idPost) {
		$check = $this->db->where('id_post',$idPost)->delete('site_posted_catelogy');
		if($check) return true;
		else return FALSE;
	} 
        public function select_posts($id_store) {
            
            #Lấy tất cả các trang tương ứng với id_store
            
            $rs_all_post = $this->db->select("*")->from('site_posts')->where('id_store',$id_store)->get();
            if($rs_all_post){
                # Nếu đúng trả về thông tin lấy được
                return $rs_all_post->result();
            }  else {
                # Nếu sai trả về FALSE
                return FALSE;
            }
            
        }
        public function select_post_url($id_post) {
            
            #Lấy tất cả các trang tương ứng với id_post
            
            $rs_post = $this->db->select("*")->from('site_posts')->where('id_post',$id_post)->get();
            if($rs_post){
                # Nếu đúng trả về thông tin lấy được
                return $rs_post->result();
            }  else {
                # Nếu sai trả về FALSE
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
        public function createWidget($id_store,$widget_name,$widget_value) {
        	
        	$check = $this->db->select("id")->from('site_widget_make_box')->where('id_store', $id_store)->get();
        	if($check->num_rows() >= 5) {
        		echo 0; #không cho tạo thêm google map khi vượt quá 5
        	} else {
        	$data = array(
        			'id_store' => $id_store,
        			'widget_name' => $widget_name,
        			'widget_value' => $widget_value
        			);
        	
        	if($this->db->insert('site_widget_make_box', $data))
        		echo  $this->db->insert_id(); #trả về id của map
        	}
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
	
	public function add_category($data)
	{
	
		if ($this->db->insert('site_post_categorys', $data))
			return TRUE;
	
	}
	
	public function remove_category($id_store,$id_category,$id_parent)
	{
		$data=array('id_parent'=>$id_parent);
		$result_remove_category = $this->db->where('id_store',$id_store)->where('id_category',$id_category)->delete('site_post_categorys');
		if($result_remove_category){
			$this->db->where('id_parent',$id_category)->update('site_post_categorys',$data);
			return true;
		}
	}
	
	public function update_category($id_store,$id_category,$data_form)
	{
		$result_update_category = $this->db->where('id_store',$id_store)->where('id_category',$id_category)->update('site_post_categorys',$data_form);
		if($result_update_category){
			return true;
		}else{
			return false;
		}
	}
	public function select_catelogy_url($id_catelogy) {
	
		#Lấy tất cả các trang tương ứng với id_page
	
		$rs_page = $this->db->select("*")->from('site_post_categorys')->where('id_category',$id_catelogy)->get();
				if($rs_page){
						# Nếu đúng trả về thông tin lấy được
						return $rs_page->result();
						}  else {
						# Nếu sai trả về FALSE
						return FALSE;
						}
	
	}
	
	
}	