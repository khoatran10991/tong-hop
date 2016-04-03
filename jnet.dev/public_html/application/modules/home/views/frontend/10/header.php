<!DOCTYPE html>
<!--[if IE 8]>			
	<html class="ie ie8"> 
<![endif]-->
<!--[if IE 9]>			
	<html class="ie ie9"> 
<![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<base href="<?php echo ((isset($url_site) && !empty($url_site))?$url_site:base_url())?>">
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="blog news" />
	<meta name="description" content="<?php echo ((isset($description) && !empty($description))?$description:'Tự thiết kế website, làm website bán hàng, website tin tức, blog cá nhân, website dự án bất động sản. Hệ thống công cụ bán hàng trực tuyến trọn gói, uy tín, chất lượng và chuyên nghiệp nhất') ?>">
	<meta name="author" content="">
	<!-- social -->
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo ((isset($image) && !empty($image))?$image:'')?>" />
	<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
	<?php if(isset($social['facebook'])) :  ?>
	<meta property="article:publisher" content="<?php echo $social['facebook']; ?>" />
	<meta property="article:author" content="<?php echo $social['facebook']; ?>" />
	<?php endif; ?>	
	<title><?php echo ((isset($title) && !empty($title))?$title:'JNet.vn - Thương mại điện tử - Làm chủ Hệ thống Công cụ bán hàng trực tuyến tự động trong 30s') ?></title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo ((isset($layout['favicon-image']) && !empty($layout['favicon-image']))?$layout['favicon-image']:'https://jnet.vn/uploads/images/favicon-jnet.com.vn.png') ?>">

	<!-- Google Fonts & Fontawesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo $_path ?>/asset/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $_path ?>/asset/css/slick.css">
	<link rel="stylesheet" href="<?php echo $_path ?>/asset/css/prettyphoto.css">
	<link rel="stylesheet" href="<?php echo $_path ?>/asset/css/style.css">
	<?php if(isset($verification_google['txt_google_verification_content']) && $verification_google['txt_google_verification_content'] != "") :
		echo $verification_google['txt_google_verification_content'];
	 	endif; 
	 ?>
	 <?php if(isset($verification_google['txt_google_analytics_content']) && $verification_google['txt_google_analytics_content'] != "") :
		echo "<script>".$verification_google['txt_google_analytics_content']."</script>";
	 	endif; 
	 ?>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- JS - MEDIAQUERIES -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<style>
		body {
			font-family: 'Roboto', sans-serif !important;
		}
	</style>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=387218998103645";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script type="text/javascript">
		
		$( document ).ready(function() {
			
			var pgurl = "/" + window.location.href.substr(window.location.href.lastIndexOf("/")+1);
					     $("nav ul li a").each(function(){
					          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
					          $(this).addClass("active");
					          else 
					          $(this).removeClass("active");    
					     })
		
		});
	</script>
</head>
<body <?php
    if(empty($layout['background-type'])&& !isset($layout['background-type'])){

    }elseif($layout['background-type']=='color'){
        echo "style='background-image:none;background-color:".$layout['background-color']."'";
    }else{
       echo "style='background-image: url(".$layout['background-image'].")'";
    }
?>>
<?php 
// chuyển thứ, ngày, tháng
function replaceM($month) {
	if($month == "01") return "một"; if($month == "02") return "hai";if($month == "03") return "ba";if($month == "04")return "tư";
	if($month == "05") return "năm"; if($month == "06") return "sáu";if($month == "07") return "bảy";if($month == "08")return "tám";
	if($month == "09") return "chín"; if($month == "10") return "mười";if($month == "11") return "mười một"; if($month == "12") return "mười hai";
}
function replaceWeekday($weekday) {

	switch($weekday) {
		case 'Monday':
			$weekday = 'Thứ hai';
			break;
		case 'Tuesday':
			$weekday = 'Thứ ba';
			break;
		case 'Wednesday':
			$weekday = 'Thứ tư';
			break;
		case 'Thursday':
			$weekday = 'Thứ năm';
			break;
		case 'Friday':
			$weekday = 'Thứ sáu';
			break;
		case 'Saturday':
			$weekday = 'Thứ bảy';
			break;
		default:
			$weekday = 'Chủ nhật';
			break;
	}
	return $weekday;
}
?>
<!-- Topbar -->
<div class="top-bar container" id="header-page" 
		<?php
		    if(isset($layout['header-bg-color'])){
				echo "style='background-color:".$layout['header-bg-color'].";";
		    }
		    if(isset($layout['header-text-color'])){
		    	echo "color:".$layout['header-text-color']."";
		    }
		    echo "'";
		
		?>>
	<div class="row">
		<div class="col-md-6">
			<ul class="tb-left">
				<li class="tbl-date"><span><?php echo replaceWeekday(date("l",time())); ?>, ngày <?php echo date("d",time()); ?>, tháng <?php echo replaceM(date("m",time())); ?>, <?php echo date("Y",time()); ?></span></li>
			
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="tb-right">
				<li class="tbr-social">
					<span>
					<?php if(isset($social['facebook'])) :  ?>
						<a href="<?php echo $social['facebook'] ?>" target="_blank" class="fa fa-facebook"></a>
					<?php endif; ?>	
					<?php if(isset($social['google'])) :  ?>
						<a href="<?php echo $social['google'] ?>" target="_blank" class="fa fa-google-plus"></a>
					<?php endif; ?>		
					<?php if(isset($social['youtube'])) : ?>
						<a href="<?php echo $social['youtube'] ?>" target="_blank" class="fa fa-youtube-play"></a>
					<?php endif; ?>		
					</span>
				</li>
				<li class="tbr-login">
					<a href="<?php echo $url_site ?>/./login.html">Login</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container wrapper">
	<div class="header">
		<div class="col-md-12">
			<!-- Logo -->
			<div class="col-md-4 logo">
				<h1 id="logo">
					<a href="<?php echo $url_site ?>">
					<?php
						if(empty($layout['logo-type'])&& !isset($layout['logo-type'])){
                         	echo "<img src='".$_path."/asset/img/logo.png'/>";
                        }elseif($layout['logo-type']=='text'){
                             echo $layout['logo-text'];
                         }else{
                                    echo "<img src='".$layout['logo-image']."'/>";
                         }
                    ?>
                    </a>
				</h1>
			</div>
			<!-- News Ticker -->
			<div class="col-md-8">
				<?php
				 echo $banner_top;
				?>
			</div>
		</div>
	</div>
	
	<!-- Header -->
	<header id="headerMenu" <?php 
	if(isset($layout['menu-background-color'])){
		echo "style='background-color:".$layout['menu-background-color']."'";
	}
	?>>
		<div class="col-md-12">
			<div class="row">
				<!-- Navigation -->
				<div class="col-md-12">
					<div class="menu-trigger"><i class="fa fa-align-justify"></i> Menu</div>
					<nav>
						<ul id="nav">
							<li id="menu-item-39" class="active n-menu">
                                	<a class="menu-text" href="<?php echo $url_site ?>">Trang chủ</a>
                                	
                        	</li>
							<?php foreach($menu as $item):?>
	                            <?php if($item->id_parent == 0): ?>
	                                
	                                <li id="menu-item-39" class="n-menu">
	                                	<a class="menu-text" href="<?php echo $item->link;?>"><?php echo $item->name;?></a>
	                                </li>
	                           
	                            <?php endif; ?>
                       		<?php endforeach;?>
						</ul>
					</nav>
					
					<!-- Search -->
					<div class="search">
						<form>
							<input type="search" placeholder="Type to search and hit enter">
						</form>
					</div>
					<span class="search-trigger"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</div>
	</header>
