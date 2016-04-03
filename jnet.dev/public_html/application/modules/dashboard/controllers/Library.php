<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller quản trị của users
*/
class Library extends MX_Controller
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
		$this->load->helper('file');
	}
	public function index()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		// print_r ($user_session);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			#Lấy folder user để tính tổng size MB
			$urlfolder="uploads/".$user_session['username'];
			
			
			$this->load->model('Dashboard_model');
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				$data_view = array(
								'title'=>$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'phone'=>$info_site->phone,
								'address'=>$info_site->address,
								'url_site'=>$user_session['url'],
								'layout' =>$info_site->layout,
								'total_folder_size'=>round($this->folderSize($urlfolder)/(1024*1024),2),
								'template'=>'library-images',
								'username' => $user_session['username']
								 );
			}
			$this->parser->parse('header',$data_view);
			$this->parser->parse($data_view['template'],$data_view);
			$this->parser->parse('footer',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	public function folderSize($dir)
	{
	$count_size = 0;
	$count = 0;
	$dir_array = scandir($dir);
	  foreach($dir_array as $key=>$filename){
	    if($filename!=".." && $filename!="."){
	       if(is_dir($dir."/".$filename)){
	          $new_foldersize = $this->foldersize($dir."/".$filename);
	          $count_size = $count_size+ $new_foldersize;
	        }else if(is_file($dir."/".$filename)){
	          $count_size = $count_size + filesize($dir."/".$filename);
	          $count++;
	        }
	   }
	 }
	return $count_size;
	}
	
	
}