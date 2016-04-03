<div class="xs">

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
								<!-- Thay đổi thông tin của website -->
								<form class="form-horizontal" action="" method="post" >
								<h4>Cấu Hình Chung</h4>
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
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
											<input name="email" disabled="" type="text" class="form-control1" id="disabledinput" value="{date_exp}">
										</div>
										<a href="#"><button type="button" class="btn btn-info" >Gia Hạn Ngay</button></a>
									</div>
								</div>
								
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_info" value="Chấp Nhận">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
								<!-- Kết Thúc Thay đổi thông tin của website -->
								
  		</div>
  	</div>
 </div>