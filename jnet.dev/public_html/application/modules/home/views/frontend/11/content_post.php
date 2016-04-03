<?php
	$option = json_decode($options,true);
?>

<article class="m_bottom_20 clearfix">
		<?php if(isset($option['image']) && $option['image'] != '') : 
		
			$classContent = 'mini_post_content'; 
			
			#xư lý ảnh Thumbnail
			$this->load->library('getthumb');
			$thumb = $this->getthumb->image($option['image']);
			
		?>
		<a href="<?php echo $url_site."/".$url.".html" ?>" class="photoframe d_block d_xs_inline_b f_xs_none wrapper shadow f_left m_right_20 m_bottom_10 r_corners">

		<img src="<?php echo $thumb ?>" class="tr_all_long_hover" alt="<?php echo $name ?>">

		</a>
		<?php endif; ?>
		<div class="<?php echo (isset($classContent) ? $classContent : 'col-sm-12 clearfix')?>">
			<h4 class="m_bottom_5"><a href="<?php echo $url_site."/".$url.".html" ?>" class="color_dark fw_medium"><?php echo $name ?></a></h4>

			<!--<p class="f_size_medium m_bottom_10">Đăng ngày <?php echo $time ?>
			
			</p>-->


			<!--<hr class="m_bottom_15">-->

			<p class="m_bottom_10"><?php echo $option['description'] ?></p>


		</div>

</article>
<hr class="divider_type_3 m_bottom_10" />
