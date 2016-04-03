<header role="banner">

	<section class="container content" id="banner">
		<?php echo $global['trencung'] ?>
	</section>
	<?php
	if(isset($global['layout']['options']['displaylogo']) && $global['layout']['options']['displaylogo'] = 1)
	$displaylogo = 'block';
	else
	$displaylogo = 'none';
	?>
	<section class="h_bot_part container content" style="display: <?php echo $displaylogo ?>">
		<?php
		if(isset($global['layout']['options']['displaylogo']) && $global['layout']['options']['displaylogo'] = 1) : ?>
		<div class="clearfix row">

			<div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">

				<a href="<?php echo $global['url_site'] ?>" class="logo m_xs_bottom_15 d_xs_inline_b">
					<?php
					if(isset($global['logo']) && $global['logo'] != '')
					echo '<img class="logo-site" src="'.$global['logo'].'" title="Trang chủ" />';
					else
					echo '<img class="logo-site" src="'.$global['_path'].'/images/logo.png" title="Trang chủ" />'
					?>


				</a>


			</div>

			<div class="col-lg-6 col-md-6 col-sm-8">

				<div class="row clearfix">

					<div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c m_xs_bottom_15">
						<?php
						if(isset($global['phone']) && $global['phone'] != '')  : ?>
						<dl class="l_height_medium">

							<dt class="f_size_small">
								Điện thoại hỗ trợ:
							</dt>

							<dd class="f_size_ex_large color_dark">
								<b>
									<?php echo $global['phone']; ?>
								</b>
							</dd>

						</dl>
						<?php endif; ?>

					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">

						<form class="relative type_2" role="search">

							<input type="text" placeholder="Search" name="search" class="r_corners f_size_medium full_width">

							<button class="f_right search_button tr_all_hover f_xs_none">

								<i class="fa fa-search">
								</i>

							</button>

						</form>

					</div>

				</div>

			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">

			</div>

		</div>
		<?php endif; ?>
	</section>

	<style>
		#mobile-header
		{
			top: 0;
			
			width: 100%;
			background: #323A45;
			opacity: 0.9;
			padding: 6px 0px 3px 10px;
			text-align: left;
			z-index: 9999;
			display: none;
		}
		.mobile-menu
		{
			display: none;
		}
		@media only screen and (max-width: 767px)
		{
			#mobile-header
			{
				display: block;
			}
			#navigation
			{
				display: none;
			}
		}
		.sub_menu_wrap
		{

		}
	</style>

	<!--button for responsive menu-->
	<div id="mobile-header">

		<button id="menu_button" class="menu_button">

			<span class="centered_db r_corners">
			</span>

			<span class="centered_db r_corners">
			</span>

			<span class="centered_db r_corners">
			</span>

		</button>
	</div>


	<!--sang test menu --->
	<div class="container content">
		<style>
			<?php
			if(isset($global['layout']['options']['menufixed']) && $global['layout']['options']['menufixed'] = 1)
			$position = "";
			else
			$position = "position:initial";

			?>
		</style>

		<section class="menu_wrap type_2 relative clearfix t_xs_align_c m_bottom_20" style="<?php echo $position ?>">
			<!--main menu-->

			<nav role="navigation" id="navigation33" class="f_left f_xs_none d_xs_none t_xs_align_l">	

							<ul class="horizontal_list main_menu clearfix">

								<li class="relative f_xs_none m_xs_bottom_5"><a href="<?php echo $global['url_site'] ?>" class="tr_delay_hover color_light tt_uppercase"><b><i style="font-size: 25px;" class="fa fa-home"></i></b></a>

								</li>
								<?php
									if(isset($global['menu_2'])) :
										foreach ($global['menu_2'] as $menu_1) :
											echo '<li class="parentMenu relative f_xs_none m_xs_bottom_5">';
												echo '<a href="'.$menu_1->customSelect.'" class="tr_delay_hover color_light tt_uppercase"><b>'.$menu_1->title.'</b></a>';
												if(isset($menu_1->children)) : ?>
												    <?php $j = 0; foreach($menu_1->children as $menu_2) :
												    		if(isset($menu_2->children)) : 
												    			$j = $j + 1;
												    		endif;
												     	
												     	  endforeach;	
												     ?>
												     <?php if($j <= 0) :  ?>
												     		<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
															<ul class="sub_menu">
																<?php 
															    foreach($menu_1->children as $menu_2) :
																	if(!isset($menu_2->children)): $has_menu_3 = FALSE; ?>
																			<li><a class="color_dark tr_delay_hover" href="<?php echo $menu_2->customSelect ?>"><?php echo $menu_2->title ?></a></li>
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
												    	$i = (isset($menu_1->children) ? count($menu_1->children) : 1);
												    	$width = $i*170;
												    	if($i >= 5)
												    		$width = 650;
												    ?>
												    
												    <div style="min-width:<?php echo $width.'px'; ?>" class="sub_menu_wrap  d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
														<?php foreach($menu_1->children as $menu_2) : ?>
														<div class="f_left m_left_10 m_xs_left_0 f_xs_none">

															<b style="font-size: 14px;" class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b"><a href="<?php echo $menu_2->customSelect ?>"><?php echo $menu_2->title ?></a></b>

															<ul class="sub_menu">
																<?php if(isset($menu_2->children)) : foreach($menu_2->children as $menu_3) : ?>
																<li><a class="color_dark tr_delay_hover" href="<?php echo $menu_3->customSelect ?>"><?php echo $menu_3->title ?></a></li>
																<?php endforeach; endif; ?>

															</ul>

														</div>
														<?php endforeach; ?>
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
				<?php
				if(isset($global['layout']['options']['menu_login']) && $global['layout']['options']['menu_login'] == 1) : ?>
				<!--user-->

				<li class="d_sm_none d_xs_block">

					<a  href="login.html"  class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none">
						<i class="fa fa-user f_size_ex_large">
						</i>
					</a>

				</li>
				<?php endif; ?>
				<?php
				if(isset($global['layout']['options']['menu_cart']) && $global['layout']['options']['menu_cart'] == 1) : ?>
				<!--shopping cart-->

				<li class="m_left_5 relative container3d" id="shopping_button">

					<a role="button" href="#" id="shop_icon" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">

						<span class="d_inline_middle shop_icon">

							<i class="fa fa-shopping-cart">
							</i>

							<span class="count tr_delay_hover type_2 circle t_align_c">
								<?php
								if(isset($global['itemcart'])) echo $global['itemcart'];
								else echo "0"; ?>
							</span>

						</span>

					</a>

					<div class="shopping_cart top_arrow tr_all_hover r_corners">
						<div class="f_size_medium sc_header">
							Giỏ hàng của bạn
						</div>

						<ul class="products_list" id="products_list">
							<?php
							if(isset($global['cart']) && count($global['cart']) >= 1):
							foreach($global['cart'] as $item_cart) :  ?>
							<li>

								<div class="clearfix">

									<img style="width: 40px;height:40px" class="f_left m_right_10" src="<?php echo $item_cart['thumb'] ?>" alt="">

									<div class="f_left product_description">

										<a href="#" class="color_dark m_bottom_5 d_block">
											<?php echo $item_cart['name'] ?>
										</a>

									</div>
									<div class="f_left f_size_medium">

										<div class="clearfix">

											<?php echo $item_cart['qty'] ?> x
											<b class="color_dark">
												<?php echo number_format($item_cart['subtotal'],0,".",".") ?>
											</b>

										</div>

									</div>

								</div>

							</li>
							<?php endforeach; endif; ?>

						</ul>
						<div class="sc_footer t_align_c">

							<a href="gio-hang.html" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">
								Xem giỏ
							</a>

							<a href="dat-hang.html" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">
								Đặt hàng
							</a>

						</div>

					</div>

				</li>
				<?php endif; ?>

			</ul>
			<?php
			if(isset($global['layout']['options']['menu_search']) && $global['layout']['options']['menu_search'] == 1) : ?>
			<button class="f_right search_button tr_all_hover f_xs_none d_xs_none">
				<i class="fa fa-search">
				</i>
			</button>
			<!--search form-->
			<div class="searchform_wrap tf_xs_none tr_all_hover">
				<div class="container vc_child h_inherit relative">
					<form role="search" class="d_inline_middle full_width">
						<input style="border: 1px solid #ccc;" type="text" name="search" placeholder="Nhập từ khóa cần tìm kiếm..." class="f_size_large">
					</form>
					<button class="close_search_form tr_all_hover d_xs_none color_dark">
						<i style="padding-right: 40px;" class="fa fa-times">
						</i>
					</button>
				</div>
			</div>
			<?php endif; ?>
		</section>

	</div>

	<!--end sang test menu-->

</header>
