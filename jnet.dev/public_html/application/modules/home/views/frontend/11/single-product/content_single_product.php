<section class="breadcrumbs">
									<div class="container">

										<ul class="horizontal_list clearfix bc_list f_size_medium">

											<li class="m_right_10 "><a href="<?php echo $url_site ?>" class="default_t_color"><i class="fa fa-home"></i> Trang chủ<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<li class="m_right_10 "><a href="<?php echo $url_site ?><?php if(isset($product->catelogys[0]->url)) echo $this->url->get_url_cate($product->catelogys[0]->url,$id_store) ?>" class="default_t_color"><?php if(isset($product->catelogys[0]->name)) echo $product->catelogys[0]->name ?><i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<?php 
												if(isset($product->catelogys[1])) {
													if($product->catelogys[1]->id_parent == $product->catelogys[0]->idcatelogy) : ?>
													<li class="m_right_10 "><a href="<?php echo $url_site ?><?php if(isset($product->catelogys[1]->url)) echo $this->url->get_url_cate($product->catelogys[1]->url,$id_store) ?>" class="default_t_color"><?php if(isset($product->catelogys[1]->name)) echo $product->catelogys[1]->name ?><i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>	
														
														
													<?php endif;
												}
												if(isset($product->catelogys[2])) {
													if($product->catelogys[2]->id_parent == $product->catelogys[1]->idcatelogy) : ?>
													<li class="m_right_10 "><a href="<?php echo $url_site ?><?php if(isset($product->catelogys[2]->url)) echo $this->url->get_url_cate($product->catelogys[2]->url,$id_store) ?>" class="default_t_color"><?php if(isset($product->catelogys[2]->name)) echo $product->catelogys[2]->name ?><i class=" d_inline_middle m_left_10"></i></a></li>	
														
														
													<?php endif;
												}
											
											?>
											
										</ul>

									</div>
</section>
<div class="row clearfix">
						
						<?php 
							$option = json_decode($product->product_options,true);
						
							#xư lý ảnh Thumbnail
							$this->load->library('getthumb');
							$thumb = $this->getthumb->image($product->_thumnail,"300x300");
							$thumb90 = $this->getthumb->image($product->_thumnail,"90x90");
						?>

						<section class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">

							<div class="clearfix m_bottom_5 t_xs_align_c">

								<div class="col-md-5 col-sm-5 col-xs-12 photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">

								<span class="hot_stripe"><img src="<?php echo $global['_path'] ?>/images/sale_product.png" alt=""></span>

								<div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">

									<img id="zoom_image" src="<?php echo $thumb ?>" data-zoom-image="<?php echo $product->_thumnail ?>" class="tr_all_hover" alt="">


								</div>

							<!--carousel-->
							<?php 
							$gallerys = json_decode($product->gallery,true);
							if(isset($gallerys[0]) && $gallerys[0]!="") : ?>
							<div class="relative qv_carousel_wrap">

								<button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_prev">

									<i class="fa fa-angle-left "></i>

								</button>

								<ul class="qv_carousel_single d_inline_middle">
									<a href="#" data-image="<?php echo $thumb ?>" data-zoom-image="<?php echo $product->_thumnail ?>"><img src="<?php echo $thumb90 ?>" alt=""></a>
								<?php 
									
									
									foreach($gallerys as $gallery) :
									if($gallery != '') :
									$ga_thumb = $this->getthumb->image($gallery,"300x300");
									$ga_thumb90 = $this->getthumb->image($gallery,"90x90");
								?>
									<a href="#" data-image="<?php echo $ga_thumb ?>" data-zoom-image="<?php echo $gallery ?>"><img src="<?php echo $ga_thumb90 ?>" alt=""></a>	
									<?php endif; ?>	
									<?php endforeach;  ?>	
									
								</ul>

								<button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_next">

									<i class="fa fa-angle-right "></i>

								</button>

							</div>
							<?php endif; ?>

						</div>

						<div class="col-md-7 col-sm-7 col-xs-12 p_top_10 t_xs_align_l">

							<!--description-->

							<h2 class="color_dark fw_medium m_bottom_10" id="product_name"><?php echo $product->product_name ?></h2>

							
							<hr class="m_bottom_10 divider_type_3">

							<table class="description_table m_bottom_5">

								<tr>

									<td>Tình trạng:</td>

									<td><span class="color_green">Còn hàng</span></td>

								</tr>

								<!--<tr>

									<td>Mã sản phẩm:</td>

									<td>PS06</td>

								</tr>-->

							</table>

							<hr class="divider_type_3 m_bottom_5">
							
							<?php if($option['description'] != '') : ?>
							<p class="m_bottom_10">
								<?php echo $option['description'] ?>
							</p>

							<hr class="divider_type_3 m_bottom_10">
							<?php endif; ?>
							<div class="m_bottom_15">
								<?php if(isset($product->_price_sale) && $product->_price_sale != 0 && $product->_price_sale < $product->_price) : ?>
								<s class="v_align_b f_size_ex_large"><?php echo number_format($product->_price,0,".",".") ?> đ</s>
								<span class="v_align_b f_size_big m_left_5 scheme_color fw_medium" id="product_price"><?php  echo number_format($product->_price_sale,0,".",".") ?> đ</span>
								<?php else : ?>
								<span class="v_align_b f_size_big m_left_5 scheme_color fw_medium" id="product_price"><?php  echo number_format($product->_price,0,".",".") ?> đ</span>
							
								<?php endif; ?>
							</div>
							<form action="/gio-hang.html" method="post">
								<table class="description_table type_2 m_bottom_15">
									<tr>

										<td class="v_align_m">Số lượng:</td>

										<td class="v_align_m">

											<div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">

												<button onclick="return false;" class="bg_tr d_block f_left" data-direction="down">-</button>

												<input type="text" name="qty"  readonly value="1" class="f_left" id="qty">

												<button onclick="return false;" class="bg_tr d_block f_left" data-direction="up">+</button>

											</div>

										</td>

									</tr>

								</table>
								<input type="hidden" name="idproduct" class="idproduct" value="<?php echo $product->id_product; ?>"/>
								<div class=" m_bottom_20">
									<a  href="javascript:void()" onclick="addItemcart()" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large ">Thêm vào giỏ</a>
									<input style="margin-left: 10px" type="submit" name="addcart" value="Mua ngay" class="tr_delay_hover r_corners button_type_12 d_inline_b color_dark bg_light_color_2 f_size_large">

									


								</div>
							</form>

							

						</div>

					</div>
					
					<!--tabs-->

					<div class="tabs m_bottom_45">


						<section class="tabs_content shadow r_corners">

							<div id="product-content" class="post_content">
								<?php if(isset($global['layout']['detailproduct']['content_products'])) : ?>
								<?php 
									$top_product = str_replace('<table ','<div class="table-responsive"><table ',$global['layout']['detailproduct']['content_products']);
									$top_product = str_replace("</table>","</table></div>",$top_product);
?>	
								<?php echo $top_product; ?>	
							<?php endif; ?>
								<?php 
									$content_product = str_replace('<table ','<div class="table-responsive"><table ',$product->product_content);
									$content_product = str_replace("</table>","</table></div>",$content_product);
								?>
								<?php echo $content_product ?>
						
							</div>

							

						</section>

					</div>
					<?php if(isset($relateproducts) && isset($relateproducts[0])) : ?>
					<div class="clearfix">

						<h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none">Sản phẩm liên quan</h2>
						<div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">

							<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners rp_prev"><i class="fa fa-angle-left"></i></button>

							<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners rp_next"><i class="fa fa-angle-right"></i></button>

						</div>

					</div>

					<div class="related_projects m_bottom_15 m_sm_bottom_0 m_xs_bottom_15">
						<?php $dataproduct['products'] = $relateproducts;  ?>
								<?php $this->load->view('frontend/11/content_product',$dataproduct); ?>
						
						

					</div>
					<?php endif; ?>
					<hr class="divider_type_3 m_bottom_15">

			</section>
</div>
<script>
	
	
</script>						
