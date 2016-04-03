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


.chosen-select {
  width: 100%;
}
.chosen-select-deselect {
  width: 100%;
}
.chosen-container {
  display: inline-block;
  font-size: 14px;
  position: relative;
  vertical-align: middle;
}
.chosen-container .chosen-drop {
  background: #ffffff;
  border: 1px solid #cccccc;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: 0 8px 8px rgba(0, 0, 0, .25);
  box-shadow: 0 8px 8px rgba(0, 0, 0, .25);
  margin-top: -1px;
  position: absolute;
  top: 100%;
  left: -9000px;
  z-index: 1060;
}
.chosen-container.chosen-with-drop .chosen-drop {
  left: 0;
  right: 0;
      width: 300px;	
}
.chosen-container .chosen-results {
  color: #555555;
  margin: 0 4px 4px 0;
  max-height: 240px;
  padding: 0 0 0 4px;
  position: relative;
  overflow-x: hidden;
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}
.chosen-container .chosen-results li {
  display: none;
  line-height: 1.42857143;
  list-style: none;
  margin: 0;
  padding: 5px 6px;
}
.chosen-container .chosen-results li em {
  background: #feffde;
  font-style: normal;
}
.chosen-container .chosen-results li.group-result {
  display: list-item;
  cursor: default;
  color: #999;
  font-weight: bold;
}
.chosen-container .chosen-results li.group-option {
  padding-left: 15px;
}
.chosen-container .chosen-results li.active-result {
  cursor: pointer;
  display: list-item;
}
.chosen-container .chosen-results li.highlighted {
  background-color: #428bca;
  background-image: none;
  color: white;
}
.chosen-container .chosen-results li.highlighted em {
  background: transparent;
}
.chosen-container .chosen-results li.disabled-result {
  display: list-item;
  color: #777777;
}
.chosen-container .chosen-results .no-results {
  background: #eeeeee;
  display: list-item;
}
.chosen-container .chosen-results-scroll {
  background: white;
  margin: 0 4px;
  position: absolute;
  text-align: center;
  width: 321px;
  z-index: 1;
}
.chosen-container .chosen-results-scroll span {
  display: inline-block;
  height: 1.42857143;
  text-indent: -5000px;
  width: 9px;
}
.chosen-container .chosen-results-scroll-down {
  bottom: 0;
}
.chosen-container .chosen-results-scroll-down span {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") no-repeat -4px -3px;
}
.chosen-container .chosen-results-scroll-up span {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") no-repeat -22px -3px;
}
.chosen-container-single .chosen-single {
  background-color: #ffffff;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  color: #555555;
  display: block;
  height: 34px;
  overflow: hidden;
  line-height: 34px;
  padding: 0 0 0 8px;
  position: relative;
  text-decoration: none;
  white-space: nowrap;
}
.chosen-container-single .chosen-single span {
  display: block;
  margin-right: 26px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.chosen-container-single .chosen-single abbr {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") right top no-repeat;
  display: block;
  font-size: 1px;
  height: 10px;
  position: absolute;
  right: 26px;
  top: 12px;
  width: 12px;
}
.chosen-container-single .chosen-single abbr:hover {
  background-position: right -11px;
}
.chosen-container-single .chosen-single.chosen-disabled .chosen-single abbr:hover {
  background-position: right 2px;
}
.chosen-container-single .chosen-single div {
  display: block;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  width: 18px;
}
.chosen-container-single .chosen-single div b {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") no-repeat 0 7px;
  display: block;
  height: 100%;
  width: 100%;
}
.chosen-container-single .chosen-default {
  color: #777777;
}
.chosen-container-single .chosen-search {
  margin: 0;
  padding: 3px 4px;
  position: relative;
  white-space: nowrap;
  z-index: 1000;
}
.chosen-container-single .chosen-search input[type="text"] {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") no-repeat 100% -20px, #ffffff;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  margin: 1px 0;
  padding: 4px 20px 4px 4px;
  width: 100%;
}
.chosen-container-single .chosen-drop {
  margin-top: -1px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
}
.chosen-container-single-nosearch .chosen-search input {
  position: absolute;
  left: -9000px;
}
.chosen-container-multi .chosen-choices {
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  cursor: text;
  height: auto !important;
  height: 1%;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: relative;
  width: 300px;	
}
.chosen-container-multi .chosen-choices li {
  float: left;
  list-style: none;
}
.chosen-container-multi .chosen-choices .search-field {
  margin: 0;
  padding: 0;
  white-space: nowrap;
}
.chosen-container-multi .chosen-choices .search-field input[type="text"] {
  background: transparent !important;
  border: 0 !important;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: #555555;
  height: 32px;
  margin: 0;
  padding: 4px;
  outline: 0;
}
.chosen-container-multi .chosen-choices .search-field .default {
  color: #999;
}
.chosen-container-multi .chosen-choices .search-choice {
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  background-color: #eeeeee;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  background-image: -webkit-linear-gradient(top, #ffffff 0%, #eeeeee 100%);
  background-image: -o-linear-gradient(top, #ffffff 0%, #eeeeee 100%);
  background-image: linear-gradient(to bottom, #ffffff 0%, #eeeeee 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffeeeeee', GradientType=0);
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  color: #333333;
  cursor: default;
  line-height: 13px;
  margin: 6px 0 3px 5px;
  padding: 3px 20px 3px 5px;
  position: relative;
}
.chosen-container-multi .chosen-choices .search-choice .search-choice-close {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") right top no-repeat;
  display: block;
  font-size: 1px;
  height: 10px;
  position: absolute;
  right: 4px;
  top: 5px;
  width: 12px;
  cursor: pointer;
}
.chosen-container-multi .chosen-choices .search-choice .search-choice-close:hover {
  background-position: right -11px;
}
.chosen-container-multi .chosen-choices .search-choice-focus {
  background: #d4d4d4;
}
.chosen-container-multi .chosen-choices .search-choice-focus .search-choice-close {
  background-position: right -11px;
}
.chosen-container-multi .chosen-results {
  margin: 0 0 0 0;
  padding: 0;
}
.chosen-container-multi .chosen-drop .result-selected {
  display: none;
}
.chosen-container-active .chosen-single {
  border: 1px solid #66afe9;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  -webkit-transition: border linear .2s, box-shadow linear .2s;
  -o-transition: border linear .2s, box-shadow linear .2s;
  transition: border linear .2s, box-shadow linear .2s;
}
.chosen-container-active.chosen-with-drop .chosen-single {
  background-color: #ffffff;
  border: 1px solid #66afe9;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  -webkit-transition: border linear .2s, box-shadow linear .2s;
  -o-transition: border linear .2s, box-shadow linear .2s;
  transition: border linear .2s, box-shadow linear .2s;
}
.chosen-container-active.chosen-with-drop .chosen-single div {
  background: transparent;
  border-left: none;
}
.chosen-container-active.chosen-with-drop .chosen-single div b {
  background-position: -18px 7px;
}
.chosen-container-active .chosen-choices {
  border: 1px solid #66afe9;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  -webkit-transition: border linear .2s, box-shadow linear .2s;
  -o-transition: border linear .2s, box-shadow linear .2s;
  transition: border linear .2s, box-shadow linear .2s;
}
.chosen-container-active .chosen-choices .search-field input[type="text"] {
  color: #111 !important;
}
.chosen-container-active.chosen-with-drop .chosen-choices {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.chosen-disabled {
  cursor: default;
  opacity: 0.5 !important;
}
.chosen-disabled .chosen-single {
  cursor: default;
}
.chosen-disabled .chosen-choices .search-choice .search-choice-close {
  cursor: default;
}
.chosen-rtl {
  text-align: right;
}
.chosen-rtl .chosen-single {
  padding: 0 8px 0 0;
  overflow: visible;
}
.chosen-rtl .chosen-single span {
  margin-left: 26px;
  margin-right: 0;
  direction: rtl;
}
.chosen-rtl .chosen-single div {
  left: 7px;
  right: auto;
}
.chosen-rtl .chosen-single abbr {
  left: 26px;
  right: auto;
}
.chosen-rtl .chosen-choices .search-field input[type="text"] {
  direction: rtl;
}
.chosen-rtl .chosen-choices li {
  float: right;
}
.chosen-rtl .chosen-choices .search-choice {
  margin: 6px 5px 3px 0;
  padding: 3px 5px 3px 19px;
}
.chosen-rtl .chosen-choices .search-choice .search-choice-close {
  background-position: right top;
  left: 4px;
  right: auto;
}
.chosen-rtl.chosen-container-single .chosen-results {
  margin: 0 0 4px 4px;
  padding: 0 4px 0 0;
}
.chosen-rtl .chosen-results .group-option {
  padding-left: 0;
  padding-right: 15px;
}
.chosen-rtl.chosen-container-active.chosen-with-drop .chosen-single div {
  border-right: none;
}
.chosen-rtl .chosen-search input[type="text"] {
  background: url("http://alxlit.name/bootstrap-chosen/chosen-sprite.png") no-repeat -28px -20px, #ffffff;
  direction: rtl;
  padding: 4px 5px 4px 20px;
}
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-resolution: 144dpi) {
  .chosen-rtl .chosen-search input[type="text"],
  .chosen-container-single .chosen-single abbr,
  .chosen-container-single .chosen-single div b,
  .chosen-container-single .chosen-search input[type="text"],
  .chosen-container-multi .chosen-choices .search-choice .search-choice-close,
  .chosen-container .chosen-results-scroll-down span,
  .chosen-container .chosen-results-scroll-up span {
    background-image: url("chosen-sprite@2x.png") !important;
    background-size: 52px 37px !important;
    background-repeat: no-repeat !important;
  }
}
</style>
  
  <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
  <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
<div class="xs">
<!-- Thêm title, content, status... của sản phẩm cho website -->
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" >
								
								
								<p class="error-massage"><?php if(isset($error_info_site)&&!empty($error_info_site)){echo $error_info_site; }?></p>
								<h4>Tạo sản phẩm mới</h4>
								<div class="col-sm-9" style="border-color: #3498db;">
								    
									<div class="row row-padding">
									    	
									      <div class="content">
											<div class="form-group">
												<div class="col-sm-12">
													<input name="txt_title_product" type="text" class="form-control1" id="txt_title_product" placeholder="Nhập Tiêu Đề Sản Phẩm..." style="font-weight: 500;font-size: 16px;">
												</div>
												<div class="col-sm-12" style="margin-top: 10px">
													<p>Add widget (Premium) :
													<a onclick="return openLibImages()" class="btn btn-default"><i class="fa fa-plus-circle"></i> Box sản phẩm</a>
													<a href="javascript:void('Hình ảnh')" class="btn btn-default"><i class="fa fa-file-text-o"></i> Form liên hệ</a>
													<a href="javascript:void('Hình ảnh')" class="btn btn-default"><i class="fa fa-map-marker"></i> Bản đồ</a>
													</p>
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
												<ul class="nav nav-tabs">
												    <li class="active"><a data-toggle="tab" href="#general">Tổng quan</a></li>
												    <li><a data-toggle="tab" href="#quaity">Số lượng</a></li>
												    <li><a data-toggle="tab" href="#shipping">Vận chuyển</a></li>
												    <li><a data-toggle="tab" href="#related">Sản phẩm liên quan</a></li>
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
																<input name="txt_price_product" type="text" class="form-control1" id="txt_price_product" placeholder="Giá bán của sản phẩm">
															</div>
															
														</div>				
														<div class="col-sm-12" style="margin-top: 20px">
															<div class="col-sm-3">
																Giá khuyến mãi (VNĐ)
															</div>
															<div class="col-sm-9">
																
																<input name="txt_sale_product" type="text" class="form-control1" id="txt_sale_product" placeholder="Giá bán khuyến mãi">
															
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
											    <div id="related" class="tab-pane fade">
											      <div class="col-sm-12" style="margin-top: 10px">
											    	<div class="form-group">
											    	  <div class="co-sm-3">
											    	    Chọn các sản phẩm
											    	  </div>	
												      <div class="col-sm-8">
												          	
												            <select data-placeholder="Your Favorite Types of Bear" multiple class="chosen-select" tabindex="8">
												              <option value=""></option>
												              <option value="1">American Black Bear</option>
												              <option value="2">Asiatic Black Bear</option>
												              <option value="3">Brown Bear</option>
												              <option value="4">Giant Panda</option>
												              <option value="5">Sloth Bear</option>
												           
												              <option selected value="6">Polar Bear</option>
												             
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
											<input type="submit" class="btn btn-default" name="submit_product_draft" value="Lưu Nháp" >
											<input type="submit" class="btn btn-primary" name="submit_product" value="Đăng sản phẩm" style="margin-left: 20px;">
										</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Danh mục sản phẩm</h5>
										<div class="content category-all">
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="sel1">Chọn danh mục</label>
												<input type="checkbox" name="category[]" value="1"> Gạch men 
											    <input type="checkbox" name="category[]" value="2"> Gạch lót
											  </select>
											</div>
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="usr">Thứ tự:</label>
											  <input style="width: 30%;" type="text" class="form-control" id="order" name="order">
											</div>
											
										</div>
										
									</div>
									<div class="row row-padding">
										<h5 class="title">Thuộc tính của trang</h5>
										<div class="content">
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="sel1">Giao diện</label>
											  <select class="form-control" id="product_template" name="product_template">
											    <option value="default">Mặc định</option>
											    <option value="fullproduct">Full page</option>
											    <option value="sidebar">With sidebar</option>
											    
											  </select>
											</div>
											<div class="form-group" style="margin:0px 0px 10px 0px">
											  <label for="usr">Thứ tự:</label>
											  <input style="width: 30%;" type="text" class="form-control" id="order" name="order">
											</div>
											
											<label class="hint">Cần trợ giúp? Vui lòng xem qua tài liệu hướng dẫn <a title="Xem tài liệu hướng dẫn sử dụng" target="_blank" href="https://docs.jnet.vn/product/#addproduct">tại đây</a>.</label>
										</div>
										
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Đại Diện</h5>
										<div class="content">
											<div class="form-group">
												<input name="imagethum" type="hidden" class="form-control1" id="imagethum" value="">
												<div style="margin-left:0px" title="Chọn ảnh" id="anhdaidien" onclick="openLibImages(this)" class="col-sm-12 col-sm-offset-2">Chọn ảnh đại diện</div>
											</div>
										</div>
									</div>
									<div class="row row-padding">
										<h5 class="title">Ảnh Trưng Bày</h5>
										<div class="content">
											<div class="form-group">
												<div id="galleryimages">
													
												</div>
												
												<div style="margin-left:0px"    class="col-sm-12 col-sm-offset-2">
													<div title="Bấm giữ Ctr để chọn nhiều ảnh" id="chonanhtrungbay" onclick="openLibGalleryImages(this)">Chọn ảnh trưng bày sản phẩm</div>
													<div id="anhtrungbay"></div>
													
													<div class="hint"><i>Bấm giữ Ctr để chọn nhiều ảnh</i></div>
													
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
function openLibImages(div) {
    window.KCFinder = {
        callBack: function(url) {
            var urlfull = "{url_site}" + "" + url;
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

function openLibGalleryImages(div) {
    window.KCFinder = {
        callBackMultiple: function(files) {
            window.KCFinder = null;
           
            
            for (var i = 0; i < files.length; i++) {
            	 var urlfull = "{url_site}" + "" + files[i];
            	// alert("{url_site}" + "" + files[i]);
            	 var returnfiles = $("div#anhtrungbay").html();
            	// alert(returnfiles);
              	$("#galleryimages").html($("#galleryimages").html() + '<input id="input-' + i +'" name="galleryimages[]" type="hidden" class="form-control1" value="{url_site}' + files[i] +'">');
            	$("div#anhtrungbay").html($("div#anhtrungbay").html() + "<div id='image-"+ i +"' class='col-sm-6'><a onclick='deleteImageSelected("+ i +");' title='Xóa ảnh này' class='ImageDelete' href='javascript:void()'><i class='fa fa-times-circle fa-2'></i></a><img src='{url_site}" + files[i] + "' class='img-responsive GalleryImages' /></div>");
            }	
        }
    };
    window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
        'kcfinder_multiple', 'status=0, toolbar=0, location=600, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}

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
	
	$.post("{url_site}/dashboard/products/get_title_replace", {
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

</script>