<section class="breadcrumbs">
									<div class="container">

										<ul class="horizontal_list clearfix bc_list f_size_medium">

											<li class="m_right_10 "><a href="index.html" class="default_t_color"><i class="fa fa-home"></i> Trang chủ<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<li class="m_right_10 "><a href="gio-hang.html" class="default_t_color">Giỏ hàng<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<li class="m_right_10 ">Đặt hàng<i class="fa fa-angle-right d_inline_middle m_left_10"></i></li>
											<li class="m_right_10 ">Thanh toán</li>
										</ul>

									</div>
</section>
<style>
	.bold {
		font-weight:bold
	}
</style>
<section class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_50" style="padding-bottom: 50px">
	<div class="alert_box r_corners color_green success m_bottom_10">
		<i class="fa fa-check-circle"></i><p>Đơn hàng được tạo thành công! Cảm ơn bạn đã đặt hàng.</p>
		<p style="color: #777;">Một email xác nhận đã được gửi tới <?php echo $customer['email'] ?>. Xin vui lòng kiểm tra email của bạn</p>
	</div>
	
	<div class="row" style="text-align: center">
		<?php 
			if(isset($global['logo']) && $global['logo'] != '')
			echo '<img class="logo-site" src="'.$global['logo'].'" title="Trang chủ" />';
								
		?>
	</div>
	<div class="row" style="margin-top: 0px">
		<h4>Thông tin đơn hàng:</h4>
		<div class="table-responsive">          
		  <table class="table">
		    <tbody>
		      <tr>
		        <td style="width: 180px;">Mã đơn hàng</td>
		        <td class="bold"><?php echo $order_number ?></td>
		       
		      </tr>
		      <tr>
		      	 <td>Ngày tạo</td>
		        <td class="bold"><?php echo date('d-m-Y',time()); ?></td>
		        
		      </tr>
		      <tr>
		      	<td>Số tiền</td>
		        <td class="bold"><?php echo number_format($total,0,".",".") ?>đ</td>
		      </tr>
		      <tr>
		      	<td>Hình thức vận chuyển</td>
		        <td class="bold">
		        	<?php if(isset($shipping[0])) : ?>
		        	<?php echo $shipping[0]->shipping_name . " - ". number_format($shipping[0]->shipping_fee,0,".",".") ?>đ <p style="color:#777"><?php echo $shipping[0]->shipping_description ?></p>
		        	<?php else : ?>
		        		Giao hàng tại nhà
		        		<p style="color:#777">Phí vận chuyển chỉ là tương đối, vui lòng liên hệ để biết thêm chi tiết.</p>
		        	<?php endif; ?>
		        </td>
		      </tr>
		      <tr>
		      	<td>Hình thức thanh toán</td>
		        <td class="bold">
		        	<?php if(isset($payment[0])) : ?>
		        	<?php echo $payment[0]->payment_name ?>
		        	<?php else : ?>
		        		Thu tiền tại nhà
		        	<?php endif; ?>
		        	
		        </td>
		      </tr>
		    </tbody>
		  </table>
	    </div>
	    <h4>Thông tin thanh toán và giao hàng:</h4>
		<div class="table-responsive">          
		  <table class="table">
		    <tbody>
		      <tr>
		        <td style="width: 180px;">Họ tên</td>
		        <td class="bold"><?php echo $customer['fullname'] ?></td>
		       
		      </tr>
		      <tr>
		      	 <td>Địa chỉ</td>
		        <td class="bold"><?php echo $customer['address'] ?></td>
		        
		      </tr>
		      <tr>
		      	<td>Số điện thoại</td>
		        <td class="bold"><?php echo $customer['phonenumber'] ?></td>
		      </tr>
		      <tr>
		      	<td>Email</td>
		        <td class="bold"><?php echo $customer['email'] ?></td>
		      </tr>
		      
		    </tbody>
		  </table>
	    </div>
	    <?php if(isset($items) && count($items)>=1 ) : ?>
	    <h4>Sản phẩm:</h4>
	    				<div class="table-responsive">          
							  <table class="table">
							    <thead>
							      <tr class="f_size_large">
							      	<th>#</th>
							        <th>Sản phẩm</th>
							        <th>Giá</th>
							        <th>Số lượng</th>
							        <th>Thành tiền</th>
							      </tr>
							    </thead>
							    <tbody>
							    <?php foreach($items as $item ) : ?>
							    <form action="" method="post">
							    	<input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>"/>	
							      <tr id="<?php echo $item['rowid'] ?>">
							        <td><a href="san-pham/<?php echo $item['url'] ?>.html"><img src="<?php echo $this->getthumb->image($item['thumb'],"90x90"); ?>" class="img-responsive"/></a></td>
							        <td><a class="d_inline_b color_dark" target="_blank" href="san-pham/<?php echo $item['url'] ?>.html"><?php echo $item['name']; ?></a></td>
							        <td><?php echo number_format($item['price'],0,".",".") ?>đ</td>
							        <td>   <div style="min-width: 30px;" class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">

											
												<input readonly=""  type="text"  min="1" max="1000" name="qty"  value="<?php echo $item['qty'] ?>" class="f_left input_qty">
				
											</div>
									</td>
							        <td><p class="f_size_large fw_medium scheme_color"><?php echo number_format($item['subtotal'],0,".",".") ?>đ</p></td>
							      
							      </tr>
							      </form>
							     <?php endforeach; ?> 
							    </tbody>
							  </table>
							</div>
		<?php endif; ?>					
		
	</div>
	
</section>