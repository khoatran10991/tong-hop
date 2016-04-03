
<?php if(isset($sliders)) :?>


				

					<!--slider-->
					
					

						<div class="flexslider animate_ftr long">

							<ul class="slides">
								<?php $i = 1; while ($i <= 10) :  ?>
									<?php if(isset($sliders["slideshow-img-".$i.""])) : ?>
									
									<li>

										<img src="<?php echo $sliders["slideshow-img-".$i.""] ?>" alt="" data-custom-thumb="<?php echo $sliders["slideshow-img-".$i.""] ?>">
										<?php
											if(isset($sliders['caption-align-'.$i]) && $sliders['caption-align-'.$i] == 'left')
												$slide_caption	= 'slide_caption_2';
												
											if(isset($sliders['caption-align-'.$i]) && $sliders['caption-align-'.$i] == 'right')
											$slide_caption	= 'slide_caption';
											else $slide_caption = 'slide_caption_2';
										?>
										<section class="<?php echo $slide_caption ?> t_align_c d_xs_none">

											
											<?php if(isset($sliders['title-slide-'.$i]) && $sliders['title-slide-'.$i] != '') : ?>
											<div class="color_light slider_title_4 tt_uppercase t_align_c m_bottom_65 m_sm_bottom_20"><b><span class="scheme_color"><?php echo $sliders['description-slide-'.$i] ?></span><br><br><span class="color_dark"><?php echo $sliders['title-slide-'.$i] ?></span></b></div>

											<a href="<?php echo $sliders['link-slide-'.$i] ?>" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover"><?php echo $sliders['button-slide-'.$i] ?></a>
											<?php endif; ?>
										</section>

									</li>
									<?php endif; ?>
								<?php $i++; endwhile; ?>
					
					

							</ul>

						</div>

					

<?php endif; ?>	
					

	

