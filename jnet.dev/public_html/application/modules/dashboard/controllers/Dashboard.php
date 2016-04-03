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
								'fullname' => $user_session['fullname'],
								'template'=>'dashboard'
								 );
			}
			$notification_welcome = $this->Dashboard_model->get_notification("welcome_real",$user_session['id_store']);
			
			
			
			$this->parser->parse('header',$data_view);
			$this->parser->parse($data_view['template'],$data_view);
			$this->parser->parse('footer',$data_view);
			
			if($notification_welcome == false) {
				$this->load->view("notification/welcome_real");
				$this->Dashboard_model->viewed_notification("welcome_real",$user_session['id_store']);
			}	
		}
		else if(isset($_GET['token'])) {
			$token = addslashes($_GET['token']);
			$this->load->model('Dashboard_model');
			$check = $this->Dashboard_model->check_token($token);
			if($check) {
							$login_session=array(
								'id_store' =>$check[0]->id_store,
								'url'=> "http://".$_SERVER['HTTP_HOST'],
								'username'=>$check[0]->username,
								'email'=>$check[0]->email,
								'id_parent'=>$check[0]->id_parent,
								'fullname' => $check[0]->full_name		

							);	
							$this->session->set_userdata('user_session',$login_session);
							#set cookie token
							setcookie("jnet_session", $token, time() + (86400 * 30), "/");
							redirect($login_session['url'].'/dashboard.html','refresh');			
			} 
				
			else 
				redirect("http://".$_SERVER['HTTP_HOST'].'/login.html','refresh');	
			
		}
		 else {
			# Nếu không thì chuyển về trang login
			redirect("http://".$_SERVER['HTTP_HOST'].'/login.html','refresh');
		}
	}
	
}