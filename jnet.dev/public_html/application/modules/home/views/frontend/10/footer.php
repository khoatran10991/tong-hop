<!-- Footer -->
	<?php if(isset($footer) && $footer != "[]" && $footer != "{}" ) : ?>
	<footer class="container" id="footer-sidebar" 
	<?php
	
		    if(isset($layout['header-bg-color'])){
				echo "style='background-color:".$layout['header-bg-color']."'";
		    }
		?>>
		
		<?php if(isset($widgetfooter)) :  foreach ($widgetfooter as $widget) : if($widget->widget_id == "html") ?>
		<div class="col-md-3 footer-widget">
			<h5><span><?php echo $widget->title ?></span></h5>
			<p>
				<?php echo $widget->content ?>
			</p>
		</div>
		<?php endforeach; endif;?>
		
	</footer>
	<?php endif;?>
	<div class="footer-bottom" style="background:<?php if(isset($footer['footer-background-color'])) echo $footer['footer-background-color']; ?>">
		<div class="container">
			
			
			<?php if(isset($footer['display_menu_footer']) && $footer['display_menu_footer'] == 1)  : ?>
			<ul class="footer-links">
				<li><a href="<?php echo $url_site ?>">Trang chủ</a></li>
				<?php if($menu) : foreach($menu as $item):?>
	                <?php if($item->id_parent == 0): ?>
	                    <li><a href="<?php echo $item->link;?>"><?php echo $item->name ?></a></li>            
	                 <?php endif; ?>
               <?php endforeach; endif;?>
			</ul>
			<?php endif; ?>
			<?php if(isset($footer['txt_content_footer'])) echo $footer['txt_content_footer'] ?>
		</div>
	</div>
</div>

<div class="clearfix space30"></div>

<!-- Javascript -->
<?php if(isset($verification_google['txt_google_analytics_content']) && $verification_google['txt_google_analytics_content'] != "") :
			echo '<script type="text/javascript">';
				echo $verification_google['txt_google_analytics_content'];
			echo '</script>';
		  endif;
?>
<script src="<?php echo $_path ?>/asset/js/bootstrap.min.js"></script>
<script src="<?php echo $_path ?>/asset/js/slick.js"></script>
<script src="<?php echo $_path ?>/asset/js/jquery.nicescroll.js"></script>
<script src="<?php echo $_path ?>/asset/js/jflickrfeed.min.js"></script>
<script src="<?php echo $_path ?>/asset/js/jquery-ui.js"></script>
<script src="<?php echo $_path ?>/asset/js/jquery.spasticNav.js"></script>
<script src="<?php echo $_path ?>/asset/js/jquery.prettyphoto.js"></script>
<script src="<?php echo $_path ?>/asset/js/main.js"></script>

</body>
</html>
