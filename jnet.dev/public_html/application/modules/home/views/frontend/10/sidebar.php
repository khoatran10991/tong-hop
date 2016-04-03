<aside class="col-md-4">
			<!-- Popular News -->
			<div class="side-widget p-news">
				<h5><span>Xem nhiều</span></h5>
				<div class="sw-inner">
					<?php 
						if($populars) :
					?>
					<ul>
						<?php 
							foreach ($populars as $post) :  $options = json_decode($post->post_options,true);
						?>
						<li>
							<a title="<?php echo $post->post_name ?>" href="p/<?php echo $post->post_url ?>.html"><img src="<?php echo $options['image'] ?>" alt="<?php echo $post->post_name ?>"></a>
							<div class="pn-info">
								<em><i class="fa fa-clock-o"></i> <?php echo $post->time_created ?></em>
								<h4><a href="p/<?php echo $post->post_url ?>.html"><?php echo $post->post_name ?></a></h4>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php 
						else : echo "<p>Chưa có bài viết khác</p>";
					?>
					<?php endif; ?>
				</div>
			</div>
			
			<!-- Banner -->
			<!-- <div class="side-widget sw-banner">
				<a href="http://sangtysin.jnet.dev/#"><img src="/images/banner/3.jpg" class="img-responsive" alt=""></a>
			</div> -->
			<div class="side-widget m-comment">
				<h5><span>Tình yêu và gia đình</span></h5>
				<ul>
										<li>
						<img src="http://hyvongmongmanh.com//uploads/tdn/images/truy%E1%BB%87n%20ng%E1%BA%AFn/nhung-nga-re-cuoc-doi1.jpg" alt="Những ngã rẽ cuộc đời P2">
						<span>Tình yêu và gia đình</span>
						<h4><a href="p/nhung-nga-re-cuoc-doi-p2.html" "="">Những ngã rẽ cuộc đời P2</a></h4>
					</li>
										<li>
						<img src="http://hyvongmongmanh.com//uploads/tdn/images/truy%E1%BB%87n%20ng%E1%BA%AFn/nhung-nga-re-cuoc-doi-2.jpg" alt="Những ngã rẽ cuộc đời P1">
						<span>Tình yêu và gia đình</span>
						<h4><a href="p/nhung-nga-re-cuoc-doi.html" "="">Những ngã rẽ cuộc đời P1</a></h4>
					</li>
									</ul>
			</div>
</aside>