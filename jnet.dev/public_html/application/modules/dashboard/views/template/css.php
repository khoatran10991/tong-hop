<script language="Javascript" type="text/javascript" src="http://www.cdolivet.com/editarea/editarea/edit_area/edit_area_full.js"></script>
<script language="Javascript" type="text/javascript">
		// initialisation
		editAreaLoader.init({
			id: "css_3"	// id of the textarea to transform	
			,start_highlight: true	
			,font_size: "8"
			,font_family: "verdana, monospace"
			,allow_resize: "y"
			,allow_toggle: false
			,language: "en"
			,syntax: "css"	
			,toolbar: "search,undo, redo, |,select_font"
			,load_callback: "my_load"
			,save_callback: "my_save"
			,plugins: "charmap"
			,charmap_default: "arrows"
				
		});

	</script>

<style>
.btn-default {
	background-color: #F5F5F5;
	padding: 13px;
}
.btn-default:hover {
	background-color: #337ab7;
	color:white;
}
.jnetactive {
	background-color: #337ab7 !important;
	color:white !important;
}
</style>
<div class="xs" style="padding: 10px 20px 20px 20px">
	<?php $this->load->view('template/menu.php') ?>
	<div class="row" id="loadhtml" style="padding: 20px;">
		<h4>Nhập mã CSS riêng</h4>
		<p style="color:rgba(51, 51, 51, 0.78);padding-bottom:20px">Nếu bạn biết chĩnh sửa màu sắc giao diện bằng CSS, hãy nhập vào ô bên dưới. <code>Không nhập mã HTML,Javascript và các đoạn Meta</code></p>
		
		<form action="" method="post">
			<div class="col-sm-10">
								<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong><?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
				<textarea id="css_3" style="height: 450px; width: 100%;" name="css"><?php if(isset($customCSS['code'])) echo $customCSS['code']; else echo '/* CSS custom '.$url_site.' */'; ?></textarea>
			</div>	
			<div class="col-sm-12" style="margin-top: 20px;text-align: left;">
					<input class="btn btn-info" type="submit" name="save_css" value="Cập nhật"/>
					<input class="btn btn-primary" type="reset" value="Làm lại"/>
			</div>
		</form>
	</div>	
</div>