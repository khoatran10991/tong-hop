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
						'template'=>'template',
						'templates' => $result_info_theme,
						'cate_templates' => $templates_cate
				);
			
// 			echo "<pre>";
// 			print_r ($result_info_theme);
// 			echo "</pre>";
			$this->parser->parse('header',$data_view);
			$this->parser->parse('template',$data_view);
			$this->parser->parse('footer',$data_view);
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
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
	
			

			$this->parser->parse('index',$data_view);
	
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
	
	# register widget
	public function addwidget() {
		
		if($this->input->post("widget") && $this->input->post("location")) {
			
			
			$user_session=$this->session->userdata('user_session');
			$location = $this->input->post("location");
			$widget = $this->input->post("widget");
			
			$this->load->model('AdvanceTemplates_model');
			$panel = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],$location);
			
			$widgets = json_decode($panel[0]->options,true);
			$count_widgets = count($widgets) + 1;
			$number = $count_widgets;
			
			
			
			$saveID = $widget.'-'.$location.'-'.$number;
			if($widget == "newspost") :
				
				$html = '<li class="panel panel-info" id="box-'.$widget.'-'.$location.'-'.$number.'">';
				$html .= '<div id="widgettitle-'.$widget.'-'.$location .'-'.$number.'" class="panel-heading move" data-toggle="collapse" data-parent="#draggablePanel-'.$location.'" href="#'.$widget.'-'.$location.'-'.$number.'">Bài viết mới</div>';
				$html .= '<div class="panel-body" id="'.$widget.'-'.$location .'-'.$number.'">';
				$html .= '<div class="form-group">';
				$html .= '<label for="usr">Tiêu đề:</label>';
				$html .= '<input type="text" class="form-control" id="title-'.$widget.'-'.$location .'-'.$number.'" value="">';
				$html .= '</div>';
				$html .= '<div class="form-group">';
				$html .= '<label for="usr">Số bài viết hiển thị:</label>';
				$html .= '<input type="number" class="form-control" id="display-'.$widget.'-'.$location.'-'.$number.'" value="">';
				$html .= '</div>';
				$html .= '<div class="form-group">';
			
				
				$html .= '<label><input  name="thumnail-'.$widget.'-'.$location.'-'.$number.'" id="thumnail-'.$widget.'-'.$location.'-'.$number.'" type="checkbox" value="1"> Hiển thị thumnail</label>';
				$html .= '</div>';
				$html .= '<div class="form-group" style="text-align:right">';
				$html .= '<a class="delete" onclick=delwidget("'.$saveID.'") href="javascript:void()">Xóa bỏ</a> ';
				
				$html .= '<button  id="'.$widget.'" onclick=savechange("'.$saveID.'") class="btn btn-default" role="button">Lưu thay đổi</button>';
				$html .= '</div></div></li>';

		   
		   	elseif($widget == "productsnew") :
			    $html = '<li class="panel panel-info" id="box-'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '<div id="widgettitle-'.$widget.'-'.$location .'-'.$number.'" class="panel-heading move" data-toggle="collapse" data-parent="#draggablePanel-'.$location.'" href="#'.$widget.'-'.$location .'-'.$number.'">Sản phẩm</div>';
			    $html .= '<div class="panel-body" id="'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '<div class="form-group">';
			    $html .= '<label for="usr">Tiêu đề:</label>';
			    $html .= '<input type="text" class="form-control" id="title-'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '</div>';
			    $html .= '<div class="form-group">';
			    $html .= '<label for="usr">Số sản phẩm hiển thị:</label>';
			    $html .= '<input type="number" class="form-control" id="display-'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '</div>';
			    $html .= '<div class="form-group" style="text-align:right">';
			    $html .= '<a class="delete" onclick=delwidget("'.$saveID.'") href="javascript:void()">Xóa bỏ</a> ';
			    	
			    $html .= '<button  onclick=savechange("'.$saveID.'-'.$number.'") class="btn btn-default" role="button">Lưu thay đổi</button>';
			    $html .= '</div></div></li>';
		    
		    elseif($widget == "html") :
			    $html = '<li class="panel panel-info" id="box-'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '<div id="widgettitle-'.$widget.'-'.$location .'-'.$number.'" class="panel-heading move" data-toggle="collapse" data-parent="#draggablePanel-'.$location.'" href="#'.$widget.'-'.$location .'-'.$number.'">Văn bản HTML</div>';
			    $html .= '<div class="panel-body" id="'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '<div class="form-group">';
			    $html .= '<label for="usr">Tiêu đề:</label>';
			    $html .= '<input type="text" class="form-control" id="title-'.$widget.'-'.$location .'-'.$number.'">';
			    $html .= '</div>';
			    $html .= '<div class="form-group">';
			    $html .= '<label for="usr">Nội dung:</label>';
			    $html .= '<textarea class="form-control" rows="5" id="content-'.$widget.'-'.$location .'-'.$number.'"></textarea>';
			    $html .= '</div>';
			    $html .= '<div class="form-group" style="text-align:right">';
			    $html .= '<a class="delete" onclick=delwidget("'.$saveID.'") href="javascript:void()">Xóa bỏ</a> ';
			    	
			    $html .= '<button  onclick=savechange("'.$saveID.'") class="btn btn-default" role="button">Lưu thay đổi</button>';
			    $html .= '</div></div></li>';
		    
			else : 
				$html = "Not found !";   
		    endif;
		   
			
		
		} else {
			echo "Error 404";
		}
		echo $html;
	}
	
	
}