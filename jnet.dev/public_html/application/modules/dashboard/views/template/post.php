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
								<h4>Trang chuyên mục bài viết</h4>
									<div class="form-group">
										<div class="col-sm-3" style="margin-left:30px">
											<label for="focusedinput" class="control-label">Mô tả chuyên mục</label>
										</div>
										<div class="col-sm-1">
											<input type="checkbox" name="displaydesc_catelogy" <?php if(isset($detailpost['displaydesc_catelogy']) && $detailpost['displaydesc_catelogy'] == 1) echo "checked";  ?> class="form-control" value="1">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3" style="margin-left:30px">
											<label for="focusedinput" class="control-label">Ảnh đại diện bài viết</label>
										</div>
										<div class="col-sm-1">
											<input type="checkbox" name="displaythumnail_catelogy" <?php if(isset($detailpost['displaythumnail_catelogy']) && $detailpost['displaythumnail_catelogy'] == 1) echo "checked";  ?> class="form-control" value="1">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3" style="margin-left:30px">
											<label for="focusedinput" class="control-label">Ngày đăng và tên chuyên mục</label>
										</div>
										<div class="col-sm-1">
											<input type="checkbox" name="displaydatecreate_catelogy" <?php if(isset($detailpost['displaydatecreate_catelogy']) && $detailpost['displaydatecreate_catelogy'] == 1) echo "checked";  ?> class="form-control" value="1">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3" style="margin-left:30px">
											<label for="focusedinput" class="control-label">Số bài trên mỗi trang</label>
										</div>
										<div class="col-sm-8">
											<input style="width:100px" name="postperpage_catelogy" type="number" class="form-control" id="usr" min="2" value="<?php if(isset($detailpost['postperpage_catelogy'])) echo $detailpost['postperpage_catelogy']; else echo "8";  ?>">
										</div>
									</div>
									
								<h4>Trang nội dung bài viết</h4>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị ngày đăng</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaydatecreate" <?php if(isset($detailpost['displaydatecreate']) && $detailpost['displaydatecreate'] == 1) echo "checked";  ?> class="form-control" value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị breadcrumb</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaybreadcrumb" class="form-control" <?php if(isset($detailpost['displaybreadcrumb']) && $detailpost['displaybreadcrumb'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị bài viết liên quan</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displayrelatepost" class="form-control" <?php if(isset($detailpost['displayrelatepost']) && $detailpost['displayrelatepost'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị nút like và chia sẽ</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaylikesocial" class="form-control" <?php if(isset($detailpost['displaylikesocial']) && $detailpost['displaylikesocial'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Số bài liên quan</label>
									</div>
									<div class="col-sm-8">
										<input style="width:100px" name="postperpage" type="number" class="form-control" id="usr" min="2" value="<?php if(isset($detailpost['postperpage'])) echo $detailpost['postperpage']; else echo "12";  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Tiêu đề bài liên quan</label>
									</div>
									<div class="col-sm-8">
										<input style="width:400px" name="titlerelatepost" type="text" class="form-control" id="usr"  value="<?php if(isset($detailpost['titlerelatepost'])) echo $detailpost['titlerelatepost']; else echo "Bài viết liên quan";  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Bình luận</label>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailpost['displaycomment']) && $detailpost['displaycomment'] == 'none') echo "checked";  ?> value="none"> Không sử dụng <i class="fa fa-ban"></i>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailpost['displaycomment']) && $detailpost['displaycomment'] == "system") echo "checked";  ?> value="system"> Hệ thống <i class="fa fa-commenting"></i>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailpost['displaycomment']) && $detailpost['displaycomment'] == "facebook") echo "checked";  ?> value="facebook"> Facebook <i class="fa fa-facebook-square"></i>
									</div> 
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($detailpost['displaycomment']) && $detailpost['displaycomment'] == "google") echo "checked";  ?> value="google"> Google <i class="fa fa-google-plus-square"></i>
									</div>
								</div>
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_detailpost" value="Lưu cài đặt trang chi tiết bài viết">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
								 </form>
								
  </div>
  </div>
  </div>