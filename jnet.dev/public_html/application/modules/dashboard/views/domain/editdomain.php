<script type="text/javascript">
<!--
 function checkdelete() {
	var r = confirm("Bạn thực sự muốn xóa ?");
	if(r == true)
		return true;
	else 
		return false;
}	 
//-->
</script>
<div class="graphs">
   <div class="xs">
			<?php if(isset($message)&& $message != "") : ?>
			<p class="alert alert-success"><?php echo $message; ?></p>
			<?php endif; ?>	
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" action="" method="post" accept-charset="utf-8">
								<h4><a href="{url_site}/dashboard/setting/domain.html" class="btn btn-default btn-xs"><i class="fa fa-long-arrow-left"></i> Quay lại </a> Chỉnh sửa tên miền</h4>
								<p class="error-massage"></p>
								<div class="form-group">
									<label for="disabledinput" class="col-sm-2 control-label">Tên miền</label>
									<div class="col-sm-3">
										<input name="domain" type="text" class="form-control1" id="domain" value="{domain}">
									</div>
								</div>
								
								<div class="panel-button">
									<div class="row">
									
										<div class="col-sm-4 col-sm-offset-2">
							              <input type="submit" class="btn btn-primary" name="submit_change_domain" value="Cập nhật">
							              <input type="submit" onclick="return checkdelete();" class="btn btn-default" name="submit_delete_domain" value="Xóa tên miền này">
							            </div>
						            </div>
					            </div>	
								</form>
								
						</div>
			</div>
   </div>				
</div>