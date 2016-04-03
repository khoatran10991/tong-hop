<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model này lấy kết quả về site, login, dashboard
/**
* 
*/
class Menu_model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        public function info_menu($id_store) {
            $rs_menu = $this->db->select("*")->from("site_menus")->where("id_store",$id_store)->order_by("orderBy", "asc") ->get();
                return $rs_menu->result();
        }
        public function add_menu($form_menu) {
            $result_add_menu = $this->db->insert('site_menus', $form_menu);
            if($result_add_menu){ return $this->db->affected_rows();}
        }
        public function remove_menu($id_menu,$id_parent) {
            $data_menu=array('id_parent'=>$id_parent);
            $result_remove_menu = $this->db->where('id_menu',$id_menu)->delete('site_menus');
            if($result_remove_menu){ 
                $this->db->where('id_parent',$id_menu)->update('site_menus',$data_menu);
		return $this->db->affected_rows();
            }
        }
        public function edit_menu($id_menu,$form_data) {
            $this->db->where('id_menu',$id_menu)->update('site_menus',$form_data);
            return $this->db->affected_rows();
        }
        public function info_id_menu($id_menu) {
            $rs_menu = $this->db->select("*")->from("site_menus")->where("id_menu",$id_menu)->get();
                return $rs_menu->result();
        }
        // cập nhật thứ tự menu
        public function menuOrder($order,$id_menu) {
        	$update = $this->db->where('id_menu',$id_menu)->update('site_menus',array("orderBy" => $order));
        	if($update)
        		return true;
        	else 
        		return false;
        }
        // load menu json 
        public function get_menu($id_store) {
			$rs_menu = $this->db->select("*")->from("site_menu")->where("id_store",$id_store)->get();
                if($rs_menu->result())
                	return $rs_menu->result();
                else 
                	return FALSE;	
		}
		// save menu json 
		public function save_menu($id_store,$data) {
			$check = $this->db->select("id_menu")->from("site_menu")->where("id_store",$id_store)->get();
			if($check->result()) {
				$update = $this->db->where('id_store',$id_store)->update('site_menu',array("data_json"=>$data));
	            if($update)
	            	return true;
	            else 
	            	return FALSE;
			} else {
				$menu = array(
					"id_store" => $id_store,
					"data_json" => $data,
					"name_menu" => "header"
				);
				$result_add_menu = $this->db->insert('site_menu', $menu);
				if($result_add_menu)
	            	return true;
	            else 
	            	return FALSE;
			}
				
		}
		
        
}
