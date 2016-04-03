<?php $this->load->library('getthumb');?>
<figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30" id="productincatelogy_1">
								<?php 
									if(isset($settings['titlebox']) && $settings['titlebox'] != '') :
								?>
								<figcaption class="row box_title_cate" style="margin-bottom: 0px;">

									<h3 class="title_h4 color_light color_light"><?php echo $settings['titlebox'] ?></h3>

								</figcaption>
								<?php endif; ?>
								<div class="widget_content">
									<?php if(isset($products) && isset($products[0])) : ?>
									<?php  $i=0; $number = count($products); ?>
									<?php foreach($products as $product) : ?>
									<?php $thumb = $this->getthumb->image($product->thumnail,"90x90"); ?>
									<div class="clearfix m_bottom_15">
										<a href="san-pham/<?php echo $product->url ?>.html">
										<img src="<?php echo $thumb ?>" alt="<?php echo $product->name ?>" title="<?php echo $product->name ?>" class="f_left m_right_15 m_sm_bottom_10 f_sm_none f_xs_left m_xs_bottom_0">
										</a>
										<a style="font-weight: bold;" href="san-pham/<?php echo $product->url ?>.html" class="color_dark d_block bt_link"><?php echo $product->name ?></a>
										
										<?php if(isset($product->sale) && $product->sale < $product->price) : ?>
											<p><s><?php echo number_format($product->price,0,".",".") ?>đ</s></p>
											<p class="scheme_color"><b><?php echo number_format($product->sale,0,".",".") ?>đ</b></p>
										<?php else : ?>
											<p class="scheme_color"><b><?php echo number_format($product->price,0,".",".") ?>đ</b></p>	
										<?php endif; ?>
										

									</div>
										<?php if($i != $number-1) : ?>
										<hr class="m_bottom_15">
										<?php endif; ?>
									<?php $i++; endforeach; ?>
									<?php else : ?>
									<h5>Chưa có sản phẩm</h5>
									
									<?php endif; ?>

								</div>

</figure>