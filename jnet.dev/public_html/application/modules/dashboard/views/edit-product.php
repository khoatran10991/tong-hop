  <style>
#anhdaidien:hover {
	
    cursor: pointer;
    
}
#chonanhtrungbay:hover {
	
    cursor: pointer;
    
}
.GalleryImages {
	border: 1px solid #ddd;
    max-height: 90px;
	margin-top: 15px
}
.ImageDelete {
	display: block;
    position: absolute;
    font-size: 1.4em;
    overflow: hidden;
	
}
.hint {
	width: 100%;
    margin-top: 50px;
    margin-bottom: 0px;
    color: rgba(157, 157, 157, 0.71);
	
}
.hint i {
	font-size: 0.9em
	
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
    min-height: 100px;
    overflow:auto;
}
.addgalleryimage {
	width: 70px;
    height: 70px;
    border: 2px dashed #ccc;
	font-size: x-large;
    text-align: center;
    color: #ccc;
   
    cursor: pointer;
    margin-right: 14px;
    margin-top: 10px;
    float: left;
}
.addgalleryimage:hover {
	border: 2px dashed rgb(6, 217, 149);
}
.addgalleryimage a {
	font-size: x-large;
    color: #ccc;
}
.addgalleryimage img {
	
}
.addgalleryimage i {
	 margin-top: 15px;
	
	
}
</style>
<div class="xs">
<?php if(isset($message)&& $message != "") : ?>
	<p class="alert alert-success"><?php echo $message; ?></p>
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>
<!-- Thêm title, content, status... của sản phẩm cho website -->
<?php if(isset($error_info_site)) echo $error_info_site ?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" >
								
								
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
								<h4>Sửa sản phẩm</h4>
								<div class="col-sm-9" style="border-color: #3498db;">
								    
									<div class="row row-padding">
									    	
									      <div class="content">
											<div class="form-group">
												<div class="col-sm-12">
													<input value="<?php echo $product->product_name; ?>" name="txt_title_product" type="text" class="form-control1" id="txt_title_product" placeholder="Nhập Tiêu Đề Sản Phẩm..." style="font-weight: 500;font-size: 16px;">
												</div>
												
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_title_product"); ?></p>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">			
													<textarea name="txt_content_product" id="txt_editor" class="form-control1"><?php echo $product->product_content; ?></textarea>
												</div>
												<?php if(isset($editor)&&!empty($editor)){echo $editor; }?>
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_content_product"); ?></p>
												</div>
											</div>
										  </div>	
									</div>
									<!-- Data product -->
									<div class="row row-padding">
										
											<h5 class="title">Dữ liệu sản phẩm</h5>
											<div class="content">
												<ul class="nav nav-tabs">
												    <li class="active"><a data-toggle="tab" href="#general">Tổng quan</a></li>
												    <li><a data-toggle="tab" href="#quaity">Số lượng</a></li>
												    <li><a data-toggle="tab" href="#shipping">Vận chuyển</a></li>
												
											    </ul>
											
											  <div class="tab-content">
											    <div id="general" class="tab-pane fade in active">
											  		<div class="form-group">
											  			<div class="col-sm-12">	
															<div class="col-sm-3">
																Mã sản phẩm
															</div>
															<div class="col-sm-9">
																<input name="txt_sku_product" type="text" class="form-control1" id="txt_sku_product" placeholder="Mã sản phẩm" value="<?php echo $product->product_name; ?>">
															</div>
															
														</div>	
														<div class="col-sm-12" style="margin-top: 20px">	
															<div class="col-sm-3">
																Giá (VNĐ)
															</div>
															<div class="col-sm-9">
																<input name="txt_price_product" type="text" class="form-control1" id="txt_price_product" placeholder="Giá bán của sản phẩm" value="<?php echo $product->_price; ?>">
															</div>
															
														</div>				
														<div class="col-sm-12" style="margin-top: 20px">
															<div class="col-sm-3">
																Giá khuyến mãi (VNĐ)
															</div>
															<div class="col-sm-9">
																
																<input name="txt_sale_product" type="text" class="form-control1" id="txt_sale_product" placeholder="Giá bán khuyến mãi" value="<?php echo $product->_price_sale; ?>">
															
															</div>
														</div>
													</div>
											  
											  
											    </div>
											    <?php $stock = json_decode($product->manage_stock,true) ?>
											    <div id="quaity" class="tab-pane fade">
											  		<div class="form-group">
											  			<div class="col-sm-12">	
															<div class="col-sm-3">
																Tình trạng
															</div>
															<div class="col-sm-9">
																<select name="status" class="form-control" id="status">
																    <option <?php if(isset($stock['status']) && $stock['status'] ==1) echo "selected" ?>  value="1">Còn hàng</option>
																    <option <?php if(isset($stock['status']) && $stock['status'] ==0) echo "selected" ?> value="0">Hết hàng</option>
																    
																 </select>
																
															</div>
															
														</div>	
														
														<div class="col-sm-12" style="margin-top: 20px">	
															<div class="col-sm-3">
																Số lượng
															</div>
															<div class="col-sm-9">
																	<input <?php if(isset($stock['active']) && $stock['active']==1) echo "checked" ?> type="checkbox" id="manage_stock" name="manage_stock" value="1"> Kích hoạt quản lý số lượng
																	<?php 
																		if($stock['active']==1)
																			$manage_stock = "block";
																		else 
																			$manage_stock = "none";	
																	?>
																	<input style="margin-top: 20px;display:<?php echo $manage_stock ?>" name="txt_qty_product" type="text" class="form-control1" id="txt_qty_product" placeholder="Số lượng sản phẩm trong kho" value="<?php if(isset($stock['qty']) && $stock['qty']!=0) echo $stock['qty'] ?>">
															</div>
															
														</div>				
														
													</div>
											  
											    </div>
											    <?php $option = json_decode($product->product_options,true) ?>
											    <div id="shipping" class="tab-pane fade">
											  		<div class="form-group">
														<div class="col-sm-12" style="margin-top: 10px">	
															<div class="col-sm-3">
																Lớp vận chuyển
															</div>
															<div class="col-sm-9">
																<select name="shipping" class="form-control" id="shipping">
																    <option <?php if(isset($option['shipping']) && $option['shipping']=='fee') echo "selected" ?> value="fee">Tính phí vận chuyển</option>
																    <option <?php if(isset($option['shipping']) && $option['shipping']=='free') echo "selected" ?> value="free">Miễn phí vận chuyển</option>
																    
																 </select>
															</div>
															
														</div>				
														
													</div>
											  
											    </div>
											    
											  </div>
											</div>		
										
									</div>
									<!-- / data product -->
									<div class="row row-padding">
										
											<h5 class="title">Tối ưu seo</h5>
											<div class="content">
												<div class="form-group">
													<div class="col-sm-12" style="min-height: 100px">
														<div class="col-sm-2">
															Xem trước
														</div>
														<div class="col-sm-10">
															<a class="" id="jnetseo_title"><?php echo $product->product_name ?></a>
															<span class="url" id="jnetseo_url"><?php echo $url_site ?>/<span id="return_url"><?php echo "san-pham/".$product->product_url ?>.html</span></span>
															<p class="desc" id="jnetseo_desc">
																
																<span id="content_desc" class="content_desc"><?php if(isset($option['description'])) echo $option['description'] ?></span>
															</p>
														</div>
													</div>
													<div class="col-sm-12">	
														<div class="col-sm-2">
															Từ khóa
														</div>
														<div class="col-sm-10">
															<input name="txt_keywords_product" type="text" class="form-control1" id="focusedinput" placeholder="Từ Khóa - Keywords" value="<?php if(isset($option['keyword'])) echo $option['keyword'] ?>">
														</div>
														
													</div>
													
													<div class="col-sm-12">
														<div class="col-sm-2">
															Mô tả 
														</div>
														<div class="col-sm-10">
															<textarea id="txt_metadescription_product" rows="3" name="txt_metadescription_product"  class="form-control"  placeholder="Thẻ Mô Tả Trang"><?php if(isset($option['description'])) echo $option['description'] ?></textarea>
															<label><i>Thẻ mô tả tốt nhất hiển thị 156 ký tự. <span id="lenghtDesc"><?php $len = 156 - strlen($option['description']); echo $len ?> ký tự còn lại</span></i></label>
														</div>
													</div>
													
												</div>
											</div>		
										
									</div>
								</div>
								<div class="col-sm-3">
									<div class="row row-padding">
										<h5 class="title">Đăng sản phẩm</h5>
										<div class="content">
											<p class="post-item"><i class="fa fa-pencil"></i> Tình trạng: <b>Đã đăng</b></p>
											<p class="post-item"><i class="fa fa-calendar"></i> Ngày đăng: <b><?php echo $product->time_created ?></b></p>
											<input type="submit" class="btn btn-primary" onclick="return checkproduct()" name="update_product" value="Cập nhật" style="margin-left: 10px;">
											<input type="submit" class="btn btn-default" name="update_product_draft" value="Lưu Nháp" >
											
										</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Danh mục sản phẩm</h5>
										<div class="content">
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="sel1">Chọn danh mục</label>
											  <br>
											  <div class="scroll">
											  <?php 
						                    	if(isset($category_all)) {
						                    		
						                    	
						                    		
													foreach($category_all as $item) {
														 if(in_array($item['id'],$categorys_post)) 
														 	$check1 = "checked";
														 else 
														     $check1 = "";	
														echo '<input class="item" '.$check1.' type="checkbox" name="product_catelogys[]" id="'.$item['id'].'" value="'.$item['id'].'"/> '.$item['name'].'<br>';
														if(isset($item['child'])) {
															foreach($item['child'] as $subitem) {
																if(in_array($subitem['id'],$categorys_post)) 
																 	$check2 = "checked";
																 else 
																     $check2 = "";
																echo '<input '.$check2.' class="subitem subitem-'.$item['id'].'" data-parent="'.$item['id'].'" type="checkbox" name="product_catelogys[]" id="product_catelogys" value="'.$subitem['id'].'"/> '.$subitem['name'].'<br>';
															}
															if(isset($subitem['child'])) {
																foreach($subitem['child'] as $subsubitem) {
																	if(in_array($subsubitem['id'],$categorys_post)) 
																 	$check3 = "checked";
																 else 
																     $check3 = "";
																	echo '<input '.$check3.' class="subsubitem subsubitem-'.$item['id'].'" data-parent="'.$item['id'].'" type="checkbox" name="product_catelogys[]" id="product_catelogys" value="'.$subsubitem['id'].'"/> '.$subsubitem['name'].'<br>';
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
												<input name="imagethum" type="hidden" class="form-control1" id="imagethum" value="<?php echo $product->_thumnail ?>">
												<div style="margin-left:0px" title="Chọn ảnh" id="anhdaidien"  class="col-sm-12 col-sm-offset-2">
												<?php if(isset($product->_thumnail) && $product->_thumnail != "") {
														echo "<a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=imagethum&amp' class='btn iframe_btn' type='button'><img src='".$product->_thumnail."' class='img-responsive' /></a>";
													
													} else {
														echo '<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=imagethum&amp" class="btn iframe_btn" type="button">Chọn ảnh đại diện</a>n</div>';
														
													} 
												?>
												
											</div>
										</div>
									</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Trưng Bày</h5>
										<div class="content">
											<div class="form-group">
												<div id="galleryimages">
													<?php 
													$gallery = json_decode($product->gallery,true); 
														for($i=0;$i<=5;$i++) {
															$j = $i+1;
															echo '<input value="'.$gallery[$i].'" type="hidden" id="galleryimages_'.$j.'" name="galleryimages[]"/>'; 
														}
													?>
													
												</div>
												
												<div style="margin-left:0px"    class="col-sm-12 col-sm-offset-2">
												
													<?php
														$this->load->library('getthumb');
														for($i=0;$i<=5;$i++) { 
														$j = $i+1;
															if($gallery[$i]=="") {
																
																echo '<div class="addgalleryimage" id="image_preview_'.$j.'">
																<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_'.$j.'&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
															</div>';
															} else {
																
																$thumb = $this->getthumb->image($gallery[$i],"90x90");
																echo '<div class="addgalleryimage" id="image_preview_'.$j.'"><div onclick="deleteImageSelected('.$j.');" title="Xóa ảnh này" class="ImageDelete" href="javascript:void()"><i class="fa fa-times-circle fa-2"></i></div><a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_'.$j.'&amp" class="btn iframe_btn" type="button"><img src="'.$thumb.'" class="img-responsive" /></a></div>';
															}
														
														}
														?>
															
													
													
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

<!-- Ket thuc  title, content, status... của trang cho website -->
<script type="text/javascript">
	$( document ).ready(function() {
     	 $('.iframe_btn').fancybox({ 
		    'width'     : 900,
		    'height'    : 900,
		    'autoSize': false,
		    'scrolling' : 'yes', 
		    'type'      : 'iframe',
		   
		});

		$(function() {
		    // Executes a callback detecting changes with a frequency of 1 second
		    $("#imagethum").observe_field(1, function( ) {
		        //alert('Change observed! new value: ' + this.value );
		       // $('#anhdaidien').attr('src',this.value).show();
		       $("div#anhdaidien").html("<a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=imagethum&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");

		    });
		    
		    // ảnh trưng bày 1
		    $("#galleryimages_1").observe_field(1, function( ) {
		        if($("#galleryimages_1").val() != '') {
					 $("div#image_preview_1").html("<div onclick='deleteImageSelected(1);' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></div><a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_1&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");
				}
		      

		    });
		    // ảnh trưng bày 2
		    $("#galleryimages_2").observe_field(1, function( ) {
		        if($("#galleryimages_2").val() != '') {
		       $("div#image_preview_2").html("<div onclick='deleteImageSelected(2);' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></div><a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_2&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");
		       }

		    });
		    // ảnh trưng bày 3
		    $("#galleryimages_3").observe_field(1, function( ) {
		        if($("#galleryimages_3").val() != '') {
		       $("div#image_preview_3").html("<div onclick='deleteImageSelected(3);' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></div><a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_3&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");
		       }

		    });
		    // ảnh trưng bày 4
		    $("#galleryimages_4").observe_field(1, function( ) {
		        if($("#galleryimages_4").val() != '') {
		       $("div#image_preview_4").html("<div onclick='deleteImageSelected(4);' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></div><a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_4&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");
		       }

		    });
		    // ảnh trưng bày 5
		    $("#galleryimages_5").observe_field(1, function( ) {
		       if($("#galleryimages_5").val() != '') {
		       $("div#image_preview_5").html("<div onclick='deleteImageSelected(5);' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></div><a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_5&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");
		       }

		    });
		    // ảnh trưng bày 2
		    $("#galleryimages_6").observe_field(1, function( ) {
		        if($("#galleryimages_6").val() != '') {
		       $("div#image_preview_6").html("<div onclick='deleteImageSelected(6);' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></div><a  href='editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_6&amp' class='btn iframe_btn' type='button'><img src='" + this.value + "' class='img-responsive' /></a>");
		       }

		    });
		    
		    
		});
     	
     
	});
	

function deleteImageSelected(id) {
	$("#image-" + id ).remove();
	$("#input-" + id ).remove();
	
}


$("textarea#txt_metadescription_product").change(function(){
    $("span#content_desc").text($("textarea#txt_metadescription_product").val());
    var lenghtDesc = $("textarea#txt_metadescription_product").val().length;
    
	var lenghtRest = 156 - lenghtDesc;
	if(lenghtRest >= 0)
		$("span#lenghtDesc").html("<b style='color:green'>" + lenghtRest + "</b> ký tự còn lại.");
	else
		$("span#lenghtDesc").html("<b style='color:red'>" + lenghtRest + "</b> ký tự.");
});
$( "textarea#txt_metadescription_product" ).keypress(function() {
	 $("span#content_desc").text($("textarea#txt_metadescription_product").val());

		var lenghtDesc = $("textarea#txt_metadescription_product").val().length;

		var lenghtRest = 156 - lenghtDesc;
		if(lenghtRest >= 0)
			$("span#lenghtDesc").html("<b style='color:green'>" + lenghtRest + "</b> ký tự còn lại.");
		else
			$("span#lenghtDesc").html("<b style='color:red'>" + lenghtRest + "</b> ký tự.");
	 
	});	
$("input#txt_title_product").change(function(){
	var title = $("input#txt_title_product").val();
	$("a#jnetseo_title").text(title);
	
	$.post("<?php echo $url_site ?>/dashboard/products/get_title_replace", {
		title : title
	}, function(data) {
			if(data != '') {
				$("span#return_url").text(data + ".html");
				
			} else {
				
			}	
		
	  
		});
	
});

$(function(){
	   $('#manage_stock').click(function(){
	        if ($("#manage_stock").is(':checked')) {
			  $("#txt_qty_product").show();	
			  $("#txt_qty_product").focus();	
		           
	           return true;
	        }  else {
	        	$("#txt_qty_product").hide();		
	        }  
	      
	        
	   
	   })
	 
	    
	});	
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
function deleteImageSelected(id) {
	$("#galleryimages_" + id ).val('');
	$('div#image_preview_'+ id).html('<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_'+ id + '&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>');
	
}
function checkproduct() {
	
	if($('[name="product_catelogys[]"]').is(':checked'))
 			return true;
	else
   		{
   			alert('Phải chọn 1 danh mục cho sản phẩm!');	
			return false;
		}
	
	
	
	
}
</script>