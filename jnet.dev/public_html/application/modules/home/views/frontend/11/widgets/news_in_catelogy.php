<?php 
	if(isset($settings['columndisplay']))
		$col = "col-lg-".$settings['columndisplay']." col-md-".$settings['columndisplay'];
	else 
		$col = 	"col-lg-6 col-md-6";
?>
<style>
	.small_title {
		font-size: 14px;
	}
	
</style>

<?php 
	
	$this->load->model('Posts_model');
?>
<section>
	<div class="m_bottom_25 m_sm_bottom_10 <?php if(isset($settings['columndisplay']) && $settings['columndisplay'] == 12) echo "clearfix";  ?>">
		<?php if(isset($settings['columndisplay']) && $settings['columndisplay'] != 6 && $settings['columndisplay'] != 4) : ?>
			<div class="col-lg-12 col-md-12 col-sm-12 shadow widget_post_in_catelogy blog_animate animate_ftr">
				<?php if(isset($settings['titlebox']) && $settings['titlebox'] != '') : ?>
				<div class="row box_title_cate">
					<h4><i class="fa fa-bluetooth"></i> <?php  echo $settings['titlebox']; ?></h4>
				</div>
				<?php endif; ?>
				<?php 
					  if(isset($posts) && isset($posts[0])) : 
					  $i = 1;$number = count($posts);
					  foreach($posts as $post) :	
					  $catelogys = $this->Posts_model->get_catelogy_by_id_post($post->id);
					  $class = "";
					  $option = json_decode($post->options,true);
					  if(isset($option['image']) && $option['image'] != '') : 										
												#xư lý ảnh Thumbnail
												$img_url = explode("/",$option['image']);
												$img_name = array_pop($img_url);
												if(isset($settings['sizethumb']) && $settings['sizethumb'] == 'thumb90') {
													$class = "color_dark d_block p_vr_0 bt_link";
													$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/90x90_" .$img_name;
												}
													
												else {
													$class = "bold";
													$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name;
												}
													
												if(file_exists($img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name))
													$thumb = $url_thumb;
												else 
													$thumb = $option['image'];
					 else : $thumb = "http://placehold.it/200x100";
					 endif;				
				?>	
				<div class="post_first_cate row clearfix blog_animate animate_ftr" style="min-height:70px">
					<a href="<?php echo $post->url ?>.html"><img class="tr_all_long_hover img-responsive" src="<?php echo $thumb; ?>" title="<?php echo $post->name ?>" alt="<?php echo $post->name ?>"></a>
					<b><a class="<?php echo $class ?>" href="<?php echo $post->url ?>.html"><?php echo $post->name ?></a></b>
					<?php if(isset($settings['displaytime']) && $settings['displaytime'] == 1) : ?>
					<p class="post_time">
						<i class="fa fa-clock-o"></i> <?php echo substr($posts[0]->time,0,10) ?> |
						<?php 
							if(isset($catelogys) && isset($catelogys[0])) :
								foreach($catelogys as $cate) :
									echo '<a href="'.$cate->url.'.html".>'.$cate->name.'</a>, ';
								endforeach;
							endif;
						?>
						
					</p>
					<?php endif; ?>
					<?php if(!isset($settings['displaydescription']) || $settings['displaydescription'] != 0) : ?>
					<p class="post_description"><?php $text_sort = mb_substr($option['description'],0,200,'UTF-8');
							 echo $text_sort."..."; 
						?>
					 </p>
					 <?php endif; ?>
					 
					 <?php if($number != $i) echo '<hr class="m_bottom_5">'; ?>
					 <?php $i = $i+1; ?>
					 
				</div>
				<?php endforeach; endif; ?>
			
			</div>
		
		<?php elseif(isset($posts[0])) : ?>
		<div class="<?php echo $col ?> col-sm-12 shadow widget_post_in_catelogy blog_animate animate_ftr">
			<?php if(isset($settings['titlebox']) && $settings['titlebox'] != '') : ?>
			<div class="row box_title_cate">
				<h4><?php  echo $settings['titlebox']; ?></h4>
			</div>
			<?php endif; ?>
			<?php 
				$option = json_decode($posts[0]->options,true);
			?>
			<?php if(isset($option['image']) && $option['image'] != '') : 										
												#xư lý ảnh Thumbnail
												$img_url = explode("/",$option['image']);
												$img_name = array_pop($img_url);
												if(isset($settings['sizethumb']) && $settings['sizethumb'] == 'thumb90') {
													$class = "color_dark small_title";
													$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/90x90_" .$img_name;
												}
													
												else {
													$class = "";
													$url_thumb = $img_url[0]."//".$img_url[2]."/" .$img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name;
												}
												if(file_exists($img_url[3]. "/" .$img_url[4]. "/thumbs/" .$img_name))
													$thumb = $url_thumb;
												else 
													$thumb = $option['image'];
				 else : $thumb = "http://placehold.it/200x100";
				 endif;
			?>
			<?php if(isset($posts[0])) : ?>
			<div class="post_first_cate">
				<a href="<?php echo $posts[0]->url ?>.html"><img class="tr_all_long_hover img-responsive" src="<?php echo $thumb; ?>" title="<?php echo $posts[0]->name ?>" alt="<?php echo $posts[0]->name ?>"></a>

				<h5><a href="<?php echo $posts[0]->url ?>.html"><?php echo $posts[0]->name ?></a></h5>
				<?php if(isset($settings['displaytime']) && $settings['displaytime'] == 1) : ?>
				<p class="post_time"><i class="fa fa-clock-o"></i> <?php echo substr($posts[0]->time,0,10) ?> |
				<?php if(isset($settings['displaytime']) && $settings['displaytime'] == 1) : ?>
					<?php 
							if(isset($catelogys) && count((array)$catelogys)>1) :
								foreach($catelogys as $cate) :
									echo '<a href="'.$cate->url.'.html".>'.$cate->name.'</a>, ';
								endforeach;
							endif;
						?>
					
				</p>
				<?php endif; ?>
				<?php endif; ?>
				<?php if(!isset($settings['displaydescription']) || $settings['displaydescription'] != 0) : ?>
				<p class="post_description"><?php $text_sort = mb_substr($option['description'],0,130,'UTF-8');
						 echo $text_sort."..."; 
					?>
				 </p>
				 <?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="cleadrfix post_cate">
				<ul class="list_news_in_cate">

					<?php 
						if(isset($posts) && isset($posts[0])) : 
						unset($posts[0]);
						foreach($posts as $post) :
						
						
					?>
					
					<li class="klcb_news">
					<b><a class="color_dark" data-linktype="newsdetail" data-id="20160310004552548" href="<?php echo $post->url ?>.html" title="<?php echo $post->name ?>"><i class="fa fa-angle-double-right"></i> <?php echo $post->name ?></a></b>
					</li>
					<?php endforeach; ?>
					<?php endif; ?>
				</ul>
				
			</div>
		</div>
		
		<?php endif; ?>
   </div>
</section> 	
	