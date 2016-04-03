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
		$this->load->module('home/url');
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
								'template'=>'menu',
								 );
			}                    

                        $this->load->model('Products_model');
                        $this->load->model('Posts_model');
                        
                        $data_view['id_store'] = $user_session['id_store'];
                        // chuyên mục bài viết 
                        $cates_post = $this->Posts_model->select_category($user_session['id_store']);
                        if($cates_post)
                        	$data_view['cates_post'] = $cates_post;
                        
                        // danh mục sản phẩm
                        $catelogy_all = $this->Products_model->select_category($user_session['id_store'], NULL, NULL,NULL);//select tất cả category có id_parent = 0 ra ngoài view
                        if($catelogy_all)
                        	$data_view['catelogy_all']=$catelogy_all;
                        
                        // select tất cả bài viết của store 
                        $posts = $this->Posts_model->select_posts($user_session['id_store']);
                        if($posts)
                        	$data_view['posts']=$posts;
                        // select tất cả sab3 phẩm của store 
                      //  $products = $this->Products_model->get_products_for_menu($user_session['id_store']);	
                      //  if($products)
                      //  	$data_view['products'] = $products;
                        
                        //select tất cả các menu trong store
                        $this->load->model('Menu_model');
                        
                        // save menu action 
                        if($this->input->post('submit_change_menu')) {
							$data = $this->input->post('jsonOutput');
							$update = $this->Menu_model->save_menu($user_session['id_store'],$data);
							if($update)
								$data_view['message'] = "Cập nhật thành công";
						}
                        
                        // menu json get 
                        $menus_json = $this->Menu_model->get_menu($user_session['id_store']);
                        if($menus_json )
                        	$data_view['menus'] = $menus_json[0]->data_json;
                        
                        
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
            	$return_menu .= '<ul id="draggablePanel-home" class="panel-group list-unstyled">';
            	// $return_menu .=  '<div class="panel-group" id="groupMenu" style="margin-bottom: 5px;">';
                foreach ($list_menu as $value) {
                				if($value->id_parent != 0)
                					$return_menu .= '<li style="margin: 10px 10px 10px 20px;" class="panel panel-info" id="'.$value->id_menu.'">';
                				else 
                   					$return_menu .= '<li class="panel panel-info" id="'.$value->id_menu.'">';
                               // $return_menu.='<div class="panel panel-info">';
                                  $return_menu.='<div data-toggle="collapse" href="#menu-'.$value->id_menu.'" id="box-menu-'.$value->id_menu.'" class="panel-heading move" style="padding: 10px;height: 35px;">';
                                   $return_menu.='<h4 class="panel-title">';
                                     $return_menu.='<a data-toggle="collapse" class="click_edit_menu" data-id="'.$value->id_menu.'" data-parent-id="draggablePanel-home" data-parent="#draggablePanel-home" href="#menu-'.$value->id_menu.'">'.$value->name.'</a>';
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
                                           $return_menu.='<span class="btn btn-info" title="Sửa menu" onclick="edit_link('.$value->id_menu.')"><i class="fa fa-pencil"></i></span>';
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
                                       
                                        $return_menu.='<div class="btn-group pull-right">';
                                            $return_menu.='<span style="padding: 6px 30px;" class="btn btn-info" title="Lưu" onclick="do_edit('.$value->id_menu.')"><i class="fa fa-floppy-o"></i> Lưu</span>'; 
                                            $return_menu.='<span  class="btn btn-default" title="Xóa" onclick="do_remove('.$value->id_menu.','.$value->id_parent.')"><i class="fa fa-trash-o"></i></span>';
                                        $return_menu.='</div>'; 
                                        
                                     $return_menu.='</div>';
                                  $return_menu.='</div>';
                           //     $return_menu.='</div>';
                  
                        		$return_menu.= $this->dequymenu($menus,$value->id_menu);
                       		$return_menu .= '</li>';
                   
                }
               // $return_menu .= '</div>';
                $return_menu .= '</ul>';
            }
            return $return_menu;
        }
        
        public function addmenu() {
            
            //gọi lại session
            $user_session=$this->session->userdata('user_session');
            //print_r($user_session);
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
                    if($result_add_menu==1){redirect($user_session['url'].'/dashboard/menu.html','refresh');}
                   
                    
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
                        $form_menu['link']='/'.$info_page->page_url.'.html';
                    }
//                    echo '<pre>';
//                    print_r($form_menu);
//                    echo '</pre>';
                    
                    //Gọi model và thêm menu sau khi nhập dữ liệu xong
                    
                    $this->load->model('Menu_model');
                    $result_add_menu = $this->Menu_model->add_menu($form_menu);
                    if($result_add_menu==1){redirect($user_session['url'].'/dashboard/menu.html','refresh');}
                   
                    
                }
            }
            //Kiểm tra xem có click submit thêm menu với chuyên mục không ?
            if($this->input->post('submit_link_catelogy')){
            
            	$this->form_validation->set_rules('name_menu_catelogy', 'Tên Menu', 'required|min_length[2]|max_length[150]');
            
            	$this->form_validation->set_message('required','%s không được bỏ trống');
            	$this->form_validation->set_message('min_length','{field} không được ít hơn {param} ký tự');
            	$this->form_validation->set_message('max_length','{field} không được dài hơn {param} ký tự');
            
            	if($this->form_validation->run()){
            
            		$form_menu = array(
            				'id_store'=>$user_session['id_store'],
            				'name' => $this->input->post('name_menu_catelogy'),
            				'catelogy'=>'link-catelogy',
            				'id_parent' => $this->input->post('select_menu_catelogy'),
            		);
            
            		$id_catelogy = $this->input->post('select_catelogy');
            		$this->load->model('Products_model');
            		$result_catelogy = $this->Products_model->select_catelogy_url($id_catelogy);
            
            		foreach ($result_catelogy as $info_catelogy) {
            			$form_menu['link']=$info_catelogy->link.'.html';
            		}
            		//                    echo '<pre>';
            		//                    print_r($form_menu);
            		//                    echo '</pre>';
            
            		//Gọi model và thêm menu sau khi nhập dữ liệu xong
            
            		$this->load->model('Menu_model');
            		$result_add_menu = $this->Menu_model->add_menu($form_menu);
            		if($result_add_menu==1){redirect($user_session['url'].'/dashboard/menu.html','refresh');}
            		 
            
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
                    
                        echo '/'.$page_url[0]->page_url.'.html';
                    
                    
                }
        }
        
        
        // phương thức dùng cho ajax sắp xếp thứ tự menu
        public function menu_order() {
        	if($this->input->post("menuOrder")) {
        		$this->load->model('Menu_model');
        		$arrayOrder = ($this->input->post("menuOrder"));
        		$i = 1;
        		foreach ($arrayOrder as $order) {
        			$this->Menu_model->menuOrder($i,$order);
        			$i++;
        			//echo $order;
        		}
        		
        	}
        }
        
	
}

