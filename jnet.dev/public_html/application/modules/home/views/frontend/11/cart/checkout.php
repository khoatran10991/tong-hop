<section class="breadcrumbs">
									<div class="container">

										<ul class="horizontal_list clearfix bc_list f_size_medium">

											<li class="m_right_10 "><a href="index.html" class="default_t_color"><i class="fa fa-home"></i> Trang chủ<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<li class="m_right_10 "><a href="gio-hang.html" class="default_t_color">Giỏ hàng<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
											<li class="m_right_10 ">Đặt hàng</li>
										</ul>

									</div>
</section>
<section class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30" style="padding-bottom: 50px">

							<h2 class="tt_uppercase color_dark m_bottom_25">Đặt hàng và thanh toán</h2>
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
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 t_align_l">
								<form class="d_ib_offset_0 d_inline_middle d_xs_block w_xs_full m_xs_bottom_5">

												<input type="text" placeholder="Nhập mã khuyến mãi" name="" class="r_corners f_size_medium">

												<button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">Lưu</button>

								</form>
								
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 t_align_r">
								<p>Tạm tính: <?php echo number_format($total,0,".",".")?>đ</p>
								<p>Mã khuyến mãi:</p>
								<h5>Tổng cộng: <span class="fw_medium f_size_large scheme_color m_xs_bottom_10"><?php echo number_format($total,0,".",".")?>đ</span></h5>
							</div>
							
							
							
							<!--billing-->
							<form action="" method="post">
							<div class="m_xs_bottom_30" style="padding-bottom: 50px">
								
								<hr class="m_bottom_15">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m_xs_bottom_30">
									<div class="">

										<h4 class="fw_medium m_bottom_15">Thông tin mua hàng</h4>

										

											<ul>

												<li class="m_bottom_15">

													<label for="c_name_1" class="d_inline_b m_bottom_5">Tên công ty/Tổ chức</label>

													<input type="text" id="c_name_1" name="company" class="r_corners full_width">

												</li>
												<li class="m_bottom_15">

													<label for="m_name_1" class="d_inline_b m_bottom_5 required">Họ và tên</label>

													<input type="text" id="m_name_1" name="fullname" required="" class="r_corners full_width">

												</li>
												
												<li class="m_bottom_15">

													<label for="phone_1" class="d_inline_b m_bottom_5 required">Số điện thoại</label>

													<input type="text" id="phone_1" name="phonenumber" required="" class="r_corners full_width">

												</li>
												<li class="m_bottom_15">

													<label for="address_1" class="d_inline_b m_bottom_5 required">Địa chỉ</label>

													<input type="text" id="address_1" name="address" class="r_corners full_width">

												</li>
												<li class="m_bottom_15">

													<label for="m_name_1" class="d_inline_b m_bottom_5 required">Email</label>

													<input type="text" id="m_name_1" name="email" required="" class="r_corners full_width">

												</li>
												<li class="m_bottom_15">

													<label class="d_inline_b m_bottom_5 required">Tỉnh/Thành phố</label>

													<!--product name select-->

													
														<select class="form-control full_width" name="province">
															<?php if(isset($provinces)) : foreach($provinces as $province) : ?>
															<option value="<?php echo $province->id ?>"><?php echo $province->title ?></option>
															<?php endforeach;endif; ?>

														</select>

													

												</li>
											</ul>

										

									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="">

										<h4 class="fw_medium m_bottom_15">Vận chuyển</h4>

										<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_15">
											<?php if(isset($shipping) && isset($shipping[0])) : $i=1; foreach($shipping as $ship)  :?>
											<figure class="block_select clearfix relative m_bottom_15 <?php if($i==1) echo 'selected'; ?>">

												<input type="radio" value="<?php echo $ship->id ?>" <?php if($i==1) echo 'checked'; ?>  name="shipping" class="d_none">

												<figcaption>

													<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5"><?php echo $ship->shipping_name ?> - <?php echo number_format($ship->shipping_fee,0,".",".") ?>đ</h5>
													<p style="color: #999;"><?php echo $ship->shipping_description ?></p>
												</figcaption>

											</figure>

										
											<?php $i++; endforeach; else : ?>
											<figure class="block_select clearfix relative m_bottom_15 selected">

												<input type="radio" value="0" checked="" name="shipping" class="d_none">

												<figcaption>

													<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Giao hàng tận nơi (Miễn phí)</h5>
												</figcaption>

											</figure>
											
											<?php endif; ?>

										</div>
										<h4 class="fw_medium m_bottom_15">Thanh toán</h4>

										<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_15">

											<figure class="block_select clearfix relative m_bottom_15 selected">

												<input type="radio" value="1" checked="" name="payment" class="d_none">

												<figcaption>

													<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Giao hàng thu tiện tại nhà</h5>
												</figcaption>

											</figure>

											<hr class="m_bottom_20">

											<figure class="block_select clearfix relative">

												<input value="2" type="radio" name="payment" class="d_none">
												<figcaption>

													<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Chuyển khoản ngân hàng</h5>
												</figcaption>

											</figure>

										</div>

									</div>	
								</div>
								<div class="col-sm-12">
									<textarea id="notes" placeholder="Ghi chú" name="notes" class="r_corners notes full_width"></textarea>
									
								</div>
								
							</div>
							
							
							<div class="col-sm-12" style="text-align: center">
								
								<input type="submit" name="order" style="margin-left: 10px" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large" value="Đặt hàng">
								
								
							</div>
							</form>
							<?php else : echo "<h4>Bạn chưa có sản phẩm trong giỏ hàng.</h4>"; ?>
							<?php endif; ?>
</section>
<script>

</script>