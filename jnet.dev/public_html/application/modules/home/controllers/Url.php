<?php
/*
 * Controller x? l? s?n ph?m c?a front end
 * Phi�n b?n : CI 1.0
 * Ng�y s?a g?n nh?t : Sang Nguy?n 14/03/2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Url extends MX_Controller
{

    // Controller x�c �?nh URL v�o �? load giao di?n v� c�c th�ng tin c?n thi?t
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
	public function get_url_cate($url,$id_store) {
		$this->load->model('Url_model');
		
		$return = $this->Url_model->get_url_full_cate_product($url,$id_store);
		if($return)
			return $return;
		else 
			return "";	
	}
}
?>