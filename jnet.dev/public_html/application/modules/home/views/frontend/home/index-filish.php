<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href=<?php echo base_url(); ?>>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JNet - Thiết kế web,,thiết kế web bán hàng, tự thiết kế website của bạn trong 30s</title>
<meta name="description" content="Tự thiết kế web miễn phí. Chúng  tôi cung cấp mọi thứ để bạn có bản thiết kế website bán hàng trực tuyến trọn gói, uy tín, chất lượng và chuyên nghiệp nhất">
<meta name="keywords" content="lam web ban hang, lam website ban hang, giai phap ban hang, lam web nhanh, web mien phi, jnet, web jnet">
<link rel="stylesheet" type="text/css" href="template/frontend-admin/1/style.css"/>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<link href="template/frontend-admin/1/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link href="template/frontend-admin/1/css/responsive.css" rel="stylesheet" media="screen" type="text/css"/>
<link rel="shortcut icon" href="template/frontend-admin/1/images/favicon.png" type="image/png" />


<link rel="stylesheet" href="template/frontend-admin/1/sidr/stylesheets/jquery.sidr.dark.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="template/frontend-admin/1/sidr/jquery.sidr.min.js"></script>
<script type="text/javascript" src="template/frontend-admin/1/js/smoothscroll.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<!-- Add ajax register demo - hide it when upload on  jnet server :)  -->
<script type="text/javascript">
$( document ).ready(function() {
	  
    $( "#btn-register" ).click(function() {
    	var domain = $('#domain').val();
    	$('#StoreName').val(domain);
    	$('#subdomain').text(domain);
  	 // 	$('#myModal').show();
    

    	

    	// $("#btn-register").html('Đang xử lý...');
		$.post("store/register/popup", {
			domain: domain
		}, function(data) {
				
			$('#register-form').html(data);
			
		  
			}
				);
    	
    	
  	});


});
	
</script>

</head>

<body>
	<div class="header">
    	<div class="container">
    		<div class="logo-menu">
        		<div class="logo">
            		<a style="float: left"  href="<?php echo base_url() ?>"><img src="template/frontend-admin/1/images/logo-jnet.vn-v2.png" style="float: left" /></a>
            	</div>
                <!--<a id="simple-menu" href="#sidr">Toggle menu</a>-->
                <div id="mobile-header">
<a class="responsive-menu-button" href="#"><img src="template/frontend-admin/1/images/11.png"/></a>
</div>
            	<div class="menu" id="navigation">
            		<ul>
                    	<li><a href="#">Trang chủ</a></li>
                        <li><a href="#features">Tính năng</a></li>
                        <li><a href="#skins">Kho giao diện</a></li>
                        <li><a href="#skins">Tên miền</a></li>
                        <li><a href="#contact">Bảng giá</a></li>
                        <li><a href="#contact">Liên hệ</a></li>
                        
                        	
                    </ul>
            	</div>
        	</div>
        </div>
    </div>
    
    <div class="banner">
    	<div class="row">
    		<div class="col-sm-6">
	        	<div class="header-text">
	            	<h2>Bạn đang cần một website để kinh doanh ?</h2>
	   
	                <p class="small-text">Tất cả bạn cần chỉ trong vài click chuột và miễn phí 30 ngày</p>
	                <div class="row row-centered" style="margin-top: 20px">
	                	<div class="col-xs-12 col-sm-12 col-md-12 col-md-offset-1 home-registration">
					        
					          <input id="domain" type="text" class="form-control input-register" placeholder="Nhập tên cửa hàng, doanh nghiệp của bạn cần...">
					          <a id="btn-register" class="btn-registration" href="javascript:" >Trải nghiệm ngay</a>
					      
					        
					     </div>
	                   
	                </div>
	            </div>
            </div>
            <div class="col-sm-6">
            	<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  
				    <!-- Wrapper for slides -->
				    <div class="carousel-inner" role="listbox">
				      <div class="item active">
				        <img src="<?php base_url() ?>/template/frontend-admin/1/images/tem-jnet-shop-700.png" alt="Chania" class="img-responsive">
				      </div>
				
				      <div class="item">
				        <img src="<?php base_url() ?>/template/frontend-admin/1/images/tem-jnet-shop-700.png" alt="Chania" class="img-responsive">
				      </div>
				    </div>
				
				 </div>
            
            </div>
        </div>
    </div>
    
    <div class="color-border">
    </div>
    <div class="row rowsnagf01">
    	<div class="col-md-12 col-sm-12 col-md-6 colsnagf01">
    		<div class="col-sm-8">
    			Giúp bạn sở hữu <a href="<?php base_url() ?>/website-bat-dong-san.html">website bất động sản</a> cực nhanh, giao diện dễ tùy chĩnh,được thiết kế tối ưu với bộ máy tìm kiếm,
    			tích hợp sẳn các công cụ sms marketing, email marketing, quản lý khách hàng.
    		</div>
    		<div class="col-sm-4">
    			<img class="img-responsive" src="<?php base_url() ?>/template/frontend-admin/1/images/jnet-tem-real.png">
    		</div>	
    	
    	</div>
    	<div class="col-md-12 col-sm-12 col-md-6">
    		<div class="col-sm-4">
    			<img class="img-responsive" src="<?php base_url() ?>/template/frontend-admin/1/images/jnet-tem-shop-250.png">
    		</div>	
    		<div class="col-sm-8">
    			Giúp bạn sở hữu <a href="<?php base_url() ?>/website-bat-dong-san.html">website bất động sản</a> cực nhanh, giao diện dễ tùy chĩnh, tối ưu với bộ máy tìm kiếm
    		</div>
    				
    	
    	</div>
    </div>
    <div class="container" style="margin-top:50px;text-align:center">
    	<div class=""><h3>Giúp bạn <span style="color:#F4B446">bán hàng online</span> dễ dàng và hiệu quả NGAY HÔM NAY, CHỈ CÓ THỂ LÀ <span style="color:#79B643">JNET</span><br> tùy chỉnh giao diện kéo thả, bạn không cần phải lo lắng phải biết lập trình </h3></div>
    	<p style="font-size: 16px;color: #555;">Chúng tôi nỗ lực từng ngày để mang tới cho bạn nhiều hơn một Website đẹp và chuyên nghiệp, JNET là giải pháp kinh doanh online hiệu quả dành cho bạn.</p>
    	<div class="col-sm-12">
    		
    	</div>
    </div>
    
    
 
    <div class="row" style="margin-top:55px;background: url(/template/frontend-admin/1/images/jnet-background-5.png) no-repeat;min-height: 700px;background-size: 100%;">
    	
    
    </div>
    <div class="features" id="features">
    	<div class="container">
        	<h3 class="text-head">Với những tính năng đã có sẵn, bạn không cần phải lo lắng</h3>
        	<div class="features-section">
        		<div class="icon-ani">
                <ul>
                	<li class="">
                    	<div class="feature-icon icon1"></div>
                     	<h4>Tùy chỉnh giao diện</h4>
                        <p>Bạn có thể thay đổi giao diện bất cứ lúc nào tùy theo sở thích của bạn.</p>
                     </li>
                     <li>
                    	<div class="feature-icon icon2"></div>
                     	<h4>Tiết kiệm thời gian</h4>
                        <p>Mọi thứ trở nên dễ dàng giúp bạn tiết kiệm được nhiều thời gian để làm những công việc khác.</p>
                     </li>
                     <li>
                    	<div class="feature-icon icon3"></div>
                     	<h4>Fully Customization</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                     </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="stories" id="skins">
    	<div class="container">
        	<h3 class="text-head">Các mẫu giao diện</h3>
            <p class="box-desc">Chọn cho cửa hàng online,doanh nghiệp của bạn 1 theme đẹp để thu hút người mua hàng và quan tâm.</p>
        	<div class="stories-section">
            	<ul>
                	<li>
                    	<a href="#">
                    	<div class="story-img"><img src="https://hstatic.net/173/1000012173/1/2015/10-29/img_01_058056bc-74cb-463a-7eb5-9b2df44a5ac2_large.png"/></div>
                        	<div class="story-box">
                            	<h4>Bất động sản 1</h4>
                        		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                        		
                            </div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                    	<div class="story-img"><img src="https://hstatic.net/173/1000012173/1/2015/10-30/01_large.png"/></div>
                        	<div class="story-box">
                            	<h4>Shop online 1</h4>
                        		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                        		
                            </div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                    	<div class="story-img"><img src="https://hstatic.net/173/1000012173/1/2015/11-2/01_large.png"/></div>
                        	<div class="story-box">
                            	<h4>This is Mind-blowing</h4>
                        		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                        		
                            </div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                    	<div class="story-img"><img src="https://hstatic.net/173/1000012173/1/2015/10-26/01_e1e6ca14-76d4-4243-4bfb-1d7acd9bf69a_large.png"/></div>
                        	<div class="story-box">
                            	<h4>This is Mind-blowing</h4>
                        		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                        		
                            </div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                    	<div class="story-img"><img src="https://hstatic.net/173/1000012173/1/2015/10-26/01_998d3c06-7afa-432f-6934-499854f72796_large.png"/></div>
                        	<div class="story-box">
                            	<h4>This is Mind-blowing</h4>
                        		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                        		
                            </div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                    	<div class="story-img"><img src="https://hstatic.net/173/1000012173/1/2015/10-6/01_2aee96c3-e139-4806-7ba7-5337462f64e3_large.jpg"/></div>
                        	<div class="story-box">
                            	<h4>This is Mind-blowing</h4>
                        		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mi nulla, in imperdiet arcu hendrerit in.</p>
                        		
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   	
    <div class="contact" id="contact">
    	<div class="container">
        	<h3 class="text-head">Bạn cần tư vấn và hỗ trợ ?</h3>
            <p class="box-desc">Liên hệ ngay với chúng tôi, mọi thắc mắc của bạn sẽ được giải đáp trpng vòng 30s.</p>
            	<div class="contact-section">
            		
                		<form>
                    		<input type="text" name="Name" placeholder="Name" />
                        	<input type="email" name="email" placeholder="Email"/>
                        	<textarea placeholder="Message" rows="6"></textarea>
                        	<button type="submit" class="submit">Send Message</button>
                   		</form>
                	
            	</div>
        </div>
    </div>
    <div class="color-border">
    </div>
    <div class="footer">
        	<div class="container">
            	<div class="infooter">
                <p class="copyright">Copyright &copy; 2015 by JNet.vn</p>
            	</div>
            <ul class="socialmedia">
                <li><a href=""><i class="icon-twitter"></i></a></li>
                <li><a href=""><i class="icon-facebook"></i></a></li>
                <li><a href=""><i class="icon-dribbble"></i></a></li>
                <li><a href=""><i class="icon-linkedin"></i></a></li>
                <li><a href=""><i class="icon-instagram"></i></a></li>
            </ul>
            </div>
        </div>
        <script type="text/javascript" src="template/frontend-admin/1/js/jquery.nicescroll.min.js"></script>
        <script type="text/javascript">		
			 $(document).ready(function() {
				$('#simple-menu').sidr({
				side: 'right'
			});
			});
			$('.responsive-menu-button').sidr({
				name: 'sidr-main',
				source: '#navigation',
				side: 'right'

				});
			$(document).ready(
			function() {
			$("html").niceScroll({cursorborder:"0px solid #fff",cursorwidth:"5px",scrollspeed:"70"});
			}
			);
		</script>
<!-- Modal register-->
  <div id="register-form">
  
  </div>
</body>

</html>

