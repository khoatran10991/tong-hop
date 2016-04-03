<style>
#anhdaidien:hover {
	
    cursor: pointer;
    
}
.row-padding {
 	margin-bottom: 10px;
    border: 1px solid rgba(221, 221, 221, 0.92);
    border-radius: 2px;
	background:rgba(255, 255, 255, 0.58);
}
.row-padding .title {
	padding: 10px;
    border-bottom: 1px solid rgba(221, 221, 221, 0.92);
}
.row-padding .content {
	padding: 10px;
    
}
.col-sm-9 .row-padding {
	margin-right: 3px
}
.col-sm-9 .row-padding .title{
	
}
.post-item {
	font-size: 14px;
    color: #696464;
	margin-bottom:10px;
}
#jnetseo_title {
	display: block;
    overflow: hidden;
    color: #1e0fbe;
    font-size: 18px!important;
    line-height: 1.2;
    white-space: nowrap;
    text-overflow: ellipsis;
	text-decoration:none;
}
#jnetseo_url {
	color: #006621;
    font-size: 13px;
    line-height: 16px;
}
#jnetseo_desc {
	font-size: small;
    line-height: 1.4;
    word-wrap: break-word;
}

</style>
<div class="xs">
<!-- Thêm title, content, status... của trang cho website -->
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" >
								
								
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
								<h4>Tạo trang mới</h4>
								<div class="col-sm-9" style="border-color: #3498db;">
								    
									<div class="row row-padding">
									    	
									      <div class="content">
											<div class="form-group">
												<div class="col-sm-12">
													<input name="txt_title_page" type="text" class="form-control1" id="txt_title_page" placeholder="Nhập Tiêu Đề Trang..." style="font-weight: 500;font-size: 16px;">
												</div>
												<div class="col-sm-12" style="margin-top: 10px">
													<p>Add widget (Premium) :
													<a onclick="return openLibImages()" class="btn btn-default"><i class="fa fa-plus-circle"></i> Box sản phẩm</a>
													<a href="javascript:void('Form liên hệ')" class="btn btn-default"><i class="fa fa-file-text-o"></i> Form liên hệ</a>
													<a href="javascript:void('Bản đồ')" id="MarkerMap" class="btn btn-default"><i class="fa fa-map-marker"></i> Bản đồ</a>
													</p>
												</div>
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_title_page"); ?></p>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">			
													<textarea name="txt_content_page" id="txt_editor" class="form-control1"></textarea>
												</div>
												<?php if(isset($editor)&&!empty($editor)){echo $editor; }?>
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_content_page"); ?></p>
												</div>
											</div>
										  </div>	
									</div>
									<div class="row row-padding">
										
											<h5 class="title">Tối ưu seo</h5>
											<div class="content">
												<div class="form-group">
													<div class="col-sm-12" style="min-height: 100px">
														<div class="col-sm-2">
															Xem trước
														</div>
														<div class="col-sm-10">
															<a class="" id="jnetseo_title"></a>
															<span class="url" id="jnetseo_url">{url_site}/<span id="return_url"></span></span>
															<p class="desc" id="jnetseo_desc">
																
																<span id="content_desc" class="content_desc"> </span>
															</p>
														</div>
													</div>
													<div class="col-sm-12">	
														<div class="col-sm-2">
															Từ khóa
														</div>
														<div class="col-sm-10">
															<input name="txt_keywords_page" type="text" class="form-control1" id="focusedinput" placeholder="Từ Khóa - Keywords">
														</div>
														
													</div>
													<div class="col-sm-12">
														<p class="help-block"><?php echo form_error("txt_keywords_page"); ?></p>
													</div>
														
													<div class="col-sm-12">
														<div class="col-sm-2">
															Mô tả 
														</div>
														<div class="col-sm-10">
															<textarea id="txt_metadescription_page" rows="3" name="txt_metadescription_page"  class="form-control"  placeholder="Thẻ Mô Tả Trang"></textarea>
															<label><i>Thẻ mô tả tốt nhất hiển thị 156 ký tự. <span id="lenghtDesc">156 ký tự còn lại</span></i></label>
														</div>
													</div>
													<div class="col-sm-12">
														<p class="help-block"><?php echo form_error("txt_metadescription_page"); ?></p>
													</div>
												</div>
											</div>		
										
									</div>
								</div>
								<div class="col-sm-3">
									<div class="row row-padding">
										<h5 class="title">Đăng bài viết</h5>
										<div class="content">
											<p class="post-item"><i class="fa fa-pencil"></i> Tình trạng: <b>Thêm mới</b></p>
											<p class="post-item"><i class="fa fa-calendar"></i> Ngày đăng: <b><?php echo date("d-m-Y H:i:s",time()); ?></b></p>
											<input type="submit" class="btn btn-default" name="submit_page_draft" value="Lưu Nháp" >
											<input type="submit" class="btn btn-primary" name="submit_page" value="Tạo Trang" style="margin-left: 50px;">
										</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Thuộc tính của trang</h5>
										<div class="content">
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="sel1">Giao diện</label>
											  <select class="form-control" id="page_template" name="page_template">
											    <option value="default">Mặc định</option>
											    <option value="fullpage">Full page</option>
											    <option value="sidebar">With sidebar</option>
											    
											  </select>
											</div>
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="usr">Thứ tự:</label>
											  <input style="width: 30%;" type="text" class="form-control" id="order" name="order">
											</div>
											
											<label class="hint">Cần trợ giúp? Vui lòng xem qua tài liệu hướng dẫn <a title="Xem tài liệu hướng dẫn sử dụng" target="_blank" href="https://docs.jnet.vn/page/#addpage">tại đây</a>.</label>
										</div>
										
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Đại Diện</h5>
										<div class="content">
											<div class="form-group">
												<input name="imagethum" type="hidden" class="form-control1" id="imagethum" value="">
												<div style="margin-left:0px" title="Chọn ảnh" id="anhdaidien" onclick="openLibImages(this)" class="col-sm-12 col-sm-offset-2">Chọn Ảnh Đại Diện</div>
											</div>
										</div>
									</div>
									
								 </div>
								 <div class="clearfix"></div>
							
						</form>
						</div>
						
			</div>
</div>
<div class="widgetAddArea">

</div>
<!-- Ket thuc  title, content, status... của trang cho website -->
<script type="text/javascript">
function openLibImages(div) {
    window.KCFinder = {
        callBack: function(url) {
            var urlfull = "{url_site}" + "/" + url;
            $("input#imagethum").val(urlfull);
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Đang tải...</div>';
            $("div#anhdaidien").html("<img src='" + urlfull + "' class='img-responsive' />");
           
        }
    };
    window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}

	// $("#txt_metadescription_page");


$("textarea#txt_metadescription_page").change(function(){
    $("span#content_desc").text($("textarea#txt_metadescription_page").val());
    var lenghtDesc = $("textarea#txt_metadescription_page").val().length;
    
	var lenghtRest = 156 - lenghtDesc;
	if(lenghtRest >= 0)
		$("span#lenghtDesc").html("<b style='color:green'>" + lenghtRest + "</b> ký tự còn lại.");
	else
		$("span#lenghtDesc").html("<b style='color:red'>" + lenghtRest + "</b> ký tự.");
});
$( "textarea#txt_metadescription_page" ).keypress(function() {
	 $("span#content_desc").text($("textarea#txt_metadescription_page").val());

		var lenghtDesc = $("textarea#txt_metadescription_page").val().length;

		var lenghtRest = 156 - lenghtDesc;
		if(lenghtRest >= 0)
			$("span#lenghtDesc").html("<b style='color:green'>" + lenghtRest + "</b> ký tự còn lại.");
		else
			$("span#lenghtDesc").html("<b style='color:red'>" + lenghtRest + "</b> ký tự.");
	 
	});	
$("input#txt_title_page").change(function(){
	var title = $("input#txt_title_page").val();
	$("a#jnetseo_title").text(title);
	
	$.post("{url_site}/dashboard/pages/get_title_replace", {
		title : title
	}, function(data) {
			if(data != '') {
				$("span#return_url").text(data + ".html");
				
			} else {
				
			}	
		
	  
		});
	
});

$("#MarkerMap").click(function() {
	NProgress.start();
	$.post("{url_site}/dashboard/pages/markermaphtml", {
		accessKey : "{url_site}",
		accessID : "{id_store}"
	}, function(data) {
			if(data != '') {
				NProgress.done();
				$("#markermap").modal("show");
				$(".widgetAddArea").html(data);
				
			} else {
				
			}	
		
	  
	});
	
});


</script>