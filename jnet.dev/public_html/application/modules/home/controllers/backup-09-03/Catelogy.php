<?php
/*
 * Controller xử lý bài viết của front end
 * Phiên bản : CI 1.0
 * Ngày sửa gần nhất : Sang Nguyễn 23/01/2016
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Catelogy extends MX_Controller
{

    // Controller xác định URL vào để load giao diện và các thông tin cần thiết
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
          
    }
    public function index($catelogy_url = null) {
    	// get url trừ tên miền , kq  có dạng /chuyen-muc/sang-nguyen.html
        $catelogy_url =$_SERVER['REQUEST_URI'];
        // loại bỏ .html sau cùng , kq trả về /chuyen-muc/sang-nguyen để đối chiếu với csdl
        $catelogy_url = explode(".",$catelogy_url);
     	# lấy domain hoặc subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #Cắt http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());
        
        switch ($pageURL) {
            case  $baseURL:
                //$this->load->view('frontend/home/header');
                // $this->load->view('frontend/home/content');
                // $this->load->view('frontend/home/footer');
                $this->load->view('frontend/home/index');
                break;

            default:
                $this->load->model('Home_model');
                $result_siteURL = $this->Home_model->siteURL($pageURL);
                if ($result_siteURL) {
                    # Nếu tìm thấy site thì hiển thị site đó
                        #Lấy dữ liệu cho ra view
                        
                        
                        
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
                            'description' => $result_siteURL[0]->description,
                            'keywords' => $result_siteURL[0]->keywords,
                            'phone' => $result_siteURL[0]->phone,
                            'address' => $result_siteURL[0]->address,
                            'time_exp' => $result_siteURL[0]->time_exp,
                            'verification_google' => json_decode($result_siteURL[0]->verification_google,true),
                            'title' => "Chuyên mục",
                            'url_site' => $pageURL		
                        );
                        #thêm dữ liệu chung 
                        $chung = modules::run('home/chung/index');
                        array_push($dataview,$chung);
                        
                        $dataview['global'] = $dataview[0];
                        unset($dataview[0]);
                        
                        //Tùy vào địa chỉ trang web là sub hay pre để gắn url_site
                        if ($result_siteURL[0]->url_pre != "") {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre;
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
					
                        //Load model Post_model để load nội dung page load ra trang
                           $this->load->model("Catelogy_model");
                           $this->load->model("Posts_model");
                           // lấy ID của catelogy bởi url catelogy
                           $catelogy = $this->Catelogy_model->select_id_by_url_catelogy($result_siteURL[0]->id_store, $catelogy_url[0]);
							
							
                           if($catelogy) :
	                           // lấy bài viết bởi ID catelogy
	                           
	                           $posts = $this->Posts_model->get_posts_by_catelogy($result_siteURL[0]->id_store,$catelogy[0]->id_category);
	                         
                           	   $dataview['title'] = $catelogy[0]->name ." - ".$result_siteURL[0]->title ;	
                           	   
                           	   // thong tin của chuyên mục
                           	   $dataview['catelogy'][1] = array(
                           	   		"name" => $catelogy[0]->name,
                           	   		"url" => $catelogy[0]->link,
                           	   		"description" => $catelogy[0]->description
                           	   );
                           	   // chuyên mục này có nằm trong 1 chuyên mục khác không ?
                           	   // nếu có show cả chuyên mục tên chuyên mục cha của nó ra breadcrumbs luôn
                           	   if($catelogy[0]->id_parent != 0) {
									$subcatelogy = $this->Catelogy_model->select_by_id_catelogy($result_siteURL[0]->id_store,$catelogy[0]->id_parent);
									if($subcatelogy) {
										$dataview['catelogy'][2] = array(
		                           	   		"name" => $subcatelogy[0]->name,
		                           	   		"url" => $subcatelogy[0]->link,
		                           	   		"description" => $subcatelogy[0]->description
		                           	   );
									}
								}	
								
								
						  
                           endif;  
                           	   
                           	   // phân trang 
                           	   
                           	   if(isset($dataview['global']['layout']['detailpost']['postperpage_catelogy']) && $dataview['global']['layout']['detailpost']['postperpage_catelogy'] != 0)
                           	   		$per_page = $dataview['global']['layout']['detailpost']['postperpage_catelogy'];
                           	   	else 
                           	   		$per_page = 8;	
                           	   		
                           	   if($posts) {
                           	   		$this->load->library('pagination');
						            $config = array();
						            $config['base_url'] = $dataview['url_site'] . $catelogy[0]->link.".html";
						            $config['total_rows'] = $this->Posts_model->count_posts_by_catelogy($result_siteURL[0]->id_store,$catelogy[0]->id_category); //Đếm tổng số post có trong store
						           
						            $config['use_page_numbers'] = TRUE;
						            $config['per_post'] = $per_page; //số item hiển thị
									$config["per_page"] = $per_page;
						            $config['num_links'] = 5; // số hiển thị xung quang item
					
						            $config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
						            $config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
						            $config['next_tag_open'] = "<li>";
						            $config['next_tagl_close'] = "</li>";
						            $config['prev_tag_open'] = "<li>";
									$config['prev_tagl_close'] = "</li>";
						            $config['num_tag_open'] = '<li>';
						            $config['num_tag_close'] = '</li>';
						            $config['full_tag_open'] = '<ul class="pagination" style="margin: 0">';
						            $config['full_tag_close'] = '</ul>';
						            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
						            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
						            $config['use_post_numbers'] = TRUE;
						            $this->pagination->initialize($config);
						            $dataview['pagination']['pagination'] = $this->pagination->create_links();
						            $dataview['pagination']['total'] = $config['total_rows'];
						            $dataview['pagination']['cur_display'] = $this->uri->segment(3);
						            
						            
									$posts = $this->Posts_model->get_posts_by_catelogy_phantrang($config['per_post'],$this->uri->segment(3),$result_siteURL[0]->id_store,$catelogy[0]->id_category);
									
									
									
							   		
							   }
							   // nếu không có bài viết nào trong chuyên mục hiện tại (có thể là chuyên mục lớn nhất) 
							   // thì kiểm tra xem các chuyên mục con của thằng cha này có sở hữu bài viết nào không 
							   // mệt vãi :(((((
                           	   
                              
						   if(isset($posts)) {
						   		$dataview['posts'] = $posts;	
						   }
                           #load widget
 
                         
						if($catelogy)
							$dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/catelogy';	
						else 
							$dataview['template'] = 'frontend/' . $result_siteURL[0]->id_theme . '/404';	

                        $this->load->view('frontend/' . $result_siteURL[0]->id_theme  . '/index', $dataview);

                   
                } else {
                    redirect(base_url(), 'refresh');
                }
                break;
        }
    	
    }

}    