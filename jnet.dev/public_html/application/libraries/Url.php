<?php
/*
 * Thý vi?n t?o m?t kh?u 
* Author: Sang Nguyen
* Date update : 27/01/2016
* JNET Team
*/
class Url {
	
	
	public function get_url_cate($url) {
		$this->load->model('Url_model');
		
		$return = $this->Url_model->get_url_full_cate_product($url);
		return $return;
	}
}

?>