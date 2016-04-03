<div class="main-content container">
	<div class="row">
					<div class="row" style="">
						<div class="col-sm-3">
							<ul class="bcrumbs" style="border: none;float:left">
								<li><a href="<?php echo $url_site ?>">Trang chủ</a></li>
								<li><a href="<?php echo $catelogy['url'] ?>.html"><?php echo $catelogy['name'] ?></a></li>
							</ul>
						</div>
					</div>
					<?php 
						if(isset($posts) && !empty($posts)) : 
							foreach ($posts as  $post) : $options = json_decode($post->post_options,true);
					?>	
					<div class="col-md-3">
						<div class="news-thumb1">
							<a href="p/<?php echo  $post->post_url ?>.html"><img title="<?php echo $post->post_name ?>" src="<?php echo $options['image'] ?>" class="img-responsive" alt="<?php echo $post->post_name ?>"></a>
						</div>
						<div class="nt1-inner">
							<h3><a href="p/<?php echo  $post->post_url ?>.html"><?php echo $post->post_name ?></a></h3>
							<em><i class="fa fa-clock-o"></i> <?php echo $post->time_created ?></em>
							<p><?php echo substr($options['description'], 0,220) ?> ..</p>
						</div>
					</div>
					<?php 
							endforeach;
						else : 
							echo "<h3>Chưa có bài viết.</h3>";
						
						endif;
					?>
	</div>
	<!-- <div class="page-nav">
					<ul>
						<li class="active"><a href="#"><span>1</span></a></li>
						<li><a href="#"><span>2</span></a></li>
						<li><a href="#"><span>3</span></a></li>
					</ul>
	</div> -->
	<div class="clearfix space30"></div>
</div>