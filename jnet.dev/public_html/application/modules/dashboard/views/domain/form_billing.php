
<script type="text/javascript">
$( document ).ready(function() {
	$('#birthday').datepicker({
		format: "dd/mm/yyyy",
	    language: "vi"
	});
}); 

</script>
<div class="col-sm-12" id="form-billing">
	<div class="col-sm-12">
	<div class="table-responsive">          
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Tên miền</th>
	        <th>Giá</th>
	        <th>Thời hạn</th>
	        <th>Thành tiền</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td><?php echo $domain; ?></td>
	        <input class="form-control" type="hidden" name="domain" id="domain" value="<?php echo $domain; ?>">
	        <td><span id="price"><?php echo number_format($price,0,",",".") ?></span> vnđ</td>
	        <td>
	        	 <div class="form-group" id="form-year">
				  <select name="year" class="form-control" id="year" style="height: 25px;padding: 3px;" onchange="change3gds3();">
				    <option value="1">1 năm</option>
				    <option value="2">2 năm</option>
				    <option value="3">3 năm</option>
				    <option value="4">4 năm</option>
				    <option value="5">5 năm</option>
				    <option value="10">10 năm</option>
				  </select>
				</div>
	        </td>
	        <td><span id="subtotal"><?php echo number_format($price,0,",",".") ?></span> vnđ</td>
	      </tr>
	    </tbody>
	  </table>
 	 </div>
  </div>
  <div class="col-sm-12">
  	 <!-- Row start -->
  <div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <i class="icon-calendar"></i>
          <h3 class="panel-title">Thông tin thanh toán</h3>
        </div>
       <?php 
       	//print_r($data_billing);
       ?>
        <div class="panel-body">
          <form class="form-horizontal row-border" action="#">
            <div class="form-group" id="form-fullname" onclick="hasFixed('form-fullname');">
              <label class="col-md-2 control-label">Họ tên</label>
              <div class="col-md-10">
                <input type="text" name="fullname" class="form-control" value="<?php echo (isset($data_billing->full_name) ? $data_billing->full_name : "");  ?>">
              </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-6" id="form-cmnd" style="padding-left: 0px;" onclick="hasFixed('form-cmnd');">
            		<label class="col-md-4 control-label">Số CMND</label>
		              <div class="col-md-8">
		                <input class="form-control" type="text"  name="cmnd" value="">
		              </div>
            	</div>
            	<div class="col-sm-6" id="form-birthday" onclick="hasFixed('form-birthday');">
            		<label class="col-md-4 control-label">Ngày sinh</label>
		              <div class="col-md-8">
		                <input class="form-control" type="text" name="birthday" id="birthday" value="">
		              </div>
            	</div>
              
            </div>
            <div class="form-group" id="form-email" onclick="hasFixed('form-email');">
              <label class="col-md-2 control-label">Email</label>
              <div class="col-md-10">
                <input class="form-control" type="email" name="email" value="<?php echo (isset($data_billing->email) ? $data_billing->email : "");  ?>">
              </div>
            </div>
            <div class="form-group" id="form-phone" onclick="hasFixed('form-phone');">
              <label class="col-md-2 control-label">Số điện thoại</label>
              <div class="col-md-10">
                <input class="form-control" type="text" name="phonenumber" placeholder="Số điện thoại" value="<?php echo (isset($data_billing->phone) ? $data_billing->phone : "");  ?>">
              </div>
            </div>
      		<div class="form-group" id="form-address" onclick="hasFixed('form-address');">
              <label class="col-md-2 control-label">Địa chỉ</label>
              <div class="col-md-10">
                <input class="form-control" type="text" name="address" value="<?php echo (isset($data_billing->address) ? $data_billing->address : "");  ?>">
              </div>
            </div>
        
          
       
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->
  <!-- Row start -->
  <div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <i class="icon-calendar"></i>
          <h3 class="panel-title">Phương thức thanh toán</h3>
        </div>
        <div class="panel-body">
        	<span>Chọn phương thức mà bạn muốn dùng để thanh toán</span>
            <div class="form-group">
              <div class="radio">
				  <label><input checked type="radio" value="<?php echo md5("banking") ?>" name="method22061992ge5trtesja">Chuyển khoản ngân hàng (<a target="_blank" href="https://docs.jnet.vn/huong-dan/thanh-toan-qua-chuyen-khoan-ngan-hang.html"> Xem hướng dẫn ?</a>)</label>
				</div>
				<div class="radio">
				  <label><input type="radio" value="<?php echo md5("atm") ?>" name="method22061992ge5trtesja">Thanh toán online qua thẻ ATM nội địa (<a target="_blank" href="https://docs.jnet.vn/huong-dan/thanh-toan-qua-the-atm-noi-dia.html"> Xem hướng dẫn ?</a>)</label>
				</div>
				<div class="radio">
				  <label><input type="radio" value="<?php echo md5("cc") ?>" name="method22061992ge5trtesja">Thanh toán online qua Visa/Mastercard (<a target="_blank" href="https://docs.jnet.vn/huong-dan/thanh-toan-qua-the-visa-mastercard.html"> Xem hướng dẫn ?</a>)</label>
				</div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->
  
  </div>

</div>
<script>
	function change3gds3() {
		var year = $("#year").val();
		var price = <?php echo $price; ?>;
		var subtotal = price*year;
		$("#subtotal").text(subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
		
	}	
</script>
