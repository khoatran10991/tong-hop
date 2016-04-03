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
		<h4>Chỉnh sửa hiển thị box facebook và quản lý bình luận</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> Kéo thẻ box <code>Box Facebook</code></p>
		<hr>
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong> <?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		</div>
		<h4>Facebook fanpage</h4>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Tiêu đề box</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="titlebox" class="form-control" id="usr" placeholder="Để trống nếu không muốn hiện tiêu đề box" value="<?php if(isset($widget_settings['facebook']['titlebox'])) echo $widget_settings['facebook']['titlebox']; else echo "" ?>">
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Đường dẫn fanpage</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="fanpage" class="form-control" id="usr" placeholder="VD: https://facebook.com/jnet.vn" value="<?php if(isset($widget_settings['facebook']['fanpage'])) echo $widget_settings['facebook']['fanpage']; else echo "" ?>">
					</div>
			</div>
		</div>
		
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Ảnh bìa fanpage</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['facebook']['cover']) && $widget_settings['facebook']['cover'] == 1) echo "checked" ?> type="radio" class="form-controld" name="cover" value="1"/> Hiện
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['facebook']['cover']) && $widget_settings['facebook']['cover'] == 0) echo "checked" ?> type="radio" class="form-controld" name="cover" value="0"/> Ẩn
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">Hiển thị bạn bè đã thích</label>
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['facebook']['friends']) && $widget_settings['facebook']['friends'] == 1) echo "checked" ?> type="radio" class="form-controld" name="friends" value="1"/> Hiện
					</div>
					<div class="col-sm-1">
						<input <?php if(isset($widget_settings['facebook']['friends']) && $widget_settings['facebook']['friends'] == 0) echo "checked" ?> type="radio" class="form-controld" name="friends" value="0"/> Ẩn
					</div>
			</div>
		</div>
		<h4>Quản lý bình luận facebook</h4>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						<label for="focusedinput" class="control-label">ID ứng dụng quản lý</label>
					</div>
					<div class="col-sm-5">
						<input type="text" name="appid" class="form-control" id="usr" placeholder="VD: 971887739547167" value="<?php if(isset($widget_settings['facebook']['appid'])) echo $widget_settings['facebook']['appid']; else echo "" ?>">
					</div>
					<div class="col-sm-5">
						<p style="color: #999;font-size: 14px;">Nhập APP ID để có thể quản lý, xóa comment</p>
						<a style="font-size: 13px;color: #1994ef;" target="_blank" href="https://huongdan.jnet.vn/huong-dan-quan-ly-binh-luan-facebook"><i class="fa fa-question-circle"></i> Xem hướng dẫn</a>
						
					</div>
			</div>
		</div>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-2" style="">
						
					</div>
					<div class="col-sm-5">
						<input type="submit" name="submit_change_facebook" class="btn btn-default btn-sm"  value="Lưu thay đổi">
					</div>
			</div>
		</div>
		
		
		</form>
	</div>
</div>		