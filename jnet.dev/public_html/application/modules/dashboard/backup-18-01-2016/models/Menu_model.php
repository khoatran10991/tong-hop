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
            $rs_menu = $this->db->select("*")->from("site_menus")->where("id_store",$id_store)->get();
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
        
}
