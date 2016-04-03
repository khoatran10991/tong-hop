<style>
.padding-bottom {
	padding-bottom: 20px
}
</style>
<?php 
	//print_r($post_catelogy);
?>
<div class="xs" style="padding: 10px 20px 20px 20px">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<form action="" method="post">
		<h4>Chỉnh sửa hiển thị box tin tức mới</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> Kéo thẻ box <code>Tin tức mới</code></p>
		<hr>
		
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong> <?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="titlebox" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['news']['titlebox'])) echo $widget_settings['news']['titlebox']; else echo "Tin tức mới nhất" ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Thể loại bài viết</label>
					</div>
					<div class="col-sm-5">
						<select name="postcatelogy" class="form-control" id="sel1">
							<option value="0">Tất cả chuyên mục</option>
							<?php 
		                    	if(isset($category_all)) {
									foreach($category_all as $item) {
										
										if(isset($widget_settings['news']['postcatelogy']) && $widget_settings['news']['postcatelogy'] == $item['id']) 
											$check1=  "selected"; 
										else $check1 = "";
										
										echo '<option '.$check1.' value="'.$item['id'].'">'.$item['name'].'</option>';
										if(isset($item['child'])) {
											foreach($item['child'] as $subitem) {
												
												if(isset($widget_settings['news']['postcatelogy']) && $widget_settings['news']['postcatelogy'] == $subitem['id']) 
													$check2=  "selected"; 
												else $check2 = "";
												
												echo '<option '.$check2.' value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
												if(isset($subitem['child'])) {
													foreach($subitem['child'] as $subsubitem) {
														
														if(isset($widget_settings['news']['postcatelogy']) && $widget_settings['news']['postcatelogy'] == $subsubitem['id']) 
															$check3=  "selected"; 
														else $check3 = "";
												
														echo '<option value="'.$subsubitem['id'].'">------'.$subsubitem['name'].'</option>';
													}
												}
												
											}
										}
									}
									
									
								}
		                    ?>		
						</select>
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Số cột hiển thị</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news']['columndisplay']) && $widget_settings['news']['columndisplay'] == 1) echo "checked" ?> type="radio" class="form-controld" name="columndisplay" value="1"/> 1
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news']['columndisplay']) && $widget_settings['news']['columndisplay'] == 2) echo "checked" ?> type="radio" class="form-controld" name="columndisplay" value="2"/> 2
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Số bài hiển thị</label>
					</div>
					<div class="col-sm-5">
						<input type="number" min="1" name="numberpost" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['news']['numberpost'])) echo $widget_settings['news']['numberpost']; else echo 6; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						
					</div>
					<div class="col-sm-5">
						<input type="submit" name="submit_change_news" class="btn btn-default btn-sm"  value="Lưu thay đổi">
					</div>
			</div>
		</div>
		
		
		</form>
	</div>
</div>		