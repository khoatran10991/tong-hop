<style>
.form-control-select {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #F2F4F5;
 }   
</style>
<!--breadcrumbs-->
			<section class="breadcrumbs">

				<div class="container">

					<ul class="horizontal_list clearfix bc_list f_size_medium">

						<li class="m_right_10 "><a href="<?php echo $url_site ?>" class="default_t_color">Trang chủ<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>

						<?php
							#sắp xếp lại mảng chứa chuyên mục 
							krsort($catelogys);
							# kiểm tra xem có chuyên mục cha không 
							if(isset($catelogys) ) { 
								foreach($catelogys as $cate) {
									
								
								?>
									<li class="current"><a href="<?php if(isset($cate['url'])) echo $cate['url']; ?>" class="default_t_color"><?php if(isset($cate['name'])) echo $cate['name']; else echo "404" ?></a></li><li class="m_right_10 "><i class="fa fa-angle-right d_inline_middle m_left_10"></i></li>	
									
								<?php 
								} # foreach 
							} # if 
						?>

						<?php 
							if(($this->input->get('p')))  $page = $this->input->get('p'); else $page = 0;
							if(isset($page) && $page != 0) echo '<li> Trang '.$page.'</li>';
						?>

					</ul>

				</div>

		   </section>
		   
		   <section style="padding-bottom: 50px"">

							<h2 class="tt_uppercase color_dark m_bottom_25"><?php if(isset($catelogys[1]['name'])) echo $catelogys[1]['name']; else echo "404" ?></h2>
				<?php  
								echo '<p>'.$catelogys[1]['description'].'</p>';
					  
				?>	

							<!--sort-->

							<div class="row clearfix m_bottom_10">

								<div class="col-lg-7 col-md-6 col-sm-12 m_sm_bottom_10">

									<p class="d_inline_middle f_size_medium">Sắp xếp bởi:</p>

									<div class="clearfix d_inline_middle m_left_10">

										<!--product name select-->

										<div class="f_size_medium relative f_left">

											
											<form action="" method="get">
											<select class="form-control-select" name="orderBy" onchange='this.form.submit()'>

												<option <?php if($this->input->get('orderBy') && $this->input->get('orderBy') == 'date') echo "selected" ?> value="date">Theo sản phẩm mới</option>
												<option <?php if($this->input->get('orderBy') && $this->input->get('orderBy') == 'price-desc') echo "selected" ?> value="price-desc">Giá: cao xuống thấp</option>

												<option <?php if($this->input->get('orderBy') && $this->input->get('orderBy') == 'price-asc') echo "selected" ?> value="price-asc">Giá: thấp đến cao</option>
												

											</select>
											</form>
											
											
											

										</div>										
										

									</div>

								</div>
								
								<div class="col-lg-5 col-md-6 col-sm-12 t_align_r t_sm_align_l">

									

								</div>

							</div>

							<hr class="m_bottom_10 divider_type_3">

							

							<!--products-->
							<?php $this->load->library('getthumb'); ?>
							<section class="products_container category_grid clearfix m_bottom_15">
								<?php if(isset($products[0])) : ?>
									<?php foreach($products as $product) : ?>
										<?php $this->load->view('frontend/11/content_catelogy_product',$product); ?>
									<?php  endforeach;?>
								
								<?php else : echo "<h4>Không tìm thấy sản phẩm nào, hãy thử tìm kiếm</h4>" ?>	
								<?php endif; ?>

							</section>

							<div class="m_bottom_10 divider_type_3"></div>

							<div class="row clearfix m_xs_bottom_30">

								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">


								</div>

								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">

									<!--pagination-->
									<p style="vertical-align: sub;padding-right: 10px" class="d_inline_middle f_size_medium">Tất cả có <?php if(isset($pagination['total'])) echo $pagination['total']; else echo 0 ?> kết quả. </p>
									
									<?php if(isset($pagination['pagination'])) echo  $pagination['pagination'] ?>
									

								</div>

							</div>

				</section>
