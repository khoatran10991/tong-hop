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
    }
    public function index() {
    	  # l?y domain ho?c subdomain, sau do load du lieu tu database de cau hinh website
        $pageURL = '';
        $pageURL .= $_SERVER["SERVER_NAME"];
        #C?t http https và : / trong base_ur()
        $baseURL = str_replace(array("https", "http", ":", "/"), "", base_url());
                $this->load->model('Home_model');
                $this->load->model('Template_model');
                $result_siteURL = $this->Home_model->siteURL($pageURL);
                if ($result_siteURL[0]) {
                	$this->_id_store = $result_siteURL[0]->id_store;
                	$this->_id_theme = $result_siteURL[0]->id_theme;
                	
                    # N?u t?m th?y site th? hi?n th? site đó
                        #L?y d? li?u cho ra view
                        $dataview = array(
                            'id_store' => $result_siteURL[0]->id_store,
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
                        $homepage = array("/index.php","/index.html","/");
    
						$currentpage = $_SERVER['REQUEST_URI'];	
						if(in_array($currentpage,$homepage))
							$dataview['is_home'] = TRUE;
						else 
							$dataview['is_home'] = FALSE;		
						
						                        
                        //Tùy vào đ?a ch? trang web là sub hay pre đ? g?n url_site
                        if ($result_siteURL[0]->url_pre != "") {
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
	                        			$dataview[$location] .= $this->$function();
									}
		
							}
							$this->_trenphai = (isset($dataview['trenphai']) ? $dataview['trenphai'] : "");
							if(isset($layout['banner']))
								$this->_banner = $layout['banner'];
							else 
								$this->_banner = '';	
					
						}
                        
                        return $dataview;

                } else {
                    return FALSE;
                }
             
        
    } 
    // tất cả các chức năng, widgets,box của layout
   public function banner() {
   		if(isset($this->_banner) && $this->_banner != '') {
			$return = '
				<div><a href="'.$this->_banner['bannerLink'].'"><img class="img-responsive" width="100%" alt="banner" src="'.$this->_banner['bannerUrl'].'"/></a></div>
			';
		} else {
			$return = '
					<div><img class="img-responsive" width="100%" alt="banner" src="http://xspace.talaweb.com/truongdinhnam/home/banner%20FPT/lapmangfpt%2024h.GIF"></div>
				    
				';
		}
		
			return $return;	
	}
	public function logoslide() {
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
	
	public function news() {
		$return = '
		<section>
		<div class="clearfix m_bottom_45 m_sm_bottom_35">
						<div class="col-lg-8 col-md-8 col-sm-12 m_sm_bottom_35 blog_animate animate_ftr">
							<div class="clearfix m_bottom_25 m_sm_bottom_20">
								<h2 class="tt_uppercase color_dark f_left">Tin tức mới nhất</h2>
								<div class="f_right clearfix nav_buttons_wrap">
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners blog_prev"><i class="fa fa-angle-left"></i></button>
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners blog_next"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
							<!--blog carousel-->
							<div class="blog_carousel">
								<!--item-->
								<div class="clearfix">
									<!--image-->
									<a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
										<img class="tr_all_long_hover" src="http://congnghe123.com/files/tin/38_200/jpg/3-giai-phap-cong-nghe-hay-giup-quan-ly-con-cai.jpg" alt="">
									</a>
									<!--post content-->
									<div class="mini_post_content">
										<h4 class="m_bottom_5 animate_ftr"><a href="#" class="color_dark"><b>
3 Giải pháp công nghệ hay giúp quản lý con cái</b></a></h4>
										<p class="f_size_medium m_bottom_10 animate_ftr">29 tháng 1, 2016</p>
										<p class="m_bottom_10 animate_ftr">
											Con cái là tài sản vô giá của mỗi gia đình, việc nuôi con thì dễ nhưng quản lý và giáo dục sao cho chúng nên người là một vấn đề vô cùng khó khăn...
										</p>
										
									</div>
								</div>
								<!--item-->
								<div class="clearfix">
									<!--image-->
									<a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
										<img class="tr_all_long_hover" src="http://congnghe123.com/files/tin/38_200/jpg/3-giai-phap-cong-nghe-hay-giup-quan-ly-con-cai.jpg" alt="">
									</a>
									<!--post content-->
									<div class="mini_post_content">
										<h4 class="m_bottom_5 animate_ftr"><a href="#" class="color_dark"><b>
3 Giải pháp công nghệ hay giúp quản lý con cái</b></a></h4>
										<p class="f_size_medium m_bottom_10 animate_ftr">29 tháng 1, 2016</p>
										<p class="m_bottom_10 animate_ftr">
											Con cái là tài sản vô giá của mỗi gia đình, việc nuôi con thì dễ nhưng quản lý và giáo dục sao cho chúng nên người là một vấn đề vô cùng khó khăn...
										</p>
										
									</div>
								</div>
							</div>
							
						
						</div>
							<!--testimonials-->
						  <div class="col-lg-4 col-md-4 col-sm-12 ti_animate animate_ftr">
							<!--testimonials -->
							<div class="testiomials_carousel">
								<ul>
									<li><i class="fa fa-ellipsis-v"></i> <a class="color_dark" href="#">Giải pháp quản lý nhân viên Lễ tân nhà nghỉ</a></li>
									<li><i class="fa fa-ellipsis-v"></i> <a class="color_dark" href="#">Giải pháp khi nhanh hết PIN</a></li>
									<li><i class="fa fa-ellipsis-v"></i> <a class="color_dark" href="#">Lời khuyên của Jim Rohn</a></li>
									<li><i class="fa fa-ellipsis-v"></i> <a class="color_dark" href="#">Mẹo sử dụng pin cho điện thoại, laptop và các thiết bị điện tử</a></li>
									<li><i class="fa fa-ellipsis-v"></i> <a class="color_dark" href="#">Cách tránh bị quay camera khi vào nhà nghỉ</a></li>
									<li><i class="fa fa-ellipsis-v"></i> <a class="color_dark" href="#">Dịch vụ cài đặt tên miền camera quan sát</a></li>
									
								</ul>
								
							  </div>
						   </div>
						   <!--/testimonials carousel-->
						
					</div></section>	';
		return $return;
	}
	public function newsincatelogy() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function sliders() {
		$this->load->model('dashboard/Slideshow_model');
		$sliders = $this->Slideshow_model->select_slideshow($this->_id_store);
		$data = array();
		if($sliders)
			$data['sliders'] = json_decode($sliders[0]->data,true);
			
	
		$return = $this->load->view('frontend/11/slider',$data,TRUE);
	
		return $return;
	}
	public function html_1() {
		$return = '
					
					<a href="#" class="">

						<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/banner_img_7.jpg" alt="">

					</a>
					
					<a href="#" class="">

						<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/banner_img_8.jpg" alt="">

					</a>';
		return $return;			
	}
	public function sliders_ok() {
		if($this->_trenphai == '') 
			$col_l = 'col-lg-12 col-md-12 col-sm-12';
		else 
			$col_l = 'col-lg-9 col-md-9 col-sm-9';	
		$return = '
			<section class="container2">

				<div class="row clearfix">

					<!--slider-->

					<div class="'.$col_l.' m_xs_bottom_30">

						<div class="flexslider animate_ftr long">

							<ul class="slides">

								<li>

									<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/slide_04.jpg" alt="" data-custom-thumb="http://sangnguyen.dev/template/frontend-users/11/public/images/slide_04.jpg">

									<section class="slide_caption t_align_c d_xs_none">

										<div class="f_size_large color_light tt_uppercase slider_title_3 m_bottom_10">Meet New Theme</div>

										<hr class="slider_divider d_inline_b m_bottom_10">

										<div class="color_light slider_title_4 tt_uppercase t_align_c m_bottom_45 m_md_bottom_20"><b>Attractive &amp; Elegant<br>HTML Theme</b></div>

										<div class="color_light slider_title_2 m_bottom_45 m_sm_bottom_20">$<b>15.00</b></div>

										<a href="http://themeforest.net/item/flatastic-ecommerce-html-template/7221813?ref=mad_velikorodnov" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Buy Now</a>

									</section>

								</li>

								<li>

									<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/slide_05.jpg" alt="" data-custom-thumb="http://sangnguyen.dev/template/frontend-users/11/public/images/slide_03.jpg">

									<section class="slide_caption_2 t_align_c d_xs_none">

										<div class="f_size_large tt_uppercase slider_title_3 scheme_color">New arrivals</div>

										<hr class="slider_divider type_2 m_bottom_5 d_inline_b">

										<div class="color_light slider_title_4 tt_uppercase t_align_c m_bottom_65 m_sm_bottom_20"><b><span class="scheme_color">Spring/Summer 2014</span><br><span class="color_dark">Ready-To-Wear</span></b></div>

										<a href="http://themeforest.net/item/flatastic-ecommerce-html-template/7221813?ref=mad_velikorodnov" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">View Collection</a>

									</section>

								</li>

								<li>

									<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/slide_06.jpg" alt="" data-custom-thumb="http://sangnguyen.dev/template/frontend-users/11/public/images/slide_06.jpg">

									<section class="slide_caption_3 t_align_c d_xs_none">

										<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/slider_layer_img.png" alt="" class="m_bottom_5">

										<div class="color_light slider_title tt_uppercase t_align_c m_bottom_60 m_sm_bottom_20"><b class="color_dark">up to 70% off</b></div>

										<a href="http://themeforest.net/item/flatastic-ecommerce-html-template/7221813?ref=mad_velikorodnov" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Shop Now</a>

									</section>

								</li>

							</ul>

						</div>

					</div>

					

				</div>

			</section>
		';
		return $return;
	}
	public function productsnew() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function catelogyproduct() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function randomproduct() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}public function saleproducts() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function hotproducts() {
		$return = '';
		//return $this->load->view('frontend/' . $this->_id_theme . '/content-product');
		$return .= '<div class="widget">
								<div class="title tt_uppercase">

									<h3 class="color_light">Sản phẩm nổi bật</h3>

								</div>

							<!--products-->

							<section class="products_container a_type_2 category_grid clearfix m_bottom_25">';
			for($i = 1;$i<=3;$i++) {
				$return .= '<div class="product_item hit w_xs_full">

									<figure class="r_corners photoframe animate_ftb type_2 t_align_c tr_all_hover shadow relative">

										<!--product preview-->

										<a href="#" class="d_block relative pp_wrap m_bottom_15">

											<!--hot product-->

											<span class="hot_stripe"><img src="http://sangnguyen.dev/template/frontend-users/11/public/images/hot_product.png" alt=""></span>

											<img src="http://sangnguyen.dev/template/frontend-users/11/public/images/product_img_1.jpg" class="tr_all_hover" alt="">

											<span role="button" data-popup="#quick_view_product" class="button_type_5 box_s_none color_light r_corners tr_all_hover d_xs_none">Quick View</span>

										</a>

										<!--description and price of product-->

										<figcaption>

											<h5 class="m_bottom_10"><a href="#" class="color_dark">Eget elementum vel</a></h5>

											<!--rating-->

											<ul class="horizontal_list d_inline_b m_bottom_10 clearfix rating_list type_2 tr_all_hover">

												<li class="active">

													<i class="fa fa-star-o empty tr_all_hover"></i>

													<i class="fa fa-star active tr_all_hover"></i>

												</li>
											</ul>

											<p class="scheme_color f_size_large m_bottom_15">370.000 đ</p>	

											<button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Đặt mua</button>
										</figcaption>

									</figure>

	</div>';
			}					
						
		$return .= '</section></div>';					
		
		
		return $return;
	}	
	public function productsincatelogy_1() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function productsincatelogy_2() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function productsincatelogy_3() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	public function vote() {
		$return = "";
		return $return;
	}
	public function ordertracking() {
		$return = "<b>".$this->_id_store."</b>";
		return $return;
	}
	
	
 }
    