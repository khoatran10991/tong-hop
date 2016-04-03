<?php
/*
* Controller x? l? các d? li?u chung khi đưa ra ngoài view
* Phiên b?n : CI 1.0
* Ngày s?a g?n nh?t : Sang Nguy?n 27/02/2016
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Chung extends MX_Controller
{
	public $_id_store;
	public $_id_theme;
	public $_url_site;	
	# biến toàn cục 
	public $_trenphai;
	public $_trentrai;
	#menu 
	public $_menu;
	#banner
	public $_banner;
	public $_banner_scroll;
	public $is_home;

    // Controller xác đ?nh URL vào đ? load giao di?n và các thông tin c?n thi?t
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->library('cart');
    }
    public function index() {
    	  # l?y domain ho?c subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #C?t http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());
                $this->load->model('Home_model');
                $this->load->model('Template_model');
                $this->load->module('home/url');
                $result_siteURL = $this->Home_model->siteURL($pageURL);
                if ($result_siteURL[0]) {
                	$this->_id_store = $result_siteURL[0]->id_store;
                	$this->_id_theme = $result_siteURL[0]->id_theme;
                	
                	
                	
                    # N?u t?m th?y site th? hi?n th? site đó
                        #L?y d? li?u cho ra view
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
                            'logo' => $result_siteURL[0]->logo,
                            'favicon' => $result_siteURL[0]->favicon,
                            'description' => $result_siteURL[0]->description,
                            'keywords' => $result_siteURL[0]->keywords,
                            'phone' => $result_siteURL[0]->phone,
                            'address' => $result_siteURL[0]->address,
                            'layout' => $result_siteURL[0]->layout,
                            'time_exp' => $result_siteURL[0]->time_exp,
                            'footer' => json_decode($result_siteURL[0]->footer,true),
                            'social' => json_decode($result_siteURL[0]->social,true),
                            'verification_google' => json_decode($result_siteURL[0]->verification_google,true),
                        );
                        // kiểm tra xem có phải khách đang xem ở trang chủ không ?
                        
                        $dataview['itemcart'] = $this->cart->total_items();
                        $dataview['cart'] = $this->cart->contents();
                        
                        $homepage = array("/index.php","/index.html","/");
    
						$currentpage = $_SERVER['REQUEST_URI'];	
						if(in_array($currentpage,$homepage))
							$dataview['is_home'] = TRUE;
						else 
							$dataview['is_home'] = FALSE;
						$this->is_home = $dataview['is_home'];			
						
						                        
                        //Tùy vào đ?a ch? trang web là sub hay pre đ? g?n url_site
                        if ($result_siteURL[0]->url_pre != "" && $result_siteURL[0]->url_primary == 1) {
                            $dataview['url_site'] = $result_siteURL[0]->url_pre; 
                           
                        } else {
                            $dataview['url_site'] = $result_siteURL[0]->url_base;
                        }
							 $this->_url_site =$dataview['url_site'];
                            #Load model Dashboard_model đ? l?y giá tr? layout và cho ra ngoài
                            $this->load->model('dashboard/Dashboard_model');
                            $rs_info_site = $this->Dashboard_model->info_site($result_siteURL[0]->id_store);
                            $dataview['layout'] = json_decode($rs_info_site[0]->layout, true);
							$dataview['_path'] = "template/frontend-users/". $result_siteURL[0]->id_theme ."/public";
							$dataview['_path_min'] = "min/f=template/frontend-users/". $result_siteURL[0]->id_theme ."/public";
                            #Load model Menu_model đ? l?y giá tr? menu cho ra ngoài
                            $this->load->model('dashboard/Menu_model');
                            $menu_json = $this->Menu_model->get_menu($result_siteURL[0]->id_store);
                            $dataview['menu_2'] = json_decode($menu_json[0]->data_json);
                 
                        
                        // xử lý layout và box chức năng 
                        $layout = $this->Template_model->get_layout($result_siteURL[0]->id_store);
                        
                        $layout = json_decode($layout[0]->layout,true);
                        $dataview['layout'] = $layout;
                        foreach($layout['widgets'] as $location => $widgets) {
                        	if($location != 'system_widgets') {
                        			if(!isset($dataview[$location]))
                        				$dataview[$location] = '';
									foreach($widgets as $function) {
										if($function != '')
											if(method_exists(__CLASS__, $function))
	                        					$dataview[$location] .= $this->$function($location);
	                        				else 
	                        					$dataview[$location] .= "</p>Chức năng <span style='color:red'>$function</span> đang tạm khóa để nâng cấp.</p>";	
									}
		
							}
							
							$this->_trenphai = (isset($dataview['trenphai']) ? $dataview['trenphai'] : "");
							if(isset($layout['banner']))
								$this->_banner = $layout['banner'];
							else 
								$this->_banner = '';
							if(isset($layout['banner_scroll']))
								$this->_banner_scroll = $layout['banner_scroll'];
							else 
								$this->_banner_scroll = '';
						}
                        	
                        return $dataview;

                } else {
                    return FALSE;
                }
             
        
    } 
    // tất cả các chức năng, widgets,box của layout
   public function banner($location = null) {
   		if(isset($this->_banner) && $this->_banner != '') {
			$return = '
				<div><a href="'.$this->_banner['bannerLink'].'"><img class="img-responsive" width="100%" alt="banner" src="'.$this->_banner['bannerUrl'].'"/></a></div>
			';
		} else {
			$return = '
					<div><img class="img-responsive" width="100%" alt="banner" src="https://file.talaweb.com/u1003333/home/Banner/banner99.jpg"></div>
				    
				';
		}
		
			return $return;	
	}
	public function logoslide($location = null) {
		$return = '
							<div class="clearfix m_bottom_25 m_sm_bottom_20">

								<h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">Thương hiệu</h2>

								<div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">

									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>

									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>

								</div>

							</div>
							<div class="product_brands with_sidebar m_sm_bottom_35">
								<a href="#" class="d_block t_align_c animate_fade"><img src="http://sangnguyen.dev/template/frontend-users/11/public/images/brand_logo.jpg" alt=""></a>

								<a href="#" class="d_block t_align_c animate_fade"><img src="http://sangnguyen.dev/template/frontend-users/11/public/images/brand_logo.jpg" alt=""></a>
								<a href="#" class="d_block t_align_c animate_fade"><img src="http://sangnguyen.dev/template/frontend-users/11/public/images/brand_logo.jpg" alt=""></a>

								<a href="#" class="d_block t_align_c animate_fade"><img src="http://sangnguyen.dev/template/frontend-users/11/public/images/brand_logo.jpg" alt=""></a>

					
							</div>	';
		return $return;					
	}
	
	public function news($location = null) {
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Posts_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		
		
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			$cate_selected = $settings['news']['postcatelogy'];
			$number_post = $settings['news']['numberpost'];
			$posts = $this->Posts_model->get_posts_by_catelogy($this->_id_store,$cate_selected,$number_post);
			$data['settings'] = $settings['news'];
			if($posts)
				$data['posts'] = $posts;
		}
			
		else {
		
			$posts = $this->Posts_model->get_posts_by_catelogy($this->_id_store,0,0);
			if($posts)
				$data['posts'] = $posts;
		}
			
				
		$return = '';
		$return = $this->load->view('frontend/11/widgets/news',$data,true);
		return $return;
	}
	
	public function newsincatelogy_1($location = null) {
		$data = array();
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Posts_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy']))
				$cate_selected = $settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy'];
			else 
				$cate_selected = 0;	
			if(isset($settings['news_in_catelogy']['news_in_catelogy_1']['numberpost']))	
				$number_post = $settings['news_in_catelogy']['news_in_catelogy_1']['numberpost'];
			else 
				$number_post  = 3;	
			$posts = $this->Posts_model->get_posts_by_catelogy($this->_id_store,$cate_selected,$number_post);
			$data['settings'] = $settings['news_in_catelogy']['news_in_catelogy_1'];
			if($posts) {
			
				$data['posts'] = $posts;
			}
	
				
		}
		
		$return = $this->load->view('frontend/11/widgets/news_in_catelogy',$data,true);
		
		return $return;
	}
	public function newsincatelogy_2($location = null) {
		$data = array();
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Posts_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy']))
				$cate_selected = $settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy'];
			else 
				$cate_selected = 0;	
			if(isset($settings['news_in_catelogy']['news_in_catelogy_2']['numberpost']))	
				$number_post = $settings['news_in_catelogy']['news_in_catelogy_2']['numberpost'];
			else 
				$number_post  = 3;	
			$posts = $this->Posts_model->get_posts_by_catelogy($this->_id_store,$cate_selected,$number_post);
			$data['settings'] = $settings['news_in_catelogy']['news_in_catelogy_2'];
			if($posts) {
				
				$data['posts'] = $posts;
			}
				
		}
		$return = $this->load->view('frontend/11/widgets/news_in_catelogy',$data,true);
		return $return;
	}
	protected function newsincatelogy_3($location = null) {
		$data = array();
		if($location != null)
			$data['location_widget'] = $location;
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Posts_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy']))
				$cate_selected = $settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy'];
			else 
				$cate_selected = 0;	
			if(isset($settings['news_in_catelogy']['news_in_catelogy_3']['numberpost']))	
				$number_post = $settings['news_in_catelogy']['news_in_catelogy_3']['numberpost'];
			else 
				$number_post  = 3;	
			$posts = $this->Posts_model->get_posts_by_catelogy($this->_id_store,$cate_selected,$number_post);
			$data['settings'] = $settings['news_in_catelogy']['news_in_catelogy_3'];
			if($posts)
				$data['posts'] = $posts;
		}
		$return = $this->load->view('frontend/11/widgets/news_in_catelogy',$data,true);
		return $return;
	}
	protected function newsincatelogy_4($location = null) {
		$data = array();
		if($location != null)
			$data['location_widget'] = $location;
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Posts_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy']))
				$cate_selected = $settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy'];
			else 
				$cate_selected = 0;	
			if(isset($settings['news_in_catelogy']['news_in_catelogy_4']['numberpost']))	
				$number_post = $settings['news_in_catelogy']['news_in_catelogy_4']['numberpost'];
			else 
				$number_post  = 3;	
			$posts = $this->Posts_model->get_posts_by_catelogy($this->_id_store,$cate_selected,$number_post);
			$data['settings'] = $settings['news_in_catelogy']['news_in_catelogy_4'];
			if($posts)
				$data['posts'] = $posts;
		}
		$return = $this->load->view('frontend/11/widgets/news_in_catelogy',$data,true);
		return $return;
	}
	public function catelogypost($location = null) {
		$data = array();
		$data['is_home'] = $this->is_home;
		$this->load->model('Posts_model');
		$danhsach = array();
        $list_category = $this->Posts_model->select_category($this->_id_store, NULL, NULL, NULL);//select tất cả category 
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
        $data['catelogys'] = $danhsach;
        $data['id_store'] = $this->_id_store;
        $data['url_site'] = $this->_url_site;
		$return = $this->load->view('frontend/11/widgets/catelogypost',$data,true);
		return $return;
	}
	public function catelogyproduct($location = null) {
		$data = array();
		$data['is_home'] = $this->is_home;
		$this->load->model('Products_model');
		$danhsach = array();
        $list_category = $this->Products_model->select_category($this->_id_store, NULL, NULL, NULL);//select tất cả category 
        $i = 0;
        foreach($list_category as $item){
			if($item->id_parent == 0) {
				$danhsach[$i]['name'] = $item->name;
				$danhsach[$i]['link'] = $this->url->get_url_cate($item->link,$this->_id_store);
				$danhsach[$i]['id'] = $item->id_category;
				$j = 0;
				foreach($list_category as $subitem) {
					if($subitem->id_parent != 0 && $subitem->id_parent == $item->id_category ) {
		
						$danhsach[$i]['child'][$j] = array(
							'id' => $subitem->id_category,
							'name' => $subitem->name,
							'link' => $this->url->get_url_cate($subitem->link,$this->_id_store),
							'id_parent' => $subitem->id_parent
						);
						
						$u = 0;
						foreach($list_category as $subsubitem) {
							if($subsubitem->id_parent != 0 && $subsubitem->id_parent == $subitem->id_category ) {
				
								$danhsach[$i]['child'][$j]['child'][$u] = array(
									'id' => $subsubitem->id_category,
									'name' => $subsubitem->name,
									'link' => $this->url->get_url_cate($subsubitem->link,$this->_id_store),
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
        $data['catelogys'] = $danhsach;
        $data['id_store'] = $this->_id_store;
        $data['url_site'] = $this->_url_site;
		$return = $this->load->view('frontend/11/widgets/catelogyproduct',$data,true);
		return $return;
	}
	public function facebook($location = null) {
		$this->load->model('dashboard/Templates_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['facebook']['fanpage'])) {
				$return = '<figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30">';

							if(isset($settings['facebook']['titlebox']) && $settings['facebook']['titlebox'] != '') :
							 $return .=	'<figcaption class="row box_title_cate" style="margin-bottom:0px">

									<h3 class="title_h4 color_light color_light">'.$settings['facebook']['titlebox'].'</h3>

								</figcaption>';
								endif;
							if(isset($settings['facebook']['fanpage']) && $settings['facebook']['fanpage'] != '')
								$fp = $settings['facebook']['fanpage'];
							else 
								$fp = 'https://www.facebook.com/FacebookVietnam';
							if(isset($settings['facebook']['cover']) && $settings['facebook']['cover'] == 0)
								$hide_cover = 'true';
							else 
								$hide_cover = 'false';		
							if(isset($settings['facebook']['friends']) && $settings['facebook']['friends'] == 0)
								$show_facepile = 'false';
							else 
								$show_facepile = 'true';		
							 $return .='<div class="widget_contentss"><div class="fb-page" 
				 				data-href="'.$fp.'"
				  
				  				data-hide-cover="'.$hide_cover.'"
				 				data-show-facepile="'.$show_facepile.'" 
				 			 	data-show-posts="false"></div><section></div></figure>';
			} else {
				$return = '<div class="fb-page" 
					  data-href="https://www.facebook.com/FacebookVietnam"
					  data-width="380" 
					  data-hide-cover="false"
					  data-show-facepile="false" 
					  data-show-posts="false"></div>';
			}
					
		}
		if($location == 'truottrai' || $location == 'truotphai')
			$return .= '<b>Chức năng này không phù hợp với vị trí Banner trượt 2 bên, sẽ gây ra vỡ giao diện</b>'; 	
		return $return; 	
	}
	public function sliders($location = null) {
		$this->load->model('dashboard/Slideshow_model');
		$sliders = $this->Slideshow_model->select_slideshow($this->_id_store);
		$data = array();
		if($sliders)
			$data['sliders'] = json_decode($sliders[0]->data,true);
			
	
		$return = $this->load->view('frontend/11/slider',$data,TRUE);
	if($location == 'truottrai' || $location == 'truotphai')
			$return .= '<b>Chức năng này không phù hợp với vị trí Banner trượt 2 bên, sẽ gây ra vỡ giao diện</b>'; 	
		return $return;
	}
	public function html_1($location = null) {
		$this->load->model('dashboard/Templates_model');
		$data = $this->Templates_model->get_box_html($this->_id_store,"html_1");
		
		if($data) {
			$return = '<section id="html_1" class="box_html">';
				$return .= $data[0]->html_content;
			$return .= '</section>';
		} else 
			$return = 'admin note: Nội dung Box HTML 1 đang rỗng';
		if($location == 'truottrai' || $location == 'truotphai')
			$return .= '<b>Chức năng này không phù hợp với vị trí Banner trượt 2 bên, sẽ gây ra vỡ giao diện</b>'; 		
		return $return;			
	}
	public function html_2($location = null) {
		$this->load->model('dashboard/Templates_model');
		$data = $this->Templates_model->get_box_html($this->_id_store,"html_2");
		if($data) {
			$return = '<section id="html_2" class="box_html" style="padding-bottom: 20px">';
				$return .= $data[0]->html_content;
			$return .= '</section>';
		} else 
			$return = 'admin note: Nội dung Box HTML 2 đang rỗng';
		if($location == 'truottrai' || $location == 'truotphai')
			$return .= '<b>Chức năng này không phù hợp với vị trí Banner trượt 2 bên, sẽ gây ra vỡ giao diện</b>'; 		
			
		return $return;			
	}
	public function html_3($location = null) {
		$this->load->model('dashboard/Templates_model');
		$data = $this->Templates_model->get_box_html($this->_id_store,"html_3");
		if($data) {
			$return = '<section id="html_3" class="box_html" style="padding-bottom: 20px">';
				$return .= $data[0]->html_content;
			$return .= '</section>';
		} else 
			$return = 'admin note: Nội dung Box HTML 3 đang rỗng';
		if($location == 'truottrai' || $location == 'truotphai')
			$return .= '<b>Chức năng này không phù hợp với vị trí Banner trượt 2 bên, sẽ gây ra vỡ giao diện</b>'; 	
			
		return $return;			
	}
	public function footer($location = null) {
		$this->load->model('dashboard/Templates_model');
		$data = $this->Templates_model->get_box_html($this->_id_store,"footer");
		if($data) {
			$return = '<section id="html_2" class="col-sm-12" style="padding-bottom: 20px">';
				$return .= $data[0]->html_content;
			$return .= '</section>';
		} else 
			$return = 'admin note: Nội dung Box Footer  đang rỗng';
		if($location == 'truottrai' || $location == 'truotphai')
			$return .= '<b>Chức năng này không phù hợp với vị trí Banner trượt 2 bên, sẽ gây ra vỡ giao diện</b>'; 	
			
		return $return;			
	}
	
	public function saleproducts($location = null) {
		$return = "Chức năng này đang nâng cấp";
		return $return;
	}
	public function hotproducts($location = null) {
		$return = 'Chức năng này đang nâng cấp';
			
		
		
		return $return;
	}	
	public function productsincatelogy_1($location = null) {
		$data = array();
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Products_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		$number = 6;
		$cate_selected = 0;
		$orderBy = 'desc';
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['productsincatelogy']['productsincatelogy_1'])) { 
				$number = $settings['productsincatelogy']['productsincatelogy_1']['numberproduct'];
				$cate_selected = $settings['productsincatelogy']['productsincatelogy_1']['productcatelogy'];
				$orderBy = $settings['productsincatelogy']['productsincatelogy_1']['orderBy'];
			
			} 	
		} 
		$data['products'] = $this->Products_model->get_products_by_catelogy($this->_id_store,$cate_selected,$number,0,$orderBy);
		$data['settings'] = $settings['productsincatelogy']['productsincatelogy_1'];
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_sidebar',$data,true);

		if($location == 'trangchu' || $location == 'trennoidung')
			$return = "<p>Chức năng này chỉ phù hợp với nội dung bên trái hoặc phải, hãy chọn <b>Sản phẩm theo danh mục 3 hoặc 4</b> vào khu vực này.</b></p>";
		return $return;
	}
	public function productsincatelogy_2($location = null) {
		$data = array();
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Products_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		$number = 6;
		$cate_selected = 0;
		$orderBy = 'desc';
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['productsincatelogy']['productsincatelogy_2'])) { 
				$number = $settings['productsincatelogy']['productsincatelogy_2']['numberproduct'];
				$cate_selected = $settings['productsincatelogy']['productsincatelogy_2']['productcatelogy'];
				$orderBy = $settings['productsincatelogy']['productsincatelogy_2']['orderBy'];
			
			} 	
		} 
		$data['products'] = $this->Products_model->get_products_by_catelogy($this->_id_store,$cate_selected,$number,0,$orderBy);
		$data['settings'] = $settings['productsincatelogy']['productsincatelogy_2'];
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_sidebar',$data,true);
		if(isset($settings['productsincatelogy']['productsincatelogy_2']['slider']) && $settings['productsincatelogy']['productsincatelogy_2']['slider'] ==1)
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_slider',$data,true);
		return $return;
	}
	public function productsincatelogy_3($location = null) {
		$data = array();
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Products_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		$number = 6;
		$cate_selected = 0;
		$orderBy = 'desc';
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['productsincatelogy']['productsincatelogy_3'])) { 
				$number = $settings['productsincatelogy']['productsincatelogy_3']['numberproduct'];
				$cate_selected = $settings['productsincatelogy']['productsincatelogy_3']['productcatelogy'];
				$orderBy = $settings['productsincatelogy']['productsincatelogy_3']['orderBy'];
			
			} 	
		} 
		$data['products'] = $this->Products_model->get_products_by_catelogy($this->_id_store,$cate_selected,$number,0,$orderBy);
		$data['settings'] = $settings['productsincatelogy']['productsincatelogy_3'];
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_center',$data,true);
		if(isset($settings['productsincatelogy']['productsincatelogy_3']['slider']) && $settings['productsincatelogy']['productsincatelogy_3']['slider'] ==1)
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_slider',$data,true);
		
		if($location == 'trai' || $location == 'phai')
			$return = "<p>Chức năng này chỉ phù hợp với nội dung giữa, hãy chọn <b>Sản phẩm theo danh mục 1 hoặc 2</b> vào khu vực này.</b></p>";
		return $return;
	}
	public function productsincatelogy_4($location = null) {
		
		$data = array();
		$this->load->model('dashboard/Templates_model');
		$this->load->model('Products_model');
		$settings = $this->Templates_model->get_widget_setting($this->_id_store);
		$number = 6;
		$cate_selected = 0;
		$orderBy = 'desc';
		if($settings) {
			$settings = json_decode($settings[0]->settings,true);
			if(isset($settings['productsincatelogy']['productsincatelogy_4'])) { 
				$number = $settings['productsincatelogy']['productsincatelogy_4']['numberproduct'];
				$cate_selected = $settings['productsincatelogy']['productsincatelogy_4']['productcatelogy'];
				$orderBy = $settings['productsincatelogy']['productsincatelogy_3']['orderBy'];
			
			} 	
		} 
		$data['products'] = $this->Products_model->get_products_by_catelogy($this->_id_store,$cate_selected,$number,0,$orderBy);
		$data['settings'] = $settings['productsincatelogy']['productsincatelogy_4'];
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_center',$data,true);
		
		if(isset($settings['productsincatelogy']['productsincatelogy_4']['slider']) && $settings['productsincatelogy']['productsincatelogy_4']['slider'] ==1)
		$return = $this->load->view('frontend/11/widgets/productsincatelogy_slider',$data,true);
		
		if($location == 'trai' || $location == 'phai')
			$return = "<p>Chức năng này chỉ phù hợp với nội dung giữa, hãy chọn <b>Sản phẩm theo danh mục 1 hoặc 2</b> vào khu vực này.</b></p>";
		return $return;
	}
	public function ordertracking($location = null) {
		$return = "Chức năng này đang nâng cấp.";
		return $return;
	}
	public function banner_scroll_left($location=null) {
		$link = "#";
		if($this->_banner_scroll != '' && $this->_banner_scroll['left']['bannerUrl'] != '')
		{	$left = $this->_banner_scroll['left']['bannerUrl']; $link = $this->_banner_scroll['left']['bannerLink']; }
		else 
		 $left = 'http://www.jqueryscript.net/demo/Create-Sticky-Floating-Sidebar-Ads-with-jQuery-Banner-Scroll/ads.gif'; 	
		 
		$return = '<div id="banner_l" class="banner">

			<a target="_blank" href="'.$link.'"><img src="'.$left.'" /></a>
		</div>';
		
		if($location != 'truottrai')
			$return = '<p>Chức năng banner trượt trái chỉ phù hợp với vị trí Banner trượt trái</p>';
		return $return;
	}
	public function banner_scroll_right($location=null) {
		$link = "#";
		if($this->_banner_scroll != '' && $this->_banner_scroll['right']['bannerUrl'] != '')
		{ $right = $this->_banner_scroll['right']['bannerUrl'];$link = $this->_banner_scroll['right']['bannerLink']; }
		else 
		 $right = 'http://www.jqueryscript.net/demo/Create-Sticky-Floating-Sidebar-Ads-with-jQuery-Banner-Scroll/ads.gif'; 
		
		$return = '<div id="banner_r" class="banner">

			<a target="_blank" href="'.$link.'"><img src="'.$right.'" /></a>
		</div>';
		if($location != 'truotphai')
			$return = '<p>Chức năng banner trượt phải chỉ phù hợp với vị trí Banner trượt phải</p>';
		return $return;
	}
	
	
 }
    