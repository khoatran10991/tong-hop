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
    font-size: 0.8em !important;
    overflow: hidden;
    margin-top: -20px;
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
.input-var {
	width: 260px;
	
}
.tab>li>a:hover {
	background-color: #f5f5f5 !important;
}
.tab>li.active>a {
	background-color: #f5f5f5 !important;
}
.label.label-info {
    background-color: #29bc94;
}
.bootstrap-tagsinput input {
	
	width: 400px !important;
	padding: 1px 6px !important;;
}
.button-trash {
	padding: 7px 12px;
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

<link rel="stylesheet" type="text/css" href="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $url_site ?>/template/backend/1/fancybox/jquery.observe_field.js"></script>
<div class="xs">

<!-- Thêm title, content, status... của sản phẩm cho website -->
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post">
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
								<h4>Tạo sản phẩm mới</h4>
								<div class="col-sm-9" style="border-color: #3498db;">
									<div class="row row-padding">
									      <div class="content">
											<div class="form-group">
												<div class="col-sm-12">
													<input name="txt_title_product" type="text" class="form-control1" id="txt_title_product" placeholder="Nhập Tiêu Đề Sản Phẩm..." style="font-weight: 500;font-size: 16px;">
												</div>
												<div class="col-sm-6">
													<p class="help-block"><?php echo form_error("txt_title_product"); ?></p>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">			
													<textarea name="txt_content_product" id="txt_editor" class="form-control1"></textarea>
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
												<ul class="tab nav nav-tabs">
												    <li class="active"><a data-toggle="tab" href="#general">Tổng quan</a></li>
												    <li><a data-toggle="tab" href="#quaity">Số lượng</a></li>
												    <li><a data-toggle="tab" href="#shipping">Vận chuyển</a></li>
												    <li><a data-toggle="tab" href="#variants">Các thuộc tính</a></li>
											    </ul>
											  <div class="tab-content">
											    <div id="general" class="tab-pane fade in active">
											  		<div class="form-group">
											  			<div class="col-sm-12">	
															<div class="col-sm-3">
																Mã sản phẩm
															</div>
															<div class="col-sm-9">
																<input name="txt_sku_product" type="text" class="form-control1" id="txt_sku_product" placeholder="Mã sản phẩm">
															</div>
														</div>	
														<div class="col-sm-12" style="margin-top: 20px">	
															<div class="col-sm-3">
																Giá (VNĐ)
															</div>
															<div class="col-sm-9">
																<input name="txt_price_product" type="text" class="form-control1" id="txt_price_product" placeholder="Giá bán của sản phẩm" value="0">
															</div>
														</div>				
														<div class="col-sm-12" style="margin-top: 20px">
															<div class="col-sm-3">
																Giá khuyến mãi (VNĐ)
															</div>
															<div class="col-sm-9">
																<input name="txt_sale_product" type="text" class="form-control1" id="txt_sale_product" placeholder="Giá bán khuyến mãi" value="0">
															</div>
														</div>
													</div>
											    </div>
											    <div id="quaity" class="tab-pane fade">
											  		<div class="form-group">
											  			<div class="col-sm-12">	
															<div class="col-sm-3">
																Tình trạng
															</div>
															<div class="col-sm-9">
																<select name="status" class="form-control" id="status">
																    <option value="1">Còn hàng</option>
																    <option value="0">Hết hàng</option>
																    
																 </select>
																
															</div>	
														</div>	
														<div class="col-sm-12" style="margin-top: 20px">	
															<div class="col-sm-3">
																Số lượng
															</div>
															<div class="col-sm-9">
																	<input type="checkbox" id="manage_stock" name="manage_stock" value="1"> Kích hoạt quản lý số lượng
																	<input style="margin-top: 20px;display:none" name="txt_qty_product" type="text" class="form-control1" id="txt_qty_product" placeholder="Số lượng sản phẩm trong kho">
															</div>	
														</div>	
													</div>
											    </div>
											    <div id="shipping" class="tab-pane fade">
											  		<div class="form-group">
														<div class="col-sm-12" style="margin-top: 10px">	
															<div class="col-sm-3">
																Lớp vận chuyển
															</div>
															<div class="col-sm-9">
																<select name="shipping" class="form-control" id="shipping">
																    <option value="fee">Tính phí vận chuyển</option>
																    <option value="free">Miễn phí vận chuyển</option>
																    
																 </select>
															</div>	
														</div>				
														
													</div>
											  
											    </div>
											    <div id="variants" class="tab-pane fade">
											      <div class="col-sm-12" style="margin-top: 10px">
											   
											    	  <div class="co-sm-3" style="padding-bottom: 20px">
											    	    Sản phẩm này có nhiều thuộc tính như kích thước, màu sắc...?
											    	  </div>
											    	  <div id="jnetvariant">
											    	  		<!--title-->
											    	      <div class="col-sm-12">
													      	<div class="col-sm-3">
													      		<div class="form-group">
																  <label for="usr"><b>Tên thuộc tính:</b></label>
																</div>
													      	</div>
													      	<div class="col-sm-8" style="margin-left: 10px;">
													      		<div class="form-group">
																  <label for="usr"><b>Giá trị:</b></label>
																</div>	
													      	</div> 				        
													      </div>
												    	  <!--variant-->	
													      <div class="col-sm-12" id="var-1">
													      	<div class="col-sm-3">
													      		<div class="form-group">
																  <input name="variants[1][name]" type="text" class="form-control" id="usr" placeholder="Ví dụ: Màu sắc,size...">
																</div>
													      	</div>
													      	<div class="col-sm-7" style="margin-left: 10px">
													      		<div class="form-group">
																  <input type="hidden" name="variants[1][value]" id="variant-1" value="" />
																  <input style="width: 270px" class="input-var" name="1" data-variant="1" id="tagsinput-1" type="text" value="" data-role="tagsinput" placeholder="Các giá trị kết thúc bằng dấu phẩy" />
																</div>	
													      	</div>
													      				        
													      </div> 
													      <!--/variant-->
													      <!--variant-->	
													      <div class="col-sm-12" id="var-2" style="display: none">
													      	<div class="col-sm-3">
													      		<div class="form-group">
																  <input name="variants[2][name]" type="text" value="" class="form-control" id="usr" placeholder="Tên thuộc tính">
																</div>
													      	</div>
													      	<div class="col-sm-7" style="margin-left: 10px">
													      		<div class="form-group">
																  <input type="hidden" name="variants[2][value]" id="variant-2" value="" />
																  <input class="input-var" data-variant="2" name="2"  id="tagsinput-2" type="text" value="" data-role="tagsinput" placeholder="Các giá trị" />
																</div>	
													      	</div>
													      	<div class="col-sm-1">
													      		<div class="form-group">
													      			<a onclick="variantremove(2)" class="button-trash btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
													      		</div>
													      	</div> 				        
													      </div> 
													      <!--/variant-->
													      <!--variant-->	
													      <div class="col-sm-12" id="var-3" style="display: none">
													      	<div class="col-sm-3">
													      		<div class="form-group">
																  <input name="variants[3][name]" type="text" value="" class="form-control" id="usr" placeholder="Tên thuộc tính">
																</div>
													      	</div>
													      	<div class="col-sm-7" style="margin-left: 10px">
													      		<div class="form-group">
																  <input type="hidden" name="variants[3][value]" id="variant-3" value="" />
																  <input class="input-var" data-variant="3" name="3"  id="tagsinput-3" type="text" value="" data-role="tagsinput" placeholder="Các giá trị" />
																</div>	
													      	</div>
													      	<div class="col-sm-1">
													      		<div class="form-group">
													      			<a onclick="variantremove(3)" class="button-trash btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
													      		</div>
													      	</div> 				        
													      </div> 
													      <!--/variant-->
												      </div>
												      <div class="col-sm-12">
												      	<div class="col-sm-12">
												      		<div class="form-group">
												      			<a id="addvariants" class="btn btn-default btn-sm">Thêm thuộc tính</a>
												      		</div>
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
															<input name="txt_keywords_product" type="text" class="form-control1" id="focusedinput" placeholder="Từ Khóa - Keywords">
														</div>
														
													</div>
													<div class="col-sm-12">
														<p class="help-block"><?php echo form_error("txt_keywords_product"); ?></p>
													</div>
														
													<div class="col-sm-12">
														<div class="col-sm-2">
															Mô tả 
														</div>
														<div class="col-sm-10">
															<textarea id="txt_metadescription_product" rows="3" name="txt_metadescription_product"  class="form-control"  placeholder="Thẻ Mô Tả Trang"></textarea>
															<label><i>Thẻ mô tả tốt nhất hiển thị 156 ký tự. <span id="lenghtDesc">156 ký tự còn lại</span></i></label>
														</div>
													</div>
													<div class="col-sm-12">
														<p class="help-block"><?php echo form_error("txt_metadescription_product"); ?></p>
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
											<input type="submit" onclick="return checkproduct()" class="btn btn-primary" name="submit_product" value="Đăng sản phẩm" style="margin-left: 10px;">	
											<input type="submit" class="btn btn-default" name="submit_product_draft" value="Lưu Nháp" >
											
										</div>
									</div>
									<div class="row row-padding">
										
										<h5 class="title">Danh mục sản phẩm</h5>
										<div class="content category-all">
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="sel1">Chọn danh mục</label>
											  <br>
											  <div class="scroll">
											  <?php 
						                    	if(isset($category_all)) {
													foreach($category_all as $item) {
														echo '<input class="item" type="checkbox" name="product_catelogys[]" id="'.$item['id'].'" value="'.$item['id'].'"/> '.$item['name'].'<br>';
														if(isset($item['child'])) {
															foreach($item['child'] as $subitem) {
																echo '<input class="subitem subitem-'.$item['id'].'" data-parent="'.$item['id'].'" type="checkbox" name="product_catelogys[]" id="product_catelogys" value="'.$subitem['id'].'"/> '.$subitem['name'].'<br>';
															}
															if(isset($subitem['child'])) {
																foreach($subitem['child'] as $subsubitem) {
																	echo '<input class="subsubitem subsubitem-'.$item['id'].'" type="checkbox" data-parent="'.$item['id'].'" name="product_catelogys[]" id="'.$subsubitem['id'].'" value="'.$subsubitem['id'].'"/> '.$subsubitem['name'].'<br>';
																}
															}
														}
													}
													
													
												}
						                    ?>
						                    	</div>
											</div>
											
										</div>
										
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Đại Diện</h5>
										<div class="content">
											<div class="form-group">
												<input name="imagethum" type="hidden" class="form-control1" id="imagethum" value="">
												<div style="margin-left:0px" title="Chọn ảnh" id="anhdaidien" class="col-sm-12 col-sm-offset-2"><a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=imagethum&amp" class="btn iframe_btn" type="button">Chọn ảnh đại diện</a></div>
											</div>
										</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Trưng Bày</h5>
										<div class="content">
											<div class="form-group">
												<div id="galleryimages">
													<input type="hidden" id="galleryimages_1" name="galleryimages[]"/>
													<input type="hidden" id="galleryimages_2" name="galleryimages[]"/>
													<input type="hidden" id="galleryimages_3" name="galleryimages[]"/>
													<input type="hidden" id="galleryimages_4" name="galleryimages[]"/>
													<input type="hidden" id="galleryimages_5" name="galleryimages[]"/>
													<input type="hidden" id="galleryimages_6" name="galleryimages[]"/>
												</div>
												
												<div style="margin-left:0px"     class="col-sm-12 col-sm-offset-2">
													<div class="addgalleryimage" id="image_preview_1">
														<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_1&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
													</div>
													<div class="addgalleryimage" id="image_preview_2">
														<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_2&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
													</div>
													<div class="addgalleryimage" id="image_preview_3">
														<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_3&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
													</div>
													<div class="addgalleryimage" id="image_preview_4">
														<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_4&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
													</div>
													<div class="addgalleryimage" id="image_preview_5">
														<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_5&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
													</div>
													<div class="addgalleryimage" id="image_preview_6">
														<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_6&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>
													</div>
												
												
													<!--<div title="Bấm giữ Ctr để chọn nhiều ảnh" id="chonanhtrungbay" onclick="openLibGalleryImages(this)">Chọn ảnh trưng bày sản phẩm</div>
													<div id="anhtrungbay"></div>
													
													<div class="hint"><i>Bấm giữ Ctr để chọn nhiều ảnh</i></div>-->
													
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
	
</script>
<script type="text/javascript">
function deleteImageSelected(id) {
	$("#galleryimages_" + id ).val('');
	$('div#image_preview_'+ id).html('<a  href="editor/filemanager/popup.aspx?type=1&amp;field_id=galleryimages_'+ id + '&amp" class="btn iframe_btn" type="button"><i class="fa fa-plus"></i></a>');
	
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
	
	$.post("{url_site}/dashboard/products/get_title_replace", {
		title : title
	}, function(data) {
			if(data != '') {
				$("span#return_url").text('san-pham/' + data + ".html");
				
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
	
$('#addvariants').click(function() {
	var numvar = $('.input-var').length + 1;
	if($('#var-2').is(':visible'))
	{
		$('#var-3').show();
	} else 
		$('#var-2').show();
	
	if($('#var-3').is(':visible')) 
		$('#addvariants').hide();
	
});

function variantremove(varid) {
	$('#var-' + varid).hide();
	if(!$('#var-3').is(':visible') || !$('#var-2').is(':visible')) 
		$('#addvariants').show();
}
$(function() {
	$('input[id*=tagsinput]').on('itemAdded', function(event) {
		var idtag = this.name;
		var variant = $('input#variant-' + idtag).val();
		if(variant.charAt(0) == ',') {
			var variant = variant.slice(1);
		}
		if(variant.length >= 1)
	    	$('input#variant-' + idtag).val(variant + "," +  event.item);
	    else 
	    	$('input#variant-' + idtag).val(event.item);	
	});
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