<div class="xs">

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						
						<!-- Đổi mật khẩu của email -->
								<form class="form-horizontal" action="" method="post" accept-charset="utf-8">
								<h4>Thay Đổi Mật Khẩu</h4>
								<p class="error-massage"><?php if(isset($error_password)&&!empty($error_password)){echo $error_password; }?></p>
								<div class="form-group">
									<label for="disabledinput" class="col-sm-2 control-label">Email Đăng Nhập</label>
									<div class="col-sm-3">
										<input name="email" disabled="" type="text" class="form-control1" id="disabledinput" value="{email}">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Nhập Mật Khẩu Cũ</label>
									<div class="col-sm-4">
										<input name="txt_oldpassword" type="password" class="form-control1" id="inputPassword" placeholder="Mật Khẩu Cũ">
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_oldpassword"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Nhập Mật Khẩu Mới</label>
									<div class="col-sm-4">
										<input name="txt_newpassword" type="password" class="form-control1" id="inputPassword" placeholder="Mật Khẩu Mới">
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_newpassword"); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Nhập Lại Mật Khẩu Mới</label>
									<div class="col-sm-4">
										<input name="txt_renewpassword" type="password" class="form-control1" id="inputPassword" placeholder="Mật Khẩu Mới">
									</div>
									<div class="col-sm-4">
										<p class="help-block"><?php echo form_error("txt_renewpassword"); ?></p>
										
									</div>
								</div>
								<div class="panel-button">
									<div class="row">
									
										<div class="col-sm-4 col-sm-offset-2">
							              <input type="submit" class="btn btn-primary" name="submit_change_pass" value="Đổi Mật Khẩu">
							              <input type="reset" class="btn btn-default" value="Làm Lại">
							            </div>
						            </div>
					            </div>	
								</form>
								<!-- Kết thúc form Đổi mật khẩu của email -->
						</div>
			</div>
</div>