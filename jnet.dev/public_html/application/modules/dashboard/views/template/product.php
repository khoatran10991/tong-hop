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

	
	<div class="row" id="loadhtml" style="padding: 20px;">
<!-- detail post -->
						<div class="col-sm-12">
							<?php if(isset($message) && $message != 'error' && $message != '') : ?>
								<div class="alert alert-info" role="alert"> <strong><i class="fa fa-check"></i></strong><?php echo $message; ?></div>
								<?php elseif(isset($message) && $message== "error") :?>
								<div class="alert alert-danger" role="alert"> <strong><i class="fa fa-exclamation"></i></strong> Lỗi, không thể cập nhật ! 										</div>
								<?php endif; ?>
						</div>
  						<div class="tab-pane" id="detailpost">
								<form class="form-horizontal" action="" method="post" >
								
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị mô tả sản phẩm</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaydescription" class="form-control" <?php if(isset($detailproduct['displaydescription']) && $detailproduct['displaydescription'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Đánh giá sản phẩm</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displayreview" class="form-control" <?php if(isset($detailproduct['displayreview']) && $detailproduct['displayreview'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị sản phẩm liên quan</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displayrelateproduct" class="form-control" <?php if(isset($detailproduct['displayrelateproduct']) && $detailproduct['displayrelateproduct'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Tiêu đề sản phẩm liên quan</label>
									</div>
									<div class="col-sm-8">
										<input style="width:340px" name="titlerelatepost" type="text" class="form-control" id="usr"  value="<?php if(isset($detailproduct['titlerelateproduct'])) echo $detailproduct['titlerelateproduct']; else echo "Sản phẩm liên quan";  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị nút like và chia sẽ</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaylikesocial" class="form-control" <?php if(isset($detailproduct['displaylikesocial']) && $detailproduct['displaylikesocial'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Ẩn nút mua hàng</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaycartbutton" class="form-control" <?php if(isset($detailproduct['displaycartbutton']) && $detailproduct['displaycartbutton'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Số sản phẩm hiển thị trên mỗi trang danh mục</label>
									</div>
									<div class="col-sm-8">
										<input style="width:340px" name="numberproducts" type="number" min="1" max="100" class="form-control" id="usr"  value="<?php if(isset($detailproduct['numberproducts'])) echo $detailproduct['numberproducts']; else echo "12";  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Bình luận</label>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailproduct['displaycomment']) && $detailproduct['displaycomment'] == 'none') echo "checked";  ?> value="none"> Không sử dụng <i class="fa fa-ban"></i>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailpost['displaycomment']) && $detailproduct['displaycomment'] == 'system') echo "checked";  ?> value="system"> Hệ thống <i class="fa fa-commenting"></i>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailproduct['displaycomment']) && $detailproduct['displaycomment'] == "facebook") echo "checked";  ?> value="facebook"> Facebook <i class="fa fa-facebook-square"></i>
									</div> 
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailproduct['displaycomment']) && $detailproduct['displaycomment'] == "google") echo "checked";  ?> value="google"> Google <i class="fa fa-google-plus-square"></i>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">
											Nội dung dưới thông tin sản phẩm
											<br><i style="color: #777;">(Hiển thị ở tất cả sản phẩm)</i>
										</label>
										
									</div>
									<div class="col-sm-8">		
										<textarea name="content_products" id="txt_editor" class="form-control1"><?php if(isset($detailproduct['content_products'])) echo $detailproduct['content_products']  ?></textarea>
										<?php if(isset($editor)&&!empty($editor)){echo $editor; }?>
									</div>
								</div>
								
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-12 col-sm-offset-3">
											<input type="submit" class="btn btn-success" name="submit_change_detailproduct" value="Lưu cài đặt">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
								 </form>
								
  </div>
  </div>
  </div>