<!-- Main Content -->
	<div class="main-content container">
		<!-- Thong bao -->
		<?php if(isset($notification['display_notification']) && $notification['display_notification'] = 1) : ?>
		<div class="col-md-12 block-1">
			<div class="alert alert-<?php if(isset($notification['boxcolor'])) echo $notification['boxcolor'];  ?>" role="alert"> 
				<?php if(isset($notification['txt_content_notification'])) echo $notification['txt_content_notification'];  ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- End thông báo -->
		<div class="col-md-8 block-1">
			<div class="row">
				<div class="col-md-3 b1-aside">
					<h5><span>Mới nhất</span></h5>
					<?php 
// 						echo "<pre>";
// 						print_r($news);
// 						echo "</pre>";
					?>
					<div class="bla-content">
					
						<?php 
							if(isset($news)) :  foreach ($news as $post_news) :
						?>
						<span class="cat-default"><?php echo $post_news->catelogy_name[0]->name ?></span>
							<p><i class="fa fa-clock-o"></i> <?php echo $post_news->time_created ?></p>
							<h4><a href="p/<?php echo $post_news->post_url ?>.html"><?php echo $post_news->post_name ?></a></h4>
							<div class="sep"></div>
						<?php 
							
							endforeach;
							endif;
						?>	
					</div>
<!--					Banner trái-->
					<div class="side-widget">
					<?php
						echo $banner_left;
					?>
						</div>
					<div class="side-poll">
						<h6>Bạn biết website của chúng tôi qua phương tiện nào ?</h6>
						<form>
							<ul>
								<li><input type="radio" name="radiog_lite" id="radio1" class="css-checkbox" /><label for="radio1" class="css-label radGroup1">Google</label></li>
								<li><input type="radio" name="radiog_lite" id="radio2" class="css-checkbox" /><label for="radio2" class="css-label radGroup1">Facebook</label></li>
								<li><input type="radio" name="radiog_lite" id="radio3" class="css-checkbox" /><label for="radio3" class="css-label radGroup1">Email</label></li>
								<li><input type="radio" name="radiog_lite" id="radio4" class="css-checkbox" /><label for="radio4" class="css-label radGroup1">Bạn bè</label></li>
								
							</ul>
						</form>
						<a href="<?php echo $url_site ?>/">Bình chọn</a>
					</div>
				</div>
				
				<div class="col-md-9 block-right">
					<div id="bl-featured">
						<?php 
							if(isset($news)) : foreach ($news as $post_news) :  $options = json_decode($post_news->post_options,true);
						?>
						<div class="bl-featured-big">
							<img src="<?php echo $options['image'] ?>" class="img-responsive" alt="<?php echo $post_news->post_name ?>"/>
							<div class="bl-info">
								<span><?php echo $post_news->catelogy_name[0]->name ?></span>
								<h3><a href="p/<?php echo $post_news->post_url ?>.html"><?php echo $post_news->post_name ?></a></h3>
							</div>
						</div>
						<?php 
							endforeach;
							endif;
						?>
						
					</div>
					
					<!-- Featured News -->
					<div class="featured-news">
						<h5><span>Nổi bật</span></h5>
						<div class="row">
							<div class="col-md-12">
								<?php if(isset($featured)) : foreach ($featured as $fea) :  $options = json_decode($fea->post_options,true);?>
								<div class="col-sm-6 fn-inner">
									<div class="fn-thumb">
										<a href="p/<?php echo $fea->post_url ?>.html"><img title="<?php echo $fea->post_name ?>" src="<?php echo $options['image'] ?>" class="img-responsive" alt="<?php $fea->post_name ?>" /></a>
										<div class="fn-meta"><?php echo $fea->catelogy_name[0]->name ?></div>
									</div>
									<h4><a title="<?php echo $fea->post_name ?>" href="p/<?php echo $fea->post_url ?>.html"><?php echo substr($fea->post_name,0,60) ?>...</a></h4>
									<em><i class="fa fa-clock-o"></i> <?php echo $fea->time_created ?></em>
									<p><?php echo substr($options['description'], 0,220) ?> ..</p>
								</div>
								<?php  endforeach; endif; ?>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Sidebar -->
		<aside class="col-md-4">
			<!-- Popular News -->
			<div class="side-widget p-news">
				<h5><span>Xem nhiều</span></h5>
				<div class="sw-inner">
					<?php 
						if(isset($populars)) :
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
			
			<!-- Banner right-->
			<div class="side-widget">
				<?php
				echo $banner_right;
				?>
			</div>
			<div class="side-widget m-comment">
				<h5><span>Tình yêu và gia đình</span></h5>
				<ul>
					<?php if(isset($featured)) : foreach ($featured as $fea) :  $options = json_decode($fea->post_options,true);?>
					<li>
						<img src="<?php echo $options['image'] ?>" alt="<?php echo $fea->post_name ?>">
						<span>Tình yêu và gia đình</span>
						<h4><a href="p/<?php echo $fea->post_url ?>.html""><?php echo $fea->post_name ?></a></h4>
					</li>
					<?php endforeach; endif; ?>
				</ul>
			</div>
		</aside>
	</div>
<!-- Popup banner -->
<?php
	if(!empty($banner_popup)):
?>

<div id="popup-banner" class="modal fade" role="dialog" style="z-index: 99999">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="border: none">
			</div>
			<div class="modal-body">
				<?php
					echo($banner_popup);
				?>
			</div>
			<div class="modal-footer" style="border: none">
				<button type="button" class="btn btn-success" data-dismiss="modal" style="margin: 10px">Đóng lại</button>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#popup-banner').modal('show');
	});
</script>
<?php
		endif;
?>