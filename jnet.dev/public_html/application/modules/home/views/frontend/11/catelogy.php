		<!--breadcrumbs-->
			<?php 
		
			?>
			
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
									<li class="current"><a href="<?php if(isset($cate['url'])) echo $cate['url'].".html"; ?>" class="default_t_color"><?php if(isset($cate['name'])) echo $cate['name']; else echo "404" ?></a></li><li class="m_right_10 "><i class="fa fa-angle-right d_inline_middle m_left_10"></i></li>	
									
								<?php 
								} # foreach 
							} # if 
						?>

						<?php 
							//if(($this->uri->segment(3)))  $page = $this->uri->segment(3); else $page = 0;
							//if(isset($page) && $page != 0) echo '<li> Trang '.$page.'</li>';
						?>

					</ul>

				</div>

		   </section>
		   
		   <section style="padding-bottom: 50px">
					<h2 class="tt_uppercase color_dark m_bottom_25">Chuyên mục: <?php if(isset($catelogys[1]['name'])) echo $catelogys[1]['name']; else echo "404" ?></h2>
				<?php if(isset($global['layout']['detailpost']['displaydesc_catelogy']) && $global['layout']['detailpost']['displaydesc_catelogy'] == 1) : 
								echo '<p>'.$catelogys[1]['description'].'</p>';
					  endif;
				?>		

							<!--blog post-->

							<hr class="divider_type_3 m_bottom_30" />
							
							<?php
								if(isset($posts) && isset($posts[0])) :
									 foreach($posts as $post) :
										 $this->load->view('frontend/11/content_post',$post);
									 endforeach;
								else :
									echo '<h4>Không tìm thấy kết quả</h4>';	 
								endif;
							?>
							

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