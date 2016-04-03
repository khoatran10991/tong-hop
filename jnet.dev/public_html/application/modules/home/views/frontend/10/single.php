<div id="content-page" class="col-md-8 news-single" 
			<?php
			    if(isset($layout['page-bg-color']) && $layout['page-bg-color'] != ''){
					echo "style='background-color:".$layout['page-bg-color']."'";
			    }
			?>>

		<div class="row" style="">
						<div class="col-sm-12">
							<ul class="bcrumbs" style="border: none;float:left">
								<li><a href="<?php echo $url_site ?>">Trang chủ</a></li>
								<li><a href="#"><?php echo $post_name ?></a></li>
							</ul>
						</div>
		</div>	
		<div class="col-sm-12">
			<h3  class="post-title" id="post-title" 
			<?php
			    if(isset($layout['page-title-color']) && $layout['page-title-color'] != ''){
					echo "style='color:".$layout['page-title-color']."'";
			    }
			?>>
				<?php echo $post_name ?>
			</h3>
			<p  style="margin-bottom: 30px;" class="date-post">Ngày đăng: <?php echo $time_created ?></p>
		</div>
		<div id="primary-mono" class="content-area">
			<main id="main" class="site-main" role="main"
			<?php
			    if(isset($layout['page-text-color']) && $layout['page-text-color'] != ''){
					echo "style='color:".$layout['page-text-color']."'";
			    }
			?>>
				<article id="post-<?php echo $id_post ?>" class="post-<?php echo $id_post ?>">
				<?php echo $post_content ?>
				</article><!-- #post-## -->
			</main><!-- #main -->
		</div><!-- #primary -->
	
</div><!-- #content -->