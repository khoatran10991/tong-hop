<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_url_full_cate_product($url,$id_store) {
		$rs_page = $this->db->select("name,link,id_parent")->from('site_products_categorys')->where('id_store',$id_store)->where('link',$url)->get();
			if($rs_page->result()){
				# N?u ðúng tr? v? thông tin l?y ðý?c
				$rs  = $rs_page->result();
				
				if($rs[0]->id_parent == 0) 
					return "/danh-muc/".$rs[0]->link.".html";
				else {
					$rs_2 = $this->db->select("name,link,id_parent")->from('site_products_categorys')->where('id_store',$id_store)->where('id_category',$rs[0]->id_parent)->get();
					if($rs_2){
						$rs_2 = $rs_2->result();
						
						// check danh muc subsub
						$rs_3 = $this->db->select("name,link,id_parent")->from('site_products_categorys')->where('id_store',$id_store)->where('id_category',$rs_2[0]->id_parent)->get();
						if($rs_3->result()) {
							$rs_3 = $rs_3->result();
							return "/danh-muc/".$rs_3[0]->link."/".$rs_2[0]->link."/".$rs[0]->link.".html";
						} else 
							return "/danh-muc/".$rs_2[0]->link."/".$rs[0]->link.".html";
						
					}	
					
					
					
				}
						
				
			}  else {
				# N?u sai tr? v? FALSE
				return FALSE;
			}
	}
}	