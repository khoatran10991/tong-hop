<div id="content-page" class="content-page" 
			<?php
			    if(isset($layout['page-bg-color']) && $layout['page-bg-color'] != ''){
					echo "style='background-color:".$layout['page-bg-color']."'";
			    }
			?>>

					
	<div class="site-content container">	
		<div class="">
			<h2  class="post-title" id="post-title" 
			<?php
			    if(isset($layout['page-title-color']) && $layout['page-title-color'] != ''){
					echo "style='color:".$layout['page-title-color']."'";
			    }
			?>>
				<?php echo $page_name ?>
			</h2>
			<p  style="margin-bottom: 30px;" class="date-post">Ngày đăng: <?php echo $time_created ?></p>
		</div>
		<div id="primary-mono" class="content-area">
			<main id="main" class="site-main" role="main"
			<?php
			    if(isset($layout['page-text-color']) && $layout['page-text-color'] != ''){
					echo "style='color:".$layout['page-text-color']."'";
			    }
			?>>
				<article id="post-{id_page}" class="post-{id_page}">
				<?php echo $page_content ?>
				</article><!-- #post-## -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
</div>