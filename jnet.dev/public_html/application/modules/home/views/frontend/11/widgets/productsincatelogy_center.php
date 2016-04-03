							<?php $this->load->library('getthumb'); ?>
							<section class="products_container col-lg-12 col-md-12 col-sm-12 category_grid clearfix m_bottom_15">
								<?php 
									if(isset($settings['titlebox']) && $settings['titlebox'] != '') :
								?>
								<div class="box_title_cate" style="margin-bottom: 0px;">

									<h4 class="title_h4 color_light color_light"><?php echo $settings['titlebox'] ?></h4>

								</div>
								<?php endif; ?>
								<div class="col-sm-12  blog_animate animate_ftr">
								<?php if(isset($products[0])) : ?>
									<?php foreach($products as $product) : ?>
										<?php $this->load->view('frontend/11/content_catelogy_product',$product); ?>
									<?php  endforeach;?>
								
								<?php else : echo "<h4>Không tìm thấy sản phẩm nào</h4>" ?>	
								<?php endif; ?>
								</div>

							</section>