<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{title}</title>

    <!-- Bootstrap -->
    <!-- Custom CSS -->
    <link href="{url_site}/template/backend/1/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{url_site}/template/backend/1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{url_site}/template/backend/1/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{url_site}/template/backend/1/jquery-minicolors/jquery.minicolors.js"></script>
    <link rel="stylesheet" href="{url_site}/template/backend/1/jquery-minicolors/jquery.minicolors.css">
<style>
    @media screen and (max-width: 800px) {
        #hide-customize, #show-customize {
            display:none !important;

        }
	} 
	@media screen and (min-width: 801px) {
        .col-sm-2 {
        	height: 100%;
    		overflow-y: scroll;	
        	padding-bottom: 80px;
		}	
	}
</style>
</head>
<body>

<div class="row">
    <div class="col-sm-2" id="jnet-customize">
        <form method="post" action="">
        <div class="row panel" style="margin: 10px 0px 0px 10px;">
            <input type="submit" class="btn btn-default pull-left" name="close-template-customize" value="Đóng">
            <input type="submit" class="btn btn-info pull-right" name="save-template-customize" value="Lưu Lại">
        </div>

        <!-- Navigation -->
        <div class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#side-menu-customize">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 class="visible-xs">MENU TÙY CHỈNH</h3>
            </div>
            <div class="sidebar-nav navbar-collapse collapse" id="side-menu-customize">
                <div class="panel-group nav" id="accordion">
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#title-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                Tiêu Đề & Logo
	                            </h4>
	                        </div>
                        </a>
                        <div id="title-customize" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                        <input class="titleType" type="radio"  name="logo-type" value="text" <?php echo (($layout['logo-type'] == "text")?"checked":"") ?>>Ký Tự - Tiêu Đề
                                    </label>
                                    <div id="select-text">
                                        <input name="logo-text" type="text" class="form-control" name="logo" id="text"
                                               placeholder="Nhập Tiêu Đề Vào Đây." value="<?php echo ((isset($layout['logo-text']) && !empty($layout['logo-text']))?$layout['logo-text']:'') ?>">
                                    </div>
                                </div>

                                <div class="radio">
                                    <label>
                                        <input class="titleType" type="radio" name="logo-type"
                                               value="image" <?php echo (!isset($layout['logo-type'])?'checked':'') ?> <?php echo (($layout['logo-type'] == "image")?"checked":"") ?>> Logo
                                    </label>
                                    <div id="select-logo">
                                        <div class="form-group">
                                            <input name="logo-image" id="logo-image" type="hidden" class="form-control"
                                                   value="<?php echo ((isset($layout['logo-image']) && !empty($layout['logo-image']))?$layout['logo-image']:'http://shopgach.dev/template/frontend-users/8/public/images/logotop.png') ?>">
                                            <div title="Chọn ảnh" id="anhlogo" class="select-lib-image"
                                                 onclick="openLibImages('logo-image','anhlogo')"
                                                 class="col-sm-12 col-sm-offset-2">Chọn ảnh logo
                                                <img src="<?php echo ((isset($layout['logo-image']) && !empty($layout['logo-image']))?$layout['logo-image']:'http://shopgach.dev/template/frontend-users/8/public/images/logotop.png') ?>" class='img-responsive'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="pull-right btn btn-primary" id="logo-change">Xem trước</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#icon-favicon-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                Favicon
	                            </h4>
	                        </div>
                        </a>
                        <div id="icon-favicon-customize" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div id="select-favicon">
                                    <div class="form-group">
                                        <input name="favicon-image" id="favicon-image" type="hidden"
                                               class="form-control" value="<?php echo ((isset($layout['favicon-image']) && !empty($layout['favicon-image']))?$layout['favicon-image']:'http://shopgach.dev/template/frontend-admin/1/images/favicon.png') ?>">
                                        <div title="Chọn ảnh" id="anhfavicon" class="select-lib-image"
                                             onclick="openLibImages('favicon-image','anhfavicon')"
                                             class="col-sm-12 col-sm-offset-2">Chọn ảnh favicon
                                            <img src="<?php echo ((isset($layout['favicon-image']) && !empty($layout['favicon-image']))?$layout['favicon-image']:'http://shopgach.dev/template/frontend-admin/1/images/favicon.png') ?>" class='img-responsive'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#color-menu-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                Màu Trình Đơn
	                            </h4>
	                        </div>
                        </a>
                        <div id="color-menu-customize" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h5>Chọn màu nền</h5>
                                <input type="text" id="menu-background-color" name="menu-background-color" class="mini-color" value="<?php echo ((isset($layout['menu-background-color']) && !empty($layout['menu-background-color']))?$layout['menu-background-color']:'#174966') ?>"
                                       style="height: 30px">
                                <h5>Chọn màu chữ</h5>
                                <input type="text" id="menu-text-color" name="menu-text-color" class="mini-color" value="<?php echo ((isset($layout['menu-text-color']) && !empty($layout['menu-text-color']))?$layout['menu-text-color']:'#ffffff') ?>"
                                       style="height: 30px">
                                <h5>Chọn màu nền khi click</h5>
                                <input type="text" id="menu-hover-color" name="menu-hover-color" class="mini-color" value="<?php echo ((isset($layout['menu-hover-color']) && !empty($layout['menu-hover-color']))?$layout['menu-hover-color']:'#e7e7e7') ?>"
                                       style="height: 30px">
                                <h5>Chọn màu chữ khi click</h5>
                                <input type="text" id="menu-hover-text-color" name="menu-hover-text-color" class="mini-color" value="<?php echo ((isset($layout['menu-hover-text-color']) && !empty($layout['menu-hover-text-color']))?$layout['menu-hover-text-color']:'#555') ?>"
                                       style="height: 30px">

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#bgcolor-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                Màu Nền
	                            </h4>
	                        </div>
                        </a>
                        <div id="bgcolor-customize" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                        <input class="titleType" type="radio" name="background-type"
                                               value="color" <?php echo (($layout['background-type'] == "color")?"checked":"") ?>>Màu Nền
                                    </label>
                                    <input type="text" id="bgcolor" name="background-color" class="mini-color" value="<?php echo ((isset($layout['background-color']) && !empty($layout['background-color']))?$layout['background-color']:'#ddd') ?>"
                                           style="height: 30px">
                                </div>
                                <div class="radio">
                                    <label>
                                        <input class="titleType" type="radio" name="background-type"
                                               value="image" <?php echo (!isset($layout['logo-type'])?'checked':'') ?><?php echo (($layout['background-type'] == "image")?"checked":"") ?>>Ảnh Nền
                                    </label>
                                    <div class="form-group">
                                        <input id="bg-image" name="background-image" type="hidden" class="form-control"
                                               value="<?php echo ((isset($layout['background-image']) && !empty($layout['background-image']))?$layout['background-image']:'http://shopgach.dev/template/frontend-users/8/public/images/slide1.jpg') ?>">
                                        <div title="Chọn ảnh" id="anhbg" class="select-lib-image"
                                             onclick="openLibImages('bg-image','anhbg')"
                                             class="col-sm-12 col-sm-offset-2">Chọn ảnh nền
                                            <img src="<?php echo ((isset($layout['background-image']) && !empty($layout['background-image']))?$layout['background-image']:'http://shopgach.dev/template/frontend-users/8/public/images/slide1.jpg') ?>" class='img-responsive' />
                                        </div>
                                    </div>
                                </div>
                                <a id="background-change" class="pull-right btn btn-primary">Xem trước</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                    	<a data-toggle="collapse" data-parent="#accordion" href="#header-color-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                 Header & Footer
	                            </h4>
	                        </div>
                        </a>
                        <div id="header-color-customize" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h5>Chọn màu nền</h5>
                                <input type="text" id="header-bg-color" name="header-bg-color"  class="mini-color" value="<?php echo ((isset($layout['header-bg-color']) && !empty($layout['header-bg-color']))?$layout['header-bg-color']:'#dce4e8') ?>"
                                       style="height: 30px">
                                <h5>Chọn màu chữ</h5>
                                <input type="text" id="header-text-color" name="header-text-color" class="mini-color" value="<?php echo ((isset($layout['header-text-color']) && !empty($layout['header-text-color']))?$layout['header-text-color']:'#ff9e00') ?>"
                                       style="height: 30px">

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#page-customize" id="load-page-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                Màu Trang Chi Tiết
	                            </h4>
	                        </div>
                        </a>
                        <div id="page-customize" class="panel-collapse collapse">
                            <div class="panel-body" id="page-customize-body">
                                <h5>Chọn màu tiêu đề</h5>
                                <input type="text" id="page-title-color" name="page-title-color"  class="mini-color" value="<?php echo ((isset($layout['page-title-color']) && !empty($layout['page-title-color']))?$layout['page-title-color']:'#ff5a00') ?>"
                                       style="height: 30px">
                                <h5>Chọn màu nền</h5>
                                <input type="text" id="page-bg-color" name="page-bg-color" class="mini-color" value="<?php echo ((isset($layout['page-bg-color']) && !empty($layout['page-bg-color']))?$layout['page-bg-color']:'#ffffff') ?>"
                                       style="height: 30px">
                                <h5>Chọn màu chữ</h5>
                                <input type="text" id="page-text-color" name="page-text-color" class="mini-color" value="<?php echo ((isset($layout['page-text-color']) && !empty($layout['page-text-color']))?$layout['page-text-color']:'#000000') ?>"
                                       style="height: 30px">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordion" href="#homepage-customize">
	                        <div class="panel-heading">
	                            <h4 class="panel-title">
	                                Trang chủ tĩnh
	                            </h4>
	                        </div>
                        </a>
                        <div id="homepage-customize"" class="panel-collapse collapse">
                            <div class="panel-body" id="homepage-customize-body">
                               <div class="radio">
									<label><input checked <?php echo (isset($layout['home-display']) && ($layout['home-display'] == "default")?"checked":"") ?> class="layout" id="default" type="radio" name="home-display" value="default">Mặc định theo giao diện</label>
								</div>
								<div class="radio">
									<label><input <?php echo (isset($layout['home-display']) && ($layout['home-display'] == "page")?"checked":"") ?> class="layout" id="page" type="radio" name="home-display" value="page">Một trang tĩnh</label>
								</div>
								<label for="sel1">Chọn trang:</label>
								<select class="form-control" id="home-page-id" name="home-page-id">
									<?php 
										if($pages) :
											foreach ($pages as $page) :
											 	if(isset($layout['home-page-id']) && $layout['home-page-id'] == $page->id_page)
													echo "<option selected value='".$page->id_page."'>".$page->page_name."</option>";
												else 
													echo "<option  value='".$page->id_page."'>".$page->page_name."</option>";
											endforeach;
										else :
											echo "<option disabled value='0'>Không có trang nào</option>";
										endif;
									?>
								</select>
                             </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- /.sidebar-collapse -->
            <!--            </div>-->
            <!-- /.navbar-static-side -->
        </div>
        <input type="button" value="Đóng Thanh Tùy Chỉnh" class="btn btn-warning pull-right" id="hide-customize" style="position: fixed;bottom: 20px;left: 18%;z-index: 99999">
        </form>
    </div>
    <div id="jnet-iframe-customize" class="col-sm-10" style="max-width: 100%; max-height: 100%; margin: 0px; top: 0px; left: 0px;">
        <iframe id="myframe" src="{url_site}/?admin=customize&api_key=<?php echo $_COOKIE['jnet_session']?>" frameborder="0" width="100%" height="100%" scrolling="yes"
                style="overflow:hidden;height:100%;width:100%"></iframe>
        <!--        <iframe src="{url_site}" frameborder="0" width="768" height="1024"></iframe>-->
        <!--        <iframe src="{url_site}" frameborder="0" width="320" height="480"></iframe>-->
        <input type="button" value="Hiện Thanh Tùy Chỉnh" class="col-sm-2 btn btn-warning pull-left" id="show-customize" style="position: fixed;bottom: 20px;left: 10px;display: none;z-index: 99999">
    </div>
    <div class="clearfix"></div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Optional theme -->

<script type="text/javascript">
    var x = document.getElementById("myframe");
    var y = (x.contentWindow || x.contentDocument);
    function logo_change(){
//        alert($('input[name="logo-type"]:checked').val());
        if (y.document)y = y.document;

        var logoType = $('input[name="logo-type"]:checked').val();

        if (logoType == "text") {
            var value = $("input#text").val();
            y.getElementById("logo").innerHTML = "<a href='#'>" + value + "</a>";
        } else {
            var value = $("input#logo-image").val();
            y.getElementById("logo").innerHTML = "<a href='#'><img src='" + value + "'></a>";
        }
    }
    function  background_change(){
        
        if (y.document)y = y.document;

        var bgType = $('input[name="background-type"]:checked').val();

        if (bgType == "color") {
            y.body.style.backgroundColor = $("input#bgcolor").val();
            y.body.style.backgroundImage = 'none';
        } else {
        	y.body.style.backgroundColor = 'none';
            y.body.style.backgroundImage = "url(" + $('input#bg-image').val() + ")";
            
        }

    }
    function menu_background_color(){
        //         alert($("input#menu-background-color").val());
        if (y.document)y = y.document;
        y.getElementById('headerMenu').style.backgroundColor = $("input#menu-background-color").val();

    }
    function menu_hover_color(){
        //         alert($("input#menu-hover-color").val());
        if (y.document)y = y.document;
        y.getElementsByClassName('active')[0].firstElementChild.style.backgroundColor = $("input#menu-hover-color").val();
    }
    function menu_hover_text_color(){
        //         alert($("input#menu-hover-text-color").val());
        if (y.document)y = y.document;
        y.getElementsByClassName('active')[0].firstElementChild.style.color = $("input#menu-hover-text-color").val();

    }
    function menu_text_color(){
        //         alert($("input#menu-text-color").val());
        if (y.document)y = y.document;
        var tagTextColor = y.getElementsByClassName('menu-text');
        for (i = 0; i < tagTextColor.length; i++) {
            tagTextColor[i].style.color = $("input#menu-text-color").val();

        }
        y.getElementsByClassName('hotline')[0].style.color = $("input#menu-text-color").val();


    }
    function header_bg_color(){
        //         alert($("input#header-bg-color").val());
        if (y.document)y = y.document;
        y.getElementById('header-page').style.backgroundColor = $("input#header-bg-color").val();
        y.getElementById('footer-sidebar').style.backgroundColor = $("input#header-bg-color").val();

    }
    function header_text_color(){
        //         alert($("input#header-text-color").val());
        if (y.document)y = y.document;
        y.getElementById('header-page').style.color = $("input#header-text-color").val();
        y.getElementById('footer-sidebar').style.color = $("input#header-text-color").val();

    }

	// thay doi noi dung trang chu 
	function changehomedisplay(data) {

		if (y.document)y = y.document;
        y.getElementsByClassName('content-page')[0].innerHTML = "<div class='detail-page' style='padding: 20px;'>" + data + "</div>";
	}	
    
    $("a#logo-change").click(function() {
            logo_change();
    });

    // sang thêm 
	// khi click button xem trước
    $("a#background-change").click(function () {
        background_change();
	});
    // khi thay đổi
    $("input#bg-image").change(function () {
        background_change();
	});
    $("input[name='background-type']").change(function () {
            background_change();
    });

    // end sang thêm
    $("input#menu-background-color").change(function () {
            menu_background_color();
    });
    $("input#menu-hover-color").change(function () {
            menu_hover_color();
    });
    $("input#menu-hover-text-color").change(function () {
            menu_hover_text_color();
    });
    $("input#menu-text-color").change(function () {
            menu_text_color();
    });
    $("input#header-bg-color").change(function () {
            header_bg_color();
    });
    $("input#header-text-color").change(function () {
            header_text_color();
    });
    $('#page-customize').on('shown.bs.collapse', function () {

        $("#myframe").attr('src','{url_site}/sat-tet--gioi-bat-dong-san-van-ram-ro-mo-ban.html?admin=customize&api_key=<?php echo $_COOKIE['jnet_session']?>');

    });
    $('#page-customize').on('hidden.bs.collapse', function () {
        $("#myframe").attr('src','{url_site}/?admin=customize&api_key=<?php echo $_COOKIE['jnet_session']?>');

    });
    $("input#page-bg-color").change(function(){
//          alert($("input#page-bg-color").val());
        if (y.document)y = y.document;
        y.getElementById("content-page").style.backgroundColor=$("input#page-bg-color").val();

    });
    $("input#page-text-color").change(function(){
//          alert($("input#page-text-color").val());
        if (y.document)y = y.document;
        y.getElementById("main").style.color=$("input#page-text-color").val();

    });
    $("input#page-title-color").change(function(){
//          alert($("input#page-title-color").val());
        if (y.document)y = y.document;
        y.getElementById("post-title").style.color=$("input#page-title-color").val();

    });

    $("input#hide-customize").click(function(){
    	//$("#jnet-customize").animate({
        //    width: "toggle"
        //});
    	$("#jnet-customize").toggle("slow");
        $("#jnet-iframe-customize").removeClass("col-sm-10").addClass("col-sm-12");
        $("input#show-customize").show();
    });
    $("input#show-customize").click(function(){
        $("#jnet-customize").toggle("slow");
    	
        $("#jnet-iframe-customize").removeClass("col-sm-12").addClass("col-sm-10");
        $("input#show-customize").hide(1000);
    });

	// trang chu tinh
	$("#home-page-id").change(function() {

		
		var typeDisplay = $("input[name=home-display]:checked").val();
		if(typeDisplay == "page") {

			$("#myframe").animate({
		        opacity: '0.3'
		    });	
		  var pageID = $("select#home-page-id").val();
		 // alert(pageID);
		  $.post("{url_site}/dashboard/template/customize.html", {
			  pageID : pageID,
			  storeID : {id_store}
			}, function(data) {
					changehomedisplay(data);
					$("#myframe").animate({
				        opacity: '1'
				    });
		
			}); // end post
		  			
		}	// end if type == page 
		
	});

	$("input[name='home-display']").change(function() {
		var typeDisplay = $("input[name=home-display]:checked").val();
		if(typeDisplay == "default") {
			$("#myframe").attr('src','{url_site}/?admin=customize&api_key=<?php echo $_COOKIE['jnet_session']?>');
		}	
	});
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('.mini-color').each(function () {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time. Again,
            // they're only used for the purposes of this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                format: $(this).attr('data-format') || 'hex',
                keywords: $(this).attr('data-keywords') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                change: function (hex, opacity) {
                    var log;
                    try {
                        log = hex ? hex : 'transparent';
                        if (opacity) log += ', ' + opacity;
                        console.log(log);
                    } catch (e) {
                    }
                },
                theme: 'default'
            });

        });


    });
    function openLibImages(divID, divCLASS) {

        window.KCFinder = {
            callBack: function (url) {
                var urlfull = "{url_site}" + "" + url;
                $("input#" + divID).val(urlfull);
                window.KCFinder = null;
                $("#" + divCLASS).innerHTML = '<div style="margin:5px">Đang tải...</div>';
                $("#" + divCLASS).html("<img src='" + urlfull + "' class='img-responsive' />");

            }
        };
        window.open('{url_site}/editor/kcfinder/browse.php?type=images&lang=vi&dir=images/',
            'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
            'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }
</script>
</body>
</html>
