<?php if(isset($products) && isset($products[0])) : ?>
					<?php if(isset($settings['titlebox']) && $settings['titlebox'] != '') : ?>
					<div class="clearfix">

						<h2 class="color_dark tt_uppercase f_left m_bottom_15 f_mxs_none"><?php echo $settings['titlebox'] ?></h2>
						<div class="f_right clearfix nav_buttons_wrap f_mxs_none m_mxs_bottom_5">

							<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners rp_prev"><i class="fa fa-angle-left"></i></button>

							<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners rp_next"><i class="fa fa-angle-right"></i></button>

						</div>

					</div>
					<?php endif; ?>
					<div class="related_projects m_bottom_15 m_sm_bottom_0 m_xs_bottom_15">
						<?php $dataproduct['products'] = $products;  ?>
								<?php $this->load->view('frontend/11/content_product',$dataproduct); ?>
						
						

					</div>
<?php endif; ?>