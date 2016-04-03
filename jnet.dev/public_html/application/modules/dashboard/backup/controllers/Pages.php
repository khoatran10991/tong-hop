<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller quản trị của users
*/
class Pages extends MX_Controller
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
		require_once 'replace_function.php';
	}
	public function index()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		
		
		$message = "";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Pages_model');
			
			#delete page
			if($this->input->get("action") == "trash") {
				$pageID =  $this->input->get("post");
				if($this->Pages_model->del_post_page($pageID,$user_session['id_store'])) {
					$message = "<i class='fa fa-check'></i> Đã xóa trang";
				}
			}
			
			
			# delele pages
			if($this->input->post("del-selected") == 1) {
				$posts = $this->input->post("post");
			
				$i = 0;
				foreach ($posts as $post => $id) {
					if($this->Pages_model->del_post_page($id,$user_session['id_store']))
						$status = 1;
					else
						$status = 0;
					$i++;
						
				}
				if($status == 1)
					$message = "<i class='fa fa-check'></i> Đã xóa " .$i. " trang";
				//array_push($data_view, $message);
			
					
			
			}
			if($this->input->post("submit_page_search")) {
				$keyword = $this->input->post("txt_search");
				$pages = $this->Pages_model->get_pages($user_session['id_store'],0,$keyword);
			} else 
				$pages = $this->Pages_model->get_pages($user_session['id_store']);
			
			
			
			
			if(!$pages) 
				$pages = array (
					array ("page_name" => "Chưa có trang nào")	
				);
			// $result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			
							$data_view = array(
								'title'=>'Tất Cả Các Trang ',
								
								'url_site'=>$user_session['url'],
								'list_pages' => $pages,
								'template'=>'pages',
								'message' => $message	
								 );
			
	
				#load giao dien	
				$this->parser->parse('header',$data_view);
				$this->parser->parse($data_view['template'],$data_view);
				$this->parser->parse('footer',$data_view);
			
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	
	# Hàm này dùng để chuyển title thành URL, dùng cho ajax (Thẻ tiêu đề xem trước của JNET SEO) hoặc gọi hàm này bằng $this->get_title_replace($title)
	# Hàm replace được định nghĩa trong file replace_function.php ngoài root
	public function get_title_replace($title = null) {
		if(isset($_POST['title']) || isset($_GET['title'])) {
			# Dùng cho ajax
			$title = addslashes($_POST['title']);
			
			$title = replace($title);
			echo   $title;
		}
		else {
			# Dùng cho phương thức	
			$title = addslashes($title);
			$title = replace($title);
			return $title;
		}
		
	}
	public function addpage()
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
			$this->load->model('Dashboard_model');
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				$data_view = array(
								'title'=>'Thêm Trang Mới - '.$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'phone'=>$info_site->phone,
								'address'=>$info_site->address,
								'username'=>$user_session['username'],
								'url_site'=>$user_session['url'],
								'layout' =>$info_site->layout,
								'template'=>'add-page',
								'editor'=>$this->ckeditor(),
								 );
			}

			#Hàm xử lý form và chèn thông tin vào sql
			if($this->input->post("submit_page")){
			$result_add_page=$this->process_add_page('public');

				if($result_add_page != 0){
					redirect($user_session['url'].'/dashboard/pages/editpage.html?post='.$result_add_page.'&status=posted&jnettoken='.$_COOKIE['jnet_session'],'refresh');
				}
				else{
					$data_view['error_info_site'] = "***Lỗi: Không tạo được trang, liên hệ admin để hỗ trợ.";
				}
			
			}elseif($this->input->post("submit_page_draft")) {
				$result_add_page=$this->process_add_page('draft');

				if($result_add_page==1){
					redirect($user_session['url'].'/dashboard/pages.html','refresh');
				}
				else{
					$data_view['error_info_site'] = "***Lỗi: Không tạo được trang, liên hệ admin để hỗ trợ.";
				}
			}
			
			
			
			#load view vao website
			$this->parser->parse('header',$data_view);
			$this->parser->parse($data_view['template'],$data_view);
			$this->parser->parse('footer',$data_view);

		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	public function editpage() {
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
			$this->load->model('Pages_model');
			$message = "";
			#cap nhat page
			#Hàm xử lý form và update thông tin vào sql
			if($this->input->post("update_page")){
				$result_add_page=$this->process_update_page('public');
			
				if($result_add_page==1){
					$message = '<i class="fa fa-check"></i> Cập nhật thành công';
				}
				else{
					$data_view['error_info_site'] = "***Lỗi: Không cập nhật được trang, liên hệ admin để hỗ trợ.";
				}
					
			}elseif($this->input->post("update_page_draft")) {
				$result_add_page=$this->process_update_page('draft');
			
				if($result_add_page==1){
					$message = "<i class='fa fa-check'></i> Đã lưu thành bản nháp";
				}
				else{
					$data_view['error_info_site'] = "***Lỗi: Không cập nhật được trang, liên hệ admin để hỗ trợ.";
				}
			}
			#end cap nhat page
			
			
			if($this->input->get("post")) {
				$pageID = $this->input->get("post");
				$page = $this->Pages_model->get_pages($user_session['id_store'],$pageID);
				
				foreach ($page as $custom) {
					$page_status = $custom->page_status;
					$page_options = json_decode($custom->page_options,true);
				}
				# Status post
				if($page_status == "public" || $page_status == "" )
					$page_status = "Đã đăng";
				else 
					$page_status = "Bản nháp";
				
				
				
				if($page) {
					
					$data_view = array(
							'title'=>'Chỉnh sửa trang',
					
							'username'=>$user_session['username'],
							'url_site'=>$user_session['url'],
					
							'template'=>'edit-page',
							'page' => $page,
							'page_status' => $page_status,
							'page_options' => $page_options,
							'editor'=>$this->ckeditor(),
							'message' => $message
					);
					#load view vao website
					$this->parser->parse('header',$data_view);
					$this->parser->parse($data_view['template'],$data_view);
					$this->parser->parse('footer',$data_view);
					
					
				}
				else {
					echo "Bạn không có quyền sửa trang này.Vui lòng quay lại";
				}
			}
			

			
			
		
		}	
	}
	
	public function ckeditor()
	{
		# Chèn và xử lý code ckeditor nhúng vào trang
		$user_session=$this->session->userdata('user_session');
		$url_site = $user_session['url'];
		$username = $user_session['username'];
		$editor="
				<script src='$url_site/editor/ckeditor/ckeditor.js'></script>
				<script type='text/javascript'>
					config = {};
					config.entities_latin = false;
					config.language = 'vi';
					config.filebrowserBrowseUrl= '$url_site/editor/kcfinder/browse.php?opener=ckeditor&type=files';
				    config.filebrowserImageBrowseUrl= '$url_site/editor/kcfinder/browse.php?opener=ckeditor&type=images';
				   
				    config.filebrowserUploadUrl= '$url_site/editor/kcfinder/upload.php?opener=ckeditor&type=files';
				    config.filebrowserImageUploadUrl= '$url_site/editor/kcfinder/upload.php?opener=ckeditor&type=images';
				    
			   	CKEDITOR.replace('txt_editor',config);
			   																		
				</script>
					";
		return $editor;
	}

	public function process_add_page($status)
	{
		# xử lý các thông tin user nhập vào và chèn vào sql
		

				$this->form_validation->set_rules('txt_title_page', 'Tiêu Đề Trang', 'required|min_length[10]|max_length[200]');
				$this->form_validation->set_rules('txt_content_page', 'Nội Dung Trang', 'required');
				$this->form_validation->set_rules('txt_keywords_page', 'Từ Khóa', 'max_length[200]');
				$this->form_validation->set_rules('txt_metadescription_page', 'Thẻ Mô Tả Trang', 'max_length[200]');

				$this->form_validation->set_message('required','%s không được bỏ trống');
				$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
			if($this->form_validation->run()){
				$title_page=$this->input->post("txt_title_page");
				$url = $this->get_title_replace($title_page);
				
				$content_page=$this->input->post("txt_content_page");
				$keywords_page=$this->input->post("txt_keywords_page");
				$metadescription_page=$this->input->post("txt_metadescription_page");
				$page_layout = $this->input->post("page_template");
				$image = $this->input->post("imagethum");
				
				$user_session=$this->session->userdata('user_session');
				
				
	
				$options = array(
						"keyword" => $keywords_page,
						"description" => $metadescription_page,
						"layout" => $page_layout,
						"image" => $image
						
				);
				$options = $this->jnet_json_encode($options);
				
				
				
				$this->load->model('Pages_model');
				$result_add_page= $this->Pages_model->add_page($user_session['id_store'],$title_page,$url,$content_page,$options,$status);
				return $result_add_page;
			}
		
	}
	# function update page
	public function process_update_page($status)
	{
	# xử lý các thông tin user nhập vào và chèn vào sql
	
	
		$this->form_validation->set_rules('txt_title_page', 'Tiêu Đề Trang', 'required|min_length[10]|max_length[200]');
		$this->form_validation->set_rules('txt_content_page', 'Nội Dung Trang', 'required');
		$this->form_validation->set_rules('txt_keywords_page', 'Từ Khóa', 'max_length[200]');
		$this->form_validation->set_rules('txt_metadescription_page', 'Thẻ Mô Tả Trang', 'max_length[200]');
	
		$this->form_validation->set_message('required','%s không được bỏ trống');
		$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
		if($this->form_validation->run()){
			$idPage = $title_page=$this->input->get("post");	
			$title_page=$this->input->post("txt_title_page");
			$url = $this->get_title_replace($title_page);
	
			$content_page=$this->input->post("txt_content_page");
			$keywords_page=$this->input->post("txt_keywords_page");
			$metadescription_page=$this->input->post("txt_metadescription_page");
			$page_layout = $this->input->post("page_template");
			$image = $this->input->post("imagethum");
	
			$user_session=$this->session->userdata('user_session');

			$options = array(
							"keyword" => $keywords_page,
							"description" => $metadescription_page,
							"layout" => $page_layout,
							"image" => $image
	
				);
					$options = $this->jnet_json_encode($options);

					$this->load->model('Pages_model');
							$result_add_page= $this->Pages_model->update_page($idPage,$user_session['id_store'],$title_page,$url,$content_page,$options,$status);
							return $result_add_page;
		}
	
	}
	
	
	
	public function jnet_json_encode($struct) {
		return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
	}
	
}