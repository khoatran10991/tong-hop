
<!doctype html>

<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->

	
<!-- Mirrored from velikorodnov.com/html/flatastic/index_layout_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Feb 2016 03:33:03 GMT -->
<head>

		<title><?php echo $title ?></title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!--meta info-->

		<meta name="author" content="">

		<meta name="keywords" content="">

		<meta name="description" content="">

		<link rel="icon" type="image/ico" href="<?php echo $global['_path'] ?>/images/fav.ico">

		<!--stylesheet include-->

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/colorpicker.css">

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/flexslider.css">

		<link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!--<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/bootstrap.min.css">-->

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/owl.carousel.css">

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/owl.transitions.css">

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/jquery.custom-scrollbar.css">

		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $global['_path'] ?>/css/style.css">
		<!--<link rel="stylesheet" href="<?php echo $global['_path'] ?>/sidr/stylesheets/jquery.sidr.dark.css">-->
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css">

		<!--font include-->

		<link href="<?php echo $global['_path'] ?>/css/font-awesome.min.css" rel="stylesheet">

		<script src="<?php echo $global['_path'] ?>/js/modernizr.js"></script>

	</head>

	<body>
		<!--boxed layout-->

		<div class="wide_layout relative w_xs_auto">

			<!--[if (lt IE 9) | IE 9]>

				<div style="background:#fff;padding:8px 0 10px;">

				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>

			<![endif]-->

			<!--markup header type 2-->
			<?php 
				echo "<pre>";
					print_r($global['menu_2']);
				echo "</pre>"
			?>
			<header role="banner">

				<section class="container">
				<?php echo $global['trencung'] ?>	
				</section>
				<section class="h_bot_part container">

					<div class="clearfix row">

						<div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">

							<a href="index.html" class="logo m_xs_bottom_15 d_xs_inline_b">

								<img src="<?php echo $global['_path'] ?>/images/logo.png" alt="">

							</a>
							

						</div>

						<div class="col-lg-6 col-md-6 col-sm-8">

							<div class="row clearfix">

								<div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c m_xs_bottom_15">

									<dl class="l_height_medium">

										<dt class="f_size_small">Điện thoại hỗ trợ:</dt>

										<dd class="f_size_ex_large color_dark"><b>(123) 456-7890</b></dd>

									</dl>

								</div>

								<div class="col-lg-6 col-md-6 col-sm-6">

									<form class="relative type_2" role="search">

										<input type="text" placeholder="Search" name="search" class="r_corners f_size_medium full_width">

										<button class="f_right search_button tr_all_hover f_xs_none">

											<i class="fa fa-search"></i>

										</button>

									</form>

								</div>

							</div>

						</div>
						<div class="col-lg-12 col-md-12 col-sm-12">
							
						</div>

					</div>

				</section>
				<style>
					#mobile-header {
						top: 0;
					    position: fixed;
					    width: 100%;
					    background: #323A45;
					    opacity: 0.9;
					    padding: 6px 0px 3px 10px;
					    text-align: left;
					    z-index: 9999;
					    display: none;
					}
					.mobile-menu {
						display: none;
					}
					@media only screen and (max-width: 767px){
					    #mobile-header {
					        display: block;
					    }
					    #navigation {
							display: none;
						}
					}
				</style>
				
				<!--button for responsive menu-->
				<div id="mobile-header">
						    
							<button id="menu_button" class="menu_button">

								<span class="centered_db r_corners"></span>

								<span class="centered_db r_corners"></span>

								<span class="centered_db r_corners"></span>

							</button>
				</div>
				 
				
				<!--sang test menu --->
				<div class="container">

					<section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20">
						<!--main menu-->

						<nav role="navigation" class="f_left f_xs_none d_xs_none t_xs_align_l">	

							<ul class="horizontal_list main_menu clearfix">

								<li class="current relative f_xs_none m_xs_bottom_5"><a href="index.html" class="tr_delay_hover color_light tt_uppercase"><b>Trang chủ</b></a>

									<!--sub menu-->
								
									<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">

										<ul class="sub_menu">

											<li><a class="color_dark tr_delay_hover" href="index.html">Home Variant 1</a></li>

											<li><a class="color_dark tr_delay_hover" href="index_layout_2.html">Home Variant 2</a></li>

											<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">Home Variant 3</a></li>

											<li><a class="color_dark tr_delay_hover" href="index_corporate.html">Home Variant 4</a></li>

										</ul>

									</div>

								</li>
								<?php
									if(isset($global['menu_2'])) :
										foreach ($global['menu_2'] as $menu_1) :
											echo '<li class="relative f_xs_none m_xs_bottom_5">';
												echo '<a href="index.html" class="tr_delay_hover color_light tt_uppercase"><b>'.$menu_1->title.'</b></a>';
												if(isset($menu_1->children)) : ?>
												    <?php foreach($menu_1->children as $menu_2) :
												    		if(isset($menu_2->children)) : $has_menu_3 = TRUE;
												    		else : $has_menu_3 = FALSE;
												    		endif;
												     	
												     	  endforeach;	
												     ?>
												     <?php if(isset($has_menu_3) && $has_menu_3 ==FALSE) :  ?>
												     		<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
															<ul class="sub_menu">
																<?php 
															    foreach($menu_1->children as $menu_2) :
																	if(!isset($menu_2->children)): $has_menu_3 = FALSE; ?>
																			<li><a class="color_dark tr_delay_hover" href="index.html"><?php echo $menu_2->title ?></a></li>
																	<?php 		
																	else : 
																		$has_menu_3 = true;
																	endif;
																endforeach;	?>
															</ul>
															</div>
												    <?php else : ?> 
												    <?php 
												    	#biến $i dùng để set độ rộng của div
												    	$i = (isset($menu_2->children) ? count($menu_2->children) : 1);
												    	$width = $i*195;
												    ?>
												    <div style="width:<?php echo $width.'px'; ?>" class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">

														<div class="f_left m_left_10 m_xs_left_0 f_xs_none">

															<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b"><?php echo $menu_2->title ?></b>

															<ul class="sub_menu">
																<?php foreach($menu_2->children as $menu_3) : ?>
																<li><a class="color_dark tr_delay_hover" href="#"><?php echo $menuy_3->title ?></a></li>
																<?php endforeach ?>

															</ul>

														</div>
													 </div>
												    
												    <?php endif; ?>
					
												<?php	
												endif;
											echo '</li>';
										endforeach;
									endif;
								 ?>
								
							</ul>

						</nav>

						<ul class="f_right horizontal_list clearfix t_align_l t_xs_align_c site_settings d_xs_inline_b f_xs_none">

							<!--like-->

							<li class="d_sm_none d_xs_block">

								<a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-heart-o f_size_ex_large"></i><span class="count circle t_align_c">12</span></a>

							</li>

							<li class="m_left_5 d_sm_none d_xs_block">

								<a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-files-o f_size_ex_large"></i><span class="count circle t_align_c">3</span></a>

							</li>

							<!--shopping cart-->

							<li class="m_left_5 relative container3d" id="shopping_button">

								<a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">

									<span class="d_inline_middle shop_icon">

										<i class="fa fa-shopping-cart"></i>

										<span class="count tr_delay_hover type_2 circle t_align_c">3</span>

									</span>

									<b>$355</b>

								</a>

								<div class="shopping_cart top_arrow tr_all_hover r_corners">

									<div class="f_size_medium sc_header">Recently added item(s)</div>

									<ul class="products_list">

										<li>

											<div class="clearfix">

												<!--product image-->

												<img class="f_left m_right_10" src="images/shopping_c_img_1.jpg" alt="">

												<!--product description-->

												<div class="f_left product_description">

													<a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>

													<span class="f_size_medium">Product Code PS34</span>

												</div>

												<!--product price-->

												<div class="f_left f_size_medium">

													<div class="clearfix">

														1 x <b class="color_dark">$99.00</b>

													</div>

													<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>

												</div>

											</div>

										</li>

										<li>

											<div class="clearfix">

												<!--product image-->

												<img class="f_left m_right_10" src="images/shopping_c_img_2.jpg" alt="">

												<!--product description-->

												<div class="f_left product_description">

													<a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>

													<span class="f_size_medium">Product Code PS34</span>

												</div>

												<!--product price-->

												<div class="f_left f_size_medium">

													<div class="clearfix">

														1 x <b class="color_dark">$99.00</b>

													</div>

													<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>

												</div>

											</div>

										</li>

										<li>

											<div class="clearfix">

												<!--product image-->

												<img class="f_left m_right_10" src="images/shopping_c_img_3.jpg" alt="">

												<!--product description-->

												<div class="f_left product_description">

													<a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>

													<span class="f_size_medium">Product Code PS34</span>

												</div>

												<!--product price-->

												<div class="f_left f_size_medium">

													<div class="clearfix">

														1 x <b class="color_dark">$99.00</b>

													</div>

													<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>

												</div>

											</div>

										</li>

									</ul>

									<!--total price-->

									<ul class="total_price bg_light_color_1 t_align_r color_dark">

										<li class="m_bottom_10">Tax: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$0.00</span></li>

										<li class="m_bottom_10">Discount: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$37.00</span></li>

										<li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">$999.00</b></li>

									</ul>

									<div class="sc_footer t_align_c">

										<a href="#" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">View Cart</a>

										<a href="#" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>

									</div>

								</div>

							</li>

						</ul>

					</section>

				</div>
				
				<!--end sang test menu-->
				<!--main menu container-->
				
			
				<div class="container">

					<section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20">
						<!--main menu-->
					
						<nav id="navigation" role="navigation" class="f_left f_xs_none d_xs_none t_xs_align_l">	
							<div id="navigation33">
							<ul class="horizontal_list main_menu clearfix">
							<li class="relative f_xs_none m_xs_bottom_5">
	                                <a class="tr_delay_hover color_light tt_uppercase" href="<?php echo $global['url_site'];?>">
	                                	<span class="glyphicon glyphicon-home"></span><b> Trang Chủ</b>
	                                </a>
	                        </li>
							<?php $count = 0;?>
							<?php foreach($global['menu'] as $item):?>
								<?php if($item->id_parent == 0) : ?>
	                            <li class="relative f_xs_none m_xs_bottom_5">
	                                <a class="tr_delay_hover color_light tt_uppercase" href="<?php echo $item->link;?>">
	                                	<b><?php echo $item->name;?></b>
	                                </a>
	                                	<?php $count = 0; ?>
	                                	<?php foreach($global['menu'] as $subitem):?>
	                                		<?php if($subitem->id_parent == $item->id_menu) : ?>
	                                	
	                                		
	                                			<?php foreach($global['menu'] as $subsubitem):?>
	                                				<?php if($subsubitem->id_parent == $subitem->id_menu) : ?>
	                                					<?php $count++;?>
	                                				<?php endif; ?>	
                       							<?php endforeach;?>
                       							<?php if($count!=0): ?>
	                                				<?php break;?>
	                                			<?php endif; ?>
	                                		<?php endif; ?>	
                       					<?php endforeach;?>
                       					<?php if($count==0): ?>
                       					<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
											<ul class="sub_menu">
                       						<?php foreach($global['menu'] as $subitem):?>
	                                			<?php if($subitem->id_parent == $item->id_menu) : ?>
	                       						<!--sub menu-->
														<li><a class="color_dark tr_delay_hover" href="<?php echo $subitem->link;?>"><?php echo $subitem->name;?></a></li>
												<?php endif; ?>	
                       						<?php endforeach;?>
                       						</ul>
										</div>
                       					<?php else: ?>
                       					<!--sub menu-->
									<style>
										.menu_cap_3 {
											
										}
									</style>
									<?php # vòng lặp đếm có bao nhiêu subitem để set độ rộng của div menu cấp 3 
										$i = 0; foreach($global['menu'] as $subitem):?>
	                                			<?php if($subitem->id_parent == $item->id_menu) : ?>
													<?php $i = $i + 1; ?>
												<?php endif; ?>
									<?php endforeach; ?>
									<?php $width = 110*$i;  ?>		
									<div style="width:<?php echo $width.'px' ?>" class="menu_cap_3 sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">

										
										<?php foreach($global['menu'] as $subitem):?>
	                                			<?php if($subitem->id_parent == $item->id_menu) : ?>
												<?php?>
												
	                       						<!--sub menu-->
	                       						<div class="f_left m_left_10 m_xs_left_0 f_xs_none">
													<a class="color_dark tr_delay_hover" href="<?php echo $subitem->link;?>">
														<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">
															<?php echo $subitem->name;?>
														</b>
													</a>
				                       					<ul class="sub_menu">
				                       						<?php foreach($global['menu'] as $subsubitem):?>
					                                			<?php if($subsubitem->id_parent == $subitem->id_menu) : ?>
					                       						<!--sub menu-->
																	
																		<li><a class="color_dark tr_delay_hover" href="<?php echo $subsubitem->link;?>"><?php echo $subsubitem->name;?></a></li>              					
																<?php endif; ?>	
				                       						<?php endforeach;?>
				                       					</ul>
				                       			</div>
												<?php endif; ?>	
												
                       						<?php endforeach;?>
											
											
									</div>
                       								
	                                	<?php endif; ?>
                       					
	                        	</li>
	                        	<?php endif; ?>	
                       		<?php endforeach;?>
							</ul>
						</div>
						
						</nav>
						
						<ul class="f_right horizontal_list clearfix t_align_l t_xs_align_c site_settings d_xs_inline_b f_xs_none">

							<!--like-->

							<li class="d_sm_none d_xs_block">

								<a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-heart-o f_size_ex_large"></i><span class="count circle t_align_c">12</span></a>

							</li>

							<li class="m_left_5 d_sm_none d_xs_block">

								<a data-popup="#login_popup" title="Đăng nhập tài khoản" role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-user f_size_ex_large"></i></a>

							</li>

							<!--shopping cart-->

							<li class="m_left_5 relative container3d" id="shopping_button">

								<a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">

									<span class="d_inline_middle shop_icon">

										<i class="fa fa-shopping-cart"></i>

										<span class="count tr_delay_hover type_2 circle t_align_c">3</span>

									</span>

									<b>$355</b>

								</a>

								<div class="shopping_cart top_arrow tr_all_hover r_corners">

									<div class="f_size_medium sc_header">Recently added item(s)</div>

									<ul class="products_list">

										<li>

											<div class="clearfix">

												<!--product image-->

												<img class="f_left m_right_10" src="<?php echo $global['_path'] ?>/images/shopping_c_img_1.jpg" alt="">

												<!--product description-->

												<div class="f_left product_description">

													<a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>

													<span class="f_size_medium">Product Code PS34</span>

												</div>

												<!--product price-->

												<div class="f_left f_size_medium">

													<div class="clearfix">

														1 x <b class="color_dark">$99.00</b>

													</div>

													<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>

												</div>

											</div>

										</li>

										<li>

											<div class="clearfix">

												<!--product image-->

												<img class="f_left m_right_10" src="<?php echo $global['_path'] ?>/images/shopping_c_img_2.jpg" alt="">

												<!--product description-->

												<div class="f_left product_description">

													<a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>

													<span class="f_size_medium">Product Code PS34</span>

												</div>

												<!--product price-->

												<div class="f_left f_size_medium">

													<div class="clearfix">

														1 x <b class="color_dark">$99.00</b>

													</div>

													<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>

												</div>

											</div>

										</li>

										<li>

											<div class="clearfix">

												<!--product image-->

												<img class="f_left m_right_10" src="<?php echo $global['_path'] ?>/images/shopping_c_img_3.jpg" alt="">

												<!--product description-->

												<div class="f_left product_description">

													<a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>

													<span class="f_size_medium">Product Code PS34</span>

												</div>

												<!--product price-->

												<div class="f_left f_size_medium">

													<div class="clearfix">

														1 x <b class="color_dark">$99.00</b>

													</div>

													<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>

												</div>

											</div>

										</li>

									</ul>

									<!--total price-->

									<ul class="total_price bg_light_color_1 t_align_r color_dark">

										<li class="m_bottom_10">Tax: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$0.00</span></li>

										<li class="m_bottom_10">Discount: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$37.00</span></li>

										<li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">$999.00</b></li>

									</ul>

									<div class="sc_footer t_align_c">

										<a href="#" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">View Cart</a>

										<a href="#" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>

									</div>

								</div>

							</li>

						</ul>

					</section>

				</div>

			</header>
			<!--slider with banners-->

			<section class="container content">

				<div class="row clearfix">

					<!--slider-->

					<div class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">

						<div class="flexslider animate_ftr long">

							<ul class="slides">

								<li>

									<img src="<?php echo $global['_path'] ?>/images/slide_04.jpg" alt="" data-custom-thumb="<?php echo $global['_path'] ?>/images/slide_01.jpg">

									<section class="slide_caption t_align_c d_xs_none">

										<div class="f_size_large color_light tt_uppercase slider_title_3 m_bottom_10">Meet New Theme</div>

										<hr class="slider_divider d_inline_b m_bottom_10">

										<div class="color_light slider_title_4 tt_uppercase t_align_c m_bottom_45 m_md_bottom_20"><b>Attractive &amp; Elegant<br>HTML Theme</b></div>

										<div class="color_light slider_title_2 m_bottom_45 m_sm_bottom_20">$<b>15.00</b></div>

										<a href="http://themeforest.net/item/flatastic-ecommerce-html-template/7221813?ref=mad_velikorodnov" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Buy Now</a>

									</section>

								</li>

								<li>

									<img src="<?php echo $global['_path'] ?>/images/slide_05.jpg" alt="" data-custom-thumb="<?php echo $global['_path'] ?>/images/slide_03.jpg">

									<section class="slide_caption_2 t_align_c d_xs_none">

										<div class="f_size_large tt_uppercase slider_title_3 scheme_color">New arrivals</div>

										<hr class="slider_divider type_2 m_bottom_5 d_inline_b">

										<div class="color_light slider_title_4 tt_uppercase t_align_c m_bottom_65 m_sm_bottom_20"><b><span class="scheme_color">Spring/Summer 2014</span><br><span class="color_dark">Ready-To-Wear</span></b></div>

										<a href="http://themeforest.net/item/flatastic-ecommerce-html-template/7221813?ref=mad_velikorodnov" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">View Collection</a>

									</section>

								</li>

								<li>

									<img src="<?php echo $global['_path'] ?>/images/slide_06.jpg" alt="" data-custom-thumb="<?php echo $global['_path'] ?>/images/slide_02.jpg">

									<section class="slide_caption_3 t_align_c d_xs_none">

										<img src="<?php echo $global['_path'] ?>/images/slider_layer_img.png" alt="" class="m_bottom_5">

										<div class="color_light slider_title tt_uppercase t_align_c m_bottom_60 m_sm_bottom_20"><b class="color_dark">up to 70% off</b></div>

										<a href="http://themeforest.net/item/flatastic-ecommerce-html-template/7221813?ref=mad_velikorodnov" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Shop Now</a>

									</section>

								</li>

							</ul>

						</div>

					</div>

					<!--banners-->
					<?php echo $global['trenphai'] ?>
					<div class="col-lg-3 col-md-3 col-sm-3 t_xs_align_c s_banners">

						<a href="#" class="d_block d_xs_inline_b m_bottom_20 animate_ftr">

							<img src="<?php echo $global['_path'] ?>/images/banner_img_7.jpg" alt="">

						</a>

						<a href="#" class="d_block d_xs_inline_b m_xs_left_5 animate_ftr m_mxs_left_0">

							<img src="<?php echo $global['_path'] ?>/images/banner_img_8.jpg" alt="">

						</a>

					</div>

				</div>

			</section>
					<!--content-->

			<div class="page_content_offset">

				<div class="container content">

					<!--banners-->

					<section class="row clearfix">

						<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_50 m_sm_bottom_35">

							<a href="#" class="d_block banner animate_ftr wrapper r_corners relative m_xs_bottom_30">

								<img src="<?php echo $global['_path'] ?>/images/banner_img_1.png" alt="">

								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">

									<span class="d_inline_middle">

										<span class="d_block color_dark tt_uppercase m_bottom_5 let_s">New Collection!</span>

										<span class="d_block divider_type_2 centered_db m_bottom_5"></span>

										<span class="d_block color_light tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><b>Colored Fashion</b></span>

										<span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>

									</span>

								</span>

							</a>

						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_50 m_sm_bottom_35">

							<a href="#" class="d_block banner animate_ftr wrapper r_corners type_2 relative">

								<img src="<?php echo $global['_path'] ?>/images/banner_img_2.png" alt="">

								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">

									<span class="d_inline_middle">

										<span class="d_block scheme_color banner_title type_2 m_bottom_5 m_mxs_bottom_5"><b>-50%</b></span>

										<span class="d_block divider_type_2 centered_db m_bottom_5 d_sm_none"></span>

										<span class="d_block color_light tt_uppercase m_bottom_15 banner_title_3 m_md_bottom_5 d_mxs_none">On All<br><b>Sunglasses</b></span>

										<span class="button_type_6 bg_dark_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>

									</span>

								</span>

							</a>

						</div>

					</section>

					<div class="row clearfix">
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
						<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
							<?php $this->load->view('frontend/11/left-sidebar',isset($data_view)?$data_view:NULL); ?>	
						</aside>
						<?php endif; ?>
						<!--Kết thúc sidebar trái-->
						
						<!--Nội dung giữa--->
						<section class="col-lg-<?php echo $content_col ?> col-md-<?php echo $content_col ?> col-sm-<?php echo $content_col ?>">
						<div class="row clearfix">
							<?php echo $global['trennoidung'] ?>
						</div>
						
							<?php if(isset($template) && !empty($template)){$this->load->view($template,isset($data_view)?$data_view:NULL);} ?>
						<!--Kết thúc nội dung giữa-->
						
						<?php echo $global['duoinoidung'] ?>
									
						</section>
						<?php if($global['phai'] != "") : ?>
						<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
							<?php $this->load->view('frontend/11/left-sidebar',isset($data_view)?$data_view:NULL); ?>	
						</aside>
						<?php endif; ?>
			
					</div>
				</div>

			</div>
	</div>
	<!--/wide_layout-->		
			<!--markup footer-->
			<footer id="footer" class="type_2">

				<div class="footer_top_part">

					<div class="container t_align_c m_bottom_20">

						<!--social icons-->

						<ul class="clearfix d_inline_b horizontal_list social_icons">

							<li class="facebook m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Facebook</span>

								<a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">

									<i class="fa fa-facebook"></i>

								</a>

							</li>

							<li class="twitter m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Twitter</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-twitter"></i>

								</a>

							</li>

							<li class="google_plus m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Google Plus</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-google-plus"></i>

								</a>

							</li>

							<li class="rss m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Rss</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-rss"></i>

								</a>

							</li>

							<li class="pinterest m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Pinterest</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-pinterest"></i>

								</a>

							</li>

							<li class="instagram m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Instagram</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-instagram"></i>

								</a>

							</li>

							<li class="linkedin m_left_5 m_bottom_5 m_sm_left_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">LinkedIn</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-linkedin"></i>

								</a>

							</li>

							<li class="vimeo m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Vimeo</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-vimeo-square"></i>

								</a>

							</li>

							<li class="youtube m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Youtube</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-youtube-play"></i>

								</a>

							</li>

							<li class="flickr m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Flickr</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-flickr"></i>

								</a>

							</li>

							<li class="envelope m_left_5 m_bottom_5 relative">

								<span class="tooltip tr_all_hover r_corners color_dark f_size_small">Contact Us</span>

								<a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">

									<i class="fa fa-envelope-o"></i>

								</a>

							</li>

						</ul>

					</div>

					<hr class="divider_type_4 m_bottom_50">

					<div class="container">

						<div class="row clearfix">

							<div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">

								<h3 class="color_light_2 m_bottom_20">About</h3>

								<p class="m_bottom_15">Nam elit agna, endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem.</p>

								<p>Interdum vitae, dapibus ac, scelerisque.

	 							vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. </p>

							</div>

							<div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">

								<h3 class="color_light_2 m_bottom_20">The Service</h3>

								<ul class="vertical_list">

									<li><a class="color_light tr_delay_hover" href="#">My account<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Order history<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Wishlist<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Categories<i class="fa fa-angle-right"></i></a></li>

								</ul>

							</div>

							<div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">

								<h3 class="color_light_2 m_bottom_20">Information</h3>

								<ul class="vertical_list">

									<li><a class="color_light tr_delay_hover" href="#">About us<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Delivery<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Privacy policy<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Terms &amp; condition<i class="fa fa-angle-right"></i></a></li>

								</ul>

							</div>

							<div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">

								<h3 class="color_light_2 m_bottom_20">Catalog</h3>

								<ul class="vertical_list">

									<li><a class="color_light tr_delay_hover" href="#">New Collection<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Best Sellers<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Specials<i class="fa fa-angle-right"></i></a></li>

									<li><a class="color_light tr_delay_hover" href="#">Manufacturers<i class="fa fa-angle-right"></i></a></li>

								</ul>

							</div>

							<div class="col-lg-3 col-md-3 col-sm-3">

								<h3 class="color_light_2 m_bottom_20">Contact Us</h3>

								<ul class="c_info_list">

									<li class="m_bottom_10">

										<div class="clearfix m_bottom_15">

											<i class="fa fa-map-marker f_left"></i>

											<p class="contact_e">8901 Marmora Road,<br> Glasgow, D04 89GR.</p>

										</div>

									</li>

									<li class="m_bottom_10">

										<div class="clearfix m_bottom_10">

											<i class="fa fa-phone f_left"></i>

											<p class="contact_e">800-559-65-80</p>

										</div>

									</li>

									<li class="m_bottom_10">

										<div class="clearfix m_bottom_10">

											<i class="fa fa-envelope f_left"></i>

											<a class="contact_e color_light" href="mailto:#">info@companyname.com</a>

										</div>

									</li>

									<li>

										<div class="clearfix">

											<i class="fa fa-clock-o f_left"></i>

											<p class="contact_e">Monday - Friday: 08.00-20.00 <br>Saturday: 09.00-15.00<br> Sunday: closed</p>

										</div>

									</li>

								</ul>

							</div>

						</div>

					</div>

				</div>

				<!--copyright part-->

				<div class="footer_bottom_part">

					<div class="container clearfix t_mxs_align_c">

						<p class="f_left f_mxs_none m_mxs_bottom_10">&copy; 2014 <span class="color_light">JNET.VN</span>. All Rights Reserved.</p>

						<ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">

							<li><img src="<?php echo $global['_path'] ?>/images/payment_img_1.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_2.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_3.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_4.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_5.png" alt=""></li>

						</ul>

					</div>

				</div>

			</footer>
		<!--custom popup-->

		<div class="popup_wrap d_none" id="quick_view_product">

			<section class="popup r_corners shadow">

				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>

				<div class="clearfix">

					<div class="custom_scrollbar">

						<!--left popup column-->

						<div class="f_left half_column">

							<div class="relative d_inline_b m_bottom_10 qv_preview">

								<span class="hot_stripe"><img src="<?php echo $global['_path'] ?>/images/sale_product.png" alt=""></span>

								<img src="<?php echo $global['_path'] ?>/images/quick_view_img_1.jpg" class="tr_all_hover" alt="">

							</div>

							<!--carousel-->

							<div class="relative qv_carousel_wrap m_bottom_20">

								<button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_prev">

									<i class="fa fa-angle-left "></i>

								</button>

								<ul class="qv_carousel d_inline_middle">

									<li data-src="<?php echo $global['_path'] ?>/images/quick_view_img_1.jpg"><img src="<?php echo $global['_path'] ?>/images/quick_view_img_4.jpg" alt=""></li>

									<li data-src="<?php echo $global['_path'] ?>/images/quick_view_img_2.jpg"><img src="<?php echo $global['_path'] ?>/images/quick_view_img_5.jpg" alt=""></li>

									<li data-src="<?php echo $global['_path'] ?>/images/quick_view_img_3.jpg"><img src="<?php echo $global['_path'] ?>/images/quick_view_img_6.jpg" alt=""></li>

									<li data-src="<?php echo $global['_path'] ?>/images/quick_view_img_1.jpg"><img src="<?php echo $global['_path'] ?>/images/quick_view_img_4.jpg" alt=""></li>

									<li data-src="<?php echo $global['_path'] ?>/images/quick_view_img_2.jpg"><img src="<?php echo $global['_path'] ?>/images/quick_view_img_5.jpg" alt=""></li>

									<li data-src="<?php echo $global['_path'] ?>/images/quick_view_img_3.jpg"><img src="<?php echo $global['_path'] ?>/images/quick_view_img_6.jpg" alt=""></li>

								</ul>

								<button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_next">

									<i class="fa fa-angle-right "></i>

								</button>

							</div>

							<div class="d_inline_middle">Share this:</div>

							<div class="d_inline_middle m_left_5">

								<!-- AddThis Button BEGIN -->

								<div class="addthis_toolbox addthis_default_style addthis_32x32_style">

								<a class="addthis_button_preferred_1"></a>

								<a class="addthis_button_preferred_2"></a>

								<a class="addthis_button_preferred_3"></a>

								<a class="addthis_button_preferred_4"></a>

								<a class="addthis_button_compact"></a>

								<a class="addthis_counter addthis_bubble_style"></a>

								</div>

								<!-- AddThis Button END -->

							</div>

						</div>

						<!--right popup column-->

						<div class="f_right half_column">

							<!--description-->

							<h2 class="m_bottom_10"><a href="#" class="color_dark fw_medium">Eget elementum vel</a></h2>

							<div class="m_bottom_10">

								<!--rating-->

								<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">

									<li class="active">

										<i class="fa fa-star-o empty tr_all_hover"></i>

										<i class="fa fa-star active tr_all_hover"></i>

									</li>

									<li class="active">

										<i class="fa fa-star-o empty tr_all_hover"></i>

										<i class="fa fa-star active tr_all_hover"></i>

									</li>

									<li class="active">

										<i class="fa fa-star-o empty tr_all_hover"></i>

										<i class="fa fa-star active tr_all_hover"></i>

									</li>

									<li class="active">

										<i class="fa fa-star-o empty tr_all_hover"></i>

										<i class="fa fa-star active tr_all_hover"></i>

									</li>

									<li>

										<i class="fa fa-star-o empty tr_all_hover"></i>

										<i class="fa fa-star active tr_all_hover"></i>

									</li>

								</ul>

								<a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>

							</div>

							<hr class="m_bottom_10 divider_type_3">

							<table class="description_table m_bottom_10">

								<tr>

									<td>Manufacturer:</td>

									<td><a href="#" class="color_dark">Chanel</a></td>

								</tr>

								<tr>

									<td>Availability:</td>

									<td><span class="color_green">in stock</span> 20 item(s)</td>

								</tr>

								<tr>

									<td>Product Code:</td>

									<td>PS06</td>

								</tr>

							</table>

							<h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>

							<table class="description_table m_bottom_5">

								<tr>

									<td>Product Length:</td>

									<td><span class="color_dark">10.0000M</span></td>

								</tr>

								<tr>

									<td>Product Weight:</td>

									<td>10.0000KG</td>

								</tr>

							</table>

							<hr class="divider_type_3 m_bottom_10">

							<p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. </p>

							<hr class="divider_type_3 m_bottom_15">

							<div class="m_bottom_15">

								<s class="v_align_b f_size_ex_large">$152.00</s><span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">$102.00</span>

							</div>

							<table class="description_table type_2 m_bottom_15">

								<tr>

									<td class="v_align_m">Size:</td>

									<td class="v_align_m">

										<div class="custom_select f_size_medium relative d_inline_middle">

											<div class="select_title r_corners relative color_dark">s</div>

											<ul class="select_list d_none"></ul>

											<select name="product_name">

												<option value="s">s</option>

												<option value="m">m</option>

												<option value="l">l</option>

											</select>

										</div>

									</td>

								</tr>

								<tr>

									<td class="v_align_m">Quantity:</td>

									<td class="v_align_m">

										<div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">

											<button class="bg_tr d_block f_left" data-direction="down">-</button>

											<input type="text" name="" readonly value="1" class="f_left">

											<button class="bg_tr d_block f_left" data-direction="up">+</button>

										</div>

									</td>

								</tr>

							</table>

							<div class="clearfix m_bottom_15">

								<button class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover f_left f_size_large">Add to Cart</button>

								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-heart-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span></button>

								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-files-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span></button>

								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>

							</div>

						</div>

					</div>

				</div>

			</section>

		</div>
		<div id="arrow-left" style="position: fixed;top: 45%;display:none">
			<img width="90px" src="http://www.luftentfeuchter-bautrockner.ch/wp-content/uploads/2010/04/button_pfeil_rechts.png" />
			
		</div>
		<!--login popup-->

		<div class="popup_wrap d_none" id="login_popup">

			<section class="popup r_corners shadow">

				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>

				<h3 class="m_bottom_20 color_dark">Đăng nhập tài khoản</h3>

				<form>

					<ul>

						<li class="m_bottom_15">

							<label for="username" class="m_bottom_5 d_inline_b">Tên đăng nhập</label><br>

							<input type="text" name="" id="username" class="r_corners full_width">

						</li>

						<li class="m_bottom_25">

							<label for="password" class="m_bottom_5 d_inline_b">Mật khẩu</label><br>

							<input type="password" name="" id="password" class="r_corners full_width">

						</li>

						<li class="m_bottom_15">

							<input type="checkbox" class="d_none" id="checkbox_10"><label for="checkbox_10">Ghi nhớ</label>

						</li>

						<li class="clearfix m_bottom_30">

							<button class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15">Đăng nhập</button>

							<div class="f_right f_size_medium f_mxs_none">

								<a href="#" class="color_dark">Quên mật khẩu?</a><br>

								<a href="#" class="color_dark">Quên tên đăng nhập?</a>

							</div>

						</li>

					</ul>

				</form>

				<footer class="bg_light_color_1 t_mxs_align_c">

					<h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">Chưa có tài khoản?</h3>

					<a href="#" role="button" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Đăng ký</a>

				</footer>

			</section>

		</div>

		<button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>

		<!--scripts include-->

		<script src="<?php echo $global['_path'] ?>/js/jquery-2.1.0.min.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/retina.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/jquery.flexslider-min.js"></script>

	


		<script src="<?php echo $global['_path'] ?>/js/waypoints.min.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/jquery.isotope.min.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/owl.carousel.min.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/jquery.tweet.min.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/jquery.custom-scrollbar.js"></script>

		<script src="<?php echo $global['_path'] ?>/js/scripts.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="<?php echo $global['_path'] ?>/sidr/jquery.sidr.min.js"></script>
	
		<script>
		   
		     
			// test 
			$(document).on("mouseover", function(e){
			    if(e.pageX <= 80)
			    {
			        $.sidr('open', 'sidr-main');
			    }
			    else
			    {
			        if(!$(e.target).is("#sidr-main"))
			        {
			            $.sidr('close', 'sidr-main');
			           //$('#abc').html('');
			        }
			    }
			});
		</script>
	</body>
	<script type="text/javascript">		
					 $(document).ready(function() {
						$('#simple-menu').sidr({
						side: 'right'
					});
					});
					$('.menu_button').sidr({
						name: 'sidr-main',
						source: '#navigation33',
						side: 'left'

					});
					
	</script>
</html>