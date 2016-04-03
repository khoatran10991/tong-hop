<style>
.padding-bottom {
	padding-bottom: 20px
}
</style>
<div class="xs" style="padding: 10px 20px 20px 20px">

	<div class="row" id="loadhtml" style="padding: 20px;">
		<form action="" method="post">
		<h4>Chỉnh sửa box HTML 3</h4>
		<p>Để hiển thị chức năng này vào Giao diện <i class="fa fa-angle-double-right"></i> Tùy chỉnh <i class="fa fa-angle-double-right"></i> Bố cục trang web <i class="fa fa-angle-double-right"></i> Kéo thẻ box <code>Box HTML 3</code></p>
		<hr>
		<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong> <?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
		</div>
		<h5 id="1">Nội dung</h5>
		<div class="col-sm-12 padding-bottom">
			<div class="form-group">
					<div class="col-sm-12">			
						<textarea height="300px" rows="100" name="txt_content_html_3" id="txt_editor" class="form-control1"><?php if(isset($box_html['html_3'][0]->html_content)) echo $box_html['html_3'][0]->html_content; ?></textarea>
					</div>
					<?php if(isset($editor)&&!empty($editor)){echo $editor; }?>
					
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<input type="submit" name="submit_change_html_3" class="btn btn-default" value="Cập nhật"/>
			</div>
		</div>
		
		</form>
	</div>
</div>		