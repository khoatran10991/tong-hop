<footer id="footer" class="type_2">

				<div class="footer_top_part">

					<div class="container">

						<div class="row clearfix">

							<?php if(isset($global['cuoitrang']) && $global['cuoitrang'] !='') echo $global['cuoitrang'] ?>

						</div>

					</div>

				</div>
				<?php if(isset($global['layout']['options']['footer_payment']) && $global['layout']['options']['footer_payment'] = 1) : ?>
				<!--copyright part-->
				
				<div class="footer_bottom_part">

					<div class="container clearfix t_mxs_align_c">

						<p class="f_left f_mxs_none m_mxs_bottom_10">&copy; <?php echo date('Y',time()) ?> <span style="text-transform: uppercase" class="color_light"><a style="color: white;" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>"><?php echo $_SERVER['HTTP_HOST'] ?></a></span>. All Rights Reserved.</p>

						<ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">

							<li><img src="<?php echo $global['_path'] ?>/images/payment_img_1.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_2.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_3.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_4.png" alt=""></li>

							<li class="m_left_5"><img src="<?php echo $global['_path'] ?>/images/payment_img_5.png" alt=""></li>

						</ul>

					</div>

				</div>
				<?php endif; ?>

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
		<!--cart popup-->
		<div class="popup_wrap d_none" id="cart_popup">

			<section class="popup popup_cart r_corners shadow">

				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i style="font-size: 25px;" class="fa fa-times"></i></button>

				<h3 class="m_bottom_20 color_dark">Đã thêm vào giỏ hàng</h3>

				<div class="col-sm-12">
				   
					<a href="gio-hang.html" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large ">Xem giỏ</a>
					
				</div>

			</section>

		</div>
		<div class="popup_wrap d_none" id="cart_popup_mobile">

			<section class="popup popup_cart_mobile r_corners shadow">

				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i style="font-size: 25px;" class="fa fa-times"></i></button>

				<h3 class="m_bottom_20 color_dark">Đã thêm vào giỏ hàng</h3>

				<div class="col-sm-12">
				   
					<a href="gio-hang.html" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large ">Xem giỏ</a>
					
				</div>

			</section>

		</div>
		<button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>

		<!--scripts include-->

		<script src="<?php echo $global['_path_min'] ?>/js/jquery-2.1.0.min.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/retina.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/jquery.flexslider-min.js"></script>
		
	
		<script src="<?php echo $global['_path_min'] ?>/js/elevatezoom.min.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/waypoints.min.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/jquery.isotope.min.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/owl.carousel.min.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/jquery.custom-scrollbar.js"></script>

		<script src="<?php echo $global['_path_min'] ?>/js/scripts.js"></script>
		
		<script src="<?php echo $global['_path_min'] ?>/sidr/jquery.sidr.min.js"></script>
		
		<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
	
	   
	
		<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'vi'}</script>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '971887739547167',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/vi_VN/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
		<script>
			$('body').click(function(e) {
			    
			        $(".popup_wrap").css({"display":"none"});
			    
			});
								var widthScreen = $( window ).width();
								if(widthScreen <600) {
									$('#sidebar-l').removeClass('sidebar-l').addClass('sidebar-r');
								}
									
								
								
								//
								var fixmeTop = $('#hotproducts').offset().top;
								var bottom = $('#footer').offset().top;
								var content = $('.content_center').height();
								var width = $('#hotproducts').width();
								$(window).scroll(function() {
								    var currentScroll = $(window).scrollTop();
								    
								    
								    
								    if (currentScroll >= fixmeTop && currentScroll <= content) {
								    
								        $('#hotproducts').css({
								            position: 'fixed',
								            top: '0',
								            width:width
								           
								        });
								
								    } else {
										$('#hotproducts').css({
								            position: 'static',
								        });
									}
									if($('#hotproducts').offset().top + $('#hotproducts').height() >= $('#footer').offset().top - 10)
       								 $('#hotproducts').css('position', 'absolute');
									
								});
								
							</script>
		<?php if(isset($global['layout']['options']['menu_left']) && $global['layout']['options']['menu_left'] = 1) : ?>
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
		<?php endif; ?>
		<script type="text/javascript">
		
				
			</script>
		<?php 
			if(isset($global['truottrai']) && $global['truottrai'] != '' || isset($global['truotphai']) && $global['truotphai'] !='') { ?>
				<style>
					#banner_l { left: 5px; }
					#banner_r { right: 5px; }
					.zindex { z-index: -999; }
					.banner {
					position: absolute;
					width: 120px;
					height: 300px;
					top: 20px;
					}
					@media (min-width: 1200px) {
						.container {
						    width: 1070px !important;
						}
					}

						
				</style>
				<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
				<script type="text/javascript">		
					 $(document).ready(function() {
					 	
					 		var $banner = $('.banner'), $window = $(window);
							  var $topDefault = parseFloat( $banner.css('top'), 10 );
							  $window.on('scroll', function() {
							    var $top = $(this).scrollTop();
							    $banner.stop().animate( { top: $top + $topDefault }, 1000, 'easeOutCirc' );
							  });

							  var $wiBanner = $banner.outerWidth() * 2;
							  function zindex(maxWidth){
							    if( $window.width() <= maxWidth + $wiBanner ) {
							      $banner.addClass('zindex');
							    } else {
							      $banner.removeClass('zindex');
							    }
							  }
					 });	
				
				</script>
				
			<?php } ?>	
			
		<script type="text/javascript">		
					 $(document).ready(function() {

						$(".categories_list li a:not(.subitem_a)").hover(function() {
							
							
							if($(this).parent().children('ul').length){
								//$(this).parent().children('ul').css({"display":"block"});
								
								var sang = $(this).parent().attr('id');
								//alert(sang);
								
								$('.subitem').css({"display":"none"});
								
								$(".categories_list li").removeClass('active');
								
								$('#'+sang).addClass('active');
								$('#subitem-'+sang).css({"display":"block"});
								//e.preventDefault();
								
								
							}
							
							
							
						});
						

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
