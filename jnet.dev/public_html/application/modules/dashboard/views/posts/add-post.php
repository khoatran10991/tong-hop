<?php 
/*
 * View thêm bài viết
 * Ngày cập nhật gần nhất: Sang Nguyễn 23/01/2016
 */	
?>
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
.subitem {
	margin-left: 20px !important;; 
}
.subsubitem {
	margin-left: 40px !important;;
}
.scroll {
	width: 100%;
    height: 250px;
    overflow:auto;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>
<div class="xs">
<!-- Thêm title, content, status... bài viết cho website -->
			
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" >
								
								
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
								<h4>Thêm bài viết</h4>
								<div class="col-sm-9" style="border-color: #3498db;">
								    
									<div class="row row-padding">
									    	
									      <div class="content">
											<div class="form-group">
												<div class="col-sm-12">
													<input name="txt_title_post" type="text" class="form-control1" id="txt_title_post" placeholder="Nhập tiêu đề bài viết.." style="font-weight: 500;font-size: 16px;">
												</div>
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_title_post"); ?></p>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<div class="checkbox-inline1">
														<label><input type="checkbox" name="featured" value="1"> Bài nổi bật</label>
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<div class="col-sm-12">			
													<textarea name="txt_content_post" id="txt_editor" class="form-control1"></textarea>
												</div>
												<?php if(isset($editor)&&!empty($editor)){echo $editor; }?>
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_content_post"); ?></p>
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
															<input name="txt_keywords_post" type="text" class="form-control1" id="focusedinput" placeholder="Từ Khóa - Keywords">
														</div>
														
													</div>
													<div class="col-sm-12">
														<p class="help-block"><?php echo form_error("txt_keywords_post"); ?></p>
													</div>
														
													<div class="col-sm-12">
														<div class="col-sm-2">
															Mô tả 
														</div>
														<div class="col-sm-10">
															<textarea id="txt_metadescription_post" rows="3" name="txt_metadescription_post"  class="form-control"  placeholder="Thẻ Mô Tả Trang"></textarea>
															<label><i>Thẻ mô tả tốt nhất hiển thị 156 ký tự. <span id="lenghtDesc">156 ký tự còn lại</span></i></label>
														</div>
													</div>
													<div class="col-sm-12">
														<p class="help-block"><?php echo form_error("txt_metadescription_post"); ?></p>
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
											<input type="submit" class="btn btn-primary" onclick="return checkpost()" name="submit_post" value="Thêm mới">
											<input type="submit" class="btn btn-default" name="submit_post_draft" value="Lưu Nháp"  style="margin-left: 50px;">
											
										</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Chuyên mục bài viết</h5>
										<div class="content">
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="sel1">Chọn chuyên mục</label>
											  <br>
											  <div class="scroll">
											  <?php 
						                    	if(isset($category_all)) {
													foreach($category_all as $item) {
														echo '<input class="item" type="checkbox" name="post_catelogys[]" id="'.$item['id'].'" value="'.$item['id'].'"/> '.$item['name'].'<br>';
														if(isset($item['child'])) {
															foreach($item['child'] as $subitem) {
																echo '<input class="subitem subitem-'.$item['id'].'" data-parent="'.$item['id'].'" type="checkbox" name="post_catelogys[]" id="post_catelogy" value="'.$subitem['id'].'"/> '.$subitem['name'].'<br>';
															}
															if(isset($subitem['child'])) {
																foreach($subitem['child'] as $subsubitem) {
																	echo '<input class="subsubitem subsubitem-'.$item['id'].'" type="checkbox" data-parent="'.$item['id'].'" name="post_catelogys[]" id="'.$subsubitem['id'].'" value="'.$subsubitem['id'].'"/> '.$subsubitem['name'].'<br>';
																}
															}
														}
													}
													
													
												}
						                    ?>
						                    	</div>
											</div>
											
											<!--<label class="hint">Cần trợ giúp? Vui lòng xem qua tài liệu hướng dẫn <a title="Xem tài liệu hướng dẫn sử dụng" target="_blank" href="https://docs.jnet.vn/post/#addpost">tại đây</a>.</label>-->
										</div>
										
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Đại Diện</h5>
										<div class="content">
											<div class="form-group">
												<input name="imagethum" type="hidden" class="form-control1" id="imagethum" value="">
												<div style="margin-left:0px" title="Chọn ảnh" id="anhdaidien" class="col-sm-12 col-sm-offset-2">
													<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=imagethum&amp" class="btn iframe_btn" type="button">Chọn ảnh đại diện</a>
												</div>
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
	$( document ).ready(function() {
     	 $('.iframe_btn').fancybox({ 
		    'width'     : 900,
		    'height'    : 900,
		    'autoSize': false,
		    'type'      : 'iframe',
		    
		});

		$(function() {
		    // Executes a callback detecting changes with a frequency of 1 second
		    $("#imagethum").observe_field(1, function( ) {
		        //alert('Change observed! new value: ' + this.value );
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#anhdaidien").html("<a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=imagethum&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		});
     	
     
	});
	
</script>
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

	// $("#txt_metadescription_post");


$("textarea#txt_metadescription_post").change(function(){
    $("span#content_desc").text($("textarea#txt_metadescription_post").val());
    var lenghtDesc = $("textarea#txt_metadescription_post").val().length;
    
	var lenghtRest = 156 - lenghtDesc;
	if(lenghtRest >= 0)
		$("span#lenghtDesc").html("<b style='color:green'>" + lenghtRest + "</b> ký tự còn lại.");
	else
		$("span#lenghtDesc").html("<b style='color:red'>" + lenghtRest + "</b> ký tự.");
});
$( "textarea#txt_metadescription_post" ).keypress(function() {
	 $("span#content_desc").text($("textarea#txt_metadescription_post").val());

		var lenghtDesc = $("textarea#txt_metadescription_post").val().length;

		var lenghtRest = 156 - lenghtDesc;
		if(lenghtRest >= 0)
			$("span#lenghtDesc").html("<b style='color:green'>" + lenghtRest + "</b> ký tự còn lại.");
		else
			$("span#lenghtDesc").html("<b style='color:red'>" + lenghtRest + "</b> ký tự.");
	 
	});	
$("input#txt_title_post").change(function(){
	var title = $("input#txt_title_post").val();
	$("a#jnetseo_title").text(title);
	
	$.post("{url_site}/dashboard/posts/get_title_replace", {
		title : title
	}, function(data) {
			if(data != '') {
				$("span#return_url").text(data + ".html");
				
			} else {
				
			}	
		
	  
		});
	
});
function checkparent(idparent) {
	if($(this).is(':checked')){ 
		alert('checked');
	}
}
$( ".subitem" ).on( "click",function() {
	if($(this).is(':checked')){ 
	
		var parent = ($(this).attr('data-parent'));
		$('#'+parent).prop( "checked", true );
	} else {
		var parent = ($(this).attr('data-parent'));
		//$('#'+parent).prop( "checked", false );
	}
	
});
$( ".subsubitem" ).on( "click",function() {
	if($(this).is(':checked')){ 
	
		var parent = ($(this).attr('data-parent'));
		$('#'+parent).prop( "checked", true );
	} else {
		var parent = ($(this).attr('data-parent'));
		//$('#'+parent).prop( "checked", false );
	}
	
});
$( ".item" ).on( "click",function() {
	var parent = ($(this).val());
	if($(this).is(':checked')){
		
	} else {
		$('.subitem-'+parent).prop( "checked", false );
		$('.subsubitem-'+parent).prop( "checked", false );
	}

});
function checkpost() {
	
	if($('[name="post_catelogys[]"]').is(':checked'))
 			return true;
	else
   		{
   			alert('Phải chọn 1 danh mục cho sản phẩm!');	
			return false;
		}
	
	
	
	
}
</script>