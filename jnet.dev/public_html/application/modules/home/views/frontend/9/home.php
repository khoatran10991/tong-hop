 
 	<?php
		if(isset($sliders)) :
 	?>
	      <div id="slider-wrapper">
		    <div class="container frame-c">
			    <ul class="bxslider">
			    	<?php 
				    	$i = 1;
				    	while ($i <= 10) : 
					    	if(isset($sliders["slideshow-img-".$i.""])) :
					    		if(!empty($sliders["slideshow-img-".$i.""])) : ?>
						    	<li>
						    		<a class='slideurl' href='<?php echo $sliders["link-slide-".$i.""] ?>'>
						    			<img src='<?php echo $sliders["slideshow-img-".$i.""] ?>'>
						    		</a>
							    	<div class='slider-caption container'>
							    		<div class='slider-caption-title'><?php echo $sliders["title-slide-".$i.""] ?></div>
							    		<!-- <div class='slider-caption-desc'></div> -->
							    	</div>
						    	</li>
				    	<?php
				    			endif;
				    		endif;
						$i++;
			    		endwhile; ?>     
			     </ul>   
		    </div>
        </div>
		<?php endif; ?>
	    <!-- Thong bao -->
		<?php if(isset($notification['display_notification']) && $notification['display_notification'] = 1) : ?>
		<div class="col-md-12 block-1">
			<div class="alert alert-<?php if(isset($notification['boxcolor'])) echo $notification['boxcolor'];  ?>" role="alert"> 
				<?php if(isset($notification['txt_content_notification'])) echo $notification['txt_content_notification'];  ?>
			</div>
		</div>
		<?php endif; ?>
		<!-- End thông báo -->
		<div  class="content-page">	
		    <div id="features-area">
			    <div class="container">
			    	<div class='col-md-4 col-sm-4 feature'><figure><div><a href='http://gemekpremium.vn/'><img src='http://gemekpremium.vn/wp-content/uploads/2016/01/ban-do-gemek-premium-1-1.png'><div class='features-caption'><div class='features-caption-title'>Vị trí dự án Gemek Premium</div><div class='features-caption-desc'>Dự án chung cư Gemek Premium có vị trí đắc địa trong khu đô thị mới Lê Trọng Tấn, Hoài Đức, Hà Nội</div></div></a></div></figure></div><div class='col-md-4 col-sm-4 feature'><figure><div><a href='http://gemekpremium.vn/'><img src='http://gemekpremium.vn/wp-content/uploads/2016/01/so-do-can-ho-gemek-premium-1.png'><div class='features-caption'><div class='features-caption-title'>Sơ đồ căn hộ</div><div class='features-caption-desc'>Bao gồm các diện tích 65m2 - 66m2 - 74m2 - 75m2 - 89m2 - 91m2, 16 căn/1 sàn/7 thang máy</div></div></a></div></figure></div><div class='col-md-4 col-sm-4 feature'><figure><div><a href='http://gemekpremium.vn/'><img src='http://gemekpremium.vn/wp-content/uploads/2016/01/tien-ich-noi-bat-chung-cu-gemek-premium.png'><div class='features-caption'><div class='features-caption-title'>Tiện ích nổi bật</div><div class='features-caption-desc'>Với bể bơi ngoài trời, sky garden ở tầng thượng hướng đến việc mang lại một cảm giác yên bình, thư thái cho cư dân</div></div></a></div></figure></div>	     </div>   
			</div><!--.features-->
		    
			
		    <div id="showcase">
			    <div class="container">
			    	<div class='col-md-4 col-sm-4 showcase'><figure><div><a href='http://gemekpremium.vn/'><img src='http://gemekpremium.vn/wp-content/uploads/2016/01/chu-dau-tu-geleximco.jpg'><div class='showcase-caption'><div class='showcase-caption-title'>CHỦ ĐẦU TƯ GELEXIMCO</div><div class='showcase-caption-desc'>“Tổng hợp nguồn lực, Chia sẻ thành công”</div></div></a></div></figure></div><div class='col-md-4 col-sm-4 showcase'><figure><div><a href='http://gemekpremium.vn/'><img src='http://gemekpremium.vn/wp-content/uploads/2016/01/chuong-trinh-vay-ngan-hang-gemek-premium.jpg'><div class='showcase-caption'><div class='showcase-caption-title'>CƠ HỘI MUA NHÀ VỚI GÓI 30000 TỶ</div><div class='showcase-caption-desc'>Lãi suất 5%/năm sẽ là cơ hội sở hữu nhà tuyệt vời</div></div></a></div></figure></div><div class='col-md-4 col-sm-4 showcase'><figure><div><a href='http://gemekpremium.vn/'><img src='http://gemekpremium.vn/wp-content/uploads/2016/01/quy-trinh-mua-ban-gemek-premium.jpg'><div class='showcase-caption'><div class='showcase-caption-title'>Quy Trình Đặt Mua Căn Hộ</div><div class='showcase-caption-desc'>Luôn luôn có sự đồng hành của chuyên viên tư vấn</div></div></a></div></figure></div>	     </div>   
			</div><!--.showcase-->
	    
			<div id="featured-wrapper">
		    	<div class="featured-post col-md-6 col-sm-6 featured-post-1"><a title="Liên hệ ban quản lý căn hộ dự án Gemek Premium" href='http://gemekpremium.vn/lien-he-ban-quan-ly-can-ho-du-an-gemek-premium.html'>
						  	<div class="featured-title col-md-12">Liên hệ ban quản lý căn hộ dự án Gemek Premium</div>
							  	<div class="col-md-8 col-sm-6 thumb">
								  	<img class='featured-image' src='http://gemekpremium.vn/wp-content/uploads/2016/01/lien-he-ban-quan-ly-gemek-premium-465x300.jpg' title='Liên hệ ban quản lý căn hộ dự án Gemek Premium'>						  	</div><!--.thumb-->
						  	</a>
						  	<div class="col-md-4 col-sm-6 featured-excerpt">Liên hệ ban quản lý căn hộ dự án Gemek Premium MUA GIÁ GỐC TỪ CHỦ ĐẦU TƯ Tầng 4, tòa 29T2 Hoàng Đạo Thúy, Cầu Giấy, Hà Nội Hotline: 09.000.00000...</div>	
						</div><!--.featured-post-1-->
						
						<div class="col-md-6 col-sm-6 right-featured-container">
						
							
										  						<div class="featured-post col-md-12 featured-post-right"><a title="Cập nhật tiến độ dự án Gemek Premium" href='http://gemekpremium.vn/tien-do-du-an-gemek-premium.html'>
						
							  	<div class="col-md-5 col-sm-4 thumb">	
							  	<img class='featured-image' src='http://gemekpremium.vn/wp-content/uploads/2016/01/tien-do-du-an-gemek-premium-465x300.jpg' title='Cập nhật tiến độ dự án Gemek Premium'>							</div><!--.thumb-->
								<div class="featured-right-title col-sm-8 col-md-7">Cập nhật tiến độ dự án Gemek Premium</div></a>
								<div class="col-md-7 featured-excerpt">Cập nhật tiến độ thi công sắp xong đài giằng móng, dự kiến 10/01/2016 xây xo...</div>
							</div><!--.featured-post-right-->
							
								
										  						<div class="featured-post col-md-12 featured-post-right"><a title="Pháp lý dự án Gemek Premium" href='http://gemekpremium.vn/phap-ly-du-gemek-premium.html'>
						
							  	<div class="col-md-5 col-sm-4 thumb">	
							  	<img class='featured-image' src='http://gemekpremium.vn/wp-content/uploads/2016/01/phap-ly-du-an-gemek-premium-465x300.jpg' title='Pháp lý dự án Gemek Premium'>							</div><!--.thumb-->
								<div class="featured-right-title col-sm-8 col-md-7">Pháp lý dự án Gemek Premium</div></a>
								<div class="col-md-7 featured-excerpt">Cập nhật pháp lý dự án Gemek Premium, với những tài liệu hồ sơ pháp lý chính t...</div>
							</div><!--.featured-post-right-->
							
								
							           
						</div><!--.right-featured-container-->			
			</div><!--#featured-wrapper-->
	    
		
	
			<div id="content" class="site-content container">
				<div id="primary" class="content-area col-md-12">
					<div id="home-title">
						<span>Thông tin mới nhất</span>
					</div>
					<main id="main" class="site-main" role="main">
							
									
							<div class='row'>
						<article id="post-34" class="col-md-3 col-sm-6 grid3 post-34 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
						
								<div class="featured-thumb col-md-12">
										
										<a href="http://gemekpremium.vn/lien-he-ban-quan-ly-can-ho-du-an-gemek-premium.html" title="Liên hệ ban quản lý căn hộ dự án Gemek Premium"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/lien-he-ban-quan-ly-gemek-premium-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="lien-he-ban-quan-ly-gemek-premium" /></a>
											</div><!--.featured-thumb-->
									
								<div class="out-thumb col-md-12">
									<header class="entry-header">
										<h1 class="entry-title"><a href="http://gemekpremium.vn/lien-he-ban-quan-ly-can-ho-du-an-gemek-premium.html" rel="bookmark">Liên hệ ban quản lý căn hộ dự án Gemek Premium</a></h1>
										<span class="entry-excerpt">Liên hệ ban quản lý căn hộ dự án Gemek Premium MUA GIÁ GỐC TỪ CHỦ ĐẦU TƯ Tầng 4, tòa 29T2 Hoàng Đạo Thúy, Cầu Giấy, Hà Nội Hotline: 09.000.00000...</span>
									</header><!-- .entry-header -->
								</div><!--.out-thumb-->
									
								
								
						</article><!-- #post-## -->			
										
						<article id="post-31" class="col-md-3 col-sm-6 grid3 post-31 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
						
								<div class="featured-thumb col-md-12">
										
										<a href="http://gemekpremium.vn/tien-do-du-an-gemek-premium.html" title="Cập nhật tiến độ dự án Gemek Premium"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/tien-do-du-an-gemek-premium-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="tien-do-du-an-gemek-premium" /></a>
											</div><!--.featured-thumb-->
									
								<div class="out-thumb col-md-12">
									<header class="entry-header">
										<h1 class="entry-title"><a href="http://gemekpremium.vn/tien-do-du-an-gemek-premium.html" rel="bookmark">Cập nhật tiến độ dự án Gemek Premium</a></h1>
										<span class="entry-excerpt">Cập nhật tiến độ thi công sắp xong đài giằng móng, dự kiến 10/01/2016 xây xong móng. Dự án Chung cư Gemek Premium cam kết bàn giao đúng tiến độ vào quý 2 năm...</span>
									</header><!-- .entry-header -->
								</div><!--.out-thumb-->
									
								
								
						</article><!-- #post-## -->			
										
						<article id="post-28" class="col-md-3 col-sm-6 grid3 post-28 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
						
								<div class="featured-thumb col-md-12">
										
										<a href="http://gemekpremium.vn/phap-ly-du-gemek-premium.html" title="Pháp lý dự án Gemek Premium"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/phap-ly-du-an-gemek-premium-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="phap-ly-du-an-gemek-premium" /></a>
											</div><!--.featured-thumb-->
									
								<div class="out-thumb col-md-12">
									<header class="entry-header">
										<h1 class="entry-title"><a href="http://gemekpremium.vn/phap-ly-du-gemek-premium.html" rel="bookmark">Pháp lý dự án Gemek Premium</a></h1>
										<span class="entry-excerpt">Cập nhật pháp lý dự án Gemek Premium, với những tài liệu hồ sơ pháp lý chính thức ban hành từ chủ đầu tư, quý khách hàng hoàn toàn yên tâm về dự án: Hợp ...</span>
									</header><!-- .entry-header -->
								</div><!--.out-thumb-->
									
								
								
						</article><!-- #post-## -->			
										
						<article id="post-25" class="col-md-3 col-sm-6 grid3 post-25 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
						
								<div class="featured-thumb col-md-12">
										
										<a href="http://gemekpremium.vn/bang-gia-chinh-thuc-gemek-premium.html" title="Bảng giá chính thức dự án Gemek Premium"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/bang-gia-gemek-premium-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="bang-gia-gemek-premium" /></a>
											</div><!--.featured-thumb-->
									
								<div class="out-thumb col-md-12">
									<header class="entry-header">
										<h1 class="entry-title"><a href="http://gemekpremium.vn/bang-gia-chinh-thuc-gemek-premium.html" rel="bookmark">Bảng giá chính thức dự án Gemek Premium</a></h1>
										<span class="entry-excerpt">Bảng giá chính thức dự án Gemek Premium, khách hàng liên hệ chọn đặt căn vui lòng gọi : 0989.633.686 &nbsp;...</span>
									</header><!-- .entry-header -->
								</div><!--.out-thumb-->
									
								
								
						</article><!-- #post-## -->			
				</div><!--.row-->
				<div class='row'>
					<article id="post-22" class="col-md-3 col-sm-6 grid3 post-22 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
					
							<div class="featured-thumb col-md-12">
									
									<a href="http://gemekpremium.vn/so-do-can-ho-gemek-premium.html" title="Sơ đồ căn hộ Gemek Premium"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/so-do-can-ho-gemek-premium-1-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="so-do-can-ho-gemek-premium-1" /></a>
										</div><!--.featured-thumb-->
								
							<div class="out-thumb col-md-12">
								<header class="entry-header">
									<h1 class="entry-title"><a href="http://gemekpremium.vn/so-do-can-ho-gemek-premium.html" rel="bookmark">Sơ đồ căn hộ Gemek Premium</a></h1>
									<span class="entry-excerpt">Thiết kế điển hình của các căn hộ tại chung cư Gemek Premium là 2 phòng ngủ và 3 phòng ngủ. SƠ ĐỒ CĂN HỘ TẦNG ĐIỂN HÌNH Mặt bằng tầng điển hình Mặt b...</span>
								</header><!-- .entry-header -->
							</div><!--.out-thumb-->
								
							
							
					</article><!-- #post-## -->			
									
					<article id="post-13" class="col-md-3 col-sm-6 grid3 post-13 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
					
							<div class="featured-thumb col-md-12">
									
									<a href="http://gemekpremium.vn/tien-ich-noi-bat-du-an-gemek-premium.html" title="Tiện ích nổi bật dự án Gemek Premium"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/tien-ich-du-an-gemek-premium-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="tien-ich-du-an-gemek-premium" /></a>
										</div><!--.featured-thumb-->
								
							<div class="out-thumb col-md-12">
								<header class="entry-header">
									<h1 class="entry-title"><a href="http://gemekpremium.vn/tien-ich-noi-bat-du-an-gemek-premium.html" rel="bookmark">Tiện ích nổi bật dự án Gemek Premium</a></h1>
									<span class="entry-excerpt">Với bể bơi ngoài trời, sky garden tầng thượng hướng đến việc mang lại một cảm giác yên bình, thư thái cho cư dân là những tiện ích nổi bật của Gemek Prem...</span>
								</header><!-- .entry-header -->
							</div><!--.out-thumb-->
								
							
							
					</article><!-- #post-## -->					
					<article id="post-9" class="col-md-3 col-sm-6 grid3 post-9 post type-post status-publish format-standard has-post-thumbnail hentry category-khong-phan-loai">
					
							<div class="featured-thumb col-md-12">
									
									<a href="http://gemekpremium.vn/tong-quan-du-an-chung-cu-gemek-premium-geleximco.html" title="Tổng quan dự án chung cư Gemek Premium – Geleximco"><img width="400" height="275" src="http://gemekpremium.vn/wp-content/uploads/2016/01/tong-quan-gemek-premium-400x275.jpg" class="attachment-grid3 size-grid3 wp-post-image" alt="tong-quan-gemek-premium" /></a>
										</div><!--.featured-thumb-->
								
							<div class="out-thumb col-md-12">
								<header class="entry-header">
									<h1 class="entry-title"><a href="http://gemekpremium.vn/tong-quan-du-an-chung-cu-gemek-premium-geleximco.html" rel="bookmark">Tổng quan dự án chung cư Gemek Premium – Geleximco</a></h1>
									<span class="entry-excerpt">Dự án chung cư Gemek Premium có vị trí đắc địa trong khu đô thị mới Lê Trọng Tấn, Hoài Đức, Hà Nội, cách dự án Gemek Tower chỉ 150m dọc theo đường Lê Trọ...</span>
								</header><!-- .entry-header -->
							</div><!--.out-thumb-->
								
							
							
					</article><!-- #post-## -->						
				</div><!--.row-->			
						
					
					</main><!-- #main -->
		</div><!-- #primary -->
		
	
	
		</div><!-- #content -->
	   </div> <!-- # content-page -->	
	

</div><!-- #page -->

