
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
		<h4>Sản phẩm theo danh mục 4</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> kéo thả box <code>Sản phẩm theo danh mục 4</code></p>
		<hr>
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong> <?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Không có sự thay đổi ! 										</div>
								<?php endif; ?>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="titlebox" class="form-control" id="usr" placeholder="VD: Sản phẩm mới" value="<?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['titlebox'])) echo $widget_settings['productsincatelogy']['productsincatelogy_4']['titlebox']; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Danh mục sản phẩm</label>
					</div>
					<div class="col-sm-5">
						<select name="productcatelogy" class="form-control" id="sel1">
							<option value="0">Tất cả chuyên mục</option>
							<?php 
		                    	if(isset($product_category_all) && isset($product_category_all)) {
									foreach($product_category_all as $item) {
										
										if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['productcatelogy']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['productcatelogy'] == $item['id']) 
											$check1=  "selected"; 
										else $check1 = "";
										
										echo '<option '.$check1.' value="'.$item['id'].'">'.$item['name'].'</option>';
										if(isset($item['child'])) {
											foreach($item['child'] as $subitem) {
												
												if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['productcatelogy']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['productcatelogy']  == $subitem['id']) 
													$check2=  "selected"; 
												else $check2 = "";
												
												echo '<option '.$check2.' value="'.$subitem['id'].'">---'.$subitem['name'].'</option>';
												if(isset($subitem['child'])) {
													foreach($subitem['child'] as $subsubitem) {
														
														if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['productcatelogy']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['productcatelogy']  == $subsubitem['id']) 
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
						<label for="focusedinput" class="control-label">Số sản phẩm hiển thị</label>
					</div>
					<div class="col-sm-5">
						<input type="number" min="1" name="numberproduct" class="form-control" id="usr" placeholder="" value="<?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['numberproduct']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['numberproduct'] != 0) echo  $widget_settings['productsincatelogy']['productsincatelogy_4']['numberproduct']; else echo 6; ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Sắp xếp theo</label>
					</div>
					<div class="col-sm-5">
						<select name="orderBy" class="form-control" id="sel1">
							<option <?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['orderBy']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['orderBy'] == 'desc') echo "selected" ?> value="desc">Mới nhất</option>
							<option <?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['orderBy']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['orderBy'] == 'RANDOM') echo "selected" ?> value="RANDOM">Ngẫu nhiên</option>
							<option <?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['orderBy']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['orderBy'] == 'asc') echo "selected" ?> value="asc">Cũ nhất</option>
							
						</select>
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kiểu hiển thị</label>
					</div>
					<div class="col-sm-5">
						<select name="slider" class="form-control" id="sel1">
							<option <?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['slider']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['slider'] == '0') echo "selected" ?> value="0">Bình thường</option>
							<option <?php if(isset($widget_settings['productsincatelogy']['productsincatelogy_4']['slider']) && $widget_settings['productsincatelogy']['productsincatelogy_4']['slider'] == '1') echo "selected" ?> value="1">Chạy ngang</option>
							
						</select>
					</div>
			</div>
		</div>
		<!--end box all--->
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						
					</div>
					<div class="col-sm-5">
						<input type="submit" name="submit_change_productsincatelogy_4" class="btn btn-default btn-sm"  value="Lưu cài đặt">
					</div>
			</div>
		</div>
		</form>
	</div>
</div>	

