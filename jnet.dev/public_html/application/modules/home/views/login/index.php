<!DOCTYPE html>
<html>
<head>
    <base href=<?php
    if(isset($url_site)&&!empty($url_site)){
        echo $url_site;
    }else{
        echo base_url();
    }
    ?>>
	 <meta charset="utf-8">
     <title><?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?> - Đăng Nhập Quản Trị Viên</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="">
     <meta name="author" content="">
        <!-- JNET <?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?>  CSS -->
      <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
      <link rel="stylesheet" href="template/login/assets/css/reset.css">
      <link rel="stylesheet" href="template/login/assets/css/supersized.css">
      <link rel="stylesheet" href="template/login/assets/css/style.css">
	  <script src='https://www.google.com/recaptcha/api.js'></script>
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
       <![endif]-->	
</head>
<body>
<div class="container">
  <div class="page-container" id="form-login" style="display: none">
            <h1>ĐĂNG NHẬP QUẢN TRỊ</h1>
            <p style="color: #ddd;font-size: 20px"><?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?></p>
            <form action="" method="post">
            	<p><?php if(isset($error_login)) { echo $error_login;} ?></p>
                <input type="email" name="email_login" placeholder="Email đăng nhập" class="username">
                <?php echo form_error("email_login"); ?>
                <input  type="password" name="password_login" class="password" placeholder="Password">
                <?php echo form_error("password_login"); ?>
                
                <input class="button" type="submit" name="submit_login" class="btn btn-lg btn-primary btn-block" value="Đăng nhập" />
               
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p><a href="javascript:" onclick="return elesnaghacker('show')">Quên mật khẩu ?</a></p>
              
            </div>
   </div>
   <div class="page-container" id="form-reset" style="display:none">
            <h1>LẤY LẠI MẬT KHẨU</h1>
            <p style="color: #ddd;font-size: 20px"><?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?></p>
            <form action="" method="post">
            	<p><?php if(isset($error_login)) { echo $error_login;} ?></p>
                <input type="email" name="email_login" placeholder="Email đăng nhập" class="username">
                <?php echo form_error("email_login"); ?>
                <br>
                {image_captcha}
                <input class="button" type="submit" name="submit_reset" class="btn btn-lg btn-primary btn-block" value="Xác nhận" />
               
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p><a href="javascript:" onclick="return elesnaghacker('hide')">Đăng nhập</a></p>
              
            </div>
            
   </div>
		<!-- JNET <?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?>  Javascript -->
        <script src="template/login/assets/js/jquery-1.8.2.min.js"></script>
        <script src="template/login/assets/js/supersized.3.2.7.min.js"></script>
        <script src="template/login/assets/js/supersized-init.js"></script>
        <script src="template/login/assets/js/scripts.js"></script>
</body>
</html>