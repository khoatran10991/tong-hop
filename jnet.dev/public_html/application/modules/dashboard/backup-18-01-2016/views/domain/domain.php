
<link rel="stylesheet" type="text/css" href="template/backend/1/date-picker/css/bootstrap-datepicker.css" />
<script src="template/backend/1/date-picker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<style>
@media screen and (min-width: 768px) {
	
	#addDomain .modal-dialog  {width:500px;}

}
@media screen and (max-width: 750px) {
	
	#addDomain .modal-dialog  {width:95%}

}
.input-group-btn select {
	border-color: #ccc;
	margin-top: 0px;
    margin-bottom: 0px;
    padding-top: 7px;
    padding-bottom: 7px;
}

</style>

<div class="xs">
				  <div class="row">
						<div class="col-sm-12">
								
								<?php 
									extract($domains);
								?>
								<?php 
									if(isset($pre_domain) && $pre_domain['status'] != 1) :
										echo '<div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> Lưu ý: Cập nhật tên miền của bạn về địa chỉ IP : 188.166.255.34</div>';

									endif;
								?>
								<form class="form-horizontal" action="" method="post" accept-charset="utf-8">
								<h4><i class="fa fa-globe"></i> Quản lý tên miền <button id="btn-add-domain" onclick="javascript:return false;" data-toggle="modal" data-target="#addDomain"  class="btn btn-default btn-sm">Thêm tên miền</button></h4>
									<div class="table-responsive">          
										  <table class="table">
										    <thead>
										      <tr>
										       
										        <th>Tên miền</th>
										        <th>Trạng thái</th>
										        <th></th>
										       
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        
										        <td><?php echo str_replace("http://","",$base_domain['value']); ?></td>
										        <td><i class="fa fa-check"></i> Ok</td>
										        <td></td>
										       
										      </tr>
										      <?php 
										      	if(isset($pre_domain)) :
										      ?>
										        <tr>
										        
										        <td><?php echo str_replace("http://","",$pre_domain['value']); ?></td>
										        <td><?php if($pre_domain['status'] == 1) echo '<i class="fa fa-check"></i> Ok'; else echo "Chưa trỏ DNS"; ?></td>
										        <td><i class="fa fa-pencil-square-o fa-2 icon-edit"></i></td>
										      </tr>
										      
										      <?php 
										      	endif;
										      ?>
										    </tbody>
										  </table>
								 	</div>
								
								
									
							
								</form>
							</div>	
						</div>		
								<!-- Kết thúc form Đổi mật khẩu của email -->
						<div class="row" style="margin-top:20px">
							<div class="col-sm-12">	
								<div class="panel panel-default" style="text-align: center;">
								  <div class="panel-body">
								    <i style="color: #06D995;" class="fa fa-question-circle fa-2"></i> <span style="font-size: 14px;color: #555;">Bạn có thể xem hướng dẫn sử dụng qua <a target="_blank" href="https://docs.jnet.vn">tài liệu của JNet</a></span>
								  </div>
								</div>
							</div>
						</div>	
</div>
<div id="">	
  <div class="modal fade" id="addDomain" role="dialog">
    <div class="modal-dialog" id="modal-content">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i> <span id="title-modal" >Thêm tên miền</span></h4>
        </div>
        <div class="modal-body">
          <div class="row" id="form-modal">
	          <div class="col-sm-12" id="form-input-domain">
	               <div class="radio">
					  <label><input class="domain" checked type="radio" name="domain" value="new">Đăng ký tên miền mới</label>
					 	<p style="color: #999;font-size: 0.80em;padding-left: 20px;line-height: inherit;">
					 		<i class="fa fa-check-circle-o"></i> Bạn chưa có tên miền và bạn muốn có một tên miền làm thương hiệu cho website của bạn
					 	
					 	<br>
					 		<i class="fa fa-check-circle-o"></i> Có quản trị tên miền riêng
					 	</p>	
					 	
					</div>
					<div class="radio">
					  <label><input class="domain" type="radio" name="domain" value="update">Tôi đã có tên miền</label>
					   <p style="color: #999;font-size: 0.80em;padding-left: 20px;line-height: inherit;">
					 		<i class="fa fa-check-circle-o"></i> Bạn đã có tên miền và sẽ cập nhật DNS về JNet
					 	</p>
					</div>

					<div class="form-group" id="input-domain">
					    <label id="hint-domain-input">Nhập tên miền bạn muốn mua</label>
					    <div class="input-group">
					      
					      <span class="input-group-btn">
					        <select class="btn" id="https">
					          <option value="0">http://</option>
					          <option value="1">https://</option>
					 
					        </select>
					      </span>
					      <input name="inputDomain" id="inputDomain" type="text" class="form-control" placeholder="domain.com"><br>
					      
					    </div>
					    <i id="notification" style="color: #ef553a;font-size: 0.8em;"></i> <br>
					    	<span id="domain-support" style="font-size: 14px;color: #999;">Hỗ trợ: .com .net .info .biz .org .vn .com.vn .edu.vn .net.vn <a target="_blank" href="https://domain.jnet.vn">Xem bảng giá</a></span>
					
					</div>
	            </div>
            </div>
        </div>
        <div class="modal-footer">
        	<span id="row-button">
          		<button id="submit_next_domain" class="btn btn-primary">Tiếp tục</button>
          	</span>
          <button style="float: left;" type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        </div>
      </div>
    </div>
   </div>
</div>
<script>
	function createButton(id,text,fc) {
		return '<button onclick="'+fc+'()" id="'+ id +'" class="btn btn-primary">' + text +'</button>';
	}
											      
	$(".domain").click(function() {
		var selected = $("input[name=domain]:checked").val();
		if(selected == "update") {
			$("#hint-domain-input").text("Nhập tên miền đã có của bạn");
			$("#domain-support").hide();
		} else {
			$("#hint-domain-input").text("Nhập tên miền bạn muốn mua");
			$("#domain-support").show();
			
		}		  
	});
	
	$("#submit_next_domain").click(function() {
		
		var domain = $("#inputDomain").val();
		var https = $("#https").val();
		if(domain == "") {
			alert("Vui lòng nhập tên miền !");
			return false;
		}	

		$("#submit_next_domain").html("<i class='fa fa-cog fa-spin'></i> Đang kiểm tra");
		$("input").attr("disabled","disabled");
		$("#form-input-domain").animate({ opacity: '0.4'});
		
		
		// process
		var selected = $("input[name=domain]:checked").val();
		 $("#notification").text("");
		$.post("<?php echo $url_site ?>/dashboard/setting/checkDomain.html", {
			
			type : selected,
			domain : domain,
			https: https
			
		   
			
		}, function(data) {
			
			$("#form-input-domain").animate({ opacity: '1'});
				 if(data == 1) {
					 if(selected == "new") {
						 $("#notification").text("Tên miền này đã tồn tại, vui lòng chọn tên miền khác.");	
						
							
					 }	else if(selected == "update") {
							// xu ly update domain

					 }	 
					 
					 

				 }	 
				 else {
					 if(selected == "new") {
						 $.post("<?php echo $url_site ?>/dashboard/setting/get_domain_price.html", {
								domain : domain
								
							}, function(data) {
								if(data != 0) {
									$("#title-modal").text("Đăng ký tên miền");
									$("#form-modal").html(data);
										
									 $("#modal-content").animate({
								            width: '800px'
								     });
								     $("#row-button").html(createButton("confirm_payment_ok","Xác nhận","confirm_payment"));
								}	
								else 
									alert("Chúng tôi không hỗ trợ tên miền này, vui lòng chọn tên khác.")
							});	
		
					 } else if(selected == "update") {
						 alert("Tên miền này không tồn tại.")  	

					 }	 
					
					

				 }
				 
				 $("input").removeAttr("disabled");
				 $("#submit_next_domain").html("Tiếp tục");
				
			});
	});

	function hasError(div) {
		return $("#form-"+div).addClass("has-error");
	}	
	function confirm_payment() {
		var fullname = $("input[name=fullname]").val();
		var cmnd = $("input[name=cmnd]").val();
		var birthday = $("input[name=birthday]").val();
		var email = $("input[name=email]").val();
		var phone = $("input[name=phonenumber]").val();
		var address = $("input[name=address]").val();
		var year = $("select[name=year]").val();
		var domain = $("input[name=domain]").val();
		var method = $("input[name=method22061992ge5trtesja]:checked").val();
		

		if(cmnd == "")
			return $("#form-cmnd").addClass("has-error");
		else if(fullname == "")
			return $("#form-fullname").addClass("has-error");
		else if(birthday == "")
			return $("#form-birthday").addClass("has-error");
		else if(email == "")
			return $("#form-email").addClass("has-error");
		else if(phone == "")
			return $("#form-phone").addClass("has-error");
		else if(address == "")
			return $("#form-address").addClass("has-error");
		else if(year == "")
			return $("#form-year").addClass("has-error");
		else {
			var billing = {domain : domain,fullname : fullname,cmnd : cmnd,birthday:birthday,email:email,phone:phone,address:address,year:year,method:method,idStore:<?php echo $user['id_store'] ?>};
			
			$.post("{url_site}/dashboard/setting/create_order_domain.html", {
				billing : billing
				
			}, function(data) {
				if(data != 0) {
					$("#title-modal").text("Thanh toán");
					$("#form-modal").html(data);
						
					 $("#modal-content").animate({
				            width: '900px'
				     });
				     $("#row-button").html(createButton("finish_order","Hoàn tất","finish_order"));
				}	
				else 
					alert("Có lỗi.");
			});	

		}	
		
	}	
	function hasFixed(div) {
		$("#"+div).removeClass("has-error");
	}	


</script>

