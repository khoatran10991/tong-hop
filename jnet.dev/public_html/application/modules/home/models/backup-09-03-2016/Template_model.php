<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Model n�y x? l? d? li?u giao di?n v� c�c widget c?a front end
/**
* 
*/
class Template_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_layout($id_store) {
		$rs =$this->db->select("layout")
			->from('site_config')->where('id_store',$id_store)->get();
			if ($rs->num_rows()>=1) {
				# N?u c� k?t qu? 
				$rs = $rs->result();
				return $rs;
			} else {
				return FALSE;
			}
	}	
}	