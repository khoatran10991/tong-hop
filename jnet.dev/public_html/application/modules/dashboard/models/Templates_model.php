<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class Templates_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_list_by_cate($id) {
		# Lấy tất cả thông tin danh mục giao diện
		if($id == 0) {
			$templates =$this->db->select("*")
			->from('site_theme')->get();
		} else {
			$templates =$this->db->select("*")
			->from('site_theme')->where('catalogue',$id)->get();
		}	
		if ($templates->num_rows() >= 1) {
			# Nếu đúng trả về thông tin lấy được
			return $templates->result();
		} else {
			# Nếu sai trả về FALSE
			return FALSE;
		}
		
	}
	public function change_theme($id_store,$idTheme) {
		$rs_update=$this->db->where('id_store',$id_store)->update('site_config',array('id_theme' => $idTheme));
		if($rs_update)
			return true;
		else
			return false;
	}
	public function save_settings($store_id,$options) {
		$data = array(
				
				'layout' => $options
				
		
		);
		$this->db->where('id_store', $store_id);
		if($this->db->update('site_config', $data))
			return true;
		else 
			return false;
	}

	public function update_layout($id_store,$layout)
	{
		$data['layout']=$layout;
		$this->db->where('id_store',$id_store)->update('site_config',$data);
		if($this->db->affected_rows()==1){
			return true;

		}else{
			return false;
		}

	}
	public function get_layout($id_store) {
		$rs =$this->db->select("layout")
			->from('site_config')->where('id_store',$id_store)->get();
			if ($rs->num_rows()>=1) {
				# Nếu có kết quả 
				$rs = $rs->result();
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function get_system_widgets() {
		$rs =$this->db->select("*")
			->from('system_widgets')->where('active',1)->order_by("orderBy", "asc")->get();
			if ($rs->num_rows()>=1) {
				# Nếu có kết quả 
				$rs = $rs->result();
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function get_home_widgets() {
		$rs =$this->db->select("*")
			->from('system_widgets')->where('active',1)->where('home',1)->order_by("orderBy", "asc")->get();
			if ($rs->num_rows()>=1) {
				# Nếu có kết quả 
				$rs = $rs->result();
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function get_widget_setting($id_store) {
		$rs =$this->db->select("settings")
			->from('site_widgets_setting')->where('id_store',$id_store)->get();
			if ($rs->num_rows()>=1) {
				# Nếu có kết quả 
				$rs = $rs->result();
				return $rs;
			} else {
				return FALSE;
			}
	}
	public function update_widget_setting($id_store,$setting)
	{
		$rs =$this->db->select("settings")
			->from('site_widgets_setting')->where('id_store',$id_store)->get();
			if ($rs->num_rows()>=1) {
				# Nếu có kết quả 
				$data['settings'] = $setting;	
				$update = $this->db->where('id_store',$id_store)->update('site_widgets_setting',$data);
				return  TRUE;
			} else {
				$insert = array(
					'id_store' => $id_store,
					'settings' => $setting,
					
			);
			
				if($this->db->insert('site_widgets_setting', $insert))
					return  TRUE;
			}
		
		
		
	}
	public function update_box_html($id_store,$content,$id_widget,$options = "") {
		
		$rs =$this->db->select("id")
			->from('site_box_html')->where('id_store',$id_store)->where('id_widget',$id_widget)->get();
			if ($rs->num_rows()>=1) {
				$update = $this->db->where('id_store',$id_store)->where('id_widget',$id_widget)->update('site_box_html',array("html_content"=>$content,"options"=>$options));
				return true;
			} else {
				
				$insert = array(
						'id_store' => $id_store,
						'id_widget' => $id_widget,
						'html_content' => $content,
						'options' => $options
						
				);
				
				if($this->db->insert('site_box_html', $insert))
					return  TRUE;
				else 
					return FALSE;
			}	
	}
	public function get_box_html($id_store,$id_widget) {
		$rs =$this->db->select("html_content,options")
			->from('site_box_html')->where('id_store',$id_store)->where('id_widget',$id_widget)->get();
			if ($rs->num_rows()>=1) {
				$rs = $rs->result();
				return $rs;
			} else 
				return FALSE;
	}
	
}	