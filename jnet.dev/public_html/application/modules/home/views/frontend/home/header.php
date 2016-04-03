<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href=<?php echo base_url(); ?>>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JNet.vn - Thiết kế web,,thiết kế web bán hàng, tự thiết kế website của bạn trong 30s</title>
<meta name="description" content="Tự thiết kế web miễn phí. Chúng  tôi cung cấp mọi thứ để bạn có bản thiết kế website bán hàng trực tuyến trọn gói, uy tín, chất lượng và chuyên nghiệp nhất">
<meta name="keywords" content="lam web ban hang, lam website ban hang, giai phap ban hang, lam web nhanh, web mien phi, jnet, web jnet">
<link rel="stylesheet" type="text/css" href="template/frontend-admin/1/style.css"/>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300,200' rel='stylesheet' type='text/css'>
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
            		<h1><img src="template/frontend-admin/1/images/logo-j-44.png" style="float: left" /><a style="float: left"  href="<?php echo base_url() ?>">NET.VN</a></h1>
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
                        <li><a href="#contact">Bảng giá</a></li>
                        
                        	
                    </ul>
            	</div>
        	</div>
        </div>
    </div>
  