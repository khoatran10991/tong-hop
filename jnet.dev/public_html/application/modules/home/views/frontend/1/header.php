<!DOCTYPE html>
<html>
<head lang="en">
    <base href="<?php echo ((isset($url_site) && !empty($url_site))?$url_site:base_url())?>">
    <meta charset="UTF-8">
    <title><?php echo ((isset($title) && !empty($title))?$title:'JNet.vn - Thương mại điện tử - Làm chủ Hệ thống Công cụ bán hàng trực tuyến tự động trong 30s') ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo ((isset($layout['favicon-image']) && !empty($layout['favicon-image']))?$layout['favicon-image']:'template/frontend-admin/1/images/favicon.png') ?>">
<!--    Description-->
    <meta name="description" content="<?php echo ((isset($description) && !empty($description))?$description:'Tự thiết kế website, làm website bán hàng, website tin tức, blog cá nhân, website dự án bất động sản. Hệ thống công cụ bán hàng trực tuyến trọn gói, uy tín, chất lượng và chuyên nghiệp nhất') ?>">
<!--    Keywords-->
    <meta name="keywords" content="<?php echo ((isset($keywords) && !empty($keywords))?$keywords:'lam web ban hang, lam website ban hang, giai phap ban hang, lam web nhanh, web mien phi, jnet, web jnet') ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="template/frontend-users/8/public/js/jquery-1.11.3.min.js"></script>
    <script src="template/frontend-users/8/public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="template/frontend-users/8/public/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="template/frontend-users/8/public/css/style.css"/>
    <link rel="stylesheet" href="template/frontend-users/8/public/css/responsive.css"/>
    <link rel="stylesheet" href="{_path}/css/flexslider.css" />
    <script type="text/javascript" src="template/frontend-users/8/public/js/jquery.flexslider-min.js"></script>
    <?php echo ((isset($layout['menu-text-color']) && !empty($layout['menu-text-color']))?"<style>a.menu-text{color:'".$layout['menu-text-color']."'!important;}</style>":"") ?>

</head>
<body <?php
    if(empty($layout['background-type'])&& !isset($layout['background-type'])){

    }elseif($layout['background-type']=='color'){
        echo "style='background-image:none;background-color:".$layout['background-color']."'";
    }else{
       echo "style='background-image: url(".$layout['background-image'].")'";
    }
?>>
<div class="row affix-row">
    <header class="col-sm-3 col-md-2 affix-sidebar">
        <div class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation" <?php echo ((isset($layout['menu-background-color']) && !empty($layout['menu-background-color']))?"style='background-color:".$layout['menu-background-color']."'":'') ?>>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="visible-xs navbar-brand">Sidebar menu</span>
                </div>
                <div class="navbar-collapse collapse sidebar-navbar-collapse">
                    <ul class="nav navbar-nav" id="sidenav01">
                        <li id="logo">
                            <a href="<?php echo ((isset($url_site) && !empty($url_site))?$url_site:base_url()) ?>" alt="logo">
                                <?php
                                if(empty($layout['logo-type'])&& !isset($layout['logo-type'])){
                                    echo "<img src='".$_path."/images/logotop.png'/>";
                                }elseif($layout['logo-type']=='text'){
                                    echo $layout['logo-text'];
                                }else{
                                    echo "<img src='".$layout['logo-image']."'/>";
                                }
                                ?>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#" style=" <?php echo ((isset($layout['menu-hover-color']) && !empty($layout['menu-hover-color']))?"background-color:".$layout['menu-hover-color'].";":'') ?><?php echo ((isset($layout['menu-hover-text-color']) && !empty($layout['menu-hover-text-color']))?"color:".$layout['menu-hover-text-color'].";":'') ?>">
                                <span class="glyphicon glyphicon-check"></span> Trang Chủ
                            </a>
                        </li>
                        <?php foreach($menu as $item):?>
                            <?php if($item->id_parent == 0): ?>
                                <li>
                                    <a href="<?php echo $item->link;?>" class="menu-text">
                                        <span class="glyphicon glyphicon-check"></span> <?php echo $item->name;?>
                                    </a>
                                </li>
                            <?php endif;?>
                        <?php endforeach;?>
                        <li class="hotline" class="menu-text">
                            <div class="h-t">Hotline</div>
                            <div class="h-m"><?php echo ((isset($phone)&&!empty($phone))?$phone:"888 88 888")?></div>
                        </li>
                        <li class="social">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="template/frontend-users/8/public/images/facebookicon.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="template/frontend-users/8/public/images/googleicon.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="template/frontend-users/8/public/images/twittericon.png" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="template/frontend-users/8/public/images/rssicon.png" alt="" />
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
