<div class="xs">

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<!-- Bắt đầu code về upload logo -->
								<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<h4>Thay Đổi Logo</h4>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Logo</label>
									<div class="col-sm-6">
										<img src="{logo}"style="max-height: 75px;max-width: 150px"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">	
								    	<label for="exampleInputFile" >Thay Đổi Logo</label>

							        	<input name="upload_logo" type="file" id="exampleInputFile">
							        	<div class="row">
							        	<?php 
												if(isset($error_upload)&& !empty($error_upload)){echo $error_upload;}
											?>
											<?php 
												if(isset($file_name_upload)&& !empty($file_name_upload)){echo "<img src='/uploads/$username/$file_name_upload'style='max-height: 75px;max-width: 150px;margin: 10px;'/>";}
											?>
										</div>
	
							        	<input name="submit_upload" class="btn btn-defaull" type="submit" value="Tải Ảnh Lên" style="margin: 10px;" />
							        	<input name="submit_apply_upload" class="btn btn-warning" type="submit" value="Áp dụng" style="margin: 10px;" />
							  			<p class="help-block">Hỗ Trợ Các File PNG|GIF|JPG - Kích thước không quá 5MB.</p>
							  				
							        </div>

							     </div>
							     </form>
							     <!-- Kết thúc code về upload logo -->
		</div>
  	</div>
 </div>