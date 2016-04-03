<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>  
<style>
.padding-bottom {
	padding-bottom: 20px
}
</style>
<div class="xs" style="padding: 10px 20px 20px 20px">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<form action="" method="post">
		<h4>Banner trượt 2 bên</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> Kéo thẻ box <code>Banner trượt trái - phải</code></p>
		<hr>
		
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong><?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		</div>
		<h4>Banner trượt trái</h4>
		<div class="col-sm-12 padding-bottom " style="">
			<div class="col-sm-8 bannerpreview" id="bannerpreviewLeft" style="">
				<?php if(isset($data['banner_scroll']['left']['bannerUrl'])) : ?>
					<img src="<?php echo $data['banner_scroll']['left']['bannerUrl'] ?>" class="img-responsive"/>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kiểu banner</label>
					</div>
					<div class="col-sm-5">
						<select name="bannerType" class="form-control" id="sel1">
							<option value="image">Ảnh (jpg,gif,png)</option>
									
						</select>
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Đường dẫn ảnh</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="left[bannerUrl]" class="form-control" id="bannerUrlLeft" placeholder="" value="<?php if(isset($data['banner_scroll']['left']['bannerUrl'])) echo $data['banner_scroll']['left']['bannerUrl']; ?>">
						<p style="font-size:12px;color:#999;">* Kích thước đề nghị: 1140x230</p>
					</div>
					<div class="col-sm-2">
						<a href="editor/filemanager/popup.aspx?type=1&amp;field_id=bannerUrlLeft" class="btn upload_btn btn-default btn-sm"><i class="fa fa-upload"></i> Chọn ảnh</a>
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">URL liên kết banner</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="left[bannerLink]" class="form-control" id="usr" placeholder="http://" value="<?php if(isset($data['banner_scroll']['left']['bannerLink'])) echo $data['banner_scroll']['left']['bannerLink']; ?>">
					</div>
			</div>
		</div>
		
		<h4>Banner trượt phải</h4>
		<div class="col-sm-12 padding-bottom " style="">
			<div class="col-sm-8 bannerpreview" id="bannerpreviewRight" style="">
				<?php if(isset($data['banner_scroll']['right']['bannerUrl'])) : ?>
					<img src="<?php echo $data['banner_scroll']['right']['bannerUrl'] ?>" class="img-responsive"/>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Kiểu banner</label>
					</div>
					<div class="col-sm-5">
						<select name="bannerType" class="form-control" id="sel1">
							<option value="image">Ảnh (jpg,gif,png)</option>
									
						</select>
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Đường dẫn ảnh</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="right[bannerUrl]" class="form-control" id="bannerUrlRight" placeholder="" value="<?php if(isset($data['banner_scroll']['right']['bannerUrl'])) echo $data['banner_scroll']['right']['bannerUrl']; ?>">
						<p style="font-size:12px;color:#999;">* Kích thước đề nghị: 1140x230</p>
					</div>
					<div class="col-sm-2">
						<a href="editor/filemanager/popup.aspx?type=1&amp;field_id=bannerUrlRight" class="btn upload_btn btn-default btn-sm"><i class="fa fa-upload"></i> Chọn ảnh</a>
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">URL liên kết banner</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="right[bannerLink]" class="form-control" id="usr" placeholder="http://" value="<?php if(isset($data['banner_scroll']['right']['bannerLink'])) echo $data['banner_scroll']['right']['bannerLink']; ?>">
					</div>
			</div>
		</div>
		
		<div class="col-sm-12">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<input type="submit" name="submit_change_banner_scroll" class="btn btn-default" value="Lưu cài đặt"/>
			</div>
		</div>
		</form>
			
	</div>
	
</div>
<script type="text/javascript">
	$( document ).ready(function() {
     	 $('.upload_btn').fancybox({ 
		    'width'     : 900,
		    'height'    : 900,
		    'scrolling' : 'yes', 
		    'type'      : 'iframe',
		    'autoSize': false,
		});

		
		$(function() {
		    // Executes a callback detecting changes with a frequency of 1 second
		    $("#bannerUrlRight").observe_field(1, function( ) {
		        
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#bannerpreviewRight").html("<a  href='' class='btn iframe_btn'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		    $("#bannerUrlLeft").observe_field(1, function( ) {
		        
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#bannerpreviewLeft").html("<a  href='' class='btn iframe_btn'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		});
     	
     
	});
	
	</script> 