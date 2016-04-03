<section>
		<div class="clearfix" style="min-height: 225px;">
						<?php 
							if(isset($settings['columndisplay']) && $settings['columndisplay'] == 2) 
								$col_1 = "col-lg-8 col-md-8 col-sm-12";
							else 
								$col_1 = "col-lg-12 col-md-12 col-sm-12";	
						?>
						<div class="<?php echo $col_1 ?> m_sm_bottom_35 blog_animate animate_ftr">
							
							<!--blog carousel-->
							<div class="blog_carousel">
								<?php if(isset($posts)) : ?>
									<?php foreach($posts as $post) : ?>
									<?php  $option = json_decode($post->options,true);   ?>
									<?php if(isset($option['image']) && $option['image'] != '') : 										
												#xư lý ảnh Thumbnail
												$img_url = explode("/",$option['image']);
												$img_name = array_pop($img_url);
												$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name;
												if(file_exists($img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name))
													$thumb = $url_thumb;
												else 
													$thumb = $option['image'];
										 else : $thumb = "http://placehold.it/350x150";
										 endif;
									?>
								<!--item-->
								<div class="clearfix">
									<!--image-->
									<a href="<?php echo $post->url ?>.html" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 animate_ftt f_mxs_none m_mxs_bottom_10">
										<img class="tr_all_long_hover" src="<?php echo $thumb ?>" title="<?php echo $post->name ?>" alt="<?php echo $post->name ?>">
									</a>
									<!--post content-->
									<div class="mini_post_content">
										<h4 class="animate_ftr">
											<a href="<?php echo $post->url ?>.html" class="color_dark"><b><?php echo $post->name ?></b></a>
										</h4>
										<p class="f_size_medium  animate_ftr"><?php echo $post->time ?></p>
										<p class="m_bottom_10 animate_ftr">
											<?php 
											 	$text_sort = mb_substr($option['description'],0,110,'UTF-8');
												echo $text_sort."...";
											?>
										</p>
										
									</div>
								</div>
								<?php endforeach; ?>
								<?php else : echo "<h4>Không có bài viết nào được tìm thấy</h4>"; ?>
								<?php endif; ?>
							</div>
							
						
						</div>
						<?php if(isset($settings['columndisplay']) && $settings['columndisplay'] == 1) : 
							  	echo "";
							  	
							  else :		
						
						?>	
						<div class="col-lg-4 col-md-4 col-sm-12 ti_animate animate_ftr">
							<!--testimonials -->
							<div class="testiomials_carousel">
								<ul>
									<?php if(isset($posts)) : ?>
									<?php foreach($posts as $post) : ?>
									<li><i style="color: #149BAB;" class="fa fa-angle-double-right"></i> <a style="font-weight: bold;font-size: 13px;" class="color_dark" href="<?php echo $post->url ?>.html"><?php echo $post->name ?></a></li>
									<?php endforeach; ?>
									<?php endif; ?>
								</ul>
								
							  </div>
						   </div>
						   <!--/testimonials carousel-->
						<?php endif; ?>   
						
					</div>
</section>