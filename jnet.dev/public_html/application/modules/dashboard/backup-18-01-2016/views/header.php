<!DOCTYPE HTML>
<html>
<head>
<base href=<?php echo base_url(); ?>>
<title>{title}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="{description}" />
<meta name="keywords" content="{keywords}" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="template/backend/1/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="template/backend/1/css/style.css" rel='stylesheet' type='text/css' />
<link href="template/backend/1/css/nprogress.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="template/backend/1/css/lines.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- jQuery -->
<script src="template/backend/1/js/jquery.min.js"></script>
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->    
<!-- Nav CSS -->
<link href="template/backend/1/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="template/backend/1/js/metisMenu.min.js"></script>
<script src="template/backend/1/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="template/backend/1/js/d3.v3.js"></script>
<script src="template/backend/1/js/rickshaw.js"></script>
<script src="template/backend/1/js/nprogress.js"></script>

</head>
<body data-spy="scroll" data-target="#jnetmenuprimarysnag" data-offset="20">
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="jnetmenuprimarysnag">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Modern</a>
            </div>
            <!-- /.navbar-header -->
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{url_site}/dashboard.html"><i class="fa fa-dashboard fa-fw nav_icon"></i>Tổng Quan</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-cogs fa-fw nav_icon"></i>Cấu Hình</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url_site}/dashboard/setting.html">Tổng Quan</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/setting/user.html">Tài Khoản</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/setting/domain.html">Tên miền</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Giao Diện<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            	<li>
                                    <a href="{url_site}/dashboard/menu.html">Trình đơn</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/template.html">Thay Đổi Giao Diện</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/template/edit.html">Chỉnh Sửa Giao Diện</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/template/advance.html">Nâng cao</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-file-text nav_icon"></i>Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url_site}/dashboard/products.html">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/products/addproduct.html">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/products/category.html">Danh mục</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/products/coupon.html">Mã khuyến mãi</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/products/shipping.html">Vận chuyển</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/products/payment.html">Thanh toán</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text nav_icon"></i>Trang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url_site}/dashboard/pages.html">Tất Cả Các Trang</a>
                                </li>
                                <li>
                                    <a href="{url_site}/dashboard/pages/addpage.html">Tạo Trang Mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder-open nav_icon"></i>Thư Viện<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{url_site}/dashboard/library.html">Hình Ảnh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
        <div class="graphs" <?php echo ($_SERVER['PHP_SELF'] == "/index.php/dashboard.html" ? 'style="background: url(template/backend/1/images/background-jnet.jpg);"' : '') ?>>