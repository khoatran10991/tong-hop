<?php
    require_once('header.php');
?>
    <div class="row affix-row">
        <header class="col-sm-3 col-md-2 affix-sidebar">
            <div class="sidebar-nav">
                <div class="navbar navbar-default" role="navigation">
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
                            <li class="logo">
                                <img src="public/images/logotop.png" />
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Tổng quan dự án
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Vị trí địa lý
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Tiện ích dự án
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Tiến độ thi công
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Chi tiết mặt bằng
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Giá bán và thanh toán
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Hỗ trợ vay và mua nhà
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-check"></span> Liên hệ tư vấn
                                </a>
                            </li>
                            <li class="hotline">
                                <div class="h-t">Hotline</div>
                                <div class="h-m">043 911 888</div>
                            </li>
                            <li class="social">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="public/images/facebookicon.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="public/images/googleicon.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="public/images/twittericon.png" alt="" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="public/images/rssicon.png" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </header>
        <article class="col-sm-9 col-md-10 affix-content">

            <div class="container">
                <div class="header-page" data-spy="affix">
                    Căn hộ chung cư cao cấp Goldsilk Complex - 430 Cầu Am - Vạn  Phúc - Hà Đông - Hà Nội
                </div>
                <div class="flexslider">
                    <ul class="slides">
                        <li name="slide1">
                            <img src="public/images/thumb/slide1.jpg" />
                        </li>
                        <li  name="slide3" class="action">
                            <img src="public/images/thumb/slide3.jpg" />
                        </li>
                        <li  name="slide1">
                            <img src="public/images/thumb/slide1.jpg" />
                        </li>
                        <li name="slide3">
                            <img src="public/images/thumb/slide3.jpg" />
                        </li>
                        <li name="slide1">
                            <img src="public/images/thumb/slide1.jpg" />
                        </li>
                        <li name="slide3">
                            <img src="public/images/thumb/slide3.jpg" />
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 210,
            itemMargin: 5,
            directionNav: true,
            controlNav: false
        });
    });
    $('.slides li').click(function(){
        var src = $(this).attr('name');
        console.log(src);
        $('body').css('background-image','url(public/images/'+src+'.jpg)');
        $('.slides li').removeClass('action');
        $(this).addClass('action');
    });
</script>
<?php
    require_once('footer.php');