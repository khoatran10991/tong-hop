<script src="{url_site}/template/backend/1/jquery-minicolors/jquery.minicolors.js"></script>
    <link rel="stylesheet" href="{url_site}/template/backend/1/jquery-minicolors/jquery.minicolors.css">
<style>
<!--
.setting>li>a:hover {
	background-color: #f5f5f5 !important;
}
.setting>li.active>a {
	background-color: #f5f5f5 !important;
}
.chose-layout:hover {
	border: 1px solid #ccc;
}
-->
</style>
<div class="xs">
			<h4>Cấu hình nâng cao</h4>
			<ul class="setting nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#layout" aria-expanded="true">Bố cục</a></li>
			    <li class=""><a data-toggle="tab" href="#catelogypost" aria-expanded="false">Trang chuyên mục bài viết</a></li>
			    <li class=""><a data-toggle="tab" href="#detailpost" aria-expanded="false">Trang chi tiết bài viết</a></li>
			    <li class=""><a data-toggle="tab" href="#backup" aria-expanded="false">Sao lưu cài đặt</a></li>
			 
			 </ul>
			 <?php if(isset($message['success']) && $message['success'] != '') : ?><div class="alert alert-info" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $message['success']?></div><?php endif; ?>
  	          <?php if(isset($message['error']) && $message['error'] != '') : ?><div style="cursor: pointer" data-dismiss="alert" aria-label="close" class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $message['error']?></div><?php endif; ?>
  	        
  	         <div class="tab-content">
  	         			<!-- layout tab -->
						<div class="tab-pane active" id="layout">
								
								<form class="form-horizontal" action="" method="post" >
								<div class="form-group">
									<div class="col-sm-2" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Chọn bố cục trang web</label>
									</div>
									<div class="col-sm-9">
										<div class="col-sm-4 chose-layout">
											<label class="radio-inline"><input <?php if(isset($config['layout']['home-layout']) && $config['layout']['home-layout'] == 'sidebar-left') echo "checked" ?> type="radio" name="home-layout" value="sidebar-left"><img class="img-responsive" src="{url_site}/template/backend/1/images/layout-left.jpg" /></label>
										</div>
										<div class="col-sm-4 chose-layout">
											<label class="radio-inline"><input <?php if(isset($config['layout']['home-layout']) && $config['layout']['home-layout'] == 'fullhome') echo "checked" ?> type="radio" name="home-layout" value="fullhome"><img class="img-responsive" src="{url_site}/template/backend/1/images/layout-full.jpg" /></label>
										</div>
										<div class="col-sm-4 chose-layout">
											<label class="radio-inline"><input <?php if(isset($config['layout']['home-layout']) && $config['layout']['home-layout'] == 'sidebar-right') echo "checked" ?> type="radio" name="home-layout" value="sidebar-right"><img class="img-responsive" src="{url_site}/template/backend/1/images/layout-right.jpg" /></label>
											
										</div>
										
									</div>
								</div>
								
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_layout" value="Lưu bố cục">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
								 </form>
  						</div>
  				
  						<!-- tab catelogy -->
  						<div class="tab-pane" id="catelogypost">
								<form class="form-horizontal" action="" method="post" >
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Số bài viết hiển thị trên một trang</label>
									</div>
									<div class="col-sm-8">
										<input style="width:100px"  name="postperpage" type="number" class="form-control" id="usr" min="1" value="<?php if(isset($config['catelogy']['postperpage'])) echo $config['catelogy']['postperpage']; else echo "12" ;  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị tên chuyên mục</label>
									</div>
									<div class="col-sm-1">
										<input <?php if(isset($config['catelogy']['displayname']) && $config['catelogy']['displayname'] == 1) echo "checked";  ?> type="checkbox" name="displayname" class="form-control" value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị breadcrumb</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" <?php if(isset($config['catelogy']['displaybreadcrumb']) && $config['catelogy']['displaybreadcrumb'] == 1) echo "checked";  ?> name="displaybreadcrumb" class="form-control" value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị ngày đăng</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaydatecreated" class="form-control" <?php if(isset($config['catelogy']['displaydatecreated']) && $config['catelogy']['displaydatecreated'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								
							     <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<input type="submit" class="btn btn-success" name="submit_change_catelogy" value="Lưu cài đặt chuyên mục bài viết">
											<input type="reset" class="btn btn-default" value="Làm Lại">
										</div>
									</div>
								 </div>
								 </form>
								
  						</div>
  						<!-- detail post -->
  						<div class="tab-pane" id="detailpost">
								<form class="form-horizontal" action="" method="post" >
								
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị ngày đăng</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaydatecreate" <?php if(isset($config['detailpost']['displaydatecreate']) && $config['detailpost']['displaydatecreate'] == 1) echo "checked";  ?> class="form-control" value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị breadcrumb</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displaybreadcrumb" class="form-control" <?php if(isset($config['detailpost']['displaybreadcrumb']) && $config['detailpost']['displaybreadcrumb'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Hiển thị bài viết liên quan</label>
									</div>
									<div class="col-sm-1">
										<input type="checkbox" name="displayrelatepost" class="form-control" <?php if(isset($config['detailpost']['displayrelatepost']) && $config['detailpost']['displayrelatepost'] == 1) echo "checked";  ?> value="1">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Số bài liên quan</label>
									</div>
									<div class="col-sm-8">
										<input style="width:100px" name="postperpage" type="number" class="form-control" id="usr" min="1" value="<?php if(isset($config['detailpost']['postperpage'])) echo $config['detailpost']['postperpage']; else echo "12";  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Tiêu đề bài liên quan</label>
									</div>
									<div class="col-sm-8">
										<input style="width:400px" name="titlerelatepost" type="text" class="form-control" id="usr"  value="<?php if(isset($config['detailpost']['titlerelatepost'])) echo $config['detailpost']['titlerelatepost']; else echo "Bài viết liên quan";  ?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Bình luận</label>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($config['detailpost']['displaycomment']) && $config['detailpost']['displaycomment'] == 0) echo "checked";  ?> value="0"> Không sử dụng <i class="fa fa-ban"></i>
									</div>
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($config['detailpost']['displaycomment']) && $config['detailpost']['displaycomment'] == "facebook") echo "checked";  ?> value="facebook"> Facebook <i class="fa fa-facebook-square"></i>
									</div> 
									<div class="col-sm-2" style="text-align: center;">
										<input type="radio" name="displaycomment" class="form-control" <?php if(isset($config['detailpost']['displaycomment']) && $config['detailpost']['displaycomment'] == "google") echo "checked";  ?> value="google"> Google <i class="fa fa-google-plus-square"></i>
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
  						<!-- backup tab -->
  						<div class="tab-pane" id="backup">
								<form class="form-horizontal" action="" method="post" >
								
								<div class="form-group">
									<div class="col-sm-2" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Tạo bản backup</label>
									</div>
									<div class="col-sm-5">
										<input type="submit" name="backup" class="btn btn-default" value="Sao lưu" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-2" style="margin-left:30px">
										<label for="focusedinput" class="control-label">Khôi phục từ bản backup</label>
									</div>
									<div class="col-sm-5">
											<textarea class="form-control1" rows="55" style="height:80px;" name="txt_json_restore" placeholder='Dán nội dung trong file đã tải về từ sao lưu'></textarea>
											<br>
											<input type="submit" name="restore" class="btn btn-default" value="Khôi phục" />
											<br> <a style="color: #999;font-size: 12px;" target="_blank" href="https://docs.jnet.vn/huong-dan/sao-luu-cai-dat-nang-cao">Xem hướng dẫn</a>
											
									</div>
								</div>
								</form>
								
								
  						</div>
  						
  	</div>
 </div>
 <script type="text/javascript">
    $(document).ready(function () {

        $('.mini-color').each(function () {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time. Again,
            // they're only used for the purposes of this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                format: $(this).attr('data-format') || 'hex',
                keywords: $(this).attr('data-keywords') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                change: function (hex, opacity) {
                    var log;
                    try {
                        log = hex ? hex : 'transparent';
                        if (opacity) log += ', ' + opacity;
                        console.log(log);
                    } catch (e) {
                    }
                },
                theme: 'default'
            });

        });


    });
   </script> 