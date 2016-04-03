<?php $this->load->library('getthumb'); ?>
<?php if(isset($products) && isset($products[0])) : foreach($products as $product) : ?>
				<figure class="r_corners photoframe shadow relative d_xs_inline_b tr_all_hover">
						 <?php 
						 	$thumb = $this->getthumb->image($product->thumnail);
						 ?>
							<!--product preview-->

							<a style="text-align: center;" href="san-pham/<?php echo $product->url ?>.html" class="d_block relative pp_wrap">

								<!--hot product-->

								<img title="<?php echo $product->name ?>" src="<?php echo $thumb ?>" class="tr_all_hover" alt="<?php echo $product->name ?>" />

							</a>

							<!--description and price of product-->

							<figcaption class="t_align_c">

								<h5  class="m_bottom_5 product_title"><a style="white-space: normal;" href="san-pham/<?php echo $product->url ?>.html" class="color_dark ellipsis"><?php echo $product->name ?></a></h5>

								<div class="clearfix">

								
									<p class="scheme_color f_size_large m_bottom_15">
											<?php if(isset($product->sale) && $product->sale < $product->price && $product->sale != 0) : $_price = $product->sale; ?>
											<s><?php echo number_format($product->price,0,".",".") ?>đ</s> 
											<span style="font-weight: bold;"><?php echo number_format($product->sale,0,".",".") ?>đ</span>
											<?php else : $_price = $price; ?>
											<span style="font-weight: bold;"><?php echo number_format($product->price,0,".",".") ?>đ</span>
											<?php endif ?>
											
									</p>	
									<!--rating-->
									
									<button data-price="<?php echo $_price; ?>" data-id="<?php echo $product->id ?>" data-img="<?php echo $thumb ?>" data-name="<?php echo $product->name ?>" class="add_to_cart button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">Đặt mua</button>

									

								</div>

								

							</figcaption>

				</figure>
			<?php endforeach; ?>	
<?php endif; ?>