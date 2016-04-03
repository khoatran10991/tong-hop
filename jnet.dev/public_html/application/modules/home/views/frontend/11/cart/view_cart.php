<section class="breadcrumbs">
									<div class="container">

										<ul class="horizontal_list clearfix bc_list f_size_medium">

											<li class="m_right_10 "><a href="index.html" class="default_t_color"><i class="fa fa-home"></i> Trang chủ<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<li class="m_right_10 ">Giỏ hàng</li>
										</ul>

									</div>
</section>
<section class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30" style="padding-bottom: 50px">

							<h2 class="tt_uppercase color_dark m_bottom_25"><i class="fa fa-shopping-cart"></i> Giỏ hàng</h2>
							<?php 
								if(isset($message) && $message != '') {
									echo '<div class="alert_box r_corners color_green success m_bottom_10">'.$message.'</div>';
								}
							
							?>
							<!--cart table-->
							<?php if(isset($cart) && count($cart)>=1 ) : ?>
							<div class="table-responsive">          
							  <table class="table">
							    <thead>
							      <tr class="f_size_large">
							      	<th>#</th>
							        <th>Sản phẩm</th>
							        <th>Giá</th>
							        <th>Số lượng</th>
							        <th>Thành tiền</th>
							        <th></th>
							      </tr>
							    </thead>
							    <tbody>
							    <?php foreach($cart as $item ) : ?>
							    <form action="" method="post">
							    	<input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>"/>	
							      <tr id="<?php echo $item['rowid'] ?>">
							        <td><a href="san-pham/<?php echo $item['url'] ?>.html"><img src="<?php echo $this->getthumb->image($item['thumb'],"90x90"); ?>" class="img-responsive"/></a></td>
							        <td><a class="d_inline_b color_dark" target="_blank" href="san-pham/<?php echo $item['url'] ?>.html"><?php echo $item['name']; ?></a></td>
							        <td><?php echo number_format($item['price'],0,".",".") ?>đ</td>
							        <td>   <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">

												<button onclick="return downqty('<?php echo $item['rowid'] ?>')" class="bg_tr d_block f_left" data-direction="down">-</button>

												<input readonly=""  type="text"  min="1" max="1000" name="qty"  value="<?php echo $item['qty'] ?>" class="f_left input_qty">

												<button onclick="return upqty('<?php echo $item['rowid'] ?>')" class="bg_tr d_block f_left" data-direction="up">+</button>
													
											</div> <br>
											<input style="display: none" id="update-<?php echo $item['rowid'] ?>" class="btn btn-default btn-xs" type="submit" name="updateQty" value="Cập nhật"/>
									</td>
							        <td><p class="f_size_large fw_medium scheme_color"><?php echo number_format($item['subtotal'],0,".",".") ?>đ</p></td>
							        <td><a href="javascript:void()" onclick="removeItem('<?php echo $item['rowid'] ?>')" class="color_dark"><i class="fa fa-times f_size_medium m_right_5"></i>Xóa</a></td>
							      </tr>
							      </form>
							     <?php endforeach; ?> 
							    </tbody>
							  </table>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 t_align_l">
								<a href="index.html"  class="tr_delay_hover r_corners button_type_12 d_inline_b color_dark bg_light_color_2 f_size_large">Tiếp tục mua</a>	
								<a href="dat-hang.html" style="margin-left: 10px" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Đặt hàng</a>
								
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 t_align_r">
								<p>Tạm tính: <?php echo number_format($total,0,".",".")?>đ</p>
								<p>Mã khuyến mãi:</p>
								<h5>Tổng cộng: <span class="fw_medium f_size_large scheme_color m_xs_bottom_10"><?php echo number_format($total,0,".",".")?>đ</span></h5>
							</div>
							<?php else : echo "<h4>Bạn chưa có sản phẩm trong giỏ hàng.</h4>"; ?>
							<?php endif; ?>
</section>
<script>
function downqty(rowid) {
	$('#update-'+rowid).show();
	return false;
}
function upqty(rowid) {
	$('#update-'+rowid).show();
	return false;
}

</script>