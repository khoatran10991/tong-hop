<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model làm việc với cơ sở dữ liệu cho trang
/**
* 
*/
class Pages_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_pages($store,$idPage = 0,$keyword = null,$limit= null,$offset=null) {
		
		
		
		# Nếu có không có ID page, lấy tất cả pages cùa store
		if($idPage == 0 && $keyword == null) {
			# Lấy tất cả page từ id store
			$rs =$this->db->select("*")
			->from('site_pages')->where('id_store',$store)->order_by("id_page", "desc")->limit($limit,$offset)->get();
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
			# Lấy tất cả page từ id store
			$rs =$this->db->select("*")
			->from('site_pages')->where('id_store',$store)->like('page_name', $keyword)->get();
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
		# nếu có id page , lấy dữ liệu của page này theo id page
		else {
			# Lấy dữ liệu page
			$rs =$this->db->select("*")
			->from('site_pages')->where('id_store',$store)->where('id_page',$idPage)->limit(1)->get();
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
	
	# xoa page
	public  function del_post_page($idPage,$idStore) {
		if($this->db->delete('site_pages', array('id_page' => $idPage,'id_store' => $idStore)))
			return true;
		else
			return false;
	}
	
	
	# add page 
	public function add_page($idStore,$title,$url,$page_content,$page_options,$post_status = null) {
		$data = array(
				'id_store' => $idStore,
				'page_name' => $title,
				'page_url' => $url,
				'page_content' => $page_content,
				'page_options' => $page_options,
				'time_created' => date("d-m-Y H:i:s",time()),
				'page_status' => $post_status
				
		);
		
		if($this->db->insert('site_pages', $data))
			return  $this->db->insert_id();
	}
	public function update_page($idPage,$idStore,$title,$url,$page_content,$page_options,$post_status = null) {
		$data = array(
				'id_store' => $idStore,
				'page_name' => $title,
				'page_url' => $url,
				'page_content' => $page_content,
				'page_options' => $page_options,
				'page_status' => $post_status
	
		);
		$this->db->where('id_store', $idStore);
		$this->db->where('id_page', $idPage);
		
		if($this->db->update('site_pages', $data))
			return 1;
	}
        
        public function select_pages($id_store) {
            
            #Lấy tất cả các trang tương ứng với id_store
            
            $rs_all_page = $this->db->select("*")->from('site_pages')->where('id_store',$id_store)->get();
            if($rs_all_page){
                # Nếu đúng trả về thông tin lấy được
                return $rs_all_page->result();
            }  else {
                # Nếu sai trả về FALSE
                return FALSE;
            }
            
        }
        public function select_page_url($id_page) {
            
            #Lấy tất cả các trang tương ứng với id_page
            
            $rs_page = $this->db->select("*")->from('site_pages')->where('id_page',$id_page)->get();
            if($rs_page){
                # Nếu đúng trả về thông tin lấy được
                return $rs_page->result();
            }  else {
                # Nếu sai trả về FALSE
                return FALSE;
            }
            
        }
        public function count_all_pages($id_store) {
            $rs =$this->db->select("*")->from('site_pages')->where('id_store',$id_store)->get()->num_rows();
            
            return $rs;
            
        }
        public function check_link_page($id_store,$link)
        {
        	
        		$rs = $this->db->select("*")
        		->from('site_pages')->where('id_store', $id_store)->where('page_url', $link)->get();
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
	
	
}	