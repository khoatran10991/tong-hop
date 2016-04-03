<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Controller quản lý menu trong dashboard
*/
class Menu extends MX_Controller
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
				$data_view = array(             'layout' =>$info_site->layout,
								'title'=>'Quản Lý Menu - '.$info_site->title,
								'description'=>$info_site->description,
								'keywords'=>$info_site->keywords,
								'phone'=>$info_site->phone,
								'address'=>$info_site->address,
								'url_site'=>$user_session['url'],
								'template'=>'menu-manager',
								 );
			}
                        //select tất cả các trang trong store
                        $this->load->model('Pages_model');
                        $page_all=$this->Pages_model->select_pages($user_session['id_store']); 
                        $data_view['page_all']=$page_all;
                        
                        //select tất cả các menu trong store
                        $this->load->model('Menu_model');
                        $menus=$this->Menu_model->info_menu($user_session['id_store']);
                        $data_view['menu_all']=$menus;
                        
                        // gọi dequymenu() để hiện menu ra view
                        $data_view['list_menu']= $this->dequymenu($menus);
                        
                        //gọi addmenu() xử lý thêm menu
                        
                        $this->addmenu();
                        
                        //load view
			$this->parser->parse('header',$data_view);
			$this->parser->parse($data_view['template'],$data_view);
			$this->parser->parse('footer',$data_view);
                        
                        
                       
		} else {
			# Nếu không thì chuyển về trang login
			redirect('http://'.$pageURL.'/login.html','refresh');
		}
	}   
        public function dequymenu($menus,$id_parent = NULL) {
            
            $list_menu = array();
            $return_menu = "";
            foreach ($menus as $key => $item) {
                if((int) $item->id_parent == (int) $id_parent){
                    $list_menu[]=$item;
                    unset($menus[$key]);
                
                    
                }
            }
            if($list_menu){
                foreach ($list_menu as $value) {
                    $return_menu.='<ul style="list-style-type: none" >';
                        $return_menu.='<li>';
                            $return_menu.='<div class="panel-group" style="margin-bottom: 5px;">';
                                $return_menu.='<div class="panel panel-info">';
                                  $return_menu.='<div class="panel-heading" style="padding: 10px;height: 35px;">';
                                   $return_menu.='<h4 class="panel-title">';
                                     $return_menu.='<a data-toggle="collapse" class="click_edit_menu" data-id="'.$value->id_menu.'" data-parent-id="'.$value->id_parent.'" data-parent="#accordion" href="#menu-'.$value->id_menu.'">'.$value->name.'</a>';
                                    $return_menu.='</h4>';
                                  $return_menu.='</div>';
                                  $return_menu.='<div id="menu-'.$value->id_menu.'" class="panel-collapse collapse">';
                                    $return_menu.='<div class="panel-body">';
                                       $return_menu.=' <div class="input-group">';
                                         $return_menu.='<input id="menu_name_'.$value->id_menu.'" type="text" class="form-control" value="'.$value->name.'" aria-describedby="basic-addon1">';
                                       $return_menu.='</div>';
                                          $return_menu.='<div class=" col-sm-10">';
                                            $return_menu.='<div class="input-group">';
                                            $return_menu.=' <input id="menu_catelogy_'.$value->id_menu.'" type="text"  value="'.$value->catelogy.'" style="display:none;">';
                                          $return_menu.=' <input id="menu_link_'.$value->id_menu.'"type="text" class="form-control" value="'.$value->link.'" aria-describedby="basic-addon1" disabled>';
                                          $return_menu.='</div>';
                                       $return_menu.=' </div>';
                                        $return_menu.='<div class="btn-group col-md-2">';
                                           $return_menu.='<input type="submit" class="btn btn-info" value="Sửa" onclick="edit_link('.$value->id_menu.')">';
                                        $return_menu.='</div>';
                                         
                                       $return_menu.='<div class="row">';
                                        $return_menu.='<div class="col-sm-4">';
                                        $return_menu.='<span>Menu Cha</span>';
                                        $return_menu.='</div>';
                                        $return_menu.='<div class="col-sm-8">';
                                            $return_menu.='<span class="input-group-btn">';
                                                    $return_menu.='<select id="menu_parent_'.$value->id_menu.'" class="btn" style="border-color: #ddd">';
                                                        $return_menu.='<option>TOP</option>';
                                                    $return_menu.='</select>';
                                            $return_menu.='</span>';
                                        $return_menu.='</div>';
                                        $return_menu.='</div>';
                                        $return_menu.='<div class="btn-group pull-left">';
                                            $return_menu.='<input type="submit" class="btn btn-info" value="Xóa" onclick="do_remove('.$value->id_menu.','.$value->id_parent.')"/>'; 
                                        $return_menu.='</div>';
                                        $return_menu.='<div class="btn-group pull-right">';
                                            $return_menu.='<input type="submit" class="btn btn-info" value="Lưu" onclick="do_edit('.$value->id_menu.')"/>'; 
                                        $return_menu.='</div>'; 
                                        
                                     $return_menu.='</div>';
                                  $return_menu.='</div>';
                                $return_menu.='</div>';
                             $return_menu.='</div> ';
                        $return_menu.='</li>';
                        $return_menu.= $this->dequymenu($menus,$value->id_menu);
                    $return_menu.='</ul>';
                }
            }
            return $return_menu;
        }
        
        public function addmenu() {
            
            //gọi lại session
            $user_session=$this->session->userdata('user_session');
            
            //Kiểm tra xem có click submit thêm menu với link bên ngoài
            if($this->input->post('submit_link_default')){
                
                $this->form_validation->set_rules('name_menu_default', 'Tên Menu', 'required|min_length[2]|max_length[150]');
                $this->form_validation->set_rules('link_menu_default', 'Link Menu', 'required|min_length[5]|max_length[250]');
                
                $this->form_validation->set_message('required','%s không được bỏ trống');
                $this->form_validation->set_message('min_length','{field} không được ít hơn {param} ký tự');
                $this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
                
                if($this->form_validation->run()){
                    
                    $form_menu = array(
                    'id_store'=>$user_session['id_store'],
                    'name' => $this->input->post('name_menu_default'),
                    'catelogy'=>'link-default',    
                    'link' => $this->input->post('link_menu_default'),
                    'id_parent' => $this->input->post('select_menu_default'),
                    );
//                    echo '<pre>';
//                    print_r($form_menu);
//                    echo '</pre>';
                    //Gọi model và thêm menu sau khi nhập dữ liệu xong
                    
                    $this->load->model('Menu_model');
                    $result_add_menu = $this->Menu_model->add_menu($form_menu);
                    if($result_add_menu==1){redirect('{url_site}/dashboard/menu.html','refresh');}
                   
                    
                }
            }
            //Kiểm tra xem có click submit thêm menu với page
            if($this->input->post('submit_link_page')){
                
                $this->form_validation->set_rules('name_menu_page', 'Tên Menu', 'required|min_length[2]|max_length[150]');
              
                $this->form_validation->set_message('required','%s không được bỏ trống');
                $this->form_validation->set_message('min_length','{field} không được ít hơn {param} ký tự');
                $this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
                
                if($this->form_validation->run()){
                    
                    $form_menu = array(
                    'id_store'=>$user_session['id_store'],
                    'name' => $this->input->post('name_menu_page'),
                    'catelogy'=>'link-page',
                    'id_parent' => $this->input->post('select_menu_page'),
                    );
                    
                    $id_page = $this->input->post('select_page');
                    $this->load->model('Pages_model');
                    $result_page = $this->Pages_model->select_page_url($id_page);
                    
                    foreach ($result_page as $info_page) {
                        $form_menu['link']='/page/'.$info_page->page_url.'.html';
                    }
//                    echo '<pre>';
//                    print_r($form_menu);
//                    echo '</pre>';
                    
                    //Gọi model và thêm menu sau khi nhập dữ liệu xong
                    
                    $this->load->model('Menu_model');
                    $result_add_menu = $this->Menu_model->add_menu($form_menu);
                    if($result_add_menu==1){redirect('http://shopgach.dev/dashboard/menu.html','refresh');}
                   
                    
                }
            }
        }
        
        public function remove_menu() {
            
            if($this->session->userdata('user_session')){
                    $id_menu = $this->input->post('id_menu');
                    $id_parent = $this->input->post('id_parent');
                    echo $id_menu.' - '.$id_parent;
                    $this->load->model('Menu_model');
                    if($this->Menu_model->remove_menu($id_menu,$id_parent)==1){
                        echo 'Success';
                    }
                
               
            }else{
                # Nếu không thì chuyển về trang login
			redirect(base_url(),'refresh');
            }
        }
        public function edit_menu() {
            
            if($this->session->userdata('user_session')){
                  $id_menu = $this->input->post('id_menu');
                  $data_form = array(
                                   'name' => $this->input->post('name'),
                                   'catelogy'=> $this->input->post('catelogy'),
                                   'link' => $this->input->post('link'),
                                   'id_parent' => $this->input->post('id_parent'),
                                    );
                  $this->load->model('Menu_model');
                  if($this->Menu_model->edit_menu($id_menu,$data_form)==1){
                        echo 'Success';
                    }
            }else{
                # Nếu không thì chuyển về trang login
			redirect(base_url(),'refresh');
            }
        }
        public function edit_link_menu() {
            $user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		 // print_r ($_SESSION['username']);
		// echo "</pre>";
            if ($user_session) {
                //Lấy id_menu từ javascript
                $data_view['id_menu'] = $this->input->post('id_menu');
                //select tất cả các trang trong store
                        $this->load->model('Pages_model');
                        $page_all=$this->Pages_model->select_pages($user_session['id_store']); 
                        $data_view['page_all']=$page_all;
                        
                //load view ra trang menu
                $this->parser->parse('edit-link-menu',$data_view);
                }
        }
        public function edit_menu_link_page() {
            $user_session=$this->session->userdata('user_session');
		// echo "<pre>";
		 // print_r ($_SESSION['username']);
		// echo "</pre>";
            if ($user_session) {
                //Lấy id_page từ javascript
                $id_page = $this->input->post('id_page');
                    $this->load->model('Pages_model');
                    $page_url=$this->Pages_model->select_page_url($id_page);
                    
                        echo '/page/'.$page_url[0]->page_url.'.html';
                    
                    
                }
        }
        
        
	
}

