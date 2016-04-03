<!DOCTYPE HTML>
<html>
<head>
    {{ get_Title() }}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0) }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    {{ stylesheet_link("backend/css/bootstrap.min.css") }}
    <!-- Custom Theme files -->
    {{ stylesheet_link("backend/css/style.css") }}
    {{ stylesheet_link("backend/css/font-awesome.css") }}
    {{ javascript_include("backend/js/jquery.min.js") }}
    <!-- Mainly scripts -->
    {{ javascript_include("backend/js/jquery.metisMenu.js") }}
    {{ javascript_include("backend/js/jquery.slimscroll.min.js") }}
    <!-- Custom and plugin javascript -->
    {{ stylesheet_link("backend/css/custom.css")}}
    {{ javascript_include("backend/js/custom.js") }}
    {{ javascript_include("backend/js/screenfull.js") }}
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });



        });
    </script>

    <!----->

    <!--pie-chart--->
    {{ javascript_include("backend/js/pie-chart.js") }}
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
    <!--skycons-icons-->
    {{ javascript_include("backend/js/skycons.js")}}
    <!--//skycons-icons-->
</head>
<body>
<div id="wrapper">

    <!----->
    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1> <a class="navbar-brand" href="/backend/index.html">Shop Phalcon</a></h1>
        </div>
        <div class=" border-bottom">
            <div class="full-left">
                <section class="full-top">
                    <button id="toggle"><i class="fa fa-arrows-alt"></i></button>
                </section>
                <form class=" navbar-left-right">
                    <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
                    <input type="submit" value="" class="fa fa-search">
                </form>
                <div class="clearfix"> </div>
            </div>


            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men" >
                <ul class=" nav_1">

                    <li class="dropdown at-drop">
                        <a href="/backend/#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe"></i> <span class="number">5</span></a>
                        <ul class="dropdown-menu menu1 " role="menu">
                            <li><a href="/backend/#">

                                    <div class="user-new">
                                        <p>New user registered</p>
                                        <span>40 seconds ago</span>
                                    </div>
                                    <div class="user-new-left">

                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a></li>
                            <li><a href="/backend/#">
                                    <div class="user-new">
                                        <p>Someone special liked this</p>
                                        <span>3 minutes ago</span>
                                    </div>
                                    <div class="user-new-left">

                                        <i class="fa fa-heart"></i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a></li>
                            <li><a href="/backend/#">
                                    <div class="user-new">
                                        <p>John cancelled the event</p>
                                        <span>4 hours ago</span>
                                    </div>
                                    <div class="user-new-left">

                                        <i class="fa fa-times"></i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a></li>
                            <li><a href="/backend/#">
                                    <div class="user-new">
                                        <p>The server is status is stable</p>
                                        <span>yesterday at 08:30am</span>
                                    </div>
                                    <div class="user-new-left">

                                        <i class="fa fa-info"></i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a></li>
                            <li><a href="/backend/#">
                                    <div class="user-new">
                                        <p>New comments waiting approval</p>
                                        <span>Last Week</span>
                                    </div>
                                    <div class="user-new-left">

                                        <i class="fa fa-rss"></i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </a></li>
                            <li><a href="/backend/#" class="view">View all messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/backend/#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Rackham<i class="caret"></i></span><img src="/backend/images/wo.jpg"></a>
                        <ul class="dropdown-menu " role="menu">
                            <li><a href="/backend/profile.html"><i class="fa fa-user"></i>Edit Profile</a></li>
                            <li><a href="/backend/inbox.html"><i class="fa fa-envelope"></i>Inbox</a></li>
                            <li><a href="/backend/calendar.html"><i class="fa fa-calendar"></i>Calender</a></li>
                            <li><a href="/backend/inbox.html"><i class="fa fa-clipboard"></i>Tasks</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix">

            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="/{{ router.getControllerName() }}/index" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Tổng quan</span> </a>
                        </li>

                        <li>
                            <a href="/{{ router.getControllerName() }}/products" class=" hvr-bounce-to-right"><i class="fa fa-shopping-bag nav_icon"></i> <span class="nav-label">Sản phẩm</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="/{{ router.getControllerName() }}/products" class=" hvr-bounce-to-right"> <i class="fa fa-list-ol nav_icon"></i>Danh sách sản phẩm</a></li>

                                <li><a href="/{{ router.getControllerName() }}/addproduct" class=" hvr-bounce-to-right"><i class="fa fa-rocket nav_icon"></i>Thêm mới</a></li>

                                <li><a href="/{{ router.getControllerName() }}/saleproduct" class=" hvr-bounce-to-right"><i class="fa fa-percent nav_icon"></i>Khuyến mãi</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="/backend/inbox.html" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Inbox</span> </a>
                        </li>

                        <li>
                            <a href="/backend/gallery.html" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Gallery</span> </a>
                        </li>
                        <li>
                            <a href="/backend/#" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span class="nav-label">Pages</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="/backend/404.html" class=" hvr-bounce-to-right"> <i class="fa fa-info-circle nav_icon"></i>Error 404</a></li>
                                <li><a href="/backend/faq.html" class=" hvr-bounce-to-right"><i class="fa fa-question-circle nav_icon"></i>FAQ</a></li>
                                <li><a href="/backend/blank.html" class=" hvr-bounce-to-right"><i class="fa fa-file-o nav_icon"></i>Blank</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/backend/layout.html" class=" hvr-bounce-to-right"><i class="fa fa-th nav_icon"></i> <span class="nav-label">Grid Layouts</span> </a>
                        </li>

                        <li>
                            <a href="/backend/#" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="/backend/forms.html" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Basic forms</a></li>
                                <li><a href="/backend/validation.html" class=" hvr-bounce-to-right"><i class="fa fa-check-square-o nav_icon"></i>Validation</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="/backend/#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="/backend/signin.html" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Signin</a></li>
                                <li><a href="/backend/signup.html" class=" hvr-bounce-to-right"><i class="fa fa-sign-in nav_icon"></i>Singup</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">
            <!--banner-->
            <div class="banner">

                <h2>
                    <a href="/{{ router.getControllerName() }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>{{ name_action }}</span>
                </h2>
            </div>
            <!--//banner-->
            
            {{ content() }}

            <!---->
            <div class="copy">
                <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="/backend/http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            </div>
         </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!---->
<!--scrolling js-->
{{ javascript_include("backend/js/jquery.nicescroll.js")}}
{{ javascript_include("backend/js/scripts.js")}}
<!--//scrolling js-->
{{ javascript_include("backend/js/bootstrap.min.js")}}
</body>
</html>

