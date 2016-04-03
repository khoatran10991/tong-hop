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
<div class="xs" style="padding: 10px 20px 20px 20px">
	<?php $this->load->view('template/menu.php') ?>
	
	<div class="row" id="loadhtml" style="padding: 20px;">
<!-- detail post -->
						<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong><?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
						</div>
  						<div class="tab-pane" id="options">
								<form class="form-horizontal" action="" method="post" >
								
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Kiểu header</label>
									</div>
									<div class="col-sm-2">
										<select name="headerStyle" class="form-control" id="sel1">
									        <option <?php if(isset($options['headerStyle']) && $options['headerStyle'] == 'header1') echo 'selected'; ?> value="header1">Header 1</option>
									        <option <?php if(isset($options['headerStyle']) && $options['headerStyle'] == 'header2') echo 'selected'; ?> value="header2">Header 2</option>
									        <option <?php if(isset($options['headerStyle']) && $options['headerStyle'] == 'header3') echo 'selected'; ?> value="header3">Header 3</option>
									        <option <?php if(isset($options['headerStyle']) && $options['headerStyle'] == 'header4') echo 'selected'; ?> value="header4">Header 4</option>
									    </select>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Thanh trình đơn trượt theo màn hình</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="menufixed" <?php if(isset($options['menufixed']) && $options['menufixed'] == 1) echo 'checked'; ?> class="form-control" value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị logo</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaylogo" class="form-control" <?php if(isset($options['displaylogo']) && $options['displaylogo'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Menu tìm kiếm ở thanh trình đơn</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="menu_search" class="form-control" <?php if(isset($options['menu_search']) && $options['menu_search'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Menu đăng nhập ở thanh trình đơn</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="menu_login" class="form-control" <?php if(isset($options['menu_login']) && $options['menu_login'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Menu giỏ hàng ở thanh trình đơn</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="menu_cart" class="form-control" <?php if(isset($options['menu_cart']) && $options['menu_cart'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiện menu khi rê chuột vào bên trái màn hình</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="menu_left" class="form-control" <?php if(isset($options['menu_left']) && $options['menu_left'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Icon thanh toán ở chân trang</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="footer_payment" class="form-control" <?php if(isset($options['footer_payment']) && $options['footer_payment'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_options" value="Lưu cài đặt">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
								 </form>
								 
				 
								 
								
  </div>
  </div>
  </div>