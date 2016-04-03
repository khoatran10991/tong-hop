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
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				
			}
			$result_info_theme=$this->Dashboard_model->info_theme();
			$templates_cate = $this->Dashboard_model->get_templates_list();
			
				$data_view = array('logo' =>$info_site->logo ,
						'title'=> "Quản lý giao diện - ".$info_site->title,
						'description'=>$info_site->description,
						'keywords'=>$info_site->keywords,
						'phone'=>$info_site->phone,
						'address'=>$info_site->address,
						'url_site'=>$user_session['url'],
						'template'=>'template',
						'templates' => $result_info_theme,
						'cate_templates' => $templates_cate
				);
			
// 			echo "<pre>";
// 			print_r ($result_info_theme);
// 			echo "</pre>";
			$this->parser->parse('index',$data_view);
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
		// echo "<pre>";
		// print_r ($user_session);
		// echo "</pre>";
		#Cấu hình thông tin upload ảnh logo cho website
		$config_upload = array('upload_path' => './uploads/'.$user_session['username'].'/',
								'allowed_types'=>'gif|jpg|png|GIF|JPG|PNG',
								'max_size'=>5120,
								'max_width'=>2048,
								'max_height'=>2048,
								'encrypt_name'=>TRUE,
		 											);
		$this->load->library('upload', $config_upload);
		if ($user_session) {
			# Nếu có session trong phiên đăng nhập
			$this->load->model('Dashboard_model');
			$result_info_site=$this->Dashboard_model->info_site($user_session['id_store']);
			foreach ($result_info_site as $info_site) {
				$data_view = array('logo' =>$info_site->logo ,
								'title'=>$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'username'=>$user_session['username'],
								'email'=>$user_session['email'],
								'url_site'=>$user_session['url'],
								'template'=>'edit-template'
								 );
			}
			//Upload file image lam logo cho website
					if($this->input->post("submit_upload")){
					
						$result_upload=$this->upload->do_upload('upload_logo');
		                if ( !$result_upload )
		                {
		                        $data_view['error_upload'] = $this->upload->display_errors();
		                    
		                }
		                else
		                {
		                        $data_view['file_name_upload'] = $this->upload->data('file_name');
		                        $this->session->set_userdata('logo_upload',$data_view['file_name_upload']);
		                        
		                 } 					
					}
			//Apply file image lam logo cho website
					if($this->input->post("submit_apply_upload")){
						$file_name_upload= '/uploads'.'/'.$user_session['username'].'/'.$this->session->userdata('logo_upload');
						$this->load->model('Dashboard_model');
						$result_update_logo=$this->Dashboard_model->update_logo($user_session['id_store'],$file_name_upload);	
						$data_view['logo']=$file_name_upload;
						$this->session->unset_userdata('logo_upload');
						
					}

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
				
				// content
				
			
				$this->load->model('AdvanceTemplates_model');
				$panel = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],$location);
				$location = json_decode($panel[0]->options,true);
				unset($location[$widget]);
				
				$encode = json_encode($location);
				// print_r($location);
				
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
				// content
				$title = $this->input->post("title");
				$number = $this->input->post("number"); 
				
				$this->load->model('AdvanceTemplates_model');
				$panel = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],$location);
				$location = json_decode($panel[0]->options,true);
				
				if(isset($location[$widget])) {
					
					
					
					$location[$widget]['title'] = $title;
					$location[$widget]['display'] = $this->input->post("display");
					$location[$widget]['content'] = $this->input->post("content");
					$location[$widget]['widget_title'] = $this->input->post("widgetTitle");
					$location[$widget]['thumnail'] = $thumnail;
				} else {
					$location[$widget] = array();
					$location[$widget]['title'] = $title;
					$location[$widget]['widget_id'] = $widget;
					$location[$widget]['widget_title'] = $this->input->post("widgetTitle");
					$location[$widget]['display'] = $this->input->post("display");
					$location[$widget]['content'] = $this->input->post("content");
					$location[$widget]['thumnail'] = $thumnail;
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
		$number=1;
		if($this->input->post("widget") && $this->input->post("location")) {
			
			
			$user_session=$this->session->userdata('user_session');
			$location = $this->input->post("location");
			$widget = $this->input->post("widget");
			
			$this->load->model('AdvanceTemplates_model');
			$panel = $this->AdvanceTemplates_model->getWidgets($user_session['id_store'],$location);
			
			$widgets = json_decode($panel[0]->options,true);
			
			if(isset($widgets[$widget])) {
				$number = $number + 1;
				
				
			}
			
			
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
			
				
				$html .= '<label><input  name="thumnail" id="thumnail" type="checkbox" value="1"> Hiển thị thumnail</label>';
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