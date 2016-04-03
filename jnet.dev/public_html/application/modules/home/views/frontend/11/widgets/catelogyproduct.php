<style>

.subitem {
	display: none;
}

</style>

<?php if($is_home == true) $active = ""; else $active = '' ?>
							<figure class="widget animate_ftr shadow r_corners wrapper m_bottom_30">

								<figcaption class="row box_title_cate">

									<h3 class="title_h4 color_light color_light">Sản phẩm</h3>

								</figcaption>

								<div class="widget_content">

									<!--Categories list-->

									<ul class="categories_list" id="catelogy_product">
										<?php if(isset($catelogys)) : ?>
										<?php  $i = 1; ?>
										<?php foreach($catelogys as $item) : ?>

										<li id="p-<?php echo $i; ?>" class="<?php echo $active ?> item">

											<a  href="<?php echo $item['link'] ?>" id="" class="f_size_large color_dark d_block relative">

												<b><?php echo $item['name'] ?></b>
												<?php if(isset($item['child'])) : ?>
												<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
												<?php endif; ?>

											</a>
											<?php if(isset($item['child'])) : ?>
											<!--second level-->
											
											<ul class="subitem" id="subitem-p-<?php echo $i ?>">
												<?php foreach($item['child'] as $subitem) : ?>
												<li class="li_subitem <?php echo $active ?>">

													<a href="<?php echo $subitem['link'] ?>" class="subitem_a d_block f_size_large color_dark relative">

														<?php echo $subitem['name'] ?>
														<?php if(isset($subitem['child'])) : ?>
														<span class="bg_light_color_1 r_corners f_right color_dark talign_c"></span>
														<?php endif ?>

													</a>
													<?php if(isset($subitem['child'])) : ?>
													<!--third level-->

													<ul>
														<?php foreach($subitem['child'] as $subsubitem) : ?>
														<li><a href="<?php echo $subsubitem['link'] ?>" class="color_dark d_block"><?php echo $subsubitem['name'] ?></a></li>
														<?php endforeach; ?>

													</ul>
													<?php endif; ?>

												</li>

												<?php endforeach; ?>

											</ul>
											<?php endif; ?>

										</li>
										<?php $i++; ?>
										<?php endforeach; ?>
										<?php else : echo "Chưa có danh mục nào"; ?>
										<?php endif; ?>

									</ul>

								</div>

							</figure>
							
							
							
							
						