<script>
$('#myModal').modal('show');
</script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background:rgb(241, 241, 241)">
        <div class="modal-header" style="border-bottom: none;">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-2"></i></button>
          
        </div>
        <div class="modal-body">
          		<div class="form">
                        <div class="text-center col-sm-12 col-sm-offset-0">
                            <h3 style="color: #22a1e6;font-weight: bold">Tạo website bán hàng miễn phí trong 30s</h3>
                            <p class="caption register-info">Dùng thử 90 ngày phiên bản đầy đủ tính năng</p>
                        </div>
                       <div class="error" id="error" style="color:red;margin:10px;text-align:center"></div>
                        <div class="form-group">
                            <input required data-toggle="popover" title="Yêu cầu" data-content="Không khoảng trắng, dấu cách" class="form-control form-input margin-sm-bottom" data-val="true" data-val-length="Tên cửa hàng không dài quá 255 ký tự" data-val-length-max="255" data-val-required="Nhập vào tên cửa hàng của bạn" id="StoreName" name="StoreName" placeholder="Tên cửa hàng của bạn" type="text" value="">
                            <span class="caption domain">
                            	<span id="subdomain"></span><span class="store-alias">.jnet.vn</span> (Bạn có thể sử dụng tên miền riêng sau khi tạo website)
                            </span>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-input" data-val="true" data-val-number="The field BusinessTypeId must be a number." data-val-required="Bạn chưa chọn lĩnh vực kinh doanh." id="BusinessType" name="BusinessType">
                            <option value="0">--- Lĩnh vực kinh doanh ---</option>
								<option value="1">Máy tính Công nghệ Kỹ thuật số</option>
								<option value="2">Điện thoại</option>
								<option value="3">Điện máy</option>
								<option value="4">Máy văn phòng</option>
								<option value="5">Khác</option>
							</select>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 fullname form-group">
                                    <input class="form-control form-input" data-val="true" data-val-length="Tên không dài quá 100 ký tự" data-val-length-max="100" data-val-required="Nhập vào tên của bạn" id="FullName" name="FullName" placeholder="Họ tên của bạn" type="text" value="" required>
                                	
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 phonenumber form-group">
                                    <input class="form-control form-input" data-val="true" data-val-length="Số điện thoại phải từ 8 đến 15 ký tự" data-val-length-max="15" data-val-length-min="8" data-val-phone="PhoneNumber" data-val-required="Nhập vào số điện thoại" id="PhoneNumber" name="PhoneNumber" pattern="\d*" placeholder="Số điện thoại của bạn" type="text" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-input" data-val="true" data-val-length="Địa chỉ không dài quá 255 ký tự" data-val-length-max="255" data-val-required="Nhập vào địa chỉ" id="Address" name="Address" placeholder="Địa chỉ của bạn" type="text" value="" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-input" data-val="true" data-val-email="Email không đúng định dạng" data-val-length="Địa chỉ email không dài quá 100 ký tự" data-val-length-max="100" data-val-required="Nhập vào địa chỉ email" id="Email" name="Email" placeholder="Email của bạn" type="email" value="">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control form-input" name="Password" id="Password" placeholder="Password" required data-toggle="popover" title="Độ mạnh mật khẩu" data-content="Nhập mật khẩu...">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-checkbox checkbox-confirm">
                                        <div class="checkbox-five">
                                            <label class="btn btn-success active">
												
												<span class="glyphicon glyphicon-ok"></span>
											</label>
											<label for="Confirm" class="checkbox-label">Tôi đồng ý với <a href="#" target="_blank">quy định sử dụng</a> &amp; <a href="#" target="_blank">chính sách bảo mật</a> của JNet</label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center padding-md-top">
                            <a id="btn-registration" class="btn-registration" href="javascript:" onclick="return validation();" type="submit">Tạo website của tôi</a>
                        </div>
                    </div>
        </div>
        
      </div>
      
    </div>
  </div>		