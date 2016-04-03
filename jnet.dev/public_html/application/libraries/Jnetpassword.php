<?php
/*
 * Thư viện tạo mật khẩu 
* Author: Sang Nguyen
* Date update : 27/01/2016
* JNET Team
*/
class Jnetpassword {
	
	public $_jnethash = "jnethashkey"; // không nên đổi.
	public function encodemd5($matkhau) {
		return md5($matkhau.$this->_jnethash);
	}
}