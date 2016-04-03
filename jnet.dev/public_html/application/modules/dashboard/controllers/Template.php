<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller switch and edit template
*/
class Template extends MX_Controller
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
	public function get_session() {
		$user_session=$this->session->userdata('user_session');
		return $user_session;
	}
	public function index()
	{
		$user_session=$this->session->userdata('user_session');
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		
		// echo "<pre>";
		// print_r ($user_session);
		// echo "</pre>";
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Dashboard_model');
			$result_info_theme=$this->Dashboard_model->info_theme();
			$templates_cate = $this->Dashboard_model->get_templates_list();
			
				$data_view = array(
						'title'=> "Quản lý giao diện",
						'url_site'=>$user_session['url'],
						'template'=>'template/layout',
						'templates' => $result_info_theme,
						'cate_templates' => $templates_cate
				);
			
// 			echo "<pre>";
// 			print_r ($result_info_theme);
// 			echo "</pre>";
			redirect('http://'.$pageURL.'/dashboard/template/layout.html','refresh');
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}
	public function layout_ajax_load_layout_html() {
		if(($this->input->post("function"))) {
			$function = $this->input->post("function");
			$user_session=$this->session->userdata('user_session');
			$this->load->model("Templates_model");
			$widgets = $this->Templates_model->get_system_widgets($user_session['id_store']);
			$site_widgets = $this->Templates_model->get_layout($user_session['id_store']);
			$site_widgets = json_decode($site_widgets[0]->layout,true);
			$data_view = array(
									'url_site' => $user_session['url'],
									'widgets' => $widgets,
									'site_widgets' => $site_widgets
									 );
			
			$html = $this->load->view('template/'.$function,$data_view);
			//$html = $this->load->view('edit-template',$data_view);
			if($html)
				return $html;
			else 
				return "";
		} else {
			
			return "Lỗi !";
		}
			
	}
	public function widgets() {
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		if($user_session) {
			$this->load->model("Templates_model");
			$message = "";
			$layout= $this->Templates_model->get_layout($user_session['id_store']);
			$layout = json_decode($layout[0]->layout,true);
			
			if($this->input->post('submit_change_banner')) {
				$data = $this->input->post();
				$layout['banner'] = $data;
				$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
					if($update)
						$message = "Cập nhật banner thành công.";
					else
						$message = "error";
			}
			if($this->input->post('submit_change_banner_scroll')) {
				$data = $this->input->post();
				$layout['banner_scroll'] = $data;
				$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
					if($update)
						$message = "Cập nhật banner thành công.";
					else
						$message = "error";
			}
			$widget_settings = $this->Templates_model->get_widget_setting($user_session['id_store']);
			if(!$widget_settings)
				$widget_settings = array();
			else 
				$widget_settings = json_decode($widget_settings[0]->settings,true);	
				
			if($this->input->post('submit_change_news')) {
				$data = $this->input->post();
				$widget_settings['news'] = $data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
				
			}
			if($this->input->post('submit_change_news_in_catelogy')) {
				$data = $this->input->post();
				$widget_settings['news_in_catelogy'] = $data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
			}
			// BOX HTML
			if($this->input->post('submit_change_html_1')) {
				$data = $this->input->post('txt_content_html_1');
				$update = $this->Templates_model->update_box_html($user_session['id_store'],$data,'html_1');
				if($update)
						$message = "Cập nhật thành công.";
					else
						$message = "Không có sự thay đổi";
			}
			if($this->input->post('submit_change_html_2')) {
				$data = $this->input->post('txt_content_html_2');
				$update = $this->Templates_model->update_box_html($user_session['id_store'],$data,'html_2');
				if($update)
						$message = "Cập nhật thành công.";
					else
						$message = "Không có sự thay đổi";
			}
			if($this->input->post('submit_change_html_3')) {
				$data = $this->input->post('txt_content_html_3');
				$update = $this->Templates_model->update_box_html($user_session['id_store'],$data,'html_3');
				if($update)
						$message = "Cập nhật thành công.";
					else
						$message = "Không có sự thay đổi";
			}
			if($this->input->post('submit_change_footer')) {
				$data = $this->input->post('txt_content_footer');
				$options = $this->input->post('txt_color_footer');
				$update = $this->Templates_model->update_box_html($user_session['id_store'],$data,'footer',$options);
				if($update)
						$message = "Cập nhật thành công.";
					else
						$message = "Không có sự thay đổi";
			}
			if($this->input->post('submit_change_facebook')) {
				$data = $this->input->post();
				$widget_settings['facebook'] = $data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
			}
			
			// sản phẩm theo danh mục 
			if($this->input->post('submit_change_productsincatelogy_1')) {
				$data = $this->input->post();
				$widget_settings['productsincatelogy']['productsincatelogy_1'] =$data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
			}
			if($this->input->post('submit_change_productsincatelogy_2')) {
				$data = $this->input->post();
				$widget_settings['productsincatelogy']['productsincatelogy_2'] =$data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
			}
			if($this->input->post('submit_change_productsincatelogy_3')) {
				$data = $this->input->post();
				$widget_settings['productsincatelogy']['productsincatelogy_3'] =$data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
			}
			if($this->input->post('submit_change_productsincatelogy_4')) {
				$data = $this->input->post();
				$widget_settings['productsincatelogy']['productsincatelogy_4'] =$data;
				$update = $this->Templates_model->update_widget_setting($user_session['id_store'],json_encode($widget_settings));
					if($update)
						$message = "Lưu cài đặt thành công.";
					else
						$message = "error";
			}
			// lấy nội dung box html 
			$html = array();
			$html['html_1'] = $this->Templates_model->get_box_html($user_session['id_store'],'html_1');
			$html['html_2'] = $this->Templates_model->get_box_html($user_session['id_store'],'html_2');
			$html['html_3'] = $this->Templates_model->get_box_html($user_session['id_store'],'html_3');
			$html['footer'] = $this->Templates_model->get_box_html($user_session['id_store'],'footer');
			//$html['2'] = $this->Templates_model->get_box_html($user_session['id_store'],'html_2');
			
			// lấy danh sách chuyên mục bài viết 
            $post_catelogy = $this->list_category();
           // lấy danh sách danh mục sản phẩm 
           $product_catelogy = $this->list_category_product();
			$data_view = array(
				'title'=> "Tùy chỉnh trang web",
				'username' => $user_session['username'],
				'email' => $user_session['email'],
				'url_site' => $user_session['url'],
				'template' => 'widgets/banner',
				'data' => $layout,
				'message' => $message,
				'widget_settings' => $widget_settings,
				'category_all' => $post_catelogy,
				'product_category_all' => $product_catelogy,
				'editor' => $this->ckeditor(),
				'box_html' => $html
	
			);
			if($this->input->get(md5("editbox"))) {
				$widget = addslashes($this->input->get(md5("editbox")));
				$widget = str_replace(array("'","/"),"",$widget);
				if(file_exists('application/modules/dashboard/views/widgets/'.$widget.'.php'))
					$data_view['template'] = 'widgets/'.$widget;
				else 
					$data_view['template'] = 'widgets/404';		
			}
			$this->parser->parse('index',$data_view);
		} else {
			
			redirect('http://'.$pageURL.'/login.html?returnURL=dashboard/template/layout.html','refresh');
			
		}	
	}
	public function layout($edit = null) {
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		if($user_session) {
			$this->load->model("Templates_model");
			$widgets = $this->Templates_model->get_system_widgets($user_session['id_store']);
			$layout= $this->Templates_model->get_layout($user_session['id_store']);
			$layout = json_decode($layout[0]->layout,true);
			
			$message = "";
			# post shave change setting color 
			if($this->input->post('save_setting_color')) {
				
				$setting = $this->input->post();
				$layout['colorsetting'] = ($setting);
				
				$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
				if($update)
					$message = "Cập nhật màu sắc trang web thành công.";
				else 
					$message = "error";	
			}
			if($this->input->post('save_css')) {
				$css = $this->input->post('css');
				$check = strpos($css,'script');
				if($check >= 1) {
					$message = "error";
				} else {
					$customCSS = array(
					'active' => 1,
					'code' => $css
					);
					$layout['customCSS'] = $customCSS;
					$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
					if($update)
						$message = "Cập nhật CSS thành công.";
					else 
						$message = "error";
				}
					
			}
			if($this->input->post("submit_change_detailpost")) {
					$detailpost = $this->input->post();
					$layout['detailpostt'] = $detailpost;
					$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
					if($update)
						$message = "Cập nhật trình bày trang chi tiết thành công.";
					else
						$message = "error";
			} 
			if($this->input->post("submit_change_detailproduct")) {
					$detailproduct = $this->input->post();
					$layout['detailproduct'] = $detailproduct;
					$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
					if($update)
						$message = "Cập nhật trình bày trang sản phẩm thành công.";
					else
						$message = "error";
			}
			if($this->input->post('submit_change_options')) {
					$options = $this->input->post();
					$layout['options'] = $options;
					$update = $this->Templates_model->update_layout($user_session['id_store'],json_encode($layout));
					if($update)
						$message = "Cập nhật thành công.";
					else
						$message = "error";
			}
			if(isset($layout['colorsetting']))
				$colorsetting = $layout['colorsetting'];
			else 
				$colorsetting = array();	
			if(isset($layout['customCSS']))
				$customCSS = $layout['customCSS'];
			else 
				$customCSS = array();
			if(isset($layout['detailpost']))
				$detailpost = $layout['detailpost'];
			else 
				$detailpost = array();
			if(isset($layout['detailproduct']))
				$detailproduct = $layout['detailproduct'];
			else 
				$detailproduct = array();
			if(isset($layout['options']))
				$options = $layout['options'];
			else 
				$options = array();					
			$data_view = array(
									'title'=> "Bố cục trang web",
									'username' => $user_session['username'],
									'email' => $user_session['email'],
									'url_site' => $user_session['url'],
									'template' => 'template/layout',
									'colorsetting' => $colorsetting,
									'customCSS' => $customCSS,
									'detailpost' => $detailpost,
									'detailproduct' => $detailproduct,
									'options' => $options,
									'widgets' => $widgets,
									'site_widgets' => $layout['widgets'],
									'message' => $message,
									'editor'=>$this->ckeditor(),
									 );
									 
			if($this->input->get(md5("editbox"))) {
				$widget = addslashes($this->input->get(md5("editbox")));
				$widget = str_replace(array("'","/"),"",$widget);
				$data_view['template'] = 'widgets/'.$widget;	
			} else if(isset($edit) && $edit != NULL) {
					$edit = str_replace("'","",$edit);
					
					$data_view['template'] = 'template/'.$edit;
			}
			$this->parser->parse('index',$data_view);	
		} else {
			redirect('http://'.$pageURL.'/login.html?returnURL=dashboard/template/layout.html','refresh');
		}

	}
	public function save_change_ajax_layout() {
		if($this->input->get('sortorder')) {
			$user_session=$this->session->userdata('user_session');
			if($user_session) {
				$id_arr =  explode('&',$this->input->get('sortorder'));
				array_pop($id_arr);
				$i = 0;
				$box = array();
				for($i = 0;$i<count($id_arr);$i++) {
					$sang[$i] = explode("=",$id_arr[$i]);
					$widget = explode(",",$sang[$i][1]);
					$box[$sang[$i][0]] = $widget;
				}
				# load model 
				$this->load->model("Templates_model");
				$layout = $this->Templates_model->get_layout($user_session['id_store']);
				$data = json_decode($layout[0]->layout,true);
				$data['widgets'] = $box;
				// $data = json_encode($khoa);
				$save = json_encode($data);
				$update = $this->Templates_model->update_layout($user_session['id_store'],$save);
				if($update)
					echo 1;
				else 
					echo 0;
			} else 
				echo "";
	
		} else 
			echo "<b>Lỗi không tìm thấy!</b>";
	}
	public function edit()
	{
		# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
		$pageURL = '';
		$pageURL .= $_SERVER["SERVER_NAME"];
		# code...
		$user_session=$this->session->userdata('user_session');
		
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Dashboard_model');
			
			$this->load->model('Pages_model');
			$this->load->model('Templates_model');
			$message = "";
			# action save change
			if($this->input->post('submit_save_change_353ff0ae11ewd')) {
				$logo = $this->input->post('upload_logo');
				$favicon = $this->input->post('upload_favicon');
				$homedisplay = $this->input->post('homedisplay');
				$homepage = $this->input->post('homepage');
				$background = $this->input->post('background');
				$bgcolor = $this->input->post('chosecolor');
				$bgimage = $this->input->post('choseimage');
				
				
				$display = array(
					"logo" => $logo,
					"favicon" => $favicon,
					"homedisplay" => $homedisplay,
					"homepage" => $homepage,
					"background" => $background,
					"bgcolor" => $bgcolor,
					"bgimage" => $bgimage
													
				);
			
				$encode = json_encode($display);
				$save = $this->Templates_model->save_settings($user_session['id_store'],$encode);
				
				if($save)
					$message = "Cập nhật thành công";
				else 
					$message = "Lỗi, vui lòng kiểm tra lại các thông số cài đặt";
				
			}
			
			# end action save change
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			$pages = $this->Pages_model->get_pages($user_session['id_store']);
			$layout = $result_info_site[0]->layout;
			$layout = json_decode($layout,true);
				$data_view = array(
								'title'=> "Chỉnh sửa giao diện",
								'username' => $user_session['username'],
								'email' => $user_session['email'],
								'url_site' => $user_session['url'],
								'template' => 'edit-template',
								'pages' => $pages,
						
								'layout' => $layout,
								'message' => $message
								 );
	
			
			$this->parser->parse('header',$data_view);
			$this->parser->parse('edit-template',$data_view);
			$this->parser->parse('footer',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}	
	}
	
	#function su dung cho ajax luu thong tin cai dat widget
	public function savechangeAjax() {
		$user_session=$this->session->userdata('user_session');
		if ($user_session) {
			
			if($this->input->post("type") == "remove") {
				$location = $this->input->post("location");
				$widget = $this->input->post("widget");
				$idkey = $this->input->post("idkey");
				// content
				
			
				$this->load->model('AdvanceTemplates_model');
				$panel = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],$location);
				$location = json_decode($panel[0]->options,true);
				unset($location[$idkey]);
				
				$encode = json_encode($location);
				 print_r($location);
				
				$update = $this->AdvanceTemplates_model->updateWidgets($user_session['id_store'],$this->input->post("location"),$encode);
				if($update)
					
					 print_r($location);
				else
					echo "Lỗi !";
				
				
			}
			
			else if($this->input->post("widget") && $this->input->post("location")) {	
				
				$location = $this->input->post("location");
				$widget = $this->input->post("widget");
				$thumnail = $this->input->post("thumnail");
				$idkey = $this->input->post("idkey");
				// content
				$title = $this->input->post("title");
				$number = $this->input->post("number"); 
				
				$this->load->model('AdvanceTemplates_model');
				$panel = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],$location);
				$location = json_decode($panel[0]->options,true);
				
				if(isset($location[$idkey])) {
					
					
					
					$location[$idkey]['title'] = $title;
					$location[$idkey]['display'] = $this->input->post("display");
					$location[$idkey]['content'] = $this->input->post("content");
					$location[$idkey]['widget_title'] = $this->input->post("widgetTitle");
					$location[$idkey]['thumnail'] = $thumnail;
				} else {
					$value = array();
				
					$value['title'] = $title;
					$value['widget_id'] = $widget;
					$value['widget_title'] = $this->input->post("widgetTitle");
					$value['display'] = $this->input->post("display");
					$value['content'] = $this->input->post("content");
					$value['thumnail'] = $thumnail;
					
					array_push($location,$value);
				}	
				$encode = json_encode($location);
				
				$update = $this->AdvanceTemplates_model->updateWidgets($user_session['id_store'],$this->input->post("location"),$encode);
				if($update)
				
					print_r($location);
				else 
					echo "Lỗi !";
					
				
			}
		} else {
			
			return "Error. Security alert !";
		}
	}
	

	
	public function advance()
	{
	
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
				$this->load->model('AdvanceTemplates_model');
				 $result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
				$panel_home = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],"home");
				$panel_footer = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],"footer");
				foreach ($result_info_site as $info_site) {
					$data_view = array('logo' =>$info_site->logo ,
						'title'=>"Sửa giao diện nâng cao",
						'username'=>$user_session['username'],
						'email'=>$user_session['email'],
						'url_site'=>$user_session['url'],
						'template'=>'advance-template',
						'panel_home' => $panel_home,
						'panel_footer' => $panel_footer
						);
				}
				$this->parser->parse('index',$data_view);
			} else {
				# Nếu không thì chuyển về trang login
				redirect('http://'.$pageURL.'/login.html','refresh');
			}
	}
	
	public function ckeditor()
	{
		# Chèn và xử lý code ckeditor nhúng vào trang
        $user_session = $this->session->userdata('user_session');
        $url_site = $user_session['url'];
        $username = $user_session['username'];
        $editor = "
				<script src='$url_site/editor/ckeditor/ckeditor.js'></script>
				<script type='text/javascript'>
					config = {};
					config.entities_latin = false;
					config.language = 'vi';
				    config.height = 300;
				    config.filebrowserImageBrowseUrl= '$url_site/editor/filemanager/dialog.aspx?type=1&editor=ckeditor&fldr'
				   
			
				    
			   	CKEDITOR.replace('txt_editor',config);
			   																		
				</script>
					";
			$tinymce = "
						<script src='$url_site/editor/tinymce/js/tinymce/tinymce.min.js'></script>
						<script type='text/javascript'>
						
						tinymce.init({
							 selector:'#txt_editor',
							 menu: {
						insert: {title: 'Insert', items: 'link media | template hr'},
						    edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
						    
						    view: {title: 'View', items: 'visualaid'},
						    format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
						    table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
						    tools: {title: 'Tools', items: 'spellchecker code'}
						  	},
						  	filemanager_crossdomain: true,
						   external_filemanager_path:'$url_site/editor/filemanager/',
						   external_plugins: { 'filemanager' : '$url_site/editor/filemanager/plugin.min.js'},	
						  
			               
						
						 });
						 
						 </script>
			";
        return $editor;
	}
	// lấy danh dách Catelogy phiên bản mới
		#update lấy thêm subsub item
	public function list_category($id_store = null){
		#Gán session đăng nhập
		if(!isset($id_store))
        	$user_session = $this->session->userdata('user_session');
        else 
        	$user_session['id_store'] = $id_store;	
        $this->load->model('Posts_model');
        $danhsach = array();
        $list_category = $this->Posts_model->select_category($user_session['id_store'], NULL, NULL, NULL);//select tất cả category 
        $i = 0;
        foreach($list_category as $item){
			if($item->id_parent == 0) {
				$danhsach[$i]['name'] = $item->name;
				$danhsach[$i]['link'] = $item->link;
				$danhsach[$i]['id'] = $item->id_category;
				$j = 0;
				foreach($list_category as $subitem) {
					if($subitem->id_parent != 0 && $subitem->id_parent == $item->id_category ) {
		
						$danhsach[$i]['child'][$j] = array(
							'id' => $subitem->id_category,
							'name' => $subitem->name,
							'link' => $subitem->link,
							'id_parent' => $subitem->id_parent
						);
						
						$u = 0;
						foreach($list_category as $subsubitem) {
							if($subsubitem->id_parent != 0 && $subsubitem->id_parent == $subitem->id_category ) {
				
								$danhsach[$i]['child'][$j]['child'][$u] = array(
									'id' => $subsubitem->id_category,
									'name' => $subsubitem->name,
									'link' => $subsubitem->link,
									'id_parent' => $subsubitem->id_parent
								);
									
								
							}
							$u = $u+1;;
						}	
						
					}
					$j = $j + 1;
				}
				
			} 	
			
			$i = $i+ 1;
			
		}
        return $danhsach;
	}
	// lấy danh mục sản phẩm
	public function list_category_product($id_store = null){
		if(!isset($id_store))
        	$user_session = $this->session->userdata('user_session');
        else 
        	$user_session['id_store'] = $id_store;	
        $this->load->model('Products_model');
        $danhsach = array();
        $list_category = $this->Products_model->select_category($user_session['id_store'], NULL, NULL, NULL);//select tất cả category 
        $i = 0;
        foreach($list_category as $item){
			if($item->id_parent == 0) {
				$danhsach[$i]['name'] = $item->name;
				$danhsach[$i]['link'] = $item->link;
				$danhsach[$i]['id'] = $item->id_category;
				$j = 0;
				foreach($list_category as $subitem) {
					if($subitem->id_parent != 0 && $subitem->id_parent == $item->id_category ) {
		
						$danhsach[$i]['child'][$j] = array(
							'id' => $subitem->id_category,
							'name' => $subitem->name,
							'link' => $subitem->link,
							'id_parent' => $subitem->id_parent
						);
						
						$u = 0;
						foreach($list_category as $subsubitem) {
							if($subsubitem->id_parent != 0 && $subsubitem->id_parent == $subitem->id_category ) {
				
								$danhsach[$i]['child'][$j]['child'][$u] = array(
									'id' => $subsubitem->id_category,
									'name' => $subsubitem->name,
									'link' => $subsubitem->link,
									'id_parent' => $subsubitem->id_parent
								);
									
								
							}
							$u = $u+1;;
						}	
						
					}
					$j = $j + 1;
				}
				
			} 	
			
			$i = $i+ 1;
			
		}
        return $danhsach;
	}

	
	
}