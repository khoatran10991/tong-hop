<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller quản trị của users
*/
class Dashboard extends MX_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		 // print_r ($_SESSION['username']);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Dashboard_model');
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				$data_view = array('logo' =>$info_site->logo ,
								'title'=>$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'phone'=>$info_site->phone,
								'address'=>$info_site->address,
								'url_site'=>$user_session['url'],
								'template'=>'dashboard'
								 );
			}
			$this->parser->parse('index',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	
}