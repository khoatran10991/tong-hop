<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#">
<head>
<base href="<?php echo ((isset($url_site) && !empty($url_site))?$url_site:base_url())?>">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ((isset($title) && !empty($title))?$title:'JNet.vn - Thương mại điện tử - Làm chủ Hệ thống Công cụ bán hàng trực tuyến tự động trong 30s') ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="canonical" href="http://gemekpremium.vn" />
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo ((isset($title) && !empty($title))?$title:'JNet.vn - Thương mại điện tử - Làm chủ Hệ thống Công cụ bán hàng trực tuyến tự động trong 30s') ?>" />
<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
<?php if(isset($social['facebook'])) :  ?>
<meta property="article:publisher" content="<?php echo $social['facebook']; ?>" />
<meta property="article:author" content="<?php echo $social['facebook']; ?>" />
<?php endif; ?>	
<meta property="og:site_name" content="<?php echo ((isset($title) && !empty($title))?$title:'JNet.vn - Thương mại điện tử - Làm chủ Hệ thống Công cụ bán hàng trực tuyến tự động trong 30s') ?>" />
<meta name="description" content="<?php echo ((isset($description) && !empty($description))?$description:'Tự thiết kế website, làm website bán hàng, website tin tức, blog cá nhân, website dự án bất động sản. Hệ thống công cụ bán hàng trực tuyến trọn gói, uy tín, chất lượng và chuyên nghiệp nhất') ?>">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo ((isset($layout['favicon-image']) && !empty($layout['favicon-image']))?$layout['favicon-image']:'template/frontend-admin/1/images/favicon.png') ?>">

<?php 
if(isset($verification_google['txt_google_verification_content']) && $verification_google['txt_google_verification_content'] != "") :
echo $verification_google['txt_google_verification_content'];
endif; 
?>	 	
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='bose-style-css'  href='<?php echo $_path ?>/css/style.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='<?php echo $_path ?>/css/font-awesome.min.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-style-css'  href='<?php echo $_path ?>/css/bootstrap.min.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='bxslider-style-css'  href='<?php echo $_path ?>/css/bxslider.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='bose-theme-structure-css'  href='<?php echo $_path ?>/css/main.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='bose-theme-style-css'  href='<?php echo $_path ?>/css/theme.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='tooltipster-style-css'  href='<?php echo $_path ?>/css/tooltipster.cssver4.4.css' type='text/css' media='all' />
<link rel='stylesheet' id='tooltipster-skin-css'  href='<?php echo $_path ?>/css/tooltipster-shadow.cssver4.4.css' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo $_path ?>/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/q2w3-fixed-widget.min.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/bxslider.min.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/tooltipster.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/hoverIntent.min.js'></script>
<script type='text/javascript' src='<?php echo $_path ?>/js/custom.js'></script>
<meta name="generator" content="JNET 1.1.0" />
<script>		jQuery(document).ready(function(){
					jQuery('.bxslider').bxSlider( {
					mode: 'fade',
					speed: 1000,
					captions: true,
					minSlides: 1,
					maxSlides: 1,
					slideWidth: 1170,
					adaptiveHeight: true,
					auto: true,
					preloadImages: 'all',
					pause: 5000,
					autoHover: true } );
					});
					
		
	
</script>
	<style>
		.header-title { border: none; }
	</style>
</head>
<body class="home blog" <?php
    if(empty($layout['background-type'])&& !isset($layout['background-type'])){

    }elseif($layout['background-type']=='color'){
        echo "style='background-image:none;background-color:".$layout['background-color']."'";
    }else{
       echo "style='background-image: url(".$layout['background-image'].")'";
    }
?>>
<div id="page" class="hfeed container site">
	<header id="header-page" class="site-header header-page" role="banner" 
		<?php
		    if(isset($layout['header-bg-color'])){
				echo "style='background-color:".$layout['header-bg-color']."'";
		    }
		?>>
		<div class="container">
			<div class="site-branding col-md-6">
				<div id="logo">
					<a href="<?php echo $url_site ?>">
						<?php
							
                                if(empty($layout['logo-type'])&& !isset($layout['logo-type'])){
                                    echo "<img src='".$_path."/images/logo-chung-cu-gemek-premium.png'/>";
                                }elseif($layout['logo-type']=='text'){
                                    echo $layout['logo-text'];
                                }else{
                                    echo "<img src='".$layout['logo-image']."'/>";
                                }
                                ?>
					</a>
				</div>		
			</div>
		</div><!--.container-->
	</header><!-- #masthead -->
	<div class="container headerMenu" id="headerMenu">
		<div id="top-nav" class="col-md-12">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle">Menu</h1>
				<a class="skip-link screen-reader-text" href="<?php echo $url_site ?>/#content">Skip to content</a>
				<div class="menu-trang-chu-container">
					<ul id="menu-trang-chu" class="menu" id="sidenav01">
						<li id="menu-item-39" class="active menu-item menu-item-type-post_type menu-item-object-post menu-item-39">
                                	<a style="<?php echo ((isset($layout['menu-hover-color']) && !empty($layout['menu-hover-color']))?"background-color:".$layout['menu-hover-color'].";":'') ?><?php echo ((isset($layout['menu-hover-text-color']) && !empty($layout['menu-hover-text-color']))?"color:".$layout['menu-hover-text-color'].";":'') ?>" class="menu-text" href="<?php echo $url_site ?>">Trang chủ</a>
                        </li>
						<?php foreach($menu as $item):?>
                            <?php if($item->id_parent == 0): ?>
                                
                                <li id="menu-item-39" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-39">
                                	<a style="<?php echo ((isset($layout['menu-hover-color']) && !empty($layout['menu-hover-color']))?"background-color:".$layout['menu-hover-color'].";":'') ?><?php echo ((isset($layout['menu-hover-text-color']) && !empty($layout['menu-hover-text-color']))?"color:".$layout['menu-hover-text-color'].";":'') ?>" class="menu-text" href="<?php echo $item->link;?>"><?php echo $item->name;?></a>
                                </li>
                            <?php endif;?>
                        <?php endforeach;?>
						
					</ul>
				</div>		
			   </nav><!-- #site-navigation -->	
		</div>
	</div>