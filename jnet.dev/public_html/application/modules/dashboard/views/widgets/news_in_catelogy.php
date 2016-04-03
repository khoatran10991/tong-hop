<script src="<?php echo $url_site ?>/template/backend/1/iphone-style-checkboxes/iphone-style-checkboxes.js"></script>
<link rel="stylesheet" href="<?php echo $url_site ?>/template/backend/1/iphone-style-checkboxes/style.css" />
<script type="text/javascript">
    $(document).ready(function() {
      $(':checkbox').iphoneStyle({
		  checkedLabel: 'Bật',
		  uncheckedLabel: 'Tắt'
		});
    });
    
  </script>
<style>
.padding-bottom {
	padding-bottom: 20px
}
h5 {
	font-weight: bold;
	
}
</style>
<?php 
	//print_r($post_catelogy);
?>
<div class="xs" style="padding: 10px 20px 20px 20px">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<form action="" method="post">
		<h4>Tin tức theo chuyên mục</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> Kéo thẻ box <code>Tin tức theo chuyên mục</code></p>
		<hr>
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong> <?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		</div>
		<!--box 1-->
		<h5 id="1">Tin tức theo chuyên mục 1</h5>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="news_in_catelogy_1[titlebox]" class="form-control" id="usr" placeholder="VD: Tin trong nước" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['titlebox'])) echo $widget_settings['news_in_catelogy']['news_in_catelogy_1']['titlebox']; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Chuyên mục bài viết</label>
					</div>
					<div class="col-sm-5">
						<select name="news_in_catelogy_1[postcatelogy]" class="form-control" id="sel1">
							<option value="0">Tất cả chuyên mục</option>
							<?php 
		                    	if(isset($category_all)) {
									foreach($category_all as $item) {
										
										if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy'] == $item['id']) 
											$check1=  "selected"; 
										else $check1 = "";
										
										echo '<option '.$check1.' value="'.$item['id'].'">'.$item['name'].'</option>';
										if(isset($item['child'])) {
											foreach($item['child'] as $subitem) {
												
												if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy']  == $subitem['id']) 
													$check2=  "selected"; 
												else $check2 = "";
												
												echo '<option '.$check2.' value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
												if(isset($subitem['child'])) {
													foreach($subitem['child'] as $subsubitem) {
														
														if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['postcatelogy']  == $subsubitem['id']) 
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
						<label for="focusedinput" class="control-label">Ảnh đại diện</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['displaythumbnail']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['displaythumbnail'] == 1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_1[displaythumbnail]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kích thước ảnh</label>
					</div>
					<div class="col-sm-3">
						<select name="news_in_catelogy_1[sizethumb]" class="form-control" id="sel1">
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['sizethumb'] == "thumb") echo "selected"; ?> value="thumb">Ảnh lớn</option>
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['sizethumb'] == "thumb90") echo "selected"; ?>  value="thumb90">Ảnh nhỏ</option>
						</select>	
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Ẩn hiển thị mô tả</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['displaydescription']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['displaydescription'] ==0) echo "checked"; ?> type="checkbox" name="news_in_catelogy_1[displaydescription]" class="form-control" value="0">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Hiển thị ngày tháng</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['displaytime']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['displaytime'] ==1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_1[displaytime]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tỉ lệ hiển thị</label>
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['columndisplay'] == 12) echo "checked"; ?> class="form-controld" name="news_in_catelogy_1[columndisplay]" value="12"/> Ngang 100%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['columndisplay'] == 6) echo "checked"; ?> class="form-controld" name="news_in_catelogy_1[columndisplay]" value="6"/> Ngang 50%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['columndisplay'] == 4) echo "checked"; ?> class="form-controld" name="news_in_catelogy_1[columndisplay]" value="4"/> Ngang 33%
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Số bài hiển thị</label>
					</div>
					<div class="col-sm-5">
						<input type="number" min="1" name="news_in_catelogy_1[numberpost]" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_1']['numberpost']) && $widget_settings['news_in_catelogy']['news_in_catelogy_1']['numberpost'] != 0) echo  $widget_settings['news_in_catelogy']['news_in_catelogy_1']['numberpost']; else echo 3; ?>">
					</div>
			</div>
		</div>
		<!--box 2-->
		<h5 id="2">Tin tức theo chuyên mục 2</h5>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="news_in_catelogy_2[titlebox]" class="form-control" id="usr" placeholder="VD: Tin ngoài nước" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['titlebox'])) echo $widget_settings['news_in_catelogy']['news_in_catelogy_2']['titlebox']; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Chuyên mục bài viết</label>
					</div>
					<div class="col-sm-5">
						<select name="news_in_catelogy_2[postcatelogy]" class="form-control" id="sel1">
							<option value="0">Tất cả chuyên mục</option>
							<?php 
		                    	if(isset($category_all)) {
									foreach($category_all as $item) {
										
										if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy'] == $item['id']) 
											$check1=  "selected"; 
										else $check1 = "";
										
										echo '<option '.$check1.' value="'.$item['id'].'">'.$item['name'].'</option>';
										if(isset($item['child'])) {
											foreach($item['child'] as $subitem) {
												
												if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy']  == $subitem['id']) 
													$check2=  "selected"; 
												else $check2 = "";
												
												echo '<option '.$check2.' value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
												if(isset($subitem['child'])) {
													foreach($subitem['child'] as $subsubitem) {
														
														if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['postcatelogy']  == $subsubitem['id']) 
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
						<label for="focusedinput" class="control-label">Ảnh đại diện</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['displaythumbnail']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['displaythumbnail'] == 1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_2[displaythumbnail]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kích thước ảnh</label>
					</div>
					<div class="col-sm-3">
						<select name="news_in_catelogy_2[sizethumb]" class="form-control" id="sel1">
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['sizethumb'] == "thumb") echo "selected"; ?> value="thumb">Ảnh lớn</option>
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['sizethumb'] == "thumb90") echo "selected"; ?>  value="thumb90">Ảnh nhỏ</option>
						</select>	
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Ẩn hiển thị mô tả</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['displaydescription']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['displaydescription'] ==0) echo "checked"; ?> type="checkbox" name="news_in_catelogy_2[displaydescription]" class="form-control" value="0">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Hiển thị ngày tháng</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['displaytime']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['displaytime'] ==1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_2[displaytime]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tỉ lệ hiển thị</label>
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['columndisplay'] == 12) echo "checked"; ?> class="form-controld" name="news_in_catelogy_2[columndisplay]" value="12"/> Ngang 100%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['columndisplay'] == 6) echo "checked"; ?> class="form-controld" name="news_in_catelogy_2[columndisplay]" value="6"/> Ngang 50%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['columndisplay'] == 4) echo "checked"; ?> class="form-controld" name="news_in_catelogy_2[columndisplay]" value="4"/> Ngang 33%
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Số bài hiển thị</label>
					</div>
					<div class="col-sm-5">
						<input type="number" min="1" name="news_in_catelogy_2[numberpost]" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_2']['numberpost']) && $widget_settings['news_in_catelogy']['news_in_catelogy_2']['numberpost'] != 0) echo  $widget_settings['news_in_catelogy']['news_in_catelogy_2']['numberpost']; else echo 3; ?>">
					</div>
			</div>
		</div>
		<!--box 3-->
		<h5 id="3">Tin tức theo chuyên mục 3</h5>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="news_in_catelogy_3[titlebox]" class="form-control" id="usr" placeholder="VD: Tin ngoài nước" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['titlebox'])) echo $widget_settings['news_in_catelogy']['news_in_catelogy_3']['titlebox']; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Chuyên mục bài viết</label>
					</div>
					<div class="col-sm-5">
						<select name="news_in_catelogy_3[postcatelogy]" class="form-control" id="sel1">
							<option value="0">Tất cả chuyên mục</option>
							<?php 
		                    	if(isset($category_all)) {
									foreach($category_all as $item) {
										
										if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy'] == $item['id']) 
											$check1=  "selected"; 
										else $check1 = "";
										
										echo '<option '.$check1.' value="'.$item['id'].'">'.$item['name'].'</option>';
										if(isset($item['child'])) {
											foreach($item['child'] as $subitem) {
												
												if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy']  == $subitem['id']) 
													$check2=  "selected"; 
												else $check2 = "";
												
												echo '<option '.$check2.' value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
												if(isset($subitem['child'])) {
													foreach($subitem['child'] as $subsubitem) {
														
														if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['postcatelogy']  == $subsubitem['id']) 
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
						<label for="focusedinput" class="control-label">Ảnh đại diện</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['displaythumbnail']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['displaythumbnail'] == 1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_3[displaythumbnail]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kích thước ảnh</label>
					</div>
					<div class="col-sm-3">
						<select name="news_in_catelogy_3[sizethumb]" class="form-control" id="sel1">
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['sizethumb'] == "thumb") echo "selected"; ?> value="thumb">Ảnh lớn</option>
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['sizethumb'] == "thumb90") echo "selected"; ?>  value="thumb90">Ảnh nhỏ</option>
						</select>	
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Ẩn hiển thị mô tả</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['displaydescription']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['displaydescription'] ==0) echo "checked"; ?> type="checkbox" name="news_in_catelogy_3[displaydescription]" class="form-control" value="0">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Hiển thị ngày tháng</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['displaytime']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['displaytime'] ==1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_3[displaytime]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tỉ lệ hiển thị</label>
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['columndisplay'] == 12) echo "checked"; ?> class="form-controld" name="news_in_catelogy_3[columndisplay]" value="12"/> Ngang 100%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['columndisplay'] == 6) echo "checked"; ?> class="form-controld" name="news_in_catelogy_3[columndisplay]" value="6"/> Ngang 50%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['columndisplay'] == 4) echo "checked"; ?> class="form-controld" name="news_in_catelogy_3[columndisplay]" value="4"/> Ngang 33%
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Số bài hiển thị</label>
					</div>
					<div class="col-sm-5">
						<input type="number" min="1" name="news_in_catelogy_3[numberpost]" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_3']['numberpost']) && $widget_settings['news_in_catelogy']['news_in_catelogy_3']['numberpost'] != 0) echo  $widget_settings['news_in_catelogy']['news_in_catelogy_3']['numberpost']; else echo 3; ?>">
					</div>
			</div>
		</div>
		<!--box 4-->
		<h5 id="4">Tin tức theo chuyên mục 4</h5>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="news_in_catelogy_4[titlebox]" class="form-control" id="usr" placeholder="VD: Tin ngoài nước" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['titlebox'])) echo $widget_settings['news_in_catelogy']['news_in_catelogy_4']['titlebox']; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Chuyên mục bài viết</label>
					</div>
					<div class="col-sm-5">
						<select name="news_in_catelogy_4[postcatelogy]" class="form-control" id="sel1">
							<option value="0">Tất cả chuyên mục</option>
							<?php 
		                    	if(isset($category_all)) {
									foreach($category_all as $item) {
										
										if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy'] == $item['id']) 
											$check1=  "selected"; 
										else $check1 = "";
										
										echo '<option '.$check1.' value="'.$item['id'].'">'.$item['name'].'</option>';
										if(isset($item['child'])) {
											foreach($item['child'] as $subitem) {
												
												if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy']  == $subitem['id']) 
													$check2=  "selected"; 
												else $check2 = "";
												
												echo '<option '.$check2.' value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
												if(isset($subitem['child'])) {
													foreach($subitem['child'] as $subsubitem) {
														
														if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['postcatelogy']  == $subsubitem['id']) 
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
						<label for="focusedinput" class="control-label">Ảnh đại diện</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['displaythumbnail']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['displaythumbnail'] == 1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_4[displaythumbnail]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kích thước ảnh</label>
					</div>
					<div class="col-sm-3">
						<select name="news_in_catelogy_4[sizethumb]" class="form-control" id="sel1">
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['sizethumb'] == "thumb") echo "selected"; ?> value="thumb">Ảnh lớn</option>
							<option <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['sizethumb']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['sizethumb'] == "thumb90") echo "selected"; ?>  value="thumb90">Ảnh nhỏ</option>
						</select>	
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Ẩn hiển thị mô tả</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['displaydescription']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['displaydescription'] ==0) echo "checked"; ?> type="checkbox" name="news_in_catelogy_4[displaydescription]" class="form-control" value="0">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Hiển thị ngày tháng</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['displaytime']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['displaytime'] ==1) echo "checked"; ?> type="checkbox" name="news_in_catelogy_4[displaytime]" class="form-control" value="1">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tỉ lệ hiển thị</label>
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['columndisplay'] == 12) echo "checked"; ?> class="form-controld" name="news_in_catelogy_4[columndisplay]" value="12"/> Ngang 100%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['columndisplay'] == 6) echo "checked"; ?> class="form-controld" name="news_in_catelogy_4[columndisplay]" value="6"/> Ngang 50%
					</div>
					<div class="col-sm-2">
						<input type="radio" <?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['columndisplay']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['columndisplay'] == 4) echo "checked"; ?> class="form-controld" name="news_in_catelogy_4[columndisplay]" value="4"/> Ngang 33%
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Số bài hiển thị</label>
					</div>
					<div class="col-sm-5">
						<input type="number" min="1" name="news_in_catelogy_4[numberpost]" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['news_in_catelogy']['news_in_catelogy_4']['numberpost']) && $widget_settings['news_in_catelogy']['news_in_catelogy_4']['numberpost'] != 0) echo  $widget_settings['news_in_catelogy']['news_in_catelogy_4']['numberpost']; else echo 3; ?>">
					</div>
			</div>
		</div>
		
		<!--end box all--->
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						
					</div>
					<div class="col-sm-5">
						<input type="submit" name="submit_change_news_in_catelogy" class="btn btn-default btn-sm"  value="Lưu thay đổi">
					</div>
			</div>
		</div>
		</form>
	</div>
</div>	

<script>
$( document ).ready(function() {
    $(function() {
	    if ( document.location.href.indexOf('#1') > -1 ) {
	        $('#1').css('color','red');
	        $('html, body').animate({
		        scrollTop: $("#1").offset().top
		    }, 1000);
	    }
	    if ( document.location.href.indexOf('#2') > -1 ) {
	        $('#2').css('color','red');
	        $('html, body').animate({
		        scrollTop: $("#2").offset().top
		    }, 1000);
	    }
	    if ( document.location.href.indexOf('#3') > -1 ) {
	        $('#3').css('color','red');
	        $('html, body').animate({
		        scrollTop: $("#3").offset().top
		    }, 1000);
	    }
	    if ( document.location.href.indexOf('#4') > -1 ) {
	        $('#4').css('color','red');
	        $('html, body').animate({
		        scrollTop: $("#4").offset().top
		    }, 1000);
	    }
	});
});
</script>
	