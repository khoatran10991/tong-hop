<?php
require_once('header.php');
?>
<header id="index">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="#">
                    <img src="public/images/logotop.png" class="img-responsive" alt="logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="focus">
                        <a href="#">Tổng quan</a>
                    </li>
                    <li>
                        <a href="#">Vị trí</a>
                    </li>
                    <li>
                        <a href="#">Tiện ích</a>
                    </li>
                    <li>
                        <a href="#">Tiến độ</a>
                    </li>
                    <li>
                        <a href="#">Mặt bằng</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Giá bán- Thanh toán</a>
                    </li>

                    <li>
                        <a href="#">Hỗ trợ vay</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<article>
    <!--Start Caurosel-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="public/images/slide1.jpg" alt="" width="100%" />
                <div class="carousel-caption">
                    <h2>
                        Phối cảng tổng thể dự án Goldsilk Complex
                    </h2>
                    <h4>
                        Dự án goldmark city – 136 Hồ Tùng Mậu gắn kết chặt chẽ với các tuyến đường
                        huyết  mạch như: Lê Đức Thọ, Nguyễn Cơ Thạch, đường 32, Phạm Văn Đồng,....
                    </h4>
                </div>
            </div>
            <div class="item">
                <img src="public/images/slide2.jpg" alt="" width="100%" />
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--End caurosel-->
</article>
<footer>
    <div class="container">
        <ul class="hotline">
            <li>
                <img src="public/images/iconemail.png" alt="Icon Email" />
                <span class="text">lienhe@applink.vn</span>
            </li>
            <li>
                <img src="public/images/iconmobile.png" alt="Icon Mobile" />
                <span class="text">04 390.11.888</span>
            </li>

        </ul>
    </div>
</footer>

<?php
require_once('footer.php');