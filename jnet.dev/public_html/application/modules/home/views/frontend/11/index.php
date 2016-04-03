<!doctype html>

<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
		<base href="<?php if(isset($global['url_site'])) echo $global['url_site']; else echo base_url(); ?>" />
	
		<title><?php echo $title ?></title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!--meta info-->
		<meta name="description" content="<?php echo ((isset($description) && !empty($description))?$description:'') ?>">
	
		<!-- social -->
		<meta property="og:locale" content="vi_VN" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php echo ((isset($image) && !empty($image))?$image:'')?>" />
		<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
		<meta property="og:title" content="<?php echo $title ?>" />
		<meta property="og:description"   content="<?php echo ((isset($description) && !empty($description))?$description:'') ?>" />
		<?php if(isset($global['social']['facebook'])) :  ?>
		<meta property="article:publisher" content="<?php echo $global['social']['facebook']; ?>" />
		<meta property="article:author" content="<?php echo $global['social']['facebook']; ?>" />
		<?php endif; ?>	
		<?php if(isset($global['verification_google']['txt_google_verification_content']) && $global['verification_google']['txt_google_verification_content'] != "") :
		echo $global['verification_google']['txt_google_verification_content'];
	 	endif; 
	 	?>
		<meta name="keywords" content="<?php echo ((isset($keywords) && !empty($keywords))?$keywords:'')?>">

		<?php if(isset($global['favicon']) && $global['favicon'] != '')  : ?>
		<link rel="icon" type="image/ico" href="<?php echo $global['favicon'] ?>">
		<?php else : ?>
		<link rel="icon" type="image/ico" href="<?php echo $global['_path'] ?>/images/favicon.png">
		<?php endif; ?>
		<!--stylesheet include-->

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path_min'] ?>/css/flexslider.css">

		<link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path_min'] ?>/css/owl.carousel.css">

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path_min'] ?>/css/owl.transitions.css">

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path_min'] ?>/css/jquery.custom-scrollbar.css">

		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path_min'] ?>/css/style.css">
		<!--<link rel="stylesheet" href="<?php echo $global['_path_min'] ?>/sidr/stylesheets/jquery.sidr.dark.css">-->
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css">

		<!--font include-->

		<link href="<?php echo $global['_path_min'] ?>/css/font-awesome.min.css" rel="stylesheet">

		<script src="<?php echo $global['_path_min'] ?>/js/modernizr.js"></script>
		
		
	</head>
	<style>
	<?php 
		if(isset($global['layout']['colorsetting']['menu']['color']['background']) && $global['layout']['colorsetting']['menu']['color']['background'] != '') {
			echo '.menu_wrap{background:'.$global['layout']['colorsetting']['menu']['color']['background'].'}';
			
		}
		if(isset($global['layout']['colorsetting']['menu']['color']['hover']) && $global['layout']['colorsetting']['menu']['color']['hover'] != '') {
			echo '.count,.bg_scheme_color,.button_type_3:hover .count.type_2,

			.button_type_3.active .count.type_2,.md_no-touch .main_menu > li:hover > a,.main_menu > li.current > a,

			.main_menu > .current_click > a,

			.main_menu > li.touch_open_sub > a,

			.tp-bullets.simplebullets.round .bullet:hover,

			.tp-bullets.simplebullets.round .bullet.selected,

			.tp-bullets.simplebullets.navbar .bullet:hover,

			.tp-bullets.simplebullets.navbar .bullet.selected,

			[class*="button_type_"].bg_dark_color:hover,.banner:hover [class*="button_type_"].bg_dark_color,

			[class*="button_type_"].bg_cs_hover:hover,#go_to_top:hover,.sw_button.googlemap,#menu_button,

			.ui-slider:after,.vertical_list_type_2 li:before,.camera_wrap .camera_pag .camera_pag_ul .cameracurrent,

			.camera_wrap .camera_prev:hover, .camera_wrap .camera_next:hover,.flex-control-nav .flex-active,

			.flex-direction-nav a:hover,.vertical_list_type_4 li:before,.vertical_list_type_8 li:before,

			.first_letter_2 > .fl,.info_block_type_2:hover [class*="icon_wrap"],#shopping_button:hover > a .count{background:'.$global['layout']['colorsetting']['menu']['color']['hover'].'}';
			echo '[class*="button_type_"].bg_scheme_color, [class*="button_type_"].bg_dark_color:hover{box-shadow: none;}';
			echo '::-webkit-scrollbar-thumb{background: '.$global['layout']['colorsetting']['menu']['color']['hover'].'}';
			echo '.shopping_cart, [role="banner"], .sub_menu_wrap, .banner_type_2.red, .vertical_list_type_3 li:before, .vertical_list_type_7 li:before{border-color:'.$global['layout']['colorsetting']['menu']['color']['hover'].'}';	
		}
		 if(isset($global['layout']['colorsetting']['menu']['radius']['top']) && isset($global['layout']['colorsetting']['menu']['radius']['bottom'])) {
		 	$radius_top = $global['layout']['colorsetting']['menu']['radius']['top'];
		 	$radius_bottom = $global['layout']['colorsetting']['menu']['radius']['bottom'];
		 	echo '.menu_wrap.type_2:not(.sticky){webkit-border-radius: '.$radius_top.'px '.$radius_top.'px '.$radius_bottom.'px '.$radius_bottom.'px;-moz-border-radius: '.$radius_top.'px '.$radius_top.'px '.$radius_bottom.'px '.$radius_bottom.'px;border-radius: '.$radius_top.'px '.$radius_top.'px '.$radius_bottom.'px '.$radius_bottom.'px;}';
		 	echo '.menu_wrap.type_2:not(.sticky) .main_menu > li:first-child > a{border-radius:'.$radius_top.'px 0 0 '.$radius_bottom.'px }';
		 } 
		 if(isset($global['layout']['colorsetting']['boxtitle']['background']['type']) && $global['layout']['colorsetting']['boxtitle']['background']['type'] == 'color' && isset($global['layout']['colorsetting']['boxtitle']['background']['color'])) {
		 	
		 	echo '.box_title_cate{background:'.$global['layout']['colorsetting']['boxtitle']['background']['color'].'}';
		 	
		 }
		 if(isset($global['layout']['colorsetting']['boxtitle']['title']['type']) && $global['layout']['colorsetting']['boxtitle']['title']['type'] == 'color' && isset($global['layout']['colorsetting']['boxtitle']['title']['color'])) {
		 	
		 	echo '.box_title_cate{color:'.$global['layout']['colorsetting']['boxtitle']['title']['color'].'}';
		 	
		 } 
		 if(isset($global['layout']['colorsetting']['boxtitle']['radius']['size']) && $global['layout']['colorsetting']['boxtitle']['radius']['size'] != 0) {
		 	$radius_box = $global['layout']['colorsetting']['boxtitle']['radius']['size']."px";
		 	echo '.box_title_cate{border-radius:'.$radius_box.' '.$radius_box.' 0 0}';
		 	
		 }		
		
		if(isset($global['layout']['customCSS']['code']) && $global['layout']['customCSS']['code'] != '')
			echo $global['layout']['customCSS']['code'];
		if(isset($global['layout']['colorsetting']['backgroundcontent']['type']) && $global['layout']['colorsetting']['backgroundcontent']['type'] !='default' && isset($global['layout']['colorsetting']['backgroundcontent']['color']))   {
			echo '.content_center{background: '.$global['layout']['colorsetting']['backgroundcontent']['color'].'}';
		}	
		
	?>
	.flexslider .slides img {
		height: 300px;
	}
	</style>
	<body>
		<!--boxed layout-->
		<?php 
			if(isset($global['layout']['colorsetting']['background']['type']) && $global['layout']['colorsetting']['background']['type'] != 'default') {
				if($global['layout']['colorsetting']['background']['type'] == 'color' && isset($global['layout']['colorsetting']['background']['color'])) {
					$style = 'style="background:'.$global['layout']['colorsetting']['background']['color'].'"';
				} else if($global['layout']['colorsetting']['background']['type'] == 'image' && isset($global['layout']['colorsetting']['background']['image'])) {
					$style = 'style="background:url('.$global['layout']['colorsetting']['background']['image'].') repeat;background-attachment: fixed"';
				}
			} else 
				$style = '';
		?>	
		<div class="wide_layout relative w_xs_auto" <?php echo $style ?>>
		

			<!--[if (lt IE 9) | IE 9]>

				<div style="background:#fff;padding:8px 0 10px;">

				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>

			<![endif]-->
			
			<!--markup header type 2-->
		   
			<?php $this->load->view('frontend/11/header1',isset($data_view)?$data_view:NULL); ?>	

		
			<!--tren - only homepage-->
						<?php if($global['is_home']==TRUE) : ?>
						<section class="container content">
							<div class="clearfix" >
								<?php if(isset($global['trenphai']) && $global['trenphai'] == '') {
										echo '<div class="col-lg-12 col-md-12 col-sm-12 m_bottom_5">
												'.$global['trentrai'].'
										  	 </div>';
									   } else {
									   	 echo '<div class="col-lg-9 col-md-9 col-sm-9 m_bottom_5">
												'.$global['trentrai'].'
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3 t_xs_align_c s_banners ">
													'.$global['trenphai'].'
												</div>';	
									   }
									  	
								?>
								
							</div>
						</section>
						<?php endif; ?>
						<!--content-->
			<div class="page_content_offset_sang">
			
				<div class="container content">
							
					<div class="clearfix">
						
					
						<!--Sidebar trái-->
						<?php 
							if($global['trai'] == "" && $global['phai'] == "" ) 
								$content_col = 12;
							else if($global['trai'] != "" && $global['phai'] != "")	 
								$content_col = 6;
							else 
								$content_col = 9; 
						?>
						<?php if($global['trai'] != "") : ?>
						<aside id="sidebar-l" class="sidebar-l col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
							<?php $this->load->view('frontend/11/left-sidebar',isset($data_view)?$data_view:NULL); ?>	
						</aside>
						<?php endif; ?>
						<!--Kết thúc sidebar trái-->
						
						<!--Nội dung giữa--->
						<section class="content_center shadow col-lg-<?php echo $content_col ?> col-md-<?php echo $content_col ?> col-sm-<?php echo $content_col ?>">
						<div class="clearfix">
							<?php echo $global['trennoidung'] ?>
						</div>
						
							<?php if(isset($template) && !empty($template)){$this->load->view($template,isset($data_view)?$data_view:NULL);} ?>
						<!--Kết thúc nội dung giữa-->
						
						<?php echo $global['duoinoidung'] ?>
									
						</section>
						<?php if($global['phai'] != "") : ?>
						<aside id="sidebar-r" class="sidebar-r col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
							<?php $this->load->view('frontend/11/right-sidebar',isset($data_view)?$data_view:NULL); ?>	
						</aside>
						<?php endif; ?>
			
					</div>
				</div>

			</div>
	</div>
	<!--/wide_layout-->		
			<!--markup footer-->
			<?php echo $global['truottrai'] ?>
			<?php echo $global['truotphai'] ?>
			<?php $this->load->view('frontend/11/footer',isset($data_view)?$data_view:NULL); ?>
			
	</body>
	
	
	
</html>