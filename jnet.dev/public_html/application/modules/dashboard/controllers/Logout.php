<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller thoát
*/
class Logout extends MX_Controller
{
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}	
	public function index()
	{
		$user_session=$this->session->userdata('user_session');
		$url = $user_session['url'];
		
		if($this->session->unset_userdata('user_session'))
			redirect($url.'/login.html','refresh');
		else 
			redirect('https://jnet.vn','refresh');
		
		
	}
	
}