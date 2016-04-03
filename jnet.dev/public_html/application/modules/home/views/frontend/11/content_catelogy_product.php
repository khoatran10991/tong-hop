								<!--product item-->
								<?php $thumb = $this->getthumb->image($thumnail); ?>
								<div class="product_item hit w_xs_full">

									<figure class="r_corners photoframe type_2 t_align_c tr_all_hover shadow relative">

										<!--product preview-->
										
										<a href="san-pham/<?php echo $url ?>.html" class="d_block relative wrapper pp_wrap m_bottom_15">
										<center>			
											<img src="<?php echo $thumb ?>" class="tr_all_hover" alt="<?php echo $name ?>" title="<?php echo $name ?>">

										</center>
										</a>

										<!--description and price of product-->

										<figcaption>

											<h5 class="m_bottom_10"><a style="font-weight: bold;" href="san-pham/<?php echo $url ?>.html" class="color_dark"><?php echo $name ?></a></h5>

											<p class="scheme_color f_size_large m_bottom_15">
											<?php if(isset($sale) && $sale < $price && $sale != 0) : $_price = $sale; ?>
											<s><?php echo number_format($price,0,".",".") ?>đ</s> 
											<span style="font-weight: bold;"><?php echo number_format($sale,0,".",".") ?>đ</span>
											<?php else : $_price = $price; ?>
											<span style="font-weight: bold;"><?php echo number_format($price,0,".",".") ?>đ</span>
											<?php endif ?>
											
											</p>	

											<button data-price="<?php echo $_price; ?>" data-id="<?php echo $id ?>" data-img="<?php echo $thumb ?>" data-name="<?php echo $name ?>" class="add_to_cart button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_15">Đặt mua</button>

										</figcaption>

									</figure>

								</div>