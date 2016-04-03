<section class="breadcrumbs">
				<div class="container">

					<ul class="horizontal_list clearfix bc_list f_size_medium">

						<li class="m_right_10 "><a href="<?php echo $url_site ?>" class="default_t_color"><i class="fa fa-home"></i> Trang chủ<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<li class="m_right_10 "><a href="<?php echo $url_site ?><?php if(isset($post->catelogys[0]->url)) echo $post->catelogys[0]->url ?>.html" class="default_t_color"><?php if(isset($post->catelogys[0]->name)) echo $post->catelogys[0]->name ?><i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<?php 
							if(isset($post->catelogys[1])) {
								if($post->catelogys[1]->id_parent == $post->catelogys[0]->idcatelogy) : ?>
								<li class="m_right_10 "><a href="<?php echo $url_site ?><?php if(isset($post->catelogys[1]->url)) echo $post->catelogys[1]->url ?>.html" class="default_t_color"><?php if(isset($post->catelogys[1]->name)) echo $post->catelogys[1]->name ?><i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>	
									
									
								<?php endif;
							}
							if(isset($post->catelogys[2])) {
								if($post->catelogys[2]->id_parent == $post->catelogys[1]->idcatelogy) : ?>
								<li class="m_right_10 "><a href="<?php echo $url_site ?><?php if(isset($post->catelogys[2]->url)) echo $post->catelogys[2]->url ?>.html" class="default_t_color"><?php if(isset($post->catelogys[2]->name)) echo $post->catelogys[2]->name ?><i class=" d_inline_middle m_left_10"></i></a></li>	
									
									
								<?php endif;
							}
						
						?>
						
					</ul>

				</div>

</section>
<article class="m_bottom_15">

								<div class="row clearfix m_bottom_15">

									<div class="col-lg-12 col-md-12 col-sm-12">

										<h2 class="m_bottom_5 color_dark fw_medium m_xs_bottom_10"><?php echo $post->post_name ?></h2>
										<?php 
											if(isset($global['layout']['detailpost']['displaydatecreate']) && $global['layout']['detailpost']['displaydatecreate'] == 1) {						
												echo '<p class="f_size_medium post_time">Ngày đăng: '.$post->time_created.'</p>';			
											}
										?>
										<?php if(isset($global['layout']['detailpost']['displaylikesocial']) && $global['layout']['detailpost']['displaylikesocial'] == 1) : ?>
										<div class="like-button">
											<div class="facebook">
												<div class="fb-like"  data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>	
											</div>
											<div class="google">
												<div class="g-plusone" data-annotation="inline"  data-width="200"></div>
											</div>
										</div>
										<?php endif; ?>
										
										
										

									</div>

									

								</div>


								<!--post content-->
								<div class="post_content">
									<?php echo $post->post_content ?>
									
								</div>
								
								<!--end post content-->

</article>
							<?php if(isset($global['layout']['detailpost']['displaylikesocial']) && $global['layout']['detailpost']['displaylikesocial'] == 1) : ?>
							<div class="m_bottom_30">

								<p class="d_inline_middle">Chia sẽ:</p>

								<div class="d_inline_middle m_left_5 addthis_widget_container">

								<!-- AddThis Button BEGIN -->

									<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
										<div class="like-button">
																		<div class="facebook">
																			<div class="fb-like"  data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>	
																		</div>
																		<div class="google">
																			<div class="g-plusone" data-annotation="inline"  data-width="200"></div>
																		</div>
										
									</div>

								<!-- AddThis Button END -->

									</div>

								</div>
							</div>
							<?php endif; ?>
							<hr class="divider_type_3 m_bottom_15" />
							<?php if(isset($global['layout']['detailpost']['displayrelatepost']) && $global['layout']['detailpost']['displayrelatepost']==1) : ?>
							<?php 
								if(isset($relateposts) && isset($relateposts[0])) :
							
							?>
							
							<?php if(isset($global['layout']['detailpost']['titlerelatepost']) && $global['layout']['detailpost']['titlerelatepost'] != '') : ?>
							<h2 class="tt_uppercase color_dark m_bottom_15"><?php echo $global['layout']['detailpost']['titlerelatepost'] ?></h2>
							<?php endif; ?>
							<?php $relate_data['relateposts'] = $relateposts; $this->load->view('frontend/11/relate-post',$relate_data); ?>
							
							
							<hr class="divider_type_3 m_bottom_45" />
							
							<?php endif; ?>
							<?php endif; ?>
							<!--comments-->
							<?php if(isset($global['layout']['detailpost']['displaycomment']) && $global['layout']['detailpost']['displaycomment'] == 'facebook') : ?>
							<h2 class="tt_uppercase color_dark m_bottom_30">Bình luận</h2>
							
							<div class="m_bottom_45">
								
								
								<div class="fb-comments"  data-colorscheme="light" data-numposts="8" data-width="100%"></div>
								
								
								
							</div>
							<?php endif; ?>
							<?php if(isset($global['layout']['detailpost']['displaycomment']) && $global['layout']['detailpost']['displaycomment'] == 'google') : ?>
							<h2 class="tt_uppercase color_dark m_bottom_30">Bình luận</h2>
							
							<div class="m_bottom_45">
								
								
								<div class="fb-comments"  data-colorscheme="light" data-numposts="8" data-width="100%"></div>
								
								
								
							</div>
							<?php endif; ?>
							
							<!--add comment-->
