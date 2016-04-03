<!DOCTYPE html>
<html>
<head>
<base href=<?php echo base_url(); ?>>
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
            <h1>THAY ĐỔI MẬT KHẨU</h1>
            <p><?php if(isset($message)) echo $message ?></p>
            <p style="color: #ddd;font-size: 20px"><?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?></p>
            <form action="" method="post">
            	<p><?php if(isset($error_login)) { echo $error_login;} ?></p>
                <input type="password" name="password-{key}-1" placeholder="Nhập mật khẩu mới" class="password" required>
                <?php echo form_error("email_login"); ?>
                <input  type="password" name="password-{key}-2" class="password" placeholder="Nhập lại mật khẩu mới" required>
                <?php echo form_error("password_login"); ?>
                
                <input class="button" type="submit" name="submit_change_pass" class="btn btn-lg btn-primary btn-block" value="Chấp nhận" />
               
                <div class="error"><span>+</span></div>
            </form>
          
   </div>

		<!-- JNET <?php echo mb_convert_case($_SERVER["SERVER_NAME"], MB_CASE_TITLE, "UTF-8");?>  Javascript -->
        <script src="template/login/assets/js/jquery-1.8.2.min.js"></script>
        <script src="template/login/assets/js/supersized.3.2.7.min.js"></script>
        <script src="template/login/assets/js/supersized-init.js"></script>
        <script src="template/login/assets/js/scripts.js"></script>
</body>
</html>