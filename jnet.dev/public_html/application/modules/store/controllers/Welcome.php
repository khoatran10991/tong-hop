<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller này thông báo khỏi tạo website thành công.
* 
*/
class Welcome extends MX_Controller
{
	function __construct()
	{
		#load thư helper url, library database
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		
					$this->load->view('setup/welcome');
			
	}
}	