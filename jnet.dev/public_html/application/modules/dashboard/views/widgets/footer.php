<script src="<?php echo $url_site ?>/template/backend/1/jquery-minicolors/jquery.minicolors.js"></script>
<link rel="stylesheet" href="<?php echo $url_site ?>/template/backend/1/jquery-minicolors/jquery.minicolors.css" />
<style>
.padding-bottom {
	padding-bottom: 20px
}
</style>
<div class="xs" style="padding: 10px 20px 20px 20px">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<form action="" method="post">
		
		<h4>Nội dung cuối trang</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> Kéo thẻ box box <code>Cuối trang</code> này vào vị trí cuối trang.</p>
		<hr>
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong> <?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		</div>
		<!--<div class="col-sm-12">
			<h4>Màu nền </h4>
				<div class="radio" id="select-color" style="">
					
					<input class="color minicolors-input" style="height: 30px;" type="text" name="txt_color_footer" value="<?php if(isset($box_html['footer'][0]->options) && $box_html['footer'][0]->options != '') echo  $box_html['footer'][0]->options ?>">
				</div>
															
		</div>-->
		
		<div class="col-sm-12 padding-bottom">
			<h4 id="1">Nội dung</h4>
			<div class="form-group">
					<div class="col-sm-12">			
						<textarea rows="100" name="txt_content_footer" id="txt_editor" class="form-control1"><?php if(isset($box_html['footer'][0]->html_content)) echo $box_html['footer'][0]->html_content; ?></textarea>
					</div>
					<?php if(isset($editor)&&!empty($editor)){echo $editor; }?>
					
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<input type="submit" name="submit_change_footer" class="btn btn-default" value="Cập nhật"/>
			</div>
		</div>
		
		</form>
	</div>
</div>		
<script>
	$(document).ready( function() {
		$('.color').each( function() {
	         //
	         // Dear reader, it's actually very easy to initialize MiniColors. For example:
	         //
	         //  $(selector).minicolors();
	         //
	         // The way I've done it below is just for the demo, so don't get confused
	         // by it. Also, data- attributes aren't supported at this time. Again,
	         // they're only used for the purposes of this demo.
	         //
	         $(this).minicolors({
	             control: $(this).attr('data-control') || 'hue',
	             defaultValue: $(this).attr('data-defaultValue') || '',
	             format: $(this).attr('data-format') || 'hex',
	             keywords: $(this).attr('data-keywords') || '',
	             inline: $(this).attr('data-inline') === 'true',
	             letterCase: $(this).attr('data-letterCase') || 'lowercase',
	             opacity: $(this).attr('data-opacity'),
	             position: $(this).attr('data-position') || 'bottom left',
	             change: function(hex, opacity) {
	                 var log;
	                 try {
	                     log = hex ? hex : 'transparent';
	                     if( opacity ) log += ', ' + opacity;
	                     console.log(log);
	                 } catch(e) {}
	             },
	             theme: 'default'
	         });

	     });
    });
</script>