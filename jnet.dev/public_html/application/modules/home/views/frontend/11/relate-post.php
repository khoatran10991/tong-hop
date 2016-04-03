<div class="col-lg-12 col-md-12 col-sm-12 shadow m_bottom_15 widget_post_in_catelogy blog_animate animate_ftr">
								<?php foreach($relateposts as $r_post) : ?>	
								<?php 
								$option = json_decode($r_post->options,true);
								  if(isset($option['image']) && $option['image'] != '') : 										
															#xý l? ?nh Thumbnail
															$img_url = explode("/",$option['image']);
															$img_name = array_pop($img_url);
																$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/90x90_" .$img_name;
															
															if(file_exists($img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name))
																$thumb = $url_thumb;
															else 
																$thumb = $option['image'];
								 else : $thumb = "http://placehold.it/100x100";
								 endif;
								
								?>
								<div class="col-lg-4 col-md-4 col-sm-12" style="min-height:80px">
									<a href="<?php echo $r_post->url ?>.html"><img style="width: 90px;height: 50px;" class="tr_all_long_hover img-responsive" src="<?php echo $thumb ?>" title="<?php echo $r_post->name ?>" alt="<?php echo $r_post->name ?>"></a>
									<a class="color_dark d_block p_vr_0 bt_link" href="<?php echo $r_post->url ?>.html"><?php echo $r_post->name ?></a>
																			 
									 				 					 
								</div>
								<?php endforeach; ?>			
</div>