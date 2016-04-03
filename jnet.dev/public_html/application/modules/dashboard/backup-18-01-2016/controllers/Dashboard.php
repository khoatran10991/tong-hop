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
								'url_site'=>$user_session['url'],
							 	'username' => $user_session['username'],
								'template'=>'dashboard'
								 );
			}
			$notification_welcome = $this->Dashboard_model->get_notification("welcome_real",$user_session['id_store']);
			
			$this->parser->parse('index',$data_view);
			if($notification_welcome == false) {
				$this->load->view("notification/welcome_real");
				$this->Dashboard_model->viewed_notification("welcome_real",$user_session['id_store']);
			}	
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	
}