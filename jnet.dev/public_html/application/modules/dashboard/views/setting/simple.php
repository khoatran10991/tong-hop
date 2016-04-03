<script src="{url_site}/template/backend/1/jquery-minicolors/jquery.minicolors.js"></script>
<link rel="stylesheet" href="{url_site}/template/backend/1/jquery-minicolors/jquery.minicolors.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>    
<style>
<!--
.setting>li>a:hover {
	background-color: #f5f5f5 !important;
}
.setting>li.active>a {
	background-color: #f5f5f5 !important;
}
#imglogoview img {
	width: 166px;
	padding-bottom: 10px
}
#imgfaviconview img {

	padding-bottom: 10px
}
-->
</style>
<div class="xs">
			<h4>Cấu hình cơ bản</h4>
			<hr>
			<ul class="setting nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#site-infomation" aria-expanded="true">Thông tin website</a></li>
			    <li class=""><a data-toggle="tab" href="#social" aria-expanded="false">Mạng xã hội</a></li>
			    <li class=""><a data-toggle="tab" href="#google" aria-expanded="false">Kết nối Google</a></li>
			 
			 </ul>
			 <?php if(isset($message['success']) && $message['success'] != '') : ?><div style="cursor: pointer" data-dismiss="alert" aria-label="close" class="alert alert-info" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $message['success']?></div><?php endif; ?>
  	          <?php if(isset($message['error']) && $message['error'] != '') : ?><div style="cursor: pointer" data-dismiss="alert" aria-label="close" class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $message['error']?></div><?php endif; ?>
  	        
  	         <div class="tab-content">
						<div class="tab-pane active" id="site-infomation">
								<!-- Thay đổi thông tin của website -->
								<form class="form-horizontal" action="" method="post" >
								
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Địa chỉ website</label>
									<div class="col-sm-6">
										<p style="color: #555;font-size: 14px;">Tên miền chính: <?php if($domains['pre'] != '') echo $domains['pre']; else echo "chưa có <a target='_blank' href='https://jdomain.vn'>(mua tên miền)</a>" ?></p>
										<p style="color: #555;font-size: 14px;;"><?php echo $domains['base'] ?></p>
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_title"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-2"></div>
									<div class="col-sm-10"><div id="imglogoview"><?php if(isset($logo)) echo '<img src="'.$logo.'" class="img-responsive"/>'; ?></div></div>
									<label for="focusedinput" class="col-sm-2 control-label">Logo</label>
									<div class="col-sm-4">
										<input name="txt_logo" id="logosite" type="text" class="form-control" value="{logo}">
									</div>
									<div class="col-sm-1">
										<a href="editor/filemanager/popup.aspx?type=1&amp;field_id=logosite" class="btn upload_btn btn-default btn-sm"><i class="fa fa-upload"></i> Chọn ảnh</a>
									</div>
									
									
									
								</div>
								<div class="form-group">
									<div class="col-sm-2"></div>
									<div class="col-sm-10"><div id="imgfaviconview"><?php if(isset($favicon)) echo '<img src="'.$favicon.'" class="img-responsive"/>'; ?></div></div>
									<label for="focusedinput" class="col-sm-2 control-label">Favicon</label>
									<div class="col-sm-4">
										<input name="txt_favicon" id="favicon" type="text" class="form-control1" value="{favicon}">
									</div>
									<div class="col-sm-1">
										<a href="editor/filemanager/popup.aspx?type=1&amp;field_id=favicon" class="btn upload_btn btn-default btn-sm"><i class="fa fa-upload"></i> Chọn ảnh</a>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Tiêu Đề</label>
									<div class="col-sm-6">
										<input name="txt_title" type="text" class="form-control1" id="focusedinput" value="{title}">
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_title"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Mô Tả</label>
									<div class="col-sm-6"><textarea name="txt_description" id="txtarea1" cols="50" rows="10" class="form-control1" style="height:100px;">{description}</textarea></div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_description"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Từ Khóa</label>
									<div class="col-sm-6">
										<input name="txt_keywords" type="text" class="form-control1" id="focusedinput" value="{keywords}">
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_keywords"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Điện Thoại</label>
									<div class="col-sm-6">
										<input name="txt_phone" type="text" class="form-control1" id="focusedinput" value="{phone}">
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_phone"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Địa Chỉ</label>
									<div class="col-sm-6"><textarea name="txt_address" id="txtarea1" cols="50" rows="10" class="form-control1" style="height:100px;">{address}</textarea></div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_address"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="disabledinput" class="col-sm-2 control-label">Ngày Hết Hạn</label>
									<div class="row">
										<div class="col-sm-3">
											<input name="email" disabled="" type="text" class="form-control1" id="disabledinput" value="<?php echo date("d/m/Y",$date_exp) ?>">
										</div>
										<a href="#"><button type="button" class="btn btn-info" >Gia Hạn Ngay</button></a>
									</div>
								</div>
								
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-default" name="submit_change_info" value="Lưu cài đặt">
										</div>
									</div>
								 </div>
							    </form>	 
  						</div>
  						<!-- Kết Thúc Thay đổi thông tin của website -->
  						<!-- tab social -->
  						<div class="tab-pane" id="social">
								<!-- Thay đổi thông tin của website -->
								<form class="form-horizontal" action="" method="post">
								
								<p class="error-massage"></p>
								<div class="row form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Facebook fanpage <i class="fa fa-facebook-square"></i></label>
									<div class="col-sm-6">
										<input name="txt_facebook" type="text" class="form-control1" id="focusedinput" value="<?php if(isset($social['facebook'])) echo $social['facebook']; ?>">
									</div>
									
									
								</div>
							
								<div class="row form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Google plus <i class="fa fa-google-plus-square"></i></label>
									<div class="col-sm-6">
										<input name="txt_google" type="text" class="form-control1" id="focusedinput" value="<?php if(isset($social['google'])) echo $social['google']; ?>">
									</div>
									
								</div>
								<div class="row form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Youtube chanel <i class="fa fa-youtube-play"></i></label>
									<div class="col-sm-6">
										<input name="txt_youtube" type="text" class="form-control1" id="focusedinput" value="<?php if(isset($social['youtube'])) echo $social['youtube']; ?>">
									</div>
									
								</div>
							
												
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_social" value="Áp dụng">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
							</form>
								
  						</div>
  						
  						<!-- google -->
  						<div class="tab-pane" id="google">
  							    <div class="col-sm-12">
  							    	<h4>Xác thực website</h4>
	  								<div class="panel panel-info" style="color: #777;font-size: 14px;">
	  									<div class="panel-body">
		  									
		  									<p style="">
		  									Nếu bạn muốn xác thực bằng cách tạo thẻ meta có dạng <code>&lt;meta name="google-site-verification" content="googleb00ccfc45693e6c1" &gt;</code> , bạn nhập nội dung là &lt;meta name="google-site-verification" content="googleb00ccfc45693e6c1"&gt;
												<br> <a target="_blank" href="http://websitemienphi.jnet.vn/huong-dan-tao-website-mien-phi-tren-jnet.html">Xem hướng dẫn</a>
		  									</p>
	  									</div>
	  								</div>
  								</div>
  								
								<form class="form-horizontal" action="" method="post">
								
								<div class="row form-group">
									<div class="col-sm-2" style="margin-left: 30px;">
										<label for="focusedinput" class="control-label">Hình thức xác thực</label>
									</div>
									<div class="col-sm-5">
										<label class="radio-inline"><input type="radio" name="google_verification_type" value="meta"  checked="checked">Tạo thẻ META</label>
									</div>
									
									
								</div>
								<div class="row form-group">
									<div class="col-sm-2" style="margin-left: 30px;">
										<label for="focusedinput" class="control-label">Nội dung</label>
									</div>	
									<div class="col-sm-5">
										<textarea class="form-control1" rows="55" style="height:80px;" name="txt_google_verification_content" placeholder='Ví dụ: &lt;meta name="google-site-verification" content="googleb00ccfc45693e6c1" &gt;'><?php if(isset($verification_google['txt_google_verification_content'])) echo $verification_google['txt_google_verification_content']; ?></textarea>
									</div>
									
									
								</div>
							
								<div class="col-sm-12">
  							    	<h4>Thêm mã Google Analytics</h4>
	  								<div class="panel panel-info" style="color: #777;font-size: 14px;">
	  									<div class="panel-body">
		  									
		  									<p style="">
		  										Để xem thống kê Google Analytics của website bạn dán mã Google cung cấp cho bạn vào ô bên dưới. <b>Lưu ý: Không có thẻ &lt;script&gt và &lt;/script&gt</b>
		  										<br>
		  									</p>
	  									</div>
	  								</div>
  								</div>
  							
								
								<div class="row form-group">
									<div class="col-sm-2" style="margin-left: 30px;">
										<label for="focusedinput" class="control-label">Nội dung</label>
									</div>
									<div class="col-sm-5">
										<textarea class="form-control1" rows="55" style="height:80px;" name="txt_google_analytics_content"><?php if(isset($verification_google['txt_google_analytics_content'])) echo $verification_google['txt_google_analytics_content']; ?></textarea>
									</div>
									
									
								</div>
												
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_google" value="Lưu xác thực">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
							</form>
								
  						</div>
  						
  	</div>
 </div>
    <script type="text/javascript">
	$( document ).ready(function() {
     	 $('.upload_btn').fancybox({ 
		   'width'     : 900,
		    'height'    : 900,
		    'autoSize': false,
		    'type'      : 'iframe',
		
		});

		
		$(function() {
		    // Executes a callback detecting changes with a frequency of 1 second
		    $("#logosite").observe_field(1, function( ) {
		        
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#imglogoview").html("<a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=logo&amp' class='btn iframe_btn'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		    $("#favicon").observe_field(1, function( ) {
		        
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#imgfaviconview").html("<a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=logo&amp' class='btn iframe_btn'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		});
     	
     
	});
	
	</script> 

