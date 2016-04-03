
<script type="text/javascript">
<!--
	// show modal
	$('#myModal').modal('show');

	// key press
	$('#StoreName').keyup(function () {
		var subdomain = $("#StoreName").val();
		subdomain = remove_unicode(subdomain); 
	    $('#subdomain').text(subdomain);
	});

	function remove_unicode(str) 
	{  
		  str= str.toLowerCase();  
		  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
		  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
		  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
		  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
		  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
		  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
		  str= str.replace(/đ/g,"d");  
		  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-"); 
		
		  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
		  str= str.replace(/^\-+|\-+$/g,"");  
		
		  return str;  
	} 
	function errorAlert(idInput) {
		
		$("#"+idInput).css("border","1px solid red");
		$('#btn-registration').html("Tạo website của tôi");
	}
	function isEmail(s) {
		if(s=="") return false;
		if(s.indexOf(" ")>0) 
			return false;
		if(s.indexOf("@")==-1)
			return false;
		var i=1; var sLength=s.length;
		if(s.indexOf(".")==-1)
			 return false;
		if(s.indexOf("..")!=-1)
			return false;
		if(s.indexOf("@")!=s.lastIndexOf("@")) 
			return false;
		if(s.lastIndexOf(".")==s.length-1)
			return false;
		var str="abcdefghikjlmnopqrstuvwxyz-@._0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		for(var j=0;j<s.length;j++)
		if(str.indexOf(s.charAt(j))==-1)
			return false;
		return true;
	}	
	function validation() {
	
		
		if($('#StoreName').val() == '' ) {
		//	alert("Bạn phải nhập tên cửa hàng");
			errorAlert("StoreName");
			return false;
			
		}
		if($('#BusinessType').val() == 0) {
		
			errorAlert("BusinessType");
			return false;
		}
		if($('#FullName').val() == '') {
		
			errorAlert("FullName");
			return false;
		}	 
		if($('#PhoneNumber').val() == '' || isNaN($('#PhoneNumber').val()) ) {
		
			errorAlert("PhoneNumber");
			return false;
		}
		if($('#Address').val() == '' ) {
			
			errorAlert("Address");
			return false;
		}
		if($('#Email').val() == '' || isEmail($('#Email').val()) == false ) {
			
			errorAlert("Email");
			return false;
		}
		if($('#Password').val() == '' ||  $('#Password').val().length < 6 ) {
			
			errorAlert("Password");
			return false;
		}
		$('#btn-registration').html('<i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>');
		$('#btn-registration').prop('disabled', true);
			
			// get value
			var StoreName = $('#StoreName').val();
			var BusinessType = $('#BusinessType').val();
			var FullName = $('#FullName').val();
			var Address = $('#Address').val();	
			var Email = $('#Email').val();
			var Password = $('#Password').val();
			var PhoneNumber = $('#PhoneNumber').val();
			
			
			$.post("store/register", {
				StoreName : StoreName,
				BusinessType : BusinessType,
				FullName : FullName,
				Address : Address,
				PhoneNumber : PhoneNumber,
				Email : Email,
				Password : Password
			}, function(data) {
					if(data != 1) {
						$('#error').html(data);
						$('#btn-registration').html("Tạo website của tôi");	
					} else {
						window.location.href = "/store/Setup.html";
					}	
				
			  
				});
	    	
		
		
	}	

	// function password
	$(document).ready(function(){

		//minimum 8 characters
		var bad = /(?=.{8,}).*/;
		//Alpha Numeric plus minimum 8
		var good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
		//Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
		var better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/;
		//Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
		var best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

		$('#Password').on('keyup', function () {
		    var password = $(this);
		    var pass = password.val();
		    var passLabel = $('[for="password"]');
		    var stength = 'Rất yếu';
		    var pclass = 'danger';
		    if (best.test(pass) == true) {
		        stength = 'Rất an toàn';
		        pclass = 'success';
		    } else if (better.test(pass) == true) {
		        stength = 'An toàn';
		        pclass = 'warning';
		    } else if (good.test(pass) == true) {
		        stength = 'Trung bình';
		        pclass = 'warning';
		    } else if (bad.test(pass) == true) {
		        stength = 'Yếu';
		    } else {
		        stength = 'Rất yếu';
		    }

		    var popover = password.attr('data-content', stength).data('bs.popover');
		    popover.setContent();
		    popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);

		});

		$('input[data-toggle="popover"]').popover({
		    placement: 'top',
		    trigger: 'focus'
		});

		})
//-->
</script>
<style>
.popover.primary {
    border-color:#337ab7;
	text-align:center
}
.popover.primary>.arrow {
    border-top-color:#337ab7;
}
.popover.primary>.popover-title {
    color:#fff;
    background-color:#337ab7;
    border-color:#337ab7;
	text-align:center
}
.popover.success {
    border-color:#d6e9c6;
}
.popover.success>.arrow {
    border-top-color:#d6e9c6;
}
.popover.success>.popover-title {
    color:#3c763d;
    background-color:#dff0d8;
    border-color:#d6e9c6;
}
.popover.info {
    border-color:#bce8f1;
}
.popover.info>.arrow {
    border-top-color:#bce8f1;
}
.popover.info>.popover-title {
    color:#31708f;
    background-color:#d9edf7;
    border-color:#bce8f1;
}
.popover.warning {
    border-color:#faebcc;
}
.popover.warning>.arrow {
    border-top-color:#faebcc;
}
.popover.warning>.popover-title {
    color:#8a6d3b;
    background-color:#fcf8e3;
    border-color:#faebcc;
}
.popover.danger {
    border-color:#ebccd1;
}
.popover.danger>.arrow {
    border-top-color:#ebccd1;
}
.popover.danger>.popover-title {
    color:#a94442;
    background-color:#f2dede;
    border-color:#ebccd1;
}
.btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
}
</style>
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
                            <p class="caption register-info">Dùng thử 30 ngày phiên bản đầy đủ tính năng</p>
                        </div>
                       <div class="error" id="error" style="color:red;margin:10px;text-align:center"></div>
                        <div class="form-group">
                            <input required data-toggle="popover" title="Yêu cầu" data-content="Không khoảng trắng, dấu cách" class="form-control form-input margin-sm-bottom" data-val="true" data-val-length="Tên cửa hàng không dài quá 255 ký tự" data-val-length-max="255" data-val-required="Nhập vào tên cửa hàng của bạn" id="StoreName" name="StoreName" placeholder="Tên cửa hàng của bạn" type="text" value="<?php echo $domain ?>">
                            <span class="caption domain">
                            	<span id="subdomain"><?php echo $domain ?></span><span class="store-alias">.jnet.vn</span> (Bạn có thể sử dụng tên miền riêng sau khi tạo website)
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
