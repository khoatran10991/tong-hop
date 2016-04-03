<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complete extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
	?>
	<!-- html -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>'
		<title>Active Store - Complete</title>
	
		<div class="container">
			<div class="text-center row" style="color:#909090">
				<h1 style="color:#716F6F">Chúc mừng bạn đã khởi tạo website thành công</h1>
				<p>Chúng tôi vừa gửi 1 email chứa thông tin đăng ký và tài khoản quản trị đến bạn</p>
				
				<br>
				<img src="http://sfile.f-static.com/site/live/images/home/1409323491_web_design_website_monitor_imac_flat_icon_symbol-256.png" />
				
				<br><br><br><br><br>
				<a href="http://jnet.vn/login"  class="btn btn-info">Truy cập trang quản trị</a>
				<br><br><br>
				<p>Chúng tôi luôn sẳn sàng tư vấn và hỗ trợ bạn trong suốt quá trình vận hành, sử dụng website <br>
				Hãy liên hệ qua email: <a href="mailto:support@jnet.vn">support@jnet.vn</a> hoặc hotline: <b>01225.335.001</b> để được hỗ trợ nhanh nhất.</p>
				<br><br>
			</div>
		
		</div>
		
	<?php 	
	}
}
